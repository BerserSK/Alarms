$(document).ready(function () {
    $('#myTable').DataTable({
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

/////////////////////////////////
/**Acceder al boton para abrir el modal */
let btnmodalUpdate=document.getElementById("abrirModalUpdate");


/** Acceder a la ventana modal */
let venmodalUpdate=document.getElementById("ventanaModalUpdate");

/**Acceder al boton cerrar de la ventana modal */
let cermodalUpdate=document.querySelector(".cerrarModalUser");
btnmodalUpdate.addEventListener('click',()=>{
venmodalUpdate.style.display="block";
})

cermodalUpdate.addEventListener('click',()=>{
venmodalUpdate.style.display="none"
})

window.addEventListener('click',(e)=>{
if(e.target==venmodalUpdate){
venmodalUpdate.style.display="none"
}
})

function alert_delete(codigo) {
Swal.fire({
title: '¿Estas Seguro?',
text: "¡No podrás revertir esto!",
icon: 'warning',
showCancelButton: true,
confirmButtonColor: '#3085d6',
cancelButtonColor: '#d33',
confirmButtonText: 'Si, Borralo!',
cancelButtonText: 'Cancelar!'
}).then((result) => {
if (result.isConfirmed) {
    send_php(codigo)
}
})
}

function send_php(codigo){
parametros = {"id": codigo};

$.ajax({
    data: parametros,
    url: "index.php?paginaAdmin=deleteUsers",
    type: "GET",
    beforeSend: function () {},
    success: function () {
        Swal.fire("Borrado!","El usuario ha sido eliminado.","success").then((result) =>{
            window.location.href = "index.php?paginaAdmin=usersAdmin"
        })
    }
})
}
