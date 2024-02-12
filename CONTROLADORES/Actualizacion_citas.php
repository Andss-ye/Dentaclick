<?php
    include "../MODELOS/cita_medica.php";
    $obj = new cita_medica ();
    #defino variables que necesito
    $id_agenda = $_POST['id_agenda1'];
    $fecha = $_POST['Fecha1'];
    $hora = $_POST['Hora1'];
    $odontologo = $_POST['NumeroDocAtiende1'];
    #fin de variables
    #####
    $v1 = $conexion->prepare("SELECT Fecha, Hora, id_agenda from cita_medica where Estado = 'Pendiente' and 
    id_agenda = '$id_agenda' and Fecha = '$fecha' and Hora = '$hora'");
    $v1 -> execute ();
    $a = $v1 -> fetchall(PDO::FETCH_ASSOC);
    #####
    $v2 = $conexion->prepare("SELECT id_agenda, NumeroDoc from agenda where Estado = 1 and 
    id_agenda = '$id_agenda' and NumeroDoc = '$odontologo'");
    $v2 -> execute ();
    $b = $v2 -> fetchall(PDO::FETCH_ASSOC);
    #####
    if($_SESSION['roles'] == "Administrador"){
        if([$id_agenda && $odontologo] != $b){
            echo '<script language="javascript">alert("La agenda no corresponde con el odontologo seleccionado");window.location.href="../VISTAS/INTERFACES/administrador/home.php"</script>';
        }
        else{
        $val = $obj -> actualizar ($_POST);
        if ($val === 1){
            echo '<script language="javascript">alert("Se actualizo correctamente");window.location="../VISTAS/INTERFACES/administrador/home.php"</script>';
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
}
    if($_SESSION['roles'] == "Cliente"){
        if([$id_agenda && $odontologo] != $b){
            echo '<script language="javascript">alert("La agenda no corresponde con el odontologo seleccionado");window.location.href="../VISTAS/INTERFACES/cliente/home.php"</script>';
        }
        else{
        $val = $obj -> actualizar ($_POST);
        if ($val === 1){
            echo '<script language="javascript">alert("Se actualizo correctamente");window.location="../VISTAS/INTERFACES/cliente/home.php"</script>';
        }
        else if(str_contains($b,'SQLSTATE[HY000] [2002]')){ 
            echo '<script language="javascript">alert("Hay un problema, intente más tarde");window.location="../VISTAS/INTERFACES/cliente/home.php"</script>';
        }
        else if(str_contains($b,'SQLSTATE[23000]')){
            echo '<script language="javascript">alert("Algunos datos estan repetidos, revise");window.location="../VISTAS/INTERFACES/cliente/home.php"</script>';
        }
        else{
            echo '<script language="javascript">alert("Algo sucedio");window.location="../VISTAS/INTERFACES/cliente/home.php"; </script>';
        }
    }
}   
    if($_SESSION['roles'] == "Auxiliar_Odontologia"){
        if([$id_agenda && $odontologo] != $b){
            echo '<script language="javascript">alert("La agenda no corresponde con el odontologo seleccionado");window.location.href="../VISTAS/INTERFACES/auxiliar/home.php"</script>';
        }
        else{
        $val = $obj -> actualizar ($_POST);
        if ($val === 1){
            echo '<script language="javascript">alert("Se actualizo correctamente");window.location="../VISTAS/INTERFACES/auxiliar/home.php"</script>';
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
}
    if($_SESSION['roles'] == "Odontologo"){
        if([$id_agenda && $odontologo] != $b){
            echo '<script language="javascript">alert("La agenda no corresponde con el odontologo seleccionado");window.location.href="../VISTAS/INTERFACES/odontologo/home.php"</script>';
        }
        else{
        $val = $obj -> actualizar ($_POST);
        if ($val === 1){
            echo '<script language="javascript">alert("Se actualizo correctamente");window.location="../VISTAS/INTERFACES/odontologo/home.php"</script>';
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
}
?>