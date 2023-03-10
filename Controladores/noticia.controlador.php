<?php

require_once "modelos/noticia.php";
// require_once "modelos/usuarios.php";
// require_once "modelos/comentarios.php";

class noticiaControlador{

    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo=new noticia;
    }

    public function Inicio(){
        require_once "vistas/encabezado.php";
        require_once "vistas/sidebar.php";
        require_once "vistas/inicio/principal.php";
        require_once "vistas/pie.php";
    }

    public function VerNoticia(){
        $p=new noticia();
        if(isset($_GET['id'])){
            $p=$this->modelo->ObtenerNoticiaComentario($_GET['id']);
            $titulo="Noticia";
        }
        require_once "vistas/encabezado.php";
        require_once "vistas/sidebar.php";
        require_once "vistas/noticias/pages/comentarios.php";
        require_once "vistas/pie.php";
    }


    public function Deportes(){
        $p=new noticia();
        if(isset($_GET['seccion'])){
            $p=$this->modelo->ListarDeportes($_GET['seccion']);
            $titulo="Deportes";
        }
        require_once "vistas/encabezado.php";
        require_once "vistas/sidebar.php";
        require_once "vistas/noticias/pages/deportes.php";
        require_once "vistas/pie.php";
    }

    public function Tecnologia(){
        $p=new noticia();
        if(isset($_GET['seccion'])){
            $p=$this->modelo->ListarTecnologia($_GET['seccion']);
            $titulo="Tecnologia";
        }
        require_once "vistas/encabezado.php";
        require_once "vistas/sidebar.php";
        require_once "vistas/noticias/pages/tecnologia.php";
        require_once "vistas/pie.php";
    }

    public function Politica(){
        $p=new noticia();
        if(isset($_GET['seccion'])){
            $p=$this->modelo->ListarPolitica($_GET['seccion']);
            $titulo="Política";
        }
        require_once "vistas/encabezado.php";
        require_once "vistas/sidebar.php";
        require_once "vistas/noticias/pages/politica.php";
        require_once "vistas/pie.php";
    }

    public function Entretenimiento(){
        $p=new noticia();
        if(isset($_GET['seccion'])){
            $p=$this->modelo->ListarEntretenimiento($_GET['seccion']);
            $titulo="Entretenimiento";
        }
        require_once "vistas/encabezado.php";
        require_once "vistas/sidebar.php";
        require_once "vistas/noticias/pages/entretenimiento.php";
        require_once "vistas/pie.php";
    }

    public function Economia(){
        $p=new noticia();
        if(isset($_GET['seccion'])){
            $p=$this->modelo->ListarEconomia($_GET['seccion']);
            $titulo="Economía";
        }
        require_once "vistas/encabezado.php";
        require_once "vistas/sidebar.php";
        require_once "vistas/noticias/pages/economia.php";
        require_once "vistas/pie.php";
    }

    
    public function FormCrear(){
        $titulo="Registrar";
        $p=new noticia();
        if(isset($_GET['id'])){
            $p=$this->modelo->Listar($_GET['id']);
            $titulo="Modificar";
        }

        require_once "vistas/encabezado.php";
        require_once "vistas/noticias/pages/form.php";
        require_once "vistas/pie.php";
    }

    public function Guardar(){
        $p=new noticia();
        $p->setid_noticias(intval($_POST['ID']));
        $p->settitulo_noticias($_POST['titulo']);
        $p->setcontenido_noticias($_POST['contenido']);
        $p->setautor_noticias($_POST['autor']);
        $p->setseccion_noticias($_POST['seccion']);
        $p->setestado_noticias($_POST['estado']);
        $p->setimagen_noticias($_POST['imagen']);
  

        $p->getid_noticias() > 0 ?
        $this->modelo->Actualizar($p) :
        $this->modelo->Insertar($p);

        header("location:?c=noticia");
    }

    public function Borrar(){
        $this->modelo->Eliminar($_GET["id"]);
        header("location:?c=noticia");
    }


}
?>