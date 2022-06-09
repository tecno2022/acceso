<?php
require 'models/cvubv.php';
    class Main extends Controller {
        function __construct(){
            parent::__construct();

            //echo "<p>Nuevo Controller</p>";
        }

        function render(){
            session_start();
            if(isset($_SESSION['id_usuario'])){
                header("Location:".constant('URL')."home");
                exit();
            }
            $this->view->render('main/index');
        }

        function iniciar(){
            
            session_start();
            $captcha = $_POST['captcha'];
            $usuario=$_POST["usuario"];
            $contrasena=$_POST["contrasena"];
            $mensaje="";


            $check = false;
        
            if (isset($_SESSION['captcha'])) {
                // Case sensitive Matching
                if ($captcha == $_SESSION['captcha']) {
                    $check = true;
                   // var_dump('paso');
                }else if($check==false){
                    //var_dump('no paso');
    
                    $mensaje="<div class='alert alert-danger alert-dismissable'>
                    <button aria-hidden='true' data-dismiss='alert' class='close' type='button'>×</button>
                    Error en validación de Captcha.
                    </div>";
    
                //Recuperamos los datos ingresados  por el cedper en caso de responder equivocarse con el captcha
                    $login = new Cvubv();
                    $login->usuario=$usuario;
                    $login->contrasena=$contrasena;
                    $this->view->login=$login;
                 
                    $this->view->mensaje=$mensaje;
                    $this->render();
                    exit();
                }
                unset($_SESSION['captcha']);
            }

            try{
                if($this->model->getLogin(['usuario'=> $usuario, 'contrasena' => $contrasena])){
                

                  $visitanteshoy=$this->model->getTotalVisitanteshoy();
                  $this->view->visitanteshoy=$visitanteshoy;

                  $visitantes=$this->model->getTotalVisitantes();
                  $this->view->visitantes=$visitantes;
              
                  $estadistica=$this->model->getEstadistica();
                  $this->view->estadistica=$estadistica;

                  $this->view->mensaje=$mensaje;
                  $this->view->render('home/index');
            
                 } else{
                  //  $mensaje="<large style='color: red;'>Cédula o contraseña inválida **</large>";
                  $mensaje="<div class='alert alert-danger alert-dismissable'>
                  <button aria-hidden='true' data-dismiss='alert' class='close' type='button'>×</button>
                  Usuario o Contraseña Incorrecto.<br>
                  </div>";
                  $this->view->mensaje=$mensaje;
                //$this->render();
                  $this->view->render('main/index');
    
                }
    
          
            } catch(PDOException $e){
                return null;
            }
            
    
        }



        function logout(){
            // Inicializar la sesión.
            // Si está usando session_name("algo"), ¡no lo olvide ahora!
            session_start();

            // Destruir todas las variables de sesión.
            $_SESSION = array(
                        
                $_SESSION['id_usuario'],
                $_SESSION['usuario'],
                $_SESSION['nombres'],
                $_SESSION['apellidos'],
                $_SESSION['departamento'],
                $_SESSION['correo'],
                $_SESSION['id_usuario_perfil'],
                $_SESSION['perfil'],
                $_SESSION['documento'],
                $_SESSION['bienvenido'],
                $_SESSION['id_persona'],

                            );
            //var_dump($_SESSION);
            // Si se desea destruir la sesión completamente, borre también la cookie de sesión.
            // Nota: ¡Esto destruirá la sesión, y no la información de la sesión!
            if (ini_get("session.use_cookies")) {
                $params = session_get_cookie_params();
                setcookie(session_name(), '', time() - 42000,
                    $params["path"], $params["domain"],
                    $params["secure"], $params["httponly"]
                );
            }

            // Finalmente, destruir la sesión.
            session_destroy();
            session_unset();
            echo '<script>
            alert("Hasta pronto");
            </script>';
            header("location: ".constant('URL')."main");

        }
    }

?>