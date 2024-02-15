<?php 

require "./../../config.php";

$categoria = $_GET['categoria'];

$sql = "INSERT INTO CategoriaDespesa (descricao) VALUES (:categoria)";
$sql = $pdo->prepare($sql);
$sql->bindValue(":categoria", $categoria);
$sql->execute();

header("Location: ./categoriasDespesa.php");
exit;
