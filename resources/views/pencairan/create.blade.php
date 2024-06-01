{{-- @extends('layouts.master')

@section('content')
    <form action="{{ route('pencairan.create', $moneydonation->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="nominal">Pilih Tahap Pencairan Dana</label>
        <select id="nominal" name="nominal" class="form-control">
            @foreach ($options as $key => $value)
                <option value="{{ $value }}">{{ $key }} ({{ $value }})</option>
            @endforeach
        </select>
        <input type="file" name="" id="">
        <button type="submit">Submit</button>
    </form>
@endsection --}}
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
                    <a href="{{ route('list.pencairan') }}" class="text-sm font-light text-gray-700 text-justify"
                        style="margin-left: 8px;"><b>Kembali ke halaman utama</b></a>
                </div>
            </div>
        </div>

        <div class="md:col-span-1">
            <div class="container" style="display: flex; justify-content: center;">
                <div class="w-full sm:max-w-lg mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                    <p class="h1 mt-2 mb-1 block text-xl font-semibold text-black">
                    </p> <!-- Nama Campaign Yang Dipilih -->
                    <p class="mb-2 text-s font-normal text-black dark:text-gray-400">
                        Asal Sekolah</p> <!-- Asal Sekolah -->

                    <hr>
                    <form method="POST" action="{{ route('pencairan.create', $RequestPencairan->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name="id_money_donation" id="id_money_donation"
                            value=" {{ $RequestPencairan->id_money_donation }} ">

                        <div class="mb-4 mt-6">
                            <label class="block font-medium text-sm text-gray-700" for="tahap">Pilih Tahap Pencairan
                                Dana</label>
                            <select
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                                id="tahap" name="tahap" required onchange="togglePendukungField()">
                                <option value="" disabled selected>Pilih Tahap Pencairan Dana</option>
                                @if ($RequestPencairan->id_tahap_pencairan == null)
                                    @foreach ($options as $tahap => $nominal)
                                        <option value="{{ $tahap }}">{{ $tahap }} - {{ $nominal }}
                                        </option>
                                    @endforeach
                                @elseif ($RequestPencairan->id_tahap_pencairan == 1)
                                    @foreach ($options as $tahap => $nominal)
                                        <option value="{{ $tahap }}" {{ $tahap == 'Tahap 1' ? 'disabled' : '' }}>
                                            {{ $tahap }} - {{ $nominal }}</option>
                                    @endforeach
                                @elseif ($RequestPencairan->id_tahap_pencairan == 2)
                                    @foreach ($options as $tahap => $nominal)
                                        <option value="{{ $tahap }}"
                                            {{ in_array($tahap, ['Tahap 1', 'Tahap 2']) ? 'disabled' : '' }}>
                                            {{ $tahap }} - {{ $nominal }}</option>
                                    @endforeach
                                @elseif ($RequestPencairan->id_tahap_pencairan == 3)
                                    <option value="" disabled>Semua tahap pencairan telah dilakukan</option>
                                @endif
                            </select>
                        </div>

                        <div class="mb-4 mt-6">
                            <label class="block font-medium text-sm text-gray-700" for="tahap">Pilih Tahap
                                Pencairan Dana</label>
                            <select
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                                id="metode_pembayaran" name="metode_pembayaran" required>
                                <option value="" disabled>Pilih Tahap Pencairan Dana</option>

                                @foreach ($methodPayment as $m)
                                    <option value="{{ $m->id }}">{{ $m->metode_pembayaran }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="block font-medium text-sm text-gray-700" for="nama_pemilik">Nama Pemilik
                                Rekening</label>
                            <input
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                                id="nama_pemilik" type="text" name="nama_pemilik">
                        </div>
                        <!-- Input Nomor Rekening -->
                        <div class="mb-6">
                            <label class="block font-medium text-sm text-gray-700" for="nomor_rekening">Nomor
                                Rekening</label>
                            <input
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                                id="nomor_rekening" type="text" name="nomor_rekening">
                        </div>
                        <!-- Input Pesan -->
                        <div class="mb-4 mt-6">
                            <label class="block font-medium text-sm text-gray-700" for="pesan">Pesan (Opsional)</label>
                            <textarea class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                                id="pesan" name="pesan" rows="4" placeholder="Masukkan pesan anda..."></textarea>
                        </div>
                        <div class="mb-4 mt-6" id="pendukungField" style="display: none;">
                            <label class="block font-medium text-sm text-gray-700" for="pendukung">Upload File
                                Pendukung</label>
                            <input type="file"
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                                id="pendukung" name="pendukung">
                        </div>
                        <!-- Checkbox Syarat dan Ketentuan -->
                        <div class="mb-4">
                            <label class="inline-flex items-center">
                                <input class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                                    type="checkbox" name="syarat_dan_ketentuan">
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


    <script>
        function togglePendukungField() {
            var tahapSelect = document.getElementById('tahap');
            var pendukungField = document.getElementById('pendukungField');
            var selectedValue = tahapSelect.value;

            if (selectedValue === 'Tahap 2' || selectedValue === 'Tahap 3') {
                pendukungField.style.display = 'block';
            } else {
                pendukungField.style.display = 'none';
            }
        }
    </script>
@endsection
