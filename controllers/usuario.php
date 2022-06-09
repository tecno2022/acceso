<?php
  include_once 'session_admin.php';
    class Usuario extends Controller{
        function __construct(){
            parent::__construct();
          //  $this->view->render('nuevo/index');
          $this->view->mensaje="";//se agrega esta linea para msj
        }
    function render(){
        $usuarios=$this->model->getUsuarios('departamento');
        $this->view->usuarios=$usuarios;

             // SECCION DISPNIBLE PARA ADMIN
             if($_SESSION['id_usuario_perfil'] == 1){
              $this->view->render('usuario/index');
            } else{
                $this->view->render('errores/index');
            }

            
   
    }

    function Registro(){
    
      //Tipo de persona
    /*  $tipos=$this->model->getCatalogo('persona_tipo');
      $this->view->tipos=$tipos;*/

       //Departamento
      $departamentos=$this->model->getCatalogo('departamento');
      $this->view->departamentos=$departamentos;

      //Perfil
      $perfiles=$this->model->getCatalogo('usuario_perfil');
      $this->view->perfiles=$perfiles;

        $this->view->render('usuario/add_user');
    }


    function VerUsuario($param=null){
      $id_usuario=$param[0];
      $vista=$param[1];
      
      $departamentos=$this->model->getCatalogo('departamento');
      $this->view->departamentos=$departamentos;

      //Perfil
      $perfiles=$this->model->getCatalogo('usuario_perfil');
      $this->view->perfiles=$perfiles;

      $usuario = $this->model->Detalle($id_usuario);
      $this->view->usuario=$usuario;

      $this->view->vista=$vista;
      $this->view->render('usuario/detalle');
    }



    function BuscarUsuario(){
      $cedula=$_POST['ci'];
      $data = $this->model->Buscar($cedula);
      echo json_encode($data,JSON_UNESCAPED_UNICODE);
    }

    function Save_photo(){//Se registra un usuario con foto
  
    //Datos genrales
    $cedula = $_POST["cedula"];
    $nombres = $_POST["nombres"];
    $apellidos = $_POST["apellidos"];
    $genero = $_POST["genero"];
    $telefono = $_POST["telefono"];
    $correo = $_POST["correo"];
    $departamento = $_POST["departamento"];
    $perfil = $_POST["perfil"];
      
    //Datos para Tomar una foto 
    //list($nacionalidad, $nro_cedula) = explode("-", $cedula);
    $foto = base64_decode($_POST["foto"]);
    $route_photo = "src/fotos/".$cedula.".jpg";
    $name_photo = $cedula.".jpg";
    $file = fopen($route_photo, "w");

  
        if($data=$this->model->existe($cedula)){
          $mensaje="<div class='alert alert-danger alert-dismissable'>
          <button aria-hidden='true' data-dismiss='alert' class='close' type='button'>×</button>
          el codigo  <b>" . $data . "</b> <a class='alert-link' href='#'> Usuario registrado </a>
          </div>";
          header('Content-type: application/json; charset=utf-8');
          echo json_encode($data,JSON_UNESCAPED_UNICODE);
          exit();
        }

        $mensaje="";
        
        if($data=$this->model->insert(['file'=>$file,'foto'=>$foto,'cedula'=>$cedula,'nombres'=>$nombres,'apellidos'=>$apellidos,
        'genero'=>$genero,'telefono'=>$telefono,'correo'=>$correo,'departamento'=>$departamento,
        'perfil'=>$perfil,'route_photo'=>$route_photo,'name_photo'=>$name_photo])){

          $mensaje="<div class='alert alert-success alert-dismissable'>
          <button aria-hidden='true' data-dismiss='alert' class='close type='button'></button>
          ¡Felicidades, Usuario registrado  Exitosamente! <a class='alert-link' href='#'></a></div>";
   
        }else{
          $mensaje="<div class='alert alert-danger alert-dismissable'>
          <button aria-hidden='true' data-dismiss='alert' class='close type='button'></button>
          ERROR:Ha ocurrido un error al registrar usuario <a class='alert-link' href='#'></a></div>";

        }
        /* $this->view->mensaje=$mensaje;
            $this->render();*/
            header('Content-type: application/json; charset=utf-8');
            echo json_encode($data,JSON_UNESCAPED_UNICODE);
    }
  



    function Save_img(){//Se registra un usuario con foto tomada del sistema
  
      //Datos genrales
      $cedula = $_POST["cedula"];
      $nombres = $_POST["nombres"];
      $apellidos = $_POST["apellidos"];
      $genero = $_POST["genero"];
      $telefono = $_POST["telefono"];
      $correo = $_POST["correo"];
      $departamento = $_POST["departamento"];
      $perfil = $_POST["perfil"];
        
      //Datos para Guaardar una foto 
      $archivo = $_FILES["archivo"]["name"];
      $route_temp=$_FILES["archivo"]["tmp_name"];

      $fileName = basename($archivo);
      $targetFilePath = 'src/fotos/'.$fileName;
      $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
      $allowTypes = array('jpg', 'png', 'jpeg');

     // list($nacionalidad, $nro_cedula) = explode("-", $cedula);
    
      if($data=$this->model->existe($cedula)){
        $mensaje="<div class='alert alert-danger alert-dismissable'>
        <button aria-hidden='true' data-dismiss='alert' class='close' type='button'>×</button>
        el codigo  <b>" . $data . "</b> <a class='alert-link' href='#'> Usuario registrado </a>
        </div>";
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($data,JSON_UNESCAPED_UNICODE);
        exit();
      }
  
          $mensaje="";
          
          if($data=$this->model->insert(['file'=>$file,'foto'=>$foto,'cedula'=>$cedula,'nombres'=>$nombres,'apellidos'=>$apellidos,
          'genero'=>$genero,'telefono'=>$telefono,'correo'=>$correo,'departamento'=>$departamento,
          'perfil'=>$perfil,'archivo'=>$archivo,'route_temp'=>$route_temp,'fileName'=>$fileName,'targetFilePath'=>$targetFilePath,
          'fileType'=>$fileType,'allowTypes'=>$allowTypes])){
  
            $mensaje="<div class='alert alert-success alert-dismissable'>
            <button aria-hidden='true' data-dismiss='alert' class='close type='button'></button>
            ¡Felicidades, Usuario registrado  Exitosamente! <a class='alert-link' href='#'></a></div>";
     
          }else{
            $mensaje="<div class='alert alert-danger alert-dismissable'>
            <button aria-hidden='true' data-dismiss='alert' class='close type='button'></button>
            ERROR:Ha ocurrido un error al registrar usuario <a class='alert-link' href='#'></a></div>";
  
          }
          /* $this->view->mensaje=$mensaje;
            $this->render();*/
            header('Content-type: application/json; charset=utf-8');
            echo json_encode($data,JSON_UNESCAPED_UNICODE);
      }




      function Save_img_sis(){//Se registra un usuario con foto del sistema
  
        //Datos genrales
        $cedula = $_POST["cedula"];
        $nombres = $_POST["nombres"];
        $apellidos = $_POST["apellidos"];
        $genero = $_POST["genero"];
        $telefono = $_POST["telefono"];
        $correo = $_POST["correo"];
        $departamento = $_POST["departamento"];
        $perfil = $_POST["perfil"];
          
        //Datos para Guaardar una foto 
        $foto_ubv = $_POST["foto_ubv"];
      
         // list($nacionalidad, $nro_cedula) = explode("-", $cedula);
    
      if($data=$this->model->existe($cedula)){
        $mensaje="<div class='alert alert-danger alert-dismissable'>
        <button aria-hidden='true' data-dismiss='alert' class='close' type='button'>×</button>
        el codigo  <b>" . $data . "</b> <a class='alert-link' href='#'> Usuario registrado </a>
        </div>";
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($data,JSON_UNESCAPED_UNICODE);
        exit();
      }
  
            $mensaje="";
            
            if($data=$this->model->insert(['foto_ubv'=>$foto_ubv,'cedula'=>$cedula,'nombres'=>$nombres,'apellidos'=>$apellidos,
            'genero'=>$genero,'telefono'=>$telefono,'correo'=>$correo,'departamento'=>$departamento,
            'perfil'=>$perfil])){
    
              $mensaje="<div class='alert alert-success alert-dismissable'>
              <button aria-hidden='true' data-dismiss='alert' class='close type='button'></button>
              ¡Felicidades, Usuario registrado  Exitosamente! <a class='alert-link' href='#'></a></div>";
       
            }else{
              $mensaje="<div class='alert alert-danger alert-dismissable'>
              <button aria-hidden='true' data-dismiss='alert' class='close type='button'></button>
              ERROR:Ha ocurrido un error al registrar usuario <a class='alert-link' href='#'></a></div>";
    
            }
           /* $this->view->mensaje=$mensaje;
            $this->render();*/
            header('Content-type: application/json; charset=utf-8');
            echo json_encode($data,JSON_UNESCAPED_UNICODE);
        }


        //Editar Usuario

        function Save_photo_Edit(){//Se registra un usuario con foto
  
          //Datos genrales
          $id_usuario = $_POST["id_usuario"];
          $id_persona = $_POST["id_persona"];
          $estatus = $_POST["estatus"];
          $password=$_POST['password'];

          $cedula = $_POST["cedula"];
          $nombres = $_POST["nombres"];
          $apellidos = $_POST["apellidos"];
          $genero = $_POST["genero"];
          $telefono = $_POST["telefono"];
          $correo = $_POST["correo"];
          $departamento = $_POST["departamento"];
          $perfil = $_POST["perfil"];
            
          //Datos para Tomar una foto 
         // list($nacionalidad, $nro_cedula) = explode("-", $cedula);
          $foto = base64_decode($_POST["foto"]);
          $route_photo = "src/fotos/".$cedula.".jpg";
          $name_photo = $cedula.".jpg";
          $file = fopen($route_photo, "w");
      
        
            /*  if($data=$this->model->existe($nro_cedula)){
                $mensaje="<div class='alert alert-danger alert-dismissable'>
                <button aria-hidden='true' data-dismiss='alert' class='close' type='button'>×</button>
                el codigo  <b>" . $data . "</b> <a class='alert-link' href='#'> Usuario registrado </a>
                </div>";
                header('Content-type: application/json; charset=utf-8');
                echo json_encode($data,JSON_UNESCAPED_UNICODE);
                exit();
              }*/
      
              $mensaje="";
              
              if($data=$this->model->edit(['file'=>$file,'foto'=>$foto,'cedula'=>$cedula,'nombres'=>$nombres,'apellidos'=>$apellidos,
              'genero'=>$genero,'telefono'=>$telefono,'correo'=>$correo,'departamento'=>$departamento,
              'perfil'=>$perfil,'route_photo'=>$route_photo,'name_photo'=>$name_photo,'estatus'=>$estatus,'password'=>$password,'id_persona'=>$id_persona,'id_usuario'=>$id_usuario])){
      
                $mensaje="<div class='alert alert-success alert-dismissable'>
                <button aria-hidden='true' data-dismiss='alert' class='close type='button'></button>
                ¡Felicidades, Usuario registrado  Exitosamente! <a class='alert-link' href='#'></a></div>";
         
              }else{
                $mensaje="<div class='alert alert-danger alert-dismissable'>
                <button aria-hidden='true' data-dismiss='alert' class='close type='button'></button>
                ERROR:Ha ocurrido un error al registrar usuario <a class='alert-link' href='#'></a></div>";
      
              }
              /* $this->view->mensaje=$mensaje;
                  $this->render();*/
                  header('Content-type: application/json; charset=utf-8');
                  echo json_encode($data,JSON_UNESCAPED_UNICODE);
          }

          function Save_img_Edit(){//Se registra un usuario con foto tomada del sistema
  
            //Datos genrales

            $id_usuario = $_POST["id_usuario"];
            $id_persona = $_POST["id_persona"];
            $estatus = $_POST["estatus"];
            $password=$_POST['password'];
  
            $cedula = $_POST["cedula"];
            $nombres = $_POST["nombres"];
            $apellidos = $_POST["apellidos"];
            $genero = $_POST["genero"];
            $telefono = $_POST["telefono"];
            $correo = $_POST["correo"];
            $departamento = $_POST["departamento"];
            $perfil = $_POST["perfil"];
              
            //Datos para Guaardar una foto 
            $archivo = $_FILES["archivo"]["name"];
            $route_temp=$_FILES["archivo"]["tmp_name"];
      
            $fileName = basename($archivo);
            $targetFilePath = 'src/fotos/'.$fileName;
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
            $allowTypes = array('jpg', 'png', 'jpeg');
      
           // list($nacionalidad, $nro_cedula) = explode("-", $cedula);
          
           /* if($data=$this->model->existe($nro_cedula)){
              $mensaje="<div class='alert alert-danger alert-dismissable'>
              <button aria-hidden='true' data-dismiss='alert' class='close' type='button'>×</button>
              el codigo  <b>" . $data . "</b> <a class='alert-link' href='#'> Usuario registrado </a>
              </div>";
              header('Content-type: application/json; charset=utf-8');
              echo json_encode($data,JSON_UNESCAPED_UNICODE);
              exit();
            }*/
        
                $mensaje="";
                
                if($data=$this->model->edit(['file'=>$file,'foto'=>$foto,'cedula'=>$cedula,'nombres'=>$nombres,'apellidos'=>$apellidos,
                'genero'=>$genero,'telefono'=>$telefono,'correo'=>$correo,'departamento'=>$departamento,
                'perfil'=>$perfil,'archivo'=>$archivo,'route_temp'=>$route_temp,'fileName'=>$fileName,'targetFilePath'=>$targetFilePath,
                'fileType'=>$fileType,'allowTypes'=>$allowTypes,'estatus'=>$estatus,'password'=>$password,'id_persona'=>$id_persona,'id_usuario'=>$id_usuario])){
        
                  $mensaje="<div class='alert alert-success alert-dismissable'>
                  <button aria-hidden='true' data-dismiss='alert' class='close type='button'></button>
                  ¡Felicidades, Usuario registrado  Exitosamente! <a class='alert-link' href='#'></a></div>";
           
                }else{
                  $mensaje="<div class='alert alert-danger alert-dismissable'>
                  <button aria-hidden='true' data-dismiss='alert' class='close type='button'></button>
                  ERROR:Ha ocurrido un error al registrar usuario <a class='alert-link' href='#'></a></div>";
        
                }
                /* $this->view->mensaje=$mensaje;
                  $this->render();*/
                  header('Content-type: application/json; charset=utf-8');
                  echo json_encode($data,JSON_UNESCAPED_UNICODE);
            }
      

            function Save_img_sis_Edit(){//Se registra un usuario con foto del sistema
  
              //Datos genrales
              $id_usuario = $_POST["id_usuario"];
              $id_persona = $_POST["id_persona"];
              $estatus = $_POST["estatus"];
              $password=$_POST['password'];

              $cedula = $_POST["cedula"];
              $nombres = $_POST["nombres"];
              $apellidos = $_POST["apellidos"];
              $genero = $_POST["genero"];
              $telefono = $_POST["telefono"];
              $correo = $_POST["correo"];
              $departamento = $_POST["departamento"];
              $perfil = $_POST["perfil"];
                
              //Datos para Guaardar una foto 
              $foto_ubv = $_POST["foto_ubv"];
            
              //  list($nacionalidad, $nro_cedula) = explode("-", $cedula);
          
            /*if($data=$this->model->existe($nro_cedula)){
              $mensaje="<div class='alert alert-danger alert-dismissable'>
              <button aria-hidden='true' data-dismiss='alert' class='close' type='button'>×</button>
              el codigo  <b>" . $data . "</b> <a class='alert-link' href='#'> Usuario registrado </a>
              </div>";
              header('Content-type: application/json; charset=utf-8');
              echo json_encode($data,JSON_UNESCAPED_UNICODE);
              exit();
            }*/
        
                  $mensaje="";
                  
                  if($data=$this->model->edit(['foto_ubv'=>$foto_ubv,'cedula'=>$cedula,'nombres'=>$nombres,'apellidos'=>$apellidos,
                  'genero'=>$genero,'telefono'=>$telefono,'correo'=>$correo,'departamento'=>$departamento,
                  'perfil'=>$perfil,'estatus'=>$estatus,'password'=>$password,'id_persona'=>$id_persona,'id_usuario'=>$id_usuario])){
          
                    $mensaje="<div class='alert alert-success alert-dismissable'>
                    <button aria-hidden='true' data-dismiss='alert' class='close type='button'></button>
                    ¡Felicidades, Usuario registrado  Exitosamente! <a class='alert-link' href='#'></a></div>";
             
                  }else{
                    $mensaje="<div class='alert alert-danger alert-dismissable'>
                    <button aria-hidden='true' data-dismiss='alert' class='close type='button'></button>
                    ERROR:Ha ocurrido un error al registrar usuario <a class='alert-link' href='#'></a></div>";
          
                  }
                 /* $this->view->mensaje=$mensaje;
                  $this->render();*/
                  header('Content-type: application/json; charset=utf-8');
                  echo json_encode($data,JSON_UNESCAPED_UNICODE);
              }




    }

?>