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

    @error('question')
        <span class="mt-2 text-sm text-red-500">
            {{ $message }}
        </span>
    @enderror
</div>
</form>