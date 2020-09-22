<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="shortcut icon" href="{{ config('directus.server_url').$application_data['favicon']['data']['asset_url'] }}">
  <title>{{ $page_data['title'] }}</title>

  <link rel="stylesheet" href="{{ mix('css/app.css') }}">
  @yield('style')
</head>
<body>
  <div id="sidebar" class="py-5 px-4">
    <a href="/" class="sidebar-item mb-4">Home</a>
    <a href="/about" class="sidebar-item mb-4">Tentang Kami</a>
    <a href="/news" class="sidebar-item mb-4">Informasi</a>
    <a href="/gallery" class="sidebar-item mb-4">Galeri</a>
    <a href="/career" class="sidebar-item mb-4">Karir</a>
    <a href="/contact" class="sidebar-item mb-4">Hubungi Kami</a>
  </div>

  <div id="content-wrapper">
    <nav class="navbar navbar-expand-lg navbar-light w-100">
      {{-- <div class="container-fluid"> --}}
        <a class="navbar-brand font-weight-normal mx-3 mx-lg-5 mt-0 mt-lg-1" href="/">
          <img src="{{ config('directus.server_url').$company_data['logo']['data']['asset_url'] }}?key=directus-small-crop" alt="logo">
        </a>
      {{-- </div> --}}
      <a id="toggler" class="btn btn-primary p-3 ml-auto" href="#!" onclick="toggleSidebar()">
        <i class="gg-chevron-left toggle"></i>
      </a>
    </nav>
    {{-- <div class="d-flex justify-content-center align-items-baseline flex-wrap" style="height: 80vh;"> --}}
    
      @yield('content')
    
      {{-- <div class="sosmed position-fixed d-flex flex-column mx-3 my-3" style="bottom: 0; left: 0;">
        <a class="mb-3 d-inline-block" href="#!">
          <i class="gg-facebook"></i>
        </a>
        <a class="mb-3 d-inline-block" href="#!">
          <i class="gg-instagram"></i>
        </a>
      </div> --}}
    {{-- </div> --}}
  </div>

  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
  <script src="{{ mix('js/app.js') }}"></script>

  <script>
    (function() {
      sidebarEl = document.querySelector('#sidebar')
      contentWrapperEl = document.querySelector('#content-wrapper')
    })()

    const toggleSidebar = function () {
      sidebarEl.classList.toggle('sidebar-toggled')
      contentWrapperEl.classList.toggle('sidebar-toggled')

      toggler = document.querySelector('#toggler').firstElementChild
      toggler.classList.toggle('gg-chevron-left')
      toggler.classList.toggle('gg-chevron-right')
    }
  </script>
  @yield('script')
</body>
</html>