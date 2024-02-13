<?php
require "./../config.php";

$id = $_GET['id'];
$sql = "SELECT * FROM Receita WHERE id = :id";
$sql = $pdo->prepare($sql);
$sql->bindValue(":id", $id);
$sql->execute(); 
$item = $sql->fetch(PDO::FETCH_ASSOC); #$item recebe os valores da item que o sql pegar do banco de dados.

$sql = "SELECT * FROM Receita";
$sql = $pdo->prepare($sql);
$sql->execute();
$dados = $sql->fetchAll(PDO::FETCH_ASSOC);

$categorias = $item['categoria_id'];

$sql = "SELECT * FROM CategoriaReceita WHERE id = :categorias";
$sql = $pdo->prepare($sql);
$sql->bindValue(":categorias", $categorias);
$sql->execute();
$categoria = $sql->fetch(PDO::FETCH_ASSOC);

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

  <title>GestãoFinanceira</title>
  <link rel="stylesheet" href="./../styles/styleReceita.css">  

<body>
  <header>
    <nav>
      <ul class="rem">
        <li><a href="./../receitas.php">Receitas</a></li> <!--# tem que ser substituída por links de redirecionamento--> 
        <li><a href="./../Despesa/despesas.php">Despesas</a></li>
        <li><a href="./../Categorias/categorias.php">Categorias</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <section class="formulario">
      <form action="./confirmarEditarReceita.php" method="get"> 

        <input type="hidden" name="id" value="<?= $item['id'] ?>"> <!--Hidden para não aparecer para o usuário; enviando id pela url de forma escondida -->
        <label>
          Descrição
          <input type="text" name="descricao" value="<?= $item['descricao']?>"> 
        </label>

        <label>
          Valor
          <input type="number" name="valor" value="<?= $item['valor']?>"> 
        </label>

        <label>
          Data
          <input type="date" name="data_mvto" value="<?= $item['data_mvto']?>">
        </label>
        
        <label>
          Categoria
          <select name="categoria" >
            <option value="<?= $item['categoria_id']?>"><?= $categoria['descricao']?></option> <!--Mostra valor do item que está sendo editado"-->
            <?php foreach($infos as $info): ?>
              <option value="<?= $info['id'] ?>"><?= $info['descricao'] ?></option>
            <?php endforeach; ?>
          </select>
        </label>

        <?php if($item['status_pago'] == "Pendente"):  ?>
          <label>
            Status
            <select name="status">
              <option value="Pendente">Pendente</option>
              <option value="Recebida">Recebida</option>
            </select>
          </label>
        <?php else: ?> <!--if else de php para adequar à opção de status -->
          <label>
            Status
            <select name="status">
              <option value="Recebida">Recebida</option>
              <option value="Pendente">Pendente</option>
            </select>
          </label>
        <?php endif; ?>

        <button type="submit">Editar</button> <!--Envia o formulário-->

      </form>
    </section>
    <section class="tabela">

      <table border="1">
        <thead> <!--Define o cabeçalho da tabela-->
          <tr>
            <th>ID</th>
            <th>Descrição</th>
            <th>Valor</th>
            <th>Data</th>
            <th>Categoria</th>
            <th>Status</th>
            <th>Opções</th>
          </tr>
        </thead>
        <tbody>

          <?php foreach ($dados as $contador => $dado) : ?> 
            <tr> 
              <td><?= ++$contador ?></td> 
              <td><?= $dado['descricao'] ?></td>
              <td><?= $dado['valor'] ?></td>
              <td><?= $dado['data_mvto'] ?></td>
              <td>
                <?php foreach($infos as $info): ?>
                  <?php if($dado['categoria_id'] == $info['id']): ?>
                    <?= $info['descricao'] ?>
                  <?php endif; ?>  
                <?php endforeach; ?>
              </td>
              <td><?= $dado['status_pago']?></td>
              <td>
                <a href="./deletarReceita.php?id=<?= $dado['id'] ?>"><i class="fa-solid fa-trash"></i></a> 
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