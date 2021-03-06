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

$template->templateColaborador();
$template->menuTarefasColaborador();

?>
    <div class="col-md-12">
        <h1>Lista de Tarefas</h1>
        <div class="box box-danger">
            <!-- /.box-header -->
            <div class="box-body no-padding">
                <table class="table table-striped">
                    <tr>
                        <th>Nome</th>
                        <th>Status</th>
                        <th>Frequencia</th>
                    </tr>
                    <?php
                    $tarefas = buscaTarefaNaoCanceladaColaborador($_SESSION["usuario_id"]);
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
                                    <a href="dadosTarefaColaborador.php?idTarefa=<?= $tarefa['idTarefa'] ?> "><?= $tarefa['nomeTarefa'] ?></a>
                                </td>
                                <td>
                                    <?= $tarefa['status'] ?>
                                </td>
                                <td>
                                    <?= $tarefa['frequencia'] ?>
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
<?php $template->templateFColaborador(); ?>