

       
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{asset ('CSS/footer.css')}}">
  <link rel="stylesheet" href="{{asset('CSS/register.css')}}">
  <title>login</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body>

  <header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">{{config('app.name')}}</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('login')}}">login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('register')}}">register</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

  <div class="container" style="width: 500px">
    <div class="mt-5">
      @if ($errors->any())
        <div class="col-12">
        @foreach ($errors->all() as $error)
         <div class="alert alert-danger">{{$error}}</div>
        
        @endforeach
      </div>
    
      @endif
    
      @if(session()->has ('error'))
        <div class="alert alert-danger">{{session('error')}}</div>
      
      @endif
      @if(session()->has('success'))
        <div class="alert alert-success">{{session('success')}}</div>
      
      @endif
    </div>
<form action="{{route('login.post')}}" method="POST">
@csrf
<div class="mb-3">
<label for="exampleInputEmail1" class="form-label">Email address</label>
<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
<div id="emailHelp" class="form-text" >We'll never share your email with anyone else.</div>
</div>
<div class="mb-3">
<label for="exampleInputPassword1" class="form-label">Password</label>
<input type="password" class="form-control" id="exampleInputPassword1" name="password">
</div>
<div class="mb-3 form-check">
<input type="checkbox" class="form-check-input" id="exampleCheck1" >
<label class="form-check-label" for="exampleCheck1">Check me out</label>
</div>
<button type="submit" class="btn btn-primary">Submit</button>

</form>
</div>


<footer class="footer" style="margin: 171px 0px 0px 0px">
  <div class="container">
    <div class="rown">
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

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" ></script>
</body>
</html>