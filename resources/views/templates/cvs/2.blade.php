<x-template-layout :title="$name">
    <nav class="px-7 bg-white shadow-lg rounded-2xl mb-5">
        <div class="flex">
            @isset($summary):
                <div class="flex-1 group">
                    <a href="#about" class="flex items-end justify-center text-center mx-auto px-4 pt-2 w-full text-gray-400 group-hover:text-indigo-500 border-b-2 border-transparent group-hover:border-indigo-500">
                        <span class="block px-1 pt-1 pb-2">
                            <span class="material-icons text-2xl pt-1 mb-1 block">&#xe7fd;</span>
                            <span class="block text-xs pb-1">Sobre mim</span>
                        </span>
                    </a>
                </div>
            @endisset;
            @isset($employments):
                <div class="flex-1 group">
                    <a href="#employments" class="flex items-end justify-center text-center mx-auto px-4 pt-2 w-full text-gray-400 group-hover:text-indigo-500 border-b-2 border-transparent group-hover:border-indigo-500">
                        <span class="block px-1 pt-1 pb-2">
                            <span class="material-icons text-2xl pt-1 mb-1 block">&#xe943;</span>
                            <span class="block text-xs pb-1">Experiências Profissionais</span>
                        </span>
                    </a>
                </div>
            @endisset;
            @isset($education):
                <div class="flex-1 group">
                    <a href="#education" class="flex items-end justify-center text-center mx-auto px-4 pt-2 w-full text-gray-400 group-hover:text-indigo-500 border-b-2 border-transparent group-hover:border-indigo-500">
                        <span class="block px-1 pt-1 pb-2">
                            <span class="material-icons text-2xl pt-1 mb-1 block">&#xe80c;</span>
                            <span class="block text-xs pb-1">Escolaridade</span>
                        </span>
                    </a>
                </div>
            @endisset;
            @isset($certifications):
                <div class="flex-1 group">
                    <a href="#certifications" class="flex items-end justify-center text-center mx-auto px-4 pt-2 w-full text-gray-400 group-hover:text-indigo-500 border-b-2 border-transparent group-hover:border-indigo-500">
                        <span class="block px-1 pt-1 pb-2">
                            <span class="material-icons text-2xl pt-1 mb-1 block">&#xe0d0;</span>
                            <span class="block text-xs pb-1">Certificações</span>
                        </span>
                    </a>
                </div>
            @endisset;
            @isset($projects):
                <div class="flex-1 group">
                    <a href="#projects" class="flex items-end justify-center text-center mx-auto px-4 pt-2 w-full text-gray-400 group-hover:text-indigo-500 border-b-2 border-transparent group-hover:border-indigo-500">
                        <span class="block px-1 pt-1 pb-2">
                            <span class="material-icons text-2xl pt-1 mb-1 block">&#xe051;</span>
                            <span class="block text-xs pb-1">Projetos</span>
                        </span>
                    </a>
                </div>
            @endisset;
        </div>
    </nav>
    <main>
        <section class="flex">
            <div class="w-1/2">
                <h2>
                    Olá, <br>
                    meu nome é <span class="text-amber-500">{{$name}}</span>,
                    e sou um <span class="text-blue-500">{{$career}}</span>.
                </h2>
                <x-anchor-button href="{{$resume}}" mode="outlined">Ver Resumés</x-anchor-button>
            </div>
            <div class="w-1/2 flex items-center justify-center">
                @php
                    $softSkills = [];
                    $hardSkills = [];
                    if (isset($skills)) {
                        foreach ($skills as $skill){
                            if ($skill->type === null) continue;
                            if ($skill->type === 0) $softSkills[$skill->name] = $skill->level;
                            if ($skill->type === 1) $hardSkills[$skill->name] = $skill->level;
                        }
                    }
                @endphp;
                <x-code-block.block>
                    <div class="mb-2">
                        <div class="sub-line">
                            <span class="text-amber-400">class</span>
                            {{$name}} <!-- NameFromUser -->
                            <span class="text-amber-400">extends</span>
                            Developer
                            <span class="text-amber-400">implements</span>
                            {{$career}} <!-- CareerFromUser -->
                        </div>
                        <div class="sub-line">
                            {
                        </div>
                        <div class="sub-line ml-8">
                            <span class="text-amber-400">const</span>
                            <span class="text-blue-500">EMAIL</span> =
                            <span class="text-green-400">'{{$email}}'</span>;
                        </div>
                        @isset($phone):
                            <div class="sub-line ml-8">
                                <span class="text-amber-400">const</span>
                                <span class="text-blue-500">PHONE</span> =
                                <span class="text-green-400">'{{$phone}}'</span>;
                            </div>
                        @endisset;
                        @isset($address):
                            <div class="sub-line ml-8">
                                <span class="text-amber-400">const</span>
                                <span class="text-blue-500">ADDRESS</span> =
                                <span class="text-green-400">'{{$address}}'</span>;
                            </div>
                        @endisset;
                        @isset($awards):
                            <div class="sub-line ml-8" title="{{join(", \n", $awards)}}">
                                <span class="text-amber-400">public</span>
                                <span class="text-amber-400">int</span>
                                <span class="text-blue-400">$awards</span> =
                                <span class="text-blue-600">{{count($awards)}}</span>;
                            </div>
                        @endisset;
                        @if($hardSkills):
                            <div class="sub-line ml-8">
                                <span class="text-amber-400">public</span>
                                <span class="text-amber-400">array</span>
                                <span class="text-blue-400">$hardSkills</span>
                                = [
                                @foreach(array_keys($hardSkills) as $hardSkill):
                                    <span class="text-green-400">'{{$hardSkill}}'</span>,
                                @endforeach;
                                ];
                            </div>
                        @endif;
                        @if($languages):
                            <div class="sub-line ml-8">
                                <span class="text-amber-400">public</span>
                                <span class="text-amber-400">array</span>
                                <span class="text-blue-400">$languages</span>
                                = [
                                @foreach($languages as $language):
                                <span class="text-green-400">'{{$language->name}}'</span> =>
                                <span class="text-green-400">'{{$language->proficiency}}'</span>,
                                @endforeach;
                                ];
                            </div>
                        @endif;
                        @if($softSkills):
                            @foreach($softSkills as $softSkillName => $softSkillLevel):
                                <div class="sub-line ml-8">
                                    <span class="text-amber-400">public</span>
                                    <span class="text-amber-400">bool</span>
                                    <span class="text-blue-400">${{$softSkillName}}</span> <!-- camelCase -->
                                    = <span class="text-blue-500">{{$softSkillLevel}}</span>;
                                </div>
                            @endforeach;
                        @endif;
                        <div class="sub-line ml-8">
                            <span class="text-amber-400">public</span>
                            <span class="text-amber-400">function</span>
                            <span class="text-blue-600">contact</span>(
                            <span class="text-amber-400">array</span>
                            <span class="text-blue-500">$data</span> ):
                            RedirectResponse
                        </div>
                        <div class="sub-line ml-8">
                            {
                        </div>
                        <div class="sub-line ml-16">
                            <span class="text-amber-400">return</span>
                            <span class="text-blue-600">redirect</span>()-><span class="text-blue-600">
                                with</span>(<span class="text-blue-500">$data</span>);
                        </div>
                        <div class="sub-line ml-8">
                            }
                        </div>
                        <div class="sub-line ml-8">
                            }
                        </div>
                        <div class="sub-line">
                            }
                        </div>
                    </div>
                </x-code-block.block>
            </div>
        </section>
        @isset($summary):
            <section class="flex justify-between m-20">
                <div class="w-1/12">
                    <h2 id="about" class="rotate-90">Sobre Mim</h2>
                </div>
                <div class="w-5/12">
                    @isset($filename): <img src="{{$filename}}" alt="{{$name}}" class="w-72 h-72 rounded-s"> @endisset;
                </div>
                <div class="w-1/2">
                    <h3>Quem sou eu?</h3>
                    <p>{{$summary}}</p>
                </div>
            </section>
        @endisset;
        @isset($employments):
            <section class="min-h-screen m-20">
                <h2 id="employments" class="text-center">Experiências Profissionais</h2>
                <div class="columns-2">
                    <div>
                        @foreach($employments as $employment):
                            <div>
                                <h3>{{$employment->start}} - {{$employment->end??'atualmente'}}</h3>
                                <div class="flex">
                                    @if($employment->photo):
                                        <img src="{{$employment->photo}}" alt="{{$employment->address}}" class="h-6 w-6">
                                    @else:
                                        <span class="material-icons">&#xe31e;</span>
                                    @endif;
                                    <div>
                                        <h4>{{$employment->name}}</h4>
                                        <p>{{$employment->address}}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach;
                    </div>
                    <div>
                        <img src="{{asset("assets/images/money.svg")}}" alt="Experiências Profissionais {{$name}}">
                    </div>
                </div>
            </section>
        @endisset;
        @isset($certifications):
            <section>
                <h2 id="certifications">Certificações</h2>
                <div class="flex">
                    @foreach($certifications as $certification):
                        <div>
                            @if($certification->photo):
                                <a href="{{$certification->photo}}" title="{{$certification->school}}">
                                    <img src="{{$certification->photo}}" alt="{{$certification->school}}">
                                </a>
                            @else:
                                <span class="material-icons" title="{{$certification->school}}">&#xe0d0;</span>
                            @endif;
                            <h3>{{$certification->name}}</h3>
                            <span>{{$certification->year}}</span>
                        </div>
                    @endforeach;
                </div>
            </section>
        @endisset;
        @isset($projects):
            <section>
                <h2 id="projects">Projetos Acadêmicos</h2>
                <div class="columns-2">
                    @foreach($projects as $project):
                        <a href="{{$project->url}}">
                            <x-code-block.block :title="$project->name" {{$project->photo?'style="background-image: url('.$project->photo.');"':''}}>
                                <div class="mb-2">
                                    <div class="sub-line">
                                        <span class="text-blue-500">$project</span> = <span class="text-amber-400">array</span>(
                                    </div>
                                    <div class="sub-line ml-8">
                                        <span class="text-green-400">'name'</span> =>
                                        <span class="text-green-400">'{{$project->name}}'</span>;
                                    </div>
                                    <div class="sub-line ml-8">
                                        <span class="text-green-400">'start'</span> =>
                                        <span class="text-green-400">'{{$project->start}}'</span>;
                                    </div>
                                    <div class="sub-line ml-8">
                                        <span class="text-green-400">'end'</span> =>
                                        @if($project->end):
                                            <span class="text-green-400">'{{$project->end}}'</span>;
                                        @else:
                                            <span class="text-amber-400">false</span>
                                        @endif;
                                    </div>
                                    @if($highlights = $project->highlights):
                                        <div class="sub-line ml-8">
                                            <span class="text-green-400">'highlights'</span> => [
                                        </div>
                                        @foreach($highlights as $highlight):
                                            <div class="sub-line ml-16">
                                                <span class="text-green-400">'{{$highlight->description}}',</span>;
                                            </div>
                                        @endforeach;
                                        <div class="sub-line ml-8">
                                            ]
                                        </div>
                                    @endif;
                                    <div class="sub-line">
                                        )
                                    </div>
                                </div>
                            </x-code-block.block>
                        </a>

                    @endforeach;
                </div>
            </section>
        @endisset;
        @isset($education):
            <section class="min-h-screen m-20">
                <h2 id="education" class="text-center">Escolaridade</h2>
                <div class="columns-2">
                    <div>
                        @foreach($education as $course):
                            <div>
                                <h3>{{$course->start}} - {{$course->end??'atualmente'}}</h3>
                                <div class="flex">
                                    @if($course->photo):
                                        <img src="{{$course->photo}}" alt="{{$course->address}}" class="h-6 w-6">
                                    @else:
                                        <span class="material-icons">&#xe31e;</span>
                                    @endif;
                                    <div>
                                        <h4>{{$course->name}}</h4>
                                        <p>{{$course->school}}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach;
                    </div>
                    <div>
                        <img src="{{asset("assets/images/pencil.svg")}}" alt="Escolaridade {{$name}}">
                    </div>
                </div>
            </section>
        @endisset;
        @isset($links):
            <section>
                <h2>Me siga:</h2>
                <div class="flex">
                    @foreach($links as $link):
                        <span class="inline-flex items-center rounded-full p-2 bg-indigo-500 text-white group
                                transition-all duration-500 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2
                                focus:outline-none">
                            @if($link->type):
                                <i class="icon ion-social-{{$link->type}}"></i>
                                <span class="whitespace-nowrap inline-block group-hover:max-w-screen-2xl
                                        group-focus:max-w-screen-2xl max-w-0 scale-80 group-hover:scale-100
                                        overflow-hidden transition-all duration-500 group-hover:px-2
                                        group-focus:px-2">{{$link->type}}</span>
                            @else:
                                <span class="material-icons">&#xE157;</span>
                            @endif;
                        </span>
                    @endforeach;
                </div>
            </section>
        @endisset;
        <hr class="my-6 border-gray-700 sm:mx-auto lg:my-8" />
        <span class="block text-sm sm:text-center text-gray-400">&copy; 2025 ResuméCV All Rights Reserved.</span>
    </main>
</x-template-layout>
