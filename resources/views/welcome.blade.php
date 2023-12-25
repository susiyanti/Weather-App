<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Weather App</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    @vite('resources/css/app.css')
</head>

<body class="antialiased">
    <div class="mt-8">
        <div class="w-96 mx-auto">
            <h1>5 Days Weather Forecast</h1>

            @isset($cities)
            <label for="city">Select city:</label>
            <select id="city" class="form-control">
                @foreach ($cities as $city)
                <option value={{ $city['id'] }}>{{ $city['name'] }}</option>
                @endforeach
            </select>
            @endisset

            @empty($cities)
            <p>Can not load cities at the moment, try again later</p>
            @endempty

        </div>
    </div>
</body>

</html>
