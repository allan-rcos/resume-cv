<x-template-layout :title="$name">
    <header class="absolute top-2 h-52 transform translate-x-1/2 right-1/2 border-8 border-white bg-amber-500 text-white">
        @isset($filename):
            <img src="{{$filename}}" alt="{{$name}}">
        @endisset;
        <div>
            <h1>{{$name}}</h1>
            @isset($career) <span>{{$career}}</span> @endisset;
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
        </div>
    </header>
    <main class="min-h-screen grid grid-cols-3 mt-56">
        <div class="bg-gray-800 text-white">
            @isset($skills):
                <section>
                    <h2>Habilidades</h2>
                    <ul class="list-none">
                        @foreach($skills as $skill):
                            <li>
                                {{$skill->name}}<span class="bg-white w-full"><span class="bg-amber-500" style="width: {{$skill->level}}%"></span></span>
                            </li>
                        @endforeach;
                    </ul>
                </section>
            @endisset;
            @isset($certifications):
                <section>
                    <h2>Certificações</h2>
                    <dl>
                        @foreach($certifications as $certification):
                            <dt>{{$certification->name}} <span class="float-end font-light">{{$certification->year}}</span></dt>
                            <dd>{{$certification->school}}</dd>
                        @endforeach;
                    </dl>
                </section>
            @endisset;
            @isset($languages):
                <section>
                    <h2>Linguagens</h2>
                    <ul class="list-none">
                        @foreach($languages as $language):
                            <li>{{$language->name}} <span class="text-amber-500 italic">({{$language->proficiency}})</span></li>
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
        <div class="col-span-2 mt-56">
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
                            <h3>{{$employment->name}} <span class="duration-span">{{$employment->start}} - {{$employment->end??'atualmente'}}</span></h3>
                            <p>{{$employment->address}}</p>
                            @if($employment->highlight):
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
                    <h2>Formação Acadêmica</h2>
                    @foreach($education as $course):
                        <div>
                            <h3>{{$course->name}} <span class="duration-span">{{$course->start}} - {{$course->end??'atualmente'}}</span></h3>
                            <p>{{$course->address}}</p>
                            <p>{{$course->school}}</p>
                        </div>
                    @endforeach;
                </section>
            @endisset;
            @isset($projects):
                <section>
                    <h2>Projetos Acadêmicos</h2>
                    @foreach($projects as $project):
                    <div>
                        @if($project->url):
                            <a href="{{$project->url}}">
                                <h3>{{$project->name}} <span class="duration-span">{{$project->start}} - {{$project->end??'atualmente'}}</span></h3>
                            </a>
                        @else:
                            <h3>{{$project->name}} <span class="duration-span">{{$project->start}} - {{$project->end??'atualmente'}}</span></h3>
                        @endif;
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
