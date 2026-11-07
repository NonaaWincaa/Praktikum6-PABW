@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto bg-white p-6 rounded-xl shadow-md border border-slate-100">
    <h2 class="text-xl font-bold text-softBlueHeader mb-4 flex items-center gap-2">
        <i class="fa-solid fa-right-to-bracket text-softBluePrimary"></i> Login Petugas BPBD
    </h2>

    @if(session('success'))
        <div class="mb-4 p-3 bg-emerald-50 text-emerald-700 text-xs rounded-lg border border-emerald-200">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('login') }}" method="POST" class="space-y-4 text-xs">
        @csrf
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
        </div>

        <button type="submit" 
            class="w-full py-2.5 bg-softBluePrimary hover:bg-blue-700 text-white font-semibold rounded-lg transition shadow-sm">
            Login
        </button>
    </form>
</div>
@endsection