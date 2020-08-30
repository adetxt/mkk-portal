@extends('climb-template.templates.main')

@section('style')
<style>
.news-thumbnail {
  height: 200px;
}
a {
  text-decoration: none;
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
    <div class="col-lg-12">
      <div class="row g-5">
        @foreach ($galleries_data['data'] as $item)
        <div class="col-lg-4 col-md-6 mb-3">
          <x-molecules.card
            img-url="{{ $item['featured_image'] ? config('directus.server_url').($item['featured_image']['data']['asset_url']).'?key=directus-medium-crop' : '' }}"
            img-class="news-thumbnail img-cover">
            <h5 class="card-title">
                <a class="text-dark" href="/gallery/{{ $item['slug'].'/'.$item['id'] }}">{{ $item['title'] }}</a>
            </h5>
          </x-molecules.card>
        </div>
        @endforeach

        <div class="col-12">
          <nav>
            <ul class="pagination">

              @if ($galleries_data['meta']['page'] > $galleries_data['meta']['page_count'])    
              <li class="page-item">
                <a class="page-link text-dark" href="{{ route('news', array_merge(\Request::query(), ['page' => ($galleries_data['meta']['page']+1)])) }}">
                  <span>&laquo;</span>
                </a>
              </li>
              @endif
              @for ($i = 1; $i <= $galleries_data['meta']['page_count']; $i++)
              <li class="page-item">
                <a class="page-link text-dark" href="{{ route('news', array_merge(\Request::query(), ['page' => $i])) }}">{{ $i }}</a>
              </li>
              @endfor

              @if ($galleries_data['meta']['page'] < $galleries_data['meta']['page_count'])    
              <li class="page-item">
                <a class="page-link text-dark" href="{{ route('news', array_merge(\Request::query(), ['page' => ($galleries_data['meta']['page']+1)])) }}">
                  <span>&raquo;</span>
                </a>
              </li>
              @endif
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection