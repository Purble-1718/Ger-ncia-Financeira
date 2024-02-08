<?php
require "./config.php"; #importar arquivo com outros códigos de php

$descricao = $_GET["descricao"]; #dentro do get tem o nome dos campos de select e input do arquivo receitas.php
$valor = $_GET["valor"]; #Pega info dentro dos campos pela url->GET e atribui a uma variável
$data_mvto = $_GET["data_mvto"];
$categoria_id = $_GET["categoria"];


$sql = "INSERT INTO receitas (descricao, valor, data_mvto, categorias_id) VALUES #Digita isso primeiro para habilitar campos que vão receber valores pelo bindValue.
        (:descricao, :valor, :data_mvto, :categoria_id)"; #variável com código de MySQL

$sql = $pdo->prepare($sql);
$sql->bindValue(":descricao", $descricao); #:descricao==placeholder; vincula o valor da $descricao ao placeholder :descricao. Passa o valor de $descricao para o lugar do placeholder.
$sql->bindValue(":valor", $valor);
$sql->bindValue(":data_mvto", $data_mvto);
$sql->bindValue(":categoria_id", $categoria_id);

$sql->execute();

header("Location: receitas.php"); #acessar este arquivo "receitas.php"
exit; #sair deste arquivo
