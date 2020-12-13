<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" type="text/css" href="{{asset('css/styles.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <meta charset="utf-8">
  <title>Pusat Informasi COVID-19</title>
  
  <!--JQuery-->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>  

  <!-- Custom fonts for this template-->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  @yield('custom')

</head>

<body class="">
  <nav class="navbar navbar-expand-lg navbar-light bg-dark mb-3 p-3 text-white">
    <a class="text-white" href="{{route('admin.index')}}">
      <h4>Admin</h4>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item {{ (request()->is('admin')) ? 'active' : '' }}">
          <a class="nav-link text-white" href="">Berita<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item {{ (Request::segment(2) === 'blog') ? 'active' : '' }}">
          <a class="nav-link text-white" href="">Kasus</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Hi, test
          </a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="">
    @yield('content')
  </div>
  <div class="py-2 pr-3 container-fluid my-auto text-right">
    <div class="copyright">
      <span>© 2020 Pusat Informasi COVID-19</span>
    </div>
  </div>
</body>

@yield('scripts')

</html>