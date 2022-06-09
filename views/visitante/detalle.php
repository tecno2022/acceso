<!doctype html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<title>Visitantes | Sistema para el Control de Visitas UBV</title>
		<link rel="shortcut icon" href="<?php echo constant('URL');?>src/img/favicon.ico" type="image/x-icon">

		<meta name="keywords" content="HTML5 Admin Template" />
		<meta name="description" content="JSOFT Admin - Responsive HTML5 Template">
		<meta name="author" content="JSOFT.net">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
        <link href="<?php echo constant('URL');?>src/fonts/css.css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">
        
		<!-- Vendor CSS -->
		<link rel="stylesheet" href="<?php echo constant('URL');?>src/assets/vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="<?php echo constant('URL');?>src/assets/vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="<?php echo constant('URL');?>src/assets/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="<?php echo constant('URL');?>src/assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="<?php echo constant('URL');?>src/assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css" />
		<link rel="stylesheet" href="<?php echo constant('URL');?>src/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css" />
		<link rel="stylesheet" href="<?php echo constant('URL');?>src/assets/vendor/morris/morris.css" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="<?php echo constant('URL');?>src/assets/stylesheets/theme.css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="<?php echo constant('URL');?>src/assets/stylesheets/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="<?php echo constant('URL');?>src/assets/stylesheets/theme-custom.css">
		<!-- Select2-->
		<link rel="stylesheet" href="<?php echo constant('URL');?>src/assets/vendor/select2/select2.css" />

		<!-- Head Libs -->
		<script src="<?php echo constant('URL');?>src/assets/vendor/modernizr/modernizr.js"></script>

	</head>
	<body>
		<section class="body">

        <?php require 'views/header.php'; ?>

				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Visitantes</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="<?php echo constant('URL');?>home">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li>
								<a href="<?php echo constant('URL');?>visitante/Verificar#">
								<span>Visitantes</span>
								</a>
								</li>
								<li><span>Detalle</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open=""><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

			
					
					<style>


.none {
	display: none !important;
}
					</style>
	
            

<!-- start: page -->

