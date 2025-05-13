<p
    {{$attributes->merge([
    'class' => 'text-sm text-green-500',
    'x-data' => '{ show: true }',
    'x-show' => 'show',
    'x-transition',
    'x-init' => 'setTimeout(() => show = false, 5000)'
    ])}}>{{ $slot }}</p>
