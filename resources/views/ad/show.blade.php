<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('AFICHAGE D ANNONCE') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <section class="text-gray-700 body-font overflow-hidden bg-white">
                    <div class="container px-5 py-10 mx-auto">
                        <livewire:show :annonce="$annonce"/>
                    </div>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>
