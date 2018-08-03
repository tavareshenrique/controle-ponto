(function() {
    var valor = $('#almoco').val();
    if (valor == 'Sim') {
        $('#horario-almoco').attr('disabled', false);
    } else {
        $('#horario-almoco').attr('disabled', true);
    }
})();

(function() {
    $("#almoco").on('change', function(e){
        if (($(this).val()) == 'Sim') {
            $('#horario-almoco').attr('disabled', false);
        } else {
            $('#horario-almoco').attr('disabled', true);
        }
    });
})();

(function() {
    $("#celular").mask("(##) # ####-####");
    $("#telefone").mask("(##) ####-####");
})();

(function() {
    if (document.getElementsByName("celular")[0].value == "(") {
        document.getElementsByName("celular")[0].value = "";
    }

    if (document.getElementsByName("telefone")[0].value == "(") {
        document.getElementsByName("telefone")[0].value = "";
    }

})();

function doValidatePhoto(){
    var imgpath=document.getElementById('fotoPerfil');
    if (!imgpath.value==""){
        var img=imgpath.files[0].size;
        var imgsize=img/1024;
        var spam = document.querySelector(".spam-photo");

        doSetMessagePhoto(imgsize.toFixed(2), spam);
    }
}

function doSetMessagePhoto(size, spam) {
    if (size > 2000) {
        spam.textContent = 'Atenção: Selecione uma foto de tamanho no máximo de 2MB.';
        spam.classList.remove("spam-photo-ok");
        spam.classList.add("spam-photo");
    } else {
        if (spam.textContent != '') {
            spam.textContent = 'Foto Permitita!';
            spam.classList.add("spam-photo-ok");
        }
    }
}

(function() {
    let status = document.querySelector(".user-status");
    let user = document.getElementsByClassName("usuario")[0].value;
    if (user != '') {
        status.classList.add("has-success");
    } else {
        status.classList.remove("has-error");
        status.classList.remove("has-success");
    }

})();

$(function(){
    $("input[name='usuario']").blur( function(){

        var nomeUsuario = $("input[name='usuario']").val();

        $.post('Perfil/doValidateUser',{nomeUsuario: nomeUsuario},function(data){
            var status = document.querySelector(".user-status");
            if ((data == "JÃ¡ existe!") || (data == "Já existe!")) {
                status.classList.add("has-error");
            } else {
                status.classList.remove("has-error");
                status.classList.add("has-success");
            }
        });
    });
});

function validationData() {
    let nome                = document.getElementsByName("nome")[0].value;
    let sobrenome           = document.getElementsByName("sobrenome")[0].value;
    let dataNascimento      = document.getElementsByName("dataNascimento")[0].value;
    let celular             = document.getElementsByName("celular")[0].value;

    let cep                 = document.getElementsByName("cep")[0].value;
    let endereco            = document.getElementsByName("endereco")[0].value;
    let cidade              = document.getElementsByName("cidade")[0].value;
    let bairro              = document.getElementsByName("bairro")[0].value;
    let numero              = document.getElementsByName("numero")[0].value;

    let horarioInicial      = document.getElementsByName("horario-inicial")[0].value;
    let horarioFinal        = document.getElementsByName("horario-final")[0].value;
    let possuiHorarioAlmoco = document.getElementsByName("almoco")[0].value;
    let horarioAlmoco       = document.getElementsByName("horario-almoco")[0].value;

    let email               = document.getElementsByName("email")[0].value;
    let usuario             = document.getElementsByName("usuario")[0].value;


    if (!validateFieldsStr(nome, "Nome")) { $('#myTables a[href="#dados"]').tab('show'); return; }
    if (!validateFieldsStr(sobrenome, "Sobrenome")) { $('#myTables a[href="#dados"]').tab('show'); return; }
    if (!validateFieldsStr(dataNascimento, "Data de Nascimento")) { $('#myTables a[href="#dados"]').tab('show'); return; }
    if (!validateFieldsStr(celular, "Celular")) { $('#myTables a[href="#dados"]').tab('show'); return; }
    if (!validateFieldsStr(cep, "CEP")) { $('#myTables a[href="#endereco"]').tab('show'); return; }
    if (!validateFieldsStr(endereco, "Endereço")) { $('#myTables a[href="#endereco"]').tab('show'); return; }
    if (!validateFieldsStr(cidade, "Cidade")) { $('#myTables a[href="#endereco"]').tab('show'); return; }
    if (!validateFieldsStr(bairro, "Bairro")) { $('#myTables a[href="#endereco"]').tab('show'); return; }
    if (!validateFieldsStr(numero, "Número")) { $('#myTables a[href="#endereco"]').tab('show'); return; }
    if (!validateFieldsStr(email, "E-mail")) { $('#myTables a[href="#usuario"]').tab('show'); return; }
    if (!validateFieldsStr(usuario, "Usuário")) { $('#myTables a[href="#usuario"]').tab('show'); return; }


    if (!validateFieldsStr(horarioInicial, "Horário Inicial")) { $('#myTables a[href="#horarios"]').tab('show'); return; }
    if (!validateFieldsStr(horarioFinal, "Horário Final")) { $('#myTables a[href="#horarios"]').tab('show'); return; }

    if (validateTime(possuiHorarioAlmoco)) {
        if (!validateFieldsStr(horarioAlmoco, "Horário de Almoço")) {
            swal("Oops!", "Horário de Almoço não informado!", "error");
            $('#myTables a[href="#horarios"]').tab('show');
            return;
        }
    }

    return true;
};

var cadPerson = document.querySelector("#saveData");
cadPerson.addEventListener("click", function(event){

    event.preventDefault();

    if (validationData()) {
        swal({
            title: "Muito Bem!",
            text: "Dados alterado com sucesso!",
            icon: "success",
        }).then((willDelete) => {
            if (willDelete) {
                document.getElementById("form").submit();
            }
        });
    }
});


//Change Password

function changePass(callback) {

    var changePassword = $("input[name='senha1']").val();
    $.post('Perfil/doChangePassword',{changePassword: changePassword},function(data){
        callback(data);
    });
}

var cadPass = document.querySelector("#changePass");
cadPass.addEventListener("click", function(event){

    event.preventDefault();

    let senha1 = document.getElementsByName("senha1")[0].value;
    let senha2 = document.getElementsByName("senha2")[0].value;

    if ((validateFields(senha1)) && (validateFields(senha2))) {
        if (equalFields(senha1, senha2)) {
            changePass(function(resultado){
                if (resultado == "Senha alterada com sucesso!") {

                    swal({
                        title: "Muito Bem!",
                        text: "Senha alterada com sucesso!",
                        icon: "success",
                        button: "Ok!",
                    });

                    document.getElementsByName("senha1")[0].value = ''
                    document.getElementsByName("senha2")[0].value = '';
                }
            });
        } else {
            swal({
                title: "Oops!",
                text: "As senhas digitadas não são iguais!",
                icon: "error",
                button: "Ok!",
            });
        }
    } else {
        swal({
            title: "Oops!",
            text: "Informe a nova senha!",
            icon: "error",
            button: "Ok!",
        });
    }
});

function validateTime(field) {
    if (field != "Não") {
        return true;
    } else {
        return false;
    }
}

function validateFieldsStr(field, name) {
    if (field != "") {
        return true;
    } else {
        swal("Oops!", name+" não informado!", "error");
        return false;
    }
}

function validateFields(field) {
    if (field != "") {
        return true;
    } else {
        return false;
    }
}

function equalFields(field1, field2) {
    if (field1 == field2) {
        return true;
    } else {
        return false;
    }
}