<?php
class acessoBaseQuery extends PDO{
    private $classConexao;
    private $connect;
    public function __construct(){
        $this->classConexao = new acessoBaseDadosPDO();
    }

    private function setParam($statment,$key,$value){
        $statment -> bindParam($key,$value);
    }

    private function setParams($statment, $parameters = array()){
        foreach ($parameters as $key => $value) {
            $this->setParam($statment,$key,$value);
        }
    }

    public function query($rowQuery,$params = array()){
        $this->connect = $this->classConexao->getConnect();
        $stmt = $this->connect->prepare($rowQuery);
        $this->setParams($stmt,$params);
        $stmt->execute();
        return $stmt;
    }

    public function select($rowQuery,$params=array()):array{
        $stmt = $this->query($rowQuery,$params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }


    
}




?>