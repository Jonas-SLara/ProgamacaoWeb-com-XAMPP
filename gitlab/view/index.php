<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina do Administrador</title>
    <link rel="stylesheet" href="../model/navbar.css">
    <link rel="stylesheet" href="../model/forms.css">
    <link rel="stylesheet" href="../model/layout.css">
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
            <li><a href="./cadastro_de_participantes.php">adicionar no grupo</a></li>
            <li class="sobre"><a href="#"><?php echo $_SESSION['nomeA']?></a></li>
        </ul>
    </nav>
    <form method="post" action="../control/controle.php" class="nav_sair">
        <button type="submit" value="sair" name="op" class="info">Sair</button>
    </form>
    </div>
    <main class="grid1">
        <header class="item">
            <h3>guarde seus melhores codigos aqui</h3>
            <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
            ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco 
            laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit 
            in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
            non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
        </header>
        <aside class="item">
            <h3>Tutorial</h3>
            <ol>
                <li>instale a ferramenta git para seu SO</li>
                <li>leia a documentação oficial do git</li>
                <li>inicie um repositorio remoto no gitlab</li>
                <li>no terminal git bash inicie:</li>
                <ul>
                    <li>git init</li>
                    <li>git add .</li>
                    <li>git commit -m ...</li>
                    <li>git remote add origin 'href'</li>
                    <li>git pull origin main</li>
                    <li>git push -u origin main</li>
                </ul>
            </ol>
        </aside>
        <section class="item"></section>
    </main>
</body>
</html>