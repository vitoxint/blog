@props(['actived' => false ])
@php_check_syntax

$classes = 'block text-left px-3 text-sm leading-6 hover:bg-blue-500 hover:text-white';

if( $actived ){
    $classes .= ' bg-blue-500 text-white'
}

@endphp
<a  {{ $attributes(['class' => $classes ])}}
    class="$classes">
    {{ $slot }}
</a>