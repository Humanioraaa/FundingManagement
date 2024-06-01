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
                <p class="h1 text-l mb-2 block font-semibold text-black" style="margin-bottom: 1rem;">Verifikasi Sekolah</p>
                <div class="flex w-full flex-wrap">
                    @if ($schools->isEmpty())
                        <p class="m-8 w-full justify-center text-center text-sm"><i>Sedang tidak ada sekolah yang perlu
                                diverifikasi</i></p>
                    @else
                    @foreach ($schools as $school)
                            <form action="{{ route('response.verification', $school['id']) }}" method="POST"
                                class="flex flex-wrap w-full">
                                @csrf
                                @method('POST')
                                <x-admin-school-verification profile="{{ $school['logo_sekolah'] }}"
                                    alt="{{ $school['nama_sekolah'] }}"
                                    idDetailSekolah="detailSekolah{{ $loop->iteration }}"
                                    idDetailPendaftar="detailPendaftar{{ $loop->iteration }}"
                                    verificationId="{{ $loop->iteration }}" title="{{ $school['nama_sekolah'] }}"
                                    desc="{{ $school['alamat_sekolah'] }}" location="{{ $school['alamat_sekolah'] }}"
                                    schoolEmail="{{ $school['email_sekolah'] }}"
                                    schoolPhone="{{ $school['no_telepon_sekolah'] }}"
                                    registrantName="{{ $school['nama_pendaftar'] }}"
                                    registrantEmail="{{ $school['email_pendaftar'] }}"
                                    registrantNumber="{{ $school['no_hp_pendaftar'] }}"
                                    registrantIdentityNumber="{{ $school['identitas_pendaftar'] }}"
                                    registrantProof="{{ $school['bukti_id_pendaftar'] }}" />
                        @endforeach
                        </form>
                    @endif

                </div>
            </div>
        </div>
        @if ($errors->has('catatan'))
            <div id="toast-danger"
                class="mb-4 flex w-full max-w-xs items-center rounded-lg bg-white p-4 text-gray-500 shadow dark:bg-gray-800 dark:text-gray-400 absolute bottom-0 right-4"
                role="alert">
                <div
                    class="inline-flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-lg bg-red-100 text-red-500 dark:bg-red-800 dark:text-red-200">
                    <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z" />
                    </svg>
                    <span class="sr-only">Error icon</span>
                </div>
                <div class="ms-3 text-sm font-normal">{{ $errors->first('catatan') }}</div>
                <button type="button"
                    class="-mx-1.5 -my-1.5 ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-white p-1.5 text-gray-400 hover:bg-gray-100 hover:text-gray-900 focus:ring-2 focus:ring-gray-300 dark:bg-gray-800 dark:text-gray-500 dark:hover:bg-gray-700 dark:hover:text-white"
                    data-dismiss-target="#toast-danger" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
        @endif
    @endsection
