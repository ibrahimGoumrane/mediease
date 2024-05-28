<?php 

session_start();


include_once '../model/Reservation.php';
include_once '../model/person.php';


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
</head>

<body>
<?= include './components/header.php' ?>

<?php include_once '../model/schedule.php' ;
$doctor_id = 1;
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
<div  class="relative p-20 text-center ">
  <h2 class=" text-left font-extrabold text-2xl text-gray-700 mb-6 text-nowrap ml-25">Your availability :  <?php echo $startDay . '-' . $endDay.' <br> from : '.$availability; ?></h2>
  <div class="flex flex-col items-start justify-center gap-10 " id="schedule"> 
  <?php
  include_once '../model/reservation.php';
  $reservation = new Reservation();
  $doctor_id= 1;
  $reservations = $reservation->getAllReservation($doctor_id);
  function IsBigger($array, $element1, $element2) {
    $index1 = array_search($element1, $array);
    $index2 = array_search($element2, $array);

    if ($index1 >= $index2) {
        return 1;
    } elseif ($index2 > $index1) {
        return 0;
    } 
  }
  if (empty($reservations)) {
    echo '<p class="text-center text-gray-700">No reservations found.</p>';
    exit;
  }
  $i = 0;
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
    foreach ($reservations as $reservation): ?>
      <?php
      $i ++;
      $daysOfWeek = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');

      $visitDate = new DateTime($reservation['visit_date']);
      $visitDateUnix = $visitDate->format('U');


      $dayOfWeek = $visitDate->format('l'); // e.g., 'Monday'
      $day = $visitDate->format('d');
      $month = $visitDate->format('F'); // e.g., 'January'
      $year = $visitDate->format('Y');

      //starting time
      $startTime = $visitDate->format('H:i:s');
      //ending time
      $endTime =clone $visitDate;
      $endTime->modify('+1 hour');
      $endTime = $endTime->format('H:i:s');

      //schedule time
      // Convert end time to DateTime object
      $endTimeSchedule = new DateTime($schedule->end_time);

      // Subtract one hour from the end time

      $endTSchedule = clone $endTimeSchedule;
      $endTSchedule->modify('-1 hour');

      // Format the modified time as needed
      $endTSchedule = $endTSchedule->format('H:i');
      
    if ($reservation['status'] === 'canceled' || $reservation['status'] === 'approved') {
        $i--;
        continue;
    }
    if ($visitDateUnix <  time()) 
    {
      $i--;
      $reservation['status'] === 'canceled';
      continue;
    } 
      

    else{
      if(IsBigger($daysOfWeek,$startDay , $dayOfWeek ) ==1 || IsBigger($daysOfWeek,$endDay ,$dayOfWeek ) ==0 ) 
      {
        $i--;
        $reservation['status'] === 'canceled';
        continue;
      } 
      if($schedule->start_time > $startTime || $endTimeSchedule  < $startTime ) 
      {
        $i--;
        $reservation['status'] === 'canceled';
        continue;
      } 
    }  

      ?>
      <div class="w-3/4 mx-auto border-red-400 border-2 rounded-xl p-6 overflow-auto" id="Todo">
          <h3 class="pl-4 uppercase text-pretty text-black text-xl">Reservation <?= $i ?>: <span class="pl-4 uppercase text-pretty text-black text-xl"> <?= $reservation['status'] ?> </span> </h3>
          <div class="w-full flex flex-col justify-evenly gap-2">
            <p class="flex mb-4 border-b-2 border-red-500  mt-4 font-mono font-bold"><?= $dayOfWeek; ?> <span class="ml-auto"><?= $day . ' ' . $month . ' ' . $year; ?></span></p>
            <p class="flex mb-4 border-b-2 border-red-500  font-mono font-bold">from <span class="ml-auto"><?= $startTime; ?></span></p>
            <p class="flex mb-4 border-b-2 border-red-500  font-mono font-bold">to <span class="ml-auto"><?= $endTime; ?></span></p>
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
</main>
<?php include_once 'components/footer.php'; ?>




</body>
</html>