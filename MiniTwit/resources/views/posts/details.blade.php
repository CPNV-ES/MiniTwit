<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="overflow-hidden rounded-lg border border-gray-200 shadow-md mx-10 mt-10 bg-white">
        <div class="max-w-7xl mx-auto md:px-6 lg:px-8 mt-10">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mb-6">
                <div class="w-full rounded overflow-hidden shadow-lg">
                    <div class="px-6 py-4 ">
                        <div class="font-bold text-xl">Posted by {{$post->user->name}}</div>
                        <div class="mb-2"><small>{{$post->created_at->format('Y-m-d')}}</small></div>
                        <p class="text-gray-700 text-base">
                            {{$post->text}}
                        </p>
                    </div>
                    <div class="mx-6">
                        <table class="w-full">
                            <thead>
                                <tr>
                                    <th class="text-left text-lg">Comments</th>
                                </tr>
                            </thead>
                            <tbody class="mx-6">
                                @foreach ($comments as $comment)
                                <tr>
                                    <td class="h-15 border-b border-gray-300">
                                        <div class="flex flex-col">
                                            <div class="text-xs">
                                                @if($comment->user){{$comment->user->name}} said:
                                                @endif
                                            </div>
                                            <div class="flex flex-row text-base items-center">
                                                <div>{{$comment->text}}</div>
                                                @if ($comment->user->name === Auth::user()->name)
                                                <form action="{{ route('posts.comments.destroy', [$post, $comment]) }}"
                                                    method="POST" class="ml-auto mr-4">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit"
                                                        class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-2 py-1.5 mr-2 mb-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="w-4 h-4">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                        </svg>
                                                    </button>
                                                </form>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <form action="{{ route('posts.comments.store', $post) }}" type="submit" method="POST"
                        class="flex my-3">
                        @csrf
                        <div class="ml-6 mt-3 flex-auto">
                            <input
                                class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-yellow-500"
                                name="text" id="inline-full-name" type="text" placeholder="Votre commentaire...">
                        </div>
                        <div class="ml-3 mr-4 mt-3 flex-none">
                            <button type="submit"
                                class="text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>