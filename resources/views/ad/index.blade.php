<x-app-layout>
    <x-slot name="header">
        <div class="flex">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Les Dernieres Annonces') }}
        </h2>
        <form action="{{ route('annonce.search')}}">
            <input value="{{ request()->search ?? '' }}" type="text" name="search" id="" class="form-input sm:ml-5 md:ml-10 lg:ml-20" placeholder="rechercher...">
            
            <button type="submit" class="btn-outline-secondary focus:outline-none hover:bg-blue-500 rounded sm:ml-5 md:ml-10 lg:ml-20">Rechercher</button>
        </form>
        </div>
        
        <livewire:flash/>
    </x-slot>
    <style>
        [x-cloak] { display: none; }
    </style>
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                
                <section class="text-gray-700 body-font overflow-hidden bg-white">
                    <div class="container px-5 py-12 mx-auto">
                        
                        @foreach($annonces as $annonce)
                            
                            <livewire:ad :annonce="$annonce"/>
                                
                        @endforeach
                        
                    </div>
                </section>
                    <!--end-->
            </div>
        </div>
    </div>
</x-app-layout>
