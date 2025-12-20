<x-app-layout>
    <h2>Kategori Sampah</h2>
    

    @foreach($categories as $cat)
        <div>{{ $cat->name }}</div>
    @endforeach

    <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Tambah Kategori</a>
</x-app-layout>
