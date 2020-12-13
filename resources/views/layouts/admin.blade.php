<!DOCTYPE html>
<html lang="en">

<head>

  <link rel="shortcut icon" type="image/png" href="{{asset('img/favicon-ganesia - earlier.png')}}" />
  <link rel="stylesheet" type="text/css" href="{{asset('css/styles.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="/your-path-to-fontawesome/css/fontawesome.css" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">


  <title>Pusat Informasi COVID-19</title>

  <!-- Custom fonts for this template-->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{asset('css/asb-admin-2.min.css')}}" rel="stylesheet">

  @yield('custom')

</head>

<body class="container">
  @if((request()->is('register')))

  @else
  <nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
    <a class="navbar-brand" href="#">Admin</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item {{ (request()->is('admin')) ? 'active' : '' }}">
          <a class="nav-link text-dark" href="">All Blogs <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item {{ (Request::segment(2) === 'blog') ? 'active' : '' }}">
          <a class="nav-link text-dark" href="">Create Blogs</a>
        </li>
        <li class="nav-item {{ (Request::segment(2) === 'product') ? 'active' : '' }}">
          <a class="nav-link text-dark" href="">Products</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Hi, test
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            {{-- <a class="dropdown-item text-dark" href="{{ Auth::logout() }}">Logout</a> --}}
            <a class="dropdown-item text-dark" href="">Logout</a>
            <a class="dropdown-item text-dark" href="/register">Tambah Akun Baru</a>
          </div>
        </li>
      </ul>
    </div>
  </nav>
  @endif
  <div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
      <div style="min-height:100%" class="container-fluid">
        @yield('content')
      </div>
    </div>
    <footer class="sticky-footer bg-white">
      <div class="container-fluid my-auto">
        <div class="copyright">
          <span>© 2020 Pusat Informasi COVID-19</span>
        </div>
      </div>
    </footer>
  </div>
</body>

</html>