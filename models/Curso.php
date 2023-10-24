<?php 
 class Curso extends Conectar{
    public function insert_curso($cat_id,$titulo,$descrip,$fechini,$fechfin,$ins_id){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="CALL Insertar_cursos(?, ?, ?, ?, ?, ?);";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$cat_id);
        $sql->bindValue(2,$titulo);
        $sql->bindValue(3,$$descrip);
        $sql->bindValue(4,$fechini);
        $sql->bindValue(5,$fechfin);
        $sql->bindValue(6,$ins_id);
        $sql->execute();
        return $sql->fetchAll();
    }
    public function update_curso($cat_id,$titulo,$descrip,$fechini,$fechfin,$ins_id,$cur_id){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="CALL actualizar_cursos(?, ?, ?, ?, ?, ?,?);";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$cat_id);
        $sql->bindValue(2,$titulo);
        $sql->bindValue(3,$$descrip);
        $sql->bindValue(4,$fechini);
        $sql->bindValue(5,$fechfin);
        $sql->bindValue(6,$ins_id);
        $sql->bindValue(7,$cur_id);
        $sql->execute();
        return $sql->fetchAll();
    }
    public function delete_curso($CursoID){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="UPDATE curso
              SET  Estado = 0
              Where  CursoID = ?;";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$CursoID);
            $sql->execute();
            return $sql->fetchAll();
    }
    public function get_curso(){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM curso Where Estado = 1";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $sql->fetchAll();

    }
    public function get_curso_id($CursoID){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM curso Where Estado = 1 and CursoID = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$CursoID);
            $sql->execute();
            return $sql->fetchAll();
    }
 }
?>