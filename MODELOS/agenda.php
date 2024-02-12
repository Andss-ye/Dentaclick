<?php
include "conexion.php";
session_start();
class agenda { #ES definir una entidad fisica o imaginario donde se definen funciones y objetos para llamar despues
    function registrar_agenda(){ # SE DEFINE LA FUNCION REGISTRAR CON ARGUMENTOS
        try{ #INTENTA EJECUTAR LAS SIGUIENTES INSTRUCCIONES
            include "conexion.php";
            $registro = $conexion -> prepare ('INSERT INTO agenda(FechaInicial, FechaFinal, HoraInicial, HoraFinal,
            NumeroDoc) VALUES (:FechaInicial, :FechaFinal, :HoraInicial, :HoraFinal, :NumeroDoc)');
            $registro -> bindParam (":FechaInicial", $_POST['FechaInicial1']); #SE PARAMETRIZAN LOS VALORES Y SE ASIGNAN LOS VALORES
            $registro -> bindParam (":FechaFinal", $_POST['FechaFinal1']);
            $registro -> bindParam (":HoraInicial", $_POST['HoraInicial1']);
            $registro -> bindParam (":HoraFinal", $_POST['HoraFinal1']);
            $registro -> bindParam (":NumeroDoc", $_POST['NumeroDoc1']);
            $registro -> execute ();#EJECUTA LA SENTENCIA PREPARADA
            return 1; #RETORNA 1 CUANDO TODO FUE EJECUTADO CORRECTAMENTE
       }
            catch(exception $error){#SE EJECUTA EL BLOQUE CUANDO EN EL TRY SE PRESENTA UN ERROR Y ESTE SE ASOCIA A LA VARIABLE $error
            return $error; #RETORNA EL ERROR AL MODELO
        }
    }
    function consultar(){
        try{
            include "conexion.php";
            $consulto = $conexion -> prepare ('CALL ConsultaG_Usuario ()'); #consulta general
            $consulto -> execute (); 
            $matriz = $consulto -> fetchall(PDO::FETCH_ASSOC);
            return $matriz; #Ejecuta la sentencia
        }
        catch (exception $error){
            return $error;
        }
    }
    function consulta_e(){
        $busqueda = $_POST['buscar'];
        try{
            include "conexion.php";
            $consulto = $conexion->query("SELECT Usuario.Nombre, Agenda.Estado, Agenda.id_agenda, Agenda.FechaInicial, Agenda.FechaFinal,
            Agenda.HoraInicial, Agenda.HoraFinal from Usuario inner join 
            Agenda on Agenda.id_agenda = '$busqueda' and agenda.NumeroDoc = usuario.NumeroDoc 
            and Agenda.Estado = 1;")->fetchall();
            $matriz = $consulto;
            return $matriz; 
        }
        catch (exception $error){
            return $error;
        }
    }
    function actualizar(){
        try{
            include "conexion.php";
            $sql = "UPDATE agenda SET FechaInicial = :FechaInicial, FechaFinal = :FechaFinal, HoraInicial = :HoraInicial, 
            HoraFinal = :HoraFinal, NumeroDoc = :NumeroDoc WHERE id_agenda = :id_agenda";
            $stmt = $conexion->prepare($sql);
            $stmt -> bindParam(":FechaInicial", $_POST['FechaInicial1']);
            $stmt -> bindParam(":FechaFinal", $_POST['FechaFinal1']);
            $stmt -> bindParam(":HoraInicial", $_POST['HoraInicial1']);
            $stmt -> bindParam(":HoraFinal", $_POST['HoraFinal1']);
            $stmt -> bindParam(":NumeroDoc", $_POST['NumeroDoc1']);
            $stmt -> bindParam(":id_agenda", $_POST['id_agenda']);
            $stmt -> execute();
            return 1;
        }
        catch (exception $error){
            return $error;
        }
    }
    function eliminar(){
        try{
            $id_agenda = $_GET['del'];
            include "conexion.php";
            $sql = "UPDATE agenda SET Estado = 0 WHERE id_agenda = '$id_agenda'";
            $stmt = $conexion->prepare($sql);
            $stmt -> execute();
            return 1;
        }
        catch (exception $error){
            return $error;
        }
    }
}
?>