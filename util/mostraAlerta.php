<?php
/**
 * Created by PhpStorm.
 * User: IgoR
 * Date: 25/10/2017
 * Time: 21:31
 */

session_start();
function mostraAlerta($tipo)
{
    if (isset($_SESSION[$tipo])) {
        ?>
        <div class="box-body">
            <div class="alert alert-<?= $tipo ?> alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Sucesso!</h4>
                <?= $_SESSION[$tipo] ?>
            </div>
        </div>
        <?php
        unset($_SESSION[$tipo]);
    }
}

?>