@extends('layouts.master')

@section('content')
    <div class="grid h-fit w-full grid-flow-row">

        <div class="md:col-span-1">
            <div class="mt-4 text-left">
                <div class="flex items-center mb-4">
                    <svg class="w-4 h-4 mr-2 text-gray-800 dark:text-white" aria-hidden="true" fill="none"
                        viewBox="0 0 14 10" style="margin-right: 8px;">
                        <path stroke="rgb(75, 85, 101)" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 5H1m0 0 4 4M1 5l4-4" />
                    </svg>
                    <a href="/" class="text-sm font-light text-gray-700 text-justify"
                        style="margin-left: 8px;"><b>Kembali ke halaman utama</b></a>
                </div>
            </div>
        </div>

        <div class="col-span-3 mt-16 lg:mt-4">
            <p class="h1 mb-2 ml-14 block text-justify text-xl font-semibold text-black">Campaign Populer</p>
            <p class="mx-auto mb-8 ml-14 text-justify text-sm font-light text-black">Temukan dan bantu mereka. Uluran tangan
                mu membuat pendidikan di Indonesia semakin maju. Terimakasih orang baik </p>

            @if (session('success'))
                <div class="flex items-center p-4 w-50 mb-4 ml-14 mr-14 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800 w-4/4"
                    role="alert" id="alert-border-3">
                    <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <div>
                        <span class="font-medium">Donasi Berhasil, Donasi Kamu Akan Admin Cek.</span> Terima Kasih Donasinya
                        Orang Baik 😊
                    </div>
                    <button type="button"
                        class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
                        onclick="dismissAlert('alert-border-3')" aria-label="Close">
                        <span class="sr-only">Dismiss</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>
            @endif


            <div class="flex flex-wrap justify-center gap-4 text-left">
                @foreach ($campaigns as $campaign)
                    <div class="w-64 max-w-sm rounded-lg border border-gray-200 bg-white shadow">
                        <a href="{{ $link ?? '#' }}">
                            <img class="h-64 rounded-t-lg object-cover"
                                src="{{ asset('img/campaigns/' . $campaign->foto) }}" alt="{{ $altText ?? '' }}" />
                        </a>
                        <div class="p-5">
                            <a href="{{ $link ?? '#' }}">
                                <h5 class="text-xl font-bold tracking-tight text-black">
                                    {{ $campaign->school->nama_sekolah }}</h5>
                            </a>
                            <p class="mb-2 text-xs font-normal text-black">{{ $campaign->school->alamat_sekolah }}</p>
                            <p class="mb-4 text-sm font-normal text-black">{{ $campaign->deskripsi_campaign }}</p>
                            <div class="mb-1 flex w-full text-xs font-medium">
                                <p>Terkumpul</p>
                                <p class="text-primary ms-auto font-bold">90%</p>
                            </div>
                            <div class="h-1.5 w-full rounded-full bg-gray-200">
                                <div class="bg-primary h-1.5 rounded-full" style="width: 90%"></div>
                            </div>
                            <!-- Tombol "Donasi Uang" pada setiap card campaign -->
                            <div class="flex justify-center items-center mt-4">
                                <a href="{{ route('donations.form', ['id' => $campaign->id]) }}"
                                    class="bg-primary text-white font-bold py-2 px-8 rounded-lg">
                                    Donasi Uang
                                </a>
                            </div>

                            <!-- Tombol "Donasi Barang" pada setiap card campaign -->
                            <div class="flex justify-center items-center mt-4">
                                <a href="{{ route('donations.form.items', ['id' => $campaign->id]) }}"
                                    class="bg-primary text-white font-bold py-2 px-8 rounded-lg">
                                    Donasi Barang
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    </div>



    <script>
        function dismissAlert(alertId) {
            var alertElement = document.getElementById(alertId);
            if (alertElement) {
                alertElement.style.display = 'none';
            }
        }
    </script>
@endsection
