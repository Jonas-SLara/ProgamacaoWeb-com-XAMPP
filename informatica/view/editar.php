<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <?php
    session_start();
    if (!(isset($_SESSION['idD']) && isset($_SESSION['nome']))) {
        header("Location: ./login.html");
    }
    ?>
    <div class="container text-bg-success p-3">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Ola
                    <?php echo "$_SESSION[nome]"; ?>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="#"> </a>
                        </li>
                        <li class="nav-item">
                            <a href="./index.php" class="btn btn-light nav-link active">Voltar</a>
                        </li>
                    </ul>
                    <form class="d-flex" method="post" action="../control/controle.php">
                        <button class="btn btn-warning" type="submit" value="sair" name="op">Sair</button>
                    </form>

                </div>
            </div>
        </nav>
    </div>
    <div class="container p-3 mb-2 bg-info text-dark">
        <?php
        include "../model/crud.php";
        $result = obter_maquina($_GET["idM"]);
        foreach ($result as $row)
            ;
        ?>
        <h2>editar
            <?php echo $row['descricao']; ?>
        </h2>
        <div class="container">
            <form method="post" action="../control/controle.php">
                <label for="descricao" class="form-label">Editar descrição: </label>
                <input id="descricao" type="text" maxlength="50" name="descricao" autocomplete="off"
                    placeholder="<?= $row['descricao'] ?>" value="<?= $row['descricao'] ?>" class="form-control"><br>
                <label for="marca" class="form-label">Editar Marca: </label>
                <input type="text" id="marca" maxlength="50" name="marca" autocomplete="off"
                    placeholder="<?= $row['marca'] ?>" value="<?= $row['marca'] ?>" class="form-control"><br>
                <input type="hidden" value="<?= $row['idM'] ?>" name="idM" class="form-control">
                <button value="alterar" name="op" type="submit" class="btn btn-warning">Alterar</button>
            </form>
        </div>
    </div>
</body>

</html>