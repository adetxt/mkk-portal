@extends('climb-template.templates.main')

@section('style')
<link rel="stylesheet" href="{{ mix('css/index2.css') }}">
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-12 col-lg-9 mb-3">
      <div class="jumbotron background-screen" style="background-image: url('{{ config('directus.server_url').($page_data['featured_image']['data']['asset_url'] ?? '') }}');">
        <div class="jumbotron-content position-relative">
          <div class="position-absolute">
            <div class="btn-group-vertical">
              <a href="{{ $company_data['facebook_url'] }}" title="{{ $company_data['facebook_name'] }}" class="btn btn-primary p-3 d-flex align-items-center" target="_blank">
                <i class="gg-facebook d-inline-block"></i>
              </a>
              <a href="{{ $company_data['instagram_url'] }}" title="{{ $company_data['instagram_username'] }}" class="btn btn-dark p-3" target="_blank">
                <i class="gg-instagram"></i>
              </a>
              <a href="{{ $company_data['twitter_url'] }}" title="{{ $company_data['twitter_username'] }}" class="btn btn-info p-3" target="_blank">
                <i class="gg-twitter"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 d-none d-lg-block">
      <div class="jumbotron background-screen" style="background-image: url('{{ config('directus.server_url').($page_data['featured_image']['data']['asset_url'] ?? '') }}');">
      </div>
    </div>
    <div class="col-12">
      <div class="row">
        <div class="col-lg-6 text-center text-lg-left">
          <div class="col-12">
            <h6 class="mb-1">{{ $company_data['nama_perusahaan'] }}</h6>
            <h1 class="font-weight-bolder text-dark company-motto">
              {{ $company_data['motto'] }}
            </h1>
          </div>
        </div>
        <div class="col-lg-6 d-flex align-items-center justify-content-center justify-content-lg-end flex-wrap">
          <a href="#!" class="my-3 my-lg-0 btn btn-primary" onclick="toggleSidebar()">Telusuri Lebih Jauh</a>
          <x-molecules.footer add-class="mt-auto text-center text-lg-right" :text="$application_data['footer']" />
        </div>
      </div>
    </div>
  </div>
</div>
@endsection