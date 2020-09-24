<?php use PHPUnit\TextUI\XmlConfiguration\CodeCoverage\Report\Html;?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>File upload</title>

     <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
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
            <div class="title">
                PDF Parser
            </div>

            <div class="links">

                <form method="POST" action="{{route('uploadFile')}}" enctype="multipart/form-data">
                    @csrf
                    <!--<label for="file">Escolha o ficheiro</label>-->
                    <input type="file" name="file"  accept="application/pdf" >
                    <button type="submit" name="submit">Carregar</button>
                </form>

            </div>
    </div>    

</body>
</html>