<?php
/**
 * Created by PhpStorm.
 * User: IgoR
 * Date: 10/10/2017
 * Time: 14:05
 */

include("../util/conecta.php");
include("historicoDAO.php");

function insereTarefa($conexao, $t)
{
    $query = "insert into tarefa (nomeTarefa, status, frequencia, descricao, dataInicial, dataFinal, idUsuario) values
            ('{$t->nomeTarefa}','{$t->status}','{$t->frequencia}','{$t->descricao}','{$t->dataInicial}', '{$t->dataFinal}','{$t->idUsuario}')";
    return mysqli_query($conexao, $query);
}


function cancelarTarefa($conexao, $idTarefa)
{
    $idHistorico = buscarUltimaHistorico($conexao, $idTarefa);
    $query = "update tarefa set status='Cancelada' where idTarefa ='{$idTarefa}'";
    $query2 = "update historico set status='Cancelada' where idTarefa ='{$idTarefa}' and idHistorico='{$idHistorico['max(idHistorico)']}'";
    mysqli_query($conexao, $query);
    return mysqli_query($conexao, $query2);
}



//tem coisa aqui verificar mais tarde talvez quando alterar uma tarefa nao seja alterado no historico
function alteraTarefa($conexao, $t, $idTarefa)
{

    $idHistorico = buscarUltimaHistorico($conexao, $idTarefa);
    $query = "update tarefa set nomeTarefa= '{$t->nomeTarefa}', frequencia= '{$t->frequencia}',descricao = '{$t->descricao}', dataInicial= '{$t->dataInicial}', dataFinal='{$t->dataFinal}', idUsuario='{$t->idUsuario}' where idTarefa ='{$idTarefa}'";
    $query2 = "update historico set nomeTarefa= '{$t->nomeTarefa}', frequencia= '{$t->frequencia}',descricao = '{$t->descricao}', dataInicial= '{$t->dataInicial}', dataFinal='{$t->dataFinal}', idUsuario='{$t->idUsuario}' where idTarefa ='{$idTarefa}' and idHistorico='{$idHistorico['max(idHistorico)']}'";
    mysqli_query($conexao, $query);
    return mysqli_query($conexao, $query2);

}

function buscaTarefa($conexao, $idTarefa)
{
    $resultado = mysqli_query($conexao, "select * from tarefa where idTarefa={$idTarefa}");
    return mysqli_fetch_assoc($resultado);
}

//verificar como vai ficar essa funcao
function buscaTarefaNaoCancelada($conexao)
{
    $tarefas = array();
    $resultado = mysqli_query($conexao, "select * from tarefa where status <> 'Cancelada'");
    while ($tarefa = mysqli_fetch_assoc($resultado)) {
        array_push($tarefas, $tarefa);
    }
    return $tarefas;
}


function atualizaRotinaDiaria($conexao, $idTarefa, $tarefa){

    $query = "update tarefa set dataInicial=now(), dataFinal=now() where frequencia='Diariamente' and idTarefa ='{$idTarefa}'";
    mysqli_query($conexao, $query);
    $query2 = "insert into historico (nomeTarefa, status, frequencia, descricao, dataInicial, dataFinal, idTarefa, idUsuario) values
            ('{$tarefa['nomeTarefa']}','Em andamento','{$tarefa['frequencia']}','{$tarefa['descricao']}',now(), now(),'{$idTarefa}','{$tarefa['idUsuario']}')";
    return mysqli_query($conexao, $query2);
}

function buscaTarefasDiarias($conexao){
    $tarefas = array();
    $resultado = mysqli_query($conexao, "select * from tarefa where frequencia='Diariamente' and status <> 'Cancelada'");
    while ($tarefa = mysqli_fetch_assoc($resultado)) {
        array_push($tarefas, $tarefa);
    }
    return $tarefas;
}

function buscarUltimaTarefa($conexao){
    $query = "Select max(idTarefa) from tarefa";
    $retorno = mysqli_query($conexao, $query);
    return mysqli_fetch_assoc($retorno);
}

function buscaTarefasMensais($conexao){
    $tarefas = array();
    $resultado = mysqli_query($conexao, "select * from tarefa where frequencia='Mensalmente' and status <> 'Cancelada'");
    while ($tarefa = mysqli_fetch_assoc($resultado)) {
        array_push($tarefas, $tarefa);
    }
    return $tarefas;
}


function atualizaRotinaMensal($conexao, $idTarefa, $tarefa){

    $query = "update tarefa set dataFinal = DATE_ADD(dataFinal, INTERVAL 1 MONTH)
              , dataInicial = DATE_ADD(dataInicial, INTERVAL 1 MONTH) where idTarefa ='{$idTarefa}'";
    mysqli_query($conexao, $query);
    $query2 = "insert into historico (nomeTarefa, status, frequencia, descricao, dataInicial, dataFinal, idTarefa, idUsuario) values
            ('{$tarefa['nomeTarefa']}','Em andamento','{$tarefa['frequencia']}','{$tarefa['descricao']}',DATE_ADD('{$tarefa['dataInicial']}', INTERVAL 1 MONTH),DATE_ADD('{$tarefa['dataFinal']}', INTERVAL 1 MONTH),'{$idTarefa}','{$tarefa['idUsuario']}')";
    return mysqli_query($conexao, $query2);

}
