    <div class="container">
        <div class="card card-login mx-auto mt-5">
            <div class="card-header">Recuperar Senha</div>
            <div class="card-body">
                <div class="text-center mt-4 mb-5">
                    <h4>Esqueceu sua senha?</h4>
                    <h5>Não se preocupe, vamos te ajudar!</h5>
                    <p>Informe o seu e-mail que vamos enviar as intruções para o mesmo para que você possa recuperar a sua senha.</p>
                </div>

                <form>
                    <div class="form-group">
                        <input class="form-control" id="exampleInputEmail1" type="email" aria-describedby="emailHelp" placeholder="Digite o seu email">
                    </div>
                    <a class="btn btn-primary btn-block" href="login.html">Recuperar Senha</a>
                </form>

                <div class="text-center">
                    <a class="d-block small mt-3" href="<?= base_url('cadastro') ?>">Cadastrar</a>
                    <a class="d-block small" href="<?= base_url('login') ?>">Login</a>
                </div>
            </div>
        </div>
    </div>