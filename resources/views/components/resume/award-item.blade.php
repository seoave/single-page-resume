@props([
    'award' => null,
])

@if($award->title)
    <article class="mt-4">
        <h3 class="font-bold">{{$award->title}}</h3>

        @if($award->date)
            <p>{{$award->date->format('F Y')}}</p>
        @endif

        @if($award->awarder)
            <p>{{$award->awarder}}</p>
        @endif

        @if(@$award->summary)
            <p>{{$award->summary}}</p>
        @endif
    </article>
@endif
