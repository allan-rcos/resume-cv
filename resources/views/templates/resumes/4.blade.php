<x-template-layout :title="$name">
    <header class="text-center text-white bg-blue-500">
        @isset($filename):
            <div>
                <img src="{{$filename}}" alt="{{$name}}" class="h-44 w-44 rounded-full">
            </div>
        @endisset;
        <div>
            <h1>{{$name}}</h1>
            @isset($career): <h3>{{$career}}</h3> @endisset;
            @isset($summary): <p>{{$summary}}</p> @endisset;
        </div>
    </header>
    <menu class="flex list-none bg-blue-200 border-b-blue-500">
        @isset($phone):
            <li><span class="material-icons text-white p-2 rounded-sm bg-blue-500">&#xE0CD;</span> {{$phone}}</li>
        @endisset;
        @isset($address):
            <li><span class="material-icons text-white p-2 rounded-sm bg-blue-500">&#xE55F;</span> {{$address}}</li>
        @endisset;
        <li><span class="material-icons text-white p-2 rounded-sm bg-blue-500">&#xE0BE;</span> {{$email}}</li>
        @isset($links):
            @foreach($links as $link):
                <li><a href="{{$link}}" class="text-white p-2 rounded-sm bg-blue-500 hover:bg-blue-600 no-underline">
                        @if($link->type):
                            <i class="icon ion-social-{{$link->type}}"></i>
                        @else:
                            <span class="material-icons">&#xE157;</span>
                        @endif;
                    </a></li>
            @endforeach;
        @endisset;
    </menu>
    <main class="min-h-screen">
        <div class="w-2/3 min-h-full border-r-blue-500">
            @isset($employments):
                <h2>Experiência Profissional</h2>
                @foreach($employments as $employment):
                    <div class="relative mx-4 border-l-blue-500 pl-8">
                        <div
                            class="absolute h-8 transform -rotate-90 translate-y-1/2 rounded-full bg-blue-200 border-blue-500 text-center align-middle">
                            {{$employment->start}} - {{$employment->end??'atualmente'}}</div>
                        <h3>{{$employment->name}}</h3>
                        <p>{{$employment->address}}</p>
                        @if($employment?->highlights):
                            <ul>
                                @foreach($employment->highlights as $highlight):
                                    <li>{{$highlight->description}}</li>
                                @endforeach;
                            </ul>
                        @endif;
                    </div>
                @endforeach;
            @endisset;
            @isset($projects):
                <h2>Projetos Acadêmicos</h2>
                @foreach($projects as $project):
                    <div class="relative mx-4 border-l-blue-500 pl-8">
                        <div
                            class="absolute h-8 transform -rotate-90 translate-y-1/2 rounded-full bg-blue-200 border-blue-500 text-center align-middle">
                            {{$project->start}} - {{$project->end??'atualmente'}}</div>
                        <h3>{{$project->name}}</h3>
                        @if($project?->highlights):
                            <ul>
                                @foreach($project->highlights as $highlight):
                                    <li>{{$highlight->description}}</li>
                                @endforeach;
                            </ul>
                        @endif;
                    </div>
                @endforeach;
            @endisset;
        </div>
        <div class="w-1/3 text-center">
            @isset($education):
                <section>
                    <h2>Educação</h2>
                    @foreach($education as $course):
                        <div>
                            <p>{{$course->start}}</p> <!-- Year -->
                            <h3>{{$course->name}}</h3>
                            <p>{{$course->school}}</p>
                        </div>
                    @endforeach;
                </section>
            @endisset;
            @isset($skills):
                <section>
                    <h2>Habilidades</h2>
                    <ul class="list-none">
                        @foreach($skills as $skill):
                            @php:
                            $level = $skill->level;
                            $icon = match (true) {
                                $level > 75         => '<span class="material-icons">&#xE838;</span>',
                                $level > 50         => '<span class="material-icons-outline">&#xF06F;</span>',
                                default             => ''
                            }
                            @endphp;
                            <li>{{$skill->name}} {$icon}}</li>
                        @endforeach;
                    </ul>
                </section>
            @endisset;
            @isset($certifications):
                <section>
                    <h2>Certificações</h2>
                    <dl>
                        @foreach($certifications as $certification):
                            <dt>{{$certification->year}}</dt>
                            <dd>{{$certification->name}}</dd>
                        @endforeach;
                    </dl>
                </section>
            @endisset;
            @isset($languages):
                <section>
                    <h2>Linguagens</h2>
                    <ul class="list-none">
                        @foreach($languages as $language):
                            @php:
                            $icon = match ($language->proficiency) {
                                'Native','Advanced' => '<span class="material-icons">&#xE838;</span>',
                                'Intermediary'      => '<span class="material-icons-outline">&#xF06F;</span>',
                                default             => ' '
                            }
                            @endphp;
                            <li>{{$language->name}} {{$icon}}</li>
                        @endforeach;
                    </ul>
                </section>
            @endisset;
            @isset($awards):
                <section>
                    <h2>Prêmios</h2>
                    <ul style="list-style-type: '☆';">
                        @foreach($awards as $award):
                            <li>{{$award->description}}</li>
                        @endforeach;
                    </ul>
                </section>
            @endisset;
        </div>
    </main>
</x-template-layout>
