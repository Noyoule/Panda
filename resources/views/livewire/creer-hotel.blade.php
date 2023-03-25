<div class="bg-white">
    @if (session()->has('message'))
    <div class="alert text-green-500 mb-6 bg-green-300 p-4" style="margin-top: 40px">
        {{ session('message') }}
    </div>
    <script>
        setTimeout(function() {
            document.querySelector('.alert').remove();
        }, 5000); // 5000 millisecondes = 5 secondes
    </script>
@endif
@if (session()->has('erreur'))
<div class="alert2 text-red-500 mb-6 bg-red-300 p-4" style="margin-top: 40px">
    {{ session('erreur') }}
</div>
<script>
    setTimeout(function() {
        document.querySelector('.alert2').remove();
    }, 5000); // 5000 millisecondes = 5 secondes
</script>
@endif
    <h1 class="px-8 py-3">Créer votre Hotels avant de continuer <br><i class="text-sm text-gray-700">Pour ajouter votre hotel vous devez forcément être dans ce dernier pour obtenir ça position exacte</i></h1>
    <div class="w-full bg-white p-6">
        <form wire:submit.prevent='store' method="POST">
            @csrf
            @if ($file)
                <div class="preview bg-gray-300 p-3 flex justify-center w-100 h-100"
                    style="max-height: 500px; max-width: 500px;object-fit: cover">
                    <img src="{{ $file->temporaryUrl() }}" alt="">
                </div>
            @endif
            <div class="mb-6">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Importer une image</label>
                <input type="file" class="hidden" accept=".png,.jpg,.jpeg" id="file" wire:model='file'>
                <p class="mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" onclick="document.querySelector('#file').click()"
                        class="w-8 h-8 cursor-pointer">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                    </svg>
                </p>
                @error('file')
                    <div class="bg-red-100 p-3 mb-3"><span class="error text-red-500">{{ $message }}</span></div>
                @enderror
            </div>
            <div class="mb-6">
                <label for="entrer1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Nom de l'hotel</label>
                <input type="text" id="entrer1" name="name" wire:model='name'
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Cartier">
            </div>
            @error('name')
                <div class="bg-red-100 p-3 mb-3"><span class="error text-red-500">{{ $message }}</span></div>
            @enderror
            <div class="mb-6">
                <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Type</label>
                <select id="countries" name="type" wire:model='type'
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Sélectionner le type</option>
                    <option value="1">1 étoile</option>
                    <option value="2">2 étoiles</option>
                    <option value="3">3 étoiles</option>
                    <option value="4">4 étoiles</option>
                    <option value="5">5 étoiles</option>
                    <option value="6">6 étoiles</option>
                </select>
            </div>
            @error('type')
                <div class="bg-red-100 p-3 mb-3"><span class="error text-red-500">{{ $message }}</span></div>
            @enderror
            <div>
                <input type="text" id="longitude_id">
                <input type="text" id="latitude_id" >
            </div>
            <div>
                <i class="text-sm text-gray-700">Pour ajouter votre hotel vous devez forcément être dans ce dernier pour obtenir ça position exacte</i>
                <p class="mt-3 text-gray-800"><i>Cliquez sur le bouton ci dessous pour renseigner la position de votre hotel</i></p>
                <p id="getLocation2" class="border border-gray-200 rounded text-red-600 p-1 m-1 bg-gray-100 cursor-pointer" style="width: 35px">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                      </svg>                      
                    </p>
            </div>
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Valider</button>
        </form>
    </div>
    <script>
        if(document.querySelector('#getLocation2') != null){
        document.querySelector('#getLocation2').addEventListener('click',()=>{
            if (navigator.geolocation) {
                console.debug('geolocalisation en cours...'); 
                navigator.geolocation.getCurrentPosition(getPosition, getError); 
             } 
             else         document.getElementById("error").innerHTML="La géolocalisation n'est pas disponible avec votre navigateur.";         })
    }
    
    function getPosition(position) 
    { 
      var Postion_donne = [position.coords.latitude,position.coords.longitude]
       Livewire.emit('LocationAdded',Postion_donne);
    } 
    
    function getError(error) 
    {
       switch(error.code) { 
       case error.PERMISSION_DENIED: 
          document.getElementById("error").innerHTML="Vous devez autoriser la localisation pour continuer"
          break;
       default: 
          document.getElementById("error").innerHTML="Votre géolocalisation est impossible...";
       } 
    }; 
    </script>
    @if (session()->has('message'))
    <script>
        document.querySelector('#getLocation2').style.color ='#059669'
    </script>
    @endif
</div>
