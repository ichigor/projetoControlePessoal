<?php
/**
 * Created by PhpStorm.
 * User: IgoR
 * Date: 10/10/2017
 * Time: 14:05
 */

class Tarefa
{

    public $nomeTarefa;
    public $status;
    public $frequencia;
    public $descricao;
    public $dataInicial;
    public $dataFinal;
    public $idUsuario;

    /**
     * Tarefa constructor.
     * @param $nomeTarefa
     * @param $status
     * @param $frequencia
     * @param $descricao
     * @param $dataInicial
     * @param $dataFinal
     * @param $idUsuario
     */
    public function __construct($nomeTarefa, $status, $frequencia, $descricao, $dataInicial, $dataFinal, $idUsuario)
    {
        $this->nomeTarefa = $nomeTarefa;
        $this->status = $status;
        $this->frequencia = $frequencia;
        $this->descricao = $descricao;
        $this->dataInicial = $dataInicial;
        $this->dataFinal = $dataFinal;
        $this->idUsuario = $idUsuario;
    }

    /**
     * @return mixed
     */
    public function getNomeTarefa()
    {
        return $this->nomeTarefa;
    }

    /**
     * @param mixed $nomeTarefa
     */
    public function setNomeTarefa($nomeTarefa)
    {
        $this->nomeTarefa = $nomeTarefa;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getFrequencia()
    {
        return $this->frequencia;
    }

    /**
     * @param mixed $frequencia
     */
    public function setFrequencia($frequencia)
    {
        $this->frequencia = $frequencia;
    }

    /**
     * @return mixed
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * @param mixed $descricao
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    /**
     * @return mixed
     */
    public function getDataInicial()
    {
        return $this->dataInicial;
    }

    /**
     * @param mixed $dataInicial
     */
    public function setDataInicial($dataInicial)
    {
        $this->dataInicial = $dataInicial;
    }

    /**
     * @return mixed
     */
    public function getDataFinal()
    {
        return $this->dataFinal;
    }

    /**
     * @param mixed $dataFinal
     */
    public function setDataFinal($dataFinal)
    {
        $this->dataFinal = $dataFinal;
    }

    /**
     * @return mixed
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    /**
     * @param mixed $idUsuario
     */
    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }




}