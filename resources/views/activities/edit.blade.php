<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Activities') }}</h2>

            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                <?php $filters = ['employments', 'education', 'projects', 'certifications']; ?>
                <?php $filter = request()->query('filter'); ?>
                <?php $show_all = !in_array($filter, $filters); ?>
                <x-nav-link :href="route('activities')" :active="$show_all">{{ __('All') }}</x-nav-link>
                <x-nav-link :href="route('activities', ['filter' => $filters[0]])"
                            :active="$filter === $filters[0]">{{ __('Employments') }}</x-nav-link>
                <x-nav-link :href="route('activities', ['filter' => $filters[1]])"
                            :active="$filter === $filters[1]">{{__("Education")}}</x-nav-link>
                <x-nav-link :href="route('activities', ['filter' => $filters[2]])"
                            :active="$filter === $filters[2]">{{__("Projects")}}</x-nav-link>
                <x-nav-link :href="route('activities', ['filter' => $filters[3]])"
                            :active="$filter === $filters[3]">{{__("Certifications")}}</x-nav-link>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            @if($show_all || $filter === $filters[0])
                <!--Employments-->
                <div class="max-w-xl">@include('activities.partials.employments-form')</div>
            @endif

            @if($show_all || $filter === $filters[1])
                <!--Education-->
                <div class="max-w-xl">@include('activities.partials.education-form')</div>
            @endif

            @if($show_all || $filter === $filters[2])
                <!--Projects-->
                <div class="max-w-xl">@include('activities.partials.projects-form')</div>
            @endif

            @if($show_all || $filter === $filters[3])
                <!--Certifications-->
                <div class="max-w-xl">@include('activities.partials.certifications-form')</div>
            @endif
        </div>
    </div>
</x-app-layout>
