$(document).ready(function () {
    listDepartamento();
});
var listDepartamento = function () {
    var table = $('#dt_depto').DataTable({
        destroy: true,
        responsive: true,
        searching: true,
        orderable: false,
        lengthChange: false,
        pageLength: 15,
        autoWidth: true,
        "ajax": {
            "url": "ajax.php?module=Departamento&controller=Departamento&function=data",
            "method": "post"
        },
        "deferRender": true,

        "columns": [
            { "data": "idDepartamento" },
            { "data": "nomDepartamento" },
            { "data": "buttons" }
        ]
    });
    showModalsDepto("#dt_depto tbody", table);
}
var showModalsDepto = function (tbody, table) {
    $(tbody).on("click", ".btnShowEdit", function () {
        var url = $(this).attr("data-url");
        $.ajax({
            url: url,
            dataType: "JSON",
            success: function (rs) {
                console.log(rs);
                $("#idDeptoEdit").val(rs.id);
                $("#nomDeptoEdit").val(rs.nombre);
            },
        });
    });
    $(tbody).on("click", ".btnShowDelete", function () {
        let idDepto = $(this).attr('data-id');
        let nomDepto = $(this).attr('data-name');
        Swal.fire({
            title: `¿Desea anular el registro`,
            text: `Del Departamento ${nomDepto}?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#DD6B55',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Sí, anular',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "ajax.php?module=Departamento&controller=Departamento&function=postDelete",
                    data: {
                        idDepto: idDepto
                    },
                    type: "POST",
                    dataType: "JSON",
                    success: function (rs) {
                        if (rs == 1) {
                            Swal.fire({
                            title: "Departamento",
                            text: `Se anulo con exito el depratmento ${nomDepto}.`,
                            icon: "success",
                            confirmButtonText: "Aceptar"
                        }).then(() => {
                            window.location.href = "index.php?module=Departamento&controller=Departamento&function=read";
                        });
                    }
                    else
                    { Swal.fire({
                    title: `Departamento`,
                    text: `No fue posible anular el registro${nomDepto}`,
                    icon: "error"
                });
                        
                    }
                },
                    });
            } else {
                Swal.fire({
                    title: `Cancelación de Funcionalidad`,
                    text: `No se realizó la anulacion del registro de ${nomDepto}`,
                    icon: "error"
                });
            }
        });
    });

};
