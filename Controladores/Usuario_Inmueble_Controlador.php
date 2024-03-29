<?php
  class Usuario_Inmueble_Controlador{
    public function __construct(){}
    public function select_usuario_inmueble(){
      $usuario_inmuebles=Usuario_Inmueble::select_usuario_inmueble();
      require_once('Vistas/Usuario_Inmueble/select_usuario_inmueble.php');
    }
    public function index(){
      $usuario_inmuebles=Usuario_Inmueble::listar_todos();
      require_once('Vistas/Usuario_Inmueble/index.php');
    }
    public function indexusuario(){
      $usuario_inmuebles=Usuario_Inmueble::listar_usuario_inmueble($_SESSION['acceso']['id_usuario']);
      require_once('Vistas/Usuario_Inmueble/indexusuario.php');
    }
    public function formulario_registrar(){
      require_once('Vistas/Usuario_Inmueble/formulario_registrar.php');
    }
    public function registrar_usuario_inmueble($usuario_inmueble){
      Usuario_Inmueble::registrar_usuario_inmueble($usuario_inmueble);
      session_start();
      $_SESSION['guardar'] = "Agregado Con Éxito";
      header('Location: ../index.php?controller=usuario_inmueble&action=index');
    }
    public function formulario_modificar(){
      require_once('Modelos/Usuario_inmueble.php');
      $usuario_inmueble=Usuario_inmueble::Obtener_por_id_usuario_inmueble($_GET['id_usuario_inmueble']);
      require_once('Vistas/Usuario_Inmueble/formulario_modificar.php');
    }
    public function modificar_usuario_inmueble($id_usuario_inmueble,$id_usuario,$codigo_inmueble){
      Usuario_Inmueble::modificar_usuario_inmueble($id_usuario_inmueble,$id_usuario,$codigo_inmueble);
      session_start();
      $_SESSION['modificar'] = "Se Han Modificado Los Datos Con Éxito";
      header('Location: ../index.php?controller=usuario_inmueble&action=index');
    }
    public function eliminar_usuario_inmueble($id_usuario_inmueble){
      Usuario_Inmueble::eliminar_usuario_inmueble($id_usuario_inmueble);
    }
    public function consultar_usuario_inmueble($dato){
      $id_usuario = Usuario_Inmueble::consultar_valor($dato);
      return $id_usuario;
    }
    public function llenar_select_usuario_inmueble(){
      require_once('Modelos/Usuario_Inmueble.php');
      require_once('conexion.php');
      $controller= new Usuario_Inmueble_Controlador();
      $usuario_inmuebles=Usuario_Inmueble::listar_todos();
    }
    public function error(){
        header('Vistas/error.php');
    }
  }
  if(isset($llenar_select_usuario_inmueble)){
    require_once('Modelos/Usuario_Inmueble.php');
    $usuario_inmuebles=Usuario_Inmueble::listar_todos();
    require_once('Vistas/Usuario_Inmueble/select_usuario_inmueble.php');
  }
  if (isset($_POST['action'])){
    if(($_POST['action']=='registrar_usuario_inmueble')){
        require_once('../Modelos/Usuario_Inmueble.php');
        require_once('../conexion.php');
        $usuario_inmueble_controlador=new Usuario_Inmueble_Controlador();
        $usuario_inmueble= new Usuario_Inmueble('', $_POST['slcusuario'], $_POST['slcinmueble']);
        $usuario_inmueble_controlador->registrar_usuario_inmueble($usuario_inmueble);
    }
    if(($_POST['action']=='modificar_usuario_inmueble')){
        require_once('../Modelos/Usuario_Inmueble.php');
        require_once('../conexion.php');
        $usuario_inmueble_controlador=new Usuario_Inmueble_Controlador();
        $usuario_inmueble_controlador->modificar_usuario_inmueble($_POST['id_usuario_inmueble'], $_POST['slcusuario'],$_POST['slcinmueble']);
    }
  }
  if (isset($_GET['action'])){
    if(($_GET['action']=='eliminar_usuario_inmueble')){
      require_once('Modelos/Usuario_Inmueble.php');
      require_once('conexion.php');
      $usuario_inmueble_controlador=new Usuario_Inmueble_Controlador();
      $usuario_inmueble_controlador->eliminar_usuario_inmueble($_GET['id_usuario_inmueble']);
    }
  }
  if (isset($_POST['action'])){
    if($_POST['action']=='Buscar') {
      require_once('../Modelos/Usuario_Inmueble.php');
      require_once('../conexion.php');
      $usuario_inmueble_controlador=new Usuario_Inmueble_Controlador();
      $usuario_inmueble= new Usuario_Inmueble('','','');
      $usuario_inmueble_controlador->buscar_usuario_inmueble($_POST['dato_buscar']);
    }
    if($_POST['action']=='consultar_usuario_inmueble') {
    require_once('../Modelos/Usuario_Inmueble.php');
    require_once('../conexion.php');
    $usuario_inmueble_controlador=new Usuario_Inmueble_Controlador();
    $usuario_inmueble= new Usuario_Inmueble('','','');
    echo  $usuario_inmueble_controlador->consultar_usuario_inmueble($_POST['dato_buscar']);
    }
  }
?>
