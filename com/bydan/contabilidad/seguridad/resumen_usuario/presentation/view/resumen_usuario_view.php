<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\seguridad\resumen_usuario\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Resumen Usuario Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/seguridad/resumen_usuario/util/resumen_usuario_carga.php');
	use com\bydan\contabilidad\seguridad\resumen_usuario\util\resumen_usuario_carga;
	
	//include_once('com/bydan/contabilidad/seguridad/resumen_usuario/presentation/view/resumen_usuario_web.php');
	//use com\bydan\contabilidad\seguridad\resumen_usuario\presentation\view\resumen_usuario_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	resumen_usuario_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	resumen_usuario_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$resumen_usuario_web1= new resumen_usuario_web();	
	$resumen_usuario_web1->cargarDatosGenerales();
	
	//$moduloActual=$resumen_usuario_web1->moduloActual;
	//$usuarioActual=$resumen_usuario_web1->usuarioActual;
	//$sessionBase=$resumen_usuario_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$resumen_usuario_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/seguridad/resumen_usuario/js/templating/resumen_usuario_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/seguridad/resumen_usuario/js/templating/resumen_usuario_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/seguridad/resumen_usuario/js/templating/resumen_usuario_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/seguridad/resumen_usuario/js/templating/resumen_usuario_datos_reporte_template.js'); ?>
		
			
						
		
		
		<?php 
			
		
			resumen_usuario_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					resumen_usuario_web::$GET_POST=$_GET;
				} else {
					resumen_usuario_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			resumen_usuario_web::$STR_NOMBRE_PAGINA = 'resumen_usuario_view.php';
			resumen_usuario_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			resumen_usuario_web::$BIT_ES_PAGINA_FORM = 'false';
				
			resumen_usuario_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {resumen_usuario_constante,resumen_usuario_constante1} from './webroot/js/JavaScript/contabilidad/seguridad/resumen_usuario/js/util/resumen_usuario_constante.js?random=1';
			import {resumen_usuario_funcion,resumen_usuario_funcion1} from './webroot/js/JavaScript/contabilidad/seguridad/resumen_usuario/js/util/resumen_usuario_funcion.js?random=1';
			
			let resumen_usuario_constante2 = new resumen_usuario_constante();
			
			resumen_usuario_constante2.STR_NOMBRE_PAGINA="<?php echo(resumen_usuario_web::$STR_NOMBRE_PAGINA); ?>";
			resumen_usuario_constante2.STR_TYPE_ON_LOADresumen_usuario="<?php echo(resumen_usuario_web::$STR_TYPE_ONLOAD); ?>";
			resumen_usuario_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(resumen_usuario_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			resumen_usuario_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(resumen_usuario_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			resumen_usuario_constante2.STR_ACTION="<?php echo(resumen_usuario_web::$STR_ACTION); ?>";
			resumen_usuario_constante2.STR_ES_POPUP="<?php echo(resumen_usuario_web::$STR_ES_POPUP); ?>";
			resumen_usuario_constante2.STR_ES_BUSQUEDA="<?php echo(resumen_usuario_web::$STR_ES_BUSQUEDA); ?>";
			resumen_usuario_constante2.STR_FUNCION_JS="<?php echo(resumen_usuario_web::$STR_FUNCION_JS); ?>";
			resumen_usuario_constante2.BIG_ID_ACTUAL="<?php echo(resumen_usuario_web::$BIG_ID_ACTUAL); ?>";
			resumen_usuario_constante2.BIG_ID_OPCION="<?php echo(resumen_usuario_web::$BIG_ID_OPCION); ?>";
			resumen_usuario_constante2.STR_OBJETO_JS="<?php echo(resumen_usuario_web::$STR_OBJETO_JS); ?>";
			resumen_usuario_constante2.STR_ES_RELACIONES="<?php echo(resumen_usuario_web::$STR_ES_RELACIONES); ?>";
			resumen_usuario_constante2.STR_ES_RELACIONADO="<?php echo(resumen_usuario_web::$STR_ES_RELACIONADO); ?>";
			resumen_usuario_constante2.STR_ES_SUB_PAGINA="<?php echo(resumen_usuario_web::$STR_ES_SUB_PAGINA); ?>";
			resumen_usuario_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(resumen_usuario_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			resumen_usuario_constante2.BIT_ES_PAGINA_FORM=<?php echo(resumen_usuario_web::$BIT_ES_PAGINA_FORM); ?>;
			resumen_usuario_constante2.STR_SUFIJO="<?php echo(resumen_usuario_web::$STR_SUF); ?>";//resumen_usuario
			resumen_usuario_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(resumen_usuario_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//resumen_usuario
			
			resumen_usuario_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(resumen_usuario_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			resumen_usuario_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($resumen_usuario_web1->moduloActual->getnombre()); ?>";
			resumen_usuario_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(resumen_usuario_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			resumen_usuario_constante2.BIT_ES_LOAD_NORMAL=true;
			/*resumen_usuario_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			resumen_usuario_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.resumen_usuario_constante2 = resumen_usuario_constante2;
			
		</script>
		
		<?php if(resumen_usuario_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.resumen_usuario_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.resumen_usuario_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="resumen_usuarioActual" ></a>
	
	<div id="divResumenresumen_usuarioActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(resumen_usuario_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(resumen_usuario_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(resumen_usuario_web::$STR_ES_BUSQUEDA=='false' && resumen_usuario_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(resumen_usuario_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(resumen_usuario_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(resumen_usuario_web::$STR_ES_RELACIONADO=='false' && resumen_usuario_web::$STR_ES_POPUP=='false' && resumen_usuario_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tdresumen_usuarioNuevoToolBar">
										<img id="imgNuevoToolBarresumen_usuario" name="imgNuevoToolBarresumen_usuario" title="Nuevo Resumen Usuario" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(resumen_usuario_web::$STR_ES_BUSQUEDA=='false' && resumen_usuario_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdresumen_usuarioNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBarresumen_usuario" name="imgNuevoGuardarCambiosToolBarresumen_usuario" title="Nuevo TABLA Resumen Usuario" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(resumen_usuario_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdresumen_usuarioGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBarresumen_usuario" name="imgGuardarCambiosToolBarresumen_usuario" title="Guardar Resumen Usuario" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(resumen_usuario_web::$STR_ES_RELACIONADO=='false' && resumen_usuario_web::$STR_ES_RELACIONES=='false' && resumen_usuario_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdresumen_usuarioCopiarToolBar">
										<img id="imgCopiarToolBarresumen_usuario" name="imgCopiarToolBarresumen_usuario" title="Copiar Resumen Usuario" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdresumen_usuarioDuplicarToolBar">
										<img id="imgDuplicarToolBarresumen_usuario" name="imgDuplicarToolBarresumen_usuario" title="Duplicar Resumen Usuario" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(resumen_usuario_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdresumen_usuarioRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBarresumen_usuario" name="imgRecargarInformacionToolBarresumen_usuario" title="Recargar Resumen Usuario" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdresumen_usuarioAnterioresToolBar">
										<img id="imgAnterioresToolBarresumen_usuario" name="imgAnterioresToolBarresumen_usuario" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdresumen_usuarioSiguientesToolBar">
										<img id="imgSiguientesToolBarresumen_usuario" name="imgSiguientesToolBarresumen_usuario" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdresumen_usuarioAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBarresumen_usuario" name="imgAbrirOrderByToolBarresumen_usuario" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((resumen_usuario_web::$STR_ES_RELACIONADO=='false' && resumen_usuario_web::$STR_ES_RELACIONES=='false') || resumen_usuario_web::$STR_ES_BUSQUEDA=='true'  || resumen_usuario_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdresumen_usuarioCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBarresumen_usuario" name="imgCerrarPaginaToolBarresumen_usuario" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trresumen_usuarioCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedaresumen_usuario" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedaresumen_usuario',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trresumen_usuarioCabeceraBusquedas/super -->

		<tr id="trBusquedaresumen_usuario" class="busqueda" style="display:table-row">
			<td id="tdBusquedaresumen_usuario" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedaresumen_usuario" name="frmBusquedaresumen_usuario">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedaresumen_usuario" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trresumen_usuarioBusquedas" class="busqueda" style="display:none"><td>
				<?php if(resumen_usuario_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 70%">
				
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscarresumen_usuario" style="display:table-row">
					<td id="tdParamsBuscarresumen_usuario">
		<?php if(resumen_usuario_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscarresumen_usuario">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistrosresumen_usuario" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistrosresumen_usuario"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistrosresumen_usuario" name="ParamsBuscar-txtNumeroRegistrosresumen_usuario" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacionresumen_usuario">
							<td id="tdGenerarReporteresumen_usuario" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodosresumen_usuario" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodosresumen_usuario" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacionresumen_usuario" name="btnRecargarInformacionresumen_usuario" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginaresumen_usuario" name="btnImprimirPaginaresumen_usuario" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*resumen_usuario_web::$STR_ES_BUSQUEDA=='false'  &&*/ resumen_usuario_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderByresumen_usuario">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderByresumen_usuario" name="btnOrderByresumen_usuario" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
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

										<?php if(resumen_usuario_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdresumen_usuarioConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodosresumen_usuario -->

							</td><!-- tdGenerarReporteresumen_usuario -->
						</tr><!-- trRecargarInformacionresumen_usuario -->
					</table><!-- tblParamsBuscarNumeroRegistrosresumen_usuario -->
				</div> <!-- divParamsBuscarresumen_usuario -->
		<?php } ?>
				</td> <!-- tdParamsBuscarresumen_usuario -->
				</tr><!-- trParamsBuscarresumen_usuario -->
				</table> <!-- tblBusquedaresumen_usuario -->
				</form> <!-- frmBusquedaresumen_usuario -->
				

			</td> <!-- tdBusquedaresumen_usuario -->
		</tr> <!-- trBusquedaresumen_usuario/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(resumen_usuario_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divresumen_usuarioPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblresumen_usuarioPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmresumen_usuarioAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnresumen_usuarioAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="resumen_usuario_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnresumen_usuarioAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmresumen_usuarioAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblresumen_usuarioPopupAjaxWebPart -->
		</div> <!-- divresumen_usuarioPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(resumen_usuario_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trresumen_usuarioTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdaresumen_usuario"></a>
		<img id="imgTablaParaDerecharesumen_usuario" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerecharesumen_usuario'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdaresumen_usuario" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdaresumen_usuario'"/>
		<a id="TablaDerecharesumen_usuario"></a>
	</td>
</tr> <!-- trresumen_usuarioTablaNavegacion/super -->
<?php } ?>

<tr id="trresumen_usuarioTablaDatos">
	<td colspan="3" id="htmlTableCellresumen_usuario">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatosresumen_usuariosAjaxWebPart">
		</div>
	</td>
</tr> <!-- trresumen_usuarioTablaDatos/super -->
		
		
		<tr id="trresumen_usuarioPaginacion" style="display:table-row">
			<td id="tdresumen_usuarioPaginacion" align="left">
				<div id="divresumen_usuarioPaginacionAjaxWebPart">
				<form id="frmPaginacionresumen_usuario" name="frmPaginacionresumen_usuario">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacionresumen_usuario" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:left">
					<tr>
						<?php if(resumen_usuario_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkresumen_usuario" name="btnSeleccionarLoteFkresumen_usuario" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(resumen_usuario_web::$STR_ES_RELACIONADO=='false' /*&& resumen_usuario_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnterioresresumen_usuario" name="btnAnterioresresumen_usuario" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(resumen_usuario_web::$STR_ES_BUSQUEDA=='false' && resumen_usuario_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdresumen_usuarioNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPrepararresumen_usuario" name="btnNuevoTablaPrepararresumen_usuario" title="NUEVO Resumen Usuario" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablaresumen_usuario" name="ParamsPaginar-txtNumeroNuevoTablaresumen_usuario" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(resumen_usuario_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdresumen_usuarioConEditarresumen_usuario">
							<label>
								<input id="ParamsBuscar-chbConEditarresumen_usuario" name="ParamsBuscar-chbConEditarresumen_usuario" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(resumen_usuario_web::$STR_ES_RELACIONADO=='false'/* && resumen_usuario_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientesresumen_usuario" name="btnSiguientesresumen_usuario" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacionresumen_usuario -->
				</form> <!-- frmPaginacionresumen_usuario -->
				<form id="frmNuevoPrepararresumen_usuario" name="frmNuevoPrepararresumen_usuario">
				<table id="tblNuevoPrepararresumen_usuario" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:left">
					<tr id="trresumen_usuarioNuevo" height="10">
						<?php if(resumen_usuario_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdresumen_usuarioNuevo" align="center">
							<input type="button" id="btnNuevoPrepararresumen_usuario" name="btnNuevoPrepararresumen_usuario" title="NUEVO Resumen Usuario" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdresumen_usuarioGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambiosresumen_usuario" name="btnGuardarCambiosresumen_usuario" title="GUARDAR Resumen Usuario" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(resumen_usuario_web::$STR_ES_RELACIONADO=='false' && resumen_usuario_web::$STR_ES_RELACIONES=='false' && resumen_usuario_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdresumen_usuarioDuplicar" align="center">
							<input type="button" id="btnDuplicarresumen_usuario" name="btnDuplicarresumen_usuario" title="DUPLICAR Resumen Usuario" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdresumen_usuarioCopiar" align="center">
							<input type="button" id="btnCopiarresumen_usuario" name="btnCopiarresumen_usuario" title="COPIAR Resumen Usuario" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(resumen_usuario_web::$STR_ES_RELACIONADO=='false' && ((resumen_usuario_web::$STR_ES_RELACIONADO=='false' && resumen_usuario_web::$STR_ES_RELACIONES=='false') || resumen_usuario_web::$STR_ES_BUSQUEDA=='true'  || resumen_usuario_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdresumen_usuarioCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginaresumen_usuario" name="btnCerrarPaginaresumen_usuario" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPrepararresumen_usuario -->
				</form> <!-- frmNuevoPrepararresumen_usuario -->
				</div> <!-- divresumen_usuarioPaginacionAjaxWebPart -->
			</td> <!-- tdresumen_usuarioPaginacion -->
		</tr> <!-- trresumen_usuarioPaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(resumen_usuario_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionesresumen_usuarioAjaxWebPart">
			<td id="tdAccionesRelacionesresumen_usuarioAjaxWebPart">
				<div id="divAccionesRelacionesresumen_usuarioAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionesresumen_usuarioAjaxWebPart -->
		</tr> <!-- trAccionesRelacionesresumen_usuarioAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderByresumen_usuario">
			<td id="tdOrderByresumen_usuario">
				<form id="frmOrderByresumen_usuario" name="frmOrderByresumen_usuario">
					<div id="divOrderByresumen_usuarioAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderByresumen_usuario -->
		</tr> <!-- trOrderByresumen_usuario/super -->
			
		
		
		
		
		
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
			
				import {resumen_usuario_webcontrol,resumen_usuario_webcontrol1} from './webroot/js/JavaScript/contabilidad/seguridad/resumen_usuario/js/webcontrol/resumen_usuario_webcontrol.js?random=1';
				
				resumen_usuario_webcontrol1.setresumen_usuario_constante(window.resumen_usuario_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(resumen_usuario_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

