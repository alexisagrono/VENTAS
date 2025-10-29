<?php
class viewfactura {
    public static function getRead() {
?>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Registrar Factura de Venta</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Listar</li>
            </ol>

            <div class="row">
                <form>
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-2">
                                    <label for="numero" class="form-label">No:</label>
                                    <input type="text" class="form-control" id="numero" name="numero" readonly>
                                </div>
                                <div class="col-md-3">
                                    <label for="fecha" class="form-label">Fecha:</label>
                                    <input type="date" class="form-control" id="fecha" name="fecha">
                                </div>
                                <div class="col-md-3">
                                    <label for="no_pedido" class="form-label">No Pedido:</label>
                                    <input type="text" class="form-control" id="no_pedido" name="no_pedido">
                                </div>
                                <div class="col-md-4">
                                    <label for="cliente" class="form-label">Cliente:</label>
                                    <select class="form-select" id="cliente" name="cliente">
                                        <option value="">Seleccione</option>
                                      
                                    </select>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-bordered align-middle">
                                    <thead class="table-light text-center">
                                        <tr>
                                            <th colspan="5">Detalle del Pedido</th>
                                        </tr>
                                        <tr>
                                            <th>Plato</th>
                                            <th>Precio</th>
                                            <th>Cantidad</th>
                                            <th>Observaciones</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody id="detallePedido">
                                        <tr>
                                            <td>
                                                <select class="form-select" name="plato[]">
                                                    <option value="">Seleccione</option>
                                                   
                                                </select>
                                            </td>
                                            <td><input type="text" class="form-control" name="precio[]"></td>
                                            <td><input type="number" class="form-control" name="cantidad[]"></td>
                                            <td><input type="text" class="form-control" name="observaciones[]"></td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-primary btn-sm" onclick="agregarFila()">+</button>
                                                <button type="button" class="btn btn-danger btn-sm" onclick="eliminarFila(this)">-</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                         
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="observacionesGenerales" class="form-label">Observaciones:</label>
                                    <textarea class="form-control" id="observacionesGenerales" name="observacionesGenerales" rows="3"></textarea>
                                </div>
                            </div>

                            
                            <div class="row">
                                <div class="col text-center">
                                    <button type="submit" class="btn btn-primary px-5">Registrar</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>

        <script>
        function agregarFila() {
            const tabla = document.getElementById('detallePedido');
            const fila = tabla.rows[0].cloneNode(true);
            fila.querySelectorAll('input').forEach(i => i.value = '');
            tabla.appendChild(fila);
        }

        function eliminarFila(boton) {
            const fila = boton.closest('tr');
            const tabla = document.getElementById('detallePedido');
            if (tabla.rows.length > 1) fila.remove();
        }
        </script>
<?php
    }
}
?>