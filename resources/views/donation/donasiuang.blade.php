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
                <form method="POST" action="{{ route('donation.summary') }}" style="margin: 0 auto;">
                    @csrf
                    <!-- Input-hidden -->
                    <input type="hidden" name="id_campaign" value="{{ $selectedCampaign->id }}">
                    <!-- Input Nominal Donasi -->
                    <div class="mb-4 mt-6">
                        <label class="block font-medium text-sm text-gray-700" for="nominal">Nominal Donasi</label>
                        <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full h-16 text-lg" id="nominal" type="number" name="nominal" required>
                    </div>
                    <!-- Pilih Metode Pembayaran -->
                    <div class="mb-4 mt-6">
                        <label class="block font-medium text-sm text-gray-700" for="metode_pembayaran">Metode Pembayaran</label>
                        <select class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" id="metode_pembayaran" name="metode_pembayaran" required>
                            <option value="">Pilih Metode Pembayaran</option>
                            @foreach ($metodePembayaran as $metode)
                                <option value="{{ $metode->id }}">{{ $metode->metode_pembayaran }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Input Nama Pemilik Rekening -->
                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700" for="nama_pemilik">Nama Pemilik Rekening</label>
                        <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" id="nama_pemilik" type="text" name="nama_pemilik" required>
                    </div>
                    <!-- Input Nomor Rekening -->
                    <div class="mb-6">
                        <label class="block font-medium text-sm text-gray-700" for="nomor_rekening">Nomor Rekening</label>
                        <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" id="nomor_rekening" type="text" name="nomor_rekening" required>
                    </div>
                    <!-- Input Pesan -->
                    <div class="mb-4 mt-6">
                        <label class="block font-medium text-sm text-gray-700" for="pesan">Pesan (Opsional)</label>
                        <textarea class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" id="pesan" name="pesan" rows="4" placeholder="Masukkan pesan anda..."></textarea>
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
                        Lanjutkan Pembayaran
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
