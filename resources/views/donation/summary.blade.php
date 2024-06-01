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
                <p class="h1 mt-2 mb-2 block text-xl font-semibold text-black" >Instruksi Pembayaran</p>
                <hr>

                <!-- Instruksi Pembayaran -->
                <p class="mb-2 mt-6 text-sm font-normal text-black dark:text-gray-400">Silakan lakukan pembayaran ke</p>
                <div class="flex justify-between items-center mt-4">
                    @if($nama_pemilik)
                    <p class="mb-2 text-sm font-normal text-black dark:text-gray-400">{{ $nama_pemilik }}</p>
                    @endif
                    @if($tujuan_pembayaran)
                    <p class="mb-2 text-sm font-normal text-black dark:text-gray-400">{{ $tujuan_pembayaran }}</p>
                    @endif
                </div>

                <div class="border border-gray-300 focus-within:border-indigo-500 rounded-md shadow-sm block mt-1 w-full px-3 py-2">
                    @if($nomor_rekening)
                    <p class="text-sm font-normal text-black dark:text-gray-400">{{ $nomor_rekening }}</p>
                    @endif
                </div>

                <!-- Jumlah yang harus dibayarkan -->
                <p class="mb-2 mt-4 text-sm font-normal text-black dark:text-gray-400">Jumlah yang harus dibayarkan</p>
                <div class="border border-gray-300 focus-within:border-indigo-500 rounded-md shadow-sm block mt-1 w-full px-3 py-2">
                    @if($nominal)
                    <p class="text-sm font-normal text-black dark:text-gray-400">Rp. {{ number_format($nominal, 0, ',', '.') }}</p>
                    @endif
                </div>

                <!-- Ringkasan Donasi -->
                <p class="h1 mb-2 mt-8 block text-sm font-semibold text-black" >Ringkasan Donasi</p>
                <div class="border border-gray-300 focus-within:border-indigo-500 rounded-md shadow-sm block w-full px-3 py-2 bg-blue-100">

                    @if($selectedCampaign)
                    <div class="flex justify-between items-center mt-2">
                        <p class="mb-2 text-sm font-normal text-black dark:text-gray-400">Nama Campaign</p>
                        <p class="mb-2 text-sm font-normal text-black dark:text-gray-400">{{ $selectedCampaign->nama_campaign }}</p>
                    </div>
                    @endif

                    @if($selectedCampaign && $selectedCampaign->school)
                    <div class="flex justify-between items-center">
                        <p class="mb-2 text-sm font-normal text-black dark:text-gray-400">Donasi Ke</p>
                        <p class="mb-2 text-sm font-normal text-black dark:text-gray-400">{{ $selectedCampaign->school->nama_sekolah }}</p>
                    </div>
                    @endif

                    @if($nominal)
                    <div class="flex justify-between items-center">
                        <p class="mb-2 text-sm font-normal text-black dark:text-gray-400">Jumlah Donasi</p>
                        <p class="mb-2 text-sm font-normal text-black dark:text-gray-400">Rp. {{ number_format($nominal, 0, ',', '.') }}</p>
                    </div>
                    @endif

                    @if($tujuan_pembayaran)
                    <div class="flex justify-between items-center">
                        <p class="mb-2 text-sm font-normal text-black dark:text-gray-400">Metode Pembayaran</p>
                        <p class="mb-2 text-sm font-normal text-black dark:text-gray-400">{{ $tujuan_pembayaran }}</p>
                    </div>
                    @endif

                    @if($nomor_rek)
                    <div class="flex justify-between items-center">
                        <p class="mb-2 text-sm font-normal text-black dark:text-gray-400">Nomor Rekening</p>
                        <p class="mb-2 text-sm font-normal text-black dark:text-gray-400">{{ $nomor_rek }}</p>
                    </div>
                    @endif

                    @if($pentransfer)
                    <div class="flex justify-between items-center">
                        <p class="mb-2 text-sm font-normal text-black dark:text-gray-400">Pemilik Rekening</p>
                        <p class="mb-2 text-sm font-normal text-black dark:text-gray-400">{{ $pentransfer }}</p>
                    </div>
                    @endif

                    @if($waktu_donasi)
                    <div class="flex justify-between items-center">
                        <p class="mb-2 text-sm font-normal text-black dark:text-gray-400">Waktu Donasi</p>
                        <p class="mb-2 text-sm font-normal text-black dark:text-gray-400">{{ $waktu_donasi->format('d F Y') }}</p>
                    </div>
                    @endif
                </div>

                <form method="POST" action="{{ route('donations.store') }}">
                    @csrf
                    <!-- Isi dengan elemen form lainnya seperti yang Anda perlukan -->
                    <p class="mb-2 mt-4 text-xs font-normal text-black dark:text-gray-400">Pastikan anda sudah sudah melakukan pembayaran sebelum klik Sudah Bayar</p>
                    <button type="submit" class="mt-4 w-full bg-primary text-white font-bold py-2 px-8 rounded-lg">
                        Sudah Bayar
                    </button>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection


