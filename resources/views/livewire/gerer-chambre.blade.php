<div class="bg-white">

    <div class="my-2 absolute top-0 left-8  z-50 w-3/5 p-4" x-data="{ open: false }"
        style="margin-top: 100px;max-width: 500px;">
        <button @click=" open=!open"
            class="absolute right-1 text-black bg-green-100 hover:bg-green-200 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            type="button">Ajouter un nouveau type de chambre <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none"
                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg></button>
        <!-- Dropdown menu -->

        <div class="p-6 bg-white h-100" x-show="open" @click.outside="open = false" x-transition>
            <livewire:ajouter-type>
        </div>
    </div>


    <div class="my-2 absolute top-0 right-0  z-50 w-3/5 p-4" x-data="{ open: false }"
        style="margin-top: 100px;max-width: 500px;">
        <button @click=" open=!open"
            class="absolute right-1 text-black bg-green-100 hover:bg-green-200 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            type="button">Ajouter une nouvelle chambre <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none"
                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg></button>
        <!-- Dropdown menu -->

        <div class="p-6 bg-white h-100" x-show="open" @click.outside="open = false" x-transition>
            <livewire:ajouter-chambre>
        </div>
    </div>
    <div class="relative  overflow-x-auto shadow-md sm:rounded-lg" style="margin-top: 100px">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        N° de chambre
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Type
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Statut
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($chambres as $chambre)
                    <tr class="bg-white border-b dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $chambre->numero }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $chambre->hisTYpe()->nom }}
                        </td>
                        <td class="px-6 py-4">

                            <div class="flex  items-center gap-6">
                                <div class="flex items-center">
                                    <input type="radio" @if($chambre->statut=='libre')checked @endif value="" name="{{ 'libre' . $chambre->id }}"  wire:click="ChangerStatut({{ $chambre->id }},'libre')"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label
                                        class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Libre</label>
                                </div>
                                <div class="{{ 'libre' . $chambre->id }}">
                                    <input type="radio" @if($chambre->statut=='occupé')checked @endif  value="" name="{{ 'libre' . $chambre->id }}" wire:click="ChangerStatut({{ $chambre->id }},'occupé')"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label
                                        class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Occupé</label>
                                </div>
                            </div>
                        </td>
                    </tr>
                @empty
                    <div class="p-6 text-center text-gray-700">Aucune chambre ajouté</div>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
