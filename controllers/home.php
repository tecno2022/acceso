<?php
include_once 'session_admin.php';
    class Home extends Controller{
        function __construct(){
            parent::__construct();
          //  $this->view->render('nuevo/index');
          $this->view->mensaje="";//se agrega esta linea para msj
        }
    function render(){

        $estadistica=$this->model->getEstadistica();
        $this->view->estadistica=$estadistica;


        $visitantes=$this->model->getTotalVisitantes();
        $this->view->visitantes=$visitantes;

        $visitanteshoy=$this->model->getTotalVisitanteshoy();
        $this->view->visitanteshoy=$visitanteshoy;
  
       // var_dump($visitantes); exit();
        $this->view->render('home/index');
    }

  

    }

?>