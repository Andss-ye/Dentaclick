<?php
include "../MODELOS/usuario.php";
$obj = new usuario ();
$b = $obj -> eliminar ($_POST);
if ($b === 1){
echo '<script language="javascript">alert("Se elimino el usuario");window.location="../VISTAS/INTERFACES/administrador/user-list.php"</script>';
}
else if(str_contains($b,'SQLSTATE[HY000] [2002]'))
{ 
    echo '<script language="javascript">alert("Hay un problema, intente más tarde");window.location="../VISTAS/INTERFACES/administrador/user-list.php"</script>';
}
else if(str_contains($b,'SQLSTATE[23000]'))
{
    echo '<script language="javascript">alert("Algunos datos estan repetidos, revise");window.location="../VISTAS/INTERFACES/administrador/user-list.php"</script>';
}
else{
    echo '<script language="javascript">alert("Algo sucedio");window.location="../VISTAS/INTERFACES/administrador/user-list.php"; </script>';
}
?>