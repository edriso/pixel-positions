@props(['employer', 'width' => 100])

<img src='{{ asset($employer->logo) }}' alt='{{ $employer->name }}' class='rounded-xl' width='{{ $width }}'>
{{-- <img src="http://picsum.photos/seed/{{ rand(0, 1000) }}/{{ $width }}" alt="Employer's logo" class="rounded-xl" /> --}}
