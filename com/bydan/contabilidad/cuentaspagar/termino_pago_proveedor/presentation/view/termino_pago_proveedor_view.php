<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Terminos Pago Proveedores Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/cuentaspagar/termino_pago_proveedor/util/termino_pago_proveedor_carga.php');
	use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\util\termino_pago_proveedor_carga;
	
	//include_once('com/bydan/contabilidad/cuentaspagar/termino_pago_proveedor/presentation/view/termino_pago_proveedor_web.php');
	//use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\presentation\view\termino_pago_proveedor_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	termino_pago_proveedor_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	termino_pago_proveedor_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$termino_pago_proveedor_web1= new termino_pago_proveedor_web();	
	$termino_pago_proveedor_web1->cargarDatosGenerales();
	
	//$moduloActual=$termino_pago_proveedor_web1->moduloActual;
	//$usuarioActual=$termino_pago_proveedor_web1->usuarioActual;
	//$sessionBase=$termino_pago_proveedor_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$termino_pago_proveedor_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentaspagar/termino_pago_proveedor/js/templating/termino_pago_proveedor_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentaspagar/termino_pago_proveedor/js/templating/termino_pago_proveedor_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentaspagar/termino_pago_proveedor/js/templating/termino_pago_proveedor_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentaspagar/termino_pago_proveedor/js/templating/termino_pago_proveedor_datos_reporte_template.js'); ?>
		
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentaspagar/termino_pago_proveedor/js/templating/termino_pago_proveedor_datos_relaciones_template.js'); ?>
			
						
		
		
		<?php 
			
		
			termino_pago_proveedor_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					termino_pago_proveedor_web::$GET_POST=$_GET;
				} else {
					termino_pago_proveedor_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			termino_pago_proveedor_web::$STR_NOMBRE_PAGINA = 'termino_pago_proveedor_view.php';
			termino_pago_proveedor_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			termino_pago_proveedor_web::$BIT_ES_PAGINA_FORM = 'false';
				
			termino_pago_proveedor_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {termino_pago_proveedor_constante,termino_pago_proveedor_constante1} from './webroot/js/JavaScript/contabilidad/cuentaspagar/termino_pago_proveedor/js/util/termino_pago_proveedor_constante.js?random=1';
			import {termino_pago_proveedor_funcion,termino_pago_proveedor_funcion1} from './webroot/js/JavaScript/contabilidad/cuentaspagar/termino_pago_proveedor/js/util/termino_pago_proveedor_funcion.js?random=1';
			
			let termino_pago_proveedor_constante2 = new termino_pago_proveedor_constante();
			
			termino_pago_proveedor_constante2.STR_NOMBRE_PAGINA="<?php echo(termino_pago_proveedor_web::$STR_NOMBRE_PAGINA); ?>";
			termino_pago_proveedor_constante2.STR_TYPE_ON_LOADtermino_pago_proveedor="<?php echo(termino_pago_proveedor_web::$STR_TYPE_ONLOAD); ?>";
			termino_pago_proveedor_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(termino_pago_proveedor_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			termino_pago_proveedor_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(termino_pago_proveedor_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			termino_pago_proveedor_constante2.STR_ACTION="<?php echo(termino_pago_proveedor_web::$STR_ACTION); ?>";
			termino_pago_proveedor_constante2.STR_ES_POPUP="<?php echo(termino_pago_proveedor_web::$STR_ES_POPUP); ?>";
			termino_pago_proveedor_constante2.STR_ES_BUSQUEDA="<?php echo(termino_pago_proveedor_web::$STR_ES_BUSQUEDA); ?>";
			termino_pago_proveedor_constante2.STR_FUNCION_JS="<?php echo(termino_pago_proveedor_web::$STR_FUNCION_JS); ?>";
			termino_pago_proveedor_constante2.BIG_ID_ACTUAL="<?php echo(termino_pago_proveedor_web::$BIG_ID_ACTUAL); ?>";
			termino_pago_proveedor_constante2.BIG_ID_OPCION="<?php echo(termino_pago_proveedor_web::$BIG_ID_OPCION); ?>";
			termino_pago_proveedor_constante2.STR_OBJETO_JS="<?php echo(termino_pago_proveedor_web::$STR_OBJETO_JS); ?>";
			termino_pago_proveedor_constante2.STR_ES_RELACIONES="<?php echo(termino_pago_proveedor_web::$STR_ES_RELACIONES); ?>";
			termino_pago_proveedor_constante2.STR_ES_RELACIONADO="<?php echo(termino_pago_proveedor_web::$STR_ES_RELACIONADO); ?>";
			termino_pago_proveedor_constante2.STR_ES_SUB_PAGINA="<?php echo(termino_pago_proveedor_web::$STR_ES_SUB_PAGINA); ?>";
			termino_pago_proveedor_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(termino_pago_proveedor_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			termino_pago_proveedor_constante2.BIT_ES_PAGINA_FORM=<?php echo(termino_pago_proveedor_web::$BIT_ES_PAGINA_FORM); ?>;
			termino_pago_proveedor_constante2.STR_SUFIJO="<?php echo(termino_pago_proveedor_web::$STR_SUF); ?>";//termino_pago_proveedor
			termino_pago_proveedor_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(termino_pago_proveedor_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//termino_pago_proveedor
			
			termino_pago_proveedor_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(termino_pago_proveedor_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			termino_pago_proveedor_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($termino_pago_proveedor_web1->moduloActual->getnombre()); ?>";
			termino_pago_proveedor_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(termino_pago_proveedor_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			termino_pago_proveedor_constante2.BIT_ES_LOAD_NORMAL=true;
			/*termino_pago_proveedor_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			termino_pago_proveedor_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.termino_pago_proveedor_constante2 = termino_pago_proveedor_constante2;
			
		</script>
		
		<?php if(termino_pago_proveedor_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.termino_pago_proveedor_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.termino_pago_proveedor_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="termino_pago_proveedorActual" ></a>
	
	<div id="divResumentermino_pago_proveedorActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(termino_pago_proveedor_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(termino_pago_proveedor_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(termino_pago_proveedor_web::$STR_ES_BUSQUEDA=='false' && termino_pago_proveedor_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(termino_pago_proveedor_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(termino_pago_proveedor_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(termino_pago_proveedor_web::$STR_ES_RELACIONADO=='false' && termino_pago_proveedor_web::$STR_ES_POPUP=='false' && termino_pago_proveedor_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tdtermino_pago_proveedorNuevoToolBar">
										<img id="imgNuevoToolBartermino_pago_proveedor" name="imgNuevoToolBartermino_pago_proveedor" title="Nuevo Terminos Pago Proveedores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(termino_pago_proveedor_web::$STR_ES_BUSQUEDA=='false' && termino_pago_proveedor_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdtermino_pago_proveedorNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBartermino_pago_proveedor" name="imgNuevoGuardarCambiosToolBartermino_pago_proveedor" title="Nuevo TABLA Terminos Pago Proveedores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(termino_pago_proveedor_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdtermino_pago_proveedorGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBartermino_pago_proveedor" name="imgGuardarCambiosToolBartermino_pago_proveedor" title="Guardar Terminos Pago Proveedores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(termino_pago_proveedor_web::$STR_ES_RELACIONADO=='false' && termino_pago_proveedor_web::$STR_ES_RELACIONES=='false' && termino_pago_proveedor_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdtermino_pago_proveedorCopiarToolBar">
										<img id="imgCopiarToolBartermino_pago_proveedor" name="imgCopiarToolBartermino_pago_proveedor" title="Copiar Terminos Pago Proveedores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdtermino_pago_proveedorDuplicarToolBar">
										<img id="imgDuplicarToolBartermino_pago_proveedor" name="imgDuplicarToolBartermino_pago_proveedor" title="Duplicar Terminos Pago Proveedores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(termino_pago_proveedor_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdtermino_pago_proveedorRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBartermino_pago_proveedor" name="imgRecargarInformacionToolBartermino_pago_proveedor" title="Recargar Terminos Pago Proveedores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdtermino_pago_proveedorAnterioresToolBar">
										<img id="imgAnterioresToolBartermino_pago_proveedor" name="imgAnterioresToolBartermino_pago_proveedor" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdtermino_pago_proveedorSiguientesToolBar">
										<img id="imgSiguientesToolBartermino_pago_proveedor" name="imgSiguientesToolBartermino_pago_proveedor" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdtermino_pago_proveedorAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBartermino_pago_proveedor" name="imgAbrirOrderByToolBartermino_pago_proveedor" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((termino_pago_proveedor_web::$STR_ES_RELACIONADO=='false' && termino_pago_proveedor_web::$STR_ES_RELACIONES=='false') || termino_pago_proveedor_web::$STR_ES_BUSQUEDA=='true'  || termino_pago_proveedor_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdtermino_pago_proveedorCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBartermino_pago_proveedor" name="imgCerrarPaginaToolBartermino_pago_proveedor" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trtermino_pago_proveedorCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedatermino_pago_proveedor" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedatermino_pago_proveedor',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trtermino_pago_proveedorCabeceraBusquedas/super -->

		<tr id="trBusquedatermino_pago_proveedor" class="busqueda" style="display:table-row">
			<td id="tdBusquedatermino_pago_proveedor" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedatermino_pago_proveedor" name="frmBusquedatermino_pago_proveedor">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedatermino_pago_proveedor" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trtermino_pago_proveedorBusquedas" class="busqueda" style="display:table-row"><td>
				<?php if(termino_pago_proveedor_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 70%">
					<ul>
						<li id="listrVisibleFK_Idcuenta" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idcuenta"> Por  Cuenta</a></li>
						<li id="listrVisibleFK_Idtipo_termino_pago" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idtipo_termino_pago"> Por Tipo Termino Pago</a></li>
					</ul>
				
					<div id="divstrVisibleFK_Idcuenta">
					<table id="tblstrVisibleFK_Idcuenta" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo"> Cuenta</span>
						</td>
						<td align="center">
							<select id="FK_Idcuenta-cmbid_cuenta" name="FK_Idcuenta-cmbid_cuenta" title=" Cuenta" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscartermino_pago_proveedorFK_Idcuenta" name="btnBuscartermino_pago_proveedorFK_Idcuenta" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idtipo_termino_pago">
					<table id="tblstrVisibleFK_Idtipo_termino_pago" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Tipo Termino Pago</span>
						</td>
						<td align="center">
							<select id="FK_Idtipo_termino_pago-cmbid_tipo_termino_pago" name="FK_Idtipo_termino_pago-cmbid_tipo_termino_pago" title="Tipo Termino Pago" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscartermino_pago_proveedorFK_Idtipo_termino_pago" name="btnBuscartermino_pago_proveedorFK_Idtipo_termino_pago" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscartermino_pago_proveedor" style="display:table-row">
					<td id="tdParamsBuscartermino_pago_proveedor">
		<?php if(termino_pago_proveedor_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscartermino_pago_proveedor">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistrostermino_pago_proveedor" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistrostermino_pago_proveedor"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistrostermino_pago_proveedor" name="ParamsBuscar-txtNumeroRegistrostermino_pago_proveedor" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformaciontermino_pago_proveedor">
							<td id="tdGenerarReportetermino_pago_proveedor" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodostermino_pago_proveedor" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodostermino_pago_proveedor" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformaciontermino_pago_proveedor" name="btnRecargarInformaciontermino_pago_proveedor" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginatermino_pago_proveedor" name="btnImprimirPaginatermino_pago_proveedor" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*termino_pago_proveedor_web::$STR_ES_BUSQUEDA=='false'  &&*/ termino_pago_proveedor_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderBytermino_pago_proveedor">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderBytermino_pago_proveedor" name="btnOrderBytermino_pago_proveedor" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
													</td>
													<td>
														<input type="button" id="btnOrderByReltermino_pago_proveedor" name="btnOrderByReltermino_pago_proveedor" title="RELACIONES DE DATOS" value="   Rels" class="btn btn-primary"/>
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

										<?php if(termino_pago_proveedor_web::$STR_ES_RELACIONES=='false' && termino_pago_proveedor_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbTiposRelaciones" name="ParamsBuscar-cmbTiposRelaciones" title="TIPOS DE RELACIONES" style="width:150px"></select>
										</td>
										<?php } ?>

										<?php if(termino_pago_proveedor_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdtermino_pago_proveedorConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodostermino_pago_proveedor -->

							</td><!-- tdGenerarReportetermino_pago_proveedor -->
						</tr><!-- trRecargarInformaciontermino_pago_proveedor -->
					</table><!-- tblParamsBuscarNumeroRegistrostermino_pago_proveedor -->
				</div> <!-- divParamsBuscartermino_pago_proveedor -->
		<?php } ?>
				</td> <!-- tdParamsBuscartermino_pago_proveedor -->
				</tr><!-- trParamsBuscartermino_pago_proveedor -->
				</table> <!-- tblBusquedatermino_pago_proveedor -->
				</form> <!-- frmBusquedatermino_pago_proveedor -->
				

			</td> <!-- tdBusquedatermino_pago_proveedor -->
		</tr> <!-- trBusquedatermino_pago_proveedor/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(termino_pago_proveedor_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divtermino_pago_proveedorPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tbltermino_pago_proveedorPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmtermino_pago_proveedorAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btntermino_pago_proveedorAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="termino_pago_proveedor_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btntermino_pago_proveedorAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmtermino_pago_proveedorAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tbltermino_pago_proveedorPopupAjaxWebPart -->
		</div> <!-- divtermino_pago_proveedorPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(termino_pago_proveedor_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trtermino_pago_proveedorTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdatermino_pago_proveedor"></a>
		<img id="imgTablaParaDerechatermino_pago_proveedor" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechatermino_pago_proveedor'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdatermino_pago_proveedor" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdatermino_pago_proveedor'"/>
		<a id="TablaDerechatermino_pago_proveedor"></a>
	</td>
</tr> <!-- trtermino_pago_proveedorTablaNavegacion/super -->
<?php } ?>

<tr id="trtermino_pago_proveedorTablaDatos">
	<td colspan="3" id="htmlTableCelltermino_pago_proveedor">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatostermino_pago_proveedorsAjaxWebPart">
		</div>
	</td>
</tr> <!-- trtermino_pago_proveedorTablaDatos/super -->
		
		
		<tr id="trtermino_pago_proveedorPaginacion" style="display:table-row">
			<td id="tdtermino_pago_proveedorPaginacion" align="left">
				<div id="divtermino_pago_proveedorPaginacionAjaxWebPart">
				<form id="frmPaginaciontermino_pago_proveedor" name="frmPaginaciontermino_pago_proveedor">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginaciontermino_pago_proveedor" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:left">
					<tr>
						<?php if(termino_pago_proveedor_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFktermino_pago_proveedor" name="btnSeleccionarLoteFktermino_pago_proveedor" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(termino_pago_proveedor_web::$STR_ES_RELACIONADO=='false' /*&& termino_pago_proveedor_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnteriorestermino_pago_proveedor" name="btnAnteriorestermino_pago_proveedor" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(termino_pago_proveedor_web::$STR_ES_BUSQUEDA=='false' && termino_pago_proveedor_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdtermino_pago_proveedorNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPreparartermino_pago_proveedor" name="btnNuevoTablaPreparartermino_pago_proveedor" title="NUEVO Terminos Pago Proveedores" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablatermino_pago_proveedor" name="ParamsPaginar-txtNumeroNuevoTablatermino_pago_proveedor" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(termino_pago_proveedor_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdtermino_pago_proveedorConEditartermino_pago_proveedor">
							<label>
								<input id="ParamsBuscar-chbConEditartermino_pago_proveedor" name="ParamsBuscar-chbConEditartermino_pago_proveedor" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(termino_pago_proveedor_web::$STR_ES_RELACIONADO=='false'/* && termino_pago_proveedor_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientestermino_pago_proveedor" name="btnSiguientestermino_pago_proveedor" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginaciontermino_pago_proveedor -->
				</form> <!-- frmPaginaciontermino_pago_proveedor -->
				<form id="frmNuevoPreparartermino_pago_proveedor" name="frmNuevoPreparartermino_pago_proveedor">
				<table id="tblNuevoPreparartermino_pago_proveedor" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:left">
					<tr id="trtermino_pago_proveedorNuevo" height="10">
						<?php if(termino_pago_proveedor_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdtermino_pago_proveedorNuevo" align="center">
							<input type="button" id="btnNuevoPreparartermino_pago_proveedor" name="btnNuevoPreparartermino_pago_proveedor" title="NUEVO Terminos Pago Proveedores" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdtermino_pago_proveedorGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambiostermino_pago_proveedor" name="btnGuardarCambiostermino_pago_proveedor" title="GUARDAR Terminos Pago Proveedores" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(termino_pago_proveedor_web::$STR_ES_RELACIONADO=='false' && termino_pago_proveedor_web::$STR_ES_RELACIONES=='false' && termino_pago_proveedor_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdtermino_pago_proveedorDuplicar" align="center">
							<input type="button" id="btnDuplicartermino_pago_proveedor" name="btnDuplicartermino_pago_proveedor" title="DUPLICAR Terminos Pago Proveedores" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdtermino_pago_proveedorCopiar" align="center">
							<input type="button" id="btnCopiartermino_pago_proveedor" name="btnCopiartermino_pago_proveedor" title="COPIAR Terminos Pago Proveedores" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(termino_pago_proveedor_web::$STR_ES_RELACIONADO=='false' && ((termino_pago_proveedor_web::$STR_ES_RELACIONADO=='false' && termino_pago_proveedor_web::$STR_ES_RELACIONES=='false') || termino_pago_proveedor_web::$STR_ES_BUSQUEDA=='true'  || termino_pago_proveedor_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdtermino_pago_proveedorCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginatermino_pago_proveedor" name="btnCerrarPaginatermino_pago_proveedor" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPreparartermino_pago_proveedor -->
				</form> <!-- frmNuevoPreparartermino_pago_proveedor -->
				</div> <!-- divtermino_pago_proveedorPaginacionAjaxWebPart -->
			</td> <!-- tdtermino_pago_proveedorPaginacion -->
		</tr> <!-- trtermino_pago_proveedorPaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(termino_pago_proveedor_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionestermino_pago_proveedorAjaxWebPart">
			<td id="tdAccionesRelacionestermino_pago_proveedorAjaxWebPart">
				<div id="divAccionesRelacionestermino_pago_proveedorAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionestermino_pago_proveedorAjaxWebPart -->
		</tr> <!-- trAccionesRelacionestermino_pago_proveedorAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderBytermino_pago_proveedor">
			<td id="tdOrderBytermino_pago_proveedor">
				<form id="frmOrderBytermino_pago_proveedor" name="frmOrderBytermino_pago_proveedor">
					<div id="divOrderBytermino_pago_proveedorAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
				<form id="frmOrderByReltermino_pago_proveedor" name="frmOrderByReltermino_pago_proveedor">
					<div id="divOrderByReltermino_pago_proveedorAjaxWebPart" title="RELACIONES" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderBytermino_pago_proveedor -->
		</tr> <!-- trOrderBytermino_pago_proveedor/super -->
			
		
		
		
		
		
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
			
				import {termino_pago_proveedor_webcontrol,termino_pago_proveedor_webcontrol1} from './webroot/js/JavaScript/contabilidad/cuentaspagar/termino_pago_proveedor/js/webcontrol/termino_pago_proveedor_webcontrol.js?random=1';
				
				termino_pago_proveedor_webcontrol1.settermino_pago_proveedor_constante(window.termino_pago_proveedor_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(termino_pago_proveedor_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

