<div class="relative  overflow-x-auto shadow-md sm:rounded-lg" style="margin-top: 100px">
    <div class="mb-6 p-6">
        <input type="text" wire:model="query" 
        class="rounded-none rounded-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        placeholder="Recherchez en fonction de tous les champs" style="min-width: 350px">
    </div>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Nom du client 
                </th>
                <th scope="col" class="px-6 py-3">
                    Prénom du client
                </th>
                <th scope="col" class="px-6 py-3">
                    Mail du client
                </th>
                <th scope="col" class="px-6 py-3">
                    Code
                </th>
                <th scope="col" class="px-6 py-3">
                    Numéro de chambre
                </th>
                <th scope="col" class="px-6 py-3">
                    Date
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($reservations as $reservation)
                <tr class="bg-white border-b dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row"
                        class="px-6 py-4 font-medium whitespace-nowrap {{(str_contains(strtolower($reservation->nomCLient),strtolower($query))==1 && $query!='' )? ' text-green-500 ': 'text-gray-900'}} dark:text-white">
                        {{ $reservation->nomCLient}}
                    </th>
                    <td class="px-6 py-4 {{(str_contains(strtolower($reservation->prenomClient), strtolower($query))==1 && $query!='' )? ' text-green-500 ': 'text-gray-900'}} ">
                        {{ $reservation->prenomClient }}
                    </td>
                    <td class="px-6 py-4 {{(str_contains(strtolower($reservation->mailClient), strtolower($query))==1 && $query!='' )? ' text-green-500 ': 'text-gray-900'}}">
                        {{ $reservation->mailClient }}
                    </td>
                    <td class="px-6 py-4 {{(str_contains(strtolower($reservation->code), strtolower($query))==1 && $query!='' )? ' text-green-500 ': 'text-gray-900'}}">
                        {{ $reservation->code }}
                    </td>
                    <td class="px-6 py-4  {{(str_contains(strtolower($reservation->chambre), strtolower($query))==1 && $query!='' )? ' text-green-500 ': 'text-gray-900'}}">
                        {{ $reservation->chambre }}
                    </td>
                    <td class="px-6 py-4  {{(str_contains(strtolower($reservation->updated_at), strtolower($query))==1 && $query!='' )? ' text-green-500 ': 'text-gray-900'}}">
                        {{ $reservation->updated_at }}
                    </td>
                </tr>
            @empty
                <div class="p-3 text-center text-gray-700">Aucune reservation ne correspond à cette recherche</div>
            @endforelse
        </tbody>
    </table>
    <style>
        input{
            outline: none;
        }
    </style>
</div>
