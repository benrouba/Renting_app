<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EasyRent</title>
    <link rel="stylesheet" href="{{ asset('CSS/welcome.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
</head>

<body>
    <section id='header'>
        <div class="main_back">
            <div class="container">
                <nav class="navbar navbar-expand-md navbar-light">
                    <a href="/" class="clickable">
                        <div class="d-flex main_color">
                            <h1>Easyrent</h1>
                            <span class="material-symbols-outlined">
                                real_estate_agent
                            </span>
                        </div>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ml-auto align-items-center">
                            <li class="nav-item active">
                                <a class="nav-link main_color f16" href="{{ route('adminpage') }}">Admin <span
                                        class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link main_color f16" href="/">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link main_color f16" href="{{route('buy')}}">Buy</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link main_color f16" href="{{ route('rent') }}">Rent</a>
                            </li>
                            @if (!Auth::check())
                                <li class="nav-item d-md-none">
                                    <a class="nav-link main_color f16" href="{{ route('register') }}">Register</a>
                                </li>
                            @endif
                            @if (!Auth::check())
                                <li class="nav-item d-md-none">
                                    <a class="nav-link main_color f16" href="{{ route('login') }}">Login</a>
                                </li>
                            @endif
                            <li class="nav-item d-md-none">
                                <a class="nav-link main_color f16" href="{{ route('add-property') }}">Add your place</a>
                            </li>
                            @if (Auth::check())
                                <li class="nav-item d-md-none">
                                    <a class="nav-link main_color f16" href="{{ route('logout') }}">Logout</a>
                                </li>
                            @endif
                            <li class="nav-item d-none d-md-block">

                                <div class="dropdown">
                                    <button class="btn p-0 dropdown-toggle" type="button" id="dropdownMenuButton"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="material-symbols-outlined">
                                            menu
                                        </span>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        @if (!Auth::check())
                                            <a class="dropdown-item" href="{{ route('register') }}">Register</a>
                                        @endif
                                        @if (!Auth::check())
                                            <a class="dropdown-item" href="{{ route('login') }}">Login</a>
                                        @endif
                                        <a class="dropdown-item" href="{{ route('add-property') }}">Add your place</a>
                                        @if (Auth::check())
                                            <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                                        @endif
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </section>
    <section>
        <div class="bd-example">
            <div id="carouselExampleCaptions" class="carousel slide position-relative" data-ride="carousel">

                <div class="carousel-container">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="4"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100"
                                src="{{ asset('images/01_Sonder_The_Winfield___Los_Angeles.png') }}"
                                alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ asset('images/02_Sonder_Business_Bay___Dubai.png') }}"
                                alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100"
                                src="{{ asset('images/03_Sonder_Maisonneuve___Montreal.jpg') }}" alt="Third slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100"
                                src="{{ asset('images/04_Sonder_Flatiron___New_York_City.jpg') }}" alt="Third slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100"
                                src="{{ asset('images/05_Sonder_Park_House___Amsterdam.png') }}" alt="Third slide">
                        </div>
                    </div>
                </div>
                <div class="position-absolute carousel_text">
                    <h1 class="f72 main_color">A better way <br> to stay</h1>
                    <p class="f18 main_color lh30">
                        We offer the best rental properties in the world. <br> Find your next home with us.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container pb-5">
            <div class="my-5">
                <h2 class="main_color f48">A world of choice</h2>
                <p class="f18 main_color lh30">From a room for a night to a loft for as long as you like, <br> there’s
                    a Sonder for every occasion. </p>
                <div class="row mt-4">
                    <div class="col-md-3">
                        <div class="w-100">
                            <img src="{{ asset('images/London.webp') }}" alt="" class="width_inherit mb-2">
                            <span class="f12 main_color">15 NEIGHBERHOODS</span>
                            <h3 class="f24 main_color">Annaba</h3>
                        </div>
                        <div class="w-100 mt-3">
                            <img src="{{ asset('images/Dubai.webp') }}" alt="" class="width_inherit mb-2">
                            <span class="f12 main_color">26 NEIGHBERHOODS</span>
                            <h3 class="f24 main_color">Alger</h3>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-4 d-flex ">
                        <div class="w-100">
                            <img src="{{ asset('images/New_York_City_-_Featured.jpg') }}" alt=""
                                class="width_inherit br70 mb-2 h-100">
                            <span class="f12 main_color">7 NEIGHBERHOODS</span>
                            <h3 class="f24 main_color">Oran</h3>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-3">
                        <div class="w-100">
                            <img src="{{ asset('images/Los_Angeles.webp') }}"
                                alt=""class="width_inherit mb-2">
                            <span class="f12 main_color">3 NEIGHBERHOODS</span>
                            <h3 class="f24 main_color">Setif</h3>
                        </div>
                        <div class="w-100 mt-3">
                            <img src="{{ asset('images/Montreal.webp') }}" alt=""class="width_inherit mb-2">
                            <span class="f12 main_color">9 NEIGHBERHOODS</span>
                            <h3 class="f24 main_color">Bejaia</h3>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <section>
        <div class="pt-5 beige_back">
            <div class="container">
                <h2 class="main_color f48">A stay infused with <br> creativity and culture
                </h2>
                <p class="f24 main_color lh30">From award-winning interiors to curated neighborhood <br> guides, our
                    stays
                    celebrate what’s special about each city <br> we call home.
                </p>
                <ul class="nav nav-tabs py-3">
                    @foreach ($provinces as $key => $item)
                        <li class=""><a href="#{{ $item->province }}" data-toggle="tab"
                                class="main_color f18 pr-3 {{ $key == 0 ? 'active' : '' }}">{{ $item->province }}</a>
                        </li>
                    @endforeach
                </ul>
                <div class="tab-content pb-5">
                    @foreach ($provinces as $key => $item)
                        <div class="tab-pane pt-5 {{ $key == 0 ? 'active' : '' }}" id="{{ $item->province }}">
                            <div class="row">
                                <div class="col-md-6">
                                    <img src="{{ asset('images/' . $item->property->image) }}" alt=""
                                        class="width_inherit property_img">

                                </div>
                                <div class="col-md-6 d-flex  flex-column justify-content-center ">
                                    <h3 class="main_color f30 d-flex align-items-center"> <span
                                            class="material-symbols-outlined">
                                            location_on
                                        </span> {{ $item->property->address }}, {{ $item->property->province }}</h3>
                                    <p class="f16 pt-3">
                                        {{ $item->property->description }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="position-relative">
            <div class="video_container">
                <video autoplay loop muted src="{{ asset('images/background-video.mp4') }}" class="w-100"
                    type="video/mp4"></video>
            </div>
            <div class="video_text">
                <h2 class="text-white f48">Hotel amenities <br> without hotel formality</h2>
                <p class="text-white lh30 pt-4">From simple self check-in to boutique <br> bathroom amenities, we bring
                    the best <br> of a
                    hotel without any of the formality.
                </p>
            </div>
        </div>
    </section>
    <section>
        <div class="container my-5">
            <div>
                <h2 class="main_color f48">Every stay has a story</h2>
                <p class="f18 main_color lh30">It’s hard to explain what makes EasyRent so special. Unless,<br>of
                    course, you’re one of our guests. </p>
            </div>
        </div>
        <div class="container my-5 ">
            <div class="owl-carousel carousel_container">
                <div class="p-4 yellow_back mx-2 br_88_t_r d-flex flex-column justify-content-center">
                    <p class="main_color f24"> "Our stay at the Wellborne was absolutely fabulous! The check-in
                        process was a breeze. The room
                        and
                        entire hotel were adorably decorated and everything was super clean!"</p>
                    <p class="f12 main_color">Orlando Bloom</p>
                </div>
                <div class="p-4 bleu_back mx-2 br_88_b_l d-flex flex-column justify-content-center">
                    <p class="text-white f24"> “Love the app! It works like magic and all the information is super
                        helpful to make the experience seamless”
                    </p>
                    <p class="f12 text-white">Orlando Bloom</p>
                </div>
                <div class="p-4 green_back mx-2 br_88_t_r d-flex flex-column justify-content-center">
                    <p class="text-white f24">"Loved everything about Sonder. The staff made me feel at home. Would
                        definitely recommend this to everyone looking for a home away from home."</p>
                    <p class="f12 text-white">Orlando Bloom</p>
                </div>
                <div class="p-4 light_green_back mx-2 br_88_t_r d-flex flex-column justify-content-center">
                    <p class="main_color f24"> "I had a wonderful stay and was blown away by the thoughtful design and
                        functionality of the apartment. Can’t wait to check out other Sonders in the future."</p>
                    <p class="f12 main_color">Orlando Bloom</p>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="main_background_color">
            <div class="container py-5">
                <div class="d-flex text-white mb-4">
                    <h1>Easyrent</h1>
                    <span class="material-symbols-outlined">
                        real_estate_agent
                    </span>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <span class="text-secondary ">QUICK MENU</span>
                        <ul class="nav flex-column mt-2">
                            <li class="nav-item">
                                <a class="nav-link text-white py-2 px-0" href="{{ route('adminpage') }}">Admin </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white py-2 px-0" href="/">Home </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white py-2 px-0" href="{{route('buy')}}">Buy </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white py-2 px-0" href="{{ route('rent') }}">Rent </a>
                            </li>
                            <li class="nav-item">
                                @if (!Auth::check())
                                    <a class="nav-link text-white py-2 px-0" href="{{ route('login') }}">Login </a>
                                @endif
                            </li>
                            <li class="nav-item">
                                @if (!Auth::check())
                                    <a class="nav-link text-white py-2 px-0" href="{{ route('register') }}">Register
                                    </a>
                                @endif
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <span class="text-secondary ">SUPPORT</span>
                        <ul class="nav flex-column mt-2">
                            <li class="nav-item">
                                <a class="nav-link text-white  py-2 px-0" href="#">Help Center </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <span class="text-secondary ">SOCIAL</span>
                        <ul class="nav  mt-2">
                            <li class="nav-item">
                                <a class="nav-link text-white py-2 px-0 mr-3"target='_blank'
                                    href="{{ url('http://www.facebook.com/') }}"><i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white py-2 px-0 mr-3"target='_blank'
                                    href="{{ url('http://www.twitter.com/') }}"><i class="fab fa-twitter"></i> </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white py-2 px-0 mr-3"target='_blank'
                                    href="{{ url('http://www.instagram.com/') }}"><i class="fab fa-instagram"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white py-2 px-0 mr-3"target='_blank'
                                    href="{{ url('http://www.linkedin.com/') }}"><i class="fab fa-linkedin-in"></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                </div>
                <div class="row">
                    <div class="col-sm-8 text-white f20 mt-5 mb-3">Ⓒ 2024 EasyRent Holdings Inc. All rights reserved.
                    </div>
                    <div class="col-sm-4 text-white f20 mt-5 mb-3">+213 655879412</div>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script>
        $(document).ready(function() {
            $(".owl-carousel").owlCarousel({
                autoplay: true,
                center: true,
                loop: true,
                items: 2,
                margin: 20,
                responsive: {
                    // breakpoint from 0 up
                    0: {
                        items: 1,
                    },
                    // breakpoint from 768 up
                    992: {
                        items: 2,
                    }
                }

            });

        });
    </script>
</body>

</html>
