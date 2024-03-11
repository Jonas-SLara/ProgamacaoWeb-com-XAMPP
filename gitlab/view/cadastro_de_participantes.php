<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cadastro_de_participantes</title>
    <link rel="stylesheet" href="../model/navbar.css">
    <link rel="stylesheet" href="../model/forms.css">
</head>
<body>
    <?php 
        session_start();
        if(!(isset($_SESSION['idA']) && isset($_SESSION['nomeA']))){
            header("Location: ./login.html");
        }
    ?>
    <div id="menu_top">
    <nav class="Navbar1">
        <div class="NavbarImagem">
            <img src="../img/logo.png">
        </div>
        <ul class="NavbarLista">
            <li><a href="./grupo.php">seu grupo</a></li>
            <li><a href="./index.php">home</a></li>
            <li class="sobre"><a href="#"><?php echo $_SESSION['nomeA']?></a></li>
        </ul>
    </nav>
    <form method="post" action="../control/controle.php" class="nav_sair">
        <button type="submit" value="sair" name="op" class="info">Sair</button>
    </form>
    </div>
    <main>
        <h2 class="textoForm">Adicionar Participante</h2>
        <form class="formularioClassico" method="post" action="../control/controledoGrupo.php">
            <label for="nomeP">Nome do Participante: </label>
            <input id="nomeP" type="text" maxlength="50" name="nomeP" autocomplete="off"><br>
            <label for="telefone"><span>___________</span>Telefone</label>
            <input type="text" id="telefone" maxlength="15" name="telefone"
             autocomplete="off"><br>
            <input type="hidden" value="<?php echo $_SESSION['idA'];?>" name="idA">
            <button value="create" name="op" type="submit" class="submit">Submit</button>
        </form>
    </main>
    <script src="../model/script.js"></script>
</body>
</html>