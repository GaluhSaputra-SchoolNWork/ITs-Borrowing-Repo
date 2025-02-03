<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Barang</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans h-full">

    {{-- Header --}}
    <div class="min-h-full">
        <nav class="bg-gray-800 sticky">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <div class="flex items-center">
                        <div class="shrink-0">
                            <img class="size-8" src="https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company">
                        </div>
                        <div class="hidden md:block">
                            <div class="ml-10 flex items-baseline space-x-4">
                                <a href="#" class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white" aria-current="page">Barang</a>
                                <a href="#" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Murid</a>
                                <a href="#" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Guru</a>
                                <a href="#" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Peminjaman</a>
                                <a href="#" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Reports</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <header class="bg-white shadow-sm">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">Dashboard</h1>
            </div>
        </header>
        <main>
            <div class="mx-auto max-w-fit px-4 py-6 sm:px-6 lg:px-8">

                <!-- Your content -->
                <h1 class="text-4xl font-bold text-gray-900 mb-8">List Barang</h1>

                <div class="mb-8 bg-white p-6 rounded-xl shadow-md">
                    <form method="GET" action="{{ route('semuabarang.index') }}" class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div>
                            <label for="search" class="block text-sm font-medium text-gray-700 mb-2">Nama Barang</label>
                            <input type="text" name="search" id="search" value="{{ request('search') }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Kategori Barang</label>
                            <select name="kategori" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200" >
                                <option value="" disabled selected>Pilih Kategori</option>
                                @php
                                    $semuaKategori = [
                                        'Komputer & Aksesoris',
                                        'Desktop',
                                        'Monitor',
                                        'Komponen Desktop & Laptop',
                                        'Penyimpanan Data',
                                        'Komponen Network',
                                        'Software',
                                        'Peralatan Kantor',
                                        'Printer & Scanner',
                                        'Aksesoris Desktop & Laptop',
                                        'Keyboard & Mouse',
                                        'Laptop',
                                        'Gaming',
                                        'Audio Computer',
                                        'Proyektor & Aksesoris',
                                        'Lainnya'
                                    ];
                                @endphp
                                @foreach($semuaKategori as $kategori)
                                    <option value="{{ $kategori }}" {{ request('kategori') == $kategori ? 'selected' : '' }}>{{ $kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Status Barang</label>
                            <select name="status" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                                <option value="" disabled selected>Pilih Status</option>
                                @php
                                    $semuaStatus = [
                                        'Tersedia',
                                        'Tidak ada'
                                    ];
                                @endphp
                                @foreach($semuaStatus as $status)
                                    <option value="{{ $status }}" {{ request('status') == $status ? 'selected' : '' }}>{{ $status }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex items-end gap-4">
                            <button type="submit" class="w-full md:w-auto px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200">
                                Filter
                            </button>
                            <button href="{{ route('semuabarang.index') }}" class="w-full md:w-auto px-6 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition duration-200">
                                Reset
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Add New Item Button -->
                <div class="mb-8">
                    <button onclick="showCreateModal()"
                            class="inline-flex items-center px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition duration-200">
                        <span class="mr-2">+</span> Tambah Barang Baru
                    </button>
                </div>

                <!-- Pagination -->
                <div class="mb-6">
                    {{ $semuabarang->links() }}
                </div>

                <!-- Table Section -->
                @if($semuabarang->isEmpty())
                    <p class="text-gray-500 text-center py-8">Belum ada data barang</p>
                @else
                    <div class="overflow-x-auto bg-white rounded-xl shadow-md">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-4 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">ID Barang</th>
                                    <th class="px-6 py-4 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">Nama Barang</th>
                                    <th class="px-6 py-4 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">Kategori</th>
                                    <th class="px-6 py-4 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">Stok Total</th>
                                    <th class="px-6 py-4 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">Stok Tersedia</th>
                                    <th class="px-6 py-4 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">Status Barang</th>
                                    <th class="px-6 py-4 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">Catatan</th>
                                    <th class="px-6 py-4 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">Atur</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @foreach($semuabarang as $barang)
                                    <tr class="hover:bg-gray-50 transition duration-200">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $barang->id_barang }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $barang->nama_barang }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $barang->kategori }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $barang->stok_total }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $barang->stok_tersedia }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $barang->status_barang }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $barang->catatan }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                                            <button
                                                onclick="showEditModal({{ $barang }})"
                                                class="px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600 transition duration-200">
                                                Edit
                                            </button>
                                            <button
                                                onclick="showDeleteModal('{{ route('semuabarang.destroy', $barang->id_barang) }}')"
                                                class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition duration-200">
                                                Hapus
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif

                <!-- Pagination -->
                <div class="mt-6">
                    {{ $semuabarang->links() }}
                </div>
            </div>

            <!-- Delete Modal -->
            <div id="deleteModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
                <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-xl bg-white">
                    <div class="mt-3 text-center">
                        <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100">
                            <svg class="h-6 w-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                            </svg>
                        </div>
                        <h3 class="text-lg leading-6 font-medium text-gray-900 mt-4">Konfirmasi Penghapusan</h3>
                        <div class="mt-2 px-7 py-3">
                            <p class="text-sm text-gray-500">Apakah kamu yakin ingin menghapus barang ini?</p>
                        </div>
                        <div class="flex justify-center gap-4 mt-4">
                            <button id="cancelButton" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition duration-200">
                                Batal
                            </button>
                            <form id="deleteForm" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition duration-200">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Edit Modal -->
            <div id="editModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
                <div class="relative top-20 mx-auto p-5 border w-[600px] shadow-lg rounded-xl bg-white">
                    <div class="mt-3">
                        <h3 class="text-2xl font-medium text-center mb-6">Edit Barang</h3>
                        <form id="editForm" method="POST" class="space-y-4">
                            @csrf
                            @method('PUT')
                            <input type="text" id="nama_barang" name="nama_barang" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                placeholder="Nama Barang">
                            <select id="kategori" name="kategori" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                                @foreach($semuaKategori as $kategori)
                                    <option value="{{ $kategori }}">{{ $kategori }}</option>
                                @endforeach
                            </select>
                            <input type="number" id="stok_total" name="stok_total" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                placeholder="Stok Total">
                            <input type="number" id="stok_tersedia" name="stok_tersedia" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                placeholder="Stok Tersedia">
                            <select id="status_barang" name="status_barang" required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                                @foreach($semuaStatus as $status)
                                    <option value="{{ $status }}">{{ $status }}</option>
                                @endforeach
                            </select>
                            <input type="text" id="catatan" name="catatan"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                placeholder="Catatan">
                            <div class="flex justify-end gap-4 mt-6">
                                <button type="button" onclick="hideEditModal()"
                                        class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition duration-200">
                                    Batal
                                </button>
                                <button type="submit"
                                        class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200">
                                    Simpan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Create Modal -->
            <div id="createModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
                <div class="relative top-20 mx-auto p-5 border w-[600px] shadow-lg rounded-xl bg-white">
                    <div class="mt-3">
                        <h3 class="text-2xl font-medium text-center mb-6">Tambah Barang Baru</h3>
                        <form id="createForm" action="{{ route('semuabarang.store') }}" method="POST" class="space-y-4">
                            @csrf
                            <input type="text" id="nama_barang" name="nama_barang" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                placeholder="Nama Barang">
                            <select id="kategori" name="kategori" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                                <option value="" disabled selected>Pilih Kategori</option>
                                @foreach($semuaKategori as $kategori)
                                    <option value="{{ $kategori }}">{{ $kategori }}</option>
                                @endforeach
                            </select>
                            <input type="number" id="stok_total" name="stok_total" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                placeholder="Stok Total">
                            <input type="number" id="stok_tersedia" name="stok_tersedia" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                placeholder="Stok Tersedia">
                            <select id="status_barang" name="status_barang" required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                                <option value="" disabled selected>Pilih Status</option>
                                @foreach($semuaStatus as $status)
                                    <option value="{{ $status }}">{{ $status }}</option>
                                @endforeach
                            </select>
                            <input type="text" id="catatan" name="catatan"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                placeholder="Catatan">
                            <div class="flex justify-end gap-4 mt-6">
                                <button type="button" onclick="hideCreateModal()"
                                        class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition duration-200">
                                    Batal
                                </button>
                                <button type="submit"
                                        class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition duration-200">
                                    Simpan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        // Delete Modal
        function showDeleteModal(deleteUrl) {
            const modal = document.getElementById('deleteModal');
            const deleteForm = document.getElementById('deleteForm');
            const cancelButton = document.getElementById('cancelButton');

            deleteForm.action = deleteUrl;
            modal.classList.remove('hidden');

            cancelButton.onclick = function() {
                modal.classList.add('hidden');
            }

            modal.onclick = function(event) {
                if (event.target === modal) {
                    modal.classList.add('hidden');
                }
            }
        }

        // Edit Modal
        function showEditModal(barang) {
            const modal = document.getElementById('editModal');
            const form = document.getElementById('editForm');

            form.action = `/semuabarang/${barang.id_barang}`;
            document.getElementById('nama_barang').value = barang.nama_barang;
            document.getElementById('kategori').value = barang.kategori;
            document.getElementById('stok_total').value = barang.stok_total;
            document.getElementById('stok_tersedia').value = barang.stok_tersedia;
            document.getElementById('status_barang').value = barang.status_barang;
            document.getElementById('catatan').value = barang.catatan;

            modal.classList.remove('hidden');
        }

        function hideEditModal() {
            document.getElementById('editModal').classList.add('hidden');
        }

        // Create Modal
        function showCreateModal() {
            document.getElementById('createModal').classList.remove('hidden');
        }

        function hideCreateModal() {
            document.getElementById('createModal').classList.add('hidden');
        }
    </script>
</body>
</html>
