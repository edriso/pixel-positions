@props(['employer', 'width' => 100])

@php
    $logo = filter_var($employer->logo, FILTER_VALIDATE_URL) ? $employer->logo : asset('storage/' . $employer->logo);
@endphp

<img src="{{ $logo }}" alt='{{ $employer->name }}' class='rounded-xl' width='{{ $width }}' />
{{-- <img src="http://picsum.photos/seed/{{ rand(0, 1000) }}/{{ $width }}" alt="Employer's logo" class="rounded-xl" /> --}}
