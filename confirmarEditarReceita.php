<?php
require "./config.php";

$id = $_GET['id'];
$valor = $_GET['valor'];
$data_mvto = $_GET['data_mvto'];
$categorias_id = $_GET['categoria'];
$descricao = $_GET['descricao'];

$sql = "UPDATE receitas
SET descricao = :descricao,
valor = :valor,
data_mvto = :data_mvto,
categorias_id = :categorias_id,
WHERE id = :id";

$sql = $pdo->prepare($sql);
$sql->bindValue(":id", $id);
$sql->bindValue(":valor", $valor);
$sql->bindValue(":data_mvto", $data_mvto);
$sql->bindValue(":categorias_id", $categoria);
$sql->bindValue(":descricao", $descricao);

$sql->execute();

header("Location: receitas.php");
exit;
?>