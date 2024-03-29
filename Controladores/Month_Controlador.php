<?php
  class Month_Controlador{
    public function __construct(){}

    public function select_month(){
      $months=Month::select_month();
      require_once('Vistas/Month/select_months.php');
    }
    public function index(){
      $months=Month::listar_todos();
      require_once('Vistas/Month/index.php');
    }
    public function formulario_registrar(){
      require_once('Vistas/Month/formulario_registrar.php');
    } 
    public function registrar_month($month){
      Month::registrar_month($month);
      session_start();
      $_SESSION['guardar'] = "Agregado Con Éxito";
      header('Location: ../index.php?controller=month&action=index');
    }
    public function formulario_modificar(){
      require_once('Modelos/Month.php');
      $month=Month::Obtener_por_codigo_month($_GET['codigo_month']);
      require_once('Vistas/Month/formulario_modificar.php');
    }
      
    public function modificar_month($codigo_month,$mes,$tarifa,$porcentaje,$fecha){
      Month::modificar_month($codigo_month,$mes,$tarifa,$porcentaje,$fecha);
      session_start();
      $_SESSION['modificar'] = "Se Han Modificado Los Datos Con Éxito";
      header('Location: ../index.php?controller=month&action=index');
    }
      
    public function eliminar_month($codigo_month){
      Month::eliminar_month($codigo_moth);
    }

    public function consultar_month($dato){
      $deuda = Month::consultar_valor($dato);
      return $deuda;
    }
    public function llenar_select_month(){
      require_once('Modelos/Month.php');
      require_once('conexion.php');
      $controller= new Month_Controlador();
      $months=Month::listar_todos();
    }
    public function error(){
      header('Vistas/error.php');
    } 
  }
  if(isset($llenar_select_month)){
    require_once('Modelos/Month.php');
    $months=Month::listar_todos();
    require_once('Vistas/Month/select_months.php');
  }
  if (isset($_POST['action'])){
    if(($_POST['action']=='registrar_month')){
      require_once('../Modelos/Month.php');
      require_once('../conexion.php');
      $month_controlador=new Month_Controlador();
      $month= new month('', $_POST['mes'], $_POST['tarifa'], $_POST['porcentaje'], '');
      $month_controlador->registrar_month($month);
    }
    if(($_POST['action']=='modificar_month')){
      require_once('../Modelos/Month.php');
      require_once('../conexion.php');
      $month_controlador=new Month_Controlador();
      $month_controlador->modificar_month($_POST['codigo_month'], $_POST['mes'],$_POST['tarifa'], $_POST['porcentaje'], $_POST['fecha']);
    }
  }
  if (isset($_GET['action'])){
    if(($_GET['action']=='eliminar_month')){
      require_once('Modelos/Month.php');
      require_once('conexion.php');
      $month_controlador=new Month_Controlador();
      $month_controlador->eliminar_month($_GET['codigo_month']);
    } 
  }
  if (isset($_POST['action'])){
    if($_POST['action']=='Buscar') {
      require_once('../Modelos/Month.php');
      require_once('../conexion.php');
      $month_controlador=new Month_Controlador();
      $month= new Month('','','','','');
      $month_controlador->buscar_month($_POST['dato_buscar']);
    }
  }
?>