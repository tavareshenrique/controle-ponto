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
                <h3 class="box-title">Olá, <?= $nome . ' '. $sobrenome?>! Trabalhou muito hoje?</h3>
            </div>
            <form class="form-horizontal" action="<?= base_url('Ponto/doInsertMeses') ?>" method="POST" id="formPonto" name="formPonto">

                <div class="box-body">

                    <div class="form-group col-sm-12 with-border">

                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover" id="tabelaPonto" >
                                <tr>
                                    <th>Data</th>
                                    <th>Horário Inicial</th>
                                    <th>Horário Final</th>
                                </tr>

                                <?php foreach ($ponto as $item):?>
                                    <tr class="dias">
                                        <td>
<!--                                            <label class="col-sm-6 control-label data-dia" id="reservation---><?php //echo substr(date('d/m/Y', strtotime($item['dia'])), 0, 2); ?><!--" name="dataTrabalho" value="--><?php //echo $item['dia'] ?><!--" >--><?php //echo date('d/m/Y', strtotime($item['dia'])); ?><!--</label>-->
                                            <input class="col-sm-6 control-label data-dia" id="reservation-<?php echo substr(date('d/m/Y', strtotime($item['dia'])), 0, 2); ?>" type="hidden" name="dataTrabalho" value="<?php echo $item['dia'] ?>" ><?php echo date('d/m/Y', strtotime($item['dia'])); ?>
                                        </td>
                                        <td>
                                            <div class="col-sm-6 input-group bootstrap-timepicker">
                                                <input type="time" value="<?php echo $horario_inicial ?>" class="form-control" id="hora-inicial-<?php echo $horario_inicial ?>" name="horaInicial[]">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-clock-o"></i>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="col-sm-6 input-group bootstrap-timepicker">
                                                <input type="time" value="<?php echo $horario_final ?>" class="form-control" id="hora-final-<?php echo $horario_final ?>" name="horaFinal[]">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-clock-o"></i>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach;?>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="box-footer">

                    <button type="button" class="btn btn-sab-dom" data-toggle="modal" data-target="#modal-danger">
                    Sabado / Domingo
                    </button>

                    <input id="cadPonto" type="submit" value="Incluir Horários" class="btn btn-success pull-right">
                    <button type="submit" class="btn btn-danger pull-right space-cancel">Cancelar</button>
                </div>
            </form>
        </div>

    </section>
</div>