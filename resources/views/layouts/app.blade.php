<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        @yield('title')

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 30px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
      <div class="top-left links">
        <a href="/lines">List of product lines</a>
        <br>
        <a href="/items">List of all items</a>
        <br>
        <a href="/items?state=unordered">List of all unordered items</a>
        <br>
        <a href="/items?state=ordered">List of all ordered items</a>
        <br>
        <a href="/items?state=received">List of all received items</a>
      </div>

      <div class="flex-center position-ref full-height">
          <div class="content">
              @yield('content')
          </div>
      </div>

      <div class="bottom-left links">
        <a href="/line-deletion">Delete a product line</a>
      </div>
    </body>
</html>
