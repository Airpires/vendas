<?php require_once "connection.php";

echo "<meta HTTP-EQUIV='refresh' CONTENT='5'>";

error_reporting(0);
ini_set(“display_errors”, 0 );

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Vendas</title>
</head>





<?php


	

    ini_set('default_charset', 'UTF-8');
    echo "<table border=\"1\" width=\"1500px\">";
    echo "<td><b>ID</b></td>";
	echo "<td><b>Nome do Produto</b></td>";
    echo "<td><b>Referência</b></td>";
	echo "<td><b>Preço</b></td>";
	echo "<td><b>Nome Fornecedor</b></td>";
	
	


    {	
	

	
    echo "<tr>";
	/*Criação laço com Array para criação de Dados dos Produtos Vindos do XML */
    foreach(glob('*.xml') as $xmlFile){
		
	
    $xml = simplexml_load_file($xmlFile);
	echo "<td>".$xml->TESTE1->id.'</td>';
    echo "<td>".$xml->TESTE2->nome.'</td>';
	echo "<td>".$xml->TESTE3->referencia.'</td>';
	echo "<td>".$xml->TESTE4->preco.'</td>';
	echo "<td>".$xml->TESTE5->nomeFor.'</td>';
	
	
    echo "</tr>";
	
	/*Insert dos dados capturados do XML no banco para manipular os dados*/
	$sql = "INSERT INTO produtos (id, nome, referencia, preco, fornecedor)
VALUES ('".$xml->TESTE1->id."','".$xml->TESTE2->nome."','".$xml->TESTE3->referencia."','".$xml->TESTE4->preco."','".$xml->TESTE5->nomeFor."')";


	if ($conn->query($sql) ) {
		echo "Registro Criado com Sucesso";
} else {
       echo "Error: " . $sql . "<br>" . $conn->error;
}


    }
	
	$conn->close();

    echo "</table>";

	
    }
?>
</body>
</form>
</html>


     