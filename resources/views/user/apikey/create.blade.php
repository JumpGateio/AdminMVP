{!! Form::open(['class' => 'uk-form-horizontal']) !!}
  <div class="uk-card uk-card-default uk-padding-remove">
    <div class="uk-card-header uk-background-primary-dark uk-text-white">Add a new API Key</div>
    <div class="uk-card-body">

      <div class="uk-margin">
        {!! Form::label('api_key', 'Api Key', ['class' => 'uk-form-label']) !!}
        <div class="uk-form-controls">
          {!! Form::text('api_key', null, ['class' => 'uk-input', 'required' => 'required']) !!}
          <small class="uk-text-muted">
            This can be gotten from
            <a href="https://account.arena.net/applications" target="_blank">
              your account page</a>.
          </small>
        </div>

      </div>

    </div>
    <div class="uk-card-footer">

      <input type="submit" value="Save" class="uk-button uk-button-primary-light uk-text-white">
      <a href="{{ route('user.api-key.index') }}" class="button">
        Cancel
      </a>

    </div>
  </div>
{!! Form::close() !!}
