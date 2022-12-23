<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <?php foreach ($posts as $post) : ?>
                    <x-jet-welcome>
                        {{ __($post->text) }}
                    </x-jet-welcome>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</x-app-layout>