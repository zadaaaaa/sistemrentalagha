@extends('layouts.app')

@section('title', 'Kategori')
@section('heading', 'Data Kategori')
@section('subheading', 'Kelola kategori barang yang disewakan.')

@section('actions')
    <a href="{{ route('categories.create') }}" class="btn btn-primary btn-sm">
        + Tambah Kategori
    </a>
@endsection

@section('content')
    <div class="card shadow-sm border-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="px-4 py-3">#</th>
                        <th class="px-4 py-3">Nama Kategori</th>
                        <th class="px-4 py-3">Jumlah Barang</th>
                        <th class="px-4 py-3 text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $category)
                        <tr>
                            <td class="px-4 py-3 text-muted">
                                {{ $loop->iteration + ($categories->currentPage() - 1) * $categories->perPage() }}
                            </td>
                            <td class="px-4 py-3 fw-medium">{{ $category->name }}</td>
                            <td class="px-4 py-3 text-muted">0 barang</td>
                            <td class="px-4 py-3 text-end">
                                <div class="d-inline-flex gap-2">
                                    <a href="{{ route('categories.show', $category) }}" class="btn btn-outline-secondary btn-sm">
                                        Detail
                                    </a>
                                    <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning btn-sm">
                                        Edit
                                    </a>
                                    <form action="{{ route('categories.destroy', $category) }}" method="POST"
                                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-4 py-5 text-center text-muted">
                                Belum ada data kategori.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="d-flex justify-content-end mt-4">
        {{ $categories->links('pagination::bootstrap-5') }}
    </div>
@endsection