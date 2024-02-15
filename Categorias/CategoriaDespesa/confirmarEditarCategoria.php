<?php 

require "./../../config.php";

$id = $_GET['id'];
$categoria = $_GET['categoria'];
$sql = "UPDATE CategoriaDespesa SET descricao = :descricao WHERE id = :id";
$sql = $pdo->prepare($sql);
$sql->bindValue(":descricao", $categoria);
$sql->bindValue(":id", $id);
$sql->execute();

header("Location: ./categoriasDespesa.php");
exit;
