<div class="w-64 max-w-sm rounded-lg border border-gray-200 bg-white shadow">
    <a href="{{ $link ?? '#' }}">
        <img class="h-64 rounded-t-lg object-cover" src="{{ asset($imagePath) }}"
            alt="{{ $altText ?? '' }}" />
    </a>
    <div class="p-5">
        <a href="{{ $link ?? '#' }}">
            <h5 class="text-xl font-bold tracking-tight text-black">{{ $title }}</h5>
        </a>
        <p class="mb-2 text-xs font-normal text-black">{{ $location }}</p>
        <p class="mb-4 text-sm font-normal text-black">{{ $description }}</p>
        <div class="mb-1 flex w-full text-xs font-medium">
            <p>Terkumpul</p>
            <p class="text-primary ms-auto font-bold">{{ $percentageCollected }}%</p>
        </div>
        <div class="h-1.5 w-full rounded-full bg-gray-200">
            <div class="bg-primary h-1.5 rounded-full" style="width: {{ $percentageCollected }}%"></div>
        </div>
    </div>
</div>
