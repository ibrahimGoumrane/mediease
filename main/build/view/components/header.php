
<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// session_destroy();
// header("Location: login.php"); // Redirect to login page after logout
// exit();

// $_SESSION['is_signed_in'] = true;
// $_SESSION['is_doctor'] = true;
//print_r($_SESSION);
?>

<header class="flex sticky z-50 top-0 justify-center items-start h-fit w-full gap-1 mx-auto px-5 flex-col bg-green-50 mb-14">    
    <div class="w-full flex justify-between items-center my-4 mb-1 font-serif text-base gap-44 px-10">
        <div class="w-2/4 flex justify-between items-center h-full font-serif text-base gap-20">
            <div class="flex items-center justify-center text-xl text-nowrap">
                <p>
                <a href="#" class="flex items-center">
                    <i class="bx bx-plus-medical"></i>
                    <span>MediEase</span>
                </p>
            </div>
            <ul class="font-light flex items-center w-3/4 text-slate-400 gap-8 font-serif list-none">
            <?php
            if (isset($_SESSION['is_signed_in']) && $_SESSION['is_signed_in'] === true) {
                    if (!isset($_SESSION['is_doctor']) || $_SESSION['is_doctor'] === false) {
                    echo '<li class="h-10 hover:bg-transparent hover:duration-300"><a class="p-2 block relative hover:border-b hover:border-b-green-400 hover:-translate-y-0.5 duration-300" href="../view/homepage_loggedIn.php">Find a Doctor</a></li>';
                    echo '<li class="h-10 hover:bg-transparent hover:duration-300"><a class="p-2 block relative hover:border-b hover:border-b-green-400 hover:-translate-y-0.5 duration-300" href="../view/view_patient_reservations.php">My Reservations</a></li>';
                    echo '<li class="h-10 hover:bg-transparent hover:duration-300"><a class="p-2 block relative hover:border-b hover:border-b-green-400 hover:-translate-y-0.5 duration-300" href="../view/supportContact.php">Contact Support</a></li>';
                } else {
                    echo '<li class="h-10 hover:bg-transparent hover:duration-300"><a class="p-2 block relative hover:border-b hover:border-b-green-400 hover:-translate-y-0.5 duration-300" href="../view/manageReservation.php">Schedule</a></li>';
                    echo '<li class="h-10 hover:bg-transparent hover:duration-300"><a class="p-2 block relative hover:border-b hover:border-b-green-400 hover:-translate-y-0.5 duration-300" href="../view/reservationHistory.php">Reservation history</a></li>';
                    echo '<li class="h-10 hover:bg-transparent hover:duration-300"><a class="p-2 block relative hover:border-b hover:border-b-green-400 hover:-translate-y-0.5 duration-300" href="../view/supportContact.php">Contact Support</a></li>';
                }
            }else{
                echo '<li class="h-10 hover:bg-transparent hover:duration-300"><a class="p-2 block relative hover:border-b hover:border-b-green-400 hover:-translate-y-0.5 duration-300" href="../view/login.php">Find a Doctor</a></li>';
                echo '<li class="h-10 hover:bg-transparent hover:duration-300"><a class="p-2 block relative hover:border-b hover:border-b-green-400 hover:-translate-y-0.5 duration-300" href="../view/login.php">My Reservations</a></li>';
            }
            echo '<li class="h-10 hover:bg-transparent hover:duration-300"><a class="p-2 block relative hover:border-b hover:border-b-green-400 hover:-translate-y-0.5 duration-300" href="../view/contactUs.php">Contact Us</a></li>';
            echo '<li class="h-10 hover:bg-transparent hover:duration-300"><a class="p-2 block relative hover:border-b hover:border-b-green-400 hover:-translate-y-0.5 duration-300" href="../view/aboutUs.php">About Us</a></li>';
            ?>
        </div>
        <?php
        
        if (isset($_SESSION['is_signed_in']) && $_SESSION['is_signed_in'] === true) {
            echo '<div class="flex justify-center items-center h-full font-serif text-base w-1/6 gap-4 mt-3">
            <div id="Profile" class="">
                <button class="" onclick="toggleProfile()">
                    <img class="max-h-16 h-14 w-14 object-cover rounded-full" src="../media/img/pp.jpg" alt="profile" />
                    <p class="font-2xl text-gray-500 font-bold rounded-xl">Profile</p>
                </button>
                <div id="profile" class="deseaper">
                    <section style="font-family: Montserrat" class="bg-green-50 flex font-medium items-center justify-center rounded-2xl">
                        <section class="w-fit mx-auto bg-green-50 rounded-2xl px-8 py-6 shadow-lg p-5 flex items-center justify-start flex-col gap-2">
                            <div class="relative w-full">
                                <span onclick="toggleProfile()" class="absolute -top-3 -right-4 hover:cursor-pointer bg-white text-black text-2xl font-bold p-3 rounded-full h-10 w-10 flex items-center justify-center">X</span>
                                <div class="flex items-center justify-between flex-col pt-6">
                                    <span class="text-black text-xl text-center">Welcome back :</span>
                                    <span class="text-black text-md text-center">mizoxrizox@gmail.com</span>  
                                </div>
                            </div>
                            <div class="flex items-center justify-center flex-col gap-x-10">
                                <img src="../media/img/pp.jpg" class="rounded-full w-28" alt="profile picture">
                                <h2 class=" text-emerald-500 font-bold text-2xl tracking-wide text-center">' . $_SESSION['full_name'] .'</h2>


                            </div>
                            <div class="flex items-center justify-center flex-col">
                                <p class="text-emerald-400 font-semibold mt-2.5">
                                    Online
                                </p>
                                <div class="flex justify-center items-center gap-10 mt-5">
                                <form action="./profil_patient.php" method="POST" class="flex justify-center items-center">
                                <button type="submit" class="text-nowrap bg-emerald-500 text-white font-semibold text-sm px-4 py-2 rounded-lg border border-[#071e34] hover:bg-[#071e34] hover:border-[#071e34] hover:text-white">Profile</button>
                                </form>
                                <button class="text-nowrap bg-orange-600 text-white font-semibold text-sm px-4 py-2 rounded-lg border border-[#071e34] hover:bg-[#071e34] hover:border-[#071e34] hover:text-white">Log out</button>
                                </div>  
                            </div>
                        </section>
                    </section>
                </div>
            </div>
        </div>
        </div>
            ';
        } else {
            echo '
            <div class="flex justify-end items-end h-full font-serif text-base w-1/6 gap-4">
            <form action="./login.php" method="GET" class="flex justify-end items-end">
                <button type="submit" class="hover:bg-green-600 hover:rounded-full hover:text-white text-nowrap text-xl duration-300 text-light-black px-7 py-5 w-fit rounded-3xl h-6 flex justify-center items-center">Log in</button>
            </form>
            <form action="sign-up.php" method="POST" class="flex justify-center items-center">
                <button type="submit" class="buttonMain">Sign up</button>
            </form>
            </div>
            ';
        }
        ?>
               
        
    <hr class="w-5/6 mx-auto bg-light-light-black opacity-75">

</header>
<script>
        // Function to toggle the visibility of the profile section
        const profile = document.getElementById('profile');
        function toggleProfile() {
            profile.classList.toggle('appear');
        }
    </script>
