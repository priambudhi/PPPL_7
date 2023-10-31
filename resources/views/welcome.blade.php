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
      <a href="#" class="navbar-logo">Sambal<span>Bini</a>
      <div class="navbar-nav">
        <a href="#home">Home</a>
        <a href="#about">Tentang Kami</a>
        <a href="#menu">Menu</a>
        <a href="#contact">Kontak</a>
      </div>

      <div class="navbar-extra">
        <a href="#" id="sabi-menu"><i data-feather="menu"></i></a>
      </div>
    </nav>
    <!-- Navbar end -->

    <!--Hero section start-->
    <section class="hero" id="home">
        <main class="content">
            <h1>Nikmati Pedasnya <span>Sabi</span></h1>
            <p>Pedesnya Bikin GEMES!!</p>
            {{-- <a href="#" class="cta">Beli Sekarang</a> --}}
          </main>
    </section>
    <!--Hero section end-->

    <!-- About section start -->
    <section id="about" class="about">
      <h2><span>Tentang</span> Kami</h2>

      <div class="row">
        <div class="about-img">
          <img src="img/IMG-tentang-kami.jpeg.jpg" alt="Tentang Kami">
        </div>
        <div class="content">
          <h3>Kenapa memilih Sabi?</h3>
          <p>Sambalbini adalah salah satu tempat makan yang paling di cari saat ini di Jakarta, dengan menu yang beragam dan harga yang terjangkau. Sambalbini berlokasi di kawasan yang cukup ramai dan popular yaitu di Kemang, Jakarta Selatan. Sambalbini menawarkan pengalaman makan yang menyenangkan bagi pelanggannya karena, menggunakan cobek yang di bakar</p>
          <p>
            Cara Order <b>Sambal Bini</b> :
            <ol class="tutor">
              <li> Lorem ipsum dolor sit amet consectetur >>, adipisicing elit. Asperiores saepe vel tempora vero, officiis quaerat dignissimos illo ea cupiditate aut voluptas, quae praesentium quo deserunt vitae aliquam, veniam unde amet!</li>
              <li> Lorem ipsum dolor sit amet consectetur >>, adipisicing elit. Asperiores saepe vel tempora vero, officiis quaerat dignissimos illo ea cupiditate aut voluptas, quae praesentium quo deserunt vitae aliquam, veniam unde amet!</li>
            </ol>
          </p>

        </div>
      </div>
    </section>
    <!-- About section end -->

    <!-- Menu section start -->
    <section id="menu" class="menu">
      <h2><span>Menu</span> Kami</h2>
      <p>Berikut merupakan menu andalan dari kami</p>

      <div class="row">
@foreach($items as $item)
        <div class="menu-card">
          <img src="{{ asset('assets/menu/'.$item->photo)}}" alt="{{ $item->name }}" class="menu-card-img">
          <h3 class="menu-card-title">{{ $item->name }}</h3>
          <p class="menu-card-price">Rp {{ number_format($item->price) }},-</p>
        </div>
@endforeach
      </div>
      <div class="link-wrap">
        <a href="{{ route('menu') }}">Menu Lainnya</a>
      </div>
    </section>
    <!-- Menu section end -->

    <!-- Contact Section Start -->
    <section id="contact" class="contact">
      <h2><span>Kontak</span> Kami</h2>
      <p>Silahkan isi form di bawah untuk Booking</p>

      <div class="row">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.014068841673!2d106.81333747490532!3d-6.261876493726725!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e789f1d72004079%3A0x5cff0558fd0e3afd!2sSABI%20-%20Sambal%20Bini!5e0!3m2!1sid!2sid!4v1689542691870!5m2!1sid!2sid" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="map"></iframe>

        <form action="{{ route('contact_store') }}" method="POST">
          @csrf
          
          <div class="input-group">
            <i data-feather="user"></i>
            <input type="text" name="name" placeholder="Nama Anda">
          </div>
          <div class="input-group">
            <i data-feather="mail"></i>
            <input type="text" name="email" placeholder="Email Anda">
          </div>
          <div class="input-group">
            <i data-feather="phone"></i>
            <input type="text" name="phone_number" placeholder="Nomor Handphone">
          </div>
          <div class="input-group">
            <i data-feather="users"></i>
            <input type="text" name="jumlah_orang" placeholder="Jumlah Orang">
          </div>
          <div class="input-group">
            <i data-feather="calendar"></i>
            <input type="datetime-local" name="booking_date" placeholder="Tanggal Booking">
          </div>
          <button type="submit" class="btn">Kirim Pesan</button>
        </form>


      </div>
    </section>
    <!-- Contact Section End -->
    
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
