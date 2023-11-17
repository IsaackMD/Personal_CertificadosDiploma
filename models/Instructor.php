<?php
 class Instructor extends Conectar{
    public function insert_Instructor($nom,$ap,$am,$correo,$sexo,$tel){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="call Insertar_Ins(?,?,?,?,?,?);";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$nom);
        $sql->bindValue(2,$ap);
        $sql->bindValue(3,$am);
        $sql->bindValue(4,$correo);
        $sql->bindValue(5,$sexo);
        $sql->bindValue(6,$tel);
        $sql->execute();
        return $sql->fetchAll();
    }

    public function update_Instructor($InstructorID,$nom,$ap,$am,$correo,$sexo,$tel){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="call actualizar_ins(?,?,?,?,?,?,?);";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$nom);
        $sql->bindValue(2,$ap);
        $sql->bindValue(3,$am);
        $sql->bindValue(4,$correo);
        $sql->bindValue(5,$sexo);
        $sql->bindValue(6,$tel);
        $sql->bindValue(7,$InstructorID);
        $sql->execute();
        return $sql->rowCount();
    }
    public function delete_Instructor($InstructorID){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="UPDATE instructor
              SET  Estado = 0
              Where  InstructorID = ?;";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$InstructorID);
            $sql->execute();
            return $sql->fetchAll();
    }
    public function get_Instructor(){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM Instructor Where Estado = 1";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $sql->fetchAll();

    }
    public function get_Instructor_id($InstructorID){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM instructor Where Estado = 1 and InstructorID = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$InstructorID);
            $sql->execute();
            return $sql->fetchAll();
    }
 }
?>