<?php

class Controller{
    function __construct(){
        //echo "<p>Controlador base</p>";
        $this->view = new view();
    }


    function loadModel($model){
        $url = 'models/' .$model.'model.php';
        if(file_exists($url)){
        require $url;
        $modelName = $model.'model';
        $this->model = new $modelName();
        }
        }

}

?>