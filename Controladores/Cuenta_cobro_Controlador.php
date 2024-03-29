<?php
	class Cuenta_cobro_Controlador{
		public function __construct(){}
		public function index(){
			$cuenta_cobros=Cuenta_cobro::listar_todos();
			require_once('Vistas/Cuenta_cobro/index.php');
		}
		public function indexusuario(){
			$cuenta_cobros=Cuenta_cobro::listar_cuenta_cobro_usuario($_SESSION['acceso']['id_usuario']);
			require_once('Vistas/Cuenta_cobro/indexusuario.php');
		}
		public function llenar_select_cuenta_cobro(){
			require_once('Modelos/Cuenta_cobro.php');
			require_once('conexion.php');
			$controller= new Cuenta_cobro_Controlador();
			$cuenta_cobros=Cuenta_cobro::listar_todos();
		}
		public function desactivar_estado_cuenta_cobro($codigo_cuenta_cobro,$on){
			require_once('../Modelos/Cuenta_cobro.php');
			if($on==1){
				return Cuenta_cobro::desactivar_estado_cuenta_cobro($codigo_cuenta_cobro);
			}
			else{
				return Cuenta_cobro::activar_estado_cuenta_cobro($codigo_cuenta_cobro);
			}
		}
		public function activar_estado_cuenta_cobro($codigo_cuenta_cobro){
			require_once('../Modelos/Cuenta_cobro.php');
			return Cuenta_cobro::activar_estado_cuenta_cobro($codigo_cuenta_cobro);
		}
		public function formulario_cuenta_cobro(){
			require_once('Vistas/Cuenta_cobro/formulario_cuenta_cobro.php');
		}
		public function registrar_cuenta_cobro($cuenta_cobro){
			Cuenta_cobro::registrar_cuenta_cobro($cuenta_cobro);
		}
		public function desactivarEstadoLista(){
			require_once('Modelos/Cuenta_cobro.php');
			Cuenta_cobro::desactivarEstadoLista($_GET['codigo_cuenta_cobro']);
		}
		public function activarEstadoLista(){
			require_once('Modelos/Cuenta_cobro.php');
			Cuenta_cobro::activarEstadoLista($_GET['codigo_cuenta_cobro']);
		}
		public function formulario_modificar(){
			require_once('Modelos/Cuenta_cobro.php');
			$cuenta_cobro=Cuenta_cobro::Obtener_cuenta_cobro($_GET['codigo_cuenta_cobro']);
			require_once('Vistas/Cuenta_cobro/formulario_modificar.php');
		}
		public function modificar_cuenta_cobro($codigo_cuenta_cobro,$numero_cuenta,$nit,$id_usuario_inmueble,$codigo_month,$fecha,$monto_por_cancelar,$porMora,$estado){
			Cuenta_cobro::modificar_cuenta_cobro($codigo_cuenta_cobro,$numero_cuenta,$nit,$id_usuario_inmueble,$codigo_month,$fecha,$monto_por_cancelar,$porMora,$estado);
			session_start();
			$_SESSION['modificar'] = "Se han modificado los datos con éxito";
			header('Location: ../index.php?controller=cuenta_cobro&action=index');;
		}
		public function consultar_tipo_cuenta_cobro($dato){
			$cuenta_cobros = Cuenta_cobro::buscar_tipo_cuenta_cobro($dato);
		}
		public function consultar_pago($dato){
			$monto_por_cancelar = Cuenta_cobro::consultar_valor($dato);
			return $monto_por_cancelar;
		}
		public function error(){
			header('Vistas/error.php');
		}
		public function registrar_detalle_cuenta_cobro($ccc,$cm){
			Detalle_Cuenta_cobro::registrar_detalle_cuenta_cobro($ccc,$cm);
		}
		public function ultima_cuenta_cobro(){
			return Cuenta_cobro::Obtener_ultima_cuenta_cobro();
		}
	}
	if(isset($_POST["cuenta_cobro"])){
		$cuenta_cobro_controlador=new Cuenta_cobro_Controlador();
		$detalleCuentasCobro = json_decode($_POST['detalleCuentasCobro']);
		require_once('../Modelos/Cuenta_cobro.php');
		require_once('../Modelos/Detalle_Cuenta_cobro.php');
		require_once('../Modelos/Usuario_inmueble.php');
		require_once('../conexion.php');
		foreach($detalleCuentasCobro as $cuenta ){
			$cuenta_cobro = new cuenta_cobro(
				'',
				$cuenta->numero_cuenta,
				$cuenta->nit,
				$cuenta->slcusuario_inmueble,
				$cuenta->slcmonth,
				'',
				$cuenta->monto_por_cancelar
				,'1.5'
				,'0'
			);
			$cuenta_cobro_controlador->registrar_cuenta_cobro($cuenta_cobro);
		}
	}
	if(isset($llenar_select_cuenta_cobro)){
		require_once('Modelos/Cuenta_cobro.php');
		$cuenta_cobros=Cuenta_cobro::listar_todos();
		require_once('Vistas/Cuenta_cobro/select_cuenta_cobro.php');
	}
	if (isset($_POST['action'])){
		if(($_POST['action']=='modificar_cuenta_cobro')){
			require_once('../Modelos/Cuenta_cobro.php');
			require_once('../conexion.php');
			$cuenta_cobro_controlador=new Cuenta_cobro_Controlador();
			$cuenta_cobro= new Cuenta_cobro($_POST['codigo_cuenta_cobro'], $_POST['numero_cuenta'], $_POST['nit'],
			$_POST['slcusuario_inmueble'],$_POST['slcmonth'],$_POST['fecha'],$_POST['monto_por_cancelar'],
			$_POST['porMora'],'');
			$cuenta_cobro_controlador->modificar_cuenta_cobro($_POST['codigo_cuenta_cobro'],$_POST['numero_cuenta'],
			$_POST['nit'],$_POST['slcusuario_inmueble'],$_POST['slcmonth'],$_POST['fecha'],
			$_POST['monto_por_cancelar'],$_POST['porMora'],'');
		}
	}

	if (isset($_POST['action'])){
		if($_POST['action'] == 'desactivar_estado'){
			$cuenta_cobro_controlador = new Cuenta_cobro_Controlador();
			echo $cuenta_cobro_controlador->desactivar_estado_cuenta_cobro($_POST['codigo_cuenta_cobro'],$_POST['on']);
		}

		if($_POST['action'] == 'activar_estado'){
			$cuenta_cobro_controlador = new Cuenta_cobro_Controlador();
			echo $cuenta_cobro_controlador->activar_estado_cuenta_cobro($_POST['codigo_cuenta_cobro']);
		}

		if($_POST['action']=='Buscar'){
			require_once('../Modelos/Cuenta_cobro.php');
			require_once('../conexion.php');
			$cuenta_cobro_controlador=new Cuenta_cobro_Controlador();
			$cuenta_cobro= new Cuenta_cobro('','','','','','','','','');
			$cuenta_cobro_controlador->buscar_cuenta_cobro($_POST['dato_buscar']);
		}

		if($_POST['action']=='consultar_valor') {
			require_once('../Modelos/Cuenta_cobro.php');
			require_once('../conexion.php');
			$cuenta_cobro_controlador=new Cuenta_cobro_Controlador();
			$cuenta_cobro= new Cuenta_cobro('','','','','','','','','');
			echo $cuenta_cobro_controlador->consultar_pago($_POST['dato_buscar']);
			
		}

		if($_POST['action']=='consultar_cuenta_de_cobro'){
			require_once('../Modelos/Cuenta_cobro.php');
			require_once('../conexion.php');
			$cuenta_cobro_controlador=new Cuenta_cobro_Controlador();
			$cuenta_cobro= new Cuenta_cobro('','','','','','','','','');
			$cuenta_cobro_controlador->consultar_tipo_cuenta_cobro($_POST['dato_buscar']);
		}
	}
?>
