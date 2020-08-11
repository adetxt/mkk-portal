@extends('climb-template.templates.full-background')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-12">
      <div class="jumbotron background-screen my-auto w-100" style="background-image: url('img/bg.jpg');">
        <div class="jumbotron-content d-flex align-items-center align-items-lg-end">
          <div>
            <h5 class="mb-0">Mandiri Karya Kirana</h5>
            <h1 class="font-weight-bolder text-dark">
              Explore New World!
            </h1>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12">
      <div class="row">
        <div class="col-lg-6 py-5 text-center text-lg-left">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores veniam ea aspernatur nesciunt, obcaecati maxime facilis laudantium aperiam non eligendi?
        </div>
        <div class="col-lg-6 d-flex align-items-center justify-content-center flex-wrap">
          <a href="#!" class="btn btn-primary align-self-end mb-3 mb-lg-0">
            Call to Action
          </a>
          <x-molecules.footer />
        </div>
      </div>
    </div>
  </div>
</div>
@endsection