<?php
require "./config.php";
#hidden com o nome do banco de dados
$id = $_GET["id"];

$sql = "DELETE FROM Receita WHERE id = :id";
$sql = $pdo->prepare($sql);

$sql->bindValue(":id", $id);
$sql->execute();


header("Location: receitas.php");
exit;
