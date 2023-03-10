<?php

require_once "modelos/usuario.php";

class usuarioControlador{

    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo=new usuario;
    }

    public function Inicio(){
        require_once "vistas/encabezado.php";
        require_once "vistas/usuarios/index.php";
        require_once "vistas/pie.php";
    }

    public function FormCrear(){
        $titulo="Registrar";
        $p=new usuario();
        if(isset($_GET['id'])){
            $p=$this->modelo->Obtener($_GET['id']);
            $titulo="Modificar";
        }

        require_once "vistas/encabezado.php";
        require_once "vistas/sidebar.php";
        require_once "vistas/noticias/pages/form.php";
        require_once "vistas/pie.php";
    }

    public function Guardar(){
        $p=new usuario();
        $p->setid_usuarios(intval($_POST['ID']));
        $p->setnombre_usuarios($_POST['nombre']);
        $p->setcorreo_usuarios($_POST['correo']);
        $p->setcontrasena_usuarios($_POST['contrasena']);
        $p->setrol_usuarios($_POST['rol']);
  
        $p->getid_usuarios() > 0 ?
        $this->modelo->Actualizar($p) :
        $this->modelo->Insertar($p);

        header("location:?c=noticia");
    }

    public function Borrar(){
        $this->modelo->Eliminar($_GET["id"]);
        header("location:?c=usuario");
    }


}
?>