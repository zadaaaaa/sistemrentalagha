@extends('layouts.app')

@section('title', 'Detail Barang')
@section('heading', 'Detail Barang')
@section('subheading', 'Informasi lengkap barang.')

@section('actions')
    <a href="{{ route('items.index') }}" class="btn btn-outline-secondary btn-sm">
        &larr; Kembali
    </a>
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm border-0">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between py-3 px-4">
                        <span class="text-muted">Kode</span>
                        <span class="font-monospace fw-semibold">{{ $item->code }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between py-3 px-4">
                        <span class="text-muted">Nama</span>
                        <span class="fw-semibold">{{ $item->name }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between py-3 px-4">
                        <span class="text-muted">Kategori</span>
                        <span>{{ $item->category->name ?? '-' }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between py-3 px-4">
                        <span class="text-muted">Harga per Hari</span>
                        <span>Rp {{ number_format($item->price_per_day, 0, ',', '.') }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between py-3 px-4">
                        <span class="text-muted">Stok</span>
                        <span>{{ $item->stock }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between py-3 px-4">
                        <span class="text-muted">Status</span>
                        <span>{{ ucfirst($item->status) }}</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
