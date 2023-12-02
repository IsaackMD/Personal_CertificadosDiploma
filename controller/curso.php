<?php

require_once("../config/conexion.php");

require_once("../models/Curso.php");

$curso = new Curso();

switch($_GET["op"]){

    case "guardaryeditar":
        if(empty($_POST["CursoID"])){
            $curso->insert_curso($_POST["CategoriaID"],$_POST["Titulo"],$_POST["Descripcion"],$_POST["Fecha_Ini"],$_POST["Fecha_Fin"],$_POST["InstructorID"]);
        }else{
            $curso->update_curso($_POST["CursoID"],$_POST["CategoriaID"],$_POST["Titulo"],$_POST["Descripcion"],$_POST["Fecha_Ini"],$_POST["Fecha_Fin"],$_POST["InstructorID"]);
        }
        break;
    case "mostrar":
        $datos =  $curso->get_curso_id($_POST["CursoID"]);
        if(is_array($datos)==true and count($datos)<>0){
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
    case "eliminarDet":
        $curso->delete_curso_Deta($_POST["CursoDetalleID"]);
        break;
    case "listar":
        $datos = $curso->get_curso();
        $data=array();
        foreach($datos as $row){
            $sub_array= array();
            $sub_array[]=$row["Nombre"];
            $sub_array[]='<a href="'.$row["Curso_img"].'" target="_blank">'.strtoupper($row["Titulo"]).'</a>';
            $sub_array[]=$row["Fecha_Ini"];
            $sub_array[]=$row["Fecha_Fin"];
            $sub_array[]=$row["ins_Nombre"]." ".$row["ins_Apellido_P"]." ".$row["ins_Apellido_M"];
            $sub_array[] = '<button type="button" onClick="editar('.$row["CursoID"].');"  id="'.$row["CursoID"].'" class="btn btn-outline-primary btn-icon"><div><i class="fa fa-id-card-o"></i></div></button>';
            $sub_array[] = '<button type="button" onClick="imagen('.$row["CursoID"].');"  id="'.$row["CursoID"].'" class="btn btn-outline-warning btn-icon"><div><i class=" fa fa-file"></i></div></button>';
            $sub_array[] = '<button type="button" onClick="eliminar('.$row["CursoID"].');"  id="'.$row["CursoID"].'" class="btn btn-outline-danger btn-icon"><div><i class=" fa fa-regular fa-trash"></i></div></button>';
            $data[]= $sub_array;

        }

        $results = array(
            "sEcho"=>1,
            "iTotalRecords"=>count($data),
            "iTotalDisplayRecords"=>count($data),
            "aaData"=>$data);
            echo json_encode($results);
        break;
    case "combo":
        $datos=$curso->get_curso();
        if(is_array($datos)==true and count($datos)>0){
            $html = "<option label='Seleccione Curso'></option>";
            foreach($datos as $row){
                $html.= "<option value = '".$row['CursoID']."'>".$row['Titulo']."</option>";
            }
            echo $html;
        }
        break;
    
    case "cursoXcurid":
        $datos = $curso->get_curso_x_curid($_POST["CursoID"]);
        $data=array();
        foreach($datos as $row){
            $sub_array= array();
            $sub_array[]=$row["usu_Nombre"]." ".$row["usu_Apellido_P"]." ".$row["usu_Apellido_M"];
            $sub_array[]=$row["Titulo"];
            $sub_array[]=$row["Fecha_Ini"];
            $sub_array[]=$row["Fecha_Fin"];
            $sub_array[]=$row["ins_Nombre"]." ".$row["ins_Apellido_P"]." ".$row["ins_Apellido_M"];
            $sub_array[] = '<button type="button" onClick="certificado('.$row["CursoDetalleID"].');"  id="'.$row["CursoDetalleID"].'" class="btn btn-outline-secondary btn-icon"><div><i class="fa fa-edit"></i></div></button>';
            $sub_array[] = '<button type="button" onClick="eliminarD('.$row["CursoDetalleID"].');"  id="'.$row["CursoDetalleID"].'" class="btn btn-outline-danger btn-icon"><div><i class=" fa fa-regular fa-trash"></i></div></button>';
            $data[]= $sub_array;

        }

        $results = array(
            "sEcho"=>1,
            "iTotalRecords"=>count($data),
            "iTotalDisplayRecords"=>count($data),
            "aaData"=>$data);
            echo json_encode($results);
            break;

    case "insertDU" :
        $datos = explode(',', $_POST['UsuarioID']);
        foreach($datos as $row){
            $curso->insert_CS($_POST['CursoID'],$row);
        }
        break;
    case "update_img_Curso":
        $curso->update_imagen_Curso($_POST["CursoxID"],$_POST["Curso_img"]);
        break;
}
