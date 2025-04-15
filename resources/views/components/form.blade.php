@props(
    [
        'action',
        'method'
    ]
)


<form action="{{ $action }}" method="{{ $method }}">
    @csrf
    @if ($method != 'POST')
    @method( $method )
    @endif
    {{ $slot }}

</form>
