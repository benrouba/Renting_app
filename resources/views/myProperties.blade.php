<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Properties to rent </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/rent.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

</head>

<body>

    <div class="header_container">
        <img class="header_img" src="{{ asset('images/hp-hero-desktop-xl.jpg') }}" alt="">
        <div class="header_text_container">
            <h1 class="header_text">The #1 site real estate <br> professionals trust*</h1>
            <ul class="nav justify-content-center">
                <li class="nav-item">
                    <a class="nav-link text-white f16" href="{{ route('adminpage') }}">Admin</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white f16" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white f16" href="{{ route('rent') }}">Rent</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white f16" href="{{ route('add-property') }}">Sell</a>
                </li>
                @if (!Auth::check())
                    <li class="nav-item d-md-none">
                        <a class="nav-link text-white f16" href="{{ route('register') }}">Register</a>
                    </li>
                @endif
                @if (!Auth::check())
                    <li class="nav-item d-md-none">
                        <a class="nav-link text-white f16" href="{{ route('login') }}">Login</a>
                    </li>
                @endif
                <li class="nav-item d-md-none">
                    <a class="nav-link text-white f16" href="{{ route('add-property') }}">Add your place</a>
                </li>
                @if (Auth::check())
                    <li class="nav-item d-md-none">
                        <a class="nav-link text-white f16" href="{{ route('logout') }}">Logout</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>

    <div class="container">
        <a href="/" class="clickable">
            <div class="d-flex main_color py-4">
                <h1>Easyrent</h1>
                <span class="material-symbols-outlined">
                    real_estate_agent
                </span>
            </div>
        </a>
        <div class="row">
            <div class="col-md-2">
                <span class="filter_text"><b class="d-flex align-items-center ">Filter <span
                            class="material-symbols-outlined ml-2">
                            tune
                        </span></b></span>
                <div class="mt-3">
                    <div class="mb-3">
                        <div class="mb-2"><b>PROVINCE</b></div>
                        @foreach ($provinces as $item)
                            <button class="btn border_1 mb-1 province" value="{{ $item->province }}">
                                {{ $item->province }}
                            </button>
                        @endforeach
                    </div>
                    <div class="mb-3">
                        <div class="mb-2"><b>NUMBER OF ROOMS </b></div>
                        <button class="btn border_1 room" value="1">
                            1
                        </button>
                        <button class="btn border_1 room" value="2">
                            2
                        </button>
                        <button class="btn border_1 room" value="3">
                            3
                        </button>
                        <button class="btn border_1 room" value="4">
                            4
                        </button>
                    </div>
                    <div class="mb-3">
                        <div class="mb-3"><b>PRICE </b></div>
                        <div id="range-slider-example"></div>
                        <div class="d-flex justify-content-between mt-3">
                            <span>0 DZD</span>
                            <span>{{ $maxprice }} DZD</span>
                        </div>
                    </div>
                    <div>
                        <button class="btn" id="reset">
                            Reset
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-md-10">
                <div class="row">
                    @foreach ($properties as $key_carousel => $item)
                        <div class="col-md-2 p_12_0">
                            <a href="{{ route('property', ['id' => $item->id]) }}">
                                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        @foreach (json_decode($item->images) as $key => $image)
                                            <li data-target="#carouselExampleIndicators"
                                                data-slide-to="{{ $key }}"
                                                class="{{ $key == 0 ? 'active' : '' }}"></li>
                                        @endforeach
                                    </ol>

                                    <div class="carousel-inner">
                                        @foreach (json_decode($item->images) as $key => $image)
                                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                                <img src="{{ asset('images/' . $image) }}"
                                                    class="d-block w-100 br_8 carousel_img" alt="...">
                                            </div>
                                        @endforeach
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                                        data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                                        data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                                <div class="mt-2">
                                    <b> {{ $item->address }}, {{ $item->province }}</b>
                                    <div class="">
                                        <p class="mango">{{ $item->description }}</p>
                                    </div>
                                    <div class="mt-1">
                                        <span class="price"> {{ $item->price }} DZD</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
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
        var min = {{ $minprice }};
        var max = {{ $maxprice }};
        var option = "my-properties";
    </script>
    <script src="{{ asset('js/rangeslider.umd.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
