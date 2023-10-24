<?php

require_once("../config/conexion.php");

require_once("../models/Usuario.php");

$curso = new Curso();

switch($_GET["op"]){

    case "guardad&eitar":
        if(empty($_POST["cur_id"])){
            $curso->insert_curso($_POST["CategoriaID"],$_POST["Titulo"],$_POST["Descripcion"],$_POST["Fecha_Ini"],$_POST["Fecha_Fin"],$_POST["InstructorID"]);
        }else{
            $curso->update_curso($_POST["CursoID"],$_POST["CategoriaID"],$_POST["Titulo"],$_POST["Descripcion"],$_POST["Fecha_Ini"],$_POST["Fecha_Fin"],$_POST["InstructorID"]);
        }
        break;
    case "mostrar":
        $datos =  $curso->get_curso_id($_POST["CursoID"])
        if(id_array($datos)==true and count($datos)<>0){
            foreach($datos as $row){
                $output["CursoID"]=$row["CursoID"];
                $output["CategoriaID"]=$row["CategoriaID"];
                $output["Titulo"]=$row["Titulo"];
                $output["Descripcion"]=$row["Descripcion"];
                $output["Fecha_Ini"]=$row["Fecha_Ini"];
                $output["Fecha_Fin"]=$row["Fecha_Fin"];
                $output["InstructorID"]=$row["InstructorID"];
            }
            echo json_encode($output);
        }
        break;
    case "eliminar":
        $curso->delete_curso($_POST["CursoID"]);
        break;
    case "listar":
        $datos = $usuario->get_curso();
        $data=array();
        foreach($datos as $row){
            $sub_array= array();
            $sub_array[]=$row["CategoriaID"];
            $sub_array[]=$row["Titulo"];
            $sub_array[]=$row["Fecha_Ini"];
            $sub_array[]=$row["Fecha_Fin"];
            $sub_array[]=$row["InstitutoID"];
            $sub_array[] = '<button type="button" onClick="Editar('.$row["CursoID"].');"  id="'.$row["CursoID"].'" class="btn btn-outline-primary btn-icon"><div><i class="fa fa-id-card-o"></i></div></button>';
            $sub_array[] = '<button type="button" onClick="Eliminar('.$row["CursoID"].');"  id="'.$row["CursoID"].'" class="btn btn-outline-Danger btn-icon"><div><i class="fa fa-id-card-o"></i></div></button>';
            $data[]= $sub_array;

        }

        $results = array(
            "sEcho"=>1,
            "iTotalRecords"=>count($data),
            "iTotalDisplayRecords"=>count($data),
            "aaData"=>$data);
            echo json_encode($results);
        break;
    
}