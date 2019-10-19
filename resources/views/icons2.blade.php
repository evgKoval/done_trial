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

            <h2>Drag and Drop</h2>


            <div>
                <table>
                    <tr>
                        @php
                        $dirname = 'images/eidos/icons/level-'.$level;
                        $i=0;
                        @endphp

                        @foreach ($pictures as $icons)
                        @if ($i%10 === 0)
                    </tr>
                    <tr>
                        @endif
                        <td>
                            <div id="div1">
                                <img class="icon" width=50 height=54 draggable="true" ondragstart="drag(event)" id="{{ $icons}}" src="{{ asset($dirname.'/'.$icons) }}"></div>
                        </td>
                        @php ( $i++ )
                        @endforeach
                    </tr>
                </table>
            </div>
            <p>Drag the images into second table.</p>
            <div>

                <table border=1>
                    <tr>
                        @for ($i = 1; $i <= $num; $i++) @if ($i%10===1) </tr> <tr>
                            @endif
                            <td>
                                <div class="divi" id="tdiv{{ $i }}" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
                            </td>
                            @endfor
                    </tr>
                </table>

                <a href="{{ url('page') }}">Some Text</a>

            </div>

            <form method="POST" action="../icons/save_result">
                @csrf
                @for ($i = 1; $i <= $num; $i++) <input id="myinput{{ $i }}" type="hidden" name="icons[]" value="">
                    @endfor
                    <button type="submit" class="btn btn-primary">Go</button>
            </form>
        </div>
    </div>

</body>

</html>