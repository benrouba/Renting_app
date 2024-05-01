<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{ asset('CSS/home.css') }}">
    <title>home</title>
    {{-- bootstrap --}}
    {{-- icons --}}
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> --}}
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
                    {{-- hi {{Auth::user()->username}} --}}
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
    {{-- bootstrap --}}

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

</html>
