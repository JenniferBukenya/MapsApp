<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MapsApp</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    {{-- <script src="https://www.bing.com/api/maps/mapcontrol?callback=loadMapScenario" async defer></script> --}}
    <!-- Styles -->
    <style>
        #map {
            /* width: 400px; */
            height: 500px;
            border-radius: 10px;
        }
    </style>
    <!--Scripts-->
    <script
        src="https://www.bing.com/api/maps/mapcontrol?callback=loadMapScenario&key=AvvQV4ch_5cSpbgNw94ftFt3Xsy41cLVIBmOuhrd3WRvTFzKW2kLP09WeNPSfgrg"
        async defer></script>

</head>

<body>

    <div>
        <a href="{{ url('/farms') }}" {{-- class="inline-block px-2 py-2 rounded-sm text-white bg-blue-700 hover:bg-blue-500">Back --}} <i class="fas fa-arrow-left"></i> Back to Farms
        </a>
    </div>
    <div>
        {{-- <h2>Hive Locations</h2> --}}
        @foreach ($farm as $farms)
            <p>
            <h1>{{ $farms->name }}:</h1>
            <h3>Hive Locations</h3>
            </p>


             <ul>
                 {{ $hives }} 
                @foreach ($hives as $hive)
                    <li><span>{{ $hive->id }}</span> {{ $hive->latitude }}, Longitude: {{ $hive->longitude }}</li>
                    
                @endforeach
            </ul> 
        @endforeach
    </div>

    <div id="map">
        The Map
    </div>


    <script>
        function loadMapScenario() {
            var map = new Microsoft.Maps.Map('#map', {
                credentials: 'AvvQV4ch_5cSpbgNw94ftFt3Xsy41cLVIBmOuhrd3WRvTFzKW2kLP09WeNPSfgrg',
                center: new Microsoft.Maps.Location(0.3136, 32.5811),
                zoom: 8
            });

            @foreach ($hives as $hive)
                var location = new Microsoft.Maps.Location({{ $hive->latitude }}, {{ $hive->longitude }});
                var pinOptions = {
                    text: '{{ $hive->id }}', // Hive ID displayed on the pin
                    color: 'red', // Customize the pin color
                    // anchor: new Microsoft.Maps.Point(12, 24) // Adjust the anchor point of the pin
                };
                var pin = new Microsoft.Maps.Pushpin(location, pinOptions);
                map.entities.push(pin);
            @endforeach
        }
    </script>

</body>

</html>
