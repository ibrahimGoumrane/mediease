<?php
session_start();

include_once '../model/person.php';
// session_destroy();
// session_start();
// $_SESSION['is_signed_in']=true;

if (isset($_POST['DeleteButton'])) {
  if(Person::delete($_SESSION['user_id'])){
    echo 'deleted';
    session_unset();
    session_destroy();
    header('Location: login.php');
    exit;
  }
}

// Check if user is not signed in or is not a patient
if (!isset($_SESSION['is_signed_in'])) {
    header("Location: ../view/login.php");
    exit();
}
elseif(strcasecmp($_SESSION['user_type'], 'patient')){
    header("Location: ../view/profil_doctor.php");
    exit();
}

 
$_SESSION['location']= "Casablanca, Morocco";
if (isset($_POST['DeleteButton'])) {
    if(Person::delete($_SESSION['id'])){
      session_unset();
      session_destroy();
      header('Location: login.php');
      exit;
    }
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
  <?php include_once './components/header.php' ;?>
<main class="flex justify-center items-start gap-10 p-20 bg-gradient-to-t from-green-300 via-green-100 to-green-50 shadow-2xl shadow-green-50">
<div class="profile-page w-2/3 " id="profile">
  <section class="relative block h-500-px">
    <div class="absolute top-0 w-full h-full bg-center bg-cover" style="background-image: url('https://images.unsplash.com/photo-1499336315816-097655dcfbda?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=2710&amp;q=80');">
      <span id="blackOverlay" class="w-full h-full absolute opacity-50 bg-black"></span>
    </div>
    <!--<div class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden h-70-px" style="transform: translateZ(0px)">
      <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" version="1.1" viewBox="0 0 2560 100" x="0" y="0">
        <polygon class="text-blueGray-200 fill-current" points="2560 0 2560 100 0 100"></polygon>
      </svg>
    </div> -->
  </section>
  <section class="relative py-16">
    <div class="container mx-auto px-4">
      <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg -mt-64">
        <div class="px-6">
          <div class="flex flex-wrap justify-center">
            <div class="w-full lg:w-3/12 px-4 lg:order-2 flex justify-center">
              <div class="relative">
                <img alt="..." 
                src="../media/img/pp.jpg" class="shadow-xl rounded-full h-auto align-middle border-none absolute -m-16 -ml-20 lg:-ml-16 max-w-150-px">
              </div>
            </div>
            <div class="w-full lg:w-4/12 px-4 lg:order-3 lg:text-right lg:self-center">
              <div class="py-6 px-3 mt-32 sm:mt-0">
                <div class="group relative">
                  <form action="" method="POST">
                    <button class=" flex items-center justify-center  border-2 p-3 text-white hover:bg-white hover:text-red-500 rounded-3xl bg-red-500 hover:-translate-y-1 duration-300" type="submit" name="DeleteButton" >
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
          <div class="text-center mt-5">
            <h3 class="text-3xl  font-semibold leading-normal inline-block text-blueGray-700 mb-2">
              <?php echo $_SESSION['full_name']  ?>
            </h3>
            <div class="text-blueGray-600 ">
              <i class="fa fa-venus-mars mr-2 text-lg text-blueGray-400"></i> 
              <h3 class="text-xl font-semibold leading-normal inline-block text-blueGray-700 mb-2">
              <?php echo $_SESSION['gender']; ?> 
              </h3>
            </div>
            <div class="text-sm leading-normal mt-0 mb-2 text-blueGray-400 font-bold uppercase">
              <i class='bx bxs-phone mr-2 text-lg text-blueGray-400' ></i>
              <h3 class="text-xl font-semibold leading-normal inline-block text-blueGray-700 mb-2">
                <?php echo $_SESSION['phone_number']; ?> 
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
          <div class="mt-10 py-10 border-t border-blueGray-200 text-center">
            <div class="flex flex-wrap justify-center">
              <div class="w-full lg:w-9/12 px-4">
                <p class="mb-4 text-lg leading-relaxed text-blueGray-700">
                <?php echo $_SESSION['medical_history']; ?>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
<?php include_once 'components/footer.php'; ?>
</body>
</html>


