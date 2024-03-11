<?php 
    include '../model/crud.php';

    $op = $_POST["op"];
    switch($op){
            //inserir usuario no grupo
        case "create":
            $idA=$_POST['idA'];
            $nomeP=$_POST['nomeP'];
            $telefone=$_POST['telefone'];
            adicionar_integrante($idA, $nomeP, $telefone);
            echo "<script> alert('integrante ' + '$nomeP' + ' foi adicionado(a)');</script>";
            echo "<script>window.location.href = '../view/grupo.php';</script>";
            break;
            //alterar as informações de um usuario
        case "update":
            $nomeP=$_POST['nomeP'];
            $telefone=$_POST['telefone'];
            $idP = $_POST["idP"];
            alterar_integrante($idP, $nomeP, $telefone);
            echo "<script>window.location.href = '../view/grupo.php';</script>";
            break;
            //remover um usuario daquele grupo
        case "delet":
            $idP = $_POST["idP"];
            echo "<script> alert('o integrante sera removido(a)');</script>";
            excluir_integrante($idP);
            echo "<script>window.location.href = '../view/grupo.php';</script>";
            break;
    }
?>