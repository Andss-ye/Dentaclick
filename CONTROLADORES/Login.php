<?php 
    include "../MODELOS/usuario.php";
    $obj = new usuario(); #CREAMOS UN OBJETO POR EL NEW usuario
    $r = $obj -> ingreso ($_POST);
    if (empty($r)){ #empty es vacio
        echo '<script language="javascript">alert("Datos incorrectos");window.location.href="../VISTAS/login.php"</script>';
    }
    else {
        #La sesion se define en el modelo
        $_SESSION["todos_datos"] = $r;
        $_SESSION["nombre"] = $r[0]["Nombre"];
        $_SESSION["numero_doc"] = $r[0]["NumeroDoc"];
        $_SESSION["acceso"] = true;
        $_SESSION["roles"] = $r[0]["Rol"];
        $_SESSION["estado"] = $r[0]["Estado"];
        if ($_SESSION["estado"] == 0){
            echo '<script language="javascript">alert("No tiene permisos para entrar");window.location.href="../VISTAS/login.php"</script>';
        }
        else{
            if($_SESSION["roles"] == "Cliente"){
                header("location:../VISTAS/INTERFACES/cliente/home.php"); #REDIRIGE AL USUARIO A OTRA VISTA CUANDO INGRESE
            }
            else if ($_SESSION["roles"] == "Odontologo"){
                header("location:../VISTAS/INTERFACES/odontologo/home.php"); #REDIRIGE AL USUARIO A OTRA VISTA CUANDO INGRESE
            }
            else if ($_SESSION["roles"] == "Auxiliar_Odontologia"){
                header("location:../VISTAS/INTERFACES/auxiliar/home.php"); #REDIRIGE AL USUARIO A OTRA VISTA CUANDO INGRESE
            }
            else if ($_SESSION["roles"] == "Administrador"){
                header("location:../VISTAS/INTERFACES/administrador/home.php"); #REDIRIGE AL USUARIO A OTRA VISTA CUANDO INGRESE
            }
        }
    }
?>