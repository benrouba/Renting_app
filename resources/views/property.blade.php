<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Property details </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="{{asset('css/property.css')}}">
        <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap"
        rel="stylesheet">
</head>

<body>
    <div class="container">
        <h2 class="my-3"><b>{{$property->address}}, {{$property->province}}</b></h2>
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
            <span ><b class="f_26">Descripton </b></span>
            <p class="">{{$property->description}}</p>
        </div>
        <div class="mt-3">
            <span ><b class="f_26">Host </b></span>
            <p> <span class="mr-2">Name: </span> <b>{{$property->owner->name}}</b></p>
            <p> <span class="mr-2">Email: </span> <b>{{$property->owner->email}}</b></p>
            <p> <span class="mr-2">Phone number: </span> <b>{{$property->owner->phone_number}}</b></p>
        </div>
        <div class="mt-3">
            <span ><b class="f_26">Host Message  </b></span>
            <p class="">{{$property->message}}</p>
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
</body>

</html>
