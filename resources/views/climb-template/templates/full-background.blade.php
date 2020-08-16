<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ $page_data['title'] }}</title>

  <link rel="stylesheet" href="{{ mix('css/app.css') }}">
  @yield('style')
</head>
<body>
  <div id="sidebar" class="py-5" style="background: url('img/bg2.jpg');">
    <a href="/" class="sidebar-item mb-4">Home</a>
    <a href="/about" class="sidebar-item mb-4">About</a>
    <a href="/news" class="sidebar-item mb-4">Berita</a>
    <a href="/contact" class="sidebar-item mb-4">Contact</a>
  </div>

  <div id="content-wrapper">
    <div class="d-flex justify-content-center align-items-start flex-wrap" style="height: 100vh;">
      <nav class="navbar navbar-expand-lg navbar-light w-100">
        <div class="container-fluid">
          <a class="navbar-brand font-weight-normal mx-0 mx-lg-3" href="#!">
            <img src="{{ config('directus.server_url').$company_data['logo']['data']['asset_url'] }}?key=directus-small-crop" alt="logo">
          </a>
    
          <a class="navbar-brand mx-0 mx-lg-3" href="#!" onclick="toggleSidebar(this)">
            <i class="gg-menu-right toggle"></i>
          </a>
        </div>
      </nav>
    
      @yield('content')
    
      {{-- <div class="sosmed position-fixed d-flex flex-column mx-3 my-3" style="bottom: 0; left: 0;">
        <a class="mb-3 d-inline-block" href="#!">
          <i class="gg-facebook"></i>
        </a>
        <a class="mb-3 d-inline-block" href="#!">
          <i class="gg-instagram"></i>
        </a>
      </div> --}}
    </div>
  </div>

  <script src="{{ mix('js/app.js') }}"></script>

  <script>
    (function() {
      sidebarEl = document.querySelector('#sidebar')
      contentWrapperEl = document.querySelector('#content-wrapper')
    })()

    const toggleSidebar = function (el) {
      sidebarEl.classList.toggle('sidebar-toggled')
      contentWrapperEl.classList.toggle('sidebar-toggled')

      el.firstElementChild.classList.toggle('gg-menu-right')
      el.firstElementChild.classList.toggle('gg-close')
    }
  </script>
  @yield('script')
</body>
</html>