<div class="container-fluid">
  <div class="row">
    <div class="col-md-offset-3 col-md-6">
      <div class="panel panel-default">
        <div class="panel-heading">Edit your profile</div>
        <div class="panel-body">
          {!! BootForm::openHorizontal(['lg' => [2, 10]]) !!}
          {!! BootForm::text('API Key', 'api_key', auth()->user()->apiKeyCode) !!}
          <div class="row">
            @if (is_null(auth()->user()->apiKey))
              <div class="col-lg-offset-2 col-lg-10">
                <small class="text-muted">
                  This can be gotten from
                  <a href="https://account.arena.net/applications" target="_blank">
                    your account page</a>.
                </small>
              </div>
            @else
              <div class="col-lg-offset-2 col-lg-10">
                <div class="row">
                  @include('user.partials.api-allowed', ['permission' => 'account'])
                  @include('user.partials.api-allowed', ['permission' => 'guilds'])
                  @include('user.partials.api-allowed', ['permission' => 'pvp'])
                  @include('user.partials.api-allowed', ['permission' => 'wallet'])
                </div>
                <div class="row">
                  @include('user.partials.api-allowed', ['permission' => 'builds'])
                  @include('user.partials.api-allowed', ['permission' => 'inventories'])
                  @include('user.partials.api-allowed', ['permission' => 'tradingpost'])
                </div>
                <div class="row">
                  @include('user.partials.api-allowed', ['permission' => 'characters'])
                  @include('user.partials.api-allowed', ['permission' => 'progression'])
                  @include('user.partials.api-allowed', ['permission' => 'unlocks'])
                </div>
              </div>
            @endif
          </div>
          {!! BootForm::close() !!}
        </div>
      </div>
    </div>
  </div>
</div>
