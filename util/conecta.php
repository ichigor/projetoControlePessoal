<?php
/**
 * Created by PhpStorm.
 * User: IgoR
 * Date: 05/10/2017
 * Time: 14:17
 */
$conexao = mysqli_connect("localhost", "root", "", "projetoIntegrador");


if (!$conexao->set_charset("utf8")) {
    exit();
}