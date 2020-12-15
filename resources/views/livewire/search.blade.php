<div>
    <form action="{{ route('annonce.search')}}" method="POST">
        <input type="text" name="search" id="" class="form-input sm:ml-5 md:ml-10 lg:ml-20" placeholder="rechercher...">
        @error('search') <span class="error">{{ $message }}</span> @enderror
        <button type="submit" class="btn-outline-secondary focus:outline-none hover:bg-blue-500 rounded sm:ml-5 md:ml-10 lg:ml-20">Rechercher</button>
    </form>
</div>
