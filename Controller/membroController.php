<?php
/**
 * Created by PhpStorm.
 * User: IgoR
 * Date: 17/10/2017
 * Time: 15:03
 */

require_once "../model/Membro.php";
require_once "../DAO/membroDAO.php";
require_once "../util/mostraAlerta.php";

$funcionalidade = $_POST["funcionalidade"];


if ($funcionalidade == "create") {
    $nome = $_POST["nome"];
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];
    $celular = $_POST["celular"];
    $email = $_POST['email'];
    $cpf = $_POST["cpf"];
    $telefone = $_POST["telefone"];
    $endereco = $_POST["endereco"];
    $rg = $_POST["rg"];
    $ativo = 1;
    $tipo = $_POST["tipo"];

    verificaCpfExistente($conexao, $cpf);

    $m = new Membro($nome, $usuario, $senha, $celular, $ativo, $email, $cpf, $telefone, $endereco, $rg, $tipo);

    insereMembro($conexao, $m);

    $_SESSION["success"] = "Membro cadastrado com sucesso ! ! !";
    header("Location: ../view/principalGerente.php");

} elseif ($funcionalidade == "update") {

    $idUsuario = $_POST["idUsuario"];
    $nome = $_POST["nome"];
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];
    $celular = $_POST["celular"];
    $email = $_POST['email'];
    $cpf = $_POST["cpf"];
    $telefone = $_POST["telefone"];
    $endereco = $_POST["endereco"];
    $rg = $_POST["rg"];
    $ativo = 1;
    $tipo = $_POST["tipo"];

    $m = new Membro($nome, $usuario, $senha, $celular, $ativo, $email, $cpf, $telefone, $endereco, $rg, $tipo);

    alteraMembro($conexao, $m, $idUsuario);

    $_SESSION["success"] = "Membro alterado com sucesso ! ! !";
    header("Location: ../view/listarMembros.php");

} elseif ($funcionalidade == "list") {
    listaMembros($conexao);
} elseif ($funcionalidade == "delete") {
    $idUsuario = $_POST["idUsuario"];
    inativarMembro($conexao, $idUsuario);
    $_SESSION["warning"] = "Membro inativado com sucesso ! ! !";
    header("Location: ../view/listarMembros.php");
} elseif ($funcionalidade == "active") {
    $idUsuario = $_POST["idUsuario"];
    ativarMembro($conexao, $idUsuario);
    $_SESSION["success"] = "Membro recuperado com sucesso ! ! !";
    header("Location: ../view/recuperarMembro.php");
}


function verificaCpfExistente($conexao, $cpf){
    $retorno = verificaCpf($conexao, $cpf);
    if($retorno == NULL){
    }else{
        $_SESSION["danger"] = "Ja existe um membro com este CPF cadastrado ! ! !";
        header("Location: ../view/principalGerente.php");
        die();
    }

}


