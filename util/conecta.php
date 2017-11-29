<?php
/**
 * Created by PhpStorm.
 * User: IgoR
 * Date: 05/10/2017
 * Time: 14:17
 */
//$conexao = mysqli_connect("localhost", "root", "", "projetoIntegrador");
////$conexao = mysqli_connect("ipobfcpvprjpmdo9.cbetxkdyhwsb.us-east-1.rds.amazonaws.com", "szsb1h8zi5dw2atz", "zjg1ei8rvnc9vrzo", "xuhitdelpl3u60i6");
//
//
//if (!$conexao->set_charset("utf8")) {
//    exit();
//}

class conexao{

    private $servidor;
    private $usuario;
    private $senha;
    private $db;
    private $con;

    public function __construct()
    {
        $this->servidor = 'localhost';
        $this->usuario = 'root';
        $this->senha = '';
        $this->db = 'projetoIntegrador';
    }

//    public function __construct()
//    {
//        $this->servidor = 'ipobfcpvprjpmdo9.cbetxkdyhwsb.us-east-1.rds.amazonaws.com';
//        $this->usuario = 'szsb1h8zi5dw2atz';
//        $this->senha = 'zjg1ei8rvnc9vrzo';
//        $this->db = 'xuhitdelpl3u60i6';
//    }


    public function conectar() {
        global $con;
        $con = mysqli_connect(
            $this->servidor,
            $this->usuario,
            $this->senha) or die(mysqli_error());
        mysqli_select_db($con, $this->db) or die(mysqli_error("Dados do banco invalidos!"));
    }

    public function fechar() {
        global $con;
        mysqli_close($con);
    }

    public function query($sql) {
        global $con;
        $query = mysqli_query($con, $sql);
        return $query;
    }


}