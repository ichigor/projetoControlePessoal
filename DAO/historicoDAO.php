<?php
/**
 * Created by PhpStorm.
 * User: IgoR
 * Date: 10/10/2017
 * Time: 14:05
 */


function insereHistorico($conexao, $h)
{
    $query = "insert into historico (nomeTarefa, status, frequencia, descricao, dataInicial, dataFinal, idTarefa, idUsuario) values
            ('{$h->nomeTarefa}','{$h->status}','{$h->frequencia}','{$h->descricao}','{$h->dataInicial}', '{$h->dataFinal}','{$h->idTarefa}','{$h->idUsuario}')";
    return mysqli_query($conexao, $query);
}
function buscaHistoricoDia($conexao)
{
    $tarefas = array();
    $resultado = mysqli_query($conexao, "select * from historico where dataFinal = CURDATE() and status <>'Cancelada'");
    while ($tarefa = mysqli_fetch_assoc($resultado)) {
        array_push($tarefas, $tarefa);
    }
    return $tarefas;
}

function listaHistorico($conexao)
{
    $tarefas = array();
    $resultado = mysqli_query($conexao, "select * from historico");
    while ($tarefa = mysqli_fetch_assoc($resultado)) {
        array_push($tarefas, $tarefa);
    }
    return $tarefas;
}
function buscaHistoricoEmAndamento($conexao)
{
    $tarefas = array();
    $resultado = mysqli_query($conexao, "select * from historico where status = 'Em andamento' and dataFinal = CURDATE()");
    while ($tarefa = mysqli_fetch_assoc($resultado)) {
        array_push($tarefas, $tarefa);
    }
    return $tarefas;
}

function buscaHistoricoEmAvaliacao($conexao)
{
    $tarefas = array();
    $resultado = mysqli_query($conexao, "select * from historico where status = 'Em avaliação'");
    while ($tarefa = mysqli_fetch_assoc($resultado)) {
        array_push($tarefas, $tarefa);
    }
    return $tarefas;
}

function enviarParaAvalicao($conexao, $idTarefa)
{
    $idHistorico = buscarUltimaHistorico($conexao, $idTarefa);
    var_dump($idHistorico);
    $query = "update historico set status='Em avaliação' where idTarefa ='{$idTarefa}' and idHistorico='{$idHistorico['max(idHistorico)']}'";
    return mysqli_query($conexao, $query);
}

function buscarUltimaHistorico($conexao, $idTarefa = null){
    //PROBLEMA AQUI ESTA PEGANDO SEMPRE O ULTIMO E NAO O ULTIMO DAQUELE
    $query = "Select max(idHistorico) from historico where idTarefa = '{$idTarefa}'";
    $retorno = mysqli_query($conexao, $query);
    return mysqli_fetch_assoc($retorno);
}

function concluirTarefa($conexao, $idTarefa)
{
    $idHistorico = buscarUltimaHistorico($conexao, $idTarefa);
    $query = "update historico set status='Concluida' where idTarefa ='{$idTarefa}' and idHistorico='{$idHistorico['max(idHistorico)']}'";
    return mysqli_query($conexao, $query);
}


function naoConcluirTarefa($conexao, $idTarefa)
{
    $idHistorico = buscarUltimaHistorico($conexao, $idTarefa);
    $query = "update historico set status='Não Concluida' where idTarefa ='{$idTarefa}'  and idHistorico='{$idHistorico['max(idHistorico)']}'";
    return mysqli_query($conexao, $query);
}
function buscaTarefasAvaliadas($conexao)
{
    //verificar se vai precisar da linha de baixo
    //$idHistorico = buscarUltimaHistorico($conexao);
    $tarefas = array();
    $resultado = mysqli_query($conexao, "select * from historico where status = 'Concluida' OR status = 'Não Concluida' ");
    while ($tarefa = mysqli_fetch_assoc($resultado)) {
        array_push($tarefas, $tarefa);
    }
    return $tarefas;
}
