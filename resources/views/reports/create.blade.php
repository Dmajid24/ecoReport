<x-app-layout>
    <h2>Buat Laporan</h2>

    <form action="{{ route('reports.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <input name="title" placeholder="Judul" class="border p-2 w-full">
        <textarea name="description" placeholder="Deskripsi" class="border p-2 w-full"></textarea>

        <input name="location" placeholder="Lokasi" class="border p-2 w-full">
        <select name="category_id" class="border p-2 w-full">
            <option value="">-- Pilih Kategori --</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        <input type="file" name="photo_before">

        <button class="btn btn-success">Simpan</button>
        @if ($errors->any())
    <div class="bg-red-200 p-2">
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    </div>
@endif

    </form>
</x-app-layout>
