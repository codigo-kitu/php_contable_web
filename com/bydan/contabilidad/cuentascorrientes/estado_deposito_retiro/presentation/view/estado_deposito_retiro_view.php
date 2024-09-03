<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\cuentascorrientes\estado_deposito_retiro\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Estado Deposito Retiro Cheque Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/cuentascorrientes/estado_deposito_retiro/util/estado_deposito_retiro_carga.php');
	use com\bydan\contabilidad\cuentascorrientes\estado_deposito_retiro\util\estado_deposito_retiro_carga;
	
	//include_once('com/bydan/contabilidad/cuentascorrientes/estado_deposito_retiro/presentation/view/estado_deposito_retiro_web.php');
	//use com\bydan\contabilidad\cuentascorrientes\estado_deposito_retiro\presentation\view\estado_deposito_retiro_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	estado_deposito_retiro_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	estado_deposito_retiro_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$estado_deposito_retiro_web1= new estado_deposito_retiro_web();	
	$estado_deposito_retiro_web1->cargarDatosGenerales();
	
	//$moduloActual=$estado_deposito_retiro_web1->moduloActual;
	//$usuarioActual=$estado_deposito_retiro_web1->usuarioActual;
	//$sessionBase=$estado_deposito_retiro_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$estado_deposito_retiro_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentascorrientes/estado_deposito_retiro/js/templating/estado_deposito_retiro_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentascorrientes/estado_deposito_retiro/js/templating/estado_deposito_retiro_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentascorrientes/estado_deposito_retiro/js/templating/estado_deposito_retiro_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentascorrientes/estado_deposito_retiro/js/templating/estado_deposito_retiro_datos_reporte_template.js'); ?>
		
			
						
		
		
		<?php 
			
		
			estado_deposito_retiro_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					estado_deposito_retiro_web::$GET_POST=$_GET;
				} else {
					estado_deposito_retiro_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			estado_deposito_retiro_web::$STR_NOMBRE_PAGINA = 'estado_deposito_retiro_view.php';
			estado_deposito_retiro_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			estado_deposito_retiro_web::$BIT_ES_PAGINA_FORM = 'false';
				
			estado_deposito_retiro_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {estado_deposito_retiro_constante,estado_deposito_retiro_constante1} from './webroot/js/JavaScript/contabilidad/cuentascorrientes/estado_deposito_retiro/js/util/estado_deposito_retiro_constante.js?random=1';
			import {estado_deposito_retiro_funcion,estado_deposito_retiro_funcion1} from './webroot/js/JavaScript/contabilidad/cuentascorrientes/estado_deposito_retiro/js/util/estado_deposito_retiro_funcion.js?random=1';
			
			let estado_deposito_retiro_constante2 = new estado_deposito_retiro_constante();
			
			estado_deposito_retiro_constante2.STR_NOMBRE_PAGINA="<?php echo(estado_deposito_retiro_web::$STR_NOMBRE_PAGINA); ?>";
			estado_deposito_retiro_constante2.STR_TYPE_ON_LOADestado_deposito_retiro="<?php echo(estado_deposito_retiro_web::$STR_TYPE_ONLOAD); ?>";
			estado_deposito_retiro_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(estado_deposito_retiro_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			estado_deposito_retiro_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(estado_deposito_retiro_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			estado_deposito_retiro_constante2.STR_ACTION="<?php echo(estado_deposito_retiro_web::$STR_ACTION); ?>";
			estado_deposito_retiro_constante2.STR_ES_POPUP="<?php echo(estado_deposito_retiro_web::$STR_ES_POPUP); ?>";
			estado_deposito_retiro_constante2.STR_ES_BUSQUEDA="<?php echo(estado_deposito_retiro_web::$STR_ES_BUSQUEDA); ?>";
			estado_deposito_retiro_constante2.STR_FUNCION_JS="<?php echo(estado_deposito_retiro_web::$STR_FUNCION_JS); ?>";
			estado_deposito_retiro_constante2.BIG_ID_ACTUAL="<?php echo(estado_deposito_retiro_web::$BIG_ID_ACTUAL); ?>";
			estado_deposito_retiro_constante2.BIG_ID_OPCION="<?php echo(estado_deposito_retiro_web::$BIG_ID_OPCION); ?>";
			estado_deposito_retiro_constante2.STR_OBJETO_JS="<?php echo(estado_deposito_retiro_web::$STR_OBJETO_JS); ?>";
			estado_deposito_retiro_constante2.STR_ES_RELACIONES="<?php echo(estado_deposito_retiro_web::$STR_ES_RELACIONES); ?>";
			estado_deposito_retiro_constante2.STR_ES_RELACIONADO="<?php echo(estado_deposito_retiro_web::$STR_ES_RELACIONADO); ?>";
			estado_deposito_retiro_constante2.STR_ES_SUB_PAGINA="<?php echo(estado_deposito_retiro_web::$STR_ES_SUB_PAGINA); ?>";
			estado_deposito_retiro_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(estado_deposito_retiro_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			estado_deposito_retiro_constante2.BIT_ES_PAGINA_FORM=<?php echo(estado_deposito_retiro_web::$BIT_ES_PAGINA_FORM); ?>;
			estado_deposito_retiro_constante2.STR_SUFIJO="<?php echo(estado_deposito_retiro_web::$STR_SUF); ?>";//estado_deposito_retiro
			estado_deposito_retiro_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(estado_deposito_retiro_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//estado_deposito_retiro
			
			estado_deposito_retiro_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(estado_deposito_retiro_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			estado_deposito_retiro_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($estado_deposito_retiro_web1->moduloActual->getnombre()); ?>";
			estado_deposito_retiro_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(estado_deposito_retiro_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			estado_deposito_retiro_constante2.BIT_ES_LOAD_NORMAL=true;
			/*estado_deposito_retiro_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			estado_deposito_retiro_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.estado_deposito_retiro_constante2 = estado_deposito_retiro_constante2;
			
		</script>
		
		<?php if(estado_deposito_retiro_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.estado_deposito_retiro_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.estado_deposito_retiro_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="estado_deposito_retiroActual" ></a>
	
	<div id="divResumenestado_deposito_retiroActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(estado_deposito_retiro_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(estado_deposito_retiro_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(estado_deposito_retiro_web::$STR_ES_BUSQUEDA=='false' && estado_deposito_retiro_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(estado_deposito_retiro_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(estado_deposito_retiro_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(estado_deposito_retiro_web::$STR_ES_RELACIONADO=='false' && estado_deposito_retiro_web::$STR_ES_POPUP=='false' && estado_deposito_retiro_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tdestado_deposito_retiroNuevoToolBar">
										<img id="imgNuevoToolBarestado_deposito_retiro" name="imgNuevoToolBarestado_deposito_retiro" title="Nuevo Estado Deposito Retiro Cheque" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(estado_deposito_retiro_web::$STR_ES_BUSQUEDA=='false' && estado_deposito_retiro_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdestado_deposito_retiroNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBarestado_deposito_retiro" name="imgNuevoGuardarCambiosToolBarestado_deposito_retiro" title="Nuevo TABLA Estado Deposito Retiro Cheque" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(estado_deposito_retiro_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdestado_deposito_retiroGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBarestado_deposito_retiro" name="imgGuardarCambiosToolBarestado_deposito_retiro" title="Guardar Estado Deposito Retiro Cheque" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(estado_deposito_retiro_web::$STR_ES_RELACIONADO=='false' && estado_deposito_retiro_web::$STR_ES_RELACIONES=='false' && estado_deposito_retiro_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdestado_deposito_retiroCopiarToolBar">
										<img id="imgCopiarToolBarestado_deposito_retiro" name="imgCopiarToolBarestado_deposito_retiro" title="Copiar Estado Deposito Retiro Cheque" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdestado_deposito_retiroDuplicarToolBar">
										<img id="imgDuplicarToolBarestado_deposito_retiro" name="imgDuplicarToolBarestado_deposito_retiro" title="Duplicar Estado Deposito Retiro Cheque" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(estado_deposito_retiro_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdestado_deposito_retiroRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBarestado_deposito_retiro" name="imgRecargarInformacionToolBarestado_deposito_retiro" title="Recargar Estado Deposito Retiro Cheque" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdestado_deposito_retiroAnterioresToolBar">
										<img id="imgAnterioresToolBarestado_deposito_retiro" name="imgAnterioresToolBarestado_deposito_retiro" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdestado_deposito_retiroSiguientesToolBar">
										<img id="imgSiguientesToolBarestado_deposito_retiro" name="imgSiguientesToolBarestado_deposito_retiro" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdestado_deposito_retiroAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBarestado_deposito_retiro" name="imgAbrirOrderByToolBarestado_deposito_retiro" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((estado_deposito_retiro_web::$STR_ES_RELACIONADO=='false' && estado_deposito_retiro_web::$STR_ES_RELACIONES=='false') || estado_deposito_retiro_web::$STR_ES_BUSQUEDA=='true'  || estado_deposito_retiro_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdestado_deposito_retiroCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBarestado_deposito_retiro" name="imgCerrarPaginaToolBarestado_deposito_retiro" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trestado_deposito_retiroCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedaestado_deposito_retiro" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedaestado_deposito_retiro',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trestado_deposito_retiroCabeceraBusquedas/super -->

		<tr id="trBusquedaestado_deposito_retiro" class="busqueda" style="display:table-row">
			<td id="tdBusquedaestado_deposito_retiro" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedaestado_deposito_retiro" name="frmBusquedaestado_deposito_retiro">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedaestado_deposito_retiro" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trestado_deposito_retiroBusquedas" class="busqueda" style="display:none"><td>
				<?php if(estado_deposito_retiro_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 70%">
				
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscarestado_deposito_retiro" style="display:table-row">
					<td id="tdParamsBuscarestado_deposito_retiro">
		<?php if(estado_deposito_retiro_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscarestado_deposito_retiro">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistrosestado_deposito_retiro" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistrosestado_deposito_retiro"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistrosestado_deposito_retiro" name="ParamsBuscar-txtNumeroRegistrosestado_deposito_retiro" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacionestado_deposito_retiro">
							<td id="tdGenerarReporteestado_deposito_retiro" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodosestado_deposito_retiro" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodosestado_deposito_retiro" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacionestado_deposito_retiro" name="btnRecargarInformacionestado_deposito_retiro" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginaestado_deposito_retiro" name="btnImprimirPaginaestado_deposito_retiro" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*estado_deposito_retiro_web::$STR_ES_BUSQUEDA=='false'  &&*/ estado_deposito_retiro_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderByestado_deposito_retiro">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderByestado_deposito_retiro" name="btnOrderByestado_deposito_retiro" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
													</td>
													<td>
														<input type="button" id="btnOrderByRelestado_deposito_retiro" name="btnOrderByRelestado_deposito_retiro" title="RELACIONES DE DATOS" value="   Rels" class="btn btn-primary"/>
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

										<?php if(estado_deposito_retiro_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdestado_deposito_retiroConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodosestado_deposito_retiro -->

							</td><!-- tdGenerarReporteestado_deposito_retiro -->
						</tr><!-- trRecargarInformacionestado_deposito_retiro -->
					</table><!-- tblParamsBuscarNumeroRegistrosestado_deposito_retiro -->
				</div> <!-- divParamsBuscarestado_deposito_retiro -->
		<?php } ?>
				</td> <!-- tdParamsBuscarestado_deposito_retiro -->
				</tr><!-- trParamsBuscarestado_deposito_retiro -->
				</table> <!-- tblBusquedaestado_deposito_retiro -->
				</form> <!-- frmBusquedaestado_deposito_retiro -->
				

			</td> <!-- tdBusquedaestado_deposito_retiro -->
		</tr> <!-- trBusquedaestado_deposito_retiro/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(estado_deposito_retiro_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divestado_deposito_retiroPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblestado_deposito_retiroPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmestado_deposito_retiroAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnestado_deposito_retiroAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="estado_deposito_retiro_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnestado_deposito_retiroAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmestado_deposito_retiroAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblestado_deposito_retiroPopupAjaxWebPart -->
		</div> <!-- divestado_deposito_retiroPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(estado_deposito_retiro_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trestado_deposito_retiroTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdaestado_deposito_retiro"></a>
		<img id="imgTablaParaDerechaestado_deposito_retiro" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechaestado_deposito_retiro'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdaestado_deposito_retiro" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdaestado_deposito_retiro'"/>
		<a id="TablaDerechaestado_deposito_retiro"></a>
	</td>
</tr> <!-- trestado_deposito_retiroTablaNavegacion/super -->
<?php } ?>

<tr id="trestado_deposito_retiroTablaDatos">
	<td colspan="3" id="htmlTableCellestado_deposito_retiro">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatosestado_deposito_retirosAjaxWebPart">
		</div>
	</td>
</tr> <!-- trestado_deposito_retiroTablaDatos/super -->
		
		
		<tr id="trestado_deposito_retiroPaginacion" style="display:table-row">
			<td id="tdestado_deposito_retiroPaginacion" align="center">
				<div id="divestado_deposito_retiroPaginacionAjaxWebPart">
				<form id="frmPaginacionestado_deposito_retiro" name="frmPaginacionestado_deposito_retiro">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacionestado_deposito_retiro" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:center">
					<tr>
						<?php if(estado_deposito_retiro_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkestado_deposito_retiro" name="btnSeleccionarLoteFkestado_deposito_retiro" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(estado_deposito_retiro_web::$STR_ES_RELACIONADO=='false' /*&& estado_deposito_retiro_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnterioresestado_deposito_retiro" name="btnAnterioresestado_deposito_retiro" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(estado_deposito_retiro_web::$STR_ES_BUSQUEDA=='false' && estado_deposito_retiro_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdestado_deposito_retiroNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPrepararestado_deposito_retiro" name="btnNuevoTablaPrepararestado_deposito_retiro" title="NUEVO Estado Deposito Retiro Cheque" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablaestado_deposito_retiro" name="ParamsPaginar-txtNumeroNuevoTablaestado_deposito_retiro" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(estado_deposito_retiro_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdestado_deposito_retiroConEditarestado_deposito_retiro">
							<label>
								<input id="ParamsBuscar-chbConEditarestado_deposito_retiro" name="ParamsBuscar-chbConEditarestado_deposito_retiro" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(estado_deposito_retiro_web::$STR_ES_RELACIONADO=='false'/* && estado_deposito_retiro_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientesestado_deposito_retiro" name="btnSiguientesestado_deposito_retiro" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacionestado_deposito_retiro -->
				</form> <!-- frmPaginacionestado_deposito_retiro -->
				<form id="frmNuevoPrepararestado_deposito_retiro" name="frmNuevoPrepararestado_deposito_retiro">
				<table id="tblNuevoPrepararestado_deposito_retiro" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:center">
					<tr id="trestado_deposito_retiroNuevo" height="10">
						<?php if(estado_deposito_retiro_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdestado_deposito_retiroNuevo" align="center">
							<input type="button" id="btnNuevoPrepararestado_deposito_retiro" name="btnNuevoPrepararestado_deposito_retiro" title="NUEVO Estado Deposito Retiro Cheque" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdestado_deposito_retiroGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambiosestado_deposito_retiro" name="btnGuardarCambiosestado_deposito_retiro" title="GUARDAR Estado Deposito Retiro Cheque" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(estado_deposito_retiro_web::$STR_ES_RELACIONADO=='false' && estado_deposito_retiro_web::$STR_ES_RELACIONES=='false' && estado_deposito_retiro_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdestado_deposito_retiroDuplicar" align="center">
							<input type="button" id="btnDuplicarestado_deposito_retiro" name="btnDuplicarestado_deposito_retiro" title="DUPLICAR Estado Deposito Retiro Cheque" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdestado_deposito_retiroCopiar" align="center">
							<input type="button" id="btnCopiarestado_deposito_retiro" name="btnCopiarestado_deposito_retiro" title="COPIAR Estado Deposito Retiro Cheque" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(estado_deposito_retiro_web::$STR_ES_RELACIONADO=='false' && ((estado_deposito_retiro_web::$STR_ES_RELACIONADO=='false' && estado_deposito_retiro_web::$STR_ES_RELACIONES=='false') || estado_deposito_retiro_web::$STR_ES_BUSQUEDA=='true'  || estado_deposito_retiro_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdestado_deposito_retiroCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginaestado_deposito_retiro" name="btnCerrarPaginaestado_deposito_retiro" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPrepararestado_deposito_retiro -->
				</form> <!-- frmNuevoPrepararestado_deposito_retiro -->
				</div> <!-- divestado_deposito_retiroPaginacionAjaxWebPart -->
			</td> <!-- tdestado_deposito_retiroPaginacion -->
		</tr> <!-- trestado_deposito_retiroPaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(estado_deposito_retiro_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionesestado_deposito_retiroAjaxWebPart">
			<td id="tdAccionesRelacionesestado_deposito_retiroAjaxWebPart">
				<div id="divAccionesRelacionesestado_deposito_retiroAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionesestado_deposito_retiroAjaxWebPart -->
		</tr> <!-- trAccionesRelacionesestado_deposito_retiroAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderByestado_deposito_retiro">
			<td id="tdOrderByestado_deposito_retiro">
				<form id="frmOrderByestado_deposito_retiro" name="frmOrderByestado_deposito_retiro">
					<div id="divOrderByestado_deposito_retiroAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
				<form id="frmOrderByRelestado_deposito_retiro" name="frmOrderByRelestado_deposito_retiro">
					<div id="divOrderByRelestado_deposito_retiroAjaxWebPart" title="RELACIONES" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderByestado_deposito_retiro -->
		</tr> <!-- trOrderByestado_deposito_retiro/super -->
			
		
		
		
		
		
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
			
				import {estado_deposito_retiro_webcontrol,estado_deposito_retiro_webcontrol1} from './webroot/js/JavaScript/contabilidad/cuentascorrientes/estado_deposito_retiro/js/webcontrol/estado_deposito_retiro_webcontrol.js?random=1';
				
				estado_deposito_retiro_webcontrol1.setestado_deposito_retiro_constante(window.estado_deposito_retiro_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(estado_deposito_retiro_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

