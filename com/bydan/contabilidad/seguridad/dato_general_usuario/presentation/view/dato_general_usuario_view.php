<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\seguridad\dato_general_usuario\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Dato General Usuario Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/seguridad/dato_general_usuario/util/dato_general_usuario_carga.php');
	use com\bydan\contabilidad\seguridad\dato_general_usuario\util\dato_general_usuario_carga;
	
	//include_once('com/bydan/contabilidad/seguridad/dato_general_usuario/presentation/view/dato_general_usuario_web.php');
	//use com\bydan\contabilidad\seguridad\dato_general_usuario\presentation\view\dato_general_usuario_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	dato_general_usuario_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	dato_general_usuario_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$dato_general_usuario_web1= new dato_general_usuario_web();	
	$dato_general_usuario_web1->cargarDatosGenerales();
	
	//$moduloActual=$dato_general_usuario_web1->moduloActual;
	//$usuarioActual=$dato_general_usuario_web1->usuarioActual;
	//$sessionBase=$dato_general_usuario_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$dato_general_usuario_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/seguridad/dato_general_usuario/js/templating/dato_general_usuario_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/seguridad/dato_general_usuario/js/templating/dato_general_usuario_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/seguridad/dato_general_usuario/js/templating/dato_general_usuario_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/seguridad/dato_general_usuario/js/templating/dato_general_usuario_datos_reporte_template.js'); ?>
		
			
						
		
		
		<?php 
			
		
			dato_general_usuario_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					dato_general_usuario_web::$GET_POST=$_GET;
				} else {
					dato_general_usuario_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			dato_general_usuario_web::$STR_NOMBRE_PAGINA = 'dato_general_usuario_view.php';
			dato_general_usuario_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			dato_general_usuario_web::$BIT_ES_PAGINA_FORM = 'false';
				
			dato_general_usuario_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {dato_general_usuario_constante,dato_general_usuario_constante1} from './webroot/js/JavaScript/contabilidad/seguridad/dato_general_usuario/js/util/dato_general_usuario_constante.js?random=1';
			import {dato_general_usuario_funcion,dato_general_usuario_funcion1} from './webroot/js/JavaScript/contabilidad/seguridad/dato_general_usuario/js/util/dato_general_usuario_funcion.js?random=1';
			
			let dato_general_usuario_constante2 = new dato_general_usuario_constante();
			
			dato_general_usuario_constante2.STR_NOMBRE_PAGINA="<?php echo(dato_general_usuario_web::$STR_NOMBRE_PAGINA); ?>";
			dato_general_usuario_constante2.STR_TYPE_ON_LOADdato_general_usuario="<?php echo(dato_general_usuario_web::$STR_TYPE_ONLOAD); ?>";
			dato_general_usuario_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(dato_general_usuario_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			dato_general_usuario_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(dato_general_usuario_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			dato_general_usuario_constante2.STR_ACTION="<?php echo(dato_general_usuario_web::$STR_ACTION); ?>";
			dato_general_usuario_constante2.STR_ES_POPUP="<?php echo(dato_general_usuario_web::$STR_ES_POPUP); ?>";
			dato_general_usuario_constante2.STR_ES_BUSQUEDA="<?php echo(dato_general_usuario_web::$STR_ES_BUSQUEDA); ?>";
			dato_general_usuario_constante2.STR_FUNCION_JS="<?php echo(dato_general_usuario_web::$STR_FUNCION_JS); ?>";
			dato_general_usuario_constante2.BIG_ID_ACTUAL="<?php echo(dato_general_usuario_web::$BIG_ID_ACTUAL); ?>";
			dato_general_usuario_constante2.BIG_ID_OPCION="<?php echo(dato_general_usuario_web::$BIG_ID_OPCION); ?>";
			dato_general_usuario_constante2.STR_OBJETO_JS="<?php echo(dato_general_usuario_web::$STR_OBJETO_JS); ?>";
			dato_general_usuario_constante2.STR_ES_RELACIONES="<?php echo(dato_general_usuario_web::$STR_ES_RELACIONES); ?>";
			dato_general_usuario_constante2.STR_ES_RELACIONADO="<?php echo(dato_general_usuario_web::$STR_ES_RELACIONADO); ?>";
			dato_general_usuario_constante2.STR_ES_SUB_PAGINA="<?php echo(dato_general_usuario_web::$STR_ES_SUB_PAGINA); ?>";
			dato_general_usuario_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(dato_general_usuario_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			dato_general_usuario_constante2.BIT_ES_PAGINA_FORM=<?php echo(dato_general_usuario_web::$BIT_ES_PAGINA_FORM); ?>;
			dato_general_usuario_constante2.STR_SUFIJO="<?php echo(dato_general_usuario_web::$STR_SUF); ?>";//dato_general_usuario
			dato_general_usuario_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(dato_general_usuario_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//dato_general_usuario
			
			dato_general_usuario_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(dato_general_usuario_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			dato_general_usuario_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($dato_general_usuario_web1->moduloActual->getnombre()); ?>";
			dato_general_usuario_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(dato_general_usuario_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			dato_general_usuario_constante2.BIT_ES_LOAD_NORMAL=true;
			/*dato_general_usuario_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			dato_general_usuario_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.dato_general_usuario_constante2 = dato_general_usuario_constante2;
			
		</script>
		
		<?php if(dato_general_usuario_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.dato_general_usuario_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.dato_general_usuario_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="dato_general_usuarioActual" ></a>
	
	<div id="divResumendato_general_usuarioActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(dato_general_usuario_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(dato_general_usuario_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(dato_general_usuario_web::$STR_ES_BUSQUEDA=='false' && dato_general_usuario_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(dato_general_usuario_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(dato_general_usuario_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(dato_general_usuario_web::$STR_ES_RELACIONADO=='false' && dato_general_usuario_web::$STR_ES_POPUP=='false' && dato_general_usuario_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tddato_general_usuarioNuevoToolBar">
										<img id="imgNuevoToolBardato_general_usuario" name="imgNuevoToolBardato_general_usuario" title="Nuevo Dato General Usuario" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(dato_general_usuario_web::$STR_ES_BUSQUEDA=='false' && dato_general_usuario_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tddato_general_usuarioNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBardato_general_usuario" name="imgNuevoGuardarCambiosToolBardato_general_usuario" title="Nuevo TABLA Dato General Usuario" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(dato_general_usuario_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tddato_general_usuarioGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBardato_general_usuario" name="imgGuardarCambiosToolBardato_general_usuario" title="Guardar Dato General Usuario" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(dato_general_usuario_web::$STR_ES_RELACIONADO=='false' && dato_general_usuario_web::$STR_ES_RELACIONES=='false' && dato_general_usuario_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tddato_general_usuarioCopiarToolBar">
										<img id="imgCopiarToolBardato_general_usuario" name="imgCopiarToolBardato_general_usuario" title="Copiar Dato General Usuario" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tddato_general_usuarioDuplicarToolBar">
										<img id="imgDuplicarToolBardato_general_usuario" name="imgDuplicarToolBardato_general_usuario" title="Duplicar Dato General Usuario" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(dato_general_usuario_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tddato_general_usuarioRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBardato_general_usuario" name="imgRecargarInformacionToolBardato_general_usuario" title="Recargar Dato General Usuario" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tddato_general_usuarioAnterioresToolBar">
										<img id="imgAnterioresToolBardato_general_usuario" name="imgAnterioresToolBardato_general_usuario" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tddato_general_usuarioSiguientesToolBar">
										<img id="imgSiguientesToolBardato_general_usuario" name="imgSiguientesToolBardato_general_usuario" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tddato_general_usuarioAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBardato_general_usuario" name="imgAbrirOrderByToolBardato_general_usuario" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((dato_general_usuario_web::$STR_ES_RELACIONADO=='false' && dato_general_usuario_web::$STR_ES_RELACIONES=='false') || dato_general_usuario_web::$STR_ES_BUSQUEDA=='true'  || dato_general_usuario_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tddato_general_usuarioCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBardato_general_usuario" name="imgCerrarPaginaToolBardato_general_usuario" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trdato_general_usuarioCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedadato_general_usuario" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedadato_general_usuario',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trdato_general_usuarioCabeceraBusquedas/super -->

		<tr id="trBusquedadato_general_usuario" class="busqueda" style="display:table-row">
			<td id="tdBusquedadato_general_usuario" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedadato_general_usuario" name="frmBusquedadato_general_usuario">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedadato_general_usuario" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trdato_general_usuarioBusquedas" class="busqueda" style="display:table-row"><td>
				<?php if(dato_general_usuario_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 80%">
					<ul>
						<li id="listrVisibleFK_Idciudad" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idciudad"> Por Ciudad</a></li>
						<li id="listrVisibleFK_Idpais" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idpais"> Por Pais</a></li>
						<li id="listrVisibleFK_Idprovincia" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idprovincia"> Por Provincia</a></li>
						<li id="listrVisibleFK_Idusuarioid" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idusuarioid"> Por Id</a></li>
					</ul>
				
					<div id="divstrVisibleFK_Idciudad">
					<table id="tblstrVisibleFK_Idciudad" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Ciudad</span>
						</td>
						<td align="center">
							<select id="FK_Idciudad-cmbid_ciudad" name="FK_Idciudad-cmbid_ciudad" title="Ciudad" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscardato_general_usuarioFK_Idciudad" name="btnBuscardato_general_usuarioFK_Idciudad" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idpais">
					<table id="tblstrVisibleFK_Idpais" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Pais</span>
						</td>
						<td align="center">
							<select id="FK_Idpais-cmbid_pais" name="FK_Idpais-cmbid_pais" title="Pais" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscardato_general_usuarioFK_Idpais" name="btnBuscardato_general_usuarioFK_Idpais" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idprovincia">
					<table id="tblstrVisibleFK_Idprovincia" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Provincia</span>
						</td>
						<td align="center">
							<select id="FK_Idprovincia-cmbid_provincia" name="FK_Idprovincia-cmbid_provincia" title="Provincia" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscardato_general_usuarioFK_Idprovincia" name="btnBuscardato_general_usuarioFK_Idprovincia" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idusuarioid">
					<table id="tblstrVisibleFK_Idusuarioid" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Id</span>
						</td>
						<td align="center">
							<select id="FK_Idusuarioid-cmbid" name="FK_Idusuarioid-cmbid" title="Id" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscardato_general_usuarioFK_Idusuarioid" name="btnBuscardato_general_usuarioFK_Idusuarioid" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscardato_general_usuario" style="display:table-row">
					<td id="tdParamsBuscardato_general_usuario">
		<?php if(dato_general_usuario_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscardato_general_usuario">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistrosdato_general_usuario" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistrosdato_general_usuario"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistrosdato_general_usuario" name="ParamsBuscar-txtNumeroRegistrosdato_general_usuario" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformaciondato_general_usuario">
							<td id="tdGenerarReportedato_general_usuario" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodosdato_general_usuario" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodosdato_general_usuario" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformaciondato_general_usuario" name="btnRecargarInformaciondato_general_usuario" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginadato_general_usuario" name="btnImprimirPaginadato_general_usuario" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*dato_general_usuario_web::$STR_ES_BUSQUEDA=='false'  &&*/ dato_general_usuario_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderBydato_general_usuario">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderBydato_general_usuario" name="btnOrderBydato_general_usuario" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
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

										<?php if(dato_general_usuario_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tddato_general_usuarioConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodosdato_general_usuario -->

							</td><!-- tdGenerarReportedato_general_usuario -->
						</tr><!-- trRecargarInformaciondato_general_usuario -->
					</table><!-- tblParamsBuscarNumeroRegistrosdato_general_usuario -->
				</div> <!-- divParamsBuscardato_general_usuario -->
		<?php } ?>
				</td> <!-- tdParamsBuscardato_general_usuario -->
				</tr><!-- trParamsBuscardato_general_usuario -->
				</table> <!-- tblBusquedadato_general_usuario -->
				</form> <!-- frmBusquedadato_general_usuario -->
				

			</td> <!-- tdBusquedadato_general_usuario -->
		</tr> <!-- trBusquedadato_general_usuario/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(dato_general_usuario_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divdato_general_usuarioPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tbldato_general_usuarioPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmdato_general_usuarioAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btndato_general_usuarioAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="dato_general_usuario_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btndato_general_usuarioAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmdato_general_usuarioAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tbldato_general_usuarioPopupAjaxWebPart -->
		</div> <!-- divdato_general_usuarioPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(dato_general_usuario_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trdato_general_usuarioTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdadato_general_usuario"></a>
		<img id="imgTablaParaDerechadato_general_usuario" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechadato_general_usuario'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdadato_general_usuario" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdadato_general_usuario'"/>
		<a id="TablaDerechadato_general_usuario"></a>
	</td>
</tr> <!-- trdato_general_usuarioTablaNavegacion/super -->
<?php } ?>

<tr id="trdato_general_usuarioTablaDatos">
	<td colspan="3" id="htmlTableCelldato_general_usuario">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatosdato_general_usuariosAjaxWebPart">
		</div>
	</td>
</tr> <!-- trdato_general_usuarioTablaDatos/super -->
		
		
		<tr id="trdato_general_usuarioPaginacion" style="display:table-row">
			<td id="tddato_general_usuarioPaginacion" align="left">
				<div id="divdato_general_usuarioPaginacionAjaxWebPart">
				<form id="frmPaginaciondato_general_usuario" name="frmPaginaciondato_general_usuario">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginaciondato_general_usuario" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:left">
					<tr style="display:none">
						<?php if(dato_general_usuario_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkdato_general_usuario" name="btnSeleccionarLoteFkdato_general_usuario" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(dato_general_usuario_web::$STR_ES_RELACIONADO=='false' /*&& dato_general_usuario_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnterioresdato_general_usuario" name="btnAnterioresdato_general_usuario" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(dato_general_usuario_web::$STR_ES_BUSQUEDA=='false' && dato_general_usuario_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tddato_general_usuarioNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPreparardato_general_usuario" name="btnNuevoTablaPreparardato_general_usuario" title="NUEVO Dato General Usuario" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTabladato_general_usuario" name="ParamsPaginar-txtNumeroNuevoTabladato_general_usuario" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(dato_general_usuario_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tddato_general_usuarioConEditardato_general_usuario">
							<label>
								<input id="ParamsBuscar-chbConEditardato_general_usuario" name="ParamsBuscar-chbConEditardato_general_usuario" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(dato_general_usuario_web::$STR_ES_RELACIONADO=='false'/* && dato_general_usuario_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientesdato_general_usuario" name="btnSiguientesdato_general_usuario" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginaciondato_general_usuario -->
				</form> <!-- frmPaginaciondato_general_usuario -->
				<form id="frmNuevoPreparardato_general_usuario" name="frmNuevoPreparardato_general_usuario">
				<table id="tblNuevoPreparardato_general_usuario" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:left">
					<tr id="trdato_general_usuarioNuevo" height="10">
						<?php if(dato_general_usuario_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tddato_general_usuarioNuevo" align="center">
							<input type="button" id="btnNuevoPreparardato_general_usuario" name="btnNuevoPreparardato_general_usuario" title="NUEVO Dato General Usuario" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tddato_general_usuarioGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambiosdato_general_usuario" name="btnGuardarCambiosdato_general_usuario" title="GUARDAR Dato General Usuario" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(dato_general_usuario_web::$STR_ES_RELACIONADO=='false' && dato_general_usuario_web::$STR_ES_RELACIONES=='false' && dato_general_usuario_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tddato_general_usuarioDuplicar" align="center">
							<input type="button" id="btnDuplicardato_general_usuario" name="btnDuplicardato_general_usuario" title="DUPLICAR Dato General Usuario" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tddato_general_usuarioCopiar" align="center">
							<input type="button" id="btnCopiardato_general_usuario" name="btnCopiardato_general_usuario" title="COPIAR Dato General Usuario" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(dato_general_usuario_web::$STR_ES_RELACIONADO=='false' && ((dato_general_usuario_web::$STR_ES_RELACIONADO=='false' && dato_general_usuario_web::$STR_ES_RELACIONES=='false') || dato_general_usuario_web::$STR_ES_BUSQUEDA=='true'  || dato_general_usuario_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tddato_general_usuarioCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginadato_general_usuario" name="btnCerrarPaginadato_general_usuario" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPreparardato_general_usuario -->
				</form> <!-- frmNuevoPreparardato_general_usuario -->
				</div> <!-- divdato_general_usuarioPaginacionAjaxWebPart -->
			</td> <!-- tddato_general_usuarioPaginacion -->
		</tr> <!-- trdato_general_usuarioPaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(dato_general_usuario_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionesdato_general_usuarioAjaxWebPart">
			<td id="tdAccionesRelacionesdato_general_usuarioAjaxWebPart">
				<div id="divAccionesRelacionesdato_general_usuarioAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionesdato_general_usuarioAjaxWebPart -->
		</tr> <!-- trAccionesRelacionesdato_general_usuarioAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderBydato_general_usuario">
			<td id="tdOrderBydato_general_usuario">
				<form id="frmOrderBydato_general_usuario" name="frmOrderBydato_general_usuario">
					<div id="divOrderBydato_general_usuarioAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderBydato_general_usuario -->
		</tr> <!-- trOrderBydato_general_usuario/super -->
			
		
		
		
		
		
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
			
				import {dato_general_usuario_webcontrol,dato_general_usuario_webcontrol1} from './webroot/js/JavaScript/contabilidad/seguridad/dato_general_usuario/js/webcontrol/dato_general_usuario_webcontrol.js?random=1';
				
				dato_general_usuario_webcontrol1.setdato_general_usuario_constante(window.dato_general_usuario_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(dato_general_usuario_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

