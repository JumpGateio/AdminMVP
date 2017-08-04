<!doctype html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>

    <!-- Local styles -->
    {!! HTML::style('css/app.css') !!}
    <link rel="shortcut icon" href="https://www.siterocket.com/img/favicon.png" type="image/png">
  </head>

  <body>
    <div id="app">
      <div class="container-fluid" id="container">

        <div id="content">
          @if (isset($content))
            {!! $content !!}
          @else
            @yield('content')
          @endif
        </div>
      </div>

    </div>
    @include('layouts.partials.javascript')
  </body>
</html>
