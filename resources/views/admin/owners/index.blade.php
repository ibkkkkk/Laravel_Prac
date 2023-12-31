<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            オーナ一覧
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg ">
                @if (session('message'))
                <div class="bg-blue-300 w-1/2 mx-auto p-2 my-4 text-center">
                    {{ session('message') }}
                </div>
                @endif
                <div class="p-6 text-gray-900">
                    <div class="flex mb-4">
                        <button onclick="location.href='{{ route('admin.owners.create')}}'"
                            class="text-white bg-green-500 border-0 py-2 px-4 focus:outline-none hover:bg-green-600 rounded text-lg">新規登録</button>
                    </div>
                    @foreach ($owners as $owner)
                    <div class="container px-5 py-24 mx-auto border border-white">
                        <div class="flex flex-wrap md:text-left text-center -mb-10 -mx-4">
                            <div class="lg:w-1/6 md:w-1/2 px-4">
                                <nav class="list-none mb-10">
                                    <li>
                                        <a class="text-gray-600 hover:text-gray-800">{{ $owner->name }}</a>
                                    </li>
                                    <li>
                                        <a class="text-gray-600 hover:text-gray-800"> {{ $owner->email }}</a>
                                    </li>
                                    <li>
                                        <a class="text-gray-600 hover:text-gray-800">{{
                                            $owner->created_at->diffForHumans() }}</a>
                                    </li>
                                </nav>
                                <div class="flex justify-around">
                                    <button
                                        onclick="location.href='{{ route('admin.owners.edit', ['owner' => $owner->id ])}}'"
                                        class="bg-green-400 border-0 py-2 px-4 focus:outline-none hover:bg-green-600 rounded text-md ml-4">
                                        編集</button>
                                    <form method="post" id="delete_{{ $owner->id }}"
                                        action="{{ route('admin.owners.destroy', ['owner' => $owner->id]) }}">
                                        @method('DELETE')
                                        @csrf
                                        <button href="#" data-id="{{ $owner->id }}" onclick="deletePost(this)"
                                            class="bg-red-200 border-0 py-2 px-4 focus:outline-none rounded text-md ml-4">削除</button>
                                </div>
                            </div>
                        </div>

                    </div>
                    @endforeach


                    {{-- eloquent
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
    <script>
        function deletePost(e) {
            'use strict';
            if (confirm("本当に削除しますか？")) {
                document.getElementById('delete_' + e.dataset.id).submit();
            }
        }
    </script>


</x-app-layout>
