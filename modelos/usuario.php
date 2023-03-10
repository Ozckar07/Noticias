<?php

    class usuario{
    
        private $pdo;
    
        private $id_usuarios;
        private $nombre_usuarios;
        private $correo_usuarios;    
        private $contrasena_usuarios;
        private $rol_usuarios;
        private $fecha_registro_usuarios;
    
        public function __CONSTRUCT(){
            $this->pdo = BasedeDatos::Conectar();
        }
    
        public function getid_usuarios() : ?int{
            return $this->id_usuarios;
        }
    
        public function setid_usuarios(int $id){
            $this->id_usuarios=$id;
        }
    
        public function getnombre_usuarios() : ?string{
            return $this->nombre_usuarios;
        }
    
        public function setnombre_usuarios(string $nombre){
            $this->nombre_usuarios=$nombre;
        }
    
        public function getcorreo_usuarios() : ?string{
            return $this->correo_usuarios;
        }
    
        public function setcorreo_usuarios(string $correo){
            $this->correo_usuarios=$correo;
        }
    
        public function getcontrasena_usuarios() : ?string{
            return $this->contrasena_usuarios;
        }
    
        public function setcontrasena_usuarios(string $contrasena){
            $this->contrasena_usuarios=$contrasena;
        }
    
        public function getrol_usuarios() : ?string{
            return $this->rol_usuarios;
        }
    
        public function setrol_usuarios(string $rol){
            $this->rol_usuarios=$rol;
        }
    
        public function getfecha_registro_usuarios() : ?string{
            return $this->fecha_registro_usuarios;
        }
    
        public function setfecha_registro_usuarios(string $fecha_registro){
            $this->fecha_registro_usuarios=$fecha_registro;
        }
    
    
    
        public function Cantidad(){
            try{
                $consulta=$this->pdo->prepare("SELECT SUM(rol_usuarios) as Cantidad FROM usuarios;");
                $consulta->execute();
                return $consulta->fetch(PDO::FETCH_OBJ);
            }catch(Exception $e){
                die($e->getMessage());
            }
        }
    
        public function Listar(){
            try{
                $consulta=$this->pdo->prepare("SELECT * FROM usuarios;");
                $consulta->execute();
                return $consulta->fetchAll(PDO::FETCH_OBJ);
            }catch(Exception $e){
                die($e->getMessage());
            }
        }
    
        public function Obtener($id){
            try{
                $consulta=$this->pdo->prepare("SELECT * FROM usuarios WHERE id_usuarios=?;");
                $consulta->execute(array($id));
                $r=$consulta->fetch(PDO::FETCH_OBJ);
                $p=new usuario();
                $p->setid_usuarios($r->id_usuarios);
                $p->setnombre_usuarios($r->nombre_usuarios);
                $p->setcorreo_usuarios($r->correo_usuarios);
                $p->setcontrasena_usuarios($r->contrasena_usuarios);
                $p->setrol_usuarios($r->rol_usuarios);
                $p->setfecha_registro_usuarios($r->fecha_registro_usuarios);
    
                return $p;
    
            }catch(Exception $e){
                die($e->getMessage());
            }
        }
    
        public function Insertar(usuario $p){
            try{
                $consulta="INSERT INTO usuarios(nombre_usuarios, correo_usuarios, contrasena_usuarios, rol_usuarios) VALUES (?,?,?,?);";
                $this->pdo->prepare($consulta)
                        ->execute(array(
                            $p->getnombre_usuarios(),
                            $p->getcorreo_usuarios(),
                            $p->getcontrasena_usuarios(),
                            $p->getrol_usuarios()
                        ));
            }catch(Exception $e){
                die($e->getMessage());
            }
        }
    
        public function Actualizar(usuario $p){
            try{
                $consulta="UPDATE usuarios SET 
                    nombre_usuarios=?,
                    correo_usuarios=?,
                    contrasena_usuarios=?,
                    rol_usuarios=?
                    WHERE id_usuarios=?;";
                $this->pdo->prepare($consulta)
                        ->execute(array(
                            $p->getnombre_usuarios(),
                            $p->getcorreo_usuarios(),
                            $p->getcontrasena_usuarios(),
                            $p->getrol_usuarios(),
                            $p->getid_usuarios()
                        ));
            }catch(Exception $e){
                die($e->getMessage());
            }
        }
    
        public function Eliminar($id){
            try{
                $consulta="DELETE FROM usuarios WHERE id_usuarios=?;";
                $this->pdo->prepare($consulta)
                        ->execute(array($id));
            }catch(Exception $e){
                die($e->getMessage());
            }
        }
    }

?>