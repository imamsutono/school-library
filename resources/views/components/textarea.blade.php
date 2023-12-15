@props(['disabled' => false])

<textarea {{ $disabled && 'disabled' }} cols="70" rows="5"
    class="{!! $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) !!}">
{{ $slot }}
</textarea>
