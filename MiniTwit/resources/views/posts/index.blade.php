<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <?php foreach ($posts as $post) : ?>
                    <x-jet-welcome>
                        <x-slot name="username">
                            {{ __($post->user_id) }}
                        </x-slot>
                        <x-slot name="content">
                            {{ __($post->text) }}
                        </x-slot>
                    </x-jet-welcome>
                <?php endforeach; ?>
            </div>
            <div class="btn-new" style="margin-top: 50px; text-align: right;">
                <a href="{{route('posts.create')}}" class="btn btn-success btn-lg" role="button" aria-pressed="true">New</a>
            </div>
        </div>
    </div>
</x-app-layout>