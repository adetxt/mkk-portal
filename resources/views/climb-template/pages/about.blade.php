@extends('climb-template.templates.full-background')

@section('content')

<h1 class="w-100 text-center text-dark my-4 mb-5">{{ $page_data['header'] }}</h1>

<div class="container">
  <div class="row g-5">
    <div class="col-lg-6 order-1">
      {{-- <h5 class="card-title">Tentang Kami</h5>
      <hr> --}}
      <div>{!! $company_data['tentang_perusahaan'] !!}</div>
      {{-- <a href="#!" class="btn btn-primary btn-sm w-100">Lebih lanjut</a> --}}
    </div>
    <div class="col-lg-6 order-4 order-lg-3">
      <h5 class="card-title">Visi dan Misi</h5>
      <hr>
      <div class="card-text">
        {!! $company_data['visi_misi'] !!}
      </div>
    </div>
    <div class="col-lg-6 order-2 order-lg-4">
      <h5 class="card-title">Sejarah MKK</h5>
      <hr>
      <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla incidunt ex placeat atque
        adipisci architecto rem totam esse necessitatibus distinctio eligendi numquam doloribus vero sint, modi, natus
        laudantium omnis magnam.</p>
      <a href="#!" class="btn btn-primary btn-sm w-100">Lebih lanjut</a>
    </div>
    <div class="col-lg-6 order-3 order-lg-2">
      <img class="w-100 img-cover" src="/img/bg.jpg" alt="..." style="max-height: 15rem;">
    </div>
  </div>
</div>
<div class="mb-5 w-100"></div>
<x-molecules.footer />
@endsection