@extends('climb-template.templates.main')

@section('content')

<h1 class="w-100 text-center text-dark my-4 mb-5">{{ $page_data['header'] }}</h1>

<div class="container">
  <div class="row g-4">
    <div class="col-lg-4">
      <x-molecules.card title="Product Manager" subtitle="Rp. 8-12jt" link="#!" link-text="Detail">
        <div class="card-text">
          Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quam optio exercitationem sapiente, est quaerat ex cupiditate?
        </div>
      </x-molecules.card>
    </div>
    <div class="col-lg-4">
      <x-molecules.card title="System Administrator" subtitle="Rp. 8-12jt" link="#!" link-text="Detail">
        <div class="card-text">
          Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quam optio exercitationem sapiente, est quaerat ex
          cupiditate?
        </div>
      </x-molecules.card>
    </div>
    <div class="col-lg-4">
      <x-molecules.card title="Quality Assurance" subtitle="Rp. 8-12jt" link="#!" link-text="Detail">
        <div class="card-text">
          Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quam optio exercitationem sapiente, est quaerat ex
          cupiditate?
        </div>
      </x-molecules.card>
    </div>
  </div>
</div>
@endsection