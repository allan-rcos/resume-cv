<button {{ $attributes->merge(['type' => 'submit', 'class' => 'text-center mr-3 rounded-lg py-3 px-6 font-sans text-xs font-bold uppercase shadow-md shadow-blue-500/20 transition-all hover:shadow-lg focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none bg-blue-500 text-white hover:shadow-blue-500/40']) }}>
    {{ $slot }}
</button>
