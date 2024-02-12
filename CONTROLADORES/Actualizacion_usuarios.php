<?php
    include "../MODELOS/usuario.php";
    $obj = new usuario ();
    $b = $obj -> actualizar($_POST);
    if($_SESSION['roles'] == "Administrador"){
        if ($b === 1){
            echo '<script language="javascript">alert("Se actualizo correctamente");window.location.href="../VISTAS/INTERFACES/administrador/home.php"</script>';
        }
        else if(str_contains($b,'SQLSTATE[HY000] [2002]')){ 
            echo '<script language="javascript">alert("Hay un problema, intente más tarde");window.location.href="../VISTAS/INTERFACES/administrador/home.php"</script>';
        }
        else if(str_contains($b,'SQLSTATE[23000]')){
            echo '<script language="javascript">alert("Algunos datos estan repetidos, revise");window.location.href="../VISTAS/INTERFACES/administrador/home.php"</script>';
        }
        else{
            echo '<script language="javascript">alert("No se pudo actualizar");window.location.href="../VISTAS/INTERFACES/administrador/home.php"</script>';
        }
    }
    if($_SESSION['roles'] == "Cliente"){
        if ($b === 1){
            echo '<script language="javascript">alert("Se actualizo correctamente");window.location.href="../VISTAS/INTERFACES/cliente/home.php"</script>';
        }
        else if(str_contains($b,'SQLSTATE[HY000] [2002]')){ 
            echo '<script language="javascript">alert("Hay un problema, intente más tarde");window.location.href="../VISTAS/INTERFACES/cliente/home.php"</script>';
        }
         else if(str_contains($b,'SQLSTATE[23000]')){
            echo '<script language="javascript">alert("Algunos datos estan repetidos, revise");window.location.href="../VISTAS/INTERFACES/cliente/home.php"</script>';
        }
        else{
            echo '<script language="javascript">alert("No se pudo actualizar");window.location.href="../VISTAS/INTERFACES/cliente/home.php"</script>';
        }
    }
    if($_SESSION['roles'] == "Auxiliar_Odontologia"){
        if ($b === 1){
            echo '<script language="javascript">alert("Se actualizo correctamente");window.location.href="../VISTAS/INTERFACES/auxiliar/home.php"</script>';
        }
        else if(str_contains($b,'SQLSTATE[HY000] [2002]')){ 
            echo '<script language="javascript">alert("Hay un problema, intente más tarde");window.location.href="../VISTAS/INTERFACES/auxiliar/home.php"</script>';
        }
         else if(str_contains($b,'SQLSTATE[23000]')){
            echo '<script language="javascript">alert("Algunos datos estan repetidos, revise");window.location.href="../VISTAS/INTERFACES/auxiliar/home.php"</script>';
        }
        else{
            echo '<script language="javascript">alert("No se pudo actualizar");window.location.href="../VISTAS/INTERFACES/auxiliar/home.php"</script>';
        }
    }
    if($_SESSION['roles'] == "Odontologo"){
        if ($b === 1){
            echo '<script language="javascript">alert("Se actualizo correctamente");window.location.href="../VISTAS/INTERFACES/odontologo/home.php"</script>';
        }
        else if(str_contains($b,'SQLSTATE[HY000] [2002]')){ 
            echo '<script language="javascript">alert("Hay un problema, intente más tarde");window.location.href="../VISTAS/INTERFACES/odontologo/home.php"</script>';
        }
         else if(str_contains($b,'SQLSTATE[23000]')){
            echo '<script language="javascript">alert("Algunos datos estan repetidos, revise");window.location.href="../VISTAS/INTERFACES/odontologo/home.php"</script>';
        }
        else{
            echo '<script language="javascript">alert("No se pudo actualizar");window.location.href="../VISTAS/INTERFACES/odontologo/home.php"</script>';
        }
    }
?>