  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
        <div class="card-body">

          <?php if($sucesso = $this->session->flashdata('sucesso')):?>

            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Sucesso!</h4>
                <?= $sucesso ?>
            </div>

          <?php endif; ?>

          <?php if($invalido = $this->session->flashdata('invalido')):?>

            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> E-mail ou senha inválidos!</h4>
                <?= $invalido ?>
            </div>

          <?php endif; ?>

          <form class="pure-form" action="<?= base_url('Login/logar') ?>" method="POST" >
            <div class="form-group">
              <label for="exampleInputEmail1">Seu e-mail</label>
              <input class="form-control" id="email-login" name="email-login" type="email" aria-describedby="emailHelp" placeholder="E-mail">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Sua senha</label>
              <input class="form-control" id="senha-login" name="senha-login" type="password" placeholder="Senha">
            </div>
            <div class="form-group">
              <div class="form-check">
                <label class="form-check-label">
                <input class="form-check-input" id="lembrar-senha" name="lembrar-senha" type="checkbox"> Lembrar Senha</label>
              </div>
            </div>

            <input type="submit" value="Login" class="btn btn-primary btn-block">

          </form>
          <div class="text-center">
            <a class="d-block small mt-3" href="<?= base_url('Cadastro') ?>">Cadastrar</a>
            <a class="d-block small" href="<?= base_url('Recuperar-Senha') ?>">Esqueceu a Senha?</a>
          </div>
        </div>
    </div>
  </div>