@props(['width' => 100])

{{-- <img src="http://picsum.photos/seed/{{ rand(0, 1000) }}/{{ $width }}/{{ $width }}" ... --}}
<img src="http://picsum.photos/seed/{{ rand(0, 1000) }}/{{ $width }}" alt="Employer's logo" class="rounded-xl" />
