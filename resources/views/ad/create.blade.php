<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Deposer une annonce') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                
                <x-jet-validation-errors class="mb-4" />

                <form action="{{route('annonce.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div >
                        <x-jet-label for="title">Tire de l'annonce</x-jet-label>
                        <x-jet-input id="title" class="block mt-1 w-full" type="text" name="title" required />
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="content" value="{{ __('Description de l annonce') }}" />
                        <x-jet-input id="content" class="block mt-1 w-full" type="textarea" name="content" />
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="category_id" value="{{ __('Categorie') }}" />
                        <select name="category_id" class="block mt-1 w-full" id="category_id">
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-4">
                        <input type="file" name="image" id="image" class="block mt-1 w-full">
                    </div>
                    <div class="mt-4">
                        <x-jet-label for="prix" value="{{ __('Prix') }}" />
                        <x-jet-input id="prix" class="block mt-1 w-full" type="number" name="prix"  />
                    </div>
                    <div class="mt-4">
                        <x-jet-label for="region_id" value="{{ __('Region') }}" />
                        <select name="region_id" class="block mt-1 w-full" id="region_id">
                            @foreach($regions as $region)
                                <option value="{{ $region->id }}">{{ $region->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-4">
                        <x-jet-label for="adresse" value="{{ __('Adresse') }}" />
                        <x-jet-input id="adresse" class="block mt-1 w-full" type="tel" name="adresse"/>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-jet-button class="ml-4">
                            {{ __('Deposer l\'annonce') }}
                        </x-jet-button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
                