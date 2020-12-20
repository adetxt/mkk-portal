@extends('climb-template.templates.main')

@section('style')
<style>
    img.featured-image {
        width: 100%;
        max-height: 400px;
    }
</style>
@endsection

@section('content')
<div class="container">
    <div class="row">
    
        <!-- Post Content Column -->
        <div class="col-lg-12">
    
            <!-- Title -->
            <h1 class="mt-4">{{ $galleries_data['title'] }}</h1>
    
            <!-- Author -->
            <p class="lead">
                by {{ $galleries_data['owner']['first_name'].' '.$galleries_data['owner']['last_name'] }}
            </p>
    
            <hr>
    
            <!-- Date/Time -->
            <p>Diposting pada {{ \Carbon\Carbon::parse($galleries_data['created_on'])->translatedFormat('d F Y') }}</p>
    
            <hr>
    
            <!-- Preview Image -->
            {{-- <img class="img-fluid rounded featured-image img-cover" src="{{ $galleries_data['featured_image'] ? config('directus.server_url').($galleries_data['featured_image']['data']['asset_url']) : '' }}" alt=""> --}}
    
            <hr>
    
            <!-- Post Content -->

            <div class="row">
                @foreach ($galleries_data['foto'] as $foto)
                    <div class="col-lg-3 col-md-4 col-6 mb-3">
                        <a href="{{ config('directus.server_url').($foto['file']['data']['asset_url']) }}" data-fslightbox="foto">
                            <img class="img-fluid img-cover" src="{{ config('directus.server_url').($foto['file']['data']['asset_url']) }}?key=directus-medium-crop" alt="">
                        </a>
                    </div>
                @endforeach
            </div>
            {{-- {!! $galleries_data['foto'] !!} --}}
    
            <hr>
    
            <!-- Comments Form -->
            <div class="card my-4">
                <h5 class="card-header">Share to the world</h5>
                <div class="card-body">
                    <x-organisms.share-buttons :title="$galleries_data['title'] ?? ''" :text="$galleries_data['excerpt'] ?? ''" />
                </div>
            </div>
    
        </div>

    </div>
    <!-- /.row -->
</div>
@endsection

@section('script')
<script src="/vendor/fslightbox.js"></script>
@endsection