<?php
/**
 * Created by PhpStorm.
 * User: IgoR
 * Date: 17/10/2017
 * Time: 16:41
 */

require_once "../Controller/templateController.php";
require_once "../DAO/membroDAO.php";
$template = new templateController();
$template->template();
$template->menuMembros();


$idUsuario = $_POST['idUsuario'];
$dado = buscaMembro($idUsuario);

?>

<div class="col-md-12">
    <h1>Alterar Membro</h1>
    <div class="box box-danger">
        <div class="box-header with-border">
            <h3 class="box-title" style="color: #0b93d5"><strong>*Todos os campos são de preenchimento
                    obrigatório</strong></h3>
        </div>
        <br><br>
        <!-- /.box-header -->
        <!-- form start -->
        <form class="form-horizontal" action="../Controller/membroController.php" method="POST">
            <input type="hidden" value="update" name="funcionalidade">
            <input type="hidden" value="<?= $dado['idUsuario'] ?>" name="idUsuario">
            <input type="hidden" value="<?= $dado['cpf'] ?>" name="cpf">
            <div class="box-body">
                <div class="form-group ">
                    <label for="cpf" class="col-sm-2 control-label">CPF</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="cpf" placeholder="CPF" disabled
                               data-inputmask='"mask": "999.999.999-99"' data-mask value="<?= $dado['cpf'] ?>" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="nome" class="col-sm-2 control-label">Nome</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome Completo"
                               value="<?= $dado['nome'] ?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="usuario" class="col-sm-2 control-label">Usuario</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="usuario" name="usuario"
                               placeholder="Usuario para acessar o sistema" value="<?= $dado['usuario'] ?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="senha" class="col-sm-2 control-label">Senha</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha"
                               required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="rg" class="col-sm-2 control-label">RG</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="rg" name="rg" placeholder="RG"
                               value="<?= $dado['rg'] ?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-8">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                               value="<?= $dado['email'] ?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="celular" class="col-sm-2 control-label">Celular</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="celular" name="celular" placeholder="Celular"
                               data-inputmask='"mask": "(99) 99999-9999"' data-mask value="<?= $dado['celular'] ?>"
                               required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="telefone" class="col-sm-2 control-label">Telefone Fixo</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" placeholder="Telefone Fixo" name="telefone"
                               data-inputmask='"mask": "(99) 9999-9999"' data-mask value="<?= $dado['telefone'] ?>"
                               required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="endereco" class="col-sm-2 control-label">Endereço</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" placeholder="Endereço" name="endereco"
                               value="<?= $dado['endereco'] ?>" required>
                    </div>
                </div>

                <div class="icheckbox_flat-green checked" aria-checked="false" aria-disabled="false"
                     style="position: relative;"><input type="checkbox" class="flat-red" checked=""
                                                        style="position: absolute; opacity: 0;">
                    <ins class="iCheck-helper"
                         style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                </div>
                <div class="form-group">
                    <label for="funcao" class="col-sm-2 control-label">Função</label>
                    <?php
                    if ($dado['tipo'] == 'Gerente') {
                        $gerente = "Checked = True";
                    } else {
                        $colaborador = "Checked = True";
                    }
                    ?>
                    <div class="col-sm-8">
                        <label>
                            <input type="radio" name="tipo" class="icheckbox_flat-red" <?= $gerente ?> value="Gerente">
                        </label>
                        <label>
                            Gerente
                        </label>
                        <br>
                        <label>
                            <input type="radio" name="tipo" class="icheckbox_flat-red" <?= $colaborador ?>
                                   value="Colaborador">
                        </label>
                        <label>
                            Colaborador
                        </label>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <a href="listarMembros.php" type="button" class="btn btn-default">Cancelar</a>
                <button type="submit" class="btn btn-success pull-right">Alterar</button>
            </div>
            <!-- /.box-footer -->
        </form>
    </div>
</div>


<?php $template->templateF(); ?>
