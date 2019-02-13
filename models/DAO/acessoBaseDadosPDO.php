<?php
class acessoBaseDadosPDO{
    private $driver = "mysql";
    private $usuario="phpuser";
    private $senha="123456";
    private $caminho="localhost:3306";
    private $banco="bd_buymarket";
    private $strConnect = "mysql:host = localhost:3306; dbname=bd_buymarket";
    private $conn;

    public function __construct(){
        $this->conn = new PDO($this->strConnect,$this->usuario,$this->senha) or 
        die("Conexão com o Banco de Dados falhou!!!". PDO_error($this->con));
    }   

    public function getConnect(){
        return $this->conn;
    }

}



/* $sql = "select p.id,p.descricao,f.descricao fabricante,u.descricao unidade,p.embalagem "; 
$sql = $sql."from tb_produtos p inner join tb_unidades u on p.unidade_id=u.id inner join tb_fabricante f on f.id=p.fabricante_id order by p.descricao";
$stmt = $conn->prepare($sql);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
//var_dump($results);
/* 
foreach ($results as $row) {
    foreach($row as $key => $valor){
        echo "<strong>".$key.": </strong>".$valor."<br/>";
    }
    echo "___________________________________________________<br>";
} */

//echo json_encode($results); */
?>