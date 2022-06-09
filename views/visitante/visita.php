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
								<li><span>Lista de Visitas</span></li>
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

                                    <a title="Volver" href="<?php echo constant ('URL') . "visitante";?>"><button type="button" class="mb-xs mt-xs mr-xs btn btn-info"><i class="fa fa-arrow-left"></i> Volver</button></a>
								</div>
						
                                <h2 class="panel-title">
                                
                               Lista de Visitas,
                                 
                                 Visitante
                                 <?php 
                                list($pnom, $snom) = explode(" ", $this->usuarios[0]->nombres);
                                list($pape, $sape) = explode(" ", $this->usuarios[0]->apellidos);
                                echo  "C.I. ".$this->usuarios[0]->cedula." ".$pnom. " ".$pape; ?>
                                
                             </h2>
								<p class="panel-subtitle">
											Visitas registrados en el sistema
								</p>
							</header>
							<div class="panel-body">
                            <?php echo $this->mensaje; ?>
								<table class="table table-bordered table-striped mb-none" id="datatable-default">
									<thead>
										<tr>
											<th>Cod. Pase</th>
                                            <th>Estatus</th>
											<th>Hora Entrada</th>
											<th>Hora Salida</th>
                                            <th>Motivo</th>
											<th>Departamento</th>
                                            
											<!--<th>Nombres</th>
                                            <th>Apellidos</th>
											<th>Telefono</th>-->
											<th>Anfitrión</th>
											<th>Acciones</th>
										</tr>
									</thead>
									<tbody>
									<?php include_once 'models/cvubv.php';
															foreach($this->usuarios as $row){
															$user=new Cvubv();
															$user=$row;?> 
										<tr class="gradeX">

											<td><b><?php echo $user->pase; ?></b></td>
                                            <td>
                                            <?php 
											if(empty($user->fecha_salida)){
												echo '<span class="label label-success">&nbsp;&nbsp;Entrada&nbsp;&nbsp;&nbsp;</span>';
											}else{
												echo '<span class="label label-danger">&nbsp;&nbsp;&nbsp;&nbsp;Salida&nbsp;&nbsp;&nbsp;&nbsp;</span>';
											}

										
											 ?>
                                            </td>
                                            <td><?php echo date("d/m/Y H:i", strtotime($user->fecha_ingreso)); ?></td>
											<td>
											<?php 
											if(!empty($user->fecha_salida)){
											 echo date("d/m/Y H:i", strtotime($user->fecha_salida));
											}
											 ?>
											
											</td>
                                          
                                        	<td><?php echo substr($user->motivo, 0,40); ?></td>
											<td><?php echo $user->departamento; ?></td>
										
                                        <!--<td><?php echo $user->nombres; ?></td>
                                            <td><?php echo $user->apellidos; ?></td>
                                            <td><?php echo $user->telefono; ?></td>-->
											<td><?php echo $user->anfitrion; ?></td>
											
											 <td>
											<!-- <a href="<?php echo constant ('URL') . "usuario/VerUsuario/".$user->id_usuario."/1";?>"><button type="button" class="mb-xs mt-xs mr-xs btn btn-primary"><i class="fa fa-edit"></i>Editar</button></a>-->
											 <a href="<?php echo constant ('URL') . "visitante/VerVisitante/".$user->id_visitante."/1";?>"><button type="button" class="mb-xs mt-xs mr-xs btn btn-info"><i class="fa fa-eye"></i> &nbsp;&nbsp; Ver  &nbsp;&nbsp;&nbsp;</button></a>
                                             <!--<a title="Cambiar Estatus" href="<?php echo constant ('URL') . "usuario/VerUsuario/".$user->id_usuario;?>"><button type="button" class="mb-xs mt-xs mr-xs btn btn-primary"><i class="fa fa-refresh"></i> Estatus</button></a>-->
                                        <?php if(empty($user->fecha_salida)){ ?>
										     <a type="button" class="" data-id="<?php echo constant ('URL') . "visitante/CambiarEstatus/".$user->id_visitante."/1/".$user->id_persona;?>" data-toggle="modal" data-target="#ModalDelete" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><button data-toggle="tooltip" type="button" class="mb-xs mt-xs mr-xs btn btn-primary"  title="Cambiar Estatus"><i class="fa fa-refresh"></i> Estatus</i></button></a>
										<?php }?>

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
        
		
				






                                        <div class="modal" tabindex="-1" role="dialog" id="ModalDelete">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                            <header class="panel-heading">
												<h2 class="panel-title">Cambiar Estatus</h2>
											</header>
											<div class="panel-body">
												<div class="modal-wrapper">
													<div class="modal-icon">
														<i class="fa fa-question-circle"></i>
													</div>
													<div class="modal-text">
														<h4>Cambiar Estatus</h4>
														<p>¿Está Seguro que desea Cambiar el estatus de este registro?</p>
													</div>
												</div>
											</div>
											<footer class="panel-footer">
												<div class="row">
													<div class="col-md-12 text-right">
													<a id="borrar" href=""> <button class="btn btn-primary" >Aceptar</button></a>
                                                    <button type="button"  class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                	</div>
												</div>
											</footer>
                                        
                                            </div>
                                        </div>
                                        </div>





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
	


<!--eliminar registro-->
<script>
	$('#ModalDelete').on('show.bs.modal', function(e) {
		var product = $(e.relatedTarget).data('id');
		$("#borrar").attr("href",product);
	});  
	</script>
  <!--end eliminar registro-->
	
	<!-- Cambiar placeholder de buscardor y ocultar records per page-->
	<script src="<?php echo constant('URL');?>src/js/table_buscar.js"></script>
	<!-- Active menu-->
	<script src="<?php echo constant('URL');?>src/js/active.js"></script>


    </body>
</html>