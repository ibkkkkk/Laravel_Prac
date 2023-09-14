<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            オーナー情報の編集
        </h2>
    </x-slot>
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <section class="text-gray-600 body-font relative">
                        <div class="container px-5 py-8 mx-auto">
                            <div class="flex flex-col text-center w-full mb-12">
                                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-200">オーナー情報の編集
                                </h1>
                            </div>
                            <div class="lg:w-1/2 md:w-2/3 mx-auto">
                                <form method="post"
                                    action="{{ route('admin.owners.update', ['owner' => $owner->id]) }}">
                                    @method('PUT')
                                    @csrf
                                    <div class="-m-2">
                                        <div class="p-2 w-1/2 mx-auto">
                                            <div class="relative">
                                                <label for="name" class="leading-7 text-sm text-gray-200">Name</label>
                                                <input type="text" id="name" name="name" value="{{ $owner->name }}"
                                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-green-500 focus:ring-2 focus:ring-green-200 text-base outline-none text-gray-200 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                            </div>
                                        </div>
                                        <div class="p-2 w-1/2 mx-auto">
                                            <div class="relative">
                                                <label for="email" class="leading-7 text-sm text-gray-200">Email</label>
                                                <input type="email" id="email" name="email" value="{{ $owner->email }}"
                                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-green-500 focus:ring-2 focus:ring-green-200 text-base outline-none text-gray-200 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                            </div>
                                        </div>
                                        <div class="p-2 w-1/2 mx-auto">
                                            <div class="relative">
                                                <label for="shop-name" class="leading-7 text-sm text-gray-200">Shop
                                                    Name</label>
                                                <div id="shop-name" name="shop-name"
                                                    class="content-center w-full bg-gray-100 bg-opacity-50 rounded focus:ring-2 focus:ring-green-200 text-base outline-none text-gray-200 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                                    {{ $owner->shop->name }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="p-2 w-1/2 mx-auto">
                                            <div class="relative">
                                                <label for="password"
                                                    class="leading-7 text-sm text-gray-200">password</label>
                                                <input type="password" id="password" name="password"
                                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-green-500 focus:ring-2 focus:ring-green-200 text-base outline-none text-gray-200 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                            </div>
                                        </div>
                                        <div class="p-2 w-1/2 mx-auto">
                                            <div class="relative">
                                                <label for="password_confirmation"
                                                    class="leading-7 text-sm text-gray-200">password_confirmation</label>
                                                <input type="password" id="password_confirmation"
                                                    name="password_confirmation"
                                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-green-500 focus:ring-2 focus:ring-green-200 text-base outline-none text-gray-200 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-2 w-full flex justify-center mt-4">
                                        <button type='button'
                                            onclick="location.href='{{ route('admin.owners.index') }}'"
                                            class="mx-auto bg-gray-400 border-0 py-2 px-8 focus:outline-none hover:bg-red-300 rounded text-lg text-white">戻る</button>
                                        <button type="submit"
                                            class="mx-auto bg-green-500 border-0 py-2 px-8 focus:outline-none hover:bg-green-600 rounded text-lg text-white">更新</button>
                                    </div>
                            </div>
                        </div>
                </div>
                </form>
            </div>
            </section>
        </div>
    </div>
    </div>
    </div>
</x-app-layout>
