@if (empty($shop->filename))
    <img src="{{ asset('images/noimage.png') }}">
@else
    <img src="{{ asset('storage/shops/' . $shop->filename) }}">
@endif
