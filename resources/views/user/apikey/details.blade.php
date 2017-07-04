<div class="uk-card uk-card-default uk-padding-remove">
  <div class="uk-card-header uk-background-primary-dark uk-text-white">
    Api Key
  </div>
  <div class="uk-card-footer">
    <div class="uk-float-left">
      {{ $key->api_key }}
    </div>
    <div class="uk-float-right">
      <a href="{{ route('user.api-key.destroy', $key->id) }}" class="confirm-remove uk-button uk-button-small uk-button-primary-light uk-text-white">
        <i class="fa fa-fw fa-trash"></i>
      </a>
    </div>
  </div>
  <div class="uk-card-footer">
    <div class="uk-grid-small uk-child-width-1-5" uk-grid>
      @foreach (config('guildwars.permissions') as $permission)
        <div>
          @if ($key->{$permission} === 1)
            <i class="fa fa-fw fa-cog uk-text-primary"></i>
          @else
            <i class="fa fa-fw fa-times uk-text-gw2"></i>
          @endif
          {{ ucwords($permission) }}
        </div>
      @endforeach
    </div>
  </div>
</div>
