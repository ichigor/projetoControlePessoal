<?php
/**
 * Created by PhpStorm.
 * User: IgoR
 * Date: 10/10/2017
 * Time: 14:05
 */

require_once("../util/conecta.php");
include("historicoDAO.php");

function insereTarefa($t)
{
    $db = new conexao();
    $db->conectar();
    $sql = "insert into tarefa (nomeTarefa, status, frequencia, descricao, dataInicial, dataFinal, idUsuario) values
            ('{$t->getNomeTarefa()}','{$t->getStatus()}','{$t->getFrequencia()}','{$t->getDescricao()}','{$t->getDataInicial()}',
             '{$t->getDataFinal()}','{$t->getIdUsuario()}')";
    $resultado = $db->query($sql);
    $db->fechar();
    return $resultado;
}


function cancelarTarefa($idTarefa)
{
    $idHistorico = buscarUltimaHistorico($idTarefa);
    $db = new conexao();
    $db->conectar();
    $sql = "update tarefa set status='Cancelada' where idTarefa ='{$idTarefa}'";
    $resultado = $db->query($sql);
    $sql2 = "update historico set status='Cancelada' where idTarefa ='{$idTarefa}' and idHistorico='{$idHistorico['max(idHistorico)']}'";
    $db->query($sql2);
    $db->fechar();
    return $resultado;
}


function alteraTarefa( $t, $idTarefa)
{

    $idHistorico = buscarUltimaHistorico($idTarefa);
    $db = new conexao();
    $db->conectar();
    $sql = "update tarefa set nomeTarefa= '{$t->getNomeTarefa()}', frequencia= '{$t->getFrequencia()}',descricao = '{$t->getDescricao()}',
    dataInicial= '{$t->getDataInicial()}', dataFinal='{$t->getDataFinal()}', idUsuario='{$t->getIdUsuario()}' where idTarefa ='{$idTarefa}'";
    $sql2 = "update historico set nomeTarefa= '{$t->getNomeTarefa()}', frequencia= '{$t->getFrequencia()}',descricao = '{$t->getDescricao()}',
    dataInicial= '{$t->getDataInicial()}', dataFinal='{$t->getDataFinal()}', idUsuario='{$t->getIdUsuario()}' where idTarefa ='{$idTarefa}' 
    and idHistorico='{$idHistorico['max(idHistorico)']}'";
    $db->query($sql);
    $resultado = $db->query($sql2);
    $db->fechar();
    return $resultado;

}

function buscaTarefa($idTarefa)
{
    $db = new conexao();
    $db->conectar();
    $sql = "select * from tarefa where idTarefa={$idTarefa}";
    $resultado = mysqli_fetch_assoc($db->query($sql));
    $db->fechar();
    return $resultado;
}

//verificar como vai ficar essa funcao
function buscaTarefaNaoCancelada()
{
    $db = new conexao();
    $db->conectar();
    $tarefas = array();
    $sql = "select * from tarefa where status <> 'Cancelada'";
    $resultado = $db->query($sql);
    while ($tarefa = mysqli_fetch_assoc($resultado)) {
        array_push($tarefas, $tarefa);
    }
    $db->fechar();
    return $tarefas;
}

function buscaTarefaNaoCanceladaColaborador($idUsuario)
{
    $db = new conexao();
    $db->conectar();
    $tarefas = array();
    $sql ="select * from tarefa where status <> 'Cancelada' and idUsuario='{$idUsuario}'";
    $resultado = $db->query($sql);
    while ($tarefa = mysqli_fetch_assoc($resultado)) {
        array_push($tarefas, $tarefa);
    }
    $db->fechar();
    return $tarefas;
}

function atualizaRotinaDiaria($idTarefa, $tarefa)
{
    $db = new conexao();
    $db->conectar();
    $sql = "update tarefa set dataInicial=now(), dataFinal=now(), status='Em andamento' where frequencia='Diariamente' and idTarefa ='{$idTarefa}'";
    $db->query($sql);
    $sql2 = "insert into historico (nomeTarefa, status, frequencia, descricao, dataInicial, dataFinal, idTarefa, idUsuario) values
            ('{$tarefa['nomeTarefa']}','Em andamento','{$tarefa['frequencia']}','{$tarefa['descricao']}',now(), now(),'{$idTarefa}','{$tarefa['idUsuario']}')";
    $resultado = $db->query($sql2);
    $db->fechar();
    return $resultado;
}

function buscaTarefasDiarias()
{
    $db = new conexao();
    $db->conectar();
    $tarefas = array();
    $sql = "select * from tarefa where frequencia='Diariamente' and status <> 'Cancelada'";
    $resultado = $db->query($sql);
    while ($tarefa = mysqli_fetch_assoc($resultado)) {
        array_push($tarefas, $tarefa);
    }
    $db->fechar();
    return $tarefas;
}

function buscarUltimaTarefa()
{
    $db = new conexao();
    $db->conectar();
    $sql = "Select max(idTarefa) from tarefa";
    $resultado = mysqli_fetch_assoc($db->query($sql));
    $db->fechar();
    return $resultado;
}

function buscaTarefasMensais()
{
    $db = new conexao();
    $db->conectar();
    $tarefas = array();
    $sql = "select * from tarefa where frequencia='Mensalmente' and status <> 'Cancelada'";
    $resultado = $db->query($sql);;
    while ($tarefa = mysqli_fetch_assoc($resultado)) {
        array_push($tarefas, $tarefa);
    }
    $db->fechar();
    return $tarefas;
}


function atualizaRotinaMensal( $idTarefa, $tarefa)
{
    $db = new conexao();
    $db->conectar();
    $sql = "update tarefa set dataFinal = DATE_ADD(dataFinal, INTERVAL 1 MONTH)
              , dataInicial = DATE_ADD(dataInicial, INTERVAL 1 MONTH) where idTarefa ='{$idTarefa}'";
    $db->query($sql);
    $sql2 = "insert into historico (nomeTarefa, status, frequencia, descricao, dataInicial, dataFinal, idTarefa, idUsuario) values
            ('{$tarefa['nomeTarefa']}','Em andamento','{$tarefa['frequencia']}','{$tarefa['descricao']}',DATE_ADD('{$tarefa['dataInicial']}', INTERVAL 1 MONTH),DATE_ADD('{$tarefa['dataFinal']}', INTERVAL 1 MONTH),'{$idTarefa}','{$tarefa['idUsuario']}')";
    $resultado = $db->query($sql2);
    $db->fechar();
    return $resultado;

}
