<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('message'))
                <div class="mx-auto p-2 my-4 text-center">
                    {{ session('message') }}
                </div>
            @endif
            <div>
                <button onclick="location.href='{{ route('owner.products.create') }}'"
                    class="bg-green-500 border-0 py-2 px-4 focus:outline-none hover:bg-green-600 rounded text-md mb-4 mt-4">新規登録</button>
                {{-- {{ $products->links() }} --}}
            </div>
            <div class="flex flex-wrap w-full">
                @foreach ($ownerInfo as $owner)
                    @foreach ($owner->shop->product as $product)
                        <div class="w-1/4 h-1/2">
                            <a class="" href="{{ route('owner.products.edit', ['product' => $product->id]) }}">
                                <div class="object-cover">
                                    <x-thumbnail filename="{{ $product->imageFirst->filename ?? '' }}"
                                        type='products' />
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>
    </div>

</x-app-layout>
