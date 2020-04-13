<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
   

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 00;
                height: 100vh;
                margin: 0;
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
                text-align: left;
            }

            .title {
                font-size: 84px;
            }
            .links {
                width: 1200px;
                text-align:center;
            }
            .links > li{
                float:left;
                width:180px;
                text-align:left;
                bottom: 5px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
   

            <div class="content">
                <div class="title m-b-md">
                    网址导航
                </div>
                 <div class="links">
                @foreach($links as $key=>$st)
                <li><a target="_blank" href="{{ $st->url }}">{{ $st->name }}</a></li>
                @if( ($key+1) % 9 == 0)
                </div><div class="links">
                @endif      
                @endforeach
                </div>
      
            </div>
        </div>
    </body>
</html>
