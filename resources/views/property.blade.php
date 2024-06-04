<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Property details </title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
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
            <div class="d-flex align-items-center">
                <a href="/" class="mr-3 black"><span class="material-symbols-outlined">
                        arrow_back
                    </span></a>
                <h2 class="my-3"><b>{{ $property->address }}, {{ $property->province }}</b></h2>
            </div>
            @if (auth()->user())
                @if (Auth::user()->usertype === 'owner' && $property->propertyownerid === Auth::user()->id)
                    <form action="{{ route('editProperty', $property->id) }}" method="post">
                        <div class="custom-control custom-switch">
                            @if ($property->is_available)
                                <input type="checkbox" class="custom-control-input" name="is_available"
                                    id="is_available" checked>
                            @else
                                <input type="checkbox" class="custom-control-input" name="is_available"
                                    id="is_available">
                            @endif
                            <label class="custom-control-label" for="is_available">Is available</label>
                        </div>
                        <meta name="csrf-token" content="{{ csrf_token() }}">

                    </form>
                @endif

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
                    <span><b class="f_26">Price </b></span>
                    <p class="">{{ $property->price }}</p>
                </div>
                <div class="mt-3">
                    <span><b class="f_26">Host Message </b></span>
                    <p class="">{{ $property->message }}</p>
                </div>
                <div class="mt-3">
                    <span><b class="f_26">Number of chambers </b></span>
                    <p class="">{{ $property->rooms_number }}</p>
                </div>
                @if (auth()->user())
                    @if (auth()->user()->usertype === 'owner' && $property->propertyownerid === Auth::user()->id)
                        @if ($property->interested_clients != null)
                            <div class="mt-3">
                                <span><b class="f_26">Interested Clients</b></span>
                                <p class="d-flex flex-column">
                                    @foreach ($property->interested_clients as $key => $item)
                                        <div class="d-flex">
                                            <span class="green_color pr-2">{{ $item->name }} </span>
                                            <span class=""> {{ $item->phone_number }}</span>
                                        </div>
                                    @endforeach
                                </p>
                            </div>
                        @endif
                    @endif
                @endif
            </div>
            <div class="col-md-6">
                <div id="googleMap" style="width:100%;height:100%;"></div>
            </div>
        </div>
        <div class="my-3">
            @if (auth()->user())
                @if (Auth::user()->usertype === 'client')
                    <button class="btn show_interest_btn" id="show_interest" name="show_interest" type='submit'>Show
                        Interest</button>
                @endif
            @endif
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
        var lat = {{ $property->latitude }};
        var lng = {{ $property->longitude }};
    </script>
    <script src="{{ asset('js/init_map.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDH1gP_K3PKyrGZxadhLVsixfEYVCIy3UI&callback=initMap">
    </script>
    <script>
        const is_available = document.getElementById('is_available');
        is_available?.addEventListener('change', function() {
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
    <script>
        $(document).ready(function() {
            $('#show_interest').click(function() {
                // send a request to the server to update the value of is_available
                fetch('/edit-property/' + {{ $property->id }}, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}' // Include CSRF token
                        },
                        body: JSON.stringify({
                            interested_clients: ""
                        }),
                    }).then(response => response.json())
                    .then(data => {
                        console.log(data);
                        // refresh the page
                        // location.reload();
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            });
        });
    </script>
</body>

</html>
