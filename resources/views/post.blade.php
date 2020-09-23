<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
<script src='https://kit.fontawesome.com/a076d05399.js'></script>

        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 100;
                height: 50vh;
                margin: 20px;
            }

            .full-height {
                height: 100vh;
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
                font-size: 50px;
                text-align: center;
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
                margin-bottom: 20px;
            }

            input[type=submit] {
            height: 100%;
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;

            }

            input[type=submit]:hover {
            background-color: #45a049;
            }

            .voltar {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            display: inline;
            margin-left: auto;
            margin-right: auto;
            width: 100%;
            margin-bottom: 20px;
            }

        </style>


<div class="title m-b-md">
    Os registos foram adicionados com sucesso!
    <div >
        <a class="voltar" href="{{asset('api/pdf')}}">API</a>
        <a class="voltar" type="button" onclick="window.location='{{ asset('/') }}'">Voltar</a>
    </div>
</div>