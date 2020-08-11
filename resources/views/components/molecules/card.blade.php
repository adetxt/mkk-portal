<div class="card" style="{{ $style ?? '' }}">
  @if (isset($imgUrl))
  <img src="{{ $imgUrl }}" class="card-img-{{ $imgPos ?? 'top' }} float-left" alt="{{ $imgAlt ?? '...' }}">
  @endif

  @if (!isset($cardGrid))    
  <div class="card-body">
    {{ $slot }}
  </div>
  
  @else

  {{ $slot }}

  @endif

  
</div>