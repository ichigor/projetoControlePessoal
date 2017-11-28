<?php
/**
 * Created by PhpStorm.
 * User: IgoR
 * Date: 10/10/2017
 * Time: 14:05
 */

require_once("../util/conecta.php");


function insereHistorico($h)
{
    $db = new conexao();
    $db->conectar();
    $sql = "insert into historico (nomeTarefa, status, frequencia, descricao, dataInicial, dataFinal, idTarefa, idUsuario) values
            ('{$h->getNomeTarefa()}','{$h->getStatus()}','{$h->getFrequencia()}','{$h->getDescricao()}','{$h->getDataInicial()}',
             '{$h->getDataFinal()}','{$h->getIdTarefa()}','{$h->getIdUsuario()}')";
    $resultado = $db->query($sql);
    $db->fechar();
    return $resultado;
}

function buscaHistoricoDia()
{
    $db = new conexao();
    $db->conectar();
    $tarefas = array();
    $sql = "select * from historico where dataFinal = CURDATE() or dataInicial = CURDATE() 
    and status <>'Cancelada'";
    $resultado = $db->query($sql);
    while ($tarefa = mysqli_fetch_assoc($resultado)) {
        array_push($tarefas, $tarefa);
    }
    $db->fechar();
    return $tarefas;
}

function listaHistorico()
{
    $db = new conexao();
    $db->conectar();
    $tarefas = array();
    $sql = "select * from historico order by idHistorico desc";
    $resultado = $db->query($sql);
    while ($tarefa = mysqli_fetch_assoc($resultado)) {
        array_push($tarefas, $tarefa);
    }
    $db->fechar();
    return $tarefas;
}

function buscaHistoricoEmAndamento( $idUsuario)
{
    $db = new conexao();
    $db->conectar();
    $tarefas = array();
    $sql = "select * from historico where idUsuario='{$idUsuario}' and status = 'Em andamento' 
    and dataFinal = CURDATE() or dataInicial = CURDATE() and status = 'Em andamento' and idUsuario='{$idUsuario}'";
    $resultado = $db->query($sql);
    while ($tarefa = mysqli_fetch_assoc($resultado)) {
        array_push($tarefas, $tarefa);
    }
    $db->fechar();
    return $tarefas;
}

function buscaHistoricoEmAvaliacao()
{
    $db = new conexao();
    $db->conectar();
    $tarefas = array();
    $sql ="select * from historico where status = 'Em avaliação' and dataFinal = CURDATE() 
    or dataInicial = CURDATE() and status = 'Em avaliação'";
    $resultado = $db->query($sql);
    while ($tarefa = mysqli_fetch_assoc($resultado)) {
        array_push($tarefas, $tarefa);
    }
    $db->fechar();
    return $tarefas;
}

function enviarParaAvalicao($idTarefa)
{
    $idHistorico = buscarUltimaHistorico($idTarefa);
    $db = new conexao();
    $db->conectar();
    $sql = "update historico set status='Em avaliação' where idTarefa ='{$idTarefa}' and idHistorico='{$idHistorico['max(idHistorico)']}'";
    $sql2 = "update tarefa set status='Em avaliação' where idTarefa ='{$idTarefa}'";
    $db->query($sql);
    $resultado = $db->query($sql2);
    $db->fechar();
    return $resultado;
}

function buscarUltimaHistorico($idTarefa)
{
    $db = new conexao();
    $db->conectar();
    $sql = "Select max(idHistorico) from historico where idTarefa = '{$idTarefa}'";
    $resultado = mysqli_fetch_assoc($db->query($sql));
    $db->fechar();
    return $resultado;
}

function concluirTarefa($idTarefa)
{
    $idHistorico = buscarUltimaHistorico( $idTarefa);
    $db = new conexao();
    $db->conectar();
    $sql = "update historico set status='Concluida' where idTarefa ='{$idTarefa}' and idHistorico='{$idHistorico['max(idHistorico)']}'";
    $sql2 = "update tarefa set status='Concluida' where idTarefa ='{$idTarefa}'";
    $resultado = $db->query($sql);
    $db->query($sql2);
    $db->fechar();
    return $resultado;
}


function naoConcluirTarefa($idTarefa)
{
    $idHistorico = buscarUltimaHistorico($idTarefa);
    $db = new conexao();
    $db->conectar();
    $sql = "update tarefa set status='Não Concluida' where idTarefa ='{$idTarefa}'";
    $sql2 = "update historico set status='Não Concluida' where idTarefa ='{$idTarefa}' and idHistorico='{$idHistorico['max(idHistorico)']}'";
    $resultado =$db->query($sql);
    $db->query($sql2);
    $db->fechar();
    return $resultado;
}

function buscaTarefasAvaliadas()
{
    $db = new conexao();
    $db->conectar();
    $tarefas = array();
    $sql = "select * from historico where status = 'Concluida' and dataFinal >= CURDATE()
    OR status = 'Não Concluida' and dataFinal >= CURDATE() order by idHistorico desc";
    $resultado = $db->query($sql);
    while ($tarefa = mysqli_fetch_assoc($resultado)) {
        array_push($tarefas, $tarefa);
    }
    $db->fechar();
    return $tarefas;
}

function buscaHistorico($idHistorico)
{

    $db = new conexao();
    $db->conectar();
    $sql = "select * from historico where idHistorico={$idHistorico}";
    $resultado = mysqli_fetch_assoc($db->query($sql));
    $db->fechar();
    return $resultado;
}


//function alteraHistorico($t, $idTarefa){
//    $db = new conexao();
//    $db->conectar();
//    $idHistorico = buscarUltimaHistorico($idTarefa);
//    $sql2 = "update historico set nomeTarefa= '{$t->getNomeTarefa()}', frequencia= '{$t->getFrequencia()}',descricao = '{$t->getDescricao()}',
//    dataInicial= '{$t->getDataInicial()}', dataFinal='{$t->getDataFinal()}', idUsuario='{$t->getIdUsuario()}' where idTarefa ='{$idTarefa}'
//    and idHistorico='{$idHistorico['max(idHistorico)']}'";
//
//    $resultado = $db->query($sql2);
//    $db->fechar();
//    return $resultado;
//}