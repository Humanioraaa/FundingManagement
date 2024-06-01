@extends('layouts.master')

@section('content')
    {{-- <div class="flex flex-col">
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="min-w-full text-left text-sm font-light text-surface dark:text-white">
                            <thead class="border-b border-neutral-200 font-medium dark:border-white/10">
                                <tr>
                                    <th scope="col" class="px-6 py-4">#</th>
                                    <th scope="col" class="px-6 py-4">Nama Campaign</th>
                                    <th scope="col" class="px-6 py-4">Dana Total</th>
                                    <th scope="col" class="px-6 py-4">Dana Sisa</th>
                                    <th scope="col" class="px-6 py-4">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($donasi as $d)
                                    <tr class="border-b border-neutral-200 dark:border-white/10">
                                        <td class="whitespace-nowrap px-6 py-4 font-medium">1</td>
                                        <td class="whitespace-nowrap px-6 py-4">{{ $d->id }}</td>
                                        <td class="whitespace-nowrap px-6 py-4">
                                            {{ $d->Donation->Campaign->nama_campaign }}</td>
                                        <td class="whitespace-nowrap px-6 py-4">{{ $d->nominal }}</td>
                                        <td class="whitespace-nowrap px-6 py-4"><a
                                                href="{{ route('pencairan.request', $d->id) }}">create</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="w-full">
        {{-- //card// --}}
        @foreach ($request as $d)
            <div class="flex mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                <div class="flex-1 flex justify-center items-center">
                    @unless ($d->MoneyDonation->Donation->Campaign->foto_campaign === null)
                        <img src="{{ asset('storage/cover_images/' . $d->MoneyDonation->Donation->Campaign->foto_campaign) }}"
                            alt="{{ $d->MoneyDonation->Donation->Campaign->nama_campaign }}" style="background-image: cover">
                    @else
                        <img src="https://via.placeholder.com/640x480.png/F6F5F2?text=NoImageAvailable" alt="No Image"
                            style="background-image: cover">
                    @endunless
                </div>
                <div class="flex-1 flex flex-col justify-center items-center">
                    <h1>{{ $d->MoneyDonation->Donation->Campaign->nama_campaign }}</h1>
                    <h3>Area Jawa Barat</h3>
                    <h3>22-2-2024</h3>
                </div>
                <div class="flex-1 flex flex-col justify-center items-center">
                    <h3>Donasi Terkumpul</h3>
                    <h3>Rp. {{ $d->nominal_terkumpul }}</h3>
                </div>
                <div class="flex-1 flex flex-col justify-center items-center">
                    <h3>Target Donasi</h3>
                    <h3>Rp. {{ $d->nominal_terkumpul }}</h3>
                </div>
                <div class="flex-1 flex justify-center items-center">
                    <a href="{{ route('pencairan.request', $d->id) }}"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Cairkan
                        Dana</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
