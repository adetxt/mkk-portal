<div class="card" style="{{ $style ?? '' }}">
  @if (isset($imgUrl) and !empty($imgUrl))
  <img src="{{ $imgUrl }}" class="card-img-{{ $imgPos ?? 'top' }} float-left {{ $imgClass ?? '' }}" alt="{{ $imgAlt ?? '...' }}">
  @endif

  @if (!isset($cardGrid))    
  <div class="card-body">
    <h5 class="card-title">{{ $title ?? '' }}</h5>
    <h6 class="card-subtitle mb-2 text-muted">{{ $subtitle ?? '' }}</h6>
    {{ $slot }}

    @if (isset($link))
    <a href="{{ $link }}" class="card-link">{{ $linkText ?? '' }}</a>
    @endif
  </div>
  
  @else

  {{ $slot }}

  @endif

  
</div>