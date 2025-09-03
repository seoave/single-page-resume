{{-- resources/views/components/resume/section.blade.php --}}
@props(['title'])

<section>
    <h2 class="text-2xl font-bold text-gray-900 mt-12">{{ $title }}</h2>
    {{ $slot }}
</section>
