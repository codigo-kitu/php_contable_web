<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\cuentaspagar\credito_cuenta_pagar\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Credito Cuenta Pagar Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/cuentaspagar/credito_cuenta_pagar/util/credito_cuenta_pagar_carga.php');
	use com\bydan\contabilidad\cuentaspagar\credito_cuenta_pagar\util\credito_cuenta_pagar_carga;
	
	//include_once('com/bydan/contabilidad/cuentaspagar/credito_cuenta_pagar/presentation/view/credito_cuenta_pagar_web.php');
	//use com\bydan\contabilidad\cuentaspagar\credito_cuenta_pagar\presentation\view\credito_cuenta_pagar_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	credito_cuenta_pagar_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	credito_cuenta_pagar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$credito_cuenta_pagar_web1= new credito_cuenta_pagar_web();	
	$credito_cuenta_pagar_web1->cargarDatosGenerales();
	
	//$moduloActual=$credito_cuenta_pagar_web1->moduloActual;
	//$usuarioActual=$credito_cuenta_pagar_web1->usuarioActual;
	//$sessionBase=$credito_cuenta_pagar_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$credito_cuenta_pagar_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentaspagar/credito_cuenta_pagar/js/templating/credito_cuenta_pagar_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentaspagar/credito_cuenta_pagar/js/templating/credito_cuenta_pagar_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentaspagar/credito_cuenta_pagar/js/templating/credito_cuenta_pagar_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentaspagar/credito_cuenta_pagar/js/templating/credito_cuenta_pagar_datos_reporte_template.js'); ?>
		
			
						
		
		
		<?php 
			
		
			credito_cuenta_pagar_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					credito_cuenta_pagar_web::$GET_POST=$_GET;
				} else {
					credito_cuenta_pagar_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			credito_cuenta_pagar_web::$STR_NOMBRE_PAGINA = 'credito_cuenta_pagar_view.php';
			credito_cuenta_pagar_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			credito_cuenta_pagar_web::$BIT_ES_PAGINA_FORM = 'false';
				
			credito_cuenta_pagar_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {credito_cuenta_pagar_constante,credito_cuenta_pagar_constante1} from './webroot/js/JavaScript/contabilidad/cuentaspagar/credito_cuenta_pagar/js/util/credito_cuenta_pagar_constante.js?random=1';
			import {credito_cuenta_pagar_funcion,credito_cuenta_pagar_funcion1} from './webroot/js/JavaScript/contabilidad/cuentaspagar/credito_cuenta_pagar/js/util/credito_cuenta_pagar_funcion.js?random=1';
			
			let credito_cuenta_pagar_constante2 = new credito_cuenta_pagar_constante();
			
			credito_cuenta_pagar_constante2.STR_NOMBRE_PAGINA="<?php echo(credito_cuenta_pagar_web::$STR_NOMBRE_PAGINA); ?>";
			credito_cuenta_pagar_constante2.STR_TYPE_ON_LOADcredito_cuenta_pagar="<?php echo(credito_cuenta_pagar_web::$STR_TYPE_ONLOAD); ?>";
			credito_cuenta_pagar_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(credito_cuenta_pagar_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			credito_cuenta_pagar_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(credito_cuenta_pagar_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			credito_cuenta_pagar_constante2.STR_ACTION="<?php echo(credito_cuenta_pagar_web::$STR_ACTION); ?>";
			credito_cuenta_pagar_constante2.STR_ES_POPUP="<?php echo(credito_cuenta_pagar_web::$STR_ES_POPUP); ?>";
			credito_cuenta_pagar_constante2.STR_ES_BUSQUEDA="<?php echo(credito_cuenta_pagar_web::$STR_ES_BUSQUEDA); ?>";
			credito_cuenta_pagar_constante2.STR_FUNCION_JS="<?php echo(credito_cuenta_pagar_web::$STR_FUNCION_JS); ?>";
			credito_cuenta_pagar_constante2.BIG_ID_ACTUAL="<?php echo(credito_cuenta_pagar_web::$BIG_ID_ACTUAL); ?>";
			credito_cuenta_pagar_constante2.BIG_ID_OPCION="<?php echo(credito_cuenta_pagar_web::$BIG_ID_OPCION); ?>";
			credito_cuenta_pagar_constante2.STR_OBJETO_JS="<?php echo(credito_cuenta_pagar_web::$STR_OBJETO_JS); ?>";
			credito_cuenta_pagar_constante2.STR_ES_RELACIONES="<?php echo(credito_cuenta_pagar_web::$STR_ES_RELACIONES); ?>";
			credito_cuenta_pagar_constante2.STR_ES_RELACIONADO="<?php echo(credito_cuenta_pagar_web::$STR_ES_RELACIONADO); ?>";
			credito_cuenta_pagar_constante2.STR_ES_SUB_PAGINA="<?php echo(credito_cuenta_pagar_web::$STR_ES_SUB_PAGINA); ?>";
			credito_cuenta_pagar_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(credito_cuenta_pagar_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			credito_cuenta_pagar_constante2.BIT_ES_PAGINA_FORM=<?php echo(credito_cuenta_pagar_web::$BIT_ES_PAGINA_FORM); ?>;
			credito_cuenta_pagar_constante2.STR_SUFIJO="<?php echo(credito_cuenta_pagar_web::$STR_SUF); ?>";//credito_cuenta_pagar
			credito_cuenta_pagar_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(credito_cuenta_pagar_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//credito_cuenta_pagar
			
			credito_cuenta_pagar_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(credito_cuenta_pagar_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			credito_cuenta_pagar_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($credito_cuenta_pagar_web1->moduloActual->getnombre()); ?>";
			credito_cuenta_pagar_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(credito_cuenta_pagar_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			credito_cuenta_pagar_constante2.BIT_ES_LOAD_NORMAL=true;
			/*credito_cuenta_pagar_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			credito_cuenta_pagar_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.credito_cuenta_pagar_constante2 = credito_cuenta_pagar_constante2;
			
		</script>
		
		<?php if(credito_cuenta_pagar_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.credito_cuenta_pagar_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.credito_cuenta_pagar_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="credito_cuenta_pagarActual" ></a>
	
	<div id="divResumencredito_cuenta_pagarActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(credito_cuenta_pagar_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(credito_cuenta_pagar_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(credito_cuenta_pagar_web::$STR_ES_BUSQUEDA=='false' && credito_cuenta_pagar_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(credito_cuenta_pagar_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(credito_cuenta_pagar_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(credito_cuenta_pagar_web::$STR_ES_RELACIONADO=='false' && credito_cuenta_pagar_web::$STR_ES_POPUP=='false' && credito_cuenta_pagar_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tdcredito_cuenta_pagarNuevoToolBar">
										<img id="imgNuevoToolBarcredito_cuenta_pagar" name="imgNuevoToolBarcredito_cuenta_pagar" title="Nuevo Credito Cuenta Pagar" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(credito_cuenta_pagar_web::$STR_ES_BUSQUEDA=='false' && credito_cuenta_pagar_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdcredito_cuenta_pagarNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBarcredito_cuenta_pagar" name="imgNuevoGuardarCambiosToolBarcredito_cuenta_pagar" title="Nuevo TABLA Credito Cuenta Pagar" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(credito_cuenta_pagar_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdcredito_cuenta_pagarGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBarcredito_cuenta_pagar" name="imgGuardarCambiosToolBarcredito_cuenta_pagar" title="Guardar Credito Cuenta Pagar" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(credito_cuenta_pagar_web::$STR_ES_RELACIONADO=='false' && credito_cuenta_pagar_web::$STR_ES_RELACIONES=='false' && credito_cuenta_pagar_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdcredito_cuenta_pagarCopiarToolBar">
										<img id="imgCopiarToolBarcredito_cuenta_pagar" name="imgCopiarToolBarcredito_cuenta_pagar" title="Copiar Credito Cuenta Pagar" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdcredito_cuenta_pagarDuplicarToolBar">
										<img id="imgDuplicarToolBarcredito_cuenta_pagar" name="imgDuplicarToolBarcredito_cuenta_pagar" title="Duplicar Credito Cuenta Pagar" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(credito_cuenta_pagar_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdcredito_cuenta_pagarRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBarcredito_cuenta_pagar" name="imgRecargarInformacionToolBarcredito_cuenta_pagar" title="Recargar Credito Cuenta Pagar" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdcredito_cuenta_pagarAnterioresToolBar">
										<img id="imgAnterioresToolBarcredito_cuenta_pagar" name="imgAnterioresToolBarcredito_cuenta_pagar" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdcredito_cuenta_pagarSiguientesToolBar">
										<img id="imgSiguientesToolBarcredito_cuenta_pagar" name="imgSiguientesToolBarcredito_cuenta_pagar" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdcredito_cuenta_pagarAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBarcredito_cuenta_pagar" name="imgAbrirOrderByToolBarcredito_cuenta_pagar" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((credito_cuenta_pagar_web::$STR_ES_RELACIONADO=='false' && credito_cuenta_pagar_web::$STR_ES_RELACIONES=='false') || credito_cuenta_pagar_web::$STR_ES_BUSQUEDA=='true'  || credito_cuenta_pagar_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdcredito_cuenta_pagarCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBarcredito_cuenta_pagar" name="imgCerrarPaginaToolBarcredito_cuenta_pagar" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trcredito_cuenta_pagarCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedacredito_cuenta_pagar" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedacredito_cuenta_pagar',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trcredito_cuenta_pagarCabeceraBusquedas/super -->

		<tr id="trBusquedacredito_cuenta_pagar" class="busqueda" style="display:table-row">
			<td id="tdBusquedacredito_cuenta_pagar" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedacredito_cuenta_pagar" name="frmBusquedacredito_cuenta_pagar">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedacredito_cuenta_pagar" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trcredito_cuenta_pagarBusquedas" class="busqueda" style="display:table-row"><td>
				<?php if(credito_cuenta_pagar_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 70%">
					<ul>
						<li id="listrVisibleFK_Idcuenta_pagar" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idcuenta_pagar"> Por  Cuenta Pagar</a></li>
						<li id="listrVisibleFK_Idestado" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idestado"> Por  Estado</a></li>
						<li id="listrVisibleFK_Idtermino_pago_proveedor" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idtermino_pago_proveedor"> Por Termino Pago Proveedor</a></li>
					</ul>
				
					<div id="divstrVisibleFK_Idcuenta_pagar">
					<table id="tblstrVisibleFK_Idcuenta_pagar" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo"> Cuenta Pagar</span>
						</td>
						<td align="center">
							<select id="FK_Idcuenta_pagar-cmbid_cuenta_pagar" name="FK_Idcuenta_pagar-cmbid_cuenta_pagar" title=" Cuenta Pagar" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarcredito_cuenta_pagarFK_Idcuenta_pagar" name="btnBuscarcredito_cuenta_pagarFK_Idcuenta_pagar" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idestado">
					<table id="tblstrVisibleFK_Idestado" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo"> Estado</span>
						</td>
						<td align="center">
							<select id="FK_Idestado-cmbid_estado" name="FK_Idestado-cmbid_estado" title=" Estado" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarcredito_cuenta_pagarFK_Idestado" name="btnBuscarcredito_cuenta_pagarFK_Idestado" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idtermino_pago_proveedor">
					<table id="tblstrVisibleFK_Idtermino_pago_proveedor" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Termino Pago Proveedor</span>
						</td>
						<td align="center">
							<select id="FK_Idtermino_pago_proveedor-cmbid_termino_pago_proveedor" name="FK_Idtermino_pago_proveedor-cmbid_termino_pago_proveedor" title="Termino Pago Proveedor" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarcredito_cuenta_pagarFK_Idtermino_pago_proveedor" name="btnBuscarcredito_cuenta_pagarFK_Idtermino_pago_proveedor" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscarcredito_cuenta_pagar" style="display:table-row">
					<td id="tdParamsBuscarcredito_cuenta_pagar">
		<?php if(credito_cuenta_pagar_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscarcredito_cuenta_pagar">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistroscredito_cuenta_pagar" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistroscredito_cuenta_pagar"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistroscredito_cuenta_pagar" name="ParamsBuscar-txtNumeroRegistroscredito_cuenta_pagar" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacioncredito_cuenta_pagar">
							<td id="tdGenerarReportecredito_cuenta_pagar" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodoscredito_cuenta_pagar" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodoscredito_cuenta_pagar" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacioncredito_cuenta_pagar" name="btnRecargarInformacioncredito_cuenta_pagar" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginacredito_cuenta_pagar" name="btnImprimirPaginacredito_cuenta_pagar" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*credito_cuenta_pagar_web::$STR_ES_BUSQUEDA=='false'  &&*/ credito_cuenta_pagar_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderBycredito_cuenta_pagar">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderBycredito_cuenta_pagar" name="btnOrderBycredito_cuenta_pagar" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
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

										<?php if(credito_cuenta_pagar_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdcredito_cuenta_pagarConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodoscredito_cuenta_pagar -->

							</td><!-- tdGenerarReportecredito_cuenta_pagar -->
						</tr><!-- trRecargarInformacioncredito_cuenta_pagar -->
					</table><!-- tblParamsBuscarNumeroRegistroscredito_cuenta_pagar -->
				</div> <!-- divParamsBuscarcredito_cuenta_pagar -->
		<?php } ?>
				</td> <!-- tdParamsBuscarcredito_cuenta_pagar -->
				</tr><!-- trParamsBuscarcredito_cuenta_pagar -->
				</table> <!-- tblBusquedacredito_cuenta_pagar -->
				</form> <!-- frmBusquedacredito_cuenta_pagar -->
				

			</td> <!-- tdBusquedacredito_cuenta_pagar -->
		</tr> <!-- trBusquedacredito_cuenta_pagar/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(credito_cuenta_pagar_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divcredito_cuenta_pagarPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblcredito_cuenta_pagarPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmcredito_cuenta_pagarAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btncredito_cuenta_pagarAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="credito_cuenta_pagar_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btncredito_cuenta_pagarAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmcredito_cuenta_pagarAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblcredito_cuenta_pagarPopupAjaxWebPart -->
		</div> <!-- divcredito_cuenta_pagarPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(credito_cuenta_pagar_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trcredito_cuenta_pagarTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdacredito_cuenta_pagar"></a>
		<img id="imgTablaParaDerechacredito_cuenta_pagar" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechacredito_cuenta_pagar'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdacredito_cuenta_pagar" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdacredito_cuenta_pagar'"/>
		<a id="TablaDerechacredito_cuenta_pagar"></a>
	</td>
</tr> <!-- trcredito_cuenta_pagarTablaNavegacion/super -->
<?php } ?>

<tr id="trcredito_cuenta_pagarTablaDatos">
	<td colspan="3" id="htmlTableCellcredito_cuenta_pagar">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatoscredito_cuenta_pagarsAjaxWebPart">
		</div>
	</td>
</tr> <!-- trcredito_cuenta_pagarTablaDatos/super -->
		
		
		<tr id="trcredito_cuenta_pagarPaginacion" style="display:table-row">
			<td id="tdcredito_cuenta_pagarPaginacion" align="left">
				<div id="divcredito_cuenta_pagarPaginacionAjaxWebPart">
				<form id="frmPaginacioncredito_cuenta_pagar" name="frmPaginacioncredito_cuenta_pagar">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacioncredito_cuenta_pagar" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:left">
					<tr>
						<?php if(credito_cuenta_pagar_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkcredito_cuenta_pagar" name="btnSeleccionarLoteFkcredito_cuenta_pagar" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(credito_cuenta_pagar_web::$STR_ES_RELACIONADO=='false' /*&& credito_cuenta_pagar_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnteriorescredito_cuenta_pagar" name="btnAnteriorescredito_cuenta_pagar" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(credito_cuenta_pagar_web::$STR_ES_BUSQUEDA=='false' && credito_cuenta_pagar_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdcredito_cuenta_pagarNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPrepararcredito_cuenta_pagar" name="btnNuevoTablaPrepararcredito_cuenta_pagar" title="NUEVO Credito Cuenta Pagar" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablacredito_cuenta_pagar" name="ParamsPaginar-txtNumeroNuevoTablacredito_cuenta_pagar" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(credito_cuenta_pagar_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdcredito_cuenta_pagarConEditarcredito_cuenta_pagar">
							<label>
								<input id="ParamsBuscar-chbConEditarcredito_cuenta_pagar" name="ParamsBuscar-chbConEditarcredito_cuenta_pagar" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(credito_cuenta_pagar_web::$STR_ES_RELACIONADO=='false'/* && credito_cuenta_pagar_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientescredito_cuenta_pagar" name="btnSiguientescredito_cuenta_pagar" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacioncredito_cuenta_pagar -->
				</form> <!-- frmPaginacioncredito_cuenta_pagar -->
				<form id="frmNuevoPrepararcredito_cuenta_pagar" name="frmNuevoPrepararcredito_cuenta_pagar">
				<table id="tblNuevoPrepararcredito_cuenta_pagar" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:left">
					<tr id="trcredito_cuenta_pagarNuevo" height="10">
						<?php if(credito_cuenta_pagar_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdcredito_cuenta_pagarNuevo" align="center">
							<input type="button" id="btnNuevoPrepararcredito_cuenta_pagar" name="btnNuevoPrepararcredito_cuenta_pagar" title="NUEVO Credito Cuenta Pagar" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdcredito_cuenta_pagarGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambioscredito_cuenta_pagar" name="btnGuardarCambioscredito_cuenta_pagar" title="GUARDAR Credito Cuenta Pagar" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(credito_cuenta_pagar_web::$STR_ES_RELACIONADO=='false' && credito_cuenta_pagar_web::$STR_ES_RELACIONES=='false' && credito_cuenta_pagar_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdcredito_cuenta_pagarDuplicar" align="center">
							<input type="button" id="btnDuplicarcredito_cuenta_pagar" name="btnDuplicarcredito_cuenta_pagar" title="DUPLICAR Credito Cuenta Pagar" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdcredito_cuenta_pagarCopiar" align="center">
							<input type="button" id="btnCopiarcredito_cuenta_pagar" name="btnCopiarcredito_cuenta_pagar" title="COPIAR Credito Cuenta Pagar" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(credito_cuenta_pagar_web::$STR_ES_RELACIONADO=='false' && ((credito_cuenta_pagar_web::$STR_ES_RELACIONADO=='false' && credito_cuenta_pagar_web::$STR_ES_RELACIONES=='false') || credito_cuenta_pagar_web::$STR_ES_BUSQUEDA=='true'  || credito_cuenta_pagar_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdcredito_cuenta_pagarCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginacredito_cuenta_pagar" name="btnCerrarPaginacredito_cuenta_pagar" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPrepararcredito_cuenta_pagar -->
				</form> <!-- frmNuevoPrepararcredito_cuenta_pagar -->
				</div> <!-- divcredito_cuenta_pagarPaginacionAjaxWebPart -->
			</td> <!-- tdcredito_cuenta_pagarPaginacion -->
		</tr> <!-- trcredito_cuenta_pagarPaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(credito_cuenta_pagar_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionescredito_cuenta_pagarAjaxWebPart">
			<td id="tdAccionesRelacionescredito_cuenta_pagarAjaxWebPart">
				<div id="divAccionesRelacionescredito_cuenta_pagarAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionescredito_cuenta_pagarAjaxWebPart -->
		</tr> <!-- trAccionesRelacionescredito_cuenta_pagarAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderBycredito_cuenta_pagar">
			<td id="tdOrderBycredito_cuenta_pagar">
				<form id="frmOrderBycredito_cuenta_pagar" name="frmOrderBycredito_cuenta_pagar">
					<div id="divOrderBycredito_cuenta_pagarAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderBycredito_cuenta_pagar -->
		</tr> <!-- trOrderBycredito_cuenta_pagar/super -->
			
		
		
		
		
		
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
			
				import {credito_cuenta_pagar_webcontrol,credito_cuenta_pagar_webcontrol1} from './webroot/js/JavaScript/contabilidad/cuentaspagar/credito_cuenta_pagar/js/webcontrol/credito_cuenta_pagar_webcontrol.js?random=1';
				
				credito_cuenta_pagar_webcontrol1.setcredito_cuenta_pagar_constante(window.credito_cuenta_pagar_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(credito_cuenta_pagar_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

