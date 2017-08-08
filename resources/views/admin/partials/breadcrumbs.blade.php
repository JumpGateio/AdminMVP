<div uk-grid>
  <div class="uk-width-1-1">
    <div class="uk-background-gray-lighter uk-margin-small-left">
      <small>
        <ul class="uk-breadcrumb uk-float-left uk-margin-remove-bottom">
          <li><a href="{{ route($routes['index']) }}">Dashboard</a></li>
          <li><a href="{{ route($routes['index']) }}">List Users</a></li>
          <li><span>User: {{ $resource->display_name }}</span></li>
        </ul>
      </small>
    </div>
  </div>
</div>
