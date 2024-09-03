<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\seguridad\usuario\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Usuario Mantenimiento" markupType="html"> -->
		<head>
			<meta http-equiv="Content-Type" content="text/html;charset=utf-8">

	
<?php

 /*
*AVISO LEGAL
(C) Copyright
*Este programa esta protegido por la ley de derechos de autor.
*La reproduccion o distribucion ilicita de este programa o de cualquiera de
*sus partes esta penado por la ley con severas sanciones civiles y penales,
*y seran objeto de todas las sanciones legales que correspondan.

*Su contenido no puede copiarse para fines comerciales o de otras,
*ni puede mostrarse, incluso en una version modificada, en otros sitios Web.
Solo esta permitido colocar hipervinculos al sitio web.
*/

	include_once('com/bydan/framework/contabilidad/util/Constantes.php');
	use com\bydan\framework\contabilidad\util\Constantes;
	
	//include_once('com/bydan/framework/contabilidad/util/Funciones.php');
	//use com\bydan\framework\contabilidad\util\Funciones;
	
	include_once('com/bydan/framework/contabilidad/util/PaqueteTipo.php');
	use com\bydan\framework\contabilidad\util\PaqueteTipo;
	
	include_once('com/bydan/contabilidad/seguridad/usuario/util/usuario_carga.php');
	use com\bydan\contabilidad\seguridad\usuario\util\usuario_carga;
	
	//include_once('com/bydan/contabilidad/seguridad/usuario/presentation/view/usuario_web.php');
	//use com\bydan\contabilidad\seguridad\usuario\presentation\view\usuario_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	usuario_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	usuario_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$usuario_web1= new usuario_web();	
	$usuario_web1->cargarDatosGenerales();
	
	//$moduloActual=$usuario_web1->moduloActual;
	//$usuarioActual=$usuario_web1->usuarioActual;
	//$sessionBase=$usuario_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$usuario_web1->parametroGeneralUsuarioActual;
	
	
		
	//$STR_SUFIJO_ESTILO_LETRA_USUARIO=Funciones::getParametroEstiloTipoLetraUsuario($parametroGeneralUsuarioActual);
