<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            オーナー一覧
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                @if (session('message'))
                    <div class="bg-blue-300 w-1/2 mx-auto p-2 my-4">
                        {{ session('message') }}
                    </div>
                @endif
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <footer class="text-gray-600 body-font">
                        <button onclick="location.href='{{ route('admin.owners.create') }}'"
                            class="bg-green-500 border-0 py-2 px-4 focus:outline-none hover:bg-green-600 rounded text-md mb-4">新規登録</button>
                        <div class="container px-5 py-24 mx-auto border border-indigo-600">
                            <div class="flex flex-wrap md:text-left text-center -mb-10 -mx-4">
                                @foreach ($owners as $owner)
                                    <div class="lg:w-1/6 md:w-1/2 w-full px-4">
                                        <nav class="list-none mb-10">
                                            <li>
                                                <a class="text-gray-600 hover:text-gray-800">{{ $owner->name }}</a>
                                            </li>
                                            <li>
                                                <a class="text-gray-600 hover:text-gray-800"> {{ $owner->email }}</a>
                                            </li>
                                            <li>
                                                <a
                                                    class="text-gray-600 hover:text-gray-800">{{ $owner->created_at->diffForHumans() }}</a>
                                            </li>
                                        </nav>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </footer>

                    {{--    eloquent
                    @foreach ($e_all as $e_owner)
                    {{$e_owner-> name}}
                    {{$e_owner->created_at->diffForHumans()}}
                    @endforeach
                    <br>
                    querybuilder
                    @foreach ($q_get as $q_owner)
                    {{$q_owner-> name}}
                    {{Carbon\Carbon::parse($q_owner->created_at)->diffForhumans()}}
                    @endforeach --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
