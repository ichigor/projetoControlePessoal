<?php
/**
 * Created by PhpStorm.
 * User: IgoR
 * Date: 07/11/2017
 * Time: 15:02
 */

require_once "../DAO/tarefaDAO.php";

$tarefas = buscaTarefasDiarias($conexao);

//testes para pegar a ultima posicao
//$varTeste = buscarUltimaTarefa($conexao) ;
//echo $varTeste['max(idTarefa)'];
//

foreach ($tarefas as $value){

    echo $value['nomeTarefa'];
    echo '</br>';

    //atualizaRotinaDiaria($conexao, $value['idTarefa']);
}