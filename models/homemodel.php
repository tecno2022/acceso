<?php
include_once 'models/cvubv.php';
class HomeModel extends Model{
    public function __construct(){
    parent::__construct();
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
    motivo,pase.descripcion AS pase,visitante.id_visitante,visitante_detalle.estatus AS estatus_visitante
      FROM persona,visitante,pase,persona_tipo,visitante_detalle
     WHERE persona.id_persona_tipo=persona_tipo.id_persona_tipo 
     AND persona.id_persona=visitante.id_persona 
     AND visitante.id_pase=pase.id_pase 
     AND visitante.id_visitante=visitante_detalle.id_visitante  AND  CURRENT_DATE = date(fecha)");
    

  
    
    while($row=$query->fetch()){
    $item=new Cvubv();
 
    $item->id_visitante=$row['id_visitante'];
   
    $item->estatus_visitante=$row['estatus_visitante'];
    

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