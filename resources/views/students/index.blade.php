@extends('layouts.app')

@section('title', 'Daftar Mahasiswa - by wincarlinn')

@section('content')
<div class="space-y-4">
    <!-- Title Bar & Fast Navigation -->
    <div class="flex items-center justify-between border-b border-sky-200 pb-3">
        <div>
            <h2 class="text-base font-bold text-slate-800 flex items-center gap-2">
                <i class="fa-solid fa-users text-softBluePrimary"></i>
                Daftar Mahasiswa
            </h2>
            <p class="text-xs text-slate-500">Data mahasiswa terdaftar di database.</p>
        </div>
        <div class="flex gap-2">
            <a href="{{ route('laporbanjir.index') }}" class="bg-softBluePrimary hover:bg-blue-600 text-white text-xs px-3.5 py-2 rounded-lg font-medium shadow-sm transition flex items-center gap-1.5">
                <i class="fa-solid fa-list-check"></i> LaporBanjir
            </a>
        </div>
    </div>

    <!-- Table Container -->
    <div class="bg-white rounded-xl shadow-sm border border-sky-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-xs">
                <thead>
                    <tr class="bg-softBluePrimary text-white uppercase text-[11px] font-semibold tracking-wider">
                        <th class="py-2.5 px-4">ID</th>
                        <th class="py-2.5 px-4">Nama</th>
                        <th class="py-2.5 px-4">Email / NIM</th>
                        <th class="py-2.5 px-4">Jurusan</th>
                        <th class="py-2.5 px-4 text-center">Umur</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-sky-50 text-slate-700">
                    @php
                        $dataMhs = $mahasiswa ?? $students ?? [];
                    @endphp

                    @if(count($dataMhs) > 0)
                        @foreach($dataMhs as $mhs)
                            @php
                                $id = is_array($mhs) ? ($mhs['id'] ?? '-') : ($mhs->id ?? '-');
                                $nama = is_array($mhs) ? ($mhs['nama'] ?? '-') : ($mhs->nama ?? '-');
                                $emailNim = is_array($mhs) ? ($mhs['email'] ?? $mhs['nim'] ?? '-') : ($mhs->email ?? $mhs->nim ?? '-');
                                $jurusan = is_array($mhs) ? ($mhs['jurusan'] ?? '-') : ($mhs->jurusan ?? '-');
                                $umur = is_array($mhs) ? ($mhs['umur'] ?? '-') : ($mhs->umur ?? '-');
                            @endphp
                            <tr class="hover:bg-sky-50/60 transition">
                                <td class="py-2.5 px-4 font-mono font-semibold text-slate-400">{{ $id }}</td>
                                <td class="py-2.5 px-4 font-bold text-slate-800">{{ $nama }}</td>
                                <td class="py-2.5 px-4 text-slate-600">{{ $emailNim }}</td>
                                <td class="py-2.5 px-4">
                                    <span class="bg-softBlueBadge text-softBlueText text-[11px] font-medium px-2 py-0.5 rounded-md border border-sky-200">
                                        {{ $jurusan }}
                                    </span>
                                </td>
                                <td class="py-2.5 px-4 text-center font-medium">{{ $umur }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5" class="py-8 text-center text-slate-400 italic">
                                <i class="fa-solid fa-folder-open text-2xl mb-1 block text-sky-200"></i>
                                Belum ada data mahasiswa.
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection