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
                            <div class="mb-2">
                                <p class="mb-2">
                                    {{ $post->likeCount }} @if($post->likeCount == 1) Like @else Likes @endif
                                </p>
                                <div class="flex flex-row">
                                    @if($post->liked())
                                    <form method="get" action="{{ route('posts.dislike', ['post' => $post]) }}">
                                        @csrf
                                        <button type="submit"
                                            class="focus:outline-none text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                            </svg>
                                        </button>
                                    </form>
                                    @else
                                    <form method="get" action="{{ route('posts.like', ['post' => $post]) }}">
                                        @csrf
                                        <button type="submit"
                                            class="focus:outline-none text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                            </svg>
                                        </button>
                                    </form>
                                    @endif
                                    <form action="{{ route('posts.show', $post) }}" method="GET">
                                        @csrf
                                        <button type="submit"
                                            class="bg-gray-300 py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none  rounded-lg border border-black-200 hover:bg-gray-200 focus:z-10 focus:ring-4 focus:ring-gray-200">More...</button>
                                    </form>
                                    @if ($post->user->name === Auth::user()->name)
                                    <form action="{{ route('posts.destroy', $post) }}" method="POST"
                                        class="ml-auto mr-4">
                                        @method('delete')
                                        @csrf
                                        <button type="submit"
                                            class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                            </svg>

                                        </button>
                                    </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="container py-4 px-10 mx-0 min-w-full flex flex-col items-center">
            <form action="{{ route('posts.create') }}" method="GET">
                <button type="submit"
                    class="text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Create
                    a new post</button>
            </form>
        </div>
    </div>
</x-app-layout>