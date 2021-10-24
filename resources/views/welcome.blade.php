<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <meta http-equiv="refresh" content="2;URL='{{ route('home') }}'" />

        <!-- Styles -->
        <style>
            html, body {
                height: 100%;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height"><div class="content">
            <div class="title m-b-md">
                <img src="{{ Voyager::Image(setting('site.loading_logo')) }}" style="height: 350px;" />
            </div>

            <div class="links">
                <img src="{{ Voyager::Image(setting('site.loader')) }}" style="height: 100px;" />
            </div>
        </div>
        </div>
    </body>
</html>
