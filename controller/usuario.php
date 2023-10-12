<?php

require_once("../config/conexion.php");

require_once("../models/Usuario.php");

$usuario = new Usuario();

    switch($_GET["op"]){
        case "listar_cursos":
            $datos = $usuario->get_curso_usuario($_POST["UsuarioID"]);
            $data=array();
            foreach($datos as $row){
                $sub_array= array();
                $sub_array[]=$row["Titulo"];
                $sub_array[]=$row["Fecha_Ini"];
                $sub_array[]=$row["Fecha_Fin"];
                $sub_array[]=$row["ins_Nombre"]." ".$row["ins_Apellido_P"];
                $sub_array[] = '<button type="button" onClick="certificado('.$row["CursoDetalleID"].');"  id="'.$row["CursoDetalleID"].'" class="btn btn-outline-primary btn-icon"><div><i class="fa fa-id-card-o"></i></div></button>';
                $data[]= $sub_array;

            }

            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
                echo json_encode($results);
            break;

        case "mostrar_CursoDetalle":
            $datos = $usuario->get_curso_x_id($_POST["CursoDetalleID"]);
            if(is_array($datos)==true and count($datos)<>0){
                foreach($datos as $row){
                    $output["CursoDetalleID"] = $row["CursoDetalleID"];
                    $output["CursoID"] = $row["CursoID"];
                    $output["Titulo"] = $row["Titulo"];
                    $output["Descripcion"] = $row["Descripcion"];
                    $output["Fecha_Ini"] = $row["Fecha_Ini"];
                    $output["Fecha_Fin"] = $row["Fecha_Fin"];
                    $output["UsuarioID"] = $row["UsuarioID"];
                    $output["usu_Nombre"] = $row["usu_Nombre"];
                    $output["usu_Apellido_P"] = $row["usu_Apellido_P"];
                    $output["usu_Apellido_M"] = $row["usu_Apellido_M"];
                    $output["InstructorID"] = $row["InstructorID"];
                    $output["ins_Nombre"] = $row["ins_Nombre"];
                    $output["ins_Apellido_P"] = $row["ins_Apellido_P"];
                    $output["ins_Apellido_M"] = $row["ins_Apellido_M"];

                }
                echo json_encode($output);
            }
            break;
        case "total":
            $datos= $usuario->get_total_cursos($_POST["UsuarioID"]);
            foreach($datos as $row){
                $output["total_cursos"] = $row["total_cursos"];

            }
            echo json_encode($output);
            break;
    }



?>