<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="overflow-hidden rounded-lg border border-gray-200 shadow-md mx-10 mt-10">

        <div class="max-w-7xl mx-auto md:px-6 lg:px-8">
            <?php foreach ($posts as $post) : ?>
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mb-6">
                    <div class="max-w-sm rounded overflow-hidden shadow-lg">
                        <div class="px-6 py-4 ">
                            <div class="font-bold text-xl">Posted by {{$post->user->name}}</div>
                            <div class="mb-2"><small>{{$post->created_at->format('Y-m-d')}}</small></div>
                            <p class="text-gray-700 text-base">
                                {{$post->text}}
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="container py-10 px-10 mx-0 min-w-full flex flex-col items-center">
            <form action="{{ route('posts.create') }}" method="GET">
                <button class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded-full">
                    New Post
                </button>
            </form>
        </div>
    </div>
</x-app-layout>