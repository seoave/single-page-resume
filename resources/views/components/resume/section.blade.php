{{-- resources/views/components/resume/section.blade.php --}}
@props(['title'])

<section class="bg-gray-50 rounded p-4 mb-12">
    <h2 class="text-2xl font-bold text-gray-900">{{ $title }}</h2>
    {{ $slot }}
</section>