?>
		
		
	
		
		<script type="module" src="webroot/js/JavaScript/Library/General/Constantes.js"></script>
		<script type="module" src="webroot/js/JavaScript/Library/Entity/GeneralEntityConstante.js"></script>
		<script type="module" src="webroot/js/JavaScript/Library/Entity/GeneralEntityFuncion.js"></script>
		<script type="module" src="webroot/js/JavaScript/Library/Entity/GeneralEntityWebControl.js"></script>
		<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneral.js"></script>
		<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralEventoJQuery.js"></script>		
		
		<!-- El Templating SOLO funciona con include desde Php -->
		<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/Library/Presentation/Templating/OrderByTemplate.js' ); ?>				
		<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/Library/Presentation/Templating/OrderByRelTemplate.js' ); ?>
		
		<script type="text/javascript" src="webroot/js/JavaScript/Library/Ajax/waiter.js"></script>
		<script type="module" src="webroot/js/JavaScript/Library/Validacion/Validacion.js"></script>
		
		
			
			<!-- El Templating SOLO funciona con include desde Php -->
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/seguridad/usuario/js/templating/usuario_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/seguridad/usuario/js/templating/usuario_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/seguridad/usuario/js/templating/usuario_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/seguridad/usuario/js/templating/usuario_datos_reporte_template.js'); ?>
		
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/seguridad/usuario/js/templating/usuario_datos_relaciones_template.js'); ?>
			
						
		
		
		<?php 
			
		
			usuario_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					usuario_web::$GET_POST=$_GET;
				} else {
					usuario_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			usuario_web::$STR_NOMBRE_PAGINA = 'usuario_view.php';
			usuario_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			usuario_web::$BIT_ES_PAGINA_FORM = 'false';
				
			usuario_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {usuario_constante,usuario_constante1} from './webroot/js/JavaScript/contabilidad/seguridad/usuario/js/util/usuario_constante.js?random=1';
			import {usuario_funcion,usuario_funcion1} from './webroot/js/JavaScript/contabilidad/seguridad/usuario/js/util/usuario_funcion.js?random=1';
			
			let usuario_constante2 = new usuario_constante();
			
			usuario_constante2.STR_NOMBRE_PAGINA="<?php echo(usuario_web::$STR_NOMBRE_PAGINA); ?>";
			usuario_constante2.STR_TYPE_ON_LOADusuario="<?php echo(usuario_web::$STR_TYPE_ONLOAD); ?>";
			usuario_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(usuario_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			usuario_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(usuario_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			usuario_constante2.STR_ACTION="<?php echo(usuario_web::$STR_ACTION); ?>";
			usuario_constante2.STR_ES_POPUP="<?php echo(usuario_web::$STR_ES_POPUP); ?>";
			usuario_constante2.STR_ES_BUSQUEDA="<?php echo(usuario_web::$STR_ES_BUSQUEDA); ?>";
			usuario_constante2.STR_FUNCION_JS="<?php echo(usuario_web::$STR_FUNCION_JS); ?>";
			usuario_constante2.BIG_ID_ACTUAL="<?php echo(usuario_web::$BIG_ID_ACTUAL); ?>";
			usuario_constante2.BIG_ID_OPCION="<?php echo(usuario_web::$BIG_ID_OPCION); ?>";
			usuario_constante2.STR_OBJETO_JS="<?php echo(usuario_web::$STR_OBJETO_JS); ?>";
			usuario_constante2.STR_ES_RELACIONES="<?php echo(usuario_web::$STR_ES_RELACIONES); ?>";
			usuario_constante2.STR_ES_RELACIONADO="<?php echo(usuario_web::$STR_ES_RELACIONADO); ?>";
			usuario_constante2.STR_ES_SUB_PAGINA="<?php echo(usuario_web::$STR_ES_SUB_PAGINA); ?>";
			usuario_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(usuario_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			usuario_constante2.BIT_ES_PAGINA_FORM=<?php echo(usuario_web::$BIT_ES_PAGINA_FORM); ?>;
			usuario_constante2.STR_SUFIJO="<?php echo(usuario_web::$STR_SUF); ?>";//usuario
			usuario_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(usuario_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//usuario
			
			usuario_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(usuario_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			usuario_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($usuario_web1->moduloActual->getnombre()); ?>";
			usuario_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(usuario_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			usuario_constante2.BIT_ES_LOAD_NORMAL=true;
			/*usuario_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			usuario_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.usuario_constante2 = usuario_constante2;
			
		</script>
		
		<?php if(usuario_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
		<script type="text/javascript" src="webroot/js/handlebars-4.7.6/handlebars.min.js"></script>
		
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/jquery-1.10.2.js"></script>
		
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/pluggin/jquery.form.js"></script>
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/pluggin/jquery.popupWindow.js"></script>
		
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/pluggin/jquery.validate.js"></script>		
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/pluggin/jquery.datetimepicker.js"></script>
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/pluggin/jquery.uploadfile.js"></script>
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/pluggin/select2.js"></script>
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/pluggin/DataTables-1.10.0/media/js/jquery.dataTables.js"></script>
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/pluggin/jstree3_0/jstree.js"></script>
		
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/ui/jquery.ui.datepicker.js"></script>
		
		
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/ui/jquery.ui.core.js"></script>
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/ui/jquery.ui.core.js"></script>
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/ui/jquery.ui.effect.js"></script>
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/ui/jquery.ui.widget.js"></script>
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/ui/jquery.ui.tabs.js"></script>
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/ui/jquery.ui.mouse.js"></script>
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/ui/jquery.ui.draggable.js"></script>
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/ui/jquery.ui.position.js"></script>
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/ui/jquery.ui.slider.js"></script>
		
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/ui/jquery.ui.menu.js"></script>
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/ui/jquery.ui.autocomplete.js"></script>
		
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/ui/jquery.ui.resizable.js"></script>
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/ui/jquery.ui.dialog.js"></script>
		
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/ui/jquery.ui.effect-blind.js"></script>
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/ui/jquery.ui.effect-explode.js"></script>
		
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/ui/jquery.ui.button.js"></script>
		
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/ui/jquery.ui.tooltip.js"></script>
		
		<link rel="stylesheet" type="text/css" href="webroot/js/jquery-ui-1.10.4/themes/<?php echo(Constantes::$STR_THEME);?>/jquery-ui.css" type="text/css"/>
		<link rel="stylesheet" type="text/css" href="webroot/js/jquery-ui-1.10.4/themes/<?php echo(Constantes::$STR_THEME);?>/jquery.ui.theme.css" type="text/css"/>
		<link rel="stylesheet" type="text/css" href="webroot/js/jquery-ui-1.10.4/pluggin/jquery.datetimepicker.css" type="text/css"/>
		<link rel="stylesheet" type="text/css" href="webroot/js/jquery-ui-1.10.4/pluggin/uploadfile.css" type="text/css"/>
		<link rel="stylesheet" type="text/css" href="webroot/js/jquery-ui-1.10.4/pluggin/select2.css" type="text/css"/>		
		<link rel="stylesheet" type="text/css" href="webroot/js/jquery-ui-1.10.4/pluggin/DataTables-1.10.0/media/css/jquery.dataTables.css" type="text/css"/>
		<link rel="stylesheet" type="text/css" href="webroot/js/jquery-ui-1.10.4/pluggin/DataTables-1.10.0/media/css/dataTables.jqueryui.css" type="text/css"/>
		<link rel="stylesheet" type="text/css" href="webroot/js/jquery-ui-1.10.4/pluggin/jstree3_0/themes/default/style.css" type="text/css"/>
		
		<script type="text/javascript">
		</script>
		
		
		
		
		<?php if(!Constantes::$BIT_CON_CSS_PHP) {?>
		
		<link rel="stylesheet" type="text/css" href="webroot/scss/pagina.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="webroot/scss/general.css" media="screen" />		
		
		
		<link rel="stylesheet" href="webroot/css/bootstrap5/bootstrap.min.css" type="text/css"/>
		<script type="text/javascript" src="webroot/js/bootstrap5/bootstrap.bundle.min.js"></script>

		<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous"> -->
		<!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script> -->
		<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script> -->	
		
		<?php } else { /*NO ES USADO, TALVEZ SE DEJA*/ ?>
		
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_layout.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_shared.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.usuario_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.usuario_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="usuarioActual" ></a>
	
	<div id="divResumenusuarioActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(usuario_web::$STR_ES_RELACIONADO=='false') {?>
		
		<div id="header" >
		
			<div id="banner">
				<span id="spanTituloBanner" class="titulobanner"></span>
			</div> <!-- banner -->
					
			<div id="subheader" class="links">  
			
						<div id="divOpcionesBanner" >
								<!-- <jsp:include page="/Component/header.jsp" /> -->
						</div>						
						
			</div> <!-- sub-header -->
			
			
		</div> <!-- header -->
		
		<?php } ?>
		
		<div id="main">
		

			<?php if(usuario_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(usuario_web::$STR_ES_BUSQUEDA=='false' && usuario_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(usuario_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(usuario_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(usuario_web::$STR_ES_RELACIONADO=='false' && usuario_web::$STR_ES_POPUP=='false' && usuario_web::$STR_ES_SUB_PAGINA=='false') {?>
						<td align="left" style="width: 3%">
							<img id="imgIrMain" style="visibility:visible;text-align: center" src="/contabilidad0/webroot/img/Imagenes/ir_main.gif" title="IR A ARBOL DE OPCIONES PRINCIPAL" width="25" height="25"  onclick="funcionGeneral.irWindowAuxiliar('MENU PRINCIPAL','view=Main&action=index&typeonload=onloadhijos')"/>
						</td>
						<td align="left" style="width: 3%">
							<img id="imgCerrarSesion" style="visibility:visible;text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar_sesion.gif" title="CERRAR SESION" width="25" height="25"/>
						</td>
						<?php }?>
						<td id="tdToolBar" align="center" style="width: 70%">
							<!-- SECCION/TOOLBAR -->
							<table id="tblToolBar">
								<tr>
									<td id="tdusuarioNuevoToolBar">
										<img id="imgNuevoToolBarusuario" name="imgNuevoToolBarusuario" title="Nuevo Usuario" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(usuario_web::$STR_ES_BUSQUEDA=='false' && usuario_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdusuarioNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBarusuario" name="imgNuevoGuardarCambiosToolBarusuario" title="Nuevo TABLA Usuario" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(usuario_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdusuarioGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBarusuario" name="imgGuardarCambiosToolBarusuario" title="Guardar Usuario" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(usuario_web::$STR_ES_RELACIONADO=='false' && usuario_web::$STR_ES_RELACIONES=='false' && usuario_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdusuarioCopiarToolBar">
										<img id="imgCopiarToolBarusuario" name="imgCopiarToolBarusuario" title="Copiar Usuario" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdusuarioDuplicarToolBar">
										<img id="imgDuplicarToolBarusuario" name="imgDuplicarToolBarusuario" title="Duplicar Usuario" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(usuario_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdusuarioRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBarusuario" name="imgRecargarInformacionToolBarusuario" title="Recargar Usuario" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdusuarioAnterioresToolBar">
										<img id="imgAnterioresToolBarusuario" name="imgAnterioresToolBarusuario" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdusuarioSiguientesToolBar">
										<img id="imgSiguientesToolBarusuario" name="imgSiguientesToolBarusuario" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdusuarioAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBarusuario" name="imgAbrirOrderByToolBarusuario" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((usuario_web::$STR_ES_RELACIONADO=='false' && usuario_web::$STR_ES_RELACIONES=='false') || usuario_web::$STR_ES_BUSQUEDA=='true'  || usuario_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdusuarioCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBarusuario" name="imgCerrarPaginaToolBarusuario" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
									</td>
									<?php } ?>
								</tr>
							</table> <!-- tblToolBar -->
						</td> <!-- tdToolBar -->
						<td id="tdControlesSecciones" align="center" style="width: 20%">
							<a id="ControlesSecciones" ></a>

							<img id="imgAreaBusquedas" align="right" style="visibility:hidden" src="/contabilidad0/webroot/img/Imagenes/busqueda.gif" width="20" height="20"  onclick="funcionGeneral.irAreaDePagina('Busquedas')"/>
							<img id="imgAreaControles" align="right" style="visibility:hidden" src="/contabilidad0/webroot/img/Imagenes/controles.gif" width="20" height="20"  onclick="funcionGeneral.irAreaDePagina('Campos')"/>
							<img id="imgAreaAcciones" align="right" style="visibility:hidden" src="/contabilidad0/webroot/img/Imagenes/acciones.gif" width="20" height="20"  onclick="funcionGeneral.irAreaDePagina('Acciones')"/>
							<img id="imgAtras" align="right" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/atras.gif" width="20" height="20"  onclick="history.back()"/>
						</td> <!-- tdControlesSecciones -->
					</tr> <!-- trExpandirColapsar -->
				</table> <!-- tblExpandirColapsar -->
			</form> <!-- frmExpandirColapsar -->
		</td>
	</tr> <!-- trNavegacion/super -->
	<?php } ?> 
	
		
		<tr id="trusuarioCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedausuario" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedausuario',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trusuarioCabeceraBusquedas/super -->

		<tr id="trBusquedausuario" class="busqueda" style="display:table-row">
			<td id="tdBusquedausuario" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedausuario" name="frmBusquedausuario">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedausuario" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trusuarioBusquedas" class="busqueda" style="display:table-row"><td>
				<?php if(usuario_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 70%">
					<ul>
						<li id="listrVisibleBusquedaPorNombre" class="titulotab" style="display:table-row"><a href="#divstrVisibleBusquedaPorNombre"> Por Nombre Completo</a></li>
						<li id="listrVisibleBusquedaPorUserName" class="titulotab" style="display:table-row"><a href="#divstrVisibleBusquedaPorUserName"> Por Nombre De Usuario</a></li>
					</ul>
				
					<div id="divstrVisibleBusquedaPorNombre">
					<table id="tblstrVisibleBusquedaPorNombre" class="busqueda">
					
						<tr>
						<td class="busquedatitulocampo"><span  class="busquedatitulocampo">Nombre Completo</span>
						</td>
						<td align="center">
							<input id="BusquedaPorNombre-txtnombre" name="BusquedaPorNombre-txtnombre" type="text" class="form-control"  placeholder="Nombre Completo"  title="Nombre Completo"   size="20" >

						</td>
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarusuarioBusquedaPorNombre" name="btnBuscarusuarioBusquedaPorNombre" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleBusquedaPorUserName">
					<table id="tblstrVisibleBusquedaPorUserName" class="busqueda">
					
						<tr>
						<td class="busquedatitulocampo"><span  class="busquedatitulocampo">Nombre De Usuario</span>
						</td>
						<td align="center">
							<input id="BusquedaPorUserName-txtuser_name" name="BusquedaPorUserName-txtuser_name" type="text" class="form-control"  placeholder="Nombre De Usuario"  title="Nombre De Usuario"   size="20" >

						</td>
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarusuarioBusquedaPorUserName" name="btnBuscarusuarioBusquedaPorUserName" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscarusuario" style="display:table-row">
					<td id="tdParamsBuscarusuario">
		<?php if(usuario_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscarusuario">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistrosusuario" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistrosusuario"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistrosusuario" name="ParamsBuscar-txtNumeroRegistrosusuario" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacionusuario">
							<td id="tdGenerarReporteusuario" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodosusuario" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodosusuario" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacionusuario" name="btnRecargarInformacionusuario" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
										</td>
										<td>
											<select id="ParamsBuscar-cmbPaginacion" name="ParamsBuscar-cmbPaginacion" title="TIPOS DE PAGINACION" style="width:100px"></select>
											<input id="ParamsBuscar-chbConPaginacionInterna" name="ParamsBuscar-chbConPaginacionInterna" title="CON PAGINACION INTERNA" type="checkbox"></input>
										</td>
										<td>
											<label>
												<input id="ParamsBuscar-chbConAltoMaximoTabla" name="ParamsBuscar-chbConAltoMaximoTabla" title="CON ALTO MAXIMO DE TABLA" type="checkbox" checked></input>Alt Max.
											</label>
										</td>							
										<td>							
											<select id="ParamsBuscar-cmbGenerarReporte" name="ParamsBuscar-cmbGenerarReporte" title="TIPOS IMPRESION DE REPORTES" style="width:100px"></select>							
											<input id="ParamsBuscar-chbConReportico" name="ParamsBuscar-chbConReportico" title="CON REPORTICO" type="checkbox">							
										</td>							
										<td>							
											<select id="ParamsBuscar-cmbTiposReporte" name="ParamsBuscar-cmbTiposReporte" title="TIPOS DE REPORTES" style="width:100px"></select>							
										</td>							
										<td>							
											<input type="button" id="btnImprimirPaginausuario" name="btnImprimirPaginausuario" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*usuario_web::$STR_ES_BUSQUEDA=='false'  &&*/ usuario_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderByusuario">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderByusuario" name="btnOrderByusuario" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
													</td>
													<td>
														<input type="button" id="btnOrderByRelusuario" name="btnOrderByRelusuario" title="RELACIONES DE DATOS" value="   Rels" class="btn btn-primary"/>
													</td>
												</tr>
											</table>
										</td>
										<td>
											<select id="ParamsBuscar-cmbTiposColumnasSelect" name="ParamsBuscar-cmbTiposColumnasSelect" title="TIPOS DE COLUMNAS DE TABLA" style="width:125px"></select>
											<label>
												<input id="ParamsBuscar-chbParaActualizarFk" name="ParamsBuscar-chbParaActualizarFk" title="ABRIR VENTANA ACTUALIZAR DATOS RELACIONADOS" type="checkbox">
											</label>
										</td>
										<td>
											<label>
												<input id="ParamsBuscar-chbSelTodos" name="ParamsBuscar-chbSelTodos" title="SELECCIONAR TODOS LOS REGISTROS" type="checkbox">Sel.Todos
											</label>
										</td>

										<?php if(usuario_web::$STR_ES_RELACIONES=='false' && usuario_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbTiposRelaciones" name="ParamsBuscar-cmbTiposRelaciones" title="TIPOS DE RELACIONES" style="width:150px"></select>
										</td>
										<?php } ?>

										<?php if(usuario_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdusuarioConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodosusuario -->

							</td><!-- tdGenerarReporteusuario -->
						</tr><!-- trRecargarInformacionusuario -->
					</table><!-- tblParamsBuscarNumeroRegistrosusuario -->
				</div> <!-- divParamsBuscarusuario -->
		<?php } ?>
				</td> <!-- tdParamsBuscarusuario -->
				</tr><!-- trParamsBuscarusuario -->
				</table> <!-- tblBusquedausuario -->
				</form> <!-- frmBusquedausuario -->
				

			</td> <!-- tdBusquedausuario -->
		</tr> <!-- trBusquedausuario/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(usuario_web::$STR_ES_RELACIONADO=='false' ) {?>

		<!-- SECCION/MENSAJE -->
		<div id="divMensajePage" class="ui-state-highlight ui-corner-all" style="display:none;margin-top: 20px; padding: 0 .7em;">
			<p id="parrMensajePage">
				<span id="spanIcoMensajePage" class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span>
				<span id="spanMensajePage"></span>
			</p>
		</div> <!-- divMensajePage -->

		<div id="divMensajePageDialog" title="Mensaje" class="ui-state-highlight ui-corner-all">
			<p id="parrMensajePageDialog">
				<span id="spanIcoMensajePageDialog" class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span>
				<span id="spanMensajePageDialog"></span>
			</p>
		</div> <!-- divMensajePageDialog -->
<?php }?>

		<div id="divusuarioPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblusuarioPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmusuarioAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnusuarioAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="usuario_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnusuarioAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmusuarioAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblusuarioPopupAjaxWebPart -->
		</div> <!-- divusuarioPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(usuario_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trusuarioTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdausuario"></a>
		<img id="imgTablaParaDerechausuario" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechausuario'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdausuario" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdausuario'"/>
		<a id="TablaDerechausuario"></a>
	</td>
</tr> <!-- trusuarioTablaNavegacion/super -->
<?php } ?>

<tr id="trusuarioTablaDatos">
	<td colspan="3" id="htmlTableCellusuario">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatosusuariosAjaxWebPart">
		</div>
	</td>
</tr> <!-- trusuarioTablaDatos/super -->
		
		
		<tr id="trusuarioPaginacion" style="display:table-row">
			<td id="tdusuarioPaginacion" align="center">
				<div id="divusuarioPaginacionAjaxWebPart">
				<form id="frmPaginacionusuario" name="frmPaginacionusuario">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacionusuario" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:center">
					<tr>
						<?php if(usuario_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkusuario" name="btnSeleccionarLoteFkusuario" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(usuario_web::$STR_ES_RELACIONADO=='false' /*&& usuario_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnterioresusuario" name="btnAnterioresusuario" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(usuario_web::$STR_ES_BUSQUEDA=='false' && usuario_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdusuarioNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPrepararusuario" name="btnNuevoTablaPrepararusuario" title="NUEVO Usuario" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablausuario" name="ParamsPaginar-txtNumeroNuevoTablausuario" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(usuario_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdusuarioConEditarusuario">
							<label>
								<input id="ParamsBuscar-chbConEditarusuario" name="ParamsBuscar-chbConEditarusuario" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(usuario_web::$STR_ES_RELACIONADO=='false'/* && usuario_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientesusuario" name="btnSiguientesusuario" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacionusuario -->
				</form> <!-- frmPaginacionusuario -->
				<form id="frmNuevoPrepararusuario" name="frmNuevoPrepararusuario">
				<table id="tblNuevoPrepararusuario" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:center">
					<tr id="trusuarioNuevo" height="10">
						<?php if(usuario_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdusuarioNuevo" align="center">
							<input type="button" id="btnNuevoPrepararusuario" name="btnNuevoPrepararusuario" title="NUEVO Usuario" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdusuarioGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambiosusuario" name="btnGuardarCambiosusuario" title="GUARDAR Usuario" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(usuario_web::$STR_ES_RELACIONADO=='false' && usuario_web::$STR_ES_RELACIONES=='false' && usuario_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdusuarioDuplicar" align="center">
							<input type="button" id="btnDuplicarusuario" name="btnDuplicarusuario" title="DUPLICAR Usuario" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdusuarioCopiar" align="center">
							<input type="button" id="btnCopiarusuario" name="btnCopiarusuario" title="COPIAR Usuario" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(usuario_web::$STR_ES_RELACIONADO=='false' && ((usuario_web::$STR_ES_RELACIONADO=='false' && usuario_web::$STR_ES_RELACIONES=='false') || usuario_web::$STR_ES_BUSQUEDA=='true'  || usuario_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdusuarioCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginausuario" name="btnCerrarPaginausuario" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPrepararusuario -->
				</form> <!-- frmNuevoPrepararusuario -->
				</div> <!-- divusuarioPaginacionAjaxWebPart -->
			</td> <!-- tdusuarioPaginacion -->
		</tr> <!-- trusuarioPaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(usuario_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionesusuarioAjaxWebPart">
			<td id="tdAccionesRelacionesusuarioAjaxWebPart">
				<div id="divAccionesRelacionesusuarioAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionesusuarioAjaxWebPart -->
		</tr> <!-- trAccionesRelacionesusuarioAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderByusuario">
			<td id="tdOrderByusuario">
				<form id="frmOrderByusuario" name="frmOrderByusuario">
					<div id="divOrderByusuarioAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
				<form id="frmOrderByRelusuario" name="frmOrderByRelusuario">
					<div id="divOrderByRelusuarioAjaxWebPart" title="RELACIONES" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderByusuario -->
		</tr> <!-- trOrderByusuario/super -->
			
		
		
		
		
		
	</table> <!-- super -->
	
		
	
			</div> <!-- content -->    

			


    	</div> <!-- main -->
	
 	</div> <!-- outerborder -->	
	
	
		<?php 
			if(array_key_exists('typeonload',$_REQUEST) && $_REQUEST['typeonload']!=null && $_REQUEST['typeonload']=='onloadhijos') {
		?>
		
		<?php 
			}
		?>	
		
		
		
		
				
				<script type="module">
			
				import {usuario_webcontrol,usuario_webcontrol1} from './webroot/js/JavaScript/contabilidad/seguridad/usuario/js/webcontrol/usuario_webcontrol.js?random=1';
				
				usuario_webcontrol1.setusuario_constante(window.usuario_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(usuario_web::$STR_ES_RELACIONADO=='false') {?>
	
	
	<?php 
		if(Constantes::$BIT_CON_ARBOL_MENU) { 
			 /*$tree->writeJavascript();*/ 		
		}	
	?>
	

	
	<?php }?>



	<!-- <div name="footer"> -->    
	<!-- </div> -->
</body>

</html>

