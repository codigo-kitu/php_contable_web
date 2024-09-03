<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\cuentascorrientes\cheque_cuenta_corriente\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Cheque Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/cuentascorrientes/cheque_cuenta_corriente/util/cheque_cuenta_corriente_carga.php');
	use com\bydan\contabilidad\cuentascorrientes\cheque_cuenta_corriente\util\cheque_cuenta_corriente_carga;
	
	//include_once('com/bydan/contabilidad/cuentascorrientes/cheque_cuenta_corriente/presentation/view/cheque_cuenta_corriente_web.php');
	//use com\bydan\contabilidad\cuentascorrientes\cheque_cuenta_corriente\presentation\view\cheque_cuenta_corriente_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	cheque_cuenta_corriente_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	cheque_cuenta_corriente_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$cheque_cuenta_corriente_web1= new cheque_cuenta_corriente_web();	
	$cheque_cuenta_corriente_web1->cargarDatosGenerales();
	
	//$moduloActual=$cheque_cuenta_corriente_web1->moduloActual;
	//$usuarioActual=$cheque_cuenta_corriente_web1->usuarioActual;
	//$sessionBase=$cheque_cuenta_corriente_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$cheque_cuenta_corriente_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentascorrientes/cheque_cuenta_corriente/js/templating/cheque_cuenta_corriente_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentascorrientes/cheque_cuenta_corriente/js/templating/cheque_cuenta_corriente_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentascorrientes/cheque_cuenta_corriente/js/templating/cheque_cuenta_corriente_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentascorrientes/cheque_cuenta_corriente/js/templating/cheque_cuenta_corriente_datos_reporte_template.js'); ?>
		
			
						
		
		
		<?php 
			
		
			cheque_cuenta_corriente_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					cheque_cuenta_corriente_web::$GET_POST=$_GET;
				} else {
					cheque_cuenta_corriente_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			cheque_cuenta_corriente_web::$STR_NOMBRE_PAGINA = 'cheque_cuenta_corriente_view.php';
			cheque_cuenta_corriente_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			cheque_cuenta_corriente_web::$BIT_ES_PAGINA_FORM = 'false';
				
			cheque_cuenta_corriente_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {cheque_cuenta_corriente_constante,cheque_cuenta_corriente_constante1} from './webroot/js/JavaScript/contabilidad/cuentascorrientes/cheque_cuenta_corriente/js/util/cheque_cuenta_corriente_constante.js?random=1';
			import {cheque_cuenta_corriente_funcion,cheque_cuenta_corriente_funcion1} from './webroot/js/JavaScript/contabilidad/cuentascorrientes/cheque_cuenta_corriente/js/util/cheque_cuenta_corriente_funcion.js?random=1';
			
			let cheque_cuenta_corriente_constante2 = new cheque_cuenta_corriente_constante();
			
			cheque_cuenta_corriente_constante2.STR_NOMBRE_PAGINA="<?php echo(cheque_cuenta_corriente_web::$STR_NOMBRE_PAGINA); ?>";
			cheque_cuenta_corriente_constante2.STR_TYPE_ON_LOADcheque_cuenta_corriente="<?php echo(cheque_cuenta_corriente_web::$STR_TYPE_ONLOAD); ?>";
			cheque_cuenta_corriente_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(cheque_cuenta_corriente_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			cheque_cuenta_corriente_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(cheque_cuenta_corriente_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			cheque_cuenta_corriente_constante2.STR_ACTION="<?php echo(cheque_cuenta_corriente_web::$STR_ACTION); ?>";
			cheque_cuenta_corriente_constante2.STR_ES_POPUP="<?php echo(cheque_cuenta_corriente_web::$STR_ES_POPUP); ?>";
			cheque_cuenta_corriente_constante2.STR_ES_BUSQUEDA="<?php echo(cheque_cuenta_corriente_web::$STR_ES_BUSQUEDA); ?>";
			cheque_cuenta_corriente_constante2.STR_FUNCION_JS="<?php echo(cheque_cuenta_corriente_web::$STR_FUNCION_JS); ?>";
			cheque_cuenta_corriente_constante2.BIG_ID_ACTUAL="<?php echo(cheque_cuenta_corriente_web::$BIG_ID_ACTUAL); ?>";
			cheque_cuenta_corriente_constante2.BIG_ID_OPCION="<?php echo(cheque_cuenta_corriente_web::$BIG_ID_OPCION); ?>";
			cheque_cuenta_corriente_constante2.STR_OBJETO_JS="<?php echo(cheque_cuenta_corriente_web::$STR_OBJETO_JS); ?>";
			cheque_cuenta_corriente_constante2.STR_ES_RELACIONES="<?php echo(cheque_cuenta_corriente_web::$STR_ES_RELACIONES); ?>";
			cheque_cuenta_corriente_constante2.STR_ES_RELACIONADO="<?php echo(cheque_cuenta_corriente_web::$STR_ES_RELACIONADO); ?>";
			cheque_cuenta_corriente_constante2.STR_ES_SUB_PAGINA="<?php echo(cheque_cuenta_corriente_web::$STR_ES_SUB_PAGINA); ?>";
			cheque_cuenta_corriente_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(cheque_cuenta_corriente_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			cheque_cuenta_corriente_constante2.BIT_ES_PAGINA_FORM=<?php echo(cheque_cuenta_corriente_web::$BIT_ES_PAGINA_FORM); ?>;
			cheque_cuenta_corriente_constante2.STR_SUFIJO="<?php echo(cheque_cuenta_corriente_web::$STR_SUF); ?>";//cheque_cuenta_corriente
			cheque_cuenta_corriente_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(cheque_cuenta_corriente_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//cheque_cuenta_corriente
			
			cheque_cuenta_corriente_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(cheque_cuenta_corriente_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			cheque_cuenta_corriente_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($cheque_cuenta_corriente_web1->moduloActual->getnombre()); ?>";
			cheque_cuenta_corriente_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(cheque_cuenta_corriente_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			cheque_cuenta_corriente_constante2.BIT_ES_LOAD_NORMAL=true;
			/*cheque_cuenta_corriente_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			cheque_cuenta_corriente_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.cheque_cuenta_corriente_constante2 = cheque_cuenta_corriente_constante2;
			
		</script>
		
		<?php if(cheque_cuenta_corriente_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.cheque_cuenta_corriente_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.cheque_cuenta_corriente_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="cheque_cuenta_corrienteActual" ></a>
	
	<div id="divResumencheque_cuenta_corrienteActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(cheque_cuenta_corriente_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(cheque_cuenta_corriente_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(cheque_cuenta_corriente_web::$STR_ES_BUSQUEDA=='false' && cheque_cuenta_corriente_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(cheque_cuenta_corriente_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(cheque_cuenta_corriente_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(cheque_cuenta_corriente_web::$STR_ES_RELACIONADO=='false' && cheque_cuenta_corriente_web::$STR_ES_POPUP=='false' && cheque_cuenta_corriente_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tdcheque_cuenta_corrienteNuevoToolBar">
										<img id="imgNuevoToolBarcheque_cuenta_corriente" name="imgNuevoToolBarcheque_cuenta_corriente" title="Nuevo Cheque" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(cheque_cuenta_corriente_web::$STR_ES_BUSQUEDA=='false' && cheque_cuenta_corriente_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdcheque_cuenta_corrienteNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBarcheque_cuenta_corriente" name="imgNuevoGuardarCambiosToolBarcheque_cuenta_corriente" title="Nuevo TABLA Cheque" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(cheque_cuenta_corriente_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdcheque_cuenta_corrienteGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBarcheque_cuenta_corriente" name="imgGuardarCambiosToolBarcheque_cuenta_corriente" title="Guardar Cheque" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(cheque_cuenta_corriente_web::$STR_ES_RELACIONADO=='false' && cheque_cuenta_corriente_web::$STR_ES_RELACIONES=='false' && cheque_cuenta_corriente_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdcheque_cuenta_corrienteCopiarToolBar">
										<img id="imgCopiarToolBarcheque_cuenta_corriente" name="imgCopiarToolBarcheque_cuenta_corriente" title="Copiar Cheque" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdcheque_cuenta_corrienteDuplicarToolBar">
										<img id="imgDuplicarToolBarcheque_cuenta_corriente" name="imgDuplicarToolBarcheque_cuenta_corriente" title="Duplicar Cheque" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(cheque_cuenta_corriente_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdcheque_cuenta_corrienteRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBarcheque_cuenta_corriente" name="imgRecargarInformacionToolBarcheque_cuenta_corriente" title="Recargar Cheque" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdcheque_cuenta_corrienteAnterioresToolBar">
										<img id="imgAnterioresToolBarcheque_cuenta_corriente" name="imgAnterioresToolBarcheque_cuenta_corriente" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdcheque_cuenta_corrienteSiguientesToolBar">
										<img id="imgSiguientesToolBarcheque_cuenta_corriente" name="imgSiguientesToolBarcheque_cuenta_corriente" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdcheque_cuenta_corrienteAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBarcheque_cuenta_corriente" name="imgAbrirOrderByToolBarcheque_cuenta_corriente" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((cheque_cuenta_corriente_web::$STR_ES_RELACIONADO=='false' && cheque_cuenta_corriente_web::$STR_ES_RELACIONES=='false') || cheque_cuenta_corriente_web::$STR_ES_BUSQUEDA=='true'  || cheque_cuenta_corriente_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdcheque_cuenta_corrienteCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBarcheque_cuenta_corriente" name="imgCerrarPaginaToolBarcheque_cuenta_corriente" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trcheque_cuenta_corrienteCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedacheque_cuenta_corriente" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedacheque_cuenta_corriente',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trcheque_cuenta_corrienteCabeceraBusquedas/super -->

		<tr id="trBusquedacheque_cuenta_corriente" class="busqueda" style="display:table-row">
			<td id="tdBusquedacheque_cuenta_corriente" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedacheque_cuenta_corriente" name="frmBusquedacheque_cuenta_corriente">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedacheque_cuenta_corriente" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trcheque_cuenta_corrienteBusquedas" class="busqueda" style="display:table-row"><td>
				<?php if(cheque_cuenta_corriente_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 80%">
					<ul>
						<li id="listrVisibleFK_Idbeneficiario_ocacional" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idbeneficiario_ocacional"> Por  Beneficiario Ocacional</a></li>
						<li id="listrVisibleFK_Idcategoria_cheque" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idcategoria_cheque"> Por  Categoria Cheque</a></li>
						<li id="listrVisibleFK_Idcliente" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idcliente"> Por  Cliente</a></li>
						<li id="listrVisibleFK_Idcuenta_corriente" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idcuenta_corriente"> Por  Cuenta Corriente</a></li>
						<li id="listrVisibleFK_Idestado_deposito_retiro" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idestado_deposito_retiro"> Por  Estado Deposito Retiro</a></li>
						<li id="listrVisibleFK_Idproveedor" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idproveedor"> Por  Proveedor</a></li>
					</ul>
				
					<div id="divstrVisibleFK_Idbeneficiario_ocacional">
					<table id="tblstrVisibleFK_Idbeneficiario_ocacional" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo"> Beneficiario Ocacional</span>
						</td>
						<td align="center">
							<select id="FK_Idbeneficiario_ocacional-cmbid_beneficiario_ocacional_cheque" name="FK_Idbeneficiario_ocacional-cmbid_beneficiario_ocacional_cheque" title=" Beneficiario Ocacional" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarcheque_cuenta_corrienteFK_Idbeneficiario_ocacional" name="btnBuscarcheque_cuenta_corrienteFK_Idbeneficiario_ocacional" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idcategoria_cheque">
					<table id="tblstrVisibleFK_Idcategoria_cheque" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo"> Categoria Cheque</span>
						</td>
						<td align="center">
							<select id="FK_Idcategoria_cheque-cmbid_categoria_cheque" name="FK_Idcategoria_cheque-cmbid_categoria_cheque" title=" Categoria Cheque" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarcheque_cuenta_corrienteFK_Idcategoria_cheque" name="btnBuscarcheque_cuenta_corrienteFK_Idcategoria_cheque" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idcliente">
					<table id="tblstrVisibleFK_Idcliente" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo"> Cliente</span>
						</td>
						<td align="center">
							<select id="FK_Idcliente-cmbid_cliente" name="FK_Idcliente-cmbid_cliente" title=" Cliente" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarcheque_cuenta_corrienteFK_Idcliente" name="btnBuscarcheque_cuenta_corrienteFK_Idcliente" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idcuenta_corriente">
					<table id="tblstrVisibleFK_Idcuenta_corriente" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo"> Cuenta Corriente</span>
						</td>
						<td align="center">
							<select id="FK_Idcuenta_corriente-cmbid_cuenta_corriente" name="FK_Idcuenta_corriente-cmbid_cuenta_corriente" title=" Cuenta Corriente" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarcheque_cuenta_corrienteFK_Idcuenta_corriente" name="btnBuscarcheque_cuenta_corrienteFK_Idcuenta_corriente" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idestado_deposito_retiro">
					<table id="tblstrVisibleFK_Idestado_deposito_retiro" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo"> Estado Deposito Retiro</span>
						</td>
						<td align="center">
							<select id="FK_Idestado_deposito_retiro-cmbid_estado_deposito_retiro" name="FK_Idestado_deposito_retiro-cmbid_estado_deposito_retiro" title=" Estado Deposito Retiro" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarcheque_cuenta_corrienteFK_Idestado_deposito_retiro" name="btnBuscarcheque_cuenta_corrienteFK_Idestado_deposito_retiro" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idproveedor">
					<table id="tblstrVisibleFK_Idproveedor" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo"> Proveedor</span>
						</td>
						<td align="center">
							<select id="FK_Idproveedor-cmbid_proveedor" name="FK_Idproveedor-cmbid_proveedor" title=" Proveedor" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarcheque_cuenta_corrienteFK_Idproveedor" name="btnBuscarcheque_cuenta_corrienteFK_Idproveedor" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscarcheque_cuenta_corriente" style="display:table-row">
					<td id="tdParamsBuscarcheque_cuenta_corriente">
		<?php if(cheque_cuenta_corriente_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscarcheque_cuenta_corriente">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistroscheque_cuenta_corriente" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistroscheque_cuenta_corriente"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistroscheque_cuenta_corriente" name="ParamsBuscar-txtNumeroRegistroscheque_cuenta_corriente" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacioncheque_cuenta_corriente">
							<td id="tdGenerarReportecheque_cuenta_corriente" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodoscheque_cuenta_corriente" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodoscheque_cuenta_corriente" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacioncheque_cuenta_corriente" name="btnRecargarInformacioncheque_cuenta_corriente" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginacheque_cuenta_corriente" name="btnImprimirPaginacheque_cuenta_corriente" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*cheque_cuenta_corriente_web::$STR_ES_BUSQUEDA=='false'  &&*/ cheque_cuenta_corriente_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderBycheque_cuenta_corriente">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderBycheque_cuenta_corriente" name="btnOrderBycheque_cuenta_corriente" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
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

										<?php if(cheque_cuenta_corriente_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdcheque_cuenta_corrienteConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodoscheque_cuenta_corriente -->

							</td><!-- tdGenerarReportecheque_cuenta_corriente -->
						</tr><!-- trRecargarInformacioncheque_cuenta_corriente -->
					</table><!-- tblParamsBuscarNumeroRegistroscheque_cuenta_corriente -->
				</div> <!-- divParamsBuscarcheque_cuenta_corriente -->
		<?php } ?>
				</td> <!-- tdParamsBuscarcheque_cuenta_corriente -->
				</tr><!-- trParamsBuscarcheque_cuenta_corriente -->
				</table> <!-- tblBusquedacheque_cuenta_corriente -->
				</form> <!-- frmBusquedacheque_cuenta_corriente -->
				

			</td> <!-- tdBusquedacheque_cuenta_corriente -->
		</tr> <!-- trBusquedacheque_cuenta_corriente/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(cheque_cuenta_corriente_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divcheque_cuenta_corrientePopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblcheque_cuenta_corrientePopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmcheque_cuenta_corrienteAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btncheque_cuenta_corrienteAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="cheque_cuenta_corriente_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btncheque_cuenta_corrienteAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmcheque_cuenta_corrienteAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblcheque_cuenta_corrientePopupAjaxWebPart -->
		</div> <!-- divcheque_cuenta_corrientePopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(cheque_cuenta_corriente_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trcheque_cuenta_corrienteTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdacheque_cuenta_corriente"></a>
		<img id="imgTablaParaDerechacheque_cuenta_corriente" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechacheque_cuenta_corriente'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdacheque_cuenta_corriente" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdacheque_cuenta_corriente'"/>
		<a id="TablaDerechacheque_cuenta_corriente"></a>
	</td>
</tr> <!-- trcheque_cuenta_corrienteTablaNavegacion/super -->
<?php } ?>

<tr id="trcheque_cuenta_corrienteTablaDatos">
	<td colspan="3" id="htmlTableCellcheque_cuenta_corriente">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatoscheque_cuenta_corrientesAjaxWebPart">
		</div>
	</td>
</tr> <!-- trcheque_cuenta_corrienteTablaDatos/super -->
		
		
		<tr id="trcheque_cuenta_corrientePaginacion" style="display:table-row">
			<td id="tdcheque_cuenta_corrientePaginacion" align="left">
				<div id="divcheque_cuenta_corrientePaginacionAjaxWebPart">
				<form id="frmPaginacioncheque_cuenta_corriente" name="frmPaginacioncheque_cuenta_corriente">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacioncheque_cuenta_corriente" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:left">
					<tr>
						<?php if(cheque_cuenta_corriente_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkcheque_cuenta_corriente" name="btnSeleccionarLoteFkcheque_cuenta_corriente" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(cheque_cuenta_corriente_web::$STR_ES_RELACIONADO=='false' /*&& cheque_cuenta_corriente_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnteriorescheque_cuenta_corriente" name="btnAnteriorescheque_cuenta_corriente" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(cheque_cuenta_corriente_web::$STR_ES_BUSQUEDA=='false' && cheque_cuenta_corriente_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdcheque_cuenta_corrienteNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPrepararcheque_cuenta_corriente" name="btnNuevoTablaPrepararcheque_cuenta_corriente" title="NUEVO Cheque" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablacheque_cuenta_corriente" name="ParamsPaginar-txtNumeroNuevoTablacheque_cuenta_corriente" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(cheque_cuenta_corriente_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdcheque_cuenta_corrienteConEditarcheque_cuenta_corriente">
							<label>
								<input id="ParamsBuscar-chbConEditarcheque_cuenta_corriente" name="ParamsBuscar-chbConEditarcheque_cuenta_corriente" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(cheque_cuenta_corriente_web::$STR_ES_RELACIONADO=='false'/* && cheque_cuenta_corriente_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientescheque_cuenta_corriente" name="btnSiguientescheque_cuenta_corriente" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacioncheque_cuenta_corriente -->
				</form> <!-- frmPaginacioncheque_cuenta_corriente -->
				<form id="frmNuevoPrepararcheque_cuenta_corriente" name="frmNuevoPrepararcheque_cuenta_corriente">
				<table id="tblNuevoPrepararcheque_cuenta_corriente" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:left">
					<tr id="trcheque_cuenta_corrienteNuevo" height="10">
						<?php if(cheque_cuenta_corriente_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdcheque_cuenta_corrienteNuevo" align="center">
							<input type="button" id="btnNuevoPrepararcheque_cuenta_corriente" name="btnNuevoPrepararcheque_cuenta_corriente" title="NUEVO Cheque" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdcheque_cuenta_corrienteGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambioscheque_cuenta_corriente" name="btnGuardarCambioscheque_cuenta_corriente" title="GUARDAR Cheque" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(cheque_cuenta_corriente_web::$STR_ES_RELACIONADO=='false' && cheque_cuenta_corriente_web::$STR_ES_RELACIONES=='false' && cheque_cuenta_corriente_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdcheque_cuenta_corrienteDuplicar" align="center">
							<input type="button" id="btnDuplicarcheque_cuenta_corriente" name="btnDuplicarcheque_cuenta_corriente" title="DUPLICAR Cheque" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdcheque_cuenta_corrienteCopiar" align="center">
							<input type="button" id="btnCopiarcheque_cuenta_corriente" name="btnCopiarcheque_cuenta_corriente" title="COPIAR Cheque" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(cheque_cuenta_corriente_web::$STR_ES_RELACIONADO=='false' && ((cheque_cuenta_corriente_web::$STR_ES_RELACIONADO=='false' && cheque_cuenta_corriente_web::$STR_ES_RELACIONES=='false') || cheque_cuenta_corriente_web::$STR_ES_BUSQUEDA=='true'  || cheque_cuenta_corriente_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdcheque_cuenta_corrienteCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginacheque_cuenta_corriente" name="btnCerrarPaginacheque_cuenta_corriente" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPrepararcheque_cuenta_corriente -->
				</form> <!-- frmNuevoPrepararcheque_cuenta_corriente -->
				</div> <!-- divcheque_cuenta_corrientePaginacionAjaxWebPart -->
			</td> <!-- tdcheque_cuenta_corrientePaginacion -->
		</tr> <!-- trcheque_cuenta_corrientePaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(cheque_cuenta_corriente_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionescheque_cuenta_corrienteAjaxWebPart">
			<td id="tdAccionesRelacionescheque_cuenta_corrienteAjaxWebPart">
				<div id="divAccionesRelacionescheque_cuenta_corrienteAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionescheque_cuenta_corrienteAjaxWebPart -->
		</tr> <!-- trAccionesRelacionescheque_cuenta_corrienteAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderBycheque_cuenta_corriente">
			<td id="tdOrderBycheque_cuenta_corriente">
				<form id="frmOrderBycheque_cuenta_corriente" name="frmOrderBycheque_cuenta_corriente">
					<div id="divOrderBycheque_cuenta_corrienteAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderBycheque_cuenta_corriente -->
		</tr> <!-- trOrderBycheque_cuenta_corriente/super -->
			
		
		
		
		
		
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
			
				import {cheque_cuenta_corriente_webcontrol,cheque_cuenta_corriente_webcontrol1} from './webroot/js/JavaScript/contabilidad/cuentascorrientes/cheque_cuenta_corriente/js/webcontrol/cheque_cuenta_corriente_webcontrol.js?random=1';
				
				cheque_cuenta_corriente_webcontrol1.setcheque_cuenta_corriente_constante(window.cheque_cuenta_corriente_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(cheque_cuenta_corriente_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

