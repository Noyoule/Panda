@extends('layouts.my-dashboard-layout')

@section('content-top')
<header class="fixed right-0 top-0 left-60 bg-yellow-50 py-3 px-4 h-16">
    <div class="max-w-4xl mx-auto">
        <div class="flex items-center justify-between">
            <div>
               {{--  <button type="button"
                    class="flex items-center focus:outline-none rounded-lg text-gray-600 hover:text-yellow-600 focus:text-yellow-600 font-semibold p-2 border border-transparent hover:border-yellow-300 focus:border-yellow-300 transition">
                    <span
                        class="inline-flex items-center justify-center w-6 h-6 text-gray-600 text-xs rounded bg-white transition mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                            class="bi bi-chevron-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z" />
                        </svg>
                    </span>
                    <span class="text-sm">Archive</span>
                </button> --}}
            </div>
            <div class="text-lg font-bold">Admistration</div>
            <div>
                <button type="button"
                    class="flex items-center focus:outline-none rounded-lg text-gray-600 hover:text-yellow-600 focus:text-yellow-600 font-semibold p-2 border border-transparent hover:border-yellow-300 focus:border-yellow-300 transition">
                    <span class="text-sm">Gérer les chambre</span>
                    <span
                        class="inline-flex items-center justify-center w-6 h-6 text-gray-600 text-xs rounded bg-white transition ml-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                            class="bi bi-chevron-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
                        </svg>
                    </span>
                </button>
            </div>
        </div>
    </div>
</header>
@endsection

@section('content-bottom')
@if ($hotel==null)
<livewire:creer-hotel>
@else
<div class="bg-white rounded-3xl p-8 mb-5">
    <h1 class="text-3xl font-bold mb-10">Tous les paramètre présent de votre hotel s'affichent ici</h1>
    <div class="flex items-center justify-between">
        <div class="flex items-stretch">
            <div class="text-gray-400 text-xs">Administrateur<br></div>
            <div class="h-100 border-l mx-4"></div>
            <div class="flex flex-nowrap -space-x-3">
                <div class="h-9 w-9">
                    <img class="object-cover w-full h-full rounded-full"
                        src="https://ui-avatars.com/api/?background=random">
                </div>
            </div>
        </div>
        <div class="flex items-center gap-x-2">
            <button type="button"
                class="inline-flex items-center justify-center h-9 px-3 rounded-xl border hover:border-gray-400 text-gray-800 hover:text-gray-900 transition">
                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                    fill="currentColor" class="bi bi-chat-fill" viewBox="0 0 16 16">
                    <path
                        d="M8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6-.097 1.016-.417 2.13-.771 2.966-.079.186.074.394.273.362 2.256-.37 3.597-.938 4.18-1.234A9.06 9.06 0 0 0 8 15z" />
                </svg>
            </button>
            <button type="button"
                class="inline-flex items-center justify-center h-9 px-5 rounded-xl bg-gray-900 text-gray-300 hover:text-white text-sm font-semibold transition">
                Open
            </button>
        </div>
    </div>

    <hr class="my-10">

    <div class="grid grid-cols-2 gap-x-20">
        <div>
            <h2 class="text-2xl font-bold mb-4">État de votre hotel</h2>

            <div class="grid grid-cols-2 gap-4">
                <div class="col-span-2">
                    <div class="p-4 bg-green-100 rounded-xl">
                        <div class="font-bold text-xl text-gray-800 leading-none">50/150 chambres disponibles
                        </div>
                        <div class="mt-5">
                            <button type="button"
                                class="inline-flex items-center justify-center py-2 px-3 rounded-xl bg-white text-gray-800 hover:text-green-500 text-sm font-semibold transition">
                                Mettre à jour
                            </button>
                        </div>
                    </div>
                </div>
                <div class="p-4 bg-yellow-100 rounded-xl text-gray-800">
                    <div class="font-bold text-2xl leading-none">20</div>
                    <div class="mt-2">Tasks finished</div>
                </div>
                <div class="p-4 bg-yellow-100 rounded-xl text-gray-800">
                    <div class="font-bold text-2xl leading-none">5,5</div>
                    <div class="mt-2">Tracked hours</div>
                </div>
                <div class="col-span-2">
                    <div class="p-4 bg-purple-100 rounded-xl text-gray-800">
                        <div class="font-bold text-xl leading-none">Vos spécialité</div>
                        <div class="mt-2">Voir tous</div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <h2 class="text-2xl font-bold mb-4">Reservations de cette journée</h2>

            <div class="space-y-4">
                <div class="p-4 bg-white border rounded-xl text-gray-800 space-y-2">
                    <div class="flex justify-between">
                        <div class="text-gray-400 text-xs">Number 10</div>
                        <div class="text-gray-400 text-xs">4h</div>
                    </div>
                    <a href="javascript:void(0)"
                        class="font-bold hover:text-yellow-800 hover:underline">Blog and social
                        posts</a>
                    <div class="text-sm text-gray-600">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                            fill="currentColor" class="text-gray-800 inline align-middle mr-1"
                            viewBox="0 0 16 16">
                            <path
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                        </svg>Plus d'info
                    </div>
                </div>
                <div class="p-4 bg-white border rounded-xl text-gray-800 space-y-2">
                    <div class="flex justify-between">
                        <div class="text-gray-400 text-xs">Number 10</div>
                        <div class="text-gray-400 text-xs">4h</div>
                    </div>
                    <a href="javascript:void(0)"
                        class="font-bold hover:text-yellow-800 hover:underline">Blog and social
                        posts</a>
                    <div class="text-sm text-gray-600">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                            fill="currentColor" class="text-gray-800 inline align-middle mr-1"
                            viewBox="0 0 16 16">
                            <path
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                        </svg>Plus d'info
                    </div>
                </div>
                <div class="p-4 bg-white border rounded-xl text-gray-800 space-y-2">
                    <div class="flex justify-between">
                        <div class="text-gray-400 text-xs">Grace Aroma</div>
                        <div class="text-gray-400 text-xs">7d</div>
                    </div>
                    <a href="javascript:void(0)"
                        class="font-bold hover:text-yellow-800 hover:underline">New campaign review</a>
                    <div class="text-sm text-gray-600">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                            fill="currentColor" class="text-gray-800 inline align-middle mr-1"
                            viewBox="0 0 16 16">
                            <path
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                        </svg>Plus d'info
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
<style>
    .active{
        background-color: #FDE68A;
    }
</style>
@endsection