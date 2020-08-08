@extends('climb-template.templates.full-background')

@section('content')

<h1 class="w-100 text-center text-light font-weight-light my-4">About</h1>

<div class="card" style="max-width: 90%; min-height: 32rem;">
  {{-- <div class="card-header">
    About
  </div> --}}
  <div class="card-body">
    <div class="row">
      <div class="col-lg-6 mb-4">
        <h5 class="card-title">Tentang Kami</h5>
        <hr>
        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla incidunt ex placeat atque adipisci architecto rem totam esse necessitatibus distinctio eligendi numquam doloribus vero sint, modi, natus laudantium omnis magnam.</p>
        <a href="#!" class="btn btn-primary btn-sm w-100">Lebih lanjut</a>
      </div>
      <div class="col-lg-6">
        <div class="row">
          <div class="col-12">
            <h5 class="card-title">Visi dan Misi</h5>
            <hr>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection