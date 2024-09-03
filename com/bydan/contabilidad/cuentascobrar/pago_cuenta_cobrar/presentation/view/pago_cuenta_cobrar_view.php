<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\cuentascobrar\pago_cuenta_cobrar\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Pago Cuenta Cobrar Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/cuentascobrar/pago_cuenta_cobrar/util/pago_cuenta_cobrar_carga.php');
	use com\bydan\contabilidad\cuentascobrar\pago_cuenta_cobrar\util\pago_cuenta_cobrar_carga;
	
	//include_once('com/bydan/contabilidad/cuentascobrar/pago_cuenta_cobrar/presentation/view/pago_cuenta_cobrar_web.php');
	//use com\bydan\contabilidad\cuentascobrar\pago_cuenta_cobrar\presentation\view\pago_cuenta_cobrar_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	pago_cuenta_cobrar_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	pago_cuenta_cobrar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$pago_cuenta_cobrar_web1= new pago_cuenta_cobrar_web();	
	$pago_cuenta_cobrar_web1->cargarDatosGenerales();
	
	//$moduloActual=$pago_cuenta_cobrar_web1->moduloActual;
	//$usuarioActual=$pago_cuenta_cobrar_web1->usuarioActual;
	//$sessionBase=$pago_cuenta_cobrar_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$pago_cuenta_cobrar_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentascobrar/pago_cuenta_cobrar/js/templating/pago_cuenta_cobrar_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentascobrar/pago_cuenta_cobrar/js/templating/pago_cuenta_cobrar_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentascobrar/pago_cuenta_cobrar/js/templating/pago_cuenta_cobrar_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentascobrar/pago_cuenta_cobrar/js/templating/pago_cuenta_cobrar_datos_reporte_template.js'); ?>
		
			
						
		
		
		<?php 
			
		
			pago_cuenta_cobrar_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					pago_cuenta_cobrar_web::$GET_POST=$_GET;
				} else {
					pago_cuenta_cobrar_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			pago_cuenta_cobrar_web::$STR_NOMBRE_PAGINA = 'pago_cuenta_cobrar_view.php';
			pago_cuenta_cobrar_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			pago_cuenta_cobrar_web::$BIT_ES_PAGINA_FORM = 'false';
				
			pago_cuenta_cobrar_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {pago_cuenta_cobrar_constante,pago_cuenta_cobrar_constante1} from './webroot/js/JavaScript/contabilidad/cuentascobrar/pago_cuenta_cobrar/js/util/pago_cuenta_cobrar_constante.js?random=1';
			import {pago_cuenta_cobrar_funcion,pago_cuenta_cobrar_funcion1} from './webroot/js/JavaScript/contabilidad/cuentascobrar/pago_cuenta_cobrar/js/util/pago_cuenta_cobrar_funcion.js?random=1';
			
			let pago_cuenta_cobrar_constante2 = new pago_cuenta_cobrar_constante();
			
			pago_cuenta_cobrar_constante2.STR_NOMBRE_PAGINA="<?php echo(pago_cuenta_cobrar_web::$STR_NOMBRE_PAGINA); ?>";
			pago_cuenta_cobrar_constante2.STR_TYPE_ON_LOADpago_cuenta_cobrar="<?php echo(pago_cuenta_cobrar_web::$STR_TYPE_ONLOAD); ?>";
			pago_cuenta_cobrar_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(pago_cuenta_cobrar_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			pago_cuenta_cobrar_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(pago_cuenta_cobrar_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			pago_cuenta_cobrar_constante2.STR_ACTION="<?php echo(pago_cuenta_cobrar_web::$STR_ACTION); ?>";
			pago_cuenta_cobrar_constante2.STR_ES_POPUP="<?php echo(pago_cuenta_cobrar_web::$STR_ES_POPUP); ?>";
			pago_cuenta_cobrar_constante2.STR_ES_BUSQUEDA="<?php echo(pago_cuenta_cobrar_web::$STR_ES_BUSQUEDA); ?>";
			pago_cuenta_cobrar_constante2.STR_FUNCION_JS="<?php echo(pago_cuenta_cobrar_web::$STR_FUNCION_JS); ?>";
			pago_cuenta_cobrar_constante2.BIG_ID_ACTUAL="<?php echo(pago_cuenta_cobrar_web::$BIG_ID_ACTUAL); ?>";
			pago_cuenta_cobrar_constante2.BIG_ID_OPCION="<?php echo(pago_cuenta_cobrar_web::$BIG_ID_OPCION); ?>";
			pago_cuenta_cobrar_constante2.STR_OBJETO_JS="<?php echo(pago_cuenta_cobrar_web::$STR_OBJETO_JS); ?>";
			pago_cuenta_cobrar_constante2.STR_ES_RELACIONES="<?php echo(pago_cuenta_cobrar_web::$STR_ES_RELACIONES); ?>";
			pago_cuenta_cobrar_constante2.STR_ES_RELACIONADO="<?php echo(pago_cuenta_cobrar_web::$STR_ES_RELACIONADO); ?>";
			pago_cuenta_cobrar_constante2.STR_ES_SUB_PAGINA="<?php echo(pago_cuenta_cobrar_web::$STR_ES_SUB_PAGINA); ?>";
			pago_cuenta_cobrar_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(pago_cuenta_cobrar_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			pago_cuenta_cobrar_constante2.BIT_ES_PAGINA_FORM=<?php echo(pago_cuenta_cobrar_web::$BIT_ES_PAGINA_FORM); ?>;
			pago_cuenta_cobrar_constante2.STR_SUFIJO="<?php echo(pago_cuenta_cobrar_web::$STR_SUF); ?>";//pago_cuenta_cobrar
			pago_cuenta_cobrar_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(pago_cuenta_cobrar_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//pago_cuenta_cobrar
			
			pago_cuenta_cobrar_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(pago_cuenta_cobrar_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			pago_cuenta_cobrar_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($pago_cuenta_cobrar_web1->moduloActual->getnombre()); ?>";
			pago_cuenta_cobrar_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(pago_cuenta_cobrar_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			pago_cuenta_cobrar_constante2.BIT_ES_LOAD_NORMAL=true;
			/*pago_cuenta_cobrar_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			pago_cuenta_cobrar_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.pago_cuenta_cobrar_constante2 = pago_cuenta_cobrar_constante2;
			
		</script>
		
		<?php if(pago_cuenta_cobrar_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.pago_cuenta_cobrar_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.pago_cuenta_cobrar_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="pago_cuenta_cobrarActual" ></a>
	
	<div id="divResumenpago_cuenta_cobrarActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(pago_cuenta_cobrar_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(pago_cuenta_cobrar_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(pago_cuenta_cobrar_web::$STR_ES_BUSQUEDA=='false' && pago_cuenta_cobrar_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(pago_cuenta_cobrar_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(pago_cuenta_cobrar_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(pago_cuenta_cobrar_web::$STR_ES_RELACIONADO=='false' && pago_cuenta_cobrar_web::$STR_ES_POPUP=='false' && pago_cuenta_cobrar_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tdpago_cuenta_cobrarNuevoToolBar">
										<img id="imgNuevoToolBarpago_cuenta_cobrar" name="imgNuevoToolBarpago_cuenta_cobrar" title="Nuevo Pago Cuenta Cobrar" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(pago_cuenta_cobrar_web::$STR_ES_BUSQUEDA=='false' && pago_cuenta_cobrar_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdpago_cuenta_cobrarNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBarpago_cuenta_cobrar" name="imgNuevoGuardarCambiosToolBarpago_cuenta_cobrar" title="Nuevo TABLA Pago Cuenta Cobrar" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(pago_cuenta_cobrar_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdpago_cuenta_cobrarGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBarpago_cuenta_cobrar" name="imgGuardarCambiosToolBarpago_cuenta_cobrar" title="Guardar Pago Cuenta Cobrar" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(pago_cuenta_cobrar_web::$STR_ES_RELACIONADO=='false' && pago_cuenta_cobrar_web::$STR_ES_RELACIONES=='false' && pago_cuenta_cobrar_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdpago_cuenta_cobrarCopiarToolBar">
										<img id="imgCopiarToolBarpago_cuenta_cobrar" name="imgCopiarToolBarpago_cuenta_cobrar" title="Copiar Pago Cuenta Cobrar" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdpago_cuenta_cobrarDuplicarToolBar">
										<img id="imgDuplicarToolBarpago_cuenta_cobrar" name="imgDuplicarToolBarpago_cuenta_cobrar" title="Duplicar Pago Cuenta Cobrar" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(pago_cuenta_cobrar_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdpago_cuenta_cobrarRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBarpago_cuenta_cobrar" name="imgRecargarInformacionToolBarpago_cuenta_cobrar" title="Recargar Pago Cuenta Cobrar" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdpago_cuenta_cobrarAnterioresToolBar">
										<img id="imgAnterioresToolBarpago_cuenta_cobrar" name="imgAnterioresToolBarpago_cuenta_cobrar" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdpago_cuenta_cobrarSiguientesToolBar">
										<img id="imgSiguientesToolBarpago_cuenta_cobrar" name="imgSiguientesToolBarpago_cuenta_cobrar" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdpago_cuenta_cobrarAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBarpago_cuenta_cobrar" name="imgAbrirOrderByToolBarpago_cuenta_cobrar" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((pago_cuenta_cobrar_web::$STR_ES_RELACIONADO=='false' && pago_cuenta_cobrar_web::$STR_ES_RELACIONES=='false') || pago_cuenta_cobrar_web::$STR_ES_BUSQUEDA=='true'  || pago_cuenta_cobrar_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdpago_cuenta_cobrarCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBarpago_cuenta_cobrar" name="imgCerrarPaginaToolBarpago_cuenta_cobrar" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trpago_cuenta_cobrarCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedapago_cuenta_cobrar" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedapago_cuenta_cobrar',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trpago_cuenta_cobrarCabeceraBusquedas/super -->

		<tr id="trBusquedapago_cuenta_cobrar" class="busqueda" style="display:table-row">
			<td id="tdBusquedapago_cuenta_cobrar" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedapago_cuenta_cobrar" name="frmBusquedapago_cuenta_cobrar">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedapago_cuenta_cobrar" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trpago_cuenta_cobrarBusquedas" class="busqueda" style="display:table-row"><td>
				<?php if(pago_cuenta_cobrar_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 70%">
					<ul>
						<li id="listrVisibleFK_Idcuenta_cobrar" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idcuenta_cobrar"> Por  Cuenta Cobrar</a></li>
						<li id="listrVisibleFK_Idestado" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idestado"> Por  Estado</a></li>
						<li id="listrVisibleFK_Idforma_pago_cliente" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idforma_pago_cliente"> Por  Forma Pago Cliente</a></li>
					</ul>
				
					<div id="divstrVisibleFK_Idcuenta_cobrar">
					<table id="tblstrVisibleFK_Idcuenta_cobrar" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo"> Cuenta Cobrar</span>
						</td>
						<td align="center">
							<select id="FK_Idcuenta_cobrar-cmbid_cuenta_cobrar" name="FK_Idcuenta_cobrar-cmbid_cuenta_cobrar" title=" Cuenta Cobrar" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarpago_cuenta_cobrarFK_Idcuenta_cobrar" name="btnBuscarpago_cuenta_cobrarFK_Idcuenta_cobrar" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idestado">
					<table id="tblstrVisibleFK_Idestado" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo"> Estado</span>
						</td>
						<td align="center">
							<select id="FK_Idestado-cmbid_estado" name="FK_Idestado-cmbid_estado" title=" Estado" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarpago_cuenta_cobrarFK_Idestado" name="btnBuscarpago_cuenta_cobrarFK_Idestado" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idforma_pago_cliente">
					<table id="tblstrVisibleFK_Idforma_pago_cliente" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo"> Forma Pago Cliente</span>
						</td>
						<td align="center">
							<select id="FK_Idforma_pago_cliente-cmbid_forma_pago_cliente" name="FK_Idforma_pago_cliente-cmbid_forma_pago_cliente" title=" Forma Pago Cliente" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarpago_cuenta_cobrarFK_Idforma_pago_cliente" name="btnBuscarpago_cuenta_cobrarFK_Idforma_pago_cliente" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscarpago_cuenta_cobrar" style="display:table-row">
					<td id="tdParamsBuscarpago_cuenta_cobrar">
		<?php if(pago_cuenta_cobrar_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscarpago_cuenta_cobrar">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistrospago_cuenta_cobrar" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistrospago_cuenta_cobrar"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistrospago_cuenta_cobrar" name="ParamsBuscar-txtNumeroRegistrospago_cuenta_cobrar" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacionpago_cuenta_cobrar">
							<td id="tdGenerarReportepago_cuenta_cobrar" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodospago_cuenta_cobrar" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodospago_cuenta_cobrar" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacionpago_cuenta_cobrar" name="btnRecargarInformacionpago_cuenta_cobrar" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginapago_cuenta_cobrar" name="btnImprimirPaginapago_cuenta_cobrar" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*pago_cuenta_cobrar_web::$STR_ES_BUSQUEDA=='false'  &&*/ pago_cuenta_cobrar_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderBypago_cuenta_cobrar">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderBypago_cuenta_cobrar" name="btnOrderBypago_cuenta_cobrar" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
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

										<?php if(pago_cuenta_cobrar_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdpago_cuenta_cobrarConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodospago_cuenta_cobrar -->

							</td><!-- tdGenerarReportepago_cuenta_cobrar -->
						</tr><!-- trRecargarInformacionpago_cuenta_cobrar -->
					</table><!-- tblParamsBuscarNumeroRegistrospago_cuenta_cobrar -->
				</div> <!-- divParamsBuscarpago_cuenta_cobrar -->
		<?php } ?>
				</td> <!-- tdParamsBuscarpago_cuenta_cobrar -->
				</tr><!-- trParamsBuscarpago_cuenta_cobrar -->
				</table> <!-- tblBusquedapago_cuenta_cobrar -->
				</form> <!-- frmBusquedapago_cuenta_cobrar -->
				

			</td> <!-- tdBusquedapago_cuenta_cobrar -->
		</tr> <!-- trBusquedapago_cuenta_cobrar/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(pago_cuenta_cobrar_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divpago_cuenta_cobrarPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblpago_cuenta_cobrarPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmpago_cuenta_cobrarAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnpago_cuenta_cobrarAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="pago_cuenta_cobrar_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnpago_cuenta_cobrarAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmpago_cuenta_cobrarAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblpago_cuenta_cobrarPopupAjaxWebPart -->
		</div> <!-- divpago_cuenta_cobrarPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(pago_cuenta_cobrar_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trpago_cuenta_cobrarTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdapago_cuenta_cobrar"></a>
		<img id="imgTablaParaDerechapago_cuenta_cobrar" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechapago_cuenta_cobrar'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdapago_cuenta_cobrar" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdapago_cuenta_cobrar'"/>
		<a id="TablaDerechapago_cuenta_cobrar"></a>
	</td>
</tr> <!-- trpago_cuenta_cobrarTablaNavegacion/super -->
<?php } ?>

<tr id="trpago_cuenta_cobrarTablaDatos">
	<td colspan="3" id="htmlTableCellpago_cuenta_cobrar">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatospago_cuenta_cobrarsAjaxWebPart">
		</div>
	</td>
</tr> <!-- trpago_cuenta_cobrarTablaDatos/super -->
		
		
		<tr id="trpago_cuenta_cobrarPaginacion" style="display:table-row">
			<td id="tdpago_cuenta_cobrarPaginacion" align="left">
				<div id="divpago_cuenta_cobrarPaginacionAjaxWebPart">
				<form id="frmPaginacionpago_cuenta_cobrar" name="frmPaginacionpago_cuenta_cobrar">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacionpago_cuenta_cobrar" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:left">
					<tr>
						<?php if(pago_cuenta_cobrar_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkpago_cuenta_cobrar" name="btnSeleccionarLoteFkpago_cuenta_cobrar" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(pago_cuenta_cobrar_web::$STR_ES_RELACIONADO=='false' /*&& pago_cuenta_cobrar_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnteriorespago_cuenta_cobrar" name="btnAnteriorespago_cuenta_cobrar" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(pago_cuenta_cobrar_web::$STR_ES_BUSQUEDA=='false' && pago_cuenta_cobrar_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdpago_cuenta_cobrarNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPrepararpago_cuenta_cobrar" name="btnNuevoTablaPrepararpago_cuenta_cobrar" title="NUEVO Pago Cuenta Cobrar" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablapago_cuenta_cobrar" name="ParamsPaginar-txtNumeroNuevoTablapago_cuenta_cobrar" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(pago_cuenta_cobrar_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdpago_cuenta_cobrarConEditarpago_cuenta_cobrar">
							<label>
								<input id="ParamsBuscar-chbConEditarpago_cuenta_cobrar" name="ParamsBuscar-chbConEditarpago_cuenta_cobrar" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(pago_cuenta_cobrar_web::$STR_ES_RELACIONADO=='false'/* && pago_cuenta_cobrar_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientespago_cuenta_cobrar" name="btnSiguientespago_cuenta_cobrar" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacionpago_cuenta_cobrar -->
				</form> <!-- frmPaginacionpago_cuenta_cobrar -->
				<form id="frmNuevoPrepararpago_cuenta_cobrar" name="frmNuevoPrepararpago_cuenta_cobrar">
				<table id="tblNuevoPrepararpago_cuenta_cobrar" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:left">
					<tr id="trpago_cuenta_cobrarNuevo" height="10">
						<?php if(pago_cuenta_cobrar_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdpago_cuenta_cobrarNuevo" align="center">
							<input type="button" id="btnNuevoPrepararpago_cuenta_cobrar" name="btnNuevoPrepararpago_cuenta_cobrar" title="NUEVO Pago Cuenta Cobrar" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdpago_cuenta_cobrarGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambiospago_cuenta_cobrar" name="btnGuardarCambiospago_cuenta_cobrar" title="GUARDAR Pago Cuenta Cobrar" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(pago_cuenta_cobrar_web::$STR_ES_RELACIONADO=='false' && pago_cuenta_cobrar_web::$STR_ES_RELACIONES=='false' && pago_cuenta_cobrar_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdpago_cuenta_cobrarDuplicar" align="center">
							<input type="button" id="btnDuplicarpago_cuenta_cobrar" name="btnDuplicarpago_cuenta_cobrar" title="DUPLICAR Pago Cuenta Cobrar" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdpago_cuenta_cobrarCopiar" align="center">
							<input type="button" id="btnCopiarpago_cuenta_cobrar" name="btnCopiarpago_cuenta_cobrar" title="COPIAR Pago Cuenta Cobrar" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(pago_cuenta_cobrar_web::$STR_ES_RELACIONADO=='false' && ((pago_cuenta_cobrar_web::$STR_ES_RELACIONADO=='false' && pago_cuenta_cobrar_web::$STR_ES_RELACIONES=='false') || pago_cuenta_cobrar_web::$STR_ES_BUSQUEDA=='true'  || pago_cuenta_cobrar_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdpago_cuenta_cobrarCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginapago_cuenta_cobrar" name="btnCerrarPaginapago_cuenta_cobrar" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPrepararpago_cuenta_cobrar -->
				</form> <!-- frmNuevoPrepararpago_cuenta_cobrar -->
				</div> <!-- divpago_cuenta_cobrarPaginacionAjaxWebPart -->
			</td> <!-- tdpago_cuenta_cobrarPaginacion -->
		</tr> <!-- trpago_cuenta_cobrarPaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(pago_cuenta_cobrar_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionespago_cuenta_cobrarAjaxWebPart">
			<td id="tdAccionesRelacionespago_cuenta_cobrarAjaxWebPart">
				<div id="divAccionesRelacionespago_cuenta_cobrarAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionespago_cuenta_cobrarAjaxWebPart -->
		</tr> <!-- trAccionesRelacionespago_cuenta_cobrarAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderBypago_cuenta_cobrar">
			<td id="tdOrderBypago_cuenta_cobrar">
				<form id="frmOrderBypago_cuenta_cobrar" name="frmOrderBypago_cuenta_cobrar">
					<div id="divOrderBypago_cuenta_cobrarAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderBypago_cuenta_cobrar -->
		</tr> <!-- trOrderBypago_cuenta_cobrar/super -->
			
		
		
		
		
		
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
			
				import {pago_cuenta_cobrar_webcontrol,pago_cuenta_cobrar_webcontrol1} from './webroot/js/JavaScript/contabilidad/cuentascobrar/pago_cuenta_cobrar/js/webcontrol/pago_cuenta_cobrar_webcontrol.js?random=1';
				
				pago_cuenta_cobrar_webcontrol1.setpago_cuenta_cobrar_constante(window.pago_cuenta_cobrar_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(pago_cuenta_cobrar_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

