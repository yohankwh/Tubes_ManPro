<!DOCTYPE html>
<html lang="en">
<title>Covid-19 Info</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!--JQuery-->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>  
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>    


<script src="{{asset('js/lib/Chart.bundle.js')}}"></script>
<script src="{{asset('js/lib/utils.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{asset('css/styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
  canvas{
        -moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
        background-color: white;
    }
</style>
<body>

<!-- Navbar -->
<div class="w3-top w3-margin-bottom bg-light" id="nav-contact">
  <div class="container w-100 py-3 mini-nav d-flex justify-content-between" >
    <div>
      <span class=" mb-0 mr-3">Layanan Darurat COVID-19</span>
    </div>
    <div style="color:#f98a5f">
      <span class=" mb-0 mr-3"><i class="fa fa-phone"></i> 1339</span>
      <span class=" mb-0"><i class="fa fa-phone"></i> +82-2-2163-5945</span>
    </div>
  </div>
  <div class="navbar-main">
    <nav class="container navbar navbar-expand-lg navbar-light">
      <a class="navbar-brand" href="#"><img src="{{asset('img/iconsm.png')}}" height="48px" width="48px"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <ul class="navbar-nav">
          <li class="nav-item nav-item-main px-2">
            <a class="nav-link {{Request::is("/") ? "nav-active" : ""}}" href="{{route('index')}}"><b>Beranda</b></a>
          </li>
          <li class="nav-item nav-item-main px-2">
              <a class="nav-link {{Request::is("statistik") ? "nav-active" : ""}}" href="{{route('statistik')}}"><b>Statistik</b></a>
          </li>
          <li class="nav-item nav-item-main px-2">
              <a class="nav-link {{Request::is("sebaran-kasus") ? "nav-active" : ""}}" href="{{route('sebaran')}}"><b>Sebaran Kasus</b></a>
          </li>
        </ul>
      </div>
    </nav>
  </div>
</div>

<!-- Header -->
<header class="header py-4 d-flex align-items-center" style="margin-top:7em">
  <div class="container">
    @yield('header')
  </div>
</header>

<!-- Content -->
<div class="w3-container w3-center content">
    @yield('content')
</div>

<!-- Footer -->
<div class="w3-black w3-center w3-opacity p-1">
  <h1 class="p-1 w3-large">Jadilah Warga Negara yang Baik dengan Mematuhi Protokol Kesehatan 3M!</h1>
</div>
<footer class="w3-container w3-padding w3-opacity text-right">  
  <div class="w3-large my-2">
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <span><b>{{"@infocovid19"}}</b></span>
 </div>
 <p class="mb-0">© 2020 Pusat Informasi COVID-19</p>
</footer>

<!-- <script>
// Used to toggle the menu on small screens when clicking on the menu button
function myFunction() {
  var x = document.getElementById("navDemo");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}
</script> -->
<script>
  var prevScrollpos = window.pageYOffset;
  window.onscroll = function() {
    var currentScrollPos = window.pageYOffset;
    if (prevScrollpos > currentScrollPos) {
      document.getElementById("nav-contact").style.top = "0";
    } else {
      document.getElementById("nav-contact").style.top = "-3.5em";
    }
    prevScrollpos = currentScrollPos;
  }
</script>

</body>
</html>
