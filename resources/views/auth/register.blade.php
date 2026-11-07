@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto bg-white p-6 rounded-xl shadow-md border border-slate-100">
    <h2 class="text-xl font-bold text-softBlueHeader mb-4 flex items-center gap-2">
        <i class="fa-solid fa-user-plus text-emerald-600"></i> Register Petugas Baru
    </h2>

    <form action="{{ route('register') }}" method="POST" class="space-y-4 text-xs">
        @csrf
        <div>
            <label class="block font-semibold text-slate-700 mb-1">Nama Lengkap</label>
            <input type="text" name="name" value="{{ old('name') }}" required 
                class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-softBluePrimary">
            @error('name') 
                <span class="text-red-500 text-[11px] mt-1 block">{{ $message }}</span> 
            @enderror
        </div>

        <div>
            <label class="block font-semibold text-slate-700 mb-1">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" required 
                class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-softBluePrimary">
            @error('email') 
                <span class="text-red-500 text-[11px] mt-1 block">{{ $message }}</span> 
            @enderror
        </div>

        <div>
            <label class="block font-semibold text-slate-700 mb-1">Password</label>
            <input type="password" name="password" required 
                class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-softBluePrimary">
            @error('password') 
                <span class="text-red-500 text-[11px] mt-1 block">{{ $message }}</span> 
            @enderror
        </div>

        <div>
            <label class="block font-semibold text-slate-700 mb-1">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" required 
                class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-softBluePrimary">
        </div>

        <button type="submit" 
            class="w-full py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white font-semibold rounded-lg transition shadow-sm">
            Daftar Akun
        </button>
    </form>
</div>
@endsection