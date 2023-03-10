<?php

    class comentario{
    
        private $pdo;
    
        private $id_usuarios;
        private $id_noticias;
        private $id_comentarios;
        private $titulo_comentarios;
        private $contenido_comentarios;    
        private $estado_comentarios;
        private $fecha_comentarios;
    
        public function __CONSTRUCT(){
            $this->pdo = BasedeDatos::Conectar();
        }
    

        public function getid_comentarios() : ?int{
            return $this->id_comentarios;
        }
        public function setid_comentarios() : ?int{
            return $this->id_comentarios;
        }
    
 
        public function getid_noticias() : ?int{
            return $this->id_noticias;
        }



        public function getid_usuarios() : ?int{
            return $this->id_usuarios;
        }
    
    

        public function gettitulo_comentarios() : ?string{
            return $this->titulo_comentarios;
        }
    
        public function settitulo_comentarios(string $titulo){
            $this->titulo_comentarios=$titulo;
        }
    

        public function getcontenido_comentarios() : ?string{
            return $this->contenido_comentarios;
        }
    
        public function setcontenido_comentarios(string $contenido){
            $this->contenido_comentarios=$contenido;
        }
    

        public function getestado_comentarios() : ?bool{
            return $this->estado_comentarios;
        }
    
        public function setestado_comentarios(bool $estado){
            $this->estado_comentarios=$estado;
        }
    

        public function getfecha_comentarios() : ?string{
            return $this->fecha_comentarios;
        }
    
        public function setfecha_comentarios(string $fecha){
            $this->fecha_comentarios=$fecha;
        }
    
    
        public function Cantidad(){
            try{
                $consulta=$this->pdo->prepare("SELECT SUM(estado_comentarios) as Cantidad FROM comentarios;");
                $consulta->execute();
                return $consulta->fetch(PDO::FETCH_OBJ);
            }catch(Exception $e){
                die($e->getMessage());
            }
        }
    
        public function Listar(){
            try{
                $consulta=$this->pdo->prepare("SELECT * FROM comentarios;");
                $consulta->execute();
                return $consulta->fetchAll(PDO::FETCH_OBJ);
            }catch(Exception $e){
                die($e->getMessage());
            }
        }
    
        public function Obtener($id){
            try{
                $consulta=$this->pdo->prepare("SELECT * FROM comentarios WHERE id_comentarios=? && id_noticias=?;");
                $consulta->execute(array($id));
                $r=$consulta->fetch(PDO::FETCH_OBJ);
                $p=new comentario();
                $p->setid_comentarios($r->id_comentarios);
                $p->getid_noticias($r->id_noticias);
                $p->settitulo_comentarios($r->titulo_comentarios);
                $p->setcontenido_comentarios($r->contenido_comentarios);
                $p->setestado_comentarios($r->estado_comentarios);
                $p->setfecha_comentarios($r->fecha_comentarios);
    
                return $p;
    
            }catch(Exception $e){
                die($e->getMessage());
            }
        }
    
        public function Insertar(comentario $p){
            try{
                $consulta="INSERT INTO comentarios(titulo_comentarios, contenido_comentarios, estado_comentarios) VALUES (?,?,?);";
                $this->pdo->prepare($consulta)
                        ->execute(array(
                            $p->gettitulo_comentarios(),
                            $p->getcontenido_comentarios(),
                            $p->getestado_comentarios()
                        ));
            }catch(Exception $e){
                die($e->getMessage());
            }
        }
    
        public function Actualizar(comentario $p){
            try{
                $consulta="UPDATE comentarios SET 
                    titulo_comentarios=?,
                    contenido_comentarios=?,
                    estado_comentarios=?
                    WHERE id_comentarios=?;";
                $this->pdo->prepare($consulta)
                        ->execute(array(
                            $p->gettitulo_comentarios(),
                            $p->getcontenido_comentarios(),
                            $p->getestado_comentarios(),
                            $p->getid_comentarios()
                        ));
            }catch(Exception $e){
                die($e->getMessage());
            }
        }
    
        public function Eliminar($id){
            try{
                $consulta="DELETE FROM comentarios WHERE id_comentarios=?;";
                $this->pdo->prepare($consulta)
                        ->execute(array($id));
            }catch(Exception $e){
                die($e->getMessage());
            }
        }
    }

?>