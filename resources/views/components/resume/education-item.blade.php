
@props([
    'e' => null,
])
@if($e->institution)
    <article class="mt-4">
        <h3>{{$e->institution}}</h3>

        @if($e->startDate && $e->endDate)
            <p>{{$e->startDate}} - {{$e->endDate}}</p>
        @endif

        @if($e->area)
            <p>{{$e->area}}</p>
        @endif

        @if($e->studyType)
            <p>{{$e->studyType}}</p>
        @endif

        @if($e->score)
            <p>Score: {{$e->score}}</p>
        @endif

        @if($e->courses)
            <ul>
                @foreach($e->courses as $course)
                    <li>{{$course}}</li>
                @endforeach
            </ul>
        @endif

        @if($e->url)
            <p><a href="{{$e->url}}">{{$e->url}}</a></p>
        @endif

    </article>
@endif
