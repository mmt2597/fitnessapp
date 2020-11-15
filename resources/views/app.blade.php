<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        <link href="{{ mix('/css/app.css') }}" rel="stylesheet" />
        <script src="{{ mix('/js/app.js') }}" defer></script>
        @routes
        <title>FitApp</title>
        <script>
        	Ziggy.url = window.location.protocol + '//' + window.location.host;
        </script>
    </head>
<body>
    @inertia
</body>
</html>