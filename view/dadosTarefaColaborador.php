<?php
/**
 * Created by PhpStorm.
 * User: IgoR
 * Date: 19/10/2017
 * Time: 17:35
 */

require_once "../Controller/templateController.php";
require_once "../DAO/tarefaDAO.php";
require_once "../DAO/membroDAO.php";
$template = new templateController();

$template->templateColaborador();
$template->menuTarefasColaborador();


$idTarefa = $_GET['idTarefa'];
$dado = buscaTarefa($idTarefa);
$membro = buscaMembro($dado['idUsuario']);
?>
<div class="col-md-12">
    <h1>Dados da Tarefa</h1>
    <div class="box box-danger">
        <br><br>
        <!-- /.box-header -->
        <form class="form-horizontal" action="../Controller/tarefaController.php" method="POST">

            <input type="hidden" value="<?= $dado['idTarefa'] ?>" name="idTarefa">
            <div class="box-body">
                <div class="form-group ">
                    <label for="nomeTarefa" class="col-sm-2 control-label">Nome Tarefa</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="nomeTarefa" placeholder="Nome da Tarefa"
                               value="<?= $dado['nomeTarefa'] ?>" disabled>
                    </div>
                </div>
                <div class="form-group ">
                    <label for="frequencia" class="col-sm-2 control-label">Frequencia</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="frequencia" placeholder="Frequencia"
                               value="<?= $dado['frequencia'] ?>" disabled>
                    </div>
                </div>
                <div class="form-group ">
                    <label for="designado" class="col-sm-2 control-label">Designado</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="designado" placeholder="Designado"
                               value="<?= $membro['nome'] ?>" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Data Inicial:</label>
                    <div class="col-sm-2">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask
                                   name="dataInicial" value="<?= $dado['dataInicial'] ?>" disabled>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Data Limite:</label>
                    <div class="col-sm-2">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-right" data-inputmask="'alias': 'yyyy/mm/dd'"
                                   data-mask name="dataFinal" value="<?= $dado['dataFinal'] ?>" disabled>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Descrição</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" rows="8"
                                  placeholder="Digite a descrição do que precisa ser realizado" name="descricao"
                                  disabled><?= $dado['descricao'] ?></textarea>
                    </div>
                </div>

            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <a href="listarTarefasColaborador.php" type="button" class="btn btn-default">Voltar</a>
            </div>
            <!-- /.box-footer -->
        </form>
    </div>
</div>
<?php $template->templateFColaborador(); ?>
