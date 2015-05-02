<html>
<head>
    <meta charset="UTF-8">
    <title>@yield('meta-title', 'Team NFC (No fucking clue)')</title>
    <link rel="stylesheet" href="css/main.min.css"/>
</head>
<body>
    @yield('content')
<script src="js/main.min.js"></script>
    <script>
        $(document).ready(function() {
            $(document).foundation();
        });
    </script>
</body>
</html>