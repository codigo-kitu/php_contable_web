<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\seguridad\perfil\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Perfil Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/seguridad/perfil/util/perfil_carga.php');
	use com\bydan\contabilidad\seguridad\perfil\util\perfil_carga;
	
	//include_once('com/bydan/contabilidad/seguridad/perfil/presentation/view/perfil_web.php');
	//use com\bydan\contabilidad\seguridad\perfil\presentation\view\perfil_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	perfil_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	perfil_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$perfil_web1= new perfil_web();	
	$perfil_web1->cargarDatosGenerales();
	
	//$moduloActual=$perfil_web1->moduloActual;
	//$usuarioActual=$perfil_web1->usuarioActual;
	//$sessionBase=$perfil_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$perfil_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/seguridad/perfil/js/templating/perfil_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/seguridad/perfil/js/templating/perfil_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/seguridad/perfil/js/templating/perfil_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/seguridad/perfil/js/templating/perfil_datos_reporte_template.js'); ?>
		
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/seguridad/perfil/js/templating/perfil_datos_relaciones_template.js'); ?>
			
						
		
		
		<?php 
			
		
			perfil_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					perfil_web::$GET_POST=$_GET;
				} else {
					perfil_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			perfil_web::$STR_NOMBRE_PAGINA = 'perfil_view.php';
			perfil_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			perfil_web::$BIT_ES_PAGINA_FORM = 'false';
				
			perfil_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {perfil_constante,perfil_constante1} from './webroot/js/JavaScript/contabilidad/seguridad/perfil/js/util/perfil_constante.js?random=1';
			import {perfil_funcion,perfil_funcion1} from './webroot/js/JavaScript/contabilidad/seguridad/perfil/js/util/perfil_funcion.js?random=1';
			
			let perfil_constante2 = new perfil_constante();
			
			perfil_constante2.STR_NOMBRE_PAGINA="<?php echo(perfil_web::$STR_NOMBRE_PAGINA); ?>";
			perfil_constante2.STR_TYPE_ON_LOADperfil="<?php echo(perfil_web::$STR_TYPE_ONLOAD); ?>";
			perfil_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(perfil_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			perfil_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(perfil_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			perfil_constante2.STR_ACTION="<?php echo(perfil_web::$STR_ACTION); ?>";
			perfil_constante2.STR_ES_POPUP="<?php echo(perfil_web::$STR_ES_POPUP); ?>";
			perfil_constante2.STR_ES_BUSQUEDA="<?php echo(perfil_web::$STR_ES_BUSQUEDA); ?>";
			perfil_constante2.STR_FUNCION_JS="<?php echo(perfil_web::$STR_FUNCION_JS); ?>";
			perfil_constante2.BIG_ID_ACTUAL="<?php echo(perfil_web::$BIG_ID_ACTUAL); ?>";
			perfil_constante2.BIG_ID_OPCION="<?php echo(perfil_web::$BIG_ID_OPCION); ?>";
			perfil_constante2.STR_OBJETO_JS="<?php echo(perfil_web::$STR_OBJETO_JS); ?>";
			perfil_constante2.STR_ES_RELACIONES="<?php echo(perfil_web::$STR_ES_RELACIONES); ?>";
			perfil_constante2.STR_ES_RELACIONADO="<?php echo(perfil_web::$STR_ES_RELACIONADO); ?>";
			perfil_constante2.STR_ES_SUB_PAGINA="<?php echo(perfil_web::$STR_ES_SUB_PAGINA); ?>";
			perfil_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(perfil_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			perfil_constante2.BIT_ES_PAGINA_FORM=<?php echo(perfil_web::$BIT_ES_PAGINA_FORM); ?>;
			perfil_constante2.STR_SUFIJO="<?php echo(perfil_web::$STR_SUF); ?>";//perfil
			perfil_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(perfil_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//perfil
			
			perfil_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(perfil_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			perfil_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($perfil_web1->moduloActual->getnombre()); ?>";
			perfil_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(perfil_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			perfil_constante2.BIT_ES_LOAD_NORMAL=true;
			/*perfil_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			perfil_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.perfil_constante2 = perfil_constante2;
			
		</script>
		
		<?php if(perfil_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.perfil_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.perfil_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="perfilActual" ></a>
	
	<div id="divResumenperfilActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(perfil_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(perfil_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(perfil_web::$STR_ES_BUSQUEDA=='false' && perfil_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(perfil_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(perfil_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(perfil_web::$STR_ES_RELACIONADO=='false' && perfil_web::$STR_ES_POPUP=='false' && perfil_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tdperfilNuevoToolBar">
										<img id="imgNuevoToolBarperfil" name="imgNuevoToolBarperfil" title="Nuevo Perfil" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(perfil_web::$STR_ES_BUSQUEDA=='false' && perfil_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdperfilNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBarperfil" name="imgNuevoGuardarCambiosToolBarperfil" title="Nuevo TABLA Perfil" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(perfil_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdperfilGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBarperfil" name="imgGuardarCambiosToolBarperfil" title="Guardar Perfil" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(perfil_web::$STR_ES_RELACIONADO=='false' && perfil_web::$STR_ES_RELACIONES=='false' && perfil_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdperfilCopiarToolBar">
										<img id="imgCopiarToolBarperfil" name="imgCopiarToolBarperfil" title="Copiar Perfil" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdperfilDuplicarToolBar">
										<img id="imgDuplicarToolBarperfil" name="imgDuplicarToolBarperfil" title="Duplicar Perfil" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(perfil_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdperfilRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBarperfil" name="imgRecargarInformacionToolBarperfil" title="Recargar Perfil" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdperfilAnterioresToolBar">
										<img id="imgAnterioresToolBarperfil" name="imgAnterioresToolBarperfil" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdperfilSiguientesToolBar">
										<img id="imgSiguientesToolBarperfil" name="imgSiguientesToolBarperfil" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdperfilAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBarperfil" name="imgAbrirOrderByToolBarperfil" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((perfil_web::$STR_ES_RELACIONADO=='false' && perfil_web::$STR_ES_RELACIONES=='false') || perfil_web::$STR_ES_BUSQUEDA=='true'  || perfil_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdperfilCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBarperfil" name="imgCerrarPaginaToolBarperfil" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trperfilCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedaperfil" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedaperfil',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trperfilCabeceraBusquedas/super -->

		<tr id="trBusquedaperfil" class="busqueda" style="display:table-row">
			<td id="tdBusquedaperfil" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedaperfil" name="frmBusquedaperfil">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedaperfil" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trperfilBusquedas" class="busqueda" style="display:table-row"><td>
				<?php if(perfil_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 70%">
					<ul>
						<li id="listrVisibleBusquedaPorNombre" class="titulotab" style="display:table-row"><a href="#divstrVisibleBusquedaPorNombre"> Por Nombre</a></li>
						<li id="listrVisibleBusquedaPorNombre2" class="titulotab" style="display:table-row"><a href="#divstrVisibleBusquedaPorNombre2"> Por Nombre Alterno</a></li>
						<li id="listrVisibleFK_Idsistema" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idsistema"> Por Sistema</a></li>
					</ul>
				
					<div id="divstrVisibleBusquedaPorNombre">
					<table id="tblstrVisibleBusquedaPorNombre" class="busqueda">
					
						<tr>
						<td class="busquedatitulocampo"><span  class="busquedatitulocampo">Nombre</span>
						</td>
						<td align="center">
							<input id="BusquedaPorNombre-txtnombre" name="BusquedaPorNombre-txtnombre" type="text" class="form-control"  placeholder="Nombre"  title="Nombre"   size="20" >

						</td>
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarperfilBusquedaPorNombre" name="btnBuscarperfilBusquedaPorNombre" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleBusquedaPorNombre2">
					<table id="tblstrVisibleBusquedaPorNombre2" class="busqueda">
					
						<tr>
						<td class="busquedatitulocampo"><span  class="busquedatitulocampo">Nombre Alterno</span>
						</td>
						<td align="center">
							<input id="BusquedaPorNombre2-txtnombre2" name="BusquedaPorNombre2-txtnombre2" type="text" class="form-control"  placeholder="Nombre Alterno"  title="Nombre Alterno"   size="20" >

						</td>
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarperfilBusquedaPorNombre2" name="btnBuscarperfilBusquedaPorNombre2" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idsistema">
					<table id="tblstrVisibleFK_Idsistema" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Sistema</span>
						</td>
						<td align="center">
							<select id="FK_Idsistema-cmbid_sistema" name="FK_Idsistema-cmbid_sistema" title="Sistema" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarperfilFK_Idsistema" name="btnBuscarperfilFK_Idsistema" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscarperfil" style="display:table-row">
					<td id="tdParamsBuscarperfil">
		<?php if(perfil_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscarperfil">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistrosperfil" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistrosperfil"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistrosperfil" name="ParamsBuscar-txtNumeroRegistrosperfil" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacionperfil">
							<td id="tdGenerarReporteperfil" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodosperfil" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodosperfil" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacionperfil" name="btnRecargarInformacionperfil" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginaperfil" name="btnImprimirPaginaperfil" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*perfil_web::$STR_ES_BUSQUEDA=='false'  &&*/ perfil_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderByperfil">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderByperfil" name="btnOrderByperfil" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
													</td>
													<td>
														<input type="button" id="btnOrderByRelperfil" name="btnOrderByRelperfil" title="RELACIONES DE DATOS" value="   Rels" class="btn btn-primary"/>
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

										<?php if(perfil_web::$STR_ES_RELACIONES=='false' && perfil_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbTiposRelaciones" name="ParamsBuscar-cmbTiposRelaciones" title="TIPOS DE RELACIONES" style="width:150px"></select>
										</td>
										<?php } ?>

										<?php if(perfil_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdperfilConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodosperfil -->

							</td><!-- tdGenerarReporteperfil -->
						</tr><!-- trRecargarInformacionperfil -->
					</table><!-- tblParamsBuscarNumeroRegistrosperfil -->
				</div> <!-- divParamsBuscarperfil -->
		<?php } ?>
				</td> <!-- tdParamsBuscarperfil -->
				</tr><!-- trParamsBuscarperfil -->
				</table> <!-- tblBusquedaperfil -->
				</form> <!-- frmBusquedaperfil -->
				

			</td> <!-- tdBusquedaperfil -->
		</tr> <!-- trBusquedaperfil/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(perfil_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divperfilPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblperfilPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmperfilAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnperfilAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="perfil_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnperfilAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmperfilAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblperfilPopupAjaxWebPart -->
		</div> <!-- divperfilPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(perfil_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trperfilTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdaperfil"></a>
		<img id="imgTablaParaDerechaperfil" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechaperfil'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdaperfil" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdaperfil'"/>
		<a id="TablaDerechaperfil"></a>
	</td>
</tr> <!-- trperfilTablaNavegacion/super -->
<?php } ?>

<tr id="trperfilTablaDatos">
	<td colspan="3" id="htmlTableCellperfil">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatosperfilsAjaxWebPart">
		</div>
	</td>
</tr> <!-- trperfilTablaDatos/super -->
		
		
		<tr id="trperfilPaginacion" style="display:table-row">
			<td id="tdperfilPaginacion" align="center">
				<div id="divperfilPaginacionAjaxWebPart">
				<form id="frmPaginacionperfil" name="frmPaginacionperfil">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacionperfil" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:center">
					<tr>
						<?php if(perfil_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkperfil" name="btnSeleccionarLoteFkperfil" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(perfil_web::$STR_ES_RELACIONADO=='false' /*&& perfil_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnterioresperfil" name="btnAnterioresperfil" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(perfil_web::$STR_ES_BUSQUEDA=='false' && perfil_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdperfilNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPrepararperfil" name="btnNuevoTablaPrepararperfil" title="NUEVO Perfil" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablaperfil" name="ParamsPaginar-txtNumeroNuevoTablaperfil" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(perfil_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdperfilConEditarperfil">
							<label>
								<input id="ParamsBuscar-chbConEditarperfil" name="ParamsBuscar-chbConEditarperfil" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(perfil_web::$STR_ES_RELACIONADO=='false'/* && perfil_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientesperfil" name="btnSiguientesperfil" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacionperfil -->
				</form> <!-- frmPaginacionperfil -->
				<form id="frmNuevoPrepararperfil" name="frmNuevoPrepararperfil">
				<table id="tblNuevoPrepararperfil" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:center">
					<tr id="trperfilNuevo" height="10">
						<?php if(perfil_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdperfilNuevo" align="center">
							<input type="button" id="btnNuevoPrepararperfil" name="btnNuevoPrepararperfil" title="NUEVO Perfil" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdperfilGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambiosperfil" name="btnGuardarCambiosperfil" title="GUARDAR Perfil" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(perfil_web::$STR_ES_RELACIONADO=='false' && perfil_web::$STR_ES_RELACIONES=='false' && perfil_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdperfilDuplicar" align="center">
							<input type="button" id="btnDuplicarperfil" name="btnDuplicarperfil" title="DUPLICAR Perfil" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdperfilCopiar" align="center">
							<input type="button" id="btnCopiarperfil" name="btnCopiarperfil" title="COPIAR Perfil" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(perfil_web::$STR_ES_RELACIONADO=='false' && ((perfil_web::$STR_ES_RELACIONADO=='false' && perfil_web::$STR_ES_RELACIONES=='false') || perfil_web::$STR_ES_BUSQUEDA=='true'  || perfil_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdperfilCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginaperfil" name="btnCerrarPaginaperfil" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPrepararperfil -->
				</form> <!-- frmNuevoPrepararperfil -->
				</div> <!-- divperfilPaginacionAjaxWebPart -->
			</td> <!-- tdperfilPaginacion -->
		</tr> <!-- trperfilPaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(perfil_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionesperfilAjaxWebPart">
			<td id="tdAccionesRelacionesperfilAjaxWebPart">
				<div id="divAccionesRelacionesperfilAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionesperfilAjaxWebPart -->
		</tr> <!-- trAccionesRelacionesperfilAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderByperfil">
			<td id="tdOrderByperfil">
				<form id="frmOrderByperfil" name="frmOrderByperfil">
					<div id="divOrderByperfilAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
				<form id="frmOrderByRelperfil" name="frmOrderByRelperfil">
					<div id="divOrderByRelperfilAjaxWebPart" title="RELACIONES" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderByperfil -->
		</tr> <!-- trOrderByperfil/super -->
			
		
		
		
		
		
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
			
				import {perfil_webcontrol,perfil_webcontrol1} from './webroot/js/JavaScript/contabilidad/seguridad/perfil/js/webcontrol/perfil_webcontrol.js?random=1';
				
				perfil_webcontrol1.setperfil_constante(window.perfil_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(perfil_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

