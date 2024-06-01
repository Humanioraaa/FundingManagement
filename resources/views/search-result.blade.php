@extends('layouts.master')

@section('content')
    <div class="grid h-fit w-full grid-flow-row">
        <div class="col-span-2 md:col-span-1">
            <div class="mt-4 text-left">
                <div class="mb-8 flex items-center">
                    <svg class="mr-2 h-4 w-4 text-gray-800 dark:text-white" aria-hidden="true" fill="none"
                        viewBox="0 0 14 10" style="margin-right: 8px;">
                        <path stroke="rgb(75, 85, 101)" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 5H1m0 0 4 4M1 5l4-4" />
                    </svg>
                    <a href="/" class="text-justify text-sm font-light text-gray-700"
                        style="margin-left: 8px;"><b>Kembali ke halaman utama</b></a>
                </div>
            </div>
        </div>

        <div class="col-span-3 md:col-span-2">
            <div class="mb-4 text-left" style="margin-left: 2rem; margin-right: 2rem;">
                <p class="h1 text-l mb-2 block font-semibold text-black" style="margin-bottom: 1rem;">Hasil Pencarian:</p>
                <div class="flex w-full flex-wrap">
                    @if ($campaigns->isEmpty())
                        <p>Tidak ada kampanye yang ditemukan.</p>
                    @else
                        <ul>
                            @foreach ($campaigns as $campaign)
                                <x-campaign-card link="#"
                                    {{-- link="{{ route('campaign.show', $campaign->id) }}" --}}
                                    image-path="{{ $campaign->image_path }}" alt-text="{{ $campaign->nama_campaign }}"
                                    title="{{ $campaign->nama_campaign }}" location="{{ $campaign->school->alamat_sekolah }}"
                                    description="{{ $campaign->deskripsi_campaign }}"
                                    percentage-collected="{{ $campaign->percentage_collected }}" />
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    @endsection
