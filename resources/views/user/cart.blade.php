<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            カート
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (count($products) > 0)
                        @foreach ($products as $product)
                            <div class="md:flex md:items-center mb-2">
                                <div class="md:w-3/12"><img src="{{ asset('images/sample4.jpg') }}"></div>
                                <div class="md:w-4/12 md:ml-2">{{ $product->name }}</div>
                                <div class="md:w-3/12 flex justify-around">
                                    <div>{{ $product->pivot->quantity }}</div>
                                    <div>{{ number_format($product->pivot->quantity * $product->price) }}<span
                                            class="text-sm text-gray-700">円(税込)</span></div>
                                </div>
                                <div class="md:w-2/12">削除ボタン</div>
                            </div>
                        @endforeach
                    @else
                        カートに商品が入っていません。
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>