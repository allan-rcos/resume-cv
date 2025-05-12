<x-template-layout :title="$name" class="px-20">
    <div class="w-full my-80">
        <section class="absolute top-5 left-20">
            @isset($phone): <p>{{$phone}}</p> @endisset;
            <p>{{$email}}</p>
            @isset($address): <p>{{$address}}</p> @endisset;
            @isset($links):
                @foreach($links as $link):
                    <p><a href="{{$link->url}}">{{$link->url}}</a></p>
                @endforeach;
            @endisset;
        </section>
        <h1>{{$name}}</h1>
        @isset($education):
            <section>
                <h2>Educação</h2>
                @foreach($education as $course):
                    <div>
                        <h3 class="bold">{{$course->name}} <br>
                            <span class="font-semibold">{{$course->school}}, {{$course->address}}</span></h3>
                        <p>{{$course->start}} - {{$course->end ?? 'atualmente'}}</p>
                    </div>
                @endforeach;
            </section>
        @endisset;
        @isset($skills):
            <section>
                <h2>Habilidades</h2>
                <ul class="list-none">
                    @foreach($skills as $skill):
                        <li>
                            {{$skill->name}}<span class="float-end text-amber-500">{{$skill->level}}</span>
                            <!-- Iniciante <= 25% | Intermediário <= 50% | Avançado <= 75% | Expert <= 100% -->
                        </li>
                    @endforeach;
                </ul>
            </section>
        @endisset;
        @isset($awards):
            <section>
                <h2>Prêmios</h2>
                <ul class="list-none">
                    @foreach($awards as $award):
                        <li>
                            {{$award->description}}
                        </li>
                    @endforeach;
                </ul>
            </section>
        @endisset;
        @isset($languages):
            <section>
                <h2>Linguagens</h2>
                <ul class="list-none flex gap-5">
                    @foreach($languages as $language):
                        <li>{{$language->name}} ({{$language->proficiency}})</li>
                    @endforeach;
                </ul>
            </section>
        @endisset;
        @isset($certifications):
            <section>
                <h2>Certificações</h2>
                @foreach($certifications as $certification):
                <div>
                    <h3 class="bold">{{$certification->name}} <br>
                        <span class="font-semibold">{{$certification->school}}</span></h3>
                    <p>{{$certification->year}}</p>
                </div>
                @endforeach;
            </section>
        @endisset;
    </div>
    <div class="relative w-4 bg-amber-500">
        @isset($filename):
            <section class="absolute top-4">
                <img src="{{$filename}}" alt="{{$name}}" class="h-72 w-72 rounded-full">
            </section>
        @endisset;
    </div>
    <div class="w-full my-80">
        @isset($career): <p class="text-amber-500">{{$career}}</p> @endisset;
        @isset($summary):
            <section>
                <h2>Resumo Profissional</h2>
                <p>{{$summary}}</p>
            </section>
        @endisset;
        @isset($employments):
            <section>
                <h2>Experiência Profissional</h2>
                @foreach($employments as $employment):
                    <div>
                        <h3>{{$employment->name}}</h3>
                        <p>{{$employment->start}} - {{$employment->end??'atualmente'}}</p>
                        <ul>
                            @foreach($employment->tasks as $task):
                                <li>{{$task->description}}</li>
                            @endforeach;
                        </ul>
                    </div>
                @endforeach;
            </section>
        @endisset;
        @isset($projects):
            <section>
                <h2>Projetos Acadêmicos</h2>
                @foreach($projects as $project):
                    <div>
                        <h3>{{$project->name}} <span>| {{$project->duration}}</span></h3>
                        <!--
                        duration: start_year . duration_time
                        e.g. january 2022 -> february 2022 (2022 Janeiro);
                        March 2025 -> May (Or June) 2025 (2025 Primavera);
                        January 2024 -> July 2024 (Metade de 2024);
                        March 2023 -> March 2024 (2023 Completo);
                        December 2022 -> 2025 (2022 à 2025)
                        -->
                        <ul>
                            @foreach($project->tasks as $task):
                                <li>{{$task->description}}</li>
                            @endforeach;
                        </ul>
                    </div>
                @endforeach;
            </section>
        @endisset;
    </div>
</x-template-layout>
