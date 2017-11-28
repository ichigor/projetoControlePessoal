<?php
/**
 * Created by PhpStorm.
 * User: IgoR
 * Date: 05/10/2017
 * Time: 14:21
 */
require_once("../util/conecta.php");


function insereMembro($m)
{
    $db = new conexao();
    $db->conectar();
    $sql = "insert into usuario (nome, usuario, senha, celular, ativo, email, cpf, telefone, endereco, rg, tipo) values
            ('{$m->getNome()}','{$m->getUsuario()}','{$m->getSenha()}','{$m->getCelular()}','{$m->getAtivo()}', '{$m->getEmail()}',
             '{$m->getCpf()}','{$m->getTelefone()}','{$m->getEndereco()}','{$m->getRg()}', '{$m->getTipo()}')";
    $resultado = $db->query($sql);
    $db->fechar();
    return $resultado;
}


function listaMembros()
{
    $db = new conexao();
    $db->conectar();
    $membros = array();
    $sql = "select * from usuario";
    $resultado = $db->query($sql);
    while ($membro = mysqli_fetch_assoc($resultado)) {
        array_push($membros, $membro);
    }
    $db->fechar();
    return $membros;
}


function listaMembrosAtivos()
{
    $db = new conexao();
    $db->conectar();
    $membros = array();
    $sql = "select * from usuario where ativo=1";
    $resultado = $db->query($sql);
    while ($membro = mysqli_fetch_assoc($resultado)) {
        array_push($membros, $membro);
    }
    $db->fechar();
    return $membros;
}


function listaMembrosDesativados()
{
    $db = new conexao();
    $db->conectar();
    $membros = array();
    $sql = "select * from usuario where ativo=0";
    $resultado = $db->query($sql);
    while ($membro = mysqli_fetch_assoc($resultado)) {
        array_push($membros, $membro);
    }
    $db->fechar();
    return $membros;
}


function inativarMembro($idUsuario)
{
    $db = new conexao();
    $db->conectar();
    $sql = "update usuario set ativo='0' where idUsuario ='{$idUsuario}'";
    $resultado = $db->query($sql);
    $db->fechar();
    return $resultado;
}

function alteraMembro($m, $idUsuario)
{
    $db = new conexao();
    $db->conectar();
    $sql = "update usuario set nome= '{$m->getNome()}', usuario = '{$m->getUsuario()}', senha= '{$m->getSenha()}',
              celular = '{$m->getCelular()}', email= '{$m->getEmail()}', telefone='{$m->getTelefone()}',
              endereco='{$m->getEndereco()}', rg='{$m->getRg()}', tipo='{$m->getTipo()}' where idUsuario ='{$idUsuario}'";
    $resultado = $db->query($sql);
    $db->fechar();
    return $resultado;

}


function ativarMembro($idUsuario)
{
    $db = new conexao();
    $db->conectar();
    $sql ="update usuario set ativo='1' where idUsuario ='{$idUsuario}'";
    $resultado = $db->query($sql);
    $db->fechar();
    return $resultado;
}

function buscaMembro($idUsuario)
{
    $db = new conexao();
    $db->conectar();
    $sql ="select * from usuario where idUsuario={$idUsuario}";
    $resultado = mysqli_fetch_assoc($db->query($sql));
    $db->fechar();
    return $resultado;
}

function listaColaboradoresAtivos()
{
    $db = new conexao();
    $db->conectar();
    $membros = array();
    $sql ="select * from usuario where ativo=1 and tipo='Colaborador'";
    $resultado = $db->query($sql);
    while ($membro = mysqli_fetch_assoc($resultado)) {
        array_push($membros, $membro);
    }
    $db->fechar();
    return $membros;
}

function buscaLogin($usuario, $senha)
{
    $db = new conexao();
    $db->conectar();
    $sql = "select * from usuario where usuario='{$usuario}' and senha = '{$senha}'";
    $resultado = mysqli_fetch_assoc($db->query($sql));
    $db->fechar();
    return $resultado;

}

function verificaCpf($cpf){
    $db = new conexao();
    $db->conectar();
    $sql ="select * from usuario where cpf='{$cpf}'";
    $resultado = mysqli_fetch_assoc($db->query($sql));
//    $resultado = mysqli_query($conexao, "select * from usuario where cpf='{$cpf}'");
    $db->fechar();
    return $resultado;
}