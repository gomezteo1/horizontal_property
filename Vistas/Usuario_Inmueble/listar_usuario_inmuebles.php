<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive">
	<thead>
		<tr>
			<td><b>Serial Usuario Inmueble</b></td>
			<td><b>Usuario</b></td>
			<td><b>Inmueble</b></td>
			<td colspan=2><b>Acciones</b></td>
		</tr>		
	</thead>
	<?php foreach ($usuario_inmuebles as $usuario_inmueble) { ?>
	<tbody>
		<tr>
			<td><?php echo $usuario_inmueble->id_usuario_inmueble; ?></td>
			<td><?php echo $usuario_inmueble->nombreUsuario; ?></td>
			<td><?php echo $usuario_inmueble->nombreInmueble;?></td>
			<td><a class="btn btn-secondary" href="?controller=usuario_inmueble&action=formulario_modificar&id_usuario_inmueble=<?php echo $usuario_inmueble->id_usuario_inmueble ?>">Actualizar</a></td>
		</tr>
	</tbody>
	<?php }	?>
	<tfoot>
		<tr>
			<td><b>Serial Usuario Inmueble</b></td>
			<td><b>Usuario</b></td>
			<td><b>Inmueble</b></td>
			<td colspan=2><b>Acciones</b></td>
		</tr>		
	</tfoot>
</table>