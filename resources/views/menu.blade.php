<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sambal Bini</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap" rel="stylesheet">

    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- My Style -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
  </head>

  <body>
    <!-- Navbar Start -->
    <nav class="navbar">
      <a href="{{route('welcome')}}#" class="navbar-logo">Sambal<span>Bini</a>
      <div class="navbar-nav">
        <a href="{{route('welcome')}}#home">Home</a>
        <a href="{{route('welcome')}}#about">Tentang Kami</a>
        <a href="{{route('welcome')}}#menu">Menu</a>
        <a href="{{route('welcome')}}#contact">Kontak</a>
      </div>

      <div class="navbar-extra">
        <a href="#" id="sabi-menu"><i data-feather="menu"></i></a>
      </div>
    </nav>
    <!-- Navbar end -->

    {{-- Hero Section Start --}}
    {{-- <section class="hero new-bg" id="home">
      <main class="content">
          <h1>Nikmati Menu Lainnya Dari <span>Sabi</span></h1>
        </main>
  </section> --}}
    {{-- Hero Section End --}}

    {{-- menu start --}}

    <section id="menu" class="menu">
      <h2><span>Menu</span> Kami</h2>
      <p>Nikmati berbagai masakan kami, dengan melihat menu menu kami dibawah</p>
@foreach($menus as $menu)
      <h3 class="sub-menu" style="margin-top:25px">{{ $menu->name }}</h3>
      <div class="row">
@foreach($menu->MenuItem as $item)
        <div class="menu-card">
          <img src="{{ asset('assets/menu/'.$item->photo)}}" alt="{{ $item->name }}" class="menu-card-img">
          <h3 class="menu-card-title">{{ $item->name }}</h3>
          <p class="menu-card-price">Rp {{ number_format($item->price) }},-</p>
        </div>
@endforeach
      </div>
@endforeach
    </section>
    <!-- Footer start -->
    <footer>
      <div class="socials">
        <a href="https://instagram.com/sambalbini.idn?igshid=MzRlODBiNWFlZA=="><i data-feather="instagram"></i></a>
      </div>
      <div class="links">
        <a href="#home">Home</a>
        <a href="#about">Tentang Kami</a>
        <a href="#menu">Menu</a>
        <a href="#contact">Kontak</a>
      </div>

      <div class="credit">
        <p>Created by <a href="">Ahmad Fajar Damara</a>
        . | &copy; 2023.</p>
      </div>
    </footer>
    <!-- Footer end -->

    <!-- Feather Icons -->
    <script>
      feather.replace();
    </script>

    <!-- My Javascript -->
    <script src="js/script.js"></script>
  </body>
</html>
