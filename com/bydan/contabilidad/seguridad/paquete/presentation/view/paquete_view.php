<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\seguridad\paquete\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Paquete Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/seguridad/paquete/util/paquete_carga.php');
	use com\bydan\contabilidad\seguridad\paquete\util\paquete_carga;
	
	//include_once('com/bydan/contabilidad/seguridad/paquete/presentation/view/paquete_web.php');
	//use com\bydan\contabilidad\seguridad\paquete\presentation\view\paquete_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	paquete_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	paquete_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$paquete_web1= new paquete_web();	
	$paquete_web1->cargarDatosGenerales();
	
	//$moduloActual=$paquete_web1->moduloActual;
	//$usuarioActual=$paquete_web1->usuarioActual;
	//$sessionBase=$paquete_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$paquete_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/seguridad/paquete/js/templating/paquete_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/seguridad/paquete/js/templating/paquete_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/seguridad/paquete/js/templating/paquete_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/seguridad/paquete/js/templating/paquete_datos_reporte_template.js'); ?>
		
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/seguridad/paquete/js/templating/paquete_datos_relaciones_template.js'); ?>
			
						
		
		
		<?php 
			
		
			paquete_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					paquete_web::$GET_POST=$_GET;
				} else {
					paquete_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			paquete_web::$STR_NOMBRE_PAGINA = 'paquete_view.php';
			paquete_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			paquete_web::$BIT_ES_PAGINA_FORM = 'false';
				
			paquete_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {paquete_constante,paquete_constante1} from './webroot/js/JavaScript/contabilidad/seguridad/paquete/js/util/paquete_constante.js?random=1';
			import {paquete_funcion,paquete_funcion1} from './webroot/js/JavaScript/contabilidad/seguridad/paquete/js/util/paquete_funcion.js?random=1';
			
			let paquete_constante2 = new paquete_constante();
			
			paquete_constante2.STR_NOMBRE_PAGINA="<?php echo(paquete_web::$STR_NOMBRE_PAGINA); ?>";
			paquete_constante2.STR_TYPE_ON_LOADpaquete="<?php echo(paquete_web::$STR_TYPE_ONLOAD); ?>";
			paquete_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(paquete_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			paquete_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(paquete_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			paquete_constante2.STR_ACTION="<?php echo(paquete_web::$STR_ACTION); ?>";
			paquete_constante2.STR_ES_POPUP="<?php echo(paquete_web::$STR_ES_POPUP); ?>";
			paquete_constante2.STR_ES_BUSQUEDA="<?php echo(paquete_web::$STR_ES_BUSQUEDA); ?>";
			paquete_constante2.STR_FUNCION_JS="<?php echo(paquete_web::$STR_FUNCION_JS); ?>";
			paquete_constante2.BIG_ID_ACTUAL="<?php echo(paquete_web::$BIG_ID_ACTUAL); ?>";
			paquete_constante2.BIG_ID_OPCION="<?php echo(paquete_web::$BIG_ID_OPCION); ?>";
			paquete_constante2.STR_OBJETO_JS="<?php echo(paquete_web::$STR_OBJETO_JS); ?>";
			paquete_constante2.STR_ES_RELACIONES="<?php echo(paquete_web::$STR_ES_RELACIONES); ?>";
			paquete_constante2.STR_ES_RELACIONADO="<?php echo(paquete_web::$STR_ES_RELACIONADO); ?>";
			paquete_constante2.STR_ES_SUB_PAGINA="<?php echo(paquete_web::$STR_ES_SUB_PAGINA); ?>";
			paquete_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(paquete_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			paquete_constante2.BIT_ES_PAGINA_FORM=<?php echo(paquete_web::$BIT_ES_PAGINA_FORM); ?>;
			paquete_constante2.STR_SUFIJO="<?php echo(paquete_web::$STR_SUF); ?>";//paquete
			paquete_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(paquete_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//paquete
			
			paquete_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(paquete_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			paquete_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($paquete_web1->moduloActual->getnombre()); ?>";
			paquete_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(paquete_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			paquete_constante2.BIT_ES_LOAD_NORMAL=true;
			/*paquete_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			paquete_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.paquete_constante2 = paquete_constante2;
			
		</script>
		
		<?php if(paquete_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.paquete_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.paquete_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="paqueteActual" ></a>
	
	<div id="divResumenpaqueteActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(paquete_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(paquete_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(paquete_web::$STR_ES_BUSQUEDA=='false' && paquete_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(paquete_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(paquete_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(paquete_web::$STR_ES_RELACIONADO=='false' && paquete_web::$STR_ES_POPUP=='false' && paquete_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tdpaqueteNuevoToolBar">
										<img id="imgNuevoToolBarpaquete" name="imgNuevoToolBarpaquete" title="Nuevo Paquete" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(paquete_web::$STR_ES_BUSQUEDA=='false' && paquete_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdpaqueteNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBarpaquete" name="imgNuevoGuardarCambiosToolBarpaquete" title="Nuevo TABLA Paquete" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(paquete_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdpaqueteGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBarpaquete" name="imgGuardarCambiosToolBarpaquete" title="Guardar Paquete" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(paquete_web::$STR_ES_RELACIONADO=='false' && paquete_web::$STR_ES_RELACIONES=='false' && paquete_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdpaqueteCopiarToolBar">
										<img id="imgCopiarToolBarpaquete" name="imgCopiarToolBarpaquete" title="Copiar Paquete" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdpaqueteDuplicarToolBar">
										<img id="imgDuplicarToolBarpaquete" name="imgDuplicarToolBarpaquete" title="Duplicar Paquete" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(paquete_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdpaqueteRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBarpaquete" name="imgRecargarInformacionToolBarpaquete" title="Recargar Paquete" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdpaqueteAnterioresToolBar">
										<img id="imgAnterioresToolBarpaquete" name="imgAnterioresToolBarpaquete" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdpaqueteSiguientesToolBar">
										<img id="imgSiguientesToolBarpaquete" name="imgSiguientesToolBarpaquete" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdpaqueteAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBarpaquete" name="imgAbrirOrderByToolBarpaquete" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((paquete_web::$STR_ES_RELACIONADO=='false' && paquete_web::$STR_ES_RELACIONES=='false') || paquete_web::$STR_ES_BUSQUEDA=='true'  || paquete_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdpaqueteCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBarpaquete" name="imgCerrarPaginaToolBarpaquete" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trpaqueteCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedapaquete" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedapaquete',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trpaqueteCabeceraBusquedas/super -->

		<tr id="trBusquedapaquete" class="busqueda" style="display:table-row">
			<td id="tdBusquedapaquete" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedapaquete" name="frmBusquedapaquete">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedapaquete" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trpaqueteBusquedas" class="busqueda" style="display:table-row"><td>
				<?php if(paquete_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 70%">
					<ul>
						<li id="listrVisibleFK_Idsistema" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idsistema"> Por Sistema</a></li>
					</ul>
				
					<div id="divstrVisibleFK_Idsistema">
					<table id="tblstrVisibleFK_Idsistema" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Sistema</span>
						</td>
						<td align="center">
							<select id="FK_Idsistema-cmbid_sistema" name="FK_Idsistema-cmbid_sistema" title="Sistema" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarpaqueteFK_Idsistema" name="btnBuscarpaqueteFK_Idsistema" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscarpaquete" style="display:table-row">
					<td id="tdParamsBuscarpaquete">
		<?php if(paquete_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscarpaquete">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistrospaquete" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistrospaquete"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistrospaquete" name="ParamsBuscar-txtNumeroRegistrospaquete" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacionpaquete">
							<td id="tdGenerarReportepaquete" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodospaquete" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodospaquete" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacionpaquete" name="btnRecargarInformacionpaquete" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginapaquete" name="btnImprimirPaginapaquete" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*paquete_web::$STR_ES_BUSQUEDA=='false'  &&*/ paquete_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderBypaquete">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderBypaquete" name="btnOrderBypaquete" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
													</td>
													<td>
														<input type="button" id="btnOrderByRelpaquete" name="btnOrderByRelpaquete" title="RELACIONES DE DATOS" value="   Rels" class="btn btn-primary"/>
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

										<?php if(paquete_web::$STR_ES_RELACIONES=='false' && paquete_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbTiposRelaciones" name="ParamsBuscar-cmbTiposRelaciones" title="TIPOS DE RELACIONES" style="width:150px"></select>
										</td>
										<?php } ?>

										<?php if(paquete_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdpaqueteConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodospaquete -->

							</td><!-- tdGenerarReportepaquete -->
						</tr><!-- trRecargarInformacionpaquete -->
					</table><!-- tblParamsBuscarNumeroRegistrospaquete -->
				</div> <!-- divParamsBuscarpaquete -->
		<?php } ?>
				</td> <!-- tdParamsBuscarpaquete -->
				</tr><!-- trParamsBuscarpaquete -->
				</table> <!-- tblBusquedapaquete -->
				</form> <!-- frmBusquedapaquete -->
				

			</td> <!-- tdBusquedapaquete -->
		</tr> <!-- trBusquedapaquete/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(paquete_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divpaquetePopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblpaquetePopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmpaqueteAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnpaqueteAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="paquete_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnpaqueteAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmpaqueteAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblpaquetePopupAjaxWebPart -->
		</div> <!-- divpaquetePopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(paquete_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trpaqueteTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdapaquete"></a>
		<img id="imgTablaParaDerechapaquete" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechapaquete'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdapaquete" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdapaquete'"/>
		<a id="TablaDerechapaquete"></a>
	</td>
</tr> <!-- trpaqueteTablaNavegacion/super -->
<?php } ?>

<tr id="trpaqueteTablaDatos">
	<td colspan="3" id="htmlTableCellpaquete">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatospaquetesAjaxWebPart">
		</div>
	</td>
</tr> <!-- trpaqueteTablaDatos/super -->
		
		
		<tr id="trpaquetePaginacion" style="display:table-row">
			<td id="tdpaquetePaginacion" align="center">
				<div id="divpaquetePaginacionAjaxWebPart">
				<form id="frmPaginacionpaquete" name="frmPaginacionpaquete">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacionpaquete" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:center">
					<tr>
						<?php if(paquete_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkpaquete" name="btnSeleccionarLoteFkpaquete" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(paquete_web::$STR_ES_RELACIONADO=='false' /*&& paquete_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnteriorespaquete" name="btnAnteriorespaquete" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(paquete_web::$STR_ES_BUSQUEDA=='false' && paquete_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdpaqueteNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPrepararpaquete" name="btnNuevoTablaPrepararpaquete" title="NUEVO Paquete" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablapaquete" name="ParamsPaginar-txtNumeroNuevoTablapaquete" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(paquete_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdpaqueteConEditarpaquete">
							<label>
								<input id="ParamsBuscar-chbConEditarpaquete" name="ParamsBuscar-chbConEditarpaquete" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(paquete_web::$STR_ES_RELACIONADO=='false'/* && paquete_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientespaquete" name="btnSiguientespaquete" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacionpaquete -->
				</form> <!-- frmPaginacionpaquete -->
				<form id="frmNuevoPrepararpaquete" name="frmNuevoPrepararpaquete">
				<table id="tblNuevoPrepararpaquete" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:center">
					<tr id="trpaqueteNuevo" height="10">
						<?php if(paquete_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdpaqueteNuevo" align="center">
							<input type="button" id="btnNuevoPrepararpaquete" name="btnNuevoPrepararpaquete" title="NUEVO Paquete" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdpaqueteGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambiospaquete" name="btnGuardarCambiospaquete" title="GUARDAR Paquete" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(paquete_web::$STR_ES_RELACIONADO=='false' && paquete_web::$STR_ES_RELACIONES=='false' && paquete_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdpaqueteDuplicar" align="center">
							<input type="button" id="btnDuplicarpaquete" name="btnDuplicarpaquete" title="DUPLICAR Paquete" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdpaqueteCopiar" align="center">
							<input type="button" id="btnCopiarpaquete" name="btnCopiarpaquete" title="COPIAR Paquete" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(paquete_web::$STR_ES_RELACIONADO=='false' && ((paquete_web::$STR_ES_RELACIONADO=='false' && paquete_web::$STR_ES_RELACIONES=='false') || paquete_web::$STR_ES_BUSQUEDA=='true'  || paquete_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdpaqueteCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginapaquete" name="btnCerrarPaginapaquete" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPrepararpaquete -->
				</form> <!-- frmNuevoPrepararpaquete -->
				</div> <!-- divpaquetePaginacionAjaxWebPart -->
			</td> <!-- tdpaquetePaginacion -->
		</tr> <!-- trpaquetePaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(paquete_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionespaqueteAjaxWebPart">
			<td id="tdAccionesRelacionespaqueteAjaxWebPart">
				<div id="divAccionesRelacionespaqueteAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionespaqueteAjaxWebPart -->
		</tr> <!-- trAccionesRelacionespaqueteAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderBypaquete">
			<td id="tdOrderBypaquete">
				<form id="frmOrderBypaquete" name="frmOrderBypaquete">
					<div id="divOrderBypaqueteAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
				<form id="frmOrderByRelpaquete" name="frmOrderByRelpaquete">
					<div id="divOrderByRelpaqueteAjaxWebPart" title="RELACIONES" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderBypaquete -->
		</tr> <!-- trOrderBypaquete/super -->
			
		
		
		
		
		
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
			
				import {paquete_webcontrol,paquete_webcontrol1} from './webroot/js/JavaScript/contabilidad/seguridad/paquete/js/webcontrol/paquete_webcontrol.js?random=1';
				
				paquete_webcontrol1.setpaquete_constante(window.paquete_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(paquete_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

