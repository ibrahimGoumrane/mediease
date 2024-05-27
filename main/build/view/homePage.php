<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../media/css/build.css">

</head>
<body>
<header class="flex justify-center items-start h-32 w-full gap-1 mx-auto px-5 flex-col bg-light-white mb-14">
    <div class="w-full flex justify-between items-center my-4 mb-1 font-serif text-base gap-44 px-10">
        <div class="w-2/4 flex justify-between items-center h-full font-serif text-base gap-20">
            <div class="flex items-center justify-center text-xl text-nowrap">
                <p>
                    <i class="bx bx-plus-medical"></i>
                    <span> MEDIEASE</span>
                </p>
            </div>
            <ul class="font-light flex items-center w-3/4 text-slate-400 gap-8 font-serif list-none">
                <li class="h-10 hover:bg-transparent hover:duration-300"><a class="p-2 block relative hover:border-b hover:border-b-slate-400 hover:-translate-y-0.5 duration-300" href="#Products">Products</a></li>
                <li class="h-10 hover:bg-transparent hover:duration-300"><a class="p-2 block relative hover:border-b hover:border-b-slate-400 hover:-translate-y-0.5 duration-300" href="#industries">industries</a></li>
                <li class="h-10 hover:bg-transparent hover:duration-300"><a class="p-2 block relative hover:border-b hover:border-b-slate-400 hover:-translate-y-0.5 duration-300" href="#Templates">Templates</a></li>
                <li class="h-10 hover:bg-transparent hover:duration-300"><a class="p-2 block relative hover:border-b hover:border-b-slate-400 hover:-translate-y-0.5 duration-300" href="#Pricing">Pricing</a></li>
                <li class="h-10 hover:bg-transparent hover:duration-300"><a class="p-2 block relative hover:border-b hover:border-b-slate-400 hover:-translate-y-0.5 duration-300" href="#Resources">Resources</a></li>
            </ul>
        </div>
        <div class="flex justify-center items-center h-full font-serif text-base w-1/6 gap-4">
            <button class="hover:bg-light-green hover:rounded-full hover:text-white text-nowrap text-xl duration-300 text-light-black px-7 py-5 w-fit rounded-3xl h-6 flex justify-center items-center">Log in</button>
            <button class="buttonMain">Sign in</button>
        </div>
    </div>
    <hr class="w-5/6 mx-auto bg-light-light-black opacity-75">
    <div class="flex items-center justify-start text-left text-gray-400 ml-20 w-5/6 mx-auto px-10">
        <ul class="list-none pt-1 flex items-center justify-center gap-x-10 text-sm font-normal font-serif w-fit">
            <li class="hover:bg-transparent hover:duration-300 h-10 w-20 flex items-center justify-center"><a class="hover:duration-300 p-2 hover:border-b hover:border-b-slate-400 hover:-translate-y-0.5 text-nowrap" href="#">Small Buinesses</a></li>
            <li class="hover:bg-transparent hover:duration-300 h-10 w-20 flex items-center justify-center"><a class="hover:duration-300 p-2 hover:border-b hover:border-b-slate-400 hover:-translate-y-0.5 text-nowrap" href="#">Agencies</a></li>
            <li class="hover:bg-transparent hover:duration-300 h-10 w-20 flex items-center justify-center"><a class="hover:duration-300 p-2 hover:border-b hover:border-b-slate-400 hover:-translate-y-0.5 text-nowrap" href="#">Free Lancers</a></li>
        </ul>
    </div>
