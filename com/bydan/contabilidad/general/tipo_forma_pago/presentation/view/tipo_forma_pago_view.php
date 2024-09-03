<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\general\tipo_forma_pago\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Tipo Forma Pago Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/general/tipo_forma_pago/util/tipo_forma_pago_carga.php');
	use com\bydan\contabilidad\general\tipo_forma_pago\util\tipo_forma_pago_carga;
	
	//include_once('com/bydan/contabilidad/general/tipo_forma_pago/presentation/view/tipo_forma_pago_web.php');
	//use com\bydan\contabilidad\general\tipo_forma_pago\presentation\view\tipo_forma_pago_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	tipo_forma_pago_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	tipo_forma_pago_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$tipo_forma_pago_web1= new tipo_forma_pago_web();	
	$tipo_forma_pago_web1->cargarDatosGenerales();
	
	//$moduloActual=$tipo_forma_pago_web1->moduloActual;
	//$usuarioActual=$tipo_forma_pago_web1->usuarioActual;
	//$sessionBase=$tipo_forma_pago_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$tipo_forma_pago_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/general/tipo_forma_pago/js/templating/tipo_forma_pago_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/general/tipo_forma_pago/js/templating/tipo_forma_pago_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/general/tipo_forma_pago/js/templating/tipo_forma_pago_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/general/tipo_forma_pago/js/templating/tipo_forma_pago_datos_reporte_template.js'); ?>
		
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/general/tipo_forma_pago/js/templating/tipo_forma_pago_datos_relaciones_template.js'); ?>
			
						
		
		
		<?php 
			
		
			tipo_forma_pago_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					tipo_forma_pago_web::$GET_POST=$_GET;
				} else {
					tipo_forma_pago_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			tipo_forma_pago_web::$STR_NOMBRE_PAGINA = 'tipo_forma_pago_view.php';
			tipo_forma_pago_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			tipo_forma_pago_web::$BIT_ES_PAGINA_FORM = 'false';
				
			tipo_forma_pago_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {tipo_forma_pago_constante,tipo_forma_pago_constante1} from './webroot/js/JavaScript/contabilidad/general/tipo_forma_pago/js/util/tipo_forma_pago_constante.js?random=1';
			import {tipo_forma_pago_funcion,tipo_forma_pago_funcion1} from './webroot/js/JavaScript/contabilidad/general/tipo_forma_pago/js/util/tipo_forma_pago_funcion.js?random=1';
			
			let tipo_forma_pago_constante2 = new tipo_forma_pago_constante();
			
			tipo_forma_pago_constante2.STR_NOMBRE_PAGINA="<?php echo(tipo_forma_pago_web::$STR_NOMBRE_PAGINA); ?>";
			tipo_forma_pago_constante2.STR_TYPE_ON_LOADtipo_forma_pago="<?php echo(tipo_forma_pago_web::$STR_TYPE_ONLOAD); ?>";
			tipo_forma_pago_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(tipo_forma_pago_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			tipo_forma_pago_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(tipo_forma_pago_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			tipo_forma_pago_constante2.STR_ACTION="<?php echo(tipo_forma_pago_web::$STR_ACTION); ?>";
			tipo_forma_pago_constante2.STR_ES_POPUP="<?php echo(tipo_forma_pago_web::$STR_ES_POPUP); ?>";
			tipo_forma_pago_constante2.STR_ES_BUSQUEDA="<?php echo(tipo_forma_pago_web::$STR_ES_BUSQUEDA); ?>";
			tipo_forma_pago_constante2.STR_FUNCION_JS="<?php echo(tipo_forma_pago_web::$STR_FUNCION_JS); ?>";
			tipo_forma_pago_constante2.BIG_ID_ACTUAL="<?php echo(tipo_forma_pago_web::$BIG_ID_ACTUAL); ?>";
			tipo_forma_pago_constante2.BIG_ID_OPCION="<?php echo(tipo_forma_pago_web::$BIG_ID_OPCION); ?>";
			tipo_forma_pago_constante2.STR_OBJETO_JS="<?php echo(tipo_forma_pago_web::$STR_OBJETO_JS); ?>";
			tipo_forma_pago_constante2.STR_ES_RELACIONES="<?php echo(tipo_forma_pago_web::$STR_ES_RELACIONES); ?>";
			tipo_forma_pago_constante2.STR_ES_RELACIONADO="<?php echo(tipo_forma_pago_web::$STR_ES_RELACIONADO); ?>";
			tipo_forma_pago_constante2.STR_ES_SUB_PAGINA="<?php echo(tipo_forma_pago_web::$STR_ES_SUB_PAGINA); ?>";
			tipo_forma_pago_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(tipo_forma_pago_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			tipo_forma_pago_constante2.BIT_ES_PAGINA_FORM=<?php echo(tipo_forma_pago_web::$BIT_ES_PAGINA_FORM); ?>;
			tipo_forma_pago_constante2.STR_SUFIJO="<?php echo(tipo_forma_pago_web::$STR_SUF); ?>";//tipo_forma_pago
			tipo_forma_pago_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(tipo_forma_pago_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//tipo_forma_pago
			
			tipo_forma_pago_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(tipo_forma_pago_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			tipo_forma_pago_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($tipo_forma_pago_web1->moduloActual->getnombre()); ?>";
			tipo_forma_pago_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(tipo_forma_pago_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			tipo_forma_pago_constante2.BIT_ES_LOAD_NORMAL=true;
			/*tipo_forma_pago_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			tipo_forma_pago_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.tipo_forma_pago_constante2 = tipo_forma_pago_constante2;
			
		</script>
		
		<?php if(tipo_forma_pago_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.tipo_forma_pago_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.tipo_forma_pago_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="tipo_forma_pagoActual" ></a>
	
	<div id="divResumentipo_forma_pagoActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(tipo_forma_pago_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(tipo_forma_pago_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(tipo_forma_pago_web::$STR_ES_BUSQUEDA=='false' && tipo_forma_pago_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(tipo_forma_pago_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(tipo_forma_pago_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(tipo_forma_pago_web::$STR_ES_RELACIONADO=='false' && tipo_forma_pago_web::$STR_ES_POPUP=='false' && tipo_forma_pago_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tdtipo_forma_pagoNuevoToolBar">
										<img id="imgNuevoToolBartipo_forma_pago" name="imgNuevoToolBartipo_forma_pago" title="Nuevo Tipo Forma Pago" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(tipo_forma_pago_web::$STR_ES_BUSQUEDA=='false' && tipo_forma_pago_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdtipo_forma_pagoNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBartipo_forma_pago" name="imgNuevoGuardarCambiosToolBartipo_forma_pago" title="Nuevo TABLA Tipo Forma Pago" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(tipo_forma_pago_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdtipo_forma_pagoGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBartipo_forma_pago" name="imgGuardarCambiosToolBartipo_forma_pago" title="Guardar Tipo Forma Pago" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(tipo_forma_pago_web::$STR_ES_RELACIONADO=='false' && tipo_forma_pago_web::$STR_ES_RELACIONES=='false' && tipo_forma_pago_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdtipo_forma_pagoCopiarToolBar">
										<img id="imgCopiarToolBartipo_forma_pago" name="imgCopiarToolBartipo_forma_pago" title="Copiar Tipo Forma Pago" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdtipo_forma_pagoDuplicarToolBar">
										<img id="imgDuplicarToolBartipo_forma_pago" name="imgDuplicarToolBartipo_forma_pago" title="Duplicar Tipo Forma Pago" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(tipo_forma_pago_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdtipo_forma_pagoRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBartipo_forma_pago" name="imgRecargarInformacionToolBartipo_forma_pago" title="Recargar Tipo Forma Pago" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdtipo_forma_pagoAnterioresToolBar">
										<img id="imgAnterioresToolBartipo_forma_pago" name="imgAnterioresToolBartipo_forma_pago" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdtipo_forma_pagoSiguientesToolBar">
										<img id="imgSiguientesToolBartipo_forma_pago" name="imgSiguientesToolBartipo_forma_pago" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdtipo_forma_pagoAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBartipo_forma_pago" name="imgAbrirOrderByToolBartipo_forma_pago" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((tipo_forma_pago_web::$STR_ES_RELACIONADO=='false' && tipo_forma_pago_web::$STR_ES_RELACIONES=='false') || tipo_forma_pago_web::$STR_ES_BUSQUEDA=='true'  || tipo_forma_pago_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdtipo_forma_pagoCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBartipo_forma_pago" name="imgCerrarPaginaToolBartipo_forma_pago" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trtipo_forma_pagoCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedatipo_forma_pago" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedatipo_forma_pago',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trtipo_forma_pagoCabeceraBusquedas/super -->

		<tr id="trBusquedatipo_forma_pago" class="busqueda" style="display:table-row">
			<td id="tdBusquedatipo_forma_pago" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedatipo_forma_pago" name="frmBusquedatipo_forma_pago">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedatipo_forma_pago" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trtipo_forma_pagoBusquedas" class="busqueda" style="display:none"><td>
				<?php if(tipo_forma_pago_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 70%">
				
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscartipo_forma_pago" style="display:table-row">
					<td id="tdParamsBuscartipo_forma_pago">
		<?php if(tipo_forma_pago_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscartipo_forma_pago">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistrostipo_forma_pago" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistrostipo_forma_pago"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistrostipo_forma_pago" name="ParamsBuscar-txtNumeroRegistrostipo_forma_pago" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformaciontipo_forma_pago">
							<td id="tdGenerarReportetipo_forma_pago" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodostipo_forma_pago" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodostipo_forma_pago" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformaciontipo_forma_pago" name="btnRecargarInformaciontipo_forma_pago" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginatipo_forma_pago" name="btnImprimirPaginatipo_forma_pago" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*tipo_forma_pago_web::$STR_ES_BUSQUEDA=='false'  &&*/ tipo_forma_pago_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderBytipo_forma_pago">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderBytipo_forma_pago" name="btnOrderBytipo_forma_pago" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
													</td>
													<td>
														<input type="button" id="btnOrderByReltipo_forma_pago" name="btnOrderByReltipo_forma_pago" title="RELACIONES DE DATOS" value="   Rels" class="btn btn-primary"/>
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

										<?php if(tipo_forma_pago_web::$STR_ES_RELACIONES=='false' && tipo_forma_pago_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbTiposRelaciones" name="ParamsBuscar-cmbTiposRelaciones" title="TIPOS DE RELACIONES" style="width:150px"></select>
										</td>
										<?php } ?>

										<?php if(tipo_forma_pago_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdtipo_forma_pagoConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodostipo_forma_pago -->

							</td><!-- tdGenerarReportetipo_forma_pago -->
						</tr><!-- trRecargarInformaciontipo_forma_pago -->
					</table><!-- tblParamsBuscarNumeroRegistrostipo_forma_pago -->
				</div> <!-- divParamsBuscartipo_forma_pago -->
		<?php } ?>
				</td> <!-- tdParamsBuscartipo_forma_pago -->
				</tr><!-- trParamsBuscartipo_forma_pago -->
				</table> <!-- tblBusquedatipo_forma_pago -->
				</form> <!-- frmBusquedatipo_forma_pago -->
				

			</td> <!-- tdBusquedatipo_forma_pago -->
		</tr> <!-- trBusquedatipo_forma_pago/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(tipo_forma_pago_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divtipo_forma_pagoPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tbltipo_forma_pagoPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmtipo_forma_pagoAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btntipo_forma_pagoAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="tipo_forma_pago_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btntipo_forma_pagoAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmtipo_forma_pagoAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tbltipo_forma_pagoPopupAjaxWebPart -->
		</div> <!-- divtipo_forma_pagoPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(tipo_forma_pago_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trtipo_forma_pagoTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdatipo_forma_pago"></a>
		<img id="imgTablaParaDerechatipo_forma_pago" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechatipo_forma_pago'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdatipo_forma_pago" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdatipo_forma_pago'"/>
		<a id="TablaDerechatipo_forma_pago"></a>
	</td>
</tr> <!-- trtipo_forma_pagoTablaNavegacion/super -->
<?php } ?>

<tr id="trtipo_forma_pagoTablaDatos">
	<td colspan="3" id="htmlTableCelltipo_forma_pago">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatostipo_forma_pagosAjaxWebPart">
		</div>
	</td>
</tr> <!-- trtipo_forma_pagoTablaDatos/super -->
		
		
		<tr id="trtipo_forma_pagoPaginacion" style="display:table-row">
			<td id="tdtipo_forma_pagoPaginacion" align="center">
				<div id="divtipo_forma_pagoPaginacionAjaxWebPart">
				<form id="frmPaginaciontipo_forma_pago" name="frmPaginaciontipo_forma_pago">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginaciontipo_forma_pago" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:center">
					<tr>
						<?php if(tipo_forma_pago_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFktipo_forma_pago" name="btnSeleccionarLoteFktipo_forma_pago" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(tipo_forma_pago_web::$STR_ES_RELACIONADO=='false' /*&& tipo_forma_pago_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnteriorestipo_forma_pago" name="btnAnteriorestipo_forma_pago" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(tipo_forma_pago_web::$STR_ES_BUSQUEDA=='false' && tipo_forma_pago_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdtipo_forma_pagoNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPreparartipo_forma_pago" name="btnNuevoTablaPreparartipo_forma_pago" title="NUEVO Tipo Forma Pago" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablatipo_forma_pago" name="ParamsPaginar-txtNumeroNuevoTablatipo_forma_pago" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(tipo_forma_pago_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdtipo_forma_pagoConEditartipo_forma_pago">
							<label>
								<input id="ParamsBuscar-chbConEditartipo_forma_pago" name="ParamsBuscar-chbConEditartipo_forma_pago" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(tipo_forma_pago_web::$STR_ES_RELACIONADO=='false'/* && tipo_forma_pago_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientestipo_forma_pago" name="btnSiguientestipo_forma_pago" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginaciontipo_forma_pago -->
				</form> <!-- frmPaginaciontipo_forma_pago -->
				<form id="frmNuevoPreparartipo_forma_pago" name="frmNuevoPreparartipo_forma_pago">
				<table id="tblNuevoPreparartipo_forma_pago" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:center">
					<tr id="trtipo_forma_pagoNuevo" height="10">
						<?php if(tipo_forma_pago_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdtipo_forma_pagoNuevo" align="center">
							<input type="button" id="btnNuevoPreparartipo_forma_pago" name="btnNuevoPreparartipo_forma_pago" title="NUEVO Tipo Forma Pago" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdtipo_forma_pagoGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambiostipo_forma_pago" name="btnGuardarCambiostipo_forma_pago" title="GUARDAR Tipo Forma Pago" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(tipo_forma_pago_web::$STR_ES_RELACIONADO=='false' && tipo_forma_pago_web::$STR_ES_RELACIONES=='false' && tipo_forma_pago_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdtipo_forma_pagoDuplicar" align="center">
							<input type="button" id="btnDuplicartipo_forma_pago" name="btnDuplicartipo_forma_pago" title="DUPLICAR Tipo Forma Pago" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdtipo_forma_pagoCopiar" align="center">
							<input type="button" id="btnCopiartipo_forma_pago" name="btnCopiartipo_forma_pago" title="COPIAR Tipo Forma Pago" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(tipo_forma_pago_web::$STR_ES_RELACIONADO=='false' && ((tipo_forma_pago_web::$STR_ES_RELACIONADO=='false' && tipo_forma_pago_web::$STR_ES_RELACIONES=='false') || tipo_forma_pago_web::$STR_ES_BUSQUEDA=='true'  || tipo_forma_pago_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdtipo_forma_pagoCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginatipo_forma_pago" name="btnCerrarPaginatipo_forma_pago" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPreparartipo_forma_pago -->
				</form> <!-- frmNuevoPreparartipo_forma_pago -->
				</div> <!-- divtipo_forma_pagoPaginacionAjaxWebPart -->
			</td> <!-- tdtipo_forma_pagoPaginacion -->
		</tr> <!-- trtipo_forma_pagoPaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(tipo_forma_pago_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionestipo_forma_pagoAjaxWebPart">
			<td id="tdAccionesRelacionestipo_forma_pagoAjaxWebPart">
				<div id="divAccionesRelacionestipo_forma_pagoAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionestipo_forma_pagoAjaxWebPart -->
		</tr> <!-- trAccionesRelacionestipo_forma_pagoAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderBytipo_forma_pago">
			<td id="tdOrderBytipo_forma_pago">
				<form id="frmOrderBytipo_forma_pago" name="frmOrderBytipo_forma_pago">
					<div id="divOrderBytipo_forma_pagoAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
				<form id="frmOrderByReltipo_forma_pago" name="frmOrderByReltipo_forma_pago">
					<div id="divOrderByReltipo_forma_pagoAjaxWebPart" title="RELACIONES" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderBytipo_forma_pago -->
		</tr> <!-- trOrderBytipo_forma_pago/super -->
			
		
		
		
		
		
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
			
				import {tipo_forma_pago_webcontrol,tipo_forma_pago_webcontrol1} from './webroot/js/JavaScript/contabilidad/general/tipo_forma_pago/js/webcontrol/tipo_forma_pago_webcontrol.js?random=1';
				
				tipo_forma_pago_webcontrol1.settipo_forma_pago_constante(window.tipo_forma_pago_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(tipo_forma_pago_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

