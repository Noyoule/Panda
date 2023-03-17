<div class="bg-white">
    <div class="my-2 absolute top-0 right-0  z-50 w-3/5 p-4" x-data="{ open: false }"
        style="margin-top: 100px;max-width: 500px;">
        <button @click=" open=!open"
            class="absolute right-1 text-black bg-green-100 hover:bg-green-200 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            type="button">Ajouter une nouvelle spécialité<svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none"
                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg></button>
        <!-- Dropdown menu -->

        <div class="p-6 bg-white h-100" x-show="open" x-transition>
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
                @if ($file)
                    <div class=" bg-slate-100 w-25 h-25 rounded p-2">
                        <img src="{{ $file->temporaryUrl() }}" alt="" class="rounded"
                            style="height: 50%;width:50%">
                    </div>
                @endif
                <div class="mb-6">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Importer une image </label>
                    <p>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" onclick="document.querySelector('#file').click()" class="w-8 h-8">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                        </svg>
                    </p>
                    <input type="file" id="file" wire:model='file' accept=".png,.jpg,.jpeg" class="hidden">
                </div>
                @error('file')
                    <div class="bg-red-100 p-3 mb-3"><span class="error text-red-500">{{ $message }}</span></div>
                @enderror
                <div class="mb-6">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Nom de la spécialité</label>
                    <input type="text" id="email" wire:model='name'
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                @error('name')
                    <div class="bg-red-100 p-3 mb-3"><span class="error text-red-500">{{ $message }}</span></div>
                @enderror
                <div class="mb-6">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Prix</label>
                    <input type="text" id="email" wire:model='prix'
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Exemple:7000 francs CFA">
                </div>
                @error('prix')
                    <div class="bg-red-100 p-3 mb-3"><span class="error text-red-500">{{ $message }}</span></div>
                @enderror
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Valider</button>
            </form>
        </div>
    </div>
    <div class="relative  overflow-x-auto shadow-md sm:rounded-lg" style="margin-top: 100px">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Image
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nom
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Prix
                    </th>
                    <th scope="Action" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($specialites as $spetialite) 
                <tr
                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <img src="{{ Storage::url($spetialite->image_path) }}"
                        class="rounded-full w-20 h-20" alt="">
                </td>
                <td class="px-6 py-4">
                    {{$spetialite->nom}}
                </td>
                <td class="px-6 py-4">
                    {{$spetialite->prix}}
                </td>
                <td class="px-6 py-4 cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" wire:click="delete({{$spetialite->id}})"
                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                    </svg>
                </td>
            </tr>
              @empty
              <div>Aucune spécialité</div>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
