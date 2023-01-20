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
                                    <th class="text-left">Comments</th>
                                </tr>
                            </thead>
                            <tbody class="mx-6">
                                @foreach ($comments as $comment)
                                <tr>
                                    <td class=" border-b border-gray-300">
                                        <div class="flex justify-between">
                                            <div>{{$comment->text}} </div>
                                            <div></div>@if ($comment->user)by : {{$comment->user->name}} @endif
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <form action="{{ route('posts.comments.store', $post) }}" type="submit" method="POST" class="flex my-3">
                        @csrf
                        <div class="ml-6 mt-3 flex-auto">
                            <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-yellow-500" name="text" id="inline-full-name" type="text" placeholder="Votre commentaire...">
                        </div>
                        <div class="ml-3 mr-4 mt-3 flex-none">
                            <button type="submit" class="text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</x-app-layout>