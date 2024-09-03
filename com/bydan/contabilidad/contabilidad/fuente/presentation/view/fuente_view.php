<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\contabilidad\fuente\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Fuente Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/contabilidad/fuente/util/fuente_carga.php');
	use com\bydan\contabilidad\contabilidad\fuente\util\fuente_carga;
	
	//include_once('com/bydan/contabilidad/contabilidad/fuente/presentation/view/fuente_web.php');
	//use com\bydan\contabilidad\contabilidad\fuente\presentation\view\fuente_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	fuente_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	fuente_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$fuente_web1= new fuente_web();	
	$fuente_web1->cargarDatosGenerales();
	
	//$moduloActual=$fuente_web1->moduloActual;
	//$usuarioActual=$fuente_web1->usuarioActual;
	//$sessionBase=$fuente_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$fuente_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/contabilidad/fuente/js/templating/fuente_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/contabilidad/fuente/js/templating/fuente_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/contabilidad/fuente/js/templating/fuente_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/contabilidad/fuente/js/templating/fuente_datos_reporte_template.js'); ?>
		
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/contabilidad/fuente/js/templating/fuente_datos_relaciones_template.js'); ?>
			
						
		
		
		<?php 
			
		
			fuente_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					fuente_web::$GET_POST=$_GET;
				} else {
					fuente_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			fuente_web::$STR_NOMBRE_PAGINA = 'fuente_view.php';
			fuente_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			fuente_web::$BIT_ES_PAGINA_FORM = 'false';
				
			fuente_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {fuente_constante,fuente_constante1} from './webroot/js/JavaScript/contabilidad/contabilidad/fuente/js/util/fuente_constante.js?random=1';
			import {fuente_funcion,fuente_funcion1} from './webroot/js/JavaScript/contabilidad/contabilidad/fuente/js/util/fuente_funcion.js?random=1';
			
			let fuente_constante2 = new fuente_constante();
			
			fuente_constante2.STR_NOMBRE_PAGINA="<?php echo(fuente_web::$STR_NOMBRE_PAGINA); ?>";
			fuente_constante2.STR_TYPE_ON_LOADfuente="<?php echo(fuente_web::$STR_TYPE_ONLOAD); ?>";
			fuente_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(fuente_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			fuente_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(fuente_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			fuente_constante2.STR_ACTION="<?php echo(fuente_web::$STR_ACTION); ?>";
			fuente_constante2.STR_ES_POPUP="<?php echo(fuente_web::$STR_ES_POPUP); ?>";
			fuente_constante2.STR_ES_BUSQUEDA="<?php echo(fuente_web::$STR_ES_BUSQUEDA); ?>";
			fuente_constante2.STR_FUNCION_JS="<?php echo(fuente_web::$STR_FUNCION_JS); ?>";
			fuente_constante2.BIG_ID_ACTUAL="<?php echo(fuente_web::$BIG_ID_ACTUAL); ?>";
			fuente_constante2.BIG_ID_OPCION="<?php echo(fuente_web::$BIG_ID_OPCION); ?>";
			fuente_constante2.STR_OBJETO_JS="<?php echo(fuente_web::$STR_OBJETO_JS); ?>";
			fuente_constante2.STR_ES_RELACIONES="<?php echo(fuente_web::$STR_ES_RELACIONES); ?>";
			fuente_constante2.STR_ES_RELACIONADO="<?php echo(fuente_web::$STR_ES_RELACIONADO); ?>";
			fuente_constante2.STR_ES_SUB_PAGINA="<?php echo(fuente_web::$STR_ES_SUB_PAGINA); ?>";
			fuente_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(fuente_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			fuente_constante2.BIT_ES_PAGINA_FORM=<?php echo(fuente_web::$BIT_ES_PAGINA_FORM); ?>;
			fuente_constante2.STR_SUFIJO="<?php echo(fuente_web::$STR_SUF); ?>";//fuente
			fuente_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(fuente_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//fuente
			
			fuente_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(fuente_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			fuente_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($fuente_web1->moduloActual->getnombre()); ?>";
			fuente_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(fuente_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			fuente_constante2.BIT_ES_LOAD_NORMAL=true;
			/*fuente_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			fuente_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.fuente_constante2 = fuente_constante2;
			
		</script>
		
		<?php if(fuente_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.fuente_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.fuente_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="fuenteActual" ></a>
	
	<div id="divResumenfuenteActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(fuente_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(fuente_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(fuente_web::$STR_ES_BUSQUEDA=='false' && fuente_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(fuente_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(fuente_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(fuente_web::$STR_ES_RELACIONADO=='false' && fuente_web::$STR_ES_POPUP=='false' && fuente_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tdfuenteNuevoToolBar">
										<img id="imgNuevoToolBarfuente" name="imgNuevoToolBarfuente" title="Nuevo Fuente" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(fuente_web::$STR_ES_BUSQUEDA=='false' && fuente_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdfuenteNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBarfuente" name="imgNuevoGuardarCambiosToolBarfuente" title="Nuevo TABLA Fuente" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(fuente_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdfuenteGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBarfuente" name="imgGuardarCambiosToolBarfuente" title="Guardar Fuente" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(fuente_web::$STR_ES_RELACIONADO=='false' && fuente_web::$STR_ES_RELACIONES=='false' && fuente_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdfuenteCopiarToolBar">
										<img id="imgCopiarToolBarfuente" name="imgCopiarToolBarfuente" title="Copiar Fuente" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdfuenteDuplicarToolBar">
										<img id="imgDuplicarToolBarfuente" name="imgDuplicarToolBarfuente" title="Duplicar Fuente" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(fuente_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdfuenteRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBarfuente" name="imgRecargarInformacionToolBarfuente" title="Recargar Fuente" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdfuenteAnterioresToolBar">
										<img id="imgAnterioresToolBarfuente" name="imgAnterioresToolBarfuente" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdfuenteSiguientesToolBar">
										<img id="imgSiguientesToolBarfuente" name="imgSiguientesToolBarfuente" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdfuenteAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBarfuente" name="imgAbrirOrderByToolBarfuente" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((fuente_web::$STR_ES_RELACIONADO=='false' && fuente_web::$STR_ES_RELACIONES=='false') || fuente_web::$STR_ES_BUSQUEDA=='true'  || fuente_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdfuenteCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBarfuente" name="imgCerrarPaginaToolBarfuente" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trfuenteCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedafuente" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedafuente',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trfuenteCabeceraBusquedas/super -->

		<tr id="trBusquedafuente" class="busqueda" style="display:table-row">
			<td id="tdBusquedafuente" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedafuente" name="frmBusquedafuente">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedafuente" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trfuenteBusquedas" class="busqueda" style="display:none"><td>
				<?php if(fuente_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 70%">
				
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscarfuente" style="display:table-row">
					<td id="tdParamsBuscarfuente">
		<?php if(fuente_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscarfuente">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistrosfuente" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistrosfuente"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistrosfuente" name="ParamsBuscar-txtNumeroRegistrosfuente" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacionfuente">
							<td id="tdGenerarReportefuente" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodosfuente" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodosfuente" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacionfuente" name="btnRecargarInformacionfuente" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginafuente" name="btnImprimirPaginafuente" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*fuente_web::$STR_ES_BUSQUEDA=='false'  &&*/ fuente_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderByfuente">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderByfuente" name="btnOrderByfuente" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
													</td>
													<td>
														<input type="button" id="btnOrderByRelfuente" name="btnOrderByRelfuente" title="RELACIONES DE DATOS" value="   Rels" class="btn btn-primary"/>
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

										<?php if(fuente_web::$STR_ES_RELACIONES=='false' && fuente_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbTiposRelaciones" name="ParamsBuscar-cmbTiposRelaciones" title="TIPOS DE RELACIONES" style="width:150px"></select>
										</td>
										<?php } ?>

										<?php if(fuente_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdfuenteConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodosfuente -->

							</td><!-- tdGenerarReportefuente -->
						</tr><!-- trRecargarInformacionfuente -->
					</table><!-- tblParamsBuscarNumeroRegistrosfuente -->
				</div> <!-- divParamsBuscarfuente -->
		<?php } ?>
				</td> <!-- tdParamsBuscarfuente -->
				</tr><!-- trParamsBuscarfuente -->
				</table> <!-- tblBusquedafuente -->
				</form> <!-- frmBusquedafuente -->
				

			</td> <!-- tdBusquedafuente -->
		</tr> <!-- trBusquedafuente/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(fuente_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divfuentePopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblfuentePopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmfuenteAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnfuenteAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="fuente_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnfuenteAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmfuenteAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblfuentePopupAjaxWebPart -->
		</div> <!-- divfuentePopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(fuente_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trfuenteTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdafuente"></a>
		<img id="imgTablaParaDerechafuente" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechafuente'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdafuente" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdafuente'"/>
		<a id="TablaDerechafuente"></a>
	</td>
</tr> <!-- trfuenteTablaNavegacion/super -->
<?php } ?>

<tr id="trfuenteTablaDatos">
	<td colspan="3" id="htmlTableCellfuente">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatosfuentesAjaxWebPart">
		</div>
	</td>
</tr> <!-- trfuenteTablaDatos/super -->
		
		
		<tr id="trfuentePaginacion" style="display:table-row">
			<td id="tdfuentePaginacion" align="center">
				<div id="divfuentePaginacionAjaxWebPart">
				<form id="frmPaginacionfuente" name="frmPaginacionfuente">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacionfuente" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:center">
					<tr>
						<?php if(fuente_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkfuente" name="btnSeleccionarLoteFkfuente" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(fuente_web::$STR_ES_RELACIONADO=='false' /*&& fuente_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnterioresfuente" name="btnAnterioresfuente" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(fuente_web::$STR_ES_BUSQUEDA=='false' && fuente_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdfuenteNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPrepararfuente" name="btnNuevoTablaPrepararfuente" title="NUEVO Fuente" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablafuente" name="ParamsPaginar-txtNumeroNuevoTablafuente" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(fuente_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdfuenteConEditarfuente">
							<label>
								<input id="ParamsBuscar-chbConEditarfuente" name="ParamsBuscar-chbConEditarfuente" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(fuente_web::$STR_ES_RELACIONADO=='false'/* && fuente_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientesfuente" name="btnSiguientesfuente" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacionfuente -->
				</form> <!-- frmPaginacionfuente -->
				<form id="frmNuevoPrepararfuente" name="frmNuevoPrepararfuente">
				<table id="tblNuevoPrepararfuente" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:center">
					<tr id="trfuenteNuevo" height="10">
						<?php if(fuente_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdfuenteNuevo" align="center">
							<input type="button" id="btnNuevoPrepararfuente" name="btnNuevoPrepararfuente" title="NUEVO Fuente" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdfuenteGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambiosfuente" name="btnGuardarCambiosfuente" title="GUARDAR Fuente" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(fuente_web::$STR_ES_RELACIONADO=='false' && fuente_web::$STR_ES_RELACIONES=='false' && fuente_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdfuenteDuplicar" align="center">
							<input type="button" id="btnDuplicarfuente" name="btnDuplicarfuente" title="DUPLICAR Fuente" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdfuenteCopiar" align="center">
							<input type="button" id="btnCopiarfuente" name="btnCopiarfuente" title="COPIAR Fuente" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(fuente_web::$STR_ES_RELACIONADO=='false' && ((fuente_web::$STR_ES_RELACIONADO=='false' && fuente_web::$STR_ES_RELACIONES=='false') || fuente_web::$STR_ES_BUSQUEDA=='true'  || fuente_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdfuenteCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginafuente" name="btnCerrarPaginafuente" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPrepararfuente -->
				</form> <!-- frmNuevoPrepararfuente -->
				</div> <!-- divfuentePaginacionAjaxWebPart -->
			</td> <!-- tdfuentePaginacion -->
		</tr> <!-- trfuentePaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(fuente_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionesfuenteAjaxWebPart">
			<td id="tdAccionesRelacionesfuenteAjaxWebPart">
				<div id="divAccionesRelacionesfuenteAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionesfuenteAjaxWebPart -->
		</tr> <!-- trAccionesRelacionesfuenteAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderByfuente">
			<td id="tdOrderByfuente">
				<form id="frmOrderByfuente" name="frmOrderByfuente">
					<div id="divOrderByfuenteAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
				<form id="frmOrderByRelfuente" name="frmOrderByRelfuente">
					<div id="divOrderByRelfuenteAjaxWebPart" title="RELACIONES" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderByfuente -->
		</tr> <!-- trOrderByfuente/super -->
			
		
		
		
		
		
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
			
				import {fuente_webcontrol,fuente_webcontrol1} from './webroot/js/JavaScript/contabilidad/contabilidad/fuente/js/webcontrol/fuente_webcontrol.js?random=1';
				
				fuente_webcontrol1.setfuente_constante(window.fuente_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(fuente_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

