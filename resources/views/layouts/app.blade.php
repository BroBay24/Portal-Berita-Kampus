<!doctype html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Kabar Kampus - Portal berita kampus terpercaya dengan informasi terkini">
  <title>@yield('title')</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>
<body class="antialiased bg-white">
  <div class="flex flex-col min-h-screen">
    <!-- Navbar -->
    @include('includes.navbar')

    <!-- Main Content -->
    <main class="flex-grow">
      @yield('content')
    </main>

    <!-- Footer -->
    @include('includes.footer')
  </div>

  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="{{ asset('assets/css/js/swiper.js') }}"></script>
  
  <!-- Mobile Menu Script -->
  <script>
    const menuToggle = document.getElementById('menu-toggle');
    const menu = document.getElementById('menu');
    
    if (menuToggle) {
      menuToggle.addEventListener('click', () => {
        menu.classList.toggle('hidden');
      });
      
      // Close menu when clicking on a link
      if (menu) {
        menu.querySelectorAll('a').forEach(link => {
          link.addEventListener('click', () => {
            menu.classList.add('hidden');
          });
        });
      }
    }
  </script>
</body>

</html>