<?php
class ModalsConcepto{
    public static function modalCreate(){
        ?>
        <div class="modal fade" tabindex="-1" id="modalCreateConcepto" aria-labelledby="modalCreateConceptoLabel" aria-hidden="true">
          <div class="modal-dialog modal-md">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modalCreateConceptoLabel">Registro Concepto de pago</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form name="frmCreateConcepto" action="<?php echo getUrl('Concepto','Concepto','postNew');?>" method="post" novalidate>
 
                    <div class="mb-3">
                        <label for="idconcepto" class="form-label">Codigo</label>
                        <input type="text" name="idconcepto" id="idconcepto" class="form-control" required><br>
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripcion</label>
                        <input type="text" name="descripcion" id="descripcion" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="estado" class="form-label">Estado</label>
                        <select name="estado" id="estado" class="form-control" required>
                            <option value="">Seleccione una opción</option>
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
        <div class="modal fade" tabindex="-1" id="modalEditConcepto" aria-labelledby="modalEditConceptoLabel" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEditConceptoLabel">Editar Concepto de PAGO</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form name="frmUpdateConcepto" action="<?php echo getUrl('Concepto', 'Concepto', 'postUpdate');?>" method="post">
                            <div class="mb-3">
                                <label for="idconceptoEdit" class="form-label">Codigo</label>
                                <input type="text" name="idconceptoEdit" id="idconceptoEdit" class="form-control" required readonly>
                            </div>
                            <div class="mb-3">
                                <label for="descripcionEdit" class="form-label">Descripcion</label>
                                <input type="text" name="descripcionEdit" id="descripcionEdit" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="estadoEdit" class="form-label">Estado</label>
                                <select name="estadoEdit" id="estadoEdit" class="form-control" required>
                                    <option value="Activo">Activo</option>
                                    <option value="Inactivo">Inactivo</option>
                                </select>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <?php
    }
}
?>