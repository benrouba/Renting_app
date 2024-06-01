<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <a href="/">
        <div class="d-flex main_color my-3 justify-content-center">
            <h1>Easyrent</h1>
            <span class="material-symbols-outlined">
                real_estate_agent
            </span>
        </div>
    </a>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link greyColor" href="{{ route('clients') }}">Clients</a>
        </li>
        <li class="nav-item">
            <a class="nav-link greyColor" href="#">Owner</a>
        </li>
        <li class="nav-item">
            <a class="nav-link greyColor" href="#">Properties</a>
        </li>
        <li class="nav-item">
            <a class="nav-link greyColor" href="#">Pending</a>
        </li>
    </ul>
</body>

</html>
