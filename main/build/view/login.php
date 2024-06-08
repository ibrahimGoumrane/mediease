<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../media/css/build.css">
</head>
<body class=" bg-slate-100 dark:bg-gray-900">


  <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <div class="flex items-center justify-center gap-x-3 mb-6">
            <img class="w-14 h-14 mr-2 bg-black rounded-full " src="../media/img/medicalImage.jpg" alt="logo">
            <a href="aboutUs.php" class=" relative after:content-['AboutUs'] after:absolute after:hidden hover:after:block hover:after:duration-300  hover:after:-right-5 after:font-serif after:font-extralight after:text-sm after:text-neutral-500  after:bottom-0 after:right-0  text-right tracking-widest font-serif  text-2xl font-semibold text-gray-900 dark:text-white  pb-0 border-b-0 hover:border-b-2 hover:pb-3 duration-300 "> MEDIEASE </a>  
            <button id="theme-toggle" type="button" class=" absolute top-5 right-5 hover:bg-black rounded-full hover:text-white dark:text-gray-400 bg-gray-100 text-black dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 text-lg w-12 h-12 flex items-center justify-center">
                <svg id="theme-toggle-dark-icon" class="hidden w-8 h-8" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                <svg id="theme-toggle-light-icon" class="hidden  w-8 h-8" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
            </button> 
        </div>
   


      <div class="w-1/2 bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
          <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
              <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                  Login to your account
              </h1>
              <form class="space-y-4 md:space-y-6" action="../controller/handle_login.php" method="POST" >
                <div>
                    <?php 
                    if (isset($_GET['error'])) {
                        $error = $_GET['error'];
                            echo '<p class="text-red-500 text-sm"> '.$error.' </p>';
                    }
                    echo '<label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>';
                    if (isset($_GET['email'])) {
                        $email = $_GET['email'];
                        echo '<input type="email" name="email" id="email" value='.$email.' class="bg-white border border-green-300 text-gray-900 sm:text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5 dark:bg-green-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500" placeholder="name@company.com" required=""></div>';
                    }else{
                        echo '<input type="email" name="email" id="email"  class="bg-white border border-green-300 text-gray-900 sm:text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5 dark:bg-green-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500" placeholder="name@company.com" required=""></div>';
                    }
                    echo '<div> <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>';
                    if (isset($_GET['pass'])) {
                        $pass = $_GET['pass'];
                        echo '<input type="password" name="password" value='.$pass.' id="password" placeholder="••••••••" class="bg-white border border-green-300 text-gray-900 sm:text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5 dark:bg-green-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500" required=""></div>';
                    }else{
                        echo '<input type="password" name="password" id="password" placeholder="••••••••" class="bg-white border border-green-300 text-gray-900 sm:text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5 dark:bg-green-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500" required=""></div>';
                    }
                    ?>
                <button type="submit" class="w-full text-black bg-green-300 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Login</button>
                <div>
                <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                    Don't have an account yet?  <a href="./sign-up.php" class="font-medium text-green-600 hover:underline dark:text-green-500">Sign up here</a>
                </p>
                <p class="text-sm font-light text-gray-500 dark:text-gray-400 mt-2">
                   Wanna learn more about Us ?  <a href="./aboutUs.php" class="font-medium text-green-600 hover:underline dark:text-green-500">Click here</a>
                </p>
                </div>

            </form>
            
          </div>
      </div>
  </div>

<script src="../media/js/darkmode.js"> </script>
</body>
</html>
