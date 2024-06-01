<div class="object-fit hidden duration-700 ease-in-out" data-carousel-item="{{ $isActive ? 'active' : '' }}">
    <img src="{{ asset('img/Untitled-1.png') }}"
        class="absolute w-full lg:h-full h-48 object-cover me-auto block lg:w-64" alt="...">
    <div
        class="absolute z-40 lg:ms-64 lg:mt-0 mt-48 h-full w-full p-4 text-black md:block">
        <h5 class="font-bold">{{ $title }}</h5>
        <p class="text-xs">
            {{ $location }}
        </p>
        <p class="text-wrap mt-2 w-full text-xs">
            {{ $description }}
        </p>
    </div>
</div>
