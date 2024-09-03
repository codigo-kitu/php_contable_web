<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\contabilidad\contador_auxiliar\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Contadores Auxiliares Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/contabilidad/contador_auxiliar/util/contador_auxiliar_carga.php');
	use com\bydan\contabilidad\contabilidad\contador_auxiliar\util\contador_auxiliar_carga;
	
	//include_once('com/bydan/contabilidad/contabilidad/contador_auxiliar/presentation/view/contador_auxiliar_web.php');
	//use com\bydan\contabilidad\contabilidad\contador_auxiliar\presentation\view\contador_auxiliar_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	contador_auxiliar_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	contador_auxiliar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$contador_auxiliar_web1= new contador_auxiliar_web();	
	$contador_auxiliar_web1->cargarDatosGenerales();
	
	//$moduloActual=$contador_auxiliar_web1->moduloActual;
	//$usuarioActual=$contador_auxiliar_web1->usuarioActual;
	//$sessionBase=$contador_auxiliar_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$contador_auxiliar_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/contabilidad/contador_auxiliar/js/templating/contador_auxiliar_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/contabilidad/contador_auxiliar/js/templating/contador_auxiliar_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/contabilidad/contador_auxiliar/js/templating/contador_auxiliar_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/contabilidad/contador_auxiliar/js/templating/contador_auxiliar_datos_reporte_template.js'); ?>
		
			
						
		
		
		<?php 
			
		
			contador_auxiliar_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					contador_auxiliar_web::$GET_POST=$_GET;
				} else {
					contador_auxiliar_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			contador_auxiliar_web::$STR_NOMBRE_PAGINA = 'contador_auxiliar_view.php';
			contador_auxiliar_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			contador_auxiliar_web::$BIT_ES_PAGINA_FORM = 'false';
				
			contador_auxiliar_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {contador_auxiliar_constante,contador_auxiliar_constante1} from './webroot/js/JavaScript/contabilidad/contabilidad/contador_auxiliar/js/util/contador_auxiliar_constante.js?random=1';
			import {contador_auxiliar_funcion,contador_auxiliar_funcion1} from './webroot/js/JavaScript/contabilidad/contabilidad/contador_auxiliar/js/util/contador_auxiliar_funcion.js?random=1';
			
			let contador_auxiliar_constante2 = new contador_auxiliar_constante();
			
			contador_auxiliar_constante2.STR_NOMBRE_PAGINA="<?php echo(contador_auxiliar_web::$STR_NOMBRE_PAGINA); ?>";
			contador_auxiliar_constante2.STR_TYPE_ON_LOADcontador_auxiliar="<?php echo(contador_auxiliar_web::$STR_TYPE_ONLOAD); ?>";
			contador_auxiliar_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(contador_auxiliar_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			contador_auxiliar_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(contador_auxiliar_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			contador_auxiliar_constante2.STR_ACTION="<?php echo(contador_auxiliar_web::$STR_ACTION); ?>";
			contador_auxiliar_constante2.STR_ES_POPUP="<?php echo(contador_auxiliar_web::$STR_ES_POPUP); ?>";
			contador_auxiliar_constante2.STR_ES_BUSQUEDA="<?php echo(contador_auxiliar_web::$STR_ES_BUSQUEDA); ?>";
			contador_auxiliar_constante2.STR_FUNCION_JS="<?php echo(contador_auxiliar_web::$STR_FUNCION_JS); ?>";
			contador_auxiliar_constante2.BIG_ID_ACTUAL="<?php echo(contador_auxiliar_web::$BIG_ID_ACTUAL); ?>";
			contador_auxiliar_constante2.BIG_ID_OPCION="<?php echo(contador_auxiliar_web::$BIG_ID_OPCION); ?>";
			contador_auxiliar_constante2.STR_OBJETO_JS="<?php echo(contador_auxiliar_web::$STR_OBJETO_JS); ?>";
			contador_auxiliar_constante2.STR_ES_RELACIONES="<?php echo(contador_auxiliar_web::$STR_ES_RELACIONES); ?>";
			contador_auxiliar_constante2.STR_ES_RELACIONADO="<?php echo(contador_auxiliar_web::$STR_ES_RELACIONADO); ?>";
			contador_auxiliar_constante2.STR_ES_SUB_PAGINA="<?php echo(contador_auxiliar_web::$STR_ES_SUB_PAGINA); ?>";
			contador_auxiliar_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(contador_auxiliar_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			contador_auxiliar_constante2.BIT_ES_PAGINA_FORM=<?php echo(contador_auxiliar_web::$BIT_ES_PAGINA_FORM); ?>;
			contador_auxiliar_constante2.STR_SUFIJO="<?php echo(contador_auxiliar_web::$STR_SUF); ?>";//contador_auxiliar
			contador_auxiliar_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(contador_auxiliar_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//contador_auxiliar
			
			contador_auxiliar_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(contador_auxiliar_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			contador_auxiliar_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($contador_auxiliar_web1->moduloActual->getnombre()); ?>";
			contador_auxiliar_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(contador_auxiliar_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			contador_auxiliar_constante2.BIT_ES_LOAD_NORMAL=true;
			/*contador_auxiliar_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			contador_auxiliar_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.contador_auxiliar_constante2 = contador_auxiliar_constante2;
			
		</script>
		
		<?php if(contador_auxiliar_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.contador_auxiliar_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.contador_auxiliar_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="contador_auxiliarActual" ></a>
	
	<div id="divResumencontador_auxiliarActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(contador_auxiliar_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(contador_auxiliar_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(contador_auxiliar_web::$STR_ES_BUSQUEDA=='false' && contador_auxiliar_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(contador_auxiliar_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(contador_auxiliar_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(contador_auxiliar_web::$STR_ES_RELACIONADO=='false' && contador_auxiliar_web::$STR_ES_POPUP=='false' && contador_auxiliar_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tdcontador_auxiliarNuevoToolBar">
										<img id="imgNuevoToolBarcontador_auxiliar" name="imgNuevoToolBarcontador_auxiliar" title="Nuevo Contadores Auxiliares" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(contador_auxiliar_web::$STR_ES_BUSQUEDA=='false' && contador_auxiliar_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdcontador_auxiliarNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBarcontador_auxiliar" name="imgNuevoGuardarCambiosToolBarcontador_auxiliar" title="Nuevo TABLA Contadores Auxiliares" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(contador_auxiliar_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdcontador_auxiliarGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBarcontador_auxiliar" name="imgGuardarCambiosToolBarcontador_auxiliar" title="Guardar Contadores Auxiliares" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(contador_auxiliar_web::$STR_ES_RELACIONADO=='false' && contador_auxiliar_web::$STR_ES_RELACIONES=='false' && contador_auxiliar_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdcontador_auxiliarCopiarToolBar">
										<img id="imgCopiarToolBarcontador_auxiliar" name="imgCopiarToolBarcontador_auxiliar" title="Copiar Contadores Auxiliares" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdcontador_auxiliarDuplicarToolBar">
										<img id="imgDuplicarToolBarcontador_auxiliar" name="imgDuplicarToolBarcontador_auxiliar" title="Duplicar Contadores Auxiliares" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(contador_auxiliar_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdcontador_auxiliarRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBarcontador_auxiliar" name="imgRecargarInformacionToolBarcontador_auxiliar" title="Recargar Contadores Auxiliares" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdcontador_auxiliarAnterioresToolBar">
										<img id="imgAnterioresToolBarcontador_auxiliar" name="imgAnterioresToolBarcontador_auxiliar" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdcontador_auxiliarSiguientesToolBar">
										<img id="imgSiguientesToolBarcontador_auxiliar" name="imgSiguientesToolBarcontador_auxiliar" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdcontador_auxiliarAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBarcontador_auxiliar" name="imgAbrirOrderByToolBarcontador_auxiliar" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((contador_auxiliar_web::$STR_ES_RELACIONADO=='false' && contador_auxiliar_web::$STR_ES_RELACIONES=='false') || contador_auxiliar_web::$STR_ES_BUSQUEDA=='true'  || contador_auxiliar_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdcontador_auxiliarCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBarcontador_auxiliar" name="imgCerrarPaginaToolBarcontador_auxiliar" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trcontador_auxiliarCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedacontador_auxiliar" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedacontador_auxiliar',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trcontador_auxiliarCabeceraBusquedas/super -->

		<tr id="trBusquedacontador_auxiliar" class="busqueda" style="display:table-row">
			<td id="tdBusquedacontador_auxiliar" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedacontador_auxiliar" name="frmBusquedacontador_auxiliar">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedacontador_auxiliar" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trcontador_auxiliarBusquedas" class="busqueda" style="display:table-row"><td>
				<?php if(contador_auxiliar_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 70%">
					<ul>
						<li id="listrVisibleFK_Idlibro_auxiliar" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idlibro_auxiliar"> Por Libro Auxiliar</a></li>
					</ul>
				
					<div id="divstrVisibleFK_Idlibro_auxiliar">
					<table id="tblstrVisibleFK_Idlibro_auxiliar" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Libro Auxiliar</span>
						</td>
						<td align="center">
							<select id="FK_Idlibro_auxiliar-cmbid_libro_auxiliar" name="FK_Idlibro_auxiliar-cmbid_libro_auxiliar" title="Libro Auxiliar" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarcontador_auxiliarFK_Idlibro_auxiliar" name="btnBuscarcontador_auxiliarFK_Idlibro_auxiliar" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscarcontador_auxiliar" style="display:table-row">
					<td id="tdParamsBuscarcontador_auxiliar">
		<?php if(contador_auxiliar_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscarcontador_auxiliar">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistroscontador_auxiliar" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistroscontador_auxiliar"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistroscontador_auxiliar" name="ParamsBuscar-txtNumeroRegistroscontador_auxiliar" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacioncontador_auxiliar">
							<td id="tdGenerarReportecontador_auxiliar" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodoscontador_auxiliar" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodoscontador_auxiliar" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacioncontador_auxiliar" name="btnRecargarInformacioncontador_auxiliar" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginacontador_auxiliar" name="btnImprimirPaginacontador_auxiliar" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*contador_auxiliar_web::$STR_ES_BUSQUEDA=='false'  &&*/ contador_auxiliar_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderBycontador_auxiliar">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderBycontador_auxiliar" name="btnOrderBycontador_auxiliar" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
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

										<?php if(contador_auxiliar_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdcontador_auxiliarConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodoscontador_auxiliar -->

							</td><!-- tdGenerarReportecontador_auxiliar -->
						</tr><!-- trRecargarInformacioncontador_auxiliar -->
					</table><!-- tblParamsBuscarNumeroRegistroscontador_auxiliar -->
				</div> <!-- divParamsBuscarcontador_auxiliar -->
		<?php } ?>
				</td> <!-- tdParamsBuscarcontador_auxiliar -->
				</tr><!-- trParamsBuscarcontador_auxiliar -->
				</table> <!-- tblBusquedacontador_auxiliar -->
				</form> <!-- frmBusquedacontador_auxiliar -->
				

			</td> <!-- tdBusquedacontador_auxiliar -->
		</tr> <!-- trBusquedacontador_auxiliar/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(contador_auxiliar_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divcontador_auxiliarPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblcontador_auxiliarPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmcontador_auxiliarAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btncontador_auxiliarAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="contador_auxiliar_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btncontador_auxiliarAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmcontador_auxiliarAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblcontador_auxiliarPopupAjaxWebPart -->
		</div> <!-- divcontador_auxiliarPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(contador_auxiliar_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trcontador_auxiliarTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdacontador_auxiliar"></a>
		<img id="imgTablaParaDerechacontador_auxiliar" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechacontador_auxiliar'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdacontador_auxiliar" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdacontador_auxiliar'"/>
		<a id="TablaDerechacontador_auxiliar"></a>
	</td>
</tr> <!-- trcontador_auxiliarTablaNavegacion/super -->
<?php } ?>

<tr id="trcontador_auxiliarTablaDatos">
	<td colspan="3" id="htmlTableCellcontador_auxiliar">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatoscontador_auxiliarsAjaxWebPart">
		</div>
	</td>
</tr> <!-- trcontador_auxiliarTablaDatos/super -->
		
		
		<tr id="trcontador_auxiliarPaginacion" style="display:table-row">
			<td id="tdcontador_auxiliarPaginacion" align="center">
				<div id="divcontador_auxiliarPaginacionAjaxWebPart">
				<form id="frmPaginacioncontador_auxiliar" name="frmPaginacioncontador_auxiliar">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacioncontador_auxiliar" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:center">
					<tr>
						<?php if(contador_auxiliar_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkcontador_auxiliar" name="btnSeleccionarLoteFkcontador_auxiliar" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(contador_auxiliar_web::$STR_ES_RELACIONADO=='false' /*&& contador_auxiliar_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnteriorescontador_auxiliar" name="btnAnteriorescontador_auxiliar" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(contador_auxiliar_web::$STR_ES_BUSQUEDA=='false' && contador_auxiliar_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdcontador_auxiliarNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPrepararcontador_auxiliar" name="btnNuevoTablaPrepararcontador_auxiliar" title="NUEVO Contadores Auxiliares" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablacontador_auxiliar" name="ParamsPaginar-txtNumeroNuevoTablacontador_auxiliar" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(contador_auxiliar_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdcontador_auxiliarConEditarcontador_auxiliar">
							<label>
								<input id="ParamsBuscar-chbConEditarcontador_auxiliar" name="ParamsBuscar-chbConEditarcontador_auxiliar" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(contador_auxiliar_web::$STR_ES_RELACIONADO=='false'/* && contador_auxiliar_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientescontador_auxiliar" name="btnSiguientescontador_auxiliar" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacioncontador_auxiliar -->
				</form> <!-- frmPaginacioncontador_auxiliar -->
				<form id="frmNuevoPrepararcontador_auxiliar" name="frmNuevoPrepararcontador_auxiliar">
				<table id="tblNuevoPrepararcontador_auxiliar" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:center">
					<tr id="trcontador_auxiliarNuevo" height="10">
						<?php if(contador_auxiliar_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdcontador_auxiliarNuevo" align="center">
							<input type="button" id="btnNuevoPrepararcontador_auxiliar" name="btnNuevoPrepararcontador_auxiliar" title="NUEVO Contadores Auxiliares" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdcontador_auxiliarGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambioscontador_auxiliar" name="btnGuardarCambioscontador_auxiliar" title="GUARDAR Contadores Auxiliares" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(contador_auxiliar_web::$STR_ES_RELACIONADO=='false' && contador_auxiliar_web::$STR_ES_RELACIONES=='false' && contador_auxiliar_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdcontador_auxiliarDuplicar" align="center">
							<input type="button" id="btnDuplicarcontador_auxiliar" name="btnDuplicarcontador_auxiliar" title="DUPLICAR Contadores Auxiliares" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdcontador_auxiliarCopiar" align="center">
							<input type="button" id="btnCopiarcontador_auxiliar" name="btnCopiarcontador_auxiliar" title="COPIAR Contadores Auxiliares" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(contador_auxiliar_web::$STR_ES_RELACIONADO=='false' && ((contador_auxiliar_web::$STR_ES_RELACIONADO=='false' && contador_auxiliar_web::$STR_ES_RELACIONES=='false') || contador_auxiliar_web::$STR_ES_BUSQUEDA=='true'  || contador_auxiliar_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdcontador_auxiliarCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginacontador_auxiliar" name="btnCerrarPaginacontador_auxiliar" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPrepararcontador_auxiliar -->
				</form> <!-- frmNuevoPrepararcontador_auxiliar -->
				</div> <!-- divcontador_auxiliarPaginacionAjaxWebPart -->
			</td> <!-- tdcontador_auxiliarPaginacion -->
		</tr> <!-- trcontador_auxiliarPaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(contador_auxiliar_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionescontador_auxiliarAjaxWebPart">
			<td id="tdAccionesRelacionescontador_auxiliarAjaxWebPart">
				<div id="divAccionesRelacionescontador_auxiliarAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionescontador_auxiliarAjaxWebPart -->
		</tr> <!-- trAccionesRelacionescontador_auxiliarAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderBycontador_auxiliar">
			<td id="tdOrderBycontador_auxiliar">
				<form id="frmOrderBycontador_auxiliar" name="frmOrderBycontador_auxiliar">
					<div id="divOrderBycontador_auxiliarAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderBycontador_auxiliar -->
		</tr> <!-- trOrderBycontador_auxiliar/super -->
			
		
		
		
		
		
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
			
				import {contador_auxiliar_webcontrol,contador_auxiliar_webcontrol1} from './webroot/js/JavaScript/contabilidad/contabilidad/contador_auxiliar/js/webcontrol/contador_auxiliar_webcontrol.js?random=1';
				
				contador_auxiliar_webcontrol1.setcontador_auxiliar_constante(window.contador_auxiliar_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(contador_auxiliar_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

