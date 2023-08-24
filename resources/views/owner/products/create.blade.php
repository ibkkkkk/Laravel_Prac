<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <x-error :errors='$errors' />
                    <form method="post" enctype="multipart/form-data" action="{{ route('owner.products.store') }}">
                        @csrf
                        <div class="-m-2">
                            <div class="p-2 w-1/2 mx-auto">
                                <select name="category">
                                    @foreach ($categories as $category)
                                        <optgroup label="{{ $category->name }}">
                                            @foreach ($category->secondary as $secondary)
                                                <option value="{{ $secondary->id }}">
                                                    {{ $secondary->name }}
                                                </option>
                                            @endforeach
                                        </optgroup>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="p-2 w-full flex justify-center mt-4">
                            <button type='button' onclick="location.href='{{ route('owner.products.index') }}'"
                                class="mx-auto bg-gray-500 border-0 py-2 px-8 focus:outline-none hover:bg-green-600 rounded text-lg">戻る</button>
                            <button type="submit"
                                class="mx-auto bg-green-500 border-0 py-2 px-8 focus:outline-none hover:bg-green-600 rounded text-lg">登録</button>
                        </div>

                </div>
                </form>
                @php
                    $d = uniqid();
                @endphp
                <p>{{ $d }}</p>
            </div>
        </div>
</x-app-layout>
