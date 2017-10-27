<?php
/**
 * Created by PhpStorm.
 * User: IgoR
 * Date: 17/10/2017
 * Time: 15:03
 */

require_once "../model/Membro.php";
require_once  "../DAO/membroDAO.php";

$funcionalidade = $_POST["funcionalidade"];


if($funcionalidade == "create"){
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

    insereMembro($conexao, $m);

    header("Location: ../view/principalGerente.php");

}elseif ($funcionalidade == "update"){

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

    header("Location: ../view/listarMembros.php");

}elseif ($funcionalidade == "list"){
    listaMembros($conexao);
}elseif ($funcionalidade == "delete"){
    $idUsuario = $_POST["idUsuario"];
    inativarMembro($conexao, $idUsuario);
    header("Location: ../view/listarMembros.php");
}elseif ($funcionalidade == "active"){
    $idUsuario = $_POST["idUsuario"];
    ativarMembro($conexao, $idUsuario);
    header("Location: ../view/recuperarMembro.php");
}


