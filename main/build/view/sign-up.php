<!DOCTYPE html>
<html>
<head>
    <title>sign up</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />

</head>
<body class="bg-gray-50 dark:bg-gray-900">
    <button id="theme-toggle" type="button" class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5">
                <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
            </button>
  <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
      <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
          <img class="w-8 h-8 mr-2" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/logo.svg" alt="logo">
          MediEase    
      </a>
      <div class="w-1/2 bg-whiterounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
          <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
              <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                  Create an account
              </h1>
              <form class="space-y-4 md:space-y-6" action="../controller/handle_sign-up.php" method="post" onsubmit="return validateForm()">
                <div>    
                    <label for="full_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Full Name:</label>
                    <input type="text" id="full_name" name="full_name" class="bg-white border border-green-300 text-gray-900 sm:text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5 dark:bg-green-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500" placeholder="Ismail Moufatih" required="" />
                </div>
                    <div>
                    <label for="date_of_birth" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date of Birth:</label>
                    <input type="date" id="date_of_birth" name="date_of_birth"class="bg-white border border-green-300 text-gray-900 sm:text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5 dark:bg-green-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500" required="" /></select>
                </div>
                <div>
                    <label for="gender" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gender:</label>
                      <select id="gender" name="gender" class="bg-white border border-green-300 text-gray-900 sm:text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5 dark:bg-green-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500" required="">
                          <option value="male">Male</option>
                          <option value="female">Female</option>
                      </select>
                    </div>
                    <div>
                    <label for="phone_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone Number:</label>
                    <input type="number" id="phone_number" name="phone_number"class="bg-white border border-green-300 text-gray-900 sm:text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5 dark:bg-green-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500" placeholder ="06xxxxxxxx" required="" />
                </div>
                <div>
                    <label for="user_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">I am a:</label>
                    <select id="user_type" name="user_type" class="bg-white border border-green-300 text-gray-900 sm:text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5 dark:bg-green-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500" required="">
                        <option value="none" selected > </option>
                        <option value="patient">Patient</option>
                      <option value="doctor">Doctor</option></select>
                </div>
                <div id="years_of_experience_field" style="display: none;">
                    <label for="years_of_experience" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Years of Experience:</label>
                    <input type="number" id="years_of_experience" name="years_of_experience" class="bg-white border border-green-300 text-gray-900 sm:text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5 dark:bg-green-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500" placeholder="Years of Experience" >
                </div>
                <div id="specialization" style="display: none;">
                    <label for="specialization" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Specialization:</label>
                    <select id="specialization" name="specialization" class="bg-white border border-green-300 text-gray-900 sm:text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5 dark:bg-green-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500" >
                        <option value="" disabled selected>Select a specialty</option>
                        <option value="cardiology">Cardiology</option>
                        <option value="dermatology">Dermatology</option>
                        <option value="endocrinology">Endocrinology</option>
                        <option value="gastroenterology">Gastroenterology</option>
                        <option value="dentistry">Dentistry</option>
                        <option value="orthopedics">Orthopedics</option>
                        <option value="pediatrics">Pediatrics</option>
                        <option value="neurology">Neurology</option>
                        <option value="oncology">Oncology</option>
                        <option value="ophthalmology">Ophthalmology</option>
                        <option value="otolaryngology">Otolaryngology (ENT)</option>
                        <option value="psychiatry">Psychiatry</option>
                        <option value="radiology">Radiology</option>
                        <option value="surgery">Surgery</option>
                    </select>
                </div>
                <div id="medical_history_field" style="display: none;">
                    <label for="medical_history" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Medical History:</label>
                    <textarea id="medical_history" name="medical_history" class="bg-white border border-green-300 text-gray-900 sm:text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5 h-40 dark:bg-green-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500" placeholder="Enter medical history here" ></textarea>
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
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                    <input type="email" name="email" id="email" class="bg-white border border-green-300 text-gray-900 sm:text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5 dark:bg-green-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500" placeholder="name@company.com" required="">
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
      <script src="../../../node_modules/flowbite/dist/flowbite.min.js"></script>
      <script src="../media/js/darkmode.js"> </script>

    <script>
    function validateForm() {
        let password = document.getElementById("password").value;
        let confirmPassword = document.getElementById("confirm-password").value;
        if (password != confirmPassword) {
            alert("Passwords do not match");
            return false;
        }
        return true;}
    </script>
</body>
</html>