<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\general\parametro_auxiliar_facturacion\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Parametro AuxiliarNOUSO Facturacion Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/general/parametro_auxiliar_facturacion/util/parametro_auxiliar_facturacion_carga.php');
	use com\bydan\contabilidad\general\parametro_auxiliar_facturacion\util\parametro_auxiliar_facturacion_carga;
	
	//include_once('com/bydan/contabilidad/general/parametro_auxiliar_facturacion/presentation/view/parametro_auxiliar_facturacion_web.php');
	//use com\bydan\contabilidad\general\parametro_auxiliar_facturacion\presentation\view\parametro_auxiliar_facturacion_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	parametro_auxiliar_facturacion_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	parametro_auxiliar_facturacion_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$parametro_auxiliar_facturacion_web1= new parametro_auxiliar_facturacion_web();	
	$parametro_auxiliar_facturacion_web1->cargarDatosGenerales();
	
	//$moduloActual=$parametro_auxiliar_facturacion_web1->moduloActual;
	//$usuarioActual=$parametro_auxiliar_facturacion_web1->usuarioActual;
	//$sessionBase=$parametro_auxiliar_facturacion_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$parametro_auxiliar_facturacion_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/general/parametro_auxiliar_facturacion/js/templating/parametro_auxiliar_facturacion_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/general/parametro_auxiliar_facturacion/js/templating/parametro_auxiliar_facturacion_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/general/parametro_auxiliar_facturacion/js/templating/parametro_auxiliar_facturacion_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/general/parametro_auxiliar_facturacion/js/templating/parametro_auxiliar_facturacion_datos_reporte_template.js'); ?>
		
			
						
		
		
		<?php 
			
		
			parametro_auxiliar_facturacion_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					parametro_auxiliar_facturacion_web::$GET_POST=$_GET;
				} else {
					parametro_auxiliar_facturacion_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			parametro_auxiliar_facturacion_web::$STR_NOMBRE_PAGINA = 'parametro_auxiliar_facturacion_view.php';
			parametro_auxiliar_facturacion_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			parametro_auxiliar_facturacion_web::$BIT_ES_PAGINA_FORM = 'false';
				
			parametro_auxiliar_facturacion_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {parametro_auxiliar_facturacion_constante,parametro_auxiliar_facturacion_constante1} from './webroot/js/JavaScript/contabilidad/general/parametro_auxiliar_facturacion/js/util/parametro_auxiliar_facturacion_constante.js?random=1';
			import {parametro_auxiliar_facturacion_funcion,parametro_auxiliar_facturacion_funcion1} from './webroot/js/JavaScript/contabilidad/general/parametro_auxiliar_facturacion/js/util/parametro_auxiliar_facturacion_funcion.js?random=1';
			
			let parametro_auxiliar_facturacion_constante2 = new parametro_auxiliar_facturacion_constante();
			
			parametro_auxiliar_facturacion_constante2.STR_NOMBRE_PAGINA="<?php echo(parametro_auxiliar_facturacion_web::$STR_NOMBRE_PAGINA); ?>";
			parametro_auxiliar_facturacion_constante2.STR_TYPE_ON_LOADparametro_auxiliar_facturacion="<?php echo(parametro_auxiliar_facturacion_web::$STR_TYPE_ONLOAD); ?>";
			parametro_auxiliar_facturacion_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(parametro_auxiliar_facturacion_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			parametro_auxiliar_facturacion_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(parametro_auxiliar_facturacion_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			parametro_auxiliar_facturacion_constante2.STR_ACTION="<?php echo(parametro_auxiliar_facturacion_web::$STR_ACTION); ?>";
			parametro_auxiliar_facturacion_constante2.STR_ES_POPUP="<?php echo(parametro_auxiliar_facturacion_web::$STR_ES_POPUP); ?>";
			parametro_auxiliar_facturacion_constante2.STR_ES_BUSQUEDA="<?php echo(parametro_auxiliar_facturacion_web::$STR_ES_BUSQUEDA); ?>";
			parametro_auxiliar_facturacion_constante2.STR_FUNCION_JS="<?php echo(parametro_auxiliar_facturacion_web::$STR_FUNCION_JS); ?>";
			parametro_auxiliar_facturacion_constante2.BIG_ID_ACTUAL="<?php echo(parametro_auxiliar_facturacion_web::$BIG_ID_ACTUAL); ?>";
			parametro_auxiliar_facturacion_constante2.BIG_ID_OPCION="<?php echo(parametro_auxiliar_facturacion_web::$BIG_ID_OPCION); ?>";
			parametro_auxiliar_facturacion_constante2.STR_OBJETO_JS="<?php echo(parametro_auxiliar_facturacion_web::$STR_OBJETO_JS); ?>";
			parametro_auxiliar_facturacion_constante2.STR_ES_RELACIONES="<?php echo(parametro_auxiliar_facturacion_web::$STR_ES_RELACIONES); ?>";
			parametro_auxiliar_facturacion_constante2.STR_ES_RELACIONADO="<?php echo(parametro_auxiliar_facturacion_web::$STR_ES_RELACIONADO); ?>";
			parametro_auxiliar_facturacion_constante2.STR_ES_SUB_PAGINA="<?php echo(parametro_auxiliar_facturacion_web::$STR_ES_SUB_PAGINA); ?>";
			parametro_auxiliar_facturacion_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(parametro_auxiliar_facturacion_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			parametro_auxiliar_facturacion_constante2.BIT_ES_PAGINA_FORM=<?php echo(parametro_auxiliar_facturacion_web::$BIT_ES_PAGINA_FORM); ?>;
			parametro_auxiliar_facturacion_constante2.STR_SUFIJO="<?php echo(parametro_auxiliar_facturacion_web::$STR_SUF); ?>";//parametro_auxiliar_facturacion
			parametro_auxiliar_facturacion_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(parametro_auxiliar_facturacion_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//parametro_auxiliar_facturacion
			
			parametro_auxiliar_facturacion_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(parametro_auxiliar_facturacion_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			parametro_auxiliar_facturacion_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($parametro_auxiliar_facturacion_web1->moduloActual->getnombre()); ?>";
			parametro_auxiliar_facturacion_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(parametro_auxiliar_facturacion_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			parametro_auxiliar_facturacion_constante2.BIT_ES_LOAD_NORMAL=true;
			/*parametro_auxiliar_facturacion_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			parametro_auxiliar_facturacion_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.parametro_auxiliar_facturacion_constante2 = parametro_auxiliar_facturacion_constante2;
			
		</script>
		
		<?php if(parametro_auxiliar_facturacion_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.parametro_auxiliar_facturacion_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.parametro_auxiliar_facturacion_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="parametro_auxiliar_facturacionActual" ></a>
	
	<div id="divResumenparametro_auxiliar_facturacionActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(parametro_auxiliar_facturacion_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(parametro_auxiliar_facturacion_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(parametro_auxiliar_facturacion_web::$STR_ES_BUSQUEDA=='false' && parametro_auxiliar_facturacion_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(parametro_auxiliar_facturacion_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(parametro_auxiliar_facturacion_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(parametro_auxiliar_facturacion_web::$STR_ES_RELACIONADO=='false' && parametro_auxiliar_facturacion_web::$STR_ES_POPUP=='false' && parametro_auxiliar_facturacion_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tdparametro_auxiliar_facturacionNuevoToolBar">
										<img id="imgNuevoToolBarparametro_auxiliar_facturacion" name="imgNuevoToolBarparametro_auxiliar_facturacion" title="Nuevo Parametro AuxiliarNOUSO Facturacion" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(parametro_auxiliar_facturacion_web::$STR_ES_BUSQUEDA=='false' && parametro_auxiliar_facturacion_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdparametro_auxiliar_facturacionNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBarparametro_auxiliar_facturacion" name="imgNuevoGuardarCambiosToolBarparametro_auxiliar_facturacion" title="Nuevo TABLA Parametro AuxiliarNOUSO Facturacion" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(parametro_auxiliar_facturacion_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdparametro_auxiliar_facturacionGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBarparametro_auxiliar_facturacion" name="imgGuardarCambiosToolBarparametro_auxiliar_facturacion" title="Guardar Parametro AuxiliarNOUSO Facturacion" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(parametro_auxiliar_facturacion_web::$STR_ES_RELACIONADO=='false' && parametro_auxiliar_facturacion_web::$STR_ES_RELACIONES=='false' && parametro_auxiliar_facturacion_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdparametro_auxiliar_facturacionCopiarToolBar">
										<img id="imgCopiarToolBarparametro_auxiliar_facturacion" name="imgCopiarToolBarparametro_auxiliar_facturacion" title="Copiar Parametro AuxiliarNOUSO Facturacion" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdparametro_auxiliar_facturacionDuplicarToolBar">
										<img id="imgDuplicarToolBarparametro_auxiliar_facturacion" name="imgDuplicarToolBarparametro_auxiliar_facturacion" title="Duplicar Parametro AuxiliarNOUSO Facturacion" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(parametro_auxiliar_facturacion_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdparametro_auxiliar_facturacionRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBarparametro_auxiliar_facturacion" name="imgRecargarInformacionToolBarparametro_auxiliar_facturacion" title="Recargar Parametro AuxiliarNOUSO Facturacion" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdparametro_auxiliar_facturacionAnterioresToolBar">
										<img id="imgAnterioresToolBarparametro_auxiliar_facturacion" name="imgAnterioresToolBarparametro_auxiliar_facturacion" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdparametro_auxiliar_facturacionSiguientesToolBar">
										<img id="imgSiguientesToolBarparametro_auxiliar_facturacion" name="imgSiguientesToolBarparametro_auxiliar_facturacion" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdparametro_auxiliar_facturacionAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBarparametro_auxiliar_facturacion" name="imgAbrirOrderByToolBarparametro_auxiliar_facturacion" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((parametro_auxiliar_facturacion_web::$STR_ES_RELACIONADO=='false' && parametro_auxiliar_facturacion_web::$STR_ES_RELACIONES=='false') || parametro_auxiliar_facturacion_web::$STR_ES_BUSQUEDA=='true'  || parametro_auxiliar_facturacion_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdparametro_auxiliar_facturacionCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBarparametro_auxiliar_facturacion" name="imgCerrarPaginaToolBarparametro_auxiliar_facturacion" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trparametro_auxiliar_facturacionCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedaparametro_auxiliar_facturacion" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedaparametro_auxiliar_facturacion',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trparametro_auxiliar_facturacionCabeceraBusquedas/super -->

		<tr id="trBusquedaparametro_auxiliar_facturacion" class="busqueda" style="display:table-row">
			<td id="tdBusquedaparametro_auxiliar_facturacion" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedaparametro_auxiliar_facturacion" name="frmBusquedaparametro_auxiliar_facturacion">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedaparametro_auxiliar_facturacion" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trparametro_auxiliar_facturacionBusquedas" class="busqueda" style="display:none"><td>
				<?php if(parametro_auxiliar_facturacion_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 70%">
				
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscarparametro_auxiliar_facturacion" style="display:table-row">
					<td id="tdParamsBuscarparametro_auxiliar_facturacion">
		<?php if(parametro_auxiliar_facturacion_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscarparametro_auxiliar_facturacion">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistrosparametro_auxiliar_facturacion" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistrosparametro_auxiliar_facturacion"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistrosparametro_auxiliar_facturacion" name="ParamsBuscar-txtNumeroRegistrosparametro_auxiliar_facturacion" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacionparametro_auxiliar_facturacion">
							<td id="tdGenerarReporteparametro_auxiliar_facturacion" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodosparametro_auxiliar_facturacion" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodosparametro_auxiliar_facturacion" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacionparametro_auxiliar_facturacion" name="btnRecargarInformacionparametro_auxiliar_facturacion" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginaparametro_auxiliar_facturacion" name="btnImprimirPaginaparametro_auxiliar_facturacion" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*parametro_auxiliar_facturacion_web::$STR_ES_BUSQUEDA=='false'  &&*/ parametro_auxiliar_facturacion_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderByparametro_auxiliar_facturacion">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderByparametro_auxiliar_facturacion" name="btnOrderByparametro_auxiliar_facturacion" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
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

										<?php if(parametro_auxiliar_facturacion_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdparametro_auxiliar_facturacionConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodosparametro_auxiliar_facturacion -->

							</td><!-- tdGenerarReporteparametro_auxiliar_facturacion -->
						</tr><!-- trRecargarInformacionparametro_auxiliar_facturacion -->
					</table><!-- tblParamsBuscarNumeroRegistrosparametro_auxiliar_facturacion -->
				</div> <!-- divParamsBuscarparametro_auxiliar_facturacion -->
		<?php } ?>
				</td> <!-- tdParamsBuscarparametro_auxiliar_facturacion -->
				</tr><!-- trParamsBuscarparametro_auxiliar_facturacion -->
				</table> <!-- tblBusquedaparametro_auxiliar_facturacion -->
				</form> <!-- frmBusquedaparametro_auxiliar_facturacion -->
				

			</td> <!-- tdBusquedaparametro_auxiliar_facturacion -->
		</tr> <!-- trBusquedaparametro_auxiliar_facturacion/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(parametro_auxiliar_facturacion_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divparametro_auxiliar_facturacionPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblparametro_auxiliar_facturacionPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmparametro_auxiliar_facturacionAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnparametro_auxiliar_facturacionAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="parametro_auxiliar_facturacion_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnparametro_auxiliar_facturacionAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmparametro_auxiliar_facturacionAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblparametro_auxiliar_facturacionPopupAjaxWebPart -->
		</div> <!-- divparametro_auxiliar_facturacionPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(parametro_auxiliar_facturacion_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trparametro_auxiliar_facturacionTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdaparametro_auxiliar_facturacion"></a>
		<img id="imgTablaParaDerechaparametro_auxiliar_facturacion" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechaparametro_auxiliar_facturacion'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdaparametro_auxiliar_facturacion" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdaparametro_auxiliar_facturacion'"/>
		<a id="TablaDerechaparametro_auxiliar_facturacion"></a>
	</td>
</tr> <!-- trparametro_auxiliar_facturacionTablaNavegacion/super -->
<?php } ?>

<tr id="trparametro_auxiliar_facturacionTablaDatos">
	<td colspan="3" id="htmlTableCellparametro_auxiliar_facturacion">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatosparametro_auxiliar_facturacionsAjaxWebPart">
		</div>
	</td>
</tr> <!-- trparametro_auxiliar_facturacionTablaDatos/super -->
		
		
		<tr id="trparametro_auxiliar_facturacionPaginacion" style="display:table-row">
			<td id="tdparametro_auxiliar_facturacionPaginacion" align="left">
				<div id="divparametro_auxiliar_facturacionPaginacionAjaxWebPart">
				<form id="frmPaginacionparametro_auxiliar_facturacion" name="frmPaginacionparametro_auxiliar_facturacion">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacionparametro_auxiliar_facturacion" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:left">
					<tr>
						<?php if(parametro_auxiliar_facturacion_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkparametro_auxiliar_facturacion" name="btnSeleccionarLoteFkparametro_auxiliar_facturacion" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(parametro_auxiliar_facturacion_web::$STR_ES_RELACIONADO=='false' /*&& parametro_auxiliar_facturacion_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnterioresparametro_auxiliar_facturacion" name="btnAnterioresparametro_auxiliar_facturacion" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(parametro_auxiliar_facturacion_web::$STR_ES_BUSQUEDA=='false' && parametro_auxiliar_facturacion_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdparametro_auxiliar_facturacionNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPrepararparametro_auxiliar_facturacion" name="btnNuevoTablaPrepararparametro_auxiliar_facturacion" title="NUEVO Parametro AuxiliarNOUSO Facturacion" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablaparametro_auxiliar_facturacion" name="ParamsPaginar-txtNumeroNuevoTablaparametro_auxiliar_facturacion" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(parametro_auxiliar_facturacion_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdparametro_auxiliar_facturacionConEditarparametro_auxiliar_facturacion">
							<label>
								<input id="ParamsBuscar-chbConEditarparametro_auxiliar_facturacion" name="ParamsBuscar-chbConEditarparametro_auxiliar_facturacion" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(parametro_auxiliar_facturacion_web::$STR_ES_RELACIONADO=='false'/* && parametro_auxiliar_facturacion_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientesparametro_auxiliar_facturacion" name="btnSiguientesparametro_auxiliar_facturacion" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacionparametro_auxiliar_facturacion -->
				</form> <!-- frmPaginacionparametro_auxiliar_facturacion -->
				<form id="frmNuevoPrepararparametro_auxiliar_facturacion" name="frmNuevoPrepararparametro_auxiliar_facturacion">
				<table id="tblNuevoPrepararparametro_auxiliar_facturacion" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:left">
					<tr id="trparametro_auxiliar_facturacionNuevo" height="10">
						<?php if(parametro_auxiliar_facturacion_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdparametro_auxiliar_facturacionNuevo" align="center">
							<input type="button" id="btnNuevoPrepararparametro_auxiliar_facturacion" name="btnNuevoPrepararparametro_auxiliar_facturacion" title="NUEVO Parametro AuxiliarNOUSO Facturacion" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdparametro_auxiliar_facturacionGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambiosparametro_auxiliar_facturacion" name="btnGuardarCambiosparametro_auxiliar_facturacion" title="GUARDAR Parametro AuxiliarNOUSO Facturacion" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(parametro_auxiliar_facturacion_web::$STR_ES_RELACIONADO=='false' && parametro_auxiliar_facturacion_web::$STR_ES_RELACIONES=='false' && parametro_auxiliar_facturacion_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdparametro_auxiliar_facturacionDuplicar" align="center">
							<input type="button" id="btnDuplicarparametro_auxiliar_facturacion" name="btnDuplicarparametro_auxiliar_facturacion" title="DUPLICAR Parametro AuxiliarNOUSO Facturacion" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdparametro_auxiliar_facturacionCopiar" align="center">
							<input type="button" id="btnCopiarparametro_auxiliar_facturacion" name="btnCopiarparametro_auxiliar_facturacion" title="COPIAR Parametro AuxiliarNOUSO Facturacion" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(parametro_auxiliar_facturacion_web::$STR_ES_RELACIONADO=='false' && ((parametro_auxiliar_facturacion_web::$STR_ES_RELACIONADO=='false' && parametro_auxiliar_facturacion_web::$STR_ES_RELACIONES=='false') || parametro_auxiliar_facturacion_web::$STR_ES_BUSQUEDA=='true'  || parametro_auxiliar_facturacion_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdparametro_auxiliar_facturacionCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginaparametro_auxiliar_facturacion" name="btnCerrarPaginaparametro_auxiliar_facturacion" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPrepararparametro_auxiliar_facturacion -->
				</form> <!-- frmNuevoPrepararparametro_auxiliar_facturacion -->
				</div> <!-- divparametro_auxiliar_facturacionPaginacionAjaxWebPart -->
			</td> <!-- tdparametro_auxiliar_facturacionPaginacion -->
		</tr> <!-- trparametro_auxiliar_facturacionPaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(parametro_auxiliar_facturacion_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionesparametro_auxiliar_facturacionAjaxWebPart">
			<td id="tdAccionesRelacionesparametro_auxiliar_facturacionAjaxWebPart">
				<div id="divAccionesRelacionesparametro_auxiliar_facturacionAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionesparametro_auxiliar_facturacionAjaxWebPart -->
		</tr> <!-- trAccionesRelacionesparametro_auxiliar_facturacionAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderByparametro_auxiliar_facturacion">
			<td id="tdOrderByparametro_auxiliar_facturacion">
				<form id="frmOrderByparametro_auxiliar_facturacion" name="frmOrderByparametro_auxiliar_facturacion">
					<div id="divOrderByparametro_auxiliar_facturacionAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderByparametro_auxiliar_facturacion -->
		</tr> <!-- trOrderByparametro_auxiliar_facturacion/super -->
			
		
		
		
		
		
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
			
				import {parametro_auxiliar_facturacion_webcontrol,parametro_auxiliar_facturacion_webcontrol1} from './webroot/js/JavaScript/contabilidad/general/parametro_auxiliar_facturacion/js/webcontrol/parametro_auxiliar_facturacion_webcontrol.js?random=1';
				
				parametro_auxiliar_facturacion_webcontrol1.setparametro_auxiliar_facturacion_constante(window.parametro_auxiliar_facturacion_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(parametro_auxiliar_facturacion_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

