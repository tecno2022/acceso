<!doctype html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<title>Usuario | Sistema para el Control de Visitas UBV</title>
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
						<h2>Usuarios</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="<?php echo constant('URL');?>home">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li>
								<a href="<?php echo constant('URL');?>usuario">
								<span>Usuarios</span>
								</a>
								</li>
								<li><span>Registrar Usuario</span></li>
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
	<!--Validar campos-->			
					
						<div class="row">
						<div class="col-md-12">


								




							<form id="registro-form" lass="form-horizontal">
								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
										<a title="Volver" href="<?php echo constant ('URL') . "usuario";?>"><button type="button" class="mb-xs mt-xs mr-xs btn btn-info"><i class="fa fa-arrow-left"></i> Volver</button></a>

										</div>

										<h2 class="panel-title">Registro de Usuario</h2>
										<p class="panel-subtitle">
											Formulario basico para el registro de usuarios.
										</p>
									</header>

									
									<div class="panel-body">

						<!--	 alerts	-->
									<div class="alert alert-success" style="display: none;" id='success'>
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<strong>Registro Exitoso!</strong> 
									</div>


									<div class="alert alert-danger" style="display:none ;" id='danger'>
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<strong>Ha ocurrido un error</strong> 
									</div>

									<div class="alert alert-danger" style="display: none;" id='registrado'>
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<strong>Usuario registrado</strong> 
									</div>

									<div class="alert alert-info" >
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<strong>Los campos marcados con <span class="required">*</span> son requeridos, La subida máxima de archivos es en extensión .JPG  de  2MB 0 2000000 Kbs</strong> 
									</div>

							<!--	End alerts	-->
									<style>
									.logo-registro{
											width: 135px;
											display:block;
											margin: auto;
									}
									</style>


									<img id="foto_perfil" class="img-circle logo-registro"  src="<?php echo constant('URL');?>src/assets/images/!logged-user.jpg"/>
									<input type="hidden" id="foto_ubv" name="foto_ubv" value="">

							<br>
									<div class="form-group">
											<label class="col-sm-3 control-label">Cedula  <span class="required">*</span></label>
											<div class="col-sm-9">
												<input type="text"  id="cedula"  name="cedula" class="form-control required" onkeypress="return valSoloNumeros(event)" placeholder="Escriba su número de cedula "  maxlength='20' minlength="5" />
											</div>

										</div>

							
									
										<div class="form-group">
											<label class="col-sm-3 control-label">Nombres <span class="required">*</span></label>
											<div class="col-sm-9">
												<input type="text" id="nombres" name="nombres" class="form-control required" placeholder="Escriba sus nombres" maxlength='60' minlength="5"  onkeypress="return soloLetras(event)"  onkeyup="javascript:this.value=this.value.toUpperCase();"  />
											</div>
										</div>


										<div class="form-group">
											<label class="col-sm-3 control-label">Apellidos <span class="required">*</span></label>
											<div class="col-sm-9">
												<input type="text" id="apellidos" name="apellidos" class="form-control required" placeholder="Escriba sus apellidos" maxlength='60' minlength="5"  onkeypress="return soloLetras(event)" onkeyup="javascript:this.value=this.value.toUpperCase();"/>
											</div>
										</div>



										<div class="form-group">
												<label class="col-md-3 control-label" for="inputSuccess">Genero <span class="required">*</span></label>
												<div class="col-md-6">
													<label class="checkbox-inline">
														<input type="radio" id="inlineCheckbox1" id="genero" name="genero" class="required" value="F"> Femenino
													</label>
													<label class="checkbox-inline">
														<input type="radio" id="inlineCheckbox1" id="genero" name="genero" class="required" value="M"> Masculino
													</label>
													
												</div>
											</div>


										<div class="form-group">
											<label class="col-sm-3 control-label">Teléfono </label>
											<div class="col-sm-9">
												<input type="text" id="telefono" name="telefono"  data-plugin-masked-input data-input-mask="(9999) 999-9999" class="form-control" placeholder="Escriba su numero de teléfono" />
											</div>
										</div>

										<div class="form-group">
											<label class="col-sm-3 control-label">Correo </label>
											<div class="col-sm-9">
													<input type="email" id="correo" name="correo" class="form-control" placeholder="Escriba su correo electrónico" maxlength='100' minlength="5" onkeyup="javascript:this.value=this.value.toLowerCase();"/>
											</div>
										</div>
														


										<div class="form-group">
											<label class="col-sm-3 control-label">Departamento <span class="required">*</span></label>
											<div class="col-sm-9">
											<select class="form-control select2_demo_3 required" id="departamento" name="departamento" >
											<option value="">Seleccione...</option>
											<?php include_once 'models/cvubv.php';
															foreach($this->departamentos as $row){
															$pro=new Cvubv();
															$pro=$row;?> 
														<option value="<?php echo $pro->id;?>" > <?php echo $pro->descripcion;?></option>
														<?php }?>      
											</select>  		
											</div>
										</div>



										<div class="form-group">
											<label class="col-sm-3 control-label">Perfil <span class="required">*</span></label>
											<div class="col-sm-9">
											<select class="form-control select2_demo_4 required" id="perfil" name="perfil" >
											<option value="">Seleccione...</option>
											<?php include_once 'models/cvubv.php';
															foreach($this->perfiles as $row){
															$pro=new Cvubv();
															$pro=$row;?> 
														<option value="<?php echo $pro->id;?>" > <?php echo $pro->descripcion;?></option>
														<?php }?>      
											</select>  		
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

			

									</div>



									<footer class="panel-footer">
										<div class="row">
											<div class="col-sm-9 col-sm-offset-3">
												<button type="submit" class="btn btn-primary" >Guardar</button>
												<button type="reset" class="btn btn-default">Cancelar</button>
											</div>
										</div>

										<canvas id="canvas" class="none"></canvas>

										
									</footer>
								</section>
							</form>


							
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
       // event: "blur",rules: {'name': "required",'email': "required email",'message': "required"},
      //  messages: {'name': "Por favor indica tu nombre",'email': "Por favor, indica una direcci&oacute;n de e-mail v&aacute;lida",'message': "Por favor, dime algo!"},
        debug: true,errorElement: "label",
        submitHandler: function(form){


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
					url : "<?php echo constant('URL');?>usuario/Save_photo",
					data : {foto : info[1],cedula:cedula, nombres: nombres, apellidos: apellidos,
						genero: genero, telefono: telefono, correo: correo, departamento: departamento,
						perfil: perfil,radio:radio},
					dataType : 'json',
					/*beforeSend: function() {
						btnSaveLoad();
					},*/
					success : function(response) {
				
						if (response.success == true) {
							//	swal("MENSAJE", response.messages , "success");
							$('html, body').animate({scrollTop:0}, 'slow');//VOLVER AL INICIO


							$("#registro-form")[0].reset(); //RESETEAR FORM
							//CHECKED FOTO
							$("#radiosfoto").click();
							$('#success').slideDown(); // MOSTRAR ALERTA EXITOSA
							$('#danger').slideUp(); // OCULTAR ALERTA error
							$('#registrado').slideUp(); // OCULTAR ALERTA error 

							$('#nombres').removeAttr('readonly','readonly');
     					$('#apellidos').removeAttr('readonly','readonly');
							
							 $('#foto_ubv').val(foto_default); //INPUT
							 $("#foto_perfil").attr("src",url+foto_default); //IMG
							 $("#perfil").select2("val", "");
							 $("#departamento").select2("val", "");
						}else if(response.registrer == true){
							$('html, body').animate({scrollTop:0}, 'slow');//VOLVER AL INICIO

							$('#registrado').slideDown(); // OCULTAR ALERTA 
							$('#success').slideUp(); // OCULTAR ALERTA 
							$('#danger').slideUp(); // MOSTRAR ALERTA error
						}else{
							$('html, body').animate({scrollTop:0}, 'slow');//VOLVER AL INICIO

							$('#success').slideUp(); // OCULTAR ALERTA 
							$('#registrado').slideUp(); // OCULTAR ALERTA 
							$('#danger').slideDown(); // MOSTRAR ALERTA error
						}
					}
				});
			} else if (radio == 1) {
				//var formData = new FormData(this);
				var formData = new FormData(form);
				$.ajax({
					url: '<?php echo constant('URL');?>usuario/Save_img',
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
						$('html, body').animate({scrollTop:0}, 'slow');//VOLVER AL INICIO

						//	swal("MENSAJE", response.messages , "success");
						$("#registro-form")[0].reset(); //RESETEAR FORM
						//CHECKED FOTO
						//$("#radiosfoto").click();

						$('#success').slideDown(); // MOSTRAR ALERTA EXITOSA
						$('#danger').slideUp(); // OCULTAR ALERTA error
						$('#registrado').slideUp(); // OCULTAR ALERTA error 

						$('#nombres').removeAttr('readonly','readonly');
						$('#apellidos').removeAttr('readonly','readonly');

						$('#foto_ubv').val(foto_default); //INPUT
						$("#foto_perfil").attr("src",url+foto_default); //IMG
						$("#perfil").select2("val", "");
						$("#departamento").select2("val", "");
						}else if(response.registrer == true){
							$('html, body').animate({scrollTop:0}, 'slow');//VOLVER AL INICIO

							$('#registrado').slideDown(); //  MOSTRAR ALERTA error 
							$('#success').slideUp(); // OCULTAR ALERTA 
							$('#danger').slideUp(); // MOSTRAR ALERTA error
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
					url : "<?php echo constant('URL');?>usuario/Save_img_sis",
					data : {foto_ubv : foto_ubv,cedula:cedula, nombres: nombres, apellidos: apellidos,
						genero: genero, telefono: telefono, correo: correo, departamento: departamento,
						perfil: perfil,radio:radio},
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
							$("#registro-form")[0].reset(); //RESETEAR FORM
							//CHECKED FOTO
						//	$("#radiosfoto").click();

							$('#success').slideDown(); // MOSTRAR ALERTA EXITOSA
							$('#danger').slideUp(); // OCULTAR ALERTA error
							$('#registrado').slideUp(); // OCULTAR ALERTA error 

							$('#nombres').removeAttr('readonly','readonly');
     					$('#apellidos').removeAttr('readonly','readonly');
							
							 $('#foto_ubv').val(foto_default); //INPUT
							 $("#foto_perfil").attr("src",url+foto_default); //IMG
							 $("#perfil").select2("val", "");
							 $("#departamento").select2("val", "");
							

						}else if(response.registrer == true){
							$('html, body').animate({scrollTop:0}, 'slow');//VOLVER AL INICIO

							$('#registrado').slideDown(); // OCULTAR ALERTA 
							$('#success').slideUp(); // OCULTAR ALERTA 
							$('#danger').slideUp(); // MOSTRAR ALERTA error
						} else {
							$('html, body').animate({scrollTop:0}, 'slow');//VOLVER AL INICIO

						//	console.log("no ok");
						//	swal("MENSAJE", response.messages , "error");
							$('#success').slideUp(); // OCULTAR ALERTA 
							$('#registrado').slideUp(); // OCULTAR ALERTA 
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

	/*		var pattern = /\d/,
			caja = document.getElementById("cedula");
		
			caja.addEventListener("keypress", function(e){
		
			if (this.value.length === 0 && (!(/(E|V|e|v)/).test(String.fromCharCode(e.keyCode))))
			e.preventDefault();
					
			if (this.value.length > 0 && (!pattern.test(String.fromCharCode(e.keyCode)) || this.value.length == 10))
			e.preventDefault();
					
			if (this.value.length === 1)
				this.value += "-";
					}, false); 
*/
			

/**Buscar usuario */

$('#cedula').keyup(function(e) {

  e.preventDefault();
  var cl = $(this).val();
			//PARA MANEJAR IMG PERFIL
			var url="<?php echo constant('URL'); ?>";
			var foto_default="src/assets/images/!logged-user.jpg";

  $.ajax({
    url: '<?php echo constant('URL');?>usuario/BuscarUsuario',
    type: "POST",
    async: true,
    data: {ci:cl},
    success: function(response) {
		
      if ( response == 0) {
        
        $('#nombres').val('');
        $('#apellidos').val('');
        $('#genero').val('');

				$('#telefono').val('');
				$('#correo').val('');
				/*REmovemos los atributos */
				$('#nombres').removeAttr('readonly','readonly');
     		$('#apellidos').removeAttr('readonly','readonly');
       	$('#genero').removeAttr('readonly','readonly');
				$("input[type='radio'][name='genero'][value='F']").prop('checked',false);
				$("input[type='radio'][name='genero'][value='M']").prop('checked',false);
				//$('#telefono').removeAttr('readonly','readonly');
        //$('#correo').removeAttr('readonly','readonly');
				$('#foto_ubv').val(foto_default); //INPUT
				$("#foto_perfil").attr("src",url+foto_default); //IMG

      }else {
        var data = $.parseJSON(response);

        $('#nombres').val(data.nombres);
        $('#apellidos').val(data.apellidos);
       // $('#genero').val(data.genero);
       
				if (data.genero=="M"){// Selecionamos radio button
						$("input[type='radio'][name='genero'][value='M']").prop('checked',true);
				}else{
						$("input[type='radio'][name='genero'][value='F']").prop('checked',true);
				}

				$('#telefono').val(data.telefono);
        $('#correo').val(data.correo);

			//PARA MANEJAR IMG PERFIL
			var foto_ubv="src/fotos/"+data.cedula+".jpg";
				//Validamos si la imagen existe
			if(ImageExist(url+foto_ubv)==true){ 
				//console.log("Existe");
				$('#foto_ubv').val(foto_ubv); //INPUT
				$("#foto_perfil").attr("src",url+foto_ubv); //IMG
			}else{
				//console.log("no Existe");
				$('#foto_ubv').val(foto_default); //INPUT
				$("#foto_perfil").attr("src",url+foto_default); //IMG

			}
        // Bloque campos
        $('#nombres').attr('readonly','readonly');
        $('#apellidos').attr('readonly','readonly');
        $('#genero').attr('readonly','readonly');
       
			//	$('#telefono').attr('readonly','readonly');
        //$('#correo').attr('readonly','readonly');
      }
    },
    error: function(error) {
      $('#danger').slideDown(); // muestra ALERTA error
    }
  });

});


/*$(document).on('change','input[type="file"]',function(){			
			
			var fileName = this.files[0].name;
			var fileSize = this.files[0].size;

				var ext = fileName.split('.');
                // ahora obtenemos el ultimo valor despues el punto
                // obtenemos el length por si el archivo lleva nombre con mas de 2 puntos
                ext = ext[ext.length-1];

				switch (ext) {
					case 'xlsx':
						$('#tamanoArchivo').text(fileSize+" bytes en "+ext);
					break;	
					case 'csv': 
						$('#tamanoArchivo').text(fileSize+" bytes "+ext);
					break;
					default:
						alert('El archivo no tiene la extensión adecuada');
						this.value = ''; // reset del valor
						this.files[0].name = '';
					break;	
				}
		});*/

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
		<!-- Validar el ingreso de letra o numeros en input -->
		<script src="<?php echo constant('URL');?>src/js/val_letras.js"></script>

		



		<!-- Theme Initialization Files -->
		<script src="<?php echo constant('URL');?>src/assets/javascripts/theme.init.js"></script>

   		<!-- Examples Modal para mensajes -->
		<script src="<?php echo constant('URL');?>src/assets/javascripts/ui-elements/examples.modals.js"></script>
		<!-- Active menu-->
		<script src="<?php echo constant('URL');?>src/js/active.js"></script>


	

    </body>
</html>