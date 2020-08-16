@extends('climb-template.templates.full-background')

@section('style')
<style>
.company-motto {
  font-size: 18pt;
}
</style>
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-12">
      <div class="jumbotron background-screen" style="background-image: url('{{ config('directus.server_url').($page_data['featured_image']['data']['asset_url'] ?? '') }}');">
        {{-- <div class="jumbotron-content">
          <div class="row">
            <div class="col-6">
              <h1>AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA</h1>
            </div>
          </div>
        </div> --}}
      </div>
    </div>
    <div class="col-12">
      <div class="row">
        <div class="col-lg-6 pt-3 text-center text-lg-left">
          <div class="col-12">
            <h6 class="mb-1">{{ $company_data['nama_perusahaan'] }}</h6>
            <h1 class="font-weight-bolder text-dark company-motto">
              {{ $company_data['motto'] }}
            </h1>
          </div>
        </div>
        <div class="col-lg-6 d-flex align-items-center justify-content-end flex-wrap">
          <div class="btn-group align-self-end my-5 my-lg-0">
            <a href="{{ $company_data['facebook_url'] }}" title="{{ $company_data['facebook_name'] }}" class="btn btn-primary" target="_blank">
              <i class="gg-facebook"></i>
            </a>
            <a href="{{ $company_data['instagram_url'] }}" title="{{ $company_data['instagram_username'] }}" class="btn btn-dark ml-2" target="_blank">
              <i class="gg-instagram"></i>
            </a>
            <a href="{{ $company_data['twitter_url'] }}" title="{{ $company_data['twitter_username'] }}" class="btn btn-info ml-2" target="_blank">
              <i class="gg-twitter"></i>
            </a>
          </div>
          <x-molecules.footer align="right" :text="$application_data['footer']" />
        </div>
      </div>
    </div>
  </div>
</div>
@endsection