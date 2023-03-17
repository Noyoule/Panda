<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans+Narrow&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <script src="{{ asset('js/alpine.min.js') }}"></script>
</head>

{{-- style="height: 100vh;background-image: url('{{asset('img/sara-dubler-Koei_7yYtIo-unsplash.jpg')}}');background-size:cover; background-position:center;" --}}

<body style="width: 100%; max-height: 100vh; overflow: hidden">
    <div class="absolute top-0 bottom-0 left-0 right-0">
        <img src="{{ asset('img/sara-dubler-Koei_7yYtIo-unsplash.jpg') }}" alt="" height="1000px" width="100%"
            style="object-fit: cover;min-height: 100%;">
    </div>
    <section class="relative m-0 p-0" style="background-color: rgba(0,0,0, 0.367); height: 100vh; overflow: scroll">
        -- <div>
            <nav class="absolute top-0 flex justify-between gap-1 px-4 relative" style="z-index: 300;">
                <div class="logo text-3xl text-bold text-white">Panda</div>
                <div>
                    <ul class="justify-between gap-5 text-2xl hidden md:flex text-white">
                        <li class="hover:text-my_yellow"><a href="{{ route('dashboard') }}">Tableau de bord</a></li>
                        <li class="hover:text-my_yellow"><a href="{{ route('login') }}">Connexion</a></li>
                        <li class="hover:text-my_yellow"><a href="{{ route('register') }}">S'inscrire</a></li>
                    </ul>
                </div>
                <div class="p-1 nav-mobile fixed right-0 top-2 flex flex-col  pt-7 lg:hidden" x-data="{ open: false }">
                    <p class="absolute right-0 top-0" @click=" open=!open">
                        <template x-if="!open">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-white">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>
                        </template>
                        <template x-if="open">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </template>
                    </p>
                    <div x-show="open" x-transition class="p-1 rounded bg-slate-200 relative">
                        <ul class="justify-between gap-3 text-xl flex flex-col">
                            <li><a href="#">Tableau de bord</a></li>
                            <li><a href="#">Connexion</a></li>
                            <li><a href="#">S'inscrire</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="flex flex-col lg:grid lg:grid-cols-2 ">
                <div class="div-pub flex flex-col justify-center items-center">
                    <p class="p-pub pl-3 text-center lg:text-left w-full text-white">Permeter au touristes accéder
                        facilement à votre hotel</p>
                    <p class="text-white text-xl ml-3">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Consectetur et, ex blanditiis necessitatibus, esse, praesentium ab quam molestiae itaque
                        deleniti dicta maiores nam maxime enim earum dolorem. Itaque, ducimus tempore?</p>
                    <button
                        class="p-2 mt-3 bg-white text-2xl rounded hover:bg-slate-700 hover:text-white">Commencer</button>
                </div>
                <div class="div-pub flex flex-col justify-center items-center m-1 mt-10 lg:mt-1 ">
                    <div class="w-full p-1" style="background-color: rgba(0, 0, 0, 0.575)">
                        <p class="text-white text-center">Offrez une expérience unique à nos touristes</p>
                        <div class="p-5 lg:p-10">
                            <img class="left-image" src="{{ asset('img/jolie.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <style>
        .p-pub {
            font-family: 'Anton', sans-serif;
            font-size: 2rem;
            line-break: loose;
        }

        .left-image {
            height: 100%;
            max-height:100%
            width: 100%;
            object-fit: cover;
        }

        @media(min-width:1024px) {
            .div-pub {
                height: 80vh;
                padding-right: 20%;
            }
        }
    </style>
    <script>
        var tab = ['{{asset('img/edvin-johansson-rlwE8f8anOc-unsplash.jpg')}}','{{asset('img/hotel-sancta-maria.jpg')}}','{{asset('img/IMG_20230315_161655_466.jpg')}}','{{asset('img/kelsey-curtis--27u_GzlAFw-unsplash.jpg')}}','{{asset('img/mike-swigunski-yERyCOOT8i8-unsplash.jpg')}}','{{asset('img/myriam-grrdz-CmmWGcdj38U-unsplash.jpg')}}','{{asset('img/sara-dubler-Koei_7yYtIo-unsplash.jpg')}}','{{asset('img/sasha-kaunas-xEaAoizNFV8-unsplash.jpg')}}','{{asset('img/vojtech-bruzek-Yrxr3bsPdS0-unsplash.jpg')}}','{{asset('img/vojtech-bruzek-Yrxr3bsPdS0-unsplash.jpg')}}']
        var image = document.querySelector('.left-image');
        var i = 0
        setInterval(() => {
            if(i==9) i =0;
            image.src=tab[i];
            i++
       }, 7000);
    </script>
    @livewireScripts
</body>

</html>
