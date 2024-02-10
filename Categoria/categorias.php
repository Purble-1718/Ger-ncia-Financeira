<?php 
require "./../config.php";

$sql = "SELECT * FROM Categoria";
$sql = $pdo->prepare($sql);
$sql->execute();
$dados = $sql->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>GestãoFinanceira</title>
        <link rel="stylesheet" href="./../styles/styleCategoria.css">
    </head>

    <body>
        <header>
            <nav>
                <ul class="rem">
                    <li><a href="./../receitas.php">Receitas</a></li>
                    <li><a href="">Despesas</a></li>
                    <li><a href="./categorias.php">Categorias</a></li> 
                </ul>
            </nav>
        </header>

        <main>
            <section class="formulário">
                <form action="./cadastrarCategoria.php" method="get">
                    <label>
                        Categoria
                        <input type="text" name="categoria">
                    </label>
                    <button type="submit">Adicionar</button>
                </form>
            </section>

            <section class="tabela">
                <table border="1">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Categoria</th>
                            <th>Opções</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($dados as $dado) :?>
                            <tr>
                                <td><?= $dado['id'] ?></td>
                                <td><?= $dado['descricao'] ?></td>
                                <td>
                                <a href="./deletarCategoria.php?id=<?= $dado['id'] ?>"><i class="fa-solid fa-trash"></i></a> 
                                <a href="./editarCategoria.php?id=<?= $dado['id'] ?>"><i class="fa-regular fa-pen-to-square"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </section>
        </main>
        <script src="https://kit.fontawesome.com/561265e797.js" crossorigin="anonymous"></script> <!--Importa biblioteca de fontes. link do script que contém os ícones. crossorigin é para pegar recursos sem verificação -->      
    </body>
</html>
