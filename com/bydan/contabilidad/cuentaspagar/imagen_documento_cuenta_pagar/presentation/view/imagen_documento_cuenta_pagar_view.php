<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\cuentaspagar\imagen_documento_cuenta_pagar\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Imagenes Documentos Cuentas por Pagar Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/cuentaspagar/imagen_documento_cuenta_pagar/util/imagen_documento_cuenta_pagar_carga.php');
	use com\bydan\contabilidad\cuentaspagar\imagen_documento_cuenta_pagar\util\imagen_documento_cuenta_pagar_carga;
	
	//include_once('com/bydan/contabilidad/cuentaspagar/imagen_documento_cuenta_pagar/presentation/view/imagen_documento_cuenta_pagar_web.php');
	//use com\bydan\contabilidad\cuentaspagar\imagen_documento_cuenta_pagar\presentation\view\imagen_documento_cuenta_pagar_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	imagen_documento_cuenta_pagar_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	imagen_documento_cuenta_pagar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$imagen_documento_cuenta_pagar_web1= new imagen_documento_cuenta_pagar_web();	
	$imagen_documento_cuenta_pagar_web1->cargarDatosGenerales();
	
	//$moduloActual=$imagen_documento_cuenta_pagar_web1->moduloActual;
	//$usuarioActual=$imagen_documento_cuenta_pagar_web1->usuarioActual;
	//$sessionBase=$imagen_documento_cuenta_pagar_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$imagen_documento_cuenta_pagar_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentaspagar/imagen_documento_cuenta_pagar/js/templating/imagen_documento_cuenta_pagar_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentaspagar/imagen_documento_cuenta_pagar/js/templating/imagen_documento_cuenta_pagar_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentaspagar/imagen_documento_cuenta_pagar/js/templating/imagen_documento_cuenta_pagar_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentaspagar/imagen_documento_cuenta_pagar/js/templating/imagen_documento_cuenta_pagar_datos_reporte_template.js'); ?>
		
			
						
		
		
		<?php 
			
		
			imagen_documento_cuenta_pagar_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					imagen_documento_cuenta_pagar_web::$GET_POST=$_GET;
				} else {
					imagen_documento_cuenta_pagar_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			imagen_documento_cuenta_pagar_web::$STR_NOMBRE_PAGINA = 'imagen_documento_cuenta_pagar_view.php';
			imagen_documento_cuenta_pagar_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			imagen_documento_cuenta_pagar_web::$BIT_ES_PAGINA_FORM = 'false';
				
			imagen_documento_cuenta_pagar_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {imagen_documento_cuenta_pagar_constante,imagen_documento_cuenta_pagar_constante1} from './webroot/js/JavaScript/contabilidad/cuentaspagar/imagen_documento_cuenta_pagar/js/util/imagen_documento_cuenta_pagar_constante.js?random=1';
			import {imagen_documento_cuenta_pagar_funcion,imagen_documento_cuenta_pagar_funcion1} from './webroot/js/JavaScript/contabilidad/cuentaspagar/imagen_documento_cuenta_pagar/js/util/imagen_documento_cuenta_pagar_funcion.js?random=1';
			
			let imagen_documento_cuenta_pagar_constante2 = new imagen_documento_cuenta_pagar_constante();
			
			imagen_documento_cuenta_pagar_constante2.STR_NOMBRE_PAGINA="<?php echo(imagen_documento_cuenta_pagar_web::$STR_NOMBRE_PAGINA); ?>";
			imagen_documento_cuenta_pagar_constante2.STR_TYPE_ON_LOADimagen_documento_cuenta_pagar="<?php echo(imagen_documento_cuenta_pagar_web::$STR_TYPE_ONLOAD); ?>";
			imagen_documento_cuenta_pagar_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(imagen_documento_cuenta_pagar_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			imagen_documento_cuenta_pagar_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(imagen_documento_cuenta_pagar_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			imagen_documento_cuenta_pagar_constante2.STR_ACTION="<?php echo(imagen_documento_cuenta_pagar_web::$STR_ACTION); ?>";
			imagen_documento_cuenta_pagar_constante2.STR_ES_POPUP="<?php echo(imagen_documento_cuenta_pagar_web::$STR_ES_POPUP); ?>";
			imagen_documento_cuenta_pagar_constante2.STR_ES_BUSQUEDA="<?php echo(imagen_documento_cuenta_pagar_web::$STR_ES_BUSQUEDA); ?>";
			imagen_documento_cuenta_pagar_constante2.STR_FUNCION_JS="<?php echo(imagen_documento_cuenta_pagar_web::$STR_FUNCION_JS); ?>";
			imagen_documento_cuenta_pagar_constante2.BIG_ID_ACTUAL="<?php echo(imagen_documento_cuenta_pagar_web::$BIG_ID_ACTUAL); ?>";
			imagen_documento_cuenta_pagar_constante2.BIG_ID_OPCION="<?php echo(imagen_documento_cuenta_pagar_web::$BIG_ID_OPCION); ?>";
			imagen_documento_cuenta_pagar_constante2.STR_OBJETO_JS="<?php echo(imagen_documento_cuenta_pagar_web::$STR_OBJETO_JS); ?>";
			imagen_documento_cuenta_pagar_constante2.STR_ES_RELACIONES="<?php echo(imagen_documento_cuenta_pagar_web::$STR_ES_RELACIONES); ?>";
			imagen_documento_cuenta_pagar_constante2.STR_ES_RELACIONADO="<?php echo(imagen_documento_cuenta_pagar_web::$STR_ES_RELACIONADO); ?>";
			imagen_documento_cuenta_pagar_constante2.STR_ES_SUB_PAGINA="<?php echo(imagen_documento_cuenta_pagar_web::$STR_ES_SUB_PAGINA); ?>";
			imagen_documento_cuenta_pagar_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(imagen_documento_cuenta_pagar_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			imagen_documento_cuenta_pagar_constante2.BIT_ES_PAGINA_FORM=<?php echo(imagen_documento_cuenta_pagar_web::$BIT_ES_PAGINA_FORM); ?>;
			imagen_documento_cuenta_pagar_constante2.STR_SUFIJO="<?php echo(imagen_documento_cuenta_pagar_web::$STR_SUF); ?>";//imagen_documento_cuenta_pagar
			imagen_documento_cuenta_pagar_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(imagen_documento_cuenta_pagar_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//imagen_documento_cuenta_pagar
			
			imagen_documento_cuenta_pagar_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(imagen_documento_cuenta_pagar_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			imagen_documento_cuenta_pagar_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($imagen_documento_cuenta_pagar_web1->moduloActual->getnombre()); ?>";
			imagen_documento_cuenta_pagar_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(imagen_documento_cuenta_pagar_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			imagen_documento_cuenta_pagar_constante2.BIT_ES_LOAD_NORMAL=true;
			/*imagen_documento_cuenta_pagar_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			imagen_documento_cuenta_pagar_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.imagen_documento_cuenta_pagar_constante2 = imagen_documento_cuenta_pagar_constante2;
			
		</script>
		
		<?php if(imagen_documento_cuenta_pagar_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.imagen_documento_cuenta_pagar_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.imagen_documento_cuenta_pagar_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="imagen_documento_cuenta_pagarActual" ></a>
	
	<div id="divResumenimagen_documento_cuenta_pagarActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(imagen_documento_cuenta_pagar_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(imagen_documento_cuenta_pagar_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(imagen_documento_cuenta_pagar_web::$STR_ES_BUSQUEDA=='false' && imagen_documento_cuenta_pagar_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(imagen_documento_cuenta_pagar_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(imagen_documento_cuenta_pagar_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(imagen_documento_cuenta_pagar_web::$STR_ES_RELACIONADO=='false' && imagen_documento_cuenta_pagar_web::$STR_ES_POPUP=='false' && imagen_documento_cuenta_pagar_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tdimagen_documento_cuenta_pagarNuevoToolBar">
										<img id="imgNuevoToolBarimagen_documento_cuenta_pagar" name="imgNuevoToolBarimagen_documento_cuenta_pagar" title="Nuevo Imagenes Documentos Cuentas por Pagar" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(imagen_documento_cuenta_pagar_web::$STR_ES_BUSQUEDA=='false' && imagen_documento_cuenta_pagar_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdimagen_documento_cuenta_pagarNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBarimagen_documento_cuenta_pagar" name="imgNuevoGuardarCambiosToolBarimagen_documento_cuenta_pagar" title="Nuevo TABLA Imagenes Documentos Cuentas por Pagar" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(imagen_documento_cuenta_pagar_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdimagen_documento_cuenta_pagarGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBarimagen_documento_cuenta_pagar" name="imgGuardarCambiosToolBarimagen_documento_cuenta_pagar" title="Guardar Imagenes Documentos Cuentas por Pagar" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(imagen_documento_cuenta_pagar_web::$STR_ES_RELACIONADO=='false' && imagen_documento_cuenta_pagar_web::$STR_ES_RELACIONES=='false' && imagen_documento_cuenta_pagar_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdimagen_documento_cuenta_pagarCopiarToolBar">
										<img id="imgCopiarToolBarimagen_documento_cuenta_pagar" name="imgCopiarToolBarimagen_documento_cuenta_pagar" title="Copiar Imagenes Documentos Cuentas por Pagar" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdimagen_documento_cuenta_pagarDuplicarToolBar">
										<img id="imgDuplicarToolBarimagen_documento_cuenta_pagar" name="imgDuplicarToolBarimagen_documento_cuenta_pagar" title="Duplicar Imagenes Documentos Cuentas por Pagar" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(imagen_documento_cuenta_pagar_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdimagen_documento_cuenta_pagarRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBarimagen_documento_cuenta_pagar" name="imgRecargarInformacionToolBarimagen_documento_cuenta_pagar" title="Recargar Imagenes Documentos Cuentas por Pagar" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdimagen_documento_cuenta_pagarAnterioresToolBar">
										<img id="imgAnterioresToolBarimagen_documento_cuenta_pagar" name="imgAnterioresToolBarimagen_documento_cuenta_pagar" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdimagen_documento_cuenta_pagarSiguientesToolBar">
										<img id="imgSiguientesToolBarimagen_documento_cuenta_pagar" name="imgSiguientesToolBarimagen_documento_cuenta_pagar" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdimagen_documento_cuenta_pagarAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBarimagen_documento_cuenta_pagar" name="imgAbrirOrderByToolBarimagen_documento_cuenta_pagar" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((imagen_documento_cuenta_pagar_web::$STR_ES_RELACIONADO=='false' && imagen_documento_cuenta_pagar_web::$STR_ES_RELACIONES=='false') || imagen_documento_cuenta_pagar_web::$STR_ES_BUSQUEDA=='true'  || imagen_documento_cuenta_pagar_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdimagen_documento_cuenta_pagarCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBarimagen_documento_cuenta_pagar" name="imgCerrarPaginaToolBarimagen_documento_cuenta_pagar" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trimagen_documento_cuenta_pagarCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedaimagen_documento_cuenta_pagar" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedaimagen_documento_cuenta_pagar',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trimagen_documento_cuenta_pagarCabeceraBusquedas/super -->

		<tr id="trBusquedaimagen_documento_cuenta_pagar" class="busqueda" style="display:table-row">
			<td id="tdBusquedaimagen_documento_cuenta_pagar" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedaimagen_documento_cuenta_pagar" name="frmBusquedaimagen_documento_cuenta_pagar">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedaimagen_documento_cuenta_pagar" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trimagen_documento_cuenta_pagarBusquedas" class="busqueda" style="display:table-row"><td>
				<?php if(imagen_documento_cuenta_pagar_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 70%">
					<ul>
						<li id="listrVisibleFK_Iddocumento_cuenta_pagar" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Iddocumento_cuenta_pagar"> Por Id Docs</a></li>
					</ul>
				
					<div id="divstrVisibleFK_Iddocumento_cuenta_pagar">
					<table id="tblstrVisibleFK_Iddocumento_cuenta_pagar" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Id Docs</span>
						</td>
						<td align="center">
							<select id="FK_Iddocumento_cuenta_pagar-cmbid_documento_cuenta_pagar" name="FK_Iddocumento_cuenta_pagar-cmbid_documento_cuenta_pagar" title="Id Docs" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarimagen_documento_cuenta_pagarFK_Iddocumento_cuenta_pagar" name="btnBuscarimagen_documento_cuenta_pagarFK_Iddocumento_cuenta_pagar" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscarimagen_documento_cuenta_pagar" style="display:table-row">
					<td id="tdParamsBuscarimagen_documento_cuenta_pagar">
		<?php if(imagen_documento_cuenta_pagar_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscarimagen_documento_cuenta_pagar">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistrosimagen_documento_cuenta_pagar" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistrosimagen_documento_cuenta_pagar"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistrosimagen_documento_cuenta_pagar" name="ParamsBuscar-txtNumeroRegistrosimagen_documento_cuenta_pagar" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacionimagen_documento_cuenta_pagar">
							<td id="tdGenerarReporteimagen_documento_cuenta_pagar" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodosimagen_documento_cuenta_pagar" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodosimagen_documento_cuenta_pagar" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacionimagen_documento_cuenta_pagar" name="btnRecargarInformacionimagen_documento_cuenta_pagar" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginaimagen_documento_cuenta_pagar" name="btnImprimirPaginaimagen_documento_cuenta_pagar" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*imagen_documento_cuenta_pagar_web::$STR_ES_BUSQUEDA=='false'  &&*/ imagen_documento_cuenta_pagar_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderByimagen_documento_cuenta_pagar">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderByimagen_documento_cuenta_pagar" name="btnOrderByimagen_documento_cuenta_pagar" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
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

										<?php if(imagen_documento_cuenta_pagar_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdimagen_documento_cuenta_pagarConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodosimagen_documento_cuenta_pagar -->

							</td><!-- tdGenerarReporteimagen_documento_cuenta_pagar -->
						</tr><!-- trRecargarInformacionimagen_documento_cuenta_pagar -->
					</table><!-- tblParamsBuscarNumeroRegistrosimagen_documento_cuenta_pagar -->
				</div> <!-- divParamsBuscarimagen_documento_cuenta_pagar -->
		<?php } ?>
				</td> <!-- tdParamsBuscarimagen_documento_cuenta_pagar -->
				</tr><!-- trParamsBuscarimagen_documento_cuenta_pagar -->
				</table> <!-- tblBusquedaimagen_documento_cuenta_pagar -->
				</form> <!-- frmBusquedaimagen_documento_cuenta_pagar -->
				

			</td> <!-- tdBusquedaimagen_documento_cuenta_pagar -->
		</tr> <!-- trBusquedaimagen_documento_cuenta_pagar/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(imagen_documento_cuenta_pagar_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divimagen_documento_cuenta_pagarPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblimagen_documento_cuenta_pagarPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmimagen_documento_cuenta_pagarAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnimagen_documento_cuenta_pagarAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="imagen_documento_cuenta_pagar_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnimagen_documento_cuenta_pagarAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmimagen_documento_cuenta_pagarAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblimagen_documento_cuenta_pagarPopupAjaxWebPart -->
		</div> <!-- divimagen_documento_cuenta_pagarPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(imagen_documento_cuenta_pagar_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trimagen_documento_cuenta_pagarTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdaimagen_documento_cuenta_pagar"></a>
		<img id="imgTablaParaDerechaimagen_documento_cuenta_pagar" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechaimagen_documento_cuenta_pagar'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdaimagen_documento_cuenta_pagar" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdaimagen_documento_cuenta_pagar'"/>
		<a id="TablaDerechaimagen_documento_cuenta_pagar"></a>
	</td>
</tr> <!-- trimagen_documento_cuenta_pagarTablaNavegacion/super -->
<?php } ?>

<tr id="trimagen_documento_cuenta_pagarTablaDatos">
	<td colspan="3" id="htmlTableCellimagen_documento_cuenta_pagar">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatosimagen_documento_cuenta_pagarsAjaxWebPart">
		</div>
	</td>
</tr> <!-- trimagen_documento_cuenta_pagarTablaDatos/super -->
		
		
		<tr id="trimagen_documento_cuenta_pagarPaginacion" style="display:table-row">
			<td id="tdimagen_documento_cuenta_pagarPaginacion" align="center">
				<div id="divimagen_documento_cuenta_pagarPaginacionAjaxWebPart">
				<form id="frmPaginacionimagen_documento_cuenta_pagar" name="frmPaginacionimagen_documento_cuenta_pagar">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacionimagen_documento_cuenta_pagar" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:center">
					<tr>
						<?php if(imagen_documento_cuenta_pagar_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkimagen_documento_cuenta_pagar" name="btnSeleccionarLoteFkimagen_documento_cuenta_pagar" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(imagen_documento_cuenta_pagar_web::$STR_ES_RELACIONADO=='false' /*&& imagen_documento_cuenta_pagar_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnterioresimagen_documento_cuenta_pagar" name="btnAnterioresimagen_documento_cuenta_pagar" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(imagen_documento_cuenta_pagar_web::$STR_ES_BUSQUEDA=='false' && imagen_documento_cuenta_pagar_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdimagen_documento_cuenta_pagarNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPrepararimagen_documento_cuenta_pagar" name="btnNuevoTablaPrepararimagen_documento_cuenta_pagar" title="NUEVO Imagenes Documentos Cuentas por Pagar" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablaimagen_documento_cuenta_pagar" name="ParamsPaginar-txtNumeroNuevoTablaimagen_documento_cuenta_pagar" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(imagen_documento_cuenta_pagar_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdimagen_documento_cuenta_pagarConEditarimagen_documento_cuenta_pagar">
							<label>
								<input id="ParamsBuscar-chbConEditarimagen_documento_cuenta_pagar" name="ParamsBuscar-chbConEditarimagen_documento_cuenta_pagar" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(imagen_documento_cuenta_pagar_web::$STR_ES_RELACIONADO=='false'/* && imagen_documento_cuenta_pagar_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientesimagen_documento_cuenta_pagar" name="btnSiguientesimagen_documento_cuenta_pagar" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacionimagen_documento_cuenta_pagar -->
				</form> <!-- frmPaginacionimagen_documento_cuenta_pagar -->
				<form id="frmNuevoPrepararimagen_documento_cuenta_pagar" name="frmNuevoPrepararimagen_documento_cuenta_pagar">
				<table id="tblNuevoPrepararimagen_documento_cuenta_pagar" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:center">
					<tr id="trimagen_documento_cuenta_pagarNuevo" height="10">
						<?php if(imagen_documento_cuenta_pagar_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdimagen_documento_cuenta_pagarNuevo" align="center">
							<input type="button" id="btnNuevoPrepararimagen_documento_cuenta_pagar" name="btnNuevoPrepararimagen_documento_cuenta_pagar" title="NUEVO Imagenes Documentos Cuentas por Pagar" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdimagen_documento_cuenta_pagarGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambiosimagen_documento_cuenta_pagar" name="btnGuardarCambiosimagen_documento_cuenta_pagar" title="GUARDAR Imagenes Documentos Cuentas por Pagar" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(imagen_documento_cuenta_pagar_web::$STR_ES_RELACIONADO=='false' && imagen_documento_cuenta_pagar_web::$STR_ES_RELACIONES=='false' && imagen_documento_cuenta_pagar_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdimagen_documento_cuenta_pagarDuplicar" align="center">
							<input type="button" id="btnDuplicarimagen_documento_cuenta_pagar" name="btnDuplicarimagen_documento_cuenta_pagar" title="DUPLICAR Imagenes Documentos Cuentas por Pagar" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdimagen_documento_cuenta_pagarCopiar" align="center">
							<input type="button" id="btnCopiarimagen_documento_cuenta_pagar" name="btnCopiarimagen_documento_cuenta_pagar" title="COPIAR Imagenes Documentos Cuentas por Pagar" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(imagen_documento_cuenta_pagar_web::$STR_ES_RELACIONADO=='false' && ((imagen_documento_cuenta_pagar_web::$STR_ES_RELACIONADO=='false' && imagen_documento_cuenta_pagar_web::$STR_ES_RELACIONES=='false') || imagen_documento_cuenta_pagar_web::$STR_ES_BUSQUEDA=='true'  || imagen_documento_cuenta_pagar_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdimagen_documento_cuenta_pagarCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginaimagen_documento_cuenta_pagar" name="btnCerrarPaginaimagen_documento_cuenta_pagar" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPrepararimagen_documento_cuenta_pagar -->
				</form> <!-- frmNuevoPrepararimagen_documento_cuenta_pagar -->
				</div> <!-- divimagen_documento_cuenta_pagarPaginacionAjaxWebPart -->
			</td> <!-- tdimagen_documento_cuenta_pagarPaginacion -->
		</tr> <!-- trimagen_documento_cuenta_pagarPaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(imagen_documento_cuenta_pagar_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionesimagen_documento_cuenta_pagarAjaxWebPart">
			<td id="tdAccionesRelacionesimagen_documento_cuenta_pagarAjaxWebPart">
				<div id="divAccionesRelacionesimagen_documento_cuenta_pagarAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionesimagen_documento_cuenta_pagarAjaxWebPart -->
		</tr> <!-- trAccionesRelacionesimagen_documento_cuenta_pagarAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderByimagen_documento_cuenta_pagar">
			<td id="tdOrderByimagen_documento_cuenta_pagar">
				<form id="frmOrderByimagen_documento_cuenta_pagar" name="frmOrderByimagen_documento_cuenta_pagar">
					<div id="divOrderByimagen_documento_cuenta_pagarAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderByimagen_documento_cuenta_pagar -->
		</tr> <!-- trOrderByimagen_documento_cuenta_pagar/super -->
			
		
		
		
		
		
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
			
				import {imagen_documento_cuenta_pagar_webcontrol,imagen_documento_cuenta_pagar_webcontrol1} from './webroot/js/JavaScript/contabilidad/cuentaspagar/imagen_documento_cuenta_pagar/js/webcontrol/imagen_documento_cuenta_pagar_webcontrol.js?random=1';
				
				imagen_documento_cuenta_pagar_webcontrol1.setimagen_documento_cuenta_pagar_constante(window.imagen_documento_cuenta_pagar_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(imagen_documento_cuenta_pagar_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

