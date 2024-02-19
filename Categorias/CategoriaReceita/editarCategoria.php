<?php #fazer
require "./../../config.php";

$id = $_GET['id'];
$sql = "SELECT * FROM CategoriaReceita WHERE id = :id";
$sql = $pdo->prepare($sql);
$sql->bindValue(":id", $id);
$sql->execute();
$item = $sql->fetch(PDO::FETCH_ASSOC);

$sql = "SELECT * FROM CategoriaReceita";
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
        <link rel="stylesheet" href="./../../styles/styleCategoria.css">
        <script type="text/javascript" src="./../../JavaScript/funcs.js"></script>
    </head>

    <body>
        <header>
            <nav>
                <ul class="rem">
                    <li><a href="./../../receitas.php">Receitas</a></li>
                    <li><a href="./../../Despesa/despesas.php">Despesas</a></li>
                    <li><a href="./../categorias.php">Categorias</a></li> 
                </ul>
            </nav>
        </header>

        <main>
            <section class="formulário">
                <form action="./confirmarEditarCategoria.php" method="get" onsubmit="return validar()">
                    <input type="hidden" name="id" value="<?= $item['id'] ?>">
                    <label>
                        Categoria
                        <input type="text" name="categoria" id="categoria" value="<?= $item['descricao']?>">
                    </label>
                    <button type="submit">Editar</button>
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
                        <?php foreach($dados as $contador => $dado) :?>
                            <tr>
                                <td><?= ++$contador ?></td>
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
