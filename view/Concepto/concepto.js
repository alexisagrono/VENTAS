$(document).ready(function () {
   listConcepto();
});
var listConcepto = function () {
    var table = $('#dt_concepto').DataTable({
        destroy: true,
        searching: true,
        orderable: false,
        lengthChange: false,
        pageLength: 15,
        autoWidth: true,
        ajax: {
            url: "ajax.php?module=Concepto&controller=Concepto&function=data",
            method: "post"
        },
     
 
        columns: [
            { "data": "idConcepto" },
            { "data": "descripcion" },
            { "data": "estado" },
            { "data": "buttons" }
            
        
            
        ] });
   showModalsConcepto("#dt_concepto tbody", table);
}
var showModalsConcepto = function (tbody, table) {
    $(tbody).on("click", ".btnShowEdit", function () {
        var url = $(this).attr("data-url");
        $.ajax({
            url: url,
            dataType: "JSON",
            success: function (rs) {
            console.log(rs);
                $("#idconceptoEdit").val(rs.idconcepto);
                $("#descripcionEdit").val(rs.descripcion);
                $("#estadoEdit").val(rs.estado);
              
            },
        });

    });
    $(tbody).on("click", ".btnShowDelete", function () {
        let con_id = $(this).attr('data-id');
        let con_descripcion = $(this).attr('data-name');
       Swal.fire({
            title: `¿Desea anular el registro`,
            text: `del concepto de pago ${con_descripcion}?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#DD6B55',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Sí, anular',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                
                 Swal.fire({
                    title: `Anulacion exitosa`,
                    text: `se realizó la anulacion del registro de ${con_descripcion}`,
                    icon: "success"});
            } else {
                Swal.fire({
                    title: `Cancelación de Funcionalidad`,
                    text: `No se realizó la anulacion del registro de ${con_descripcion}`,
                    icon: "error"
                });
            }
        });
    });


};
 
   
