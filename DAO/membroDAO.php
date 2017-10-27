<?php
/**
 * Created by PhpStorm.
 * User: IgoR
 * Date: 05/10/2017
 * Time: 14:21
 */
require_once("../util/conecta.php");


function insereMembro($conexao, $m){

    $query="insert into usuario (nome, usuario, senha, celular, ativo, email, cpf, telefone, endereco, rg, tipo) values
            ('{$m->nome}','{$m->usuario}','{$m->senha}','{$m->celular}','{$m->ativo}', '{$m->email}', '{$m->cpf}','{$m->telefone}','{$m->endereco}','{$m->rg}', '{$m->tipo}')";
    return mysqli_query($conexao, $query);
}


function listaMembros($conexao){
    $membros = array();
    $resultado = mysqli_query($conexao, "select * from usuario");
    while($membro = mysqli_fetch_assoc($resultado)){
        array_push($membros,$membro);
    }
    return $membros;
}


function listaMembrosAtivos($conexao){
    $membros = array();
    $resultado = mysqli_query($conexao, "select * from usuario where ativo=1");
    while($membro = mysqli_fetch_assoc($resultado)){
        array_push($membros,$membro);
    }
    return $membros;
}


function listaMembrosDesativados($conexao){
    $membros = array();
    $resultado = mysqli_query($conexao, "select * from usuario where ativo=0");
    while($membro = mysqli_fetch_assoc($resultado)){
        array_push($membros,$membro);
    }
    return $membros;
}


function inativarMembro($conexao, $idUsuario){
    $query = "update usuario set ativo='0' where idUsuario ='{$idUsuario}'";
    return mysqli_query($conexao, $query);
}

function alteraMembro($conexao, $m, $idUsuario){

    $query = "update usuario set nome= '{$m->nome}', usuario = '{$m->usuario}', senha= '{$m->senha}',celular = '{$m->celular}', email= '{$m->email}', telefone='{$m->telefone}', endereco='{$m->endereco}', rg='{$m->rg}', tipo='{$m->tipo}' where idUsuario ='{$idUsuario}'";
    return mysqli_query($conexao, $query);

}


function ativarMembro($conexao, $idUsuario){
    $query = "update usuario set ativo='1' where idUsuario ='{$idUsuario}'";
    return mysqli_query($conexao, $query);
}

function buscaMembro($conexao, $idUsuario){
    $resultado = mysqli_query($conexao, "select * from usuario where idUsuario={$idUsuario}");
    return mysqli_fetch_assoc($resultado);
}