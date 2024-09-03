<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\cuentaspagar\documento_cuenta_pagar\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Documentos Cuentas por Pagar Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/cuentaspagar/documento_cuenta_pagar/util/documento_cuenta_pagar_carga.php');
	use com\bydan\contabilidad\cuentaspagar\documento_cuenta_pagar\util\documento_cuenta_pagar_carga;
	
	//include_once('com/bydan/contabilidad/cuentaspagar/documento_cuenta_pagar/presentation/view/documento_cuenta_pagar_web.php');
	//use com\bydan\contabilidad\cuentaspagar\documento_cuenta_pagar\presentation\view\documento_cuenta_pagar_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	documento_cuenta_pagar_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	documento_cuenta_pagar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$documento_cuenta_pagar_web1= new documento_cuenta_pagar_web();	
	$documento_cuenta_pagar_web1->cargarDatosGenerales();
	
	//$moduloActual=$documento_cuenta_pagar_web1->moduloActual;
	//$usuarioActual=$documento_cuenta_pagar_web1->usuarioActual;
	//$sessionBase=$documento_cuenta_pagar_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$documento_cuenta_pagar_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentaspagar/documento_cuenta_pagar/js/templating/documento_cuenta_pagar_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentaspagar/documento_cuenta_pagar/js/templating/documento_cuenta_pagar_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentaspagar/documento_cuenta_pagar/js/templating/documento_cuenta_pagar_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentaspagar/documento_cuenta_pagar/js/templating/documento_cuenta_pagar_datos_reporte_template.js'); ?>
		
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentaspagar/documento_cuenta_pagar/js/templating/documento_cuenta_pagar_datos_relaciones_template.js'); ?>
			
						
		
		
		<?php 
			
		
			documento_cuenta_pagar_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					documento_cuenta_pagar_web::$GET_POST=$_GET;
				} else {
					documento_cuenta_pagar_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			documento_cuenta_pagar_web::$STR_NOMBRE_PAGINA = 'documento_cuenta_pagar_view.php';
			documento_cuenta_pagar_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			documento_cuenta_pagar_web::$BIT_ES_PAGINA_FORM = 'false';
				
			documento_cuenta_pagar_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {documento_cuenta_pagar_constante,documento_cuenta_pagar_constante1} from './webroot/js/JavaScript/contabilidad/cuentaspagar/documento_cuenta_pagar/js/util/documento_cuenta_pagar_constante.js?random=1';
			import {documento_cuenta_pagar_funcion,documento_cuenta_pagar_funcion1} from './webroot/js/JavaScript/contabilidad/cuentaspagar/documento_cuenta_pagar/js/util/documento_cuenta_pagar_funcion.js?random=1';
			
			let documento_cuenta_pagar_constante2 = new documento_cuenta_pagar_constante();
			
			documento_cuenta_pagar_constante2.STR_NOMBRE_PAGINA="<?php echo(documento_cuenta_pagar_web::$STR_NOMBRE_PAGINA); ?>";
			documento_cuenta_pagar_constante2.STR_TYPE_ON_LOADdocumento_cuenta_pagar="<?php echo(documento_cuenta_pagar_web::$STR_TYPE_ONLOAD); ?>";
			documento_cuenta_pagar_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(documento_cuenta_pagar_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			documento_cuenta_pagar_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(documento_cuenta_pagar_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			documento_cuenta_pagar_constante2.STR_ACTION="<?php echo(documento_cuenta_pagar_web::$STR_ACTION); ?>";
			documento_cuenta_pagar_constante2.STR_ES_POPUP="<?php echo(documento_cuenta_pagar_web::$STR_ES_POPUP); ?>";
			documento_cuenta_pagar_constante2.STR_ES_BUSQUEDA="<?php echo(documento_cuenta_pagar_web::$STR_ES_BUSQUEDA); ?>";
			documento_cuenta_pagar_constante2.STR_FUNCION_JS="<?php echo(documento_cuenta_pagar_web::$STR_FUNCION_JS); ?>";
			documento_cuenta_pagar_constante2.BIG_ID_ACTUAL="<?php echo(documento_cuenta_pagar_web::$BIG_ID_ACTUAL); ?>";
			documento_cuenta_pagar_constante2.BIG_ID_OPCION="<?php echo(documento_cuenta_pagar_web::$BIG_ID_OPCION); ?>";
			documento_cuenta_pagar_constante2.STR_OBJETO_JS="<?php echo(documento_cuenta_pagar_web::$STR_OBJETO_JS); ?>";
			documento_cuenta_pagar_constante2.STR_ES_RELACIONES="<?php echo(documento_cuenta_pagar_web::$STR_ES_RELACIONES); ?>";
			documento_cuenta_pagar_constante2.STR_ES_RELACIONADO="<?php echo(documento_cuenta_pagar_web::$STR_ES_RELACIONADO); ?>";
			documento_cuenta_pagar_constante2.STR_ES_SUB_PAGINA="<?php echo(documento_cuenta_pagar_web::$STR_ES_SUB_PAGINA); ?>";
			documento_cuenta_pagar_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(documento_cuenta_pagar_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			documento_cuenta_pagar_constante2.BIT_ES_PAGINA_FORM=<?php echo(documento_cuenta_pagar_web::$BIT_ES_PAGINA_FORM); ?>;
			documento_cuenta_pagar_constante2.STR_SUFIJO="<?php echo(documento_cuenta_pagar_web::$STR_SUF); ?>";//documento_cuenta_pagar
			documento_cuenta_pagar_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(documento_cuenta_pagar_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//documento_cuenta_pagar
			
			documento_cuenta_pagar_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(documento_cuenta_pagar_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			documento_cuenta_pagar_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($documento_cuenta_pagar_web1->moduloActual->getnombre()); ?>";
			documento_cuenta_pagar_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(documento_cuenta_pagar_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			documento_cuenta_pagar_constante2.BIT_ES_LOAD_NORMAL=true;
			/*documento_cuenta_pagar_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			documento_cuenta_pagar_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.documento_cuenta_pagar_constante2 = documento_cuenta_pagar_constante2;
			
		</script>
		
		<?php if(documento_cuenta_pagar_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.documento_cuenta_pagar_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.documento_cuenta_pagar_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="documento_cuenta_pagarActual" ></a>
	
	<div id="divResumendocumento_cuenta_pagarActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(documento_cuenta_pagar_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(documento_cuenta_pagar_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(documento_cuenta_pagar_web::$STR_ES_BUSQUEDA=='false' && documento_cuenta_pagar_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(documento_cuenta_pagar_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(documento_cuenta_pagar_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(documento_cuenta_pagar_web::$STR_ES_RELACIONADO=='false' && documento_cuenta_pagar_web::$STR_ES_POPUP=='false' && documento_cuenta_pagar_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tddocumento_cuenta_pagarNuevoToolBar">
										<img id="imgNuevoToolBardocumento_cuenta_pagar" name="imgNuevoToolBardocumento_cuenta_pagar" title="Nuevo Documentos Cuentas por Pagar" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(documento_cuenta_pagar_web::$STR_ES_BUSQUEDA=='false' && documento_cuenta_pagar_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tddocumento_cuenta_pagarNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBardocumento_cuenta_pagar" name="imgNuevoGuardarCambiosToolBardocumento_cuenta_pagar" title="Nuevo TABLA Documentos Cuentas por Pagar" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(documento_cuenta_pagar_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tddocumento_cuenta_pagarGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBardocumento_cuenta_pagar" name="imgGuardarCambiosToolBardocumento_cuenta_pagar" title="Guardar Documentos Cuentas por Pagar" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(documento_cuenta_pagar_web::$STR_ES_RELACIONADO=='false' && documento_cuenta_pagar_web::$STR_ES_RELACIONES=='false' && documento_cuenta_pagar_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tddocumento_cuenta_pagarCopiarToolBar">
										<img id="imgCopiarToolBardocumento_cuenta_pagar" name="imgCopiarToolBardocumento_cuenta_pagar" title="Copiar Documentos Cuentas por Pagar" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tddocumento_cuenta_pagarDuplicarToolBar">
										<img id="imgDuplicarToolBardocumento_cuenta_pagar" name="imgDuplicarToolBardocumento_cuenta_pagar" title="Duplicar Documentos Cuentas por Pagar" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(documento_cuenta_pagar_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tddocumento_cuenta_pagarRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBardocumento_cuenta_pagar" name="imgRecargarInformacionToolBardocumento_cuenta_pagar" title="Recargar Documentos Cuentas por Pagar" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tddocumento_cuenta_pagarAnterioresToolBar">
										<img id="imgAnterioresToolBardocumento_cuenta_pagar" name="imgAnterioresToolBardocumento_cuenta_pagar" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tddocumento_cuenta_pagarSiguientesToolBar">
										<img id="imgSiguientesToolBardocumento_cuenta_pagar" name="imgSiguientesToolBardocumento_cuenta_pagar" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tddocumento_cuenta_pagarAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBardocumento_cuenta_pagar" name="imgAbrirOrderByToolBardocumento_cuenta_pagar" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((documento_cuenta_pagar_web::$STR_ES_RELACIONADO=='false' && documento_cuenta_pagar_web::$STR_ES_RELACIONES=='false') || documento_cuenta_pagar_web::$STR_ES_BUSQUEDA=='true'  || documento_cuenta_pagar_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tddocumento_cuenta_pagarCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBardocumento_cuenta_pagar" name="imgCerrarPaginaToolBardocumento_cuenta_pagar" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trdocumento_cuenta_pagarCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedadocumento_cuenta_pagar" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedadocumento_cuenta_pagar',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trdocumento_cuenta_pagarCabeceraBusquedas/super -->

		<tr id="trBusquedadocumento_cuenta_pagar" class="busqueda" style="display:table-row">
			<td id="tdBusquedadocumento_cuenta_pagar" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedadocumento_cuenta_pagar" name="frmBusquedadocumento_cuenta_pagar">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedadocumento_cuenta_pagar" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trdocumento_cuenta_pagarBusquedas" class="busqueda" style="display:table-row"><td>
				<?php if(documento_cuenta_pagar_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 70%">
					<ul>
						<li id="listrVisibleFK_Idcuenta_corriente" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idcuenta_corriente"> Por Cuenta Cliente</a></li>
						<li id="listrVisibleFK_Idforma_pago_proveedor" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idforma_pago_proveedor"> Por Forma Pago Proveedor</a></li>
						<li id="listrVisibleFK_Idproveedor" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idproveedor"> Por Proveedor</a></li>
					</ul>
				
					<div id="divstrVisibleFK_Idcuenta_corriente">
					<table id="tblstrVisibleFK_Idcuenta_corriente" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Cuenta Cliente</span>
						</td>
						<td align="center">
							<select id="FK_Idcuenta_corriente-cmbid_cuenta_corriente" name="FK_Idcuenta_corriente-cmbid_cuenta_corriente" title="Cuenta Cliente" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscardocumento_cuenta_pagarFK_Idcuenta_corriente" name="btnBuscardocumento_cuenta_pagarFK_Idcuenta_corriente" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idforma_pago_proveedor">
					<table id="tblstrVisibleFK_Idforma_pago_proveedor" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Forma Pago Proveedor</span>
						</td>
						<td align="center">
							<select id="FK_Idforma_pago_proveedor-cmbid_forma_pago_proveedor" name="FK_Idforma_pago_proveedor-cmbid_forma_pago_proveedor" title="Forma Pago Proveedor" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscardocumento_cuenta_pagarFK_Idforma_pago_proveedor" name="btnBuscardocumento_cuenta_pagarFK_Idforma_pago_proveedor" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idproveedor">
					<table id="tblstrVisibleFK_Idproveedor" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Proveedor</span>
						</td>
						<td align="center">
							<select id="FK_Idproveedor-cmbid_proveedor" name="FK_Idproveedor-cmbid_proveedor" title="Proveedor" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscardocumento_cuenta_pagarFK_Idproveedor" name="btnBuscardocumento_cuenta_pagarFK_Idproveedor" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscardocumento_cuenta_pagar" style="display:table-row">
					<td id="tdParamsBuscardocumento_cuenta_pagar">
		<?php if(documento_cuenta_pagar_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscardocumento_cuenta_pagar">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistrosdocumento_cuenta_pagar" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistrosdocumento_cuenta_pagar"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistrosdocumento_cuenta_pagar" name="ParamsBuscar-txtNumeroRegistrosdocumento_cuenta_pagar" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformaciondocumento_cuenta_pagar">
							<td id="tdGenerarReportedocumento_cuenta_pagar" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodosdocumento_cuenta_pagar" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodosdocumento_cuenta_pagar" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformaciondocumento_cuenta_pagar" name="btnRecargarInformaciondocumento_cuenta_pagar" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginadocumento_cuenta_pagar" name="btnImprimirPaginadocumento_cuenta_pagar" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*documento_cuenta_pagar_web::$STR_ES_BUSQUEDA=='false'  &&*/ documento_cuenta_pagar_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderBydocumento_cuenta_pagar">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderBydocumento_cuenta_pagar" name="btnOrderBydocumento_cuenta_pagar" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
													</td>
													<td>
														<input type="button" id="btnOrderByReldocumento_cuenta_pagar" name="btnOrderByReldocumento_cuenta_pagar" title="RELACIONES DE DATOS" value="   Rels" class="btn btn-primary"/>
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

										<?php if(documento_cuenta_pagar_web::$STR_ES_RELACIONES=='false' && documento_cuenta_pagar_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbTiposRelaciones" name="ParamsBuscar-cmbTiposRelaciones" title="TIPOS DE RELACIONES" style="width:150px"></select>
										</td>
										<?php } ?>

										<?php if(documento_cuenta_pagar_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tddocumento_cuenta_pagarConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodosdocumento_cuenta_pagar -->

							</td><!-- tdGenerarReportedocumento_cuenta_pagar -->
						</tr><!-- trRecargarInformaciondocumento_cuenta_pagar -->
					</table><!-- tblParamsBuscarNumeroRegistrosdocumento_cuenta_pagar -->
				</div> <!-- divParamsBuscardocumento_cuenta_pagar -->
		<?php } ?>
				</td> <!-- tdParamsBuscardocumento_cuenta_pagar -->
				</tr><!-- trParamsBuscardocumento_cuenta_pagar -->
				</table> <!-- tblBusquedadocumento_cuenta_pagar -->
				</form> <!-- frmBusquedadocumento_cuenta_pagar -->
				

			</td> <!-- tdBusquedadocumento_cuenta_pagar -->
		</tr> <!-- trBusquedadocumento_cuenta_pagar/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(documento_cuenta_pagar_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divdocumento_cuenta_pagarPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tbldocumento_cuenta_pagarPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmdocumento_cuenta_pagarAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btndocumento_cuenta_pagarAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="documento_cuenta_pagar_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btndocumento_cuenta_pagarAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmdocumento_cuenta_pagarAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tbldocumento_cuenta_pagarPopupAjaxWebPart -->
		</div> <!-- divdocumento_cuenta_pagarPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(documento_cuenta_pagar_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trdocumento_cuenta_pagarTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdadocumento_cuenta_pagar"></a>
		<img id="imgTablaParaDerechadocumento_cuenta_pagar" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechadocumento_cuenta_pagar'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdadocumento_cuenta_pagar" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdadocumento_cuenta_pagar'"/>
		<a id="TablaDerechadocumento_cuenta_pagar"></a>
	</td>
</tr> <!-- trdocumento_cuenta_pagarTablaNavegacion/super -->
<?php } ?>

<tr id="trdocumento_cuenta_pagarTablaDatos">
	<td colspan="3" id="htmlTableCelldocumento_cuenta_pagar">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatosdocumento_cuenta_pagarsAjaxWebPart">
		</div>
	</td>
</tr> <!-- trdocumento_cuenta_pagarTablaDatos/super -->
		
		
		<tr id="trdocumento_cuenta_pagarPaginacion" style="display:table-row">
			<td id="tddocumento_cuenta_pagarPaginacion" align="left">
				<div id="divdocumento_cuenta_pagarPaginacionAjaxWebPart">
				<form id="frmPaginaciondocumento_cuenta_pagar" name="frmPaginaciondocumento_cuenta_pagar">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginaciondocumento_cuenta_pagar" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:left">
					<tr>
						<?php if(documento_cuenta_pagar_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkdocumento_cuenta_pagar" name="btnSeleccionarLoteFkdocumento_cuenta_pagar" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(documento_cuenta_pagar_web::$STR_ES_RELACIONADO=='false' /*&& documento_cuenta_pagar_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnterioresdocumento_cuenta_pagar" name="btnAnterioresdocumento_cuenta_pagar" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(documento_cuenta_pagar_web::$STR_ES_BUSQUEDA=='false' && documento_cuenta_pagar_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tddocumento_cuenta_pagarNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPreparardocumento_cuenta_pagar" name="btnNuevoTablaPreparardocumento_cuenta_pagar" title="NUEVO Documentos Cuentas por Pagar" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTabladocumento_cuenta_pagar" name="ParamsPaginar-txtNumeroNuevoTabladocumento_cuenta_pagar" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(documento_cuenta_pagar_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tddocumento_cuenta_pagarConEditardocumento_cuenta_pagar">
							<label>
								<input id="ParamsBuscar-chbConEditardocumento_cuenta_pagar" name="ParamsBuscar-chbConEditardocumento_cuenta_pagar" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(documento_cuenta_pagar_web::$STR_ES_RELACIONADO=='false'/* && documento_cuenta_pagar_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientesdocumento_cuenta_pagar" name="btnSiguientesdocumento_cuenta_pagar" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginaciondocumento_cuenta_pagar -->
				</form> <!-- frmPaginaciondocumento_cuenta_pagar -->
				<form id="frmNuevoPreparardocumento_cuenta_pagar" name="frmNuevoPreparardocumento_cuenta_pagar">
				<table id="tblNuevoPreparardocumento_cuenta_pagar" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:left">
					<tr id="trdocumento_cuenta_pagarNuevo" height="10">
						<?php if(documento_cuenta_pagar_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tddocumento_cuenta_pagarNuevo" align="center">
							<input type="button" id="btnNuevoPreparardocumento_cuenta_pagar" name="btnNuevoPreparardocumento_cuenta_pagar" title="NUEVO Documentos Cuentas por Pagar" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tddocumento_cuenta_pagarGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambiosdocumento_cuenta_pagar" name="btnGuardarCambiosdocumento_cuenta_pagar" title="GUARDAR Documentos Cuentas por Pagar" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(documento_cuenta_pagar_web::$STR_ES_RELACIONADO=='false' && documento_cuenta_pagar_web::$STR_ES_RELACIONES=='false' && documento_cuenta_pagar_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tddocumento_cuenta_pagarDuplicar" align="center">
							<input type="button" id="btnDuplicardocumento_cuenta_pagar" name="btnDuplicardocumento_cuenta_pagar" title="DUPLICAR Documentos Cuentas por Pagar" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tddocumento_cuenta_pagarCopiar" align="center">
							<input type="button" id="btnCopiardocumento_cuenta_pagar" name="btnCopiardocumento_cuenta_pagar" title="COPIAR Documentos Cuentas por Pagar" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(documento_cuenta_pagar_web::$STR_ES_RELACIONADO=='false' && ((documento_cuenta_pagar_web::$STR_ES_RELACIONADO=='false' && documento_cuenta_pagar_web::$STR_ES_RELACIONES=='false') || documento_cuenta_pagar_web::$STR_ES_BUSQUEDA=='true'  || documento_cuenta_pagar_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tddocumento_cuenta_pagarCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginadocumento_cuenta_pagar" name="btnCerrarPaginadocumento_cuenta_pagar" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPreparardocumento_cuenta_pagar -->
				</form> <!-- frmNuevoPreparardocumento_cuenta_pagar -->
				</div> <!-- divdocumento_cuenta_pagarPaginacionAjaxWebPart -->
			</td> <!-- tddocumento_cuenta_pagarPaginacion -->
		</tr> <!-- trdocumento_cuenta_pagarPaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(documento_cuenta_pagar_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionesdocumento_cuenta_pagarAjaxWebPart">
			<td id="tdAccionesRelacionesdocumento_cuenta_pagarAjaxWebPart">
				<div id="divAccionesRelacionesdocumento_cuenta_pagarAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionesdocumento_cuenta_pagarAjaxWebPart -->
		</tr> <!-- trAccionesRelacionesdocumento_cuenta_pagarAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderBydocumento_cuenta_pagar">
			<td id="tdOrderBydocumento_cuenta_pagar">
				<form id="frmOrderBydocumento_cuenta_pagar" name="frmOrderBydocumento_cuenta_pagar">
					<div id="divOrderBydocumento_cuenta_pagarAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
				<form id="frmOrderByReldocumento_cuenta_pagar" name="frmOrderByReldocumento_cuenta_pagar">
					<div id="divOrderByReldocumento_cuenta_pagarAjaxWebPart" title="RELACIONES" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderBydocumento_cuenta_pagar -->
		</tr> <!-- trOrderBydocumento_cuenta_pagar/super -->
			
		
		
		
		
		
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
			
				import {documento_cuenta_pagar_webcontrol,documento_cuenta_pagar_webcontrol1} from './webroot/js/JavaScript/contabilidad/cuentaspagar/documento_cuenta_pagar/js/webcontrol/documento_cuenta_pagar_webcontrol.js?random=1';
				
				documento_cuenta_pagar_webcontrol1.setdocumento_cuenta_pagar_constante(window.documento_cuenta_pagar_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(documento_cuenta_pagar_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

