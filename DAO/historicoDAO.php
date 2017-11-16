<?php
/**
 * Created by PhpStorm.
 * User: IgoR
 * Date: 10/10/2017
 * Time: 14:05
 */

include("../util/conecta.php");


function insereHistorico($conexao, $h)
{
    $query = "insert into historico (nomeTarefa, status, frequencia, descricao, dataInicial, dataFinal, idTarefa, idUsuario) values
            ('{$h->getNomeTarefa()}','{$h->getStatus()}','{$h->getFrequencia()}','{$h->getDescricao()}','{$h->getDataInicial()}',
             '{$h->getDataFinal()}','{$h->getIdTarefa()}','{$h->getIdUsuario()}')";
    return mysqli_query($conexao, $query);
}

function buscaHistoricoDia($conexao)
{
    $tarefas = array();
    $resultado = mysqli_query($conexao, "select * from historico where dataFinal = CURDATE() or dataInicial = CURDATE() 
    and status <>'Cancelada'");
    while ($tarefa = mysqli_fetch_assoc($resultado)) {
        array_push($tarefas, $tarefa);
    }
    return $tarefas;
}

function listaHistorico($conexao)
{
    $tarefas = array();
    $resultado = mysqli_query($conexao, "select * from historico order by idHistorico desc");
    while ($tarefa = mysqli_fetch_assoc($resultado)) {
        array_push($tarefas, $tarefa);
    }
    return $tarefas;
}

function buscaHistoricoEmAndamento($conexao, $idUsuario)
{
    $tarefas = array();
    $resultado = mysqli_query($conexao, "select * from historico where idUsuario='{$idUsuario}' and status = 'Em andamento' 
    and dataFinal = CURDATE() or dataInicial = CURDATE() and status = 'Em andamento' and idUsuario='{$idUsuario}'");
    while ($tarefa = mysqli_fetch_assoc($resultado)) {
        array_push($tarefas, $tarefa);
    }
    return $tarefas;
}

function buscaHistoricoEmAvaliacao($conexao)
{
    $tarefas = array();
    $resultado = mysqli_query($conexao, "select * from historico where status = 'Em avaliação' and dataFinal = CURDATE() 
    or dataInicial = CURDATE() and status = 'Em avaliação'");
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
    $query2 = "update tarefa set status='Em avaliação' where idTarefa ='{$idTarefa}'";
    mysqli_query($conexao, $query);
    return mysqli_query($conexao, $query2);
}

function buscarUltimaHistorico($conexao, $idTarefa)
{

    $query = "Select max(idHistorico) from historico where idTarefa = '{$idTarefa}'";
    $retorno = mysqli_query($conexao, $query);
    return mysqli_fetch_assoc($retorno);
}

function concluirTarefa($conexao, $idTarefa)
{
    $idHistorico = buscarUltimaHistorico($conexao, $idTarefa);
    $query = "update historico set status='Concluida' where idTarefa ='{$idTarefa}' and idHistorico='{$idHistorico['max(idHistorico)']}'";
    $query2 = "update tarefa set status='Concluida' where idTarefa ='{$idTarefa}'";
    mysqli_query($conexao, $query);
    return mysqli_query($conexao, $query2);
}


function naoConcluirTarefa($conexao, $idTarefa)
{
    $idHistorico = buscarUltimaHistorico($conexao, $idTarefa);
    $query = "update historico set status='Não Concluida' where idTarefa ='{$idTarefa}' and idHistorico='{$idHistorico['max(idHistorico)']}'";
    $query2 = "update tarefa set status='Não Concluida' where idTarefa ='{$idTarefa}'";
    mysqli_query($conexao, $query);
    return mysqli_query($conexao, $query2);
}

function buscaTarefasAvaliadas($conexao)
{
    $tarefas = array();
    $resultado = mysqli_query($conexao, "select * from historico where status = 'Concluida' and dataFinal >= CURDATE()
    OR status = 'Não Concluida' and dataFinal >= CURDATE() order by idHistorico desc");
    while ($tarefa = mysqli_fetch_assoc($resultado)) {
        array_push($tarefas, $tarefa);
    }
    return $tarefas;
}

function buscaHistorico($conexao, $idHistorico)
{
    $resultado = mysqli_query($conexao, "select * from historico where idHistorico={$idHistorico}");
    return mysqli_fetch_assoc($resultado);
}
