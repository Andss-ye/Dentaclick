<?php
include "conexion.php";
session_start();
class usuario { #ES definir una entidad fisica o imaginario donde se definen funciones y objetos para llamar despues
    function registrar(){ # SE DEFINE LA FUNCION REGISTRAR CON ARGUMENTOS
        try{ #INTENTA EJECUTAR LAS SIGUIENTES INSTRUCCIONES
            include "conexion.php";
            $registro = $conexion -> prepare ('INSERT INTO usuario(NumeroDoc, Nombre, Contrasena, TipoDoc, FechaNacimiento, 
            Telefono, Correo, NombreUsuario, Direccion) VALUES (:NumeroDoc, :Nombre, :Contrasena, :TipoDoc, :FechaNacimiento,
            :Telefono, :Correo, :NombreUsuario, :Direccion)'); 
            #USANDO LA CONEXION PREPARA LA INSERCION, ? = MARCADORES O DATOS
            $registro -> bindParam (":Nombre", $_POST['Nombre']); #SE PARAMETRIZAN LOS VALORES Y SE ASIGNAN LOS VALORES
            $registro -> bindParam (":TipoDoc", $_POST['a']);
            $registro -> bindParam (":NumeroDoc", $_POST['NumDoc']);
            $registro -> bindParam (":Correo", $_POST['Correo']);
            $registro -> bindParam (":NombreUsuario", $_POST['NombreU']);
            $registro -> bindParam (":Contrasena", $_POST['Contrasena']);
            $registro -> bindParam (":FechaNacimiento", $_POST['FechaNac']);
            $registro -> bindParam (":Telefono", $_POST['Telefono']);
            $registro -> bindParam (":Direccion", $_POST['Direccion']);
            $registro -> execute ();#EJECUTA LA SENTENCIA PREPARADA
            return 1; #RETORNA 1 CUANDO TODO FUE EJECUTADO CORRECTAMENTE
       }
            catch(exception $error){#SE EJECUTA EL BLOQUE CUANDO EN EL TRY SE PRESENTA UN ERROR Y ESTE SE ASOCIA A LA VARIABLE $error
            return $error; #RETORNA EL ERROR AL MODELO
        }
    }
    
