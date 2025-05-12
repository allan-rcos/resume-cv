<x-template-layout class="min-h-screen" :title="$name">
    <header class="relative h-56">
        @isset($filename):
            <img src="{{$filename}}" alt="{{$name}}" class="absolute right-8 top-2 h-52 rounded-full">
        @endisset;
        <div class="h-2/3 {{isset($filename)?'pr-72':'pr-8'}}">
            <h1>{{$name}}</h1>
        </div>
        @isset($career):
            <div class="h-1/3 bg-blue-500 {{isset($filename)?'pr-72':'pr-8'}}">
                <h3>{{$career}}</h3>
            </div>
        @endisset;
    </header>
    <main class="flex h-full mx-10 my-20">
        <div class="w-2/5 flex flex-col">
            <section>
                <h2>Contatos</h2>

                <p><span class="material-icons">&#xE0BE;</span> {{$email}}</p>
                @isset($phone) <p><span class="material-icons">&#xE0CD;</span> {{$phone}}</p> @endisset;
                @isset($address) <p><span class="material-icons">&#xE55F;</span> {{$address}}</p> @endisset;
                @isset($links):
                    <p>
                        @foreach($links as $link):
                            <span>
                            <a href="{{$link->url}}">
                                @if($link->type):
                                    <i class="icon ion-social-{{$link->type}}"></i>
                                @else:
                                <span class="material-icons">&#xE157;</span>
                                @endif;
                            </a>
                        </span>
                        @endforeach;
                    </p>
                @endisset;
            </section>
            @isset($summmary):
                <section>
                    <h2>Resumo Profissional</h2>
                    <p>{{$summmary}}</p>
                </section>
            @endisset;
            @isset($skills):
                <section>
                    <h2>Habilidades</h2>
                    <ul style="list-style-type: '✓ ';">
                        @foreach($skills as $skill):
                            <li>
                                {{$skill->name}};
                            </li>
                        @endforeach;
                    </ul>
                </section>
            @endisset;
            @isset($certifications):
                <section>
                    <h2>Certificações</h2>
                    <ul style="list-style-type: '✓ '">
                        @foreach($certifications as $certification):
                            <li>{{$certification->name}} <span class="float-end">{{$certification->year}}</span></li>
                        @endforeach;
                    </ul>
                </section>
            @endisset;
            @isset($awards):
                <section>
                    <h2>Prêmios</h2>
                    <ul style="list-style-type: square">
                        @foreach($awards as $award):
                            <li>{{$award->description}}</li>
                        @endforeach;
                    </ul>
                </section>
            @endisset;
            @isset($languages):
                <section>
                    <h2>Linguagens</h2>
                    <ul style="list-style-type: '✓ ';">
                        @foreach($languages as $language):
                            <li>
                                {{$language->name}}: {{$language->proficiency}};
                            </li>
                        @endforeach;
                    </ul>
                </section>
            @endisset;
        </div>
        <div class="w-3/5 flex flex-col">
            @isset($employments):
                <section>
                    <h2>Experiência profissional</h2>
                    @foreach($employments as $employment):
                        <div>
                            <h3>{{$employment->name}}</h3>
                            <p>{{$employment->address}} <br> {{$employment->start . $employment->end ? ' - '.$employment->end:''}}</p>
                            @if($employment?->highlights):
                                <ul>
                                    @foreach($employment->highlights as $highlight):
                                        <li>{{$highlight->description}}</li>
                                    @endforeach;
                                </ul>
                            @endif;
                        </div>
                    @endforeach;
                </section>
            @endisset;
            @isset($education):
                <section>
                    <h2>Educação</h2>
                    @foreach($education as $course):
                        <div>
                            <h3>{{$course->name}}</h3>
                            <p>
                                {{$course->school}} <br>
                                {{$course->address}} | {{$course->start . ' - ' . $course->end??'atualmente'}}
                            </p> <!--Utilizar apenas o ano da data-->
                        </div>
                    @endforeach;
                </section>
            @endisset;
            @isset($projects):
                <section>
                    <h2>Projetos Acadêmicos</h2>
                    @foreach($projects as $project):
                        <div>
                            <h3>{{$project->name}}<span class="float-end">{{$project->start . ' - ' . $project->end??'atualmente'}}</span></h3>
                             <!--Utilizar apenas o ano da data-->
                            @if($project->highlight):
                                <ul>
                                    @foreach($project->highlights as $highlight):
                                        <li>{{$highlight->description}}</li>
                                    @endforeach;
                                </ul>
                            @endif;
                        </div>
                    @endforeach;
                </section>
            @endisset;
        </div>
    </main>
</x-template-layout>
