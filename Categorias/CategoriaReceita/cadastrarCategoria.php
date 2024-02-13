<?php 

require "./../../config.php";

$categoria = $_GET['categoria'];

$sql = "INSERT INTO CategoriaReceita (descricao) VALUES (:categoria)";
$sql = $pdo->prepare($sql);
$sql->bindValue(":categoria", $categoria);
$sql->execute();

header("Location: ./categorias.php");
exit;
