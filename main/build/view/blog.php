<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="../media/js/headerJs.js" defer></script>
</head>
<body>
    <?php include_once './components/header.php' ;?>
<section class="bg-white dark:bg-gray-900 bg-gradient-to-t from-green-50 via-green-100 to-green-50">
  <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6 rounded-2xl">
      <div class="mx-auto max-w-screen-sm text-center lg:mb-16 mb-8">
          <h2 class="mb-4 text-3xl lg:text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Our Blog</h2>
          <p class="font-light text-gray-500 sm:text-xl dark:text-gray-400">Welcome to the Medease Blog, your go-to source for the latest insights, tips, and updates in the world of healthcare reservations and medical services. Our blog is dedicated to keeping you informed and engaged with valuable content tailored to both healthcare providers and patients.</p>
      </div> 
      <hr class=" mt-10 mb-10 w-3/4 bg-black m-auto ">
      <div class=" m-auto grid gap-8 lg:grid-row-2 ">
          <article class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
              <div class="flex justify-between items-center mb-5 text-gray-500">
                  <span class="bg-primary-100 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                      <svg class="mr-1 w-3 h-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z" clip-rule="evenodd"></path><path d="M15 7h1a2 2 0 012 2v5.5a1.5 1.5 0 01-3 0V7z"></path></svg>
                      Article
                  </span>
                  <span class="text-sm">14 days ago</span>
              </div>
              <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white text-center"><a href="#">Healthcare Trends</a></h2>
              <p class="text-center mb-5 font-light text-gray-500 dark:text-gray-400">Stay updated on the latest trends in the medical field, from advancements in telemedicine to new healthcare policies affecting patient care.</p>
              <div class="flex justify-between items-center ">
                  <div class="flex items-center space-x-4 gap-5 justify-between">
                      <img class="w-7 h-7 rounded-full" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png" alt="Jese Leos avatar" />
                      <span class="font-medium dark:text-white">
                            Serge Kass
                      </span>
                  </div>
              </div>
          </article> 
          <article class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
              <div class="flex justify-between items-center mb-5 text-gray-500">
                  <span class="bg-primary-100 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                      <svg class="mr-1 w-3 h-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z" clip-rule="evenodd"></path><path d="M15 7h1a2 2 0 012 2v5.5a1.5 1.5 0 01-3 0V7z"></path></svg>
                      Article
                  </span>
                  <span class="text-sm">14 days ago</span>
              </div>
              <h2 class="text-center mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><a href="#">Reservation Tips</a></h2>
              <p class="mb-5 font-light text-gray-500 dark:text-gray-400 text-center"> Learn the best practices for making and managing reservations with healthcare professionals, ensuring a smooth and efficient experience.</p>
              <div class="flex justify-between items-center">
                  <div class="flex items-center justify-between space-x-4 gap-5">
                      <img class="w-7 h-7 rounded-full" src="../media/img/ismail.jpg" alt="Bonnie Green avatar" />
                      <span class="font-medium dark:text-white">
                            ismail moufatih
                      </span>
                  </div>

              </div>
          </article>                  
      </div>  
  </div>
</section>
<?php include_once './components/footer.php' ;?>
</body>
</html>