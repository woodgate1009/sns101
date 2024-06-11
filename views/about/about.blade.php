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
        <link rel="stylesheet" href="/../public/css/app.css/">
    </head>
    <body>
        <div id="contents">
            <div>

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
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
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
        <div class="siteAbout" style="background-color:#ffffff;font-family:sans-serif;">
          <div>
            <p style="font-size:36px;font-weight:600;">当サービスに関して</p>
          </div>
          <div class="aboutss">
            <p>当サービスは、個人によって製作されたソーシャルネットワークサービスです。2021年1月現在、<br>・文字投稿機能<br>・ユーザーのフォロー機能<br>・投稿の閲覧<br>
            を主に行う事が出来ます。また現在、当サービスは飽くまでβ版としての運用を行っております。<br>バグや不具合といった点、不自由な点が生じる事も考えられますが、今後正式版に向けて修正を重ね、より安全で使いやすいサービスの提供に努めてまいります。ご了承ください。
          </p>
          <h2>今後追加予定の機能</h2>
          <p>今後における当サービスの追加予定機能を記載いたします。具体的な追加日程は未定ですが、一日でも早く完璧な形に出来るよう努めてまいります。</p>
          <p>・検索機能<br>・通知機能<br>・プロフィール機能<br>・グループ機能（特定の人のみでのグループチャット）<br>・ソーシャルログイン機能<br>・画像投稿機能<br>※その他、随時追加いたします。更新優先度は製作の状況等により前後します。</p>
          <h2>管理者情報</h2>
            <p>
            管理者名：テレP
            プロフィール：中学生です。社会好き、アニメ好き。<br>
            アカウント：<a href="https://arow.xii.jp/users/16">こちら</a><br>
            Twitter：<a href="https://twitter.com/terep2020">こちら</a>
          </p>

          </div>
        </div>
  </body>
</html>
