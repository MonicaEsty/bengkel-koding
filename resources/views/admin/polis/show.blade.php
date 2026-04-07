<x-layouts.app title="Detail Poli">

    {{-- Header --}}
    <div class="flex items-center gap-3 mb-6">
        <a href="{{ route('polis.index') }}" class="inline-flex items-center justify-center w-9 h-9 
                  rounded-lg bg-slate-100 text-slate-500 
                  hover:bg-slate-200 transition">
            <i class="fas fa-arrow-left text-sm"></i>
        </a>
        <h2 class="text-2xl font-bold text-slate-800">
            Detail Poli
        </h2>
    </div>

    {{-- Card --}}
    <div class="card bg-base-100 shadow-md rounded-2 border">
        <div class="card-body p-6">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- Nama Poli --}}
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-semibold text-slate-600">Nama Poli</span>
                    </label>
                    <div class="p-3 bg-slate-50 rounded-lg border">
                        <span class="text-slate-800">{{ $poli->nama_poli }}</span>
                    </div>
                </div>

                {{-- Keterangan --}}
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-semibold text-slate-600">Keterangan</span>
                    </label>
                    <div class="p-3 bg-slate-50 rounded-lg border min-h-[3rem]">
                        <span class="text-slate-800">{{ $poli->keterangan ?? 'Tidak ada keterangan' }}</span>
                    </div>
                </div>

            </div>

            {{-- Actions --}}
            <div class="flex justify-end gap-3 mt-8">
                <a href="{{ route('polis.edit', $poli->id) }}" class="btn btn-warning">
                    <i class="fas fa-pen-to-square"></i>
                    Edit
                </a>
                <form action="{{ route('polis.destroy', $poli->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-error" 
                            onclick="return confirm('Yakin ingin menghapus poli ini?')">
                        <i class="fas fa-trash"></i>
                        Hapus
                    </button>
                </form>
            </div>

        </div>
    </div>

</x-layouts.app>
