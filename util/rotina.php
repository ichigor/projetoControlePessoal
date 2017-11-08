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


$tarefas = buscaTarefasDiarias($conexao);


foreach ($tarefas as $value){

    $membro = buscaMembro($conexao, $value['idUsuario']);

    if($membro['ativo']==0){
        cancelarTarefa($conexao, $value['idTarefa']);
    }
    if($value['dataFinal'] < date('Y-m-d') and $value['dataInicial'] < date('Y-m-d')){
        echo $value['dataFinal'];
//        echo $value['nomeTarefa'];
//        echo '</br>';
        atualizaRotinaDiaria($conexao, $value['idTarefa'], $value);
        //die();
    }
    if($value['dataFinal'] == date('Y-m-d') and $value['dataInicial'] == date('Y-m-d')){
        echo "nada";
    }

}