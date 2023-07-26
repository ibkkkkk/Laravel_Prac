<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (session('message'))
                        <div class="bg-blue-300 w-1/2 mx-auto p-2 my-4 text-center">
                            {{ session('message') }}
                        </div>
                    @endif
                    <div class="flex justify-around">
                        <button onclick="location.href='{{ route('owner.images.create') }}'"
                            class="mt-4 bg-green-500 border-0 py-2 px-4 focus:outline-none hover:bg-green-600 rounded text-md mb-4 ">新規登録</button>
                        {{ $images->links() }}
                    </div>
                    @foreach ($images as $image)
                        <div class="w-1/4">
                            <a class="border " href="{{ route('owner.images.edit', ['image' => $image->id]) }}">
                                <div class="mt-2 ml-3">
                                    {{ $shop->title }}
                                </div>
                                <x-thumbnail />
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
