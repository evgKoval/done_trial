<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="../css/style.css" rel="stylesheet" media="screen">
        
       
    </head>
     <body>
        <div class="flex-center position-ref full-height">
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
                <div class="title m-b-md">
                    Icons
                </div>
                @php ($i=0)
                <div class="links">
                <table><tr>
                    @foreach ($numbers as $number)
                       @if ($i%10 === 0)
                            </tr><tr>
                        @endif
                        <td>
                        <img width="50" src="{{ asset('images/eidos/icons/level-61/'.$number) }}">
                        </td>
                       @php ($i++)
                    @endforeach
                </tr></table>
                </div>
                 <a href="{{ url('icons3/8') }}">Remember</a>
            </div>
        </div>
    </body>
</html>