<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title> @yield('title', 'Hollywood Hipster | The hipest movie reviews this side of the west coast ')</title>

        <link rel="stylesheet" href="/css/app.css">
        <style>
            .genre, .roles, .inline-block{
                display: inline-block;
            }
        </style>
    </head>
    <body>
        @yield('content')

        <script src="/js/app.js"></script>
    </body>
</html>
