<form wire:submit.prevent="store">
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
    <div class="mb-6">
        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            Nom du type</label>
        <input type="text" id="text" wire:model='type'
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Exemple: Chambre double deluxe">
    </div>
    @error('type')
        <div class="bg-red-100 p-3"><span class="error text-red-500">{{ $message }}</span></div>
    @enderror
    <p class="my-2 text-sm"><i>Vous devez ajouter les types pour renseigner la création de chambre</i></p>
    <button type="submit"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Valider</button>
</form>
