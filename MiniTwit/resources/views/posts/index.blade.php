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
                                            class="focus:outline-none text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Dislike</button>
                                    </form>
                                    @else
                                    <form method="get" action="{{ route('posts.like', ['post' => $post]) }}">
                                        @csrf
                                        <button type="submit"
                                            class="focus:outline-none text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Like</button>
                                    </form>
                                    @endif
                                    <form action="{{ route('posts.show', $post) }}" method="GET">
                                        @csrf
                                        <button type="submit"
                                            class="bg-gray-300 py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none  rounded-lg border border-black-200 hover:bg-gray-200 focus:z-10 focus:ring-4 focus:ring-gray-200">More...</button>
                                    </form>
                                    @if ($post->user->name === Auth::user()->name)
                                    <form action="{{ route('posts.destroy', $post) }}" method="POST">
                                        @method('delete')
                                        @csrf
                                        <button type="submit"
                                            class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Delete</button>
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