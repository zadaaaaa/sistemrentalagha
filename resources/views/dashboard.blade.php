@extends('layouts.app')

@section('title', 'Dashboard - Sistem Rental Agha')
@section('heading', 'Dashboard')

@section('content')
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <p class="text-muted small text-uppercase fw-semibold mb-1">Total Kategori</p>
                    <h2 class="display-6 fw-bold text-primary mb-3">{{ $totalKategori }}</h2>
                    <a href="{{ route('categories.index') }}" class="btn btn-sm btn-outline-primary">
                        Kelola Kategori &rarr;
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <p class="text-muted small text-uppercase fw-semibold mb-1">Total Barang</p>
                    <h2 class="display-6 fw-bold text-success mb-3">{{ $totalBarang }}</h2>
                    <a href="{{ route('items.index') }}" class="btn btn-sm btn-outline-success">
                        Kelola Barang &rarr;
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4 d-flex flex-column justify-content-between">
                    <div>
                        <h5 class="fw-bold text-dark mb-3">Aksi Cepat</h5>
                    </div>
                    <div class="d-grid gap-2">
                        <a href="{{ route('categories.create') }}" class="btn btn-primary btn-sm">
                            + Tambah Kategori Baru
                        </a>
                        <a href="{{ route('items.create') }}" class="btn btn-success btn-sm">
                            + Tambah Barang Baru
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
