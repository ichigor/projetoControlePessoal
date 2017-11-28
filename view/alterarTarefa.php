<?php
/**
 * Created by PhpStorm.
 * User: IgoR
 * Date: 03/10/2017
 * Time: 15:30
 */

require_once "../Controller/templateController.php";
require_once "../DAO/tarefaDAO.php";
require_once "../DAO/membroDAO.php";
$template = new templateController();
$template->template();
$template->menuTarefas();

$membros = listaColaboradoresAtivos();

$idTarefa = $_POST['idTarefa'];
$dado = buscaTarefa($idTarefa);

$date = date_create($dado['dataInicial']);
$dataInicial = date_format($date, "d-m-Y");

$date = date_create($dado['dataFinal']);
$dataFinal = date_format($date, "d-m-Y");

?>

    <div class="col-md-12">
        <h1>Alterar Tarefa</h1>
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title" style="color: #0b93d5"><strong>*Todos os campos são de preenchimento
                        obrigatório</strong></h3>
            </div>
            <br><br>
            <!-- /.box-header -->
            <form class="form-horizontal" action="../Controller/tarefaController.php" method="POST">
                <input type="hidden" value="update" name="funcionalidade">
                <input type="hidden" value="<?= $dado['idTarefa'] ?>" name="idTarefa">
                <div class="box-body">
                    <div class="form-group ">
                        <label for="nomeTarefa" class="col-sm-2 control-label">Nome Tarefa</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="nomeTarefa" placeholder="Nome da Tarefa"
                                   value="<?= $dado['nomeTarefa'] ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Frequencia</label>
                        <div class="col-sm-5">
                            <select name="frequencia" class="form-control" style="width: 100%;">
                                <option value="Diariamente" <?= ($dado['frequencia']=='Diariamente')? 'selected':'' ?>>Diariamente</option>
                                <option value="Mensalmente"<?= ($dado['frequencia']=='Mensalmente')? 'selected':'' ?>>Mensalmente</option>
                                <option value="Eventualmente"<?= ($dado['frequencia']=='Eventualmente')? 'selected':'' ?>>Eventualmente</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Designado</label>
                        <div class="col-sm-5">
                            <select name="designado" class="form-control" style="width: 100%;">
                                <?php foreach ($membros as $membro) : ?>
                                    <option value="<?= $membro['idUsuario'] ?>" <?= ($dado['idUsuario']==$membro['idUsuario'])? 'selected':''?> ><?= $membro['nome'] ?></option>
                                <?php endforeach ?>
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
                                <input type="text" class="form-control pull-right" id="datepicker" name="dataInicial"
                                       value="<?= $dataInicial ?>" required>
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
                                <input type="text" class="form-control pull-right" id="datepicker2" name="dataFinal"
                                       value="<?= $dataFinal ?>" required>

                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Descrição</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" rows="8"
                                      placeholder="Digite a descrição do que precisa ser realizado" name="descricao"
                                      required><?= $dado['descricao'] ?></textarea>
                        </div>
                    </div>

                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="button" onclick="goBack()" class="btn btn-default">Cancelar</button>
                    <button type="submit" class="btn btn-success pull-right">Alterar</button>
                </div>
                <!-- /.box-footer -->
            </form>
        </div>
    </div>
<?php $template->templateF(); ?>