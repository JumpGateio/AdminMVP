@section('title')
  Create a new user

  <a class="uk-button uk-button-default uk-button-small uk-float-right uk-margin-small-right" href="{{ route($routes['index']) }}">
    <i class="fa fa-fw fa-long-arrow-left"></i>&nbsp;Back
  </a>
@endsection
<div uk-grid>
  <div class="uk-width-1-1">
    <div class="uk-background-gray-lighter uk-margin-small-left">
      <small>
        <ul class="uk-breadcrumb uk-float-left uk-margin-remove-bottom">
          <li><a href="{{ route($routes['index']) }}">Dashboard</a></li>
          <li><a href="{{ route($routes['index']) }}">List Users</a></li>
          <li><span>Create a new user</span></li>
        </ul>
      </small>
    </div>
  </div>
</div>
<div uk-grid>
  <div class="uk-width-1-1 uk-margin-remove-top">
    <div class="uk-card uk-card-default">
      {!! Form::open(['class' => 'uk-form-stacked']) !!}
      <div class="card-body uk-padding-small">

        <div class="uk-margin">
          {!! Form::label('user[email]', 'Email', ['class' => 'uk-form-label']) !!}
          <div class="uk-form-controls">
            {!! Form::text('user[email]', null, ['class' => 'uk-input', 'id' => 'user[email]']) !!}
          </div>
        </div>

        <div class="uk-margin">
          {!! Form::label('details[display_name]', 'Display Name', ['class' => 'uk-form-label']) !!}
          <div class="uk-form-controls">
            {!! Form::text('details[display_name]', null, ['class' => 'uk-input', 'id' => 'details[display_name]']) !!}
          </div>
        </div>

        <div class="uk-margin">
          {!! Form::label('details[first_name]', 'First Name', ['class' => 'uk-form-label']) !!}
          <div class="uk-form-controls">
            {!! Form::text('details[first_name]', null, ['class' => 'uk-input', 'id' => 'details[first_name]']) !!}
          </div>
        </div>

        <div class="uk-margin">
          {!! Form::label('details[middle_name]', 'Middle Name', ['class' => 'uk-form-label']) !!}
          <div class="uk-form-controls">
            {!! Form::text('details[middle_name]', null, ['class' => 'uk-input', 'id' => 'details[middle_name]']) !!}
          </div>
        </div>

        <div class="uk-margin">
          {!! Form::label('details[last_name]', 'Last Name', ['class' => 'uk-form-label']) !!}
          <div class="uk-form-controls">
            {!! Form::text('details[last_name]', null, ['class' => 'uk-input', 'id' => 'details[last_name]']) !!}
          </div>
        </div>

        <div class="uk-margin">
          {!! Form::label('roles', 'Roles', ['class' => 'uk-form-label']) !!}
          <div class="uk-form-controls">
            {!! Form::select('roles', $roles, 0, ['class' => 'uk-select', 'id' => 'roles', 'multiple' => 'multiple']) !!}
          </div>
        </div>
      </div>
      <div class="uk-card-footer uk-padding-small">
        {!! Form::submit('Create user', ['class' => 'uk-button uk-button-primary uk-text-white']) !!}
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>
