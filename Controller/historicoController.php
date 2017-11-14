<?php
/**
 * Created by PhpStorm.
 * User: IgoR
 * Date: 07/11/2017
 * Time: 21:02
 */

require_once "../model/Tarefa.php";
//require_once "../DAO/tarefaDAO.php";
require_once "../util/mostraAlerta.php";
require_once "../model/Historico.php";
require_once "../DAO/historicoDAO.php";

$funcionalidade = $_POST["funcionalidade"];

if ($funcionalidade == "avaliation") {
    $idTarefa = $_POST["idTarefa"];
    enviarParaAvalicao($conexao, $idTarefa);
    $_SESSION["success"] = "A tarefa selecionada foi enviada para ser avaliada ! ! !";
    header("Location: ../view/principalColaborador.php");
} elseif ($funcionalidade == "completed") {
    $idTarefa = $_POST["idTarefa"];
    $_SESSION["success"] = "A tarefa selecionada foi concluida com sucesso ! ! !";
    concluirTarefa($conexao, $idTarefa);
    header("Location: ../view/avaliarTarefas.php");
} elseif ($funcionalidade == "incomplete") {
    $idTarefa = $_POST["idTarefa"];
    $_SESSION["warning"] = "A tarefa selecionada foi definida como não concluida ! ! !";
    naoConcluirTarefa($conexao, $idTarefa);
    header("Location: ../view/avaliarTarefas.php");
} elseif ($funcionalidade == "reavaliation") {
    $idTarefa = $_POST["idTarefa"];
    enviarParaAvalicao($conexao, $idTarefa);
    $_SESSION["success"] = "A tarefa selecionada foi enviada para ser reavaliada ! ! !";
    header("Location: ../view/reavaliarTarefas.php");
}