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
                    <div>
                        <table class="table-auto">
                            <thead>
                              <tr>
                                <th>Comments</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($comments as $comment)
                              <tr>
                                <td>{{$comment->text}}</td>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                            </div>
                            <form action="{{ route('posts.comments.store', $post) }}" type="submit" method="POST">
                                @csrf
                                <div class="md:w-2/3 mx-6">
                                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-yellow-500" name="text" id="inline-full-name" type="text" placeholder="Votre commentaire...">
                                </div>
                                <div class="md:flex md:items-center">
                                    <div class="md:w-1/3"></div>
                                    <div class="md:w-2/3 ml-6 my-3">
                                        <button type="submit" class="text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Save</button>
                                    </div>
                                </div>                           
                            </form>
                          </div>
                    </div>
                    @if($post->user->name === Auth::user()->name)
                    <div class="container py-2 px-6 mx-0 min-w-full flex flex-col">
                        <form action="{{ route('posts.destroy', $post) }}" method="POST">
                            @method('delete')
                            @csrf
                            <button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Delete Post</button>
                        </form>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>