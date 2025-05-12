<x-main-layout>
    <x-slot:title>Bem Vindo!</x-slot:title>
    <header class="h-screen bg-gradient-to-r from-cyan-500 to-blue-700 flex items-center">
        <div class="text-white w-1/2 ml-3 flex flex-col gap-5 items-start">
            <p class="font-semibold text-2xl">Currículos e Resumes</p>
            <h2 class="font-bold text-5xl">Tenha visibilidade em qualquer lugar, a qualquer instante!</h2>
            <p class="font-semibold text-2xl">Compartilhe, organize, direcione e divulgue suas informações profissionais.</p>
            <div class="mt-5">
                <x-anchor-button href="{{route('register')}}" color="secondary">Se inscrever</x-anchor-button>
            </div>
        </div>
        <div>
            <img src="{{asset('assets/images/interview.webp')}}" class="h-[35rem]" alt="Interview">
        </div>
    </header>
    <section class="border-b-2 border-b-gray-200 py-10">
        <x-title>Vantagens</x-title>
        <div class="grid grid-cols-2 max-w-[1000px] mx-auto my-5">
            <div class="mt-10">
                <h4 class="font-bold text-3xl mb-2">Varie seus modelos</h4>
                <p>
                    Automatize a criação de currículos, utilizando diferentes modelos de Resumé sem complicações.
                    Os dados do usuário podem ser salvos e utilizados simultâneamente em vários modelos, com
                    atualização simultânea.
                </p>
            </div>
            <div>
                <img src="{{asset('assets/images/multiple.svg')}}" class="h-80" alt="Mantenha múltiplas empresas como alvo, sem perder a praticidade.">
            </div>
            <div>
                <img src="{{asset('assets/images/resume.svg')}}" class="h-80"  alt="Não seja desqualificado por excesso de informações.">
            </div>
            <div class="mt-10">
                <h4 class="font-bold text-3xl mb-2">Mantenha o resumo conciso</h4>
                <p>
                    Apresente informações direcionadas a uma vaga específica, sem precisar refazer o documento.
                    Excesso de informações pode causar desqualificação por inconsistência, utilizando a geração de
                    Resumés. Esses poderão conter apenas a informação que for julgada necessária e tudo em apenas um click.
                </p>
            </div>
        </div>
    </section>
    <section class="border-b-2 border-b-gray-200 py-10">
        <x-title>Exemplos</x-title>
        <div class="columns-3">
            {{--@foreach($examples as $example)
                <a href="{{$example['link']}}">
                    <x-card>
                        <span class="text-base font-light leading-relaxed text-inherit antialiased text-gray-500"> {{$example['career']}} </span>
                        <h5 class="mb-2 block font-sans text-xl font-semibold leading-snug tracking-normal text-gray-900 antialiased">
                            {{$example['name']}}
                        </h5>
                        <p class="block font-sans text-base font-light leading-relaxed text-inherit antialiased">
                            {{$example['description']}}
                        </p>
                    </x-card>
                </a>
            @endforeach--}}
        </div>
    </section>
    <section class="border-b-2 border-b-gray-200 py-10 bg-gray-200">
        <x-title id="pricing">Preços</x-title>
        <div class="flex justify-center items-center min-h-screen gap-5">
            @foreach(config('pricing') as $plan)
                <div class="max-w-[720px] h-max">
                    <x-price-card :plan="$plan"/>
                </div>
            @endforeach
        </div>
    </section>
    <section class="border-b-2 border-b-gray-200 py-10 bg-gradient-to-r from-cyan-500 to-blue-700 text-white text-center min-h-72">
        <x-title color="secondary">Comece Agora!</x-title>
        <h4 class="mb-5">Comece a se destacar com nosso plano gratuito</h4>
        <x-anchor-button href="#" color="secondary">Registrar</x-anchor-button>
    </section>
</x-main-layout>
