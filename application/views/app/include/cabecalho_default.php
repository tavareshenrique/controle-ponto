<?php $this->load->view('app/include/header.php'); ?>

<!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href="<?=base_url('assets/adminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css')?>">
<!-- Font Awesome -->
<link rel="stylesheet" href="<?=base_url('assets/adminLTE/bower_components/font-awesome/css/font-awesome.min.css')?>">
<!-- Ionicons -->
<link rel="stylesheet" href="<?=base_url('assets/adminLTE/bower_components/Ionicons/css/ionicons.min.css')?>">
<!-- Theme style -->
<link rel="stylesheet" href="<?=base_url('assets/adminLTE/dist/css/AdminLTE.min.css')?>">
<!-- AdminLTE Skins. Choose a skin from the css/skins
     folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet" href="<?=base_url('assets/adminLTE/dist/css/skins/_all-skins.min.css')?>">
<!-- Morris chart -->
<link rel="stylesheet" href="<?=base_url('assets/adminLTE/bower_components/morris.js/morris.css')?>">
<!-- jvectormap -->
<link rel="stylesheet" href="<?=base_url('assets/adminLTE/bower_components/jvectormap/jquery-jvectormap.css')?>">
<!-- Date Picker -->
<link rel="stylesheet" href="<?=base_url('assets/adminLTE/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')?>">
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="<?=base_url('assets/adminLTE/plugins/iCheck/all.css')?>">
<!-- Bootstrap Color Picker -->
<link rel="stylesheet" href="<?=base_url('assets/adminLTE/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')?>">
<!-- Daterange picker -->
<link rel="stylesheet" href="<?=base_url('assets/adminLTE/bower_components/bootstrap-daterangepicker/daterangepicker.css')?>">

<!-- Bootstrap time Picker -->
<link rel="stylesheet" href="<?=base_url('assets/adminLTE/plugins/timepicker/bootstrap-timepicker.min.css')?>">

<!-- Select2 -->
<link rel="stylesheet" href="<?=base_url('assets/adminLTE/bower_components/select2/dist/css/select2.min.css')?>">

<!-- bootstrap wysihtml5 - text editor -->
<link rel="stylesheet" href="<?=base_url('assets/adminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')?>">

<link rel="stylesheet" href="<?=base_url('assets/assets/css/style.css')?>">

<!--    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />-->

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">




<body class="hold-transition skin-blue sidebar-mini">

    <div class="wrapper">

        <header class="main-header">

            <a href="<?= base_url('Dashboard') ?>" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>C</b>P</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg">Controle de <b>Ponto</b></span>
            </a>

            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
<!--                        <li class="dropdown messages-menu">-->
<!--                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">-->
<!--                                <i class="fa fa-envelope-o"></i>-->
<!--                                <span class="label label-success">4</span>-->
<!--                            </a>-->
<!--                            <ul class="dropdown-menu">-->
<!--                                <li class="header">Você tem 4 mensagens</li>-->
<!--                                <li>-->
<!--                                    <ul class="menu">-->
<!--                                        <li>-->
<!--                                            <a href="#">-->
<!--                                                <div class="pull-left">-->
<!--                                                    <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">-->
<!--                                                </div>-->
<!--                                                <h4>-->
<!--                                                    Support Team-->
<!--                                                    <small><i class="fa fa-clock-o"></i> 5 mins</small>-->
<!--                                                </h4>-->
<!--                                                <p>Why not buy a new awesome theme?</p>-->
<!--                                            </a>-->
<!--                                        </li>-->
<!--                                        <li>-->
<!--                                            <a href="#">-->
<!--                                                <div class="pull-left">-->
<!--                                                    <img src="../../dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">-->
<!--                                                </div>-->
<!--                                                <h4>-->
<!--                                                    AdminLTE Design Team-->
<!--                                                    <small><i class="fa fa-clock-o"></i> 2 hours</small>-->
<!--                                                </h4>-->
<!--                                                <p>Why not buy a new awesome theme?</p>-->
<!--                                            </a>-->
<!--                                        </li>-->
<!--                                        <li>-->
<!--                                            <a href="#">-->
<!--                                                <div class="pull-left">-->
<!--                                                    <img src="../../dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">-->
<!--                                                </div>-->
<!--                                                <h4>-->
<!--                                                    Developers-->
<!--                                                    <small><i class="fa fa-clock-o"></i> Today</small>-->
<!--                                                </h4>-->
<!--                                                <p>Why not buy a new awesome theme?</p>-->
<!--                                            </a>-->
<!--                                        </li>-->
<!--                                        <li>-->
<!--                                            <a href="#">-->
<!--                                                <div class="pull-left">-->
<!--                                                    <img src="../../dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">-->
<!--                                                </div>-->
<!--                                                <h4>-->
<!--                                                    Sales Department-->
<!--                                                    <small><i class="fa fa-clock-o"></i> Yesterday</small>-->
<!--                                                </h4>-->
<!--                                                <p>Why not buy a new awesome theme?</p>-->
<!--                                            </a>-->
<!--                                        </li>-->
<!--                                        <li>-->
<!--                                            <a href="#">-->
<!--                                                <div class="pull-left">-->
<!--                                                    <img src="../../dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">-->
<!--                                                </div>-->
<!--                                                <h4>-->
<!--                                                    Reviewers-->
<!--                                                    <small><i class="fa fa-clock-o"></i> 2 days</small>-->
<!--                                                </h4>-->
<!--                                                <p>Why not buy a new awesome theme?</p>-->
<!--                                            </a>-->
<!--                                        </li>-->
<!--                                    </ul>-->
<!--                                </li>-->
<!--                                <li class="footer"><a href="#">See All Messages</a></li>-->
<!--                            </ul>-->
<!--                        </li>-->
                        <!-- Notifications: style can be found in dropdown.less -->
