<?php
/**
 * Created by PhpStorm.
 * User: IgoR
 * Date: 03/10/2017
 * Time: 15:31
 */

require_once "../Controller/templateController.php";
require_once "../DAO/tarefaDAO.php";
$template = new templateController();
$template->template();
$template->menuTarefas();

?>
<?php mostraAlerta("success");
mostraAlerta("warning"); ?>
    <div class="col-md-12">
        <h1>Lista de Tarefas</h1>
        <div class="box box-danger">
            <!-- /.box-header -->
            <div class="box-body no-padding">
                <table class="table table-striped">
                    <tr>
                        <th>Nome</th>
                        <th>Alterar</th>
                        <th>Cancelar</th>
                    </tr>
                    <?php
                    $tarefas = buscaTarefaNaoCancelada();
                    if ($tarefas == null) {
                        ?>
                        <td>
                            Você não possui tarefas no momento.
                        </td>
                        <?php
                    } else {
                        foreach ($tarefas as $tarefa) :
                            ?>

                            <tr>
                                <td>
                                    <a href="dadosTarefa.php?idTarefa=<?= $tarefa['idTarefa'] ?> "><?= $tarefa['nomeTarefa'] ?></a>
                                </td>
                                <td>
                                    <form class="" action="alterarTarefa.php" method="post">
                                        <input type="hidden" name="idTarefa" value="<?= $tarefa['idTarefa'] ?>">
                                        <input type="hidden" name="funcionalidade" value="update">
                                        <button class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span>
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <form class="" action="../Controller/tarefaController.php" method="post">
                                        <input type="hidden" name="idTarefa" value="<?= $tarefa['idTarefa'] ?>">
                                        <input type="hidden" name="funcionalidade" value="delete">
                                        <button class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span>
                                        </button>
                                    </form>
                                </td>
                            </tr>

                            <?php
                        endforeach;
                    }
                    ?>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
<?php $template->templateF(); ?>