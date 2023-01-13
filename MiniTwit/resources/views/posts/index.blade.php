<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="overflow-hidden rounded-lg border border-gray-200 shadow-md mx-10 mt-10 bg-white">

        <div class="max-w-7xl mx-auto md:px-6 lg:px-8 mt-10">
            <?php foreach ($posts as $post) : ?>
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mb-6">
                    <div class="w-full rounded overflow-hidden shadow-lg">
                        <div class="px-6 py-4 ">
                            <div class="font-bold text-xl">Posted by {{$post->user->name}}</div>
                            <div class="mb-2"><small>{{$post->created_at->format('Y-m-d')}}</small></div>
                            <p class="text-gray-700 text-base">
                                {{$post->text}}
                            </p>
                            <div>
                            <form method="POST" action="/posts/like">
                                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Default</button>
                            </form>
                            </div>
                        </div>
                        <div class="container py-2 px-6 mx-0 min-w-full flex flex-col">
                            <form action="" method="GET">
                                @csrf
                                <button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Comments</button>
                            </form>
                        </div>
                        @if($post->user->name === Auth::user()->name)
                        <div class="container py-2 px-6 mx-0 min-w-full flex flex-col">
                            <form action="{{ route('posts.destroy', $post) }}" method="POST">
                                @method('delete')
                                @csrf
                                <button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Delete</button>
                            </form>
                        </div>
                        @endif
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="container py-10 px-10 mx-0 min-w-full flex flex-col items-center">
            <form action="{{ route('posts.create') }}" method="GET">
                <button type="submit" class="text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Create a new post</button>
            </form>
        </div>
    </div>
</x-app-layout>