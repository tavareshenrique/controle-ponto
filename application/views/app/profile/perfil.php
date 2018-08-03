<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Perfil
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Perfil</li>
        </ol>
    </section>

    <section class="content">

        <div class="row">

            <form class="form-horizontal" enctype="multipart/form-data" action="<?= base_url('Perfil/doInsert') ?>" method="POST" name="form" id="form">

                <div class="col-md-3">
                    <div class="box box-primary">
                        <div class="box-body box-profile">
                            <img class="profile-user-img img-responsive img-circle" src="<?= $foto ?>"  height="100" width="1500" alt="Imagem de Perfil">

                            <h3 class="profile-username text-center"><?= $nome . ' ' . $sobrenome ?></h3>

                            <p class="text-muted text-center"><?= $profissao ?></p>

                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item">
                                    <b>Membro desde</b> <a class="pull-right"> <?php echo date('d/m/Y', strtotime($data_cadastro)); ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Horas em <?= $year ?></b> <a class="pull-right"><?= $totalYear ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Total de Horas</b> <a class="pull-right"><?= $totalHour ?></a>
                                </li>
                            </ul>

                            <input id="saveData" type="submit" value="Salvar Dados" class="btn btn-success btn-block">
    <!--                        <a href="#" class="btn btn-success btn-block"><b>Salvar Dados</b></a>-->
                        </div>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs" id="myTables">
                            <li class="active"><a href="#dados" data-toggle="tab">Dados Pessoais</a></li>
                            <li><a href="#endereco" data-toggle="tab">Endereço</a></li>
                            <li><a href="#horarios" data-toggle="tab">Horários</a></li>
                            <li><a href="#usuario" data-toggle="tab">Dados do Usuário</a></li>
                        </ul>
                        <div class="tab-content">

                            <div class="active tab-pane" id="dados">
                                <div class="form-horizontal">
                                    <div class="form-group">
                                        <label for="inputEmail" class="col-sm-2 control-label">Nome</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" value="<?= $nome ?>" id="nome" name="nome" placeholder="Nome">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputName" class="col-sm-2 control-label">Sobrenome</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" value="<?= $sobrenome ?>" id="sobrenome" name="sobrenome" placeholder="Sobrenome">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputName" class="col-sm-2 control-label">Profissão</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" value="<?= $profissao ?>" id="profissao" name="profissao" placeholder="Profissão">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputName" class="col-sm-2 control-label">Empresa</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" value="<?= $empresa ?>" id="empresa" name="empresa" placeholder="Empresa">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputName" class="col-sm-2 control-label">Data de Nascimento</label>
                                        <div class="col-sm-4 dtnasci-size">
                                            <input type="date" class="form-control" value="<?= $data_nascimento ?>" id="dataNascimento" name="dataNascimento">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputName" class="col-sm-2 control-label">Foto de Perfil</label>
                                        <div class="col-sm-6">
                                            <input type="file" name="fotoPerfil" id="fotoPerfil" onchange="return doValidatePhoto();" accept="image/x-png,image/gif,image/jpeg" />
                                            <spam class="spam-photo" id="photo-size" name="photo-size"></spam>


<!--                                            --><?php //if($error = $this->session->flashdata('photo_size')):?>
<!---->
<!--                                                <div class="alert alert-warning alert-dismissible">-->
<!--                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>-->
<!--                                                    <h4><i class="icon fa fa-ban"></i> Atenção!</h4>-->
<!--                                                    --><?//= $error ?>
<!--                                                </div>-->
<!---->
<!--                                            --><?php //endif; ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputName" class="col-sm-2 control-label">Celular</label>
                                        <div class="col-sm-3 celtel-size ">
                                            <input type="text" class="form-control" value="<?= $celular ?>" id="celular" name="celular" maxlength="16" placeholder="(XX) 90000-0000">
                                        </div>

        <!--                                    <label for="inputName" class="col-sm-2 control-label">Telefone</label>-->
        <!--                                    <div class="col-sm-3 celtel-size">-->
        <!--                                        <input type="email" class="form-control" value="--><?//= $telefone ?><!--" id="telefone" name="telefone" placeholder="(XX) 0000-0000">-->
        <!--                                    </div>-->
                                    </div>

                                    <div class="form-group">
                                        <label for="inputName" class="col-sm-2 control-label">Telefone</label>
                                        <div class="col-sm-3 celtel-size">
