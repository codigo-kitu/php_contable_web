<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\general\comentario_documento\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Comentario Documento Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/general/comentario_documento/util/comentario_documento_carga.php');
	use com\bydan\contabilidad\general\comentario_documento\util\comentario_documento_carga;
	
	//include_once('com/bydan/contabilidad/general/comentario_documento/presentation/view/comentario_documento_web.php');
	//use com\bydan\contabilidad\general\comentario_documento\presentation\view\comentario_documento_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	comentario_documento_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	comentario_documento_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$comentario_documento_web1= new comentario_documento_web();	
	$comentario_documento_web1->cargarDatosGenerales();
	
	//$moduloActual=$comentario_documento_web1->moduloActual;
	//$usuarioActual=$comentario_documento_web1->usuarioActual;
	//$sessionBase=$comentario_documento_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$comentario_documento_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/general/comentario_documento/js/templating/comentario_documento_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/general/comentario_documento/js/templating/comentario_documento_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/general/comentario_documento/js/templating/comentario_documento_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/general/comentario_documento/js/templating/comentario_documento_datos_reporte_template.js'); ?>
		
			
						
		
		
		<?php 
			
		
			comentario_documento_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					comentario_documento_web::$GET_POST=$_GET;
				} else {
					comentario_documento_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			comentario_documento_web::$STR_NOMBRE_PAGINA = 'comentario_documento_view.php';
			comentario_documento_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			comentario_documento_web::$BIT_ES_PAGINA_FORM = 'false';
				
			comentario_documento_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {comentario_documento_constante,comentario_documento_constante1} from './webroot/js/JavaScript/contabilidad/general/comentario_documento/js/util/comentario_documento_constante.js?random=1';
			import {comentario_documento_funcion,comentario_documento_funcion1} from './webroot/js/JavaScript/contabilidad/general/comentario_documento/js/util/comentario_documento_funcion.js?random=1';
			
			let comentario_documento_constante2 = new comentario_documento_constante();
			
			comentario_documento_constante2.STR_NOMBRE_PAGINA="<?php echo(comentario_documento_web::$STR_NOMBRE_PAGINA); ?>";
			comentario_documento_constante2.STR_TYPE_ON_LOADcomentario_documento="<?php echo(comentario_documento_web::$STR_TYPE_ONLOAD); ?>";
			comentario_documento_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(comentario_documento_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			comentario_documento_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(comentario_documento_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			comentario_documento_constante2.STR_ACTION="<?php echo(comentario_documento_web::$STR_ACTION); ?>";
			comentario_documento_constante2.STR_ES_POPUP="<?php echo(comentario_documento_web::$STR_ES_POPUP); ?>";
			comentario_documento_constante2.STR_ES_BUSQUEDA="<?php echo(comentario_documento_web::$STR_ES_BUSQUEDA); ?>";
			comentario_documento_constante2.STR_FUNCION_JS="<?php echo(comentario_documento_web::$STR_FUNCION_JS); ?>";
			comentario_documento_constante2.BIG_ID_ACTUAL="<?php echo(comentario_documento_web::$BIG_ID_ACTUAL); ?>";
			comentario_documento_constante2.BIG_ID_OPCION="<?php echo(comentario_documento_web::$BIG_ID_OPCION); ?>";
			comentario_documento_constante2.STR_OBJETO_JS="<?php echo(comentario_documento_web::$STR_OBJETO_JS); ?>";
			comentario_documento_constante2.STR_ES_RELACIONES="<?php echo(comentario_documento_web::$STR_ES_RELACIONES); ?>";
			comentario_documento_constante2.STR_ES_RELACIONADO="<?php echo(comentario_documento_web::$STR_ES_RELACIONADO); ?>";
			comentario_documento_constante2.STR_ES_SUB_PAGINA="<?php echo(comentario_documento_web::$STR_ES_SUB_PAGINA); ?>";
			comentario_documento_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(comentario_documento_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			comentario_documento_constante2.BIT_ES_PAGINA_FORM=<?php echo(comentario_documento_web::$BIT_ES_PAGINA_FORM); ?>;
			comentario_documento_constante2.STR_SUFIJO="<?php echo(comentario_documento_web::$STR_SUF); ?>";//comentario_documento
			comentario_documento_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(comentario_documento_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//comentario_documento
			
			comentario_documento_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(comentario_documento_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			comentario_documento_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($comentario_documento_web1->moduloActual->getnombre()); ?>";
			comentario_documento_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(comentario_documento_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			comentario_documento_constante2.BIT_ES_LOAD_NORMAL=true;
			/*comentario_documento_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			comentario_documento_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.comentario_documento_constante2 = comentario_documento_constante2;
			
		</script>
		
		<?php if(comentario_documento_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.comentario_documento_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.comentario_documento_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="comentario_documentoActual" ></a>
	
	<div id="divResumencomentario_documentoActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(comentario_documento_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(comentario_documento_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(comentario_documento_web::$STR_ES_BUSQUEDA=='false' && comentario_documento_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(comentario_documento_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(comentario_documento_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(comentario_documento_web::$STR_ES_RELACIONADO=='false' && comentario_documento_web::$STR_ES_POPUP=='false' && comentario_documento_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tdcomentario_documentoNuevoToolBar">
										<img id="imgNuevoToolBarcomentario_documento" name="imgNuevoToolBarcomentario_documento" title="Nuevo Comentario Documento" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(comentario_documento_web::$STR_ES_BUSQUEDA=='false' && comentario_documento_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdcomentario_documentoNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBarcomentario_documento" name="imgNuevoGuardarCambiosToolBarcomentario_documento" title="Nuevo TABLA Comentario Documento" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(comentario_documento_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdcomentario_documentoGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBarcomentario_documento" name="imgGuardarCambiosToolBarcomentario_documento" title="Guardar Comentario Documento" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(comentario_documento_web::$STR_ES_RELACIONADO=='false' && comentario_documento_web::$STR_ES_RELACIONES=='false' && comentario_documento_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdcomentario_documentoCopiarToolBar">
										<img id="imgCopiarToolBarcomentario_documento" name="imgCopiarToolBarcomentario_documento" title="Copiar Comentario Documento" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdcomentario_documentoDuplicarToolBar">
										<img id="imgDuplicarToolBarcomentario_documento" name="imgDuplicarToolBarcomentario_documento" title="Duplicar Comentario Documento" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(comentario_documento_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdcomentario_documentoRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBarcomentario_documento" name="imgRecargarInformacionToolBarcomentario_documento" title="Recargar Comentario Documento" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdcomentario_documentoAnterioresToolBar">
										<img id="imgAnterioresToolBarcomentario_documento" name="imgAnterioresToolBarcomentario_documento" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdcomentario_documentoSiguientesToolBar">
										<img id="imgSiguientesToolBarcomentario_documento" name="imgSiguientesToolBarcomentario_documento" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdcomentario_documentoAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBarcomentario_documento" name="imgAbrirOrderByToolBarcomentario_documento" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((comentario_documento_web::$STR_ES_RELACIONADO=='false' && comentario_documento_web::$STR_ES_RELACIONES=='false') || comentario_documento_web::$STR_ES_BUSQUEDA=='true'  || comentario_documento_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdcomentario_documentoCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBarcomentario_documento" name="imgCerrarPaginaToolBarcomentario_documento" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trcomentario_documentoCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedacomentario_documento" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedacomentario_documento',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trcomentario_documentoCabeceraBusquedas/super -->

		<tr id="trBusquedacomentario_documento" class="busqueda" style="display:table-row">
			<td id="tdBusquedacomentario_documento" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedacomentario_documento" name="frmBusquedacomentario_documento">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedacomentario_documento" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trcomentario_documentoBusquedas" class="busqueda" style="display:none"><td>
				<?php if(comentario_documento_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 70%">
				
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscarcomentario_documento" style="display:table-row">
					<td id="tdParamsBuscarcomentario_documento">
		<?php if(comentario_documento_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscarcomentario_documento">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistroscomentario_documento" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistroscomentario_documento"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistroscomentario_documento" name="ParamsBuscar-txtNumeroRegistroscomentario_documento" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacioncomentario_documento">
							<td id="tdGenerarReportecomentario_documento" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodoscomentario_documento" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodoscomentario_documento" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacioncomentario_documento" name="btnRecargarInformacioncomentario_documento" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginacomentario_documento" name="btnImprimirPaginacomentario_documento" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*comentario_documento_web::$STR_ES_BUSQUEDA=='false'  &&*/ comentario_documento_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderBycomentario_documento">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderBycomentario_documento" name="btnOrderBycomentario_documento" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
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

										<?php if(comentario_documento_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdcomentario_documentoConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodoscomentario_documento -->

							</td><!-- tdGenerarReportecomentario_documento -->
						</tr><!-- trRecargarInformacioncomentario_documento -->
					</table><!-- tblParamsBuscarNumeroRegistroscomentario_documento -->
				</div> <!-- divParamsBuscarcomentario_documento -->
		<?php } ?>
				</td> <!-- tdParamsBuscarcomentario_documento -->
				</tr><!-- trParamsBuscarcomentario_documento -->
				</table> <!-- tblBusquedacomentario_documento -->
				</form> <!-- frmBusquedacomentario_documento -->
				

			</td> <!-- tdBusquedacomentario_documento -->
		</tr> <!-- trBusquedacomentario_documento/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(comentario_documento_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divcomentario_documentoPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblcomentario_documentoPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmcomentario_documentoAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btncomentario_documentoAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="comentario_documento_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btncomentario_documentoAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmcomentario_documentoAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblcomentario_documentoPopupAjaxWebPart -->
		</div> <!-- divcomentario_documentoPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(comentario_documento_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trcomentario_documentoTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdacomentario_documento"></a>
		<img id="imgTablaParaDerechacomentario_documento" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechacomentario_documento'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdacomentario_documento" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdacomentario_documento'"/>
		<a id="TablaDerechacomentario_documento"></a>
	</td>
</tr> <!-- trcomentario_documentoTablaNavegacion/super -->
<?php } ?>

<tr id="trcomentario_documentoTablaDatos">
	<td colspan="3" id="htmlTableCellcomentario_documento">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatoscomentario_documentosAjaxWebPart">
		</div>
	</td>
</tr> <!-- trcomentario_documentoTablaDatos/super -->
		
		
		<tr id="trcomentario_documentoPaginacion" style="display:table-row">
			<td id="tdcomentario_documentoPaginacion" align="center">
				<div id="divcomentario_documentoPaginacionAjaxWebPart">
				<form id="frmPaginacioncomentario_documento" name="frmPaginacioncomentario_documento">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacioncomentario_documento" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:center">
					<tr>
						<?php if(comentario_documento_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkcomentario_documento" name="btnSeleccionarLoteFkcomentario_documento" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(comentario_documento_web::$STR_ES_RELACIONADO=='false' /*&& comentario_documento_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnteriorescomentario_documento" name="btnAnteriorescomentario_documento" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(comentario_documento_web::$STR_ES_BUSQUEDA=='false' && comentario_documento_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdcomentario_documentoNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPrepararcomentario_documento" name="btnNuevoTablaPrepararcomentario_documento" title="NUEVO Comentario Documento" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablacomentario_documento" name="ParamsPaginar-txtNumeroNuevoTablacomentario_documento" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(comentario_documento_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdcomentario_documentoConEditarcomentario_documento">
							<label>
								<input id="ParamsBuscar-chbConEditarcomentario_documento" name="ParamsBuscar-chbConEditarcomentario_documento" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(comentario_documento_web::$STR_ES_RELACIONADO=='false'/* && comentario_documento_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientescomentario_documento" name="btnSiguientescomentario_documento" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacioncomentario_documento -->
				</form> <!-- frmPaginacioncomentario_documento -->
				<form id="frmNuevoPrepararcomentario_documento" name="frmNuevoPrepararcomentario_documento">
				<table id="tblNuevoPrepararcomentario_documento" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:center">
					<tr id="trcomentario_documentoNuevo" height="10">
						<?php if(comentario_documento_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdcomentario_documentoNuevo" align="center">
							<input type="button" id="btnNuevoPrepararcomentario_documento" name="btnNuevoPrepararcomentario_documento" title="NUEVO Comentario Documento" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdcomentario_documentoGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambioscomentario_documento" name="btnGuardarCambioscomentario_documento" title="GUARDAR Comentario Documento" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(comentario_documento_web::$STR_ES_RELACIONADO=='false' && comentario_documento_web::$STR_ES_RELACIONES=='false' && comentario_documento_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdcomentario_documentoDuplicar" align="center">
							<input type="button" id="btnDuplicarcomentario_documento" name="btnDuplicarcomentario_documento" title="DUPLICAR Comentario Documento" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdcomentario_documentoCopiar" align="center">
							<input type="button" id="btnCopiarcomentario_documento" name="btnCopiarcomentario_documento" title="COPIAR Comentario Documento" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(comentario_documento_web::$STR_ES_RELACIONADO=='false' && ((comentario_documento_web::$STR_ES_RELACIONADO=='false' && comentario_documento_web::$STR_ES_RELACIONES=='false') || comentario_documento_web::$STR_ES_BUSQUEDA=='true'  || comentario_documento_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdcomentario_documentoCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginacomentario_documento" name="btnCerrarPaginacomentario_documento" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPrepararcomentario_documento -->
				</form> <!-- frmNuevoPrepararcomentario_documento -->
				</div> <!-- divcomentario_documentoPaginacionAjaxWebPart -->
			</td> <!-- tdcomentario_documentoPaginacion -->
		</tr> <!-- trcomentario_documentoPaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(comentario_documento_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionescomentario_documentoAjaxWebPart">
			<td id="tdAccionesRelacionescomentario_documentoAjaxWebPart">
				<div id="divAccionesRelacionescomentario_documentoAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionescomentario_documentoAjaxWebPart -->
		</tr> <!-- trAccionesRelacionescomentario_documentoAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderBycomentario_documento">
			<td id="tdOrderBycomentario_documento">
				<form id="frmOrderBycomentario_documento" name="frmOrderBycomentario_documento">
					<div id="divOrderBycomentario_documentoAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderBycomentario_documento -->
		</tr> <!-- trOrderBycomentario_documento/super -->
			
		
		
		
		
		
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
			
				import {comentario_documento_webcontrol,comentario_documento_webcontrol1} from './webroot/js/JavaScript/contabilidad/general/comentario_documento/js/webcontrol/comentario_documento_webcontrol.js?random=1';
				
				comentario_documento_webcontrol1.setcomentario_documento_constante(window.comentario_documento_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(comentario_documento_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

