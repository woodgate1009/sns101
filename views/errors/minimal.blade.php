
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 100;
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

            .code {
                border-right: 2px solid;
                font-size: 26px;
                padding: 0 15px 0 15px;
                text-align: center;
            }

            .message {
                font-size: 18px;
                text-align: center;
            }
        </style>
    </head>
    <body>
      <!DOCTYPE html>
      <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
          <head>
              <meta charset="utf-8">
              <meta name="viewport" content="width=device-width, initial-scale=1">

              <!-- CSRF Token -->
              <meta name="csrf-token" content="{{ csrf_token() }}">

              <title>{{ config('app.name', 'Laravel') }}</title>

              <!-- Scripts -->
              <script src="{{ asset('js/app.js') }}"></script>

              <!-- Fonts -->
              <link rel="dns-prefetch" href="//fonts.gstatic.com">
              <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

              <!-- Styles -->
              <link href="{{ asset('css/app.css') }}" rel="stylesheet">
              <!-- Font Awesome -->
              <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
          </head>
          <body>
              <div id="contents">
                  <div>
                    @guest
                     @if (Route::has('register'))
                     @endif
                     @else
                    <div class="sp-1" style="text-align:center;">
                      <p>当サイトはβ公開版です。バグ等が発生する可能性があるためご了承ください。概要、今後のアップデート情報は <a href="https://arow.xii.jp/arow/public/about/about">こちら</a></p>
                    </div>
                    @endguest
                  <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                      <div class="container">
                          <a class="navbar-brand" href="{{ url('/') }}">
                              {{ config('app.name', 'Laravel') }}
                          </a>
                          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                              <span class="navbar-toggler-icon"></span>
                          </button>

                          <div class="collapse navbar-collapse" id="navbarSupportedContent">

                              <ul class="navbar-nav ml-auto align-items-center">
                                  <!-- Authentication Links -->
                                  @guest
                                      <li class="nav-item">

                                      </li>
                                      @if (Route::has('register'))
                                          <li class="nav-item">

                                          </li>
                                      @endif
                                  @else
                                  <div class="users" style="margin-right:8px">
                                    <a href="{{ url('users') }}" class="buttonrig" style="color:#fff;background-color:#dd0b0b;border-color:#dd0b0;padding-top:8px;padding-bottom:8px;font-size:16px;padding:10px;border-radius:6px;text-decoration:none;">ユーザー</a>
                                  </div>
                                  <li class="nav-item mr-5">
                                        <a href="{{ url('tweets/create') }}" class="buttonrig" style="color:#fff;background-color:#dd0b0b;border-color:#dd0b0;padding-top:8px;padding-bottom:8px;font-size:16px;padding:10px;border-radius:6px;text-decoration:none;">投稿する</a>
                                    </li>
                                    <li class="nav-item">
                                        <img src="{{ asset('storage/profile_image/' .auth()->user()->profile_image) }}" class="rounded-circle" width="50" height="50">
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ auth()->user()->name }} <span class="caret"></span>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a href="{{ url('users/' .auth()->user()->id) }}" class="dropdown-item">プロフィール</a>
                                            <a href="{{ route('logout') }}" class="dropdown-item"
                                            onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                @endguest
                            </ul>
                        </div>
                    </div>
                </nav>

                <main class="py-4">
                    @yield('content')
                </main>
            </div>
        </body>
      </html>

        <div class="flex-center position-ref full-height">
            <div class="code">
                @yield('code')
            </div>

            <div class="message" style="padding: 10px;">
                @yield('message')
            </div>
            <div>
              <p>エラーが発生しました</p>
              <a class="navbar-brand" href="{{ url('/') }}">トップへ戻る</a>
        </div>
    </body>
</html>
