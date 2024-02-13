<?php 

require "./../../config.php";

$id = $_GET['id'];

$sql = "DELETE FROM CategoriaReceita WHERE id = :id";
$sql = $pdo->prepare($sql);
$sql->bindValue(":id", $id);
$sql->execute();

header("Location: ./categorias.php");
exit;
