<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\seguridad\auditoria\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Auditoria Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/seguridad/auditoria/util/auditoria_carga.php');
	use com\bydan\contabilidad\seguridad\auditoria\util\auditoria_carga;
	
	//include_once('com/bydan/contabilidad/seguridad/auditoria/presentation/view/auditoria_web.php');
	//use com\bydan\contabilidad\seguridad\auditoria\presentation\view\auditoria_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	auditoria_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	auditoria_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$auditoria_web1= new auditoria_web();	
	$auditoria_web1->cargarDatosGenerales();
	
	//$moduloActual=$auditoria_web1->moduloActual;
	//$usuarioActual=$auditoria_web1->usuarioActual;
	//$sessionBase=$auditoria_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$auditoria_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/seguridad/auditoria/js/templating/auditoria_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/seguridad/auditoria/js/templating/auditoria_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/seguridad/auditoria/js/templating/auditoria_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/seguridad/auditoria/js/templating/auditoria_datos_reporte_template.js'); ?>
		
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/seguridad/auditoria/js/templating/auditoria_datos_relaciones_template.js'); ?>
			
						
		
		
		<?php 
			
		
			auditoria_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					auditoria_web::$GET_POST=$_GET;
				} else {
					auditoria_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			auditoria_web::$STR_NOMBRE_PAGINA = 'auditoria_view.php';
			auditoria_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			auditoria_web::$BIT_ES_PAGINA_FORM = 'false';
				
			auditoria_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {auditoria_constante,auditoria_constante1} from './webroot/js/JavaScript/contabilidad/seguridad/auditoria/js/util/auditoria_constante.js?random=1';
			import {auditoria_funcion,auditoria_funcion1} from './webroot/js/JavaScript/contabilidad/seguridad/auditoria/js/util/auditoria_funcion.js?random=1';
			
			let auditoria_constante2 = new auditoria_constante();
			
			auditoria_constante2.STR_NOMBRE_PAGINA="<?php echo(auditoria_web::$STR_NOMBRE_PAGINA); ?>";
			auditoria_constante2.STR_TYPE_ON_LOADauditoria="<?php echo(auditoria_web::$STR_TYPE_ONLOAD); ?>";
			auditoria_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(auditoria_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			auditoria_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(auditoria_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			auditoria_constante2.STR_ACTION="<?php echo(auditoria_web::$STR_ACTION); ?>";
			auditoria_constante2.STR_ES_POPUP="<?php echo(auditoria_web::$STR_ES_POPUP); ?>";
			auditoria_constante2.STR_ES_BUSQUEDA="<?php echo(auditoria_web::$STR_ES_BUSQUEDA); ?>";
			auditoria_constante2.STR_FUNCION_JS="<?php echo(auditoria_web::$STR_FUNCION_JS); ?>";
			auditoria_constante2.BIG_ID_ACTUAL="<?php echo(auditoria_web::$BIG_ID_ACTUAL); ?>";
			auditoria_constante2.BIG_ID_OPCION="<?php echo(auditoria_web::$BIG_ID_OPCION); ?>";
			auditoria_constante2.STR_OBJETO_JS="<?php echo(auditoria_web::$STR_OBJETO_JS); ?>";
			auditoria_constante2.STR_ES_RELACIONES="<?php echo(auditoria_web::$STR_ES_RELACIONES); ?>";
			auditoria_constante2.STR_ES_RELACIONADO="<?php echo(auditoria_web::$STR_ES_RELACIONADO); ?>";
			auditoria_constante2.STR_ES_SUB_PAGINA="<?php echo(auditoria_web::$STR_ES_SUB_PAGINA); ?>";
			auditoria_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(auditoria_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			auditoria_constante2.BIT_ES_PAGINA_FORM=<?php echo(auditoria_web::$BIT_ES_PAGINA_FORM); ?>;
			auditoria_constante2.STR_SUFIJO="<?php echo(auditoria_web::$STR_SUF); ?>";//auditoria
			auditoria_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(auditoria_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//auditoria
			
			auditoria_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(auditoria_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			auditoria_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($auditoria_web1->moduloActual->getnombre()); ?>";
			auditoria_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(auditoria_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			auditoria_constante2.BIT_ES_LOAD_NORMAL=true;
			/*auditoria_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			auditoria_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.auditoria_constante2 = auditoria_constante2;
			
		</script>
		
		<?php if(auditoria_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.auditoria_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.auditoria_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="auditoriaActual" ></a>
	
	<div id="divResumenauditoriaActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(auditoria_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(auditoria_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(auditoria_web::$STR_ES_BUSQUEDA=='false' && auditoria_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(auditoria_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(auditoria_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(auditoria_web::$STR_ES_RELACIONADO=='false' && auditoria_web::$STR_ES_POPUP=='false' && auditoria_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tdauditoriaNuevoToolBar">
										<img id="imgNuevoToolBarauditoria" name="imgNuevoToolBarauditoria" title="Nuevo Auditoria" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(auditoria_web::$STR_ES_BUSQUEDA=='false' && auditoria_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdauditoriaNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBarauditoria" name="imgNuevoGuardarCambiosToolBarauditoria" title="Nuevo TABLA Auditoria" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(auditoria_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdauditoriaGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBarauditoria" name="imgGuardarCambiosToolBarauditoria" title="Guardar Auditoria" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(auditoria_web::$STR_ES_RELACIONADO=='false' && auditoria_web::$STR_ES_RELACIONES=='false' && auditoria_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdauditoriaCopiarToolBar">
										<img id="imgCopiarToolBarauditoria" name="imgCopiarToolBarauditoria" title="Copiar Auditoria" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdauditoriaDuplicarToolBar">
										<img id="imgDuplicarToolBarauditoria" name="imgDuplicarToolBarauditoria" title="Duplicar Auditoria" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(auditoria_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdauditoriaRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBarauditoria" name="imgRecargarInformacionToolBarauditoria" title="Recargar Auditoria" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdauditoriaAnterioresToolBar">
										<img id="imgAnterioresToolBarauditoria" name="imgAnterioresToolBarauditoria" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdauditoriaSiguientesToolBar">
										<img id="imgSiguientesToolBarauditoria" name="imgSiguientesToolBarauditoria" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdauditoriaAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBarauditoria" name="imgAbrirOrderByToolBarauditoria" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((auditoria_web::$STR_ES_RELACIONADO=='false' && auditoria_web::$STR_ES_RELACIONES=='false') || auditoria_web::$STR_ES_BUSQUEDA=='true'  || auditoria_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdauditoriaCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBarauditoria" name="imgCerrarPaginaToolBarauditoria" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trauditoriaCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedaauditoria" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedaauditoria',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trauditoriaCabeceraBusquedas/super -->

		<tr id="trBusquedaauditoria" class="busqueda" style="display:table-row">
			<td id="tdBusquedaauditoria" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedaauditoria" name="frmBusquedaauditoria">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedaauditoria" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trauditoriaBusquedas" class="busqueda" style="display:table-row"><td>
				<?php if(auditoria_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 95%">
					<ul>
						<li id="listrVisibleBusquedaPorIdUsuarioPorFechaHora" class="titulotab" style="display:table-row"><a href="#divstrVisibleBusquedaPorIdUsuarioPorFechaHora"> Por Usuario Por Fecha Y Hora Por Fecha Y Hora FINAL</a></li>
						<li id="listrVisibleBusquedaPorIPPCPorFechaHora" class="titulotab" style="display:table-row"><a href="#divstrVisibleBusquedaPorIPPCPorFechaHora"> Por Ip Del Pc Por Fecha Y Hora Por Fecha Y Hora FINAL</a></li>
						<li id="listrVisibleBusquedaPorNombrePCPorFechaHora" class="titulotab" style="display:table-row"><a href="#divstrVisibleBusquedaPorNombrePCPorFechaHora"> Por Nombre De Pc Por Fecha Y Hora Por Fecha Y Hora FINAL</a></li>
						<li id="listrVisibleBusquedaPorNombreTablaPorFechaHora" class="titulotab" style="display:table-row"><a href="#divstrVisibleBusquedaPorNombreTablaPorFechaHora"> Por Nombre De La Tabla Por Fecha Y Hora Por Fecha Y Hora FINAL</a></li>
						<li id="listrVisibleBusquedaPorObservacionesPorFechaHora" class="titulotab" style="display:table-row"><a href="#divstrVisibleBusquedaPorObservacionesPorFechaHora"> Por Fecha Y Hora Por Fecha Y Hora FINAL Por Observacion</a></li>
						<li id="listrVisibleBusquedaPorProcesoPorFechaHora" class="titulotab" style="display:table-row"><a href="#divstrVisibleBusquedaPorProcesoPorFechaHora"> Por Proceso Por Fecha Y Hora Por Fecha Y Hora FINAL</a></li>
						<li id="listrVisibleBusquedaPorUsuarioPCPorFechaHora" class="titulotab" style="display:table-row"><a href="#divstrVisibleBusquedaPorUsuarioPCPorFechaHora"> Por Usuario Del Pc Por Fecha Y Hora Por Fecha Y Hora FINAL</a></li>
					</ul>
				
					<div id="divstrVisibleBusquedaPorIdUsuarioPorFechaHora">
					<table id="tblstrVisibleBusquedaPorIdUsuarioPorFechaHora" class="busqueda">
					
						<tr>
						<td class="busquedatitulocampo"><span  class="busquedatitulocampo">Usuario</span>
						</td>
						<td align="center">
							<select id="BusquedaPorIdUsuarioPorFechaHora-cmbid_usuario" name="BusquedaPorIdUsuarioPorFechaHora-cmbid_usuario" title="Usuario" ></select>

						</td>
						</tr>
						<tr>
						<td class="busquedatitulocampo"><span  class="busquedatitulocampo">Fecha Y Hora</span>
						</td>
						<td align="center">
							<input id="BusquedaPorIdUsuarioPorFechaHora-dtfecha_hora" name="BusquedaPorIdUsuarioPorFechaHora-dtfecha_hora" type="text" class="form-control"  placeholder="Fecha Y Hora"  title="Fecha Y Hora"  >
						</td>
						</tr>
						<tr>
						<td class="busquedatitulocampo"><span  class="busquedatitulocampo">Fecha Y Hora FINAL</span>
						</td>
						<td align="center">
							<input id="BusquedaPorIdUsuarioPorFechaHora-dtfecha_horaFinal" name="BusquedaPorIdUsuarioPorFechaHora-dtfecha_horaFinal" type="text" class="form-control"  placeholder="Fecha Y Hora"  title="Fecha Y Hora"  >
						</td>
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarauditoriaBusquedaPorIdUsuarioPorFechaHora" name="btnBuscarauditoriaBusquedaPorIdUsuarioPorFechaHora" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleBusquedaPorIPPCPorFechaHora">
					<table id="tblstrVisibleBusquedaPorIPPCPorFechaHora" class="busqueda">
					
						<tr>
						<td class="busquedatitulocampo"><span  class="busquedatitulocampo">Ip Del Pc</span>
						</td>
						<td align="center">
							<input id="BusquedaPorIPPCPorFechaHora-txtip_pc" name="BusquedaPorIPPCPorFechaHora-txtip_pc" type="text" class="form-control"  placeholder="Ip Del Pc"  title="Ip Del Pc"   size="20" >

						</td>
						</tr>
						<tr>
						<td class="busquedatitulocampo"><span  class="busquedatitulocampo">Fecha Y Hora</span>
						</td>
						<td align="center">
							<input id="BusquedaPorIPPCPorFechaHora-dtfecha_hora" name="BusquedaPorIPPCPorFechaHora-dtfecha_hora" type="text" class="form-control"  placeholder="Fecha Y Hora"  title="Fecha Y Hora"  >
						</td>
						</tr>
						<tr>
						<td class="busquedatitulocampo"><span  class="busquedatitulocampo">Fecha Y Hora FINAL</span>
						</td>
						<td align="center">
							<input id="BusquedaPorIPPCPorFechaHora-dtfecha_horaFinal" name="BusquedaPorIPPCPorFechaHora-dtfecha_horaFinal" type="text" class="form-control"  placeholder="Fecha Y Hora"  title="Fecha Y Hora"  >
						</td>
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarauditoriaBusquedaPorIPPCPorFechaHora" name="btnBuscarauditoriaBusquedaPorIPPCPorFechaHora" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleBusquedaPorNombrePCPorFechaHora">
					<table id="tblstrVisibleBusquedaPorNombrePCPorFechaHora" class="busqueda">
					
						<tr>
						<td class="busquedatitulocampo"><span  class="busquedatitulocampo">Nombre De Pc</span>
						</td>
						<td align="center">
							<input id="BusquedaPorNombrePCPorFechaHora-txtnombre_pc" name="BusquedaPorNombrePCPorFechaHora-txtnombre_pc" type="text" class="form-control"  placeholder="Nombre De Pc"  title="Nombre De Pc"   size="20" >

						</td>
						</tr>
						<tr>
						<td class="busquedatitulocampo"><span  class="busquedatitulocampo">Fecha Y Hora</span>
						</td>
						<td align="center">
							<input id="BusquedaPorNombrePCPorFechaHora-dtfecha_hora" name="BusquedaPorNombrePCPorFechaHora-dtfecha_hora" type="text" class="form-control"  placeholder="Fecha Y Hora"  title="Fecha Y Hora"  >
						</td>
						</tr>
						<tr>
						<td class="busquedatitulocampo"><span  class="busquedatitulocampo">Fecha Y Hora FINAL</span>
						</td>
						<td align="center">
							<input id="BusquedaPorNombrePCPorFechaHora-dtfecha_horaFinal" name="BusquedaPorNombrePCPorFechaHora-dtfecha_horaFinal" type="text" class="form-control"  placeholder="Fecha Y Hora"  title="Fecha Y Hora"  >
						</td>
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarauditoriaBusquedaPorNombrePCPorFechaHora" name="btnBuscarauditoriaBusquedaPorNombrePCPorFechaHora" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleBusquedaPorNombreTablaPorFechaHora">
					<table id="tblstrVisibleBusquedaPorNombreTablaPorFechaHora" class="busqueda">
					
						<tr>
						<td class="busquedatitulocampo"><span  class="busquedatitulocampo">Nombre De La Tabla</span>
						</td>
						<td align="center">
							<input id="BusquedaPorNombreTablaPorFechaHora-txtnombre_tabla" name="BusquedaPorNombreTablaPorFechaHora-txtnombre_tabla" type="text" class="form-control"  placeholder="Nombre De La Tabla"  title="Nombre De La Tabla"   size="20" >

						</td>
						</tr>
						<tr>
						<td class="busquedatitulocampo"><span  class="busquedatitulocampo">Fecha Y Hora</span>
						</td>
						<td align="center">
							<input id="BusquedaPorNombreTablaPorFechaHora-dtfecha_hora" name="BusquedaPorNombreTablaPorFechaHora-dtfecha_hora" type="text" class="form-control"  placeholder="Fecha Y Hora"  title="Fecha Y Hora"  >
						</td>
						</tr>
						<tr>
						<td class="busquedatitulocampo"><span  class="busquedatitulocampo">Fecha Y Hora FINAL</span>
						</td>
						<td align="center">
							<input id="BusquedaPorNombreTablaPorFechaHora-dtfecha_horaFinal" name="BusquedaPorNombreTablaPorFechaHora-dtfecha_horaFinal" type="text" class="form-control"  placeholder="Fecha Y Hora"  title="Fecha Y Hora"  >
						</td>
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarauditoriaBusquedaPorNombreTablaPorFechaHora" name="btnBuscarauditoriaBusquedaPorNombreTablaPorFechaHora" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleBusquedaPorObservacionesPorFechaHora">
					<table id="tblstrVisibleBusquedaPorObservacionesPorFechaHora" class="busqueda">
					
						<tr>
						<td class="busquedatitulocampo"><span  class="busquedatitulocampo">Fecha Y Hora</span>
						</td>
						<td align="center">
							<input id="BusquedaPorObservacionesPorFechaHora-dtfecha_hora" name="BusquedaPorObservacionesPorFechaHora-dtfecha_hora" type="text" class="form-control"  placeholder="Fecha Y Hora"  title="Fecha Y Hora"  >
						</td>
						</tr>
						<tr>
						<td class="busquedatitulocampo"><span  class="busquedatitulocampo">Fecha Y Hora FINAL</span>
						</td>
						<td align="center">
							<input id="BusquedaPorObservacionesPorFechaHora-dtfecha_horaFinal" name="BusquedaPorObservacionesPorFechaHora-dtfecha_horaFinal" type="text" class="form-control"  placeholder="Fecha Y Hora"  title="Fecha Y Hora"  >
						</td>
						</tr>
						<tr>
						<td class="busquedatitulocampo"><span  class="busquedatitulocampo">Observacion</span>
						</td>
						<td align="center">
							<input id="BusquedaPorObservacionesPorFechaHora-txtobservacion" name="BusquedaPorObservacionesPorFechaHora-txtobservacion" type="text" class="form-control"  placeholder="Observacion"  title="Observacion"   size="20" >

						</td>
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarauditoriaBusquedaPorObservacionesPorFechaHora" name="btnBuscarauditoriaBusquedaPorObservacionesPorFechaHora" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleBusquedaPorProcesoPorFechaHora">
					<table id="tblstrVisibleBusquedaPorProcesoPorFechaHora" class="busqueda">
					
						<tr>
						<td class="busquedatitulocampo"><span  class="busquedatitulocampo">Proceso</span>
						</td>
						<td align="center">
							<input id="BusquedaPorProcesoPorFechaHora-txtproceso" name="BusquedaPorProcesoPorFechaHora-txtproceso" type="text" class="form-control"  placeholder="Proceso"  title="Proceso"   size="20" >

						</td>
						</tr>
						<tr>
						<td class="busquedatitulocampo"><span  class="busquedatitulocampo">Fecha Y Hora</span>
						</td>
						<td align="center">
							<input id="BusquedaPorProcesoPorFechaHora-dtfecha_hora" name="BusquedaPorProcesoPorFechaHora-dtfecha_hora" type="text" class="form-control"  placeholder="Fecha Y Hora"  title="Fecha Y Hora"  >
						</td>
						</tr>
						<tr>
						<td class="busquedatitulocampo"><span  class="busquedatitulocampo">Fecha Y Hora FINAL</span>
						</td>
						<td align="center">
							<input id="BusquedaPorProcesoPorFechaHora-dtfecha_horaFinal" name="BusquedaPorProcesoPorFechaHora-dtfecha_horaFinal" type="text" class="form-control"  placeholder="Fecha Y Hora"  title="Fecha Y Hora"  >
						</td>
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarauditoriaBusquedaPorProcesoPorFechaHora" name="btnBuscarauditoriaBusquedaPorProcesoPorFechaHora" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleBusquedaPorUsuarioPCPorFechaHora">
					<table id="tblstrVisibleBusquedaPorUsuarioPCPorFechaHora" class="busqueda">
					
						<tr>
						<td class="busquedatitulocampo"><span  class="busquedatitulocampo">Usuario Del Pc</span>
						</td>
						<td align="center">
							<input id="BusquedaPorUsuarioPCPorFechaHora-txtusuario_pc" name="BusquedaPorUsuarioPCPorFechaHora-txtusuario_pc" type="text" class="form-control"  placeholder="Usuario Del Pc"  title="Usuario Del Pc"   size="20" >

						</td>
						</tr>
						<tr>
						<td class="busquedatitulocampo"><span  class="busquedatitulocampo">Fecha Y Hora</span>
						</td>
						<td align="center">
							<input id="BusquedaPorUsuarioPCPorFechaHora-dtfecha_hora" name="BusquedaPorUsuarioPCPorFechaHora-dtfecha_hora" type="text" class="form-control"  placeholder="Fecha Y Hora"  title="Fecha Y Hora"  >
						</td>
						</tr>
						<tr>
						<td class="busquedatitulocampo"><span  class="busquedatitulocampo">Fecha Y Hora FINAL</span>
						</td>
						<td align="center">
							<input id="BusquedaPorUsuarioPCPorFechaHora-dtfecha_horaFinal" name="BusquedaPorUsuarioPCPorFechaHora-dtfecha_horaFinal" type="text" class="form-control"  placeholder="Fecha Y Hora"  title="Fecha Y Hora"  >
						</td>
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarauditoriaBusquedaPorUsuarioPCPorFechaHora" name="btnBuscarauditoriaBusquedaPorUsuarioPCPorFechaHora" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscarauditoria" style="display:table-row">
					<td id="tdParamsBuscarauditoria">
		<?php if(auditoria_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscarauditoria">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistrosauditoria" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistrosauditoria"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistrosauditoria" name="ParamsBuscar-txtNumeroRegistrosauditoria" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacionauditoria">
							<td id="tdGenerarReporteauditoria" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodosauditoria" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodosauditoria" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacionauditoria" name="btnRecargarInformacionauditoria" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginaauditoria" name="btnImprimirPaginaauditoria" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*auditoria_web::$STR_ES_BUSQUEDA=='false'  &&*/ auditoria_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderByauditoria">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderByauditoria" name="btnOrderByauditoria" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
													</td>
													<td>
														<input type="button" id="btnOrderByRelauditoria" name="btnOrderByRelauditoria" title="RELACIONES DE DATOS" value="   Rels" class="btn btn-primary"/>
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

										<?php if(auditoria_web::$STR_ES_RELACIONES=='false' && auditoria_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbTiposRelaciones" name="ParamsBuscar-cmbTiposRelaciones" title="TIPOS DE RELACIONES" style="width:150px"></select>
										</td>
										<?php } ?>

										<?php if(auditoria_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdauditoriaConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodosauditoria -->

							</td><!-- tdGenerarReporteauditoria -->
						</tr><!-- trRecargarInformacionauditoria -->
					</table><!-- tblParamsBuscarNumeroRegistrosauditoria -->
				</div> <!-- divParamsBuscarauditoria -->
		<?php } ?>
				</td> <!-- tdParamsBuscarauditoria -->
				</tr><!-- trParamsBuscarauditoria -->
				</table> <!-- tblBusquedaauditoria -->
				</form> <!-- frmBusquedaauditoria -->
				

			</td> <!-- tdBusquedaauditoria -->
		</tr> <!-- trBusquedaauditoria/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(auditoria_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divauditoriaPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblauditoriaPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmauditoriaAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnauditoriaAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="auditoria_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnauditoriaAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmauditoriaAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblauditoriaPopupAjaxWebPart -->
		</div> <!-- divauditoriaPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(auditoria_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trauditoriaTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdaauditoria"></a>
		<img id="imgTablaParaDerechaauditoria" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechaauditoria'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdaauditoria" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdaauditoria'"/>
		<a id="TablaDerechaauditoria"></a>
	</td>
</tr> <!-- trauditoriaTablaNavegacion/super -->
<?php } ?>

<tr id="trauditoriaTablaDatos">
	<td colspan="3" id="htmlTableCellauditoria">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatosauditoriasAjaxWebPart">
		</div>
	</td>
</tr> <!-- trauditoriaTablaDatos/super -->
		
		
		<tr id="trauditoriaPaginacion" style="display:table-row">
			<td id="tdauditoriaPaginacion" align="left">
				<div id="divauditoriaPaginacionAjaxWebPart">
				<form id="frmPaginacionauditoria" name="frmPaginacionauditoria">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacionauditoria" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:left">
					<tr>
						<?php if(auditoria_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkauditoria" name="btnSeleccionarLoteFkauditoria" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(auditoria_web::$STR_ES_RELACIONADO=='false' /*&& auditoria_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnterioresauditoria" name="btnAnterioresauditoria" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(auditoria_web::$STR_ES_BUSQUEDA=='false' && auditoria_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdauditoriaNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPrepararauditoria" name="btnNuevoTablaPrepararauditoria" title="NUEVO Auditoria" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablaauditoria" name="ParamsPaginar-txtNumeroNuevoTablaauditoria" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(auditoria_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdauditoriaConEditarauditoria">
							<label>
								<input id="ParamsBuscar-chbConEditarauditoria" name="ParamsBuscar-chbConEditarauditoria" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(auditoria_web::$STR_ES_RELACIONADO=='false'/* && auditoria_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientesauditoria" name="btnSiguientesauditoria" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacionauditoria -->
				</form> <!-- frmPaginacionauditoria -->
				<form id="frmNuevoPrepararauditoria" name="frmNuevoPrepararauditoria">
				<table id="tblNuevoPrepararauditoria" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:left">
					<tr id="trauditoriaNuevo" height="10">
						<?php if(auditoria_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdauditoriaNuevo" align="center">
							<input type="button" id="btnNuevoPrepararauditoria" name="btnNuevoPrepararauditoria" title="NUEVO Auditoria" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdauditoriaGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambiosauditoria" name="btnGuardarCambiosauditoria" title="GUARDAR Auditoria" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(auditoria_web::$STR_ES_RELACIONADO=='false' && auditoria_web::$STR_ES_RELACIONES=='false' && auditoria_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdauditoriaDuplicar" align="center">
							<input type="button" id="btnDuplicarauditoria" name="btnDuplicarauditoria" title="DUPLICAR Auditoria" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdauditoriaCopiar" align="center">
							<input type="button" id="btnCopiarauditoria" name="btnCopiarauditoria" title="COPIAR Auditoria" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(auditoria_web::$STR_ES_RELACIONADO=='false' && ((auditoria_web::$STR_ES_RELACIONADO=='false' && auditoria_web::$STR_ES_RELACIONES=='false') || auditoria_web::$STR_ES_BUSQUEDA=='true'  || auditoria_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdauditoriaCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginaauditoria" name="btnCerrarPaginaauditoria" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPrepararauditoria -->
				</form> <!-- frmNuevoPrepararauditoria -->
				</div> <!-- divauditoriaPaginacionAjaxWebPart -->
			</td> <!-- tdauditoriaPaginacion -->
		</tr> <!-- trauditoriaPaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(auditoria_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionesauditoriaAjaxWebPart">
			<td id="tdAccionesRelacionesauditoriaAjaxWebPart">
				<div id="divAccionesRelacionesauditoriaAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionesauditoriaAjaxWebPart -->
		</tr> <!-- trAccionesRelacionesauditoriaAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderByauditoria">
			<td id="tdOrderByauditoria">
				<form id="frmOrderByauditoria" name="frmOrderByauditoria">
					<div id="divOrderByauditoriaAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
				<form id="frmOrderByRelauditoria" name="frmOrderByRelauditoria">
					<div id="divOrderByRelauditoriaAjaxWebPart" title="RELACIONES" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderByauditoria -->
		</tr> <!-- trOrderByauditoria/super -->
			
		
		
		
		
		
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
			
				import {auditoria_webcontrol,auditoria_webcontrol1} from './webroot/js/JavaScript/contabilidad/seguridad/auditoria/js/webcontrol/auditoria_webcontrol.js?random=1';
				
				auditoria_webcontrol1.setauditoria_constante(window.auditoria_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(auditoria_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

