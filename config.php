<?php

$name = "hg5pss68_bntds_roxo"; #Nome do banco de dados
$host = "5ps.site"; #hostname *onde o servidor está hospedado
$user = "hg5pss68_bntds_roxo"; #username do servidor
$pass = "eI1)U@C!G4s{"; #password do servidor

try { #tentando acessar o banco de dados no servidor
  $pdo = new PDO("mysql:host=$host;dbname=$name", $user, $pass); #PDO==Driver de conexão de PHP com MySQL *variável $pdo permite acessar funcionalidades da conexão fora deste arquivo->require
} catch (PDOException $e) { #PHP Data Objects
  echo "ERRO: " . $e->getMessage(); #Caso dê errado vai exibir o erro
}
