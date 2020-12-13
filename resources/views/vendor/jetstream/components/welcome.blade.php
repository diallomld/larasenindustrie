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
