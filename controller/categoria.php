<?php

require_once("../config/conexion.php");

require_once("../models/Categoria.php");

$categoria = new Categoria();

switch($_GET["op"]){

    case "guardadyeitar":
        if(empty($_POST["CategoriaID"])){
            $categoria->insert_categoria($_POST["Nombre"]);
        }else{
            $categoria->update_categoria($_POST["CategoriaID"],$_POST["Nombre"]);
        }
        break;
    case "mostrar":
        $datos =  $categoria->get_categoria_id($_POST["CategoriaID"]);
        if(is_array($datos)==true and count($datos)<>0){
            foreach($datos as $row){
                $output["CategoriaID"]=$row["CategoriaID"];
                $output["Nombre"]=$row["Nombre"];
            }
            echo json_encode($output);
        }
        break;
    case "eliminar":
        $categoria->delete_categoria($_POST["CategoriaID"]);
        break;
    case "listar":
        $datos = $categoria->get_categoria();
        $data=array();
        foreach($datos as $row){
            $sub_array= array();
            $sub_array[]=$row["Nombre"];
            $sub_array[] = '<button type="button" onClick="editar('.$row["CategoriaID"].');"  id="'.$row["CategoriaID"].'" class="btn btn-outline-secondary btn-icon"><div><i class="fa fa-edit"></i></div></button>';
            $sub_array[] = '<button type="button" onClick="eliminar('.$row["CategoriaID"].');"  id="'.$row["CategoriaID"].'" class="btn btn-outline-danger btn-icon"><div><i class=" fa fa-regular fa-trash"></i></div></button>';
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
        $datos=$categoria->get_categoria();
        if(is_array($datos)==true and count($datos)>0){
            $html = "<option label='Seleccione Categoria' name='CategoriaID' id='CategoriaID'></option>";
            foreach($datos as $row){
                $html.= "<option value = '".$row['CategoriaID']."'>".$row['Nombre']."</option>";
            }
            echo $html;
        }
        break;
}