<!doctype html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
  <link rel="stylesheet" href="{{ mix('css/app.css') }}"> 
  <title>ZeroBug</title>


</head>

<body class="antialiased font-sans bg-white text-gray-900">

  <main class="w-full">

    <!-- start header -->
    <header class="w-full bg-transparent fixed top-0 left-0 z-50 px-4 sm:px-8 lg:px-16 xl:px-40 2xl:px-64 py-6"
      id="navbar">
      <nav class="flex items-center justify-between">
        <div class="">
          <a href='/fair-rate-mortgage/'>
            <svg xmlns="http://www.w3.org/2000/svg" width="188" height="39"><text transform="translate(87 29)"
                fill="#454f5b" font-size="24">
                <tspan x="0" y="0">ZeroBug</tspan>
              </text>
              <path d="M54 39H0L27 6l27 33zM23 22v11h8V22h-8z" fill="#4ad5f6" />
              <path d="M54 0L40 16h27L54 0" fill="#95cdb1" />
              <path d="M69 18L55 34h27L69 18" fill="#ffc48b" /></svg>
          </a>
        </div>

        <div class="block sm:hidden">
          <button type="button" class="navbar-toggler">
            <span class="navbar-toggler-bar"></span>
            <span class="navbar-toggler-bar"></span>
            <span class="navbar-toggler-bar"></span>
          </button>
        </div>

        <div class="hidden sm:flex">
          <ul class="flex flex-col sm:flex-row">
            <li><a href="#" class="sm:px-4 py-2 sm:hidden lg:block">About Us</a></li>
            @if (Route::has('login')|| Route::has('admin.login'))
                @auth
                    <li><a href="{{ url('/mahasiswa') }}" class="sm:px-4 py-2 block text-blue-600 border border-gray-400 rounded-lg ml-4">Login</a></li>
                @else
                <li><a href="{{ route('login') }}" class="sm:px-4 py-2 block bg-blue-600 text-white rounded-lg ml-4">Mahasiswa Login</a></li>

                    <li><a href="{{ route('admin.login') }}" class="sm:px-4 py-2 block bg-blue-600 text-white rounded-lg ml-4">Admin Login</a></li>
                  
                @endauth
                @endif
          </ul>
        </div>
      </nav>
    </header>
    <!-- end header -->

    <!-- start hero section -->
    <section style="background-image: url('{{ asset('background.jpg')}}'); background-size:cover;"
      class="relative px-4 sm:px-8 lg:px-16 xl:px-40 2xl:px-64 pt-32 pb-48 sm:pb-64 md:pt-40 md:pb-48 lg:pt-40 xl:pb-64 2xl:pt-56 2xl:pb-96 text-center sm:text-left">
      <div>
        <div class="relative w-full sm:w-2/3 lg:w-1/2 z-10">
          <h1 class="text-3xl lg:text-4xl xl:text-5xl leading-tight font-bold">Absensi Mahasiswa</h1>
          <p class="text-base leading-snug text-gray-700 mt-4">Aplikasi Rekap Abenssi Mahasiswa Universitas Andalas</p>
        </div>

        <div   class="w-full absolute bottom-0 right-0">

        </div>
      </div>
    </section>
    <!-- end hero section -->

    <!-- start how it works -->
    <section class="relative bg-gray-100 px-4 sm:px-8 lg:px-16 xl:px-40 2xl:px-64 py-20 text-center">
      <div>
        <h2 class="text-3xl leading-tight font-bold">Apa Saja Fitur Dari Aplikasi Ini?</h2>
      </div>

      <div class="flex flex-col md:flex-row items-start justify-between mt-12">
        <div class="w-full bg-white shadow-lg rounded-lg px-4 py-6 lg:p-8 md:mx-2 lg:mx-4">
          <img src="{{ asset('csv.png')}}" alt="" class="mx-auto h-32">
          <h4 class="text-xl font-bold leading-tight mt-8">Rekap Absen CSV</h4>
          <p class="text-gray-700 mt-2">Fitur Import File CSV Absensi Untuk Memudahkan Merekap Absensi </p>
        </div>

        <div class="w-full bg-white shadow-lg rounded-lg px-4 py-6 lg:p-8 md:mx-2 lg:mx-4 mt-4 md:mt-0">
          <img src="{{ asset('admin.png')}}" alt="" class="mx-auto h-32">
          <h4 class="text-xl font-bold leading-tight mt-8">Admin</h4>
          <p class="text-gray-700 mt-2">Mengelola Data Mahasiswa, Data Kelas, Data Pertemuan dan Data Absensi</p>
        </div>

        <div class="w-full bg-white shadow-lg rounded-lg px-4 py-6 lg:p-8 md:mx-2 lg:mx-4 mt-4 md:mt-0">
          <img src="{{ asset('student.png')}}" alt="" class="mx-auto h-32">
          <h4 class="text-xl font-bold leading-tight mt-8">Mahasiswa</h4>
          <p class="text-gray-700 mt-2">Melihat Data Absensi Setiap Pertemuan Dalam Kelas Yang DIikuti</p>
        </div>
      </div>
    </section>
    <!-- end how it works -->

    <!-- start features -->

    <!-- end features -->

    <!-- start footer -->
    <footer class="relative bg-white px-4 sm:px-8 lg:px-16 xl:px-40 2xl:px-64 pt-12 pb-10 text-center sm:text-left">
      <div class="flex flex-col sm:flex-row sm:flex-wrap">
        <div class="sm:w-1/2 lg:w-1/5">
          <h6 class="text-sm text-gray-600 font-bold uppercase">Nama Pengembang</h6>
          <ul class="mt-4">
            <li><a href="#">ZeroBug</a></li>
          </ul>
        </div>

        <div class="mt-8 sm:w-1/2 sm:mt-0 lg:w-1/5 lg:mt-0">
          <h6 class="text-sm text-gray-600 font-bold uppercase">Anggota Kelompok</h6>
          <ul class="mt-4">
            <li><a href="#">Camila Faiza</a></li>
            <li class="mt-2"><a href="#">Distifia Oktari</a></li>
            <li class="mt-2"><a href="#">Hayatul Annisa</a></li>
            <li class="mt-2"><a href="#">Jesica Resi L</a></li>
            <li class="mt-2"><a href="#">Nurul Hafizhah A</a></li>
          </ul>
        </div>

        <div class="mt-8 sm:w-1/2 sm:mt-12 lg:w-1/5 lg:mt-0">
          <h6 class="text-sm text-gray-600 font-bold uppercase">Contact</h6>
          <ul class="mt-4">
            <li><a href="#">camilafaizam@gmail.com</a></li>
            <li class="mt-2"><a href="#">+628 2383988626</a></li>
          </ul>
        </div>

        <div class="mt-12 sm:w-1/2 lg:w-2/5 lg:mt-0 lg:pl-12">
          <div>
            <svg xmlns="http://www.w3.org/2000/svg" width="188" height="39" class="mx-auto sm:mx-0"><text
                transform="translate(87 29)" fill="#454f5b">
                <tspan x="0" y="0">ZeroBug</tspan>
              </text>
              <path d="M54 39H0L27 6l27 33zM23 22v11h8V22h-8z" fill="#4ad5f6" />
              <path d="M54 0L40 16h27L54 0" fill="#95cdb1" />
              <path d="M69 18L55 34h27L69 18" fill="#ffc48b" /></svg>
          </div>

          <p class="text-base text-gray-600 mt-4">Applikasi Absensi</p>
        </div>
      </div>

      <div class="mt-16">
        <hr class="mb-8">
        <p class="text-sm text-gray-600">2021 ZeroBug.</p>
      </div>
    </footer>
    <!-- end footer -->

  </main>

  <script src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

  <script>
    $('.navbar-toggler').click(function () {
      $(this).toggleClass('active');
      $('.navigation-menu').toggleClass('hidden');
      $('#navbar').addClass('bg-white');
    });

    $(function () {
      var navigation = $("#navbar");

      $(window).scroll(function () {
        var scroll = $(window).scrollTop();
        if (scroll >= 10) {
          navigation.addClass("bg-white xl:py-4 shadow-md");
          navigation.removeClass("xl:py-8");
        } else {
          navigation.removeClass("bg-white xl:py-4 shadow-md");
          navigation.addClass("xl:py-8");
        }
      });
    });
  </script>

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-131505823-2"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-131505823-2');
  </script>


</body>

</html>