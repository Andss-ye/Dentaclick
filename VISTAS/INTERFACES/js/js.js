function ConfirmarEliminacion(){
	var resp = confirm("¿Estas seguro de eliminar este registro?");
	if(resp == true){
		return true;
	}
	else{
		return false;
	}
}
function Confirmarrealizacion(){
	var resp = confirm("¿Ya se realizo la cita?");
	if(resp == true){
		return true;
	}
	else{
		return false;
	}
}
function ConfirmarSalida(){
    var resp = confirm("¿Estas seguro que quieres salir?");
    if(resp == true){
        return true;
    }
    else{
        return false;
    }
}