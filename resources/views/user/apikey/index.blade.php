<div class="uk-grid-small uk-flex-center" uk-grid>
  <div class="uk-width-1-2">
    @if (is_null($key))
      @include('user.apikey.create')
    @else
      @include('user.apikey.details')
    @endif
  </div>
</div>
