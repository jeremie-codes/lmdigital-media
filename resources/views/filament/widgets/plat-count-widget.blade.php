<x-filament-widgets::widget class="fi-account-widget">
    <x-filament::section>
        <div class="items-center gap-x-3">
            <div class="flex-1">
                <h1 class="grid flex-1 text-base font-semibold leading-6 text-gray-500 dark:text-gray-400">
                    Total d'article
                </h1>
            </div>

            <div class="flex items-center gap-x-2">
                <div class="flex-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5}
                        stroke="currentColor" className="size-1">
                        <path strokeLinecap="round" strokeLinejoin="round"
                            d="M6 6.878V6a2.25 2.25 0 0 1 2.25-2.25h7.5A2.25 2.25 0 0 1 18 6v.878m-12 0c.235-.083.487-.128.75-.128h10.5c.263 0 .515.045.75.128m-12 0A2.25 2.25 0 0 0 4.5 9v.878m13.5-3A2.25 2.25 0 0 1 19.5 9v.878m0 0a2.246 2.246 0 0 0-.75-.128H5.25c-.263 0-.515.045-.75.128m15 0A2.25 2.25 0 0 1 21 12v6a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 18v-6c0-.98.626-1.813 1.5-2.122" />
                    </svg>
                </div>

                <div class="flex-1">
                    <h1 class="grid flex-1 text-base font-semibold leading-6 text-gray-500 dark:text-gray-400">
                        Plats
                    </h1>
                </div>

                <div class="flex-1">
                    <x-filament::button color="gray" tag="button" type="submit">
                        <h3>
                            {{ $this->getRapportCount() }}
                        </h3>
                    </x-filament::button>
                </div>
            </div>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
