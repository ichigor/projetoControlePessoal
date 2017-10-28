<?php
/**
 * Created by PhpStorm.
 * User: IgoR
 * Date: 03/10/2017
 * Time: 15:30
 */

require_once "../Controller/templateController.php";
$template = new templateController();
$template->template();
?>

    <div class="col-md-12">
        <h1>Cadastrar Tarefa</h1>
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title" style="color: #0b93d5"><strong>*Todos os campos são de preenchimento obrigatório</strong></h3>
            </div>
            <br><br>
            <!-- /.box-header -->
            <!-- form start  ALTERAR PARA ENVIAR PARA O CONTROLLER-->
            <form class="form-horizontal" action="../Controller/tarefaController.php" method="POST">
                <input type="hidden" value="create" name="funcionalidade">
                <div class="box-body">
                    <div class="form-group ">
                        <label for="nomeTarefa" class="col-sm-2 control-label">Nome Tarefa</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="nomeTarefa" placeholder="Nome da Tarefa" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Frequencia</label>
                        <div class="col-sm-2">
                            <select name="frequencia" class="form-control"  style="width: 100%;">
                                <option value="Diariamente" selected="selected">Diariamente</option>
                                <option value="Mensamente">Mensalmente</option>
                                <option value="Eventualmente">Eventualmente</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Designado</label>
                        <div class="col-sm-2">
                            <select name="designado" class="form-control" style="width: 100%;">
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
                                <input type="text" class="form-control" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask name="dataInicial" required>
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
                                <input type="text" class="form-control pull-right" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask name="dataFinal" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Descrição</label>
                        <div class="col-sm-8">
                        <textarea class="form-control" rows="8" placeholder="Digite a descrição do que precisa ser realizado" name="descricao" required></textarea>
                        </div>
                    </div>

                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="button" onclick="goBack()" class="btn btn-default">Cancelar</button>
                    <button type="submit" class="btn btn-success pull-right">Cadastrar</button>
                </div>
                <!-- /.box-footer -->
            </form>
        </div>
    </div>
<?php $template->templateF(); ?>