<!DOCTYPE html>
<html lang="es">
<head>
	<title>Modificar Inmueble</title>
</head>
<body>
	
		<form action="Controladores/Inmueble_Controlador.php" method="POST">
		<input  type="hidden" name="action" value="modificar_inmueble">
		
		<section class="full-width header-well">
			<div class="full-width header-well-icon">
				<i class="zmdi zmdi-washing-machine"></i>
			</div>
			<div class="full-width header-well-text" align="left">
				<p class="text-condensedLight">
					Modificar inmueble
				</p>
			</div>
		</section>
		<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
			
			<div class="mdl-tabs__panel is-active" id="tabNewProduct">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--12-col">
						<div class="full-width panel mdl-shadow--2dp">
							<div class="full-width panel-tittle bg-primary text-center tittles">
								 Inmueble
							</div>
							<div class="full-width panel-content">
								
									<div class="mdl-grid">
										<div class="mdl-cell mdl-cell--12-col">
									        <legend class="text-condensedLight"><i class="zmdi zmdi-border-color"></i> &nbsp; Información basica</legend><br>
									    </div>

									    <input value="<?php echo $inmueble->codigo_inmueble ?>" name="codigo_inmueble" id="codigo_inmueble" class="w3-input" type="codigo_inmueble" hidden > 

										<div class="mdl-cell mdl-cell--8-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="number" pattern="-?[0-9- ]*(\.[0-9]+)?" id="numero_matricula" name="numero_matricula" value="<?php echo $inmueble->matricula ?>">
												<label class="mdl-textfield__label" for="numero_matricula"># matricula</label>
												<span class="mdl-textfield__error">Numero de matricula equivocado</span>
											</div>
										</div>

										<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="tipo" name="tipo" value="<?php echo $inmueble->tipo ?>">
												<label class="mdl-textfield__label" for="tipo">Tipo de inmueble</label>
												<span class="mdl-textfield__error">Tipo de inmueble invalido</span>
											</div>
										</div>

										<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="torre" name="torre" value="<?php echo $inmueble->torre ?>">
												<label class="mdl-textfield__label" for="torre">Tipo de inmueble</label>
												<span class="mdl-textfield__error">Torre invalida</span>
											</div>
										</div>
										
										<div class="mdl-cell mdl-cell--8-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="number" pattern="-?[0-9- ]*(\.[0-9]+)?" id="numero" name="numero" value="<?php echo $inmueble->numero ?>">
												<label class="mdl-textfield__label" for="numero"># Inmueble</label>
												<span class="mdl-textfield__error">Numero de inmueble equivocado</span>
											</div>
										</div>

										<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="metros" name="metros" value="<?php echo $inmueble->metros ?>">
												<label class="mdl-textfield__label" for="metros">Metros cuadrados</label>
												<span class="mdl-textfield__error">Tipo de inmueble invalido</span>
											</div>
										</div>

									</div>
									<p class="text-center">
										<button id="button-Minmueble" name="button-Minmueble" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" type="submit">
											<i class="zmdi zmdi-plus"></i>
										</button>
										<div class="mdl-tooltip" for="btn-addProduct">Agregar Inmueble</div>
									</p>
								
							</div>
						</div>
					</div>
				</div>
			</div>
			</form>
			<div class="mostrar"></div>
		</div>
	</div>


</body>

</html>



<!----VALIDACION PERFECTA FULL HD 4K----->
<script type="text/javascript">

$(document).ready(function(){
		$('#button-Minmueble').click(function(){

			if($('#numero_matricula').val()==""){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Debes ingresar el numero de la matricula!',
					})
					return false;
			}
			else if($('#tipo').val()==""){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Debes ingresar el tipo de inmueble!',
					})
					return false;
			}
			if($('#torre').val()==""){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Debes ingresar la torre!',
					})
					return false;
			}
			else if($('#numero').val()==""){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Debes ingresar el numero del inmueble!',
					})
					return false;
			}
			else if($('#metros').val()==""){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Debes ingresar los metros del inmueble!',
					})
					return false;
			}else
				swal({
					title: "Hecho!",
					text: "Se ha actualizado correctamente",
					icon: "success",
					button: "Continuar",
				});
		});
	});

	

</script>


