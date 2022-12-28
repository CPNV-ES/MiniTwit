<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    <a href="#" class="flex flex-col items-center bg-white border rounded-lg shadow-md md:flex-row md:min-w-xl w-max hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
        <div class="flex flex-col justify-between p-4 leading-normal">
            <h2> Posted by {{ $slot }}</h2>
            <p class="mb-3 font-normal text-gray-800 dark:text-gray-600">{{ $slot }}</p>
        </div>
    </a>
</div>