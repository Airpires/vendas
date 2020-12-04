CARRINHO DE VENDAS PHP


PASSO A PASSO PARA EXECUÇÃO DO CARRINHO.


1 - IMPORTAR O BANCO DE DADOS venda.sql e mudar conexão nos arquivos connection.php são dois. 

2 - ABRIR A PAGINA ler_produtos.php utilizei a função simplexml_load_file para ler os arquivos xml com os produtos e gravar no banco de dodos utilizei a criatividade conforme sugerido

3 - ABRIR A PAGINA INDEX.PHP e selecionar os produtos, ao selecionar será redirecionado para a pagina do carrinho todas as funções foram respeitadas atualização dos produtos, remoção e finalizar o pedido e gravar no banco 
coloquei o campo de busca de cep comunicando com o webservices da viacep conforme solicitado porém não realizei a validação ao finalizar o pedido somente gravar com o preenchimento do cep.

4 - AO FINALIZAR A VENDA A PAGINA FICARA EM BRANCO MAIS SERÁ GRAVADO NO BANCO.


Oberservações todas as funcionalidades estão ok, na criação do banco de dados produto foi observada as regras solicitadas para não gravar o mesmo produto com a mesma referencia, cada produto pode ter mais de um fornecedor, para adicionar mais produtos basta copiar o arquivo xml e modificar as informações e executar a pagina ler_produtos.php ela criara o novo produto no banco mais não duplicará.
