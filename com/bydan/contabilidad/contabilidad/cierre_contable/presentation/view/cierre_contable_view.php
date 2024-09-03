<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\contabilidad\cierre_contable\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Cierres Contables Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/contabilidad/cierre_contable/util/cierre_contable_carga.php');
	use com\bydan\contabilidad\contabilidad\cierre_contable\util\cierre_contable_carga;
	
	//include_once('com/bydan/contabilidad/contabilidad/cierre_contable/presentation/view/cierre_contable_web.php');
	//use com\bydan\contabilidad\contabilidad\cierre_contable\presentation\view\cierre_contable_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	cierre_contable_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	cierre_contable_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$cierre_contable_web1= new cierre_contable_web();	
	$cierre_contable_web1->cargarDatosGenerales();
	
	//$moduloActual=$cierre_contable_web1->moduloActual;
	//$usuarioActual=$cierre_contable_web1->usuarioActual;
	//$sessionBase=$cierre_contable_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$cierre_contable_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/contabilidad/cierre_contable/js/templating/cierre_contable_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/contabilidad/cierre_contable/js/templating/cierre_contable_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/contabilidad/cierre_contable/js/templating/cierre_contable_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/contabilidad/cierre_contable/js/templating/cierre_contable_datos_reporte_template.js'); ?>
		
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/contabilidad/cierre_contable/js/templating/cierre_contable_datos_relaciones_template.js'); ?>
			
						
		
		
		<?php 
			
		
			cierre_contable_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					cierre_contable_web::$GET_POST=$_GET;
				} else {
					cierre_contable_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			cierre_contable_web::$STR_NOMBRE_PAGINA = 'cierre_contable_view.php';
			cierre_contable_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			cierre_contable_web::$BIT_ES_PAGINA_FORM = 'false';
				
			cierre_contable_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {cierre_contable_constante,cierre_contable_constante1} from './webroot/js/JavaScript/contabilidad/contabilidad/cierre_contable/js/util/cierre_contable_constante.js?random=1';
			import {cierre_contable_funcion,cierre_contable_funcion1} from './webroot/js/JavaScript/contabilidad/contabilidad/cierre_contable/js/util/cierre_contable_funcion.js?random=1';
			
			let cierre_contable_constante2 = new cierre_contable_constante();
			
			cierre_contable_constante2.STR_NOMBRE_PAGINA="<?php echo(cierre_contable_web::$STR_NOMBRE_PAGINA); ?>";
			cierre_contable_constante2.STR_TYPE_ON_LOADcierre_contable="<?php echo(cierre_contable_web::$STR_TYPE_ONLOAD); ?>";
			cierre_contable_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(cierre_contable_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			cierre_contable_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(cierre_contable_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			cierre_contable_constante2.STR_ACTION="<?php echo(cierre_contable_web::$STR_ACTION); ?>";
			cierre_contable_constante2.STR_ES_POPUP="<?php echo(cierre_contable_web::$STR_ES_POPUP); ?>";
			cierre_contable_constante2.STR_ES_BUSQUEDA="<?php echo(cierre_contable_web::$STR_ES_BUSQUEDA); ?>";
			cierre_contable_constante2.STR_FUNCION_JS="<?php echo(cierre_contable_web::$STR_FUNCION_JS); ?>";
			cierre_contable_constante2.BIG_ID_ACTUAL="<?php echo(cierre_contable_web::$BIG_ID_ACTUAL); ?>";
			cierre_contable_constante2.BIG_ID_OPCION="<?php echo(cierre_contable_web::$BIG_ID_OPCION); ?>";
			cierre_contable_constante2.STR_OBJETO_JS="<?php echo(cierre_contable_web::$STR_OBJETO_JS); ?>";
			cierre_contable_constante2.STR_ES_RELACIONES="<?php echo(cierre_contable_web::$STR_ES_RELACIONES); ?>";
			cierre_contable_constante2.STR_ES_RELACIONADO="<?php echo(cierre_contable_web::$STR_ES_RELACIONADO); ?>";
			cierre_contable_constante2.STR_ES_SUB_PAGINA="<?php echo(cierre_contable_web::$STR_ES_SUB_PAGINA); ?>";
			cierre_contable_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(cierre_contable_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			cierre_contable_constante2.BIT_ES_PAGINA_FORM=<?php echo(cierre_contable_web::$BIT_ES_PAGINA_FORM); ?>;
			cierre_contable_constante2.STR_SUFIJO="<?php echo(cierre_contable_web::$STR_SUF); ?>";//cierre_contable
			cierre_contable_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(cierre_contable_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//cierre_contable
			
			cierre_contable_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(cierre_contable_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			cierre_contable_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($cierre_contable_web1->moduloActual->getnombre()); ?>";
			cierre_contable_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(cierre_contable_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			cierre_contable_constante2.BIT_ES_LOAD_NORMAL=true;
			/*cierre_contable_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			cierre_contable_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.cierre_contable_constante2 = cierre_contable_constante2;
			
		</script>
		
		<?php if(cierre_contable_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.cierre_contable_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.cierre_contable_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="cierre_contableActual" ></a>
	
	<div id="divResumencierre_contableActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(cierre_contable_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(cierre_contable_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(cierre_contable_web::$STR_ES_BUSQUEDA=='false' && cierre_contable_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(cierre_contable_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(cierre_contable_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(cierre_contable_web::$STR_ES_RELACIONADO=='false' && cierre_contable_web::$STR_ES_POPUP=='false' && cierre_contable_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tdcierre_contableNuevoToolBar">
										<img id="imgNuevoToolBarcierre_contable" name="imgNuevoToolBarcierre_contable" title="Nuevo Cierres Contables" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(cierre_contable_web::$STR_ES_BUSQUEDA=='false' && cierre_contable_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdcierre_contableNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBarcierre_contable" name="imgNuevoGuardarCambiosToolBarcierre_contable" title="Nuevo TABLA Cierres Contables" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(cierre_contable_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdcierre_contableGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBarcierre_contable" name="imgGuardarCambiosToolBarcierre_contable" title="Guardar Cierres Contables" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(cierre_contable_web::$STR_ES_RELACIONADO=='false' && cierre_contable_web::$STR_ES_RELACIONES=='false' && cierre_contable_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdcierre_contableCopiarToolBar">
										<img id="imgCopiarToolBarcierre_contable" name="imgCopiarToolBarcierre_contable" title="Copiar Cierres Contables" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdcierre_contableDuplicarToolBar">
										<img id="imgDuplicarToolBarcierre_contable" name="imgDuplicarToolBarcierre_contable" title="Duplicar Cierres Contables" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(cierre_contable_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdcierre_contableRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBarcierre_contable" name="imgRecargarInformacionToolBarcierre_contable" title="Recargar Cierres Contables" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdcierre_contableAnterioresToolBar">
										<img id="imgAnterioresToolBarcierre_contable" name="imgAnterioresToolBarcierre_contable" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdcierre_contableSiguientesToolBar">
										<img id="imgSiguientesToolBarcierre_contable" name="imgSiguientesToolBarcierre_contable" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdcierre_contableAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBarcierre_contable" name="imgAbrirOrderByToolBarcierre_contable" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((cierre_contable_web::$STR_ES_RELACIONADO=='false' && cierre_contable_web::$STR_ES_RELACIONES=='false') || cierre_contable_web::$STR_ES_BUSQUEDA=='true'  || cierre_contable_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdcierre_contableCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBarcierre_contable" name="imgCerrarPaginaToolBarcierre_contable" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trcierre_contableCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedacierre_contable" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedacierre_contable',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trcierre_contableCabeceraBusquedas/super -->

		<tr id="trBusquedacierre_contable" class="busqueda" style="display:table-row">
			<td id="tdBusquedacierre_contable" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedacierre_contable" name="frmBusquedacierre_contable">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedacierre_contable" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trcierre_contableBusquedas" class="busqueda" style="display:table-row"><td>
				<?php if(cierre_contable_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 70%">
					<ul>
						<li id="listrVisibleFK_Idejercicio" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idejercicio"> Por  Ejercicio</a></li>
						<li id="listrVisibleFK_Idperiodo" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idperiodo"> Por  Periodo</a></li>
					</ul>
				
					<div id="divstrVisibleFK_Idejercicio">
					<table id="tblstrVisibleFK_Idejercicio" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo"> Ejercicio</span>
						</td>
						<td align="center">
							<select id="FK_Idejercicio-cmbid_ejercicio" name="FK_Idejercicio-cmbid_ejercicio" title=" Ejercicio" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarcierre_contableFK_Idejercicio" name="btnBuscarcierre_contableFK_Idejercicio" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idperiodo">
					<table id="tblstrVisibleFK_Idperiodo" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo"> Periodo</span>
						</td>
						<td align="center">
							<select id="FK_Idperiodo-cmbid_periodo" name="FK_Idperiodo-cmbid_periodo" title=" Periodo" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarcierre_contableFK_Idperiodo" name="btnBuscarcierre_contableFK_Idperiodo" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscarcierre_contable" style="display:table-row">
					<td id="tdParamsBuscarcierre_contable">
		<?php if(cierre_contable_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscarcierre_contable">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistroscierre_contable" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistroscierre_contable"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistroscierre_contable" name="ParamsBuscar-txtNumeroRegistroscierre_contable" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacioncierre_contable">
							<td id="tdGenerarReportecierre_contable" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodoscierre_contable" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodoscierre_contable" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacioncierre_contable" name="btnRecargarInformacioncierre_contable" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginacierre_contable" name="btnImprimirPaginacierre_contable" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*cierre_contable_web::$STR_ES_BUSQUEDA=='false'  &&*/ cierre_contable_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderBycierre_contable">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderBycierre_contable" name="btnOrderBycierre_contable" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
													</td>
													<td>
														<input type="button" id="btnOrderByRelcierre_contable" name="btnOrderByRelcierre_contable" title="RELACIONES DE DATOS" value="   Rels" class="btn btn-primary"/>
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

										<?php if(cierre_contable_web::$STR_ES_RELACIONES=='false' && cierre_contable_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbTiposRelaciones" name="ParamsBuscar-cmbTiposRelaciones" title="TIPOS DE RELACIONES" style="width:150px"></select>
										</td>
										<?php } ?>

										<?php if(cierre_contable_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdcierre_contableConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodoscierre_contable -->

							</td><!-- tdGenerarReportecierre_contable -->
						</tr><!-- trRecargarInformacioncierre_contable -->
					</table><!-- tblParamsBuscarNumeroRegistroscierre_contable -->
				</div> <!-- divParamsBuscarcierre_contable -->
		<?php } ?>
				</td> <!-- tdParamsBuscarcierre_contable -->
				</tr><!-- trParamsBuscarcierre_contable -->
				</table> <!-- tblBusquedacierre_contable -->
				</form> <!-- frmBusquedacierre_contable -->
				

			</td> <!-- tdBusquedacierre_contable -->
		</tr> <!-- trBusquedacierre_contable/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(cierre_contable_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divcierre_contablePopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblcierre_contablePopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmcierre_contableAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btncierre_contableAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="cierre_contable_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btncierre_contableAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmcierre_contableAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblcierre_contablePopupAjaxWebPart -->
		</div> <!-- divcierre_contablePopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(cierre_contable_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trcierre_contableTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdacierre_contable"></a>
		<img id="imgTablaParaDerechacierre_contable" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechacierre_contable'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdacierre_contable" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdacierre_contable'"/>
		<a id="TablaDerechacierre_contable"></a>
	</td>
</tr> <!-- trcierre_contableTablaNavegacion/super -->
<?php } ?>

<tr id="trcierre_contableTablaDatos">
	<td colspan="3" id="htmlTableCellcierre_contable">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatoscierre_contablesAjaxWebPart">
		</div>
	</td>
</tr> <!-- trcierre_contableTablaDatos/super -->
		
		
		<tr id="trcierre_contablePaginacion" style="display:table-row">
			<td id="tdcierre_contablePaginacion" align="center">
				<div id="divcierre_contablePaginacionAjaxWebPart">
				<form id="frmPaginacioncierre_contable" name="frmPaginacioncierre_contable">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacioncierre_contable" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:center">
					<tr>
						<?php if(cierre_contable_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkcierre_contable" name="btnSeleccionarLoteFkcierre_contable" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(cierre_contable_web::$STR_ES_RELACIONADO=='false' /*&& cierre_contable_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnteriorescierre_contable" name="btnAnteriorescierre_contable" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(cierre_contable_web::$STR_ES_BUSQUEDA=='false' && cierre_contable_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdcierre_contableNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPrepararcierre_contable" name="btnNuevoTablaPrepararcierre_contable" title="NUEVO Cierres Contables" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablacierre_contable" name="ParamsPaginar-txtNumeroNuevoTablacierre_contable" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(cierre_contable_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdcierre_contableConEditarcierre_contable">
							<label>
								<input id="ParamsBuscar-chbConEditarcierre_contable" name="ParamsBuscar-chbConEditarcierre_contable" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(cierre_contable_web::$STR_ES_RELACIONADO=='false'/* && cierre_contable_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientescierre_contable" name="btnSiguientescierre_contable" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacioncierre_contable -->
				</form> <!-- frmPaginacioncierre_contable -->
				<form id="frmNuevoPrepararcierre_contable" name="frmNuevoPrepararcierre_contable">
				<table id="tblNuevoPrepararcierre_contable" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:center">
					<tr id="trcierre_contableNuevo" height="10">
						<?php if(cierre_contable_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdcierre_contableNuevo" align="center">
							<input type="button" id="btnNuevoPrepararcierre_contable" name="btnNuevoPrepararcierre_contable" title="NUEVO Cierres Contables" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdcierre_contableGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambioscierre_contable" name="btnGuardarCambioscierre_contable" title="GUARDAR Cierres Contables" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(cierre_contable_web::$STR_ES_RELACIONADO=='false' && cierre_contable_web::$STR_ES_RELACIONES=='false' && cierre_contable_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdcierre_contableDuplicar" align="center">
							<input type="button" id="btnDuplicarcierre_contable" name="btnDuplicarcierre_contable" title="DUPLICAR Cierres Contables" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdcierre_contableCopiar" align="center">
							<input type="button" id="btnCopiarcierre_contable" name="btnCopiarcierre_contable" title="COPIAR Cierres Contables" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(cierre_contable_web::$STR_ES_RELACIONADO=='false' && ((cierre_contable_web::$STR_ES_RELACIONADO=='false' && cierre_contable_web::$STR_ES_RELACIONES=='false') || cierre_contable_web::$STR_ES_BUSQUEDA=='true'  || cierre_contable_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdcierre_contableCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginacierre_contable" name="btnCerrarPaginacierre_contable" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPrepararcierre_contable -->
				</form> <!-- frmNuevoPrepararcierre_contable -->
				</div> <!-- divcierre_contablePaginacionAjaxWebPart -->
			</td> <!-- tdcierre_contablePaginacion -->
		</tr> <!-- trcierre_contablePaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(cierre_contable_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionescierre_contableAjaxWebPart">
			<td id="tdAccionesRelacionescierre_contableAjaxWebPart">
				<div id="divAccionesRelacionescierre_contableAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionescierre_contableAjaxWebPart -->
		</tr> <!-- trAccionesRelacionescierre_contableAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderBycierre_contable">
			<td id="tdOrderBycierre_contable">
				<form id="frmOrderBycierre_contable" name="frmOrderBycierre_contable">
					<div id="divOrderBycierre_contableAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
				<form id="frmOrderByRelcierre_contable" name="frmOrderByRelcierre_contable">
					<div id="divOrderByRelcierre_contableAjaxWebPart" title="RELACIONES" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderBycierre_contable -->
		</tr> <!-- trOrderBycierre_contable/super -->
			
		
		
		
		
		
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
			
				import {cierre_contable_webcontrol,cierre_contable_webcontrol1} from './webroot/js/JavaScript/contabilidad/contabilidad/cierre_contable/js/webcontrol/cierre_contable_webcontrol.js?random=1';
				
				cierre_contable_webcontrol1.setcierre_contable_constante(window.cierre_contable_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(cierre_contable_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

