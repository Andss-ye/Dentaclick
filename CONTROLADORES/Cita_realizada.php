<?php
include "../MODELOS/cita_medica.php";
$obj = new cita_medica ();
$b = $obj -> realizar ($_POST);
    if($_SESSION['roles'] == "Administrador"){
        if ($b === 1){
            echo '<script language="javascript">alert("Se realizo la cita");window.location="../VISTAS/INTERFACES/administrador/home.php"</script>';
        }
        else if(str_contains($b,'SQLSTATE[HY000] [2002]')){ 
            echo '<script language="javascript">alert("Hay un problema, intente más tarde");window.location="../VISTAS/INTERFACES/administrador/home.php"</script>';
        }
        else if(str_contains($b,'SQLSTATE[23000]')){
            echo '<script language="javascript">alert("Algunos datos estan repetidos, revise");window.location="../VISTAS/INTERFACES/administrador/home.php"</script>';
        }
        else{
            echo '<script language="javascript">alert("Algo sucedio");window.location="../VISTAS/INTERFACES/administrador/home.php"; </script>';
        }
    }
    if($_SESSION['roles'] == "Auxiliar_Odontologia"){
        if ($b === 1){
            echo '<script language="javascript">alert("Se realizo la cita");window.location="../VISTAS/INTERFACES/auxiliar/home.php"</script>';
        }
        else if(str_contains($b,'SQLSTATE[HY000] [2002]')){ 
            echo '<script language="javascript">alert("Hay un problema, intente más tarde");window.location="../VISTAS/INTERFACES/auxiliar/home.php"</script>';
        }
        else if(str_contains($b,'SQLSTATE[23000]')){
            echo '<script language="javascript">alert("Algunos datos estan repetidos, revise");window.location="../VISTAS/INTERFACES/auxiliar/home.php"</script>';
        }
        else{
            echo '<script language="javascript">alert("Algo sucedio");window.location="../VISTAS/INTERFACES/auxiliar/home.php"; </script>';
        }
    }
    if($_SESSION['roles'] == "Odontologo"){
        if ($b === 1){
            echo '<script language="javascript">alert("Se realizo la cita");window.location="../VISTAS/INTERFACES/odontologo/home.php"</script>';
        }
        else if(str_contains($b,'SQLSTATE[HY000] [2002]')){ 
            echo '<script language="javascript">alert("Hay un problema, intente más tarde");window.location="../VISTAS/INTERFACES/odontologo/home.php"</script>';
        }
        else if(str_contains($b,'SQLSTATE[23000]')){
            echo '<script language="javascript">alert("Algunos datos estan repetidos, revise");window.location="../VISTAS/INTERFACES/odontologo/home.php"</script>';
        }
        else{
            echo '<script language="javascript">alert("Algo sucedio");window.location="../VISTAS/INTERFACES/odontologo/home.php"; </script>';
        }
    }
?>