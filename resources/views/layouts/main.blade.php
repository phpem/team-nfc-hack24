<html>
<head>
    <meta charset="UTF-8">
    <title>@yield('meta-title', 'Team NFC (No fucking clue)')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="theme-color" content="#273d49">
    <link rel="stylesheet" href="{{ URL::to('/css') }}/main.min.css"/>
</head>
<body>

        <h1 class="welcome__title">@yield('page-avatar') @yield('page-title')</h1>
    @yield('content')

    <footer>
        <div class="footer__team-list">
            Team NFC is: <a href="http://twitter.com/TheMattBrunt">@TheMattBrunt</a> <a href="http://twitter.com/tdc_hodgy">@tdc_hodgy</a> <a href="http://twitter.com/Pavlakis">@Pavlakis</a> <a href="http://twitter.com/gazj">@gazj</a>
        </div>
    </footer>

    <ul class="lower-nav">
        <li>
            <a href="{{ URL::to('/') }}"><i class="fa fa-home"></i></a>
        </li>
        <li>
            <a href="{{ URL::to('/account') }}"><i class="fa fa-user"></i></a>
        </li>
        <li>
            <a href="{{ URL::to('/dashboard') }}"><i class="fa fa-line-chart"></i></a>
        </li>
        <li>
            <a href="{{ URL::to('/vote') }}"><i class="fa fa-check-square-o"></i></a>
        </li>
        <li>
            <a href="{{ URL::to('/search') }}"><i class="fa fa-search"></i></a>
        </li>
    </ul>

    <script src="{{ URL::to('/js') }}/main.min.js"></script>
    <script>
        $(document).ready(function() {
            $(document).foundation();
        });
    </script>
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-62563078-1', 'auto');
        ga('send', 'pageview');

    </script>
    @yield('footer-scripts')
</body>
</html>