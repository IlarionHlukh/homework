<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel Blog') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel Blog') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a  class="navbar-brand">
                <div class="buttons">
                    <a class="btn btn-outline-success" href="{{ route('posts.index') }}">Всі пости</a>
                    <a class="btn btn-outline-primary" href="{{ route('posts.create') }}">Створити пост</a>
                </div>
        </div>
        </a>
        </a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->

                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="btn btn-outline-secondary" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="btn btn-outline-warning" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
</div>
</nav>

<body class="text-center">
<script src="https://partner.googleadservices.com/gampad/cookie.js?domain=bootstrap-4.ru&amp;callback=_gfp_s_&amp;client=ca-pub-8588635311388465&amp;cookie=ID%3D1d81bd83f9a0ce35-220882ca4ab90008%3AT%3D1606597357%3ART%3D1606597357%3AS%3DALNI_Mb7TI2LDbLQCHxrBQzM4uO9SadfXg"></script><script src="https://pagead2.googlesyndication.com/pagead/js/r20201203/r20190131/show_ads_impl_fy2019.js" id="google_shimpl"></script><script async="" src="https://mc.yandex.ru/metrika/tag.js"></script><script async="" src="https://www.google-analytics.com/analytics.js"></script><script defer="">
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-4481610-59', 'auto');
    ga('send', 'pageview');

</script>

<!-- Yandex.Metrika counter --> <script type="text/javascript"> (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)}; m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)}) (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym"); ym(39705265, "init", { clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true }); </script> <noscript><div><img src="https://mc.yandex.ru/watch/39705265" style="position:absolute; left:-9999px;" alt="" /></div></noscript> <!-- /Yandex.Metrika counter -->

<script async="" src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
    (adsbygoogle = window.adsbygoogle || []).push({
        google_ad_client: "ca-pub-8588635311388465",
        enable_page_level_ads: true
    });
</script>


<div class="cover-container d-flex h-100 p-3 mx-auto flex-column">

    <main role="main" class="inner cover">
        <h1 class="cover-heading">Laravel Blog</h1>
        <p class="lead">“Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.”</p>
    </main>

</div>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="../../../../assets/js/vendor/popper.min.js"></script>
<script src="../../../../dist/js/bootstrap.min.js"></script><ins class="adsbygoogle adsbygoogle-noablate" data-adsbygoogle-status="done" style="display: none !important;"><ins id="aswift_0_expand" style="display:inline-table;border:none;height:0px;margin:0;padding:0;position:relative;visibility:visible;width:0px;background-color:transparent;" tabindex="0" title="Advertisement" aria-label="Advertisement"><ins id="aswift_0_anchor" style="display:block;border:none;height:0px;margin:0;padding:0;position:relative;visibility:visible;width:0px;background-color:transparent;"><iframe id="aswift_0" name="aswift_0" style="left:0;position:absolute;top:0;border:0;width:undefinedpx;height:undefinedpx;" sandbox="allow-forms allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts allow-top-navigation-by-user-activation" frameborder="0" src="https://googleads.g.doubleclick.net/pagead/ads?guci=2.2.0.0.2.2.0.0&amp;client=ca-pub-8588635311388465&amp;output=html&amp;adk=1812271804&amp;adf=3025194257&amp;lmt=1607789970&amp;plat=1%3A32776%2C2%3A32776%2C9%3A32776%2C10%3A32%2C11%3A32%2C16%3A8388608%2C17%3A32%2C24%3A32%2C25%3A32%2C30%3A1081344%2C32%3A32%2C40%3A32&amp;format=0x0&amp;url=https%3A%2F%2Fbootstrap-4.ru%2Fdocs%2F4.0%2Fexamples%2Fcover%2F&amp;ea=0&amp;flash=0&amp;pra=5&amp;wgl=1&amp;tt_state=W3siaXNzdWVyT3JpZ2luIjoiaHR0cHM6Ly9hZHNlcnZpY2UuZ29vZ2xlLmNvbSIsInN0YXRlIjowfSx7Imlzc3Vlck9yaWdpbiI6Imh0dHBzOi8vYXR0ZXN0YXRpb24uYW5kcm9pZC5jb20iLCJzdGF0ZSI6MH1d&amp;dt=1607789970272&amp;bpp=17&amp;bdt=319&amp;idt=154&amp;shv=r20201203&amp;cbv=r20190131&amp;ptt=9&amp;saldr=aa&amp;abxe=1&amp;cookie=ID%3D1d81bd83f9a0ce35-220882ca4ab90008%3AT%3D1606597357%3ART%3D1606597357%3AS%3DALNI_Mb7TI2LDbLQCHxrBQzM4uO9SadfXg&amp;nras=1&amp;correlator=5743853737625&amp;frm=20&amp;pv=2&amp;ga_vid=2130893015.1596900832&amp;ga_sid=1607789970&amp;ga_hid=577810228&amp;ga_fc=0&amp;u_tz=120&amp;u_his=7&amp;u_java=0&amp;u_h=720&amp;u_w=1280&amp;u_ah=690&amp;u_aw=1280&amp;u_cd=24&amp;u_nplug=3&amp;u_nmime=4&amp;adx=-12245933&amp;ady=-12245933&amp;biw=1422&amp;bih=653&amp;scr_x=0&amp;scr_y=0&amp;eid=21067213%2C21068946&amp;oid=3&amp;pvsid=1231103421738922&amp;pem=741&amp;ref=https%3A%2F%2Fbootstrap-4.ru%2Fdocs%2F4.0%2Fexamples%2F&amp;rx=0&amp;eae=2&amp;fc=1920&amp;brdim=0%2C0%2C0%2C0%2C1280%2C0%2C1280%2C690%2C1422%2C652&amp;vis=1&amp;rsz=%7C%7Cs%7C&amp;abl=NS&amp;fu=8192&amp;bc=31&amp;ifi=0&amp;uci=a!0&amp;fsb=1&amp;dtd=183" marginwidth="0" marginheight="0" vspace="0" hspace="0" allowtransparency="true" scrolling="no" allowfullscreen="true" data-google-container-id="a!0" data-load-complete="true"></iframe></ins></ins></ins>



<iframe id="google_osd_static_frame_3267628008879" name="google_osd_static_frame" style="display: none; width: 0px; height: 0px;"></iframe></body>
</body>
</html>
