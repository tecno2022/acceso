<?php
     include_once 'models/cvubv.php';
     include_once 'SED.php';
    class MainModel extends Model{
        public function __construct(){
            parent::__construct();
        }
        
      

        public function getLogin($datos){
            //var_dump($datos);
        //    exit();
            try{ 
                $crypt= new SED();
                $contrasena=$crypt->encryption($datos['contrasena']);


                    

                $query=$this->db->connect()->prepare("SELECT usuario.id_persona,usuario.id_usuario,usuario,password,estatus,cedula,nombres,apellidos,correo,
                departamento.descripcion AS departamento, persona.id_persona,usuario_perfil.id_usuario_perfil,usuario_perfil.descripcion AS perfil,documento
                FROM usuario,usuario_perfil,persona,departamento 
                WHERE usuario.id_usuario_perfil=usuario_perfil.id_usuario_perfil
                AND usuario.id_persona=persona.id_persona
                AND usuario.id_departamento=departamento.id_departamento
                AND  (usuario=:usuario OR correo=:usuario) AND password=:password");
                $query->execute(['usuario'=> $datos['usuario'], 'password' =>$contrasena]);
                
                $var=$query->fetch();
                if(($var['correo']==$datos['usuario'] || $var['usuario']==$datos['usuario'] ) && $var['password'] == $contrasena && $var['estatus'] == 1 ){
                   
                    //variables de sesion
                    //session_start();
                    $_SESSION['id_usuario']=$var['id_usuario'];
                    $_SESSION['id_persona']=$var['id_persona'];
                    $_SESSION['usuario']=$var['usuario'];
                    $_SESSION['nombres']=$var['nombres'];
                    $_SESSION['apellidos']=$var['apellidos'];
                    $_SESSION['departamento']=$var['departamento'];
             
                    $_SESSION['correo']=$var['correo'];
                    
                    $_SESSION['id_perfil']=$var['id_perfil'];
                    $_SESSION['documento']=$var['documento'];

                    $_SESSION['id_usuario_perfil']=$var['id_usuario_perfil'];
                    $_SESSION['perfil']=$var['perfil'];
                    $_SESSION['bienvenido']=1;
                  
                  

                    return true;
                }

            } catch(PDOException $e){
                return false;
            }


        }



      
    public function getEstadistica(){
        $item=new Cvubv();
    try{
    $query=$this->db->connect()->query("SELECT * FROM estadisticas()");

    while($row=$query->fetch()){
   
    $item->pases=$row['pases'];
    $item->usuarios=$row['usuarios'];
    $item->visitantes=$row['visitantes'];
    $item->visitas=$row['visitas'];
   

    }
    return $item;

    }catch(PDOException $e){
        return false;
    }

    }



    public function getTotalVisitanteshoy(){
        $items=[];
       try{
      $query=$this->db->connect()->query("SELECT DISTINCT persona.id_persona,nacionalidad,cedula,
      nombres,apellidos,telefono,persona_tipo.descripcion AS persona_tipo, 
      motivo,pase.descripcion AS pase,visitante.id_visitante
        FROM persona,visitante,pase,persona_tipo,visitante_detalle
       WHERE persona.id_persona_tipo=persona_tipo.id_persona_tipo 
       AND persona.id_persona=visitante.id_persona 
       AND visitante.id_pase=pase.id_pase 
       AND visitante.id_visitante=visitante_detalle.id_visitante  AND  CURRENT_DATE = date(fecha)");
      
  
    
      
      while($row=$query->fetch()){
      $item=new Cvubv();
   
      $item->id_visitante=$row['id_visitante'];
  
      $item->fecha_ingreso=$this->Obtener_fecha(1,$row['id_visitante']); //ENTRADA
  
      $item->fecha_salida=$this->Obtener_fecha(0,$row['id_visitante']); //SALIDA
      
      array_push($items,$item);
      
      }
      return $items;
      
      }catch(PDOException $e){
      return[];
      }
      
      }
  

    public function getTotalVisitantes(){
        $items=[];
       try{
      $query=$this->db->connect()->query("SELECT DISTINCT visitante.id_visitante
        FROM persona,visitante,pase,persona_tipo,visitante_detalle
       WHERE persona.id_persona_tipo=persona_tipo.id_persona_tipo 
       AND persona.id_persona=visitante.id_persona 
       AND visitante.id_pase=pase.id_pase 
       AND visitante.id_visitante=visitante_detalle.id_visitante ");
      
      while($row=$query->fetch()){
      $item=new Cvubv();
     
      $item->id_visitante=$row['id_visitante'];

      $item->fecha_ingreso=$this->Obtener_fecha(1,$row['id_visitante']); //ENTRADA

      $item->fecha_salida=$this->Obtener_fecha(0,$row['id_visitante']); //SALIDA


      
      
      array_push($items,$item);
      
      }
      return $items;
      
      }catch(PDOException $e){
      return[];
      }
      
      }

      public function Obtener_fecha($estatus,$id_visitante){//Valida entradas o salidas
        try{
          
          $query =$this->db->connect()->prepare("SELECT fecha FROM visitante_detalle WHERE estatus=:estatus AND id_visitante=:id_visitante ");
          $query->execute(['estatus'=>$estatus,'id_visitante'=>$id_visitante]);
          $visita = $query->fetch();

          return  $visita['fecha'];
        } catch(PDOException $e){
          return null;
        }
      }


    }
        
    

?>