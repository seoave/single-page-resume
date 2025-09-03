{{-- resources/views/components/resume/header.blade.php --}}
@props([
    'basics' => null, // очікуємо об’єкт $resume->basics
])

<h1 class="text-4xl font-bold text-gray-900">{{ $basics->name }}</h1>
<h2 class="text-xl font-medium text-blue-600 mt-1">{{ $basics->label }}</h2>

@if($basics->summary)
    <p class="mt-4 text-gray-700">{{ $basics->summary }}</p>
@endif

<adress class="mt-4 flex flex-wrap gap-3 text-gray-700">
    @if($basics->phone)
        <div>
            <a href="phone:{{ $basics->phone }}" class="hover:text-blue-600 mr-4">
                {{ $basics->phone }}
            </a>
        </div>
    @endif

    @if($basics->url)
        <div>
            <a href="phone:{{ $basics->url }}" class="hover:text-blue-600 mr-4">
                {{ $basics->url }}
            </a>
        </div>
    @endif

    @if($basics->email)
        <div>
            <a href="mailto:{{ $basics->email }}" class="hover:text-blue-600 mr-4">
                {{ $basics->email }}
            </a>
        </div>
    @endif

    @if($basics->location?->city && $basics->location?->region)
        <div>
            {{ $basics->location->city }}, {{ $basics->location->region }},
            {{ $basics->location->address }}, {{ $basics->location->postalCode }},
            {{ $basics->location->countryCode }}
        </div>
    @endif
</adress>

@if($basics->profiles)
    <div class="mt-4 flex flex-wrap gap-3">
        @foreach($basics->profiles as $profile)
            <a href="{{ $profile->url }}"
               class="px-3 py-1.5 bd-white rounded-full shadow-sm text-gray-600 hover:text-blue-600 hover:bg-gray-100"
               target="_blank"
            >
                {{ $profile->network }}
            </a>
        @endforeach
    </div>
@endif

<div class="fixed top-6 right-6 z-50">
    <form action="/download" method="POST">
        @csrf
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Download PDF
        </button>
    </form>
</div>
