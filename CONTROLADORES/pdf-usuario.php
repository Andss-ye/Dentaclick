<?php
    ob_start(); 
    echo "<h2>Reporte usuarios</h2><br><br>";
    include "../MODELOS/usuario.php";
    $retorno = $conexion->query("SELECT * FROM usuario where Estado = 1")->fetchall();
    echo '<table border="1">';
    echo '<thead>
    <tr>
    <th>Numero de documento</th>
	<th>Nombre</th>
	<th>Contraseña</th>
	<th>Tipo de documento</th>
	<th>Fecha de nacimiento</th>
	<th>Telefono</th>
	<th>Correo</th>
	<th>Nombre de user</th>
	<th>Direccion</th>
	<th>Rol</th>
	<th>Titulo Universitario</th>
	<th>Fecha Entrega Titulo</th>
	<th>Nombre Universidad</th>
	<th>Años de experiencia</th>
	<th>Especializacion</th>
    </tr>
    </thead>';
    foreach ($retorno as $fila){
        echo '<tbody> 
        <tr>								
        <td>'.$fila['NumeroDoc'].'</td>
        <td>'.$fila['Nombre'].'</td>
        <td>'.$fila['Contrasena'].'</td>
        <td>'.$fila['TipoDoc'].'</td>
        <td>'.$fila['FechaNacimiento'].'</td>
        <td>'.$fila['Telefono'].'</td>
        <td>'.$fila['Correo'].'</td>
        <td>'.$fila['NombreUsuario'].'</td>
        <td>'.$fila['Direccion'].'</td>
        <td>'.$fila['Rol'].'</td>
        <td>'.$fila['TituloUniversitario'].'</td>
        <td>'.$fila['FechaEntregaTitulo'].'</td>
        <td>'.$fila['NombreUniversidad'].'</td>
        <td>'.$fila['AnosExperiencia'].'</td>
        <td>'.$fila['Especializacion'].'</td>
        </tr>';
    }
    echo '</tbody>
	</table>';
           
    //Si algun archivo de la clase presenta advertencia, no las presenta
    error_reporting(0);
    //Incluye el archivo fuente (Libreria) para usar la clase DomPDF
    require_once 'dompdf/autoload.inc.php';
    //Usa del archivo fuente, la funcionalidad DomPDF 
    use Dompdf\Dompdf;
    //Crea la instancia a la clase DomPDF
    $dompdf = new DOMPDF();
    //Define el contenido HTML a exportar
    $dompdf->load_html(utf8_decode(ob_get_clean()));
    //Se define el tipo o tamaño de papel para crear el documento pdf
    $dompdf->setPaper('A4', 'landscape');
    //Se asigna el contenido HTML al nuevo documento pdf
    $dompdf->render();
    //Se define el nombre del archivo a crear
    $nombre = "usuarios.pdf";
    //Se genera el documento pdf con los parametros indicados, forzando la descarga del documento
    $dompdf->stream($nombre);
?>