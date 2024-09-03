<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\seguridad\pais\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Pais Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/seguridad/pais/util/pais_carga.php');
	use com\bydan\contabilidad\seguridad\pais\util\pais_carga;
	
	//include_once('com/bydan/contabilidad/seguridad/pais/presentation/view/pais_web.php');
	//use com\bydan\contabilidad\seguridad\pais\presentation\view\pais_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	pais_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	pais_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$pais_web1= new pais_web();	
	$pais_web1->cargarDatosGenerales();
	
	//$moduloActual=$pais_web1->moduloActual;
	//$usuarioActual=$pais_web1->usuarioActual;
	//$sessionBase=$pais_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$pais_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/seguridad/pais/js/templating/pais_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/seguridad/pais/js/templating/pais_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/seguridad/pais/js/templating/pais_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/seguridad/pais/js/templating/pais_datos_reporte_template.js'); ?>
		
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/seguridad/pais/js/templating/pais_datos_relaciones_template.js'); ?>
			
						
		
		
		<?php 
			
		
			pais_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					pais_web::$GET_POST=$_GET;
				} else {
					pais_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			pais_web::$STR_NOMBRE_PAGINA = 'pais_view.php';
			pais_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			pais_web::$BIT_ES_PAGINA_FORM = 'false';
				
			pais_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {pais_constante,pais_constante1} from './webroot/js/JavaScript/contabilidad/seguridad/pais/js/util/pais_constante.js?random=1';
			import {pais_funcion,pais_funcion1} from './webroot/js/JavaScript/contabilidad/seguridad/pais/js/util/pais_funcion.js?random=1';
			
			let pais_constante2 = new pais_constante();
			
			pais_constante2.STR_NOMBRE_PAGINA="<?php echo(pais_web::$STR_NOMBRE_PAGINA); ?>";
			pais_constante2.STR_TYPE_ON_LOADpais="<?php echo(pais_web::$STR_TYPE_ONLOAD); ?>";
			pais_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(pais_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			pais_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(pais_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			pais_constante2.STR_ACTION="<?php echo(pais_web::$STR_ACTION); ?>";
			pais_constante2.STR_ES_POPUP="<?php echo(pais_web::$STR_ES_POPUP); ?>";
			pais_constante2.STR_ES_BUSQUEDA="<?php echo(pais_web::$STR_ES_BUSQUEDA); ?>";
			pais_constante2.STR_FUNCION_JS="<?php echo(pais_web::$STR_FUNCION_JS); ?>";
			pais_constante2.BIG_ID_ACTUAL="<?php echo(pais_web::$BIG_ID_ACTUAL); ?>";
			pais_constante2.BIG_ID_OPCION="<?php echo(pais_web::$BIG_ID_OPCION); ?>";
			pais_constante2.STR_OBJETO_JS="<?php echo(pais_web::$STR_OBJETO_JS); ?>";
			pais_constante2.STR_ES_RELACIONES="<?php echo(pais_web::$STR_ES_RELACIONES); ?>";
			pais_constante2.STR_ES_RELACIONADO="<?php echo(pais_web::$STR_ES_RELACIONADO); ?>";
			pais_constante2.STR_ES_SUB_PAGINA="<?php echo(pais_web::$STR_ES_SUB_PAGINA); ?>";
			pais_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(pais_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			pais_constante2.BIT_ES_PAGINA_FORM=<?php echo(pais_web::$BIT_ES_PAGINA_FORM); ?>;
			pais_constante2.STR_SUFIJO="<?php echo(pais_web::$STR_SUF); ?>";//pais
			pais_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(pais_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//pais
			
			pais_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(pais_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			pais_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($pais_web1->moduloActual->getnombre()); ?>";
			pais_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(pais_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			pais_constante2.BIT_ES_LOAD_NORMAL=true;
			/*pais_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			pais_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.pais_constante2 = pais_constante2;
			
		</script>
		
		<?php if(pais_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.pais_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.pais_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="paisActual" ></a>
	
	<div id="divResumenpaisActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(pais_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(pais_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(pais_web::$STR_ES_BUSQUEDA=='false' && pais_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(pais_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(pais_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(pais_web::$STR_ES_RELACIONADO=='false' && pais_web::$STR_ES_POPUP=='false' && pais_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tdpaisNuevoToolBar">
										<img id="imgNuevoToolBarpais" name="imgNuevoToolBarpais" title="Nuevo Pais" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(pais_web::$STR_ES_BUSQUEDA=='false' && pais_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdpaisNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBarpais" name="imgNuevoGuardarCambiosToolBarpais" title="Nuevo TABLA Pais" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(pais_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdpaisGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBarpais" name="imgGuardarCambiosToolBarpais" title="Guardar Pais" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(pais_web::$STR_ES_RELACIONADO=='false' && pais_web::$STR_ES_RELACIONES=='false' && pais_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdpaisCopiarToolBar">
										<img id="imgCopiarToolBarpais" name="imgCopiarToolBarpais" title="Copiar Pais" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdpaisDuplicarToolBar">
										<img id="imgDuplicarToolBarpais" name="imgDuplicarToolBarpais" title="Duplicar Pais" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(pais_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdpaisRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBarpais" name="imgRecargarInformacionToolBarpais" title="Recargar Pais" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdpaisAnterioresToolBar">
										<img id="imgAnterioresToolBarpais" name="imgAnterioresToolBarpais" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdpaisSiguientesToolBar">
										<img id="imgSiguientesToolBarpais" name="imgSiguientesToolBarpais" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdpaisAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBarpais" name="imgAbrirOrderByToolBarpais" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((pais_web::$STR_ES_RELACIONADO=='false' && pais_web::$STR_ES_RELACIONES=='false') || pais_web::$STR_ES_BUSQUEDA=='true'  || pais_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdpaisCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBarpais" name="imgCerrarPaginaToolBarpais" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trpaisCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedapais" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedapais',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trpaisCabeceraBusquedas/super -->

		<tr id="trBusquedapais" class="busqueda" style="display:table-row">
			<td id="tdBusquedapais" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedapais" name="frmBusquedapais">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedapais" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trpaisBusquedas" class="busqueda" style="display:table-row"><td>
				<?php if(pais_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 70%">
					<ul>
						<li id="listrVisibleBusquedaPorCodigo" class="titulotab" style="display:table-row"><a href="#divstrVisibleBusquedaPorCodigo"> Por Codigo</a></li>
						<li id="listrVisibleBusquedaPorNombre" class="titulotab" style="display:table-row"><a href="#divstrVisibleBusquedaPorNombre"> Por Nombre</a></li>
					</ul>
				
					<div id="divstrVisibleBusquedaPorCodigo">
					<table id="tblstrVisibleBusquedaPorCodigo" class="busqueda">
					
						<tr>
						<td class="busquedatitulocampo"><span  class="busquedatitulocampo">Codigo</span>
						</td>
						<td align="center">
							<input id="BusquedaPorCodigo-txtcodigo" name="BusquedaPorCodigo-txtcodigo" type="text" class="form-control"  placeholder="Codigo"  title="Codigo"   size="20" >

						</td>
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarpaisBusquedaPorCodigo" name="btnBuscarpaisBusquedaPorCodigo" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleBusquedaPorNombre">
					<table id="tblstrVisibleBusquedaPorNombre" class="busqueda">
					
						<tr>
						<td class="busquedatitulocampo"><span  class="busquedatitulocampo">Nombre</span>
						</td>
						<td align="center">
							<input id="BusquedaPorNombre-txtnombre" name="BusquedaPorNombre-txtnombre" type="text" class="form-control"  placeholder="Nombre"  title="Nombre"   size="20" >

						</td>
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarpaisBusquedaPorNombre" name="btnBuscarpaisBusquedaPorNombre" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscarpais" style="display:table-row">
					<td id="tdParamsBuscarpais">
		<?php if(pais_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscarpais">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistrospais" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistrospais"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistrospais" name="ParamsBuscar-txtNumeroRegistrospais" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacionpais">
							<td id="tdGenerarReportepais" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodospais" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodospais" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacionpais" name="btnRecargarInformacionpais" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginapais" name="btnImprimirPaginapais" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*pais_web::$STR_ES_BUSQUEDA=='false'  &&*/ pais_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderBypais">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderBypais" name="btnOrderBypais" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
													</td>
													<td>
														<input type="button" id="btnOrderByRelpais" name="btnOrderByRelpais" title="RELACIONES DE DATOS" value="   Rels" class="btn btn-primary"/>
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

										<?php if(pais_web::$STR_ES_RELACIONES=='false' && pais_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbTiposRelaciones" name="ParamsBuscar-cmbTiposRelaciones" title="TIPOS DE RELACIONES" style="width:150px"></select>
										</td>
										<?php } ?>

										<?php if(pais_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdpaisConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodospais -->

							</td><!-- tdGenerarReportepais -->
						</tr><!-- trRecargarInformacionpais -->
					</table><!-- tblParamsBuscarNumeroRegistrospais -->
				</div> <!-- divParamsBuscarpais -->
		<?php } ?>
				</td> <!-- tdParamsBuscarpais -->
				</tr><!-- trParamsBuscarpais -->
				</table> <!-- tblBusquedapais -->
				</form> <!-- frmBusquedapais -->
				

			</td> <!-- tdBusquedapais -->
		</tr> <!-- trBusquedapais/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(pais_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divpaisPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblpaisPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmpaisAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnpaisAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="pais_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnpaisAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmpaisAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblpaisPopupAjaxWebPart -->
		</div> <!-- divpaisPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(pais_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trpaisTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdapais"></a>
		<img id="imgTablaParaDerechapais" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechapais'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdapais" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdapais'"/>
		<a id="TablaDerechapais"></a>
	</td>
</tr> <!-- trpaisTablaNavegacion/super -->
<?php } ?>

<tr id="trpaisTablaDatos">
	<td colspan="3" id="htmlTableCellpais">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatospaissAjaxWebPart">
		</div>
	</td>
</tr> <!-- trpaisTablaDatos/super -->
		
		
		<tr id="trpaisPaginacion" style="display:table-row">
			<td id="tdpaisPaginacion" align="center">
				<div id="divpaisPaginacionAjaxWebPart">
				<form id="frmPaginacionpais" name="frmPaginacionpais">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacionpais" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:center">
					<tr>
						<?php if(pais_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkpais" name="btnSeleccionarLoteFkpais" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(pais_web::$STR_ES_RELACIONADO=='false' /*&& pais_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnteriorespais" name="btnAnteriorespais" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(pais_web::$STR_ES_BUSQUEDA=='false' && pais_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdpaisNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPrepararpais" name="btnNuevoTablaPrepararpais" title="NUEVO Pais" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablapais" name="ParamsPaginar-txtNumeroNuevoTablapais" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(pais_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdpaisConEditarpais">
							<label>
								<input id="ParamsBuscar-chbConEditarpais" name="ParamsBuscar-chbConEditarpais" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(pais_web::$STR_ES_RELACIONADO=='false'/* && pais_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientespais" name="btnSiguientespais" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacionpais -->
				</form> <!-- frmPaginacionpais -->
				<form id="frmNuevoPrepararpais" name="frmNuevoPrepararpais">
				<table id="tblNuevoPrepararpais" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:center">
					<tr id="trpaisNuevo" height="10">
						<?php if(pais_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdpaisNuevo" align="center">
							<input type="button" id="btnNuevoPrepararpais" name="btnNuevoPrepararpais" title="NUEVO Pais" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdpaisGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambiospais" name="btnGuardarCambiospais" title="GUARDAR Pais" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(pais_web::$STR_ES_RELACIONADO=='false' && pais_web::$STR_ES_RELACIONES=='false' && pais_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdpaisDuplicar" align="center">
							<input type="button" id="btnDuplicarpais" name="btnDuplicarpais" title="DUPLICAR Pais" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdpaisCopiar" align="center">
							<input type="button" id="btnCopiarpais" name="btnCopiarpais" title="COPIAR Pais" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(pais_web::$STR_ES_RELACIONADO=='false' && ((pais_web::$STR_ES_RELACIONADO=='false' && pais_web::$STR_ES_RELACIONES=='false') || pais_web::$STR_ES_BUSQUEDA=='true'  || pais_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdpaisCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginapais" name="btnCerrarPaginapais" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPrepararpais -->
				</form> <!-- frmNuevoPrepararpais -->
				</div> <!-- divpaisPaginacionAjaxWebPart -->
			</td> <!-- tdpaisPaginacion -->
		</tr> <!-- trpaisPaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(pais_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionespaisAjaxWebPart">
			<td id="tdAccionesRelacionespaisAjaxWebPart">
				<div id="divAccionesRelacionespaisAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionespaisAjaxWebPart -->
		</tr> <!-- trAccionesRelacionespaisAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderBypais">
			<td id="tdOrderBypais">
				<form id="frmOrderBypais" name="frmOrderBypais">
					<div id="divOrderBypaisAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
				<form id="frmOrderByRelpais" name="frmOrderByRelpais">
					<div id="divOrderByRelpaisAjaxWebPart" title="RELACIONES" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderBypais -->
		</tr> <!-- trOrderBypais/super -->
			
		
		
		
		
		
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
			
				import {pais_webcontrol,pais_webcontrol1} from './webroot/js/JavaScript/contabilidad/seguridad/pais/js/webcontrol/pais_webcontrol.js?random=1';
				
				pais_webcontrol1.setpais_constante(window.pais_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(pais_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

