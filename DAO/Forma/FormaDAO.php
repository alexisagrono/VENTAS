<?php

include_once '../lib/Config/conexionSqli.php'; 
 
class FormaDAO extends Connection {
    private static $instance = NULL;
    
    public static function getInstance(){
        if(self::$instance == NULL)
            self::$instance = new FormaDAO();
        return self::$instance;
    }

public function getAll(){
    $sql = "SELECT * FROM forma_pago";
        $result = $this->execute($sql);
        return $result;
    
}
    
    public function add($fp_id, $fp_descripcion, $fp_estado){
        $rs="";
        try {
         
            $sql = "INSERT INTO forma_pago(fp_id, fp_descripcion, fp_estado) VALUES ('" . $fp_id . "','" . $fp_descripcion . "','" . $fp_estado . "')";
             $result = $this->execute($sql);
            $rs=1;
        }catch (PDOException $exc) {
           
            die('Error Add() FormaDAO:<br/>' . $exc->getMessage());
            $rs=0;
        }
        return $rs;
    }

 public function findById($fp_id){
        try{
       $sql = "SELECT * FROM forma_pago WHERE fp_id = '".$fp_id."'";
         $result = $this->execute($sql);
         return $result;
        }catch(PDOException $exc) {
            die('Error findById() FormaDAO:<br/>' . $exc->getMessage());
            $rs=0;
        }
    }
public function update($fp_id,$fp_descripcion,$fp_estado){
        $rs="";
        try {
            $sql = "UPDATE forma_pago  SET fp_descripcion = '$fp_descripcion', fp_estado = '$fp_estado' WHERE fp_id = '$fp_id'";
        $result = $this->execute($sql);
        $rs = 1;

        }catch (PDOException $exc) {
            die('Error update() FormaDAO:<br/>' . $exc->getMessage());
            $rs=0;
        }
        return $rs;
    }
     public function delete($fp_id){
        $rs="";
        try {
            $sql = "delete from forma_pago where  fp_id ='".$fp_id."'";
            $result = $this->execute($sql);
            $rs=1;
        }catch (PDOException $exc) {
            die('Error delete()  FormaDAO:<br/>' . $exc->getMessage());
            $rs=0;
        }
        return $rs;
    }
    
    
}