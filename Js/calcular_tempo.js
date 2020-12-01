function contar_tempo(a){
    if(a!=-1){
        var dur = a;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("POST","../Timer/inicia_tempo.php",false);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        var dados = 'duracao=' + dur;
        xmlhttp.send(dados);
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("POST","../Timer/inicia_tempo.php",false);
        xmlhttp.send();
        var dur = xmlhttp.responseText;
    }
    if(dur != -1 || dur!="-1"){
        regressao = setInterval(function() {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.open("GET","../Timer/calcula_tempo.php",false);
            xmlhttp.send(null);
            document.getElementById("temp").innerHTML=xmlhttp.responseText;
            var aux = ""+xmlhttp.responseText;

            if(aux == '00:00'){
                document.getElementById('idAudio').play();

                if(dur == 25 || dur == "25"){
                    var messagem = "O Tempo de trabalho chegou ao fim!";
                    alert("trab");
                    xmlhttp.open("POST","../Timer/conta_pomodoros.php",false);
                    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    var dado = 'count=' + 1;
                    xmlhttp.send(dado);

                    document.getElementById("qtdPomodoro").innerHTML=("Foram feitos " + xmlhttp.responseText + " pomodoro(s)");
                } else {
                    var messagem = "O Tempo de intervalo chegou ao fim!"; 
                }
                var icon = "https://image.flaticon.com/icons/png/512/62/62834.png";
                var titulo = "Timer Finalizado";
                
                var link = "http://localhost/Projeto-pomodoro/";
                notifyMe(icon, titulo, messagem, link);
                
                clearInterval(regressao);
            }
        }, 1000);
    }
};

$(document).ready(function(){

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET","../Timer/conta_pomodoros.php",false);
    xmlhttp.send(null);
    document.getElementById("qtdPomodoro").innerHTML=("Foram feitos " + xmlhttp.responseText + " pomodoro(s)");

    var aux = -1;
    contar_tempo(aux);
})