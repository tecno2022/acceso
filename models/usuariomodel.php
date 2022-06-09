<?php
include_once 'models/cvubv.php';
include_once 'SED.php';
class UsuarioModel extends Model{
    public function __construct(){
    parent::__construct();
    }


        public function existe($nro_cedula){
          try{
        
            $validator = array('registrer' => false, 'messages' => array());

            $sql = $this->db->connect()->prepare("SELECT cedula FROM persona WHERE cedula=:cedula");
            $sql->execute(['cedula' =>$nro_cedula]);
            $nombre=$sql->fetch();
            
            if($nro_cedula==$nombre['cedula']){
              $validator['registrer'] = true;
                return $validator;
        
            } 
            return false;
          } catch(PDOException $e){
            return false;
          }
        }



        public function Detalle($id_usuario){
          $item=new Cvubv();
         try{
        $query=$this->db->connect()->prepare("SELECT persona.id_persona,cedula,nombres,apellidos,
        telefono,nacionalidad,genero,documento,persona.id_persona_tipo,
        persona_tipo.descripcion AS persona_tipo,correo, usuario.id_usuario,usuario,password,
        fecha_registro,usuario.estatus,departamento.id_departamento,
        departamento.descripcion AS departamento,
        usuario_perfil.id_usuario_perfil,usuario_perfil.descripcion AS usaurio_perfil
        FROM persona,persona_tipo,usuario,usuario_perfil,departamento 
        WHERE persona.id_persona_tipo=persona_tipo.id_persona_tipo 
        AND usuario.id_persona=persona.id_persona
        AND usuario.id_usuario_perfil=usuario_perfil.id_usuario_perfil
        AND usuario.id_departamento=departamento.id_departamento
        AND usuario.id_usuario=:id_usuario");
        $query->execute(['id_usuario' =>$id_usuario]);

        while($row=$query->fetch()){
      
        $item->id_persona=$row['id_persona'];
        $item->cedula=$row['cedula'];
        $item->nombres=$row['nombres'];
        $item->apellidos=$row['apellidos'];
        $item->telefono=$row['telefono'];
        $item->nacionalidad=$row['nacionalidad'];
        $item->genero=$row['genero'];
        $item->documento=$row['documento'];
        $item->id_persona_tipo=$row['id_persona_tipo'];
        $item->persona_tipo=$row['persona_tipo'];
        $item->correo=$row['correo'];

        $item->id_usuario=$row['id_usuario'];
        $item->usuario=$row['usuario'];
        $item->password=$row['password'];
        $item->fecha_registro=$row['fecha_registro'];
        $item->estatus=$row['estatus'];
        $item->id_departamento=$row['id_departamento'];

        $item->departamento=$row['departamento'];
        $item->id_usuario_perfil=$row['id_usuario_perfil'];
        $item->usaurio_perfil=$row['usaurio_perfil'];

      
        
        }
        return $item;
        
        }catch(PDOException $e){
        return null;
        }
        
        }

         public function Buscar($cedula){
        //   $item=new Dtodito();
           try{
           
            //list($nacionalidad, $nro_cedula) = explode("-", $cedula);

             $query=$this->db->connect()->prepare("SELECT cedper AS cedula, nomper AS nombres, apeper AS apellidos,telmovper AS telefono, sexper AS genero,
             nacper AS nacionalidad, coreleper AS correo, carantper AS cargo
              FROM sno_personal WHERE cedper=:cedula");
             $query->execute(['cedula'=>$cedula]);
             $row=$query->fetch();
             if(!empty($row)){
               $data=$row;
             }else{
               $data=0;
             }
             return $data;
           }catch(PDOException $e){
             return null;
           }
           
         }

         public function getCatalogo($valor){
            $items=[];
           try{
          $query=$this->db->connect()->query("SELECT * FROM ".$valor."");
          
          while($row=$query->fetch()){
          $item=new Cvubv();
          $item->id=$row['id_'.$valor.''];
          $item->descripcion=$row['descripcion'];
          
          array_push($items,$item);
          
          }
          return $items;
          
          }catch(PDOException $e){
          return[];
          }
          
          }

        



      public function insert($datos){
     
        try{

            //1. guardas el objeto pdo en una variable
            $pdo=$this->db->connect();
            //2. comienzas transaccion
            $pdo->beginTransaction();

             //3. hacer toas las consultas 

            //SEPARAMOS CEDULA DE NACIONALIDAD
            // list($nacionalidad, $nro_cedula) = explode("-", $datos['cedula']);
             $nro_cedula=$datos['cedula'];
             $validator = array('success' => false, 'messages' => array());

           
             if(!empty($datos['file'])){  //Guardar foto carturada
                $fotos = fwrite($datos['file'], $datos['foto']);
                fclose($datos['file']);
                
                //Tabla persona
             $query=$pdo->prepare('INSERT INTO persona(
                 cedula, nombres, apellidos, telefono, nacionalidad, 
                genero, documento, id_persona_tipo, correo)
                  VALUES (:cedula, :nombres, :apellidos, :telefono, :nacionalidad, :genero, 
                :documento, :id_persona_tipo, :correo);');
          
            $query->execute(['cedula'=>$nro_cedula,'nombres'=>$datos['nombres'],
            'apellidos'=>$datos['apellidos'],'telefono'=>$datos['telefono'],
            'nacionalidad'=>$nacionalidad,'genero'=>$datos['genero'],
            'documento'=>$datos['route_photo'],'id_persona_tipo'=>1,
            'correo'=>$datos['correo']]);
            

            //Toma el id de persona
            $query = $pdo->prepare("SELECT id_persona FROM persona ORDER BY id_persona DESC LIMIT 1");
            $query ->execute();
            $persona = $query->fetch();
            $persona['id_persona'];

              //Tabla usuario
            $query=$pdo->prepare('INSERT INTO usuario(
                usuario, password, fecha_registro, estatus, id_departamento, 
                id_persona, id_usuario_perfil) VALUES (:usuario, :password, :fecha_registro, :estatus, :id_departamento, :id_persona, 
                :id_usuario_perfil);');
           
            $crypt= new SED();
            $query->execute(['usuario'=>'ubv'.$nro_cedula,'password'=>$crypt->encryption($nro_cedula),
            'fecha_registro'=>date('Y/m/d'),'estatus'=>1,
            'id_departamento'=>$datos['departamento'],'id_persona'=>$persona['id_persona'],
            'id_usuario_perfil'=>$datos['perfil']]);
            

             }else if(!empty($datos["archivo"])){ //Guardar foto tomada del sistema
              if (in_array($datos["fileType"], $datos["allowTypes"])) {

                list($url, $extension) = explode(".", $datos["targetFilePath"]);
              //SE RENOMBRA IMAGEN
                $url="src/fotos/".$nro_cedula.".".$extension;

                if(copy($datos["route_temp"], $url)){
                  $uploadedFile = $datos["fileName"];

                //Tabla persona
                $query=$pdo->prepare('INSERT INTO persona(
                  cedula, nombres, apellidos, telefono, nacionalidad, 
                genero, documento, id_persona_tipo, correo)
                  VALUES (:cedula, :nombres, :apellidos, :telefono, :nacionalidad, :genero, 
                :documento, :id_persona_tipo, :correo);');

                $query->execute(['cedula'=>$nro_cedula,'nombres'=>$datos['nombres'],
                'apellidos'=>$datos['apellidos'],'telefono'=>$datos['telefono'],
                'nacionalidad'=>$nacionalidad,'genero'=>$datos['genero'],
                'documento'=>$url,'id_persona_tipo'=>1,
                'correo'=>$datos['correo']]);
                

                //Toma el id de persona
                $query = $pdo->prepare("SELECT id_persona FROM persona ORDER BY id_persona DESC LIMIT 1");
                $query ->execute();
                $persona = $query->fetch();
                $persona['id_persona'];

                  //Tabla usuario
                $query=$pdo->prepare('INSERT INTO usuario(
                    usuario, password, fecha_registro, estatus, id_departamento, 
                    id_persona, id_usuario_perfil) VALUES (:usuario, :password, :fecha_registro, :estatus, :id_departamento, :id_persona, 
                    :id_usuario_perfil);');

                $crypt= new SED();
                $query->execute(['usuario'=>'ubv'.$nro_cedula,'password'=>$crypt->encryption($nro_cedula),
                'fecha_registro'=>date('Y/m/d'),'estatus'=>1,
                'id_departamento'=>$datos['departamento'],'id_persona'=>$persona['id_persona'],
                'id_usuario_perfil'=>$datos['perfil']]);
                
                }
              }
            }else{ //Guardar foto del sistema (UBV)
              //Tabla persona
              $query=$pdo->prepare('INSERT INTO persona(
                cedula, nombres, apellidos, telefono, nacionalidad, 
              genero, documento, id_persona_tipo, correo)
                VALUES (:cedula, :nombres, :apellidos, :telefono, :nacionalidad, :genero, 
              :documento, :id_persona_tipo, :correo);');

              $query->execute(['cedula'=>$nro_cedula,'nombres'=>$datos['nombres'],
              'apellidos'=>$datos['apellidos'],'telefono'=>$datos['telefono'],
              'nacionalidad'=>$nacionalidad,'genero'=>$datos['genero'],
              'documento'=>$datos['foto_ubv'],'id_persona_tipo'=>1,
              'correo'=>$datos['correo']]);
              

              //Toma el id de persona
              $query = $pdo->prepare("SELECT id_persona FROM persona ORDER BY id_persona DESC LIMIT 1");
              $query ->execute();
              $persona = $query->fetch();
              $persona['id_persona'];

                //Tabla usuario
              $query=$pdo->prepare('INSERT INTO usuario(
                  usuario, password, fecha_registro, estatus, id_departamento, 
                  id_persona, id_usuario_perfil) VALUES (:usuario, :password, :fecha_registro, :estatus, :id_departamento, :id_persona, 
                  :id_usuario_perfil);');

              $crypt= new SED();
              $query->execute(['usuario'=>'ubv'.$nro_cedula,'password'=>$crypt->encryption($nro_cedula),
              'fecha_registro'=>date('Y/m/d'),'estatus'=>1,
              'id_departamento'=>$datos['departamento'],'id_persona'=>$persona['id_persona'],
              'id_usuario_perfil'=>$datos['perfil']]);

            }              
            // header('Content-type: application/json; charset=utf-8');
              //4. consignas la transaccion (en caso de que no suceda ningun fallo)
              $pdo->commit(); 
              $validator['success'] = true;
              //header('Content-type: application/json; charset=utf-8');
              //echo json_encode($validator);

                return $validator;
       
        }catch(PDOException $e){
          	//5. regresas a un estado anterior en caso de error
				$pdo->rollBack();
          $validator['success'] = false;
          return $validator;
                 }
            
                }
    

                public function edit($datos){
     
                  try{
          
                      //1. guardas el objeto pdo en una variable
                      $pdo=$this->db->connect();
                      //2. comienzas transaccion
                      $pdo->beginTransaction();
          
                       //3. hacer toas las consultas 
          
                      //SEPARAMOS CEDULA DE NACIONALIDAD
                       //list($nacionalidad, $nro_cedula) = explode("-", $datos['cedula']);
                       $nro_cedula=$datos['cedula'];
                       $validator = array('success' => false, 'messages' => array());
          
                     
                       if(!empty($datos['file'])){  //Guardar foto carturada Save_photo
                          $fotos = fwrite($datos['file'], $datos['foto']);
                          fclose($datos['file']);
                          
                          //Tabla persona
                       $query=$pdo->prepare('UPDATE persona
                       SET  cedula=:cedula, nombres=:nombres, apellidos=:apellidos,
                        telefono=:telefono, nacionalidad=:nacionalidad, 
                           genero=:genero, documento=:documento, id_persona_tipo=:id_persona_tipo,
                            correo=:correo
                     WHERE id_persona=:id_persona');
                    
                      $query->execute(['cedula'=>$nro_cedula,'nombres'=>$datos['nombres'],
                      'apellidos'=>$datos['apellidos'],'telefono'=>$datos['telefono'],
                      'nacionalidad'=>$nacionalidad,'genero'=>$datos['genero'],
                      'documento'=>$datos['route_photo'],'id_persona_tipo'=>1,
                      'correo'=>$datos['correo'],'id_persona'=>$datos['id_persona']]);
                      
          
                        //Tabla usuario
                      $query=$pdo->prepare('UPDATE usuario
                      SET usuario=:usuario,estatus=:estatus,id_departamento=:id_departamento, id_usuario_perfil=:id_usuario_perfil
                    WHERE id_persona=:id_persona');
                     
                      $query->execute(['usuario'=>"ubv".$datos['cedula'],'estatus'=>$datos['estatus'],
                      'id_departamento'=>$datos['departamento'],
                      'id_usuario_perfil'=>$datos['perfil'],'id_persona'=>$datos['id_persona']]);


                        //Cambiar contraseña
                        if(!empty($datos['password'])){
                      $query=$pdo->prepare('UPDATE usuario
                      SET  password=:password WHERE id_persona=:id_persona');
                     
                      $crypt= new SED();
                      $query->execute(['password'=>$crypt->encryption($datos['password']),
                      'id_persona'=>$datos['id_persona']]);
                        }

                        //SI QUIEN ACTUALIZA ES EL USUARIO QQUE HA INICIADO SESION ACTUALIZAMOS SU  FOTO
                        if($datos['id_persona']==$_SESSION['id_persona']){
                          //session_start();
                          $_SESSION['documento']=$datos['route_photo'];
                        }
                      
          
                       }else if(!empty($datos["archivo"])){ //Guardar foto tomada del sistema
                        if (in_array($datos["fileType"], $datos["allowTypes"])) {
          
                          list($url, $extension) = explode(".", $datos["targetFilePath"]);
                        //SE RENOMBRA IMAGEN
                          $url="src/fotos/".$nro_cedula.".".$extension;
          
                          if(copy($datos["route_temp"], $url)){
                            $uploadedFile = $datos["fileName"];
          
                          //Tabla persona
                            //Tabla persona
                       $query=$pdo->prepare('UPDATE persona
                       SET  cedula=:cedula, nombres=:nombres, apellidos=:apellidos,
                        telefono=:telefono, nacionalidad=:nacionalidad, 
                           genero=:genero, documento=:documento, id_persona_tipo=:id_persona_tipo,
                            correo=:correo
                     WHERE id_persona=:id_persona');
                    
                      $query->execute(['cedula'=>$nro_cedula,'nombres'=>$datos['nombres'],
                      'apellidos'=>$datos['apellidos'],'telefono'=>$datos['telefono'],
                      'nacionalidad'=>$nacionalidad,'genero'=>$datos['genero'],
                      'documento'=>$url,'id_persona_tipo'=>1,
                      'correo'=>$datos['correo'],'id_persona'=>$datos['id_persona']]);
                      
          
                        //Tabla usuario
                      $query=$pdo->prepare('UPDATE usuario
                      SET usuario=:usuario,estatus=:estatus,id_departamento=:id_departamento, id_usuario_perfil=:id_usuario_perfil
                    WHERE id_persona=:id_persona');
                     
                      $query->execute(['usuario'=>"ubv".$datos['cedula'],'estatus'=>$datos['estatus'],
                      'id_departamento'=>$datos['departamento'],
                      'id_usuario_perfil'=>$datos['perfil'],'id_persona'=>$datos['id_persona']]);

                        //Cambiar contraseña
                        if(!empty($datos['password'])){
                      $query=$pdo->prepare('UPDATE usuario
                      SET  password=:password WHERE id_persona=:id_persona');
                     
                      $crypt= new SED();
                      $query->execute(['password'=>$crypt->encryption($datos['password']),
                      'id_persona'=>$datos['id_persona']]);
                        }


                         //SI QUIEN ACTUALIZA ES EL USUARIO QQUE HA INICIADO SESION ACTUALIZAMOS SU  FOTO
                         if($datos['id_persona']==$_SESSION['id_persona']){
                          //session_start();
                          $_SESSION['documento']=$url;
                        }
                          
                          }
                        }
                      }else{ //Guardar foto del sistema (UBV)
                        //Tabla persona
                         //Tabla persona
                         $query=$pdo->prepare('UPDATE persona
                         SET  cedula=:cedula, nombres=:nombres, apellidos=:apellidos,
                          telefono=:telefono, nacionalidad=:nacionalidad, 
                             genero=:genero, documento=:documento, id_persona_tipo=:id_persona_tipo,
                              correo=:correo
                       WHERE id_persona=:id_persona');
                      
                        $query->execute(['cedula'=>$nro_cedula,'nombres'=>$datos['nombres'],
                        'apellidos'=>$datos['apellidos'],'telefono'=>$datos['telefono'],
                        'nacionalidad'=>$nacionalidad,'genero'=>$datos['genero'],
                        'documento'=>$datos['foto_ubv'],'id_persona_tipo'=>1,
                        'correo'=>$datos['correo'],'id_persona'=>$datos['id_persona']]);
                        
            
                          //Tabla usuario
                        $query=$pdo->prepare('UPDATE usuario
                        SET usuario=:usuario,estatus=:estatus,id_departamento=:id_departamento, id_usuario_perfil=:id_usuario_perfil
                      WHERE id_persona=:id_persona');
                       
                        $query->execute(['usuario'=>"ubv".$datos['cedula'],'estatus'=>$datos['estatus'],
                        'id_departamento'=>$datos['departamento'],
                        'id_usuario_perfil'=>$datos['perfil'],'id_persona'=>$datos['id_persona']]);
  
                          //Cambiar contraseña
                          if(!empty($datos['password'])){
                        $query=$pdo->prepare('UPDATE usuario
                        SET  password=:password WHERE id_persona=:id_persona');
                       
                        $crypt= new SED();
                        $query->execute(['password'=>$crypt->encryption($datos['password']),
                        'id_persona'=>$datos['id_persona']]);
                          }
  
  
          
                      }              
                      // header('Content-type: application/json; charset=utf-8');
                        //4. consignas la transaccion (en caso de que no suceda ningun fallo)
                        $pdo->commit(); 
                        $validator['success'] = true;
                        //header('Content-type: application/json; charset=utf-8');
                        //echo json_encode($validator);
          
                          return $validator;
                 
                  }catch(PDOException $e){
                    	//5. regresas a un estado anterior en caso de error
				            $pdo->rollBack();
                    $validator['success'] = false;
                    return $validator;
                           }
                      
                          }


                public function getUsuarios($valor){
                  $items=[];
                 try{
                $query=$this->db->connect()->query("SELECT id_usuario,usuario.id_persona, usuario, fecha_registro,
                 estatus,nombres,apellidos,telefono,correo,usuario_perfil.descripcion AS perfil,
                  departamento.descripcion AS departamento
                  FROM usuario,usuario_perfil,departamento,persona WHERE
                  usuario.id_usuario_perfil = usuario_perfil.id_usuario_perfil
                  AND usuario.id_departamento=departamento.id_departamento
                  AND usuario.id_persona=persona.id_persona");
                
                while($row=$query->fetch()){
                $item=new Cvubv();
                $item->id_usuario=$row['id_usuario'];
                $item->id_persona=$row['id_persona'];
                $item->usuario=$row['usuario'];
                $item->fecha_registro=$row['fecha_registro'];
                $item->perfil=$row['perfil'];
                $item->departamento=$row['departamento'];
                $item->estatus=$row['estatus'];

                $item->nombres=$row['nombres'];   
                $item->apellidos=$row['apellidos'];
                $item->telefono=$row['telefono'];
                $item->correo=$row['correo'];
                
                
                array_push($items,$item);
                
                }
                return $items;
                
                }catch(PDOException $e){
                return[];
                }
                
                }
      
         

  
    }

    ?>