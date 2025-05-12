<x-template-layout :title="$name">
    <nav class="w-full mt-5 text-gray-700 bg-white shadow-sm body-font">
        <div class="container flex flex-col items-start p-6 mx-auto md:flex-row">
            <a class="flex items-center space-x-3 rtl:space-x-reverse">
                @isset($filename): <img src="{{$filename}}" class="h-8 rounded-full" alt="{{$name}}" /> @endisset;
                <h1 class="self-center text-2xl font-semibold whitespace-nowrap">{{$name}}</h1>
            </a>
            <menu class="flex items-center justify-center text-base md:ml-auto gap-5">
                <li>
                    <a href="#about" class="font-medium hover:text-gray-900">Sobre mim</a>
                </li>
                @isset($employments):
                    <li>
                        <a href="#employments" class="font-medium hover:text-gray-900">Experiências Profissionais</a>
                    </li>
                @endisset;
                @isset($education):
                    <li>
                        <a href="#education" class="font-medium hover:text-gray-900">Escolaridade</a>
                    </li>
                @endisset;
                @isset($certifications):
                    <li>
                        <a href="#certifications" class="font-medium hover:text-gray-900">Certificações</a>
                    </li>
                @endisset;
                @isset($projects):
                    <li>
                        <a href="#projects" class="font-medium hover:text-gray-900">Projetos</a>
                    </li>
                @endisset;
            </menu>
            @isset($links):
                <div class="items-center h-full pl-6 ml-6 border-l border-gray-200">
                    <x-anchor-button href="{{$links[0]->url}}">
                        <i class="icon ion-social-{{$links[0]->type}}"></i> {{$links[0]->type}}
                    </x-anchor-button>
                </div>
            @endisset;
        </div>
    </nav>
    <main>
        <section class="relative h-screen">
            <div class="absolute top-0 left-0 w-1/3 border-b-[100vh] border-b-white border-r-[25vh]"><!-- Trapezoide --></div>
            <div class="absolute top-1/2 left-0 ml-20 translate-y-1/2 h-screen w-1/3 bg-white border-b-8 border-b-white border-r-4">
                <h1 id="about">Olá! Me chamo {{preg_split(' ', $name)[0]}}</h1>
                @isset($career): <h3>{{$career}}</h3> @endisset;
                @isset($summary): <p>{{$summary}}</p> @endisset;
                @isset($languages):
                    <p>
                        Linguagens:
                        @foreach($languages as $language):
                            @if(in_array($language->proficiency, ['Native', 'Advanced'])):
                                <span title="{{$language->proficiency}}">{{$language->name}}</span>,
                            @endif;
                        @endforeach;
                    </p>
                @endisset;
            </div>
            <div class="absolute top-0 left-1/4 bg-[url({{$cover}})] bg-no-repeat bg-cover h-screen w-3/4"><!-- Background Image --></div>
        </section>
        @isset($projects):
            <section>
                <h2 id="projects">Portfólio de Projétos</h2>
                @foreach($projects as $project):
                    <div class="flex justify-center items-center min-h-screen">
                        <div class="relative flex flex-col text-gray-700 bg-white shadow-md bg-clip-border rounded-xl w-96">
                            @if($project->photo):
                                <div class="relative mx-4 mt-4 overflow-hidden text-gray-700 bg-white bg-clip-border rounded-xl h-96">
                                    <img src="{{$project->photo}}" alt="{{$project->name}}" class="object-cover w-full h-full" />
                                </div>
                            @endif;
                            <div class="p-6">
                                <div class="flex items-center justify-between mb-2">
                                    <h4 class="block text-base antialiased font-medium leading-relaxed text-gray-900">
                                        {{$project->name}}</h4>
                                    <p class="block text-base antialiased font-medium leading-relaxed text-gray-900">
                                        {{$project->duration}}</p>
                                </div>
                                @if($highlights = $project->highlights):
                                    <ul class="block font-sans text-sm antialiased font-normal leading-normal text-gray-700 opacity-75"
                                        aria-label="Destaques"
                                        style=":before{content: attr(aria-label); margin-left: -15px}">
                                        @foreach($highlights as $highlight):
                                        <li>{{$highlight->description}}</li>
                                        @endforeach;
                                    </ul>
                                @endif;
                            </div>
                            @if($project->url):
                                <div class="p-6 pt-0">
                                    <x-anchor-button mode="outlined" href="{{$project->url}}">
                                        Saber mais.
                                    </x-anchor-button>
                                </div>
                            @endif;
                        </div>
                    </div>
                @endforeach;
            </section>
        @endisset;
        @isset($employments):
            <section>
                <h2 id="employments">Experiências Profissionais</h2>
                @foreach($employments as $employment):
                    <div class="grid grid-cols-6 p-5 gap-y-2">
                        <div>
                            @if($employment->photo):
                                <img src="{{$employment->photo}}" alt="{{$employment->name}}"
                                     class="max-w-16 max-h-16 rounded-full" />
                            @else:
                                <span class="material-icons">&#xe943;</span>
                            @endif;
                        </div>
                        <div class="col-span-5 md:col-span-4 ml-4">

                            <h4 class="text-sky-500 font-bold text-xs"> {{$employment->name}} </h4>

                            <p class="text-gray-600 font-bold"> {{$employment->address}} </p>

                            @if($highlights = $employment->highlights):
                                <ul class="text-gray-400">
                                    @foreach($highlights as $highlight):
                                        <li>{{$highlight->description}}</li>
                                    @endforeach;
                                </ul>
                            @endif;
                        </div>
                        <div class="flex col-start-2 ml-4 md:col-start-auto md:ml-0 md:justify-end">
                            <p class="rounded-lg text-sky-500 font-bold bg-sky-100  py-1 px-3 text-sm w-fit h-fit">
                                {{$employment->start}} - {{$employment->end??'atualmente'}} </p>
                        </div>
                    </div>
                @endforeach;
            </section>
        @endisset;
        @isset($education):
            <section>
                <h2 id="education">Educação</h2>
                @foreach($education as $course):
                    <div class="grid grid-cols-6 p-5 gap-y-2">
                        <div>
                            @if($course->photo):
                                <img src="{{$course->photo}}" alt="{{$course->name}}"
                                     class="max-w-16 max-h-16 rounded-full" />
                            @else:
                                <span class="material-icons">&#xe80c;</span>
                            @endif;
                        </div>
                        <div class="col-span-5 md:col-span-4 ml-4">
                            <h4 class="text-sky-500 font-bold text-xs"> {{$course->name}} </h4>
                            <p class="text-gray-600 font-bold"> {{$course->school}} </p>
                            <p class="text-gray-600 font-bold"> {{$course->address}} </p>
                        </div>
                        <div class="flex col-start-2 ml-4 md:col-start-auto md:ml-0 md:justify-end">
                            <p class="rounded-lg text-sky-500 font-bold bg-sky-100  py-1 px-3 text-sm w-fit h-fit">
                                {{$course->start}} - {{$course->end??'atualmente'}} </p>
                        </div>
                    </div>
                @endforeach;
            </section>
        @endisset;
        @if($certifications):
            <section>
                <h2 id="certifications">Certificações</h2>
                @foreach($certifications as $certification):
                    <div class="flex h-screen items-center justify-center bg-indigo-50 px-4">
                        <div class="max-w-sm overflow-hidden rounded-xl bg-white shadow-md duration-200 hover:scale-105 hover:shadow-xl">
                            @if($certification->photo):
                                <img src="{{$certification->photo}}" alt="{{$certification->name}}" class="h-auto w-full"/>
                            @endif;
                            <div class="p-5">
                                <h4 class="font-bold mb-5 text-gray-700">{{$certification->name}}</h4>
                                <p class="font-semibold mb-5 text-gray-700">{{$certification->school}}</p>
                                <p class="text-gray-600">{{$certification->year}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach;
            </section>
        @endif;
    </main>
    <footer>
        <div>
            <h2>Me Siga</h2>
            <div>
                <p><span class="material-icons">&#xE0BE;</span> {{$email}}</p>
                <a href="mailto:{{$email}}" class="bg-white sticky duration-500 border-2 border-blue-500 w-12 transform hover:-translate-y-3 h-12 text-2xl rounded-full hover:bg-blue-500 hover:text-white text-blue-500">
                    <span class="material-icons">&#xE0CD;</span></a>
                @isset($phone):
                    <a href="tel:{{$phone}}" class="bg-white sticky duration-500 border-2 border-blue-500 w-12 transform hover:-translate-y-3 h-12 text-2xl rounded-full hover:bg-blue-500 hover:text-white text-blue-500">
                        <span class="material-icons">&#xE0BE;</span>
                    </a>
                @endisset;
                @isset($address):
                    <a href="https://www.google.com/maps/search/{{urlencode($address)}}/" class=bg-white sticky duration-500 border-2 border-blue-500 w-12 transform hover:-translate-y-3 h-12 text-2xl rounded-full hover:bg-blue-500 hover:text-white text-blue-500">
                        <span class="material-icons">&#xE55F;</span>
                    </a>
                @endisset;
                @if($links):
                    @foreach($links as $link):
                        <a href="{{$link->url}}" class="bg-white sticky duration-500 border-2 border-blue-500 w-12 transform hover:-translate-y-3 h-12 text-2xl rounded-full hover:bg-blue-500 hover:text-white text-blue-500">
                            @if($link->type):
                                <i class="icon ion-social-{{$link->type}}"></i>
                            @else:
                                <span class="material-icons">&#xE157;</span>
                            @endif;
                        </a>
                    @endforeach;
                @endif;
            </div>
        </div>
        <hr class="my-6 border-gray-200 sm:mx-auto lg:my-8" />
        <span class="block text-sm text-gray-500 sm:text-center">&copy; 2025 ResuméCV All Rights Reserved.</span>
    </footer>
</x-template-layout>
