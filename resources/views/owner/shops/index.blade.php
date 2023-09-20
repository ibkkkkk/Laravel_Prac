<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            店舗情報
        </h2>
    </x-slot>

    <div class="px-8 py-8">
        <div class="px-6">
            @if (session('message'))
            <div class="bg-blue-300 w-1/2 mx-auto p-2 my-4 text-center">
                {{ session('message') }}
            </div>
            @endif
            @foreach ($shops as $shop)
            <div class="w-1/2">
                <a href="{{ route('owner.shops.edit', ['shop' => $shop->id])}}">
                    <div class="border rounded-md">
                        <div class="flex">
                            @if ($shop->is_selling)
                            <span class="border p-2 rounded-md bg-blue-400">販売中</span>
                            @else
                            <span class="border p-2 rounded-md bg-red-400 text-gray">停止中</span>
                            @endif
                            <div class="mt-2 ml-4 font-bold">
                                {{ $shop->name }}
                            </div>
                        </div>
                        <x-thumbnail :filename="$shop->filename" type="shops" />

                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
    </div>
    </div>
</x-app-layout>
