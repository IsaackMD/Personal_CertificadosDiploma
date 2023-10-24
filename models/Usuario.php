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
                        $_SESSION["Rol_ID"]=$resultado["Rol_ID"];
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

        public function get_curso_usuario_top($UsuarioID){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="call Lista_top(?);";
                $sql=$conectar->prepare($sql);
                $sql->bindValue(1,$UsuarioID);
                $sql->execute();
                return $sql->fetchAll();
        }

        public function get_usu_x_id($UsuarioID){
            $conectar= parent::conexion();
            parent::set_names();
            $sql = "call Info_usu(?);";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1,$UsuarioID);
            $sql->execute();
            return $resultado = $sql->fetchAll();

        }

        public function update_usu_x_id($UsuarioID,$usu_Nombre,$usu_apep,$usu_apem,$pass,$sex,$tel){
            $conectar= parent::conexion();
            parent::set_names();
            $sql = "call actualizar_usu(?,?,?,?,?,?,?);";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(2,$usu_Nombre);
            $sql->bindValue(3,$usu_apep);
            $sql->bindValue(4,$usu_apem);
            $sql->bindValue(5,$pass);
            $sql->bindValue(6,$sex);
            $sql->bindValue(7,$tel);
            $sql->bindValue(1,$UsuarioID);
            $sql->execute();
            return $resultado = $sql->fetchAll();

        }

    }

?>