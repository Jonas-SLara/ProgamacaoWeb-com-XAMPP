<?php
    include '../model/crud.php';

    $op=$_POST['op'];

    if($op=="cadastrar"){
        $senhaA=sha1($_POST["senha"]);
        $nomeA=$_POST["nome"];
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
        $senhaA=sha1($_POST["senha"]);
        $nomeA=$_POST["nome"];
        acessar($nomeA, $senhaA);      
    }
    else if($op== "alterar"){
        alterar_maquina($_POST["idM"], $_POST["marca"], $_POST["descricao"]);
        echo "<script>window.location.href = '../view/index.php';</script>";
    }
    else if($op=="sair"){
        session_start();
        session_destroy();
        echo "<script>alert('sua sessão terminou');</script>";
        echo "<script>window.location.href = '../view/login.html';</script>";
    }
?>