@php /** @var App\DataObjects\Resume */ @endphp
<x-layout :title="$resume->basics->name . 'Resume'">
    <x-slot:header>
        <h1 class="text-4xl font-bold text-gray-900">{{ $resume->basics->name }}</h1>
        <h2 class="text-xl font-medium text-blue-600 mt-1">{{$resume->basics->label}}</h2>

        @if($resume->basics->summary)
            <p class="mt-4 text-gray-700">{{$resume->basics->summary}}</p>
        @endif

        <adress class="mt-4 flex flex-wrap gap-3 text-gray-700">
            @if($resume->basics->phone)
                <div>
                    <a href="phone:{{$resume->basics->phone}}" class="hover:text-blue-600 mr-4">
                        {{$resume->basics->phone}}
                    </a>
                </div>
            @endif

            @if($resume->basics->url)
                <div>
                    <a href="phone:{{$resume->basics->url}}" class="hover:text-blue-600 mr-4">
                        {{$resume->basics->url}}
                    </a>
                </div>
            @endif

            @if($resume->basics->email)
                <div>
                    <a href="mailto:{{$resume->basics->email}}" class="hover:text-blue-600 mr-4">
                        {{$resume->basics->email}}
                    </a>
                </div>
            @endif

            @if($resume->basics->location->city && $resume->basics->location->region)
                <div>
                    {{$resume->basics->location->city}}, {{$resume->basics->location->region}},
                    {{$resume->basics->location->address}}, {{$resume->basics->location->postalCode}},
                    {{$resume->basics->location->countryCode}}
                </div>
            @endif
        </adress>
        @if($resume->basics->profiles)
            <div class="mt-4 flex flex-wrap gap-3">
                @foreach($resume->basics->profiles as $profile)
                    <a href="{{$profile->url}}"
                       class="px-3 py-1.5 bd-white rounded-full shadow-sm text-gray-600 hover:text-blue-600 hover:bg-gray-100"
                       target="_blank"
                    >
                        {{$profile->network}}
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
    </x-slot:header>
    <section>
        <h2 class="text-2xl font-bold text-gray-900 mt-12">Work Experience</h2>
        @foreach($resume->work as $work)
            @if($work->name && $work->position)
                <article class="mt-4">
                    <h3>{{$work->position}} in {{$work->name}}</h3>

                    @if($work->startDate && $work->endDate)
                        <p>{{$work->startDate}} - {{$work->endDate}}</p>
                    @endif

                    @if($work->summary)
                        <p>{{$work->summary}}</p>
                    @endif

                    @if($work->url)
                        <p><a href="{{$work->url}}">{{$work->url}}</a></p>
                    @endif

                    @if($work->highlights)
                        <ul>
                            @foreach($work->highlights as $h)
                                <li>{{$h}}</li>
                            @endforeach
                        </ul>
                    @endif

                </article>
            @endif
        @endforeach
    </section>

    @if($resume->volunteer)
        <section>
            <h2 class="text-2xl font-bold text-gray-900 mt-12">Volunteer Experience</h2>
            @foreach($resume->volunteer as $v)
                @if($v->organization && $v->position)
                    <article class="mt-4">
                        <h3>{{$v->position}} in {{$v->organization}}</h3>

                        @if($v->startDate && $v->endDate)
                            <p>{{$v->startDate}} - {{$v->endDate}}</p>
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
            @endforeach
        </section>
    @endif

    @if($resume->education)
        <section>
            <h2 class="text-2xl font-bold text-gray-900 mt-12">Education</h2>
            @foreach($resume->education as $e)
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
            @endforeach
        </section>
    @endif

    @if($resume->awards)
        <section>
            <h2 class="text-2xl font-bold text-gray-900 mt-12">Awards</h2>
            @foreach($resume->awards as $award)
                <article class="mt-4">
                    <h3>{{$award->title}}</h3>
                    <p>{{$award->date}}</p>
                    <p>{{$award->awarder}}</p>
                    <p>{{$award->summary}}</p>
                </article>
            @endforeach
        </section>
    @endif

    @if($resume->certificates)
        <section>
            <h2 class="text-2xl font-bold text-gray-900 mt-12">Certificates</h2>
            @foreach($resume->certificates as $certificate)
                <article>
                    @if($certificate->name)
                        <h3>{{$certificate->name}}</h3>
                    @endif
                    @if($certificate->date)
                        <p>{{$certificate->date}}</p>
                    @endif
                    @if($certificate->issuer)
                        <p>{{$certificate->issuer}}</p>
                    @endif
                    @if($certificate->url)
                        <a href="{{$certificate->url}}">{{$certificate->url}}</a>
                    @endif
                </article>
            @endforeach
        </section>
    @endif

    @if($resume->publications)
        <section>
            <h2 class="text-2xl font-bold text-gray-900 mt-12">Publications</h2>
            @foreach($resume->publications as $publication)
                @if($publication->name)
                    <h3>{{$publication->name}}</h3>
                @endif
                @if($publication->publisher)
                    <p>{{$publication->publisher}}</p>
                @endif
                @if($publication->releaseDate)
                    <p>{{$publication->releaseDate}}</p>
                @endif
                @if($publication->summary)
                    <p>{{$publication->summary}}</p>
                @endif
                @if($publication->url)
                    <p>{{$publication->url}}</p>
                @endif
            @endforeach
        </section>
    @endif

    @if($resume->skills)
        <section>
            <h2 class="text-2xl font-bold text-gray-900 mt-12">Skills</h2>
            @foreach($resume->skills as $skill)
                <article>
                    @if($skill->name)
                        <h3>{{$skill->name}}</h3>
                    @endif
                    @if($skill->level)
                        <span>{{$skill->level}}</span>
                    @endif
                    @if($skill->keywords)
                        @foreach($skill->keywords as $word)
                            <span>{{$word}}</span>
                        @endforeach
                    @endif
                </article>
            @endforeach
        </section>
    @endif

    @if($resume->languages)
        <section>
            <h2 class="text-2xl font-bold text-gray-900 mt-12">Languages</h2>
            @foreach($resume->languages as $language)
                <article>
                    @if($language->language && $language->fluency)
                        <p>{{$language->language}}: {{$language->fluency}}</p>
                    @endif
                </article>
            @endforeach
        </section>
    @endif

    @if($resume->interests)
        <section>
            <h2 class="text-2xl font-bold text-gray-900 mt-12">Interests</h2>
            @foreach($resume->interests as $interest)
                <article>
                    @if($interest->name)
                        <p>{{$interest->name}}</p>
                    @endif
                    @if($interest->keywords)
                        <p>
                            @foreach($interest->keywords as $word)
                                <span>{{$word}}</span>
                            @endforeach
                        </p>
                    @endif
                </article>
            @endforeach
        </section>
    @endif

    @if($resume->references)
        <section>
            <h2 class="text-2xl font-bold text-gray-900 mt-12">References</h2>
            @foreach($resume->references as $ref)
                <article>
                    @if($ref->name)
                        <p>{{$ref->name}}</p>
                    @endif
                    @if($ref->reference)
                        <p>{{$ref->reference}}</p>
                    @endif
                </article>
            @endforeach
        </section>
    @endif

    @if($resume->projects)
        <section>
            <h2 class="text-2xl font-bold text-gray-900 mt-12">Projects</h2>
            <article>
                @foreach($resume->projects as $project)
                    @if($project->name)
                        <p>{{$project->name}}</p>
                    @endif
                    @if($project->startDate && $project->endDate)
                        <p>{{$project->startDate}}-{{$project->endDate}}</p>
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
                    @endif
                @endforeach
            </article>
        </section>
    @endif
</x-layout>
