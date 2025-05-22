@props(['label' => 'Default range'])

<label @isset($id) for="{{$id}}" @endisset x-data="{ value: '50' }">
    <span class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
        {{$label}} <span class="text-xs">(<span x-text="value"></span>)</span>
    </span>
    <input x-model="value" {{$attributes->merge(['type' => 'range',
        'class' => 'w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700'])}}>
</label>
