<head>
    <title>Timer Pomodoro</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="../Js/notification.js"></script>
    <script src="../Js/calcular_tempo.js"></script>
    <script src="../Js/on_reload.js"></script>
    <?php session_start() ?>
</head>

<body>
    <br>
    <div id="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text-center">
                    <div class="jumbotron">
                        <h1 id="temp" style="font-size:100px">00:00</h1>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-8 offset-sm-2 col-md-8 offset-md-2 col-lg-6 offset-lg-3 col-xl-6 offset-xl-3 row">
                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 form-group">  
                    <button id="btnIniciar" class="btn btn-outline-primary form-control" onclick="contar_tempo(25)">
                        Iniciar (25min)
                    </button>
                </div>

                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 form-groups">
                    <button id="btnIntevalo" class="btn btn-outline-danger form-control" onclick="contar_tempo(5)">
                        Intervalo (5min)
                    </button>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-8 offset-sm-2 col-md-8 offset-md-2 col-lg-6 offset-lg-3 col-xl-6 offset-xl-3 row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 form-groups">
                    <h5 class="text-center" id="qtdPomodoro">foram feitos 0 pomodoro(s)</h5>
                </div>
            </div>
        </div>

    </div>

    <audio src="../Audio/Alerta.mp3" id="idAudio"></audio>
</body>