<?php
/**
 * Created by PhpStorm.
 * User: IgoR
 * Date: 03/10/2017
 * Time: 15:31
 */

require_once "../Controller/templateController.php";
$template = new templateController();
$template->template();
require_once "../DAO/tarefaDAO.php";
?>
    <div class="col-md-12">
    <h1>Historico de todas as Tarefas</h1>
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
                $tarefas = listaTarefas($conexao);
                foreach ($tarefas as $tarefa) :
                    ?>

                    <tr>
                        <td>
                            <a href="dadosTarefa.php?idTarefa=<?= $tarefa['idTarefa'] ?> "><?= $tarefa['nomeTarefa'] ?></a>
                        </td>
                        <td><?= $tarefa['status'] ?></td>
                        <td>
                            <a href="dadosMembro.php?idUsuario=24 ">Colaborador 1</a>
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
<?php $template->templateF(); ?>