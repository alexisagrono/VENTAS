<?php
class ModalsConcepto{
    public static function modalCreate(){
        ?>
        <div class="modal" tabindex="-1"  id ="modalCreateConcepto">
          <div class="modal-dialog modal-xs">
            <div class="modal-content">
              <div class="modal-header">
               
                <h5 class="modal-title">Registro Concepto de pago</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form name="frmCreateConcepto" action="<?php echo getUrl('Concepto','Concepto','postNew');?>" method="post">
 
                    <div class="mb-3">
                        <label for="codigo" class="from-label">Codigo</label><br>
                        <input type="number" name="idconcepto" id="idconcepto" class="form-control" require><br>
                    </div>
                    <div class="mb-3">
                        <label for="nombre" class="from-label">Descripcion</label><br>
                        <input type="text" name="descripcion" id="descripcion" class="form-control" require>
                    </div>
                     <div class="mb-3">
                        <label for="nombre" class="from-label">Estado</label><br>
                        <input type="text" name="estado" id="estado" class="form-control" require><br>
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
    <div class="modal" tabindex="-1" id="modalEditConcepto">
        <div class="modal-dialog modal-xs">
            <div class="modal-content">
                <div class="modal-header">
 
                    <h5 class="modal-title">Editar Concepto de PAGO</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               
                </div>
                <div class="modal-body">
                    <form name="frmUpdateConcepto" action="<?php echo getUrl('Concepto', 'Concepto', 'postUpdate');?>" method="post">
                        <div class="mb-3">
                            <label for="codigo" class="from-label">codigo</label><br>
                            <input type="number" name="idConceptoEdit" id="idConceptoEdit" class="form-control" require><br>                        
                        </div>
                        <div class="mb-3">
                            <label for="nombre" class="from-label">descripcion</label><br>
                            <input type="text" name="descripcionEdit" id="descripcionEdit" class="form-control" require>
                        </div>
                        <div class="mb-3">
                            <label for="nombre" class="from-label">Estado</label><br>
                            <input type="text" name="estadoEdit" id="estadoEdit" class="form-control" require><br>
                        </div>
                    
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
 
        </div>
 
    </div>
<?php
    }}