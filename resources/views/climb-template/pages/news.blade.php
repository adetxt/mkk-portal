@extends('climb-template.templates.full-background')

@section('content')

<x-organisms.card-content width="90%" title="Berita">
  <div class="row">
    <div class="col-lg-6 mb-3">
      <x-molecules.card :cardGrid="true">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="https://picsum.photos/id/1018/200/200" alt="...">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">Lorem, ipsum dolor sit amet consectetur adipisicing elit</h5>
              <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus earum corrupti cupiditate.</p>
              <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
          </div>
        </div>
      </x-molecules.card>
    </div>
    <div class="col-lg-6 mb-3">
      <x-molecules.card :cardGrid="true">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="https://picsum.photos/id/1018/200/200" alt="...">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">Lorem, ipsum dolor sit amet consectetur adipisicing elit</h5>
              <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus earum corrupti
                cupiditate.</p>
              <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
          </div>
        </div>
      </x-molecules.card>
    </div>
  </div>
</x-organisms.card-content>

@endsection