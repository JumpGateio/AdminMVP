@section('title')
  Edit {{ $resource->email }}

  <a class="uk-button uk-button-default uk-button-small uk-float-right uk-margin-small-right" href="{{ route($routes['index']) }}">
    <i class="fa fa-fw fa-long-arrow-left"></i>&nbsp;Back
  </a>
  <a class="uk-button uk-button-primary uk-background-primary-light uk-text-white uk-button-small uk-float-right uk-margin-small-right" href="{{ route($routes['show'], $resource->id) }}">
    <i class="fa fa-fw fa-eye"></i>&nbsp;View
  </a>
@endsection
<div uk-grid>
  <div class="uk-width-1-1">
    <div class="uk-background-gray-lighter uk-margin-small-left">
      <small>
        <ul class="uk-breadcrumb uk-float-left uk-margin-remove-bottom">
          <li><a href="{{ route($routes['index']) }}">Dashboard</a></li>
          <li><a href="{{ route($routes['index']) }}">List Users</a></li>
          <li><span>Edit {{ $resource->email }}</span></li>
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
            {!! Form::text('user[email]', $resource->email, ['class' => 'uk-input', 'id' => 'user[email]']) !!}
          </div>
        </div>

        <div class="uk-margin">
          {!! Form::label('details[display_name]', 'Display Name', ['class' => 'uk-form-label']) !!}
          <div class="uk-form-controls">
            {!! Form::text('details[display_name]', $resource->details->display_name, ['class' => 'uk-input', 'id' => 'details[display_name]']) !!}
          </div>
        </div>

        <div class="uk-margin">
          {!! Form::label('details[first_name]', 'First Name', ['class' => 'uk-form-label']) !!}
          <div class="uk-form-controls">
            {!! Form::text('details[first_name]', $resource->details->first_name, ['class' => 'uk-input', 'id' => 'details[first_name]']) !!}
          </div>
        </div>

        <div class="uk-margin">
          {!! Form::label('details[middle_name]', 'Middle Name', ['class' => 'uk-form-label']) !!}
          <div class="uk-form-controls">
            {!! Form::text('details[middle_name]', $resource->details->middle_name, ['class' => 'uk-input', 'id' => 'details[middle_name]']) !!}
          </div>
        </div>

        <div class="uk-margin">
          {!! Form::label('details[last_name]', 'Last Name', ['class' => 'uk-form-label']) !!}
          <div class="uk-form-controls">
            {!! Form::text('details[last_name]', $resource->details->last_name, ['class' => 'uk-input', 'id' => 'details[last_name]']) !!}
          </div>
        </div>

        <div class="uk-margin">
          {!! Form::label('roles', 'Roles', ['class' => 'uk-form-label']) !!}
          <div class="uk-form-controls">
            {!! Form::select('roles', $roles, $resource->roles->id->toArray(), ['class' => 'uk-select', 'id' => 'roles', 'multiple' => 'multiple']) !!}
          </div>
        </div>

        <div class="uk-margin">
          {!! Form::label('user[status_id]', 'Status', ['class' => 'uk-form-label']) !!}
          <div class="uk-form-controls">
            {!! Form::select('user[status_id', $statuses, $resource->status_id, ['class' => 'uk-select', 'id' => 'user[status_id]']) !!}
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
