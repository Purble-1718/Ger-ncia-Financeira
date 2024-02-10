<?php
require "./../config.php";

$id = $_GET['id'];
$valor = $_GET['valor'];
$data_mvto = $_GET['data_mvto'];
$descricao = $_GET['descricao'];
$status = $_GET['status'];
$categorias_id = $_GET['categoria'];

$sql = "UPDATE Receita #Atualizando/Editando linha do banco de dados pelo id
SET descricao = :descricao,
valor = :valor,
data_mvto = :data_mvto,
status_pago = :status_pago,
categoria_id = :categorias_id 
WHERE id = :id";

$sql = $pdo->prepare($sql);
$sql->bindValue(":id", $id);
$sql->bindValue(":valor", $valor);
$sql->bindValue(":data_mvto", $data_mvto);
$sql->bindValue(":descricao", $descricao);
$sql->bindValue(":status_pago", $status);
$sql->bindValue(":categorias_id", $categoria);

$sql->execute();

header("Location: ./../receitas.php");
exit;
?>