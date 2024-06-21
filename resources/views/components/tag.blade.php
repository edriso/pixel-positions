@props(['tag', 'size' => 'base', 'class' => ''])

@php
    $baseClasses = 'inline-block bg-white/10 hover:bg-white/25 rounded-xl font-bold transition-colors duration-300';

    $classes = trim($baseClasses . ' ' . $class);

    if ($size === 'base') {
        $classes .= " px-5 py-1 text-sm";
    }
    if ($size === 'small') {
        $classes .= " px-3 py-1 text-2xs";
    }
@endphp

<a href="/tags/{{ strtolower($tag->name) }}" class="{{ $classes }}">{{ $tag->displayedName() }}</a>
