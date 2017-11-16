<?php
/**
 * Created by PhpStorm.
 * User: IgoR
 * Date: 05/10/2017
 * Time: 14:21
 */
include("../util/conecta.php");


function insereMembro($conexao, $m)
{

    $query = "insert into usuario (nome, usuario, senha, celular, ativo, email, cpf, telefone, endereco, rg, tipo) values
            ('{$m->getNome()}','{$m->getUsuario()}','{$m->getSenha()}','{$m->getCelular()}','{$m->getAtivo()}', '{$m->getEmail()}',
             '{$m->getCpf()}','{$m->getTelefone()}','{$m->getEndereco()}','{$m->getRg()}', '{$m->getTipo()}')";
    return mysqli_query($conexao, $query);
}


function listaMembros($conexao)
{
    $membros = array();
    $resultado = mysqli_query($conexao, "select * from usuario");
    while ($membro = mysqli_fetch_assoc($resultado)) {
        array_push($membros, $membro);
    }
    return $membros;
}


function listaMembrosAtivos($conexao)
{
    $membros = array();
    $resultado = mysqli_query($conexao, "select * from usuario where ativo=1");
    while ($membro = mysqli_fetch_assoc($resultado)) {
        array_push($membros, $membro);
    }
    return $membros;
}


function listaMembrosDesativados($conexao)
{
    $membros = array();
    $resultado = mysqli_query($conexao, "select * from usuario where ativo=0");
    while ($membro = mysqli_fetch_assoc($resultado)) {
        array_push($membros, $membro);
    }
    return $membros;
}


function inativarMembro($conexao, $idUsuario)
{
    $query = "update usuario set ativo='0' where idUsuario ='{$idUsuario}'";
    return mysqli_query($conexao, $query);
}

function alteraMembro($conexao, $m, $idUsuario)
{

    $query = "update usuario set nome= '{$m->getNome()}', usuario = '{$m->getUsuario()}', senha= '{$m->getSenha()}',
              celular = '{$m->getCelular()}', email= '{$m->getEmail()}', telefone='{$m->getTelefone()}',
              endereco='{$m->getEndereco()}', rg='{$m->getRg()}', tipo='{$m->getTipo()}' where idUsuario ='{$idUsuario}'";
    return mysqli_query($conexao, $query);

}


function ativarMembro($conexao, $idUsuario)
{
    $query = "update usuario set ativo='1' where idUsuario ='{$idUsuario}'";
    return mysqli_query($conexao, $query);
}

function buscaMembro($conexao, $idUsuario)
{
    $resultado = mysqli_query($conexao, "select * from usuario where idUsuario={$idUsuario}");
    return mysqli_fetch_assoc($resultado);
}

function listaColaboradoresAtivos($conexao)
{
    $membros = array();
    $resultado = mysqli_query($conexao, "select * from usuario where ativo=1 and tipo='Colaborador'");
    while ($membro = mysqli_fetch_assoc($resultado)) {
        array_push($membros, $membro);
    }
    return $membros;
}

function buscaLogin($conexao, $usuario, $senha)
{
    $resultado = mysqli_query($conexao, "select * from usuario where usuario='{$usuario}' and senha = '{$senha}'");
    return mysqli_fetch_assoc($resultado);

}

function verificaCpf($conexao, $cpf){
    $resultado = mysqli_query($conexao, "select * from usuario where cpf='{$cpf}'");
    return mysqli_fetch_assoc($resultado);
}