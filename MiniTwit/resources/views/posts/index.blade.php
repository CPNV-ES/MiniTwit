<x-app-layout>
    <div class="overflow-hidden rounded-lg border border-gray-200 shadow-md mx-10 mt-10 bg-white">
        <div class="max-w-7xl mx-auto md:px-6 lg:px-8 mt-10">
            @foreach ($posts as $post)
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mb-6">
                <div class="w-full rounded overflow-hidden shadow-lg">
                    <div class="px-6 py-4 ">
                        <div class="font-bold text-xl">Posted by {{ $post->user->name }}</div>
                        <div class="mb-2"><small>{{ $post->created_at->format('Y-m-d') }}</small></div>
                        <p class="text-gray-700 text-base">
                            {{ $post->text }}
                        </p>
                    </div>
                    <div class="py-2 ml-6">
                        <div class="container py-2 mx-0 min-w-full flex flex-col">
                            @livewire('likes-counter', ['post' => $post],
                            key($post->id))
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <a href="{{ route('posts.create') }}">
            <button
                class="fixed z-90 bottom-10 right-2 bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 w-16 h-16 rounded-full drop-shadow-lg flex justify-center items-center text-white text-medium"><svg
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
            </button>
        </a>
    </div>
</x-app-layout>