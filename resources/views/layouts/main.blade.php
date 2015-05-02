<html>
<head>
    <meta charset="UTF-8">
    <title>@yield('meta-title', 'Team NFC (No fucking clue)')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ URL::to('/css') }}/main.min.css"/>
</head>
<body>
    <h1 class="welcome__title">@yield('page-title')</h1>
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
    </ul>

    <script src="{{ URL::to('/js') }}/main.min.js"></script>
    <script>
        $(document).ready(function() {
            $(document).foundation();
        });
    </script>
</body>
</html>