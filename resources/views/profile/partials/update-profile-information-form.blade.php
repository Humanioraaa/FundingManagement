<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Edit Profile') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Perbarui informasi profil dan alamat email akun Anda.") }}
        </p>
    </header>

    <!-- <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form> -->

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

            <div class="flex justify-center items-center mt-6">
                <label for="edit-photo" class="cursor-pointer">
                  <div class="flex items-center">
                       <div class="rounded-full overflow-hidden w-20 h-20 flex justify-center items-center relative">
                             <img id="preview-photo" src="{{ asset('img/profile2.jpeg') }}" alt="" class="object-cover w-full h-full" />
                                 <span class="absolute left-0 right-0 bg-gray-900 bg-opacity-50 text-white text-xs py-1 px-2 rounded text-center top-1/2 transform -translate-y-1/2">Klik untuk mengubah foto</span>
                        </div>
                        <input aria-describedby="file_input" type="file" id="edit-photo" name="edit-photo" class="hidden" accept="image/*" />
                  </div>
                </label>
            </div>
        
          <div>
            <x-input-label for="name" :value="__('Nama')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('nama', $user->nama)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="phone" :value="__('Nomor Handphone')" />
            <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full" :value="old('phone', $user->phone)" required autofocus autocomplete="phone" />
            <x-input-error class="mt-2" :messages="$errors->get('Nomor Handphone')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Alamat email Anda belum diverifikasi.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Klik di sini untuk mengirim ulang email verifikasi.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('Email verifikasi telah dikirim ke alamat email yang telah Anda gunakan.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Simpan') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Disimpan.') }}</p>
            @endif
        </div>
    </form>
    <script>
    document.getElementById('edit-photo').addEventListener('change', function(e) {
        const file = e.target.files[0];
        const reader = new FileReader();

        reader.onload = function(e) {
            const preview = document.getElementById('preview-photo');
            preview.src = e.target.result;
        }

        reader.readAsDataURL(file);
    });
</script>

</section>
