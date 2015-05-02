<html>
<head>
    <meta charset="UTF-8">
    <title>@yield('meta-title', 'Team NFC (No fucking clue)')</title>
    <link rel="stylesheet" href="css/main.min.css"/>
</head>
<body>
    @yield('content')

    <footer>
        <div class="footer__team-list">
            Team NFC is: <a href="http://twitter.com/TheMattBrunt">@TheMattBrunt</a> <a href="http://twitter.com/tdc_hodgy">@tdc_hodgy</a> <a href="http://twitter.com/Pavlakis">@Pavlakis</a> <a href="http://twitter.com/gazj">@gazj</a>
        </div>
    </footer>
    <script src="js/main.min.js"></script>
    <script>
        $(document).ready(function() {
            $(document).foundation();
        });
    </script>
</body>
</html>