<div class="row">
						<div class="col-md-4 col-lg-3">

							<section class="panel">
								<div class="panel-body">
									<div class="thumb-info mb-md">


										<?php if(empty($this->usuario->documento)){ ?>
											<img src="<?php echo constant ('URL') .'src/assets/images/!logged-user.jpg'; ?>" class="rounded img-responsive" alt="">
												
										<?php }else{?>
											<img src="<?php echo constant ('URL') .$this->usuario->documento; ?>" class="rounded img-responsive" alt="">
												
										<?php }?>

									
										<div class="thumb-info-title">

										<?php  list($pnombre, $snombre) = explode(" ", $this->usuario->nombres);
											   list($papellido, $sapellido) = explode(" ", $this->usuario->apellidos); ?>

											<span class="thumb-info-inner"><?php echo $pnombre." ".$papellido; ?></span>
											<span class="thumb-info-type"><?php echo $this->usuario->persona_tipo; ?></span>
										</div>
									</div>

									<div class="widget-toggle-expand mb-md">
										
								
									<h6 class="text-muted">
									<?php if(!empty($this->usuario->telefono) || !empty($this->usuario->correo)){
										echo "Contacto";
									}?>
									
									
									</h6>
										<div class="widget-content-expanded">
											<ul class="simple-todo-list">
												<?php if(!empty($this->usuario->telefono)){?>
												<li class="completed"><?php echo $this->usuario->telefono;  ?></li>
												<?php }?>

												<?php if(!empty($this->usuario->correo)){ ?>
												<li class="completed"><?php echo $this->usuario->correo;  ?></li>
												<?php }?>
											
											</ul>
										</div>
									</div>

									<hr class="dotted short">

									

								</div>
							</section>


						
						</div>
						<div class="col-md-8 col-lg-9">
						<div class="panel-actions">

						<?php if($this->vista=='1'){?>
							<a title="Volver" href="<?php echo constant ('URL') . "visitante/VerVisita/".$this->usuario->id_persona;?>"><button type="button" class="mb-xs mt-xs mr-xs btn btn-info"><i class="fa fa-arrow-left"></i> Volver</button></a>
						<?php }else{ ?>
					   <a title="Volver" href="<?php echo constant ('URL') . "visitante/Verificar";?>"><button type="button" class="mb-xs mt-xs mr-xs btn btn-info"><i class="fa fa-arrow-left"></i> Volver</button></a>
						<?php } ?>
						</div>
						<br>
							<div class="tabs">
								<ul class="nav nav-tabs tabs-primary">
									<li class="active">
										<a href="#overview" data-toggle="tab">Datos personales</a>
									</li>
									
									<li class="">
										<a href="#visita" data-toggle="tab">Datos de la visita</a>
									</li>

								<!--	<li class="">
										<a href="#edit" data-toggle="tab">Editar</a>
									</li>-->

									<!-- BOTON COMENTADO SIN EMBARGO LA SECCINO SE MANTIENE DEBIDO A QUE NADIE DE LOS NADIE PODRA EDITA UN VISITANTE 17/08/2021-->
								</ul>
								<div class="tab-content">
									<div id="overview" class="tab-pane active">
										<h4 class="mb-md">Datos Personales</h4>

									
										<div class="timeline timeline-simple mt-xlg mb-md">
											<div class="tm-body">
												
												<ol class="tm-items">
													<li>
														<div class="tm-box">

															<p class="text-muted mb-none">Cedula</p>
															<p>
															<?php echo $this->usuario->cedula; ?>
															</p>

															<!--<p class="text-muted mb-none">Nacionalidad</p>
															<p>
															<?php if($this->usuario->nacionalidad=="V"){ 
																echo "Venezolano";
																}else{
																echo "Extranjero";
																}
															?>
															</p> -->

															<p class="text-muted mb-none">Nombre</p>
															<p>
															<?php echo $this->usuario->nombres." ".$this->usuario->apellidos; ?>
															</p>

																										

															<p class="text-muted mb-none">Genero</p>
															<p>
															<?php if($this->usuario->genero=="F"){ 
																echo "Femenino";
																}else{
															    echo "Masculino";
																}
															?>
															</p>

															<!--<p class="text-muted mb-none">Departamento</p>
															<p>
															<?php echo $this->usuario->departamento; ?>
															</p>-->


														</div>
													</li>
													
													<li>
														<div class="tm-box">
															<p class="text-muted mb-none"></p>
															<p>
																Foto
															</p>


								

															<?php if(empty($this->usuario->documento)){ ?>
																<div class="thumbnail-gallery">
																<a class="img-thumbnail lightbox" href="<?php echo constant ('URL') .'src/assets/images/!logged-user.jpg'; ?>" data-plugin-options='{ "type":"image" }'>
																	<img class="img-responsive" width="215" src="<?php echo constant ('URL') .'src/assets/images/!logged-user.jpg'; ?>">
																	<span class="zoom">
																		<i class="fa fa-search"></i>
																	</span>
																</a>
															</div>
															<?php }else{?>
																<div class="thumbnail-gallery">
																<a class="img-thumbnail lightbox" href="<?php echo constant ('URL') .$this->usuario->documento; ?>" data-plugin-options='{ "type":"image" }'>
																	<img class="img-responsive" width="215" src="<?php echo constant ('URL') .$this->usuario->documento; ?>">
																	<span class="zoom">
																		<i class="fa fa-search"></i>
																	</span>
																</a>
															</div>
															<?php }?>





														</div>
													</li>
												</ol>
											</div>
										</div>
									</div>
									<div id="visita" class="tab-pane">
										<h4 class="mb-md">Datos de la Visita</h4>

									
										<div class="timeline timeline-simple mt-xlg mb-md">
											<div class="tm-body">
												
												<ol class="tm-items">
													<li>
														<div class="tm-box">

															<p class="text-muted mb-none">Departamento</p>
															<p>
															<?php echo $this->usuario->departamento; ?>
															</p>


														</div>
													</li>

													<li>
														<div class="tm-box">

														<p class="text-muted mb-none"></p>
														
														
															<p class="text-muted mb-none">Motivo</p>
															<p>
															<?php echo $this->usuario->motivo; ?>
															</p>

															<?php if(!empty($this->usuario->paquete)){?>
															<p class="text-muted mb-none">Paquete</p>
															<p>
															<?php echo $this->usuario->paquete; ?>
															</p>
															<?php }?>

															<?php if(!empty($this->usuario->procedencia)){?>
															<p class="text-muted mb-none">Procedencia</p>
															<p>
															<?php echo $this->usuario->procedencia; ?>
															</p>
															<?php }?>

															<p class="text-muted mb-none">Anfitrión</p>
															<p>
															<?php echo $this->usuario->anfitrion; ?>
															</p>




														</div>
													</li>
													
													<li>
														
														<div class="tm-box">
															<p class="text-muted mb-none"></p>
														
															<p class="text-muted mb-none">Cod. Pase</p>
															<p>
															<?php echo $this->usuario->pase; ?>
															</p>

														
															<p class="text-muted mb-none">Entrada / Recibido Por :</p>
															<p>
															<?php echo date("d/m/Y H:i", strtotime($this->usuario->fecha_ingreso)) ."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ". $this->usuario->recibido_ingreso; ?>
															</p>


															<p class="text-muted mb-none">Salida / Recibido Por :</p>

															<?php if(!empty($this->usuario->fecha_salida)){
																echo '<p>'.date("d/m/Y H:i", strtotime($this->usuario->fecha_salida))."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ". $this->usuario->recibido_salida.'<p>';
															}else{
																echo '<p>No disponible<p>';
															} ?>
															

															<?php if(!empty( $this->usuario->observacion)){ ?>
															<p class="text-muted mb-none">Observaciones</p>
															<p>
															<?php echo $this->usuario->observacion; ?>
															</p>
															<?php 	} ?>
														</div>

													</li>
												</ol>
											</div>
										</div>
									</div>
									<div id="edit" class="tab-pane ">

								<!--	 alerts	-->
								<div class="alert alert-success" style="display: none;" id='success'>
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<strong>Registro Editado Exitososamente!</strong> 
									</div>


									<div class="alert alert-danger" style="display:none ;" id='danger'>
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<strong>Ha ocurrido un error</strong> 
									</div>

									<div class="alert alert-info" >
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<strong>Los campos marcados con <span class="required">*</span> son requeridos, La subida máxima de archivos es en extensión .JPG  de  2MB 0 2000000 Kbs</strong> 
									</div>

							<!--	End alerts	-->
									
										<form class="form-horizontal" id="registro-form">
											<h4 class="mb-xlg">Información personal</h4>
											<fieldset>

											<div class="form-group">
												<label class="col-sm-3 control-label">Cedula  <span class="required">*</span></label>
												<div class="col-md-8">
													<input type="hidden"  id="id_visitante"  name="id_visitante" value="<?php echo $this->usuario->id_visitante; ?>"/>
													<input type="hidden"  id="id_persona"  name="id_persona" value="<?php echo $this->usuario->id_persona; ?>"/>
													<input type="hidden" id="foto_ubv" name="foto_ubv" value="<?php echo $this->usuario->documento; ?>">
													<input type="text"  id="cedula"  name="cedula" class="form-control required" placeholder="Escriba su número de cedula" onkeypress="return valSoloNumeros(event)" value="<?php echo $this->usuario->cedula; ?>"/>
												</div>
											</div>
											<div class="form-group">
											<label class="col-sm-3 control-label">Nombres <span class="required">*</span></label>
											<div class="col-md-8">
												<input type="text" id="nombres" name="nombres" class="form-control required" placeholder="Escriba sus nombres" maxlength='60' minlength="5"  onkeypress="return soloLetras(event)"  onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php echo $this->usuario->nombres; ?>" />
											</div>
										</div>


										<div class="form-group">
											<label class="col-sm-3 control-label">Apellidos <span class="required">*</span></label>
											<div class="col-md-8">
												<input type="text" id="apellidos" name="apellidos" class="form-control required" placeholder="Escriba sus apellidos" maxlength='60' minlength="5"  onkeypress="return soloLetras(event)" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php echo $this->usuario->apellidos; ?>"/>
											</div>
										</div>



										<div class="form-group">
												<label class="col-md-3 control-label" for="inputSuccess">Genero <span class="required">*</span></label>
												<div class="col-md-6">
													<label class="checkbox-inline">
														<input type="radio" id="inlineCheckbox1" id="genero" name="genero" class="required" value="F" <?php if($this->usuario->genero == "F") print "checked"?>> Femenino
													</label>
													<label class="checkbox-inline">
														<input type="radio" id="inlineCheckbox1" id="genero" name="genero" class="required" value="M" <?php if($this->usuario->genero == "M") print "checked"?>> Masculino
													</label>
													
												</div>
											</div>


										<div class="form-group">
											<label class="col-sm-3 control-label">Teléfono </label>
											<div class="col-md-8">
												<input type="text" id="telefono" name="telefono"  data-plugin-masked-input data-input-mask="(9999) 999-9999" class="form-control" placeholder="Escriba su numero de teléfono"  value="<?php echo $this->usuario->telefono; ?>"/>
											</div>
										</div>

										<div class="form-group">
											<label class="col-sm-3 control-label">Correo </label>
											<div class="col-md-8">
													<input type="email" id="correo" name="correo" class="form-control" placeholder="Escriba su correo electrónico" maxlength='100' minlength="5" onkeyup="javascript:this.value=this.value.toLowerCase();"  value="<?php echo $this->usuario->correo; ?>"/>
											</div>
										</div>	
									


									<!--	<div class="form-group">
											<label class="col-sm-3 control-label">Perfil <span class="required">*</span></label>
											<div class="col-md-8">
											<select class="form-control select2_demo_4 required" id="perfil" name="perfil" >
											<option value="">Seleccione...</option>
											<?php include_once 'models/cvubv.php';
															foreach($this->perfiles as $row){
															$pro=new Cvubv();
															$pro=$row;?> 
														<option value="<?php echo $pro->id;?>" <?php if($this->usuario->id_usuario_perfil==$pro->id) print "selected=selected"?>> <?php echo $pro->descripcion;?></option>
														<?php }?>      
											</select>  		
											</div>
										</div>


										<div class="form-group">
											<label class="col-sm-3 control-label">Estatus <span class="required">*</span></label>
											<div class="col-md-8">
											<select class="form-control select2_demo_4 required" id="estatus" name="estatus" >
											<option value="">Seleccione...</option>
											<option value="1" <?php if($this->usuario->estatus=="1") print "selected=selected"?> >Activo</option>
											<option value="0" <?php if($this->usuario->estatus=="0") print "selected=selected"?>>Inactivo</option>
											</select>  		
											</div>
										</div>-->

							

									

											<hr class="dotted tall">
											<h4 class="mb-xlg">Informacción de la visita</h4>




											<div class="form-group">
											<label class="col-sm-3 control-label">Departamento <span class="required">*</span></label>
											<div class="col-md-9">
											<select class="form-control select2_demo_3 required" id="departamento" name="departamento" >
											<option value="">Seleccione...</option>
											<?php include_once 'models/cvubv.php';
															foreach($this->departamentos as $row){
															$pro=new Cvubv();
															$pro=$row;?> 
														<option value="<?php echo $pro->id;?>" <?php if($this->usuario->id_departamento==$pro->id) print "selected=selected"?>  > <?php echo $pro->descripcion;?></option>
														<?php }?>      
											</select>  		
											</div>
										</div>

									

										<div class="form-group">
											<label class="col-sm-3 control-label">Anfitrión <span class="required">*</span></label>
											<div class="col-sm-9">
											<select class="form-control select2_demo_3 required" id="anfitrion" name="anfitrion" >
											<option value="">Seleccione...</option>
											<?php include_once 'models/cvubv.php';
															foreach($this->anfitriones as $row){
															$pro=new Cvubv();
															$pro=$row;?> 
														<option value="<?php echo $pro->id;?>" <?php if($this->usuario->id_anfitrion==$pro->id) print "selected=selected"?> > <?php echo $pro->descripcion;?></option>
														<?php }?>      
											</select>  		
											</div>
										</div>


													
										<div class="form-group">
											<label class="col-sm-3 control-label">Motivo <span class="required">*</span></label>
											<div class="col-sm-9">
											<textarea name="motivo" id="motivo" cols="30" rows="2" class="form-control required" placeholder="Escriba el motivo de la visita" maxlength='145'  onkeyup="javascript:this.value=this.value.toUpperCase();" ><?php echo $this->usuario->motivo; ?></textarea>
											</div>
										</div>

										<div class="form-group">
											<label class="col-sm-3 control-label">Procedencia </label>
											<div class="col-sm-9">
												<input type="text" id="procedencia" name="procedencia" placeholder="Escriba la procedencia del visitante" class="form-control" placeholder="Escriba sus nombres" maxlength='45' minlength="5"  onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php echo $this->usuario->procedencia; ?>"  />
											</div>
										</div>
														
										<div class="form-group">
											<label class="col-sm-3 control-label">Paquete </label>
											<div class="col-sm-9">
												<input type="text" id="paquete" name="paquete" placeholder="Escriba sobre los paquetes que tre consigo el visitante" class="form-control" placeholder="Escriba sus nombres" maxlength='45' minlength="5"   onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php echo $this->usuario->paquete; ?>" />
											</div>
										</div>

														
									
										<div class="form-group">
											<label class="col-sm-3 control-label">Observaciones </label>
											<div class="col-sm-9">
											<textarea name="observacion" id="observacion" cols="30" rows="2" class="form-control" placeholder="Escriba sus observaciones" maxlength='145'  onkeyup="javascript:this.value=this.value.toUpperCase();" ><?php echo $this->usuario->observacion; ?></textarea>
											</div>
										</div>


										<div class="form-group">
											<label class="col-sm-3 control-label">Foto </label>
											<div class="col-sm-9">
										
											<fieldset class="form-group">
											<div class="col-md-12">
													<div class="form-check radio_check checkbox-inline">
														<input class="form-check-input" type="radio" name="radio_select" id="radiosfoto" value="1" >
														<label class="form-check-label" for="radiosfoto">Seleccionar Foto</label>
														<style>
														.errorr{
															color: #B94A48;
														}
														</style>
														<div class="errorr" id="errores"></div>
								
													
													</div>
													<div class="form-check radio_check checkbox-inline">
														<input class="form-check-input" type="radio" name="radio_select" id="radiotfoto" value="0">
														<label class="form-check-label" for="radiotfoto">Tomar Foto</label>
													</div>
												</div>
											</fieldset>

										<br>
										<div class="container_radio">
											<input type="file" class="form-control-file video_container none" name="archivo" id="subirfoto" accept="image/*">
											<video id="video" autoplay="autoplay" class="video_container none"></video>
										</div>
										


										   </div>
										</div>

			
											<div class="panel-footer">
												<div class="row">
													<div class="col-md-9 col-md-offset-3">
														<button type="submit" class="btn btn-primary">Guardar</button>
														<button type="reset" class="btn btn-default">Cancelar</button>
													</div>
												</div>
											</div>
											<canvas id="canvas" class="none"></canvas>

										</form>

									</div>
									
								</div>
								
							</div>
							
						</div>
						


						
					</div>
					
					<!-- end: page -->			
                </section>     
				<?php require 'views/footer.php'; ?>  
			         
			</div>
                     
        </section>
        
		
				




		<!-- Vendor -->
		<script src="<?php echo constant('URL');?>src/assets/vendor/jquery/jquery.js"></script>
		<script src="<?php echo constant('URL');?>src/assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="<?php echo constant('URL');?>src/assets/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="<?php echo constant('URL');?>src/assets/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="<?php echo constant('URL');?>src/assets/vendor/magnific-popup/magnific-popup.js"></script>

					<!-- Tomar foto -->
		<script src="<?php echo constant('URL');?>src/js/camara.js"></script>

		<script>


