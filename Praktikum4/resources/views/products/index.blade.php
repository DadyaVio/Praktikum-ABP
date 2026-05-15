<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            📦 Inventaris Produk
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Button -->
            <div class="flex justify-end mb-4">
                <a href="{{ route('products.create') }}"
                   class="bg-indigo-600 text-white px-4 py-2 rounded-lg shadow hover:bg-indigo-700 transition">
                    + Tambah Produk
                </a>
            </div>

            <!-- Card -->
            <div class="bg-white shadow-md rounded-xl overflow-hidden">

                <table class="min-w-full text-sm text-gray-700">
                    <thead class="bg-gray-100 text-xs uppercase">
                        <tr>
                            <th class="px-6 py-3 text-left">Nama</th>
                            <th class="px-6 py-3 text-left">Kategori</th>
                            <th class="px-6 py-3 text-left">Stock</th>
                            <th class="px-6 py-3 text-left">Harga</th>
                            <th class="px-6 py-3 text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y">
                        @forelse($products as $p)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-3 font-medium">{{ $p->name }}</td>

                            <td class="px-6 py-3">
                                <span class="bg-gray-200 px-2 py-1 rounded text-xs">
                                    {{ $p->category }}
                                </span>
                            </td>

                            <td class="px-6 py-3">{{ $p->stock }}</td>

                            <td class="px-6 py-3 text-green-600 font-semibold">
                                Rp {{ number_format($p->price) }}
                            </td>

                            <td class="px-6 py-3 text-center space-x-2">

                                <!-- Edit -->
                                <a href="{{ route('products.edit', $p) }}"
                                   class="bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500">
                                    Edit
                                </a>

                                <!-- Delete Modal -->
                                <div x-data="{ open: false }" class="inline">

                                    <!-- Button -->
                                    <button @click="open = true"
                                        class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                                        Hapus
                                    </button>

                                    <!-- Modal -->
                                    <div x-show="open"
                                         x-transition
                                         class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">

                                        <div class="bg-white rounded-lg p-6 w-80 shadow-lg">

                                            <h2 class="text-lg font-semibold mb-3">
                                                Konfirmasi
                                            </h2>

                                            <p class="mb-4 text-gray-600">
                                                Yakin ingin menghapus data ini?
                                            </p>

                                            <div class="flex justify-end gap-2">

                                                <button @click="open = false"
                                                    class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">
                                                    Batal
                                                </button>

                                                <form method="POST" action="{{ route('products.destroy', $p) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                                                        Hapus
                                                    </button>
                                                </form>

                                            </div>

                                        </div>
                                    </div>

                                </div>

                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-5 text-gray-500">
                                Tidak ada data
                            </td>
                        </tr>
                        @endforelse
                    </tbody>

                </table>

            </div>
        </div>
    </div>
</x-app-layout>