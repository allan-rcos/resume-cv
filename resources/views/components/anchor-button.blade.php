@props(['color' => 'primary', 'mode' => 'filled', 'disabled' => false])

<a {{$attributes}} @class([
    'text-center mr-3 rounded-lg py-3 px-6 font-sans text-xs font-bold uppercase shadow-md shadow-blue-500/20 transition-all hover:shadow-lg focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none',
    'pointer-events-none opacity-50 shadow-none' => $disabled,
    'bg-blue-500 text-white hover:shadow-blue-500/40' => ($color === 'primary' && $mode === 'filled'),
    'bg-amber-500 text-white hover:shadow-amber-500/40' => ($color === 'secondary' && $mode === 'filled'),
    'bg-red-500 text-white hover:shadow-red-500/40' => ($color === 'danger' && $mode === 'filled'),
    'border border-blue-500 text-blue-500 hover:opacity-75 shadow-none hover:shadow-none focus:ring focus:ring-blue-200' => ($color === 'primary' && $mode === 'outlined'),
    'border border-amber-500 text-amber-500 hover:opacity-75 shadow-none hover:shadow-none focus:ring focus:ring-amber-200' => ($color === 'secondary' && $mode === 'outlined'),
    'border border-red-500 text-red-500 hover:opacity-75 shadow-none hover:shadow-none focus:ring focus:ring-red-200' => ($color === 'danger' && $mode === 'outlined')
]) @disabled($disabled)>
    {{$slot}}
</a>
