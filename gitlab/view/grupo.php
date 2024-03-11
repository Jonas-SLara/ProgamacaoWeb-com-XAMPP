<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cadastro_de_participantes</title>
    <link rel="stylesheet" href="../model/navbar.css">
    <link rel="stylesheet" href="../model/forms.css">
    <link rel="stylesheet" href="../model/tables.css">
</head>

<body>
    <?php
    session_start();
    if (!(isset($_SESSION['idA']) && isset($_SESSION['nomeA']))) {
        header("Location: ./login.html");
    }
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
    <div>
        <table class="line_table">
            <tr>
                <th>Nome</th>
                <th>Telefone</th>
                <th class="link_table"></th>
            </tr>
            <?php
            include '../model/crud.php';
            $idA = $_SESSION['idA'];
            $result = mostrar_integrantes($idA);
            foreach ($result as $row) {
                echo "<tr>
                <td>$row[nomeP]</td>
                <td>$row[telefone]</td>
                <td class='link_table'>
                <a href='editar_integrante.php?codigoP=$row[idP]'>Editar</a>
                </td>
                </tr>";
            }
            ?>
            <caption>Seu Grupo</caption>
        </table>
    </div>
</body>

</html>