<header>
   <nav class="flex p-1 justify-between gap-1 px-4 my-1 bg-my_green2">
    <div class="logo text-3xl text-bold">Panda</div>
    <div>
        <ul class="justify-between gap-5 text-xl hidden md:flex">
            <li><a href="#">Tableau de bord</a></li>
            <li><a href="#">Connexion</a></li>
            <li><a href="#">S'inscrire</a></li>
        </ul>
    </div>
      <div class="my-1 nav-mobile flex flex-col relative pt-7 lg:hidden" x-data="{open:false}">
            <p class="absolute right-0 top-0" @click=" open=!open">
                <template x-if="!open">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                      </svg>
                </template>
                <template x-if="open">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
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
</header>
