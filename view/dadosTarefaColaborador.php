<?php
/**
 * Created by PhpStorm.
 * User: IgoR
 * Date: 19/10/2017
 * Time: 17:35
 */

require_once "../Controller/templateController.php";

$template = new templateController();

$template ->templateColaborador();
require_once "../DAO/tarefaDAO.php";

$idTarefa=$_GET['idTarefa'];
$dado = buscaTarefa($conexao, $idTarefa);
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
                        <input type="text" class="form-control" name="nomeTarefa" placeholder="Nome da Tarefa" value="<?= $dado['nomeTarefa'] ?>" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Frequencia</label>
                    <div class="col-sm-2">
                        <select name="frequencia" class="form-control"  style="width: 100%;" disabled>
                            <option value="Diariamente" selected="selected">Diariamente</option>
                            <option value="Mensamente">Mensalmente</option>
                            <option value="Eventualmente">Eventualmente</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Designado</label>
                    <div class="col-sm-2">
                        <select name="designado" class="form-control" style="width: 100%;" disabled>
                            <option value="Colaborador0" selected="selected">Colaborador0</option>
                            <option value="Colaborador1">Colaborador1</option>
                            <option value="Colaborador2">Colaborador2</option>
                            <option value="Colaborador3">Colaborador3</option>
                            <option value="Colaborador4">Colaborador4</option>
                            <option value="Colaborador5">Colaborador5</option>
                            <option value="Colaborador6">Colaborador6</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Data Inicial:</label>
                    <div class="col-sm-2">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask name="dataInicial" value="<?= $dado['dataInicial'] ?>" disabled>
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
                            <input type="text" class="form-control pull-right" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask name="dataFinal" value="<?= $dado['dataFinal'] ?>" disabled>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Descrição</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" rows="8" placeholder="Digite a descrição do que precisa ser realizado" name="descricao" disabled><?= $dado['descricao'] ?></textarea>
                    </div>
                </div>

            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="button" onclick="goBack()" class="btn btn-default">Voltar</button>
            </div>
            <!-- /.box-footer -->
        </form>
    </div>
</div>
<?php $template->templateF(); ?>
