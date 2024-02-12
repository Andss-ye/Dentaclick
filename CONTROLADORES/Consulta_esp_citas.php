<?php
    include "../MODELOS/cita_medica.php";
    $obj = new cita_medica();
    $r = $obj -> consulta_e($_POST);
    if(empty($r)){
        echo '<script language="javascript">alert("No se encontraron usuarios");window.location="../VISTAS/INTERFACES/administrador/cita-search.php"</script>';
    }
    else{
        if($_SESSION["roles"] == "Administrador"){
        echo '<thead>
        <tr class="text-center roboto-medium">
            <th>id de cita</th>
            <th>Fecha</th>
            <th>Descripcion</th>
            <th>Hora</th>
            <th>Estado</th>
            <th>Solicitante</th>
            <th>Odontologo que atiende</th>
            <th>id de agenda</th>
            <th>Actualizar</th>
            <th>Eliminar</th>
            <th>Realizada</th>
        </tr>
        </thead>';
        foreach ($r as $fila){
            echo '<tbody> 
            <tr class="text-center">								
            <td>'.$fila['id_cita'].'</td>
            <td>'.$fila['Fecha'].'</td>
            <td>'.$fila['Descripcion'].'</td>
            <td>'.$fila['Hora'].'</td>
            <td>'.$fila['Estado'].'</td>
            <td>'.$fila['Cliente'].'</td>
            <td>'.$fila['Doctor'].'</td>
            <td>'.$fila['id_agenda'].'</td>
            <td>
                <a href="cita-update.php?upd='.$fila["id_cita"].' class="btn btn-success">
                      <i class="fas fa-sync-alt"></i>	
                </a>
            </td>
            <td>
                <a href="/Proyecto/CONTROLADOr/Eliminar_citas.php?del='.$fila["id_cita"].'" onclick="return ConfirmarEliminacion();" type="button" class="btn btn-warning">
                    <i class="far fa-trash-alt"></i>
                  </a>
            </td>
            <td>
			<a href="/Proyecto/CONTROLADORES/Cita_realizada.php?rea='.$fila["id_cita"].'" onclick="return Confirmarrealizacion();" type="button" class="btn btn-success">
				<i class="fas fa-check"></i>
			</a>
		    </td>
            </tr>';
        }
    }
    if($_SESSION["roles"] == "Cliente"){
        echo '<thead>
        <tr class="text-center roboto-medium">
            <th>id de cita</th>
            <th>Fecha</th>
            <th>Descripcion</th>
            <th>Hora</th>
            <th>Estado</th>
            <th>Odontologo que atiende</th>
            <th>id de agenda</th>
            <th>Actualizar</th>
            <th>Eliminar</th>
        </tr>
        </thead>';
        foreach ($r as $fila){
            echo '<tbody> 
            <tr class="text-center">								
            <td>'.$fila['id_cita'].'</td>
            <td>'.$fila['Fecha'].'</td>
            <td>'.$fila['Descripcion'].'</td>
            <td>'.$fila['Hora'].'</td>
            <td>'.$fila['Estado'].'</td>
            <td>'.$fila['Doctor'].'</td>
            <td>'.$fila['id_agenda'].'</td>
            </tr>';
        }
    }
    if($_SESSION["roles"] == "Auxiliar_Odontologia"){
        echo '<thead>
        <tr class="text-center roboto-medium">
            <th>id de cita</th>
            <th>Fecha</th>
            <th>Descripcion</th>
            <th>Hora</th>
            <th>Estado</th>
            <th>Solicitante</th>
            <th>Odontologo que atiende</th>
            <th>id de agenda</th>
            <th>Actualizar</th>
            <th>Eliminar</th>
            <th>Realizada</th>
        </tr>
        </thead>';
        foreach ($r as $fila){
            echo '<tbody> 
            <tr class="text-center">								
            <td>'.$fila['id_cita'].'</td>
            <td>'.$fila['Fecha'].'</td>
            <td>'.$fila['Descripcion'].'</td>
            <td>'.$fila['Hora'].'</td>
            <td>'.$fila['Estado'].'</td>
            <td>'.$fila['Cliente'].'</td>
            <td>'.$fila['Doctor'].'</td>
            <td>'.$fila['id_agenda'].'</td>
            <td>
                <a href="cita-update.php?upd='.$fila["id_cita"].' class="btn btn-success">
                      <i class="fas fa-sync-alt"></i>	
                </a>
            </td>
            <td>
                <a href="/Proyecto/CONTROLADOr/Eliminar_citas.php?del='.$fila["id_cita"].'" onclick="return ConfirmarEliminacion();" type="button" class="btn btn-warning">
                    <i class="far fa-trash-alt"></i>
                  </a>
            </td>
            <td>
			<a href="/Proyecto/CONTROLADORES/Cita_realizada.php?rea='.$fila["id_cita"].'" onclick="return Confirmarrealizacion();" type="button" class="btn btn-success">
				<i class="fas fa-check"></i>
			</a>
		    </td>
            </tr>';
        }
    }
    if($_SESSION["roles"] == "Odontologo"){
        echo '<thead>
        <tr class="text-center roboto-medium">
            <th>id de cita</th>
            <th>Fecha</th>
            <th>Descripcion</th>
            <th>Hora</th>
            <th>Estado</th>
            <th>Solicitante</th>
            <th>Odontologo que atiende</th>
            <th>id de agenda</th>
            <th>Realizada</th>
        </tr>
        </thead>';
        foreach ($r as $fila){
            echo '<tbody> 
            <tr class="text-center">								
            <td>'.$fila['id_cita'].'</td>
            <td>'.$fila['Fecha'].'</td>
            <td>'.$fila['Descripcion'].'</td>
            <td>'.$fila['Hora'].'</td>
            <td>'.$fila['Estado'].'</td>
            <td>'.$fila['Cliente'].'</td>
            <td>'.$fila['Doctor'].'</td>
            <td>'.$fila['id_agenda'].'</td>
            <td>
			<a href="/Proyecto/CONTROLADORES/Cita_realizada.php?rea='.$fila["id_cita"].'" onclick="return Confirmarrealizacion();" type="button" class="btn btn-success">
				<i class="fas fa-check"></i>
			</a>
		    </td>
            </tr>';
        }
    }
}
?>