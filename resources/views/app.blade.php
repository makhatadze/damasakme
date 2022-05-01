<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet" />

    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="images/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="images/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114"
          href="images/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144"
          href="images/apple-touch-icon-144x144-precomposed.png">

    <!-- GOOGLE WEB FONT -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <!--     Fonts and icons     -->
    @routes
    <script src="{{ mix('/js/app.js') }}" defer></script>
</head>
<body>
@inertia
<script>
    let sharedData = {!! json_encode($page["props"]["localizations"]??null) !!};

    function __(key, replace = {}) {
        let translation = sharedData ? sharedData[key] || key : key;
        Object.keys(replace).forEach(function (key) {
            translation = translation.replace(":" + key, replace[key]);
        });
        return translation;
    }
</script><!-- COMMON SCRIPTS -->
<script src="js/jquery-3.6.0.min.js"></script>

<script src="js/parallax.min.js"></script>

</body>
</html>