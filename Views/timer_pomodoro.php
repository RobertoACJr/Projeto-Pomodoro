<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
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
            <div class="col-md-4 offset-md-4 row">
                <div class="col-md-6">   
                    <button id="start" type="submmit" class="btn btn-outline-primary form-control">
                        Iniciar
                    </button>
                </div>
                <div class="col-md-6">
                    <button class="btn btn-outline-danger form-control" onclick="resetar()">
                        resetar
                    </button>
                </div>
            </div>
        </div>
    </div>

</body>

<script>  
    $(document).ready(function(){
        $('#start').click(function(){
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.open("GET","../Timer/inicia_temp.php",false);
            xmlhttp.send(null);
        });
    });

    setInterval(function() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../Timer/calcula_temp.php",false);
        xmlhttp.send(null);
        document.getElementById("temp").innerHTML=xmlhttp.responseText;
    }, 1000);
</script>