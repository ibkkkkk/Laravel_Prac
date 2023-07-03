@props([
    'title',
    'message' => "initial",
    'content' => "content props"])

<div class="border-1 shadow-md w-1/4 p-2">
    <div>{{ $title }}</div>
    <div>images</div>
    <div>{{ $content }}</div>
    <div> {{ $message }} </div>
</div>