@extends('climb-template.templates.full-background')

@section('style')
<style>
.news-thumbnail {
  height: 200px;
}
</style>
@endsection

@section('content')


<div class="container">
  <div class="row">
    <div class="col-12 jumbotron p-0 background-screen-page" style="background-image: url('{{ config('directus.server_url').($page_data['featured_image']['data']['asset_url'] ?? '') }}');">
      <div class="jumbotron-content position-relative d-none d-lg-block">
        <div class="position-absolute">
          <h1 class="text-dark">{{ $page_data['header'] }}</h1>
        </div>
      </div>
    </div>
    <div class="col-12 mt-5 d-block d-lg-none">
      <h1 class="text-dark text-center">{{ $page_data['header'] }}</h1>
    </div>
    <div class="col-12 my-5">
      <h5 for="search-input" class="form-label">Pencarian</h5>
      <input type="text" id="search-input" class="form-control" placeholder="Apa yang anda butuhkan?">
    </div>
    <div class="col-lg-9">
      <div class="row g-5">
        @foreach ($news_data as $item)
        <div class="col-lg-6 col-md-l6 mb-3">
          <x-molecules.card
            img-url="{{ $item['featured_image'] ? config('directus.server_url').($item['featured_image']['data']['asset_url']).'?key=directus-medium-crop' : '' }}"
            img-class="news-thumbnail img-cover">
            <h5 class="card-title">{{ $item['title'] }}</h5>
            <p class="card-text">{{ $item['excerpt'] }}</p>
            <p class="card-text"><small
                class="text-muted">{{ \Carbon\Carbon::parse($item['created_on'])->translatedFormat('d F Y') }}</small></p>
          </x-molecules.card>
        </div>
        @endforeach

        <div class="col-12">
          <nav>
            <ul class="pagination">
              <li class="page-item">
                <a class="page-link" href="#!">
                  <span>&laquo;</span>
                </a>
              </li>
              <li class="page-item"><a class="page-link" href="#!">1</a></li>
              <li class="page-item"><a class="page-link" href="#!">2</a></li>
              <li class="page-item"><a class="page-link" href="#!">3</a></li>
              <li class="page-item">
                <a class="page-link" href="#!">
                  <span>&raquo;</span>
                </a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
    <div class="col-lg-3">
      <h5>Kategori Informasi</h5>
      <x-molecules.card>
        <ul class="list-group">
          <li class="list-group-item">Berita</li>
          <li class="list-group-item">Agenda</li>
          <li class="list-group-item">Lowongan</li>
          <li class="list-group-item">Pengumuman</li>
        </ul>
      </x-molecules.card>
    </div>
  </div>
</div>

@endsection