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

<body>
<?= include_once './components/header.php' ?>



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
    <h2 class=" capitalize text-2xl font-extrabold mb-5"> Good Morning  : <?php echo $_SESSION['full_name'] ; ?> </h2>
  
    <?php if ($noSchedule) : ?>
    <h2 class=" text-left font-extrabold text-2xl text-gray-700 mb-6 text-nowrap ml-25"><?php echo 'Data about  ur availability not found ' ; ?></h2>
  <?php else : ?>
  <h2 class=" text-left font-extrabold text-2xl text-gray-700 mb-6 text-nowrap ml-25">Your availability :  <?php echo $startDay . '-' . $endDay.' <br> from : '.$availability; ?></h2>
  <?php endif; ?>
  <div class="flex flex-col items-start justify-center gap-10 " id="schedule"> 
  <?php

  $reservations = Reservation::getAllReservation($doctor_id);
  $rese = new Reservation();
  if (empty($reservations)) {
    echo '<p class="text-center text-gray-700">No reservations found.</p>';
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
      <div class="w-3/4 mx-auto border-red-400 border-2 rounded-xl p-6 overflow-auto" id="Todo">
          <h3 class="pl-4 uppercase text-pretty text-black text-xl">Reservation <?= $i ?>: <span class="pl-4 uppercase text-pretty text-black text-xl"> <?= $reservation['status'] ?> </span> </h3>
            <div class="w-full flex flex-col justify-evenly gap-2">
            <p class="flex mb-4 border-b-2 border-red-500  mt-4 font-mono font-bold"><?= $dates['dayOfWeek']; ?> <span class="ml-auto"><?= $dates['day'] . ' ' . $dates['month'] . ' ' . $dates['year']; ?></span></p>
            <p class="flex mb-4 border-b-2 border-red-500  font-mono font-bold">from <span class="ml-auto"><?= $dates['startTime']; ?></span></p>
            <p class="flex mb-4 border-b-2 border-red-500  font-mono font-bold">to <span class="ml-auto"><?= $dates['endTime']; ?></span></p>
            </div>


        <form action="" method="POST" class="flex items-center gap-14 justify-start ">
        <input type="hidden" name="appointment_id" value=<?= $reservation['idReservation']?>>
        <button class=" px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500" type='submit' name="approve" >
          Approve Appointment
        </button>
        <button class=" ml-3 px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500" type='submit' name="cancel">
          Cancel Appointment
        </button>
        </form>
      </div>
  <?php endforeach; ?>
  </div>
</div>


<?= include_once './components/footer.php' ?>




</body>
</html>