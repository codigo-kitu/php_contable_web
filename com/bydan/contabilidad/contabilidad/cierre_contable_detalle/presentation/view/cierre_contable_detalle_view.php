<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\contabilidad\cierre_contable_detalle\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Cierre Detalle Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/contabilidad/cierre_contable_detalle/util/cierre_contable_detalle_carga.php');
	use com\bydan\contabilidad\contabilidad\cierre_contable_detalle\util\cierre_contable_detalle_carga;
	
	//include_once('com/bydan/contabilidad/contabilidad/cierre_contable_detalle/presentation/view/cierre_contable_detalle_web.php');
	//use com\bydan\contabilidad\contabilidad\cierre_contable_detalle\presentation\view\cierre_contable_detalle_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	cierre_contable_detalle_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	cierre_contable_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$cierre_contable_detalle_web1= new cierre_contable_detalle_web();	
	$cierre_contable_detalle_web1->cargarDatosGenerales();
	
	//$moduloActual=$cierre_contable_detalle_web1->moduloActual;
	//$usuarioActual=$cierre_contable_detalle_web1->usuarioActual;
	//$sessionBase=$cierre_contable_detalle_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$cierre_contable_detalle_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/contabilidad/cierre_contable_detalle/js/templating/cierre_contable_detalle_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/contabilidad/cierre_contable_detalle/js/templating/cierre_contable_detalle_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/contabilidad/cierre_contable_detalle/js/templating/cierre_contable_detalle_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/contabilidad/cierre_contable_detalle/js/templating/cierre_contable_detalle_datos_reporte_template.js'); ?>
		
			
						
		
		
		<?php 
			
		
			cierre_contable_detalle_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					cierre_contable_detalle_web::$GET_POST=$_GET;
				} else {
					cierre_contable_detalle_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			cierre_contable_detalle_web::$STR_NOMBRE_PAGINA = 'cierre_contable_detalle_view.php';
			cierre_contable_detalle_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			cierre_contable_detalle_web::$BIT_ES_PAGINA_FORM = 'false';
				
			cierre_contable_detalle_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {cierre_contable_detalle_constante,cierre_contable_detalle_constante1} from './webroot/js/JavaScript/contabilidad/contabilidad/cierre_contable_detalle/js/util/cierre_contable_detalle_constante.js?random=1';
			import {cierre_contable_detalle_funcion,cierre_contable_detalle_funcion1} from './webroot/js/JavaScript/contabilidad/contabilidad/cierre_contable_detalle/js/util/cierre_contable_detalle_funcion.js?random=1';
			
			let cierre_contable_detalle_constante2 = new cierre_contable_detalle_constante();
			
			cierre_contable_detalle_constante2.STR_NOMBRE_PAGINA="<?php echo(cierre_contable_detalle_web::$STR_NOMBRE_PAGINA); ?>";
			cierre_contable_detalle_constante2.STR_TYPE_ON_LOADcierre_contable_detalle="<?php echo(cierre_contable_detalle_web::$STR_TYPE_ONLOAD); ?>";
			cierre_contable_detalle_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(cierre_contable_detalle_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			cierre_contable_detalle_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(cierre_contable_detalle_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			cierre_contable_detalle_constante2.STR_ACTION="<?php echo(cierre_contable_detalle_web::$STR_ACTION); ?>";
			cierre_contable_detalle_constante2.STR_ES_POPUP="<?php echo(cierre_contable_detalle_web::$STR_ES_POPUP); ?>";
			cierre_contable_detalle_constante2.STR_ES_BUSQUEDA="<?php echo(cierre_contable_detalle_web::$STR_ES_BUSQUEDA); ?>";
			cierre_contable_detalle_constante2.STR_FUNCION_JS="<?php echo(cierre_contable_detalle_web::$STR_FUNCION_JS); ?>";
			cierre_contable_detalle_constante2.BIG_ID_ACTUAL="<?php echo(cierre_contable_detalle_web::$BIG_ID_ACTUAL); ?>";
			cierre_contable_detalle_constante2.BIG_ID_OPCION="<?php echo(cierre_contable_detalle_web::$BIG_ID_OPCION); ?>";
			cierre_contable_detalle_constante2.STR_OBJETO_JS="<?php echo(cierre_contable_detalle_web::$STR_OBJETO_JS); ?>";
			cierre_contable_detalle_constante2.STR_ES_RELACIONES="<?php echo(cierre_contable_detalle_web::$STR_ES_RELACIONES); ?>";
			cierre_contable_detalle_constante2.STR_ES_RELACIONADO="<?php echo(cierre_contable_detalle_web::$STR_ES_RELACIONADO); ?>";
			cierre_contable_detalle_constante2.STR_ES_SUB_PAGINA="<?php echo(cierre_contable_detalle_web::$STR_ES_SUB_PAGINA); ?>";
			cierre_contable_detalle_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(cierre_contable_detalle_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			cierre_contable_detalle_constante2.BIT_ES_PAGINA_FORM=<?php echo(cierre_contable_detalle_web::$BIT_ES_PAGINA_FORM); ?>;
			cierre_contable_detalle_constante2.STR_SUFIJO="<?php echo(cierre_contable_detalle_web::$STR_SUF); ?>";//cierre_contable_detalle
			cierre_contable_detalle_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(cierre_contable_detalle_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//cierre_contable_detalle
			
			cierre_contable_detalle_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(cierre_contable_detalle_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			cierre_contable_detalle_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($cierre_contable_detalle_web1->moduloActual->getnombre()); ?>";
			cierre_contable_detalle_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(cierre_contable_detalle_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			cierre_contable_detalle_constante2.BIT_ES_LOAD_NORMAL=true;
			/*cierre_contable_detalle_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			cierre_contable_detalle_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.cierre_contable_detalle_constante2 = cierre_contable_detalle_constante2;
			
		</script>
		
		<?php if(cierre_contable_detalle_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.cierre_contable_detalle_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.cierre_contable_detalle_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="cierre_contable_detalleActual" ></a>
	
	<div id="divResumencierre_contable_detalleActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(cierre_contable_detalle_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(cierre_contable_detalle_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(cierre_contable_detalle_web::$STR_ES_BUSQUEDA=='false' && cierre_contable_detalle_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(cierre_contable_detalle_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(cierre_contable_detalle_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(cierre_contable_detalle_web::$STR_ES_RELACIONADO=='false' && cierre_contable_detalle_web::$STR_ES_POPUP=='false' && cierre_contable_detalle_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tdcierre_contable_detalleNuevoToolBar">
										<img id="imgNuevoToolBarcierre_contable_detalle" name="imgNuevoToolBarcierre_contable_detalle" title="Nuevo Cierre Detalle" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(cierre_contable_detalle_web::$STR_ES_BUSQUEDA=='false' && cierre_contable_detalle_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdcierre_contable_detalleNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBarcierre_contable_detalle" name="imgNuevoGuardarCambiosToolBarcierre_contable_detalle" title="Nuevo TABLA Cierre Detalle" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(cierre_contable_detalle_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdcierre_contable_detalleGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBarcierre_contable_detalle" name="imgGuardarCambiosToolBarcierre_contable_detalle" title="Guardar Cierre Detalle" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(cierre_contable_detalle_web::$STR_ES_RELACIONADO=='false' && cierre_contable_detalle_web::$STR_ES_RELACIONES=='false' && cierre_contable_detalle_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdcierre_contable_detalleCopiarToolBar">
										<img id="imgCopiarToolBarcierre_contable_detalle" name="imgCopiarToolBarcierre_contable_detalle" title="Copiar Cierre Detalle" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdcierre_contable_detalleDuplicarToolBar">
										<img id="imgDuplicarToolBarcierre_contable_detalle" name="imgDuplicarToolBarcierre_contable_detalle" title="Duplicar Cierre Detalle" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(cierre_contable_detalle_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdcierre_contable_detalleRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBarcierre_contable_detalle" name="imgRecargarInformacionToolBarcierre_contable_detalle" title="Recargar Cierre Detalle" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdcierre_contable_detalleAnterioresToolBar">
										<img id="imgAnterioresToolBarcierre_contable_detalle" name="imgAnterioresToolBarcierre_contable_detalle" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdcierre_contable_detalleSiguientesToolBar">
										<img id="imgSiguientesToolBarcierre_contable_detalle" name="imgSiguientesToolBarcierre_contable_detalle" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdcierre_contable_detalleAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBarcierre_contable_detalle" name="imgAbrirOrderByToolBarcierre_contable_detalle" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((cierre_contable_detalle_web::$STR_ES_RELACIONADO=='false' && cierre_contable_detalle_web::$STR_ES_RELACIONES=='false') || cierre_contable_detalle_web::$STR_ES_BUSQUEDA=='true'  || cierre_contable_detalle_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdcierre_contable_detalleCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBarcierre_contable_detalle" name="imgCerrarPaginaToolBarcierre_contable_detalle" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trcierre_contable_detalleCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedacierre_contable_detalle" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedacierre_contable_detalle',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trcierre_contable_detalleCabeceraBusquedas/super -->

		<tr id="trBusquedacierre_contable_detalle" class="busqueda" style="display:table-row">
			<td id="tdBusquedacierre_contable_detalle" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedacierre_contable_detalle" name="frmBusquedacierre_contable_detalle">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedacierre_contable_detalle" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trcierre_contable_detalleBusquedas" class="busqueda" style="display:table-row"><td>
				<?php if(cierre_contable_detalle_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 70%">
					<ul>
						<li id="listrVisibleFK_Idcierre_contable" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idcierre_contable"> Por Cierres Contables</a></li>
					</ul>
				
					<div id="divstrVisibleFK_Idcierre_contable">
					<table id="tblstrVisibleFK_Idcierre_contable" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Cierres Contables</span>
						</td>
						<td align="center">
							<select id="FK_Idcierre_contable-cmbid_cierre_contable" name="FK_Idcierre_contable-cmbid_cierre_contable" title="Cierres Contables" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarcierre_contable_detalleFK_Idcierre_contable" name="btnBuscarcierre_contable_detalleFK_Idcierre_contable" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscarcierre_contable_detalle" style="display:table-row">
					<td id="tdParamsBuscarcierre_contable_detalle">
		<?php if(cierre_contable_detalle_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscarcierre_contable_detalle">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistroscierre_contable_detalle" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistroscierre_contable_detalle"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistroscierre_contable_detalle" name="ParamsBuscar-txtNumeroRegistroscierre_contable_detalle" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacioncierre_contable_detalle">
							<td id="tdGenerarReportecierre_contable_detalle" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodoscierre_contable_detalle" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodoscierre_contable_detalle" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacioncierre_contable_detalle" name="btnRecargarInformacioncierre_contable_detalle" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginacierre_contable_detalle" name="btnImprimirPaginacierre_contable_detalle" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*cierre_contable_detalle_web::$STR_ES_BUSQUEDA=='false'  &&*/ cierre_contable_detalle_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderBycierre_contable_detalle">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderBycierre_contable_detalle" name="btnOrderBycierre_contable_detalle" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
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

										<?php if(cierre_contable_detalle_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdcierre_contable_detalleConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodoscierre_contable_detalle -->

							</td><!-- tdGenerarReportecierre_contable_detalle -->
						</tr><!-- trRecargarInformacioncierre_contable_detalle -->
					</table><!-- tblParamsBuscarNumeroRegistroscierre_contable_detalle -->
				</div> <!-- divParamsBuscarcierre_contable_detalle -->
		<?php } ?>
				</td> <!-- tdParamsBuscarcierre_contable_detalle -->
				</tr><!-- trParamsBuscarcierre_contable_detalle -->
				</table> <!-- tblBusquedacierre_contable_detalle -->
				</form> <!-- frmBusquedacierre_contable_detalle -->
				

			</td> <!-- tdBusquedacierre_contable_detalle -->
		</tr> <!-- trBusquedacierre_contable_detalle/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(cierre_contable_detalle_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divcierre_contable_detallePopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblcierre_contable_detallePopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmcierre_contable_detalleAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btncierre_contable_detalleAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="cierre_contable_detalle_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btncierre_contable_detalleAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmcierre_contable_detalleAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblcierre_contable_detallePopupAjaxWebPart -->
		</div> <!-- divcierre_contable_detallePopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(cierre_contable_detalle_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trcierre_contable_detalleTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdacierre_contable_detalle"></a>
		<img id="imgTablaParaDerechacierre_contable_detalle" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechacierre_contable_detalle'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdacierre_contable_detalle" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdacierre_contable_detalle'"/>
		<a id="TablaDerechacierre_contable_detalle"></a>
	</td>
</tr> <!-- trcierre_contable_detalleTablaNavegacion/super -->
<?php } ?>

<tr id="trcierre_contable_detalleTablaDatos">
	<td colspan="3" id="htmlTableCellcierre_contable_detalle">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatoscierre_contable_detallesAjaxWebPart">
		</div>
	</td>
</tr> <!-- trcierre_contable_detalleTablaDatos/super -->
		
		
		<tr id="trcierre_contable_detallePaginacion" style="display:table-row">
			<td id="tdcierre_contable_detallePaginacion" align="center">
				<div id="divcierre_contable_detallePaginacionAjaxWebPart">
				<form id="frmPaginacioncierre_contable_detalle" name="frmPaginacioncierre_contable_detalle">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacioncierre_contable_detalle" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:center">
					<tr>
						<?php if(cierre_contable_detalle_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkcierre_contable_detalle" name="btnSeleccionarLoteFkcierre_contable_detalle" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(cierre_contable_detalle_web::$STR_ES_RELACIONADO=='false' /*&& cierre_contable_detalle_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnteriorescierre_contable_detalle" name="btnAnteriorescierre_contable_detalle" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(cierre_contable_detalle_web::$STR_ES_BUSQUEDA=='false' && cierre_contable_detalle_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdcierre_contable_detalleNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPrepararcierre_contable_detalle" name="btnNuevoTablaPrepararcierre_contable_detalle" title="NUEVO Cierre Detalle" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablacierre_contable_detalle" name="ParamsPaginar-txtNumeroNuevoTablacierre_contable_detalle" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(cierre_contable_detalle_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdcierre_contable_detalleConEditarcierre_contable_detalle">
							<label>
								<input id="ParamsBuscar-chbConEditarcierre_contable_detalle" name="ParamsBuscar-chbConEditarcierre_contable_detalle" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(cierre_contable_detalle_web::$STR_ES_RELACIONADO=='false'/* && cierre_contable_detalle_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientescierre_contable_detalle" name="btnSiguientescierre_contable_detalle" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacioncierre_contable_detalle -->
				</form> <!-- frmPaginacioncierre_contable_detalle -->
				<form id="frmNuevoPrepararcierre_contable_detalle" name="frmNuevoPrepararcierre_contable_detalle">
				<table id="tblNuevoPrepararcierre_contable_detalle" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:center">
					<tr id="trcierre_contable_detalleNuevo" height="10">
						<?php if(cierre_contable_detalle_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdcierre_contable_detalleNuevo" align="center">
							<input type="button" id="btnNuevoPrepararcierre_contable_detalle" name="btnNuevoPrepararcierre_contable_detalle" title="NUEVO Cierre Detalle" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdcierre_contable_detalleGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambioscierre_contable_detalle" name="btnGuardarCambioscierre_contable_detalle" title="GUARDAR Cierre Detalle" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(cierre_contable_detalle_web::$STR_ES_RELACIONADO=='false' && cierre_contable_detalle_web::$STR_ES_RELACIONES=='false' && cierre_contable_detalle_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdcierre_contable_detalleDuplicar" align="center">
							<input type="button" id="btnDuplicarcierre_contable_detalle" name="btnDuplicarcierre_contable_detalle" title="DUPLICAR Cierre Detalle" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdcierre_contable_detalleCopiar" align="center">
							<input type="button" id="btnCopiarcierre_contable_detalle" name="btnCopiarcierre_contable_detalle" title="COPIAR Cierre Detalle" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(cierre_contable_detalle_web::$STR_ES_RELACIONADO=='false' && ((cierre_contable_detalle_web::$STR_ES_RELACIONADO=='false' && cierre_contable_detalle_web::$STR_ES_RELACIONES=='false') || cierre_contable_detalle_web::$STR_ES_BUSQUEDA=='true'  || cierre_contable_detalle_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdcierre_contable_detalleCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginacierre_contable_detalle" name="btnCerrarPaginacierre_contable_detalle" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPrepararcierre_contable_detalle -->
				</form> <!-- frmNuevoPrepararcierre_contable_detalle -->
				</div> <!-- divcierre_contable_detallePaginacionAjaxWebPart -->
			</td> <!-- tdcierre_contable_detallePaginacion -->
		</tr> <!-- trcierre_contable_detallePaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(cierre_contable_detalle_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionescierre_contable_detalleAjaxWebPart">
			<td id="tdAccionesRelacionescierre_contable_detalleAjaxWebPart">
				<div id="divAccionesRelacionescierre_contable_detalleAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionescierre_contable_detalleAjaxWebPart -->
		</tr> <!-- trAccionesRelacionescierre_contable_detalleAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderBycierre_contable_detalle">
			<td id="tdOrderBycierre_contable_detalle">
				<form id="frmOrderBycierre_contable_detalle" name="frmOrderBycierre_contable_detalle">
					<div id="divOrderBycierre_contable_detalleAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderBycierre_contable_detalle -->
		</tr> <!-- trOrderBycierre_contable_detalle/super -->
			
		
		
		
		
		
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
			
				import {cierre_contable_detalle_webcontrol,cierre_contable_detalle_webcontrol1} from './webroot/js/JavaScript/contabilidad/contabilidad/cierre_contable_detalle/js/webcontrol/cierre_contable_detalle_webcontrol.js?random=1';
				
				cierre_contable_detalle_webcontrol1.setcierre_contable_detalle_constante(window.cierre_contable_detalle_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(cierre_contable_detalle_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

