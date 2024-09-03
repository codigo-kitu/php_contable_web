<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\seguridad\parametro_general_usuario\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Parametro General Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/seguridad/parametro_general_usuario/util/parametro_general_usuario_carga.php');
	use com\bydan\contabilidad\seguridad\parametro_general_usuario\util\parametro_general_usuario_carga;
	
	//include_once('com/bydan/contabilidad/seguridad/parametro_general_usuario/presentation/view/parametro_general_usuario_web.php');
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\presentation\view\parametro_general_usuario_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	parametro_general_usuario_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	parametro_general_usuario_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$parametro_general_usuario_web1= new parametro_general_usuario_web();	
	$parametro_general_usuario_web1->cargarDatosGenerales();
	
	//$moduloActual=$parametro_general_usuario_web1->moduloActual;
	//$usuarioActual=$parametro_general_usuario_web1->usuarioActual;
	//$sessionBase=$parametro_general_usuario_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$parametro_general_usuario_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/seguridad/parametro_general_usuario/js/templating/parametro_general_usuario_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/seguridad/parametro_general_usuario/js/templating/parametro_general_usuario_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/seguridad/parametro_general_usuario/js/templating/parametro_general_usuario_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/seguridad/parametro_general_usuario/js/templating/parametro_general_usuario_datos_reporte_template.js'); ?>
		
			
						
		
		
		<?php 
			
		
			parametro_general_usuario_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					parametro_general_usuario_web::$GET_POST=$_GET;
				} else {
					parametro_general_usuario_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			parametro_general_usuario_web::$STR_NOMBRE_PAGINA = 'parametro_general_usuario_view.php';
			parametro_general_usuario_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			parametro_general_usuario_web::$BIT_ES_PAGINA_FORM = 'false';
				
			parametro_general_usuario_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {parametro_general_usuario_constante,parametro_general_usuario_constante1} from './webroot/js/JavaScript/contabilidad/seguridad/parametro_general_usuario/js/util/parametro_general_usuario_constante.js?random=1';
			import {parametro_general_usuario_funcion,parametro_general_usuario_funcion1} from './webroot/js/JavaScript/contabilidad/seguridad/parametro_general_usuario/js/util/parametro_general_usuario_funcion.js?random=1';
			
			let parametro_general_usuario_constante2 = new parametro_general_usuario_constante();
			
			parametro_general_usuario_constante2.STR_NOMBRE_PAGINA="<?php echo(parametro_general_usuario_web::$STR_NOMBRE_PAGINA); ?>";
			parametro_general_usuario_constante2.STR_TYPE_ON_LOADparametro_general_usuario="<?php echo(parametro_general_usuario_web::$STR_TYPE_ONLOAD); ?>";
			parametro_general_usuario_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(parametro_general_usuario_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			parametro_general_usuario_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(parametro_general_usuario_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			parametro_general_usuario_constante2.STR_ACTION="<?php echo(parametro_general_usuario_web::$STR_ACTION); ?>";
			parametro_general_usuario_constante2.STR_ES_POPUP="<?php echo(parametro_general_usuario_web::$STR_ES_POPUP); ?>";
			parametro_general_usuario_constante2.STR_ES_BUSQUEDA="<?php echo(parametro_general_usuario_web::$STR_ES_BUSQUEDA); ?>";
			parametro_general_usuario_constante2.STR_FUNCION_JS="<?php echo(parametro_general_usuario_web::$STR_FUNCION_JS); ?>";
			parametro_general_usuario_constante2.BIG_ID_ACTUAL="<?php echo(parametro_general_usuario_web::$BIG_ID_ACTUAL); ?>";
			parametro_general_usuario_constante2.BIG_ID_OPCION="<?php echo(parametro_general_usuario_web::$BIG_ID_OPCION); ?>";
			parametro_general_usuario_constante2.STR_OBJETO_JS="<?php echo(parametro_general_usuario_web::$STR_OBJETO_JS); ?>";
			parametro_general_usuario_constante2.STR_ES_RELACIONES="<?php echo(parametro_general_usuario_web::$STR_ES_RELACIONES); ?>";
			parametro_general_usuario_constante2.STR_ES_RELACIONADO="<?php echo(parametro_general_usuario_web::$STR_ES_RELACIONADO); ?>";
			parametro_general_usuario_constante2.STR_ES_SUB_PAGINA="<?php echo(parametro_general_usuario_web::$STR_ES_SUB_PAGINA); ?>";
			parametro_general_usuario_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(parametro_general_usuario_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			parametro_general_usuario_constante2.BIT_ES_PAGINA_FORM=<?php echo(parametro_general_usuario_web::$BIT_ES_PAGINA_FORM); ?>;
			parametro_general_usuario_constante2.STR_SUFIJO="<?php echo(parametro_general_usuario_web::$STR_SUF); ?>";//parametro_general_usuario
			parametro_general_usuario_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(parametro_general_usuario_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//parametro_general_usuario
			
			parametro_general_usuario_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(parametro_general_usuario_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			parametro_general_usuario_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($parametro_general_usuario_web1->moduloActual->getnombre()); ?>";
			parametro_general_usuario_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(parametro_general_usuario_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			parametro_general_usuario_constante2.BIT_ES_LOAD_NORMAL=true;
			/*parametro_general_usuario_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			parametro_general_usuario_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.parametro_general_usuario_constante2 = parametro_general_usuario_constante2;
			
		</script>
		
		<?php if(parametro_general_usuario_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.parametro_general_usuario_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.parametro_general_usuario_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="parametro_general_usuarioActual" ></a>
	
	<div id="divResumenparametro_general_usuarioActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(parametro_general_usuario_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(parametro_general_usuario_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(parametro_general_usuario_web::$STR_ES_BUSQUEDA=='false' && parametro_general_usuario_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(parametro_general_usuario_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(parametro_general_usuario_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(parametro_general_usuario_web::$STR_ES_RELACIONADO=='false' && parametro_general_usuario_web::$STR_ES_POPUP=='false' && parametro_general_usuario_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tdparametro_general_usuarioNuevoToolBar">
										<img id="imgNuevoToolBarparametro_general_usuario" name="imgNuevoToolBarparametro_general_usuario" title="Nuevo Parametro General" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(parametro_general_usuario_web::$STR_ES_BUSQUEDA=='false' && parametro_general_usuario_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdparametro_general_usuarioNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBarparametro_general_usuario" name="imgNuevoGuardarCambiosToolBarparametro_general_usuario" title="Nuevo TABLA Parametro General" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(parametro_general_usuario_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdparametro_general_usuarioGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBarparametro_general_usuario" name="imgGuardarCambiosToolBarparametro_general_usuario" title="Guardar Parametro General" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(parametro_general_usuario_web::$STR_ES_RELACIONADO=='false' && parametro_general_usuario_web::$STR_ES_RELACIONES=='false' && parametro_general_usuario_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdparametro_general_usuarioCopiarToolBar">
										<img id="imgCopiarToolBarparametro_general_usuario" name="imgCopiarToolBarparametro_general_usuario" title="Copiar Parametro General" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdparametro_general_usuarioDuplicarToolBar">
										<img id="imgDuplicarToolBarparametro_general_usuario" name="imgDuplicarToolBarparametro_general_usuario" title="Duplicar Parametro General" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(parametro_general_usuario_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdparametro_general_usuarioRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBarparametro_general_usuario" name="imgRecargarInformacionToolBarparametro_general_usuario" title="Recargar Parametro General" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdparametro_general_usuarioAnterioresToolBar">
										<img id="imgAnterioresToolBarparametro_general_usuario" name="imgAnterioresToolBarparametro_general_usuario" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdparametro_general_usuarioSiguientesToolBar">
										<img id="imgSiguientesToolBarparametro_general_usuario" name="imgSiguientesToolBarparametro_general_usuario" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdparametro_general_usuarioAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBarparametro_general_usuario" name="imgAbrirOrderByToolBarparametro_general_usuario" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((parametro_general_usuario_web::$STR_ES_RELACIONADO=='false' && parametro_general_usuario_web::$STR_ES_RELACIONES=='false') || parametro_general_usuario_web::$STR_ES_BUSQUEDA=='true'  || parametro_general_usuario_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdparametro_general_usuarioCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBarparametro_general_usuario" name="imgCerrarPaginaToolBarparametro_general_usuario" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trparametro_general_usuarioCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedaparametro_general_usuario" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedaparametro_general_usuario',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trparametro_general_usuarioCabeceraBusquedas/super -->

		<tr id="trBusquedaparametro_general_usuario" class="busqueda" style="display:table-row">
			<td id="tdBusquedaparametro_general_usuario" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedaparametro_general_usuario" name="frmBusquedaparametro_general_usuario">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedaparametro_general_usuario" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trparametro_general_usuarioBusquedas" class="busqueda" style="display:table-row"><td>
				<?php if(parametro_general_usuario_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 80%">
					<ul>
						<li id="listrVisibleFK_Idejercicio" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idejercicio"> Por  Ejercicio</a></li>
						<li id="listrVisibleFK_Idempresa" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idempresa"> Por  Empresa</a></li>
						<li id="listrVisibleFK_Idperiodo" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idperiodo"> Por  Periodo</a></li>
						<li id="listrVisibleFK_Idsucursal" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idsucursal"> Por  Sucursal</a></li>
						<li id="listrVisibleFK_Idtipo_fondo" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idtipo_fondo"> Por  Tipo Fondo</a></li>
						<li id="listrVisibleFK_Idusuarioid" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idusuarioid"> Por Id</a></li>
					</ul>
				
					<div id="divstrVisibleFK_Idejercicio">
					<table id="tblstrVisibleFK_Idejercicio" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo"> Ejercicio</span>
						</td>
						<td align="center">
							<select id="FK_Idejercicio-cmbid_ejercicio" name="FK_Idejercicio-cmbid_ejercicio" title=" Ejercicio" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarparametro_general_usuarioFK_Idejercicio" name="btnBuscarparametro_general_usuarioFK_Idejercicio" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idempresa">
					<table id="tblstrVisibleFK_Idempresa" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo"> Empresa</span>
						</td>
						<td align="center">
							<select id="FK_Idempresa-cmbid_empresa" name="FK_Idempresa-cmbid_empresa" title=" Empresa" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarparametro_general_usuarioFK_Idempresa" name="btnBuscarparametro_general_usuarioFK_Idempresa" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idperiodo">
					<table id="tblstrVisibleFK_Idperiodo" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo"> Periodo</span>
						</td>
						<td align="center">
							<select id="FK_Idperiodo-cmbid_periodo" name="FK_Idperiodo-cmbid_periodo" title=" Periodo" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarparametro_general_usuarioFK_Idperiodo" name="btnBuscarparametro_general_usuarioFK_Idperiodo" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idsucursal">
					<table id="tblstrVisibleFK_Idsucursal" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo"> Sucursal</span>
						</td>
						<td align="center">
							<select id="FK_Idsucursal-cmbid_sucursal" name="FK_Idsucursal-cmbid_sucursal" title=" Sucursal" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarparametro_general_usuarioFK_Idsucursal" name="btnBuscarparametro_general_usuarioFK_Idsucursal" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idtipo_fondo">
					<table id="tblstrVisibleFK_Idtipo_fondo" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo"> Tipo Fondo</span>
						</td>
						<td align="center">
							<select id="FK_Idtipo_fondo-cmbid_tipo_fondo" name="FK_Idtipo_fondo-cmbid_tipo_fondo" title=" Tipo Fondo" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarparametro_general_usuarioFK_Idtipo_fondo" name="btnBuscarparametro_general_usuarioFK_Idtipo_fondo" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
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
							<input type="button" id="btnBuscarparametro_general_usuarioFK_Idusuarioid" name="btnBuscarparametro_general_usuarioFK_Idusuarioid" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscarparametro_general_usuario" style="display:table-row">
					<td id="tdParamsBuscarparametro_general_usuario">
		<?php if(parametro_general_usuario_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscarparametro_general_usuario">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistrosparametro_general_usuario" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistrosparametro_general_usuario"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistrosparametro_general_usuario" name="ParamsBuscar-txtNumeroRegistrosparametro_general_usuario" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacionparametro_general_usuario">
							<td id="tdGenerarReporteparametro_general_usuario" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodosparametro_general_usuario" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodosparametro_general_usuario" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacionparametro_general_usuario" name="btnRecargarInformacionparametro_general_usuario" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginaparametro_general_usuario" name="btnImprimirPaginaparametro_general_usuario" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*parametro_general_usuario_web::$STR_ES_BUSQUEDA=='false'  &&*/ parametro_general_usuario_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderByparametro_general_usuario">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderByparametro_general_usuario" name="btnOrderByparametro_general_usuario" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
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

										<?php if(parametro_general_usuario_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdparametro_general_usuarioConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodosparametro_general_usuario -->

							</td><!-- tdGenerarReporteparametro_general_usuario -->
						</tr><!-- trRecargarInformacionparametro_general_usuario -->
					</table><!-- tblParamsBuscarNumeroRegistrosparametro_general_usuario -->
				</div> <!-- divParamsBuscarparametro_general_usuario -->
		<?php } ?>
				</td> <!-- tdParamsBuscarparametro_general_usuario -->
				</tr><!-- trParamsBuscarparametro_general_usuario -->
				</table> <!-- tblBusquedaparametro_general_usuario -->
				</form> <!-- frmBusquedaparametro_general_usuario -->
				

			</td> <!-- tdBusquedaparametro_general_usuario -->
		</tr> <!-- trBusquedaparametro_general_usuario/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(parametro_general_usuario_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divparametro_general_usuarioPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblparametro_general_usuarioPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmparametro_general_usuarioAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnparametro_general_usuarioAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="parametro_general_usuario_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnparametro_general_usuarioAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmparametro_general_usuarioAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblparametro_general_usuarioPopupAjaxWebPart -->
		</div> <!-- divparametro_general_usuarioPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(parametro_general_usuario_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trparametro_general_usuarioTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdaparametro_general_usuario"></a>
		<img id="imgTablaParaDerechaparametro_general_usuario" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechaparametro_general_usuario'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdaparametro_general_usuario" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdaparametro_general_usuario'"/>
		<a id="TablaDerechaparametro_general_usuario"></a>
	</td>
</tr> <!-- trparametro_general_usuarioTablaNavegacion/super -->
<?php } ?>

<tr id="trparametro_general_usuarioTablaDatos">
	<td colspan="3" id="htmlTableCellparametro_general_usuario">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatosparametro_general_usuariosAjaxWebPart">
		</div>
	</td>
</tr> <!-- trparametro_general_usuarioTablaDatos/super -->
		
		
		<tr id="trparametro_general_usuarioPaginacion" style="display:table-row">
			<td id="tdparametro_general_usuarioPaginacion" align="left">
				<div id="divparametro_general_usuarioPaginacionAjaxWebPart">
				<form id="frmPaginacionparametro_general_usuario" name="frmPaginacionparametro_general_usuario">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacionparametro_general_usuario" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:left">
					<tr style="display:none">
						<?php if(parametro_general_usuario_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkparametro_general_usuario" name="btnSeleccionarLoteFkparametro_general_usuario" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(parametro_general_usuario_web::$STR_ES_RELACIONADO=='false' /*&& parametro_general_usuario_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnterioresparametro_general_usuario" name="btnAnterioresparametro_general_usuario" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(parametro_general_usuario_web::$STR_ES_BUSQUEDA=='false' && parametro_general_usuario_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdparametro_general_usuarioNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPrepararparametro_general_usuario" name="btnNuevoTablaPrepararparametro_general_usuario" title="NUEVO Parametro General" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablaparametro_general_usuario" name="ParamsPaginar-txtNumeroNuevoTablaparametro_general_usuario" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(parametro_general_usuario_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdparametro_general_usuarioConEditarparametro_general_usuario">
							<label>
								<input id="ParamsBuscar-chbConEditarparametro_general_usuario" name="ParamsBuscar-chbConEditarparametro_general_usuario" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(parametro_general_usuario_web::$STR_ES_RELACIONADO=='false'/* && parametro_general_usuario_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientesparametro_general_usuario" name="btnSiguientesparametro_general_usuario" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacionparametro_general_usuario -->
				</form> <!-- frmPaginacionparametro_general_usuario -->
				<form id="frmNuevoPrepararparametro_general_usuario" name="frmNuevoPrepararparametro_general_usuario">
				<table id="tblNuevoPrepararparametro_general_usuario" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:left">
					<tr id="trparametro_general_usuarioNuevo" height="10">
						<?php if(parametro_general_usuario_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdparametro_general_usuarioNuevo" align="center">
							<input type="button" id="btnNuevoPrepararparametro_general_usuario" name="btnNuevoPrepararparametro_general_usuario" title="NUEVO Parametro General" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdparametro_general_usuarioGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambiosparametro_general_usuario" name="btnGuardarCambiosparametro_general_usuario" title="GUARDAR Parametro General" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(parametro_general_usuario_web::$STR_ES_RELACIONADO=='false' && parametro_general_usuario_web::$STR_ES_RELACIONES=='false' && parametro_general_usuario_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdparametro_general_usuarioDuplicar" align="center">
							<input type="button" id="btnDuplicarparametro_general_usuario" name="btnDuplicarparametro_general_usuario" title="DUPLICAR Parametro General" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdparametro_general_usuarioCopiar" align="center">
							<input type="button" id="btnCopiarparametro_general_usuario" name="btnCopiarparametro_general_usuario" title="COPIAR Parametro General" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(parametro_general_usuario_web::$STR_ES_RELACIONADO=='false' && ((parametro_general_usuario_web::$STR_ES_RELACIONADO=='false' && parametro_general_usuario_web::$STR_ES_RELACIONES=='false') || parametro_general_usuario_web::$STR_ES_BUSQUEDA=='true'  || parametro_general_usuario_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdparametro_general_usuarioCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginaparametro_general_usuario" name="btnCerrarPaginaparametro_general_usuario" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPrepararparametro_general_usuario -->
				</form> <!-- frmNuevoPrepararparametro_general_usuario -->
				</div> <!-- divparametro_general_usuarioPaginacionAjaxWebPart -->
			</td> <!-- tdparametro_general_usuarioPaginacion -->
		</tr> <!-- trparametro_general_usuarioPaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(parametro_general_usuario_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionesparametro_general_usuarioAjaxWebPart">
			<td id="tdAccionesRelacionesparametro_general_usuarioAjaxWebPart">
				<div id="divAccionesRelacionesparametro_general_usuarioAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionesparametro_general_usuarioAjaxWebPart -->
		</tr> <!-- trAccionesRelacionesparametro_general_usuarioAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderByparametro_general_usuario">
			<td id="tdOrderByparametro_general_usuario">
				<form id="frmOrderByparametro_general_usuario" name="frmOrderByparametro_general_usuario">
					<div id="divOrderByparametro_general_usuarioAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderByparametro_general_usuario -->
		</tr> <!-- trOrderByparametro_general_usuario/super -->
			
		
		
		
		
		
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
			
				import {parametro_general_usuario_webcontrol,parametro_general_usuario_webcontrol1} from './webroot/js/JavaScript/contabilidad/seguridad/parametro_general_usuario/js/webcontrol/parametro_general_usuario_webcontrol.js?random=1';
				
				parametro_general_usuario_webcontrol1.setparametro_general_usuario_constante(window.parametro_general_usuario_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(parametro_general_usuario_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

