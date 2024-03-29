<!DOCTYPE html>
<html>
<head>
	<title>Inicio Pago</title>
</head>
	<?php 
	require_once('conexion.php');
	?>
<body>
	<div align="center">
		<section class="full-width header-well">
			<div class="full-width header-well-icon">
				<i class="zmdi zmdi-shopping-cart"></i>
			</div>
			<div align="left" class="full-width header-well-text">
				<p class="text-condensedLight">
					Tus Pagos
				</p>
			</div>
		</section>
		<div class=""></div>
		<div class="mdl-grid">
			<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
			<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive">
						<thead>
							<tr>
								<td><b>Serial Pago</b></td>
								<td><b>Nombre</b></td>
								<td><b>Serial Cuenta Cobro</b></td>
								<td><b>Fecha</b></td>
								<td><b>Tipo Pago</b></td>
								<td><b>Monto Cancelado</b></td>
								<td><b>Monto a Pagar</b></td>
								<td colspan="1" align="center"><b>Acciones</b></td>
							</tr>		
						</thead>
						<?php  
						foreach ($pagos as $pago) { ?>
						<tbody>
							<tr>
								<td><?php echo $pago->codigo_pago; ?></td>
								<td><?php echo $pago->nombreUsuario; ?></td>
								<td><?php echo $pago->codigo_cuenta_cobro;?></td>
								<td><?php echo $pago->fecha; ?></td>
								<td><?php echo $pago->nombreTipoPago;?></td>
								<td><?php echo $pago->monto_cancelado; ?></td>
								<td><?php echo $pago->monto_a_pagar;?></td>
								<td><a class="btn btn-success" target="_blank" href="?controller=reporte&action=index&codigo_pago=<?php echo $pago->codigo_pago ?>">Ver</a></td>
							</tr>
						</tbody>									
						<?php }	?>
						<tfoot>
							<tr>
								<td><b>Serial Pago</b></td>
								<td><b>Nombre</b></td>
								<td><b>Serial Cuenta Cobro</b></td>
								<td><b>Fecha</b></td>
								<td><b>Tipo Pago</b></td>
								<td><b>Monto Cancelado</b></td>
								<td><b>Monto a Pagar</b></td>
								<td colspan="1" align="center"><b>Acciones</b></td>
							</tr>		
						</tfoot>
					</table>
			</div>
		</div>
	</div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>


