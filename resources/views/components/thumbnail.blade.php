@if (empty($filename))
    <img src="{{ asset('images/noimage.png') }}">
@else
    <img class="w-1/4 h-full" src="{{ asset('storage/products/' . $filename) }}">
@endif
