<x-app-layout>
    <div class="max-w-3xl mx-auto mt-8 bg-green-800 shadow rounded-lg p-6">
        
        {{-- Title --}}
        <h2 class="text-xl font-semibold text-white mb-6">
            Create Environmental Report
        </h2>

        <form action="{{ route('reports.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf

            {{-- Report Title --}}
            <div>
                <label class="block text-sm font-medium text-white mb-1">
                    Report Title
                </label>
                <input 
                    type="text" 
                    name="title" 
                    class="w-full border rounded-md p-2 focus:ring focus:ring-green-200"
                    placeholder="Enter report title"
                    value="{{ old('title') }}"
                >
            </div>

            {{-- Issue Category --}}
            <div>
                <label class="block text-sm font-medium text-white mb-1">
                    Issue Category
                </label>
                <select 
                    name="category_id" 
                    class="w-full border rounded-md p-2 focus:ring focus:ring-green-200"
                >
                    <option value="">-- Select Category --</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Campus Location --}}
            <div>
                <label class="block text-sm font-medium text-white mb-1">
                    Campus Location
                </label>
                <input 
                    type="text" 
                    name="location" 
                    class="w-full border rounded-md p-2 focus:ring focus:ring-green-200"
                    placeholder="Enter location"
                    value="{{ old('location') }}"
                >
            </div>

            {{-- Description --}}
            <div>
                <label class="block text-sm font-medium text-white mb-1">
                    Description
                </label>
                <textarea 
                    name="description" 
                    rows="4"
                    class="w-full border rounded-md p-2 focus:ring focus:ring-green-200"
                    placeholder="Describe the issue"
                >{{ old('description') }}</textarea>
            </div>

            {{-- Upload Photo --}}
            <div>
                <label class="block text-sm font-medium text-white mb-2">
                    Upload Photo
                </label>
            
                <label
                    for="photo_before"
                    class="flex flex-col bg-white items-center justify-center border-2 border-dashed rounded-lg p-6 cursor-pointer hover:bg-gray-50"
                >
                    <svg class="w-8 h-8 text-gray-400 mb-2" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M7 16V4a1 1 0 011-1h8a1 1 0 011 1v12m-5-4l-3 3m0 0l-3-3m3 3V9" />
                    </svg>
            
                    <span id="fileText" class="text-sm text-black text-center">
                        Drag & drop or click to upload photo <br>
                        JPG, PNG | Max 5MB
                    </span>
            
                    <input
                        type="file"
                        id="photo_before"
                        name="photo_before"
                        accept="image/png, image/jpeg"
                        class="hidden"
                        onchange="handleFile(this)"
                    >
                </label>
            
                {{-- Preview --}}
                <img id="preview" class="hidden mt-3 max-h-48 rounded border">
            </div>
            

            {{-- Buttons --}}
            <div class=" flex justify-end gap-3 pt-4">
                <a href="{{ route('reports.index') }}"
                   class="btn-sub px-4 py-2 rounded-md text-black-600 hover:text-white bg-red-100 hover:bg-red-500">
                    Cancel
                </a>
                <button type="submit"
                        class="px-5 py-2 bg-green-300 text-black hover:text-white rounded-md hover:bg-green-700">
                    Submit Report
                </button>
            </div>

            {{-- Validation Errors --}}
            @if ($errors->any())
                <div class="bg-red-100 border border-red-300 text-red-700 p-3 rounded">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

        </form>
        <script>
            function handleFile(input) {
                const file = input.files[0];
                const text = document.getElementById('fileText');
                const preview = document.getElementById('preview');
            
                if (!file) return;
            
                // Validasi ukuran (5MB)
                if (file.size > 5 * 1024 * 1024) {
                    alert('Ukuran file maksimal 5MB');
                    input.value = '';
                    text.innerHTML = 'Drag & drop or click to upload photo <br> JPG, PNG | Max 5MB';
                    preview.classList.add('hidden');
                    return;
                }
            
                // Validasi tipe
                if (!['image/jpeg', 'image/png'].includes(file.type)) {
                    alert('Hanya file JPG atau PNG yang diperbolehkan');
                    input.value = '';
                    return;
                }
            
                // Tampilkan nama file
                text.innerHTML = `<strong>${file.name}</strong>`;
            
                // Preview gambar
                const reader = new FileReader();
                reader.onload = e => {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            }
            </script>
            
    </div>
</x-app-layout>
