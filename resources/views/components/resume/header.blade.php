{{-- resources/views/components/resume/header.blade.php --}}
@props([
    'basics' => null,
])

<div class="columns flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4 ">

    <div class="column-1 w-full md:w-1/2 p-4">

        <h1 class="text-4xl font-bold text-gray-900">{{ $basics->name }}</h1>
        <h2 class="text-xl font-medium text-blue-600 mt-1">{{ $basics->label }}</h2>

        @if($basics->summary)
            <p class="mt-4 mb-6 text-gray-700">{{ $basics->summary }}</p>
        @endif

        <adress class="mt-4 mb-6 text-gray-700">
            @if($basics->email)
                <div class="mb-3">
                    <a href="mailto:{{ $basics->email }}" class="hover:text-blue-600 mr-4">
                        {{ $basics->email }}
                    </a>
                </div>

                @if($basics->phone)
                    <div class="mb-3">
                        <a href="phone:{{ $basics->phone }}" class="hover:text-blue-600 mr-4">
                            {{ $basics->phone }}
                        </a>
                    </div>
                @endif

                @if($basics->url)
                    <div class="mb-3">
                        <a href="{{ $basics->url }}" class="hover:text-blue-600 mr-4">
                            {{ $basics->url }}
                        </a>
                    </div>
                @endif

                @if($basics->location?->city && $basics->location?->region)
                    <div class="mb-3">
                        {{ $basics->location->city }}, {{ $basics->location->region }},
                        {{ $basics->location->address }}, {{ $basics->location->postalCode }},
                        {{ $basics->location->countryCode }}
                    </div>
                @endif
            @endif
        </adress>

        @if($basics->profiles)
            <div class="mt-4 mb-6 flex flex-wrap gap-3">
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
    </div>
    <div class="column-2 w-full md:w-1/2 p-12 flex justify-center md:justify-end">
        @if($basics->image)
            <div class="h-64 overflow-hidden rounded shadow-sm">
                <img src="{{$basics->image}}" class="w-full h-full object-cover" alt="{{$basics->name}}">
            </div>
        @endif
    </div>
</div>

<div class="fixed top-6 right-6 z-50">
    <form action="/download" method="POST">
        @csrf
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Download PDF
        </button>
    </form>
</div>
