@extends('climb-template.templates.full-background')

@section('content')

<h1 class="w-100 text-center text-dark my-4 mb-5">About</h1>

<div class="container">
  <div class="row g-5">
    <div class="col-lg-6 order-1">
      <h5 class="card-title">Tentang Kami</h5>
      <hr>
      <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla incidunt ex placeat atque
        adipisci architecto rem totam esse necessitatibus distinctio eligendi numquam doloribus vero sint, modi, natus
        laudantium omnis magnam.</p>
      <a href="#!" class="btn btn-primary btn-sm w-100">Lebih lanjut</a>
    </div>
    <div class="col-lg-6 order-4 order-lg-3">
      <h5 class="card-title">Visi dan Misi</h5>
      <hr>
      <div class="card-text">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus ab officiis itaque exercitationem, natus
          commodi a cupiditate earum fuga obcaecati!</p>
        <ul>
          <li>Lorem ipsum dolor sit.</li>
          <li>Lorem ipsum dolor sit amet consectetur adipisicing elit.</li>
          <li>Lorem ipsum dolor sit amet consectetur.</li>
        </ul>
      </div>
    </div>
    <div class="col-lg-6 order-2">
      <h5 class="card-title">Sejarah MKK</h5>
      <hr>
      <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla incidunt ex placeat atque
        adipisci architecto rem totam esse necessitatibus distinctio eligendi numquam doloribus vero sint, modi, natus
        laudantium omnis magnam.</p>
      <a href="#!" class="btn btn-primary btn-sm w-100">Lebih lanjut</a>
    </div>
    <div class="col-lg-6 order-3 order-lg-4">
      <img class="w-100 img-cover" src="/img/bg.jpg" alt="..." style="max-height: 15rem;">
    </div>
  </div>
</div>
<div class="mb-5 w-100"></div>
<x-molecules.footer />
@endsection