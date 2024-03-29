<!DOCTYPE html>
<html>
<head>
	<title>Inicio Mes</title>
</head>
<body>
	<div align="center">
		<section class="full-width header-well">
			<div class="full-width header-well-icon">
				<i class="zmdi zmdi-shopping-cart"></i>
			</div>
			<div align="left" class="full-width header-well-text">
				<p class="text-condensedLight">
					Inicio Mes
					<a class="btn btn-outline-primary" href="?controller=month&action=formulario_registrar">Registrar</a>
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
								<td><b>Serial Mes</b></td>
								<td><b>Mes</b></td>
								<td><b>Tarifa</b></td>
								<td><b>Porcentaje</b></td>
								<td><b>Fecha</b></td>
								<td colspan=2 align="center"><b>Acciones</b></td>
							</tr>
						</thead>
						<?php foreach ($months as $month) { ?>
						<tbody>
							<tr>
								<td><?php echo $month->codigo_month; ?></td>
								<td><?php echo $month->mes; ?></td>
								<td><?php echo $month->tarifa; ?></td>
								<td><?php echo $month->porcentaje; ?></td>
								<td><?php echo $month->fecha; ?></td>
								<td><a class="btn btn-secondary" href="?controller=month&action=formulario_modificar&codigo_month=<?php echo $month->codigo_month ?>">Actualizar</a></td>
							</tr>
						</tbody>			
						<?php } ?>
						<tfoot>
							<tr>
								<td><b>Serial Mes</b></td>
								<td><b>Mes</b></td>
								<td><b>Tarifa</b></td>
								<td><b>Porcentaje</b></td>
								<td><b>Fecha</b></td>
								<td colspan=2 align="center"><b>Acciones</b></td>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>	
		</div>	
		<button data-toggle="modal" 
				style="
					position: relative;
  					left: 450px;
					 border: 1px solid #E1E1E1;
					 border-radius: 100%;"
				data-target="#exampleModalm ">
					<img src="image/info.png"  >
		</button>							
	</div>
</body>
<script>
 $(document).ready(function(){
 $("#txtbuscar").keyup(function(){
 _this = this;
 $.each($("#mytable tbody tr"), function() {
 if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
 $(this).hide();
 else
 $(this).show();
 });
 });
});
</script>
<script>
$(function(){ //Función Jquery
  	$('#btnbuscar').click(function(e) {
    e.preventDefault(); //Evitar submit
	metodo="Buscar";
	dato_buscar=document.getElementById('txtbuscar').value;
	 $.ajax({
			type:'POST',
          	url:'Controladores/Month_Controlador.php',
           	data:{action:metodo,dato_buscar:dato_buscar},
            success:function(data){	
			document.getElementById('resultado_busqueda').innerHTML=data;				
			}
		});	
	});		
});
</script>
</html>



