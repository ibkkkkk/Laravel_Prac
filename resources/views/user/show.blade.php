<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            商品の詳細
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="md:flex md:justify-around">
                        <div class="md:w-1/2">
                            <!-- Slider main container -->
                            <div class="swiper-container">
                                <!-- Additional required wrapper -->
                                <div class="swiper-wrapper">
                                    <!-- Slides -->
                                    <div class="swiper-slide">
                                        <img src="{{asset('storage/products/69540055_650a459fdb452.jpg')}}">
                                    </div>
                                    <div class="swiper-slide">Slide 2</div>
                                    <div class="swiper-slide">Slide 3</div>
                                    <!-- <div class="swiper-slide">Slide 2</div>
                                    <div class="swiper-slide">Slide 3</div> -->
                                </div>
                                <!-- If we need pagination -->
                                <div class="swiper-pagination"></div>

                                <!-- If we need navigation buttons -->
                                <div class="swiper-button-prev"></div>
                                <div class="swiper-button-next"></div>

                                <!-- If we need scrollbar -->
                                <div class="swiper-scrollbar"></div>
                            </div>
                        </div>
                        <div class="md:w-1/2 ml-4">
                            <h2 class="text-sm title-font text-gray-500 tracking-widest">
                                {{ $product->category->name }}
                            </h2>
                            <h1 class="mb-2 text-gray-900 font-medium border-b-2">{{ $product->name }}</h1>
                            <p class=" leading-relaxed text-gray-900 font mb-4">{{ $product->information }}</p>
                            <form method="post" action="{{ route('user.cart.add') }}">
                                @csrf
                                <div class="flex justify-around items-center mt-4">
                                    <span class="title-font font-medium text-2xl text-gray-900">{{
                                        number_format($product->price) }}<span
                                            class="text-sm text-gray-700">円(税込)</span></span>
                                    <div class="flex items-center">
                                        <span class="mr-3 text-gray-900 font">数量</span>
                                        <div class="relative">
                                            <select name="quantity"
                                                class="rounded border appearance-none border-gray-300 text-gray-900 font py-2 focus:outline-none focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 text-base pl-3 pr-10">
                                                @for ($i = 1; $i <= $quantity; $i++) <option value="{{ $i }}">{{ $i }}
                                                    </option>
                                                    @endfor
                                            </select>
                                        </div>
                                    </div>
                                    <button
                                        class="flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">カートに入れる</button>
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
