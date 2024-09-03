<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\contabilidad\centro_costo\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Centro Costo Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/contabilidad/centro_costo/util/centro_costo_carga.php');
	use com\bydan\contabilidad\contabilidad\centro_costo\util\centro_costo_carga;
	
	//include_once('com/bydan/contabilidad/contabilidad/centro_costo/presentation/view/centro_costo_web.php');
	//use com\bydan\contabilidad\contabilidad\centro_costo\presentation\view\centro_costo_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	centro_costo_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	centro_costo_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$centro_costo_web1= new centro_costo_web();	
	$centro_costo_web1->cargarDatosGenerales();
	
	//$moduloActual=$centro_costo_web1->moduloActual;
	//$usuarioActual=$centro_costo_web1->usuarioActual;
	//$sessionBase=$centro_costo_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$centro_costo_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/contabilidad/centro_costo/js/templating/centro_costo_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/contabilidad/centro_costo/js/templating/centro_costo_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/contabilidad/centro_costo/js/templating/centro_costo_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/contabilidad/centro_costo/js/templating/centro_costo_datos_reporte_template.js'); ?>
		
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/contabilidad/centro_costo/js/templating/centro_costo_datos_relaciones_template.js'); ?>
			
						
		
		
		<?php 
			
		
			centro_costo_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					centro_costo_web::$GET_POST=$_GET;
				} else {
					centro_costo_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			centro_costo_web::$STR_NOMBRE_PAGINA = 'centro_costo_view.php';
			centro_costo_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			centro_costo_web::$BIT_ES_PAGINA_FORM = 'false';
				
			centro_costo_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {centro_costo_constante,centro_costo_constante1} from './webroot/js/JavaScript/contabilidad/contabilidad/centro_costo/js/util/centro_costo_constante.js?random=1';
			import {centro_costo_funcion,centro_costo_funcion1} from './webroot/js/JavaScript/contabilidad/contabilidad/centro_costo/js/util/centro_costo_funcion.js?random=1';
			
			let centro_costo_constante2 = new centro_costo_constante();
			
			centro_costo_constante2.STR_NOMBRE_PAGINA="<?php echo(centro_costo_web::$STR_NOMBRE_PAGINA); ?>";
			centro_costo_constante2.STR_TYPE_ON_LOADcentro_costo="<?php echo(centro_costo_web::$STR_TYPE_ONLOAD); ?>";
			centro_costo_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(centro_costo_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			centro_costo_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(centro_costo_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			centro_costo_constante2.STR_ACTION="<?php echo(centro_costo_web::$STR_ACTION); ?>";
			centro_costo_constante2.STR_ES_POPUP="<?php echo(centro_costo_web::$STR_ES_POPUP); ?>";
			centro_costo_constante2.STR_ES_BUSQUEDA="<?php echo(centro_costo_web::$STR_ES_BUSQUEDA); ?>";
			centro_costo_constante2.STR_FUNCION_JS="<?php echo(centro_costo_web::$STR_FUNCION_JS); ?>";
			centro_costo_constante2.BIG_ID_ACTUAL="<?php echo(centro_costo_web::$BIG_ID_ACTUAL); ?>";
			centro_costo_constante2.BIG_ID_OPCION="<?php echo(centro_costo_web::$BIG_ID_OPCION); ?>";
			centro_costo_constante2.STR_OBJETO_JS="<?php echo(centro_costo_web::$STR_OBJETO_JS); ?>";
			centro_costo_constante2.STR_ES_RELACIONES="<?php echo(centro_costo_web::$STR_ES_RELACIONES); ?>";
			centro_costo_constante2.STR_ES_RELACIONADO="<?php echo(centro_costo_web::$STR_ES_RELACIONADO); ?>";
			centro_costo_constante2.STR_ES_SUB_PAGINA="<?php echo(centro_costo_web::$STR_ES_SUB_PAGINA); ?>";
			centro_costo_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(centro_costo_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			centro_costo_constante2.BIT_ES_PAGINA_FORM=<?php echo(centro_costo_web::$BIT_ES_PAGINA_FORM); ?>;
			centro_costo_constante2.STR_SUFIJO="<?php echo(centro_costo_web::$STR_SUF); ?>";//centro_costo
			centro_costo_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(centro_costo_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//centro_costo
			
			centro_costo_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(centro_costo_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			centro_costo_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($centro_costo_web1->moduloActual->getnombre()); ?>";
			centro_costo_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(centro_costo_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			centro_costo_constante2.BIT_ES_LOAD_NORMAL=true;
			/*centro_costo_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			centro_costo_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.centro_costo_constante2 = centro_costo_constante2;
			
		</script>
		
		<?php if(centro_costo_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.centro_costo_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.centro_costo_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="centro_costoActual" ></a>
	
	<div id="divResumencentro_costoActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(centro_costo_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(centro_costo_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(centro_costo_web::$STR_ES_BUSQUEDA=='false' && centro_costo_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(centro_costo_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(centro_costo_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(centro_costo_web::$STR_ES_RELACIONADO=='false' && centro_costo_web::$STR_ES_POPUP=='false' && centro_costo_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tdcentro_costoNuevoToolBar">
										<img id="imgNuevoToolBarcentro_costo" name="imgNuevoToolBarcentro_costo" title="Nuevo Centro Costo" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(centro_costo_web::$STR_ES_BUSQUEDA=='false' && centro_costo_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdcentro_costoNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBarcentro_costo" name="imgNuevoGuardarCambiosToolBarcentro_costo" title="Nuevo TABLA Centro Costo" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(centro_costo_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdcentro_costoGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBarcentro_costo" name="imgGuardarCambiosToolBarcentro_costo" title="Guardar Centro Costo" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(centro_costo_web::$STR_ES_RELACIONADO=='false' && centro_costo_web::$STR_ES_RELACIONES=='false' && centro_costo_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdcentro_costoCopiarToolBar">
										<img id="imgCopiarToolBarcentro_costo" name="imgCopiarToolBarcentro_costo" title="Copiar Centro Costo" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdcentro_costoDuplicarToolBar">
										<img id="imgDuplicarToolBarcentro_costo" name="imgDuplicarToolBarcentro_costo" title="Duplicar Centro Costo" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(centro_costo_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdcentro_costoRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBarcentro_costo" name="imgRecargarInformacionToolBarcentro_costo" title="Recargar Centro Costo" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdcentro_costoAnterioresToolBar">
										<img id="imgAnterioresToolBarcentro_costo" name="imgAnterioresToolBarcentro_costo" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdcentro_costoSiguientesToolBar">
										<img id="imgSiguientesToolBarcentro_costo" name="imgSiguientesToolBarcentro_costo" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdcentro_costoAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBarcentro_costo" name="imgAbrirOrderByToolBarcentro_costo" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((centro_costo_web::$STR_ES_RELACIONADO=='false' && centro_costo_web::$STR_ES_RELACIONES=='false') || centro_costo_web::$STR_ES_BUSQUEDA=='true'  || centro_costo_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdcentro_costoCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBarcentro_costo" name="imgCerrarPaginaToolBarcentro_costo" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trcentro_costoCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedacentro_costo" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedacentro_costo',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trcentro_costoCabeceraBusquedas/super -->

		<tr id="trBusquedacentro_costo" class="busqueda" style="display:table-row">
			<td id="tdBusquedacentro_costo" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedacentro_costo" name="frmBusquedacentro_costo">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedacentro_costo" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trcentro_costoBusquedas" class="busqueda" style="display:none"><td>
				<?php if(centro_costo_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 70%">
				
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscarcentro_costo" style="display:table-row">
					<td id="tdParamsBuscarcentro_costo">
		<?php if(centro_costo_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscarcentro_costo">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistroscentro_costo" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistroscentro_costo"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistroscentro_costo" name="ParamsBuscar-txtNumeroRegistroscentro_costo" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacioncentro_costo">
							<td id="tdGenerarReportecentro_costo" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodoscentro_costo" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodoscentro_costo" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacioncentro_costo" name="btnRecargarInformacioncentro_costo" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginacentro_costo" name="btnImprimirPaginacentro_costo" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*centro_costo_web::$STR_ES_BUSQUEDA=='false'  &&*/ centro_costo_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderBycentro_costo">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderBycentro_costo" name="btnOrderBycentro_costo" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
													</td>
													<td>
														<input type="button" id="btnOrderByRelcentro_costo" name="btnOrderByRelcentro_costo" title="RELACIONES DE DATOS" value="   Rels" class="btn btn-primary"/>
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

										<?php if(centro_costo_web::$STR_ES_RELACIONES=='false' && centro_costo_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbTiposRelaciones" name="ParamsBuscar-cmbTiposRelaciones" title="TIPOS DE RELACIONES" style="width:150px"></select>
										</td>
										<?php } ?>

										<?php if(centro_costo_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdcentro_costoConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodoscentro_costo -->

							</td><!-- tdGenerarReportecentro_costo -->
						</tr><!-- trRecargarInformacioncentro_costo -->
					</table><!-- tblParamsBuscarNumeroRegistroscentro_costo -->
				</div> <!-- divParamsBuscarcentro_costo -->
		<?php } ?>
				</td> <!-- tdParamsBuscarcentro_costo -->
				</tr><!-- trParamsBuscarcentro_costo -->
				</table> <!-- tblBusquedacentro_costo -->
				</form> <!-- frmBusquedacentro_costo -->
				

			</td> <!-- tdBusquedacentro_costo -->
		</tr> <!-- trBusquedacentro_costo/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(centro_costo_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divcentro_costoPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblcentro_costoPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmcentro_costoAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btncentro_costoAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="centro_costo_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btncentro_costoAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmcentro_costoAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblcentro_costoPopupAjaxWebPart -->
		</div> <!-- divcentro_costoPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(centro_costo_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trcentro_costoTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdacentro_costo"></a>
		<img id="imgTablaParaDerechacentro_costo" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechacentro_costo'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdacentro_costo" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdacentro_costo'"/>
		<a id="TablaDerechacentro_costo"></a>
	</td>
</tr> <!-- trcentro_costoTablaNavegacion/super -->
<?php } ?>

<tr id="trcentro_costoTablaDatos">
	<td colspan="3" id="htmlTableCellcentro_costo">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatoscentro_costosAjaxWebPart">
		</div>
	</td>
</tr> <!-- trcentro_costoTablaDatos/super -->
		
		
		<tr id="trcentro_costoPaginacion" style="display:table-row">
			<td id="tdcentro_costoPaginacion" align="center">
				<div id="divcentro_costoPaginacionAjaxWebPart">
				<form id="frmPaginacioncentro_costo" name="frmPaginacioncentro_costo">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacioncentro_costo" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:center">
					<tr>
						<?php if(centro_costo_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkcentro_costo" name="btnSeleccionarLoteFkcentro_costo" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(centro_costo_web::$STR_ES_RELACIONADO=='false' /*&& centro_costo_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnteriorescentro_costo" name="btnAnteriorescentro_costo" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(centro_costo_web::$STR_ES_BUSQUEDA=='false' && centro_costo_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdcentro_costoNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPrepararcentro_costo" name="btnNuevoTablaPrepararcentro_costo" title="NUEVO Centro Costo" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablacentro_costo" name="ParamsPaginar-txtNumeroNuevoTablacentro_costo" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(centro_costo_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdcentro_costoConEditarcentro_costo">
							<label>
								<input id="ParamsBuscar-chbConEditarcentro_costo" name="ParamsBuscar-chbConEditarcentro_costo" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(centro_costo_web::$STR_ES_RELACIONADO=='false'/* && centro_costo_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientescentro_costo" name="btnSiguientescentro_costo" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacioncentro_costo -->
				</form> <!-- frmPaginacioncentro_costo -->
				<form id="frmNuevoPrepararcentro_costo" name="frmNuevoPrepararcentro_costo">
				<table id="tblNuevoPrepararcentro_costo" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:center">
					<tr id="trcentro_costoNuevo" height="10">
						<?php if(centro_costo_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdcentro_costoNuevo" align="center">
							<input type="button" id="btnNuevoPrepararcentro_costo" name="btnNuevoPrepararcentro_costo" title="NUEVO Centro Costo" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdcentro_costoGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambioscentro_costo" name="btnGuardarCambioscentro_costo" title="GUARDAR Centro Costo" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(centro_costo_web::$STR_ES_RELACIONADO=='false' && centro_costo_web::$STR_ES_RELACIONES=='false' && centro_costo_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdcentro_costoDuplicar" align="center">
							<input type="button" id="btnDuplicarcentro_costo" name="btnDuplicarcentro_costo" title="DUPLICAR Centro Costo" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdcentro_costoCopiar" align="center">
							<input type="button" id="btnCopiarcentro_costo" name="btnCopiarcentro_costo" title="COPIAR Centro Costo" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(centro_costo_web::$STR_ES_RELACIONADO=='false' && ((centro_costo_web::$STR_ES_RELACIONADO=='false' && centro_costo_web::$STR_ES_RELACIONES=='false') || centro_costo_web::$STR_ES_BUSQUEDA=='true'  || centro_costo_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdcentro_costoCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginacentro_costo" name="btnCerrarPaginacentro_costo" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPrepararcentro_costo -->
				</form> <!-- frmNuevoPrepararcentro_costo -->
				</div> <!-- divcentro_costoPaginacionAjaxWebPart -->
			</td> <!-- tdcentro_costoPaginacion -->
		</tr> <!-- trcentro_costoPaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(centro_costo_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionescentro_costoAjaxWebPart">
			<td id="tdAccionesRelacionescentro_costoAjaxWebPart">
				<div id="divAccionesRelacionescentro_costoAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionescentro_costoAjaxWebPart -->
		</tr> <!-- trAccionesRelacionescentro_costoAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderBycentro_costo">
			<td id="tdOrderBycentro_costo">
				<form id="frmOrderBycentro_costo" name="frmOrderBycentro_costo">
					<div id="divOrderBycentro_costoAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
				<form id="frmOrderByRelcentro_costo" name="frmOrderByRelcentro_costo">
					<div id="divOrderByRelcentro_costoAjaxWebPart" title="RELACIONES" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderBycentro_costo -->
		</tr> <!-- trOrderBycentro_costo/super -->
			
		
		
		
		
		
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
			
				import {centro_costo_webcontrol,centro_costo_webcontrol1} from './webroot/js/JavaScript/contabilidad/contabilidad/centro_costo/js/webcontrol/centro_costo_webcontrol.js?random=1';
				
				centro_costo_webcontrol1.setcentro_costo_constante(window.centro_costo_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(centro_costo_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

