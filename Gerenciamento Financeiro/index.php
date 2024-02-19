<?php
require "./../config.php";

$sql = "SELECT * FROM Receita";
$sql = $pdo->prepare($sql); #pdo->Classe de conexão com banco de dados; preparando uma consulta usando o pdo. O objeto pdo está preparando uma consulta no banco de dados, consulta dentro do $sql. sql vai receber um PDOStatement que tem todas as informações que foram passadas para o banco de dados, agora é só executar.
$sql->execute(); #executa a consulta de antes. A "->" acessa métodos de um objeto.
$dados = $sql->fetchAll(PDO::FETCH_ASSOC); #fecthAll: Recupera os resultados da execução da consulta; Argumento PDO::FETCH_ASSOC: Organiza o resultado em formato de array associativo, chaves==nome colunas banco de dados.

$sql = "SELECT * FROM CategoriaReceita";
$sql = $pdo->prepare($sql);
$sql->execute();
$infos = $sql->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Roboto:wght@300&display=swap"
        rel="stylesheet">
    <script src="https://kit.fontawesome.com/0dc18b9928.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./../JavaScript/cadastro.js"></script>
    <title>Gerenciamento Financeiro</title>
</head>

<body>
    <div class="bg">
        <div class="buttons">
            <div class="button">
                <p>Entrada</p>
                <p class="valor" id="entrada">R$ 4000.00</p>
            </div>
            <div class="button">
                <p>Total</p>
                <p class="valor">R$ 4000.00</p>
            </div>
            <div class="button">
                <p>Saída</p>
                <p class="valor" id="saida">R$ 4000.00</p>
            </div>
        </div>
        <div class="container">
            <div class="search-bar">
                <i class="fa-solid fa-magnifying-glass" id="glass"></i>
                <input type="text" class="input-search" placeholder="Pesquisar aqui">
            </div>
            <div class="painel">
                <div class="add-itens">
                    <div class="item">
                        <label for="categoria">Categoria*</label>
                        <select name="categoria" id="categoria">
                            <option value=""></option>
                            <option value="cadastro">Cadastrar Categoria</option>
                            <?php foreach($infos as $info): ?>
                                <option value="<?= $info['id'] ?>">
                                    <?= $info['descricao'] ?>
                                </option>
                            <?php endforeach; ?> 
                        </select>
                    </div>
                    <div class="item">
                        <label for="valor">Valor*</label>
                        <input type="number" id="valor" name="valor">
                    </div>
                    <div class="item">
                        <label for="data">Data*</label>
                        <input type="date" id="data">
                    </div>
                    <div class="item">
                        <label for="descricao">Descricao</label>
                        <input type="text" id="descricao">
                    </div>
                    <div class="item radio">
                        <label for="entrada">Entrada</label>
                        <input type="radio" id="entrada" name="tipo">
                        <label for="saida">Saída</label>
                        <input type="radio" id="saida" name="tipo">
                    </div>
                </div>
                <div class="table">
                    <div class="item">
                        <table border=1>
                            <?php foreach($dados as $dado): ?>
                                <tr>
                                    <td>
                                        <?php foreach($infos as $info): ?>
                                            <?php if($info['id'] == $dado['categoria_id']): ?>
                                                <?= $info['descricao'] ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </td>
                                    <td><?= $dado['valor'] ?></td>
                                    <td><?= $dado['data_mvto'] ?></td>
                                    <td><?= $dado['descricao'] ?></td>
                                    <td><?= $dado['status_pago'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>


                </div>
            </div>

        </div>
    </div>
    </div>
    <div class="footer"></div>
</body>

</html>