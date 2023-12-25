<div class="w-96 mx-auto">
    <ul class="px-4 py-6 space-y-8">
        @forelse ($forecast as $weather)
        <li class="grid grid-cols-weather items-center">
            <div class="text-gray-400">{{ strtoupper(\Carbon\Carbon::createFromTimestamp($weather['dt'])->toFormattedDayDateString()) }}</div>
            <div class="flex items-center">
                <div>
                    <img src="http://openweathermap.org/img/wn/{{ $weather['weather'][0]['icon'] }}.png" alt="icon">
                </div>
                <div>{{ ucfirst($weather['weather'][0]['description']) }}</div>
            </div>
        </li>
        @empty
        <p>No Weather Forecast Found</p>
        @endforelse
    </ul>
</div>
