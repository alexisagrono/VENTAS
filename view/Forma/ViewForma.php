<?php
class viewForma{
     public static function getRead(){
        ?>
        <div class="container-fluid px-4">
                <h1 class="mt-4">Forma</h1>
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
                                        <th>CODIGO</th>
                                        <th>DESCRIPCION</th>
                                        <th>ESTADO</th>
                                        <th>ACCIONES</th>
                                        </tr>
                                </thead>
                                <tbody></tbody>
                                </table>
                </div>
        </div>
        <script type="text/javascript" src="../View/Forma/forma.js"></script>

    <?php
    ModalsForma::modalCreate();
     ModalsForma::modalEdit();
    } 

   
}