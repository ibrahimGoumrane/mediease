<?php 

session_start();
if (isset($_POST['DeleteButton'])) {
  include_once '../model/person.php';
  if(Person::delete($_SESSION['id'])){
    session_unset();
    session_destroy();
    header('Location: login.php');
    exit;
  }
  }
$_SESSION['full_name'] = 'Dr. John Doe';
$_SESSION['id'] = 2;
$_SESSION['phone'] = '1254';
$_SESSION['date_of_birth'] = '1977-05-27';
$_SESSION['gender'] = 'male';
$_SESSION['email'] = 'ibrahim@gmail.com';
$_SESSION['years_of_experience'] = '30';
$_SESSION['specialization'] = 'Dentiste';
$_SESSION['location'] = 'casablanca morocco';
$_SESSION['Bio']='An  of considerable range, Jenna the name taken by Melbourne-raised, Brooklyn-based Nick Murphy writes, performs and records all of his own music, giving it a warm, intimate feel with a solid groove structure. An artist of considerable range.';

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

  <?php include_once 'components/header.php'; ?>

<main class="flex justify-center items-start gap-10 p-20">
<div class="profile-page w-2/3 " id="profile">
  <section class="relative block h-500-px">
    <div class="absolute top-0 w-full h-full bg-center bg-cover" style="
            background-image: url('https://images.unsplash.com/photo-1499336315816-097655dcfbda?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=2710&amp;q=80');
          ">
      <span id="blackOverlay" class="w-full h-full absolute opacity-50 bg-black"></span>
    </div>
    <div class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden h-70-px" style="transform: translateZ(0px)">
      <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" version="1.1" viewBox="0 0 2560 100" x="0" y="0">
        <polygon class="text-blueGray-200 fill-current" points="2560 0 2560 100 0 100"></polygon>
      </svg>
    </div>
  </section>
  <section class="relative py-16">
    <div class="container mx-auto px-4">
      <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg -mt-64">
        <div class="px-6">
          <div class="flex flex-wrap justify-center">
            <div class="w-full lg:w-3/12 px-4 lg:order-2 flex justify-center">
              <div class="relative">
                <img alt="..." 
                src="data:image/jpeg;base64,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" class="shadow-xl rounded-full h-auto align-middle border-none absolute -m-16 -ml-20 lg:-ml-16 max-w-150-px">
              </div>
            </div>
            <div class="w-full lg:w-4/12 px-4 lg:order-3 lg:text-right lg:self-center">
              <div class="py-6 px-3 mt-32 sm:mt-0">
                <div class="group relative">
                  <form action="" method="POST">

                    <button class=" flex items-center justify-center  border-2 p-3 font-bold font-mono text-white hover:bg-white hover:text-red-500 rounded-3xl bg-red-500 hover:-translate-y-1 duration-300" type="submit" name="DeleteButton" >
                      Delete Account
                    </button>
                    <div class="hidden group-hover:flex absolute -left-12  text-center  shadow hover:duration-300  items-center justify-center  border-2 p-3 font-bold font-mono text-white hover: rounded-3xl bg-black ">
                      Clicking on this button ur hole account will be deleted
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="w-full lg:w-4/12 px-4 lg:order-1">
            </div>
          </div>
          <div class="text-center mt-12">
            <h3 class="text-xl font-semibold leading-normal inline-block text-blueGray-700 mb-2">
              <?php echo $_SESSION['full_name']; ?>
            </h3>
            <div class="text-sm leading-normal mt-0 mb-2 text-blueGray-400 font-bold uppercase">
              <i class='bx bxs-phone mr-2 text-lg text-blueGray-400' ></i>
              <h3 class="text-xl font-semibold leading-normal inline-block text-blueGray-700 mb-2">
                <?php echo $_SESSION['phone']; ?> 
              </h3> 
            </div>
            <div class="text-sm leading-normal mt-0 mb-2 text-blueGray-400 font-bold uppercase">
              <i class='bx bx-envelope mr-2 text-lg text-blueGray-400' ></i>
              <h3 class="text-xl font-semibold leading-normal inline-block text-blueGray-700 mb-2">
                <?php echo $_SESSION['email']; ?>
              </h3>
            </div>
            <div class="text-sm leading-normal mt-0 mb-2 text-blueGray-400 font-bold uppercase">
              <i class="fas fa-map-marker-alt mr-2 text-lg text-blueGray-400"></i>
              <h3 class="text-xl font-semibold leading-normal inline-block text-blueGray-700 mb-2">
              <?php echo $_SESSION['location']; ?> 
              </h3>
            </div>
            <div class="mb-2 text-blueGray-600 mt-10">
              <i class="fas fa-briefcase mr-2 text-lg text-blueGray-400"></i> 
              <h3 class="text-xl font-semibold leading-normal inline-block text-blueGray-700 mb-2">
              <?php echo $_SESSION['specialization']; ?> 
              </h3>
            </div>
            <div class="mb-2 text-blueGray-600">
              <i class="fas fa-university mr-2 text-lg text-blueGray-400"></i> 
              <h3 class="text-xl font-semibold leading-normal inline-block text-blueGray-700 mb-2">
              <?php echo $_SESSION['years_of_experience']  ; ?>   years of experience
              </h3>
            </div>
          </div>
          <div class="mt-10 py-10 border-t border-blueGray-200 text-center">
            <div class="flex flex-wrap justify-center">
              <div class="w-full lg:w-9/12 px-4">
                <p class="mb-4 text-lg leading-relaxed text-blueGray-700">
                <?php echo $_SESSION['Bio']; ?>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<div id="actions "  class="relative ">
  <?php if($noSchedule): ?>
  <div class="flex flex-col items-center justify-center gap-10">
    <h2 class=" text-left font-extrabold text-2xl text-gray-700 mb-6"></h2>
  <?php else: ?>    
  <h2 class=" text-left font-extrabold text-2xl text-gray-700 mb-6">Doctor available :  <?php echo $startDay . '-' . $endDay.' <br> from : '.$availability; ?></h2>
  <?php endif; ?>
  <div class="flex flex-col items-start justify-center gap-10 " id="schedule"> 
  <?php
  include_once '../model/reservation.php';
  $reservation = new Reservation();
  $doctor_id= 1;
  $reservations = $reservation->getAllReservation($doctor_id);
  if (empty($reservations)) {
    echo '<p class="text-center text-gray-700">No reservations found.</p>';
    exit;
  }
    foreach ($reservations as $reservation): ?>
      <?php
      $visitDate = new DateTime($reservation['visit_date']);
      $dayOfWeek = $visitDate->format('l'); // e.g., 'Monday'
      $day = $visitDate->format('d');
      $month = $visitDate->format('F'); // e.g., 'January'
      $year = $visitDate->format('Y');
      $startTime = $visitDate->format('H:i');

      $currentUnixTime = time();
      $visitDateUnix = $visitDate->format('U');

      if ($visitDateUnix > $currentUnixTime) {
        echo '<p class="text-center text-gray-700 text-3xl font-body font-bold">No reservations found.</p>';
        continue;
      }    
      // Calculate the end time by adding 2 hours to the start time
      $endDate = clone $visitDate;
      $endDate->modify('+2 hours');
      $endTime = $endDate->format('H:i');
      ?>
      <div class="w-full bg-indigo-200 rounded-xl p-6 overflow-auto" id="Todo">
          <h3 class="text-left font-bold text-xl text-gray-700">Reservation <?= $reservation['idReservation']; ?>:</h3>
          <div class="w-full flex flex-col justify-evenly gap-2">
            <p class="flex mb-4 border-b-2 border-b-indigo-400 mt-4 font-mono font-bold"><?= $dayOfWeek; ?> <span class="ml-auto"><?= $day . ' ' . $month . ' ' . $year; ?></span></p>
            <p class="flex mb-4 border-b-2 border-b-indigo-400 font-mono font-bold">from <span class="ml-auto"><?= $startTime; ?></span></p>
            <p class="flex mb-4 border-b-2 border-b-indigo-400 font-mono font-bold">to <span class="ml-auto"><?= $endTime; ?></span></p>
          </div>
        <div class="flex items-center gap-10 justify-center">
        <button class="mt-5 px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
              View Details
          </button>
          <button class="mt-5 ml-3 px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
              Cancel Appointment
          </button>
        </div>
      </div>
  <?php endforeach; ?>
  </div>
 
</div>
</main>
<?php include_once 'components/footer.php'; ?>




</body>
</html>


