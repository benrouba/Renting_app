<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add property</title>
    <link rel="stylesheet" href="{{ asset('CSS/welcome.css') }}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/add-property.css') }}">
</head>

<body>
    <section id='header'>
        <div>
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
    <div class="container pt-5">
        <div class="my-5 title text-center">
            Add your property
        </div>
        <form autocomplete="off" method="POST" action="{{ route('postproperty') }}" enctype="multipart/form-data">
            @csrf
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address"
                        placeholder="Enter the address of your property that you want to rent">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputState">Province</label>
                    <select id="province" class="form-control" name="province">
                        <option selected>Choose...</option>
                        <option value="Adrar" name="Adrar">Adrar</option>
                        <option value="Chlef" name="Chlef">Chlef</option>
                        <option value="Laghouat" name="Laghouat">Laghouat</option>
                        <option value="Oum El Bouaghi" name="Oum El Bouaghi">Oum El Bouaghi</option>
                        <option value="Batna" name="Batna">Batna</option>
                        <option value="Béjaïa" name="Béjaïa">Béjaïa</option>
                        <option value="Biskra" name="Biskra">Biskra</option>
                        <option value="Béchar" name="Béchar">Béchar</option>
                        <option value="Blida" name="Blida">Blida</option>
                        <option value="Bouira" name="Bouira">Bouira</option>
                        <option value="Tamanrasset" name="Tamanrasset">Tamanrasset</option>
                        <option value="Tébessa" name="Tébessa">Tébessa</option>
                        <option value="Tlemcen" name="Tlemcen">Tlemcen</option>
                        <option value="Tiaret" name="Tiaret">Tiaret</option>
                        <option value="Tizi Ouzou" name="Tizi Ouzou">Tizi Ouzou</option>
                        <option value="Alger" name="Alger">Alger</option>
                        <option value="Djelfa" name="Djelfa">Djelfa</option>
                        <option value="Jijel" name="Jijel">Jijel</option>
                        <option value="Sétif" name="Sétif">Sétif</option>
                        <option value="Saïda" name="Saïda">Saïda</option>
                        <option value="Skikda" name="Skikda">Skikda</option>
                        <option value="Sidi Bel Abbès" name="Sidi Bel Abbès">Sidi Bel Abbès</option>
                        <option value="Annaba" name="Annaba">Annaba</option>
                        <option value="Guelma" name="Guelma">Guelma</option>
                        <option value="Constantine" name="Constantine">Constantine</option>
                        <option value="Médéa" name="Médéa">Médéa</option>
                        <option value="Mostaganem" name="Mostaganem">Mostaganem</option>
                        <option value="M'Sila" name="M'Sila">M'Sila</option>
                        <option value="Mascara" name="Mascara">Mascara</option>
                        <option value="Ouargla" name="Ouargla">Ouargla</option>
                        <option value="Oran" name="Oran">Oran</option>
                        <option value="El Bayadh" name="El Bayadh">El Bayadh</option>
                        <option value="Illizi" name="Illizi">Illizi</option>
                        <option value="Bordj Bou Arréridj" name="Bordj Bou Arréridj">Bordj Bou Arréridj</option>
                        <option value="Boumerdès" name="Boumerdès">Boumerdès</option>
                        <option value="El Tarf" name="El Tarf">El Tarf</option>
                        <option value="Tindouf" name="Tindouf">Tindouf</option>
                        <option value="Tissemsilt" name="Tissemsilt">Tissemsilt</option>
                        <option value="El Oued" name="El Oued">El Oued</option>
                        <option value="Khenchela" name="Khenchela">Khenchela</option>
                        <option value="Souk Ahras" name="Souk Ahras">Souk Ahras</option>
                        <option value="Tipaza" name="Tipaza">Tipaza</option>
                        <option value="Mila" name="Mila">Mila</option>
                        <option value="Aïn Defla" name="Aïn Defla">Aïn Defla</option>
                        <option value="Naâma" name="Naâma">Naâma</option>
                        <option value="Aïn Témouchent" name="Aïn Témouchent">Aïn Témouchent</option>
                        <option value="Ghardaïa" name="Ghardaïa">Ghardaïa</option>
                        <option value="Relizane" name="Relizane">Relizane</option>
                    </select>
                </div>
                <div class="form-group col-md-4 position-relative">
                    <label for="price">Price</label>
                    <input type="number" class="form-control" id="price" name="price"
                        placeholder="Enter the price" min="0">
                    <span class="position-absolute price">DZD</span>
                </div>
                <div class="form-group col-md-4">
                    <label for="price">For Rent or Sale</label>
                    <select name="forrent" id="forrent" class="form-control">
                        <option selected>Choose...</option>
                        <option value=1>Rent</option>
                        <option value=0>Sale</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="rooms_number">Number of chambers</label>
                    <input type="number" class="form-control" id="rooms_number" name="rooms_number"
                        placeholder="Enter the number of chamber" max="4" min="0">
                </div>
                <div class="form-group col-md-6">
                    <label for="message">Message</label>
                    <textarea name="message" id="message" cols="30" rows="10" class="form-control" name="message"
                        placeholder="Enter your message "></textarea>
                </div>
                <div class="form-group col-md-6">
                    <label for="descripiotn">Description</label>
                    <textarea name="description" id="descripiotn" cols="30" rows="10"class="form-control" name="description"
                        placeholder="Enter your descripiotn "></textarea>
                </div>
                <div class="form-group">
                    <label for="images">Images</label>
                    <input type="file" class="form-control-file" id="images[]" multiple name="images[]"
                        value="images">
                </div>
            </div>

            <button type="submit" class="btn add_property_btn">Add Prperty</button>
        </form>
    </div>
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
                                <a class="nav-link text-white py-2 px-0" href="#">Home </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white py-2 px-0" href="#">Buy </a>
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
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>
