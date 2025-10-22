<?php
class viewConcepto{
     public static function getRead(){
        ?>
        <div class="container-fluid px-4">
                <h1 class="mt-4">Concepto De Pago</h1>
                <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Listar</li>
                </ol>
                <div class="row">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCreateConcepto">CREAR</button>
                </div>
                <div class="row">
                        <table id="dt_concepto" class="table table-bordered table-hover">
                                <thead>
                                        <tr>
                                        <th>CODIGO</th>
                                        <th>DESCRIPCION</th>
                                        <th>ESTADO</th>
                                        <th>ACCION</th>
                                        
                                        </tr>
                                </thead>
                                <tbody></tbody>
                                </table>
                </div>
        </div>
     
    <?php
    ModalsConcepto::modalCreate();
    ModalsConcepto::modalEdit();
    
    } 
}
?>
 <script type="text/javascript" src="../View/Concepto/concepto.js"></script>
