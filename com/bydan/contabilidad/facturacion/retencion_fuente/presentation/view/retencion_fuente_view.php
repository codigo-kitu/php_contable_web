<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\facturacion\retencion_fuente\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Retencion Fuente Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/facturacion/retencion_fuente/util/retencion_fuente_carga.php');
	use com\bydan\contabilidad\facturacion\retencion_fuente\util\retencion_fuente_carga;
	
	//include_once('com/bydan/contabilidad/facturacion/retencion_fuente/presentation/view/retencion_fuente_web.php');
	//use com\bydan\contabilidad\facturacion\retencion_fuente\presentation\view\retencion_fuente_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	retencion_fuente_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	retencion_fuente_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$retencion_fuente_web1= new retencion_fuente_web();	
	$retencion_fuente_web1->cargarDatosGenerales();
	
	//$moduloActual=$retencion_fuente_web1->moduloActual;
	//$usuarioActual=$retencion_fuente_web1->usuarioActual;
	//$sessionBase=$retencion_fuente_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$retencion_fuente_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/facturacion/retencion_fuente/js/templating/retencion_fuente_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/facturacion/retencion_fuente/js/templating/retencion_fuente_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/facturacion/retencion_fuente/js/templating/retencion_fuente_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/facturacion/retencion_fuente/js/templating/retencion_fuente_datos_reporte_template.js'); ?>
		
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/facturacion/retencion_fuente/js/templating/retencion_fuente_datos_relaciones_template.js'); ?>
			
						
		
		
		<?php 
			
		
			retencion_fuente_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					retencion_fuente_web::$GET_POST=$_GET;
				} else {
					retencion_fuente_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			retencion_fuente_web::$STR_NOMBRE_PAGINA = 'retencion_fuente_view.php';
			retencion_fuente_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			retencion_fuente_web::$BIT_ES_PAGINA_FORM = 'false';
				
			retencion_fuente_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {retencion_fuente_constante,retencion_fuente_constante1} from './webroot/js/JavaScript/contabilidad/facturacion/retencion_fuente/js/util/retencion_fuente_constante.js?random=1';
			import {retencion_fuente_funcion,retencion_fuente_funcion1} from './webroot/js/JavaScript/contabilidad/facturacion/retencion_fuente/js/util/retencion_fuente_funcion.js?random=1';
			
			let retencion_fuente_constante2 = new retencion_fuente_constante();
			
			retencion_fuente_constante2.STR_NOMBRE_PAGINA="<?php echo(retencion_fuente_web::$STR_NOMBRE_PAGINA); ?>";
			retencion_fuente_constante2.STR_TYPE_ON_LOADretencion_fuente="<?php echo(retencion_fuente_web::$STR_TYPE_ONLOAD); ?>";
			retencion_fuente_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(retencion_fuente_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			retencion_fuente_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(retencion_fuente_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			retencion_fuente_constante2.STR_ACTION="<?php echo(retencion_fuente_web::$STR_ACTION); ?>";
			retencion_fuente_constante2.STR_ES_POPUP="<?php echo(retencion_fuente_web::$STR_ES_POPUP); ?>";
			retencion_fuente_constante2.STR_ES_BUSQUEDA="<?php echo(retencion_fuente_web::$STR_ES_BUSQUEDA); ?>";
			retencion_fuente_constante2.STR_FUNCION_JS="<?php echo(retencion_fuente_web::$STR_FUNCION_JS); ?>";
			retencion_fuente_constante2.BIG_ID_ACTUAL="<?php echo(retencion_fuente_web::$BIG_ID_ACTUAL); ?>";
			retencion_fuente_constante2.BIG_ID_OPCION="<?php echo(retencion_fuente_web::$BIG_ID_OPCION); ?>";
			retencion_fuente_constante2.STR_OBJETO_JS="<?php echo(retencion_fuente_web::$STR_OBJETO_JS); ?>";
			retencion_fuente_constante2.STR_ES_RELACIONES="<?php echo(retencion_fuente_web::$STR_ES_RELACIONES); ?>";
			retencion_fuente_constante2.STR_ES_RELACIONADO="<?php echo(retencion_fuente_web::$STR_ES_RELACIONADO); ?>";
			retencion_fuente_constante2.STR_ES_SUB_PAGINA="<?php echo(retencion_fuente_web::$STR_ES_SUB_PAGINA); ?>";
			retencion_fuente_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(retencion_fuente_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			retencion_fuente_constante2.BIT_ES_PAGINA_FORM=<?php echo(retencion_fuente_web::$BIT_ES_PAGINA_FORM); ?>;
			retencion_fuente_constante2.STR_SUFIJO="<?php echo(retencion_fuente_web::$STR_SUF); ?>";//retencion_fuente
			retencion_fuente_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(retencion_fuente_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//retencion_fuente
			
			retencion_fuente_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(retencion_fuente_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			retencion_fuente_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($retencion_fuente_web1->moduloActual->getnombre()); ?>";
			retencion_fuente_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(retencion_fuente_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			retencion_fuente_constante2.BIT_ES_LOAD_NORMAL=true;
			/*retencion_fuente_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			retencion_fuente_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.retencion_fuente_constante2 = retencion_fuente_constante2;
			
		</script>
		
		<?php if(retencion_fuente_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.retencion_fuente_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.retencion_fuente_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="retencion_fuenteActual" ></a>
	
	<div id="divResumenretencion_fuenteActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(retencion_fuente_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(retencion_fuente_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(retencion_fuente_web::$STR_ES_BUSQUEDA=='false' && retencion_fuente_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(retencion_fuente_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(retencion_fuente_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(retencion_fuente_web::$STR_ES_RELACIONADO=='false' && retencion_fuente_web::$STR_ES_POPUP=='false' && retencion_fuente_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tdretencion_fuenteNuevoToolBar">
										<img id="imgNuevoToolBarretencion_fuente" name="imgNuevoToolBarretencion_fuente" title="Nuevo Retencion Fuente" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(retencion_fuente_web::$STR_ES_BUSQUEDA=='false' && retencion_fuente_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdretencion_fuenteNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBarretencion_fuente" name="imgNuevoGuardarCambiosToolBarretencion_fuente" title="Nuevo TABLA Retencion Fuente" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(retencion_fuente_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdretencion_fuenteGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBarretencion_fuente" name="imgGuardarCambiosToolBarretencion_fuente" title="Guardar Retencion Fuente" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(retencion_fuente_web::$STR_ES_RELACIONADO=='false' && retencion_fuente_web::$STR_ES_RELACIONES=='false' && retencion_fuente_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdretencion_fuenteCopiarToolBar">
										<img id="imgCopiarToolBarretencion_fuente" name="imgCopiarToolBarretencion_fuente" title="Copiar Retencion Fuente" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdretencion_fuenteDuplicarToolBar">
										<img id="imgDuplicarToolBarretencion_fuente" name="imgDuplicarToolBarretencion_fuente" title="Duplicar Retencion Fuente" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(retencion_fuente_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdretencion_fuenteRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBarretencion_fuente" name="imgRecargarInformacionToolBarretencion_fuente" title="Recargar Retencion Fuente" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdretencion_fuenteAnterioresToolBar">
										<img id="imgAnterioresToolBarretencion_fuente" name="imgAnterioresToolBarretencion_fuente" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdretencion_fuenteSiguientesToolBar">
										<img id="imgSiguientesToolBarretencion_fuente" name="imgSiguientesToolBarretencion_fuente" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdretencion_fuenteAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBarretencion_fuente" name="imgAbrirOrderByToolBarretencion_fuente" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((retencion_fuente_web::$STR_ES_RELACIONADO=='false' && retencion_fuente_web::$STR_ES_RELACIONES=='false') || retencion_fuente_web::$STR_ES_BUSQUEDA=='true'  || retencion_fuente_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdretencion_fuenteCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBarretencion_fuente" name="imgCerrarPaginaToolBarretencion_fuente" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trretencion_fuenteCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedaretencion_fuente" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedaretencion_fuente',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trretencion_fuenteCabeceraBusquedas/super -->

		<tr id="trBusquedaretencion_fuente" class="busqueda" style="display:table-row">
			<td id="tdBusquedaretencion_fuente" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedaretencion_fuente" name="frmBusquedaretencion_fuente">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedaretencion_fuente" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trretencion_fuenteBusquedas" class="busqueda" style="display:table-row"><td>
				<?php if(retencion_fuente_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 70%">
					<ul>
						<li id="listrVisibleFK_Idcuenta_compras" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idcuenta_compras"> Por  Cuentas Compras</a></li>
						<li id="listrVisibleFK_Idcuenta_ventas" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idcuenta_ventas"> Por  Cuentas Ventas</a></li>
					</ul>
				
					<div id="divstrVisibleFK_Idcuenta_compras">
					<table id="tblstrVisibleFK_Idcuenta_compras" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo"> Cuentas Compras</span>
						</td>
						<td align="center">
							<select id="FK_Idcuenta_compras-cmbid_cuenta_compras" name="FK_Idcuenta_compras-cmbid_cuenta_compras" title=" Cuentas Compras" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarretencion_fuenteFK_Idcuenta_compras" name="btnBuscarretencion_fuenteFK_Idcuenta_compras" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idcuenta_ventas">
					<table id="tblstrVisibleFK_Idcuenta_ventas" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo"> Cuentas Ventas</span>
						</td>
						<td align="center">
							<select id="FK_Idcuenta_ventas-cmbid_cuenta_ventas" name="FK_Idcuenta_ventas-cmbid_cuenta_ventas" title=" Cuentas Ventas" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarretencion_fuenteFK_Idcuenta_ventas" name="btnBuscarretencion_fuenteFK_Idcuenta_ventas" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscarretencion_fuente" style="display:table-row">
					<td id="tdParamsBuscarretencion_fuente">
		<?php if(retencion_fuente_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscarretencion_fuente">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistrosretencion_fuente" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistrosretencion_fuente"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistrosretencion_fuente" name="ParamsBuscar-txtNumeroRegistrosretencion_fuente" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacionretencion_fuente">
							<td id="tdGenerarReporteretencion_fuente" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodosretencion_fuente" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodosretencion_fuente" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacionretencion_fuente" name="btnRecargarInformacionretencion_fuente" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginaretencion_fuente" name="btnImprimirPaginaretencion_fuente" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*retencion_fuente_web::$STR_ES_BUSQUEDA=='false'  &&*/ retencion_fuente_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderByretencion_fuente">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderByretencion_fuente" name="btnOrderByretencion_fuente" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
													</td>
													<td>
														<input type="button" id="btnOrderByRelretencion_fuente" name="btnOrderByRelretencion_fuente" title="RELACIONES DE DATOS" value="   Rels" class="btn btn-primary"/>
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

										<?php if(retencion_fuente_web::$STR_ES_RELACIONES=='false' && retencion_fuente_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbTiposRelaciones" name="ParamsBuscar-cmbTiposRelaciones" title="TIPOS DE RELACIONES" style="width:150px"></select>
										</td>
										<?php } ?>

										<?php if(retencion_fuente_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdretencion_fuenteConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodosretencion_fuente -->

							</td><!-- tdGenerarReporteretencion_fuente -->
						</tr><!-- trRecargarInformacionretencion_fuente -->
					</table><!-- tblParamsBuscarNumeroRegistrosretencion_fuente -->
				</div> <!-- divParamsBuscarretencion_fuente -->
		<?php } ?>
				</td> <!-- tdParamsBuscarretencion_fuente -->
				</tr><!-- trParamsBuscarretencion_fuente -->
				</table> <!-- tblBusquedaretencion_fuente -->
				</form> <!-- frmBusquedaretencion_fuente -->
				

			</td> <!-- tdBusquedaretencion_fuente -->
		</tr> <!-- trBusquedaretencion_fuente/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(retencion_fuente_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divretencion_fuentePopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblretencion_fuentePopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmretencion_fuenteAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnretencion_fuenteAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="retencion_fuente_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnretencion_fuenteAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmretencion_fuenteAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblretencion_fuentePopupAjaxWebPart -->
		</div> <!-- divretencion_fuentePopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(retencion_fuente_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trretencion_fuenteTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdaretencion_fuente"></a>
		<img id="imgTablaParaDerecharetencion_fuente" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerecharetencion_fuente'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdaretencion_fuente" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdaretencion_fuente'"/>
		<a id="TablaDerecharetencion_fuente"></a>
	</td>
</tr> <!-- trretencion_fuenteTablaNavegacion/super -->
<?php } ?>

<tr id="trretencion_fuenteTablaDatos">
	<td colspan="3" id="htmlTableCellretencion_fuente">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatosretencion_fuentesAjaxWebPart">
		</div>
	</td>
</tr> <!-- trretencion_fuenteTablaDatos/super -->
		
		
		<tr id="trretencion_fuentePaginacion" style="display:table-row">
			<td id="tdretencion_fuentePaginacion" align="left">
				<div id="divretencion_fuentePaginacionAjaxWebPart">
				<form id="frmPaginacionretencion_fuente" name="frmPaginacionretencion_fuente">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacionretencion_fuente" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:left">
					<tr>
						<?php if(retencion_fuente_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkretencion_fuente" name="btnSeleccionarLoteFkretencion_fuente" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(retencion_fuente_web::$STR_ES_RELACIONADO=='false' /*&& retencion_fuente_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnterioresretencion_fuente" name="btnAnterioresretencion_fuente" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(retencion_fuente_web::$STR_ES_BUSQUEDA=='false' && retencion_fuente_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdretencion_fuenteNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPrepararretencion_fuente" name="btnNuevoTablaPrepararretencion_fuente" title="NUEVO Retencion Fuente" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablaretencion_fuente" name="ParamsPaginar-txtNumeroNuevoTablaretencion_fuente" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(retencion_fuente_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdretencion_fuenteConEditarretencion_fuente">
							<label>
								<input id="ParamsBuscar-chbConEditarretencion_fuente" name="ParamsBuscar-chbConEditarretencion_fuente" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(retencion_fuente_web::$STR_ES_RELACIONADO=='false'/* && retencion_fuente_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientesretencion_fuente" name="btnSiguientesretencion_fuente" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacionretencion_fuente -->
				</form> <!-- frmPaginacionretencion_fuente -->
				<form id="frmNuevoPrepararretencion_fuente" name="frmNuevoPrepararretencion_fuente">
				<table id="tblNuevoPrepararretencion_fuente" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:left">
					<tr id="trretencion_fuenteNuevo" height="10">
						<?php if(retencion_fuente_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdretencion_fuenteNuevo" align="center">
							<input type="button" id="btnNuevoPrepararretencion_fuente" name="btnNuevoPrepararretencion_fuente" title="NUEVO Retencion Fuente" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdretencion_fuenteGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambiosretencion_fuente" name="btnGuardarCambiosretencion_fuente" title="GUARDAR Retencion Fuente" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(retencion_fuente_web::$STR_ES_RELACIONADO=='false' && retencion_fuente_web::$STR_ES_RELACIONES=='false' && retencion_fuente_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdretencion_fuenteDuplicar" align="center">
							<input type="button" id="btnDuplicarretencion_fuente" name="btnDuplicarretencion_fuente" title="DUPLICAR Retencion Fuente" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdretencion_fuenteCopiar" align="center">
							<input type="button" id="btnCopiarretencion_fuente" name="btnCopiarretencion_fuente" title="COPIAR Retencion Fuente" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(retencion_fuente_web::$STR_ES_RELACIONADO=='false' && ((retencion_fuente_web::$STR_ES_RELACIONADO=='false' && retencion_fuente_web::$STR_ES_RELACIONES=='false') || retencion_fuente_web::$STR_ES_BUSQUEDA=='true'  || retencion_fuente_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdretencion_fuenteCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginaretencion_fuente" name="btnCerrarPaginaretencion_fuente" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPrepararretencion_fuente -->
				</form> <!-- frmNuevoPrepararretencion_fuente -->
				</div> <!-- divretencion_fuentePaginacionAjaxWebPart -->
			</td> <!-- tdretencion_fuentePaginacion -->
		</tr> <!-- trretencion_fuentePaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(retencion_fuente_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionesretencion_fuenteAjaxWebPart">
			<td id="tdAccionesRelacionesretencion_fuenteAjaxWebPart">
				<div id="divAccionesRelacionesretencion_fuenteAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionesretencion_fuenteAjaxWebPart -->
		</tr> <!-- trAccionesRelacionesretencion_fuenteAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderByretencion_fuente">
			<td id="tdOrderByretencion_fuente">
				<form id="frmOrderByretencion_fuente" name="frmOrderByretencion_fuente">
					<div id="divOrderByretencion_fuenteAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
				<form id="frmOrderByRelretencion_fuente" name="frmOrderByRelretencion_fuente">
					<div id="divOrderByRelretencion_fuenteAjaxWebPart" title="RELACIONES" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderByretencion_fuente -->
		</tr> <!-- trOrderByretencion_fuente/super -->
			
		
		
		
		
		
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
			
				import {retencion_fuente_webcontrol,retencion_fuente_webcontrol1} from './webroot/js/JavaScript/contabilidad/facturacion/retencion_fuente/js/webcontrol/retencion_fuente_webcontrol.js?random=1';
				
				retencion_fuente_webcontrol1.setretencion_fuente_constante(window.retencion_fuente_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(retencion_fuente_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

