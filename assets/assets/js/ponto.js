$(function(){

    let cadPonto = document.querySelector("#cadPonto");
    if (cadPonto != null) {
        cadPonto.addEventListener("click", function(event){
            event.preventDefault();
            swal({
                title: "Parabéns, trabalhador!!",
                text: "Horário de Ponto incluido com sucesso!",
                icon: "success",
            }).then((willDelete) => {
                if (willDelete) {
                    document.getElementById("formPonto").submit();
                }
            });
        });
    }

    let dias = $(".dias");
    dias.each(function() {
        let spam = $(this).find(".data-dia");
        let allSpam = spam[0];
        let getDay = ($(allSpam).attr('value'));

        if ((diaSemana(getDay) == 6) || (diaSemana(getDay) == 0)) {
            ($(allSpam).parent().parent().addClass("sabado-domingo"));
            ($(allSpam).addClass("font-sab-dom"));
        }
    })
});

function diaSemana(dataMes) {
    let diaDate = new Date(dataMes)
    let dia = diaDate.getDay();

    return dia;
}