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
require_once "../DAO/membroDAO.php";
?>
    <div class="col-md-12">
    <h1>Lista de Membros</h1>

    <div class="box box-danger">

        <!-- /.box-header -->
        <div class="box-body no-padding">
            <table class="table table-striped">
                <tr>
                    <th>Nome</th>
                    <th>Alterar</th>
                    <th>Inativar</th>
                </tr>
    <?php
        $membros = listaMembrosAtivos($conexao);
        foreach ($membros as $membro) :
    ?>
                <tr>
                   <td>
                       <a href="dadosMembro.php?idUsuario=<?= $membro['idUsuario'] ?> "><?= $membro['nome'] ?></a>
                   </td>
                    <td>
                        <form class="" action="alterarMembro.php" method="post">
                            <input type="hidden" name="idUsuario" value="<?=$membro['idUsuario']?>">
                            <input type="hidden" name="funcionalidade" value="update">
                            <button class="btn btn-primary"><span class="glyphicon glyphicon-refresh"></span></button>
                        </form>
                    </td>
                    <td>
                        <form class="" action="../Controller/membroController.php" method="post">
                            <input type="hidden" name="idUsuario" value="<?=$membro['idUsuario']?>">
                            <input type="hidden" name="funcionalidade" value="delete">
                            <button class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></button>
                        </form>
                    </td>
                </tr>
    <?php
        endforeach
    ?>
            </table>
        </div>
        <!-- /.box-body -->

    </div>
    </div>
<?php $template->templateF(); ?>