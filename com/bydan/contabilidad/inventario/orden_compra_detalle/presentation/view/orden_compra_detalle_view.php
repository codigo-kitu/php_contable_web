<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\inventario\orden_compra_detalle\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Compras Detalle Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/inventario/orden_compra_detalle/util/orden_compra_detalle_carga.php');
	use com\bydan\contabilidad\inventario\orden_compra_detalle\util\orden_compra_detalle_carga;
	
	//include_once('com/bydan/contabilidad/inventario/orden_compra_detalle/presentation/view/orden_compra_detalle_web.php');
	//use com\bydan\contabilidad\inventario\orden_compra_detalle\presentation\view\orden_compra_detalle_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	orden_compra_detalle_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	orden_compra_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$orden_compra_detalle_web1= new orden_compra_detalle_web();	
	$orden_compra_detalle_web1->cargarDatosGenerales();
	
	//$moduloActual=$orden_compra_detalle_web1->moduloActual;
	//$usuarioActual=$orden_compra_detalle_web1->usuarioActual;
	//$sessionBase=$orden_compra_detalle_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$orden_compra_detalle_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/orden_compra_detalle/js/templating/orden_compra_detalle_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/orden_compra_detalle/js/templating/orden_compra_detalle_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/orden_compra_detalle/js/templating/orden_compra_detalle_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/orden_compra_detalle/js/templating/orden_compra_detalle_datos_reporte_template.js'); ?>
		
			
						
		
		
		<?php 
			
		
			orden_compra_detalle_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					orden_compra_detalle_web::$GET_POST=$_GET;
				} else {
					orden_compra_detalle_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			orden_compra_detalle_web::$STR_NOMBRE_PAGINA = 'orden_compra_detalle_view.php';
			orden_compra_detalle_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			orden_compra_detalle_web::$BIT_ES_PAGINA_FORM = 'false';
				
			orden_compra_detalle_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {orden_compra_detalle_constante,orden_compra_detalle_constante1} from './webroot/js/JavaScript/contabilidad/inventario/orden_compra_detalle/js/util/orden_compra_detalle_constante.js?random=1';
			import {orden_compra_detalle_funcion,orden_compra_detalle_funcion1} from './webroot/js/JavaScript/contabilidad/inventario/orden_compra_detalle/js/util/orden_compra_detalle_funcion.js?random=1';
			
			let orden_compra_detalle_constante2 = new orden_compra_detalle_constante();
			
			orden_compra_detalle_constante2.STR_NOMBRE_PAGINA="<?php echo(orden_compra_detalle_web::$STR_NOMBRE_PAGINA); ?>";
			orden_compra_detalle_constante2.STR_TYPE_ON_LOADorden_compra_detalle="<?php echo(orden_compra_detalle_web::$STR_TYPE_ONLOAD); ?>";
			orden_compra_detalle_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(orden_compra_detalle_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			orden_compra_detalle_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(orden_compra_detalle_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			orden_compra_detalle_constante2.STR_ACTION="<?php echo(orden_compra_detalle_web::$STR_ACTION); ?>";
			orden_compra_detalle_constante2.STR_ES_POPUP="<?php echo(orden_compra_detalle_web::$STR_ES_POPUP); ?>";
			orden_compra_detalle_constante2.STR_ES_BUSQUEDA="<?php echo(orden_compra_detalle_web::$STR_ES_BUSQUEDA); ?>";
			orden_compra_detalle_constante2.STR_FUNCION_JS="<?php echo(orden_compra_detalle_web::$STR_FUNCION_JS); ?>";
			orden_compra_detalle_constante2.BIG_ID_ACTUAL="<?php echo(orden_compra_detalle_web::$BIG_ID_ACTUAL); ?>";
			orden_compra_detalle_constante2.BIG_ID_OPCION="<?php echo(orden_compra_detalle_web::$BIG_ID_OPCION); ?>";
			orden_compra_detalle_constante2.STR_OBJETO_JS="<?php echo(orden_compra_detalle_web::$STR_OBJETO_JS); ?>";
			orden_compra_detalle_constante2.STR_ES_RELACIONES="<?php echo(orden_compra_detalle_web::$STR_ES_RELACIONES); ?>";
			orden_compra_detalle_constante2.STR_ES_RELACIONADO="<?php echo(orden_compra_detalle_web::$STR_ES_RELACIONADO); ?>";
			orden_compra_detalle_constante2.STR_ES_SUB_PAGINA="<?php echo(orden_compra_detalle_web::$STR_ES_SUB_PAGINA); ?>";
			orden_compra_detalle_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(orden_compra_detalle_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			orden_compra_detalle_constante2.BIT_ES_PAGINA_FORM=<?php echo(orden_compra_detalle_web::$BIT_ES_PAGINA_FORM); ?>;
			orden_compra_detalle_constante2.STR_SUFIJO="<?php echo(orden_compra_detalle_web::$STR_SUF); ?>";//orden_compra_detalle
			orden_compra_detalle_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(orden_compra_detalle_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//orden_compra_detalle
			
			orden_compra_detalle_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(orden_compra_detalle_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			orden_compra_detalle_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($orden_compra_detalle_web1->moduloActual->getnombre()); ?>";
			orden_compra_detalle_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(orden_compra_detalle_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			orden_compra_detalle_constante2.BIT_ES_LOAD_NORMAL=true;
			/*orden_compra_detalle_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			orden_compra_detalle_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.orden_compra_detalle_constante2 = orden_compra_detalle_constante2;
			
		</script>
		
		<?php if(orden_compra_detalle_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.orden_compra_detalle_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.orden_compra_detalle_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="orden_compra_detalleActual" ></a>
	
	<div id="divResumenorden_compra_detalleActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(orden_compra_detalle_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(orden_compra_detalle_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(orden_compra_detalle_web::$STR_ES_BUSQUEDA=='false' && orden_compra_detalle_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(orden_compra_detalle_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(orden_compra_detalle_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(orden_compra_detalle_web::$STR_ES_RELACIONADO=='false' && orden_compra_detalle_web::$STR_ES_POPUP=='false' && orden_compra_detalle_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tdorden_compra_detalleNuevoToolBar">
										<img id="imgNuevoToolBarorden_compra_detalle" name="imgNuevoToolBarorden_compra_detalle" title="Nuevo Compras Detalle" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(orden_compra_detalle_web::$STR_ES_BUSQUEDA=='false' && orden_compra_detalle_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdorden_compra_detalleNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBarorden_compra_detalle" name="imgNuevoGuardarCambiosToolBarorden_compra_detalle" title="Nuevo TABLA Compras Detalle" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(orden_compra_detalle_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdorden_compra_detalleGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBarorden_compra_detalle" name="imgGuardarCambiosToolBarorden_compra_detalle" title="Guardar Compras Detalle" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(orden_compra_detalle_web::$STR_ES_RELACIONADO=='false' && orden_compra_detalle_web::$STR_ES_RELACIONES=='false' && orden_compra_detalle_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdorden_compra_detalleCopiarToolBar">
										<img id="imgCopiarToolBarorden_compra_detalle" name="imgCopiarToolBarorden_compra_detalle" title="Copiar Compras Detalle" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdorden_compra_detalleDuplicarToolBar">
										<img id="imgDuplicarToolBarorden_compra_detalle" name="imgDuplicarToolBarorden_compra_detalle" title="Duplicar Compras Detalle" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(orden_compra_detalle_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdorden_compra_detalleRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBarorden_compra_detalle" name="imgRecargarInformacionToolBarorden_compra_detalle" title="Recargar Compras Detalle" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdorden_compra_detalleAnterioresToolBar">
										<img id="imgAnterioresToolBarorden_compra_detalle" name="imgAnterioresToolBarorden_compra_detalle" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdorden_compra_detalleSiguientesToolBar">
										<img id="imgSiguientesToolBarorden_compra_detalle" name="imgSiguientesToolBarorden_compra_detalle" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdorden_compra_detalleAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBarorden_compra_detalle" name="imgAbrirOrderByToolBarorden_compra_detalle" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((orden_compra_detalle_web::$STR_ES_RELACIONADO=='false' && orden_compra_detalle_web::$STR_ES_RELACIONES=='false') || orden_compra_detalle_web::$STR_ES_BUSQUEDA=='true'  || orden_compra_detalle_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdorden_compra_detalleCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBarorden_compra_detalle" name="imgCerrarPaginaToolBarorden_compra_detalle" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trorden_compra_detalleCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedaorden_compra_detalle" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedaorden_compra_detalle',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trorden_compra_detalleCabeceraBusquedas/super -->

		<tr id="trBusquedaorden_compra_detalle" class="busqueda" style="display:table-row">
			<td id="tdBusquedaorden_compra_detalle" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedaorden_compra_detalle" name="frmBusquedaorden_compra_detalle">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedaorden_compra_detalle" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trorden_compra_detalleBusquedas" class="busqueda" style="display:table-row"><td>
				<?php if(orden_compra_detalle_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 80%">
					<ul>
						<li id="listrVisibleFK_Idbodega" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idbodega"> Por Bodega</a></li>
						<li id="listrVisibleFK_Idorden_compra" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idorden_compra"> Por Orden Compra</a></li>
						<li id="listrVisibleFK_Idproducto" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idproducto"> Por Producto</a></li>
						<li id="listrVisibleFK_Idunidad" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idunidad"> Por Unidad</a></li>
					</ul>
				
					<div id="divstrVisibleFK_Idbodega">
					<table id="tblstrVisibleFK_Idbodega" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Bodega</span>
						</td>
						<td align="center">
							<select id="FK_Idbodega-cmbid_bodega" name="FK_Idbodega-cmbid_bodega" title="Bodega" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarorden_compra_detalleFK_Idbodega" name="btnBuscarorden_compra_detalleFK_Idbodega" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idorden_compra">
					<table id="tblstrVisibleFK_Idorden_compra" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Orden Compra</span>
						</td>
						<td align="center">
							<select id="FK_Idorden_compra-cmbid_orden_compra" name="FK_Idorden_compra-cmbid_orden_compra" title="Orden Compra" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarorden_compra_detalleFK_Idorden_compra" name="btnBuscarorden_compra_detalleFK_Idorden_compra" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idproducto">
					<table id="tblstrVisibleFK_Idproducto" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Producto</span>
						</td>
						<td align="center">
							<select id="FK_Idproducto-cmbid_producto" name="FK_Idproducto-cmbid_producto" title="Producto" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarorden_compra_detalleFK_Idproducto" name="btnBuscarorden_compra_detalleFK_Idproducto" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idunidad">
					<table id="tblstrVisibleFK_Idunidad" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Unidad</span>
						</td>
						<td align="center">
							<select id="FK_Idunidad-cmbid_unidad" name="FK_Idunidad-cmbid_unidad" title="Unidad" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarorden_compra_detalleFK_Idunidad" name="btnBuscarorden_compra_detalleFK_Idunidad" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscarorden_compra_detalle" style="display:table-row">
					<td id="tdParamsBuscarorden_compra_detalle">
		<?php if(orden_compra_detalle_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscarorden_compra_detalle">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistrosorden_compra_detalle" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistrosorden_compra_detalle"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistrosorden_compra_detalle" name="ParamsBuscar-txtNumeroRegistrosorden_compra_detalle" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacionorden_compra_detalle">
							<td id="tdGenerarReporteorden_compra_detalle" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodosorden_compra_detalle" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodosorden_compra_detalle" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacionorden_compra_detalle" name="btnRecargarInformacionorden_compra_detalle" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginaorden_compra_detalle" name="btnImprimirPaginaorden_compra_detalle" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*orden_compra_detalle_web::$STR_ES_BUSQUEDA=='false'  &&*/ orden_compra_detalle_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderByorden_compra_detalle">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderByorden_compra_detalle" name="btnOrderByorden_compra_detalle" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
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

										<?php if(orden_compra_detalle_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdorden_compra_detalleConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodosorden_compra_detalle -->

							</td><!-- tdGenerarReporteorden_compra_detalle -->
						</tr><!-- trRecargarInformacionorden_compra_detalle -->
					</table><!-- tblParamsBuscarNumeroRegistrosorden_compra_detalle -->
				</div> <!-- divParamsBuscarorden_compra_detalle -->
		<?php } ?>
				</td> <!-- tdParamsBuscarorden_compra_detalle -->
				</tr><!-- trParamsBuscarorden_compra_detalle -->
				</table> <!-- tblBusquedaorden_compra_detalle -->
				</form> <!-- frmBusquedaorden_compra_detalle -->
				

			</td> <!-- tdBusquedaorden_compra_detalle -->
		</tr> <!-- trBusquedaorden_compra_detalle/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(orden_compra_detalle_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divorden_compra_detallePopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblorden_compra_detallePopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmorden_compra_detalleAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnorden_compra_detalleAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="orden_compra_detalle_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnorden_compra_detalleAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmorden_compra_detalleAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblorden_compra_detallePopupAjaxWebPart -->
		</div> <!-- divorden_compra_detallePopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(orden_compra_detalle_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trorden_compra_detalleTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdaorden_compra_detalle"></a>
		<img id="imgTablaParaDerechaorden_compra_detalle" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechaorden_compra_detalle'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdaorden_compra_detalle" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdaorden_compra_detalle'"/>
		<a id="TablaDerechaorden_compra_detalle"></a>
	</td>
</tr> <!-- trorden_compra_detalleTablaNavegacion/super -->
<?php } ?>

<tr id="trorden_compra_detalleTablaDatos">
	<td colspan="3" id="htmlTableCellorden_compra_detalle">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatosorden_compra_detallesAjaxWebPart">
		</div>
	</td>
</tr> <!-- trorden_compra_detalleTablaDatos/super -->
		
		
		<tr id="trorden_compra_detallePaginacion" style="display:table-row">
			<td id="tdorden_compra_detallePaginacion" align="left">
				<div id="divorden_compra_detallePaginacionAjaxWebPart">
				<form id="frmPaginacionorden_compra_detalle" name="frmPaginacionorden_compra_detalle">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacionorden_compra_detalle" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:left">
					<tr>
						<?php if(orden_compra_detalle_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkorden_compra_detalle" name="btnSeleccionarLoteFkorden_compra_detalle" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(orden_compra_detalle_web::$STR_ES_RELACIONADO=='false' /*&& orden_compra_detalle_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnterioresorden_compra_detalle" name="btnAnterioresorden_compra_detalle" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(orden_compra_detalle_web::$STR_ES_BUSQUEDA=='false' && orden_compra_detalle_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdorden_compra_detalleNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPrepararorden_compra_detalle" name="btnNuevoTablaPrepararorden_compra_detalle" title="NUEVO Compras Detalle" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablaorden_compra_detalle" name="ParamsPaginar-txtNumeroNuevoTablaorden_compra_detalle" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(orden_compra_detalle_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdorden_compra_detalleConEditarorden_compra_detalle">
							<label>
								<input id="ParamsBuscar-chbConEditarorden_compra_detalle" name="ParamsBuscar-chbConEditarorden_compra_detalle" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(orden_compra_detalle_web::$STR_ES_RELACIONADO=='false'/* && orden_compra_detalle_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientesorden_compra_detalle" name="btnSiguientesorden_compra_detalle" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacionorden_compra_detalle -->
				</form> <!-- frmPaginacionorden_compra_detalle -->
				<form id="frmNuevoPrepararorden_compra_detalle" name="frmNuevoPrepararorden_compra_detalle">
				<table id="tblNuevoPrepararorden_compra_detalle" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:left">
					<tr id="trorden_compra_detalleNuevo" height="10">
						<?php if(orden_compra_detalle_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdorden_compra_detalleNuevo" align="center">
							<input type="button" id="btnNuevoPrepararorden_compra_detalle" name="btnNuevoPrepararorden_compra_detalle" title="NUEVO Compras Detalle" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdorden_compra_detalleGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambiosorden_compra_detalle" name="btnGuardarCambiosorden_compra_detalle" title="GUARDAR Compras Detalle" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(orden_compra_detalle_web::$STR_ES_RELACIONADO=='false' && orden_compra_detalle_web::$STR_ES_RELACIONES=='false' && orden_compra_detalle_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdorden_compra_detalleDuplicar" align="center">
							<input type="button" id="btnDuplicarorden_compra_detalle" name="btnDuplicarorden_compra_detalle" title="DUPLICAR Compras Detalle" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdorden_compra_detalleCopiar" align="center">
							<input type="button" id="btnCopiarorden_compra_detalle" name="btnCopiarorden_compra_detalle" title="COPIAR Compras Detalle" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(orden_compra_detalle_web::$STR_ES_RELACIONADO=='false' && ((orden_compra_detalle_web::$STR_ES_RELACIONADO=='false' && orden_compra_detalle_web::$STR_ES_RELACIONES=='false') || orden_compra_detalle_web::$STR_ES_BUSQUEDA=='true'  || orden_compra_detalle_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdorden_compra_detalleCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginaorden_compra_detalle" name="btnCerrarPaginaorden_compra_detalle" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPrepararorden_compra_detalle -->
				</form> <!-- frmNuevoPrepararorden_compra_detalle -->
				</div> <!-- divorden_compra_detallePaginacionAjaxWebPart -->
			</td> <!-- tdorden_compra_detallePaginacion -->
		</tr> <!-- trorden_compra_detallePaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(orden_compra_detalle_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionesorden_compra_detalleAjaxWebPart">
			<td id="tdAccionesRelacionesorden_compra_detalleAjaxWebPart">
				<div id="divAccionesRelacionesorden_compra_detalleAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionesorden_compra_detalleAjaxWebPart -->
		</tr> <!-- trAccionesRelacionesorden_compra_detalleAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderByorden_compra_detalle">
			<td id="tdOrderByorden_compra_detalle">
				<form id="frmOrderByorden_compra_detalle" name="frmOrderByorden_compra_detalle">
					<div id="divOrderByorden_compra_detalleAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderByorden_compra_detalle -->
		</tr> <!-- trOrderByorden_compra_detalle/super -->
			
		
		
		
		
		
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
			
				import {orden_compra_detalle_webcontrol,orden_compra_detalle_webcontrol1} from './webroot/js/JavaScript/contabilidad/inventario/orden_compra_detalle/js/webcontrol/orden_compra_detalle_webcontrol.js?random=1';
				
				orden_compra_detalle_webcontrol1.setorden_compra_detalle_constante(window.orden_compra_detalle_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(orden_compra_detalle_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

