<?php
/**
 * Created by PhpStorm.
 * User: IgoR
 * Date: 26/09/2017
 * Time: 15:05
 */

class templateController
{
    public function template()
    {
        include "../view/template.php";
    }

    public function templateF()
    {
        include "../view/templateFooter.php";
    }

    public function templateFColaborador()
    {
        include "../view/templateFooterColaborador.php";
    }

    public function templateColaborador()
    {
        include "../view/templateColaborador.php";
    }

    public function menuHome()
    {
        include "../view/menuHome.php";
    }

    public function menuMembros()
    {
        include "../view/menuMembros.php";
    }

    public function menuTarefas()
    {
        include "../view/menuTarefas.php";
    }

    public function menuHomeColaborador()
    {
        include "../view/menuHomeColaborador.php";
    }

    public function menuMembrosColaborador()
    {
        include "../view/menuMembrosColaborador.php";
    }

    public function menuTarefasColaborador()
    {
        include "../view/menuTarefasColaborador.php";
    }

}