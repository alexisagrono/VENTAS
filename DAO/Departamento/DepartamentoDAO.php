<?php
include_once '../lib/Config/conexionSqli.php';
class DepartamentoDAO extends Connection {
    private static $instance = NULL;
    public static function getInstance(){
        if(self::$instance == NULL)
            self::$instance = new DepartamentoDAO();
        return self::$instance;
    }
    public function getAll(){
        $sql = "SELECT * FROM departamento";
        $result = $this->execute($sql);
        return $result;
    }
     public function add($id,$name){
        $rs="";
        try {
            $sql = "insert into departamento(id,nombre) values ('".$id."','".$name."')";
            $result = $this->execute($sql);
            $rs=1;
        }catch (PDOException $exc) {
            die('Error Add() DepartamentoDAO:<br/>' . $exc->getMessage());
            $rs=0;
        }
        return $rs;
    }
    public function findById($id){
        try{
       $sql = "SELECT * FROM departamento WHERE id = '".$id."'";
         $result = $this->execute($sql);
         return $result;
        }catch(PDOException $exc) {
            die('Error findById() DepartamentoDAO:<br/>' . $exc->getMessage());
            $rs=0;
        }
    }
    public function update($id,$name){
        $rs="";
        try {
            $sql = "update departamento set nombre ='".$name."'  where  id ='".$id."'";
            $result = $this->execute($sql);
            $rs=1;
        }catch (PDOException $exc) {
            die('Error update() DepartamentoDAO:<br/>' . $exc->getMessage());
            $rs=0;
        }
        return $rs;
    }
     public function delete($id){
        $rs="";
        try {
            $sql = "delete from departamento where  id ='".$id."'";
            $result = $this->execute($sql);
            $rs=1;
        }catch (PDOException $exc) {
            die('Error delete() DepartamentoDAO:<br/>' . $exc->getMessage());
            $rs=0;
        }
        return $rs;
    }
    
    
}