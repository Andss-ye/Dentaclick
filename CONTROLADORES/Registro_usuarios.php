<?php
    include "../MODELOS/usuario.php";
    $obj = new usuario ();
    $a = $obj -> ValidacionCorreo($_POST);
    if (empty($a)){
        $b = $obj -> registrar();
        if ($b === 1){
            echo '<script language="javascript">alert("Buen registro");window.location.href="../index.html"</script>';
        }
        else if(str_contains($b,'SQLSTATE[HY000] [2002]'))
        { 
            echo '<script language="javascript">alert("Hay un problema, intente más tarde");window.location.href="../VISTAS/register.php"</script>';
        }
        else if(str_contains($b,'SQLSTATE[23000]'))
        {
            echo '<script language="javascript">alert("Algunos datos ya existen, revise");window.location.href="../VISTAS/register.php"</script>';
        }
    }
    else{
        echo '<script language="javascript">alert("El correo esta en uso");window.location.href="../VISTAS/register.php"</script>';
    }
?>