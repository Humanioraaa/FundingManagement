@extends('layouts.master')

@section('content')

<div class="grid h-fit w-full grid-flow-row">
    <div class="col-span-2 md:col-span-1">
        <div class="mt-4 text-left">
            <div class="flex items-center mb-8">
                <svg class="w-4 h-4 mr-2 text-gray-800 dark:text-white" aria-hidden="true" fill="none" viewBox="0 0 14 10" style="margin-right: 8px;">
                    <path stroke="rgb(75, 85, 101)" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4"/>
                </svg>
                <a href="/" class="text-sm font-light text-gray-700 text-justify" style="margin-left: 8px;"><b>Kembali ke halaman utama</b></a>
            </div>
        </div>
    </div>

    <div class="col-span-3 md:col-span-2">
        <div class="mb-4 text-left" style="margin-left: 2rem; margin-right: 2rem;"> <!-- Atur jarak di sini -->
            <p class="h1 mb-2 block text-l font-semibold text-black" style="margin-bottom: 1rem;">Riwayat Donasi Sekolahmu</p>


            <div class="w-full lg:max-w-full lg:flex">
                <div class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t-lg lg:rounded-t-none lg:rounded-l-lg text-center overflow-hidden" style="background-image: url('{{  asset('img/campaigns/' . $campaign->foto)  }}')" title="Campaign Anda">
                </div>
                <div class="border border-gray-200 bg-white rounded-b-lg lg:rounded-b-none lg:rounded-r-lg p-4 flex flex-col justify-between leading-normal flex-grow">
                    <div class="mb-8 grid grid-cols-4 gap-x-4 lg:gap-x-8" style="grid-template-columns: 2fr 1fr 1fr 0.5fr">
                        <div>
                            <p class="h1 mb-0 block text-xl font-semibold text-black" >{{ $campaign->school->nama_sekolah }}</p> <!-- nama sekolah -->
                            <p class="mb-1 text-s font-normal text-black dark:text-gray-400">{{ $campaign->school->alamat_sekolah }}</p> <!-- alamat sekolah -->
                            <p class="mb-0 mt-2 block text-s font-semibold text-black dark:text-gray-400">{{ $campaign->nama_campaign }}</p> <!-- Nama Campaign -->
                            <p class="mb-4 text-sm font-normal text-black dark:text-gray-400">{{ $campaign->deskripsi_campaign }}</p>
                            <p class="mb-2 text-xs font-normal text-black dark:text-gray-400">Dibuat  Tanggal : {{ $campaign->tanggal_dibuat }}</p>
                            <p class="mb-2 text-xs font-normal text-black dark:text-gray-400">
                                @if($campaign->status == 'Selesai')
                                    Selesai Tanggal : {{ $campaign->tanggal_selesai }}
                                @else
                                    Selesai Tanggal : -
                                @endif

                        </div>

                        {{-- <!-- Donasi Masuk -->
                        <div>
                            <p class="h1 mb-2 block text-sm font-semibold text-black" style="margin-top:5px" >Donasi Terkumpul</p> <!-- nama sekolah -->
                            @foreach($campaign->targets as $target)
                            <p class="mb-1 text-sm font-normal text-black dark:text-gray-400 flex items-center">
                                <svg class="h-5 w-5 text-green-500 mr-2" fill="none" width="24" height="24" viewBox="0 0 24 24" stroke="none">
                                    <circle cx="12" cy="12" r="10" fill="#42BB4E" />
                                    <path d="M9 12l2 2l4 -4" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <span class="mr-1">{{ $target->nama_barang }}</span>

                                <span>
                                    @if($target->nama_barang == 'Uang')
                                        Rp. {{ number_format($target->jumlah_barang, 0, ',', '.') }}
                                    @else
                                        {{ number_format($target->jumlah_barang, 0, ',', '.') }}
                                    @endif
                                </span>

                            </p>
                            @endforeach

                        </div> --}}
                        <!-- Donasi Masuk -->
                        <div>
                            <p class="h1 mb-2 block text-sm font-semibold text-black" style="margin-top:5px" >Donasi Terkumpul</p> <!-- nama sekolah -->
                            {{-- @foreach($campaign->donations as $donation)
                                @foreach($donation->donationItems as $donationItem)
                                    <p class="mb-1 text-sm font-normal text-black dark:text-gray-400 flex items-center">
                                        <svg class="h-5 w-5 text-green-500 mr-2" fill="none" width="24" height="24" viewBox="0 0 24 24" stroke="none">
                                            <circle cx="12" cy="12" r="10" fill="#42BB4E" />
                                            <path d="M9 12l2 2l4 -4" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <span class="mr-1">{{ $donationItem->nama_barang }}</span>

                                        <span>
                                            @if($donationItem->nama_barang == 'Uang')
                                                Rp. {{ number_format($donationItem->jumlah_barang, 0, ',', '.') }}
                                            @else
                                                {{ number_format($donationItem->jumlah_barang, 0, ',', '.') }}
                                            @endif
                                        </span>

                                    </p>
                                @endforeach
                            @endforeach --}}
                            @if ($campaign->groupedDonationItems->isNotEmpty())
                                @foreach ($campaign->groupedDonationItems as $donationItem)
                                    <p
                                        class="mb-1 text-sm font-normal text-black dark:text-gray-400 flex items-center">
                                        <svg class="h-5 w-5 text-green-500 mr-2" fill="none"
                                                                    width="24" height="24" viewBox="0 0 24 24"
                                                                    stroke="none">
                                                                    <circle cx="12" cy="12" r="10"
                                                                        fill="#42BB4E" />
                                                                    <path d="M9 12l2 2l4 -4" stroke="white" stroke-width="2"
                                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                                </svg>
                                                                <span
                                                                    class="mr-1">{{ $donationItem['nama_barang'] }}</span>

                                                                <span>
                                                                    @if ($donationItem['nama_barang'] == 'Uang')
                                                                        Rp.
                                                                        {{ number_format($donationItem['jumlah_barang'], 0, ',', '.') }}
                                                                    @else
                                                                        {{ number_format($donationItem['jumlah_barang'], 0, ',', '.') }}
                                                                    @endif
                                                                </span>
                                                            </p>
                                                        @endforeach
                                                    @else
                                                        <p class="text-sm font-normal text-black dark:text-gray-400">No
                                                            donation
                                                            items available.</p>
                                                    @endif
                                                    @if ($campaign->totalDonationMoney > 0)
                                                        <p
                                                            class="mb-1 text-sm font-normal text-black dark:text-gray-400 flex items-center">
                                                            <svg class="h-5 w-5 text-green-500 mr-2" fill="none"
                                                                width="24" height="24" viewBox="0 0 24 24"
                                                                stroke="none">
                                                                <circle cx="12" cy="12" r="10"
                                                                    fill="#42BB4E" />
                                                                <path d="M9 12l2 2l4 -4" stroke="white" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg>
                                                            <span class="mr-1">Uang</span>

                                                            <span>
                                                                Rp.
                                                                {{ number_format($campaign->totalDonationMoney, 0, ',', '.') }}
                                                            </span>
                                                        </p>
                                                    @else
                                                        <p class="text-sm font-normal text-black dark:text-gray-400">No
                                                            donation
                                                            money available.</p>
                                                    @endif
                        </div>


                        <!-- Target Donasi -->
                        <div>
                            <p class="h1 mb-2 block text-sm font-semibold text-black" style="margin-top:5px" >Target Donasi</p> <!-- nama sekolah -->
                            @foreach($campaign->targets as $target)
                            <p class="mb-1 text-sm font-normal text-black dark:text-gray-400 flex items-center my-1">
                                <svg class="h-5 w-5 text-red-500 mr-2" fill="#BB4242" viewBox="0 0 24 24" stroke="#BB4242">
                                    <circle cx="12" cy="12" r="9" />
                                    <line x1="9" y1="12" x2="15" y2="12" stroke="white" stroke-width="2"/>
                                </svg>
                                <span class="mr-1">{{ $target->nama_barang }}</span>
                                <span>
                                    @if($target->nama_barang == 'Uang')
                                        Rp. {{ number_format($target->jumlah_barang, 0, ',', '.') }}
                                    @else
                                        {{ number_format($target->jumlah_barang, 0, ',', '.') }}
                                    @endif
                                </span>
                            </p>
                            @endforeach
                        </div>
                    </div>

                    <!-- Status -->
                    <div class="mb-2 grid grid-cols-2 gap-x-4 lg:gap-x-8" style="grid-template-columns: 50%, 50%">
                        <a href="{{ route('campaign.riwayat') }}">
                        <div class="flex justify-center items-center">

                            <button class="bg-primary text-white font-bold py-2 px-8 rounded-lg relative flex items-center"
                                    onmouseover="this.style.backgroundColor='#d47502';"
                                    onmouseout="this.style.backgroundColor='bg-primary';">
                                <span>
                                    <svg class="h-5 w-5 text-white transform rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M12 5l7 7-7 7"/>
                                    </svg>
                                </span>
                                <span class="ml-2">Kembali Ke Riwayat</span>
                                <script>
                                    const button = document.querySelector('.bg-primary');
                                    const originalColor = button.style.backgroundColor;
                                    button.onmouseout = function() {
                                        button.style.backgroundColor = originalColor;
                                    };
                                </script>
                            </button>
                        </div>
                        </a>
                    </div>
                </div>
            </div>



            <div class="mb-4"></div> <!--Sampai Sini -->

            <p class="h1 mb-2 mt-10 mb-4 block text-l font-semibold text-black" >Donatur Sekolahmu</p>
            @foreach($donations as $donation)
            <div class="col-span-2 h-auto">
                <div class="h-auto w-full rounded-lg border border-gray-200 bg-white dark:border-gray-700 dark:bg-gray-800">
                    <div class="mb-8 grid grid-cols-4 gap-x-4 lg:gap-x-8" style="grid-template-columns: 0.5fr 1fr 1fr 2fr">
                        <!-- Profil Donatur -->
                        <div class="flex justify-center items-center ml-8 mt-6">
                            <div class="rounded-full overflow-hidden w-20 h-20 flex justify-center items-center">
                                <img src="{{ asset('img/campaigns/' . $donation->user->profile_picture) }}" alt="" class="object-cover w-full h-full" />
                            </div>
                        </div>

                         <!-- Nama Donatur -->
                         <div class="flex flex-col items-start justify-center mr-8">
                            <p class="h1 mb-1 block text-l font-semibold text-black mt-6">{{ $donation->user->nama }}</p>
                            <p class="text-sm font-normal text-black dark:text-gray-400">{{ $donation->user->email }}</p>
                        </div>

                        <!-- Sumbangan -->

                        <div>
                            <p class="h1 mb-2 block text-sm font-semibold text-black mt-6">Telah Menyumbangkan</p>
                            @foreach($donation->donationItems as $item)
                            <p class="mb-1 mt-1 text-sm font-normal text-black dark:text-gray-400 flex items-center">
                                <svg class="h-5 w-5 text-green-500 mr-2" fill="none" width="24" height="24" viewBox="0 0 24 24" stroke="none">
                                    <circle cx="12" cy="12" r="10" fill="#42BB4E" />
                                    <path d="M9 12l2 2l4 -4" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <span class="mr-1">{{ $item->nama_barang }}</span>
                                <span>{{ $item->jumlah_barang }}</span>
                            </p>
                            @endforeach

                            @foreach($donation->donationMoney as $money)
                            <p class="mb-1 mt-1 text-sm font-normal text-black dark:text-gray-400 flex items-center">
                                <svg class="h-5 w-5 text-green-500 mr-2" fill="none" width="24" height="24" viewBox="0 0 24 24" stroke="none">
                                    <circle cx="12" cy="12" r="10" fill="#42BB4E" />
                                    <path d="M9 12l2 2l4 -4" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <span class="mr-1">{{ $money->nama_barang }}</span>
                                Rp. {{ number_format($money->nominal, 0, ',', '.') }}
                            </p>
                            @endforeach
                        </div>
                        {{-- <div>
                            <p class="h1 mb-2 block text-sm font-semibold text-black mt-6">Telah Menyumbangkan</p>
                            <p class="mb-1 mt-1 text-sm font-normal text-black dark:text-gray-400 flex items-center">
                                <svg class="h-5 w-5 text-green-500 mr-2" fill="none" width="24" height="24" viewBox="0 0 24 24" stroke="none">
                                    <circle cx="12" cy="12" r="10" fill="#42BB4E" />
                                    <path d="M9 12l2 2l4 -4" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <span class="mr-1">Meja</span>
                                <span>10</span>
                            </p>
                            <p class="mb-1 text-sm font-normal text-black dark:text-gray-400 flex items-center">
                                <svg class="h-5 w-5 text-green-500 mr-2" fill="none" width="24" height="24" viewBox="0 0 24 24" stroke="none">
                                    <circle cx="12" cy="12" r="10" fill="#42BB4E" />
                                    <path d="M9 12l2 2l4 -4" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <span class="mr-1">Kursi</span>
                                <span>10</span>
                            </p>
                            <p class="mb-1 text-sm font-normal text-black dark:text-gray-400 flex items-center">
                                <svg class="h-5 w-5 text-green-500 mr-2" fill="none" width="24" height="24" viewBox="0 0 24 24" stroke="none">
                                    <circle cx="12" cy="12" r="10" fill="#42BB4E" />
                                    <path d="M9 12l2 2l4 -4" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <span class="mr-1">Uang</span>
                                <span>500.000</span>
                            </p>
                        </div> --}}

                        <!-- Doa Donatur -->
                        <div>
                            <p class="h1 mb-2 block text-sm font-semibold text-black mt-6">Doa Dari Donaturmu</p>
                            <p class="mb-4 mr-6 text-sm font-normal text-black dark:text-gray-400">{{ $donation->pesan }}</p>
                            <p class="mb-1 text-xs font-normal text-black dark:text-gray-400">Donasi Masuk : {{ $donation->created_at->format('d F Y') }}</p>
                            <p class="mb-2 text-xs font-normal text-black dark:text-gray-400">
                                @if($donation->status == 'Valid')
                                    Donasi Terverifikasi: {{ $donation->updated_at->format('d F Y') }}
                                @else
                                    Donasi Terverifikasi: Sedang diverifikasi admin
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>


            <div class="mb-2"></div> <!--Sampai Sini -->
            @endforeach

        </div>
    </div>
</div>

@endsection
