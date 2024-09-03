<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\seguridad\grupo_opcion\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Grupo Opcion Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/seguridad/grupo_opcion/util/grupo_opcion_carga.php');
	use com\bydan\contabilidad\seguridad\grupo_opcion\util\grupo_opcion_carga;
	
	//include_once('com/bydan/contabilidad/seguridad/grupo_opcion/presentation/view/grupo_opcion_web.php');
	//use com\bydan\contabilidad\seguridad\grupo_opcion\presentation\view\grupo_opcion_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	grupo_opcion_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	grupo_opcion_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$grupo_opcion_web1= new grupo_opcion_web();	
	$grupo_opcion_web1->cargarDatosGenerales();
	
	//$moduloActual=$grupo_opcion_web1->moduloActual;
	//$usuarioActual=$grupo_opcion_web1->usuarioActual;
	//$sessionBase=$grupo_opcion_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$grupo_opcion_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/seguridad/grupo_opcion/js/templating/grupo_opcion_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/seguridad/grupo_opcion/js/templating/grupo_opcion_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/seguridad/grupo_opcion/js/templating/grupo_opcion_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/seguridad/grupo_opcion/js/templating/grupo_opcion_datos_reporte_template.js'); ?>
		
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/seguridad/grupo_opcion/js/templating/grupo_opcion_datos_relaciones_template.js'); ?>
			
						
		
		
		<?php 
			
		
			grupo_opcion_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					grupo_opcion_web::$GET_POST=$_GET;
				} else {
					grupo_opcion_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			grupo_opcion_web::$STR_NOMBRE_PAGINA = 'grupo_opcion_view.php';
			grupo_opcion_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			grupo_opcion_web::$BIT_ES_PAGINA_FORM = 'false';
				
			grupo_opcion_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {grupo_opcion_constante,grupo_opcion_constante1} from './webroot/js/JavaScript/contabilidad/seguridad/grupo_opcion/js/util/grupo_opcion_constante.js?random=1';
			import {grupo_opcion_funcion,grupo_opcion_funcion1} from './webroot/js/JavaScript/contabilidad/seguridad/grupo_opcion/js/util/grupo_opcion_funcion.js?random=1';
			
			let grupo_opcion_constante2 = new grupo_opcion_constante();
			
			grupo_opcion_constante2.STR_NOMBRE_PAGINA="<?php echo(grupo_opcion_web::$STR_NOMBRE_PAGINA); ?>";
			grupo_opcion_constante2.STR_TYPE_ON_LOADgrupo_opcion="<?php echo(grupo_opcion_web::$STR_TYPE_ONLOAD); ?>";
			grupo_opcion_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(grupo_opcion_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			grupo_opcion_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(grupo_opcion_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			grupo_opcion_constante2.STR_ACTION="<?php echo(grupo_opcion_web::$STR_ACTION); ?>";
			grupo_opcion_constante2.STR_ES_POPUP="<?php echo(grupo_opcion_web::$STR_ES_POPUP); ?>";
			grupo_opcion_constante2.STR_ES_BUSQUEDA="<?php echo(grupo_opcion_web::$STR_ES_BUSQUEDA); ?>";
			grupo_opcion_constante2.STR_FUNCION_JS="<?php echo(grupo_opcion_web::$STR_FUNCION_JS); ?>";
			grupo_opcion_constante2.BIG_ID_ACTUAL="<?php echo(grupo_opcion_web::$BIG_ID_ACTUAL); ?>";
			grupo_opcion_constante2.BIG_ID_OPCION="<?php echo(grupo_opcion_web::$BIG_ID_OPCION); ?>";
			grupo_opcion_constante2.STR_OBJETO_JS="<?php echo(grupo_opcion_web::$STR_OBJETO_JS); ?>";
			grupo_opcion_constante2.STR_ES_RELACIONES="<?php echo(grupo_opcion_web::$STR_ES_RELACIONES); ?>";
			grupo_opcion_constante2.STR_ES_RELACIONADO="<?php echo(grupo_opcion_web::$STR_ES_RELACIONADO); ?>";
			grupo_opcion_constante2.STR_ES_SUB_PAGINA="<?php echo(grupo_opcion_web::$STR_ES_SUB_PAGINA); ?>";
			grupo_opcion_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(grupo_opcion_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			grupo_opcion_constante2.BIT_ES_PAGINA_FORM=<?php echo(grupo_opcion_web::$BIT_ES_PAGINA_FORM); ?>;
			grupo_opcion_constante2.STR_SUFIJO="<?php echo(grupo_opcion_web::$STR_SUF); ?>";//grupo_opcion
			grupo_opcion_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(grupo_opcion_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//grupo_opcion
			
			grupo_opcion_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(grupo_opcion_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			grupo_opcion_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($grupo_opcion_web1->moduloActual->getnombre()); ?>";
			grupo_opcion_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(grupo_opcion_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			grupo_opcion_constante2.BIT_ES_LOAD_NORMAL=true;
			/*grupo_opcion_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			grupo_opcion_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.grupo_opcion_constante2 = grupo_opcion_constante2;
			
		</script>
		
		<?php if(grupo_opcion_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.grupo_opcion_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.grupo_opcion_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="grupo_opcionActual" ></a>
	
	<div id="divResumengrupo_opcionActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(grupo_opcion_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(grupo_opcion_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(grupo_opcion_web::$STR_ES_BUSQUEDA=='false' && grupo_opcion_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(grupo_opcion_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(grupo_opcion_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(grupo_opcion_web::$STR_ES_RELACIONADO=='false' && grupo_opcion_web::$STR_ES_POPUP=='false' && grupo_opcion_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tdgrupo_opcionNuevoToolBar">
										<img id="imgNuevoToolBargrupo_opcion" name="imgNuevoToolBargrupo_opcion" title="Nuevo Grupo Opcion" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(grupo_opcion_web::$STR_ES_BUSQUEDA=='false' && grupo_opcion_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdgrupo_opcionNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBargrupo_opcion" name="imgNuevoGuardarCambiosToolBargrupo_opcion" title="Nuevo TABLA Grupo Opcion" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(grupo_opcion_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdgrupo_opcionGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBargrupo_opcion" name="imgGuardarCambiosToolBargrupo_opcion" title="Guardar Grupo Opcion" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(grupo_opcion_web::$STR_ES_RELACIONADO=='false' && grupo_opcion_web::$STR_ES_RELACIONES=='false' && grupo_opcion_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdgrupo_opcionCopiarToolBar">
										<img id="imgCopiarToolBargrupo_opcion" name="imgCopiarToolBargrupo_opcion" title="Copiar Grupo Opcion" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdgrupo_opcionDuplicarToolBar">
										<img id="imgDuplicarToolBargrupo_opcion" name="imgDuplicarToolBargrupo_opcion" title="Duplicar Grupo Opcion" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(grupo_opcion_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdgrupo_opcionRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBargrupo_opcion" name="imgRecargarInformacionToolBargrupo_opcion" title="Recargar Grupo Opcion" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdgrupo_opcionAnterioresToolBar">
										<img id="imgAnterioresToolBargrupo_opcion" name="imgAnterioresToolBargrupo_opcion" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdgrupo_opcionSiguientesToolBar">
										<img id="imgSiguientesToolBargrupo_opcion" name="imgSiguientesToolBargrupo_opcion" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdgrupo_opcionAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBargrupo_opcion" name="imgAbrirOrderByToolBargrupo_opcion" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((grupo_opcion_web::$STR_ES_RELACIONADO=='false' && grupo_opcion_web::$STR_ES_RELACIONES=='false') || grupo_opcion_web::$STR_ES_BUSQUEDA=='true'  || grupo_opcion_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdgrupo_opcionCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBargrupo_opcion" name="imgCerrarPaginaToolBargrupo_opcion" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trgrupo_opcionCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedagrupo_opcion" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedagrupo_opcion',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trgrupo_opcionCabeceraBusquedas/super -->

		<tr id="trBusquedagrupo_opcion" class="busqueda" style="display:table-row">
			<td id="tdBusquedagrupo_opcion" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedagrupo_opcion" name="frmBusquedagrupo_opcion">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedagrupo_opcion" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trgrupo_opcionBusquedas" class="busqueda" style="display:none"><td>
				<?php if(grupo_opcion_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 70%">
				
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscargrupo_opcion" style="display:table-row">
					<td id="tdParamsBuscargrupo_opcion">
		<?php if(grupo_opcion_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscargrupo_opcion">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistrosgrupo_opcion" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistrosgrupo_opcion"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistrosgrupo_opcion" name="ParamsBuscar-txtNumeroRegistrosgrupo_opcion" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformaciongrupo_opcion">
							<td id="tdGenerarReportegrupo_opcion" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodosgrupo_opcion" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodosgrupo_opcion" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformaciongrupo_opcion" name="btnRecargarInformaciongrupo_opcion" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginagrupo_opcion" name="btnImprimirPaginagrupo_opcion" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*grupo_opcion_web::$STR_ES_BUSQUEDA=='false'  &&*/ grupo_opcion_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderBygrupo_opcion">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderBygrupo_opcion" name="btnOrderBygrupo_opcion" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
													</td>
													<td>
														<input type="button" id="btnOrderByRelgrupo_opcion" name="btnOrderByRelgrupo_opcion" title="RELACIONES DE DATOS" value="   Rels" class="btn btn-primary"/>
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

										<?php if(grupo_opcion_web::$STR_ES_RELACIONES=='false' && grupo_opcion_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbTiposRelaciones" name="ParamsBuscar-cmbTiposRelaciones" title="TIPOS DE RELACIONES" style="width:150px"></select>
										</td>
										<?php } ?>

										<?php if(grupo_opcion_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdgrupo_opcionConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodosgrupo_opcion -->

							</td><!-- tdGenerarReportegrupo_opcion -->
						</tr><!-- trRecargarInformaciongrupo_opcion -->
					</table><!-- tblParamsBuscarNumeroRegistrosgrupo_opcion -->
				</div> <!-- divParamsBuscargrupo_opcion -->
		<?php } ?>
				</td> <!-- tdParamsBuscargrupo_opcion -->
				</tr><!-- trParamsBuscargrupo_opcion -->
				</table> <!-- tblBusquedagrupo_opcion -->
				</form> <!-- frmBusquedagrupo_opcion -->
				

			</td> <!-- tdBusquedagrupo_opcion -->
		</tr> <!-- trBusquedagrupo_opcion/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(grupo_opcion_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divgrupo_opcionPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblgrupo_opcionPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmgrupo_opcionAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btngrupo_opcionAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="grupo_opcion_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btngrupo_opcionAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmgrupo_opcionAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblgrupo_opcionPopupAjaxWebPart -->
		</div> <!-- divgrupo_opcionPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(grupo_opcion_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trgrupo_opcionTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdagrupo_opcion"></a>
		<img id="imgTablaParaDerechagrupo_opcion" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechagrupo_opcion'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdagrupo_opcion" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdagrupo_opcion'"/>
		<a id="TablaDerechagrupo_opcion"></a>
	</td>
</tr> <!-- trgrupo_opcionTablaNavegacion/super -->
<?php } ?>

<tr id="trgrupo_opcionTablaDatos">
	<td colspan="3" id="htmlTableCellgrupo_opcion">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatosgrupo_opcionsAjaxWebPart">
		</div>
	</td>
</tr> <!-- trgrupo_opcionTablaDatos/super -->
		
		
		<tr id="trgrupo_opcionPaginacion" style="display:table-row">
			<td id="tdgrupo_opcionPaginacion" align="center">
				<div id="divgrupo_opcionPaginacionAjaxWebPart">
				<form id="frmPaginaciongrupo_opcion" name="frmPaginaciongrupo_opcion">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginaciongrupo_opcion" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:center">
					<tr>
						<?php if(grupo_opcion_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkgrupo_opcion" name="btnSeleccionarLoteFkgrupo_opcion" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(grupo_opcion_web::$STR_ES_RELACIONADO=='false' /*&& grupo_opcion_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnterioresgrupo_opcion" name="btnAnterioresgrupo_opcion" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(grupo_opcion_web::$STR_ES_BUSQUEDA=='false' && grupo_opcion_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdgrupo_opcionNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPreparargrupo_opcion" name="btnNuevoTablaPreparargrupo_opcion" title="NUEVO Grupo Opcion" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablagrupo_opcion" name="ParamsPaginar-txtNumeroNuevoTablagrupo_opcion" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(grupo_opcion_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdgrupo_opcionConEditargrupo_opcion">
							<label>
								<input id="ParamsBuscar-chbConEditargrupo_opcion" name="ParamsBuscar-chbConEditargrupo_opcion" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(grupo_opcion_web::$STR_ES_RELACIONADO=='false'/* && grupo_opcion_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientesgrupo_opcion" name="btnSiguientesgrupo_opcion" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginaciongrupo_opcion -->
				</form> <!-- frmPaginaciongrupo_opcion -->
				<form id="frmNuevoPreparargrupo_opcion" name="frmNuevoPreparargrupo_opcion">
				<table id="tblNuevoPreparargrupo_opcion" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:center">
					<tr id="trgrupo_opcionNuevo" height="10">
						<?php if(grupo_opcion_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdgrupo_opcionNuevo" align="center">
							<input type="button" id="btnNuevoPreparargrupo_opcion" name="btnNuevoPreparargrupo_opcion" title="NUEVO Grupo Opcion" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdgrupo_opcionGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambiosgrupo_opcion" name="btnGuardarCambiosgrupo_opcion" title="GUARDAR Grupo Opcion" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(grupo_opcion_web::$STR_ES_RELACIONADO=='false' && grupo_opcion_web::$STR_ES_RELACIONES=='false' && grupo_opcion_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdgrupo_opcionDuplicar" align="center">
							<input type="button" id="btnDuplicargrupo_opcion" name="btnDuplicargrupo_opcion" title="DUPLICAR Grupo Opcion" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdgrupo_opcionCopiar" align="center">
							<input type="button" id="btnCopiargrupo_opcion" name="btnCopiargrupo_opcion" title="COPIAR Grupo Opcion" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(grupo_opcion_web::$STR_ES_RELACIONADO=='false' && ((grupo_opcion_web::$STR_ES_RELACIONADO=='false' && grupo_opcion_web::$STR_ES_RELACIONES=='false') || grupo_opcion_web::$STR_ES_BUSQUEDA=='true'  || grupo_opcion_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdgrupo_opcionCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginagrupo_opcion" name="btnCerrarPaginagrupo_opcion" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPreparargrupo_opcion -->
				</form> <!-- frmNuevoPreparargrupo_opcion -->
				</div> <!-- divgrupo_opcionPaginacionAjaxWebPart -->
			</td> <!-- tdgrupo_opcionPaginacion -->
		</tr> <!-- trgrupo_opcionPaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(grupo_opcion_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionesgrupo_opcionAjaxWebPart">
			<td id="tdAccionesRelacionesgrupo_opcionAjaxWebPart">
				<div id="divAccionesRelacionesgrupo_opcionAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionesgrupo_opcionAjaxWebPart -->
		</tr> <!-- trAccionesRelacionesgrupo_opcionAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderBygrupo_opcion">
			<td id="tdOrderBygrupo_opcion">
				<form id="frmOrderBygrupo_opcion" name="frmOrderBygrupo_opcion">
					<div id="divOrderBygrupo_opcionAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
				<form id="frmOrderByRelgrupo_opcion" name="frmOrderByRelgrupo_opcion">
					<div id="divOrderByRelgrupo_opcionAjaxWebPart" title="RELACIONES" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderBygrupo_opcion -->
		</tr> <!-- trOrderBygrupo_opcion/super -->
			
		
		
		
		
		
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
			
				import {grupo_opcion_webcontrol,grupo_opcion_webcontrol1} from './webroot/js/JavaScript/contabilidad/seguridad/grupo_opcion/js/webcontrol/grupo_opcion_webcontrol.js?random=1';
				
				grupo_opcion_webcontrol1.setgrupo_opcion_constante(window.grupo_opcion_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(grupo_opcion_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

