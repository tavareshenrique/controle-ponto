<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Consulta de Pontos
<!--            <small>advanced tables</small>-->
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Data tables</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Filtro de: <?php echo date('d/m/Y', strtotime($data_filtro_inicial));; ?> até <?php echo date('d/m/Y', strtotime($data_filtro_final)); ?></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Data Inicial</th>
                                <th>Data Final</th>
                                <th>Horário Inicial</th>
                                <th>Horário Final</th>
                                <th>Horário Almoço</th>
                                <th>Total de Horas Trabalhada</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php foreach ($dadosPessoa as $dados):?>
                                <tr class="dias">
                                    <td>
                                        <label class="col-sm-6 control-label data-dia" id="reservation-<?php echo substr(date('d/m/Y', strtotime($dados['data_inicial'])), 0, 2); ?>" name="data-trabalho" ><?php echo date('d/m/Y', strtotime($dados['data_inicial'])); ?></label>
                                    </td>
                                    <td>
                                        <label class="col-sm-6 control-label data-dia" id="reservation-<?php echo substr(date('d/m/Y', strtotime($dados['data_final'])), 0, 2); ?>" name="data-trabalho" ><?php echo date('d/m/Y', strtotime($dados['data_final'])); ?></label>
                                    </td>
                                    <td>
                                        <label class="col-sm-6 control-label data-dia" id="reservation-<?php echo $dados['horario_inicial']; ?>" name="data-trabalho" ><?php echo $dados['horario_inicial'] ?></label>
                                    </td>
                                    <td>
                                        <label class="col-sm-6 control-label data-dia" id="reservation-<?php echo $dados['horario_final']; ?>" name="data-trabalho" ><?php echo $dados['horario_final']; ?></label>
                                    </td>
                                    <td>
                                        <label class="col-sm-6 control-label data-dia" id="reservation-<?php echo $dados['almoco']; ?>" name="data-trabalho" ><?php echo $dados['almoco']; ?></label>
                                    </td>
                                    <td>
                                        <label class="col-sm-6 control-label data-dia" id="reservation-<?php echo $dados['Total']; ?>" name="data-trabalho" ><?php echo $dados['Total']; ?></label>
                                    </td>
                                </tr>
                            <?php endforeach;?>

                            </tbody>
                            <tfoot>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th>Horário Total</th>
                                <th><?php echo $total ?></th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->


                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>