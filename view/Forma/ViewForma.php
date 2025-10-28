<?php
class viewForma{
     public static function getRead(){
        ?>
        <div class="container-fluid px-4">
                <h1 class="mt-4">Coprobante de Egreso</h1>
                <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Listar</li>
                </ol>
                <div class="row">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCreateForma">CREAR</button>
                </div>
                <div class="row">
                        <table id="dt_forma" class="table table-bordered table-hover">
                                <thead>
                                        <tr>
                                        <th>CODIGO FORMA </th>
                                        <th>DESCRIPCION</th>
                                        <th>ESTADO FORMA</th>
                                        <th>CODIGO CONCEPTO</th>
                                        <th>TIPO PAGO</th>
                                        <th>ESTADO CONCEPTO</th>
                                        <th>ACCION</th>
                                        
                                        </tr>
                                </thead>
                                <tbody></tbody>
                                </table>
                </div>
        </div>
     
    <?php
    ModalsForma::modalCreate();
    ModalsForma::modalEdit();
    
    } 
}
?>
 <script type="text/javascript" src="../View/Forma/forma.js"></script>