<?php
/**
 * Created by PhpStorm.
 * User: IgoR
 * Date: 10/10/2017
 * Time: 14:05
 */


function insereHistorico($conexao, $h)
{
    $query = "insert into historico (nomeTarefa, status, frequencia, descricao, dataInicial, dataFinal, idUsuario) values
            ('{$h->nomeTarefa}','{$h->status}','{$h->frequencia}','{$h->descricao}','{$h->dataInicial}', '{$h->dataFinal}','{$h->idUsuario}')";
    return mysqli_query($conexao, $query);
}
