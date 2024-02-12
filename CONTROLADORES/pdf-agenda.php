<?php
    ob_start(); 
    echo "<h2>Reporte Agendas</h2><br><br>";
    include "../MODELOS/agenda.php";
    $num_doc_session = $_SESSION["numero_doc"];
    if($_SESSION["roles"] == "Administrador" || $_SESSION["roles"] == "Auxiliar_Odontologia" || $_SESSION["roles"] == "Cliente"){
    $retorno = $conexion->query("SELECT Usuario.Nombre, Agenda.Estado, Agenda.id_agenda, Agenda.FechaInicial, Agenda.FechaFinal,
	Agenda.HoraInicial, Agenda.HoraFinal from Usuario inner join 
	Agenda on Usuario.NumeroDoc = Agenda.NumeroDoc and Agenda.Estado = 1")->fetchall();
    echo '<table border="1">';
    echo '<thead>
    <tr>
    <th>Id de agenda</th>
    <th>Fecha inicial</th>
    <th>Fecha final</th>
    <th>Hora inicial</th>
    <th>Hora final</th>
    <th>Odontologo</th>
    </tr>
    </thead>';
    foreach ($retorno as $fila){
        echo '<tbody> 
        <tr>								
        <td>'.$fila['id_agenda'].'</td>
        <td>'.$fila['FechaInicial'].'</td>
        <td>'.$fila['FechaFinal'].'</td>
        <td>'.$fila['HoraInicial'].'</td>
        <td>'.$fila['HoraFinal'].'</td>
        <td>'.$fila['Nombre'].'</td>
        </tr>';
    }
    echo '</tbody>
	</table>';
}
    if($_SESSION["roles"] == "Odontologo"){
        $retorno = $conexion->query("SELECT Usuario.Nombre, Agenda.Estado, Agenda.id_agenda, Agenda.FechaInicial, Agenda.FechaFinal,
        Agenda.HoraInicial, Agenda.HoraFinal from Usuario inner join 
        Agenda on Agenda.NumeroDoc = usuario.NumeroDoc and Agenda.NumeroDoc = $num_doc_session and Agenda.Estado = 1")->fetchall();
        echo '<table border="1">';
        echo '<thead>
        <tr>
        <th>Id de agenda</th>
        <th>Fecha inicial</th>
        <th>Fecha final</th>
        <th>Hora inicial</th>
        <th>Hora final</th>
        <th>Odontologo</th>
        </tr>
        </thead>';
        foreach ($retorno as $fila){
            echo '<tbody> 
            <tr>								
            <td>'.$fila['id_agenda'].'</td>
            <td>'.$fila['FechaInicial'].'</td>
            <td>'.$fila['FechaFinal'].'</td>
            <td>'.$fila['HoraInicial'].'</td>
            <td>'.$fila['HoraFinal'].'</td>
            <td>'.$fila['Nombre'].'</td>
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
    $nombre = "agendas.pdf";
    //Se genera el documento pdf con los parametros indicados, forzando la descarga del documento
    $dompdf->stream($nombre);
?>