@props(['project'=>null])
@if($project->name)
    <article>
        <p>{{$project->name}}</p>
        @endif
        @if($project->startDate && $project->endDate)
            <p>{{$project->startDate->format('F Y')}}-{{$project->endDate->format('F Y')}}</p>
        @endif
        @if($project->description)
            <p>{{$project->description}}</p>
        @endif
        @if($project->url)
            <a href="{{$project->url}}">{{$project->url}}</a>
        @endif
        @if($project->highlights)
            <p>
                @foreach($project->highlights as $highlight)
                    <span>{{$highlight}}</span>
                @endforeach
            </p>
    </article>
@endif
