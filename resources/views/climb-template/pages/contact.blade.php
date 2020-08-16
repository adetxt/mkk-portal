@extends('climb-template.templates.full-background')

@section('content')

<h1 class="w-100 text-center text-dark mb-5">{{ $page_data['header'] }}</h1>

<div class="container">
  <div class="row">
    <div class="col-lg-6 mb-4">
      <h5 class="card-title">Ada Pertanyaan?</h5>
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
              <td><strong>Telepon</strong></td>
              <td> : </td>
              <td>{{ $company_data['nomor_telepon'] }}</td>
            </tr>
            <tr>
              <td><strong>Email</strong></td>
              <td> : </td>
              <td>
                <a href="mailto:{{ $company_data['email_perusahaan'] }}">{{ $company_data['email_perusahaan'] }}</a>
              </td>
            </tr>
            <tr valign="top">
              <td><strong>Alamat</strong></td>
              <td> : </td>
              <td>{{ $company_data['alamat_perusahaan'] }}</td>
            </tr>
          </table>
          <div class="mapouter">
            <div class="gmap_canvas">
              <iframe width="100%" height="400" id="gmap_canvas" src="https://maps.google.com/maps?q={{ urlencode($company_data['alamat_perusahaan'])}}&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
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

<x-molecules.footer :text="$application_data['footer']" add-class="text-center mt-5" />
@endsection