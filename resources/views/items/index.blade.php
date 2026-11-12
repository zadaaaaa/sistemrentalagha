@extends('layouts.app')

@section('title', 'Barang')
@section('heading', 'Data Barang')
@section('subheading', 'Kelola barang atau kendaraan yang disewakan.')

@section('actions')
    <a href="{{ route('items.create') }}" class="btn btn-primary btn-sm">
        + Tambah Barang
    </a>
@endsection

@section('content')
    <div class="card shadow-sm border-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="px-4 py-3">#</th>
                        <th class="px-4 py-3">Kode</th>
                        <th class="px-4 py-3">Nama Barang</th>
                        <th class="px-4 py-3">Kategori</th>
                        <th class="px-4 py-3">Harga/Hari</th>
                        <th class="px-4 py-3">Stok</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3 text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($items as $item)
                        <tr>
                            <td class="px-4 py-3 text-muted">
                                {{ $loop->iteration + ($items->currentPage() - 1) * $items->perPage() }}
                            </td>
                            <td class="px-4 py-3 font-monospace small text-muted">{{ $item->code }}</td>
                            <td class="px-4 py-3 fw-medium">{{ $item->name }}</td>
                            <td class="px-4 py-3 text-muted">{{ $item->category->name ?? '-' }}</td>
                            <td class="px-4 py-3 text-muted">Rp {{ number_format($item->price_per_day, 0, ',', '.') }}</td>
                            <td class="px-4 py-3 text-muted">{{ $item->stock }}</td>
                            <td class="px-4 py-3">
                                @php
                                    $badge = match ($item->status) {
                                        'available'   => 'bg-success',
                                        'rented'      => 'bg-warning text-dark',
                                        'maintenance' => 'bg-secondary',
                                        default       => 'bg-secondary',
                                    };
                                @endphp
                                <span class="badge {{ $badge }}">
                                    {{ ucfirst($item->status) }}
                                </span>
                            </td>
                            <td class="px-4 py-3 text-end">
                                <div class="d-inline-flex gap-2">
                                    <a href="{{ route('items.show', $item) }}" class="btn btn-outline-secondary btn-sm">
                                        Detail
                                    </a>
                                    <a href="{{ route('items.edit', $item) }}" class="btn btn-warning btn-sm">
                                        Edit
                                    </a>
                                    <form action="{{ route('items.destroy', $item) }}" method="POST"
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
                            <td colspan="8" class="px-4 py-5 text-center text-muted">
                                Belum ada data barang.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    @if ($items->hasPages())
        <div class="d-flex justify-content-end mt-4">
            {{ $items->links('pagination::bootstrap-5') }}
        </div>
    @endif
@endsection
