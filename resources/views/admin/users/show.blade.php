<div uk-grid>
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
              <a class="uk-button uk-button-small uk-button-secondary uk-width-1-1">Unblock</a>
            </div>
          @else
            <div>
              Not Blocked&nbsp;<small class="uk-text-muted">(Can Login)</small>
            </div>
            <div>
              <a class="uk-button uk-button-small uk-button-secondary uk-width-1-1">Block</a>
            </div>
          @endif
        </div>
      </div>
      <div class="uk-card-footer uk-padding-small">
        <div class="uk-child-width-1-2" uk-grid>
          <div>
            Password Set
            <br />
            {{--<small class="uk-text-muted">{{ $resource->password_updated_at->format('m/d/Y g:ia') or 'Never' }}</small>--}}
          </div>
          <div>
            <a class="uk-button uk-button-small uk-button-secondary uk-width-1-1">Reset Password</a>
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
