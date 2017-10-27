<?php
/**
 * Created by PhpStorm.
 * User: IgoR
 * Date: 17/10/2017
 * Time: 18:02
 */


require_once "../model/Tarefa.php";
require_once "../DAO/tarefaDAO.php";
require_once "../util/mostraAlerta.php";

$funcionalidade = $_POST["funcionalidade"];


if ($funcionalidade == "create") {
    $nomeTarefa = $_POST["nomeTarefa"];
    $frequencia = $_POST["frequencia"];
    $idUsuario = $_POST["designado"];
    $dataInicial = $_POST["dataInicial"];
    $dataFinal = $_POST["dataFinal"];
    $descricao = $_POST["descricao"];
    $status = "Em andamento";
    $idUsuario = 11;

    $t = new Tarefa($nomeTarefa, $status, $frequencia, $descricao, $dataInicial, $dataFinal, $idUsuario);

    insereTarefa($conexao, $t);

    $_SESSION["success"] = "Sua tarefa foi criada com sucesso ! ! !";
    header("Location: ../view/principalGerente.php");
    die();

} elseif ($funcionalidade == "update") {

    $idTarefa = $_POST["idTarefa"];
    $nomeTarefa = $_POST["nomeTarefa"];
    $frequencia = $_POST["frequencia"];
    $designado = $_POST["designado"];
    $dataInicial = $_POST["dataInicial"];
    $dataFinal = $_POST["dataFinal"];
    $descricao = $_POST["descricao"];
    $status = "";
    $idUsuario = 11;

    $t = new Tarefa($nomeTarefa, $status, $frequencia, $descricao, $dataInicial, $dataFinal, $idUsuario);

    alteraTarefa($conexao, $t, $idTarefa);

    $_SESSION["success"] = "Sua tarefa foi atualizada com sucesso ! ! !";
    header("Location: ../view/listarTarefas.php");

} elseif ($funcionalidade == "delete") {
    $idTarefa = $_POST["idTarefa"];
    $_SESSION["warning"] = "A tarefa selecionado foi cancelada com sucesso ! ! !";
    cancelarTarefa($conexao, $idTarefa);
    header("Location: ../view/listarTarefas.php");
} elseif ($funcionalidade == "completed") {
    $idTarefa = $_POST["idTarefa"];
    $_SESSION["success"] = "A tarefa selecionado foi concluida com sucesso ! ! !";
    concluirTarefa($conexao, $idTarefa);
    header("Location: ../view/avaliarTarefas.php");
} elseif ($funcionalidade == "incomplete") {
    $idTarefa = $_POST["idTarefa"];
    $_SESSION["warning"] = "A tarefa selecionado foi definida como não concluida ! ! !";
    naoConcluirTarefa($conexao, $idTarefa);
    header("Location: ../view/avaliarTarefas.php");
} elseif ($funcionalidade == "avaliation") {
    $idTarefa = $_POST["idTarefa"];
    $_SESSION["success"] = "A tarefa selecionado foi enviada para ser avaliada ! ! !";
    enviarParaAvalicao($conexao, $idTarefa);
    header("Location: ../view/principalColaborador.php");
}
//fazer uma mais para reavaliar
//fazer uma mais para reavaliar
//fazer uma mais para reavaliar
//fazer uma mais para reavaliar
//fazer uma mais para reavaliar
//fazer uma mais para reavaliar