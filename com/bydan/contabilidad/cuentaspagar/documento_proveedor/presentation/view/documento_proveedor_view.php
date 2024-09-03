<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\cuentaspagar\documento_proveedor\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Documentos Proveedores Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/cuentaspagar/documento_proveedor/util/documento_proveedor_carga.php');
	use com\bydan\contabilidad\cuentaspagar\documento_proveedor\util\documento_proveedor_carga;
	
	//include_once('com/bydan/contabilidad/cuentaspagar/documento_proveedor/presentation/view/documento_proveedor_web.php');
	//use com\bydan\contabilidad\cuentaspagar\documento_proveedor\presentation\view\documento_proveedor_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	documento_proveedor_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	documento_proveedor_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$documento_proveedor_web1= new documento_proveedor_web();	
	$documento_proveedor_web1->cargarDatosGenerales();
	
	//$moduloActual=$documento_proveedor_web1->moduloActual;
	//$usuarioActual=$documento_proveedor_web1->usuarioActual;
	//$sessionBase=$documento_proveedor_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$documento_proveedor_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentaspagar/documento_proveedor/js/templating/documento_proveedor_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentaspagar/documento_proveedor/js/templating/documento_proveedor_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentaspagar/documento_proveedor/js/templating/documento_proveedor_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentaspagar/documento_proveedor/js/templating/documento_proveedor_datos_reporte_template.js'); ?>
		
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentaspagar/documento_proveedor/js/templating/documento_proveedor_datos_relaciones_template.js'); ?>
			
						
		
		
		<?php 
			
		
			documento_proveedor_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					documento_proveedor_web::$GET_POST=$_GET;
				} else {
					documento_proveedor_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			documento_proveedor_web::$STR_NOMBRE_PAGINA = 'documento_proveedor_view.php';
			documento_proveedor_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			documento_proveedor_web::$BIT_ES_PAGINA_FORM = 'false';
				
			documento_proveedor_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {documento_proveedor_constante,documento_proveedor_constante1} from './webroot/js/JavaScript/contabilidad/cuentaspagar/documento_proveedor/js/util/documento_proveedor_constante.js?random=1';
			import {documento_proveedor_funcion,documento_proveedor_funcion1} from './webroot/js/JavaScript/contabilidad/cuentaspagar/documento_proveedor/js/util/documento_proveedor_funcion.js?random=1';
			
			let documento_proveedor_constante2 = new documento_proveedor_constante();
			
			documento_proveedor_constante2.STR_NOMBRE_PAGINA="<?php echo(documento_proveedor_web::$STR_NOMBRE_PAGINA); ?>";
			documento_proveedor_constante2.STR_TYPE_ON_LOADdocumento_proveedor="<?php echo(documento_proveedor_web::$STR_TYPE_ONLOAD); ?>";
			documento_proveedor_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(documento_proveedor_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			documento_proveedor_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(documento_proveedor_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			documento_proveedor_constante2.STR_ACTION="<?php echo(documento_proveedor_web::$STR_ACTION); ?>";
			documento_proveedor_constante2.STR_ES_POPUP="<?php echo(documento_proveedor_web::$STR_ES_POPUP); ?>";
			documento_proveedor_constante2.STR_ES_BUSQUEDA="<?php echo(documento_proveedor_web::$STR_ES_BUSQUEDA); ?>";
			documento_proveedor_constante2.STR_FUNCION_JS="<?php echo(documento_proveedor_web::$STR_FUNCION_JS); ?>";
			documento_proveedor_constante2.BIG_ID_ACTUAL="<?php echo(documento_proveedor_web::$BIG_ID_ACTUAL); ?>";
			documento_proveedor_constante2.BIG_ID_OPCION="<?php echo(documento_proveedor_web::$BIG_ID_OPCION); ?>";
			documento_proveedor_constante2.STR_OBJETO_JS="<?php echo(documento_proveedor_web::$STR_OBJETO_JS); ?>";
			documento_proveedor_constante2.STR_ES_RELACIONES="<?php echo(documento_proveedor_web::$STR_ES_RELACIONES); ?>";
			documento_proveedor_constante2.STR_ES_RELACIONADO="<?php echo(documento_proveedor_web::$STR_ES_RELACIONADO); ?>";
			documento_proveedor_constante2.STR_ES_SUB_PAGINA="<?php echo(documento_proveedor_web::$STR_ES_SUB_PAGINA); ?>";
			documento_proveedor_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(documento_proveedor_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			documento_proveedor_constante2.BIT_ES_PAGINA_FORM=<?php echo(documento_proveedor_web::$BIT_ES_PAGINA_FORM); ?>;
			documento_proveedor_constante2.STR_SUFIJO="<?php echo(documento_proveedor_web::$STR_SUF); ?>";//documento_proveedor
			documento_proveedor_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(documento_proveedor_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//documento_proveedor
			
			documento_proveedor_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(documento_proveedor_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			documento_proveedor_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($documento_proveedor_web1->moduloActual->getnombre()); ?>";
			documento_proveedor_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(documento_proveedor_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			documento_proveedor_constante2.BIT_ES_LOAD_NORMAL=true;
			/*documento_proveedor_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			documento_proveedor_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.documento_proveedor_constante2 = documento_proveedor_constante2;
			
		</script>
		
		<?php if(documento_proveedor_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.documento_proveedor_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.documento_proveedor_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="documento_proveedorActual" ></a>
	
	<div id="divResumendocumento_proveedorActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(documento_proveedor_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(documento_proveedor_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(documento_proveedor_web::$STR_ES_BUSQUEDA=='false' && documento_proveedor_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(documento_proveedor_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(documento_proveedor_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(documento_proveedor_web::$STR_ES_RELACIONADO=='false' && documento_proveedor_web::$STR_ES_POPUP=='false' && documento_proveedor_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tddocumento_proveedorNuevoToolBar">
										<img id="imgNuevoToolBardocumento_proveedor" name="imgNuevoToolBardocumento_proveedor" title="Nuevo Documentos Proveedores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(documento_proveedor_web::$STR_ES_BUSQUEDA=='false' && documento_proveedor_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tddocumento_proveedorNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBardocumento_proveedor" name="imgNuevoGuardarCambiosToolBardocumento_proveedor" title="Nuevo TABLA Documentos Proveedores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(documento_proveedor_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tddocumento_proveedorGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBardocumento_proveedor" name="imgGuardarCambiosToolBardocumento_proveedor" title="Guardar Documentos Proveedores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(documento_proveedor_web::$STR_ES_RELACIONADO=='false' && documento_proveedor_web::$STR_ES_RELACIONES=='false' && documento_proveedor_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tddocumento_proveedorCopiarToolBar">
										<img id="imgCopiarToolBardocumento_proveedor" name="imgCopiarToolBardocumento_proveedor" title="Copiar Documentos Proveedores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tddocumento_proveedorDuplicarToolBar">
										<img id="imgDuplicarToolBardocumento_proveedor" name="imgDuplicarToolBardocumento_proveedor" title="Duplicar Documentos Proveedores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(documento_proveedor_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tddocumento_proveedorRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBardocumento_proveedor" name="imgRecargarInformacionToolBardocumento_proveedor" title="Recargar Documentos Proveedores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tddocumento_proveedorAnterioresToolBar">
										<img id="imgAnterioresToolBardocumento_proveedor" name="imgAnterioresToolBardocumento_proveedor" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tddocumento_proveedorSiguientesToolBar">
										<img id="imgSiguientesToolBardocumento_proveedor" name="imgSiguientesToolBardocumento_proveedor" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tddocumento_proveedorAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBardocumento_proveedor" name="imgAbrirOrderByToolBardocumento_proveedor" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((documento_proveedor_web::$STR_ES_RELACIONADO=='false' && documento_proveedor_web::$STR_ES_RELACIONES=='false') || documento_proveedor_web::$STR_ES_BUSQUEDA=='true'  || documento_proveedor_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tddocumento_proveedorCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBardocumento_proveedor" name="imgCerrarPaginaToolBardocumento_proveedor" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trdocumento_proveedorCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedadocumento_proveedor" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedadocumento_proveedor',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trdocumento_proveedorCabeceraBusquedas/super -->

		<tr id="trBusquedadocumento_proveedor" class="busqueda" style="display:table-row">
			<td id="tdBusquedadocumento_proveedor" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedadocumento_proveedor" name="frmBusquedadocumento_proveedor">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedadocumento_proveedor" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trdocumento_proveedorBusquedas" class="busqueda" style="display:table-row"><td>
				<?php if(documento_proveedor_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 70%">
					<ul>
						<li id="listrVisibleFK_Idproveedor" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idproveedor"> Por Proveedor</a></li>
					</ul>
				
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
							<input type="button" id="btnBuscardocumento_proveedorFK_Idproveedor" name="btnBuscardocumento_proveedorFK_Idproveedor" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscardocumento_proveedor" style="display:table-row">
					<td id="tdParamsBuscardocumento_proveedor">
		<?php if(documento_proveedor_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscardocumento_proveedor">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistrosdocumento_proveedor" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistrosdocumento_proveedor"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistrosdocumento_proveedor" name="ParamsBuscar-txtNumeroRegistrosdocumento_proveedor" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformaciondocumento_proveedor">
							<td id="tdGenerarReportedocumento_proveedor" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodosdocumento_proveedor" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodosdocumento_proveedor" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformaciondocumento_proveedor" name="btnRecargarInformaciondocumento_proveedor" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginadocumento_proveedor" name="btnImprimirPaginadocumento_proveedor" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*documento_proveedor_web::$STR_ES_BUSQUEDA=='false'  &&*/ documento_proveedor_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderBydocumento_proveedor">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderBydocumento_proveedor" name="btnOrderBydocumento_proveedor" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
													</td>
													<td>
														<input type="button" id="btnOrderByReldocumento_proveedor" name="btnOrderByReldocumento_proveedor" title="RELACIONES DE DATOS" value="   Rels" class="btn btn-primary"/>
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

										<?php if(documento_proveedor_web::$STR_ES_RELACIONES=='false' && documento_proveedor_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbTiposRelaciones" name="ParamsBuscar-cmbTiposRelaciones" title="TIPOS DE RELACIONES" style="width:150px"></select>
										</td>
										<?php } ?>

										<?php if(documento_proveedor_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tddocumento_proveedorConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodosdocumento_proveedor -->

							</td><!-- tdGenerarReportedocumento_proveedor -->
						</tr><!-- trRecargarInformaciondocumento_proveedor -->
					</table><!-- tblParamsBuscarNumeroRegistrosdocumento_proveedor -->
				</div> <!-- divParamsBuscardocumento_proveedor -->
		<?php } ?>
				</td> <!-- tdParamsBuscardocumento_proveedor -->
				</tr><!-- trParamsBuscardocumento_proveedor -->
				</table> <!-- tblBusquedadocumento_proveedor -->
				</form> <!-- frmBusquedadocumento_proveedor -->
				

			</td> <!-- tdBusquedadocumento_proveedor -->
		</tr> <!-- trBusquedadocumento_proveedor/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(documento_proveedor_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divdocumento_proveedorPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tbldocumento_proveedorPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmdocumento_proveedorAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btndocumento_proveedorAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="documento_proveedor_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btndocumento_proveedorAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmdocumento_proveedorAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tbldocumento_proveedorPopupAjaxWebPart -->
		</div> <!-- divdocumento_proveedorPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(documento_proveedor_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trdocumento_proveedorTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdadocumento_proveedor"></a>
		<img id="imgTablaParaDerechadocumento_proveedor" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechadocumento_proveedor'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdadocumento_proveedor" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdadocumento_proveedor'"/>
		<a id="TablaDerechadocumento_proveedor"></a>
	</td>
</tr> <!-- trdocumento_proveedorTablaNavegacion/super -->
<?php } ?>

<tr id="trdocumento_proveedorTablaDatos">
	<td colspan="3" id="htmlTableCelldocumento_proveedor">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatosdocumento_proveedorsAjaxWebPart">
		</div>
	</td>
</tr> <!-- trdocumento_proveedorTablaDatos/super -->
		
		
		<tr id="trdocumento_proveedorPaginacion" style="display:table-row">
			<td id="tddocumento_proveedorPaginacion" align="center">
				<div id="divdocumento_proveedorPaginacionAjaxWebPart">
				<form id="frmPaginaciondocumento_proveedor" name="frmPaginaciondocumento_proveedor">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginaciondocumento_proveedor" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:center">
					<tr>
						<?php if(documento_proveedor_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkdocumento_proveedor" name="btnSeleccionarLoteFkdocumento_proveedor" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(documento_proveedor_web::$STR_ES_RELACIONADO=='false' /*&& documento_proveedor_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnterioresdocumento_proveedor" name="btnAnterioresdocumento_proveedor" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(documento_proveedor_web::$STR_ES_BUSQUEDA=='false' && documento_proveedor_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tddocumento_proveedorNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPreparardocumento_proveedor" name="btnNuevoTablaPreparardocumento_proveedor" title="NUEVO Documentos Proveedores" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTabladocumento_proveedor" name="ParamsPaginar-txtNumeroNuevoTabladocumento_proveedor" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(documento_proveedor_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tddocumento_proveedorConEditardocumento_proveedor">
							<label>
								<input id="ParamsBuscar-chbConEditardocumento_proveedor" name="ParamsBuscar-chbConEditardocumento_proveedor" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(documento_proveedor_web::$STR_ES_RELACIONADO=='false'/* && documento_proveedor_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientesdocumento_proveedor" name="btnSiguientesdocumento_proveedor" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginaciondocumento_proveedor -->
				</form> <!-- frmPaginaciondocumento_proveedor -->
				<form id="frmNuevoPreparardocumento_proveedor" name="frmNuevoPreparardocumento_proveedor">
				<table id="tblNuevoPreparardocumento_proveedor" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:center">
					<tr id="trdocumento_proveedorNuevo" height="10">
						<?php if(documento_proveedor_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tddocumento_proveedorNuevo" align="center">
							<input type="button" id="btnNuevoPreparardocumento_proveedor" name="btnNuevoPreparardocumento_proveedor" title="NUEVO Documentos Proveedores" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tddocumento_proveedorGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambiosdocumento_proveedor" name="btnGuardarCambiosdocumento_proveedor" title="GUARDAR Documentos Proveedores" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(documento_proveedor_web::$STR_ES_RELACIONADO=='false' && documento_proveedor_web::$STR_ES_RELACIONES=='false' && documento_proveedor_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tddocumento_proveedorDuplicar" align="center">
							<input type="button" id="btnDuplicardocumento_proveedor" name="btnDuplicardocumento_proveedor" title="DUPLICAR Documentos Proveedores" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tddocumento_proveedorCopiar" align="center">
							<input type="button" id="btnCopiardocumento_proveedor" name="btnCopiardocumento_proveedor" title="COPIAR Documentos Proveedores" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(documento_proveedor_web::$STR_ES_RELACIONADO=='false' && ((documento_proveedor_web::$STR_ES_RELACIONADO=='false' && documento_proveedor_web::$STR_ES_RELACIONES=='false') || documento_proveedor_web::$STR_ES_BUSQUEDA=='true'  || documento_proveedor_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tddocumento_proveedorCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginadocumento_proveedor" name="btnCerrarPaginadocumento_proveedor" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPreparardocumento_proveedor -->
				</form> <!-- frmNuevoPreparardocumento_proveedor -->
				</div> <!-- divdocumento_proveedorPaginacionAjaxWebPart -->
			</td> <!-- tddocumento_proveedorPaginacion -->
		</tr> <!-- trdocumento_proveedorPaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(documento_proveedor_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionesdocumento_proveedorAjaxWebPart">
			<td id="tdAccionesRelacionesdocumento_proveedorAjaxWebPart">
				<div id="divAccionesRelacionesdocumento_proveedorAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionesdocumento_proveedorAjaxWebPart -->
		</tr> <!-- trAccionesRelacionesdocumento_proveedorAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderBydocumento_proveedor">
			<td id="tdOrderBydocumento_proveedor">
				<form id="frmOrderBydocumento_proveedor" name="frmOrderBydocumento_proveedor">
					<div id="divOrderBydocumento_proveedorAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
				<form id="frmOrderByReldocumento_proveedor" name="frmOrderByReldocumento_proveedor">
					<div id="divOrderByReldocumento_proveedorAjaxWebPart" title="RELACIONES" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderBydocumento_proveedor -->
		</tr> <!-- trOrderBydocumento_proveedor/super -->
			
		
		
		
		
		
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
			
				import {documento_proveedor_webcontrol,documento_proveedor_webcontrol1} from './webroot/js/JavaScript/contabilidad/cuentaspagar/documento_proveedor/js/webcontrol/documento_proveedor_webcontrol.js?random=1';
				
				documento_proveedor_webcontrol1.setdocumento_proveedor_constante(window.documento_proveedor_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(documento_proveedor_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

