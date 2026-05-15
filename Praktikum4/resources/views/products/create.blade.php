<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">➕ Tambah Produk</h2>
    </x-slot>

    <div class="py-8 max-w-xl mx-auto">

        <div class="bg-white p-6 rounded-xl shadow">

            <form method="POST" action="{{ route('products.store') }}">
                @csrf

                <div class="mb-4">
                    <label class="block text-sm font-medium">Nama</label>
                    <input name="name"
                           class="w-full border rounded-lg p-2 mt-1 focus:ring focus:ring-indigo-200">
                </div>

                <div class="mb-4">
                    <label>Kategori</label>
                    <select name="category"
                            class="w-full border rounded-lg p-2 mt-1">
                        <option>Minuman</option>
                        <option>Makanan</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label>Stock</label>
                    <input name="stock" type="number"
                           class="w-full border rounded-lg p-2 mt-1">
                </div>

                <div class="mb-4">
                    <label>Harga</label>
                    <input name="price" type="number"
                           class="w-full border rounded-lg p-2 mt-1">
                </div>

                <div class="flex justify-between">
                    <a href="{{ route('products.index') }}"
                       class="bg-gray-300 px-4 py-2 rounded hover:bg-gray-400">
                        ← Kembali
                    </a>

                    <button class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
                        Simpan
                    </button>
                </div>

            </form>

        </div>

    </div>
</x-app-layout>