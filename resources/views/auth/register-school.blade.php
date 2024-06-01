<x-guest-layout>
    <form method="POST" enctype="multipart/form-data" action="{{ route('register.school') }}">
        @csrf
        {{-- Pendaftar --}}
        <div>
            <x-input-label for="nama_pendaftar" :value="__('Nama Pendaftar')" />
            <x-text-input id="nama_pendaftar" class="mt-1 block w-full" type="text" name="nama_pendaftar" :value="old('nama_pendaftar')" required
                autofocus autocomplete="nama_pendaftar" />
            <x-input-error :messages="$errors->get('nama_pendaftar')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="no_hp_pendaftar" :value="__('Nomor Handphone Pendaftar')" />
            <x-text-input id="no_hp_pendaftar" class="mt-1 block w-full" type="tel" name="no_hp_pendaftar" :value="old('no_hp_pendaftar')" required
                autocomplete="tel" />
            <x-input-error :messages="$errors->get('no_hp_pendaftar')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="email_pendaftar" :value="__('Email Pendaftar')" />
            <x-text-input id="email_pendaftar" class="mt-1 block w-full" type="Email" name="email_pendaftar" :value="old('email_pendaftar')" required
                autocomplete="email_pendaftar" />
            <x-input-error :messages="$errors->get('email_pendaftar')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="identitas_pendaftar" :value="__('Identitas Pendaftar')" />
            <x-text-input id="identitas_pendaftar" class="mt-1 block w-full" type="text" name="identitas_pendaftar" :value="old('identitas_pendaftar')" required
                autocomplete="identitas_pendaftar" />
            <x-input-error :messages="$errors->get('identitas_pendaftar')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="bukti_id_pendaftar" :value="__('Bukti ID Pendaftar')" />
            <x-file-input id="bukti_id_pendaftar" class="mt-1 block w-full" name="bukti_id_pendaftar" required
                autofocus autocomplete="bukti_id_pendaftar" />
            <x-input-error :messages="$errors->get('bukti_id_pendaftar')" class="mt-2" />
        </div>
        <!-- Logo Sekolah -->
        <div class="mt-4">
            <x-input-label for="logo_sekolah" :value="__('Logo Sekolah')" />
            <x-file-input id="logo_sekolah" class="mt-1 block w-full" name="logo_sekolah" required
                autofocus autocomplete="logo_sekolah" />
            <x-input-error :messages="$errors->get('logo_sekolah')" class="mt-2" />
        </div>

        <!-- Nama Sekolah -->
        <div class="mt-4">
            <x-input-label for="nama_sekolah" :value="__('Nama Sekolah')" />
            <x-text-input id="nama_sekolah" class="mt-1 block w-full" type="text" name="nama_sekolah" :value="old('nama_sekolah')" required
                autofocus autocomplete="nama_sekolah" />
            <x-input-error :messages="$errors->get('nama_sekolah')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="alamat_sekolah" :value="__('Alamat Sekolah')" />
            <x-text-input id="alamat_sekolah" class="mt-1 block w-full" type="text" name="alamat_sekolah" :value="old('alamat_sekolah')"
                required autocomplete="alamat_sekolah" />
            <x-input-error :messages="$errors->get('alamat_sekolah')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="no_telepon_sekolah" :value="__('Nomor Handphone Sekolah')" />
            <x-text-input id="no_telepon_sekolah" class="mt-1 block w-full" type="tel" name="no_telepon_sekolah" :value="old('no_telepon_sekolah')"
                required autocomplete="tel" />
            <x-input-error :messages="$errors->get('no_telepon_sekolah')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="email_sekolah" :value="__('Email Sekolah')" />
            <x-text-input id="email_sekolah" class="mt-1 block w-full" type="Email" name="email_sekolah" :value="old('email_sekolah')"
                required autocomplete="email_sekolah" />
            <x-input-error :messages="$errors->get('email_sekolah')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password" :value="__('Kata Sandi')" />
            <x-text-input id="password" class="mt-1 block w-full" type="password" name="password" required
                autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Konfirmasi Kata Sandi')" />
            <x-text-input id="password_confirmation" class="mt-1 block w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="mt-4 flex items-center justify-end">
            <a class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                href="{{ route('login') }}">
                {{ __('Sudah terdaftar?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Daftar') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
