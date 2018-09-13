(function() {

    let dataAtual = new Date();

    let vhora = dataAtual.getHours();
    let vminuto = dataAtual.getMinutes();
    let vsegundo = dataAtual.getSeconds();

    let vdia = dataAtual.getDate();
    let vmes = dataAtual.getMonth() + 1;

    let horaFormatada = retornaHora(vdia, vmes, vhora, vminuto, vsegundo);

    if (document.getElementById('hora-inicial') != null) {
        document.getElementById("hora-inicial").innerHTML = horaFormatada;
    }

    if (document.getElementById('hora-final') != null) {
        document.getElementById("hora-final").innerHTML = horaFormatada;
    }

})();

function retornaHora(dia, mes, hora, minuto, segundo) {

    if (dia < 10){ dia = "0" + dia;}
    if (mes < 10){ mes = "0" + mes;}
    if (hora < 10){ hora = "0" + hora;}
    if (minuto < 10){ minuto = "0" + minuto;}
    if (segundo < 10){ segundo = "0" + segundo;}

    let horaFormat = hora + " : " + minuto + " : " + segundo;

    return horaFormat;

}