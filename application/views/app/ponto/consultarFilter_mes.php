<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Ponto
            <small>Incluir Mais de um Ponto</small>
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
                <h3 class="box-title">Olá, <?= $nome . ' '. $sobrenome?>! Selecione o periodo desejado!</h3>
            </div>
            <form class="form-horizontal" action="<?= base_url('Ponto/doIncMes') ?>" method="POST" id="formPonto" name="formPonto">

                <div class="box-body">

                    <div class="form-group col-sm-12">
                        <label class="col-sm-4 control-label">Mes</label>
                        <div class="input-group col-sm-3">
                            <select class="form-control select2" name="mes" style="width: 100%;">
                                <option selected="selected">Janeiro</option>
                                <option>Fevereiro</option>
                                <option>Março</option>
                                <option>Abril</option>
                                <option>Maio</option>
                                <option>Junho</option>
                                <option>Agosto</option>
                                <option>Setembro</option>
                                <option>Outubro</option>
                                <option>Novembro</option>
                                <option>Dezembro</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group col-sm-12">
                        <label class="col-sm-4 control-label">Ano</label>
                        <div class="input-group col-sm-3">
                            <select class="form-control select2" name="ano" style="width: 100%;">
                                <option selected="selected">2018</option>
                                <option>2017</option>
                                <option>2016</option>
                                <option>2015</option>
                            </select>
                        </div>
                    </div>

                <div class="box-footer">
                    <input type="submit" value="Selecionar" class="btn btn-success pull-right">
                </div>
            </form>
        </div>

    </section>
</div>