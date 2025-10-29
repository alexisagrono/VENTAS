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
        // Usar AS para que los nombres de las columnas coincidan con el array del controlador
        $sql = "SELECT con_id AS idconcepto, con_descripcion AS descripcion, con_estado AS estado FROM concepto WHERE con_id = '".$con_id."'";
        $result = $this->execute($sql);
        return $result;
    }catch(PDOException $exc) {
        die('Error findByid() ConceptoDAO:<br/>' . $exc->getMessage());
        $rs=0;
    }
}
    public function update($con_id,$con_descripcion,$con_estado){
        $rs="";
        try {
            $sql = "UPDATE concepto  SET con_descripcion = '$con_descripcion', con_estado = '$con_estado' WHERE con_id = '$con_id'";
        $result = $this->execute($sql);
        $rs = 1;

        }catch (PDOException $exc) {
            die('Error update() ConceptoDAO:<br/>' . $exc->getMessage());
            $rs=0;
        }
        return $rs;
    }
     public function delete($con_id){
        $rs="";
        try {
            $sql = "delete from concepto where  con_id ='".$con_id."'";
            $result = $this->execute($sql);
            $rs=1;
        }catch (PDOException $exc) {
            die('Error delete()  ConceptoDAO:<br/>' . $exc->getMessage());
            $rs=0;
        }
        return $rs;
    }
}