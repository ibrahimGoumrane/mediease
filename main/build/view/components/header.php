<?php 
function headerComponent(){
    echo '
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
</header>';

}
headerComponent();
?>