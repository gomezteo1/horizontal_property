<!DOCTYPE html>
<html lang="es">
<head>
	<title>Inicio Abono</title>
</head>
<body>
	<div align="center">
		<section class="full-width header-well">
			<div class="full-width header-well-icon">
				<i class="zmdi zmdi-store"></i>
			</div>
			<div align="left" class="full-width header-well-text">
				<p class="text-condensedLight">
					Inicio de Abono 
					<a align="left" class="btn btn-outline-primary" href="?controller=abono&action=formulario_registrar">Registrar</a>
				</p>
				<input type="text" name="txtbuscar" id="txtbuscar" />
				<img src="./image/buscar.png" class="btn-outline">
			</div>
		</section>
		<div class=""></div>
		<div class="mdl-grid">
			<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
			
		<div id="resultado_busqueda">
			<table id="mytable" class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive">
				<thead>
					<tr>
						<td><b>Serial Abono</b></td>
						<td><b>Monto a pagar</b></td>
						<td><b>Nombre</b></td>
						<td><b>Fecha</b></td>
						<td><b>Deuda</b></td>
						<td><b>Abono</b></td>
						<td><b>Saldo</b></td>
						<td colspan=3 align="center" ><b>Acciones</b></td>
					</tr>
				</thead>			
				<?php
				foreach ($abonos as $abono) { ?>
				<tbody>
					<tr>
						<td><?php echo $abono->codigo_abono; ?></td>
						<td><?php echo $abono->nombrePago; ?></td>
						<td><?php echo $abono->nombreUsuario;?></td>
						<td><?php echo $abono->fecha;?></td>
						<td><?php echo $abono->deuda;?></td>
						<td><?php echo $abono->abono;?></td>
						<td><?php echo $abono->saldo;?></td>
						<td><a  class="btn btn-secondary" href="?controller=abono&action=formulario_modificar&codigo_abono=<?php echo $abono->codigo_abono ?>">Actualizar</a> </td>
						<td scope="col"><a class="btn btn-success" target="_blank" href="?controller=reportea&action=index&codigo_abono=<?php echo $abono->codigo_abono ?>">Ver</a> </td>
					</tr>
				</tbody>			
				<?php } ?>
				<tfoot>
					<tr>
						<td><b>Serial Abono</b></td>
						<td><b>Monto a pagar</b></td>
						<td><b>Nombre</b></td>
						<td><b>Fecha</b></td>
						<td><b>Deuda</b></td>
						<td><b>Abono</b></td>
						<td><b>Saldo</b></td>
						<td colspan=3 align="center" ><b>Acciones</b></td>
					</tr>		
				</tfoot>
			</table>
		</div>
	</div>
	</div>
	<script>
		// Write on keyup event of keyword input element
		$(document).ready(function(){
		$("#txtbuscar").keyup(function(){
		_this = this;
		// Show only matching TR, hide rest of them
		$.each($("#mytable tbody tr"), function() {
		if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
		$(this).hide();
		else
		$(this).show();
		});
		});
		});
		</script>
		<button data-toggle="modal" 
				style="
					position: relative;
  					left: 450px;
					 border: 1px solid #E1E1E1;
					 border-radius: 100%;"
				data-target="#exampleModala ">
					<img src="image/info.png"  >
		</button>	
	
</body>
</html>


<script>
$(function(){ //Función Jquery
  	$('#btnbuscar').click(function(e) {
    e.preventDefault(); //Evitar submit
	metodo="Buscar";
	dato_buscar=document.getElementById('txtbuscar').value;
	//alert(dato_buscar);
	 $.ajax({
			type:'POST',
            //url:'Vistas/Inmueble/prueba.php',
			url:'Controladores/Abono_Controlador.php',
           //dataType: "json",
           data:{action:metodo,dato_buscar:dato_buscar},
            success:function(data){	
document.getElementById('resultado_busqueda').innerHTML=data;				
			}
		});	
	});		
});
</script>