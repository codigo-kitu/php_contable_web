<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\cuentascorrientes\banco\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Banco Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/cuentascorrientes/banco/util/banco_carga.php');
	use com\bydan\contabilidad\cuentascorrientes\banco\util\banco_carga;
	
	//include_once('com/bydan/contabilidad/cuentascorrientes/banco/presentation/view/banco_web.php');
	//use com\bydan\contabilidad\cuentascorrientes\banco\presentation\view\banco_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	banco_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	banco_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$banco_web1= new banco_web();	
	$banco_web1->cargarDatosGenerales();
	
	//$moduloActual=$banco_web1->moduloActual;
	//$usuarioActual=$banco_web1->usuarioActual;
	//$sessionBase=$banco_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$banco_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentascorrientes/banco/js/templating/banco_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentascorrientes/banco/js/templating/banco_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentascorrientes/banco/js/templating/banco_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentascorrientes/banco/js/templating/banco_datos_reporte_template.js'); ?>
		
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentascorrientes/banco/js/templating/banco_datos_relaciones_template.js'); ?>
			
						
		
		
		<?php 
			
		
			banco_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					banco_web::$GET_POST=$_GET;
				} else {
					banco_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			banco_web::$STR_NOMBRE_PAGINA = 'banco_view.php';
			banco_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			banco_web::$BIT_ES_PAGINA_FORM = 'false';
				
			banco_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {banco_constante,banco_constante1} from './webroot/js/JavaScript/contabilidad/cuentascorrientes/banco/js/util/banco_constante.js?random=1';
			import {banco_funcion,banco_funcion1} from './webroot/js/JavaScript/contabilidad/cuentascorrientes/banco/js/util/banco_funcion.js?random=1';
			
			let banco_constante2 = new banco_constante();
			
			banco_constante2.STR_NOMBRE_PAGINA="<?php echo(banco_web::$STR_NOMBRE_PAGINA); ?>";
			banco_constante2.STR_TYPE_ON_LOADbanco="<?php echo(banco_web::$STR_TYPE_ONLOAD); ?>";
			banco_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(banco_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			banco_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(banco_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			banco_constante2.STR_ACTION="<?php echo(banco_web::$STR_ACTION); ?>";
			banco_constante2.STR_ES_POPUP="<?php echo(banco_web::$STR_ES_POPUP); ?>";
			banco_constante2.STR_ES_BUSQUEDA="<?php echo(banco_web::$STR_ES_BUSQUEDA); ?>";
			banco_constante2.STR_FUNCION_JS="<?php echo(banco_web::$STR_FUNCION_JS); ?>";
			banco_constante2.BIG_ID_ACTUAL="<?php echo(banco_web::$BIG_ID_ACTUAL); ?>";
			banco_constante2.BIG_ID_OPCION="<?php echo(banco_web::$BIG_ID_OPCION); ?>";
			banco_constante2.STR_OBJETO_JS="<?php echo(banco_web::$STR_OBJETO_JS); ?>";
			banco_constante2.STR_ES_RELACIONES="<?php echo(banco_web::$STR_ES_RELACIONES); ?>";
			banco_constante2.STR_ES_RELACIONADO="<?php echo(banco_web::$STR_ES_RELACIONADO); ?>";
			banco_constante2.STR_ES_SUB_PAGINA="<?php echo(banco_web::$STR_ES_SUB_PAGINA); ?>";
			banco_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(banco_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			banco_constante2.BIT_ES_PAGINA_FORM=<?php echo(banco_web::$BIT_ES_PAGINA_FORM); ?>;
			banco_constante2.STR_SUFIJO="<?php echo(banco_web::$STR_SUF); ?>";//banco
			banco_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(banco_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//banco
			
			banco_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(banco_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			banco_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($banco_web1->moduloActual->getnombre()); ?>";
			banco_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(banco_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			banco_constante2.BIT_ES_LOAD_NORMAL=true;
			/*banco_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			banco_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.banco_constante2 = banco_constante2;
			
		</script>
		
		<?php if(banco_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.banco_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.banco_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="bancoActual" ></a>
	
	<div id="divResumenbancoActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(banco_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(banco_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(banco_web::$STR_ES_BUSQUEDA=='false' && banco_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(banco_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(banco_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(banco_web::$STR_ES_RELACIONADO=='false' && banco_web::$STR_ES_POPUP=='false' && banco_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tdbancoNuevoToolBar">
										<img id="imgNuevoToolBarbanco" name="imgNuevoToolBarbanco" title="Nuevo Banco" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(banco_web::$STR_ES_BUSQUEDA=='false' && banco_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdbancoNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBarbanco" name="imgNuevoGuardarCambiosToolBarbanco" title="Nuevo TABLA Banco" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(banco_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdbancoGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBarbanco" name="imgGuardarCambiosToolBarbanco" title="Guardar Banco" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(banco_web::$STR_ES_RELACIONADO=='false' && banco_web::$STR_ES_RELACIONES=='false' && banco_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdbancoCopiarToolBar">
										<img id="imgCopiarToolBarbanco" name="imgCopiarToolBarbanco" title="Copiar Banco" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdbancoDuplicarToolBar">
										<img id="imgDuplicarToolBarbanco" name="imgDuplicarToolBarbanco" title="Duplicar Banco" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(banco_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdbancoRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBarbanco" name="imgRecargarInformacionToolBarbanco" title="Recargar Banco" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdbancoAnterioresToolBar">
										<img id="imgAnterioresToolBarbanco" name="imgAnterioresToolBarbanco" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdbancoSiguientesToolBar">
										<img id="imgSiguientesToolBarbanco" name="imgSiguientesToolBarbanco" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdbancoAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBarbanco" name="imgAbrirOrderByToolBarbanco" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((banco_web::$STR_ES_RELACIONADO=='false' && banco_web::$STR_ES_RELACIONES=='false') || banco_web::$STR_ES_BUSQUEDA=='true'  || banco_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdbancoCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBarbanco" name="imgCerrarPaginaToolBarbanco" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trbancoCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedabanco" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedabanco',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trbancoCabeceraBusquedas/super -->

		<tr id="trBusquedabanco" class="busqueda" style="display:table-row">
			<td id="tdBusquedabanco" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedabanco" name="frmBusquedabanco">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedabanco" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trbancoBusquedas" class="busqueda" style="display:none"><td>
				<?php if(banco_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 70%">
				
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscarbanco" style="display:table-row">
					<td id="tdParamsBuscarbanco">
		<?php if(banco_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscarbanco">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistrosbanco" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistrosbanco"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistrosbanco" name="ParamsBuscar-txtNumeroRegistrosbanco" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacionbanco">
							<td id="tdGenerarReportebanco" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodosbanco" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodosbanco" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacionbanco" name="btnRecargarInformacionbanco" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginabanco" name="btnImprimirPaginabanco" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*banco_web::$STR_ES_BUSQUEDA=='false'  &&*/ banco_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderBybanco">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderBybanco" name="btnOrderBybanco" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
													</td>
													<td>
														<input type="button" id="btnOrderByRelbanco" name="btnOrderByRelbanco" title="RELACIONES DE DATOS" value="   Rels" class="btn btn-primary"/>
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

										<?php if(banco_web::$STR_ES_RELACIONES=='false' && banco_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbTiposRelaciones" name="ParamsBuscar-cmbTiposRelaciones" title="TIPOS DE RELACIONES" style="width:150px"></select>
										</td>
										<?php } ?>

										<?php if(banco_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdbancoConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodosbanco -->

							</td><!-- tdGenerarReportebanco -->
						</tr><!-- trRecargarInformacionbanco -->
					</table><!-- tblParamsBuscarNumeroRegistrosbanco -->
				</div> <!-- divParamsBuscarbanco -->
		<?php } ?>
				</td> <!-- tdParamsBuscarbanco -->
				</tr><!-- trParamsBuscarbanco -->
				</table> <!-- tblBusquedabanco -->
				</form> <!-- frmBusquedabanco -->
				

			</td> <!-- tdBusquedabanco -->
		</tr> <!-- trBusquedabanco/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(banco_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divbancoPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblbancoPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmbancoAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnbancoAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="banco_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnbancoAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmbancoAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblbancoPopupAjaxWebPart -->
		</div> <!-- divbancoPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(banco_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trbancoTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdabanco"></a>
		<img id="imgTablaParaDerechabanco" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechabanco'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdabanco" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdabanco'"/>
		<a id="TablaDerechabanco"></a>
	</td>
</tr> <!-- trbancoTablaNavegacion/super -->
<?php } ?>

<tr id="trbancoTablaDatos">
	<td colspan="3" id="htmlTableCellbanco">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatosbancosAjaxWebPart">
		</div>
	</td>
</tr> <!-- trbancoTablaDatos/super -->
		
		
		<tr id="trbancoPaginacion" style="display:table-row">
			<td id="tdbancoPaginacion" align="center">
				<div id="divbancoPaginacionAjaxWebPart">
				<form id="frmPaginacionbanco" name="frmPaginacionbanco">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacionbanco" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:center">
					<tr>
						<?php if(banco_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkbanco" name="btnSeleccionarLoteFkbanco" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(banco_web::$STR_ES_RELACIONADO=='false' /*&& banco_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnterioresbanco" name="btnAnterioresbanco" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(banco_web::$STR_ES_BUSQUEDA=='false' && banco_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdbancoNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPrepararbanco" name="btnNuevoTablaPrepararbanco" title="NUEVO Banco" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablabanco" name="ParamsPaginar-txtNumeroNuevoTablabanco" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(banco_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdbancoConEditarbanco">
							<label>
								<input id="ParamsBuscar-chbConEditarbanco" name="ParamsBuscar-chbConEditarbanco" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(banco_web::$STR_ES_RELACIONADO=='false'/* && banco_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientesbanco" name="btnSiguientesbanco" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacionbanco -->
				</form> <!-- frmPaginacionbanco -->
				<form id="frmNuevoPrepararbanco" name="frmNuevoPrepararbanco">
				<table id="tblNuevoPrepararbanco" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:center">
					<tr id="trbancoNuevo" height="10">
						<?php if(banco_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdbancoNuevo" align="center">
							<input type="button" id="btnNuevoPrepararbanco" name="btnNuevoPrepararbanco" title="NUEVO Banco" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdbancoGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambiosbanco" name="btnGuardarCambiosbanco" title="GUARDAR Banco" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(banco_web::$STR_ES_RELACIONADO=='false' && banco_web::$STR_ES_RELACIONES=='false' && banco_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdbancoDuplicar" align="center">
							<input type="button" id="btnDuplicarbanco" name="btnDuplicarbanco" title="DUPLICAR Banco" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdbancoCopiar" align="center">
							<input type="button" id="btnCopiarbanco" name="btnCopiarbanco" title="COPIAR Banco" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(banco_web::$STR_ES_RELACIONADO=='false' && ((banco_web::$STR_ES_RELACIONADO=='false' && banco_web::$STR_ES_RELACIONES=='false') || banco_web::$STR_ES_BUSQUEDA=='true'  || banco_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdbancoCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginabanco" name="btnCerrarPaginabanco" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPrepararbanco -->
				</form> <!-- frmNuevoPrepararbanco -->
				</div> <!-- divbancoPaginacionAjaxWebPart -->
			</td> <!-- tdbancoPaginacion -->
		</tr> <!-- trbancoPaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(banco_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionesbancoAjaxWebPart">
			<td id="tdAccionesRelacionesbancoAjaxWebPart">
				<div id="divAccionesRelacionesbancoAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionesbancoAjaxWebPart -->
		</tr> <!-- trAccionesRelacionesbancoAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderBybanco">
			<td id="tdOrderBybanco">
				<form id="frmOrderBybanco" name="frmOrderBybanco">
					<div id="divOrderBybancoAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
				<form id="frmOrderByRelbanco" name="frmOrderByRelbanco">
					<div id="divOrderByRelbancoAjaxWebPart" title="RELACIONES" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderBybanco -->
		</tr> <!-- trOrderBybanco/super -->
			
		
		
		
		
		
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
			
				import {banco_webcontrol,banco_webcontrol1} from './webroot/js/JavaScript/contabilidad/cuentascorrientes/banco/js/webcontrol/banco_webcontrol.js?random=1';
				
				banco_webcontrol1.setbanco_constante(window.banco_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(banco_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

