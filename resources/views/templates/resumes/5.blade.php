<x-template-layout :title="$name" class="min-h-screen my-20 flex">
    <div class="w-1/3 mx-20">
        @isset($filename):
            <figure class="w-96 h-96">
                <img src="{{$filename}}" alt="{{$name}}">
            </figure>
        @endisset;
        <section>
            <p><span class="material-icons">&#xE0BE;</span> {{$email}}</p>
            @isset($phone): <p><span class="material-icons">&#xE0CD;</span> {{$phone}}</p> @endisset;
            @isset($address): <p><span class="material-icons">&#xE55F;</span> {{$address}}</p> @endisset;
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
        @isset($skills):
            @php
            $soft_skills = [];
            $hard_skills = [];
            foreach ($skills as $skill):
                if($skill->type) $hard_skills[] = $skill; /* hard === 1 */
                else             $soft_skills[] = $skill; /* soft === 0 */
            endforeach;
            @endphp;
            @if($soft_skills):
                <section>
                    <h2>Soft Skills</h2>
                    <ul class="list-none">
                        @foreach($skills as $skill):
                            @if($skill->type === 0):
                                <li class="px-4 py-2 bg-blue-500 text-white">{{$skill->name}}</li>
                            @endif;
                        @endforeach;
                    </ul>
                </section>
            @endif;
            @if($hard_skills):
                <section>
                    <h2>Hard Skills</h2>
                    <ul class="list-none">
                        @foreach($skills as $skill):
                            @if($skill->type === 1):
                                <li class="px-4 py-2 bg-blue-500 text-white">{{$skill->name}}</li>
                            @endif;
                        @endforeach;
                    </ul>
                </section>
            @endif;
        @endisset;
        @isset($languages):
            <section>
                <h2>Linguagens</h2>
                <dl>
                    @foreach($languages as $language):
                        <dt>{{$Language->name}}</dt>
                        <dd>{{$language->proficiency}}</dd>
                    @endforeach;
                </dl>
            </section>
        @endisset;
    </div>
    <div class="relative w-4 h-full bg-blue-500">
        <div class="absolute top-0 w-16 h-16 transform rotate-45 translate-x-1/2"></div>
        <div class="absolute bottom-0 w-16 h-16 transform rotate-45 translate-x-1/2"></div>
    </div>
    <div class="mx-20">
        <header>
            <h1>{{$name}}</h1>
            @isset($career) <h3>{{$career}}</h3> @endisset;
            @isset($summary): <p>{{$summary}}</p> @endisset;
        </header>
        @isset($education):
            <section>
                <h2>Educação</h2>
                @foreach($education as $course):
                    <div>
                        <h3>{{$course->name}}</h3>
                        <h4>{{$cource->school}}</h4>
                    </div>
                @endforeach;
            </section>
        @endisset;
        @isset($certifications):
            <section>
                <h3 class="text-amber-500">Certificações</h3>
                <ul style="list-style-type: circle">
                    @foreach($certifications as $certification):
                    <li>{{$certification->name}}</li>
                    @endforeach;
                </ul>
            </section>
        @endisset;
        @isset($employments):
            <section>
                <h2>Experiência profissional</h2>
                @foreach($employments as $employment):
                    <h3>{{$employment->name}}</h3>
                    <h4>{{$employment->address}}</h4>
                    <p class="text-amber-500">{{$employment->start}} - {{$employment->end??'atualmente'}}</p>
                    <p class="text-amber-500">Destaques</p>
                    <ul style="list-style-type: circle">
                        @foreach($employment->highlights as $highlight):
                            <li>{{$highlight->description}}</li>
                        @endforeach;
                    </ul>
                @endforeach;
            </section>
        @endisset;
        @isset($projects):
            <section>
                <h2>Projetos Acadêmicos</h2>
                @foreach($projects as $project):
                    <h3>{{$project->name}}</h3>
                    <p class="text-amber-500">{{$project->start}} - {{$project->end??'atualmente'}}</p>
                    <p class="text-amber-500">Destaques</p>
                    <ul style="list-style-type: circle">
                        @foreach($project->highlights as $highlight):
                            <li>{{$highlight->description}}</li>
                        @endforeach;
                    </ul>
                @endforeach;
            </section>
        @endisset;
        @isset($awards):
            <section>
                <h2>Prêmios:</h2>
                <div class="grid grid-cols-2">
                    @foreach($awards as $award):
                        <p><span class="material-icons">&#xE8D0;</span>{{$award->description}}</p>
                    @endforeach;
                </div>
            </section>
        @endisset;
    </div>
</x-template-layout>
