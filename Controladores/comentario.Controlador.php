<?php

require_once "modelos/comentario.php";
require_once "modelos/noticia.php";
require_once "modelos/usuario.php";


class comentarioControlador{

    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo=new comentario;
    }

    public function Inicio(){
        require_once "vistas/encabezado.php";
        require_once "vistas/comentarios/index.php";
        require_once "vistas/pie.php";
    }

    public function FormCrear(){
        $titulo="Registrar";
        $p=new comentario();
        if(isset($_GET['id'])){
            $p=$this->modelo->Obtener($_GET['id']);
            $titulo="Modificar";
        }

        require_once "vistas/encabezado.php";
        require_once "vistas/comentarios/form.php";
        require_once "vistas/pie.php";
    }



    public function Guardar(){
        $p=new comentario();
        $p->setid_comentarios(intval($_POST['ID']));
        $p->settitulo_comentarios($_POST['titulo']);
        $p->setcontenido_comentarios($_POST['contenido']);
        $p->getid_noticias($_POST['noticias']);
        $p->getid_usuarios($_POST['usuarios']);
        $p->setestado_comentarios($_POST['estado']);
  

        $p->getid_comentarios() > 0 ?
        $this->modelo->Actualizar($p) :
        $this->modelo->Insertar($p);

        header("location:?c=comentario");
    }

    public function Borrar(){
        $this->modelo->Eliminar($_GET["id"]);
        header("location:?c=comentario");
    }


}
?>