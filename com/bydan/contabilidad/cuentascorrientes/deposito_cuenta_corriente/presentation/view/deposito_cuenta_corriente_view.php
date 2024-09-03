<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\cuentascorrientes\deposito_cuenta_corriente\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Deposito Cta Corriente Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/cuentascorrientes/deposito_cuenta_corriente/util/deposito_cuenta_corriente_carga.php');
	use com\bydan\contabilidad\cuentascorrientes\deposito_cuenta_corriente\util\deposito_cuenta_corriente_carga;
	
	//include_once('com/bydan/contabilidad/cuentascorrientes/deposito_cuenta_corriente/presentation/view/deposito_cuenta_corriente_web.php');
	//use com\bydan\contabilidad\cuentascorrientes\deposito_cuenta_corriente\presentation\view\deposito_cuenta_corriente_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	deposito_cuenta_corriente_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	deposito_cuenta_corriente_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$deposito_cuenta_corriente_web1= new deposito_cuenta_corriente_web();	
	$deposito_cuenta_corriente_web1->cargarDatosGenerales();
	
	//$moduloActual=$deposito_cuenta_corriente_web1->moduloActual;
	//$usuarioActual=$deposito_cuenta_corriente_web1->usuarioActual;
	//$sessionBase=$deposito_cuenta_corriente_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$deposito_cuenta_corriente_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentascorrientes/deposito_cuenta_corriente/js/templating/deposito_cuenta_corriente_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentascorrientes/deposito_cuenta_corriente/js/templating/deposito_cuenta_corriente_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentascorrientes/deposito_cuenta_corriente/js/templating/deposito_cuenta_corriente_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentascorrientes/deposito_cuenta_corriente/js/templating/deposito_cuenta_corriente_datos_reporte_template.js'); ?>
		
			
						
		
		
		<?php 
			
		
			deposito_cuenta_corriente_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					deposito_cuenta_corriente_web::$GET_POST=$_GET;
				} else {
					deposito_cuenta_corriente_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			deposito_cuenta_corriente_web::$STR_NOMBRE_PAGINA = 'deposito_cuenta_corriente_view.php';
			deposito_cuenta_corriente_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			deposito_cuenta_corriente_web::$BIT_ES_PAGINA_FORM = 'false';
				
			deposito_cuenta_corriente_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {deposito_cuenta_corriente_constante,deposito_cuenta_corriente_constante1} from './webroot/js/JavaScript/contabilidad/cuentascorrientes/deposito_cuenta_corriente/js/util/deposito_cuenta_corriente_constante.js?random=1';
			import {deposito_cuenta_corriente_funcion,deposito_cuenta_corriente_funcion1} from './webroot/js/JavaScript/contabilidad/cuentascorrientes/deposito_cuenta_corriente/js/util/deposito_cuenta_corriente_funcion.js?random=1';
			
			let deposito_cuenta_corriente_constante2 = new deposito_cuenta_corriente_constante();
			
			deposito_cuenta_corriente_constante2.STR_NOMBRE_PAGINA="<?php echo(deposito_cuenta_corriente_web::$STR_NOMBRE_PAGINA); ?>";
			deposito_cuenta_corriente_constante2.STR_TYPE_ON_LOADdeposito_cuenta_corriente="<?php echo(deposito_cuenta_corriente_web::$STR_TYPE_ONLOAD); ?>";
			deposito_cuenta_corriente_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(deposito_cuenta_corriente_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			deposito_cuenta_corriente_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(deposito_cuenta_corriente_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			deposito_cuenta_corriente_constante2.STR_ACTION="<?php echo(deposito_cuenta_corriente_web::$STR_ACTION); ?>";
			deposito_cuenta_corriente_constante2.STR_ES_POPUP="<?php echo(deposito_cuenta_corriente_web::$STR_ES_POPUP); ?>";
			deposito_cuenta_corriente_constante2.STR_ES_BUSQUEDA="<?php echo(deposito_cuenta_corriente_web::$STR_ES_BUSQUEDA); ?>";
			deposito_cuenta_corriente_constante2.STR_FUNCION_JS="<?php echo(deposito_cuenta_corriente_web::$STR_FUNCION_JS); ?>";
			deposito_cuenta_corriente_constante2.BIG_ID_ACTUAL="<?php echo(deposito_cuenta_corriente_web::$BIG_ID_ACTUAL); ?>";
			deposito_cuenta_corriente_constante2.BIG_ID_OPCION="<?php echo(deposito_cuenta_corriente_web::$BIG_ID_OPCION); ?>";
			deposito_cuenta_corriente_constante2.STR_OBJETO_JS="<?php echo(deposito_cuenta_corriente_web::$STR_OBJETO_JS); ?>";
			deposito_cuenta_corriente_constante2.STR_ES_RELACIONES="<?php echo(deposito_cuenta_corriente_web::$STR_ES_RELACIONES); ?>";
			deposito_cuenta_corriente_constante2.STR_ES_RELACIONADO="<?php echo(deposito_cuenta_corriente_web::$STR_ES_RELACIONADO); ?>";
			deposito_cuenta_corriente_constante2.STR_ES_SUB_PAGINA="<?php echo(deposito_cuenta_corriente_web::$STR_ES_SUB_PAGINA); ?>";
			deposito_cuenta_corriente_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(deposito_cuenta_corriente_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			deposito_cuenta_corriente_constante2.BIT_ES_PAGINA_FORM=<?php echo(deposito_cuenta_corriente_web::$BIT_ES_PAGINA_FORM); ?>;
			deposito_cuenta_corriente_constante2.STR_SUFIJO="<?php echo(deposito_cuenta_corriente_web::$STR_SUF); ?>";//deposito_cuenta_corriente
			deposito_cuenta_corriente_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(deposito_cuenta_corriente_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//deposito_cuenta_corriente
			
			deposito_cuenta_corriente_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(deposito_cuenta_corriente_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			deposito_cuenta_corriente_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($deposito_cuenta_corriente_web1->moduloActual->getnombre()); ?>";
			deposito_cuenta_corriente_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(deposito_cuenta_corriente_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			deposito_cuenta_corriente_constante2.BIT_ES_LOAD_NORMAL=true;
			/*deposito_cuenta_corriente_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			deposito_cuenta_corriente_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.deposito_cuenta_corriente_constante2 = deposito_cuenta_corriente_constante2;
			
		</script>
		
		<?php if(deposito_cuenta_corriente_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.deposito_cuenta_corriente_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.deposito_cuenta_corriente_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="deposito_cuenta_corrienteActual" ></a>
	
	<div id="divResumendeposito_cuenta_corrienteActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(deposito_cuenta_corriente_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(deposito_cuenta_corriente_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(deposito_cuenta_corriente_web::$STR_ES_BUSQUEDA=='false' && deposito_cuenta_corriente_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(deposito_cuenta_corriente_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(deposito_cuenta_corriente_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(deposito_cuenta_corriente_web::$STR_ES_RELACIONADO=='false' && deposito_cuenta_corriente_web::$STR_ES_POPUP=='false' && deposito_cuenta_corriente_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tddeposito_cuenta_corrienteNuevoToolBar">
										<img id="imgNuevoToolBardeposito_cuenta_corriente" name="imgNuevoToolBardeposito_cuenta_corriente" title="Nuevo Deposito Cta Corriente" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(deposito_cuenta_corriente_web::$STR_ES_BUSQUEDA=='false' && deposito_cuenta_corriente_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tddeposito_cuenta_corrienteNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBardeposito_cuenta_corriente" name="imgNuevoGuardarCambiosToolBardeposito_cuenta_corriente" title="Nuevo TABLA Deposito Cta Corriente" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(deposito_cuenta_corriente_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tddeposito_cuenta_corrienteGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBardeposito_cuenta_corriente" name="imgGuardarCambiosToolBardeposito_cuenta_corriente" title="Guardar Deposito Cta Corriente" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(deposito_cuenta_corriente_web::$STR_ES_RELACIONADO=='false' && deposito_cuenta_corriente_web::$STR_ES_RELACIONES=='false' && deposito_cuenta_corriente_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tddeposito_cuenta_corrienteCopiarToolBar">
										<img id="imgCopiarToolBardeposito_cuenta_corriente" name="imgCopiarToolBardeposito_cuenta_corriente" title="Copiar Deposito Cta Corriente" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tddeposito_cuenta_corrienteDuplicarToolBar">
										<img id="imgDuplicarToolBardeposito_cuenta_corriente" name="imgDuplicarToolBardeposito_cuenta_corriente" title="Duplicar Deposito Cta Corriente" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(deposito_cuenta_corriente_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tddeposito_cuenta_corrienteRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBardeposito_cuenta_corriente" name="imgRecargarInformacionToolBardeposito_cuenta_corriente" title="Recargar Deposito Cta Corriente" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tddeposito_cuenta_corrienteAnterioresToolBar">
										<img id="imgAnterioresToolBardeposito_cuenta_corriente" name="imgAnterioresToolBardeposito_cuenta_corriente" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tddeposito_cuenta_corrienteSiguientesToolBar">
										<img id="imgSiguientesToolBardeposito_cuenta_corriente" name="imgSiguientesToolBardeposito_cuenta_corriente" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tddeposito_cuenta_corrienteAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBardeposito_cuenta_corriente" name="imgAbrirOrderByToolBardeposito_cuenta_corriente" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((deposito_cuenta_corriente_web::$STR_ES_RELACIONADO=='false' && deposito_cuenta_corriente_web::$STR_ES_RELACIONES=='false') || deposito_cuenta_corriente_web::$STR_ES_BUSQUEDA=='true'  || deposito_cuenta_corriente_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tddeposito_cuenta_corrienteCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBardeposito_cuenta_corriente" name="imgCerrarPaginaToolBardeposito_cuenta_corriente" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trdeposito_cuenta_corrienteCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedadeposito_cuenta_corriente" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedadeposito_cuenta_corriente',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trdeposito_cuenta_corrienteCabeceraBusquedas/super -->

		<tr id="trBusquedadeposito_cuenta_corriente" class="busqueda" style="display:table-row">
			<td id="tdBusquedadeposito_cuenta_corriente" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedadeposito_cuenta_corriente" name="frmBusquedadeposito_cuenta_corriente">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedadeposito_cuenta_corriente" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trdeposito_cuenta_corrienteBusquedas" class="busqueda" style="display:table-row"><td>
				<?php if(deposito_cuenta_corriente_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 70%">
					<ul>
						<li id="listrVisibleFK_Idcuenta_corriente" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idcuenta_corriente"> Por  Cuenta Corriente</a></li>
						<li id="listrVisibleFK_Idestado_deposito_retiro" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idestado_deposito_retiro"> Por  Estado Deposito Retiro</a></li>
					</ul>
				
					<div id="divstrVisibleFK_Idcuenta_corriente">
					<table id="tblstrVisibleFK_Idcuenta_corriente" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo"> Cuenta Corriente</span>
						</td>
						<td align="center">
							<select id="FK_Idcuenta_corriente-cmbid_cuenta_corriente" name="FK_Idcuenta_corriente-cmbid_cuenta_corriente" title=" Cuenta Corriente" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscardeposito_cuenta_corrienteFK_Idcuenta_corriente" name="btnBuscardeposito_cuenta_corrienteFK_Idcuenta_corriente" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idestado_deposito_retiro">
					<table id="tblstrVisibleFK_Idestado_deposito_retiro" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo"> Estado Deposito Retiro</span>
						</td>
						<td align="center">
							<select id="FK_Idestado_deposito_retiro-cmbid_estado_deposito_retiro" name="FK_Idestado_deposito_retiro-cmbid_estado_deposito_retiro" title=" Estado Deposito Retiro" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscardeposito_cuenta_corrienteFK_Idestado_deposito_retiro" name="btnBuscardeposito_cuenta_corrienteFK_Idestado_deposito_retiro" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscardeposito_cuenta_corriente" style="display:table-row">
					<td id="tdParamsBuscardeposito_cuenta_corriente">
		<?php if(deposito_cuenta_corriente_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscardeposito_cuenta_corriente">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistrosdeposito_cuenta_corriente" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistrosdeposito_cuenta_corriente"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistrosdeposito_cuenta_corriente" name="ParamsBuscar-txtNumeroRegistrosdeposito_cuenta_corriente" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformaciondeposito_cuenta_corriente">
							<td id="tdGenerarReportedeposito_cuenta_corriente" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodosdeposito_cuenta_corriente" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodosdeposito_cuenta_corriente" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformaciondeposito_cuenta_corriente" name="btnRecargarInformaciondeposito_cuenta_corriente" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginadeposito_cuenta_corriente" name="btnImprimirPaginadeposito_cuenta_corriente" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*deposito_cuenta_corriente_web::$STR_ES_BUSQUEDA=='false'  &&*/ deposito_cuenta_corriente_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderBydeposito_cuenta_corriente">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderBydeposito_cuenta_corriente" name="btnOrderBydeposito_cuenta_corriente" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
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

										<?php if(deposito_cuenta_corriente_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tddeposito_cuenta_corrienteConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodosdeposito_cuenta_corriente -->

							</td><!-- tdGenerarReportedeposito_cuenta_corriente -->
						</tr><!-- trRecargarInformaciondeposito_cuenta_corriente -->
					</table><!-- tblParamsBuscarNumeroRegistrosdeposito_cuenta_corriente -->
				</div> <!-- divParamsBuscardeposito_cuenta_corriente -->
		<?php } ?>
				</td> <!-- tdParamsBuscardeposito_cuenta_corriente -->
				</tr><!-- trParamsBuscardeposito_cuenta_corriente -->
				</table> <!-- tblBusquedadeposito_cuenta_corriente -->
				</form> <!-- frmBusquedadeposito_cuenta_corriente -->
				

			</td> <!-- tdBusquedadeposito_cuenta_corriente -->
		</tr> <!-- trBusquedadeposito_cuenta_corriente/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(deposito_cuenta_corriente_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divdeposito_cuenta_corrientePopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tbldeposito_cuenta_corrientePopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmdeposito_cuenta_corrienteAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btndeposito_cuenta_corrienteAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="deposito_cuenta_corriente_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btndeposito_cuenta_corrienteAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmdeposito_cuenta_corrienteAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tbldeposito_cuenta_corrientePopupAjaxWebPart -->
		</div> <!-- divdeposito_cuenta_corrientePopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(deposito_cuenta_corriente_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trdeposito_cuenta_corrienteTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdadeposito_cuenta_corriente"></a>
		<img id="imgTablaParaDerechadeposito_cuenta_corriente" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechadeposito_cuenta_corriente'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdadeposito_cuenta_corriente" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdadeposito_cuenta_corriente'"/>
		<a id="TablaDerechadeposito_cuenta_corriente"></a>
	</td>
</tr> <!-- trdeposito_cuenta_corrienteTablaNavegacion/super -->
<?php } ?>

<tr id="trdeposito_cuenta_corrienteTablaDatos">
	<td colspan="3" id="htmlTableCelldeposito_cuenta_corriente">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatosdeposito_cuenta_corrientesAjaxWebPart">
		</div>
	</td>
</tr> <!-- trdeposito_cuenta_corrienteTablaDatos/super -->
		
		
		<tr id="trdeposito_cuenta_corrientePaginacion" style="display:table-row">
			<td id="tddeposito_cuenta_corrientePaginacion" align="left">
				<div id="divdeposito_cuenta_corrientePaginacionAjaxWebPart">
				<form id="frmPaginaciondeposito_cuenta_corriente" name="frmPaginaciondeposito_cuenta_corriente">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginaciondeposito_cuenta_corriente" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:left">
					<tr>
						<?php if(deposito_cuenta_corriente_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkdeposito_cuenta_corriente" name="btnSeleccionarLoteFkdeposito_cuenta_corriente" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(deposito_cuenta_corriente_web::$STR_ES_RELACIONADO=='false' /*&& deposito_cuenta_corriente_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnterioresdeposito_cuenta_corriente" name="btnAnterioresdeposito_cuenta_corriente" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(deposito_cuenta_corriente_web::$STR_ES_BUSQUEDA=='false' && deposito_cuenta_corriente_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tddeposito_cuenta_corrienteNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPreparardeposito_cuenta_corriente" name="btnNuevoTablaPreparardeposito_cuenta_corriente" title="NUEVO Deposito Cta Corriente" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTabladeposito_cuenta_corriente" name="ParamsPaginar-txtNumeroNuevoTabladeposito_cuenta_corriente" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(deposito_cuenta_corriente_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tddeposito_cuenta_corrienteConEditardeposito_cuenta_corriente">
							<label>
								<input id="ParamsBuscar-chbConEditardeposito_cuenta_corriente" name="ParamsBuscar-chbConEditardeposito_cuenta_corriente" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(deposito_cuenta_corriente_web::$STR_ES_RELACIONADO=='false'/* && deposito_cuenta_corriente_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientesdeposito_cuenta_corriente" name="btnSiguientesdeposito_cuenta_corriente" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginaciondeposito_cuenta_corriente -->
				</form> <!-- frmPaginaciondeposito_cuenta_corriente -->
				<form id="frmNuevoPreparardeposito_cuenta_corriente" name="frmNuevoPreparardeposito_cuenta_corriente">
				<table id="tblNuevoPreparardeposito_cuenta_corriente" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:left">
					<tr id="trdeposito_cuenta_corrienteNuevo" height="10">
						<?php if(deposito_cuenta_corriente_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tddeposito_cuenta_corrienteNuevo" align="center">
							<input type="button" id="btnNuevoPreparardeposito_cuenta_corriente" name="btnNuevoPreparardeposito_cuenta_corriente" title="NUEVO Deposito Cta Corriente" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tddeposito_cuenta_corrienteGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambiosdeposito_cuenta_corriente" name="btnGuardarCambiosdeposito_cuenta_corriente" title="GUARDAR Deposito Cta Corriente" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(deposito_cuenta_corriente_web::$STR_ES_RELACIONADO=='false' && deposito_cuenta_corriente_web::$STR_ES_RELACIONES=='false' && deposito_cuenta_corriente_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tddeposito_cuenta_corrienteDuplicar" align="center">
							<input type="button" id="btnDuplicardeposito_cuenta_corriente" name="btnDuplicardeposito_cuenta_corriente" title="DUPLICAR Deposito Cta Corriente" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tddeposito_cuenta_corrienteCopiar" align="center">
							<input type="button" id="btnCopiardeposito_cuenta_corriente" name="btnCopiardeposito_cuenta_corriente" title="COPIAR Deposito Cta Corriente" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(deposito_cuenta_corriente_web::$STR_ES_RELACIONADO=='false' && ((deposito_cuenta_corriente_web::$STR_ES_RELACIONADO=='false' && deposito_cuenta_corriente_web::$STR_ES_RELACIONES=='false') || deposito_cuenta_corriente_web::$STR_ES_BUSQUEDA=='true'  || deposito_cuenta_corriente_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tddeposito_cuenta_corrienteCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginadeposito_cuenta_corriente" name="btnCerrarPaginadeposito_cuenta_corriente" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPreparardeposito_cuenta_corriente -->
				</form> <!-- frmNuevoPreparardeposito_cuenta_corriente -->
				</div> <!-- divdeposito_cuenta_corrientePaginacionAjaxWebPart -->
			</td> <!-- tddeposito_cuenta_corrientePaginacion -->
		</tr> <!-- trdeposito_cuenta_corrientePaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(deposito_cuenta_corriente_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionesdeposito_cuenta_corrienteAjaxWebPart">
			<td id="tdAccionesRelacionesdeposito_cuenta_corrienteAjaxWebPart">
				<div id="divAccionesRelacionesdeposito_cuenta_corrienteAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionesdeposito_cuenta_corrienteAjaxWebPart -->
		</tr> <!-- trAccionesRelacionesdeposito_cuenta_corrienteAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderBydeposito_cuenta_corriente">
			<td id="tdOrderBydeposito_cuenta_corriente">
				<form id="frmOrderBydeposito_cuenta_corriente" name="frmOrderBydeposito_cuenta_corriente">
					<div id="divOrderBydeposito_cuenta_corrienteAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderBydeposito_cuenta_corriente -->
		</tr> <!-- trOrderBydeposito_cuenta_corriente/super -->
			
		
		
		
		
		
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
			
				import {deposito_cuenta_corriente_webcontrol,deposito_cuenta_corriente_webcontrol1} from './webroot/js/JavaScript/contabilidad/cuentascorrientes/deposito_cuenta_corriente/js/webcontrol/deposito_cuenta_corriente_webcontrol.js?random=1';
				
				deposito_cuenta_corriente_webcontrol1.setdeposito_cuenta_corriente_constante(window.deposito_cuenta_corriente_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(deposito_cuenta_corriente_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

