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
                    @foreach ($shops as $shop)
                        <div class="w-1/4">
                            <a class="border " href="{{ route('owner.shops.edit', ['shop' => $shop->id]) }}">
                                <div class="border rounded-md p-4">
                                    <div class="flex">
                                        @if ($shop->is_selling)
                                            <span class="border p-2 rounded-md  bg-blue-400 text-black">販売中</span>
                                        @else
                                            <span
                                                class="border p-2 rounded-md  bg-red-400 text-black font-bold: 600">停止中</span>
                                        @endif
                                        <div class="mt-2 ml-4">
                                            {{ $shop->name }}
                                        </div>
                                    </div>
                                    <x-thumbnail />
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
