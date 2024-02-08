<?php
require "./config.php";

$id = $_GET['id'];
$sql = "SELECT * FROM receitas WHERE id = :id";
$sql = $pdo->prepare($sql);
$sql->bindValue(":id", $id);
$sql->execute(); 
$item = $sql->fetch(PDO::FETCH_ASSOC); #$item recebe os valores da item que o sql pegar do banco de dados.

$sql = "SELECT * FROM receitas";
$sql = $pdo->prepare($sql);
$sql->execute();
$dados = $sql->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT * FROM receitas WHERE id = :id";
$sql = $pdo->prepare($sql);
$sql->bindValue(":id", $id);
$sql->execute();
$id_categoria = $sql->fetch(PDO::FETCH_ASSOC);
$categorias = $id_categoria['categorias_id'];

$sql = "SELECT * FROM categorias WHERE id = :categorias";
$sql = $pdo->prepare($sql);
$sql->bindValue(":categorias", $categorias);
$sql->execute();
$categoria = $sql->fetch(PDO::FETCH_ASSOC);

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
        <li><a href="./receitas.php">Receitas</a></li> <!--# tem que ser substituída por links de redirecionamento--> 
        <li><a href="#">Despesas</a></li>
        <li><a href="#">Categorias</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <section class="formulario">
      <form action="./confirmarEditarReceita.php" method="get"> <!--Action fala para onde as informações do formulário devem ser enviadas; informações vão ser passadas pela url por conta do método get-->

        <input type="hidden" name="id" value="<?= $id?>"> <!--Hidden para não aparecer para o usuário; enviando id pela url de forma escondida -->
        <label>
          Descrição
          <input type="text" name="descricao" value="<?= $item['descricao']?>"> <!--Label conecta tudo que está dentro-->
        </label>

        <label>
          Valor
          <input type="number" name="valor" value="<?= $item['valor']?>"> <!--Input para receber dados que o usuário inserir-->
        </label>

        <label>
          Categoria
          <select name="categoria" >
            <option value="<?= $item['categorias_id']?>"><?= $categoria['descricao']?></option> <!--Para o select começar "vazio"-->
            <option value="1">Salário</option>
            <option value="2">Bônus</option>
            <option value="3">Investimento</option>
            <option value="4">Prêmio</option>
          </select>
        </label>

        <label>
          Data
          <input type="date" name="data_mvto" value="<?= $item['data_mvto']?>">
        </label>

        <button type="submit">Editar</button> <!--Envia o formulário-->


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