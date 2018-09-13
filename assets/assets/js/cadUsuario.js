let cadUser = document.querySelector("#register");
if (cadUser != null) {
    cadUser.addEventListener("click", function(event){
        event.preventDefault();
        if (validation()) {

            validateEmail(function(resultado){
                if (resultado === '') {
                    swal({
                        title: "Muito Bem!",
                        text: "O seu cadastro foi efetuado com sucesso!",
                        icon: "success",
                    })
                        .then((willDelete) => {
                            if (willDelete) {
                                document.getElementById("form").submit();
                            }
                        });

                }
            });
        }
    });
}

function validateEmail(callback) {

    let emailCadastrado = $("input[name='email-cadastro']").val();
    $.post('CadastroUsuario/doValidateEmail',{emailCadastrado: emailCadastrado},function(data){
        swal("Oops!", data, "error");
        callback(data);
    });
}

function validation() {
    let nome           = document.getElementsByName("nome-cadastro")[0].value;
    let sobrenome      = document.getElementsByName("sobrenome-cadastro")[0].value;
    let email          = document.getElementsByName("email-cadastro")[0].value;
    let confirmarEmail = document.getElementsByName("confirmar-email")[0].value;
    let senha          = document.getElementsByName("senha-cadastro")[0].value;
    let confirmarSenha = document.getElementsByName("confirmar-senha")[0].value;

    if (!validationFields(nome, "Nome")) { return; }
    if (!validationFields(sobrenome, "Sobrenome")) { return; }
    if (!validationFields(email, "E-mail")) { return; }
    if (!validationFields(confirmarEmail, "E-mail de confirmação")) { return; }
    if (!validationFields(senha, "Senha")) { return; }
    if (!validationFields(confirmarSenha, "Senha de confirmação")) { return; }

    if (!equalFieldsCompare(email, confirmarEmail, "e-mail's", "Os ")) { return; }
    if (!equalFieldsCompare(senha, confirmarSenha, "senhas", "As ")) { return; }

    return true;
}

function validationFields(field, text) {
    if (field === '') {
        swal("Oops!", text+" não informado!", "error");
        return false;
    } else {
        return true;
    }
}

function equalFields(field1, field2) {
    if (field1 != field2) {
        return false;
    } else {
        return true;
    }
}

function equalFieldsCompare(field1, field2, field, prefix) {
    if (!equalFields(field1, field2)) {
        swal("Oops!",  prefix+field+" estão diferentes!", "error")
        return false;
    } else {
        return true;
    }
}