<?php
    include "../MODELOS/usuario.php";
    $obj = new usuario();
    $r = $obj -> consulta_e($_POST);
    if(empty($r)){
        echo '<script language="javascript">alert("No se encontraron usuarios");window.location="../VISTAS/INTERFACES/administrador/user-search.php"</script>';
    }
    else{
    echo'<thead>
        <tr class="text-center roboto-medium">
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
        <th>Actualizar</th>
        <th>Eliminar</th>
        </tr>
        </thead>';

    foreach ($r as $fila){ 
        echo '<tbody> 
        <tr class="text-center">								
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
        <td>
            <a href="user-update.php?upd='.$fila["NumeroDoc"].' class="btn btn-success">
                  <i class="fas fa-sync-alt"></i>	
            </a>
        </td>
        <td>
            <a href="/Proyecto/CONTROLADORES/Eliminar_usuarios.php?del='.$fila["NumeroDoc"].'" onclick="return ConfirmarEliminacion();" type="button" class="btn btn-warning">
                <i class="far fa-trash-alt"></i>
            </a>
        </td>
        </tr>';
    }
}
?>