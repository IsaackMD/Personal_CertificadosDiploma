<?php
    class Usuario extends Conectar{
        public function login(){
            $conectar = parent::Conexion();
            parent::set_names();
            if(isset($_POST["enviar"])){
                $correo = $_POST["Correo"];
                $pass = $_POST["Password"];
                if(empty($correo) and empty($pass)){
                    header("Location:".Conectar::ruta()."index.php?m=2");
                    exit();
                }else{
                    $sql = "SELECT * FROM Usuario WHERE Correo= ? and Password = ? and Estado = 1;";
                    $stmt = $conectar->prepare($sql);
                    $stmt->bindValue(1, $correo);
                    $stmt->bindValue(2, $pass);
                    $stmt->execute();
                    $resultado = $stmt->fetch();

                    if(is_array($resultado) and count($resultado)>0){
                        $_SESSION["UsuarioID"]=$resultado["UsuarioID"];
                        $_SESSION["usu_Nombre"]=$resultado["usu_Nombre"];
                        $_SESSION["usu_Apellido_P"]=$resultado["usu_Apellido_P"];
                        $_SESSION["Correo"]=$resultado["Correo"];
                        header("Location:".Conectar::ruta()."view/Usu_Home/");
                    }else{
                        header("Location:".Conectar::ruta()."index.php?m=1");
                        exit();
                    }
                }
            }
    }
        public function get_curso_usuario($UsuarioID){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="call Lista_info(?);";
                $sql=$conectar->prepare($sql);
                $sql->bindValue(1,$UsuarioID);
                $sql->execute();
                return $sql->fetchAll();
        }
        public function get_curso_x_id($CursoDetalleID){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="call Lista_Curso_x_id(?);";
                $sql=$conectar->prepare($sql);
                $sql->bindValue(1,$CursoDetalleID);
                $sql->execute();
                return $sql->fetchAll();
        }

        public function get_total_cursos($UsuarioID){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="call contar_cursos(?);";
                $sql=$conectar->prepare($sql);
                $sql->bindValue(1,$UsuarioID);
                $sql->execute();
                return $sql->fetchAll();
        }
    }

?>