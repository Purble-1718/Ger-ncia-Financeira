<?php

$name = "hg5pss68_bntds_roxo"; #Nome do banco de dados
$host = "5ps.site"; #hostname *onde o servidor está hospedado
$user = "hg5pss68_bntds_roxo"; #username do servidor
$pass = "eI1)U@C!G4s{"; #password do servidor

try { #tentando acessar o banco de dados no servidor #Conexão acontece através do objeto PDO que é usado para conexão->código dentro do try acessa o db;
  $pdo = new PDO("mysql:host=$host;dbname=$name", $user, $pass); #PDO==Driver de conexão de PHP com MySQL *variável $pdo permite acessar funcionalidades da conexão dentro; e fora deste arquivo->require
} catch (PDOException $e) { #PHP Data Objects
  echo "ERRO: " . $e->getMessage(); #try/catch é usado para evitar erros; código roda normalmente no try, caso algum erro aconteça na tentativa de conexão com o banco de dados o catch captura e trata
}
