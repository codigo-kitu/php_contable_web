<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\general\propiedad_empresa\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Propiedades Empresa Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/general/propiedad_empresa/util/propiedad_empresa_carga.php');
	use com\bydan\contabilidad\general\propiedad_empresa\util\propiedad_empresa_carga;
	
	//include_once('com/bydan/contabilidad/general/propiedad_empresa/presentation/view/propiedad_empresa_web.php');
	//use com\bydan\contabilidad\general\propiedad_empresa\presentation\view\propiedad_empresa_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	propiedad_empresa_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	propiedad_empresa_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$propiedad_empresa_web1= new propiedad_empresa_web();	
	$propiedad_empresa_web1->cargarDatosGenerales();
	
	//$moduloActual=$propiedad_empresa_web1->moduloActual;
	//$usuarioActual=$propiedad_empresa_web1->usuarioActual;
	//$sessionBase=$propiedad_empresa_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$propiedad_empresa_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/general/propiedad_empresa/js/templating/propiedad_empresa_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/general/propiedad_empresa/js/templating/propiedad_empresa_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/general/propiedad_empresa/js/templating/propiedad_empresa_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/general/propiedad_empresa/js/templating/propiedad_empresa_datos_reporte_template.js'); ?>
		
			
						
		
		
		<?php 
			
		
			propiedad_empresa_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					propiedad_empresa_web::$GET_POST=$_GET;
				} else {
					propiedad_empresa_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			propiedad_empresa_web::$STR_NOMBRE_PAGINA = 'propiedad_empresa_view.php';
			propiedad_empresa_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			propiedad_empresa_web::$BIT_ES_PAGINA_FORM = 'false';
				
			propiedad_empresa_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {propiedad_empresa_constante,propiedad_empresa_constante1} from './webroot/js/JavaScript/contabilidad/general/propiedad_empresa/js/util/propiedad_empresa_constante.js?random=1';
			import {propiedad_empresa_funcion,propiedad_empresa_funcion1} from './webroot/js/JavaScript/contabilidad/general/propiedad_empresa/js/util/propiedad_empresa_funcion.js?random=1';
			
			let propiedad_empresa_constante2 = new propiedad_empresa_constante();
			
			propiedad_empresa_constante2.STR_NOMBRE_PAGINA="<?php echo(propiedad_empresa_web::$STR_NOMBRE_PAGINA); ?>";
			propiedad_empresa_constante2.STR_TYPE_ON_LOADpropiedad_empresa="<?php echo(propiedad_empresa_web::$STR_TYPE_ONLOAD); ?>";
			propiedad_empresa_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(propiedad_empresa_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			propiedad_empresa_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(propiedad_empresa_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			propiedad_empresa_constante2.STR_ACTION="<?php echo(propiedad_empresa_web::$STR_ACTION); ?>";
			propiedad_empresa_constante2.STR_ES_POPUP="<?php echo(propiedad_empresa_web::$STR_ES_POPUP); ?>";
			propiedad_empresa_constante2.STR_ES_BUSQUEDA="<?php echo(propiedad_empresa_web::$STR_ES_BUSQUEDA); ?>";
			propiedad_empresa_constante2.STR_FUNCION_JS="<?php echo(propiedad_empresa_web::$STR_FUNCION_JS); ?>";
			propiedad_empresa_constante2.BIG_ID_ACTUAL="<?php echo(propiedad_empresa_web::$BIG_ID_ACTUAL); ?>";
			propiedad_empresa_constante2.BIG_ID_OPCION="<?php echo(propiedad_empresa_web::$BIG_ID_OPCION); ?>";
			propiedad_empresa_constante2.STR_OBJETO_JS="<?php echo(propiedad_empresa_web::$STR_OBJETO_JS); ?>";
			propiedad_empresa_constante2.STR_ES_RELACIONES="<?php echo(propiedad_empresa_web::$STR_ES_RELACIONES); ?>";
			propiedad_empresa_constante2.STR_ES_RELACIONADO="<?php echo(propiedad_empresa_web::$STR_ES_RELACIONADO); ?>";
			propiedad_empresa_constante2.STR_ES_SUB_PAGINA="<?php echo(propiedad_empresa_web::$STR_ES_SUB_PAGINA); ?>";
			propiedad_empresa_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(propiedad_empresa_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			propiedad_empresa_constante2.BIT_ES_PAGINA_FORM=<?php echo(propiedad_empresa_web::$BIT_ES_PAGINA_FORM); ?>;
			propiedad_empresa_constante2.STR_SUFIJO="<?php echo(propiedad_empresa_web::$STR_SUF); ?>";//propiedad_empresa
			propiedad_empresa_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(propiedad_empresa_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//propiedad_empresa
			
			propiedad_empresa_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(propiedad_empresa_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			propiedad_empresa_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($propiedad_empresa_web1->moduloActual->getnombre()); ?>";
			propiedad_empresa_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(propiedad_empresa_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			propiedad_empresa_constante2.BIT_ES_LOAD_NORMAL=true;
			/*propiedad_empresa_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			propiedad_empresa_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.propiedad_empresa_constante2 = propiedad_empresa_constante2;
			
		</script>
		
		<?php if(propiedad_empresa_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.propiedad_empresa_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.propiedad_empresa_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="propiedad_empresaActual" ></a>
	
	<div id="divResumenpropiedad_empresaActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(propiedad_empresa_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(propiedad_empresa_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(propiedad_empresa_web::$STR_ES_BUSQUEDA=='false' && propiedad_empresa_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(propiedad_empresa_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(propiedad_empresa_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(propiedad_empresa_web::$STR_ES_RELACIONADO=='false' && propiedad_empresa_web::$STR_ES_POPUP=='false' && propiedad_empresa_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tdpropiedad_empresaNuevoToolBar">
										<img id="imgNuevoToolBarpropiedad_empresa" name="imgNuevoToolBarpropiedad_empresa" title="Nuevo Propiedades Empresa" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(propiedad_empresa_web::$STR_ES_BUSQUEDA=='false' && propiedad_empresa_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdpropiedad_empresaNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBarpropiedad_empresa" name="imgNuevoGuardarCambiosToolBarpropiedad_empresa" title="Nuevo TABLA Propiedades Empresa" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(propiedad_empresa_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdpropiedad_empresaGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBarpropiedad_empresa" name="imgGuardarCambiosToolBarpropiedad_empresa" title="Guardar Propiedades Empresa" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(propiedad_empresa_web::$STR_ES_RELACIONADO=='false' && propiedad_empresa_web::$STR_ES_RELACIONES=='false' && propiedad_empresa_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdpropiedad_empresaCopiarToolBar">
										<img id="imgCopiarToolBarpropiedad_empresa" name="imgCopiarToolBarpropiedad_empresa" title="Copiar Propiedades Empresa" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdpropiedad_empresaDuplicarToolBar">
										<img id="imgDuplicarToolBarpropiedad_empresa" name="imgDuplicarToolBarpropiedad_empresa" title="Duplicar Propiedades Empresa" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(propiedad_empresa_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdpropiedad_empresaRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBarpropiedad_empresa" name="imgRecargarInformacionToolBarpropiedad_empresa" title="Recargar Propiedades Empresa" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdpropiedad_empresaAnterioresToolBar">
										<img id="imgAnterioresToolBarpropiedad_empresa" name="imgAnterioresToolBarpropiedad_empresa" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdpropiedad_empresaSiguientesToolBar">
										<img id="imgSiguientesToolBarpropiedad_empresa" name="imgSiguientesToolBarpropiedad_empresa" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdpropiedad_empresaAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBarpropiedad_empresa" name="imgAbrirOrderByToolBarpropiedad_empresa" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((propiedad_empresa_web::$STR_ES_RELACIONADO=='false' && propiedad_empresa_web::$STR_ES_RELACIONES=='false') || propiedad_empresa_web::$STR_ES_BUSQUEDA=='true'  || propiedad_empresa_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdpropiedad_empresaCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBarpropiedad_empresa" name="imgCerrarPaginaToolBarpropiedad_empresa" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trpropiedad_empresaCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedapropiedad_empresa" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedapropiedad_empresa',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trpropiedad_empresaCabeceraBusquedas/super -->

		<tr id="trBusquedapropiedad_empresa" class="busqueda" style="display:table-row">
			<td id="tdBusquedapropiedad_empresa" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedapropiedad_empresa" name="frmBusquedapropiedad_empresa">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedapropiedad_empresa" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trpropiedad_empresaBusquedas" class="busqueda" style="display:none"><td>
				<?php if(propiedad_empresa_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 70%">
				
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscarpropiedad_empresa" style="display:table-row">
					<td id="tdParamsBuscarpropiedad_empresa">
		<?php if(propiedad_empresa_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscarpropiedad_empresa">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistrospropiedad_empresa" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistrospropiedad_empresa"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistrospropiedad_empresa" name="ParamsBuscar-txtNumeroRegistrospropiedad_empresa" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacionpropiedad_empresa">
							<td id="tdGenerarReportepropiedad_empresa" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodospropiedad_empresa" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodospropiedad_empresa" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacionpropiedad_empresa" name="btnRecargarInformacionpropiedad_empresa" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginapropiedad_empresa" name="btnImprimirPaginapropiedad_empresa" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*propiedad_empresa_web::$STR_ES_BUSQUEDA=='false'  &&*/ propiedad_empresa_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderBypropiedad_empresa">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderBypropiedad_empresa" name="btnOrderBypropiedad_empresa" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
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

										<?php if(propiedad_empresa_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdpropiedad_empresaConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodospropiedad_empresa -->

							</td><!-- tdGenerarReportepropiedad_empresa -->
						</tr><!-- trRecargarInformacionpropiedad_empresa -->
					</table><!-- tblParamsBuscarNumeroRegistrospropiedad_empresa -->
				</div> <!-- divParamsBuscarpropiedad_empresa -->
		<?php } ?>
				</td> <!-- tdParamsBuscarpropiedad_empresa -->
				</tr><!-- trParamsBuscarpropiedad_empresa -->
				</table> <!-- tblBusquedapropiedad_empresa -->
				</form> <!-- frmBusquedapropiedad_empresa -->
				

			</td> <!-- tdBusquedapropiedad_empresa -->
		</tr> <!-- trBusquedapropiedad_empresa/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(propiedad_empresa_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divpropiedad_empresaPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblpropiedad_empresaPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmpropiedad_empresaAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnpropiedad_empresaAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="propiedad_empresa_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnpropiedad_empresaAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmpropiedad_empresaAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblpropiedad_empresaPopupAjaxWebPart -->
		</div> <!-- divpropiedad_empresaPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(propiedad_empresa_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trpropiedad_empresaTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdapropiedad_empresa"></a>
		<img id="imgTablaParaDerechapropiedad_empresa" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechapropiedad_empresa'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdapropiedad_empresa" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdapropiedad_empresa'"/>
		<a id="TablaDerechapropiedad_empresa"></a>
	</td>
</tr> <!-- trpropiedad_empresaTablaNavegacion/super -->
<?php } ?>

<tr id="trpropiedad_empresaTablaDatos">
	<td colspan="3" id="htmlTableCellpropiedad_empresa">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatospropiedad_empresasAjaxWebPart">
		</div>
	</td>
</tr> <!-- trpropiedad_empresaTablaDatos/super -->
		
		
		<tr id="trpropiedad_empresaPaginacion" style="display:table-row">
			<td id="tdpropiedad_empresaPaginacion" align="left">
				<div id="divpropiedad_empresaPaginacionAjaxWebPart">
				<form id="frmPaginacionpropiedad_empresa" name="frmPaginacionpropiedad_empresa">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacionpropiedad_empresa" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:left">
					<tr>
						<?php if(propiedad_empresa_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkpropiedad_empresa" name="btnSeleccionarLoteFkpropiedad_empresa" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(propiedad_empresa_web::$STR_ES_RELACIONADO=='false' /*&& propiedad_empresa_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnteriorespropiedad_empresa" name="btnAnteriorespropiedad_empresa" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(propiedad_empresa_web::$STR_ES_BUSQUEDA=='false' && propiedad_empresa_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdpropiedad_empresaNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPrepararpropiedad_empresa" name="btnNuevoTablaPrepararpropiedad_empresa" title="NUEVO Propiedades Empresa" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablapropiedad_empresa" name="ParamsPaginar-txtNumeroNuevoTablapropiedad_empresa" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(propiedad_empresa_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdpropiedad_empresaConEditarpropiedad_empresa">
							<label>
								<input id="ParamsBuscar-chbConEditarpropiedad_empresa" name="ParamsBuscar-chbConEditarpropiedad_empresa" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(propiedad_empresa_web::$STR_ES_RELACIONADO=='false'/* && propiedad_empresa_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientespropiedad_empresa" name="btnSiguientespropiedad_empresa" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacionpropiedad_empresa -->
				</form> <!-- frmPaginacionpropiedad_empresa -->
				<form id="frmNuevoPrepararpropiedad_empresa" name="frmNuevoPrepararpropiedad_empresa">
				<table id="tblNuevoPrepararpropiedad_empresa" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:left">
					<tr id="trpropiedad_empresaNuevo" height="10">
						<?php if(propiedad_empresa_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdpropiedad_empresaNuevo" align="center">
							<input type="button" id="btnNuevoPrepararpropiedad_empresa" name="btnNuevoPrepararpropiedad_empresa" title="NUEVO Propiedades Empresa" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdpropiedad_empresaGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambiospropiedad_empresa" name="btnGuardarCambiospropiedad_empresa" title="GUARDAR Propiedades Empresa" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(propiedad_empresa_web::$STR_ES_RELACIONADO=='false' && propiedad_empresa_web::$STR_ES_RELACIONES=='false' && propiedad_empresa_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdpropiedad_empresaDuplicar" align="center">
							<input type="button" id="btnDuplicarpropiedad_empresa" name="btnDuplicarpropiedad_empresa" title="DUPLICAR Propiedades Empresa" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdpropiedad_empresaCopiar" align="center">
							<input type="button" id="btnCopiarpropiedad_empresa" name="btnCopiarpropiedad_empresa" title="COPIAR Propiedades Empresa" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(propiedad_empresa_web::$STR_ES_RELACIONADO=='false' && ((propiedad_empresa_web::$STR_ES_RELACIONADO=='false' && propiedad_empresa_web::$STR_ES_RELACIONES=='false') || propiedad_empresa_web::$STR_ES_BUSQUEDA=='true'  || propiedad_empresa_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdpropiedad_empresaCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginapropiedad_empresa" name="btnCerrarPaginapropiedad_empresa" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPrepararpropiedad_empresa -->
				</form> <!-- frmNuevoPrepararpropiedad_empresa -->
				</div> <!-- divpropiedad_empresaPaginacionAjaxWebPart -->
			</td> <!-- tdpropiedad_empresaPaginacion -->
		</tr> <!-- trpropiedad_empresaPaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(propiedad_empresa_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionespropiedad_empresaAjaxWebPart">
			<td id="tdAccionesRelacionespropiedad_empresaAjaxWebPart">
				<div id="divAccionesRelacionespropiedad_empresaAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionespropiedad_empresaAjaxWebPart -->
		</tr> <!-- trAccionesRelacionespropiedad_empresaAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderBypropiedad_empresa">
			<td id="tdOrderBypropiedad_empresa">
				<form id="frmOrderBypropiedad_empresa" name="frmOrderBypropiedad_empresa">
					<div id="divOrderBypropiedad_empresaAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderBypropiedad_empresa -->
		</tr> <!-- trOrderBypropiedad_empresa/super -->
			
		
		
		
		
		
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
			
				import {propiedad_empresa_webcontrol,propiedad_empresa_webcontrol1} from './webroot/js/JavaScript/contabilidad/general/propiedad_empresa/js/webcontrol/propiedad_empresa_webcontrol.js?random=1';
				
				propiedad_empresa_webcontrol1.setpropiedad_empresa_constante(window.propiedad_empresa_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(propiedad_empresa_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

