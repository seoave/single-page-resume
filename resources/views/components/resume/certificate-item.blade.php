@props([
    'certificate'=> null,
])
@if($certificate->name)
    <article>
        <h3>{{$certificate->name}}</h3>

        @if($certificate->date)
            <p>{{$certificate->date->format('F Y')}}</p>
        @endif
        @if($certificate->issuer)
            <p>{{$certificate->issuer}}</p>
        @endif
        @if($certificate->url)
            <a href="{{$certificate->url}}">{{$certificate->url}}</a>
        @endif
    </article>
@endif
