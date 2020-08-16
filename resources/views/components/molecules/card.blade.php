<div class="card" style="{{ $style ?? '' }}">
  @if (isset($imgUrl) and !empty($imgUrl))
  <img src="{{ $imgUrl }}" class="card-img-{{ $imgPos ?? 'top' }} float-left {{ $imgClass ?? '' }}" alt="{{ $imgAlt ?? '...' }}">
  @endif

  @if (!isset($cardGrid))    
  <div class="card-body">
    {{ $slot }}
  </div>
  
  @else

  {{ $slot }}

  @endif

  
</div>