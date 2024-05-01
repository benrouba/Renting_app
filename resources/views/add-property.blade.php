<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add property</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/add-property.css') }}">
</head>

<body>
    <div class="container">
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
                <div class="form-group col-md-6 position-relative">
                    <label for="price">Price</label>
                    <input type="number" class="form-control" id="price" name="price"
                        placeholder="Enter the price" min="0">
                    <span class="position-absolute price">DZD</span>
                </div>
                <div class="form-group col-md-6">
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
                    <input type="file" class="form-control-file" id="images[]" multiple name="images[]" value="images">
                </div>
            </div>

            <button type="submit" class="btn add_property_btn">Add Prperty</button>
        </form>
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
