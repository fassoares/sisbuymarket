<?php 
class Produto {
    private $produto_id;
    private $descricao_prod;
    private $fabricante_Id;
    private $descricao_fab;
    private $unidade_Id;
    private $descrcicao_unid;
    private $embalagem;

    public function getProduto_id(){
        return $this->produto_id;
    }

    public function setProduto_id($conteudo){
        $this->produto_id = $conteudo;
    }

    public function getDescricao_prod(){
        return $this->descricao_prod;
    }

    public function setDescricao_prod($conteudo){
        $this->descricao_prod = $conteudo;
    }

    public function getFabricante_Id(){
        return $this->fabricante_Id;
    }

    public function setFabricante_Id($conteudo){
        $this->fabricante_Id = $conteudo;
    }

    public function getDescricao_fab(){
        return $this->descricao_fab;
    }

    public function setDescricao_fab($conteudo){
        $this->descricao_fab = $conteudo;
    }

    public function getUnidade_Id(){
        return $this->unidade_Id;
    }

    public function setUnidade_Id($conteudo){
        $this->unidade_Id = $conteudo;
    }

    public function getDescricao_unid(){
        return $this->descricao_unid;
    }

    public function setDescricao_unid($conteudo){
        $this->descricao_unid = $conteudo;
    }

    public function getEmbalagem(){
        return $this->embalagem;
    }

    public function setEmbalagem($conteudo){
        $this->embalagem = $conteudo;
    }

    public function loadById($idProduto){
        $sql = "select p.id,p.descricao,p.fabricante_id,f.descricao fabricante,p.unidade_id,u.descricao unidade,p.embalagem "; 
        $sql = $sql."from tb_produtos p inner join tb_unidades u on p.unidade_id=u.id inner join tb_fabricantes f on f.id=p.fabricante_id ";
        $sql = $sql."where p.id = :ID order by p.descricao";
            
        $acessoQuery = new acessoBaseQuery();
        $produtos = $acessoQuery->select($sql,array(":ID" => $idProduto));
        if(count($produtos)>0){
            $rows = $produtos[0];
            $this->setProduto_id($rows['id']);
            $this->setDescricao_prod($rows['descricao']);
            $this->setFabricante_id($rows['fabricante_id']);
            $this->setDescricao_fab($rows['fabricante']);
            $this->setUnidade_Id($rows['unidade_id']);
            $this->setDescricao_unid($rows['unidade']);
            $this->setEmbalagem($rows['embalagem']);
        }
    }

    public function __toString(){
        return json_encode(array(
            "id" => $this->getProduto_id(),
            "descricao" => $this->getDescricao_prod(),
            "fabricante_id" => $this->getFabricante_id(),
            "fabricante" => $this->getDescricao_fab(),
            "unidade_id" => $this->getUnidade_id(),
            "unidade" => $this->getDescricao_unid(),
            "embalagem" => $this->getEmbalagem(),
        ));
    }

}
?>