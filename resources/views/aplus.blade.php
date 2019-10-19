<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
<script type="text/javascript" async
  src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.5/MathJax.js?config=TeX-MML-AM_CHTML">
</script>
        <!-- Fonts -->
          <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="../css/style.css" rel="stylesheet" media="screen">
     
    </head>
    <body>
        <div class="flex-center position-ref full-height-new">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
                <div class="content">
                <table border=1>
                     @for ($i=0; $i < 40; $i++)
                        <tr>
                            @for ($j=1; $j <= 25; $j++)
                        <td><a href="{{ url('/aplus/'.($i*25+$j)) }}">{!! $i*25+$j !!}</a></td>
                            @endfor
                        </tr>
                     @endfor
                </table>
                </div>
        </div>
    </body>
</html>
