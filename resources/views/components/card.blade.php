<div class="relative flex w-96 flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-md mx-auto">
    <div {{$attributes->merge(['class' => 'p-6'])}}>
        {{$slot}}
    </div>
    <div class="mb-3 mx-2">
        <x-anchor-button>
            Abrir
        </x-anchor-button>
    </div>
</div>
