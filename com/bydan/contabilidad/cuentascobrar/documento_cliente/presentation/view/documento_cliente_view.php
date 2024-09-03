<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\cuentascobrar\documento_cliente\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Documentos Clientes Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/cuentascobrar/documento_cliente/util/documento_cliente_carga.php');
	use com\bydan\contabilidad\cuentascobrar\documento_cliente\util\documento_cliente_carga;
	
	//include_once('com/bydan/contabilidad/cuentascobrar/documento_cliente/presentation/view/documento_cliente_web.php');
	//use com\bydan\contabilidad\cuentascobrar\documento_cliente\presentation\view\documento_cliente_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	documento_cliente_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	documento_cliente_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$documento_cliente_web1= new documento_cliente_web();	
	$documento_cliente_web1->cargarDatosGenerales();
	
	//$moduloActual=$documento_cliente_web1->moduloActual;
	//$usuarioActual=$documento_cliente_web1->usuarioActual;
	//$sessionBase=$documento_cliente_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$documento_cliente_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentascobrar/documento_cliente/js/templating/documento_cliente_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentascobrar/documento_cliente/js/templating/documento_cliente_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentascobrar/documento_cliente/js/templating/documento_cliente_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentascobrar/documento_cliente/js/templating/documento_cliente_datos_reporte_template.js'); ?>
		
			
						
		
		
		<?php 
			
		
			documento_cliente_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					documento_cliente_web::$GET_POST=$_GET;
				} else {
					documento_cliente_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			documento_cliente_web::$STR_NOMBRE_PAGINA = 'documento_cliente_view.php';
			documento_cliente_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			documento_cliente_web::$BIT_ES_PAGINA_FORM = 'false';
				
			documento_cliente_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {documento_cliente_constante,documento_cliente_constante1} from './webroot/js/JavaScript/contabilidad/cuentascobrar/documento_cliente/js/util/documento_cliente_constante.js?random=1';
			import {documento_cliente_funcion,documento_cliente_funcion1} from './webroot/js/JavaScript/contabilidad/cuentascobrar/documento_cliente/js/util/documento_cliente_funcion.js?random=1';
			
			let documento_cliente_constante2 = new documento_cliente_constante();
			
			documento_cliente_constante2.STR_NOMBRE_PAGINA="<?php echo(documento_cliente_web::$STR_NOMBRE_PAGINA); ?>";
			documento_cliente_constante2.STR_TYPE_ON_LOADdocumento_cliente="<?php echo(documento_cliente_web::$STR_TYPE_ONLOAD); ?>";
			documento_cliente_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(documento_cliente_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			documento_cliente_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(documento_cliente_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			documento_cliente_constante2.STR_ACTION="<?php echo(documento_cliente_web::$STR_ACTION); ?>";
			documento_cliente_constante2.STR_ES_POPUP="<?php echo(documento_cliente_web::$STR_ES_POPUP); ?>";
			documento_cliente_constante2.STR_ES_BUSQUEDA="<?php echo(documento_cliente_web::$STR_ES_BUSQUEDA); ?>";
			documento_cliente_constante2.STR_FUNCION_JS="<?php echo(documento_cliente_web::$STR_FUNCION_JS); ?>";
			documento_cliente_constante2.BIG_ID_ACTUAL="<?php echo(documento_cliente_web::$BIG_ID_ACTUAL); ?>";
			documento_cliente_constante2.BIG_ID_OPCION="<?php echo(documento_cliente_web::$BIG_ID_OPCION); ?>";
			documento_cliente_constante2.STR_OBJETO_JS="<?php echo(documento_cliente_web::$STR_OBJETO_JS); ?>";
			documento_cliente_constante2.STR_ES_RELACIONES="<?php echo(documento_cliente_web::$STR_ES_RELACIONES); ?>";
			documento_cliente_constante2.STR_ES_RELACIONADO="<?php echo(documento_cliente_web::$STR_ES_RELACIONADO); ?>";
			documento_cliente_constante2.STR_ES_SUB_PAGINA="<?php echo(documento_cliente_web::$STR_ES_SUB_PAGINA); ?>";
			documento_cliente_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(documento_cliente_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			documento_cliente_constante2.BIT_ES_PAGINA_FORM=<?php echo(documento_cliente_web::$BIT_ES_PAGINA_FORM); ?>;
			documento_cliente_constante2.STR_SUFIJO="<?php echo(documento_cliente_web::$STR_SUF); ?>";//documento_cliente
			documento_cliente_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(documento_cliente_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//documento_cliente
			
			documento_cliente_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(documento_cliente_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			documento_cliente_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($documento_cliente_web1->moduloActual->getnombre()); ?>";
			documento_cliente_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(documento_cliente_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			documento_cliente_constante2.BIT_ES_LOAD_NORMAL=true;
			/*documento_cliente_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			documento_cliente_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.documento_cliente_constante2 = documento_cliente_constante2;
			
		</script>
		
		<?php if(documento_cliente_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.documento_cliente_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.documento_cliente_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="documento_clienteActual" ></a>
	
	<div id="divResumendocumento_clienteActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(documento_cliente_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(documento_cliente_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(documento_cliente_web::$STR_ES_BUSQUEDA=='false' && documento_cliente_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(documento_cliente_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(documento_cliente_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(documento_cliente_web::$STR_ES_RELACIONADO=='false' && documento_cliente_web::$STR_ES_POPUP=='false' && documento_cliente_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tddocumento_clienteNuevoToolBar">
										<img id="imgNuevoToolBardocumento_cliente" name="imgNuevoToolBardocumento_cliente" title="Nuevo Documentos Clientes" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(documento_cliente_web::$STR_ES_BUSQUEDA=='false' && documento_cliente_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tddocumento_clienteNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBardocumento_cliente" name="imgNuevoGuardarCambiosToolBardocumento_cliente" title="Nuevo TABLA Documentos Clientes" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(documento_cliente_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tddocumento_clienteGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBardocumento_cliente" name="imgGuardarCambiosToolBardocumento_cliente" title="Guardar Documentos Clientes" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(documento_cliente_web::$STR_ES_RELACIONADO=='false' && documento_cliente_web::$STR_ES_RELACIONES=='false' && documento_cliente_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tddocumento_clienteCopiarToolBar">
										<img id="imgCopiarToolBardocumento_cliente" name="imgCopiarToolBardocumento_cliente" title="Copiar Documentos Clientes" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tddocumento_clienteDuplicarToolBar">
										<img id="imgDuplicarToolBardocumento_cliente" name="imgDuplicarToolBardocumento_cliente" title="Duplicar Documentos Clientes" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(documento_cliente_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tddocumento_clienteRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBardocumento_cliente" name="imgRecargarInformacionToolBardocumento_cliente" title="Recargar Documentos Clientes" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tddocumento_clienteAnterioresToolBar">
										<img id="imgAnterioresToolBardocumento_cliente" name="imgAnterioresToolBardocumento_cliente" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tddocumento_clienteSiguientesToolBar">
										<img id="imgSiguientesToolBardocumento_cliente" name="imgSiguientesToolBardocumento_cliente" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tddocumento_clienteAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBardocumento_cliente" name="imgAbrirOrderByToolBardocumento_cliente" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((documento_cliente_web::$STR_ES_RELACIONADO=='false' && documento_cliente_web::$STR_ES_RELACIONES=='false') || documento_cliente_web::$STR_ES_BUSQUEDA=='true'  || documento_cliente_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tddocumento_clienteCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBardocumento_cliente" name="imgCerrarPaginaToolBardocumento_cliente" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trdocumento_clienteCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedadocumento_cliente" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedadocumento_cliente',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trdocumento_clienteCabeceraBusquedas/super -->

		<tr id="trBusquedadocumento_cliente" class="busqueda" style="display:table-row">
			<td id="tdBusquedadocumento_cliente" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedadocumento_cliente" name="frmBusquedadocumento_cliente">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedadocumento_cliente" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trdocumento_clienteBusquedas" class="busqueda" style="display:table-row"><td>
				<?php if(documento_cliente_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 70%">
					<ul>
						<li id="listrVisibleFK_Idcliente" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idcliente"> Por Cliente</a></li>
						<li id="listrVisibleFK_Iddocumento_proveedor" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Iddocumento_proveedor"> Por Documento Proveedor</a></li>
					</ul>
				
					<div id="divstrVisibleFK_Idcliente">
					<table id="tblstrVisibleFK_Idcliente" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Cliente</span>
						</td>
						<td align="center">
							<select id="FK_Idcliente-cmbid_cliente" name="FK_Idcliente-cmbid_cliente" title="Cliente" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscardocumento_clienteFK_Idcliente" name="btnBuscardocumento_clienteFK_Idcliente" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Iddocumento_proveedor">
					<table id="tblstrVisibleFK_Iddocumento_proveedor" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Documento Proveedor</span>
						</td>
						<td align="center">
							<select id="FK_Iddocumento_proveedor-cmbid_documento_proveedor" name="FK_Iddocumento_proveedor-cmbid_documento_proveedor" title="Documento Proveedor" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscardocumento_clienteFK_Iddocumento_proveedor" name="btnBuscardocumento_clienteFK_Iddocumento_proveedor" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscardocumento_cliente" style="display:table-row">
					<td id="tdParamsBuscardocumento_cliente">
		<?php if(documento_cliente_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscardocumento_cliente">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistrosdocumento_cliente" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistrosdocumento_cliente"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistrosdocumento_cliente" name="ParamsBuscar-txtNumeroRegistrosdocumento_cliente" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformaciondocumento_cliente">
							<td id="tdGenerarReportedocumento_cliente" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodosdocumento_cliente" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodosdocumento_cliente" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformaciondocumento_cliente" name="btnRecargarInformaciondocumento_cliente" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginadocumento_cliente" name="btnImprimirPaginadocumento_cliente" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*documento_cliente_web::$STR_ES_BUSQUEDA=='false'  &&*/ documento_cliente_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderBydocumento_cliente">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderBydocumento_cliente" name="btnOrderBydocumento_cliente" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
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

										<?php if(documento_cliente_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tddocumento_clienteConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodosdocumento_cliente -->

							</td><!-- tdGenerarReportedocumento_cliente -->
						</tr><!-- trRecargarInformaciondocumento_cliente -->
					</table><!-- tblParamsBuscarNumeroRegistrosdocumento_cliente -->
				</div> <!-- divParamsBuscardocumento_cliente -->
		<?php } ?>
				</td> <!-- tdParamsBuscardocumento_cliente -->
				</tr><!-- trParamsBuscardocumento_cliente -->
				</table> <!-- tblBusquedadocumento_cliente -->
				</form> <!-- frmBusquedadocumento_cliente -->
				

			</td> <!-- tdBusquedadocumento_cliente -->
		</tr> <!-- trBusquedadocumento_cliente/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(documento_cliente_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divdocumento_clientePopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tbldocumento_clientePopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmdocumento_clienteAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btndocumento_clienteAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="documento_cliente_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btndocumento_clienteAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmdocumento_clienteAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tbldocumento_clientePopupAjaxWebPart -->
		</div> <!-- divdocumento_clientePopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(documento_cliente_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trdocumento_clienteTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdadocumento_cliente"></a>
		<img id="imgTablaParaDerechadocumento_cliente" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechadocumento_cliente'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdadocumento_cliente" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdadocumento_cliente'"/>
		<a id="TablaDerechadocumento_cliente"></a>
	</td>
</tr> <!-- trdocumento_clienteTablaNavegacion/super -->
<?php } ?>

<tr id="trdocumento_clienteTablaDatos">
	<td colspan="3" id="htmlTableCelldocumento_cliente">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatosdocumento_clientesAjaxWebPart">
		</div>
	</td>
</tr> <!-- trdocumento_clienteTablaDatos/super -->
		
		
		<tr id="trdocumento_clientePaginacion" style="display:table-row">
			<td id="tddocumento_clientePaginacion" align="center">
				<div id="divdocumento_clientePaginacionAjaxWebPart">
				<form id="frmPaginaciondocumento_cliente" name="frmPaginaciondocumento_cliente">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginaciondocumento_cliente" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:center">
					<tr>
						<?php if(documento_cliente_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkdocumento_cliente" name="btnSeleccionarLoteFkdocumento_cliente" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(documento_cliente_web::$STR_ES_RELACIONADO=='false' /*&& documento_cliente_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnterioresdocumento_cliente" name="btnAnterioresdocumento_cliente" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(documento_cliente_web::$STR_ES_BUSQUEDA=='false' && documento_cliente_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tddocumento_clienteNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPreparardocumento_cliente" name="btnNuevoTablaPreparardocumento_cliente" title="NUEVO Documentos Clientes" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTabladocumento_cliente" name="ParamsPaginar-txtNumeroNuevoTabladocumento_cliente" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(documento_cliente_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tddocumento_clienteConEditardocumento_cliente">
							<label>
								<input id="ParamsBuscar-chbConEditardocumento_cliente" name="ParamsBuscar-chbConEditardocumento_cliente" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(documento_cliente_web::$STR_ES_RELACIONADO=='false'/* && documento_cliente_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientesdocumento_cliente" name="btnSiguientesdocumento_cliente" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginaciondocumento_cliente -->
				</form> <!-- frmPaginaciondocumento_cliente -->
				<form id="frmNuevoPreparardocumento_cliente" name="frmNuevoPreparardocumento_cliente">
				<table id="tblNuevoPreparardocumento_cliente" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:center">
					<tr id="trdocumento_clienteNuevo" height="10">
						<?php if(documento_cliente_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tddocumento_clienteNuevo" align="center">
							<input type="button" id="btnNuevoPreparardocumento_cliente" name="btnNuevoPreparardocumento_cliente" title="NUEVO Documentos Clientes" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tddocumento_clienteGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambiosdocumento_cliente" name="btnGuardarCambiosdocumento_cliente" title="GUARDAR Documentos Clientes" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(documento_cliente_web::$STR_ES_RELACIONADO=='false' && documento_cliente_web::$STR_ES_RELACIONES=='false' && documento_cliente_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tddocumento_clienteDuplicar" align="center">
							<input type="button" id="btnDuplicardocumento_cliente" name="btnDuplicardocumento_cliente" title="DUPLICAR Documentos Clientes" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tddocumento_clienteCopiar" align="center">
							<input type="button" id="btnCopiardocumento_cliente" name="btnCopiardocumento_cliente" title="COPIAR Documentos Clientes" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(documento_cliente_web::$STR_ES_RELACIONADO=='false' && ((documento_cliente_web::$STR_ES_RELACIONADO=='false' && documento_cliente_web::$STR_ES_RELACIONES=='false') || documento_cliente_web::$STR_ES_BUSQUEDA=='true'  || documento_cliente_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tddocumento_clienteCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginadocumento_cliente" name="btnCerrarPaginadocumento_cliente" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPreparardocumento_cliente -->
				</form> <!-- frmNuevoPreparardocumento_cliente -->
				</div> <!-- divdocumento_clientePaginacionAjaxWebPart -->
			</td> <!-- tddocumento_clientePaginacion -->
		</tr> <!-- trdocumento_clientePaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(documento_cliente_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionesdocumento_clienteAjaxWebPart">
			<td id="tdAccionesRelacionesdocumento_clienteAjaxWebPart">
				<div id="divAccionesRelacionesdocumento_clienteAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionesdocumento_clienteAjaxWebPart -->
		</tr> <!-- trAccionesRelacionesdocumento_clienteAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderBydocumento_cliente">
			<td id="tdOrderBydocumento_cliente">
				<form id="frmOrderBydocumento_cliente" name="frmOrderBydocumento_cliente">
					<div id="divOrderBydocumento_clienteAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderBydocumento_cliente -->
		</tr> <!-- trOrderBydocumento_cliente/super -->
			
		
		
		
		
		
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
			
				import {documento_cliente_webcontrol,documento_cliente_webcontrol1} from './webroot/js/JavaScript/contabilidad/cuentascobrar/documento_cliente/js/webcontrol/documento_cliente_webcontrol.js?random=1';
				
				documento_cliente_webcontrol1.setdocumento_cliente_constante(window.documento_cliente_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(documento_cliente_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

