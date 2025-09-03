{{-- resources/views/components/resume/work-item.blade.php --}}
@props(['work'])

@if($work->name && $work->position)
    <article class="mt-4">
        <h3>{{ $work->position }} in {{ $work->name }}</h3>

        @if($work->startDate && $work->endDate)
            <p>{{ $work->startDate->format('F Y') }} - {{ $work->endDate->format('F Y') }}</p>
        @endif

        @if($work->summary)
            <p>{{ $work->summary }}</p>
        @endif

        @if($work->url)
            <p><a href="{{ $work->url }}">{{ $work->url }}</a></p>
        @endif

        @if($work->highlights)
            <ul>
                @foreach($work->highlights as $h)
                    <li>{{ $h }}</li>
                @endforeach
            </ul>
        @endif
    </article>
@endif
