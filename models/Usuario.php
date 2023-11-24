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

        public function insert_usuario($nom,$ap,$am,$correo,$tel,$pass,$s,$rol){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="Insert into usuario (usu_Nombre,usu_Apellido_P,usu_Apellido_M,Correo,Telefono,Password,Sexo,Fecha_Registro,Estado,Rol_ID) value (?,?,?,?,?,?,?,now(),1,?);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$nom);
            $sql->bindValue(2,$ap);
            $sql->bindValue(3,$am);
            $sql->bindValue(4,$correo);
            $sql->bindValue(5,$tel);
            $sql->bindValue(6,$pass);
            $sql->bindValue(7,$s);
            $sql->bindValue(8,$rol);
            $sql->execute();
            return $sql->fetchAll();
        }
        
        public function update_usu($usuid,$nom,$ap,$am,$correo,$pass,$tel,$sexo,$rol){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="call actualizar_usu2(?,?,?,?,?,?,?,?,?);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$usuid);
            $sql->bindValue(2,$nom);
            $sql->bindValue(3,$ap);
            $sql->bindValue(4,$am);
            $sql->bindValue(5,$correo);
            $sql->bindValue(6,$pass);
            $sql->bindValue(7,$sexo);
            $sql->bindValue(8,$tel);
            $sql->bindValue(9,$rol);
            $sql->execute();
            return $sql->rowCount();
        }
        
        public function delete_usu($UsuarioID){
            $conectar= parent::conexion();
            parent::set_names();
            $sql = "Update usuario Set Estado = 0 Where UsuarioID=?;";
            $sql = $conectar->prepare($sql);

            $sql->bindValue(1,$UsuarioID);
            $sql->execute();
            return $resultado = $sql->fetchAll();

        }

        public function get_usuarios(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql = "select * from usuario where Estado = 1;";
            $sql = $conectar->prepare($sql);
            $sql->execute();
            return $resultado = $sql->fetchAll();

        }

        public function get_usuarios_modal($cur_ID){
            $conectar= parent::conexion();
            parent::set_names();
            $sql = "select * from usuario where Estado = 1 and UsuarioID not in (select UsuarioID from curso_usu where CursoID=? and Estado =1) ;";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1,$cur_ID);
            $sql->execute();
            return $resultado = $sql->fetchAll();

        }
        public function update_usu_perfil($UsuarioID,$usu_Nombre,$usu_apep,$usu_apem,$pass,$sex,$tel){
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