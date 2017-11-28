<?php
/**
 * Created by PhpStorm.
 * User: IgoR
 * Date: 07/11/2017
 * Time: 15:02
 */

require_once "../DAO/tarefaDAO.php";
require_once "../DAO/historicoDAO.php";
require_once "../model/Historico.php";
require_once "../DAO/membroDAO.php";

date_default_timezone_set("Brazil/East");

$tarefas = buscaTarefasDiarias();


foreach ($tarefas as $value) {

    $membro = buscaMembro($value['idUsuario']);

    if ($membro['ativo'] == 0) {
        echo "cancelo tarefa diaria </br>";
        cancelarTarefa($value['idTarefa']);
    } else if ($value['dataFinal'] != date('Y-m-d') and $value['dataInicial'] != date('Y-m-d')) {
        if ($value['dataFinal'] < date('Y-m-d') and $value['dataInicial'] < date('Y-m-d')) {
            echo "atualizo data diaria </br>";
            atualizaRotinaDiaria( $value['idTarefa'], $value);
        }
    } else {
        echo "nada diario</br>";
    }
}


$mensais = buscaTarefasMensais();


foreach ($mensais as $value) {

    $membro = buscaMembro($value['idUsuario']);

    if ($membro['ativo'] == 0) {
        echo "cancelo tarefa mensal </br>";
        cancelarTarefa($value['idTarefa']);
    } else if ($value['dataInicial'] < date('Y-m-d')) {
        echo "atualizo data mensal </br>";
        atualizaRotinaMensal($value['idTarefa'], $value);
    } else {
        echo "nada mensal</br>";
    }
}