/*Validar formulario y procesar por Ajax */

$(document).ready(function(){


//$("#registro-form").unbind('submit').bind('submit', function(){

	$("#registro-form").validate({
        event: "blur",rules: {
			password: { 
                 minlength: 5
          }, 
          c_password: { 
                 equalTo: "#password", minlength: 5
          }, 
		},//'name': "required",'email': "required email",'message': "required"},
      //  messages: {'name': "Por favor indica tu nombre",'email': "Por favor, indica una direcci&oacute;n de e-mail v&aacute;lida",'message': "Por favor, dime algo!"},
        debug: true,errorElement: "label",
        submitHandler: function(form){
			var id_persona = $('#id_persona').val();
			var id_visitante = $('#id_visitante').val();
			//Visitante 
			var anfitrion = $('#anfitrion').val();
			var motivo = $('#motivo').val();
			var procedencia = $('#procedencia').val();
			var paquete = $('#paquete').val();
			var observacion = $('#observacion').val();


			var cedula = $('#cedula').val();
			var nombres = $('#nombres').val();
			var apellidos = $('#apellidos').val();
			var genero = $("input[name='genero']:checked").val();
			var telefono = $('#telefono').val();
			var correo = $('#correo').val();
			var departamento = $('#departamento').val();
			var perfil = $('#perfil').val();
			var foto_ubv = $('#foto_ubv').val();
			var radio = $("input[name='radio_select']:checked").val();

			var url="<?php echo constant('URL'); ?>";
			var foto_default="src/assets/images/!logged-user.jpg";

			if (radio == 0) {
				cxt.drawImage(video, 0, 0, 300, 150);
				var data = canvas.toDataURL("image/jpeg");
				var info = data.split(",", 2);
				$.ajax({
					type : "POST",
					url : "<?php echo constant('URL');?>visitante/Save_photo_Edit",
					data : {foto : info[1],cedula:cedula, nombres: nombres, apellidos: apellidos,
						genero: genero, telefono: telefono, correo: correo, departamento: departamento,
						anfitrion:anfitrion, motivo:motivo, procedencia:procedencia,
						 paquete:paquete, observacion:observacion,id_persona:id_persona,id_visitante:id_visitante},
					dataType : 'json',
					/*beforeSend: function() {
						btnSaveLoad();
					},*/
					success : function(response) {
				
						if (response.success == true) {
							//	swal("MENSAJE", response.messages , "success");
						//	$("#registro-form")[0].reset(); //RESETEAR FORM
							//CHECKED FOTO
							//$("#radiosfoto").click();
							$('html, body').animate({scrollTop:0}, 'slow');//VOLVER AL INICIO
							setTimeout(refrescar, 10000);//Refrescar en 10 min
							$('#success').slideDown(); // MOSTRAR ALERTA EXITOSA
							$('#danger').slideUp(); // OCULTAR ALERTA error

							/*$('#nombres').removeAttr('readonly','readonly');
     						$('#apellidos').removeAttr('readonly','readonly');
							
							 $('#foto_ubv').val(foto_default); //INPUT
							 $("#foto_perfil").attr("src",url+foto_default); //IMG
							 $("#perfil").select2("val", "");
							 $("#departamento").select2("val", "");*/
						}else{
							$('html, body').animate({scrollTop:0}, 'slow');//VOLVER AL INICIO
							$('#success').slideUp(); // OCULTAR ALERTA 
							$('#danger').slideDown(); // MOSTRAR ALERTA error
						}
					}
				});
			} else if (radio == 1) {
				//var formData = new FormData(this);
				var formData = new FormData(form);
				$.ajax({
					url: '<?php echo constant('URL');?>visitante/Save_img_Edit',
					type: 'POST',
					data: formData,
					cache: false,
					contentType: false,
					processData: false,
				/*	beforeSend: function(){
						btnSaveLoad();
					},*/
					success: function(response){

						if (response.success == true) {
						//	swal("MENSAJE", response.messages , "success");
						//$("#registro-form")[0].reset(); //RESETEAR FORM
						//CHECKED FOTO
						//$("#radiosfoto").click();
						$('html, body').animate({scrollTop:0}, 'slow');//VOLVER AL INICIO
						setTimeout(refrescar, 10000);//Refrescar en 10 min
						$('#success').slideDown(); // MOSTRAR ALERTA EXITOSA
						$('#danger').slideUp(); // OCULTAR ALERTA error

					/*	$('#nombres').removeAttr('readonly','readonly');
						$('#apellidos').removeAttr('readonly','readonly');

						$('#foto_ubv').val(foto_default); //INPUT
						$("#foto_perfil").attr("src",url+foto_default); //IMG
						$("#perfil").select2("val", "");
						$("#departamento").select2("val", "");*/
						}else{
							$('html, body').animate({scrollTop:0}, 'slow');//VOLVER AL INICIO
							$('#success').slideUp(); // OCULTAR ALERTA 
							$('#registrado').slideUp(); // OCULTAR ALERTA 
							$('#danger').slideDown(); // MOSTRAR ALERTA error
						}
					}
				});

			}else{ //TOMAMOS LA FOTO DEL SISTEMA
				
				$.ajax({
					type : "POST",
					url : "<?php echo constant('URL');?>visitante/Save_img_sis_Edit",
					data : {foto_ubv : foto_ubv,cedula:cedula, nombres: nombres, apellidos: apellidos,
						genero: genero, telefono: telefono, correo: correo, departamento: departamento,
						radio:radio,anfitrion:anfitrion, motivo:motivo, procedencia:procedencia,
						 paquete:paquete, observacion:observacion,id_persona:id_persona,id_visitante:id_visitante},
					 dataType : 'json',
					// async: true,
					/*beforeSend: function() {
						btnSaveLoad();
					},*/
					success : function(response) {
						if (response.success == true) {
							$('html, body').animate({scrollTop:0}, 'slow');//VOLVER AL INICIO
							console.log("ok");
						//	swal("MENSAJE", response.messages , "success");
						//	$("#registro-form")[0].reset(); //RESETEAR FORM
							//CHECKED FOTO
						//	$("#radiosfoto").click();
							setTimeout(refrescar, 10000);//Refrescar en 10 min
							$('#success').slideDown(); // MOSTRAR ALERTA EXITOSA
							$('#danger').slideUp(); // OCULTAR ALERTA error

						//	$('#nombres').removeAttr('readonly','readonly');
     					//	$('#apellidos').removeAttr('readonly','readonly');
							
						//	 $('#foto_ubv').val(foto_default); //INPUT
						//	 $("#foto_perfil").attr("src",url+foto_default); //IMG
						//	 $("#perfil").select2("val", "");
						//	 $("#departamento").select2("val", "");
							

						} else {
							$('html, body').animate({scrollTop:0}, 'slow');//VOLVER AL INICIO
						//	console.log("no ok");
						//	swal("MENSAJE", response.messages , "error");
							$('#success').slideUp(); // OCULTAR ALERTA 
							$('#danger').slideDown(); // MOSTRAR ALERTA error
						}
					}
				});
			}

			return false;

			//});

								
			}
					});




			/*Validar Cedula Venezolana */
			//this.value=this.value.toUpperCase();

			/*var pattern = /\d/,
			caja = document.getElementById("cedula");
		
			caja.addEventListener("keypress", function(e){
		
			if (this.value.length === 0 && (!(/(E|V|e|v)/).test(String.fromCharCode(e.keyCode))))
			e.preventDefault();
					
			if (this.value.length > 0 && (!pattern.test(String.fromCharCode(e.keyCode)) || this.value.length == 10))
			e.preventDefault();
					
			if (this.value.length === 1)
				this.value += "-";
					}, false); */

			

/**Buscar usuario */
//VALIDAR PESO Y EXTENSION DE ARCHIVO
$('#subirfoto').change( function() {
		if(this.files[0].size > 2000000) { // 512000 bytes = 500 / Kb 2000000= 2MB
			  	$(this).val('');
		    	$('#errores').html("El archivo supera el límite de peso permitido.");
		} else { //ok
			var formato = (this.files[0].name).split('.').pop();
			//alert(formato);
				if(formato.toLowerCase() == 'jpg' ) {
				//	$('#errores').html("IMAGEN VALIDA, Ha pasado la prueba con éxito.");
				$('#errores').html("");
				} else {
					$(this).val('');
					$('#errores').html("Formato no soportado");
				
				}
			}
	});





});


