<?php
require_once("config.php");
/* $sql = "select p.id,p.descricao,f.descricao fabricante,u.descricao unidade,p.embalagem "; 
$sql = $sql."from tb_produtos p inner join tb_unidades u on p.unidade_id=u.id inner join tb_fabricantes f on f.id=p.fabricante_id order by p.descricao";
	
$acessoQuery = new acessoBaseQuery();
$produtos = $acessoQuery->select($sql);
echo json_encode($produtos);
 */
$showProduto = new Produto();
//carrega um usuario
/* $showProduto->loadById(2);
echo $showProduto; */


//garrega uma lista de usuário
/* $listaProduto= produto::listAllProduto();
echo json_encode($listaProduto); */

//carrega uma lista com filtro pelo descrição do produto
$listaProduto= produto::buscaProduto('arr');
echo json_encode($listaProduto);
?>
