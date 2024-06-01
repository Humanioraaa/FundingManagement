<div class="mb-8 w-1/2 pe-8" school-verification-id="{{ $verificationId }}">
    <div class="rounded-lg border border-gray-200 bg-white shadow-sm">
        <div class="flex items-center px-5 py-3">
            <img src="{{ $profile }}" alt="{{ $alt }}" class="h-10 w-10 rounded-full object-cover" referrerpolicy="no-referrer">
            <div class="ml-4">
                <p class="font-bold text-black">{{ $school }}</p>
                <p class="text-sm text-gray-600">{{ $location }}</p>
            </div>
        </div>
        <div class="inline-flex w-full rounded-md shadow-sm" role="group">
            <button type="button" id="btnDetailSekolah"
                class="w-1/2 border-b border-gray-200 bg-white px-4 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:font-bold focus:text-blue-700 dark:border-gray-700 dark:bg-gray-800 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white dark:focus:text-white dark:focus:ring-blue-500">
                Detail Campaign
            </button>
            <button type="button" id="btnDetailPendaftar"
                class="w-1/2 border-b border-gray-200 bg-white px-4 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:font-bold focus:text-blue-700 dark:border-gray-700 dark:bg-gray-800 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white dark:focus:text-white dark:focus:ring-blue-500">
                Permintaan
            </button>
        </div>
        <div id="{{ $idDetailCampaign }}" class="h-48 overflow-y-auto p-5">
            <h4 class="text-sm font-bold text-black">Nama:</h4>
            <p class="mb-2 text-sm font-normal text-black text-wrap">{{ $campaignName }}</p>
            <h4 class="text-sm font-bold text-black">Tanggal dibuat:</h4>
            <p class="mb-2 text-sm font-normal text-black text-wrap">{{ $createdAt }}</p>
            <h4 class="text-sm font-bold text-black">Deskripsi:</h4>
            <p class="mb-2 text-sm font-normal text-black text-wrap">{{ $descriptionCampaign }}</p>
            {{-- <h4 class="text-sm font-bold text-black">Nomor Telepon:</h4>
            <p class="mb-2 text-sm font-normal text-black text-wrap">{{ $schoolPhone }}</p> --}}
        </div>
        <div id="{{ $idDetailPermintaan }}" class="hidden h-48 overflow-y-auto p-5">
            <h3 class="mb-2 font-bold text-black">Permintaan:</h3>
            {{ $slot }}
            {{-- <h4 class="text-sm font-bold text-black">Nomor Telepon:</h4>
            <p class="mb-2 text-sm font-normal text-black text-wrap">{{ $schoolPhone }}</p> --}}
        </div>
        <div class="inline-flex w-full rounded-md shadow-sm" role="group">
            <button type="button" data-modal-target="confirm-modal" data-modal-toggle="confirm-modal"
                class="w-1/2 rounded-bl-lg border-gray-200 bg-green-600 px-4 py-3 text-sm font-medium text-white hover:bg-green-800 hover:text-gray-100 focus:z-10 focus:text-blue-700 focus:ring-2 focus:ring-blue-700 dark:border-gray-700 dark:bg-gray-800 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white dark:focus:text-white dark:focus:ring-blue-500">
                Konfirmasi
            </button>

            <button type="button" data-modal-target="decline-modal" data-modal-toggle="decline-modal"
                class="w-1/2 rounded-br-lg border-gray-200 bg-red-600 px-4 py-3 text-sm font-medium text-white hover:bg-red-800 hover:text-gray-100 focus:z-10 focus:text-blue-700 focus:ring-2 focus:ring-blue-700 dark:border-gray-700 dark:bg-gray-800 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white dark:focus:text-white dark:focus:ring-blue-500">
                Tolak
            </button>
        </div>
    </div>
</div>

<!-- Confirm modal -->
<div id="confirm-modal" tabindex="-1" aria-hidden="true"
    class="top-50 fixed left-0 right-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0">
    <div class="relative max-h-full w-full max-w-2xl p-4">
        <!-- Modal content -->
        <div class="relative rounded-lg bg-white shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between rounded-t border-b p-4 dark:border-gray-600 md:p-5">
                <h3 class="text-xl font-bold text-gray-900 dark:text-white">
                    Konfirmasi {{ $campaignName }}
                </h3>
                <button type="button"
                    class="ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="confirm-modal">
                    <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="space-y-4 p-4 md:p-5">
                <p class="text-base font-semibold leading-relaxed text-gray-900 dark:text-gray-400">
                    Apakah anda yakin ingin mengkonfirmasi {{ $campaignName }}?
                </p>
                <p class="text-gray-00 text-sm leading-relaxed dark:text-gray-400">
                    Dengan menekan tombol iya maka anda yakin bahwa sekolah {{ $campaignName }} telah menyertakan bukti
                    yang valid dan sesuai dengan ketentuan yang berlaku!
                </p>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center rounded-b border-t border-gray-200 p-4 dark:border-gray-600 md:p-5">
                <button type="submit" name="response" value="confirm"
                    class="rounded-lg bg-green-600 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Ya,
                    saya yakin</button>
                <button data-modal-hide="confirm-modal" type="button"
                    class="ms-3 rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700">Batal</button>
            </div>
        </div>
    </div>
</div>

<!-- Decline modal -->
<div id="decline-modal" tabindex="-1" aria-hidden="true"
    class="top-50 fixed left-0 right-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0">
    <div class="relative max-h-full w-full max-w-2xl p-4">
        <!-- Modal content -->
        <div class="relative rounded-lg bg-white shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between rounded-t border-b p-4 dark:border-gray-600 md:p-5">
                <h3 class="text-xl font-bold text-gray-900 dark:text-white">
                    Tolak {{ $campaignName }}
                </h3>
                <button type="button"
                    class="ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="decline-modal">
                    <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="space-y-4 p-4 md:p-5">
                <p class="text-base font-semibold leading-relaxed text-gray-900 dark:text-gray-400">
                    Apakah anda yakin ingin menolak {{ $campaignName }}?
                </p>
                <div class="mt-4">
                    <x-input-label for="catatan" :value="__('Catatan:')" />
                    <x-textarea-input id="catatan" class="mt-1 block h-auto w-full resize-y" type="text"
                        name="catatan" :value="old('catatan')" autocomplete="catatan" />
                    <x-input-error :messages="$errors->get('catatan')" class="mt-2" />
                </div>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center rounded-b border-t border-gray-200 p-4 dark:border-gray-600 md:p-5">

                <button type="submit" name="response" value="decline"
                    class="rounded-lg bg-red-600 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Ya,
                    tolak</button>

                <button data-modal-hide="decline-modal" type="button"
                    class="ms-3 rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700">Batal</button>
            </div>
        </div>
    </div>
</div>