function ImageExist(url) 
{
   var img = new Image();
   img.src = url;
   return img.height != 0;
}

function refrescar(){
    //Actualiza la página
    location.reload();
  }

	</script>


		<!-- Specific Page Vendor -->
		<script src="<?php echo constant('URL');?>src/assets/vendor/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
		<script src="<?php echo constant('URL');?>src/assets/vendor/jquery-ui-touch-punch/jquery.ui.touch-punch.js"></script>
		<script src="<?php echo constant('URL');?>src/assets/vendor/jquery-appear/jquery.appear.js"></script>

		<!-- Specific Page Vendor -->
		<script src="<?php echo constant('URL');?>src/assets/vendor/jquery-validation/jquery.validate.js"></script>
		
		<script src="<?php echo constant('URL');?>src/assets/vendor/bootstrap-wizard/jquery.bootstrap.wizard.js"></script>
			


		<!-- Theme Base, Components and Settings -->
		<script src="<?php echo constant('URL');?>src/assets/javascripts/theme.js"></script>
		<!-- Theme Custom -->
		<script src="<?php echo constant('URL');?>src/assets/javascripts/theme.custom.js"></script>
		<!-- Theme Initialization Files -->
		<script src="<?php echo constant('URL');?>src/assets/javascripts/theme.init.js"></script>
		<!-- Examples -->
		<script src="<?php echo constant('URL');?>src/assets/javascripts/dashboard/examples.dashboard.js"></script>
    		
	
		<!-- Specific Page Vendor -->
		<script src="<?php echo constant('URL');?>src/assets/vendor/jquery-validation/jquery.validate.js"></script>
	
		<!--Input mask-->
		<script src="<?php echo constant('URL');?>src/assets/vendor/jquery-maskedinput/jquery.maskedinput.js"></script>
		<!--Select2-->
		<script src="<?php echo constant('URL');?>src/assets/vendor/select2/select2.js"></script>
		

		<!-- Validar el ingreso de letra o numeros en input -->
		<script src="<?php echo constant('URL');?>src/js/val_letras.js"></script>

		
		<script>
			$(".select2_demo_3").select2({
                placeholder: "Seleccione",
                width: "100%",
                dropdownAutoWidth: true,
                allowClear: true
            });
							     //select no search
    $(".select2_demo_4").select2({
                                placeholder: "Seleccione",
                                width: "100%",
                                dropdownAutoWidth: true,
                                allowClear: true,
                                minimumResultsForSearch: -1
                            });
							</script>
	



		<!-- Theme Initialization Files -->
		<script src="<?php echo constant('URL');?>src/assets/javascripts/theme.init.js"></script>

   		<!-- Examples Modal para mensajes -->
		<script src="<?php echo constant('URL');?>src/assets/javascripts/ui-elements/examples.modals.js"></script>
	
		<!-- Active menu-->
		<script src="<?php echo constant('URL');?>src/js/active.js"></script>

	


    </body>
</html>