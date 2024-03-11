<?php
    include 'conexao.php';
    function cadastrar($nomeA, $senhaA){//senha ja vem criptrogafada
        Conexao::connect();
        $result=Conexao::query("SELECT * FROM administradores WHERE administradores.nomeA='$nomeA';");
        $existe = (mysqli_num_rows($result) > 0)? true: false;
        if(!$existe){
            //não existe entao true cadastrar
            Conexao::query("INSERT INTO administradores (nomeA, senhaA) VALUES ('$nomeA', '$senhaA');");
            Conexao::close();
            return true; //cadastrou
        }
        else{
            Conexao::close();
            return false; //não permitiu cadastrar
        }
    }
    
    function acessar($nomeA, $senhaA){
        Conexao::connect();
        $result = Conexao::query("SELECT * FROM administradores WHERE administradores.nomeA='$nomeA';");
        //pelo limite de um usuario por nome retornara uma linha apenas
        $conectou = false;
        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result)){
                if($row['nomeA']==$nomeA && $row['senhaA']==$senhaA){
                    session_start();
                    $_SESSION['nomeA']=$row['nomeA'];
                    $_SESSION['idA']=$row['idA'];
                    $conectou = true;
                }
            }
        }
        Conexao::close();
        if($conectou){
            header("Location: ../view/index.php");
            exit;
        }else{
            echo "<script>alert('dados invalidos!');</script>";
            echo "<script>window.location.href = '../view/login.html';</script>";
        }
    }
    //pegar idA pelo session
    function adicionar_integrante($idA, $nomeP, $telefone){
        Conexao::connect();
        Conexao::query("INSERT INTO progamadores (idA, nomeP, telefone)
         values('$idA', '$nomeP', '$telefone');");
        Conexao::close();
    }
    //WHERE progamadores.idA='$idA' daquele administrado
    function mostrar_integrantes($idA){ 
        Conexao::connect();
        $result=Conexao::query("SELECT * FROM progamadores WHERE
         progamadores.idA='$idA';");
        Conexao::close();
        return $result;
    }
    //pegar um determinado integrante para editalo
    function obter_integrante($idP){
        Conexao::connect();
        $result=Conexao::query("SELECT * FROM progamadores
         WHERE progamadores.idP='$idP';");
        Conexao::close();
        return $result;
    }
    //excluir um integrante pelo metodo post
    function excluir_integrante($idP){
        Conexao::connect();
        Conexao::query("DELETE FROM progamadores WHERE progamadores.idP='$idP';");
        Conexao::close();
    }
    //alterar um integrante
    function alterar_integrante($idP, $nomeP, $telefone){
        Conexao::connect();
        Conexao::query("UPDATE progamadores SET nomeP='$nomeP', telefone='$telefone'
         WHERE progamadores.idP='$idP';");
        Conexao::close();
    }
?>