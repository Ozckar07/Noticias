<?php

require_once "modelos/noticia.php";

class InicioControlador{
    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo=new noticia();
    }

    public function Inicio(){
        require_once "vistas/encabezado.php";
        require_once "vistas/sidebar.php";
        require_once "vistas/inicio/principal.php";
        require_once "vistas/pie.php";
    }

}

?>