<button
    type="{{ $type }}"
    {{ $attributes->merge(["style" => "background-color: $backgroundColor; color: $textColor;"]) }}
>
    {{ $slot }}
</button>
