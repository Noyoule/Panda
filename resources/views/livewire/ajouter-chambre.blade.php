<form wire:submit.prevent='store'>
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
        <label for="entrer1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            N° de la chambre</label>
        <input type="text" id="entrer1" wire:model='numero'
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="506">
    </div>
    @error('numero')
        <div class="bg-red-100 p-3 mb-3"><span class="error text-red-500">{{ $message }}</span></div>
    @enderror

    <div class="mb-6">
        <label for="select-chambre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            Type</label>
        <select id="select-chambre" wire:model='imputType'
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option value="0" selected>Sélectionner le type</option>
            @foreach ($types as $type)
                <option value="{{ $type->id }}">{{ $type->nom }}</option>
            @endforeach
        </select>
    </div>
    @error('imputType')
        <div class="bg-red-100 p-3 mb-3"><span class="error text-red-500">{{ $message }}</span></div>
    @enderror

    <button type="submit"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Valider</button>
</form>
