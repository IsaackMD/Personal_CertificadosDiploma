<?php 
 class Categoria extends Conectar{
    public function insert_categoria($nom){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="Insert into categoria (Nombre,Fecha_Registrada,Estado) value (?,now(),1);";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$nom);
        $sql->execute();
        return $sql->fetchAll();
    }
    public function update_categoria($cat_id,$nom){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="CALL actualizar_categoria(?, ?);";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$cat_id);
        $sql->bindValue(2,$nom);
        $sql->execute();
        return $sql->fetchAll();
    }
    public function delete_categoria($CategoriaID){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="UPDATE Categoria
              SET  Estado = 0
              Where  CategoriaID = ?;";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$CategoriaID);
            $sql->execute();
            return $sql->fetchAll();
    }
    public function get_categoria(){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM Categoria Where Estado = 1";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $sql->fetchAll();

    }
    public function get_categoria_id($CategoriaID){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM Categoria Where Estado = 1 and CategoriaID = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$CategoriaID);
            $sql->execute();
            return $sql->fetchAll();
    }
 }
?>