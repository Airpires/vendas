<?php
session_start();
echo "Produtos Gravados com Sucesso";
/*FOREACH PARA GRAVAÇÃO DOS DAOS CAPTURADOS NO ARRAY NO BANCO*/
foreach($_SESSION['dados'] as $produtos){
	
	$conexao = new PDO ('mysql:host=localhost;dbname=vendas',"root", "34125580" );
	$insert = $conexao->prepare("INSERT INTO pedido () VALUES(NULL,?,?,?,?,?)");
	$insert->bindParam(1,$produtos['id']);
	$insert->bindParam(2,$produtos['name']);
	$insert->bindParam(3,$produtos['quantity']);
	$insert->bindParam(4,$produtos['price']);
	$insert->bindParam(5,$produtos['totalCarts']);
	$insert->execute();


}

