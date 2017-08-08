<!doctype html>
<html>
  <head>
    @include('layouts.partials.header')
  </head>

  <body>
    <div id="app" class="uk-offcanvas-content">
      <div id="container">
        <div uk-grid>
          <div class="uk-width-expand@m">
            @include('layouts.partials.menu')
          </div>
        </div>

        <div id="content" style="margin-top: -24px;">
          <div class="uk-section uk-section-secondary uk-padding-small">
            @yield('title')
          </div>
          <div class="uk-grid-collapse" uk-grid uk-height-viewport="expand: true">
            <div class="uk-width-1-6 uk-background-gray-dark uk-sidebar">
              @section('sidebar')
                @if (Menu::exists('adminMenu') && Menu::hasLinks('adminMenu'))
                  @section('sidebar')
                    @include('layouts.partials.sidebar-menu', ['menu' => Menu::render('adminMenu')])
                  @endsection
                @endif
              @show
            </div>
            <div class="uk-width-5-6">
              @if (isset($content))
                {!! $content !!}
              @else
                @yield('content')
              @endif
            </div>
          </div>
        </div>

        @section('footer')
          @include('layouts.partials.footer')
        @show
      </div>

      @include('layouts.partials.modals')

    </div>
    @include('layouts.partials.javascript')
  </body>
</html>
