@props(['plan'])

<div class="flex w-full max-w-80 flex-col bg-clip-border rounded-xl bg-gradient-to-tr from-white to-gray-50 shadow-gray-900/20 shadow-md p-8">
    <div class="pb-8 m-0 mb-8 overflow-hidden text-center text-gray-300 bg-transparent border-b rounded-none shadow-none bg-clip-border border-black/10">
        <p class="block font-sans text-sm antialiased font-normal leading-normal uppercase"> {{$plan['name']}} </p>
        <h4 class="flex justify-center gap-1 mt-6 font-sans antialiased font-normal tracking-normal text-black text-4xl">
            <span class="text-2xl mt-2">R$</span>{{$plan['price']}}
            <span class="text-2xl self-end">/mês</span>
        </h4>
    </div>
    <div class="p-0 h-48">
        <ul class="flex flex-col gap-4">
            @foreach($plan['benefits'] as $benefit)
                <li class="flex items-center gap-4">
                    <span class="material-icons text-blue-500">&#xE92D;</span>
                    <p class="block font-sans text-base antialiased font-normal leading-relaxed"> {{$benefit}} </p>
                </li>
            @endforeach
            @foreach($plan['require'] as $benefit)
                <li class="flex items-center gap-4">
                    <span class="material-icons text-orange-500">&#xE92D;</span>
                    <p class="block font-sans text-base antialiased font-normal leading-relaxed"> {{$benefit}} </p>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="p-0 mt-12 mx-auto">
        <x-anchor-button href="{{route('register')}}" :disabled="!$plan['active']">
            Contratar
        </x-anchor-button>
    </div>
</div>
