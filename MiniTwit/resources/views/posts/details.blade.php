<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="overflow-hidden rounded-lg border border-gray-200 shadow-md mx-10 mt-10 bg-white">

        <div class="max-w-7xl mx-auto md:px-6 lg:px-8 mt-10">

        </div>
        <div class="container py-10 px-10 mx-0 min-w-full flex flex-col items-center">
            <form action="{{ route('posts.comments.create') }}" method="GET">
                <button type="submit" class="text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Comment</button>
            </form>
        </div>
    </div>
</x-app-layout>