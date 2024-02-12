<?php
include "conexion.php";
session_start();
class cita_medica { #ES definir una entidad fisica o imaginario donde se definen funciones y objetos para llamar despues
    function registrar_citas(){ # SE DEFINE LA FUNCION REGISTRAR CON ARGUMENTOS
        try{ #INTENTA EJECUTAR LAS SIGUIENTES INSTRUCCIONES
            include "conexion.php";
            $registro = $conexion -> prepare ('INSERT INTO cita_medica(Fecha, Descripcion, Hora, NumeroDocSolicitante,
            NumeroDocAtiende, id_agenda) VALUES (:Fecha, :Descripcion, :Hora, :NumeroDoc1, :NumeroDoc2, :id_agenda)'); 
            #USANDO LA CONEXION PREPARA LA INSERCION, : = MARCADORES O DATOS
            #Inicio de registro
                $registro -> bindParam (":Fecha", $_POST['Fecha1']); #SE PARAMETRIZAN LOS VALORES Y SE ASIGNAN LOS VALORES
                $registro -> bindParam (":Descripcion", $_POST['Descripcion1']);  
                $registro -> bindParam (":Hora", $_POST['Hora1']);
                $registro -> bindParam (":NumeroDoc1", $_POST['NumeroDocSolicitante1']);
                $registro -> bindParam (":NumeroDoc2", $_POST['NumeroDocAtiende1']);
                $registro -> bindParam (":id_agenda", $_POST['id_agenda1']);
                $registro -> execute ();#EJECUTA LA SENTENCIA PREPARADA
                return 1; #RETORNA 1 CUANDO TODO FUE EJECUTADO CORRECTAMENTE
            }
            catch (exception $error){#SE EJECUTA EL BLOQUE CUANDO EN EL TRY SE PRESENTA UN ERROR Y ESTE SE ASOCIA A LA VARIABLE $error
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
            $consulto = $conexion->query("SELECT Usu1.Nombre as 'Cliente', Cita_Medica.id_cita, Cita_Medica.Fecha, Cita_Medica.Descripcion, 
            Cita_medica.Hora, Cita_Medica.Estado, Cita_Medica.id_agenda, Usu2.Nombre as 'Doctor',
            Cita_Medica.id_cita from Usuario as Usu1 inner join Cita_Medica on Usu1.NumeroDoc = Cita_Medica.NumeroDocSolicitante 
            inner join Usuario as Usu2 on Cita_Medica.NumeroDocAtiende = Usu2.NumeroDoc and Cita_medica.id_cita = '$busqueda' 
            and Cita_Medica.Estado = 'Pendiente'; ") -> fetchall();
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
            $sql = "UPDATE cita_medica SET Fecha = :Fecha, Descripcion = :Descripcion, Hora = :Hora, Estado = :Estado,
            NumeroDocSolicitante = :NumeroDocSolicitante, NumeroDocAtiende = :NumeroDocAtiende,
            id_agenda = :id_agenda WHERE id_cita = :id_cita";
            $stmt = $conexion->prepare($sql);
            #####
            $stmt -> bindParam(":Fecha", $_POST['Fecha1']);
            $stmt -> bindParam(":Descripcion", $_POST['Descripcion1']);
            $stmt -> bindParam(":Hora", $_POST['Hora1']);
            $stmt -> bindParam(":Estado", $_POST['Estado']);
            $stmt -> bindParam(":NumeroDocSolicitante", $_POST['NumeroDocSolicitante1']);
            $stmt -> bindParam(":id_agenda", $_POST['id_agenda1']);
            $stmt -> bindParam(":id_cita", $_POST['id_cita']);
            $stmt -> bindParam(":NumeroDocAtiende", $_POST['NumeroDocAtiende1']);
            $stmt -> execute();
            return 1;
        }
        catch (exception $error){
            return $error;
        }
    }
    function eliminar(){
        try{
            $id_cita = $_GET['del'];
            include "conexion.php";
            $sql = "UPDATE cita_medica set Estado = 'Se cancelo' WHERE id_cita = '$id_cita'";
            $stmt = $conexion->prepare($sql);
            $stmt -> execute();
            return 1;
        }
        catch (exception $error){
            return $error;
        }
    }
    function realizar(){
        try{
            $id_cita = $_GET['rea'];
            include "conexion.php";
            $sql = "UPDATE cita_medica set Estado = 'Se realizo' WHERE id_cita = '$id_cita'";
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