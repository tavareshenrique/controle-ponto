    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Ponto
                <small>Incluir Ponto</small>
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
                    <h3 class="box-title">Olá, <?= $nome . ' '. $sobrenome?>! Trabalhou muito hoje?</h3>
                </div>
                <form class="form-horizontal" action="<?= base_url('Ponto/doInsert') ?>" method="POST" id="formPonto" name="formPonto">

                    <div class="box-body">

                        <div class="form-group col-sm-12">

                            <label class="col-sm-2 control-label">Data</label>
                            <div class="input-group col-sm-6">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control pull-right" id="reservation" name="data-trabalho">
                            </div>

                        </div>

                        <div class="form-group col-sm-12">

                            <label for="inputEmail3" class="col-sm-2 control-label">Hora Inicial</label>
                            <div class="col-sm-2 input-group bootstrap-timepicker">
                                <input type="text" class="form-control timepicker" id="hora-inicial" name="hora-inicial">
                                <div class="input-group-addon">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                            </div>

                            <label for="inputEmail3" class="col-sm-2 control-label">Hora Final</label>
                            <div class="col-sm-2 input-group bootstrap-timepicker">
                                <input type="text" class="form-control timepicker" id="hora-final" name="hora-final">
                                <div class="input-group-addon">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="box-footer">
                        <input id="cadPonto" type="submit" value="Incluir Horário" class="btn btn-success pull-right">
                        <button type="submit" class="btn btn-danger pull-right space-cancel">Cancelar</button>
                    </div>
                </form>
            </div>

        </section>
    </div>