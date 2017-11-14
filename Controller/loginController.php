<?php
/**
 * Created by PhpStorm.
 * User: IgoR
 * Date: 10/11/2017
 * Time: 20:44
 */


require_once "../model/Membro.php";
require_once  "../DAO/membroDAO.php";
require_once "../util/mostraAlerta.php";


$funcionalidade = $_POST["funcionalidade"];

if($funcionalidade == "logar"){
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];

    $resultado = buscaLogin($conexao, $usuario, $senha);

    if($resultado == null){
        $_SESSION["danger"] = "Usuario ou senha invalido.";
        header("Location: ../index.php");
    }else{
        $_SESSION["usuario_logado"]=$resultado['nome'];
        $_SESSION["usuario_id"]=$resultado['idUsuario'];
        if($resultado["tipo"] == "Gerente"){

            header("Location: ../view/principalGerente.php");
        }else{
            header("Location: ../view/principalColaborador.php");
        }
    }
}else if ($funcionalidade == "deslogar"){
    session_destroy();
    session_start();
    header("Location: ../index.php");
}


function verificaUsuario(){
    if(!isset($_SESSION["usuario_logado"])){
        $_SESSION["danger"]= "Você não tem acesso a esta funcionlidade.";
        header("Location: ../index.php");
    }
}