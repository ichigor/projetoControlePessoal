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

//mudar pro historico
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

//mudar pro historico
function concluirTarefa($conexao, $idTarefa)
{
    $query = "update tarefa set status='Completo' where idTarefa ='{$idTarefa}'";
    return mysqli_query($conexao, $query);
}

//mudar pro historico
function naoConcluirTarefa($conexao, $idTarefa)
{
    $query = "update tarefa set status='Incompleto' where idTarefa ='{$idTarefa}'";
    return mysqli_query($conexao, $query);
}

//tem coisa aqui verificar mais tarde talvez quando alterar uma tarefa nao seja alterado no historico
function alteraTarefa($conexao, $t, $idTarefa)
{

    $query = "update tarefa set nomeTarefa= '{$t->nomeTarefa}', frequencia= '{$t->frequencia}',descricao = '{$t->descricao}', dataInicial= '{$t->dataInicial}', dataFinal='{$t->dataFinal}', idUsuario='{$t->idUsuario}' where idTarefa ='{$idTarefa}'";
    return mysqli_query($conexao, $query);

}

//mudar pro historico e usar idHistorico
function buscaTarefa($conexao, $idTarefa)
{
    $resultado = mysqli_query($conexao, "select * from tarefa where idTarefa={$idTarefa}");
    return mysqli_fetch_assoc($resultado);
}

//mudar pro historico
function enviarParaAvalicao($conexao, $idTarefa)
{
    $query = "update tarefa set status='Em avaliacao' where idTarefa ='{$idTarefa}'";
    return mysqli_query($conexao, $query);
}

//mudar pro historico
function buscaTarefaEmAndamento($conexao)
{
    $tarefas = array();
    $resultado = mysqli_query($conexao, "select * from tarefa where status = 'Em andamento' and dataFinal = CURDATE()");
    while ($tarefa = mysqli_fetch_assoc($resultado)) {
        array_push($tarefas, $tarefa);
    }
    return $tarefas;
}

//mudar pro historico
function buscaTarefaEmAvaliacao($conexao)
{
    $tarefas = array();
    $resultado = mysqli_query($conexao, "select * from tarefa where status = 'Em avaliacao'");
    while ($tarefa = mysqli_fetch_assoc($resultado)) {
        array_push($tarefas, $tarefa);
    }
    return $tarefas;
}

//mudar pro historico
function buscaTarefaDia($conexao)
{
    $tarefas = array();
    $resultado = mysqli_query($conexao, "select * from tarefa where dataFinal = CURDATE() and status <>'Cancelada'");
    while ($tarefa = mysqli_fetch_assoc($resultado)) {
        array_push($tarefas, $tarefa);
    }
    return $tarefas;
}

//mudar pro historico
function buscaTarefaNaoCancelada($conexao)
{
    $tarefas = array();
    $resultado = mysqli_query($conexao, "select * from tarefa where status <> 'Cancelada'");
    while ($tarefa = mysqli_fetch_assoc($resultado)) {
        array_push($tarefas, $tarefa);
    }
    return $tarefas;
}
//mudar pro historico
function buscaTarefasAvaliadas($conexao)
{
    $tarefas = array();
    $resultado = mysqli_query($conexao, "select * from tarefa where status = 'Completo' OR status = 'Incompleto'");
    while ($tarefa = mysqli_fetch_assoc($resultado)) {
        array_push($tarefas, $tarefa);
    }
    return $tarefas;
}


//verificar se ta atualizando as canceladas tambem
function atualizaRotinaDiaria($conexao, $idTarefa, $tarefa){

    $query = "update tarefa set dataInicial=now(), dataFinal=now() where frequencia='Diariamente' and idTarefa ='{$idTarefa}'";
    mysqli_query($conexao, $query);
    $query2 = "insert into historico (nomeTarefa, status, frequencia, descricao, dataInicial, dataFinal, idTarefa, idUsuario) values
            ('{$tarefa['nomeTarefa']}','Em andamento','{$tarefa['frequencia']}','{$tarefa['descricao']}',now(), now(),'{$idTarefa}','{$tarefa['idUsuario']}')";
    return mysqli_query($conexao, $query2);
}

function buscaTarefasDiarias($conexao){
    $tarefas = array();
    $resultado = mysqli_query($conexao, "select * from tarefa where frequencia='Diariamente'");
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
