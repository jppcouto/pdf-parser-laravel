<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF Parser</title>

    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>
<body>
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title">
                Os registos foram adicionados com sucesso!
                <div >
                    <a class="voltar" href="{{asset('api/pdf')}}">JSON</a>
                    <a class="voltar" type="button" onclick="window.location='{{ asset('/') }}'">Voltar</a>
                </div>
            </div>
        </div>
    </div>

</body>
</html>