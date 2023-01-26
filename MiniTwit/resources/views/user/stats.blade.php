<x-app-layout>
    <div class="overflow-hidden rounded-lg border border-gray-200 shadow-md mx-10 mt-10 bg-white">
        <div class="max-w-7xl mx-auto md:px-6 lg:px-8 mt-6 mb-6">
            <div class="text-center text-2xl">
                YOUR STATS
            </div>
            <div class="flex flex-col justify-center space-y-6 mt-2">
                <div class="flex flex-col text-center">
                    <div class="text-base text-gray-500">Posts</div>
                    <div class="text-2xl">
                        {{$user->posts->count()}}
                    </div>
                </div>
                <div class="flex flex-row text-center">
                    <div class="flex flex-col w-1/2">
                        <div class="text-base text-gray-500">
                            Likes
                        </div>
                        <div class="text-2xl">
                            {{$likes = $user->posts->map(function($post) {
                            return $post->likes->count();
                        })->sum()}}
                        </div>
                    </div>
                    <div class="flex flex-col w-1/2">
                        <div class="text-base text-gray-500">
                            Comments
                        </div>
                        <div class="text-2xl">
                            {{$comments = $user->posts->map(function($post) {
                            return $post->comments->count();
                        })->sum()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>