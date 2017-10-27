<?php
/**
 * Created by PhpStorm.
 * User: IgoR
 * Date: 10/10/2017
 * Time: 14:05
 */

require_once("../util/conecta.php");

function insereTarefa($conexao, $t)
{
    $query = "insert into tarefa (nomeTarefa, status, frequencia, descricao, dataInicial, dataFinal, idUsuario) values
            ('{$t->nomeTarefa}','{$t->status}','{$t->frequencia}','{$t->descricao}','{$t->dataInicial}', '{$t->dataFinal}','{$t->idUsuario}')";
    return mysqli_query($conexao, $query);
}


function listaTarefas($conexao)
{
    $tarefas = array();
    $resultado = mysqli_query($conexao, "select * from tarefa");
    while ($tarefa = mysqli_fetch_assoc($resultado)) {
        array_push($tarefas, $tarefa);
    }
    return $tarefas;
}

function cancelarTarefa($conexao, $idTarefa)
{
    $query = "update tarefa set status='Cancelada' where idTarefa ='{$idTarefa}'";
    return mysqli_query($conexao, $query);
}

function concluirTarefa($conexao, $idTarefa)
{
    $query = "update tarefa set status='Completo' where idTarefa ='{$idTarefa}'";
    return mysqli_query($conexao, $query);
}

function naoConcluirTarefa($conexao, $idTarefa)
{
    $query = "update tarefa set status='Incompleto' where idTarefa ='{$idTarefa}'";
    return mysqli_query($conexao, $query);
}

function alteraTarefa($conexao, $t, $idTarefa)
{

    $query = "update tarefa set nomeTarefa= '{$t->nomeTarefa}', frequencia= '{$t->frequencia}',descricao = '{$t->descricao}', dataInicial= '{$t->dataInicial}', dataFinal='{$t->dataFinal}', idUsuario='{$t->idUsuario}' where idTarefa ='{$idTarefa}'";
    return mysqli_query($conexao, $query);

}


function buscaTarefa($conexao, $idTarefa)
{
    $resultado = mysqli_query($conexao, "select * from tarefa where idTarefa={$idTarefa}");
    return mysqli_fetch_assoc($resultado);
}

function enviarParaAvalicao($conexao, $idTarefa)
{
    $query = "update tarefa set status='Em avaliacao' where idTarefa ='{$idTarefa}'";
    return mysqli_query($conexao, $query);
}

function buscaTarefaEmAndamento($conexao)
{
    $tarefas = array();
    $resultado = mysqli_query($conexao, "select * from tarefa where status = 'Em andamento' and dataFinal = CURDATE()");
    while ($tarefa = mysqli_fetch_assoc($resultado)) {
        array_push($tarefas, $tarefa);
    }
    return $tarefas;
}

function buscaTarefaEmAvaliacao($conexao)
{
    $tarefas = array();
    $resultado = mysqli_query($conexao, "select * from tarefa where status = 'Em avaliacao'");
    while ($tarefa = mysqli_fetch_assoc($resultado)) {
        array_push($tarefas, $tarefa);
    }
    return $tarefas;
}

function buscaTarefaDia($conexao)
{
    $tarefas = array();
    $resultado = mysqli_query($conexao, "select * from tarefa where dataFinal = CURDATE()");
    while ($tarefa = mysqli_fetch_assoc($resultado)) {
        array_push($tarefas, $tarefa);
    }
    return $tarefas;
}

function buscaTarefaNaoCancelada($conexao)
{
    $tarefas = array();
    $resultado = mysqli_query($conexao, "select * from tarefa where status <> 'Cancelada'");
    while ($tarefa = mysqli_fetch_assoc($resultado)) {
        array_push($tarefas, $tarefa);
    }
    return $tarefas;
}

