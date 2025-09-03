@props(['v' => null])

@if($v->organization && $v->position)
    <article class="mt-4">
        <h3>{{$v->position}} in {{$v->organization}}</h3>

        @if($v->startDate && $v->endDate)
            <p>{{$v->startDate->format('F Y')}} - {{$v->endDate->format('F Y')}}</p>
        @endif

        @if($v->summary)
            <p>{{$v->summary}}</p>
        @endif

        @if($v->highlights)
            <ul>
                @foreach($v->highlights as $h)
                    <li>{{$h}}</li>
                @endforeach
            </ul>
        @endif

    </article>
@endif
