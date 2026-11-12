<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ItemController extends Controller
{
    public function index(): View
    {
        $items = Item::with('category')->latest()->paginate(10);

        return view('items.index', compact('items'));
    }

    public function create(): View
    {
        $categories = Category::orderBy('name')->get();

        return view('items.create', compact('categories'));
    }

    public function store(Request $request): RedirectResponse
    {
        if (! $request->filled('code')) {
            $request->merge(['code' => $this->generateCode()]);
        }

        $validated = $request->validate([
            'category_id'   => ['required', 'exists:categories,id'],
            'code'          => ['required', 'string', 'max:50', 'unique:items,code'],
            'name'          => ['required', 'string', 'max:255'],
            'price_per_day' => ['required', 'numeric', 'min:0'],
            'stock'         => ['required', 'integer', 'min:0'],
            'status'        => ['required', Rule::in(['available', 'rented', 'maintenance'])],
        ], $this->validationMessages());

        Item::create($validated);

        return redirect()->route('items.index')
            ->with('success', 'Barang berhasil ditambahkan.');
    }

    public function show(Item $item): View
    {
        $item->load('category');

        return view('items.show', compact('item'));
    }

    public function edit(Item $item): View
    {
        $categories = Category::orderBy('name')->get();

        return view('items.edit', compact('item', 'categories'));
    }

    public function update(Request $request, Item $item): RedirectResponse
    {
        $validated = $request->validate([
            'category_id'   => ['required', 'exists:categories,id'],
            'code'          => ['required', 'string', 'max:50', Rule::unique('items', 'code')->ignore($item->id)],
            'name'          => ['required', 'string', 'max:255'],
            'price_per_day' => ['required', 'numeric', 'min:0'],
            'stock'         => ['required', 'integer', 'min:0'],
            'status'        => ['required', Rule::in(['available', 'rented', 'maintenance'])],
        ], $this->validationMessages());

        $item->update($validated);

        return redirect()->route('items.index')
            ->with('success', 'Barang berhasil diperbarui.');
    }

    public function destroy(Item $item): RedirectResponse
    {
        $item->delete();

        return redirect()->route('items.index')
            ->with('success', 'Barang berhasil dihapus.');
    }

    private function generateCode(): string
    {
        $nextId = ((int) Item::max('id')) + 1;

        do {
            $code = 'BRG-' . str_pad((string) $nextId, 3, '0', STR_PAD_LEFT);
            $nextId++;
        } while (Item::where('code', $code)->exists());

        return $code;
    }

    private function validationMessages(): array
    {
        return [
            'category_id.required'   => 'Kategori wajib dipilih.',
            'category_id.exists'     => 'Kategori yang dipilih tidak valid.',
            'code.required'          => 'Kode barang wajib diisi.',
            'code.unique'            => 'Kode barang sudah digunakan.',
            'code.max'               => 'Kode barang maksimal 50 karakter.',
            'name.required'          => 'Nama barang wajib diisi.',
            'name.max'               => 'Nama barang maksimal 255 karakter.',
            'price_per_day.required' => 'Harga sewa wajib diisi.',
            'price_per_day.numeric'  => 'Harga sewa harus berupa angka.',
            'price_per_day.min'      => 'Harga sewa tidak boleh kurang dari 0.',
            'stock.required'         => 'Stok wajib diisi.',
            'stock.integer'          => 'Stok harus berupa angka bulat.',
            'stock.min'              => 'Stok tidak boleh kurang dari 0.',
            'status.required'        => 'Status wajib dipilih.',
            'status.in'              => 'Status yang dipilih tidak valid.',
        ];
    }
}
