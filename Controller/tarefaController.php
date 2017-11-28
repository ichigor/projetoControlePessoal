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

require_once "../model/Historico.php";
require_once "../DAO/historicoDAO.php";

$funcionalidade = $_POST["funcionalidade"];


if ($funcionalidade == "create") {
    $nomeTarefa = $_POST["nomeTarefa"];
    $frequencia = $_POST["frequencia"];
    $idUsuario = $_POST["designado"];
    $dataInicial = $_POST["dataInicial"];
    $dataFinal = $_POST["dataFinal"];
    $descricao = $_POST["descricao"];
    $status = "Em andamento";
    $idUsuario = $_POST["designado"];

    $date = date_create($dataInicial);
    $dataInicial = date_format($date, "Y-m-d");

    $date = date_create($dataFinal);
    $dataFinal = date_format($date, "Y-m-d");


    verificaData($dataInicial, $dataFinal);

    $t = new Tarefa($nomeTarefa, $status, $frequencia, $descricao, $dataInicial, $dataFinal, $idUsuario);

    insereTarefa($t);

    $ultimaTarefa = buscarUltimaTarefa();

    $h = new Historico($nomeTarefa, $status, $frequencia, $descricao, $dataInicial, $dataFinal, $ultimaTarefa['max(idTarefa)'], $idUsuario);

    insereHistorico($h);

    $_SESSION["success"] = "Sua tarefa foi criada com sucesso ! ! !";
    header("Location: ../view/principalGerente.php");

} elseif ($funcionalidade == "update") {

    $idTarefa = $_POST["idTarefa"];
    $nomeTarefa = $_POST["nomeTarefa"];
    $frequencia = $_POST["frequencia"];
    $designado = $_POST["designado"];
    $dataInicial = $_POST["dataInicial"];
    $dataFinal = $_POST["dataFinal"];
    $descricao = $_POST["descricao"];
    $status = "";
    $idUsuario = $_POST["designado"];

    $date = date_create($dataInicial);
    $dataInicial = date_format($date, "Y-m-d");

    $date = date_create($dataFinal);
    $dataFinal = date_format($date, "Y-m-d");

    verificaData($dataInicial, $dataFinal);

    $t = new Tarefa($nomeTarefa, $status, $frequencia, $descricao, $dataInicial, $dataFinal, $idUsuario);

    //talvez adicionar para alterar o ultimo historico com idTarefa maior
    alteraTarefa($t, $idTarefa);



    $_SESSION["success"] = "Sua tarefa foi atualizada com sucesso ! ! !";
    header("Location: ../view/listarTarefas.php");

} elseif ($funcionalidade == "delete") {
    $idTarefa = $_POST["idTarefa"];
    $_SESSION["warning"] = "A tarefa selecionada foi cancelada com sucesso ! ! !";
    cancelarTarefa($idTarefa);
    header("Location: ../view/listarTarefas.php");
}

function verificaData($dataInicial, $dataFinal){
    if($dataInicial > $dataFinal){
        $_SESSION["danger"] = "Data inicial não pode ser maior que final ! ! !";
        header("Location: ../view/principalGerente.php");
        die();
    }
}
