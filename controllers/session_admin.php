
<?php

session_start();

$var=$_SESSION['usuario'];

if(empty($var)){ 
	echo "<script>
					alert('Por Favor ingrese sus datos para iniciar sesion');
					location.href='".constant('URL')."main';
				</script>";
  	echo "<br>No ha iniciado sesion";
	echo"<a  href='".constant('URL')."login'><button>Ir hacia la pagina principal</button></a>";
	die();
} 
?>

