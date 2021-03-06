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
        <script src="../js/dragdrop.js" type="text/javascript"></script>
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
  
        <h2>All icons</h2>
      
            @php ($i=0)
            @php ($dirname = 'images/eidos/icons/level-'.$level)
                            
               <div>
                    <table><tr>
                    @foreach ($all_answers as $icons)
                        @if ($i%10 === 0)
                            </tr><tr>
                        @endif
                        <td><div id="div1"  >
                        <img width=50  height=54 draggable="true" ondragstart="drag(event)" id="{{ $icons }}"
                        src="{{ asset($dirname.'/'.$icons) }}"></div></td>
                        @php ( $i++ )
                    @endforeach
                    </tr></table>
                </div>
                <h2>Right answers</h2>
                @php ($i=0)
                <div>
                    <table><tr>
                    @foreach ($right_answers as $icons)
                        @if ($i%10 === 0)
                            </tr><tr>
                        @endif
                        <td><div id="div1"  >
                        <img width=50  height=54 draggable="true" ondragstart="drag(event)" id="{{ $icons }}"
                        src="{{ asset($dirname.'/'.$icons) }}"></div></td>
                        @php ( $i++ )
                    @endforeach
                    </tr></table>
                </div>

            <h2>Your answers (your result is {{ $result }})</h2>
                @php ($i=0)
                <div>
                    <table><tr>
                    @foreach ($your_answers as $icons)
                        @if ($i%10 === 0)
                            </tr><tr>
                        @endif
                        <td><div id="div1"  >
                        <img width=50  height=54 draggable="true" ondragstart="drag(event)" id="{{ $icons }}"
                        src="{{ asset($dirname.'/'.$icons) }}"></div></td>
                        @php ( $i++ )
                    @endforeach
                    </tr></table>
                </div>
                
        </div>

    </body>
</html>