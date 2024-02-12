<?php
    include "../MODELOS/agenda.php";
    $obj = new agenda();
    $r = $obj -> consulta_e($_POST);
    if(empty($r)){
        echo '<script language="javascript">alert("No se encontraron usuarios");window.location="../VISTAS/INTERFACES/administrador/agenda-search.php"</script>';
    }
    else{
        if($_SESSION["roles"] == "Administrador"){
        echo'<thead>
            <tr class="text-center roboto-medium">
            <th>Id de agenda</th>
            <th>Fecha inicial</th>
            <th>Fecha final</th>
            <th>Hora inicial</th>
            <th>Hora final</th>
            <th>Odontologo</th>
            <th>Actualizar</th>
            <th>Eliminar</th>
            </tr>
            </thead>';

        foreach ($r as $fila){ 
            echo '<tbody> 
            <tr class="text-center">								
            <td>'.$fila['id_agenda'].'</td>
            <td>'.$fila['FechaInicial'].'</td>
            <td>'.$fila['FechaFinal'].'</td>
            <td>'.$fila['HoraInicial'].'</td>
            <td>'.$fila['HoraFinal'].'</td>
            <td>'.$fila['Nombre'].'</td>
            <td>
                <a href="agenda-update.php?upd='.$fila["id_agenda"].' class="btn btn-success">
                    <i class="fas fa-sync-alt"></i>	
                </a>
            </td>
            <td>
                <a href="/Proyecto/CONTROLADORES/Eliminar_agendas.php?del='.$fila["id_agenda"].'" onclick="return ConfirmarEliminacion();" type="button" class="btn btn-warning">
                    <i class="far fa-trash-alt"></i>
                </a>
            </td>
            </tr>';
        }
    }
    if($_SESSION["roles"] == "Cliente"){
        echo'<thead>
            <tr class="text-center roboto-medium">
            <th>Id de agenda</th>
            <th>Fecha inicial</th>
            <th>Fecha final</th>
            <th>Hora inicial</th>
            <th>Hora final</th>
            <th>Odontologo</th>
            </tr>
            </thead>';

        foreach ($r as $fila){ 
            echo '<tbody> 
            <tr class="text-center">								
            <td>'.$fila['id_agenda'].'</td>
            <td>'.$fila['FechaInicial'].'</td>
            <td>'.$fila['FechaFinal'].'</td>
            <td>'.$fila['HoraInicial'].'</td>
            <td>'.$fila['HoraFinal'].'</td>
            <td>'.$fila['Nombre'].'</td>
            </tr>';
        }
    }
    if($_SESSION["roles"] == "Auxiliar_Odontologia"){
        echo'<thead>
            <tr class="text-center roboto-medium">
            <th>Id de agenda</th>
            <th>Fecha inicial</th>
            <th>Fecha final</th>
            <th>Hora inicial</th>
            <th>Hora final</th>
            <th>Odontologo</th>
            <th>Actualizar</th>
            <th>Eliminar</th>
            </tr>
            </thead>';

        foreach ($r as $fila){ 
            echo '<tbody> 
            <tr class="text-center">								
            <td>'.$fila['id_agenda'].'</td>
            <td>'.$fila['FechaInicial'].'</td>
            <td>'.$fila['FechaFinal'].'</td>
            <td>'.$fila['HoraInicial'].'</td>
            <td>'.$fila['HoraFinal'].'</td>
            <td>'.$fila['Nombre'].'</td>
            <td>
                <a href="agenda-update.php?upd='.$fila["id_agenda"].' class="btn btn-success">
                    <i class="fas fa-sync-alt"></i>	
                </a>
            </td>
            <td>
                <a href="/Proyecto/CONTROLADORES/Eliminar_agendas.php?del='.$fila["id_agenda"].'" onclick="return ConfirmarEliminacion();" type="button" class="btn btn-warning">
                    <i class="far fa-trash-alt"></i>
                </a>
            </td>
            </tr>';
        }
    }
    if($_SESSION["roles"] == "Odontologo"){
        echo'<thead>
            <tr class="text-center roboto-medium">
            <th>Id de agenda</th>
            <th>Fecha inicial</th>
            <th>Fecha final</th>
            <th>Hora inicial</th>
            <th>Hora final</th>
            <th>Odontologo</th>
            </tr>
            </thead>';

        foreach ($r as $fila){ 
            echo '<tbody> 
            <tr class="text-center">								
            <td>'.$fila['id_agenda'].'</td>
            <td>'.$fila['FechaInicial'].'</td>
            <td>'.$fila['FechaFinal'].'</td>
            <td>'.$fila['HoraInicial'].'</td>
            <td>'.$fila['HoraFinal'].'</td>
            <td>'.$fila['Nombre'].'</td>
            </tr>';
        }
    }
}
?>