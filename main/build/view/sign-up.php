<?php
session_start();
if (isset($_SESSION['data'])) {
    $formData = unserialize($_SESSION['data']);
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>sign up</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../media/css/build.css">
</head>
<body class="bg-gray-50 dark:bg-gray-900">
  <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
      <div class="w-1/2 bg-whiterounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
        <div class="p-10 space-y-4 md:space-y-6 sm:p-8 ">
        <div class="flex items-center justify-center gap-x-3 mb-6">
            <a href="aboutUs.php" class=" relative after:content-['AboutUs'] after:absolute after:hidden hover:after:block hover:after:duration-300  hover:after:-right-5 after:font-serif after:font-extralight after:text-sm after:text-neutral-500  after:bottom-0 after:right-0  text-right tracking-widest font-serif  text-2xl font-semibold text-gray-900 dark:text-white  pb-0 border-b-0 hover:border-b-2 hover:pb-3 duration-300 "> MEDIEASE </a>  
            <button id="theme-toggle" type="button" class=" absolute top-5 right-5 hover:bg-black rounded-full hover:text-white dark:text-gray-400 bg-gray-100 text-black dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 text-lg w-12 h-12 flex items-center justify-center">
                <svg id="theme-toggle-dark-icon" class="hidden w-8 h-8" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                <svg id="theme-toggle-light-icon" class="hidden  w-8 h-8" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
            </button> 
        </div>
        <div class="flex items-center justify-start gap-5">
            <img class="w-14 h-14 mr-2 bg-black rounded-full " src="../media/img/medicalImage.jpg" alt="logo">
            <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                Create an account
            </h1>

            </div>
            <form class="space-y-4 md:space-y-6" action="../controller/handle_sign-up.php" method="post">
                <div>    
                    <label for="full_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Full Name:</label>
                    <?php
                    $fullName = isset($formData['full_name']) ? $formData['full_name'] : '';
                    echo '<input type="text" id="full_name" name="full_name" class="bg-white border border-green-300 text-gray-900 sm:text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5 dark:bg-green-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500" placeholder="" value="'.$fullName.'" required="" />';
                    if(isset($_GET['errorFullName']) && $_GET['errorFullName'] == 'full_name') {
                        echo '<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oh, snapp!</span> Name already exists.</p>';
                    } 

                    ?>
                </div>
                <div>
                    <label for="date_of_birth" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date of Birth:</label>
                    <?php
                    $dateOfBirth = isset($formData['date_of_birth']) ? $formData['date_of_birth'] : '';
                    echo '<input type="date" id="date_of_birth" name="date_of_birth" class="bg-white border border-green-300 text-gray-900 sm:text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5 dark:bg-green-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500" value="'.$dateOfBirth.'" required="" />';
                    ?>
                </div>
                <div>
                    <label for="gender" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gender:</label>
                    <?php
                    $gender = isset($formData['gender']) ? $formData['gender'] : '';
                    echo '<select id="gender" name="gender" class="bg-white border border-green-300 text-gray-900 sm:text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5 dark:bg-green-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500" required="">';
                    echo '<option value="male" '.($gender == 'male' ? 'selected' : '').'>Male</option>';
                    echo '<option value="female" '.($gender == 'female' ? 'selected' : '').'>Female</option>';
                    echo '</select>';
                    ?>
                </div>
                <div>
                    <label for="phone_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone Number:</label>
                    <?php
                    $phoneNumber = isset($formData['phone_number']) ? $formData['phone_number'] : '';
                    echo '<input type="number" id="phone_number" name="phone_number" class="bg-white border border-green-300 text-gray-900 sm:text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5 dark:bg-green-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500" placeholder="06xxxxxxxx" value="'.$phoneNumber.'" required="" />';
                    if(isset($_GET['errorPhone']) && $_GET['errorPhone'] == 'phone_number') {
                        echo '<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oh, snapp!</span> Phone number already exists.</p>';
                    }
                    ?>
                </div>
                <div>
                    <label for="user_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">I am a:</label>
                    <?php
                    $userType = isset($formData['user_type']) ? $formData['user_type'] : 'patient';
                    echo '<select id="user_type" name="user_type" class="bg-white border border-green-300 text-gray-900 sm:text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5 dark:bg-green-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500" required="">';
                    echo '<option value="patient" '.($userType == 'patient' ? 'selected' : '').'>Patient</option>';
                    echo '<option value="doctor" '.($userType == 'doctor' ? 'selected' : '').'>Doctor</option>';
                    echo '</select>';
                    ?>
                </div>
                <div id="years_of_experience_field" style="display: none;">
                    <label for="years_of_experience" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Years of Experience:</label>
                    <?php
                    $yearsOfExperience = isset($formData['years_of_experience']) ? $formData['years_of_experience'] : '';
                    echo '<input type="number" id="years_of_experience" name="years_of_experience" class="bg-white border border-green-300 text-gray-900 sm:text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5 dark:bg-green-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500" placeholder="Years of Experience" value="'.$yearsOfExperience.'" >';
                    ?>
                </div>
                <div id="specialization" style="display: none;">
                    <label for="specialization" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Specialization:</label>
                    <?php
                    $specialization = isset($formData['specialization']) ? $formData['specialization'] : '';
                    echo '<select id="specialization" name="specialization" class="bg-white border border-green-300 text-gray-900 sm:text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5 dark:bg-green-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500" >';
                    echo '<option value="" disabled selected>Select a specialty</option>';
                    echo '<option value="cardiology" '.($specialization == 'cardiology' ? 'selected' : '').'>Cardiology</option>';
                    echo '<option value="dermatology" '.($specialization == 'dermatology' ? 'selected' : '').'>Dermatology</option>';
                    echo '<option value="endocrinology" '.($specialization == 'endocrinology' ? 'selected' : '').'>Endocrinology</option>';
                    echo '<option value="gastroenterology" '.($specialization == 'gastroenterology' ? 'selected' : '').'>Gastroenterology</option>';
                    echo '<option value="dentistry" '.($specialization == 'dentistry' ? 'selected' : '').'>Dentistry</option>';
                    echo '<option value="orthopedics" '.($specialization == 'orthopedics' ? 'selected' : '').'>Orthopedics</option>';
                    echo '<option value="pediatrics" '.($specialization == 'pediatrics' ? 'selected' : '').'>Pediatrics</option>';
                    echo '<option value="neurology" '.($specialization == 'neurology' ? 'selected' : '').'>Neurology</option>';
                    echo '<option value="oncology" '.($specialization == 'oncology' ? 'selected' : '').'>Oncology</option>';
                    echo '<option value="ophthalmology" '.($specialization == 'ophthalmology' ? 'selected' : '').'>Ophthalmology</option>';
                    echo '<option value="otolaryngology" '.($specialization == 'otolaryngology' ? 'selected' : '').'>Otolaryngology (ENT)</option>';
                    echo '<option value="psychiatry" '.($specialization == 'psychiatry' ? 'selected' : '').'>Psychiatry</option>';
                    echo '<option value="radiology" '.($specialization == 'radiology' ? 'selected' : '').'>Radiology</option>';
                    echo '<option value="surgery" '.($specialization == 'surgery' ? 'selected' : '').'>Surgery</option>';
                    echo '</select>';
                    ?>
                </div>
                <div id="medical_history_field" style="display: none;">
                    <label for="medical_history" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Medical History:</label>
                    <?php
                    $medicalHistory = isset($formData['medical_history']) ? $formData['medical_history'] : '';
                    echo '<textarea id="medical_history" name="medical_history" class="bg-white border border-green-300 text-gray-900 sm:text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5 h-40 dark:bg-green-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500" placeholder="Enter medical history here">'.$medicalHistory.'</textarea>';
                    ?>
                </div>

                <script>
                    document.getElementById('user_type').addEventListener('change', function() {
                        let userType = this.value;
                        let yearsOfExperienceField = document.getElementById('years_of_experience_field');
                        let specializationField = document.getElementById('specialization');
                        let medicalHistoryField = document.getElementById('medical_history_field');
                        if (userType === 'doctor') {
                            yearsOfExperienceField.style.display = 'block';
                            specializationField.style.display = 'block';
                            medicalHistoryField.style.display = 'none';
                        } else {
                            yearsOfExperienceField.style.display = 'none';
                            specializationField.style.display = 'none';
                            medicalHistoryField.style.display = 'block';
                        }
                    });
                </script>
                <div>
                    <?php
                    $email = isset($formData['email']) ? $formData['email'] : '';
                    echo '<input type="email" id="email" name="email" class="bg-white border border-green-300 text-gray-900 sm:text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5 dark:bg-green-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500" placeholder="name@company.com" value="'.$email.'" required="">';
                    if(isset($_GET['errorMail']) && $_GET['errorMail'] == 'email') {
                        echo '<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oh, snapp!</span> Email already exists.</p>';
                    } 
                    ?>
                </div>
                <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                    <input type="password" name="password" id="password" placeholder="Password" class="bg-white border border-green-300 text-gray-900 sm:text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5 dark:bg-green-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500" required="">
                </div>
                <div>
                    <label for="confirm-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm password</label>
                    <input type="password" name="confirm-password" id="confirm-password" placeholder="Confirm password" class="bg-white border border-green-300 text-gray-900 sm:text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5 dark:bg-green-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500" required="">
                </div>
                <div class="flex items-start">
                    <div class="flex items-center h-5">
                        <input id="terms" aria-describedby="terms" type="checkbox" class="w-4 h-4 border border-white rounded bg-green-50 focus:ring-3 focus:ring-green-300 dark:bg-green-700 dark:border-green-600 dark:focus:ring-green-600 dark:ring-offset-gray-800" required="">
                    </div>
                    <div class="ml-3 text-sm">
                        <label for="terms" class="font-light text-gray-500 dark:text-gray-300">I accept the <a class="font-medium text-green-600 hover:underline dark:text-green-500" href="#">Terms and Conditions</a></label>
                    </div>
                </div>
                <button type="submit" class="w-full text-black bg-green-300 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Create an account</button>
                <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                    Already have an account? <a href="./login.php " class="font-medium text-green-600 hover:underline dark:text-green-500">Login here</a>
                </p>
            </form>
            
          </div>
      </div>
  </div>

  

<div class="fixed right-0 top-0 o bottom-0 left-0 w-full h-full bg-gray-50 <?php echo isset($_GET['verification']) ? '' : 'hidden'; ?>">
    <div id="authentication-modal" tabindex="-1" class="overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full flex" aria-modal="true" role="dialog">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Verify your identity :
                    </h3>
                    <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="authentication-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5">
                    <form class="space-y-4" action="../controller/handle_sign-up.php" method="post">
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Verification Code : 6 digits code</label>
                            <input type="number" name="code" id="code" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="xxxxxx" required="">
                        </div>
                        <button type="submit" name="submitVerify" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Verify</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


    <script src="../../../node_modules/flowbite/dist/flowbite.min.js"></script>
    <script src="../media/js/darkmode.js"> </script>
    <script>
    </script>
</body>
</html>