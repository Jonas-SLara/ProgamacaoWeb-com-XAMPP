<?php
    include '../model/crud.php';

    $op=$_POST['op'];

    if($op=="registrar"){
        $senhaA=sha1($_POST["senhaA"]);
        $nomeA=$_POST["nomeA"];
       if(cadastrar($nomeA, $senhaA)){
            //true ao cadastrar
            echo "<script>alert('ola ' + '$nomeA' + ' sua conta foi criada com êxito');</script>";
            echo "<script>window.location.href = '../view/login.html';</script>";
       }else{
            echo "<script>alert('este nome de usuario ja existe!');</script>";
            echo "<script>window.location.href = '../view/login.html';</script>";
       }
    }
    else if($op=="acessar"){
        $senhaA=sha1($_POST["senhaA"]);
        $nomeA=$_POST["nomeA"];
        acessar($nomeA, $senhaA);      
    }
    else if($op=="sair"){
        session_start();
        session_destroy();
        echo "<script>alert('sua sessão terminou');</script>";
        echo "<script>window.location.href = '../view/login.html';</script>";
    }
?>