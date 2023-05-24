<?php 
    header("Content-type: application/xls");
    header("Content-Disposition: attachment; filename = ReporteHistorial.xls");
?>

<?php 
	if (!isset($_SESSION["validar"]) || $_SESSION["validar"] != "ok" ){
	    echo '<script> window.location = "index.php?pagina=login";</script>';
	    return;
	}

	$lectura = ControladorFormularios::ctrSeleccionarHistorial(null);
?>

<?php include('includes/header.php'); ?>
<?php require_once "models/conexion.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- My CSS -->
	<link rel="stylesheet" href="src/style/dashboard.css">
    <link rel="stylesheet" href="src/style/pdf.css" media="print">

	<title>AdminHub</title>
</head>

<body>


<div id="ventanaModal" class="modal">
        <div class="contenidoModal">
            <h2>Reporte Historial</h2>
            <div class="container">
						<table class="container py-5 table table-striped" id="myTable">
							<thead class="">
								<tr>
									<th>Hora y fecha</th>
									<th>Persona Confirma Cierre</th>
									<th>Minutos requeridos</th>
									<th>Accion realizada</th>
									<th>Atm</th>
									<th>Usuario</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($lectura as $key=>$value) :?>
								<tr>
									<td><?php echo $value["hora_fecha"]; ?></td>
									<td><?php echo $value["nombre_persona_cierre"]; ?></td>
									<td><?php echo $value["minutes_required"]; ?></td>
									<td><?php echo $value["estado_action"]; ?></td>
									<td><?php echo $value["atm"]; ?></td>
									<td><?php echo $value["id_user_FK"]; ?></td>
								</tr>
								<?php endforeach ?>
							</tbody>
						</table>
					</div>
        </div>
    </div>
	<script>
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
	</script>
	<script src="src/js/dashboard.js"></script>
</body>

</html>