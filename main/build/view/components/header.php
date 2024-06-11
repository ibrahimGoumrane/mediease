
<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<header class="flex  justify-center items-center h-28 w-full gap-1 mx-auto px-5 flex-col bg-green-50 ">    
    <div class="w-full h-full flex items-center my-4 mb-1 font-serif text-base gap-44 px-10">
        <div class="w-3/4 flex justify-between items-center h-full font-serif text-base gap-20">
            <div class="flex items-center justify-center text-xl text-nowrap">
                <p>
                <a href="./homePage.php" class="flex items-center justify-center gap-5">
                    <i class="bx bx-plus-medical"></i>
                    <span>MediEase</span>
                </p>
            </div>
            <ul class="font-light flex items-center text-slate-400 gap-8 font-serif list-none  " >
            <?php
            if (isset($_SESSION['is_signed_in']) && $_SESSION['is_signed_in'] === true) {
                    if (strcasecmp($_SESSION['user_type'], 'Doctor') != 0) {
                    echo '<li class="h-10 hover:bg-transparent hover:duration-300"><a class=" text-nowrap p-2 block relative hover:border-b hover:border-b-green-400 hover:-translate-y-0.5 duration-300" href="../view/findDoctor.php">Find a Doctor</a></li>';
                    echo '<li class="h-10 hover:bg-transparent hover:duration-300"><a class=" text-nowrap p-2 block relative hover:border-b hover:border-b-green-400 hover:-translate-y-0.5 duration-300" href="../view/patientReservation.php">My Reservations</a></li>';

                } else {
                    echo '<li class="h-10 hover:bg-transparent hover:duration-300"><a class=" text-nowrap p-2 block relative hover:border-b hover:border-b-green-400 hover:-translate-y-0.5 duration-300" href="../view/manageReservation.php">Schedule</a></li>';
                    echo '<li class="h-10 hover:bg-transparent hover:duration-300"><a class=" text-nowrap p-2 block relative hover:border-b hover:border-b-green-400 hover:-translate-y-0.5 duration-300" href="../view/reservationHistory.php">Reservation history</a></li>';
                }
            }else{
                echo '<li class="h-10 hover:bg-transparent hover:duration-300"><a class=" text-nowrap p-2 block relative hover:border-b hover:border-b-green-400 hover:-translate-y-0.5 duration-300" href="../view/login.php">Find a Doctor</a></li>';
                echo '<li class="h-10 hover:bg-transparent hover:duration-300"><a class=" text-nowrap p-2 block relative hover:border-b hover:border-b-green-400 hover:-translate-y-0.5 duration-300" href="../view/login.php">My Reservations</a></li>';
            }
            echo '<li class="h-10 hover:bg-transparent hover:duration-300"><a class="text-nowrap p-2 block relative hover:border-b hover:border-b-green-400 hover:-translate-y-0.5 duration-300" href="../view/contactUs.php">Contact Us</a></li>';
            echo '<li class="h-10 hover:bg-transparent hover:duration-300"><a class="text-nowrap p-2 block relative hover:border-b hover:border-b-green-400 hover:-translate-y-0.5 duration-300" href="../view/aboutUs.php">About Us</a></li>';
            ?>
            <li class="h-10 hover:bg-transparent hover:duration-300"><a class="text-nowrap  p-2 block relative hover:border-b hover:border-b-green-400 hover:-translate-y-0.5 duration-300" href="../view/blog.php">Blogs</a></li>
            </ul>

        </div>   
        <div class="w-2/4 flex justify-end items-center h-full font-serif text-base gap-20"> 
     <?php
        if (isset($_SESSION['is_signed_in']) && $_SESSION['is_signed_in'] === true) {
            $profileType =  './profile.php' ;
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
                                    <span class="text-black text-md text-center">'. $_SESSION['email'] .'</span>  
                                </div>
                            </div>
                            <div class="flex items-center justify-center flex-col gap-x-10">
                                <img src="../media/img/pp.jpg" class="rounded-full w-28" alt="profile picture">
                                <h2 class=" text-emerald-500 font-bold text-2xl tracking-wide text-center capitalize">' . 
                                 $_SESSION['full_name'] .'</h2>
                            </div>
                            <div class="flex items-center justify-center flex-col">
                                <p class="text-emerald-400 font-semibold mt-2.5">
                                    Online
                                </p>
                                <div class="flex justify-center items-center gap-10 mt-5">
                                <form action="'.$profileType.'" method="POST" class="flex justify-center items-center">
                                <button type="submit" class="text-nowrap bg-emerald-500 text-white font-semibold text-sm px-4 py-2 rounded-lg border border-[#071e34] hover:bg-[#071e34] hover:border-[#071e34] hover:text-white">Profile</button>
                                </form>
                                <form action="../controller/handle_log_out.php" method="GET" class="flex justify-center items-center">
                                <button class="text-nowrap bg-orange-600 text-white font-semibold text-sm px-4 py-2 rounded-lg border border-[#071e34] hover:bg-[#071e34] hover:border-[#071e34] hover:text-white" type="submit" name="logout" value="true">Log out</button>
                                </form>
                               
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
            <button type="submit"  class="duration-300 hover:translate-x-5 relative translate-x-0 text-white bg-emerald-500 hover:bg-emerald-100  hover:text-black  hover: focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-2xl text-center font-mono p-3 w-1/4 justify-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            
            <a href="./login.php">Log in</a>
            
            </button>
            <button type="submit" class="text-black text-nowrap bg-emerald-200 hover:bg-transparent duration-300 hover:translate-x-5 translate-x-0 hover:text-black  focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-2xl text-center font-mono p-3 w-1/4 justify-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <a href="./sign-up.php">Sign up</a>
            
            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
            </button>
            </svg>
            ';
        }
        ?> 
        </div>
    </div>         
</header>