<!--                        <li class="dropdown notifications-menu">-->
<!--                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">-->
<!--                                <i class="fa fa-bell-o"></i>-->
<!--                                <span class="label label-warning">10</span>-->
<!--                            </a>-->
<!--                            <ul class="dropdown-menu">-->
<!--                                <li class="header">You have 10 notifications</li>-->
<!--                                <li>-->
<!--                                    <ul class="menu">-->
<!--                                        <li>-->
<!--                                            <a href="#">-->
<!--                                                <i class="fa fa-users text-aqua"></i> 5 new members joined today-->
<!--                                            </a>-->
<!--                                        </li>-->
<!--                                        <li>-->
<!--                                            <a href="#">-->
<!--                                                <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the-->
<!--                                                page and may cause design problems-->
<!--                                            </a>-->
<!--                                        </li>-->
<!--                                        <li>-->
<!--                                            <a href="#">-->
<!--                                                <i class="fa fa-users text-red"></i> 5 new members joined-->
<!--                                            </a>-->
<!--                                        </li>-->
<!--                                        <li>-->
<!--                                            <a href="#">-->
<!--                                                <i class="fa fa-shopping-cart text-green"></i> 25 sales made-->
<!--                                            </a>-->
<!--                                        </li>-->
<!--                                        <li>-->
<!--                                            <a href="#">-->
<!--                                                <i class="fa fa-user text-red"></i> You changed your username-->
<!--                                            </a>-->
<!--                                        </li>-->
<!--                                    </ul>-->
<!--                                </li>-->
<!--                                <li class="footer"><a href="#">View all</a></li>-->
<!--                            </ul>-->
<!--                        </li>-->
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?= $foto ?>" class="user-image " alt="User Image">
                                <span class="hidden-xs"><?= $nome . ' ' .$sobrenome?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="user-header">
                                    <img src="<?= $foto ?>" class="img-circle" alt="User Image">
                                    <p>
                                        <?php if (empty($profissao)) : ?>
                                            <?= $nome . ' ' .$sobrenome; ?>
                                        <?php else : ?>
                                            <?= $nome . ' ' .$sobrenome . ' - ' . $profissao; ?>
                                        <?php endif; ?>
                                        <small>Membro desde <?php echo date('d/m/Y', strtotime($data_cadastro)); ?></small> <!--Maio de 2018-->
                                    </p>    '
                                </li>
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="<?= base_url('Perfil') ?>" class="btn btn-default btn-flat">Perfil</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?= base_url('Sair') ?>" class="btn btn-default btn-flat">Sair</a>
                                    </div>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </nav>

        </header>

        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="<?= $foto ?>" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p><?= $nome ?></p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
<!--                <form action="#" method="get" class="sidebar-form">-->
<!--                    <div class="input-group">-->
<!--                        <input type="text" name="q" class="form-control" placeholder="Search...">-->
<!--                        <span class="input-group-btn">-->
<!--                            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>-->
<!--                        </span>-->
<!--                    </div>-->
<!--                </form>-->
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MENU</li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-edit"></i> <span>Meus Horários</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?= base_url('horarios/incluir/ponto') ?>"><i class="fa fa-circle-o"></i> Incluir Horário</a></li>
                            <li><a href="<?= base_url('horarios/incluir/pontos') ?>"><i class="fa fa-circle-o"></i> Incluir Mais de um Horário</a></li>
                            <li><a href="<?= base_url('horarios/consultar/pontos') ?>"><i class="fa fa-circle-o"></i> Consultar Horários</a></li>
                        </ul>
                    </li>
                </ul>
            </section>
        </aside>