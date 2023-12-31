<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            店舗情報
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <x-error :errors='$errors' />
                    <form method="post" enctype="multipart/form-data"
                        action="{{ route('owner.shops.update', ['shop' => $shop->id]) }}">
                        @csrf
                        <div class="-m-2">
                            <div class="p-2 w-1/2 mx-auto">
                                <div class="relative">
                                    <label for="shop" class="leading-7 text-sm text-gray-600">店舗名</label>
                                    <input type="text" id="shop" name="name" placeholder="{{$shop->name}}" required
                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-green-500 focus:bg-white focus:ring-2 focus:ring-green-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                            </div>
                            <div class="p-2 w-1/2 mx-auto">
                                <div class="relative">
                                    <label for="information" class="leading-7 text-sm text-gray-600">店舗情報</label>
                                    <textarea id="information" name="information" required rows="8"
                                        placeholder="店舗情報の変更"
                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-green-500 focus:bg-white focus:ring-2 focus:ring-green-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $shop->information }}
                                    </textarea>
                                </div>
                            </div>
                            <div class="w-1/4 mx-auto">
                                <x-thumbnail :filename="$shop->filename" type="shops" />
                            </div>
                            <div class="p-2 w-1/2 mx-auto">
                                <div class="relative">
                                    <label for="image" class="leading-7 text-sm text-gray-600">image</label>
                                    <input type="file" id="image" name="image"
                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-green-500 focus:bg-white focus:ring-2 focus:ring-green-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    <div class="py-2 flex justify-around">
                                        <div class="mr-2"><input required type="radio" name="is_selling" value="1"
                                                class="mr-2" @if ($shop->is_selling === 1) { checked }
                                            @endif><span class="text-gray-600">販売中</span>
                                        </div>
                                        <div class="mr-2"><input required type="radio" name="is_selling" value="0"
                                                class="mr-2" @if ($shop->is_selling === 0) { checked } @endif><span
                                                class="text-gray-600">停止中</span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="p-2 w-full flex justify-center mt-4">
                                <button type='button' onclick="location.href='{{ route('owner.shops.index') }}'"
                                    class="mx-auto bg-gray-500 border-0 py-2 px-8 focus:outline-none hover:bg-red-400 rounded text-lg">戻る</button>
                                <button type="submit"
                                    class="mx-auto bg-green-500 border-0 py-2 px-8 focus:outline-none hover:bg-green-600 rounded text-lg">登録</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
</x-app-layout>
