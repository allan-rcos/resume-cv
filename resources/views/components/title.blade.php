@props(['level' => '3', 'color' => 'primary'])
<{{'h'.$level}} {{$attributes->merge(['class' => 'text-center font-bold text-4xl my-2 py-5'])}}>
    <span @class([
            'py-2 px-10 border-b-4',
            'border-b-blue-500/50' => $color === 'primary',
            'border-b-amber-500/50' => $color === 'secondary',
            'border-b-red-500/50' => $color === 'danger'
        ])>{{$slot}}</span>
</{{'h'.$level}}>
