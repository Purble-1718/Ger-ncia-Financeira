<?php
require "./config.php";

$sql = "SELECT * FROM Receita";
$sql = $pdo->prepare($sql); #pdo->Classe de conexão com banco de dados; preparando uma consulta usando o pdo. O objeto pdo está preparando uma consulta no banco de dados, consulta dentro do $sql. sql vai receber um PDOStatement que tem todas as informações que foram passadas para o banco de dados, agora é só executar.
$sql->execute(); #executa a consulta de antes. A "->" acessa métodos de um objeto.
$dados = $sql->fetchAll(PDO::FETCH_ASSOC); #fecthAll: Recupera os resultados da execução da consulta; Argumento PDO::FETCH_ASSOC: Organiza o resultado em formato de array associativo, chaves==nome colunas banco de dados.

$sql = "SELECT * FROM Categoria";
$sql = $pdo->prepare($sql);
$sql->execute();
$infos = $sql->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>GestãoFinanceira</title>
  <link rel="stylesheet" href="./styles/styleReceita.css">  <!--Linka com css-->
</head>

<body>
  <header>
    <nav> <!--Semântica de navegação -->
      <ul class="rem">
        <li><a href="./receitas.php">Receitas</a></li> <!--# tem que ser substituída por links de redirecionamento--> 
        <li><a href="#">Despesas</a></li>
        <li><a href="./Categoria/categorias.php">Categorias</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <section class="formulario">
      <form action="./Receita/cadastrarReceita.php" method="get"> <!--Action fala para onde as informações do formulário devem ser enviadas; informações vão ser passadas pela url por conta do método get-->

        <label>
          Descrição
          <input type="text" name="descricao"> <!--Label conecta tudo que está dentro-->
        </label>

        <label>
          Valor
          <input type="number" name="valor"> <!--Input para receber dados que o usuário inserir-->
        </label>

        <label>
          Data
          <input type="date" name="data_mvto"> <!--name associa o nome ao valor de entrada inserido pelo usuário, enviado pelo método do form -->
        </label>
        
        <label>
          Categoria
          <select name="categoria"> 
            <option value=""></option> <!--Para o select começar "vazio"-->
            <?php foreach($infos as $info): ?>
              <option value="<?= $infs['id'] ?>"><?= $info['descricao'] ?></option>
            <?php endforeach; ?>
          </select>
        </label>

        <label>
          Status
          <select name="status">
            <option value="Pendente">Pendente</option>
            <option value="Recebida">Recebida</option>
          </select>
        </label>

        <button type="submit">Adicionar</button> <!--Envia o formulário-->

      </form>
    </section>
    <section class="tabela">

      <table border="1">
        <thead> <!--Define o cabeçalho da tabela-->
          <tr> <!--linha-->
            <th>ID</th> <!--cabeçalho da coluna: formatação -->
            <th>Descrição</th>
            <th>Valor</th>
            <th>Data</th>
            <th>Categoria</th>
            <th>Status</th>
            <th>Opções</th>
          </tr>
        </thead>
        <tbody>

          <?php foreach ($dados as $dado): ?> <!--dado é uma variável criada que percorre o array associativo dados-->
            <tr> <!--Dados é array multidimensional-->
              <td><?= $dado['id'] ?></td> <!--Acessa chave id da variável dado-->
              <td><?= $dado['descricao'] ?></td> <!--td célula normal -->
              <td><?= $dado['valor'] ?></td>
              <td><?= $dado['data_mvto'] ?></td>
              <td>
                <?php if($dado['categoria_id'] == 1):?>
                  Salário
                <?php elseif($dado['categoria_id'] == 2):?>
                  Bônus
                <?php elseif($dado['categoria_id'] == 3):?>
                  Investimento
                <?php elseif($dado['categoria_id'] == 4):?>
                  Prêmio
                <?php endif;?>
              </td>
              <td><?= $dado['status_pago']?></td>
              <td>
                <a href="./Receita/deletarReceita.php?id=<?= $dado['id'] ?>"><i class="fa-solid fa-trash"></i></a> <!--Vai para o ./deletar.php passando o id de uma entrada GET-->
                <a href="./Receita/editarReceita.php?id=<?= $dado['id'] ?>"><i class="fa-regular fa-pen-to-square"></i></a>
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