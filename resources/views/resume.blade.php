@php /** @var App\DataObjects\Resume */ @endphp
<x-layout :title="$resume->basics->name . 'Resume'">
    <x-slot:header>
        <x-resume.header :basics="$resume->basics"/>
    </x-slot:header>

    <x-resume.section title="Work Experience">
        @foreach($resume->work as $work)
            <x-resume.work-item :work="$work"/>
        @endforeach
    </x-resume.section>

    @if($resume->volunteer)
        <x-resume.section title="Volunteer Experience">
            @foreach($resume->volunteer as $v)
                <x-resume.volunteer-item :v="$v"/>
            @endforeach
        </x-resume.section>
    @endif

    @if($resume->education)
        <x-resume.section title="Education">
            @foreach($resume->education as $e)
                <x-resume.education-item :e="$e"/>
            @endforeach
        </x-resume.section>
    @endif

    @if($resume->awards)
        <x-resume.section title="Awards">
            @foreach($resume->awards as $award)
                <x-resume.award-item :award="$award"/>
            @endforeach
        </x-resume.section>
    @endif

    @if($resume->certificates)
        <x-resume.section title="Certificates">
            @foreach($resume->certificates as $certificate)
                <x-resume.certificate-item :certificate="$certificate"/>
            @endforeach
        </x-resume.section>
    @endif

    @if($resume->publications)
        <x-resume.section title="Publications">
            @foreach($resume->publications as $publication)
                <x-resume.publication-item :publication="$publication"/>
            @endforeach
        </x-resume.section>
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
        <x-resume.section title="Projects">
            @foreach($resume->projects as $project)
                <x-resume.project-item :project="$project"/>
            @endforeach
        </x-resume.section>
    @endif
</x-layout>
