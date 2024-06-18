<?php
session_start();
include_once("conexao.php");


if (isset($_POST["subst"])) 
{
    $nome = $_POST["subst"];
    if($_POST["subst"] == "nome")
    {
        $msg = "Ola RENAN0";
    }
    if($_POST["subst"] == "data")
    {
        $msg="A data de hoje é";
    }
    if($_POST["subst"] == "materia")
    {
        $msg = "A materia é portugues";
    }
}

    echo $msg;
?>

