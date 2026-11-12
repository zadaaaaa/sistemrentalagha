@extends('layouts.app')

@section('title', 'Edit Barang')
@section('heading', 'Edit Barang')
@section('subheading', 'Perbarui data barang atau kendaraan.')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <form action="{{ route('items.update', $item) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="category_id" class="form-label fw-semibold">Kategori</label>
                            <select name="category_id" id="category_id" class="form-select @error('category_id') is-invalid @enderror">
                                <option value="">-- Pilih Kategori --</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @selected(old('category_id', $item->category_id) == $category->id)>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="code" class="form-label fw-semibold">Kode Barang</label>
                            <input type="text"
                                   name="code"
                                   id="code"
                                   value="{{ old('code', $item->code) }}"
                                   class="form-control @error('code') is-invalid @enderror">
                            @error('code')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label fw-semibold">Nama Barang</label>
                            <input type="text"
                                   name="name"
                                   id="name"
                                   value="{{ old('name', $item->name) }}"
                                   class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label for="price_per_day" class="form-label fw-semibold">Harga per Hari (Rp)</label>
                                <input type="number"
                                       name="price_per_day"
                                       id="price_per_day"
                                       min="0"
                                       step="0.01"
                                       value="{{ old('price_per_day', $item->price_per_day) }}"
                                       class="form-control @error('price_per_day') is-invalid @enderror">
                                @error('price_per_day')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="stock" class="form-label fw-semibold">Stok</label>
                                <input type="number"
                                       name="stock"
                                       id="stock"
                                       min="0"
                                       value="{{ old('stock', $item->stock) }}"
                                       class="form-control @error('stock') is-invalid @enderror">
                                @error('stock')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="status" class="form-label fw-semibold">Status</label>
                            <select name="status" id="status" class="form-select @error('status') is-invalid @enderror">
                                <option value="available" @selected(old('status', $item->status) === 'available')>Available (Tersedia)</option>
                                <option value="rented" @selected(old('status', $item->status) === 'rented')>Rented (Disewa)</option>
                                <option value="maintenance" @selected(old('status', $item->status) === 'maintenance')>Maintenance (Perbaikan)</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">Perbarui</button>
                            <a href="{{ route('items.index') }}" class="btn btn-outline-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
