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
    $sql = "SELECT forma_pago.fp_id, forma_pago.fp_descripcion, forma_pago.fp_estado, concepto.con_id, concepto.con_descripcion AS con_descripcion, concepto.con_estado AS con_estado FROM forma_pago INNER JOIN concepto ON forma_pago.fp_id = concepto.con_id";
    return $this->execute($sql);
}
    
    public function add($fp_id, $fp_descripcion, $fp_estado, $con_id, $con_descripcion, $con_estado){
        $rs="";
        try {
         
            $sql = "INSERT INTO forma_pago(fp_id, fp_descripcion, fp_estado, con_id, con_descripcion, con_estado) VALUES ('" . $fp_id . "','" . $fp_descripcion . "','" . $fp_estado . "','" . $con_id . "','".$con_descripcion."','".$con_estado."')";
             $result = $this->execute($sql);
            $rs=1;
        }catch (PDOException $exc) {
           
            die('Error Add() FormaDAO:<br/>' . $exc->getMessage());
            $rs=0;
        }
        return $rs;
    }

   public function findById($fp_id){
    try {
        $sql = "SELECT 
                    forma_pago.fp_id,
                    forma_pago.fp_descripcion,
                    forma_pago.fp_estado,
                    concepto.con_id,
                    concepto.con_descripcion AS con_descripcion,
                    concepto.con_estado AS con_estado
                FROM forma_pago
                INNER JOIN concepto ON forma_pago.con_id = concepto.con_id
                WHERE forma_pago.fp_id = '$fp_id'";
        $result = $this->execute($sql);
        return $result;
    } catch (PDOException $exc) {
        die('Error findById() formaDAO:<br/>' . $exc->getMessage());
    }
}
}