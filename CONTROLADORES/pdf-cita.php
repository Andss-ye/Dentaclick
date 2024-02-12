<?php
    ob_start(); 
    echo "<h2>Reporte citas</h2><br><br>";
    include "../MODELOS/cita_medica.php";
    $num_doc_session = $_SESSION["numero_doc"];
    if($_SESSION["roles"] == "Administrador" || $_SESSION["roles"] == "Auxiliar_Odontologia"){
    $retorno = $conexion->query("SELECT Usu1.Nombre as 'Cliente', Cita_Medica.id_cita, Cita_Medica.Fecha, Cita_Medica.Descripcion, 
	Cita_medica.Hora, Cita_Medica.Estado, Cita_Medica.id_agenda, Usu2.Nombre as 'Doctor',
	Cita_Medica.id_cita from Usuario as Usu1 inner join Cita_Medica on Usu1.NumeroDoc = Cita_Medica.NumeroDocSolicitante 
	inner join Usuario as Usu2 on Cita_Medica.NumeroDocAtiende = Usu2.NumeroDoc and Cita_Medica.Estado = 'Pendiente' order by Cita_Medica.id_cita;")->fetchall();
    echo '<table border="1">';
    echo '<thead>
    <tr>
        <th>id de cita</th>
        <th>Fecha</th>
        <th>Descripcion</th>
        <th>Hora</th>
        <th>Estado</th>
        <th>Solicitante</th>
        <th>Odontologo que atiende</th>
        <th>id de agenda</th>
    </tr>
    </thead>';
    foreach ($retorno as $fila){
        echo '<tbody> 
        <tr>								
        <td>'.$fila['id_cita'].'</td>
        <td>'.$fila['Fecha'].'</td>
        <td>'.$fila['Descripcion'].'</td>
        <td>'.$fila['Hora'].'</td>
        <td>'.$fila['Estado'].'</td>
        <td>'.$fila['Cliente'].'</td>
        <td>'.$fila['Doctor'].'</td>
        <td>'.$fila['id_agenda'].'</td>
        </tr>';
    }
    echo '</tbody>
	</table>';
}
    if($_SESSION["roles"] == "Odontologo"){
    $retorno = $conexion->query("SELECT Cita_Medica.id_cita, Cita_Medica.Fecha, Cita_Medica.Descripcion, 
    Cita_medica.Hora, Cita_Medica.Estado, Cita_Medica.id_agenda, Usu1.Nombre as 'Cliente'
    from Usuario as Usu1 inner join Cita_Medica on Cita_Medica.NumeroDocSolicitante = Usu1.NumeroDoc and
    Cita_Medica.NumeroDocAtiende = $num_doc_session and Cita_Medica.Estado = 'Pendiente' order by Cita_Medica.id_cita;")->fetchall();
        echo '<table border="1">';
        echo '<thead>
        <tr>
            <th>id de cita</th>
            <th>Fecha</th>
            <th>Descripcion</th>
            <th>Hora</th>
            <th>Estado</th>
            <th>Solicitante</th>
            <th>id de agenda</th>
        </tr>
        </thead>';
        foreach ($retorno as $fila){
            echo '<tbody> 
            <tr>								
            <td>'.$fila['id_cita'].'</td>
            <td>'.$fila['Fecha'].'</td>
            <td>'.$fila['Descripcion'].'</td>
            <td>'.$fila['Hora'].'</td>
            <td>'.$fila['Estado'].'</td>
            <td>'.$fila['Cliente'].'</td>
            <td>'.$fila['id_agenda'].'</td>
            </tr>';
        }
        echo '</tbody>
        </table>';
}
if($_SESSION["roles"] == "Cliente"){
    $retorno = $conexion->query("SELECT Cita_Medica.id_cita, Cita_Medica.Fecha, Cita_Medica.Descripcion, 
	Cita_medica.Hora, Cita_Medica.Estado, Cita_Medica.id_agenda, Usu1.Nombre as 'Doctor'
	from Usuario as Usu1 inner join Cita_Medica on Cita_Medica.NumeroDocAtiende = Usu1.NumeroDoc and
	Cita_Medica.NumeroDocSolicitante = $num_doc_session and Cita_Medica.Estado = 'Pendiente' order by Cita_Medica.id_cita;")->fetchall();
        echo '<table border="1">';
        echo '<thead>
        <tr>
            <th>id de cita</th>
            <th>Fecha</th>
            <th>Descripcion</th>
            <th>Hora</th>
            <th>Estado</th>
            <th>Odontologo que atiende</th>
            <th>id de agenda</th>
        </tr>
        </thead>';
        foreach ($retorno as $fila){
            echo '<tbody> 
            <tr>								
            <td>'.$fila['id_cita'].'</td>
            <td>'.$fila['Fecha'].'</td>
            <td>'.$fila['Descripcion'].'</td>
            <td>'.$fila['Hora'].'</td>
            <td>'.$fila['Estado'].'</td>
            <td>'.$fila['Doctor'].'</td>
            <td>'.$fila['id_agenda'].'</td>
            </tr>';
        }
        echo '</tbody>
        </table>';
}
           
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
    $nombre = "citas.pdf";
    //Se genera el documento pdf con los parametros indicados, forzando la descarga del documento
    $dompdf->stream($nombre);
?>