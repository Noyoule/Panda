<div class="bg-white">
    <h1 class="px-8 py-3">Créer votre Hotels avant de continuer</h1>
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
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
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
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Nom de l'hotel</label>
                <input type="text" id="email" name="name" wire:model='name'
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
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Valider</button>
        </form>
    </div>
</div>
