<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\cuentascobrar\forma_pago_cliente\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Forma Pago Cliente Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/cuentascobrar/forma_pago_cliente/util/forma_pago_cliente_carga.php');
	use com\bydan\contabilidad\cuentascobrar\forma_pago_cliente\util\forma_pago_cliente_carga;
	
	//include_once('com/bydan/contabilidad/cuentascobrar/forma_pago_cliente/presentation/view/forma_pago_cliente_web.php');
	//use com\bydan\contabilidad\cuentascobrar\forma_pago_cliente\presentation\view\forma_pago_cliente_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	forma_pago_cliente_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	forma_pago_cliente_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$forma_pago_cliente_web1= new forma_pago_cliente_web();	
	$forma_pago_cliente_web1->cargarDatosGenerales();
	
	//$moduloActual=$forma_pago_cliente_web1->moduloActual;
	//$usuarioActual=$forma_pago_cliente_web1->usuarioActual;
	//$sessionBase=$forma_pago_cliente_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$forma_pago_cliente_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentascobrar/forma_pago_cliente/js/templating/forma_pago_cliente_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentascobrar/forma_pago_cliente/js/templating/forma_pago_cliente_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentascobrar/forma_pago_cliente/js/templating/forma_pago_cliente_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentascobrar/forma_pago_cliente/js/templating/forma_pago_cliente_datos_reporte_template.js'); ?>
		
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentascobrar/forma_pago_cliente/js/templating/forma_pago_cliente_datos_relaciones_template.js'); ?>
			
						
		
		
		<?php 
			
		
			forma_pago_cliente_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					forma_pago_cliente_web::$GET_POST=$_GET;
				} else {
					forma_pago_cliente_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			forma_pago_cliente_web::$STR_NOMBRE_PAGINA = 'forma_pago_cliente_view.php';
			forma_pago_cliente_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			forma_pago_cliente_web::$BIT_ES_PAGINA_FORM = 'false';
				
			forma_pago_cliente_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {forma_pago_cliente_constante,forma_pago_cliente_constante1} from './webroot/js/JavaScript/contabilidad/cuentascobrar/forma_pago_cliente/js/util/forma_pago_cliente_constante.js?random=1';
			import {forma_pago_cliente_funcion,forma_pago_cliente_funcion1} from './webroot/js/JavaScript/contabilidad/cuentascobrar/forma_pago_cliente/js/util/forma_pago_cliente_funcion.js?random=1';
			
			let forma_pago_cliente_constante2 = new forma_pago_cliente_constante();
			
			forma_pago_cliente_constante2.STR_NOMBRE_PAGINA="<?php echo(forma_pago_cliente_web::$STR_NOMBRE_PAGINA); ?>";
			forma_pago_cliente_constante2.STR_TYPE_ON_LOADforma_pago_cliente="<?php echo(forma_pago_cliente_web::$STR_TYPE_ONLOAD); ?>";
			forma_pago_cliente_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(forma_pago_cliente_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			forma_pago_cliente_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(forma_pago_cliente_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			forma_pago_cliente_constante2.STR_ACTION="<?php echo(forma_pago_cliente_web::$STR_ACTION); ?>";
			forma_pago_cliente_constante2.STR_ES_POPUP="<?php echo(forma_pago_cliente_web::$STR_ES_POPUP); ?>";
			forma_pago_cliente_constante2.STR_ES_BUSQUEDA="<?php echo(forma_pago_cliente_web::$STR_ES_BUSQUEDA); ?>";
			forma_pago_cliente_constante2.STR_FUNCION_JS="<?php echo(forma_pago_cliente_web::$STR_FUNCION_JS); ?>";
			forma_pago_cliente_constante2.BIG_ID_ACTUAL="<?php echo(forma_pago_cliente_web::$BIG_ID_ACTUAL); ?>";
			forma_pago_cliente_constante2.BIG_ID_OPCION="<?php echo(forma_pago_cliente_web::$BIG_ID_OPCION); ?>";
			forma_pago_cliente_constante2.STR_OBJETO_JS="<?php echo(forma_pago_cliente_web::$STR_OBJETO_JS); ?>";
			forma_pago_cliente_constante2.STR_ES_RELACIONES="<?php echo(forma_pago_cliente_web::$STR_ES_RELACIONES); ?>";
			forma_pago_cliente_constante2.STR_ES_RELACIONADO="<?php echo(forma_pago_cliente_web::$STR_ES_RELACIONADO); ?>";
			forma_pago_cliente_constante2.STR_ES_SUB_PAGINA="<?php echo(forma_pago_cliente_web::$STR_ES_SUB_PAGINA); ?>";
			forma_pago_cliente_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(forma_pago_cliente_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			forma_pago_cliente_constante2.BIT_ES_PAGINA_FORM=<?php echo(forma_pago_cliente_web::$BIT_ES_PAGINA_FORM); ?>;
			forma_pago_cliente_constante2.STR_SUFIJO="<?php echo(forma_pago_cliente_web::$STR_SUF); ?>";//forma_pago_cliente
			forma_pago_cliente_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(forma_pago_cliente_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//forma_pago_cliente
			
			forma_pago_cliente_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(forma_pago_cliente_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			forma_pago_cliente_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($forma_pago_cliente_web1->moduloActual->getnombre()); ?>";
			forma_pago_cliente_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(forma_pago_cliente_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			forma_pago_cliente_constante2.BIT_ES_LOAD_NORMAL=true;
			/*forma_pago_cliente_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			forma_pago_cliente_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.forma_pago_cliente_constante2 = forma_pago_cliente_constante2;
			
		</script>
		
		<?php if(forma_pago_cliente_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.forma_pago_cliente_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.forma_pago_cliente_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="forma_pago_clienteActual" ></a>
	
	<div id="divResumenforma_pago_clienteActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(forma_pago_cliente_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(forma_pago_cliente_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(forma_pago_cliente_web::$STR_ES_BUSQUEDA=='false' && forma_pago_cliente_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(forma_pago_cliente_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(forma_pago_cliente_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(forma_pago_cliente_web::$STR_ES_RELACIONADO=='false' && forma_pago_cliente_web::$STR_ES_POPUP=='false' && forma_pago_cliente_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tdforma_pago_clienteNuevoToolBar">
										<img id="imgNuevoToolBarforma_pago_cliente" name="imgNuevoToolBarforma_pago_cliente" title="Nuevo Forma Pago Cliente" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(forma_pago_cliente_web::$STR_ES_BUSQUEDA=='false' && forma_pago_cliente_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdforma_pago_clienteNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBarforma_pago_cliente" name="imgNuevoGuardarCambiosToolBarforma_pago_cliente" title="Nuevo TABLA Forma Pago Cliente" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(forma_pago_cliente_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdforma_pago_clienteGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBarforma_pago_cliente" name="imgGuardarCambiosToolBarforma_pago_cliente" title="Guardar Forma Pago Cliente" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(forma_pago_cliente_web::$STR_ES_RELACIONADO=='false' && forma_pago_cliente_web::$STR_ES_RELACIONES=='false' && forma_pago_cliente_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdforma_pago_clienteCopiarToolBar">
										<img id="imgCopiarToolBarforma_pago_cliente" name="imgCopiarToolBarforma_pago_cliente" title="Copiar Forma Pago Cliente" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdforma_pago_clienteDuplicarToolBar">
										<img id="imgDuplicarToolBarforma_pago_cliente" name="imgDuplicarToolBarforma_pago_cliente" title="Duplicar Forma Pago Cliente" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(forma_pago_cliente_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdforma_pago_clienteRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBarforma_pago_cliente" name="imgRecargarInformacionToolBarforma_pago_cliente" title="Recargar Forma Pago Cliente" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdforma_pago_clienteAnterioresToolBar">
										<img id="imgAnterioresToolBarforma_pago_cliente" name="imgAnterioresToolBarforma_pago_cliente" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdforma_pago_clienteSiguientesToolBar">
										<img id="imgSiguientesToolBarforma_pago_cliente" name="imgSiguientesToolBarforma_pago_cliente" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdforma_pago_clienteAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBarforma_pago_cliente" name="imgAbrirOrderByToolBarforma_pago_cliente" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((forma_pago_cliente_web::$STR_ES_RELACIONADO=='false' && forma_pago_cliente_web::$STR_ES_RELACIONES=='false') || forma_pago_cliente_web::$STR_ES_BUSQUEDA=='true'  || forma_pago_cliente_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdforma_pago_clienteCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBarforma_pago_cliente" name="imgCerrarPaginaToolBarforma_pago_cliente" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trforma_pago_clienteCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedaforma_pago_cliente" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedaforma_pago_cliente',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trforma_pago_clienteCabeceraBusquedas/super -->

		<tr id="trBusquedaforma_pago_cliente" class="busqueda" style="display:table-row">
			<td id="tdBusquedaforma_pago_cliente" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedaforma_pago_cliente" name="frmBusquedaforma_pago_cliente">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedaforma_pago_cliente" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trforma_pago_clienteBusquedas" class="busqueda" style="display:table-row"><td>
				<?php if(forma_pago_cliente_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 70%">
					<ul>
						<li id="listrVisibleFK_Idcuenta" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idcuenta"> Por  Cuenta</a></li>
						<li id="listrVisibleFK_Idtipo_forma_pago" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idtipo_forma_pago"> Por Tipo Forma Pago</a></li>
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
							<input type="button" id="btnBuscarforma_pago_clienteFK_Idcuenta" name="btnBuscarforma_pago_clienteFK_Idcuenta" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idtipo_forma_pago">
					<table id="tblstrVisibleFK_Idtipo_forma_pago" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Tipo Forma Pago</span>
						</td>
						<td align="center">
							<select id="FK_Idtipo_forma_pago-cmbid_tipo_forma_pago" name="FK_Idtipo_forma_pago-cmbid_tipo_forma_pago" title="Tipo Forma Pago" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarforma_pago_clienteFK_Idtipo_forma_pago" name="btnBuscarforma_pago_clienteFK_Idtipo_forma_pago" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscarforma_pago_cliente" style="display:table-row">
					<td id="tdParamsBuscarforma_pago_cliente">
		<?php if(forma_pago_cliente_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscarforma_pago_cliente">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistrosforma_pago_cliente" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistrosforma_pago_cliente"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistrosforma_pago_cliente" name="ParamsBuscar-txtNumeroRegistrosforma_pago_cliente" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacionforma_pago_cliente">
							<td id="tdGenerarReporteforma_pago_cliente" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodosforma_pago_cliente" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodosforma_pago_cliente" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacionforma_pago_cliente" name="btnRecargarInformacionforma_pago_cliente" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginaforma_pago_cliente" name="btnImprimirPaginaforma_pago_cliente" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*forma_pago_cliente_web::$STR_ES_BUSQUEDA=='false'  &&*/ forma_pago_cliente_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderByforma_pago_cliente">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderByforma_pago_cliente" name="btnOrderByforma_pago_cliente" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
													</td>
													<td>
														<input type="button" id="btnOrderByRelforma_pago_cliente" name="btnOrderByRelforma_pago_cliente" title="RELACIONES DE DATOS" value="   Rels" class="btn btn-primary"/>
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

										<?php if(forma_pago_cliente_web::$STR_ES_RELACIONES=='false' && forma_pago_cliente_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbTiposRelaciones" name="ParamsBuscar-cmbTiposRelaciones" title="TIPOS DE RELACIONES" style="width:150px"></select>
										</td>
										<?php } ?>

										<?php if(forma_pago_cliente_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdforma_pago_clienteConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodosforma_pago_cliente -->

							</td><!-- tdGenerarReporteforma_pago_cliente -->
						</tr><!-- trRecargarInformacionforma_pago_cliente -->
					</table><!-- tblParamsBuscarNumeroRegistrosforma_pago_cliente -->
				</div> <!-- divParamsBuscarforma_pago_cliente -->
		<?php } ?>
				</td> <!-- tdParamsBuscarforma_pago_cliente -->
				</tr><!-- trParamsBuscarforma_pago_cliente -->
				</table> <!-- tblBusquedaforma_pago_cliente -->
				</form> <!-- frmBusquedaforma_pago_cliente -->
				

			</td> <!-- tdBusquedaforma_pago_cliente -->
		</tr> <!-- trBusquedaforma_pago_cliente/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(forma_pago_cliente_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divforma_pago_clientePopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblforma_pago_clientePopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmforma_pago_clienteAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnforma_pago_clienteAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="forma_pago_cliente_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnforma_pago_clienteAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmforma_pago_clienteAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblforma_pago_clientePopupAjaxWebPart -->
		</div> <!-- divforma_pago_clientePopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(forma_pago_cliente_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trforma_pago_clienteTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdaforma_pago_cliente"></a>
		<img id="imgTablaParaDerechaforma_pago_cliente" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechaforma_pago_cliente'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdaforma_pago_cliente" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdaforma_pago_cliente'"/>
		<a id="TablaDerechaforma_pago_cliente"></a>
	</td>
</tr> <!-- trforma_pago_clienteTablaNavegacion/super -->
<?php } ?>

<tr id="trforma_pago_clienteTablaDatos">
	<td colspan="3" id="htmlTableCellforma_pago_cliente">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatosforma_pago_clientesAjaxWebPart">
		</div>
	</td>
</tr> <!-- trforma_pago_clienteTablaDatos/super -->
		
		
		<tr id="trforma_pago_clientePaginacion" style="display:table-row">
			<td id="tdforma_pago_clientePaginacion" align="center">
				<div id="divforma_pago_clientePaginacionAjaxWebPart">
				<form id="frmPaginacionforma_pago_cliente" name="frmPaginacionforma_pago_cliente">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacionforma_pago_cliente" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:center">
					<tr>
						<?php if(forma_pago_cliente_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkforma_pago_cliente" name="btnSeleccionarLoteFkforma_pago_cliente" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(forma_pago_cliente_web::$STR_ES_RELACIONADO=='false' /*&& forma_pago_cliente_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnterioresforma_pago_cliente" name="btnAnterioresforma_pago_cliente" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(forma_pago_cliente_web::$STR_ES_BUSQUEDA=='false' && forma_pago_cliente_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdforma_pago_clienteNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPrepararforma_pago_cliente" name="btnNuevoTablaPrepararforma_pago_cliente" title="NUEVO Forma Pago Cliente" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablaforma_pago_cliente" name="ParamsPaginar-txtNumeroNuevoTablaforma_pago_cliente" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(forma_pago_cliente_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdforma_pago_clienteConEditarforma_pago_cliente">
							<label>
								<input id="ParamsBuscar-chbConEditarforma_pago_cliente" name="ParamsBuscar-chbConEditarforma_pago_cliente" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(forma_pago_cliente_web::$STR_ES_RELACIONADO=='false'/* && forma_pago_cliente_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientesforma_pago_cliente" name="btnSiguientesforma_pago_cliente" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacionforma_pago_cliente -->
				</form> <!-- frmPaginacionforma_pago_cliente -->
				<form id="frmNuevoPrepararforma_pago_cliente" name="frmNuevoPrepararforma_pago_cliente">
				<table id="tblNuevoPrepararforma_pago_cliente" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:center">
					<tr id="trforma_pago_clienteNuevo" height="10">
						<?php if(forma_pago_cliente_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdforma_pago_clienteNuevo" align="center">
							<input type="button" id="btnNuevoPrepararforma_pago_cliente" name="btnNuevoPrepararforma_pago_cliente" title="NUEVO Forma Pago Cliente" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdforma_pago_clienteGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambiosforma_pago_cliente" name="btnGuardarCambiosforma_pago_cliente" title="GUARDAR Forma Pago Cliente" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(forma_pago_cliente_web::$STR_ES_RELACIONADO=='false' && forma_pago_cliente_web::$STR_ES_RELACIONES=='false' && forma_pago_cliente_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdforma_pago_clienteDuplicar" align="center">
							<input type="button" id="btnDuplicarforma_pago_cliente" name="btnDuplicarforma_pago_cliente" title="DUPLICAR Forma Pago Cliente" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdforma_pago_clienteCopiar" align="center">
							<input type="button" id="btnCopiarforma_pago_cliente" name="btnCopiarforma_pago_cliente" title="COPIAR Forma Pago Cliente" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(forma_pago_cliente_web::$STR_ES_RELACIONADO=='false' && ((forma_pago_cliente_web::$STR_ES_RELACIONADO=='false' && forma_pago_cliente_web::$STR_ES_RELACIONES=='false') || forma_pago_cliente_web::$STR_ES_BUSQUEDA=='true'  || forma_pago_cliente_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdforma_pago_clienteCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginaforma_pago_cliente" name="btnCerrarPaginaforma_pago_cliente" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPrepararforma_pago_cliente -->
				</form> <!-- frmNuevoPrepararforma_pago_cliente -->
				</div> <!-- divforma_pago_clientePaginacionAjaxWebPart -->
			</td> <!-- tdforma_pago_clientePaginacion -->
		</tr> <!-- trforma_pago_clientePaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(forma_pago_cliente_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionesforma_pago_clienteAjaxWebPart">
			<td id="tdAccionesRelacionesforma_pago_clienteAjaxWebPart">
				<div id="divAccionesRelacionesforma_pago_clienteAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionesforma_pago_clienteAjaxWebPart -->
		</tr> <!-- trAccionesRelacionesforma_pago_clienteAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderByforma_pago_cliente">
			<td id="tdOrderByforma_pago_cliente">
				<form id="frmOrderByforma_pago_cliente" name="frmOrderByforma_pago_cliente">
					<div id="divOrderByforma_pago_clienteAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
				<form id="frmOrderByRelforma_pago_cliente" name="frmOrderByRelforma_pago_cliente">
					<div id="divOrderByRelforma_pago_clienteAjaxWebPart" title="RELACIONES" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderByforma_pago_cliente -->
		</tr> <!-- trOrderByforma_pago_cliente/super -->
			
		
		
		
		
		
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
			
				import {forma_pago_cliente_webcontrol,forma_pago_cliente_webcontrol1} from './webroot/js/JavaScript/contabilidad/cuentascobrar/forma_pago_cliente/js/webcontrol/forma_pago_cliente_webcontrol.js?random=1';
				
				forma_pago_cliente_webcontrol1.setforma_pago_cliente_constante(window.forma_pago_cliente_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(forma_pago_cliente_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

