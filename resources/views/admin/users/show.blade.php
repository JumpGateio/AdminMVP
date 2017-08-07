@section('title')
  User: {{ $resource->display_name }}

  <a class="uk-button uk-button-default uk-button-small uk-float-right uk-margin-small-right" href="{{ route($routes['index']) }}">
    <i class="fa fa-fw fa-long-arrow-left"></i>&nbsp;Back
  </a>
  <a class="uk-button uk-button-primary uk-background-primary-light uk-text-white uk-button-small uk-float-right uk-margin-small-right" href="{{ route($routes['edit'], $resource->id) }}">
    <i class="fa fa-fw fa-pencil"></i>&nbsp;Edit
  </a>
@endsection
<div uk-grid>
  <div class="uk-width-1-1 uk-background-gray-lighter uk-margin-small-left">
    <small>
      <ul class="uk-breadcrumb uk-float-left uk-margin-remove-bottom">
        <li><a href="{{ route($routes['index']) }}">Dashboard</a></li>
        <li><a href="{{ route($routes['index']) }}">List Users</a></li>
        <li><span>User: {{ $resource->display_name }}</span></li>
      </ul>
    </small>
  </div>
  <div class="uk-width-2-3">
    <div class="uk-card uk-card-default">
      <div class="uk-card-header uk-background-primary-light uk-text-white">
        <div class="uk-legend">
          {{ $resource->email }}
        </div>
      </div>

      <div class="card-body uk-padding-small">
        <table class="uk-table">
          <tbody>
            <tr>
              <td>Email:</td>
              <td>{{ $resource->email }}</td>
            </tr>
            <tr>
              <td>Display Name:</td>
              <td>{{ $resource->details->display_name }}</td>
            </tr>
            <tr>
              <td>Full Name:</td>
              <td>{{ $resource->details->full_name }}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="uk-width-1-3">
    <div class="uk-card uk-card-default uk-card-small uk-margin-small-bottom">
      <div class="uk-card-header uk-background-primary-light uk-text-white">
        <div class="uk-legend">
          Admin Actions
        </div>
      </div>
      @if (config('jumpgate.users.require_email_activation'))
        <div class="uk-card-footer uk-padding-small">
          <div class="uk-child-width-1-2" uk-grid>
            @if ($resource->status_id === $resource->status::ACTIVE)
              <div>
                Activated
                <br />
                <small class="uk-text-muted">{{ $resource->activated_at->format('m/d/Y g:ia') }}</small>
              </div>
              <div>
                <a class="uk-button uk-button-small uk-button-secondary uk-width-1-1">
                  Deactivate and<br />re-send activation
                </a>
              </div>
            @endif
          </div>
        </div>
      @endif
      <div class="uk-card-footer uk-padding-small">
        <div class="uk-child-width-1-2" uk-grid>
          @if ($resource->status_id === $resource->status::BLOCKED)
            <div>
              Blocked
              <br />
              <small class="uk-text-muted">{{ $resource->blocked_at->format('m/d/Y g:ia') }}</small>
            </div>
            <div>
              <a href="{{ route($routes['block'], [$resource->id, 0]) }}" class="uk-button uk-button-small uk-button-secondary uk-width-1-1">Unblock</a>
            </div>
          @else
            <div>
              Not Blocked&nbsp;<small class="uk-text-muted">(Can Login)</small>
            </div>
            <div>
              <a href="{{ route($routes['block'], [$resource->id, 1]) }}" class="uk-button uk-button-small uk-button-secondary uk-width-1-1">Block</a>
            </div>
          @endif
        </div>
      </div>
      <div class="uk-card-footer uk-padding-small">
        <div class="uk-child-width-1-2" uk-grid>
          <div>
            Password Set
            <br />
            <small class="uk-text-muted">{{ is_null($resource->password_updated_at) ? 'Never' : $resource->password_updated_at->format('m/d/Y g:ia') }}</small>
          </div>
          <div>
            <a href="{{ route($routes['reset_password'], $resource->id) }}" class="uk-button uk-button-small uk-button-secondary uk-width-1-1">Reset Password</a>
          </div>
        </div>
      </div>
    </div>
    <div class="uk-card uk-card-default uk-card-small uk-margin-small-bottom">
      <div class="uk-card-header uk-background-primary-light uk-text-white">
        <div class="uk-legend">
          Roles
        </div>
      </div>
      <div class="uk-card-body uk-padding-small">
        <ul class="uk-list">
          @foreach ($resource->roles as $role)
            <li>{{ $role->name }}</li>
          @endforeach
        </ul>
      </div>
    </div>
    <div class="uk-card uk-card-default uk-card-small uk-margin-small-bottom">
      <div class="uk-card-header uk-background-primary-light uk-text-white">
        <div class="uk-legend">
          Permissions
        </div>
      </div>
      <div class="uk-card-body uk-padding-small">
        <ul class="uk-list">
          @if (empty($resource->roles->permissions))
            <li>No permissions for this user.</li>
          @else
            @foreach ($resource->roles->permissions as $permission)
              <li>{{ $permission->name }}</li>
            @endforeach
          @endif
        </ul>
      </div>
    </div>
  </div>
</div>
