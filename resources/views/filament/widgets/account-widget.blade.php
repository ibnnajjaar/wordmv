<x-filament-widgets::widget class="fi-account-widget">
    <x-filament::section>
        <div class="w-full">
            <div class="flex flex-col sm:flex-row sm:items-center gap-4 sm:gap-6">
                <!-- Avatar -->
                <div class="flex-shrink-0 mx-auto sm:mx-0">
                    <x-filament-panels::avatar.user class="w-24 h-24" :user="$user"/>
                </div>

                <!-- Details -->
                <div class="flex-1 min-w-0 text-center sm:text-left">
                    <h2 class="text-base font-semibold leading-6 text-gray-950 dark:text-white">
                        {{ $greeting }}
                    </h2>

                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                        {{ $affirmationMessage }}
                    </p>

                    <hr class="h-px my-4 bg-gray-200 border-0 dark:bg-gray-700">

                    <div class="space-y-2">
{{--                        <div class="flex items-center justify-center sm:justify-start text-sm">--}}
{{--                            <x-heroicon-c-phone class="h-4 mr-2"/>--}}
{{--                            <span class="break-words">{{ $user->phone_number ?? '—' }}</span>--}}
{{--                        </div>--}}

                        <div class="flex items-center text-gray-700 justify-center sm:justify-start text-sm">
                            <x-heroicon-c-envelope-open class="h-4 mr-2"/>
                            <span class="truncate block max-w-full break-words">
                                {{ $user->email ?? '—' }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
