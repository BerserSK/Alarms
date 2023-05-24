
//==========================================//
$(document).ready(function () {
    $('#myTable2').DataTable({
        language: {
            search: "Buscar:",
            processing: "Traitement en cours...",
            lengthMenu: "Mostrar _MENU_ Elementos",
            info: "Mostrando _START_ a _END_ de _TOTAL_ Elementos",
            infoEmpty: "Mostrando 0 a 0 de 0 Elementos",
            infoFiltered: "(Filtrando de _MAX_ Elementos en Total)",
            infoPostFix: "",
            loadingRecords: "Carga en curso...",
            zeroRecords: "Ningun Elemento Encontrado",
            emptyTable: "Ningun Dato en la Tabla",
            paginate: {
                first: "Primero",
                previous: "Anterior",
                next: "Siguiente",
                last: "Anterior"
            },
            aria: {
                sortAscending: ": Activar para Ordenar la Columna en Orden Ascendente",
                sortDescending: ": Habilitar para Ordenar la Columna en Orden Descendente"
            }
        }
    });
});