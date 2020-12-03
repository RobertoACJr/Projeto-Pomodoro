var conta_pomo;
var regressao;
function contar_tempo(tempo, tipo){
    clearInterval(regressao);
    //caso o tipo não seja C, que indica que a pag foi recarregada
    if(tipo!='c'){

        //pegando o valor do input de tempo
        inputTempo = document.getElementById("inputTempo");
        tempoInput = parseInt(inputTempo.value);

        //caso o tipo seja A e o input não esteja vazio, a var dur
        //será setada com o valor do input e o input será limpo.
        if (tipo == 'a' && !isNaN(tempoInput)) {
            
            dur = tempoInput;
            inputTempo.value = '';

        //caso seja do tipo B ou o imput esteja vazio, a var dur
        //será setada com o tempo que vem por parâmetro
        } else if(tipo == 'b' || isNaN(tempoInput)){
            
            var dur = tempo;

        }
        
        //será enviado o tempo de duração e o tipo para o arq inicia_tempo.php
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("POST","../Timer/inicia_tempo.php",false);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        var dados = 'duracao=' + dur + "&tipo=" + tipo;
        xmlhttp.send(dados);

        tempo_timer(tipo);

    //se a pag foi recarregada, será tipo C
    } else {

        //nenhum parâmetro será enviado para o arquivo inicia_tempo.php
        //o que será usado para diferenciar os tipos
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("POST","../Timer/inicia_tempo.php",false);
        xmlhttp.send();
        //a var dur receberá o tipo
        var dur = xmlhttp.responseText;

        tempo_timer(dur);
    }
}

function tempo_timer(tipo){
    //se tipo=='d' significa que o timer já foi finalizado
    if(tipo != 'd'){

        //o setInterval irá repetir até o timer chegar a 00:00
        regressao = setInterval(function() {
            
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.open("GET","../Timer/calcula_tempo.php",false);
            xmlhttp.send(null);
            document.getElementById("temp").innerHTML=xmlhttp.responseText;
            var aux = xmlhttp.responseText;

            if(aux == '00:00'){
                document.getElementById('idAudio').play();

                if(tipo =='b'){

                    var message = "O Tempo de intervalo chegou ao fim!";
                    esconderBotao();

                } else if (tipo =='a'){
    
                    var message = "O Tempo de trabalho chegou ao fim!";
                    
                    //caso seja do tipo 'a' é necessário incrementar o contador
                    xmlhttp.open("POST","../Timer/conta_pomodoros.php",false);
                    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    var dado = 'count=' + 1;
                    xmlhttp.send(dado);

                    conta_pomo = xmlhttp.responseText; 

                    document.getElementById("qtdPomodoro").innerHTML=("Foram feitos " + conta_pomo + " pomodoro(s) hoje");
                
                    if (conta_pomo%4 == 0 && conta_pomo!=0) {
                        mostrarBotao();
                    } else {
                        esconderBotao();
                    }
                }

                
                var icon = "../imagens/icon.png";
                var title = "Timer Finalizado";
                var link = window.location.href;
                notifyMe(icon, title, message, link);

                //aqui em tese, encerra o regressao
                clearInterval(regressao);

            } else if(aux == "finalizar"){

                document.getElementById("temp").innerHTML=("25:00");
                clearInterval(regressao);

            }
        }, 1000);
    }
}

$(document).ready(function(){
    //quando a pag for recarregada, será verificado se há um timer em execução
    //e a quantidade de pomodoros que foram feitos
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET","../Timer/conta_pomodoros.php",false);
    xmlhttp.send(null);
    document.getElementById("qtdPomodoro").innerHTML=("Foram feitos " + xmlhttp.responseText + " pomodoro(s) hoje");
    
    if (xmlhttp.responseText%4 == 0 && xmlhttp.responseText!=0) {
        mostrarBotao();
    } else {
        esconderBotao();
    }

    var aux = -1;
    contar_tempo(aux, 'c');

    
});

function mostrarBotao(){
    
    btnIntervalo = document.getElementById("btnInt10");
    if(btnIntervalo.hasAttribute('hidden')){
        btnIntervalo.removeAttribute("hidden"); 
    }
    
}

function esconderBotao(){

    btnIntervalo = document.getElementById("btnInt10");
    if(!btnIntervalo.hasAttribute('hidden')){
        btnIntervalo.setAttribute("hidden", '');
    }
}