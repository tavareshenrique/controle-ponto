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
                <h3 class="box-title">Defina o filtro de pesquisa.</h3>
            </div>
            <form class="form-horizontal" action="<?= base_url('ConsultarPontos/filtro') ?>" method="POST">

                <div class="box-body">

                    <div class="form-group col-sm-12">

                        <label class="col-sm-2 control-label">Data</label>
                        <div class="input-group col-sm-6">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-right" id="reservation" name="data-trabalho">
                        </div>
                        <input type="submit" value="Filtrar" class="btn btn-primary btn-toright">

                    </div>

                </div>

<!--                <div class="box-footer">-->
<!--                    <input type="submit" value="Filtrar" class="btn btn-primary pull-right">-->
<!--                </div>-->
            </form>
        </div>

    </section>
</div>