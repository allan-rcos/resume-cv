@props(['label'])

<label>
    <input {{$attributes->merge(['class' => 'peer hidden', 'type' => 'radio'])}}>

    <div
        class="hover:bg-gray-50 flex items-center justify-between px-4 py-2 border-2 rounded-lg cursor-pointer text-sm border-gray-200 group peer-checked:border-blue-500">
        <h2 class="font-medium text-gray-700">{{$label}}</h2>
        <span
            class="material-icons w-9 h-9 text-blue-600 border-4 text-xl border-blue-600 invisible group-[.peer:checked+&]:visible">&#xe876;</span>
    </div>
</label>
