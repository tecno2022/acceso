<!doctype html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<title>Anfitriones | Sistema para el Control de Visitas UBV</title>
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
						<h2>Anfitriones</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="<?php echo constant('URL');?>home">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li>
								<a href="<?php echo constant('URL');?>admin/Anf">
								<span>Anfitriones</span>
								</a>								
								</li>
								<?php if($this->vista==1){ ?>
								<li><span>Editar Anfitriones</span></li>
								<?php }else{ ?>
								<li><span>Registrar Anfitriones</span></li>
								<?php } ?>

							</ol>
					
							<a class="sidebar-right-toggle" data-open=""><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

			
				

					<!-- start: page -->
	<!--Validar campos-->			
					
						<div class="row">

                       <!-- <div class="col-md-1">
                        </div>-->
						<div class="col-md-12">

						<?php if($this->vista==1){ ?>
						
							<form id="form-registro" action="<?php echo constant('URL');?>admin/EditarAnf"  method="post" class="form-horizontal">
						<?php }else{?>
							<form id="form-registro" action="<?php echo constant('URL');?>admin/RegistrarAnf"  method="post" class="form-horizontal">
						<?php } ?>
								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
										<a title="Volver" href="<?php echo constant ('URL') . "admin/Anf";?>"><button type="button" class="mb-xs mt-xs mr-xs btn btn-info"><i class="fa fa-arrow-left"></i> Volver</button></a>

										</div>

									<?php if($this->vista==1){ ?>
										<h2 class="panel-title"> Editar Anfitriones</h2>
										<p class="panel-subtitle">
											Formulario basico para Editar de Anfitriones.
										</p>
									<?php }else{ ?>
										<h2 class="panel-title"> Registro de Anfitriones</h2>
										<p class="panel-subtitle">
											Formulario basico para el registro de Anfitriones.
										</p>
									<?php }?>

									</header>
									
									<div class="panel-body">

						<!--	 alerts	-->
									<div class="alert alert-info" >
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<strong>Los campos marcados con <span class="required">*</span> son requeridos</strong> 
									</div>

							<!--	End alerts	-->
											<input type="hidden" name="id_anfitrion" value="<?php echo $this->anf->id_anfitrion;?>">

								    	<div class="form-group">
											<label class="col-sm-3 control-label">Anfitrión  <span class="required">*</span></label>
											<div class="col-sm-9">
												<input type="text"  id="anfitrion"  name="anfitrion" value="<?php echo $this->anf->descripcion; ?>" class="form-control required" placeholder="Escriba su nombre del anfitrión" maxlength='45' minlength="5" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeypress="return soloLetras(event)"/>
											</div>

										</div>
                                        



                            <br><br>
			

									</div>



									<footer class="panel-footer">
										<div class="row">
											<div class="col-sm-9 col-sm-offset-3">
												<button type="submit" class="btn btn-primary" >Guardar</button>
												<button type="reset" class="btn btn-default">Cancelar</button>
											</div>
										</div>

										
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
	
		
		<!-- Validar el ingreso de letra o numeros en input -->
		<script src="<?php echo constant('URL');?>src/js/val_letras.js"></script>


		<!-- Theme Initialization Files -->
		<script src="<?php echo constant('URL');?>src/assets/javascripts/theme.init.js"></script>

   <!-- Examples Modal para mensajes -->
		<script src="<?php echo constant('URL');?>src/assets/javascripts/ui-elements/examples.modals.js"></script>
	
        <script>
        $(document).ready(function(){
        $("#form-registro").validate();

      });
        </script>

        	<!-- Validar el ingreso de letra o numeros en input -->
		<script src="<?php echo constant('URL');?>src/js/val_letras.js"></script>

			<!-- Active menu-->
		<script src="<?php echo constant('URL');?>src/js/active.js"></script>


    </body>
</html>