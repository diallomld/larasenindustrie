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
                            <div class="lg:w-4/5 mx-auto flex flex-wrap">
                                @if (isset($annonce->image))
                                    <img alt="{{$annonce->title}}" class="lg:w-1/2 w-200 object-cover object-center rounded border border-gray-200" src="{{ asset('storage/'.$annonce->image) }}">
                                @else
                                    <img src="http://placehold.it/300x200" class="lg:w-1/2 w-200 object-cover object-center rounded border border-gray-200">
                                @endif
                                <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
                                    <h2 class="text-sm title-font text-gray-500 tracking-widest">Dans la categorie : {{ $annonce->category->name}}</h2>
                                    <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">{{ $annonce->title }}</h1>
                                
                                    <p class="leading-relaxed"><span class="text-gray-900 underline">Description :</span> {{ $annonce->content }}</p>
                                    <div class="sm:mt-2">
                                        <span class="title-font font-medium text-2xl text-gray-500">Prix: {{ $annonce->prix}} FCFA</span>
                                    </div>
                                    <span class="title-font font-medium text-2xl text-gray-500">Addresse:{{ $annonce->adresse}}</span>
                                    <div class="flex sm:space-x-20 sm:mt-2">
                                    <span class="title-font font-medium text-2xl text-gray-500">Region: {{ $annonce->region->name}}</span>
                                    <button class="rounded-full w-10 h-10 bg-gray-200 p-0 border-0 inline-flex items-center justify-center text-gray-500 ml-4">
                                        <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                        <path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"></path>
                                        </svg>
                                    </button>
                                    @if ($annonce->user == Auth::user())
                                    
                                    <a class="rounded bg-gray-200 p-0 border-0 inline-flex items-center justify-center text-gray-800 ml-4" href="{{ route('annonce.edit', $annonce->id)}}">Modifier</a>

                                    @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
            </div>
        </div>
    </div>
</x-app-layout>
