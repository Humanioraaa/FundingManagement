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

        <div class="w-full">
            <div class="">
                <div class="w-full mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                    <p class="h1 mt-2 mb-1 block text-xl font-semibold text-black">
                    </p> <!-- Nama Campaign Yang Dipilih -->
                    <p class="mb-2 text-s font-normal text-black dark:text-gray-400">
                        Riwayat Pencairan</p> <!-- Asal Sekolah -->
                    <hr>
                    <table class="min-w-full text-left text-sm font-light text-surface dark:text-white">
                        <thead class="border-b border-neutral-200 font-medium dark:border-white/10">
                            <tr>
                                <th scope="col" class="px-6 py-4">#</th>
                                <th scope="col" class="px-6 py-4">Nama Campaign</th>
                                <th scope="col" class="px-6 py-4">Tanggal Pengajuan</th>
                                <th scope="col" class="px-6 py-4">Tahap Pencairan</th>
                                <th scope="col" class="px-6 py-4">Metode Transfer</th>
                                <th scope="col" class="px-6 py-4">Nomor Rekening</th>
                                <th scope="col" class="px-6 py-4">Jumlah Dana</th>
                                <th scope="col" class="px-6 py-4">Pendukung</th>
                                <th scope="col" class="px-6 py-4">Status</th>
                                <th scope="col" class="px-6 py-4">Tanggal Dicairkan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($donasi->isEmpty())
                                <tr>
                                    <td colspan="10" class="text-center py-4">Data tidak tersedia</td>
                                </tr>
                            @else
                                @foreach ($donasi as $index => $m)
                                    <tr class="border-b border-neutral-200 dark:border-white/10">
                                        <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $index + 1 }}</td>
                                        <td class="whitespace-nowrap px-6 py-4">
                                            {{ optional($m->MoneyDonation->Donation->Campaign)->nama_campaign }}
                                        </td>
                                        <td class="whitespace-nowrap px-6 py-4">{{ $m->created_at }}</td>
                                        <td>{{ optional($m->TahapPencairan)->name }}</td>
                                        <td>{{ optional($m->MethodPayment)->metode_pembayaran }}</td>
                                        <td>{{ $m->nomor_rekening }}</td>
                                        <td>{{ $m->nominal_terkumpul }}</td>
                                        <td>
                                            @unless ($m->pendukung === null)
                                                <img src="{{ asset('storage/cover_images/' . $m->pendukung) }}"
                                                    alt="{{ $m->id }}" class="img-responsive" style="max-width: 100px">
                                            @else
                                                <img src="https://via.placeholder.com/640x480.png/F6F5F2?text=NoImageAvailable"
                                                    alt="No Image" class="img-responsive" style="max-width: 100px">
                                            @endunless
                                        </td>
                                        <td class="whitespace-nowrap px-6 py-4">{{ $m->status }}</td>
                                        <td>
                                            @if ($m->status == 'approved')
                                                {{ $m->updated_at }}
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
