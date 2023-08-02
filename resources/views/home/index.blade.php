@extends('layouts.app-master')

@section('content')
    <div
        class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 h-1/2">
        @auth
            <div class="flex flex-col justify-between p-4 leading-normal">
                <h1 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"">Dashboard</h1>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Only authenticated users can access this section.
                </p>
            </div>
        @endauth

        @guest
            <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg"
                src="/images/inventorymanagement_hero3x.png" alt="">
            <div class="flex flex-col justify-between p-4 leading-normal">
                <h1 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Homepage</h1>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Your viewing the home page. Please login to view the
                    restricted data.</p>
            </div>
        @endguest
    </div>
@endsection
