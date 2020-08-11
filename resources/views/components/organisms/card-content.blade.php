<h1 class="w-100 text-center text-light font-weight-light my-4">{{ $title ?? '' }}</h1>

<div class="card" style="width: {{ $width }}; min-height: 34rem; max-height: auto;">
  <div class="card-body">
    {{ $slot }}
  </div>
</div>