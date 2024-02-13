<?php

require "./../config.php";

$descricao = $_GET['descricao'];
$valor = $_GET['valor'];
$data_mvto = $_GET['data_mvto'];
$categoria = $_GET['categoria'];
$status = $_GET['status'];

$sql = "INSERT INTO Despesa (descricao, valor, data_mvto, status_pago, categoria_id) VALUES 
    (:descricao, :valor, :data_mvto, :status_pago, :categoria_id)";

$sql = $pdo->prepare($sql);
$sql->bindValue(":descricao", $descricao);
$sql->bindValue(":valor", $valor);
$sql->bindValue(":data_mvto", $data_mvto);
$sql->bindValue(":status_pago", $status);
$sql->bindValue(":categoria_id", $categoria);
$sql->execute();

header("Location: ./despesas.php");
exit;
