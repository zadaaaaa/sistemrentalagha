@extends('layouts.app')

@section('title', 'Dashboard')
@section('heading', 'Dashboard')
@section('subheading', 'Ringkasan data transaksi rental.')

@section('content')
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
        {{-- Total Kategori --}}
        <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
            <dl>
                <dt class="text-sm font-medium text-slate-500 truncate">Total Kategori</dt>
                <dd class="mt-0.5 text-2xl font-bold text-slate-900">{{ $totalCategories }}</dd>
            </dl>
        </div>

        {{-- Total Barang --}}
        <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
            <dl>
                <dt class="text-sm font-medium text-slate-500 truncate">Total Barang</dt>
                <dd class="mt-0.5 text-2xl font-bold text-slate-900">{{ $totalItems }}</dd>
            </dl>
        </div>

        {{-- Total Pelanggan --}}
        <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
            <dl>
                <dt class="text-sm font-medium text-slate-500 truncate">Total Pelanggan</dt>
                <dd class="mt-0.5 text-2xl font-bold text-slate-900">{{ $totalCustomers }}</dd>
            </dl>
        </div>

        {{-- Total Transaksi --}}
        <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
            <dl>
                <dt class="text-sm font-medium text-slate-500 truncate">Total Transaksi</dt>
                <dd class="mt-0.5 text-2xl font-bold text-slate-900">{{ $totalRentals }}</dd>
            </dl>
        </div>
    </div>

    <div class="mt-6 grid grid-cols-1 gap-4 sm:grid-cols-2">
        {{-- Sewa Berjalan --}}
        <div class="rounded-xl border border-indigo-100 bg-indigo-50 p-5 shadow-sm">
            <dl>
                <dt class="text-sm font-medium text-indigo-700 truncate">Transaksi Sedang Berjalan</dt>
                <dd class="mt-0.5 text-2xl font-bold text-indigo-900">{{ $ongoingRentals }}</dd>
            </dl>
        </div>

        {{-- Sudah Dikembalikan --}}
        <div class="rounded-xl border border-emerald-100 bg-emerald-50 p-5 shadow-sm">
            <dl>
                <dt class="text-sm font-medium text-emerald-700 truncate">Transaksi Dikembalikan</dt>
                <dd class="mt-0.5 text-2xl font-bold text-emerald-900">{{ $returnedRentals }}</dd>
            </dl>
        </div>
    </div>
@endsection