$(document).ready(function () {
    listForma();
});
var listForma = function () {
    var table = $('#dt_forma').DataTable({
        destroy: true,
        searching: true,
        orderable: false,
        lengthChange: false,
        pageLength: 15,
        autoWidth: true,
        ajax: {
            url: "ajax.php?module=Forma&controller=Forma&function=data",
            method: "post"
        },


        columns: [
            { "data": "idForma" },
            { "data": "fpDescripcion" },
            { "data": "fpEstado" },
            { "data": "idConcepto" },
            { "data": "descripcion" },
            { "data": "estado" },
            { "data": "buttons" }



        ]
    });
    showModalsForma("#dt_forma tbody", table);
}
var showModalsForma = function (tbody, table) {
    $(tbody).on("click", ".btnShowEdit", function () {
        var url = $(this).attr("data-url");
        $.ajax({
            url: url,
            dataType: "JSON",
            success: function (rs) {
                console.log(rs);

              
                $("#idFormaEdit").val(rs.idForma);
                $("#fpDescripcionEdit").val(rs.fpDescripcion);
                $("#fpEstadoEdit").val(rs.fpEstado);
                $("#idconceptoEdit").val(rs.idConcepto);
                $("#descripcionEdit").val(rs.descripcion);
                $("#estadoEdit").val(rs.estado);


            },
        });

    });
    $(tbody).on("click", ".btnShowDelete", function () {
        let fp_id = $(this).attr('data-id');
        let fp_descripcion = $(this).attr('data-name');
        Swal.fire({
            title: `¿Desea anular el registro`,
            text: `del concepto de pago ${fp_descripcion}?`,
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
                    text: `se realizó la anulacion del registro de ${fp_descripcion}`,
                    icon: "success"
                });
            } else {
                Swal.fire({
                    title: `Cancelación de Funcionalidad`,
                    text: `No se realizó la anulacion del registro de ${fp_descripcion}`,
                    icon: "error"
                });
            }
        });
    });


};

