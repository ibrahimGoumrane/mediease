<?php 
session_start();
include_once "../model/Person.php";
include_once '../model/Reservation.php';
include_once '../model/schedule.php' ;
include_once '../controller/handle_reservation_status.php' ;

// Check if user is not signed in or is not a patient
if (!isset($_SESSION['is_signed_in'])) {
    header("Location: ../view/login.php");
    exit();
}
elseif(strcasecmp($_SESSION['user_type'], 'Doctor') != 0){
    header("Location: ../view/profil_patient.php");
    exit();
}

$_SESSION['location']= "Casablanca, Morocco";





if (isset($_POST['approve'])) {
  $reservation = new Reservation();
  $reservation->id = $_POST['appointment_id'];
  $reservation->status = 'approved';
  $reservation->setStatus();
}
if (isset($_POST['cancel'])) {
  $reservation = new Reservation();
  $reservation->id = $_POST['appointment_id'];
  $reservation->status = 'canceled';
  $reservation->setStatus();
}  

?>  
<?php 
// Check if 'availability' is set and true, then store its status in a variable
$showToast = isset($_GET['availability']) && $_GET['availability'] == true;

// Clear the GET variables
if ($showToast) {
    unset($_GET['availability']);
}
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="../media/css/build.css">
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <script src="../media/js/headerJs.js" defer></script>
</head>

<body class="bg-gradient-to-t from-green-300 via-green-100 to-green-50">
<?= include_once './components/header.php' ?>

<?php if ($showToast): ?>

<div id="toast-simple" class="h-screen w-screen fixed top-0 left-0 flex items-end justify-end opacity-100 duration-300">
  <div  class="mb-10 mr-10 flex items-center w-full max-w-xs p-4 space-x-4 rtl:space-x-reverse text-gray-500 bg-white divide-x rtl:divide-x-reverse divide-gray-200 rounded-lg shadow dark:text-gray-400 dark:divide-gray-700 space-x dark:bg-gray-800" role="alert">
      <svg class="w-5 h-5 text-blue-600 dark:text-blue-500 rotate-45" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 17 8 2L9 1 1 19l8-2Zm0 0V9"/>
      </svg>
      <div class="ps-4 text-sm font-normal ">Schedule added successfully.</div>
  </div>
</div>
<script>
        setTimeout(function () {
            const toast = document.getElementById('toast-simple');
            toast.classList.add('hidden');
            toast.classList.add('opacity-0');
        }, 2000);
</script>
<?php endif; ?>

<?php 
$doctor_id = $_SESSION['user_id'];
$schedule = new Schedule($doctor_id);
$info = $schedule->read($doctor_id);
$noSchedule = false;
if ($info == null){
$noSchedule = true;
}
else{
  $schedule->start_time = $info['start_time'];
  $schedule->end_time = $info['end_time'];
  $availability = $schedule->getAvailability();
  $startDay = $info['startDay'];
  $endDay =$info['endDay'];
}
?>

<div  class="relative p-20 text-center min-h-screen mb-10">
    <h1 class="text-5xl font-extrabold mb-8">Manage Reservations</h1>
    <h2 class=" capitalize text-2xl font-bold mb-5"> Welcome Back, <?php echo $_SESSION['full_name'] ; ?> </h2>
  
    <?php if ($noSchedule) : ?>
    <h2 class="text-left font-extrabold text-2xl text-gray-700 mb-6 text-nowrap ml-25">
      <?php 
          echo 'Data about your availability not found. to add your availability  <a href="./add_availability.php" class="ml-4 text-green-500   hover:underline">click here</a>';?>
  <?php else : ?>
  <h2 class="">Your availability :  <?php echo $startDay . '-' . $endDay.' <br> from : '.$availability; ?></h2>
  <?php endif; ?>
  <div class="flex flex-col items-start justify-center gap-10 " id="schedule"> 
  <?php

  $reservations = Reservation::getAllReservation($doctor_id);
  $rese = new Reservation();
  if (empty($reservations)) {
    echo '<p class=" font-bold text-2xl text-red-700 mb-6 text-nowrap ml-25 flex justify-center ">No reservations found.</p>';
    exit;
  }
  $i = 2;
    usort($reservations, function($a, $b) {
        if ($a['status'] === 'approved' && $b['status'] !== 'approved') {
            return -1; // Put approved reservations at the top
        } elseif ($a['status'] !== 'approved' && $b['status'] === 'approved') {
            return 1; // Put approved reservations at the top
        } elseif ($a['status'] === 'canceled' && $b['status'] !== 'canceled') {
            return 1; // Put canceled reservations at the bottom
        } elseif ($a['status'] !== 'canceled' && $b['status'] === 'canceled') {
            return -1; // Put canceled reservations at the bottom
        } else {
            // Sort by date if status is the same or both are canceled
            return strtotime($a['visit_date']) - strtotime($b['visit_date']);
        }
        });
    foreach ($reservations as $reservation): 
      $data =  handle_reservation_status($reservation  , $i , $schedule, $startDay, $endDay) ;
      $i = $data['i'];
      $dates = $data['dates'];

      $rese = new Reservation();
      $rese->id = $reservation['idReservation'];
      $rese->status = $data['statusUpdated']  ? 'canceled' : $reservation['status'] ;

      $rese->setStatus();

      if ($reservation['status'] === 'canceled' || $reservation['status'] === 'approved' || $data['statusUpdated'] == true )  {
        continue;
      }
      ?>
      <div class="w-1/2  mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl m-5">
                    <div class="p-8 flex items-center justify-center gap-10 ">
                        <div class="pr-4">
                            <p class="text-4xl font-bold"><?php echo  $dates['day']; ?></p>
                        </div>
                        <div class="flex flex-col items-center text-center">
                            <p class=" font-serif font-extrabold uppercase tracking-wide text-sm text-indigo-500 "><?php echo $dates['month'] . ' , ' . $dates['year']; ?></p>
                            <p class=" font-serif font-extrabold mt-2 text-gray-500 text-sm center"><?php echo ' from : ' . $dates['startTime']; ?></p>
                            <p class=" font-serif font-extrabold mt-2 text-gray-500 text-sm center"><?php echo ' to : ' . $dates['endTime']; ?></p>
                            <p class=" font-serif font-extrabold mt-2 text-gray-500">WeekDay: <?php echo htmlspecialchars($dates['dayOfWeek']); ?></p>
                            <p class="font-serif font-extrabold <?php echo "mt-2 text-gray-500" ?>"><?php echo "Status: ". $reservation['status']; ?></p>
                        </div> 
                        <form action="" method="POST" class="flex items-center gap-14 justify-start  flex-col">
                        <input type="hidden" name="appointment_id" value=<?= $reservation['idReservation']?>>
                        <button class="w-full px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500" type='submit' name="approve" class="w-full" >
                          Approve Appointment
                        </button>
                        <button class="w-full  px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500" type='submit' name="cancel"  class="w-full">
                          Cancel Appointment
                        </button>
                        </form>                     
                    </div>
      </div>
  <?php endforeach; ?>
  </div>
</div>

<?= include_once './components/footer.php' ?>

</body>
</html>