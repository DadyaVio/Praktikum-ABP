<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">
            📊 Dashboard Toko Pak Cokomi & Mas Wowo
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <!-- Total Produk -->
                <div class="bg-white p-6 rounded-xl shadow">
                    <p class="text-gray-500 text-sm">Total Produk</p>
                    <h3 class="text-2xl font-bold">{{ $totalProduk }}</h3>
                </div>

                <!-- Total Stock -->
                <div class="bg-white p-6 rounded-xl shadow">
                    <p class="text-gray-500 text-sm">Total Stock</p>
                    <h3 class="text-2xl font-bold">{{ $totalStock }}</h3>
                </div>

                <!-- Total Nilai -->
                <div class="bg-white p-6 rounded-xl shadow">
                    <p class="text-gray-500 text-sm">Total Nilai Barang</p>
                    <h3 class="text-2xl font-bold text-green-600">
                        Rp {{ number_format($totalNilai) }}
                    </h3>
                </div>

            </div>

            <!-- Shortcut -->
            <div class="mt-6">
                <a href="{{ route('products.index') }}"
                   class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">
                    ➡️ Kelola Produk
                </a>
            </div>

            <!-- Recent Products -->
            <div class="mt-8 bg-white p-6 rounded-xl shadow">
                <h3 class="font-semibold mb-3">Produk Terbaru</h3>

                <ul class="space-y-2">
                    @foreach(App\Models\Product::latest()->take(5)->get() as $p)
                        <li class="flex justify-between border-b pb-1">
                            <span>{{ $p->name }}</span>
                            <span class="text-gray-500 text-sm">{{ $p->category }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>

        </div>
    </div>
</x-app-layout>