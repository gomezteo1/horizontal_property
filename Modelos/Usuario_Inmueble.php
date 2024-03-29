<?php
    class Usuario_Inmueble{
        public $id_usuario_inmueble;
        public $id_usuario;
        public $codigo_inmueble;

        function __construct($id_usuario_inmueble,$id_usuario,$codigo_inmueble){
            $this->id_usuario_inmueble=$id_usuario_inmueble;
            $this->id_usuario=$id_usuario;
            $this->codigo_inmueble=$codigo_inmueble;
         }
        public static function listar_todos(){
            $listar_usuario_inmuebles =[];
            $db=Db::getConnect();
            $sql=$db->query("SELECT  ui.*, ui.id_usuario_inmueble, concat(u.nombres,'', u.apellidos)as xx, concat(i.numero,'', i.torre)as zz
            , concat(concat('',u.nombres,' ', u.apellidos ),' Apartamento ',concat(i.numero,'', i.torre)) as ww
            FROM
            usuario_inmueble ui
            inner join usuario u on ui.id_usuario = u.id_usuario
            inner join inmueble i on ui.codigo_inmueble = i.codigo_inmueble
                ");
            foreach ($sql->fetchAll() as $usuario_inmueble){
                $itemusuario_inmueble= new Usuario_Inmueble($usuario_inmueble['id_usuario_inmueble'], $usuario_inmueble['id_usuario'],
                    $usuario_inmueble['codigo_inmueble']);
                $itemusuario_inmueble->nombreUsuario=$usuario_inmueble['xx'];
                $itemusuario_inmueble->nombreInmueble=$usuario_inmueble['zz'];
                $itemusuario_inmueble->usuarioInmueble=$usuario_inmueble['ww'];

                $listar_usuario_inmuebles[]= $itemusuario_inmueble;
            }
            return $listar_usuario_inmuebles;
        }
        public static function listar_usuario_inmueble($id_usuario){
            $listar_usuario_inmuebles =[];
            $db=Db::getConnect();
            $sql=$db->query("SELECT DISTINCT ui.*, concat(u.nombres,'', u.apellidos)as xx, concat(i.numero,'', i.torre)as zz FROM
            usuario u
            inner join usuario_inmueble ui on u.id_usuario = ui.id_usuario
            inner join inmueble i on ui.codigo_inmueble = i.codigo_inmueble where ui.id_usuario='$id_usuario'");
            foreach ($sql->fetchAll() as $usuario_inmueble){
                $itemusuario_inmueble= new Usuario_Inmueble($usuario_inmueble['id_usuario_inmueble'], $usuario_inmueble['id_usuario'],
                $usuario_inmueble['codigo_inmueble']);
                $itemusuario_inmueble->nombreUsuario=$usuario_inmueble['xx'];
                $itemusuario_inmueble->nombreInmueble=$usuario_inmueble['zz'];
                $listar_usuario_inmuebles[]= $itemusuario_inmueble;
            }
            return $listar_usuario_inmuebles;
        }
        public static function registrar_usuario_inmueble($usuario_inmueble){
            $db=Db::getConnect();
            $insert=$db->prepare('INSERT INTO usuario_inmueble
            VALUES(:id_usuario_inmueble, :id_usuario, :codigo_inmueble)');
            $insert->bindValue('id_usuario_inmueble',$usuario_inmueble->id_usuario_inmueble);
            $insert->bindValue('id_usuario',$usuario_inmueble->id_usuario);
            $insert->bindValue('codigo_inmueble',$usuario_inmueble->codigo_inmueble);
            if($insert->execute()){
                echo "Registro exitoso.";
            }
            else{
                echo "Problemas en el registro.";
            }
        }
        public static function modificar_usuario_inmueble($id_usuario_inmueble,$id_usuario, $codigo_inmueble){
            $db=Db::getConnect();
            $insert=$db->prepare("UPDATE usuario_inmueble SET id_usuario=$id_usuario, codigo_inmueble=$codigo_inmueble
            WHERE id_usuario_inmueble=$id_usuario_inmueble");
            $insert->execute();
        }
        public static function Obtener_por_id_usuario_inmueble($id_usuario_inmueble){
            $db=Db::getConnect();
            $select=$db->prepare("SELECT * FROM usuario_inmueble WHERE id_usuario_inmueble=$id_usuario_inmueble");
            $select->execute();
            $usuario_inmuebleDb=$select->fetch();
            $usuario_inmueble= new Usuario_Inmueble($usuario_inmuebleDb['id_usuario_inmueble'], $usuario_inmuebleDb['id_usuario'], $usuario_inmuebleDb['codigo_inmueble']);
            return $usuario_inmueble;
        } 
        public static function consultar_usuario_inmueble($id_usuario_inmuebles){
            $id_usuario=9;
            $db=Db::getConnect();
            $select=$db->prepare("SELECT * FROM usuario_inmuebles
            WHERE id_usuario_inmuebles=$id_usuario_inmuebles");
            $select->execute();
            foreach ($select->fetchAll() as $usuario_inmuebles) {
              $id_usuario=$usuario_inmuebles['id_usuario'];
            }
            return $id_usuario;
        }
    }
?>
