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
    <div class="col-lg-9">
      <div class="row g-5">
        @foreach ($news_data['data'] as $item)
        <div class="col-lg-6 col-md-l6 mb-3">
          <x-molecules.card
            img-url="{{ $item['featured_image'] ? config('directus.server_url').($item['featured_image']['data']['asset_url']).'?key=directus-medium-crop' : '' }}"
            img-class="news-thumbnail img-cover">
            <h5 class="card-title">
                <a class="text-dark" href="/news/{{ $item['slug'].'/'.$item['id'] }}">{{ $item['title'] }}</a>
            </h5>
            <p class="card-text">{{ $item['excerpt'] }}</p>
            <p class="card-text">
              <small class="text-muted">{{ \Carbon\Carbon::parse($item['created_on'])->translatedFormat('d F Y') }}</small>
              <a href="{{ route('news', ['category' => $item['category']['id']]) }}" class="badge rounded-pill bg-dark text-light ml-3">{{ $item['category']['category_name'] }}</a>
            </p>
          </x-molecules.card>
        </div>
        @endforeach

        <div class="col-12">
          <nav>
            <ul class="pagination">

              @if ($news_data['meta']['page'] > $news_data['meta']['page_count'])    
              <li class="page-item">
                <a class="page-link text-dark" href="{{ route('news', array_merge(\Request::query(), ['page' => ($news_data['meta']['page']+1)])) }}">
                  <span>&laquo;</span>
                </a>
              </li>
              @endif
              @for ($i = 1; $i <= $news_data['meta']['page_count']; $i++)
              <li class="page-item">
                <a class="page-link text-dark" href="{{ route('news', array_merge(\Request::query(), ['page' => $i])) }}">{{ $i }}</a>
              </li>
              @endfor

              @if ($news_data['meta']['page'] < $news_data['meta']['page_count'])    
              <li class="page-item">
                <a class="page-link text-dark" href="{{ route('news', array_merge(\Request::query(), ['page' => ($news_data['meta']['page']+1)])) }}">
                  <span>&raquo;</span>
                </a>
              </li>
              @endif
            </ul>
          </nav>
        </div>
      </div>
    </div>
    <div class="col-lg-3">
      <h5>Kategori Informasi</h5>
      <x-molecules.card>
        <ul class="list-group">
          <li class="list-group-item">
            <a class="text-dark" href="{{ route('news') }}">Semua Informasi</a>
          </li>
          @foreach ($news_categories_data as $i)
          <li class="list-group-item">
            <a class="text-dark" href="{{ route('news', ['category' => $i['id']]) }}">{{ $i['category_name'] }}</a>
          </li>
          @endforeach
        </ul>
      </x-molecules.card>
    </div>
  </div>
</div>

@endsection