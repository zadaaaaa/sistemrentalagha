@extends('layouts.app')

@section('title', 'Tambah Kategori')
@section('heading', 'Tambah Kategori')
@section('subheading', 'Isi nama kategori baru.')

@section('content')
    <div class="mx-auto max-w-xl rounded-xl border border-slate-200 bg-white p-8 shadow-sm">
        <form action="{{ route('categories.store') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label for="name" class="block text-sm font-semibold text-slate-700">Nama Kategori</label>
                <div class="mt-1">
                    <input type="text" name="name" id="name" value="{{ old('name') }}"
                           class="block w-full rounded-xl border px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500
                                  {{ $errors->has('name') ? 'border-rose-400 focus:ring-rose-200' : 'border-slate-300' }}"
                           placeholder="Contoh: Elektronik">
                    @error('name')
                        <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex items-center gap-3 pt-4">
                <button type="submit"
                        class="inline-flex items-center gap-2 rounded-xl bg-indigo-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm transition-all duration-150 hover:bg-indigo-700 hover:shadow-md">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    Simpan
                </button>
                <a href="{{ route('categories.index') }}"
                   class="inline-flex items-center gap-2 rounded-xl border px-5 py-2.5 text-sm font-semibold text-slate-600 shadow-sm transition-all duration-150 hover:bg-slate-50 hover:border-slate-300">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Batal
                </a>
            </div>
        </form>
    </div>
@endsection