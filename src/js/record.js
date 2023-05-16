
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