<?php
    include "../MODELOS/agenda.php";
    $obj = new agenda ();
    #defino variables
    $fechai = $_POST['FechaInicial1'];
    $fechaf = $_POST['FechaFinal1'];
    $horai = $_POST['HoraInicial1'];
    $horaf = $_POST['HoraFinal1'];
    $NumeroDoc = $_POST['NumeroDoc1'];
    #fin de variables
    #validacion 1 
    $v1 = $conexion->prepare("SELECT FechaInicial, FechaFinal, HoraInicial, HoraFinal, NumeroDoc from 
    agenda where Estado = 1 and FechaInicial = '$fechai' and FechaFinal = 
    '$fechaf' and HoraInicial ='$horai' and HoraFinal ='$horaf' and NumeroDoc = '$NumeroDoc'");
    $v1 -> execute ();
    $a = $v1 -> fetchall(PDO::FETCH_ASSOC);
    if($_SESSION["roles"] == "Administrador"){
        if([$fechai && $fechaf && $horai && $horaf && $NumeroDoc] == $a){
            echo '<script language="javascript">alert("La agenda ya existe");window.location.href="../VISTAS/INTERFACES/administrador/home.php"</script>';
        }
        else{
        $val = $obj -> registrar_agenda($_POST);
        if ($val === 1){
        echo '<script language="javascript">alert("Buen registro");window.location.href="../VISTAS/INTERFACES/administrador/home.php"</script>';
        }
        else if(str_contains($a,'SQLSTATE[HY000] [2002]'))
        { 
            echo '<script language="javascript">alert("Hay un problema, intente más tarde");window.location.href="../VISTAS/INTERFACES/administrador/home.php"</script>';
        }
        else if(str_contains($a,'SQLSTATE[23000]'))
        {
            echo '<script language="javascript">alert("Algunos datos estan repetidos, revise");window.location.href="../VISTAS/INTERFACES/administrador/home.php"</script>';
        }
    }
}
    if($_SESSION["roles"] == "Auxiliar_Odontologia"){
        if([$fechai && $fechaf && $horai && $horaf && $NumeroDoc] == $a){
            echo '<script language="javascript">alert("La agenda ya existe");window.location.href="../VISTAS/INTERFACES/auxiliar/home.php"</script>';
        }
        else{
        $val = $obj -> registrar_agenda($_POST);
        if ($val === 1){
        echo '<script language="javascript">alert("Buen registro");window.location.href="../VISTAS/INTERFACES/auxiliar/home.php"</script>';
        }
        else if(str_contains($a,'SQLSTATE[HY000] [2002]'))
        { 
            echo '<script language="javascript">alert("Hay un problema, intente más tarde");window.location.href="../VISTAS/INTERFACES/auxiliar/home.php"</script>';
        }
        else if(str_contains($a,'SQLSTATE[23000]'))
        {
            echo '<script language="javascript">alert("Algunos datos estan repetidos, revise");window.location.href="../VISTAS/INTERFACES/auxiliar/home.php"</script>';
        }
    }
}
    if($_SESSION["roles"] == "Odontologo"){
        if([$fechai && $fechaf && $horai && $horaf && $NumeroDoc] == $a){
            echo '<script language="javascript">alert("La agenda ya existe");window.location.href="../VISTAS/INTERFACES/odontologo/home.php"</script>';
        }
        else{
        $val = $obj -> registrar_agenda($_POST);
        if ($val === 1){
        echo '<script language="javascript">alert("Buen registro");window.location.href="../VISTAS/INTERFACES/odontologo/home.php"</script>';
        }
        else if(str_contains($a,'SQLSTATE[HY000] [2002]'))
        { 
            echo '<script language="javascript">alert("Hay un problema, intente más tarde");window.location.href="../VISTAS/INTERFACES/odontologo/home.php"</script>';
        }
        else if(str_contains($a,'SQLSTATE[23000]'))
        {
            echo '<script language="javascript">alert("Algunos datos estan repetidos, revise");window.location.href="../VISTAS/INTERFACES/odontologo/home.php"</script>';
        }
    }
}
?>