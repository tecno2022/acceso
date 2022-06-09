<!doctype html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<title>Inicio | Sistema para el Control de Visitas UBV</title>
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

		<!-- Head Libs -->
		<script src="<?php echo constant('URL');?>src/assets/vendor/modernizr/modernizr.js"></script>

	</head>
	<body>
		<section class="body">

        <?php require 'views/header.php'; ?>

				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Inicio</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="<?php echo constant('URL');?>home">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Inicio</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open=""><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

						

					<!-- start: page -->
					<div class="row">
					
						<div class="col-md-6 col-lg-12 col-xl-6">
							<div class="row">
								<div class="col-md-12 col-lg-6 col-xl-6">
									<section class="panel panel-featured-left panel-featured-primary">
										<div class="panel-body">
											<div class="widget-summary">
												<div class="widget-summary-col widget-summary-col-icon">
													<div class="summary-icon bg-primary">
														<i class="fa fa-life-ring"></i>
													</div>
												</div>
												<div class="widget-summary-col">
													<div class="summary">
														<h4 class="title">Total Pases</h4>
														<div class="info">
															<strong class="amount"><?php echo $this->estadistica->pases; ?></strong>
															
														</div>
													</div>
													<?php if($_SESSION['id_usuario_perfil']=='1'){ // ADMINISTRADOR?>
													<div class="summary-footer">
														<a href="<?php echo constant('URL');?>admin" class="text-muted text-uppercase">Ver Más</a>
													</div>
													<?php } ?>

												</div>
											</div>
										</div>
									</section>
								</div>

								<?php include_once 'models/cvubv.php';
															$cont=0;
															foreach($this->visitantes as $row){
															$user=new Cvubv();
															$user=$row;
															//echo $user->fecha_salida."<br>"; 
															if(empty($user->fecha_salida)){ // MOSTRAMOS SOLO LOS PASES SIN SALIDA
																$cont=$cont+1;
															}
															}


															$contador=0; $salidas=0;
															foreach($this->visitanteshoy as $row){
															$user=new Cvubv();
															$user=$row;
															//echo $user->fecha_salida."<br>"; 
															if(!empty($user->fecha_ingreso)){ // MOSTRAMOS SOLO LOS PASES DE HOY
																$contador=$contador+1;
															}

															//ENTRADAS16092021
																if($user->estatus_visitante=='0'){
																	$salidas=$salidas+1;
																}
															

															}
															?> 
							

							<div class="col-md-12 col-lg-6 col-xl-6">
									<section class="panel panel-featured-left panel-featured-secondary">
										<div class="panel-body">
											<div class="widget-summary">
												<div class="widget-summary-col widget-summary-col-icon">
													<div class="summary-icon bg-secondary">
														<i class="fa fa-paper-plane"></i>
													</div>
												</div>
												<div class="widget-summary-col">
													<div class="summary">
														<h4 class="title">Total de Entradas  <br> <?php echo date('d/m/Y');?></h4>
														<div class="info">
														
															<strong class="amount" title="Entradas"><?php echo $contador; ?></strong> &nbsp;

														</div>
														
													</div>
													<div class="summary-footer">
														<a href="<?php echo constant('URL');?>visitante/Verificar" class="text-muted text-uppercase">Ver Más</a>
													</div>
												</div>
											</div>
										</div>
									</section>
								</div>
							
								<div class="col-md-12 col-lg-6 col-xl-6">
									<section class="panel panel-featured-left panel-featured-info">
										<div class="panel-body">
											<div class="widget-summary">
												<div class="widget-summary-col widget-summary-col-icon">
													<div class="summary-icon bg-info">
														<i class="fa fa-check-circle"></i>
													</div>
												</div>
												<div class="widget-summary-col">
													<div class="summary">
														<h4 class="title">Salidas <br> <?php echo date('d/m/Y');?></h4>
														<div class="info">
														
															<strong class="amount" title="Salidas"><?php echo $salidas; ?></strong> &nbsp;
															
														</div>
														
													</div>
													<div class="summary-footer">
														<a href="<?php echo constant('URL');?>visitante/Verificar" class="text-muted text-uppercase">Ver Más</a>
													</div>
												</div>
											</div>
										</div>
									</section>
								</div>

								<div class="col-md-12 col-lg-6 col-xl-6">
									<section class="panel panel-featured-left panel-featured-warning">
										<div class="panel-body">
											<div class="widget-summary">
												<div class="widget-summary-col widget-summary-col-icon">
													<div class="summary-icon bg-warning">
														<i class="fa fa-exclamation-triangle"></i>
													</div>
												</div>
												<div class="widget-summary-col">
													<div class="summary">
														<h4 class="title">Sin Salida <br> <?php echo date('d/m/Y');?></h4>
														<div class="info">
														
														<strong class="amount" title="Sin Salida"><?php echo $cont;  ?></strong>
														</div>
														
													</div>
													<div class="summary-footer">
														<a href="<?php echo constant('URL');?>visitante/Verificar" class="text-muted text-uppercase">Ver Más</a>
													</div>
												</div>
											</div>
										</div>
									</section>
								</div>

							
								<div class="col-md-12 col-lg-6 col-xl-6">
									<section class="panel panel-featured-left panel-featured-tertiary">
										<div class="panel-body">
											<div class="widget-summary">
												<div class="widget-summary-col widget-summary-col-icon">
													<div class="summary-icon bg-tertiary">
														<i class="fa fa-group"></i>
													</div>
												</div>
												<div class="widget-summary-col">
													<div class="summary">
														<h4 class="title">Total de visitantes</h4>
														<div class="info">
															<strong class="amount"><?php echo $this->estadistica->visitantes; ?></strong>
														</div>
													</div>
													<div class="summary-footer">
														<a href="<?php echo constant('URL');?>visitante"  class="text-muted text-uppercase">Ver Más</a>
													</div>
												</div>
											</div>
										</div>
									</section>
								</div>
								<div class="col-md-12 col-lg-6 col-xl-6">
									<section class="panel panel-featured-left panel-featured-quartenary">
										<div class="panel-body">
											<div class="widget-summary">
												<div class="widget-summary-col widget-summary-col-icon">
													<div class="summary-icon bg-quartenary">
														<i class="fa fa-user"></i>
													</div>
												</div>
												<div class="widget-summary-col">
													<div class="summary">
														<h4 class="title">Total de usuarios</h4>
														<div class="info">
															<strong class="amount"><?php echo $this->estadistica->usuarios; ?></strong>
														</div>
													</div>
													<?php if($_SESSION['id_usuario_perfil']=='1'){ // ADMINISTRADOR?>
													<div class="summary-footer">
														<a href="<?php echo constant('URL');?>usuario"  class="text-muted text-uppercase">Ver Más</a>
													</div>
													<?php } ?>
												</div>
											</div>
										</div>
									</section>
								</div>
							</div>
						</div>
					</div>

					

					
                
                          

					<!-- end: page -->
                </section>
                
				<?php require 'views/footer.php'; ?>

                
			</div>

        
            


  						


							<!-- MODAL DE BIENVENIDO-->
						<div class="modal" tabindex="-1" role="dialog" id="Bienvenido">
						<div class="modal-dialog" role="document">
						<section class="panel">
										<header class="panel-heading">
											<h2 class="panel-title">Bienvenido!</h2>
										</header>
										<div class="panel-body">
											<div class="modal-wrapper">
												<div class="modal-icon">
													<i class="fa fa-check"></i>
												</div>
												<div class="modal-text">
													<h4>Bienvenido</h4>
													<p>Bienvenido al Sistema para el Control de Visitas UBV</p>
												</div>
											</div>
										</div>
										<footer class="panel-footer">
											<div class="row">
												<div class="col-md-12 text-right">
												<!--<button class="btn btn-success modal-dismiss">OK</button>-->
													<button type="button" class="btn btn-success"  data-dismiss="modal">Aceptar</button>
												</div>
											</div>
										</footer>
									</section>
						</div>
						</div>
						<!-- END MODAL BIENVENIDO -->



            
        </section>
        
    

		<!-- Vendor -->
		<script src="<?php echo constant('URL');?>src/assets/vendor/jquery/jquery.js"></script>
		<script src="<?php echo constant('URL');?>src/assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="<?php echo constant('URL');?>src/assets/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="<?php echo constant('URL');?>src/assets/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="<?php echo constant('URL');?>src/assets/vendor/magnific-popup/magnific-popup.js"></script>

		
		<!-- Specific Page Vendor -->
	<!--<script src="<?php echo constant('URL');?>src/assets/vendor/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
		<script src="<?php echo constant('URL');?>src/assets/vendor/jquery-ui-touch-punch/jquery.ui.touch-punch.js"></script>
		<script src="<?php echo constant('URL');?>src/assets/vendor/jquery-appear/jquery.appear.js"></script>-->


		<!-- Theme Base, Components and Settings -->
		<script src="<?php echo constant('URL');?>src/assets/javascripts/theme.js"></script>
		<!-- Theme Custom -->
		<script src="<?php echo constant('URL');?>src/assets/javascripts/theme.custom.js"></script>
		<!-- Theme Initialization Files -->
		<script src="<?php echo constant('URL');?>src/assets/javascripts/theme.init.js"></script>
	
        <!-- Examples Modal para mensajes -->
		<script src="<?php echo constant('URL');?>src/assets/javascripts/ui-elements/examples.modals.js"></script>
	

		<?php 
		if($_SESSION['bienvenido']==1){
			unset($_SESSION['bienvenido']);?>
		<script>
			//jQuery.noConflict(); 
		$('#Bienvenido').modal();
		</script>
		<?php }?>

		<!-- Active menu-->
		<script src="<?php echo constant('URL');?>src/js/active.js"></script>

    
    </body>
</html>