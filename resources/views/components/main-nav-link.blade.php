@props(['route'=>'/'])
@php($active = request()->routeIs($route))
<li>
    <a href="{{route($route)}}"
       class="nav-link {{$active ? 'nav-link-active':'nav-link-inactive'}}"
       aria-current="{{$active?'page':'false'}}">
        {{$slot}}
    </a>
</li>
