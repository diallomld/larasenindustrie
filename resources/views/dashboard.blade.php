<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mon Tableau De Bord') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @if(session()->has('success'))
                    <div class="flex justify-center items-center m-1 font-medium py-1 px-2 bg-white rounded-md text-green-700 bg-green-100 border border-green-300 ">
                        <div slot="avatar">
                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle w-5 h-5 mx-2">
                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                <polyline points="22 4 12 14.01 9 11.01"></polyline>
                            </svg>
                        </div>
                        <div class="text-xl font-normal  max-w-full flex-initial">
                            {{ session()->get('success') }}
                        </div>
                        <div class="flex flex-auto flex-row-reverse">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x cursor-pointer hover:text-green-400 rounded-full w-5 h-5 ml-2">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </div>
                        </div>
                    </div>
                @endif
                <!-- debut-->
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    
                    <div class="mt-6 text-gray-800">
                        Liste de Mes Annonces
                    </div>
                </div>

                <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
                    
                    @foreach (Auth::user()->ads as $annonce)
                        <!-- component -->
                        <div class="py-6 px-6">
                        <div class="flex max-w-md bg-white shadow-lg rounded-lg overflow-hidden">
                        
                            @if (isset($annonce->image))
                                <img class="w-1/3 rounded" alt="{{$annonce->title}}" src="{{ asset('storage/'.$annonce->image) }}">
                            @else
                                <img class="w-1/3 rounded" src="http://placehold.it/300x200">
                            @endif
                            <div class="w-2/3 p-4">
                            <h1 class="text-gray-900 font-bold text-2xs">{{ substr($annonce->title,0,30)."..."}}</h1>
                            <p class="mt-2 text-gray-600 text-sm">{{ substr($annonce->content,0,30)."..." }}</p>
                            <div class="flex item-center mt-2">
                                
                            </div>
                            <div class="flex item-center justify-between mt-5">
                                <h1 class="text-gray-300 text-xl">{{ $annonce->prix}} FCFA</h1>
                                <a href="{{ route('annonce.edit', $annonce->id)}}" class="px-1 py-2 bg-gray-800 text-white text-xs font-bold rounded">Modifier</a>
                                <a href="{{ route('annonce.show', $annonce->id)}}" class="px-1 py-2 bg-gray-800 text-white text-xs font-bold rounded">Voir l'annonce</a>
                            </div>
                            </div>
                        </div>
                        </div>
                    @endforeach

                </div>

                <!-- fin-->
            </div>
        </div>
    </div>
</x-app-layout>
