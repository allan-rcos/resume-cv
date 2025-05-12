@props(['title' => null, 'class' => null])

<div class="mx-5 lg:w-6/12 bg-gray-800 shadow-2xl rounded-lg overflow-hidden">
    <div id="header-buttons" class="relative py-3 px-4 flex">
        <div class="rounded-full w-3 h-3 bg-red-400 mr-2"></div>
        <div class="rounded-full w-3 h-3 bg-amber-400 mr-2"></div>
        <div class="rounded-full w-3 h-3 bg-blue-400"></div>
        @isset($title):
            <h3 class="absolute -translate-x-1/2 -translate-y-1/2 left-1/2 top-1/2">{{$title}}</h3>
        @endisset;
    </div>
    <div class="{{'py-4 px-4 mt-1 text-white text-xl ' . ($class??'')}}" {{$attributes}}>
        {{$slot}}
    </div>
</div>
