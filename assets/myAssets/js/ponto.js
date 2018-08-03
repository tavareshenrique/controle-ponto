var cadPonto = document.querySelector("#cadPonto");
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

// (function() {
//
//     let dias = document.querySelectorAll(".dias");
//
//     for (let i = 0; i < dias.length-1 ; i++) {
//
//         let getDay = dias[i];
//
//         let tdDia = getDay.querySelector(".data-dia");
//         let dia = tdDia.textContent;
//
//         if ((diaSemana(dia) == 6) || (diaSemana(dia) == 0)) {
//
//             // getDay.style.backgroundColor = "lightcoral";
//             getDay.classList.add("sabado-domingo");
//
//         }
//     }
// })();
//
//
// function diaSemana(dataMes) {
//     let diaDate = new Date(dataMes)
//     let dia = diaDate.getDay();
//
//     return dia;
//
// }