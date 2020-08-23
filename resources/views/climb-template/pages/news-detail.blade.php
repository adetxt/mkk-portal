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
        <div class="col-lg-8">
    
            <!-- Title -->
            <h1 class="mt-4">{{ $news_data['title'] }}</h1>
    
            <!-- Author -->
            <p class="lead">
                by {{ $news_data['owner']['first_name'].' '.$news_data['owner']['last_name'] }}
            </p>
    
            <hr>
    
            <!-- Date/Time -->
            <p>Diposting pada {{ \Carbon\Carbon::parse($news_data['created_on'])->translatedFormat('d F Y') }}</p>
    
            <hr>
    
            <!-- Preview Image -->
            <img class="img-fluid rounded featured-image img-cover" src="{{ $news_data['featured_image'] ? config('directus.server_url').($news_data['featured_image']['data']['asset_url']) : '' }}" alt="">
    
            <hr>
    
            <!-- Post Content -->
            {!! $news_data['content'] !!}
    
            <hr>
    
            <!-- Comments Form -->
            <div class="card my-4">
                <h5 class="card-header">Share to the world</h5>
                <div class="card-body">
                    <x-organisms.share-buttons :title="$news_data['title'] ?? ''" :text="$news_data['excerpt'] ?? ''" />
                </div>
            </div>
    
        </div>
    
        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">
    
            <!-- Search Widget -->
            <div class="card my-4">
                <h5 class="card-header">Search</h5>
                <div class="card-body">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-append">
                            <button class="btn btn-secondary" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </div>
    
            <!-- Side Widget -->
            <div class="card my-4">
                <h5 class="card-header">Side Widget</h5>
                <div class="card-body">
                    You can put anything you want inside of these side widgets. They are easy to use, and feature the new
                    Bootstrap 4 card containers!
                </div>
            </div>
    
        </div>
    
    </div>
    <!-- /.row -->
</div>
@endsection