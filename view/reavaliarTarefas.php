<?php
/**
 * Created by PhpStorm.
 * User: IgoR
 * Date: 28/10/2017
 * Time: 10:46
 */


require_once "../Controller/templateController.php";

$template = new templateController();

$template->template();
$template->menuTarefas();
require_once "../DAO/tarefaDAO.php";
?>
<?php mostraAlerta("success"); ?>
<div class="col-md-12">
    <h1>Tarefas Avaliadas</h1>
    <div class="box box-danger">

        <!-- /.box-header -->
        <div class="box-body no-padding">
            <table class="table table-striped">
                <tr>
                    <th>Nome</th>
                    <th>Status</th>
                    <th>Reavaliar tarefa</th>


                </tr>
                <?php
                $tarefas = buscaTarefasAvaliadas($conexao);
                foreach ($tarefas as $tarefa) :
                    ?>

                    <tr>
                        <td>
                            <a href="dadosTarefa.php?idTarefa=<?= $tarefa['idTarefa'] ?> "><?= $tarefa['nomeTarefa'] ?></a>
                        </td>
                        <td>
                            <?= $tarefa['status'] ?>
                        </td>
                        <td>
                            <form class="" action="../Controller/tarefaController.php" method="post">
                                <input type="hidden" name="idTarefa" value="<?=$tarefa['idTarefa']?>">
                                <input type="hidden" name="funcionalidade" value="reavaliation">
                                <button class="btn btn-primary"><span class="glyphicon glyphicon-send"></span></button>
                            </form>
                        </td>
                    </tr>

                    <?php
                endforeach
                ?>
            </table>
        </div>
    </div>
    <!-- /.box-body -->
</div>
<?php
$template->templateF();
?>
