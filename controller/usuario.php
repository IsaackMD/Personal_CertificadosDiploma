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
        case "listar_cursos_top":

                $datos = $usuario->get_curso_usuario_top($_POST["UsuarioID"]);
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



        case "mostrar":
            $datos = $usuario->get_usu_x_id($_POST["UsuarioID"]);
            if(is_array($datos)==true and count($datos)<>0){
                foreach($datos as $row){
                    $output["UsuarioID"] = $row["UsuarioID"];
                    $output["usu_Nombre"] = $row["usu_Nombre"];
                    $output["usu_Apellido_P"] = $row["usu_Apellido_P"];
                    $output["usu_Apellido_M"] = $row["usu_Apellido_M"];
                    $output["Correo"] = $row["Correo"];
                    $output["Password"] = $row["Password"];
                    $output["Telefono"] = $row["Telefono"];
                    $output["Sexo"] = $row["Sexo"];
                    $output["Rol_ID"] = $row["Rol_ID"];
                }
                echo json_encode($output);
            }
            break;
        case "guardayedita":
            if(empty($_POST["UsuarioID"])){

                $usuario->insert_usuario($_POST["usu_Nombre"],$_POST["usu_Apellido_P"],$_POST["usu_Apellido_M"],$_POST["Correo"],$_POST["Telefono"],$_POST["Password"],$_POST["Sexo"],$_POST["Rol_ID"]);
            }else{ //$usuid,$nom,$ap,$am,$correo,$pass,$sexo,$tel,$rol
                $usuario->update_usu($_POST["UsuarioID"],$_POST["usu_Nombre"],$_POST["usu_Apellido_P"],$_POST["usu_Apellido_M"],$_POST["Correo"],$_POST["Password"],$_POST["Telefono"],$_POST["Sexo"],$_POST["Rol_ID"]);
            }
        case "update_perfil":
            $usuario->update_usu_perfil(
                $_POST["UsuarioID"],
                $_POST["usu_Nombre"],
                $_POST["usu_Apellido_P"],
                $_POST["usu_Apellido_M"],
                $_POST["Password"],
                $_POST["Telefono"],
                $_POST["Sexo"]
            );
            break;

        case "eliminar":
            $usuario->delete_usu($_POST["UsuarioID"]);
            break;
        case "listarus":
                $datos = $usuario->get_usuarios_modal($_POST["CursoID"]);
                $data=array();
                foreach($datos as $row){
                    $sub_array= array();
                    $sub_array[]= "<input type='checkbox' name= 'detallechek[]' value='".$row['UsuarioID'] ."'>";
                    $sub_array[]=$row["usu_Nombre"]." ".$row["usu_Apellido_P"]." ".$row["usu_Apellido_M"];
                    $sub_array[]=$row["Correo"];
                    $data[]= $sub_array;
                }
                $results = array(
                    "sEcho"=>1,
                    "iTotalRecords"=>count($data),
                    "iTotalDisplayRecords"=>count($data),
                    "aaData"=>$data);
                    echo json_encode($results);
                break;

        case "listar":
            $datos = $usuario->get_usuarios();
            $data=array();
            foreach($datos as $row){
                $sub_array= array();
                $sub_array[]=$row["usu_Nombre"];
                $sub_array[]=$row["usu_Apellido_P"];
                $sub_array[]=$row["usu_Apellido_M"];
                $sub_array[]=$row["Correo"];
                $sub_array[]=$row["Telefono"];
                if($row["Rol_ID"]==1){
                    $sub_array[]="Usuario";
                }else{
                    $sub_array[]="Administrador";
                }
                $sub_array[] = '<button type="button" onClick="editar('.$row["UsuarioID"].');"  id="'.$row["UsuarioID"].'" class="btn btn-outline-secondary btn-icon"><div><i class="fa fa-edit"></i></div></button>';
                $sub_array[] = '<button type="button" onClick="eliminar('.$row["UsuarioID"].');"  id="'.$row["UsuarioID"].'" class="btn btn-outline-danger btn-icon"><div><i class=" fa fa-regular fa-trash"></i></div></button>';
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



?>