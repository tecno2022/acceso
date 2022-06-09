<?php
     include_once 'models/cvubv.php';
     include_once 'SED.php';
    class Adminmodel extends Model{
        public function __construct(){
            parent::__construct();
        }
        
       public function existe($pase){
			try{
		
				//var_dump($cedula);
				$sql = $this->db->connect()->prepare("SELECT descripcion FROM pase WHERE descripcion=:descripcion");
				$sql->execute(['descripcion' =>$pase]);
				$nombre=$sql->fetch();
				
				if($pase==$nombre['descripcion']){
					return $nombre['descripcion'];
				} 
				return false;
			} catch(PDOException $e){
				return false;
			}
        }

        public function existeAnf($anfi){
          try{
        
            //var_dump($cedula);
            $sql = $this->db->connect()->prepare("SELECT descripcion FROM anfitrion WHERE descripcion=:descripcion");
            $sql->execute(['descripcion' =>$anfi]);
            $nombre=$sql->fetch();
            
            if($anfi==$nombre['descripcion']){
              return $nombre['descripcion'];
            } 
            return false;
          } catch(PDOException $e){
            return false;
          }
            }
    

            public function existeDepart($depart){
              try{
            
                //var_dump($cedula);
                $sql = $this->db->connect()->prepare("SELECT descripcion FROM departamento WHERE descripcion=:descripcion");
                $sql->execute(['descripcion' =>$depart]);
                $nombre=$sql->fetch();
                
                if($depart==$nombre['descripcion']){
                  return $nombre['descripcion'];
                } 
                return false;
              } catch(PDOException $e){
                return false;
              }
                }

      

        
        public function getDepartamentos(){
            $items=[];
           try{
          $query=$this->db->connect()->query("SELECT * FROM departamento");
          
          while($row=$query->fetch()){
          $item=new Cvubv();
          $item->id_departamento=$row['id_departamento'];
          $item->ofic=$row['ofic'];
          $item->descripcion=$row['descripcion'];
          
          array_push($items,$item);
          
          }
          return $items;
          
          }catch(PDOException $e){
          return[];
          }
          
          }

          public function getPases(){
            $items=[];
           try{
          $query=$this->db->connect()->query("SELECT * FROM pase");
          
          while($row=$query->fetch()){
          $item=new Cvubv();
          $item->id_pase=$row['id_pase'];
          $item->descripcion=$row['descripcion'];
          $item->fecha_registro=$row['fecha_registro'];
          $item->estatus=$row['estatus'];
          
          array_push($items,$item);
          
          }
          return $items;
          
          }catch(PDOException $e){
          return[];
          }
          
          }

          public function getAnf(){
            $items=[];
           try{
          $query=$this->db->connect()->query("SELECT * FROM anfitrion");
          
          while($row=$query->fetch()){
          $item=new Cvubv();
          $item->id_anfitrion=$row['id_anfitrion'];
          $item->descripcion=$row['descripcion'];

          
          array_push($items,$item);
          
          }
          return $items;
          
          }catch(PDOException $e){
          return[];
          }
          
          }

          public function DetallePase($id_pase){
            $item=new Cvubv();
           try{
          $query=$this->db->connect()->prepare("SELECT *FROM pase WHERE id_pase=:id_pase");
          $query->execute(['id_pase' =>$id_pase]);
  
          while($row=$query->fetch()){
        
          $item->id_pase=$row['id_pase'];
          $item->descripcion=$row['descripcion'];
          $item->fecha_registro=$row['fecha_registro'];
          
          }
          return $item;
          
          }catch(PDOException $e){
          return null;
          }
          
          }

          public function DetalleDepart($id_departamento){
            $item=new Cvubv();
           try{
          $query=$this->db->connect()->prepare("SELECT *FROM departamento WHERE id_departamento=:id_departamento");
          $query->execute(['id_departamento' =>$id_departamento]);
  
          while($row=$query->fetch()){
        
          $item->id_departamento=$row['id_departamento'];
          $item->ofic=$row['ofic'];
          $item->descripcion=$row['descripcion'];
          
          }
          return $item;
          
          }catch(PDOException $e){
          return null;
          }
          
          }

          public function DetalleAnf($id_anfitrion){
            $item=new Cvubv();
           try{
          $query=$this->db->connect()->prepare("SELECT *FROM anfitrion WHERE id_anfitrion=:id_anfitrion");
          $query->execute(['id_anfitrion' =>$id_anfitrion]);
  
          while($row=$query->fetch()){
        
          $item->id_anfitrion=$row['id_anfitrion'];
          $item->descripcion=$row['descripcion'];
          
          }
          return $item;
          
          }catch(PDOException $e){
          return null;
          }
          
          }

        public function insert($datos){
     
            try{
                //1. guardas el objeto pdo en una variable
                $pdo=$this->db->connect();
                //2. comienzas transaccion
                $pdo->beginTransaction();
    
                 //3. hacer toas las consultas 
                
                    //Tabla pase
                 $query=$pdo->prepare('INSERT INTO pase(
                       descripcion, fecha_registro,estatus)
                      VALUES (:descripcion, :fecha_registro,:estatus);');
              
                $query->execute(['descripcion'=>$datos['pase'],
                'fecha_registro'=>date('Y-m-d'),'estatus'=>0]);
                //0 Pases sin asignar 1 pase asignado
    
                // header('Content-type: application/json; charset=utf-8');
           
                  //4. consignas la transaccion (en caso de que no suceda ningun fallo)
                  $pdo->commit(); 
    
                    return true;
           
            }catch(PDOException $e){
              	//5. regresas a un estado anterior en caso de error
			            	$pdo->rollBack();
                   return false;
                     }
                
                    }
                    public function edit($datos){
     
                        try{
                            //1. guardas el objeto pdo en una variable
                            $pdo=$this->db->connect();
                            //2. comienzas transaccion
                            $pdo->beginTransaction();
                
                             //3. hacer toas las consultas 
                            
                                //Tabla pase
                             $query=$pdo->prepare('UPDATE pase SET  descripcion=:descripcion
                                    WHERE id_pase=:id_pase;');
                          
                            $query->execute(['descripcion'=>$datos['pase'],
                            'id_pase'=>$datos['id_pase']]);
                            
                
                            // header('Content-type: application/json; charset=utf-8');
                       
                              //4. consignas la transaccion (en caso de que no suceda ningun fallo)
                              $pdo->commit(); 
                
                                return true;
                       
                        }catch(PDOException $e){
                          	//5. regresas a un estado anterior en caso de error
				                      $pdo->rollBack();
                               return false;
                                 }
                            
                                }
                                public function insertDepart($datos){
     
                                    try{
                                        //1. guardas el objeto pdo en una variable
                                        $pdo=$this->db->connect();
                                        //2. comienzas transaccion
                                        $pdo->beginTransaction();
                            
                                         //3. hacer toas las consultas 
                                        
                                            //Tabla pase
                                         $query=$pdo->prepare('INSERT INTO departamento(
                                               ofic,descripcion)
                                              VALUES (:ofic,:descripcion);');
                                      
                                        $query->execute(['ofic'=>$datos['oficina'],'descripcion'=>$datos['nombre']]);
                            
                                        // header('Content-type: application/json; charset=utf-8');
                                   
                                          //4. consignas la transaccion (en caso de que no suceda ningun fallo)
                                          $pdo->commit(); 
                            
                                            return true;
                                   
                                    }catch(PDOException $e){
                                      	//5. regresas a un estado anterior en caso de error
				                                $pdo->rollBack();
                                           return false;
                                             }
                                        
                                            }
                                            public function editDepart($datos){
                             
                                                try{
                                                    //1. guardas el objeto pdo en una variable
                                                    $pdo=$this->db->connect();
                                                    //2. comienzas transaccion
                                                    $pdo->beginTransaction();
                                        
                                                     //3. hacer toas las consultas 
                                                    
                                                        //Tabla pase
                                                     $query=$pdo->prepare('UPDATE departamento SET  ofic=:ofic,descripcion=:descripcion
                                                            WHERE id_departamento=:id_departamento;');
                                                  
                                                    $query->execute(['ofic'=>$datos['oficina'],'descripcion'=>$datos['nombre'],
                                                    'id_departamento'=>$datos['id_departamento']]);
                                                    
                                        
                                                    // header('Content-type: application/json; charset=utf-8');
                                               
                                                      //4. consignas la transaccion (en caso de que no suceda ningun fallo)
                                                      $pdo->commit(); 
                                        
                                                        return true;
                                               
                                                }catch(PDOException $e){
                                                  	//5. regresas a un estado anterior en caso de error
				                                            $pdo->rollBack();
                                                       return false;
                                                         }
                                                    
                                                        }

                                                        public function insertAnf($datos){
     
                                                          try{
                                                              //1. guardas el objeto pdo en una variable
                                                              $pdo=$this->db->connect();
                                                              //2. comienzas transaccion
                                                              $pdo->beginTransaction();
                                                  
                                                               //3. hacer toas las consultas 
                                                              
                                                                  //Tabla pase
                                                               $query=$pdo->prepare('INSERT INTO anfitrion(
                                                                     descripcion)
                                                                    VALUES (:descripcion);');
                                                            
                                                              $query->execute(['descripcion'=>$datos['anfitrion']]);
                                                              
                                                  
                                                              // header('Content-type: application/json; charset=utf-8');
                                                         
                                                                //4. consignas la transaccion (en caso de que no suceda ningun fallo)
                                                                $pdo->commit(); 
                                                  
                                                                  return true;
                                                         
                                                          }catch(PDOException $e){
                                                            	//5. regresas a un estado anterior en caso de error
				                                                        $pdo->rollBack();
                                                                 return false;
                                                                   }
                                                              
                                                                  }

                                                                  public function editAnf($datos){
                             
                                                                    try{
                                                                        //1. guardas el objeto pdo en una variable
                                                                        $pdo=$this->db->connect();
                                                                        //2. comienzas transaccion
                                                                        $pdo->beginTransaction();
                                                            
                                                                         //3. hacer toas las consultas 
                                                                        
                                                                            //Tabla pase
                                                                         $query=$pdo->prepare('UPDATE anfitrion SET  descripcion=:descripcion
                                                                                WHERE id_anfitrion=:id_anfitrion;');
                                                                      
                                                                        $query->execute(['descripcion'=>$datos['anfitrion'],
                                                                        'id_anfitrion'=>$datos['id_anfitrion']]);
                                                                        
                                                            
                                                                        // header('Content-type: application/json; charset=utf-8');
                                                                   
                                                                          //4. consignas la transaccion (en caso de que no suceda ningun fallo)
                                                                          $pdo->commit(); 
                                                            
                                                                            return true;
                                                                   
                                                                    }catch(PDOException $e){
                                                                      	//5. regresas a un estado anterior en caso de error
				                                                                  $pdo->rollBack();
                                                                           return false;
                                                                             }
                                                                        
                                                                            }



    }
        
    

?>