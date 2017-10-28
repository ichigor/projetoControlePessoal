<?php
/**
 * Created by PhpStorm.
 * User: IgoR
 * Date: 05/10/2017
 * Time: 14:17
 */
//$conexao = mysqli_connect("localhost", "root", "", "projetoIntegrador");
$conexao = mysqli_connect("ipobfcpvprjpmdo9.cbetxkdyhwsb.us-east-1.rds.amazonaws.com", "szsb1h8zi5dw2atz", "zjg1ei8rvnc9vrzo", "xuhitdelpl3u60i6");

if (!$conexao->set_charset("utf8")) {
    exit();
}
