@props(['title' => ''])

<details class="w-full bg-white p-4 rounded-xl shadow-md group overflow-hidden max-h-[56px] open:!max-h-none
         transition-[max-height] duration-1000" x-data="{title: '{{$title}}'}">
    <summary
        class="outline-none cursor-pointer focus:text-indigo-600 font-semibold marker:text-transparent relative select-none space-x-2 flex flex-row items-center">
        <span
            class="material-icons w-5 h-5 align-middle transition-transform duration-200 -rotate-90 group-open:rotate-0">&#xE5CF;</span>
        <span x-text="title" class="text-nowrap flex-1 block overflow-hidden focus:underline"></span>
    </summary>

    <hr class="my-2 scale-x-150"/>

    <div class="text-sm -m-4 -mt-2 p-4 bg-gray-50">
        {{$slot}}
    </div>
</details>
