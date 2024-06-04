<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../media/css/build.css">

</head>
<body class="bg-gradient-to-t from-green-300 via-green-100 to-green-50">
<?php include 'components/header.php'; ?>
    <main class=" section-min-height gridMain w-5/6  mx-auto mt-20 px-10 place-content-start ">
        <h1 class=" text-5xl font-extrabold tracking-wider  text-left ">Welcome to Medease</h1>
        <p class=" font-serif text-wrap text-left text-xl font-light  ">At Medease, we are dedicated to transforming the healthcare experience.
             Our innovative platform connects you with top healthcare professionals and provides the tools you need to manage your health effectively. 
             Whether you need a quick consultation, a detailed medical record, or a reliable source for medical supplies, we have you covered.
        </p>
        <form action="./login.php" method="get" class="flex items-center justify-center flex-col">
            <div class="flex items-center justify-center   drop-shadow-2xl my-5  ">
                <button class="buttonMain relative  hover:-translate-x-4 font-mono" >Get Started Today</button>
            </div>
            <p>⭐⭐⭐⭐⭐ based on 1,000 review from Our customers </p>
        </form>
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
                    <h3 class="mt-6  text-black/70">Customizable</h3>
                    <p class="my-4 mb-0 font-normal leading-relaxed tracking-wide  text-black/70">Tailor your landing page's
                        look
                        and feel, from the color scheme to the font size, to the design of the page.
                    </p>
                </div>
        
        
                <div class="rounded-md border border-neutral-800 bg-white/50 p-8 text-center shadow">
                    <h3 class="mt-6  text-black/70">Fast Performance</h3>
                    <p class="my-4 mb-0 font-normal leading-relaxed tracking-wide  text-black/70">We build our templates for
                        speed in mind, for super-fast load times so your customers never waver.
                    </p>
                </div>
        
        
                <div class="rounded-md border border-neutral-800 bg-white/50 p-8 text-center shadow">

                    <h3 class="mt-6  text-black/70">Fully Featured</h3>
                    <p class="my-4 mb-0 font-normal leading-relaxed tracking-wide  text-black/70">
                        Everything you need to
                        succeed
                        and launch your landing page, right out of the box. No need to install anything else.
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