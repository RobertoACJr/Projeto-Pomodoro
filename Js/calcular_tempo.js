$(document).ready(function(){
    $('#btnIniciar').click(function(){
        var dur = "25";
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("POST","../Timer/inicia_tempo.php",false);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        var dados = 'duracao=' + dur;
        xmlhttp.send(dados);

        regressao = setInterval(function() {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.open("GET","../Timer/calcula_tempo.php",false);
            xmlhttp.send(null);
            document.getElementById("temp").innerHTML=xmlhttp.responseText;
            var aux = ""+xmlhttp.responseText;
            if(aux == '00:00'){
                document.getElementById('idAudio').play();
                var icon = "https://image.flaticon.com/icons/png/512/62/62834.png";
                var titulo = "Timer Finalizado";
                var messagem = "O Tempo de trabalho chegou ao fim!";
                var link = "http://localhost/Projeto-pomodoro/";
                notifyMe(icon, titulo, messagem, link);
                clearInterval(regressao);
            }
        }, 1000);
    });
});

$(document).ready(function(){
    $('#btnIntevalo').click(function(){
        var dur = "5";
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("POST","../Timer/inicia_tempo.php",false);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        var dados = 'duracao=' + dur;
        xmlhttp.send(dados);

        regressao = setInterval(function() {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.open("GET","../Timer/calcula_tempo.php",false);
            xmlhttp.send(null);
            document.getElementById("temp").innerHTML=xmlhttp.responseText;
            var aux = ""+xmlhttp.responseText;
            if(aux == '00:00'){
                document.getElementById('idAudio').play();
                var icon = "https://image.flaticon.com/icons/png/512/62/62834.png";
                var titulo = "Timer Finalizado";
                var messagem = "O Tempo de Intervalo chegou ao fim!";
                var link = "http://localhost/Projeto-pomodoro/";
                notifyMe(icon, titulo, messagem, link);
                clearInterval(regressao);
            }
        }, 1000);
    });
});