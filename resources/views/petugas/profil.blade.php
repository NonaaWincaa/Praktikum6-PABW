@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto bg-white p-6 rounded-xl shadow-md border border-slate-100">
    <h2 class="text-xl font-bold text-softBlueHeader mb-4 flex items-center gap-2">
        <i class="fa-solid fa-user-gear text-softBluePrimary"></i> Profil Petugas BPBD
    </h2>

    <div class="space-y-3 text-xs divide-y divide-slate-100">
        <div class="pt-2">
            <span class="text-slate-400 block mb-0.5">Nama Petugas</span>
            <span class="font-semibold text-slate-800 text-sm">{{ Auth::user()->name }}</span>
        </div>
        <div class="pt-2">
            <span class="text-slate-400 block mb-0.5">Alamat Email</span>
            <span class="font-semibold text-slate-800 text-sm">{{ Auth::user()->email }}</span>
        </div>
        <div class="pt-2">
            <span class="text-slate-400 block mb-0.5">Waktu Pembuatan Akun</span>
            <span class="font-semibold text-slate-800 text-sm">{{ Auth::user()->created_at->format('d M Y, H:i') }} WIB</span>
        </div>
    </div>
</div>
@endsection