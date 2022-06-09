<?php
  include_once 'session_admin.php';
    class Visitante extends Controller{
        function __construct(){
            parent::__construct();
          //  $this->view->render('nuevo/index');
          $this->view->mensaje="";//se agrega esta linea para msj
        }
    function render(){
        $usuarios=$this->model->getUsuarios();
        $this->view->usuarios=$usuarios;

        $this->view->render('visitante/index');
    }


    function CambiarEstatus($param=null){
      $id_visitante=$param[0];
      $vista=$param[1];
      $id_persona=$param[2];


      if($data=$this->model->ValVisitante($id_visitante)){
        $mensaje2="<div class='alert alert-danger alert-dismissable'>
        <button aria-hidden='true' data-dismiss='alert' class='close' type='button'>×</button>
        El Cod pase <a class='alert-link' href='#'> " . $data . "</a> Yas Se encuentra actualizado 
        </div>";
        $this->view->mensaje2=$mensaje2;
        if($vista=='1'){
          $this->VerVisita($id_persona);
         }else{
          $this->Verificar();
         }
        exit();
      }

     if($this->model->cambio($id_visitante)){
      $mensaje="<div class='alert alert-success alert-dismissable'>
      <button aria-hidden='true' data-dismiss='alert' class='close type='button'></button>
       Registro Actualizado! <a class='alert-link' href='#'></a></div>";

     }else{
      $mensaje="<div class='alert alert-danger alert-dismissable'>
      <button aria-hidden='true' data-dismiss='alert' class='close type='button'></button>
      ERROR: Ha ocurrido un error al actualizar registror <a class='alert-link' href='#'></a></div>";

     }
     $this->view->mensaje=$mensaje;

     if($vista=='1'){
      $this->VerVisita($id_persona);
     }else{
      $this->Verificar();
     }

    
  }



    function Registro($param=null){
      $vista=$param[0];
       //Departamento
      $departamentos=$this->model->getCatalogo('departamento');
      $this->view->departamentos=$departamentos;
      //Anfitrion
      $perfiles=$this->model->getCatalogo('anfitrion');
      $this->view->perfiles=$perfiles;

      $this->view->vista=$vista;

      $this->view->render('visitante/add_visitante');
    }

    function Verificar(){
      $usuarios=$this->model->getUsuariosFecha();
      $this->view->usuarios=$usuarios;

      $visitantes=$this->model->getVisitantes();
      $this->view->visitantes=$visitantes;


      $this->view->render('visitante/verificar');
    }


    function VerVisitante($param=null){
      $id_visitante=$param[0];
      $vista=$param[1];
      
      $departamentos=$this->model->getCatalogo('departamento');
      $this->view->departamentos=$departamentos;

      //anfitrion
      $anfitriones=$this->model->getCatalogo('anfitrion');
      $this->view->anfitriones=$anfitriones;

      $usuario = $this->model->Detalle($id_visitante);
      $this->view->usuario=$usuario;

      $this->view->vista=$vista;
     
      $this->view->render('visitante/detalle');
    }

    function VerVisita($param=null){ // MUESTRA TODAS LAS VISITAS DE UN USUARIO
      $id_persona=$param[0];
      
     /* $departamentos=$this->model->getCatalogo('departamento');
      $this->view->departamentos=$departamentos;

      //anfitrion
      $anfitriones=$this->model->getCatalogo('anfitrion');
      $this->view->anfitriones=$anfitriones;*/

      $usuarios = $this->model->DetalleVisitante($id_persona);
      $this->view->usuarios=$usuarios;
   
     
      $this->view->render('visitante/visita');
    }



    function BuscarUsuario(){
      $cedula=$_POST['ci'];
      $data = $this->model->Buscar($cedula);
      echo json_encode($data,JSON_UNESCAPED_UNICODE);
    }

    function Save_photo(){//Se registra un usuario con foto
  
    //Datos genrales
    $id_persona = $_POST["id_persona"];

    $cedula = $_POST["cedula"];
    $nombres = $_POST["nombres"];
    $apellidos = $_POST["apellidos"];
    $genero = $_POST["genero"];
    $telefono = $_POST["telefono"];
    $correo = $_POST["correo"];
    $departamento = $_POST["departamento"];
    $perfil = $_POST["perfil"];

    //DATOS DE LA VISITAS
    $anfitrion = $_POST["anfitrion"];
    $motivo = $_POST["motivo"];
    $procedencia = $_POST["procedencia"];
    $paquete = $_POST["paquete"];
    $observacion = $_POST["observacion"];
      
    //Datos para Tomar una foto 
    //list($nacionalidad, $nro_cedula) = explode("-", $cedula);
    $foto = base64_decode($_POST["foto"]);
    $route_photo = "src/fotos/".$cedula.".jpg";
    $name_photo = $cedula.".jpg";
    $file = fopen($route_photo, "w");

  
            //Consultar pases disponibles
            if($data=$this->model->existePases()){
              $mensaje="<div class='alert alert-danger alert-dismissable'>
              <button aria-hidden='true' data-dismiss='alert' class='close' type='button'>×</button>
              el codigo  <b>" . $data . "</b> <a class='alert-link' href='#'> Usuario registrado </a>
              </div>";
              header('Content-type: application/json; charset=utf-8');
              echo json_encode($data,JSON_UNESCAPED_UNICODE);
              exit();
            }
              //consultar si la persona tiene pase asignado
                if($data=$this->model->existePaseAsignado($cedula)){
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
        'perfil'=>$perfil,'route_photo'=>$route_photo,'name_photo'=>$name_photo,'anfitrion'=>$anfitrion,'motivo'=>$motivo,'procedencia'=>$procedencia,
        'paquete'=>$paquete,'observacion'=>$observacion,'id_persona'=>$id_persona])){

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
      $id_persona = $_POST["id_persona"];

      $cedula = $_POST["cedula"];
      $nombres = $_POST["nombres"];
      $apellidos = $_POST["apellidos"];
      $genero = $_POST["genero"];
      $telefono = $_POST["telefono"];
      $correo = $_POST["correo"];
      $departamento = $_POST["departamento"];
      $perfil = $_POST["perfil"];
        

       //DATOS DE LA VISITAS
       $anfitrion = $_POST["anfitrion"];
       $motivo = $_POST["motivo"];
       $procedencia = $_POST["procedencia"];
       $paquete = $_POST["paquete"];
       $observacion = $_POST["observacion"];

      //Datos para Guaardar una foto 
      $archivo = $_FILES["archivo"]["name"];
      $route_temp=$_FILES["archivo"]["tmp_name"];

      $fileName = basename($archivo);
      $targetFilePath = 'src/fotos/'.$fileName;
      $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
      $allowTypes = array('jpg', 'png', 'jpeg');

     // list($nacionalidad, $nro_cedula) = explode("-", $cedula);
    
           //Consultar pases disponibles
           if($data=$this->model->existePases()){
            $mensaje="<div class='alert alert-danger alert-dismissable'>
            <button aria-hidden='true' data-dismiss='alert' class='close' type='button'>×</button>
            el codigo  <b>" . $data . "</b> <a class='alert-link' href='#'> Usuario registrado </a>
            </div>";
            header('Content-type: application/json; charset=utf-8');
            echo json_encode($data,JSON_UNESCAPED_UNICODE);
            exit();
          }
            //consultar si la persona tiene pase asignado
              if($data=$this->model->existePaseAsignado($cedula)){
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
          'fileType'=>$fileType,'allowTypes'=>$allowTypes,'anfitrion'=>$anfitrion,'motivo'=>$motivo,'procedencia'=>$procedencia,
          'paquete'=>$paquete,'observacion'=>$observacion,'id_persona'=>$id_persona])){
  
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
  
        //Datos genrales anfitrion motivo procedencia paquete observacion
        $id_persona = $_POST["id_persona"];

        $cedula = $_POST["cedula"];
        
        $nombres = $_POST["nombres"];
        $apellidos = $_POST["apellidos"];
        $genero = $_POST["genero"];
        $telefono = $_POST["telefono"];
        $correo = $_POST["correo"];
        $departamento = $_POST["departamento"];
        $perfil = $_POST["perfil"];
        //DATOS DE LA VISITAS
        $anfitrion = $_POST["anfitrion"];
        $motivo = $_POST["motivo"];
        $procedencia = $_POST["procedencia"];
        $paquete = $_POST["paquete"];
        $observacion = $_POST["observacion"];
          
        //Datos para Guaardar una foto 
        $foto_ubv = $_POST["foto_ubv"];
      
         // list($nacionalidad, $nro_cedula) = explode("-", $cedula);
    
          //Consultar pases disponibles
      if($data=$this->model->existePases()){
        $mensaje="<div class='alert alert-danger alert-dismissable'>
        <button aria-hidden='true' data-dismiss='alert' class='close' type='button'>×</button>
        el codigo  <b>" . $data . "</b> <a class='alert-link' href='#'> Usuario registrado </a>
        </div>";
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($data,JSON_UNESCAPED_UNICODE);
        exit();
      }
        //consultar si la persona tiene pase asignado
          if($data=$this->model->existePaseAsignado($cedula)){
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
            'perfil'=>$perfil,'anfitrion'=>$anfitrion,'motivo'=>$motivo,'procedencia'=>$procedencia,
            'paquete'=>$paquete,'observacion'=>$observacion,'id_persona'=>$id_persona])){
    
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
          $id_visitante = $_POST["id_visitante"];
          $id_persona = $_POST["id_persona"];
                      
          //DATOS DE LA VISITAS
          $anfitrion = $_POST["anfitrion"];
          $motivo = $_POST["motivo"];
          $procedencia = $_POST["procedencia"];
          $paquete = $_POST["paquete"];
          $observacion = $_POST["observacion"];

          $cedula = $_POST["cedula"];
          $nombres = $_POST["nombres"];
          $apellidos = $_POST["apellidos"];
          $genero = $_POST["genero"];
          $telefono = $_POST["telefono"];
          $correo = $_POST["correo"];
          $departamento = $_POST["departamento"];
          $perfil = $_POST["perfil"];
            
          //Datos para Tomar una foto 
       //   list($nacionalidad, $nro_cedula) = explode("-", $cedula);
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
              'perfil'=>$perfil,'route_photo'=>$route_photo,'name_photo'=>$name_photo,'anfitrion'=>$anfitrion,'motivo'=>$motivo,
              'procedencia'=>$procedencia,'paquete'=>$paquete,'observacion'=>$observacion,
              'id_persona'=>$id_persona,'id_visitante'=>$id_visitante])){
      
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
            $id_visitante = $_POST["id_visitante"];
            $id_persona = $_POST["id_persona"];
            
            
                    //DATOS DE LA VISITAS
            $anfitrion = $_POST["anfitrion"];
            $motivo = $_POST["motivo"];
            $procedencia = $_POST["procedencia"];
            $paquete = $_POST["paquete"];
            $observacion = $_POST["observacion"];
  
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
      
         //   list($nacionalidad, $nro_cedula) = explode("-", $cedula);
          
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
                'fileType'=>$fileType,'allowTypes'=>$allowTypes,'anfitrion'=>$anfitrion,'motivo'=>$motivo,
                'procedencia'=>$procedencia,'paquete'=>$paquete,'observacion'=>$observacion,
                'id_persona'=>$id_persona,'id_visitante'=>$id_visitante])){
        
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
              $id_visitante = $_POST["id_visitante"];
              $id_persona = $_POST["id_persona"];
              
              
                      //DATOS DE LA VISITAS
              $anfitrion = $_POST["anfitrion"];
              $motivo = $_POST["motivo"];
              $procedencia = $_POST["procedencia"];
              $paquete = $_POST["paquete"];
              $observacion = $_POST["observacion"];

              $cedula = $_POST["cedula"];
              $nombres = $_POST["nombres"];
              $apellidos = $_POST["apellidos"];
              $genero = $_POST["genero"];
              $telefono = $_POST["telefono"];
              $correo = $_POST["correo"];
              $departamento = $_POST["departamento"];
                
              //Datos para Guaardar una foto 
              $foto_ubv = $_POST["foto_ubv"];
            
               // list($nacionalidad, $nro_cedula) = explode("-", $cedula);
          
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
                  'genero'=>$genero,'telefono'=>$telefono,'correo'=>$correo,'departamento'=>$departamento,'anfitrion'=>$anfitrion,'motivo'=>$motivo,
                  'procedencia'=>$procedencia,'paquete'=>$paquete,'observacion'=>$observacion,
                  'id_persona'=>$id_persona,'id_visitante'=>$id_visitante])){
          
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