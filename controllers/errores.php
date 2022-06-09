<?php
class Errores extends Controller{
    function __construct(){
        parent::__construct();
       // $this->views->mensaje ="error de solicitud o no existe la pagina";
        $this->view->render('errores/index');
        //echo "<p>Error al Cargar el recurso</p>";
    }
}
?>