<!--                                            onkeydown="mascaraTel(this)" onkeyup="mascaraTel(this)"-->
                                            <input type="text" class="form-control" value="<?= $telefone ?>" id="telefone" name="telefone" maxlength="14" placeholder="(XX) 0000-0000">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="endereco">
                                <div class="form-horizontal">
                                    <div class="form-group">
                                        <label for="inputName" class="col-sm-1 control-label">CEP</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" value="<?= $cep ?>" id="cep" name="cep" placeholder="00000-000">
                                        </div>

                                        <label for="inputName" class="col-sm-1 control-label">Endereço</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" value="<?= $endereco ?>" id="endereco" name="endereco" placeholder="Endereço">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputName" class="col-sm-1 control-label">Cidade</label>
                                        <div class="col-sm-5">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <select class="form-control select2" id="cidade" name="cidade" style="width: 100%;">

                                                        <option value="'<?= $cidade ?>'" selected="selected"><?= $cidade ?></option>
                                                        <?php

                                                            foreach($todas_cidades as $row)  {
                                                                echo '<option value="'.$row->cidade.'">'.$row->cidade.'</option>';
                                                            }

                                                         ?>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <label for="inputName" class="col-sm-1 control-label">Bairro</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" value="<?= $bairro ?>" id="bairro" name="bairro" placeholder="Bairro">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputName" class="col-sm-1 control-label">Número</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" value="<?= $numero ?>" id="numero" name="numero" placeholder="Número">
                                        </div>

                                        <label for="inputName" class="col-sm-2 control-label">Complemento</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" value="<?= $complemento ?>" id="complemento" name="complemento" placeholder="Complemento">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="horarios">
                                <div class="form-horizontal">
                                    <div class="form-group">
                                        <label for="inputName" class="col-sm-6 control-label">Que horas você começa a trabalhar?</label>
                                        <div class="col-sm-3 horario-inicial-w">
                                            <input type="time" class="form-control" value="<?= $horario_inicial ?>" id="horario-inicial" name="horario-inicial">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputName" class="col-sm-6 control-label">Que horas você sai do trabalho?</label>
                                        <div class="col-sm-3 horario-final-w">
                                            <input type="time" class="form-control" value="<?= $horario_final ?>" id="horario-final" name="horario-final">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputName" class="col-sm-6 control-label">Você possui horário de almoço?</label>
                                        <div class="col-sm-4">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <select class="form-control select2" name="almoco" id="almoco" style="width: 100%;">

                                                        <?php
                                                            $possui = $possui_horario_almoco == 'Sim' ? 'Não' : 'Sim';
                                                            echo '<option value="'.$possui_horario_almoco.'">'.$possui_horario_almoco.'</option>';
                                                            echo '<option value="'.$possui.'">'.$possui.'</option>';
                                                        ?>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 horario-almoco-w">
                                                <input type="time" class="form-control" value="<?= $horario_almoco ?>" id="horario-almoco" name="horario-almoco">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                    <label for="inputName" class="col-sm-6 control-label">Você Trabalha Sábado?</label>
                                        <div class="col-sm-4">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <select class="form-control select2" id="sabado" name="sabado" style="width: 100%;">
                                                        <?php
                                                            $trabalha = $sabado == 'Sim' ? 'Não' : 'Sim';
                                                            echo '<option value="'.$sabado.'">'.$sabado.'</option>';
                                                            echo '<option value="'.$trabalha.'">'.$trabalha.'</option>';
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputName" class="col-sm-6 control-label">Você Trabalha Domingo?</label>
                                        <div class="col-sm-4">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <select class="form-control select2" id="domingo" name="domingo" style="width: 100%;">
                                                        <?php
                                                            $trabalha = $domingo == 'Sim' ? 'Não' : 'Sim';
                                                            echo '<option value="'.$domingo.'">'.$domingo.'</option>';
                                                            echo '<option value="'.$trabalha.'">'.$trabalha.'</option>';
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="usuario">
                                <div class="form-horizontal">
                                    <div class="form-group">
                                        <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                                        <div class="col-sm-4">
                                            <input type="email" class="form-control" value="<?= $email ?>" id="email" name="email" placeholder="Email">
                                        </div>
                                    </div>

                                    <div class="form-group user-status" >
                                        <label for="inputName" class="col-sm-2 control-label">Usuário</label>
                                        <div class="col-sm-4">
                                            <div class="input-group" id="user-get" name="user-get">
                                                    <span class="input-group-addon">@</span>
                                                    <input type="text" class="form-control usuario" value="<?= $usuario ?>" id="usuario" name="usuario"  placeholder="Usuário">
                                            </div>
                                        </div>
                                    </div>

                                    <form class="form-horizontal"  enctype="multipart/form-data" action="<?= base_url('Perfil/doChangePassword') ?>" method="POST" name="formPass" id="formPass">

                                        <div class="form-group">
                                            <label for="inputName" class="col-sm-2 control-label">Nova Senha</label>
                                            <div class="col-sm-3 size-senha">
                                                <input type="password" class="form-control" id="senha1" name="senha1" placeholder="Nova Senha">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="inputName" class="col-sm-2 control-label">Repita a Senha</label>
                                            <div class="col-sm-4">
                                                <div class="col-md-9">
                                                    <div class="form-group">
                                                        <input type="password" class="form-control" id="senha2" name="senha2" placeholder="Repita Senha">
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
<!--                                                    <a href="#" class="btn btn-success btn-myright"><b>Salvar Senha</b></a>-->
                                                    <input  id="changePass" type="submit" value="Salvar Senha" class="btn btn-success btn-myright">
                                                </div>
                                            </div>
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>