<?php
/**
 * Created by PhpStorm.
 * User: IgoR
 * Date: 26/09/2017
 * Time: 15:00
 */


require_once "../Controller/templateController.php";
//require_once "../DAO/tarefaDAO.php";
require_once "../DAO/historicoDAO.php";
require_once "../DAO/membroDAO.php";
$template = new templateController();

$template->template();
$template->menuHome();


?>
<?php mostraAlerta("success"); ?>
<div class="col-md-12">
    <h1>Tarefas para o dia de Hoje</h1>
    <div class="box box-danger">

        <!-- /.box-header -->
        <div class="box-body no-padding">
            <table class="table table-striped">
                <tr>
                    <th>Nome</th>
                    <th>Status</th>
                    <th>Responsavel</th>

                </tr>
                <?php
                $tarefas = buscaHistoricoDia($conexao);
                foreach ($tarefas as $tarefa) :
                    ?>

                    <tr>
                        <td>
                            <a href="dadosHistorico.php?idHistorico=<?= $tarefa['idHistorico'] ?> "><?= $tarefa['nomeTarefa'] ?></a>
                        </td>
                        <td><?= $tarefa['status'] ?></td>
                        <?php $membro = buscaMembro($conexao, $tarefa['idUsuario'])?>
                        <td>
                            <a href="dadosMembro.php?idUsuario=<?=$tarefa['idUsuario']?> "><?= $membro['nome']?></a>
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