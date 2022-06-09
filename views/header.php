
<script> 
  setTimeout(function(){ alertFunc(); }, 4000000);
 
  function alertFunc(){
 
 alert("Su Sesion ha estado activa durante 1 hora, Su sesión se cerrara");
 
 location.href='<?php echo constant('URL');?>main/logout/';
}

      function myconfirm(){
        location.href='<?php echo constant('URL');?>main/logout/';
        exi0t();
  }

  function myconfirm2(){
    location.href='#';
  }
 location.href='#';
</script>
									<!-- Modal Cerrar sesión-->

									<div id="CerrarSessionModal" class="modal-block modal-block-primary mfp-hide">
										<section class="panel">
											<header class="panel-heading">
												<h2 class="panel-title">Cerrar Sesión</h2>
											</header>
											<div class="panel-body">
												<div class="modal-wrapper">
													<div class="modal-icon">
														<i class="fa fa-question-circle"></i>
													</div>
													<div class="modal-text">
														<h4>Cerrar Sesión</h4>
														<p>¿Está Seguro que desea Cerrar Sesión?</p>
													</div>
												</div>
											</div>
											<footer class="panel-footer">
												<div class="row">
													<div class="col-md-12 text-right">
														<button class="btn btn-primary modal-confirm" type="button"  onclick="myconfirm()" data-dismiss="modal">Aceptar</button>
														<button class="btn btn-default modal-dismiss"  type="button"  onclick="myconfirm2()" data-dismiss="modal">Cancel</button>
													</div>
												</div>
											</footer>
										</section>
									</div>
									<!-- End modal cerrar sesión-->


									



	<style>
	.log{
		border-radius: 0px 45px 45px 3px;
		width: 14%;
		height: 2%;
	}
	.sidebar-left .sidebar-header .sidebar-title {
    color: #7f8c9a;
	}
	</style>
	<!-- start: header -->
    <header class="header">
				<div class="logo-container">
					<a href="<?php echo constant('URL');?>home" class="logo">
						<img src="<?php echo constant('URL');?>src/img/logoo.png" class="log" alt="JSOFT Admin" />
					</a>
					<div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
						<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
					</div>
				</div>
			

			
				<!-- start: search & user box -->
				<div class="header-right">
			
				<!--	<form action="pages-search-results.html" class="search nav-form">
						<div class="input-group input-search">
							<input type="text" class="form-control" name="q" id="q" placeholder="Search...">
							<span class="input-group-btn">
								<button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
							</span>
						</div>
					</form>
			
					<span class="separator"></span>-->
					
					<script> 
                                    var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                                    var diasSemana = new Array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
                                    var f=new Date();
                                    document.write(diasSemana[f.getDay()] + ", " + f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
                                </script> 

					<span class="separator"></span>
			
					<div id="userbox" class="userbox">
						<a href="#" data-toggle="dropdown">
							<figure class="profile-picture">
							<?php  list($pnombre, $snombre) = explode(" ", $_SESSION['nombres']);
								 	   list($papellido, $sapellidos) = explode(" ", $_SESSION['apellidos']);?>


							<?php if(empty($_SESSION['documento'])){ ?>
								<img src="<?php echo constant('URL');?>src/assets/images/!logged-user.jpg" 
								alt="" class="img-circle" 
								data-lock-picture="<?php echo constant('URL');?>src/assets/images/!logged-user.jpg" />
							<?php }else{?>
								<img src="<?php echo constant('URL').$_SESSION['documento'];?>" 
								alt="" class="img-circle" 
								data-lock-picture="<?php echo constant('URL').$_SESSION['documento'];?>" />
							<?php }?>


							</figure>
							<div class="profile-info" data-lock-name="<?php echo $pnombre." ".$papellido;?>" data-lock-email="<?php echo  $_SESSION['correo'];?>">
								<span class="name"><?php echo $pnombre." ".$papellido;?></span>
								<span class="role"><?php echo  $_SESSION['perfil'];?></span>
							</div>
			
							<i class="fa custom-caret"></i>
						</a>
			
						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li class="divider"></li>
								<li>
									<a role="menuitem" tabindex="-1" href="<?php echo constant('URL').'usuario/VerUsuario/'. $_SESSION['id_usuario'].'/1';?>"><i class="fa fa-user"></i> Perfil</a>
								</li>
							<!--	<li>
									<a role="menuitem" tabindex="-1" href="#" data-lock-screen="true"><i class="fa fa-lock"></i> Lock Screen</a>
								</li>-->
								<li>
								<a class="modal-basic" href="#CerrarSessionModal"><i class="fa fa-power-off"></i> Cerrar Sesión</a>
								
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- end: search & user box -->
			</header>
			<!-- end: header -->

			<div class="inner-wrapper">
				<!-- start: sidebar -->
				<aside id="sidebar-left" class="sidebar-left">
				
					<div class="sidebar-header">
						<div class="sidebar-title">
							Navegación
						</div>
						<div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
							<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
						</div>
					</div>
				
					<div class="nano">
						<div class="nano-content">
							<nav id="menu" class="nav-main" role="navigation">
								<ul class="nav nav-main">
									
									
									<li class="">
										<a href="<?php echo constant('URL');?>home">
											<i class="fa fa-home" aria-hidden="true"></i>
											<span>Inicio</span>
										</a>
									</li>
							
								

								<?php if($_SESSION['id_usuario_perfil']=='1'){ // ADMINISTRADOR?>
									<li class="nav-parent">
										<a>
											<i class="fa fa-cog" aria-hidden="true"></i>
											<span>Administración</span>
										</a>
										<ul class="nav nav-children">
										  <li>
												<a href="<?php echo constant('URL');?>admin">
													 Pases
												</a>
											</li>
											<li>
												<a href="<?php echo constant('URL');?>admin/Depart">
													 Departamentos
												</a>
											</li>
											<li>
												<a href="<?php echo constant('URL');?>admin/Anf">
													 Anfitriones
												</a>
											</li>
										
											
										</ul>
									</li>
								

									<li class="nav-parent">
										<a>
											<i class="fa fa-user" aria-hidden="true"></i>
											<span>Usuario</span>
										</a>
										<ul class="nav nav-children">
											
											<li>
												<a href="<?php echo constant('URL');?>usuario/Registro">
													 Nuevo usuario
												</a>
											</li>
											<li>
												<a href="<?php echo constant('URL');?>usuario">
													 Usuarios
												</a>
											</li>
											
										</ul>
									</li>
									<?php } ?>


									<li class="nav-parent">
										<a>
											<i class="fa fa-list-alt" aria-hidden="true"></i>
											<span>Visitante</span>
										</a>
										<ul class="nav nav-children">
											  <li>
												<a href="<?php echo constant('URL');?>visitante/Registro">
													Nuevo visitante
												</a>
											</li>

											<li>
												<a href="<?php echo constant('URL');?>visitante/Verificar">
													 Verificar visitante
												</a>
											</li>
								
											<li>
												<a href="<?php echo constant('URL');?>visitante">
													 Visitantes
												</a>
											</li>
											
										</ul>
									</li>
									


								</ul>
							</nav>
				
							<hr class="separator" />
				
							
				
							<hr class="separator" />
				
							
						</div>
				
					</div>
				
				</aside>
				<!-- end: sidebar -->