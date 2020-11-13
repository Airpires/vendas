<?php 

if(!isset($_SESSION['carrinho'])) {
	$_SESSION['carrinho'] = array();
}
/*FUNÇÃO PARA ADICIONAR ITENS NO CARRINHO*/
function addCart($id, $quantity) {
	if(!isset($_SESSION['carrinho'][$id])){ 
		$_SESSION['carrinho'][$id] = $quantity; 
	}
}
/*FUNÇÃO PEGAR DADOS DO WEBSERVICES VIACEP VIA XML METODO PARA EXIBIÇÃO EM TELA NA PAGINA CARRINHO*/	
function get_endereco($cep){


  // formatar o cep removendo caracteres nao numericos
  $cep = preg_replace("/[^0-9]/", "", $cep);
  $url = "http://viacep.com.br/ws/$cep/xml/";

  $xml = simplexml_load_file($url);
  return $xml;
}
/*FUNÇÃO PARA DELETAR ITENS DO CARRINHO*/
function deleteCart($id) {
	if(isset($_SESSION['carrinho'][$id])){ 
		unset($_SESSION['carrinho'][$id]); 
	} 
}
/*FUNÇÃO PARA ATUALIZAR ITENS NO CARRINHO*/
function updateCart($id, $quantity) {
	if(isset($_SESSION['carrinho'][$id])){ 
		if($quantity > 0) {
			$_SESSION['carrinho'][$id] = $quantity;
		} else {
		 	deleteCart($id);
		}
	}
}

/*FUNÇÃO PARA LISTAR PRODUTOS NO CARRINHO*/
function getContentCart($pdo) {
	
	$results = array();
	
	if($_SESSION['carrinho']) {
		
		$cart = $_SESSION['carrinho'];
		$products =  getProductsByIds($pdo, implode(',', array_keys($cart)));

		foreach($products as $product) {

			$results[] = array(
							  'id' => $product['id'],
							  'name' => $product['nome'],
							  'price' => $product['preco'],
							  'fornec' => $product['fornecedor'],
							  'quantity' => $cart[$product['id']],
							  'subtotal' => $cart[$product['id']] * $product['preco'],
						);
		}
	}
	
	return $results;
}



/*FUNÇÃO PARA CALCULAR VALOR TOTAL*/
function getTotalCart($pdo) {
	
	$total = 0;

	foreach(getContentCart($pdo) as $product) {
		$total += $product['subtotal'];
	} 
	return $total;
}