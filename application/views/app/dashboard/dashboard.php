<!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Dashboard
                    <small>Home</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Dashboard</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3><?= $yearDashboard ?></h3>

                                <p>Total de Horas feita em <b><?= $year ?></b></p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-android-alarm-clock"></i>
                            </div>
                            <a href="#" class="small-box-footer">Em Breve Mais Informações <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-blue">
                            <div class="inner">
                                <h3><?= $totalMonth ?></h3>

                                <p>Total de Horas a fazer em <b><?= $month ?></b></p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-ios-time"></i>
                            </div>
                            <a href="#" class="small-box-footer">Em Breve Mais Informações <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-green">
                            <div class="inner">
<!--                                <h3>20<sup style="font-size: 20px">h</sup></h3>-->

                                <h3><?= $currentMonth ?></h3>

                                <p>Você fez ate aqui em <b><?= $month ?></b></p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-android-checkmark-circle"></i>
                            </div>
                            <a href="#" class="small-box-footer">Em Breve Mais Informações <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h3><?= $totalPay ?></h3>

                                <p>Total de Horas a pagar em <b><?= $month ?></b></p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-android-sad"></i>
                            </div>
                            <a href="#" class="small-box-footer">Em Breve Mais Informações <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
            </section>
            <!-- /.content -->
        </div>
    </div>