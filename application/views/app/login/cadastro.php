    <div class="container">
        <div class="card card-register mx-auto mt-5">
            <div class="card-header">Cadastro</div>
                <div class="card-body">

<!--                    --><?php //if($error = $this->session->flashdata('email_existe')):?>
<!---->
<!--                    <div class="alert alert-warning alert-dismissible">-->
<!--                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>-->
<!--                        <h4><i class="icon fa fa-ban"></i> Atenção!</h4>-->
<!--                        --><?//= $error ?>
<!--                    </div>-->
<!---->
<!--                    --><?php //endif; ?>

                    <form class="pure-form" action="<?= base_url('CadastroUsuario/doInsert') ?>" method="POST" id="form" name="form">

                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label for="exampleInputName">Nome</label>
                                    <input class="form-control" id="nome-cadastro" name="nome-cadastro" type="text" aria-describedby="nameHelp" placeholder="Nome" autofocus required="" oninvalid="this.setCustomValidity('Por favor, informe o nome!')" oninput="setCustomValidity('')">
                                    <!--value="<?= set_value('nome-cadastro') ?>"-->
                                </div>

                                <div class="col-md-6">
                                    <label for="exampleInputLastName">Sobrenome</label>
                                    <input class="form-control" id="sobrenome-cadastro" name="sobrenome-cadastro" type="text" aria-describedby="nameHelp" placeholder="Sobrenome" required="" oninvalid="this.setCustomValidity('Por favor, informe o sobrenome!')" oninput="setCustomValidity('')">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="form-row">
                                <div class="col-md-6">
                                    <label for="exampleInputEmail1">E-mail</label>
                                    <input class="form-control" id="email-cadastro" name="email-cadastro" type="email" aria-describedby="emailHelp" placeholder="E-mail" required"
                                           value="<?php if (isset($email)) { echo $email; } ?>">
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Confirme o E-mail</label>
                                        <input class="form-control" id="confirmar-email" name="confirmar-email" type="email" aria-describedby="emailHelp" placeholder="E-mail" required">
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label for="exampleInputPassword1">Senha</label>
                                    <input class="form-control" id="senha-cadastro" name="senha-cadastro" type="password" placeholder="Senha" maxlength="16" required">
                                </div>

                                <div class="col-md-6">
                                    <label for="exampleConfirmPassword">Confirme a Senha</label>
                                    <input class="form-control" id="confirmar-senha" name="confirmar-senha" type="password" placeholder="Confirmar Senha" maxlength="16" required">
                                </div>
                            </div>
                        </div>

                        <input id="register" type="submit" value="Cadastrar" class="btn btn-primary btn-block">

                    </form>
                        <div class="text-center">
                            <a class="d-block small mt-3" href="<?= base_url('login') ?>">Login</a>
                            <a class="d-block small" href="<?= base_url('recuperar_senha') ?>">Esqueceu a Senha?</a>
                        </div>
                </div>
        </div>
    </div>