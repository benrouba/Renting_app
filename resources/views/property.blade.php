<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Property details </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/property.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap"
        rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="my-3"><b>{{ $property->address }}, {{ $property->province }}</b></h2>
            @if (Auth::user()->usertype === 'owner' && $property->propertyownerid === Auth::user()->id)
                <form action="{{ route('editProperty', $property->id) }}" method="post">
                    <div class="custom-control custom-switch">
                        @if ($property->is_available)
                            <input type="checkbox" class="custom-control-input" name="is_available" id="is_available"
                                checked>
                        @else
                            <input type="checkbox" class="custom-control-input" name="is_available" id="is_available">
                        @endif
                        <label class="custom-control-label" for="is_available">Is available</label>
                    </div>
                    <meta name="csrf-token" content="{{ csrf_token() }}">

                </form>
            @endif
        </div>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                @foreach (json_decode($property->images) as $key => $image)
                    <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}"
                        class="{{ $key == 0 ? 'active' : '' }}"></li>
                @endforeach
            </ol>

            <div class="carousel-inner">
                @foreach (json_decode($property->images) as $key => $image)
                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                        <img src="{{ asset('images/' . $image) }}" class="d-block w-100 br_8 carousel_img"
                            alt="...">
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <div class="mt-3">
            <span><b class="f_26">Descripton </b></span>
            <p class="">{{ $property->description }}</p>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="mt-3">
                    <span><b class="f_26">Host </b></span>
                    <p> <span class="mr-2">Name: </span> <b>{{ $property->owner->name }}</b></p>
                    <p> <span class="mr-2">Email: </span> <b>{{ $property->owner->email }}</b></p>
                    <p> <span class="mr-2">Phone number: </span> <b>{{ $property->owner->phone_number }}</b></p>
                </div>
                <div class="mt-3">
                    <span><b class="f_26">Host Message </b></span>
                    <p class="">{{ $property->message }}</p>
                </div>
                <div class="mt-3">
                    <span><b class="f_26">Number of chambers </b></span>
                    <p class="">{{ $property->rooms_number }}</p>
                </div>
            </div>
            <div class="col-md-6">
                <div id="googleMap" style="width:100%;height:100%;"></div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script>
        function initMap() {
            const LatLng = {
                lat: 36.7605773,
                lng: 8.0560736
            };

            var mapProp = {
                center: LatLng,
                zoom: 10,
                styles: [{
                        "featureType": "water",
                        "elementType": "geometry",
                        "stylers": [{
                                "hue": "#165c64"
                            },
                            {
                                "saturation": 34
                            },
                            {
                                "lightness": -69
                            },
                            {
                                "visibility": "on"
                            }
                        ]
                    },
                    {
                        "featureType": "landscape",
                        "elementType": "geometry",
                        "stylers": [{
                                "hue": "#b7caaa"
                            },
                            {
                                "saturation": -14
                            },
                            {
                                "lightness": -18
                            },
                            {
                                "visibility": "on"
                            }
                        ]
                    },
                    {
                        "featureType": "landscape.man_made",
                        "elementType": "all",
                        "stylers": [{
                                "hue": "#cbdac1"
                            },
                            {
                                "saturation": -6
                            },
                            {
                                "lightness": -9
                            },
                            {
                                "visibility": "on"
                            }
                        ]
                    },
                    {
                        "featureType": "road",
                        "elementType": "geometry",
                        "stylers": [{
                                "hue": "#8d9b83"
                            },
                            {
                                "saturation": -89
                            },
                            {
                                "lightness": -12
                            },
                            {
                                "visibility": "on"
                            }
                        ]
                    },
                    {
                        "featureType": "road.highway",
                        "elementType": "geometry",
                        "stylers": [{
                                "hue": "#d4dad0"
                            },
                            {
                                "saturation": -88
                            },
                            {
                                "lightness": 54
                            },
                            {
                                "visibility": "simplified"
                            }
                        ]
                    },
                    {
                        "featureType": "road.arterial",
                        "elementType": "geometry",
                        "stylers": [{
                                "hue": "#bdc5b6"
                            },
                            {
                                "saturation": -89
                            },
                            {
                                "lightness": -3
                            },
                            {
                                "visibility": "simplified"
                            }
                        ]
                    },
                    {
                        "featureType": "road.local",
                        "elementType": "geometry",
                        "stylers": [{
                                "hue": "#bdc5b6"
                            },
                            {
                                "saturation": -89
                            },
                            {
                                "lightness": -26
                            },
                            {
                                "visibility": "on"
                            }
                        ]
                    },
                    {
                        "featureType": "poi",
                        "elementType": "geometry",
                        "stylers": [{
                                "hue": "#c17118"
                            },
                            {
                                "saturation": 61
                            },
                            {
                                "lightness": -45
                            },
                            {
                                "visibility": "on"
                            }
                        ]
                    },
                    {
                        "featureType": "poi.park",
                        "elementType": "all",
                        "stylers": [{
                                "hue": "#8ba975"
                            },
                            {
                                "saturation": -46
                            },
                            {
                                "lightness": -28
                            },
                            {
                                "visibility": "on"
                            }
                        ]
                    },
                    {
                        "featureType": "transit",
                        "elementType": "geometry",
                        "stylers": [{
                                "hue": "#a43218"
                            },
                            {
                                "saturation": 74
                            },
                            {
                                "lightness": -51
                            },
                            {
                                "visibility": "simplified"
                            }
                        ]
                    },
                    {
                        "featureType": "administrative.province",
                        "elementType": "all",
                        "stylers": [{
                                "hue": "#ffffff"
                            },
                            {
                                "saturation": 0
                            },
                            {
                                "lightness": 100
                            },
                            {
                                "visibility": "simplified"
                            }
                        ]
                    },
                    {
                        "featureType": "administrative.neighborhood",
                        "elementType": "all",
                        "stylers": [{
                                "hue": "#ffffff"
                            },
                            {
                                "saturation": 0
                            },
                            {
                                "lightness": 100
                            },
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "administrative.locality",
                        "elementType": "labels",
                        "stylers": [{
                                "hue": "#ffffff"
                            },
                            {
                                "saturation": 0
                            },
                            {
                                "lightness": 100
                            },
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "administrative.land_parcel",
                        "elementType": "all",
                        "stylers": [{
                                "hue": "#ffffff"
                            },
                            {
                                "saturation": 0
                            },
                            {
                                "lightness": 100
                            },
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "administrative",
                        "elementType": "all",
                        "stylers": [{
                                "hue": "#3a3935"
                            },
                            {
                                "saturation": 5
                            },
                            {
                                "lightness": -57
                            },
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "poi.medical",
                        "elementType": "geometry",
                        "stylers": [{
                                "hue": "#cba923"
                            },
                            {
                                "saturation": 50
                            },
                            {
                                "lightness": -46
                            },
                            {
                                "visibility": "on"
                            }
                        ]
                    }
                ]

            };
            new google.maps.Marker({
                position: LatLng,
                map,
                title: "Hello World!",
            });
            const marker = new google.maps.Marker({
                position: LatLng,
                map: map
            });


            var map = new google.maps.Map(document.getElementById("googleMap"), mapProp, marker);
            marker.setMap(map);
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDH1gP_K3PKyrGZxadhLVsixfEYVCIy3UI&callback=initMap">
        < script >
            const is_available = document.getElementById('is_available');
        is_available.addEventListener('change', function() {
            // send a request to the server to update the value of is_available
            fetch('/edit-property/' + {{ $property->id }}, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}' // Include CSRF token
                    },
                    body: JSON.stringify({
                        is_available: is_available.checked ? 1 : 0
                    }),
                }).then(response => response.json())
                .then(data => {
                    console.log(data);
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });
    </script>
</body>

</html>
