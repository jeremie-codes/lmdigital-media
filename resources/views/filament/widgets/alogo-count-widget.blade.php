<x-filament-widgets::widget class="fi-account-widget ">
    <x-filament::section class="py-0 bg-white">
        <div class="flex items-center gap-x-3 py-0 flex justify-between">

             <img 
                src="{{ url('images/_logo.png') }}" 
                class=""
                @style('width: 50px;') 
            />
            
            <div class="fle-1">
                <h1 class="grid flex-1 text-base font-semibold leading-6 text-gray-500 dark:text-gray-400">
                    Bon Appétit !
                </h1>
            </div>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
