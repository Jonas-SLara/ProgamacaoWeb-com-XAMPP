<?php
include "conexao.php";
function cadastrar($nome, $senha){//senha ja vem criptrogafada
    connect();
    $result=query("SELECT * FROM dono WHERE dono.nome='$nome';");
    $existe = (mysqli_num_rows($result) > 0)? true: false;
    if(!$existe){
        //não existe entao true cadastrar
        query("INSERT INTO dono (nome, senha) VALUES ('$nome', '$senha');");
        close();
        return true; //cadastrou
    }
    else{
        close();
        return false; //não permitiu cadastrar
    }
}

function acessar($nome, $senha){
    connect();
    $result = query("SELECT * FROM dono WHERE dono.nome='$nome';");
    $conectou = false;
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)){
            if($row['nome']==$nome && $row['senha']==$senha){
                session_start();
                $_SESSION['nome']=$row['nome'];
                $_SESSION['idD']=$row['idD'];
                $conectou = true;
            }
        }
    }
    close();
    if($conectou){
        header("Location: ../view/index.php");
        exit;
    }else{
        echo "<script>alert('dados invalidos!');</script>";
        echo "<script>window.location.href = '../view/login.html';</script>";
    }
}

function mostrar_maquinas($idD){ 
    connect();
    $result=query("SELECT * FROM maquina WHERE
     maquina.idD='$idD';");
    close();
    return $result;
}
//pegar uma maquina para editala
function obter_maquina($idM){
    connect();
    $result=query("SELECT * FROM maquina
     WHERE maquina.idM='$idM';");
    close();
    return $result;
}

function alterar_maquina($idM, $marca, $descricao){
    connect();
    query("UPDATE maquina SET marca='$marca', descricao='$descricao'
     WHERE maquina.idM='$idM';");
    close();
}

?>