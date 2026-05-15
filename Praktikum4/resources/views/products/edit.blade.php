<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">✏️ Edit Produk</h2>
    </x-slot>

    <div class="py-8 max-w-xl mx-auto">

        <div class="bg-white p-6 rounded-xl shadow">

            <form method="POST" action="{{ route('products.update', $product) }}">
                @csrf
                @method('PUT')

                <!-- Nama -->
                <div class="mb-4">
                    <label class="block mb-1">Nama</label>
                    <input name="name" value="{{ $product->name }}"
                           class="w-full border p-2 rounded-lg">
                </div>

                <!-- Kategori -->
                <div class="mb-4">
                    <label class="block mb-1">Kategori</label>
                    <select name="category"
                            class="w-full border p-2 rounded-lg">
                        <option {{ $product->category == 'Minuman' ? 'selected' : '' }}>Minuman</option>
                        <option {{ $product->category == 'Makanan' ? 'selected' : '' }}>Makanan</option>
                    </select>
                </div>

                <!-- Stock (FIX) -->
                <div class="mb-4">
                    <label class="block mb-1">Stock</label>
                    <input type="number"
                           name="stock"
                           value="{{ $product->stock }}"
                           class="w-full border p-2 rounded-lg">
                </div>

                <!-- Harga (FIX) -->
                <div class="mb-4">
                    <label class="block mb-1">Harga</label>
                    <input type="number"
                           name="price"
                           value="{{ $product->price }}"
                           class="w-full border p-2 rounded-lg">
                </div>

                <!-- Button -->
                <div class="flex justify-between">
                    <a href="{{ route('products.index') }}"
                       class="bg-gray-300 px-4 py-2 rounded hover:bg-gray-400">
                        ← Kembali
                    </a>

                    <button class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">
                        Update
                    </button>
                </div>

            </form>

        </div>

    </div>
</x-app-layout>