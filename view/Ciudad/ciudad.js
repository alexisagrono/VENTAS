$(document).ready(function () {
   listCiudad();
});
var listCiudad= function () {
    var table = $('#dt_depto').DataTable({
        destroy: true,
        responsive: true,
        searching: true,
        orderable: false,
        lengthChange: false,
        pageLength: 15,
        autoWidth: true,
        ajax: {
            url: "ajax.php?module=Ciudad&controller=Ciudad&function=data",
            method: "post"
        },
 
        "columns": [
            { "data": "idCiudad" },
            { "data": "nomCiudad" },
            { "data": "idDepartamento" },
             { "data": "habitantes" },
            { "data": "Departamento" },
            { "data": "buttons" }
        ]
    });
   showModalsCiudad("#dt_depto tbody", table);
}
var showModalsCiudad = function (tbody, table) {
    $(tbody).on("click", ".btnShowEdit", function () {
        var url = $(this).attr("data-url");
        $.ajax({
            url: url,
            dataType: "JSON",
            success: function (rs) {
                //console.log(rs);//INTENTO NUMERO DE CAMBIO numero 1, ahora vamos en el 2
                $("#idCiudadEdit").val(rs.id);
                $("#NameCiudadEdit").val(rs.nombre);
                $("#idDepartamentoEdit").val(rs.idDepto);
                $("#habitantesEdit").val(rs.habitantes);
            },
        });
    });
    $(tbody).on("click", "#btnDelete", function () {
    });
};
