<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../media/css/build.css">
    <script src="../media/js/headerJs.js" defer></script>

</head>
<body class="bg-gradient-to-t from-green-300 via-green-100 to-green-50">
<?php session_start();
include 'components/header.php'; 
?>
    <main class=" section-min-height gridMain w-5/6  mx-auto mt-20 px-10 place-content-start ">
        <h1 class=" text-5xl font-extrabold tracking-wider  text-left ">Welcome to Medease</h1>
        <p class=" font-serif text-wrap text-left text-xl font-light  ">At Medease, we are dedicated to transforming the healthcare experience.
             Our innovative platform connects you with top healthcare professionals and provides the tools you need to manage your health effectively. 
             Whether you need a quick consultation, a detailed medical record, or a reliable source for medical supplies, we have you covered.
        </p>
        <?php if (!isset($_SESSION['is_signed_in'])): ?>
        <form action="./login.php" method="get" class="flex items-center justify-center flex-col">
            <div class="flex items-center justify-center   drop-shadow-2xl my-5  ">
                <button class="buttonMain relative  hover:-translate-x-4 font-mono" >Get Started Today</button>
            </div>
            <p>⭐⭐⭐⭐⭐ based on 1,000 review from Our customers </p>
        </form>
        <?php endif; ?>
            <img class="place-self-center  h-3/4 rounded-2xl" src="../media/img/mainImage.jpg" alt="hero" class="w-3/4 mx-auto">
        </main>
        
        <section id="features"
            class="relative block px-6 py-10 md:py-20 md:px-10  border-t border-b bg-green-300">
        
        
            <div class="relative mx-auto max-w-5xl text-center">
                <span class=" text-black/70 my-3 flex items-center justify-center font-medium uppercase tracking-wider">
                Why choose us
                </span>
                <h2
                    class="block w-full text-black  font-bold text-3xl sm:text-4xl">
                    Build a Website That Your Customers Love
                </h2>
                <p
                    class="mx-auto my-4 w-full max-w-xl bg-transparent text-center font-medium leading-relaxed tracking-wide text-black">
                    Our templates allow for maximum customization. No technical skills required – our intuitive design tools
                    let
                    you get the job done easily.
                </p>
            </div>
        
        
            <div class="relative mx-auto max-w-7xl z-10 grid grid-cols-1 gap-10 pt-14 sm:grid-cols-2 lg:grid-cols-3">
                <div class="rounded-md border border-neutral-800 bg-white/50 p-8 text-center shadow">
                    <h3 class="mt-6  text-black/70">1. Convenience and Accessibility</h3>
                    <p class="my-4 mb-0 font-normal leading-relaxed tracking-wide  text-black/70">
                    Medease offers an easy-to-use platform that allows patients to book appointments with their preferred doctors from the comfort of their homes. Our user-friendly interface ensures a seamless experience, from finding available slots to receiving instant confirmation of reservations. This convenience saves time and effort, providing quick access to medical services when needed the most.
                    </p>
                </div>
        
        
                <div class="rounded-md border border-neutral-800 bg-white/50 p-8 text-center shadow">
                    <h3 class="mt-6  text-black/70">2. Personalized and Reliable Care</h3>
                    <p class="my-4 mb-0 font-normal leading-relaxed tracking-wide  text-black/70">We build our templates for
                    With Medease, patients can choose doctors based on detailed profiles, availability, and patient reviews. This ensures that you receive care from trusted professionals tailored to your specific needs. Additionally, our system sends timely reminders and updates, ensuring you never miss an appointment, thereby promoting consistent and reliable healthcare management.
                    </p>
                </div>
        
        
                <div class="rounded-md border border-neutral-800 bg-white/50 p-8 text-center shadow">

                    <h3 class="mt-6  text-black/70">3. Secure and Confidential</h3>
                    <p class="my-4 mb-0 font-normal leading-relaxed tracking-wide  text-black/70">
                    We prioritize the security and confidentiality of your personal and medical information. Medease uses advanced encryption and data protection measures to safeguard your data, ensuring that your privacy is maintained at all times. Trust and security are at the core of our services, allowing you to focus on your health without any worries about data breaches or unauthorized access.
                    </p>
                </div>
            </div>   
       </section>
    <?php include 'components/footer.php'; ?>
    <div>
</div>
    </div>
</body>

</html>