
/**Acceder al boton para abrir el modal */
let btnmodal=document.getElementById("abrirModal");


/** Acceder a la ventana modal */
let venmodal=document.getElementById("ventanaModal");

/**Acceder al boton cerrar de la ventana modal */
let cermodal=document.querySelector(".cerrarModal");
btnmodal.addEventListener('click',()=>{
    venmodal.style.display="block";
})

cermodal.addEventListener('click',()=>{
    venmodal.style.display="none"
})

window.addEventListener('click',(e)=>{
    if(e.target==venmodal){
        venmodal.style.display="none"
    }
})



/**Acceder al boton para abrir el modal */
let btnmodalGrafico=document.getElementById("abrirModalGrafico");


/** Acceder a la ventana modal */
let venmodalGrafico=document.getElementById("ventanaModalGrafico");

/**Acceder al boton cerrar de la ventana modal */
let cermodalGrafico=document.querySelector(".cerrarModalGrafico");
btnmodalGrafico.addEventListener('click',()=>{
    venmodalGrafico.style.display="block";
})

cermodalGrafico.addEventListener('click',()=>{
    venmodalGrafico.style.display="none"
})

window.addEventListener('click',(e)=>{
    if(e.target==venmodalGrafico){
        venmodalGrafico.style.display="none"
    }
})

/*=============================================*/
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


CargarDatosGraficoBarHorizantal();
CargarDatosGraficoBar();
CargarDatosGraficoPie();

function CargarDatosGraficoBar() {
    $.ajax({
        url: 'models/controlador.grafico.php',
        type: 'POST'
    }).done(function (resp) {
        if (resp.length > 0) {
            var titulo = [];
            var cantidad = [];
            var index = "x";
            var colores = []
            var data = JSON.parse(resp)
            for (var i = 0; i < data.length; i++) {
                titulo.push(data[i][1]);
                cantidad.push(data[i][1]);
                colores.push(colorRGB());
            }

            for (var a = 0; a < data.length; a++) {
                titulo.push(data[a][0]);
                cantidad.push(data[a][0]);
                colores.push(colorRGB());
            }

            CrearGrafico(titulo, cantidad, colores, "bar", "Grafico Cierre/Apertura ", "graficoBar", index);
        }


    })
}

function CargarDatosGraficoBarHorizantal() {
    $.ajax({
        url: 'models/controlador.grafico.php',
        type: 'POST'
    }).done(function (resp) {
        if (resp.length > 0) {
            var titulo = [];
            var cantidad = [];
            var index = "y";
            var colores = []
            var data = JSON.parse(resp)
            for (var i = 0; i < data.length; i++) {
                titulo.push(data[i][1]);
                cantidad.push(data[i][1]);
                colores.push(colorRGB());
            }

            for (var a = 0; a < data.length; a++) {
                titulo.push(data[a][0]);
                cantidad.push(data[a][0]);
                colores.push(colorRGB());
            }

            CrearGrafico(titulo, cantidad, colores, "bar", "Grafico Cierre/Apertura",
                "graficoHorizontalBar", index);
        }


    })
}

function CargarDatosGraficoPie() {
    $.ajax({
        url: 'models/controlador.grafico.php',
        type: 'POST'
    }).done(function (resp) {
        if (resp.length > 0) {
            var titulo = [];
            var cantidad = [];
            var index = "";
            var colores = []
            var data = JSON.parse(resp)
            for (var i = 0; i < data.length; i++) {
                titulo.push(data[i][1]);
                cantidad.push(data[i][1]);
                colores.push(colorRGB());
            }

            for (var a = 0; a < data.length; a++) {
                titulo.push(data[a][0]);
                cantidad.push(data[a][0]);
                colores.push(colorRGB());
            }

            CrearGrafico(titulo, cantidad, colores, "pie", "Grafico Cierre/Apertura", "graficoPie",
                index);
        }


    })
}

function CrearGrafico(titulo, cantidad, colores, tipo, encabezado, id, index) {
    const ctx = document.getElementById(id);

    new Chart(ctx, {
        type: tipo,
        data: {
            labels: titulo,
            datasets: [{
                label: encabezado,
                data: cantidad,
                backgroundColor: colores,
                borderColor: colores,
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            indexAxis: index
        }
    });
}

function generarNumero(numero) {
    return (Math.random() * numero).toFixed(0);
}

function colorRGB() {
    var coolor = "(" + generarNumero(255) + "," + generarNumero(255) + "," + generarNumero(255) + ")";
    return "rgb" + coolor;
}

/////////////////////////////////////////////////////////////////////////////////
/////////////////////////Funciones para parametres//////////////////////////////
TraerAno();
function TraerAno(){
var mifecha = new Date();
var ano = mifecha.getFullYear();
var cadena = "";
for(var i = 2015; i<ano+1; i++){
    cadena +="<option value="+i+">"+i+"</option>";
}

$("#select_finicio").html(cadena);
$("#select_ffin").html(cadena);
}
var fechaInicio = $("#select_finicio").val()
var fechaFin = $("#select_ffin").val()
function CargarDatosGraficoDoughnut() {
    
    $.ajax({
        url: 'models/controlador.parametro.php',
        type: 'POST',
        data:{
            inicio: fechaInicio,
            fin: fechaFin
        }
    }).done(function (resp) {
        if (resp.length > 0) {
            var titulo = [];
            var cantidad = [];
            var index = "x";
            var colores = []
            var data = JSON.parse(resp)
            for (var i = 0; i < data.length; i++) {
                titulo.push(data[i][0]);
                cantidad.push(data[i][1]);
                colores.push(colorRGB());
            }

            CrearGrafico(titulo, cantidad, colores, "doughnut", "Grafico En Barras ", "graficoDoughnut_parametros", index);
        }


    })
}

//////////////////////////////////////////////////////////////////////////////////
function CrearGrafico(titulo, cantidad, colores, tipo, encabezado, id, index) {
    const ctx = document.getElementById(id);

    new Chart(ctx, {
        type: tipo,
        data: {
            labels: titulo,
            datasets: [{
                label: encabezado,
                data: cantidad,
                backgroundColor: colores,
                borderColor: colores,
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            indexAxis: index
        }
    });
}