@props(['id'])
<header {{$attributes}}>
    <h2 @isset($id) id="{{$id}}" @endisset class="text-lg font-medium text-gray-900">
        {{ $title }}
    </h2>

    @isset($description)
        <p class="mt-1 text-sm text-gray-600">
            {{ $description }}
        </p>
    @endisset
</header>
