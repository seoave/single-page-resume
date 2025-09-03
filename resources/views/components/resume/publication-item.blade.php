@props(['publication'=>null])

@if($publication->name)
    <h3>{{$publication->name}}</h3>

    @if($publication->publisher)
        <p>{{$publication->publisher}}</p>
    @endif

    @if($publication->releaseDate)
        <p>{{$publication->releaseDate->format('F Y')}}</p>
    @endif

    @if($publication->summary)
        <p>{{$publication->summary}}</p>
    @endif

    @if($publication->url)
        <p>{{$publication->url}}</p>
    @endif
@endif
