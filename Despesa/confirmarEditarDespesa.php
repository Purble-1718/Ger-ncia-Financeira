<?php 

require "./../config.php";

$id = $_GET['id'];
$descricao = $_GET['descricao'];
$valor = $_GET['valor'];
$data_mvto = $_GET['data_mvto'];
$status_pago = $_GET['status'];
$categoria_id = $_GET['categoria'];

$sql = "UPDATE Despesa
    SET descricao = :descricao,
    valor = :valor,
    data_mvto = :data_mvto,
    status_pago = :status_pago,
    categoria_id = :categoria_id
    WHERE id = :id";
$sql = $pdo->prepare($sql);
$sql->bindValue(":id", $id);
$sql->bindValue(":descricao", $descricao);
$sql->bindValue(":valor", $valor);
$sql->bindValue(":data_mvto", $data_mvto);
$sql->bindValue(":status_pago", $status_pago);
$sql->bindValue(":categoria_id", $categoria_id);
$sql->execute();

header("Location: ./despesas.php");
exit;
