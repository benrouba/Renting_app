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
</head>

<body>
    <section id='header'>
        <div class="main_back">
            <div class="container">
                <nav class="navbar navbar-expand-md navbar-light">
                    <div class="d-flex main_color">
                        <h1>Easyrent</h1>
                        <span class="material-symbols-outlined">
                            real_estate_agent
                        </span>
                    </div>
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
                                <a class="nav-link main_color f16" href="#">Buy</a>
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
                                src="{{ asset('images/01_Sonder_The_Winfield___Los_Angeles.png') }}" alt="First slide">
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
        <div class="container">
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
        <div class="container pt-5">
            <h2 class="main_color f48">A stay infused with <br> creativity and culture
            </h2>
            <p class="f24 main_color lh30">From award-winning interiors to curated neighborhood <br> guides, our stays
                celebrate what’s special about each city <br> we call home.
            </p>
            <ul class="nav nav-pills">
                @foreach ($provinces as $key => $item)
                    <li class="{{ $key == 0 ? 'active' : '' }}"><a data-toggle="pill" class="main_color f18 pr-3"
                            href="#{{ $item->province }}">{{ $item->province }}</a>
                @endforeach
            </ul>
            <div class="tab-content mt-3">
                @foreach ($provinces as $key => $item)
                    <div id="{{ $item->province }}" class="tab-pane fade in {{ $key == 0 ? 'active' : '' }} ">
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
            <div class="py-5">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut quasi reprehenderit iusto aliquam facilis
                possimus?
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>


















{{--



<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{ asset('CSS/home.css') }}">
    <title>home</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <header>
        <div class="content flex_space">
            <div class="logo">
                <h1>easyrent</h1>
                <span class="material-symbols-outlined">
                    real_estate_agent
                </span>
            </div>
            <div class="myownlist">
                <ul>
                    <li><a href="{{ route('adminpage') }}">admin</a></li>
                    <li><a href="#">home</a></li>
                    <li><a href="#">Buy</a></li>
                    <li><a href="{{ route('rent') }}">Rent</a></li>
                    @if (!Auth::check())
                       <li> <a href="{{ route('register') }}">Register</a></li>
                    @endif
                    @if (!Auth::check())
                        <li><a href="{{ route('login') }}">login</a></li>
                    @endif
                    <li class="material-symbols-outlined">
                        search
                    </li>
                   @if (Auth::check())
                   <button class="primary-btn"><a href="{{ route('logout') }}">logout</a></button>
                   @endif
                </ul>
            </div>
        </div>
    </header>

    <section>

        <div class="container">
            <div class="text">
                <p>dz property to rent</p>
            </div>
            <p>Search using 'town name'</p>
            <div class="item">
                <form>
                    <select name="" id="">

                        <option value="town name">twon name</option>
                        <option value="taref">taref</option>
                        <option value="annaba">annaba</option>
                        <option value="alger">alger</option>
                        <option value="beskra">beskra</option>
                        <option value="jijel">jijel</option>
                        <option value="bjaya">bjaya</option>
                        <option value="wergla">wergla</option>
                    </select>

                    <button type="submit" class="secondary-btn">to rent</button>
                </form>
            </div>
        </div>
    </section>

    <section class="presentation">


        <h2>Dashboards to rent - find your next move with us</h2>
        <p> From student lettings to studio flats, detached homes or even a luxury Mayfair penthouse. Whatever home
            you're looking for,<br> we're here to help with the algeria largest selection of homes to rent.</p>

    </section>

    <section class="pre-signup">

        <h3>Sign in to streamline your search</h3>
        <div class="flex">
            <p>Save properties, create alerts and keep track of the enquiries you send to agents.</p>
            <button class="secondary-btn">sing in or create un account</button>
        </div>
    </section>
    <div class="prbutton">
        <button class="secondary-btn"><a href="buy.html">buy</a></button>
        <button class="secondary-btn"><a href="rent.html">rent</a></button>
        <button class="secondary-btn"><a href="sale.html">sale</a></button>

    </div>

    </section>
    <footer class="footer">
        <div class="containerf">
            <div class="row">
                <div class="footer-col">
                    <h4>company</h4>
                    <ul>
                        <li><a href="#">about us </a></li>
                        <li><a href="#">our services</a></li>
                        <li><a href="#">privacy policy</a></li>
                        <li><a href="#">affiliate program</a></li>

                    </ul>
                </div>
                <div class="footer-col">
                    <h4>get help</h4>
                    <ul>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">shipping</a></li>
                        <li><a href="#">returns</a></li>
                        <li><a href="#">order status</a></li>
                        <li><a href="#">payment option</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>online shop</h4>
                    <ul>
                        <li><a href="#">watch</a></li>
                        <li><a href="#">bag</a></li>
                        <li><a href="#">shoes</a></li>
                        <li><a href="#">dress</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>follow us</h4>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>


    </footer>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>  --}}
