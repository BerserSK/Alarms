
const selectElement = document.querySelector("#action");


selectElement.addEventListener("change", (e) =>{
    const seleccionado = e.target.value;

    if(seleccionado === "2"){
        console.log("Se ha seleccionado el cierre")
        const b = document.getElementById("form");
        const id = document.getElementById("row1").innerHTML;
        const users = document.getElementById("users").value;

      

        let texto = `
        <p class="prueba2"></p>
            <form action="index.php?paginaGlobal=insertSelect" method="POST" class="form-alarms">
                <div class="grupo">
                    <div class="subgrupo">
                        <label class="label-alarms">Hora de cierre:</label>
                        <input type="datetime-local" name="date" class="input-alarms">
                    </div>
                    <div class="subgrupo">
                        <label class="label-alarms">Persona que confirma:</label>
                        <input type="text" name="person" class="input-alarms">
                    </div>
                </div>
                <input type="text" id="atm_FK" placeholder="" name="atm_FK" value="${id}" readonly=»readonly» hidden>
                <input type="text" id="user_fk" placeholder="" name="user_fk" value="${users}" readonly=»readonly» hidden>
                <input type="number" placeholder="Tiempo solicitado (Minutos)" name="time" hidden>
                <div class="grupo">
                    <div class="subgrupo">
                        <label class="observation">Observaciones (Opcional):</label> 
                        <textarea class="label-alarms" name="observation"></textarea>
                    </div>
                        <select name="idAction" class="action" id="action" hidden> 
                            <option value="2" selected>Cierre</option>
                        </select>
                    <div class="subgrupo">
                        <button type="submit" class="submit" value="finalizar">Finalizar</button>
                    </div>
                </div>
            </form>
        ` 
                           
        b.innerHTML = texto;
        
    }else if (seleccionado === "1"){
        console.log("Se ha seleccionado la apertura")
        const b = document.getElementById("form");
        const id = document.getElementById("row1").innerHTML;
        const users = document.getElementById("users").value;
        const date = document.getElementById("date").value;

        let texto = `
        <p class="prueba2"></p>
        <form action="index.php?paginaGlobal=insertSelect" method="POST" class="form-alarms">
            <input type="datetime" name="date" value="${date}"  readonly=»readonly» hidden>
            <div class="grupo">
                <div class="subgrupo">
                    <label class="label-alarms-hour">Tiempo solicitado:</label>
                    <input type="number"" class="input-alarms-hour" name="time">
                </div>
            </div>
            <input type="text" id="atm_FK" placeholder="" name="atm_FK" value="${id}" readonly=»readonly» hidden>
            <input type="text" id="user_fk" placeholder="" name="user_fk" value="${users}" readonly=»readonly» hidden>
            <input type="text" placeholder="Persona que confirma" name="person" hidden> 
            <div class="grupo">
                <div class="subgrupo">
                    <label class="observation">Observaciones (Opcional):</label> 
                    <textarea class="label-alarms" name="observation"></textarea>
                </div>
                <div class="subgrupo">
                    <button type="submit" class="submit" value="finalizar">Finalizar</button>
                </div>
            </div>
            <select name="idAction" class="action" id="action" hidden>
                <option value="1" selected>Apertura</option>
            </select>
        </form>
        `
        b.innerHTML = texto;
    }
})


function selected(){
    var index,
    table = document.getElementById("table");

    for(var i=1; i < table.rows.length; i++){
        table.rows[i].onclick = function(){

            if(typeof index !== "undefined"){
                table.rows[index].classList.toggle("selected")
            }

            //Get the selected row index
            index = this.rowIndex;
            //Add class selected to the rows
            this.classList.toggle("selected");
            console.log(index)
        }
    }
}
selected();

//==========================================//
document.querySelector("#row1").addEventListener("click",function(e){
    document.querySelector(".table-infos").classList.toggle("table-infos-active");
    document.querySelector(".table-infoss").classList.toggle("table-infoss-active");
})  
//==========================================//
