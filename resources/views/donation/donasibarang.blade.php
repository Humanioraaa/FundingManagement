@extends('layouts.master')

@section('content')

<div class="grid h-fit w-full grid-flow-row">
    <div class="md:col-span-1">
        <div class="mt-4 text-left">
            <div class="flex items-center mb-4">
                <svg class="w-4 h-4 mr-2 text-gray-800 dark:text-white" aria-hidden="true" fill="none" viewBox="0 0 14 10" style="margin-right: 8px;">
                    <path stroke="rgb(75, 85, 101)" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4"/>
                </svg>
                <a href="/" class="text-sm font-light text-gray-700 text-justify" style="margin-left: 8px;"><b>Kembali ke halaman utama</b></a>
            </div>
        </div>
    </div>

    <div class="md:col-span-1">
        <div class="container" style="display: flex; justify-content: center;">
            <div class="w-full sm:max-w-lg mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg" >
                <p class="h1 mt-2 mb-1 block text-xl font-semibold text-black" >{{ $selectedCampaign->nama_campaign }}</p> <!-- Nama Campaign Yang Dipilih -->
                <p class="mb-2 text-s font-normal text-black dark:text-gray-400">{{ $selectedCampaign->school->nama_sekolah }}</p> <!-- Asal Sekolah -->
                <hr>
                <form method="POST" action="{{ route('donations.post.form.items',['id' => $selectedCampaign->id]) }}" style="margin: 0 auto;">
                    @csrf
                     <!-- Pilih Barang Yang Disumbangkan -->
                    <div class="mb-2 mt-6 flex flex-wrap">
                        <div class="w-full md:w-3/6 pr-1">
                            <label class="block font-medium text-sm text-gray-700" for="nama_barang">Barang Donasi</label>
                            <select class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" name="nama_barang[]" required>
                                <option value="" disabled selected style="font-size: 14px;">Pilih Barang</option>
                                @foreach ($targetDonasi as $target)
                                    <option value="{{ $target->nama_barang }}" style="font-size: 14px;">{{ $target->nama_barang }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Buat elemen untuk input jumlah barang -->
                        <div class="w-full md:w-2/6 pl-3">
                            <label class="block font-medium text-sm text-gray-700" for="jumlah_barang">Jumlah Barang</label>
                            <input style="font-size: 14px;" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" type="number" name="jumlah_barang[]" required>
                        </div>
                        <div class="w-full md:w-1/6 pl-8 mt-6">
                            <button onclick="addRow()" style="width: 42px; height: 42px;" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" >+</button>
                        </div>
                    </div>

                    <!-- Container untuk menambahkan baris baru -->
                    <div id="additionalRows"></div>

                    <!-- Input Jasa Kirim -->
                    <div class="mb-4 mt-6">
                        <label class="block font-medium text-sm text-gray-700" for="nama">Layanan Jasa Kirim</label>
                        <input style="font-size: 14px;" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" id="jasa_kirim" type="text" name="jasa_kirim" placeholder="Anda dapat mengisinya nanti">
                    </div>

                    <!-- Input Nomor Rekening -->
                    <div class="mb-6">
                        <label class="block font-medium text-sm text-gray-700" for="nomor_rekening">Nomor Resi Pengiriman</label>
                        <input style="font-size: 14px;" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" id="nomor_resi" type="text" name="nomor_resi" placeholder="Anda dapat mengisinya nanti">
                    </div>

                    <!-- Input Pesan -->
                    <div class="mb-4 mt-6">
                        <label class="block font-medium text-sm text-gray-700" for="pesan">Pesan (Opsional)</label>
                        <textarea style="font-size: 14px;" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" id="pesan" name="pesan" rows="4" placeholder="Masukkan pesan anda..."></textarea>
                    </div>

                    <!-- Checkbox Syarat dan Ketentuan -->
                    <div class="mb-4">
                        <label class="inline-flex items-center">
                            <input class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" type="checkbox" name="syarat_dan_ketentuan" required>
                            <span class="ms-2 text-sm text-gray-600">Saya menyetujui syarat dan ketentuan</span>
                        </label>
                    </div>

                    <!-- Button Lanjutkan Pembayaran -->
                    <button type="submit" class="mt-2 w-full bg-primary text-white font-bold py-2 px-8 rounded-lg">
                        Lanjutkan Donasi Anda
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    function addRow() {
        // Buat elemen div baru untuk baris
        var newRow = document.createElement('div');
        newRow.classList.add('mb-2', 'flex', 'flex-wrap');

        // Buat elemen untuk pilihan barang donasi
        var selectContainer = document.createElement('div');
        selectContainer.classList.add('w-full', 'md:w-3/6', 'pr-1');
        selectContainer.innerHTML = `
            <label class="block font-medium text-sm text-gray-700" for="nama_barang">Barang Donasi</label>
            <select class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" name="nama_barang[]" required>
                <option value="" disabled selected style="font-size: 14px;">Pilih Barang</option>
                @foreach ($targetDonasi as $target)
                    <option value="{{ $target->nama_barang }}" style="font-size: 14px;">{{ $target->nama_barang }}</option>
                @endforeach
            </select>
        `;
        newRow.appendChild(selectContainer);

        // Buat elemen untuk input jumlah barang
        var inputContainer = document.createElement('div');
        inputContainer.classList.add('w-full', 'md:w-2/6', 'pl-3');
        inputContainer.innerHTML = `
        <label class="block font-medium text-sm text-gray-700" for="jumlah_barang">Jumlah Barang</label>
        <input style="font-size: 14px;" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" type="number" name="jumlah_barang[]" required>
        `;
        newRow.appendChild(inputContainer);

        // Buat elemen untuk tombol -
        var removeButtonContainer = document.createElement('div');
        removeButtonContainer.classList.add('w-full', 'md:w-1/6', 'pl-8', 'mt-1');
        removeButtonContainer.innerHTML = `
            <button onclick="removeRow(this)" style="width: 42px; height: 42px;" class="mt-5 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">-</button>
        `;
        newRow.appendChild(removeButtonContainer);

        // Tambahkan baris baru ke dalam container
        document.getElementById('additionalRows').appendChild(newRow);
    }

    function removeRow(button) {
        // Dapatkan elemen baris yang akan dihapus
        var rowToRemove = button.parentNode.parentNode;
        // Hapus elemen baris dari container
        rowToRemove.parentNode.removeChild(rowToRemove);
    }
</script>
@endsection

