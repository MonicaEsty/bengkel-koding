<x-layouts.app title="Tambah Poli">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-6 flex items-center gap-4">
                <a href="{{ route('polis.index') }}" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-arrow-left"></i>
                </a>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Tambah Poli
                </h2>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl p-8">
                <form action="{{ route('polis.store') }}" method="POST">
                    @csrf
                    
                    <div class="grid grid-cols-1 gap-6">
                        {{-- Input Nama Poli --}}
                        <div>
                            <label for="nama_poli" class="block text-sm font-medium text-gray-700 mb-2">
                                Nama Poli <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="nama_poli" id="nama_poli" 
                                value="{{ old('nama_poli') }}"
                                class="w-full border-gray-200 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 placeholder-gray-400"
                                placeholder="Masukkan nama poli..." required>
                            @error('nama_poli')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Input Keterangan --}}
                        <div>
                            <label for="keterangan" class="block text-sm font-medium text-gray-700 mb-2">
                                Keterangan
                            </label>
                            <textarea name="keterangan" id="keterangan" rows="3"
                                class="w-full border-gray-200 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 placeholder-gray-400"
                                placeholder="Masukkan keterangan poli...">{{ old('keterangan') }}</textarea>
                            @error('keterangan')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-8 flex gap-3">
                        <button type="submit" class="bg-indigo-900 hover:bg-indigo-800 text-white font-semibold py-2 px-6 rounded-lg flex items-center gap-2 transition-all">
                            <i class="fas fa-save"></i> Simpan
                        </button>
                        <a href="{{ route('polis.index') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-600 font-semibold py-2 px-6 rounded-lg transition-all">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.app>