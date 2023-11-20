<?php

require_once("../config/conexion.php");

require_once("../models/Instructor.php");

$Instructor = new Instructor();

switch($_GET["op"]){

    case "guardayeditar":
        if(empty($_POST["InstructorID"])){
            $Instructor->insert_Instructor($_POST["ins_Nombre"],$_POST["ins_Apellido_P"],$_POST["ins_Apellido_M"],$_POST["Correo"],$_POST["Sexo"],$_POST["Telefono"]);
        }else{
            $Instructor->update_Instructor($_POST["InstructorID"],$_POST["ins_Nombre"],$_POST["ins_Apellido_P"],$_POST["ins_Apellido_M"],$_POST["Correo"],$_POST["Sexo"],$_POST["Telefono"]);
        }
        break;
    case "mostrar":
        $datos =  $Instructor->get_Instructor_id($_POST["InstructorID"]);
        if(is_array($datos)==true and count($datos)<>0){
            foreach($datos as $row){
                $output["InstructorID"]=$row["InstructorID"];
                $output["ins_Nombre"]=$row["ins_Nombre"];
                $output["ins_Apellido_P"]=$row["ins_Apellido_P"];
                $output["ins_Apellido_M"]=$row["ins_Apellido_M"];
                $output["Correo"]=$row["Correo"];
                $output["Sexo"]=$row["Sexo"];
                $output["Telefono"]=$row["Telefono"];

            }
            echo json_encode($output);
        }
        break;
    case "eliminar":
        $Instructor->delete_Instructor($_POST["InstructorID"]);
        break;
    case "listar":
        $datos = $Instructor->get_Instructor();
        $data=array();
        foreach($datos as $row){
            $sub_array= array();
            $sub_array[]=$row["ins_Nombre"];
            $sub_array[]=$row["ins_Apellido_P"];
            $sub_array[]=$row["ins_Apellido_M"];
            $sub_array[]=$row["Correo"];
            $sub_array[]=$row["Telefono"];
            $sub_array[] = '<button type="button" onClick="editar('.$row["InstructorID"].');"  id="'.$row["InstructorID"].'" class="btn btn-outline-secondary btn-icon"><div><i class="fa fa-edit"></i></div></button>';
            $sub_array[] = '<button type="button" onClick="eliminar('.$row["InstructorID"].');"  id="'.$row["InstructorID"].'" class="btn btn-outline-danger btn-icon"><div><i class=" fa fa-regular fa-trash"></i></div></button>';
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
        $datos=$Instructor->get_Instructor();
        if(is_array($datos)==true and count($datos)>0){
            $html = "<option label='Seleccione Instructor' name= 'InstructorID' id='InstructorID'></option>";
            foreach($datos as $row){
                $html.= "<option value = '".$row['InstructorID']."'>".$row['ins_Nombre']." ".$row['ins_Apellido_P']." ".$row['ins_Apellido_M']."</option>";
            }
            echo $html;
        }
        break;
}