<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
<script type="text/javascript" async
src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.5/MathJax.js?config=TeX-MML-AM_CHTML">
</script>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="../css/style.css" rel="stylesheet" media="screen">
        <script src="../js/jquery-1.11.1.min.js"></script>
        <script src="../js/shuffle.js" type="text/javascript"></script>
        <script>
        $(document).ready(function(){
            $( '.list label' ).shuffle();
          });
        </script>   
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
              
                <div>
                <form method="POST" action="../aplus/save_result">
                @csrf
                    {!! $tasks[0]->test_en !!}
                        <div class="list">
                            <label><input type="radio" name="test" value=1>
                            {!! $tasks[0]->answer1_en !!}</input></label>
                            <label><input type="radio" name="test" value=2>
                            {!! $tasks[0]->answer2_en !!}</input></label>
                            <label><input type="radio" name="test" value=3>
                            {!! $tasks[0]->answer3_en !!}</input></label>
                            <label><input type="radio" name="test" value=4>
                            {!! $tasks[0]->answer4_en !!}</input></label>
                        </div>
                        <input type="hidden" name="id" value="{!! $tasks[0]->test_id !!}">
                    <button type="submit" class="btn btn-primary">Send answer</button>
                </form>           
                 <!-- <label><input type="radio" name="tests" value="5">
                        another answer</input></label>-->
                <a href="{{ url('/aplus/'.($tasks[0]->test_id+1)) }}">next task</a>
                </div>
        </div>
    </body>
</html>