</header>

    <main class=" section-min-height gridMain w-5/6  mx-auto mt-20 px-10 place-content-start ">
        <h1 class=" text-5xl font-extrabold tracking-wider  text-left ">Run your entire <br> business in  <br> one place</h1>
        <p class=" font-serif text-wrap text-left text-xl font-light  ">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Animi, facilis perferendis accusamus illo veritatis sint exercitationem inventore error quisquam voluptates sit non magnam repudiandae neque. Nemo recusandae facilis saepe est.
        </p>
        <form action="#" method="get">
            <div class="flex items-center content-center   drop-shadow-2xl my-5  ">
                <input type="text" required placeholder="Enter your email" class=" bg-white text-black flex justify-start items-center px-10 py-5 h-4 rounded-3xl  outline-none font-mono">
                <button class="buttonMain relative -translate-x-7 hover:-translate-x-1 font-mono" >Sign in</button>
            </div>
            <p>⭐⭐⭐⭐⭐ based on 1,000 review from Our customers </p>
        </form>
            <img class=" place-self-center  h-3/4" src="../media/img/hello.png" alt="hero" class="w-3/4 mx-auto">
    </main>
    <footer class="relative bg-blueGray-200 pt-8 pb-6">
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap text-left lg:text-left">
                <div class="w-full lg:w-6/12 px-4">
                    <h4 class="text-3xl font-semibold text-blueGray-700">Let's keep in touch!</h4>
                    <h5 class="text-lg mt-0 mb-2 text-blueGray-600">
                        Find us on any of these platforms, we respond 1-2 business days.
                    </h5>
                    <div class="mt-6 lg:mb-0 mb-6">
                        <button class="bg-white text-lightBlue-400 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2" type="button">
                        <i class="bx bxl-twitter" ></i>
                        </button>
                        <button class="bg-white text-lightBlue-600 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2" type="button">
                            <i class="bx bxl-facebook"></i>
                        </button>
                        <button class="bg-white text-lightBlue-600 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2" type="button">
                            <i class="bx bxl-github" ></i>
                        </button>
                    </div>
                </div>
                <div class="w-full lg:w-6/12 px-4">
                    <div class="flex flex-wrap items-top mb-6">
                        <div class="w-full lg:w-4/12 px-4 ml-auto">
                            <span class="block uppercase text-blueGray-500 text-sm font-semibold mb-2">Useful Links</span>
                            <ul class="list-unstyled">
                                <li>
                                    <a class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm" href="https://www.creative-tim.com/presentation?ref=njs-profile">About Us</a>
                                </li>
                                <li>
                                    <a class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm" href="https://blog.creative-tim.com?ref=njs-profile">Blog</a>
                                </li>
                                <li>
                                    <a class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm" href="https://www.github.com/creativetimofficial?ref=njs-profile">Github</a>
                                </li>
                                <li>
                                    <a class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm" href="https://www.creative-tim.com/bootstrap-themes/free?ref=njs-profile">Free Products</a>
                                </li>
                            </ul>
                        </div>
                        <div class="w-full lg:w-4/12 px-4">
                            <span class="block uppercase text-blueGray-500 text-sm font-semibold mb-2">Other Resources</span>
                            <ul class="list-unstyled">
                                <li>
                                    <a class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm" href="https://github.com/creativetimofficial/notus-js/blob/main/LICENSE.md?ref=njs-profile">MIT License</a>
                                </li>
                                <li>
                                    <a class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm" href="https://creative-tim.com/terms?ref=njs-profile">Terms &amp; Conditions</a>
                                </li>
                                <li>
                                    <a class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm" href="https://creative-tim.com/privacy?ref=njs-profile">Privacy Policy</a>
                                </li>
                                <li>
                                    <a class="text-blueGray-600 hover:text-blueGray-800  bg-transparent font-semibold block pb-2 text-sm" href="https://creative-tim.com/contact-us?ref=njs-profile">Contact Us</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <hr class=" border-blueGray-300">
            <div class="flex flex-wrap items-center md:justify-between justify-center">
                <div class="w-full md:w-4/12 px-4 mx-auto text-center">
                    <div class="text-sm text-blueGray-500 font-semibold py-1">
                        Copyright © <span id="get-current-year">2021</span><a href="https://www.creative-tim.com/product/notus-js" class="text-blueGray-500 hover:text-gray-800" target="_blank"> Notus JS by
                        <a href="https://www.creative-tim.com?ref=njs-profile" class="text-blueGray-500 hover:text-blueGray-800">Creative Tim</a>.
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script  src="../media/js/index.js"></script>

</body>

</html>