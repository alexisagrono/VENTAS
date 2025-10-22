<?php
class CtrlFactura{
       public function read()
    {
        include_once '../view/Factura/viewFactura.php';
        viewFactura::getRead();
    }
   
}