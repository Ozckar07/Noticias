<?php

class noticia{

    private $pdo;

    private $id_noticias;
    private $titulo_noticias;
    private $contenido_noticias;    
    private $autor_noticias;
    private $seccion_noticias;
    private $estado_noticias;
    private $imagen_noticias;
    private $fecha_noticias;

    public function __CONSTRUCT(){
        $this->pdo = BasedeDatos::Conectar();
    }

    public function getid_noticias() : ?int{
        return $this->id_noticias;
    }

    public function setid_noticias(int $id){
        $this->id_noticias=$id;
    }

    public function gettitulo_noticias() : ?string{
        return $this->titulo_noticias;
    }

    public function settitulo_noticias(string $titulo){
        $this->titulo_noticias=$titulo;
    }

    public function getcontenido_noticias() : ?string{
        return $this->contenido_noticias;
    }

    public function setcontenido_noticias(string $contenido){
        $this->contenido_noticias=$contenido;
    }

    public function getautor_noticias() : ?string{
        return $this->autor_noticias;
    }

    public function setautor_noticias(string $autor){
        $this->autor_noticias=$autor;
    }

    public function getseccion_noticias() : ?string{
        return $this->seccion_noticias;
    }

    public function setseccion_noticias(string $seccion){
        $this->seccion_noticias=$seccion;
    }

    public function getestado_noticias() : ?int{
        return $this->estado_noticias;
    }

    public function setestado_noticias(bool $estado){
        $this->estado_noticias=$estado;
    }

    public function getimagen_noticias() : ?string{
        return $this->imagen_noticias;
    }

    public function setimagen_noticias(string $imagen){
        $this->imagen_noticias=$imagen;
    }

    public function getfecha_noticias() : ?string{
        return $this->fecha_noticias;
    }

    public function setfecha_noticias(string $fecha){
        $this->fecha_noticias=$fecha;
    }



    public function Cantidad(){
        try{
            $consulta=$this->pdo->prepare("SELECT SUM(estado_noticias) as Cantidad FROM noticias;");
            $consulta->execute();
            return $consulta->fetch(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function Listar(){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM noticias;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function ObtenerNoticiaComentario($id){
        try{
            $consulta=$this->pdo->prepare("SELECT comentarios.*, usuarios.nombre_usuarios FROM comentarios INNER JOIN usuarios ON comentarios.id_usuarios = ? WHERE comentarios.id_noticias = ? GROUP BY id_comentarios;");
            $consulta->execute(array($id));
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function Obtener($id){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM noticias WHERE id_noticias=?;");
            $consulta->execute(array($id));
            $r=$consulta->fetch(PDO::FETCH_OBJ);
            $p=new noticia();
            $p->setid_noticias($r->id_noticias);
            $p->settitulo_noticias($r->titulo_noticias);
            $p->setcontenido_noticias($r->contenido_noticias);
            $p->setautor_noticias($r->autor_noticias);
            $p->setseccion_noticias($r->seccion_noticias);
            $p->setestado_noticias($r->estado_noticias);
            $p->setimagen_noticias($r->imagen_noticias);
            $p->setfecha_noticias($r->fecha_noticias);

            return $p;

        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function ListarDeportes(){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM noticias WHERE seccion_noticias= 'DEPORTES';");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function ListarTecnologia(){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM noticias WHERE seccion_noticias= 'TECNOLOGIA';");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function ListarPolitica(){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM noticias WHERE seccion_noticias= 'POLITICA';");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function ListarEntretenimiento(){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM noticias WHERE seccion_noticias= 'ENTRETENIMIENTO';");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function ListarEconomia(){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM noticias WHERE seccion_noticias= 'ECONOMIA';");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }



    public function Insertar(noticia $p){
        try{
            $consulta="INSERT INTO noticias(titulo_noticias, contenido_noticias, autor_noticias, seccion_noticias, imagen_noticias, estado_noticias) VALUES (?,?,?,?,?,?);";
            $this->pdo->prepare($consulta)
                    ->execute(array(
                        $p->gettitulo_noticias(),
                        $p->getcontenido_noticias(),
                        $p->getautor_noticias(),
                        $p->getseccion_noticias(),
                        $p->getimagen_noticias(),
                        $p->getestado_noticias()
                    ));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function Actualizar(noticia $p){
        try{
            $consulta="UPDATE noticias SET 
                titulo_noticias=?,
                contenido_noticias=?,
                autor_noticias=?,
                seccion_noticias=?,
                imagen_noticias=?,
                estado_noticias=?
                WHERE id_noticias=?;
            ";
            $this->pdo->prepare($consulta)
                    ->execute(array(
                        $p->gettitulo_noticias(),
                        $p->getcontenido_noticias(),
                        $p->getautor_noticias(),
                        $p->getseccion_noticias(),
                        $p->getestado_noticias(),
                        $p->getimagen_noticias(),
                        $p->getid_noticias()
                    ));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function Eliminar($id){
        try{
            $consulta="DELETE FROM noticias WHERE id_noticias=?;";
            $this->pdo->prepare($consulta)
                    ->execute(array($id));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
}
?>