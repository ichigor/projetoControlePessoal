<?php
/**
 * Created by PhpStorm.
 * User: IgoR
 * Date: 03/10/2017
 * Time: 15:30
 */

require_once "../Controller/templateController.php";

$template = new templateController();

$template ->templateColaborador();
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
                        <th>Email</th>
                        <th>Celular</th>
                    </tr>
                    <?php
                    $membros = listaMembrosAtivos($conexao);
                    foreach ($membros as $membro) :
                        ?>
                        <tr>
                            <td>
                                <a href="dadosMembroColaborador.php?idUsuario=<?= $membro['idUsuario'] ?> "><?= $membro['nome'] ?></a>
                            </td>
                            <td>
                                <?= $membro['email'] ?>
                            </td>
                            <td>
                                <?= $membro['celular'] ?>
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