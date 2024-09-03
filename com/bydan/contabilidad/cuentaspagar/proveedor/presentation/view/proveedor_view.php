<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\cuentaspagar\proveedor\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Proveedor Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/cuentaspagar/proveedor/util/proveedor_carga.php');
	use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_carga;
	
	//include_once('com/bydan/contabilidad/cuentaspagar/proveedor/presentation/view/proveedor_web.php');
	//use com\bydan\contabilidad\cuentaspagar\proveedor\presentation\view\proveedor_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	proveedor_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	proveedor_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$proveedor_web1= new proveedor_web();	
	$proveedor_web1->cargarDatosGenerales();
	
	//$moduloActual=$proveedor_web1->moduloActual;
	//$usuarioActual=$proveedor_web1->usuarioActual;
	//$sessionBase=$proveedor_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$proveedor_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentaspagar/proveedor/js/templating/proveedor_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentaspagar/proveedor/js/templating/proveedor_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentaspagar/proveedor/js/templating/proveedor_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentaspagar/proveedor/js/templating/proveedor_datos_reporte_template.js'); ?>
		
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentaspagar/proveedor/js/templating/proveedor_datos_relaciones_template.js'); ?>
			
						
		
		
		<?php 
			
		
			proveedor_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					proveedor_web::$GET_POST=$_GET;
				} else {
					proveedor_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			proveedor_web::$STR_NOMBRE_PAGINA = 'proveedor_view.php';
			proveedor_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			proveedor_web::$BIT_ES_PAGINA_FORM = 'false';
				
			proveedor_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {proveedor_constante,proveedor_constante1} from './webroot/js/JavaScript/contabilidad/cuentaspagar/proveedor/js/util/proveedor_constante.js?random=1';
			import {proveedor_funcion,proveedor_funcion1} from './webroot/js/JavaScript/contabilidad/cuentaspagar/proveedor/js/util/proveedor_funcion.js?random=1';
			
			let proveedor_constante2 = new proveedor_constante();
			
			proveedor_constante2.STR_NOMBRE_PAGINA="<?php echo(proveedor_web::$STR_NOMBRE_PAGINA); ?>";
			proveedor_constante2.STR_TYPE_ON_LOADproveedor="<?php echo(proveedor_web::$STR_TYPE_ONLOAD); ?>";
			proveedor_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(proveedor_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			proveedor_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(proveedor_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			proveedor_constante2.STR_ACTION="<?php echo(proveedor_web::$STR_ACTION); ?>";
			proveedor_constante2.STR_ES_POPUP="<?php echo(proveedor_web::$STR_ES_POPUP); ?>";
			proveedor_constante2.STR_ES_BUSQUEDA="<?php echo(proveedor_web::$STR_ES_BUSQUEDA); ?>";
			proveedor_constante2.STR_FUNCION_JS="<?php echo(proveedor_web::$STR_FUNCION_JS); ?>";
			proveedor_constante2.BIG_ID_ACTUAL="<?php echo(proveedor_web::$BIG_ID_ACTUAL); ?>";
			proveedor_constante2.BIG_ID_OPCION="<?php echo(proveedor_web::$BIG_ID_OPCION); ?>";
			proveedor_constante2.STR_OBJETO_JS="<?php echo(proveedor_web::$STR_OBJETO_JS); ?>";
			proveedor_constante2.STR_ES_RELACIONES="<?php echo(proveedor_web::$STR_ES_RELACIONES); ?>";
			proveedor_constante2.STR_ES_RELACIONADO="<?php echo(proveedor_web::$STR_ES_RELACIONADO); ?>";
			proveedor_constante2.STR_ES_SUB_PAGINA="<?php echo(proveedor_web::$STR_ES_SUB_PAGINA); ?>";
			proveedor_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(proveedor_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			proveedor_constante2.BIT_ES_PAGINA_FORM=<?php echo(proveedor_web::$BIT_ES_PAGINA_FORM); ?>;
			proveedor_constante2.STR_SUFIJO="<?php echo(proveedor_web::$STR_SUF); ?>";//proveedor
			proveedor_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(proveedor_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//proveedor
			
			proveedor_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(proveedor_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			proveedor_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($proveedor_web1->moduloActual->getnombre()); ?>";
			proveedor_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(proveedor_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			proveedor_constante2.BIT_ES_LOAD_NORMAL=true;
			/*proveedor_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			proveedor_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.proveedor_constante2 = proveedor_constante2;
			
		</script>
		
		<?php if(proveedor_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.proveedor_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.proveedor_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="proveedorActual" ></a>
	
	<div id="divResumenproveedorActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(proveedor_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(proveedor_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(proveedor_web::$STR_ES_BUSQUEDA=='false' && proveedor_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(proveedor_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(proveedor_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(proveedor_web::$STR_ES_RELACIONADO=='false' && proveedor_web::$STR_ES_POPUP=='false' && proveedor_web::$STR_ES_SUB_PAGINA=='false') {?>
						<td align="left" style="width: 3%">
							<img id="imgIrMain" style="visibility:visible;text-align: center" src="/contabilidad0/webroot/img/Imagenes/ir_main.gif" title="IR A ARBOL DE OPCIONES PRINCIPAL" width="25" height="25"  onclick="funcionGeneral.irWindowAuxiliar('MENU PRINCIPAL','view=Main&action=index&typeonload=onloadhijos')"/>
						</td>
						<td align="left" style="width: 3%">
							<img id="imgCerrarSesion" style="visibility:visible;text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar_sesion.gif" title="CERRAR SESION" width="25" height="25"/>
						</td>
						<?php }?>
						<td id="tdToolBar" align="left" style="width: 70%">
							<!-- SECCION/TOOLBAR -->
							<table id="tblToolBar">
								<tr>
									<td id="tdproveedorNuevoToolBar">
										<img id="imgNuevoToolBarproveedor" name="imgNuevoToolBarproveedor" title="Nuevo Proveedor" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(proveedor_web::$STR_ES_BUSQUEDA=='false' && proveedor_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdproveedorNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBarproveedor" name="imgNuevoGuardarCambiosToolBarproveedor" title="Nuevo TABLA Proveedor" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(proveedor_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdproveedorGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBarproveedor" name="imgGuardarCambiosToolBarproveedor" title="Guardar Proveedor" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(proveedor_web::$STR_ES_RELACIONADO=='false' && proveedor_web::$STR_ES_RELACIONES=='false' && proveedor_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdproveedorCopiarToolBar">
										<img id="imgCopiarToolBarproveedor" name="imgCopiarToolBarproveedor" title="Copiar Proveedor" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdproveedorDuplicarToolBar">
										<img id="imgDuplicarToolBarproveedor" name="imgDuplicarToolBarproveedor" title="Duplicar Proveedor" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(proveedor_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdproveedorRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBarproveedor" name="imgRecargarInformacionToolBarproveedor" title="Recargar Proveedor" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdproveedorAnterioresToolBar">
										<img id="imgAnterioresToolBarproveedor" name="imgAnterioresToolBarproveedor" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdproveedorSiguientesToolBar">
										<img id="imgSiguientesToolBarproveedor" name="imgSiguientesToolBarproveedor" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdproveedorAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBarproveedor" name="imgAbrirOrderByToolBarproveedor" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((proveedor_web::$STR_ES_RELACIONADO=='false' && proveedor_web::$STR_ES_RELACIONES=='false') || proveedor_web::$STR_ES_BUSQUEDA=='true'  || proveedor_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdproveedorCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBarproveedor" name="imgCerrarPaginaToolBarproveedor" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trproveedorCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedaproveedor" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedaproveedor',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trproveedorCabeceraBusquedas/super -->

		<tr id="trBusquedaproveedor" class="busqueda" style="display:table-row">
			<td id="tdBusquedaproveedor" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedaproveedor" name="frmBusquedaproveedor">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedaproveedor" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trproveedorBusquedas" class="busqueda" style="display:table-row"><td>
				<?php if(proveedor_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 95%">
					<ul>
						<li id="listrVisibleFK_Idcategoria_proveedor" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idcategoria_proveedor"> Por Categoria</a></li>
						<li id="listrVisibleFK_Idciudad" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idciudad"> Por Ciudad</a></li>
						<li id="listrVisibleFK_Idcuenta" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idcuenta"> Por Cuenta</a></li>
						<li id="listrVisibleFK_Idgiro_negocio_proveedor" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idgiro_negocio_proveedor"> Por Giro Negocio</a></li>
						<li id="listrVisibleFK_Idimpuesto" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idimpuesto"> Por Impuesto</a></li>
						<li id="listrVisibleFK_Idotro_impuesto" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idotro_impuesto"> Por  Otro Impuesto</a></li>
						<li id="listrVisibleFK_Idpais" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idpais"> Por Pais</a></li>
						<li id="listrVisibleFK_Idprovincia" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idprovincia"> Por Provincia</a></li>
						<li id="listrVisibleFK_Idretencion" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idretencion"> Por Retencion</a></li>
						<li id="listrVisibleFK_Idretencion_fuente" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idretencion_fuente"> Por  Retencion Fuente</a></li>
						<li id="listrVisibleFK_Idretencion_ica" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idretencion_ica"> Por  Retencion Ica</a></li>
						<li id="listrVisibleFK_Idtermino_pago_proveedor" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idtermino_pago_proveedor"> Por Termino Pago</a></li>
						<li id="listrVisibleFK_Idtipo_persona" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idtipo_persona"> Por  Tipo Persona</a></li>
						<li id="listrVisibleFK_Idvendedor" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idvendedor"> Por Vendedor</a></li>
					</ul>
				
					<div id="divstrVisibleFK_Idcategoria_proveedor">
					<table id="tblstrVisibleFK_Idcategoria_proveedor" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Categoria</span>
						</td>
						<td align="center">
							<select id="FK_Idcategoria_proveedor-cmbid_categoria_proveedor" name="FK_Idcategoria_proveedor-cmbid_categoria_proveedor" title="Categoria" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarproveedorFK_Idcategoria_proveedor" name="btnBuscarproveedorFK_Idcategoria_proveedor" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idciudad">
					<table id="tblstrVisibleFK_Idciudad" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Ciudad</span>
						</td>
						<td align="center">
							<select id="FK_Idciudad-cmbid_ciudad" name="FK_Idciudad-cmbid_ciudad" title="Ciudad" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarproveedorFK_Idciudad" name="btnBuscarproveedorFK_Idciudad" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idcuenta">
					<table id="tblstrVisibleFK_Idcuenta" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Cuenta</span>
						</td>
						<td align="center">
							<select id="FK_Idcuenta-cmbid_cuenta" name="FK_Idcuenta-cmbid_cuenta" title="Cuenta" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarproveedorFK_Idcuenta" name="btnBuscarproveedorFK_Idcuenta" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idgiro_negocio_proveedor">
					<table id="tblstrVisibleFK_Idgiro_negocio_proveedor" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Giro Negocio</span>
						</td>
						<td align="center">
							<select id="FK_Idgiro_negocio_proveedor-cmbid_giro_negocio_proveedor" name="FK_Idgiro_negocio_proveedor-cmbid_giro_negocio_proveedor" title="Giro Negocio" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarproveedorFK_Idgiro_negocio_proveedor" name="btnBuscarproveedorFK_Idgiro_negocio_proveedor" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idimpuesto">
					<table id="tblstrVisibleFK_Idimpuesto" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Impuesto</span>
						</td>
						<td align="center">
							<select id="FK_Idimpuesto-cmbid_impuesto" name="FK_Idimpuesto-cmbid_impuesto" title="Impuesto" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarproveedorFK_Idimpuesto" name="btnBuscarproveedorFK_Idimpuesto" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idotro_impuesto">
					<table id="tblstrVisibleFK_Idotro_impuesto" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo"> Otro Impuesto</span>
						</td>
						<td align="center">
							<select id="FK_Idotro_impuesto-cmbid_otro_impuesto" name="FK_Idotro_impuesto-cmbid_otro_impuesto" title=" Otro Impuesto" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarproveedorFK_Idotro_impuesto" name="btnBuscarproveedorFK_Idotro_impuesto" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idpais">
					<table id="tblstrVisibleFK_Idpais" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Pais</span>
						</td>
						<td align="center">
							<select id="FK_Idpais-cmbid_pais" name="FK_Idpais-cmbid_pais" title="Pais" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarproveedorFK_Idpais" name="btnBuscarproveedorFK_Idpais" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idprovincia">
					<table id="tblstrVisibleFK_Idprovincia" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Provincia</span>
						</td>
						<td align="center">
							<select id="FK_Idprovincia-cmbid_provincia" name="FK_Idprovincia-cmbid_provincia" title="Provincia" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarproveedorFK_Idprovincia" name="btnBuscarproveedorFK_Idprovincia" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idretencion">
					<table id="tblstrVisibleFK_Idretencion" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Retencion</span>
						</td>
						<td align="center">
							<select id="FK_Idretencion-cmbid_retencion" name="FK_Idretencion-cmbid_retencion" title="Retencion" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarproveedorFK_Idretencion" name="btnBuscarproveedorFK_Idretencion" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idretencion_fuente">
					<table id="tblstrVisibleFK_Idretencion_fuente" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo"> Retencion Fuente</span>
						</td>
						<td align="center">
							<select id="FK_Idretencion_fuente-cmbid_retencion_fuente" name="FK_Idretencion_fuente-cmbid_retencion_fuente" title=" Retencion Fuente" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarproveedorFK_Idretencion_fuente" name="btnBuscarproveedorFK_Idretencion_fuente" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idretencion_ica">
					<table id="tblstrVisibleFK_Idretencion_ica" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo"> Retencion Ica</span>
						</td>
						<td align="center">
							<select id="FK_Idretencion_ica-cmbid_retencion_ica" name="FK_Idretencion_ica-cmbid_retencion_ica" title=" Retencion Ica" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarproveedorFK_Idretencion_ica" name="btnBuscarproveedorFK_Idretencion_ica" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idtermino_pago_proveedor">
					<table id="tblstrVisibleFK_Idtermino_pago_proveedor" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Termino Pago</span>
						</td>
						<td align="center">
							<select id="FK_Idtermino_pago_proveedor-cmbid_termino_pago_proveedor" name="FK_Idtermino_pago_proveedor-cmbid_termino_pago_proveedor" title="Termino Pago" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarproveedorFK_Idtermino_pago_proveedor" name="btnBuscarproveedorFK_Idtermino_pago_proveedor" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idtipo_persona">
					<table id="tblstrVisibleFK_Idtipo_persona" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo"> Tipo Persona</span>
						</td>
						<td align="center">
							<select id="FK_Idtipo_persona-cmbid_tipo_persona" name="FK_Idtipo_persona-cmbid_tipo_persona" title=" Tipo Persona" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarproveedorFK_Idtipo_persona" name="btnBuscarproveedorFK_Idtipo_persona" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idvendedor">
					<table id="tblstrVisibleFK_Idvendedor" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Vendedor</span>
						</td>
						<td align="center">
							<select id="FK_Idvendedor-cmbid_vendedor" name="FK_Idvendedor-cmbid_vendedor" title="Vendedor" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarproveedorFK_Idvendedor" name="btnBuscarproveedorFK_Idvendedor" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscarproveedor" style="display:table-row">
					<td id="tdParamsBuscarproveedor">
		<?php if(proveedor_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscarproveedor">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistrosproveedor" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistrosproveedor"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistrosproveedor" name="ParamsBuscar-txtNumeroRegistrosproveedor" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacionproveedor">
							<td id="tdGenerarReporteproveedor" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodosproveedor" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodosproveedor" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacionproveedor" name="btnRecargarInformacionproveedor" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginaproveedor" name="btnImprimirPaginaproveedor" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*proveedor_web::$STR_ES_BUSQUEDA=='false'  &&*/ proveedor_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderByproveedor">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderByproveedor" name="btnOrderByproveedor" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
													</td>
													<td>
														<input type="button" id="btnOrderByRelproveedor" name="btnOrderByRelproveedor" title="RELACIONES DE DATOS" value="   Rels" class="btn btn-primary"/>
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

										<?php if(proveedor_web::$STR_ES_RELACIONES=='false' && proveedor_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbTiposRelaciones" name="ParamsBuscar-cmbTiposRelaciones" title="TIPOS DE RELACIONES" style="width:150px"></select>
										</td>
										<?php } ?>

										<?php if(proveedor_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdproveedorConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodosproveedor -->

							</td><!-- tdGenerarReporteproveedor -->
						</tr><!-- trRecargarInformacionproveedor -->
					</table><!-- tblParamsBuscarNumeroRegistrosproveedor -->
				</div> <!-- divParamsBuscarproveedor -->
		<?php } ?>
				</td> <!-- tdParamsBuscarproveedor -->
				</tr><!-- trParamsBuscarproveedor -->
				</table> <!-- tblBusquedaproveedor -->
				</form> <!-- frmBusquedaproveedor -->
				

			</td> <!-- tdBusquedaproveedor -->
		</tr> <!-- trBusquedaproveedor/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(proveedor_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divproveedorPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblproveedorPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmproveedorAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnproveedorAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="proveedor_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnproveedorAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmproveedorAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblproveedorPopupAjaxWebPart -->
		</div> <!-- divproveedorPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(proveedor_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trproveedorTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdaproveedor"></a>
		<img id="imgTablaParaDerechaproveedor" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechaproveedor'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdaproveedor" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdaproveedor'"/>
		<a id="TablaDerechaproveedor"></a>
	</td>
</tr> <!-- trproveedorTablaNavegacion/super -->
<?php } ?>

<tr id="trproveedorTablaDatos">
	<td colspan="3" id="htmlTableCellproveedor">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatosproveedorsAjaxWebPart">
		</div>
	</td>
</tr> <!-- trproveedorTablaDatos/super -->
		
		
		<tr id="trproveedorPaginacion" style="display:table-row">
			<td id="tdproveedorPaginacion" align="left">
				<div id="divproveedorPaginacionAjaxWebPart">
				<form id="frmPaginacionproveedor" name="frmPaginacionproveedor">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacionproveedor" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:left">
					<tr>
						<?php if(proveedor_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkproveedor" name="btnSeleccionarLoteFkproveedor" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(proveedor_web::$STR_ES_RELACIONADO=='false' /*&& proveedor_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnterioresproveedor" name="btnAnterioresproveedor" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(proveedor_web::$STR_ES_BUSQUEDA=='false' && proveedor_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdproveedorNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPrepararproveedor" name="btnNuevoTablaPrepararproveedor" title="NUEVO Proveedor" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablaproveedor" name="ParamsPaginar-txtNumeroNuevoTablaproveedor" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(proveedor_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdproveedorConEditarproveedor">
							<label>
								<input id="ParamsBuscar-chbConEditarproveedor" name="ParamsBuscar-chbConEditarproveedor" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(proveedor_web::$STR_ES_RELACIONADO=='false'/* && proveedor_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientesproveedor" name="btnSiguientesproveedor" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacionproveedor -->
				</form> <!-- frmPaginacionproveedor -->
				<form id="frmNuevoPrepararproveedor" name="frmNuevoPrepararproveedor">
				<table id="tblNuevoPrepararproveedor" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:left">
					<tr id="trproveedorNuevo" height="10">
						<?php if(proveedor_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdproveedorNuevo" align="center">
							<input type="button" id="btnNuevoPrepararproveedor" name="btnNuevoPrepararproveedor" title="NUEVO Proveedor" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdproveedorGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambiosproveedor" name="btnGuardarCambiosproveedor" title="GUARDAR Proveedor" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(proveedor_web::$STR_ES_RELACIONADO=='false' && proveedor_web::$STR_ES_RELACIONES=='false' && proveedor_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdproveedorDuplicar" align="center">
							<input type="button" id="btnDuplicarproveedor" name="btnDuplicarproveedor" title="DUPLICAR Proveedor" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdproveedorCopiar" align="center">
							<input type="button" id="btnCopiarproveedor" name="btnCopiarproveedor" title="COPIAR Proveedor" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(proveedor_web::$STR_ES_RELACIONADO=='false' && ((proveedor_web::$STR_ES_RELACIONADO=='false' && proveedor_web::$STR_ES_RELACIONES=='false') || proveedor_web::$STR_ES_BUSQUEDA=='true'  || proveedor_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdproveedorCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginaproveedor" name="btnCerrarPaginaproveedor" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPrepararproveedor -->
				</form> <!-- frmNuevoPrepararproveedor -->
				</div> <!-- divproveedorPaginacionAjaxWebPart -->
			</td> <!-- tdproveedorPaginacion -->
		</tr> <!-- trproveedorPaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(proveedor_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionesproveedorAjaxWebPart">
			<td id="tdAccionesRelacionesproveedorAjaxWebPart">
				<div id="divAccionesRelacionesproveedorAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionesproveedorAjaxWebPart -->
		</tr> <!-- trAccionesRelacionesproveedorAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderByproveedor">
			<td id="tdOrderByproveedor">
				<form id="frmOrderByproveedor" name="frmOrderByproveedor">
					<div id="divOrderByproveedorAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
				<form id="frmOrderByRelproveedor" name="frmOrderByRelproveedor">
					<div id="divOrderByRelproveedorAjaxWebPart" title="RELACIONES" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderByproveedor -->
		</tr> <!-- trOrderByproveedor/super -->
			
		
		
		
		
		
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
			
				import {proveedor_webcontrol,proveedor_webcontrol1} from './webroot/js/JavaScript/contabilidad/cuentaspagar/proveedor/js/webcontrol/proveedor_webcontrol.js?random=1';
				
				proveedor_webcontrol1.setproveedor_constante(window.proveedor_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(proveedor_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

