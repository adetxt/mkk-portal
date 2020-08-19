@extends('climb-template.templates.main')

@section('content')

<h1 class="w-100 text-center text-dark my-4 mb-5">{{ $page_data['header'] }}</h1>

<div class="container">
  <div class="row g-5">
    <div class="col-lg-6 order-2 order-lg-1">
      <div>{!! $company_data['tentang_perusahaan'] !!}</div>
    </div>
    <div class="col-lg-6 order-4 order-lg-3">
      <h5 class="card-title">Visi dan Misi</h5>
      <hr>
      <div class="card-text">
        {!! $company_data['visi_misi'] !!}
      </div>
    </div>
    <div class="col-lg-6 order-3 order-lg-4">
      {{-- <h5 class="card-title">Sejarah MKK</h5>
      <hr> --}}
      <a href="#!" class="btn btn-primary btn-sm w-100">Ketahui Sejarah MKK</a>
    </div>
    <div class="col-lg-6 order-1 order-lg-2">
      <img class="w-100 img-cover" src="{{ config('directus.server_url').($page_data['featured_image']['data']['asset_url'] ?? '') }}" alt="..." style="height: 100%;">
    </div>
  </div>
</div>
<div class="mb-5 w-100"></div>
<x-molecules.footer :text="$application_data['footer']" />
@endsection