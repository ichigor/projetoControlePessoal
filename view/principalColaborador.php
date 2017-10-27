<?php
/**
 * Created by PhpStorm.
 * User: IgoR
 * Date: 26/09/2017
 * Time: 15:00
 */


require_once "../Controller/templateController.php";

$template = new templateController();

$template ->templateColaborador();
require_once "../DAO/tarefaDAO.php";
?>

<div class="col-md-12">
    <h1>Tarefas para o dia de Hoje</h1>
    <div class="box box-danger">

        <!-- /.box-header -->
        <div class="box-body no-padding">
            <table class="table table-striped">
                <tr>
                    <th>Nome</th>
                    <th>Data Limite</th>
                    <th>Enviar para avaliação</th>


                </tr>
                <?php
                $tarefas = buscaTarefaEmAndamento($conexao);
                foreach ($tarefas as $tarefa) :
                    ?>

                    <tr>
                        <td>
                            <a href="dadosTarefa.php?idTarefa=<?= $tarefa['idTarefa'] ?> "><?= $tarefa['nomeTarefa'] ?></a>
                        </td>
                        <td>
                            <?= $tarefa['dataFinal'] ?>
                        </td>
                        <td>
                            <form class="" action="../Controller/tarefaController.php" method="post">
                                <input type="hidden" name="idTarefa" value="<?=$tarefa['idTarefa']?>">
                                <input type="hidden" name="funcionalidade" value="avaliation">
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
