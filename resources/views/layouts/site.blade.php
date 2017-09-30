<!DOCTYPE html>
<html lang="en" class="no-js">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta name="trafficjunky-site-verification" content="9n23w4958" />

    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Vote no seu candidado - {{ config('app.name') }}</title>
    <meta name="description" content="{{ $research->description }}">
    <meta name="keywords" content="eleições 2018, pretenção de voto, pequisa eleitoral, enquete eleições, voz do eleitor">
    <meta name="author" content="Waister Nunes <waisters@gmail.com>">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <meta property="og:locale" content="pt_BR" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{ config('app.name') }}" />
    <meta property="og:description" content="{{ $research->description }}" />
    <meta property="og:site_name" content="{{ config('app.name') }}" />
    <meta property="og:image" content="{{ asset('images/share.jpg?v=7') }}" />
    <meta property="og:url" content="{{ url('/') }}" />
    <meta property="fb:app_id" content="1954643438141685" />

    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/site.css?v=5') }}">

    <meta name="google-site-verification" content="D4syvxuxAvhI7dN-Xa7qTsXPwn2mCl2cBlSR6IdalFg" />

    <!-- Global Site Tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-107276854-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments)};
        gtag('js', new Date());

        gtag('config', 'UA-107276854-1');
    </script>

    <script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js#property=59cd07e021dcc40012f16fd2&product=sticky-share-buttons"></script>

    @yield('styles')
</head>

<body>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.10&appId=1954643438141685";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

    <div id="site">
        <header id="header">
            <h1 id="title">{{ config('app.name') }}</h1>
        </header>

        @yield('content')

        <footer id="footer">{{ config('app.name') }} todos os direitos reservados.</footer>
    </div>

    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/site.js') }}"></script>

    @yield('scripts')
</body>
</html>