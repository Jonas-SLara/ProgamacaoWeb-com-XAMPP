<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar_integrante</title>
    <link rel="stylesheet" href="../model/navbar.css">
    <link rel="stylesheet" href="../model/forms.css">
</head>
<body>
    <?php
        include '../model/crud.php';

        session_start();
        if (!(isset($_SESSION['idA']) && isset($_SESSION['nomeA']))) {
            header("Location: ./login.html");
        }

        $result=obter_integrante($_GET['codigoP']);
        $row=mysqli_fetch_assoc($result);
    ?>
    <div id="menu_top">
        <nav class="Navbar1">
            <div class="NavbarImagem">
                <img src="../img/logo.png">
            </div>
            <ul class="NavbarLista">
                <li><a href="./index.php">voltar</a></li>
                <li><a href="./cadastro_de_participantes.php">adicionar no grupo</a></li>
                <li class="sobre">
                <a href="./cadastro_de_participantes.php">
                <?php echo $_SESSION['nomeA']?></a></li>
            </ul>
        </nav>
        <form method="post" action="../control/controle.php" class="nav_sair">
            <button type="submit" value="sair" name="op" class="info">Sair</button>
        </form>
    </div>
    <main>
    <h2 class="textoForm">editar_integrante <?php echo $row['nomeP']?></h2>
        <form class="formularioClassico" method="post" action="../control/controledoGrupo.php">
            <label for="nomeP"><span>__</span>Editar nome: </label>
            <input id="nomeP" type="text" maxlength="50" name="nomeP" autocomplete="off"
            placeholder="<?=$row['nomeP']?>" value="<?=$row['nomeP']?>"><br>
            <label for="telefone">Editar Telefone: </label>
            <input type="text" id="telefone" maxlength="15" name="telefone" autocomplete="off"
            placeholder="<?=$row['telefone']?>" value="<?=$row['telefone']?>" onkeyup="telefone(this)"><br>
            <input type="hidden" value="<?=$row['idP']?>" name="idP">
            <button value="update" name="op" type="submit" class="submit">Alterar</button>
            <button value="delet" name="op" type="submit" class="danger">Excluir</button>
        </form>
    </main>
    <script src="../model/script.js"></script>
</body>
</html>