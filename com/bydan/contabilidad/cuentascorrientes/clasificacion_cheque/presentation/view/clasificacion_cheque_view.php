<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\cuentascorrientes\clasificacion_cheque\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Clasificacion Cheque Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/cuentascorrientes/clasificacion_cheque/util/clasificacion_cheque_carga.php');
	use com\bydan\contabilidad\cuentascorrientes\clasificacion_cheque\util\clasificacion_cheque_carga;
	
	//include_once('com/bydan/contabilidad/cuentascorrientes/clasificacion_cheque/presentation/view/clasificacion_cheque_web.php');
	//use com\bydan\contabilidad\cuentascorrientes\clasificacion_cheque\presentation\view\clasificacion_cheque_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	clasificacion_cheque_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	clasificacion_cheque_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$clasificacion_cheque_web1= new clasificacion_cheque_web();	
	$clasificacion_cheque_web1->cargarDatosGenerales();
	
	//$moduloActual=$clasificacion_cheque_web1->moduloActual;
	//$usuarioActual=$clasificacion_cheque_web1->usuarioActual;
	//$sessionBase=$clasificacion_cheque_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$clasificacion_cheque_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentascorrientes/clasificacion_cheque/js/templating/clasificacion_cheque_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentascorrientes/clasificacion_cheque/js/templating/clasificacion_cheque_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentascorrientes/clasificacion_cheque/js/templating/clasificacion_cheque_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentascorrientes/clasificacion_cheque/js/templating/clasificacion_cheque_datos_reporte_template.js'); ?>
		
			
						
		
		
		<?php 
			
		
			clasificacion_cheque_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					clasificacion_cheque_web::$GET_POST=$_GET;
				} else {
					clasificacion_cheque_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			clasificacion_cheque_web::$STR_NOMBRE_PAGINA = 'clasificacion_cheque_view.php';
			clasificacion_cheque_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			clasificacion_cheque_web::$BIT_ES_PAGINA_FORM = 'false';
				
			clasificacion_cheque_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {clasificacion_cheque_constante,clasificacion_cheque_constante1} from './webroot/js/JavaScript/contabilidad/cuentascorrientes/clasificacion_cheque/js/util/clasificacion_cheque_constante.js?random=1';
			import {clasificacion_cheque_funcion,clasificacion_cheque_funcion1} from './webroot/js/JavaScript/contabilidad/cuentascorrientes/clasificacion_cheque/js/util/clasificacion_cheque_funcion.js?random=1';
			
			let clasificacion_cheque_constante2 = new clasificacion_cheque_constante();
			
			clasificacion_cheque_constante2.STR_NOMBRE_PAGINA="<?php echo(clasificacion_cheque_web::$STR_NOMBRE_PAGINA); ?>";
			clasificacion_cheque_constante2.STR_TYPE_ON_LOADclasificacion_cheque="<?php echo(clasificacion_cheque_web::$STR_TYPE_ONLOAD); ?>";
			clasificacion_cheque_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(clasificacion_cheque_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			clasificacion_cheque_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(clasificacion_cheque_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			clasificacion_cheque_constante2.STR_ACTION="<?php echo(clasificacion_cheque_web::$STR_ACTION); ?>";
			clasificacion_cheque_constante2.STR_ES_POPUP="<?php echo(clasificacion_cheque_web::$STR_ES_POPUP); ?>";
			clasificacion_cheque_constante2.STR_ES_BUSQUEDA="<?php echo(clasificacion_cheque_web::$STR_ES_BUSQUEDA); ?>";
			clasificacion_cheque_constante2.STR_FUNCION_JS="<?php echo(clasificacion_cheque_web::$STR_FUNCION_JS); ?>";
			clasificacion_cheque_constante2.BIG_ID_ACTUAL="<?php echo(clasificacion_cheque_web::$BIG_ID_ACTUAL); ?>";
			clasificacion_cheque_constante2.BIG_ID_OPCION="<?php echo(clasificacion_cheque_web::$BIG_ID_OPCION); ?>";
			clasificacion_cheque_constante2.STR_OBJETO_JS="<?php echo(clasificacion_cheque_web::$STR_OBJETO_JS); ?>";
			clasificacion_cheque_constante2.STR_ES_RELACIONES="<?php echo(clasificacion_cheque_web::$STR_ES_RELACIONES); ?>";
			clasificacion_cheque_constante2.STR_ES_RELACIONADO="<?php echo(clasificacion_cheque_web::$STR_ES_RELACIONADO); ?>";
			clasificacion_cheque_constante2.STR_ES_SUB_PAGINA="<?php echo(clasificacion_cheque_web::$STR_ES_SUB_PAGINA); ?>";
			clasificacion_cheque_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(clasificacion_cheque_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			clasificacion_cheque_constante2.BIT_ES_PAGINA_FORM=<?php echo(clasificacion_cheque_web::$BIT_ES_PAGINA_FORM); ?>;
			clasificacion_cheque_constante2.STR_SUFIJO="<?php echo(clasificacion_cheque_web::$STR_SUF); ?>";//clasificacion_cheque
			clasificacion_cheque_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(clasificacion_cheque_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//clasificacion_cheque
			
			clasificacion_cheque_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(clasificacion_cheque_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			clasificacion_cheque_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($clasificacion_cheque_web1->moduloActual->getnombre()); ?>";
			clasificacion_cheque_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(clasificacion_cheque_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			clasificacion_cheque_constante2.BIT_ES_LOAD_NORMAL=true;
			/*clasificacion_cheque_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			clasificacion_cheque_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.clasificacion_cheque_constante2 = clasificacion_cheque_constante2;
			
		</script>
		
		<?php if(clasificacion_cheque_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.clasificacion_cheque_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.clasificacion_cheque_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="clasificacion_chequeActual" ></a>
	
	<div id="divResumenclasificacion_chequeActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(clasificacion_cheque_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(clasificacion_cheque_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(clasificacion_cheque_web::$STR_ES_BUSQUEDA=='false' && clasificacion_cheque_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(clasificacion_cheque_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(clasificacion_cheque_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(clasificacion_cheque_web::$STR_ES_RELACIONADO=='false' && clasificacion_cheque_web::$STR_ES_POPUP=='false' && clasificacion_cheque_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tdclasificacion_chequeNuevoToolBar">
										<img id="imgNuevoToolBarclasificacion_cheque" name="imgNuevoToolBarclasificacion_cheque" title="Nuevo Clasificacion Cheque" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(clasificacion_cheque_web::$STR_ES_BUSQUEDA=='false' && clasificacion_cheque_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdclasificacion_chequeNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBarclasificacion_cheque" name="imgNuevoGuardarCambiosToolBarclasificacion_cheque" title="Nuevo TABLA Clasificacion Cheque" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(clasificacion_cheque_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdclasificacion_chequeGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBarclasificacion_cheque" name="imgGuardarCambiosToolBarclasificacion_cheque" title="Guardar Clasificacion Cheque" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(clasificacion_cheque_web::$STR_ES_RELACIONADO=='false' && clasificacion_cheque_web::$STR_ES_RELACIONES=='false' && clasificacion_cheque_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdclasificacion_chequeCopiarToolBar">
										<img id="imgCopiarToolBarclasificacion_cheque" name="imgCopiarToolBarclasificacion_cheque" title="Copiar Clasificacion Cheque" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdclasificacion_chequeDuplicarToolBar">
										<img id="imgDuplicarToolBarclasificacion_cheque" name="imgDuplicarToolBarclasificacion_cheque" title="Duplicar Clasificacion Cheque" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(clasificacion_cheque_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdclasificacion_chequeRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBarclasificacion_cheque" name="imgRecargarInformacionToolBarclasificacion_cheque" title="Recargar Clasificacion Cheque" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdclasificacion_chequeAnterioresToolBar">
										<img id="imgAnterioresToolBarclasificacion_cheque" name="imgAnterioresToolBarclasificacion_cheque" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdclasificacion_chequeSiguientesToolBar">
										<img id="imgSiguientesToolBarclasificacion_cheque" name="imgSiguientesToolBarclasificacion_cheque" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdclasificacion_chequeAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBarclasificacion_cheque" name="imgAbrirOrderByToolBarclasificacion_cheque" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((clasificacion_cheque_web::$STR_ES_RELACIONADO=='false' && clasificacion_cheque_web::$STR_ES_RELACIONES=='false') || clasificacion_cheque_web::$STR_ES_BUSQUEDA=='true'  || clasificacion_cheque_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdclasificacion_chequeCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBarclasificacion_cheque" name="imgCerrarPaginaToolBarclasificacion_cheque" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trclasificacion_chequeCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedaclasificacion_cheque" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedaclasificacion_cheque',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trclasificacion_chequeCabeceraBusquedas/super -->

		<tr id="trBusquedaclasificacion_cheque" class="busqueda" style="display:table-row">
			<td id="tdBusquedaclasificacion_cheque" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedaclasificacion_cheque" name="frmBusquedaclasificacion_cheque">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedaclasificacion_cheque" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trclasificacion_chequeBusquedas" class="busqueda" style="display:table-row"><td>
				<?php if(clasificacion_cheque_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 70%">
					<ul>
						<li id="listrVisibleFK_Idcategoria_cheque" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idcategoria_cheque"> Por Categoria Cheque</a></li>
						<li id="listrVisibleFK_Idcuenta_corriente_detalle" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idcuenta_corriente_detalle"> Por Cuenta Cliente Detalle</a></li>
					</ul>
				
					<div id="divstrVisibleFK_Idcategoria_cheque">
					<table id="tblstrVisibleFK_Idcategoria_cheque" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Categoria Cheque</span>
						</td>
						<td align="center">
							<select id="FK_Idcategoria_cheque-cmbid_categoria_cheque" name="FK_Idcategoria_cheque-cmbid_categoria_cheque" title="Categoria Cheque" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarclasificacion_chequeFK_Idcategoria_cheque" name="btnBuscarclasificacion_chequeFK_Idcategoria_cheque" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idcuenta_corriente_detalle">
					<table id="tblstrVisibleFK_Idcuenta_corriente_detalle" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Cuenta Cliente Detalle</span>
						</td>
						<td align="center">
							<select id="FK_Idcuenta_corriente_detalle-cmbid_cuenta_corriente_detalle" name="FK_Idcuenta_corriente_detalle-cmbid_cuenta_corriente_detalle" title="Cuenta Cliente Detalle" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarclasificacion_chequeFK_Idcuenta_corriente_detalle" name="btnBuscarclasificacion_chequeFK_Idcuenta_corriente_detalle" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscarclasificacion_cheque" style="display:table-row">
					<td id="tdParamsBuscarclasificacion_cheque">
		<?php if(clasificacion_cheque_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscarclasificacion_cheque">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistrosclasificacion_cheque" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistrosclasificacion_cheque"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistrosclasificacion_cheque" name="ParamsBuscar-txtNumeroRegistrosclasificacion_cheque" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacionclasificacion_cheque">
							<td id="tdGenerarReporteclasificacion_cheque" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodosclasificacion_cheque" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodosclasificacion_cheque" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacionclasificacion_cheque" name="btnRecargarInformacionclasificacion_cheque" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginaclasificacion_cheque" name="btnImprimirPaginaclasificacion_cheque" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*clasificacion_cheque_web::$STR_ES_BUSQUEDA=='false'  &&*/ clasificacion_cheque_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderByclasificacion_cheque">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderByclasificacion_cheque" name="btnOrderByclasificacion_cheque" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
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

										<?php if(clasificacion_cheque_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdclasificacion_chequeConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodosclasificacion_cheque -->

							</td><!-- tdGenerarReporteclasificacion_cheque -->
						</tr><!-- trRecargarInformacionclasificacion_cheque -->
					</table><!-- tblParamsBuscarNumeroRegistrosclasificacion_cheque -->
				</div> <!-- divParamsBuscarclasificacion_cheque -->
		<?php } ?>
				</td> <!-- tdParamsBuscarclasificacion_cheque -->
				</tr><!-- trParamsBuscarclasificacion_cheque -->
				</table> <!-- tblBusquedaclasificacion_cheque -->
				</form> <!-- frmBusquedaclasificacion_cheque -->
				

			</td> <!-- tdBusquedaclasificacion_cheque -->
		</tr> <!-- trBusquedaclasificacion_cheque/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(clasificacion_cheque_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divclasificacion_chequePopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblclasificacion_chequePopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmclasificacion_chequeAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnclasificacion_chequeAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="clasificacion_cheque_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnclasificacion_chequeAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmclasificacion_chequeAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblclasificacion_chequePopupAjaxWebPart -->
		</div> <!-- divclasificacion_chequePopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(clasificacion_cheque_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trclasificacion_chequeTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdaclasificacion_cheque"></a>
		<img id="imgTablaParaDerechaclasificacion_cheque" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechaclasificacion_cheque'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdaclasificacion_cheque" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdaclasificacion_cheque'"/>
		<a id="TablaDerechaclasificacion_cheque"></a>
	</td>
</tr> <!-- trclasificacion_chequeTablaNavegacion/super -->
<?php } ?>

<tr id="trclasificacion_chequeTablaDatos">
	<td colspan="3" id="htmlTableCellclasificacion_cheque">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatosclasificacion_chequesAjaxWebPart">
		</div>
	</td>
</tr> <!-- trclasificacion_chequeTablaDatos/super -->
		
		
		<tr id="trclasificacion_chequePaginacion" style="display:table-row">
			<td id="tdclasificacion_chequePaginacion" align="center">
				<div id="divclasificacion_chequePaginacionAjaxWebPart">
				<form id="frmPaginacionclasificacion_cheque" name="frmPaginacionclasificacion_cheque">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacionclasificacion_cheque" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:center">
					<tr>
						<?php if(clasificacion_cheque_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkclasificacion_cheque" name="btnSeleccionarLoteFkclasificacion_cheque" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(clasificacion_cheque_web::$STR_ES_RELACIONADO=='false' /*&& clasificacion_cheque_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnterioresclasificacion_cheque" name="btnAnterioresclasificacion_cheque" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(clasificacion_cheque_web::$STR_ES_BUSQUEDA=='false' && clasificacion_cheque_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdclasificacion_chequeNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPrepararclasificacion_cheque" name="btnNuevoTablaPrepararclasificacion_cheque" title="NUEVO Clasificacion Cheque" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablaclasificacion_cheque" name="ParamsPaginar-txtNumeroNuevoTablaclasificacion_cheque" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(clasificacion_cheque_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdclasificacion_chequeConEditarclasificacion_cheque">
							<label>
								<input id="ParamsBuscar-chbConEditarclasificacion_cheque" name="ParamsBuscar-chbConEditarclasificacion_cheque" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(clasificacion_cheque_web::$STR_ES_RELACIONADO=='false'/* && clasificacion_cheque_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientesclasificacion_cheque" name="btnSiguientesclasificacion_cheque" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacionclasificacion_cheque -->
				</form> <!-- frmPaginacionclasificacion_cheque -->
				<form id="frmNuevoPrepararclasificacion_cheque" name="frmNuevoPrepararclasificacion_cheque">
				<table id="tblNuevoPrepararclasificacion_cheque" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:center">
					<tr id="trclasificacion_chequeNuevo" height="10">
						<?php if(clasificacion_cheque_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdclasificacion_chequeNuevo" align="center">
							<input type="button" id="btnNuevoPrepararclasificacion_cheque" name="btnNuevoPrepararclasificacion_cheque" title="NUEVO Clasificacion Cheque" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdclasificacion_chequeGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambiosclasificacion_cheque" name="btnGuardarCambiosclasificacion_cheque" title="GUARDAR Clasificacion Cheque" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(clasificacion_cheque_web::$STR_ES_RELACIONADO=='false' && clasificacion_cheque_web::$STR_ES_RELACIONES=='false' && clasificacion_cheque_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdclasificacion_chequeDuplicar" align="center">
							<input type="button" id="btnDuplicarclasificacion_cheque" name="btnDuplicarclasificacion_cheque" title="DUPLICAR Clasificacion Cheque" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdclasificacion_chequeCopiar" align="center">
							<input type="button" id="btnCopiarclasificacion_cheque" name="btnCopiarclasificacion_cheque" title="COPIAR Clasificacion Cheque" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(clasificacion_cheque_web::$STR_ES_RELACIONADO=='false' && ((clasificacion_cheque_web::$STR_ES_RELACIONADO=='false' && clasificacion_cheque_web::$STR_ES_RELACIONES=='false') || clasificacion_cheque_web::$STR_ES_BUSQUEDA=='true'  || clasificacion_cheque_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdclasificacion_chequeCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginaclasificacion_cheque" name="btnCerrarPaginaclasificacion_cheque" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPrepararclasificacion_cheque -->
				</form> <!-- frmNuevoPrepararclasificacion_cheque -->
				</div> <!-- divclasificacion_chequePaginacionAjaxWebPart -->
			</td> <!-- tdclasificacion_chequePaginacion -->
		</tr> <!-- trclasificacion_chequePaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(clasificacion_cheque_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionesclasificacion_chequeAjaxWebPart">
			<td id="tdAccionesRelacionesclasificacion_chequeAjaxWebPart">
				<div id="divAccionesRelacionesclasificacion_chequeAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionesclasificacion_chequeAjaxWebPart -->
		</tr> <!-- trAccionesRelacionesclasificacion_chequeAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderByclasificacion_cheque">
			<td id="tdOrderByclasificacion_cheque">
				<form id="frmOrderByclasificacion_cheque" name="frmOrderByclasificacion_cheque">
					<div id="divOrderByclasificacion_chequeAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderByclasificacion_cheque -->
		</tr> <!-- trOrderByclasificacion_cheque/super -->
			
		
		
		
		
		
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
			
				import {clasificacion_cheque_webcontrol,clasificacion_cheque_webcontrol1} from './webroot/js/JavaScript/contabilidad/cuentascorrientes/clasificacion_cheque/js/webcontrol/clasificacion_cheque_webcontrol.js?random=1';
				
				clasificacion_cheque_webcontrol1.setclasificacion_cheque_constante(window.clasificacion_cheque_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(clasificacion_cheque_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

