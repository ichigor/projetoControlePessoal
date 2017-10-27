<?php
/**
 * Created by PhpStorm.
 * User: IgoR
 * Date: 05/10/2017
 * Time: 15:34
 */


class Membro{

    public $nome;
    public $usuario;
    public $senha;
    public $celular;
    public $ativo;
    public $email;
    public $cpf;
    public $telefone;
    public $endereco;
    public $rg;
    public $tipo;

    /**
     * Usuario constructor.
     * @param $nome
     * @param $usuario
     * @param $senha
     * @param $celular
     * @param $ativo
     * @param $mail
     * @param $cpf
     * @param $telefone
     * @param $endereco
     * @param $rg
     * @param $tipo
     */
    public function __construct($nome, $usuario, $senha, $celular, $ativo, $email, $cpf, $telefone, $endereco, $rg, $tipo)
    {
        $this->nome = $nome;
        $this->usuario = $usuario;
        $this->senha = $senha;
        $this->celular = $celular;
        $this->ativo = $ativo;
        $this->email = $email;
        $this->cpf = $cpf;
        $this->telefone = $telefone;
        $this->endereco = $endereco;
        $this->rg = $rg;
        $this->tipo = $tipo;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return mixed
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * @param mixed $usuario
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    /**
     * @return mixed
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * @param mixed $senha
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    /**
     * @return mixed
     */
    public function getCelular()
    {
        return $this->celular;
    }

    /**
     * @param mixed $celular
     */
    public function setCelular($celular)
    {
        $this->celular = $celular;
    }

    /**
     * @return mixed
     */
    public function getAtivo()
    {
        return $this->ativo;
    }

    /**
     * @param mixed $ativo
     */
    public function setAtivo($ativo)
    {
        $this->ativo = $ativo;
    }

    /**
     * @return mixed
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param mixed $mail
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
    }

    /**
     * @return mixed
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * @param mixed $cpf
     */
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }

    /**
     * @return mixed
     */
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * @param mixed $telefone
     */
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }

    /**
     * @return mixed
     */
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * @param mixed $endereco
     */
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
    }

    /**
     * @return mixed
     */
    public function getRg()
    {
        return $this->rg;
    }

    /**
     * @param mixed $rg
     */
    public function setRg($rg)
    {
        $this->rg = $rg;
    }

    /**
     * @return mixed
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param mixed $tipo
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }




}