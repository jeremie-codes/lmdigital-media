<div>
    <!-- The biggest battle is the war against ignorance. - Mustafa Kemal Atatürk -->
    @props(['href', 'active' => false])

    <a href="{{ $href }}" {{ $attributes->merge(['class' => $active ? 'text-blue-600 font-bold' : 'text-gray-600']) }}>
        {{ $slot }}
    </a>

</div>
