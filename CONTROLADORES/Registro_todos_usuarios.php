<?php
    include "../MODELOS/usuario.php";
    var_dump ($_POST);
    $obj = new usuario (); #instanciamos la clase
    $a = $obj -> ValidacionCorreo($_POST); #Se usa una funcion de la clase
    if (empty($a)){
        $b = $obj -> registrar_todos();
        if ($b === 1){
            echo '<script language="javascript">alert("El usuario se registro correctamente");window.location.href="../VISTAS/INTERFACES/administrador/user-new.php"</script>';
        }
        else if(str_contains($b,'SQLSTATE[HY000] [2002]'))
        {
            include "FORMULARIO REGISTRO DENTACLICK.php";
            echo '<script language="javascript">alert("Hay un problema, intente más tarde");window.location.href="../VISTAS/INTERFACES/administrador/user-new.php"</script>';
        }
        else if(str_contains($b,'SQLSTATE[23000]'))
        {
            echo '<script language="javascript">alert("Algunos datos ya existen, revise");window.location.href="../VISTAS/INTERFACES/administrador/user-new.php"</script>';
        }
    }
    else{
        echo '<script language="javascript">alert("El correo esta en uso");window.location.href="../VISTAS/INTERFACES/administrador/user-new.php"</script>';
    }
?>