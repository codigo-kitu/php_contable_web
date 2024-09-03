<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\cuentascobrar\parametro_cuenta_cobrar\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Parametro Cuentas Cobrar Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/cuentascobrar/parametro_cuenta_cobrar/util/parametro_cuenta_cobrar_carga.php');
	use com\bydan\contabilidad\cuentascobrar\parametro_cuenta_cobrar\util\parametro_cuenta_cobrar_carga;
	
	//include_once('com/bydan/contabilidad/cuentascobrar/parametro_cuenta_cobrar/presentation/view/parametro_cuenta_cobrar_web.php');
	//use com\bydan\contabilidad\cuentascobrar\parametro_cuenta_cobrar\presentation\view\parametro_cuenta_cobrar_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	parametro_cuenta_cobrar_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	parametro_cuenta_cobrar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$parametro_cuenta_cobrar_web1= new parametro_cuenta_cobrar_web();	
	$parametro_cuenta_cobrar_web1->cargarDatosGenerales();
	
	//$moduloActual=$parametro_cuenta_cobrar_web1->moduloActual;
	//$usuarioActual=$parametro_cuenta_cobrar_web1->usuarioActual;
	//$sessionBase=$parametro_cuenta_cobrar_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$parametro_cuenta_cobrar_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentascobrar/parametro_cuenta_cobrar/js/templating/parametro_cuenta_cobrar_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentascobrar/parametro_cuenta_cobrar/js/templating/parametro_cuenta_cobrar_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentascobrar/parametro_cuenta_cobrar/js/templating/parametro_cuenta_cobrar_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentascobrar/parametro_cuenta_cobrar/js/templating/parametro_cuenta_cobrar_datos_reporte_template.js'); ?>
		
			
						
		
		
		<?php 
			
		
			parametro_cuenta_cobrar_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					parametro_cuenta_cobrar_web::$GET_POST=$_GET;
				} else {
					parametro_cuenta_cobrar_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			parametro_cuenta_cobrar_web::$STR_NOMBRE_PAGINA = 'parametro_cuenta_cobrar_view.php';
			parametro_cuenta_cobrar_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			parametro_cuenta_cobrar_web::$BIT_ES_PAGINA_FORM = 'false';
				
			parametro_cuenta_cobrar_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {parametro_cuenta_cobrar_constante,parametro_cuenta_cobrar_constante1} from './webroot/js/JavaScript/contabilidad/cuentascobrar/parametro_cuenta_cobrar/js/util/parametro_cuenta_cobrar_constante.js?random=1';
			import {parametro_cuenta_cobrar_funcion,parametro_cuenta_cobrar_funcion1} from './webroot/js/JavaScript/contabilidad/cuentascobrar/parametro_cuenta_cobrar/js/util/parametro_cuenta_cobrar_funcion.js?random=1';
			
			let parametro_cuenta_cobrar_constante2 = new parametro_cuenta_cobrar_constante();
			
			parametro_cuenta_cobrar_constante2.STR_NOMBRE_PAGINA="<?php echo(parametro_cuenta_cobrar_web::$STR_NOMBRE_PAGINA); ?>";
			parametro_cuenta_cobrar_constante2.STR_TYPE_ON_LOADparametro_cuenta_cobrar="<?php echo(parametro_cuenta_cobrar_web::$STR_TYPE_ONLOAD); ?>";
			parametro_cuenta_cobrar_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(parametro_cuenta_cobrar_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			parametro_cuenta_cobrar_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(parametro_cuenta_cobrar_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			parametro_cuenta_cobrar_constante2.STR_ACTION="<?php echo(parametro_cuenta_cobrar_web::$STR_ACTION); ?>";
			parametro_cuenta_cobrar_constante2.STR_ES_POPUP="<?php echo(parametro_cuenta_cobrar_web::$STR_ES_POPUP); ?>";
			parametro_cuenta_cobrar_constante2.STR_ES_BUSQUEDA="<?php echo(parametro_cuenta_cobrar_web::$STR_ES_BUSQUEDA); ?>";
			parametro_cuenta_cobrar_constante2.STR_FUNCION_JS="<?php echo(parametro_cuenta_cobrar_web::$STR_FUNCION_JS); ?>";
			parametro_cuenta_cobrar_constante2.BIG_ID_ACTUAL="<?php echo(parametro_cuenta_cobrar_web::$BIG_ID_ACTUAL); ?>";
			parametro_cuenta_cobrar_constante2.BIG_ID_OPCION="<?php echo(parametro_cuenta_cobrar_web::$BIG_ID_OPCION); ?>";
			parametro_cuenta_cobrar_constante2.STR_OBJETO_JS="<?php echo(parametro_cuenta_cobrar_web::$STR_OBJETO_JS); ?>";
			parametro_cuenta_cobrar_constante2.STR_ES_RELACIONES="<?php echo(parametro_cuenta_cobrar_web::$STR_ES_RELACIONES); ?>";
			parametro_cuenta_cobrar_constante2.STR_ES_RELACIONADO="<?php echo(parametro_cuenta_cobrar_web::$STR_ES_RELACIONADO); ?>";
			parametro_cuenta_cobrar_constante2.STR_ES_SUB_PAGINA="<?php echo(parametro_cuenta_cobrar_web::$STR_ES_SUB_PAGINA); ?>";
			parametro_cuenta_cobrar_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(parametro_cuenta_cobrar_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			parametro_cuenta_cobrar_constante2.BIT_ES_PAGINA_FORM=<?php echo(parametro_cuenta_cobrar_web::$BIT_ES_PAGINA_FORM); ?>;
			parametro_cuenta_cobrar_constante2.STR_SUFIJO="<?php echo(parametro_cuenta_cobrar_web::$STR_SUF); ?>";//parametro_cuenta_cobrar
			parametro_cuenta_cobrar_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(parametro_cuenta_cobrar_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//parametro_cuenta_cobrar
			
			parametro_cuenta_cobrar_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(parametro_cuenta_cobrar_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			parametro_cuenta_cobrar_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($parametro_cuenta_cobrar_web1->moduloActual->getnombre()); ?>";
			parametro_cuenta_cobrar_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(parametro_cuenta_cobrar_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			parametro_cuenta_cobrar_constante2.BIT_ES_LOAD_NORMAL=true;
			/*parametro_cuenta_cobrar_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			parametro_cuenta_cobrar_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.parametro_cuenta_cobrar_constante2 = parametro_cuenta_cobrar_constante2;
			
		</script>
		
		<?php if(parametro_cuenta_cobrar_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.parametro_cuenta_cobrar_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.parametro_cuenta_cobrar_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="parametro_cuenta_cobrarActual" ></a>
	
	<div id="divResumenparametro_cuenta_cobrarActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(parametro_cuenta_cobrar_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(parametro_cuenta_cobrar_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(parametro_cuenta_cobrar_web::$STR_ES_BUSQUEDA=='false' && parametro_cuenta_cobrar_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(parametro_cuenta_cobrar_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(parametro_cuenta_cobrar_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(parametro_cuenta_cobrar_web::$STR_ES_RELACIONADO=='false' && parametro_cuenta_cobrar_web::$STR_ES_POPUP=='false' && parametro_cuenta_cobrar_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tdparametro_cuenta_cobrarNuevoToolBar">
										<img id="imgNuevoToolBarparametro_cuenta_cobrar" name="imgNuevoToolBarparametro_cuenta_cobrar" title="Nuevo Parametro Cuentas Cobrar" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(parametro_cuenta_cobrar_web::$STR_ES_BUSQUEDA=='false' && parametro_cuenta_cobrar_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdparametro_cuenta_cobrarNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBarparametro_cuenta_cobrar" name="imgNuevoGuardarCambiosToolBarparametro_cuenta_cobrar" title="Nuevo TABLA Parametro Cuentas Cobrar" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(parametro_cuenta_cobrar_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdparametro_cuenta_cobrarGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBarparametro_cuenta_cobrar" name="imgGuardarCambiosToolBarparametro_cuenta_cobrar" title="Guardar Parametro Cuentas Cobrar" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(parametro_cuenta_cobrar_web::$STR_ES_RELACIONADO=='false' && parametro_cuenta_cobrar_web::$STR_ES_RELACIONES=='false' && parametro_cuenta_cobrar_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdparametro_cuenta_cobrarCopiarToolBar">
										<img id="imgCopiarToolBarparametro_cuenta_cobrar" name="imgCopiarToolBarparametro_cuenta_cobrar" title="Copiar Parametro Cuentas Cobrar" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdparametro_cuenta_cobrarDuplicarToolBar">
										<img id="imgDuplicarToolBarparametro_cuenta_cobrar" name="imgDuplicarToolBarparametro_cuenta_cobrar" title="Duplicar Parametro Cuentas Cobrar" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(parametro_cuenta_cobrar_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdparametro_cuenta_cobrarRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBarparametro_cuenta_cobrar" name="imgRecargarInformacionToolBarparametro_cuenta_cobrar" title="Recargar Parametro Cuentas Cobrar" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdparametro_cuenta_cobrarAnterioresToolBar">
										<img id="imgAnterioresToolBarparametro_cuenta_cobrar" name="imgAnterioresToolBarparametro_cuenta_cobrar" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdparametro_cuenta_cobrarSiguientesToolBar">
										<img id="imgSiguientesToolBarparametro_cuenta_cobrar" name="imgSiguientesToolBarparametro_cuenta_cobrar" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdparametro_cuenta_cobrarAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBarparametro_cuenta_cobrar" name="imgAbrirOrderByToolBarparametro_cuenta_cobrar" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((parametro_cuenta_cobrar_web::$STR_ES_RELACIONADO=='false' && parametro_cuenta_cobrar_web::$STR_ES_RELACIONES=='false') || parametro_cuenta_cobrar_web::$STR_ES_BUSQUEDA=='true'  || parametro_cuenta_cobrar_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdparametro_cuenta_cobrarCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBarparametro_cuenta_cobrar" name="imgCerrarPaginaToolBarparametro_cuenta_cobrar" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trparametro_cuenta_cobrarCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedaparametro_cuenta_cobrar" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedaparametro_cuenta_cobrar',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trparametro_cuenta_cobrarCabeceraBusquedas/super -->

		<tr id="trBusquedaparametro_cuenta_cobrar" class="busqueda" style="display:table-row">
			<td id="tdBusquedaparametro_cuenta_cobrar" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedaparametro_cuenta_cobrar" name="frmBusquedaparametro_cuenta_cobrar">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedaparametro_cuenta_cobrar" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trparametro_cuenta_cobrarBusquedas" class="busqueda" style="display:none"><td>
				<?php if(parametro_cuenta_cobrar_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 70%">
				
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscarparametro_cuenta_cobrar" style="display:table-row">
					<td id="tdParamsBuscarparametro_cuenta_cobrar">
		<?php if(parametro_cuenta_cobrar_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscarparametro_cuenta_cobrar">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistrosparametro_cuenta_cobrar" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistrosparametro_cuenta_cobrar"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistrosparametro_cuenta_cobrar" name="ParamsBuscar-txtNumeroRegistrosparametro_cuenta_cobrar" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacionparametro_cuenta_cobrar">
							<td id="tdGenerarReporteparametro_cuenta_cobrar" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodosparametro_cuenta_cobrar" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodosparametro_cuenta_cobrar" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacionparametro_cuenta_cobrar" name="btnRecargarInformacionparametro_cuenta_cobrar" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginaparametro_cuenta_cobrar" name="btnImprimirPaginaparametro_cuenta_cobrar" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*parametro_cuenta_cobrar_web::$STR_ES_BUSQUEDA=='false'  &&*/ parametro_cuenta_cobrar_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderByparametro_cuenta_cobrar">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderByparametro_cuenta_cobrar" name="btnOrderByparametro_cuenta_cobrar" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
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

										<?php if(parametro_cuenta_cobrar_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdparametro_cuenta_cobrarConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodosparametro_cuenta_cobrar -->

							</td><!-- tdGenerarReporteparametro_cuenta_cobrar -->
						</tr><!-- trRecargarInformacionparametro_cuenta_cobrar -->
					</table><!-- tblParamsBuscarNumeroRegistrosparametro_cuenta_cobrar -->
				</div> <!-- divParamsBuscarparametro_cuenta_cobrar -->
		<?php } ?>
				</td> <!-- tdParamsBuscarparametro_cuenta_cobrar -->
				</tr><!-- trParamsBuscarparametro_cuenta_cobrar -->
				</table> <!-- tblBusquedaparametro_cuenta_cobrar -->
				</form> <!-- frmBusquedaparametro_cuenta_cobrar -->
				

			</td> <!-- tdBusquedaparametro_cuenta_cobrar -->
		</tr> <!-- trBusquedaparametro_cuenta_cobrar/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(parametro_cuenta_cobrar_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divparametro_cuenta_cobrarPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblparametro_cuenta_cobrarPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmparametro_cuenta_cobrarAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnparametro_cuenta_cobrarAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="parametro_cuenta_cobrar_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnparametro_cuenta_cobrarAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmparametro_cuenta_cobrarAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblparametro_cuenta_cobrarPopupAjaxWebPart -->
		</div> <!-- divparametro_cuenta_cobrarPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(parametro_cuenta_cobrar_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trparametro_cuenta_cobrarTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdaparametro_cuenta_cobrar"></a>
		<img id="imgTablaParaDerechaparametro_cuenta_cobrar" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechaparametro_cuenta_cobrar'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdaparametro_cuenta_cobrar" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdaparametro_cuenta_cobrar'"/>
		<a id="TablaDerechaparametro_cuenta_cobrar"></a>
	</td>
</tr> <!-- trparametro_cuenta_cobrarTablaNavegacion/super -->
<?php } ?>

<tr id="trparametro_cuenta_cobrarTablaDatos">
	<td colspan="3" id="htmlTableCellparametro_cuenta_cobrar">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatosparametro_cuenta_cobrarsAjaxWebPart">
		</div>
	</td>
</tr> <!-- trparametro_cuenta_cobrarTablaDatos/super -->
		
		
		<tr id="trparametro_cuenta_cobrarPaginacion" style="display:table-row">
			<td id="tdparametro_cuenta_cobrarPaginacion" align="left">
				<div id="divparametro_cuenta_cobrarPaginacionAjaxWebPart">
				<form id="frmPaginacionparametro_cuenta_cobrar" name="frmPaginacionparametro_cuenta_cobrar">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacionparametro_cuenta_cobrar" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:left">
					<tr>
						<?php if(parametro_cuenta_cobrar_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkparametro_cuenta_cobrar" name="btnSeleccionarLoteFkparametro_cuenta_cobrar" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(parametro_cuenta_cobrar_web::$STR_ES_RELACIONADO=='false' /*&& parametro_cuenta_cobrar_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnterioresparametro_cuenta_cobrar" name="btnAnterioresparametro_cuenta_cobrar" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(parametro_cuenta_cobrar_web::$STR_ES_BUSQUEDA=='false' && parametro_cuenta_cobrar_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdparametro_cuenta_cobrarNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPrepararparametro_cuenta_cobrar" name="btnNuevoTablaPrepararparametro_cuenta_cobrar" title="NUEVO Parametro Cuentas Cobrar" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablaparametro_cuenta_cobrar" name="ParamsPaginar-txtNumeroNuevoTablaparametro_cuenta_cobrar" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(parametro_cuenta_cobrar_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdparametro_cuenta_cobrarConEditarparametro_cuenta_cobrar">
							<label>
								<input id="ParamsBuscar-chbConEditarparametro_cuenta_cobrar" name="ParamsBuscar-chbConEditarparametro_cuenta_cobrar" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(parametro_cuenta_cobrar_web::$STR_ES_RELACIONADO=='false'/* && parametro_cuenta_cobrar_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientesparametro_cuenta_cobrar" name="btnSiguientesparametro_cuenta_cobrar" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacionparametro_cuenta_cobrar -->
				</form> <!-- frmPaginacionparametro_cuenta_cobrar -->
				<form id="frmNuevoPrepararparametro_cuenta_cobrar" name="frmNuevoPrepararparametro_cuenta_cobrar">
				<table id="tblNuevoPrepararparametro_cuenta_cobrar" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:left">
					<tr id="trparametro_cuenta_cobrarNuevo" height="10">
						<?php if(parametro_cuenta_cobrar_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdparametro_cuenta_cobrarNuevo" align="center">
							<input type="button" id="btnNuevoPrepararparametro_cuenta_cobrar" name="btnNuevoPrepararparametro_cuenta_cobrar" title="NUEVO Parametro Cuentas Cobrar" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdparametro_cuenta_cobrarGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambiosparametro_cuenta_cobrar" name="btnGuardarCambiosparametro_cuenta_cobrar" title="GUARDAR Parametro Cuentas Cobrar" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(parametro_cuenta_cobrar_web::$STR_ES_RELACIONADO=='false' && parametro_cuenta_cobrar_web::$STR_ES_RELACIONES=='false' && parametro_cuenta_cobrar_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdparametro_cuenta_cobrarDuplicar" align="center">
							<input type="button" id="btnDuplicarparametro_cuenta_cobrar" name="btnDuplicarparametro_cuenta_cobrar" title="DUPLICAR Parametro Cuentas Cobrar" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdparametro_cuenta_cobrarCopiar" align="center">
							<input type="button" id="btnCopiarparametro_cuenta_cobrar" name="btnCopiarparametro_cuenta_cobrar" title="COPIAR Parametro Cuentas Cobrar" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(parametro_cuenta_cobrar_web::$STR_ES_RELACIONADO=='false' && ((parametro_cuenta_cobrar_web::$STR_ES_RELACIONADO=='false' && parametro_cuenta_cobrar_web::$STR_ES_RELACIONES=='false') || parametro_cuenta_cobrar_web::$STR_ES_BUSQUEDA=='true'  || parametro_cuenta_cobrar_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdparametro_cuenta_cobrarCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginaparametro_cuenta_cobrar" name="btnCerrarPaginaparametro_cuenta_cobrar" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPrepararparametro_cuenta_cobrar -->
				</form> <!-- frmNuevoPrepararparametro_cuenta_cobrar -->
				</div> <!-- divparametro_cuenta_cobrarPaginacionAjaxWebPart -->
			</td> <!-- tdparametro_cuenta_cobrarPaginacion -->
		</tr> <!-- trparametro_cuenta_cobrarPaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(parametro_cuenta_cobrar_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionesparametro_cuenta_cobrarAjaxWebPart">
			<td id="tdAccionesRelacionesparametro_cuenta_cobrarAjaxWebPart">
				<div id="divAccionesRelacionesparametro_cuenta_cobrarAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionesparametro_cuenta_cobrarAjaxWebPart -->
		</tr> <!-- trAccionesRelacionesparametro_cuenta_cobrarAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderByparametro_cuenta_cobrar">
			<td id="tdOrderByparametro_cuenta_cobrar">
				<form id="frmOrderByparametro_cuenta_cobrar" name="frmOrderByparametro_cuenta_cobrar">
					<div id="divOrderByparametro_cuenta_cobrarAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderByparametro_cuenta_cobrar -->
		</tr> <!-- trOrderByparametro_cuenta_cobrar/super -->
			
		
		
		
		
		
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
			
				import {parametro_cuenta_cobrar_webcontrol,parametro_cuenta_cobrar_webcontrol1} from './webroot/js/JavaScript/contabilidad/cuentascobrar/parametro_cuenta_cobrar/js/webcontrol/parametro_cuenta_cobrar_webcontrol.js?random=1';
				
				parametro_cuenta_cobrar_webcontrol1.setparametro_cuenta_cobrar_constante(window.parametro_cuenta_cobrar_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(parametro_cuenta_cobrar_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