    function registrar_todos(){
        try{
            include "conexion.php";
            $registro = $conexion -> prepare ('INSERT INTO usuario(NumeroDoc, Nombre, Contrasena, TipoDoc, FechaNacimiento, 
            Telefono, Correo, NombreUsuario, Direccion, Rol, TituloUniversitario, FechaEntregaTitulo, NombreUniversidad, AnosExperiencia,
            Especializacion) VALUES (:NumeroDoc, :Nombre, :Contrasena, :TipoDoc, :FechaNacimiento, :Telefono, :Correo, :NombreUsuario, 
            :Direccion, :Rol, :TituloUniversitario, :FechaEntregaTitulo, :NombreUniversidad, :AnosExperiencia,
            :Especializacion)'); 
            #USANDO LA CONEXION PREPARA LA INSERCION, ? = MARCADORES O DATOS
            $registro -> bindParam (":NumeroDoc", $_POST['Num']); #SE PARAMETRIZAN LOS VALORES Y SE ASIGNAN LOS VALORES
            $registro -> bindParam (":Nombre", $_POST['Nombre']);
            $registro -> bindParam (":Contrasena", $_POST['Con']);
            $registro -> bindParam (":TipoDoc", $_POST['TipoDoc']);
            $registro -> bindParam (":FechaNacimiento", $_POST['FechaNac']);
            $registro -> bindParam (":Telefono", $_POST['Tele']);
            $registro -> bindParam (":Correo", $_POST['Correo']);
            $registro -> bindParam (":NombreUsuario", $_POST['NombreU']);
            $registro -> bindParam (":Direccion", $_POST['Direccion1']);
            $registro -> bindParam (":Rol", $_POST['Rol1']);
            $registro -> bindParam (":TituloUniversitario", $_POST['TituloUniversitario1']);
            $registro -> bindParam (":FechaEntregaTitulo", $_POST['FechaEntregaTitulo1']);
            $registro -> bindParam (":NombreUniversidad", $_POST['NombreUniversidad1']);
            $registro -> bindParam (":AnosExperiencia", $_POST['AnosExperiencia1']);
            $registro -> bindParam (":Especializacion", $_POST['Especializacion1']);
            $registro -> execute ();#EJECUTA LA SENTENCIA PREPARADA
            return 1; #RETORNA 1 CUANDO TODO FUE EJECUTADO CORRECTAMENTE
       }
            catch(exception $error){#SE EJECUTA EL BLOQUE CUANDO EN EL TRY SE PRESENTA UN ERROR Y ESTE SE ASOCIA A LA VARIABLE $error
            return $error; #RETORNA EL ERROR AL MODELO
        }
    }
    function ingreso(){
        try{
            include "conexion.php"; #instanciar es definir objetos
            $ingresar = $conexion -> prepare ('SELECT * FROM usuario WHERE Correo = :Correo AND Contrasena = :Contrasena');
            $ingresar -> bindParam (":Correo", $_POST['Correo']);
            $ingresar -> bindParam (":Contrasena", $_POST['Password']);
            $ingresar -> execute ();
            $validacion = $ingresar -> fetchall(); #Convertir datos no manipulables en manipulables
            return $validacion;
        }
        catch (exception $error){
            return $error;
        }
    }
    function ValidacionCorreo(){
        try{
            include "conexion.php";
            $consulta = $conexion -> prepare ('SELECT * FROM usuario WHERE Correo = :Correo;');
            $consulta -> bindParam (":Correo", $_POST ['Correo']);
            $consulta -> execute ();
            $matriz = $consulta -> fetchall(PDO::FETCH_ASSOC);
            return $matriz;
        }
        catch (exception $error){
            return $error;
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
            $consulto = $conexion->query("SELECT * FROM usuario where Nombre like '$busqueda%' and Estado = 1")->fetchall();
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
            $sql = "UPDATE usuario SET Nombre = :Nombre, Contrasena = :Contrasena, TipoDoc = :TipoDoc, FechaNacimiento = :FechaNacimiento, Telefono = :Telefono, 
            Correo = :Correo, NombreUsuario = :NombreUsuario, Direccion = :Direccion, Rol = :Rol, TituloUniversitario = :TituloUniversitario, 
            FechaEntregaTitulo = :FechaEntregaTitulo, NombreUniversidad = :NombreUniversidad, AnosExperiencia = :AnosExperiencia, Especializacion = :Especializacion WHERE 
            NumeroDoc = :NumeroDoc";
            $stmt = $conexion->prepare($sql);
            $stmt -> bindParam(":Nombre", $_POST['Nombre']);
            $stmt -> bindParam(":Contrasena", $_POST['Con']);
            $stmt -> bindParam(":TipoDoc", $_POST['TipoDoc']);
            $stmt -> bindParam(":FechaNacimiento", $_POST['FechaNac']);
            $stmt -> bindParam(":Telefono", $_POST['Tele']);
            $stmt -> bindParam(":Correo", $_POST['Correo']);
            $stmt -> bindParam(":NombreUsuario", $_POST['NombreU']);
            $stmt -> bindParam(":Direccion", $_POST['Direccion1']);
            $stmt -> bindParam(":Rol", $_POST['Rol1']);
            $stmt -> bindParam(":TituloUniversitario", $_POST['TituloUniversitario1']);
            $stmt -> bindParam(":FechaEntregaTitulo", $_POST['FechaEntregaTitulo1']);
            $stmt -> bindParam(":NombreUniversidad", $_POST['NombreUniversidad1']);
            $stmt -> bindParam(":AnosExperiencia", $_POST['AnosExperiencia1']);
            $stmt -> bindParam(":Especializacion", $_POST['Especializacion1']);
            $stmt -> bindParam(":NumeroDoc", $_POST['Num']);
            $stmt -> execute();
            return 1;
        }
        catch (exception $error){
            return $error;
        }
    }
    function eliminar(){
        try{
            $NumeroDoc = $_GET['del'];
            include "conexion.php";
            $sql = "UPDATE usuario SET Estado = 0 WHERE NumeroDoc = '$NumeroDoc'";
            $stmt = $conexion->prepare($sql);
            $stmt -> execute();
            return 1;
        }
        catch (exception $error){
            return $error;
        }
    }
    function activar(){
        try{
            $NumeroDoc = $_GET['act'];
            include "conexion.php";
            $sql = "UPDATE usuario SET Estado = 1 WHERE NumeroDoc = '$NumeroDoc'";
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