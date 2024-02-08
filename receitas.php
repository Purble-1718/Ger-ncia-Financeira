<?php
require "./config.php";

$sql = "SELECT * FROM receitas";
$sql = $pdo->prepare($sql); #pdo->Classe de conexão com banco de dados; preparando uma consulta usando o pdo. O objeto pdo está preparando uma consulta no banco de dados, consulta dentro do $sql. sql vai receber um PDOStatement que tem todas as informações que foram passadas para o banco de dados, agora é só executar.
$sql->execute(); #executa a consulta de antes. A "->" acessa métodos de um objeto.

$dados = $sql->fetchAll(PDO::FETCH_ASSOC); #fecthAll: Recupera os resultados da execução da consulta; Argumento PDO::FETCH_ASSOC: Organiza o resultado em formato de array associativo, chaves==nome colunas banco de dados.
?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>GestãoFinanceira</title>
  <link rel="stylesheet" href="./styles/style.css">  <!--Linka com css-->
</head>

<body>
  <header>
    <nav>
      <ul class="rem">
        <li><a href="#">Receitas</a></li> <!--# tem que ser substituída por links de redirecionamento--> 
        <li><a href="#">Despesas</a></li>
        <li><a href="#">Categorias</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <section class="formulario">
      <form action="./cadastrarReceita.php" method="get"> <!--Action fala para onde as informações do formulário devem ser enviadas; informações vão ser passadas pela url por conta do método get-->

        <label>
          Descrição
          <input type="text" name="descricao"> <!--Label conecta tudo que está dentro-->
        </label>

        <label>
          Valor
          <input type="number" name="valor"> <!--Input para receber dados que o usuário inserir-->
        </label>

        <label>
          Categoria
          <select name="categoria">
            <option value=""></option> <!--Para o select começar "vazio"-->
            <option value="1">Salário</option>
            <option value="2">Bônus</option>
            <option value="3">Investimento</option>
            <option value="4">Prêmio</option>
          </select>
        </label>

        <label>
          Data
          <input type="date" name="data_mvto">
        </label>

        <button type="submit">Adicionar</button> <!--Envia o formulário-->


      </form>
    </section>
    <section class="tabela">

      <table>
        <thead> <!--Define o cabeçalho da tabela-->
          <tr>
            <th>ID</th>
            <th>Descrição</th>
            <th>Valor</th>
            <th>Data</th>
            <th>Opções</th>
          </tr>
        </thead>
        <tbody>

          <?php foreach ($dados as $dado) : ?> <!--Dado é uma variável criada que percorre o array associativo dados-->
            <tr> <!--Dados é array multidimensional-->
              <td><?= $dado['id'] ?></td> <!--Acessa chave id da variável dado-->
              <td><?= $dado['descricao'] ?></td>
              <td><?= $dado['valor'] ?></td>
              <td><?= $dado['data_mvto'] ?></td>
              <td>
                <a href="./deletar.php?id=<?= $dado['id'] ?>"><i class="fa-solid fa-trash"></i></a> <!--Vai para o ./deletar.php passando o id -->
                <a href="./editarReceita.php?id=<?= $dado['id'] ?>"><i class="fa-regular fa-pen-to-square"></i></a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>

    </section>
  </main>
  <script src="https://kit.fontawesome.com/561265e797.js" crossorigin="anonymous"></script>
</body>


</html>