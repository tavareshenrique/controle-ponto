<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Ponto
            <small>Definir Horario</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Horários</a></li>
            <li class="active">Ponto</li>
        </ol>
    </section>

    <section class="content">

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Defina o seu horario padrao</h3>
            </div>
            <form class="form-horizontal" action="<?= base_url('perfil') ?>" method="POST">

                <div class="box-body">

                    <label class="control-label col-sm-8">Voce ainda nao definiu o seu horario de trabalho, por favor, defina o seu horario!</label>
                    <div class="form-group col-sm-3">
                        <input type="submit" value="Definir Horario" class="btn btn-success">
                    </div>

                </div>

            </form>
        </div>

    </section>
</div>