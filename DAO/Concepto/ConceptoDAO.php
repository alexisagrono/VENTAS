<?php
include_once '../lib/Config/conexionSqli.php';
class ConceptoDAO extends Connection {
    private static $instance = NULL;
    public static function getInstance(){
        if(self::$instance == NULL)
            self::$instance = new ConceptoDAO();
        return self::$instance;
    }
    public function getAll(){
        $sql = "SELECT * FROM concepto";
        $result = $this->execute($sql);
        return $result;
    }
     public function add($con_id,$con_descripcion,$con_estado){
        $rs="";
        try {
            $sql = "insert into concepto(con_id,con_descripcion	,con_estado) values ('".$con_id."','".$con_descripcion."','".$con_estado."')";
            $result = $this->execute($sql);
            $rs=1;
        }catch (PDOException $exc) {
            die('Error Add() ConceptoDAO:<br/>' . $exc->getMessage());
            $rs=0;
        }
        return $rs;
    }
     public function findById($con_id){
        try{
       $sql = "SELECT * FROM concepto WHERE idconcepto = '".$con_id."'";
         $result = $this->execute($sql);
         return $result;
         
        }catch(PDOException $exc) {
            die('Error findByCon_id() ConceptoDAO:<br/>' . $exc->getMessage());
            $rs=0;
        }
    }
    
}