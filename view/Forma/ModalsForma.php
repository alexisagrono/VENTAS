<?php
class ModalsForma
{
    public static function modalCreate()
    {
        ?>
        <div class="modal" tabindex="-1" id="modalCreateForma">
            <div class="modal-dialog modal-xs">
                <div class="modal-content">
                    <div class="modal-header">

                        <h5 class="modal-title">Forma
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form name="frmCreateForma" action="<?php echo getUrl('Forma', 'Forma', 'postNew'); ?>" method="post">

                            <div class="mb-3">
                                <label for="codigo" class="from-label">Codigo</label><br>
                                <input type="number" name="idForma" id="idForma" class="form-control" require><br>

                            </div>


                            <div class="mb-3">
                                <label for="fpDescripcion" class="form-label">Descripción</label>
                                <select name="fpDescripcion" id="fpDescripcion" class="form-select" required>
                                    <option value="">Seleccione una opción</option>
                                    <option value="Transferencia">Transferencia</option>
                                    <option value="Efectivo">Efectivo</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="fpEstado" class="form-label">Estado</label>
                                <select name="fpEstado" id="fpEstado" class="form-select" required>
                                    <option value="">Seleccione estado</option>
                                    <option value="Activo">Activo</option>
                                    <option value="Inactivo">Inactivo</option>
                                </select>
                            </div>




                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <?php
    }

    public static function modalEdit()
    {
        ?>
        <div class="modal" tabindex="-1" id="modalEditForma">
            <div class="modal-dialog modal-xs">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Forma
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form name="frmUpdateForma" action="<?php echo getUrl('Forma', 'Forma', 'postUpdate'); ?>"
                            method="post">

                            <div class="mb-3">
                                <label for="idFormaEdit" class="form-label">Código</label>
                                <input type="number" name="idFormaEdit" id="idFormaEdit" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="fpDescripcionEdit" class="form-label">Descripción</label>
                                <select name="fpDescripcionEdit" id="fpDescripcionEdit" class="form-control" required>
                                    <option value="">Seleccione una opción</option>
                                    <option value="Transferencia">Transferencia</option>
                                    <option value="Efectivo">Efectivo</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="fpEstadoEdit" class="form-label">Estado</label>
                                <select name="fpEstadoEdit" id="fpEstadoEdit" class="form-control" required>
                                    <option value="">Seleccione estado</option>
                                    <option value="Activo">Activo</option>
                                    <option value="Inactivo">Inactivo</option>
                                </select>
                            </div>



                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Guardar cambios</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}