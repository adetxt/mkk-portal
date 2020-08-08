@extends('climb-template.templates.full-background')

@section('content')

<h1 class="w-100 text-center text-light font-weight-light my-4">Contact</h1>

<div class="card" style="max-width: 80%; min-height: 32rem;">
  {{-- <div class="card-header">
    About
  </div> --}}
  <div class="card-body">
    <div class="row">
      <div class="col-lg-6 mb-4">
        <h5 class="card-title">Kirim Pesan Ke Kami</h5>
        <hr>
        @include('climb-template.organisms.contact-form')
      </div>
      <div class="col-lg-6">
        <div class="row">
          <div class="col-12">
            <h5 class="card-title">Kontak Kami</h5>
            <hr>
            <table class="mb-3">
              <tr>
                <td>+62 86452726373</td>
              </tr>
              <tr>
                <td>
                  <a href="mailto:mkk@mail.com">mkk@mail.com</a>
                </td>
              </tr>
            </table>
            <div class="mapouter">
              <div class="gmap_canvas">
                <iframe width="100%" height="400" id="gmap_canvas" src="https://maps.google.com/maps?q=mebel%20indah%20nian&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
              </div>
              <style>
                .mapouter {
                  position: relative;
                  text-align: right;
                  width: 100%;
                }
            
                .gmap_canvas {
                  overflow: hidden;
                  background: none !important;
                  width: 100%;
                }
              </style>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection