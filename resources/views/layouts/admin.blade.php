 <!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EduFund</title>
    @vite(['public/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>

    <nav class="fixed top-0 z-50 w-full bg-white">
        <div class="px-3 py-3 lg:px-5 lg:pl-3">
            <div class="flex items-center">
                <div class="flex items-center justify-start rtl:justify-end">
                    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar"
                        aria-controls="logo-sidebar" type="button"
                        class="inline-flex items-center rounded-lg p-2 text-sm text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 sm:hidden">
                        <span class="sr-only">Buka sidebar</span>
                        <svg class="h-6 w-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                            </path>
                        </svg>
                    </button>

                    {{-- Logo --}}
                    <a href="/" class="ms-2 flex md:me-24">
                        <img src="{{ asset('img/EduFund2.png') }}" class="me-3 h-10" alt="EduFund" />
                        <span class="self-center whitespace-nowrap text-xl font-semibold sm:text-2xl"></span>
                    </a>
                </div>

                {{-- Pencarian --}}
                <div class="flex md:order-1">
                    <div class="relative hidden md:block w-96 ">
                        <input type="text" id="search-navbar"
                            class=" block w-full rounded-lg border border-gray-300 bg-gray-50 p-2 ps-4 text-smtext-gray-900 focus:border-gray-500 focus:ring-0"
                            placeholder="Cari...">
                        <div class="pointer-events-none absolute inset-y-0 end-4 flex items-center ps-3">
                            <svg class="h-4 w-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                            <span class="sr-only">Ikon pencarian</span>
                        </div>
                        <button type="button" data-collapse-toggle="navbar-search" aria-controls="navbar-search"
                            aria-expanded="false"
                            class=" me-1 rounded-lg p-2.5 text-sm text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring- focus:ring-gray-200 md:hidden">
                            <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                            <span class="sr-only">Cari</span>
                        </button>
                    </div>
                    <button data-collapse-toggle="navbar-search" type="button"
                        class="inline-flex h-10 w-10 items-center justify-center rounded-lg p-2 text-sm text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 md:hidden"
                        aria-controls="navbar-search" aria-expanded="false">
                        <span class="sr-only">Buka menu utama</span>
                        <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 17 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 1h15M1 7h15M1 13h15" />
                        </svg>
                    </button>
                </div>

                {{-- Tombol --}}
                @auth
                    <div class="ms-auto hidden w-full items-center justify-between md:order-2 md:flex md:w-auto"
                        id="navbar-search">
                        <button type="button"
                            class="flex rounded-full bg-gray-800 text-sm focus:ring-4 focus:ring-gray-300"
                            aria-expanded="false" data-dropdown-toggle="dropdown-user">
                            <span class="sr-only">Buka menu pengguna</span>
                            <img class="h-8 w-8 rounded-full"
                                src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="foto pengguna">
                        </button>
                    </div>
                    <div class="z-50 my-4 hidden list-none divide-y divide-gray-100 rounded bg-white text-base shadow"
                        id="dropdown-user">
                        <div class="px-4 py-3" role="none">
                            <p class="text-sm text-gray-900" role="none">
                                {{ Auth::user()->name }}
                            </p>
                            <p class="truncate text-sm font-medium text-gray-900" role="none">
                                {{ Auth::user()->email }}
                            </p>
                        </div>
                        <ul class="py-1" role="none">
                            <li>
                                <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                    role="menuitem">Profil</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                    role="menuitem">Pengaturan</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                    role="menuitem">Pendapatan</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                    role="menuitem"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Keluar</a>
                                <form id="logout-form" method="POST" action="{{ route('logout') }}"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                @else
                    <a href="{{ route('login') }}"
                        class="ms-auto rounded-md px-3 py-2 text-sm text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white md:order-2">
                        Masuk
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="rounded-md px-3 py-2 text-sm text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white md:order-3">
                            Daftar
                        </a>
                    @endif
                @endauth

            </div>
        </div>
    </nav>

    <aside id="logo-sidebar"
        class="fixed left-0 top-0 z-40 h-screen w-52 -translate-x-full bg-white pt-20 transition-transform md:translate-x-0"
        aria-label="Sidebar">
        <div class="h-full overflow-y-auto bg-white px-3 pb-4">
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="#" class="group flex items-center rounded-lg p-2 text-gray-900 hover:bg-gray-100">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="h-4 w-4 text-gray-500 transition duration-75 group-hover:text-gray-900">
                            <path
                                d="M11.47 3.841a.75.75 0 0 1 1.06 0l8.69 8.69a.75.75 0 1 0 1.06-1.061l-8.689-8.69a2.25 2.25 0 0 0-3.182 0l-8.69 8.69a.75.75 0 1 0 1.061 1.06l8.69-8.689Z" />
                            <path
                                d="m12 5.432 8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 0 1-.75-.75v-4.5a.75.75 0 0 0-.75-.75h-3a.75.75 0 0 0-.75.75V21a.75.75 0 0 1-.75.75H5.625a1.875 1.875 0 0 1-1.875-1.875v-6.198a2.29 2.29 0 0 0 .091-.086L12 5.432Z" />
                        </svg>


                        <span class="ms-3 text-sm">Beranda</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="group flex items-center rounded-lg p-2 text-gray-900 hover:bg-gray-100">

                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="h-4 w-4 flex-shrink-0 text-gray-500 transition duration-75 group-hover:text-gray-900">
                            <path fill-rule="evenodd"
                                d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z"
                                clip-rule="evenodd" />
                        </svg>

                        <span class="text-s ms-3 flex-1 whitespace-nowrap text-sm">Cari</span>
                    </a>
                </li>


            </ul>
        </div>
    </aside>

    <div class="flex h-screen flex-col md:ml-56">
        <div
            class="scrollbar-thumb-rounded-full scrollbar scrollbar-thin scrollbar-thumb-gray-600 mt-16 flex h-32 flex-1 overflow-y-auto overflow-y-scroll rounded-tl-lg bg-gray-100 p-4">
            @yield('content')
        </div>
    </div>


    <script src="{{ asset('./node_modules/flowbite/dist/flowbite.js') }}"></script>
</body>

</html>
