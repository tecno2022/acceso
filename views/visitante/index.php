<!doctype html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<title>Visitantes | Sistema para el Control de Visitas UBV</title>
		<link rel="shortcut icon" href="<?php echo constant('URL');?>src/img/favicon.ico" type="image/x-icon">

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
	
		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="<?php echo constant('URL');?>src/assets/vendor/select2/select2.css" />
		<link rel="stylesheet" href="<?php echo constant('URL');?>src/assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />

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
						<h2>Visitantes</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="<?php echo constant('URL');?>home">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li>
								<a href="<?php echo constant('URL');?>visitante">
								<span>Visitante</span>
								</a>
								</li>
								<li><span>Lista de Visitantes</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open=""><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

			
					<!-- start: page -->
										
						<section class="panel">
							<header class="panel-heading">
								<div class="panel-actions">
									<!--<a href="#" class="fa fa-caret-down"></a>
									<a href="#" class="fa fa-times"></a>-->
									<a title="Agregar Visitante" href="<?php echo constant ('URL') . "visitante/Registro/1";?>"><button type="button" class="mb-xs mt-xs mr-xs btn btn-success"><i class="fa fa-pencil"></i> Agregar</button></a>
								</div>
						
								<h2 class="panel-title">Lista de Visitantes</h2>
								<p class="panel-subtitle">
											Visitantes registrados en el sistema
								</p>
							</header>
							<div class="panel-body">
								<table class="table table-bordered table-striped mb-none" id="datatable-default">
									<thead>
										<tr>
										<!--	<th>Fecha Asignación</th>-->
											<th>Cedula</th>
											<th>Nombres</th>
                                            <th>Apellidos</th>
											<th>Telefono</th>
											<th>Tipo</th>
											<th>Acciones</th>
										</tr>
									</thead>
									<tbody>
									<?php include_once 'models/cvubv.php';
															foreach($this->usuarios as $row){
															$user=new Cvubv();
															$user=$row;?> 
										<tr class="gradeX">

                                          <!--  <td><?php echo date("Y/m/d", strtotime($user->fecha_ingreso)); ?></td>-->
											<td><?php echo $user->cedula; ?></td>
										
											<td><?php echo $user->nombres; ?></td>
                                            <td><?php echo $user->apellidos; ?></td>
                                            <td><?php echo $user->telefono; ?></td>
											<td><?php echo $user->persona_tipo; ?></td>
											
											 <td>
											 <a href="<?php echo constant ('URL') . "visitante/VerVisita/".$user->id_persona;?>"><button type="button" class="mb-xs mt-xs mr-xs btn btn-info"><i class="fa fa-eye"></i> &nbsp;Ver &nbsp;</button></a>

											 </td>
										
										</tr>

										<?php }?> 
										
									</tbody>
								</table>
								
							</div>
						</section>	
					
						
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
		<script src="<?php echo constant('URL');?>src/assets/vendor/select2/select2.js"></script>
		<script src="<?php echo constant('URL');?>src/assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
		<script src="<?php echo constant('URL');?>src/assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js"></script>
		<script src="<?php echo constant('URL');?>src/assets/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="<?php echo constant('URL');?>src/assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="<?php echo constant('URL');?>src/assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="<?php echo constant('URL');?>src/assets/javascripts/theme.init.js"></script>


		<!-- Examples -->
		<script src="<?php echo constant('URL');?>src/assets/javascripts/tables/examples.datatables.default.js"></script>
        <!--	<script src="<?php echo constant('URL');?>src/assets/javascripts/tables/examples.datatables.row.with.details.js"></script>
            <script src="<?php echo constant('URL');?>src/assets/javascripts/tables/examples.datatables.tabletools.js"></script>-->

    	<!-- Examples Modal para mensajes -->
	   <script src="<?php echo constant('URL');?>src/assets/javascripts/ui-elements/examples.modals.js"></script>
	
		<!-- Cambiar placeholder de buscardor y ocultar records per page-->
		<script src="<?php echo constant('URL');?>src/js/table_buscar.js"></script>
														

		<!-- Active menu-->
		<script src="<?php echo constant('URL');?>src/js/active.js"></script>

	

    </body>
</html>