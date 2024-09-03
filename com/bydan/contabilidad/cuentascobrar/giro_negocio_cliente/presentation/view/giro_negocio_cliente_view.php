<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\cuentascobrar\giro_negocio_cliente\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Giro Negocio Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/cuentascobrar/giro_negocio_cliente/util/giro_negocio_cliente_carga.php');
	use com\bydan\contabilidad\cuentascobrar\giro_negocio_cliente\util\giro_negocio_cliente_carga;
	
	//include_once('com/bydan/contabilidad/cuentascobrar/giro_negocio_cliente/presentation/view/giro_negocio_cliente_web.php');
	//use com\bydan\contabilidad\cuentascobrar\giro_negocio_cliente\presentation\view\giro_negocio_cliente_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	giro_negocio_cliente_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	giro_negocio_cliente_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$giro_negocio_cliente_web1= new giro_negocio_cliente_web();	
	$giro_negocio_cliente_web1->cargarDatosGenerales();
	
	//$moduloActual=$giro_negocio_cliente_web1->moduloActual;
	//$usuarioActual=$giro_negocio_cliente_web1->usuarioActual;
	//$sessionBase=$giro_negocio_cliente_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$giro_negocio_cliente_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentascobrar/giro_negocio_cliente/js/templating/giro_negocio_cliente_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentascobrar/giro_negocio_cliente/js/templating/giro_negocio_cliente_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentascobrar/giro_negocio_cliente/js/templating/giro_negocio_cliente_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentascobrar/giro_negocio_cliente/js/templating/giro_negocio_cliente_datos_reporte_template.js'); ?>
		
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentascobrar/giro_negocio_cliente/js/templating/giro_negocio_cliente_datos_relaciones_template.js'); ?>
			
						
		
		
		<?php 
			
		
			giro_negocio_cliente_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					giro_negocio_cliente_web::$GET_POST=$_GET;
				} else {
					giro_negocio_cliente_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			giro_negocio_cliente_web::$STR_NOMBRE_PAGINA = 'giro_negocio_cliente_view.php';
			giro_negocio_cliente_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			giro_negocio_cliente_web::$BIT_ES_PAGINA_FORM = 'false';
				
			giro_negocio_cliente_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {giro_negocio_cliente_constante,giro_negocio_cliente_constante1} from './webroot/js/JavaScript/contabilidad/cuentascobrar/giro_negocio_cliente/js/util/giro_negocio_cliente_constante.js?random=1';
			import {giro_negocio_cliente_funcion,giro_negocio_cliente_funcion1} from './webroot/js/JavaScript/contabilidad/cuentascobrar/giro_negocio_cliente/js/util/giro_negocio_cliente_funcion.js?random=1';
			
			let giro_negocio_cliente_constante2 = new giro_negocio_cliente_constante();
			
			giro_negocio_cliente_constante2.STR_NOMBRE_PAGINA="<?php echo(giro_negocio_cliente_web::$STR_NOMBRE_PAGINA); ?>";
			giro_negocio_cliente_constante2.STR_TYPE_ON_LOADgiro_negocio_cliente="<?php echo(giro_negocio_cliente_web::$STR_TYPE_ONLOAD); ?>";
			giro_negocio_cliente_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(giro_negocio_cliente_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			giro_negocio_cliente_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(giro_negocio_cliente_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			giro_negocio_cliente_constante2.STR_ACTION="<?php echo(giro_negocio_cliente_web::$STR_ACTION); ?>";
			giro_negocio_cliente_constante2.STR_ES_POPUP="<?php echo(giro_negocio_cliente_web::$STR_ES_POPUP); ?>";
			giro_negocio_cliente_constante2.STR_ES_BUSQUEDA="<?php echo(giro_negocio_cliente_web::$STR_ES_BUSQUEDA); ?>";
			giro_negocio_cliente_constante2.STR_FUNCION_JS="<?php echo(giro_negocio_cliente_web::$STR_FUNCION_JS); ?>";
			giro_negocio_cliente_constante2.BIG_ID_ACTUAL="<?php echo(giro_negocio_cliente_web::$BIG_ID_ACTUAL); ?>";
			giro_negocio_cliente_constante2.BIG_ID_OPCION="<?php echo(giro_negocio_cliente_web::$BIG_ID_OPCION); ?>";
			giro_negocio_cliente_constante2.STR_OBJETO_JS="<?php echo(giro_negocio_cliente_web::$STR_OBJETO_JS); ?>";
			giro_negocio_cliente_constante2.STR_ES_RELACIONES="<?php echo(giro_negocio_cliente_web::$STR_ES_RELACIONES); ?>";
			giro_negocio_cliente_constante2.STR_ES_RELACIONADO="<?php echo(giro_negocio_cliente_web::$STR_ES_RELACIONADO); ?>";
			giro_negocio_cliente_constante2.STR_ES_SUB_PAGINA="<?php echo(giro_negocio_cliente_web::$STR_ES_SUB_PAGINA); ?>";
			giro_negocio_cliente_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(giro_negocio_cliente_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			giro_negocio_cliente_constante2.BIT_ES_PAGINA_FORM=<?php echo(giro_negocio_cliente_web::$BIT_ES_PAGINA_FORM); ?>;
			giro_negocio_cliente_constante2.STR_SUFIJO="<?php echo(giro_negocio_cliente_web::$STR_SUF); ?>";//giro_negocio_cliente
			giro_negocio_cliente_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(giro_negocio_cliente_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//giro_negocio_cliente
			
			giro_negocio_cliente_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(giro_negocio_cliente_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			giro_negocio_cliente_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($giro_negocio_cliente_web1->moduloActual->getnombre()); ?>";
			giro_negocio_cliente_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(giro_negocio_cliente_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			giro_negocio_cliente_constante2.BIT_ES_LOAD_NORMAL=true;
			/*giro_negocio_cliente_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			giro_negocio_cliente_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.giro_negocio_cliente_constante2 = giro_negocio_cliente_constante2;
			
		</script>
		
		<?php if(giro_negocio_cliente_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.giro_negocio_cliente_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.giro_negocio_cliente_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="giro_negocio_clienteActual" ></a>
	
	<div id="divResumengiro_negocio_clienteActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(giro_negocio_cliente_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(giro_negocio_cliente_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(giro_negocio_cliente_web::$STR_ES_BUSQUEDA=='false' && giro_negocio_cliente_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(giro_negocio_cliente_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(giro_negocio_cliente_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(giro_negocio_cliente_web::$STR_ES_RELACIONADO=='false' && giro_negocio_cliente_web::$STR_ES_POPUP=='false' && giro_negocio_cliente_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tdgiro_negocio_clienteNuevoToolBar">
										<img id="imgNuevoToolBargiro_negocio_cliente" name="imgNuevoToolBargiro_negocio_cliente" title="Nuevo Giro Negocio" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(giro_negocio_cliente_web::$STR_ES_BUSQUEDA=='false' && giro_negocio_cliente_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdgiro_negocio_clienteNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBargiro_negocio_cliente" name="imgNuevoGuardarCambiosToolBargiro_negocio_cliente" title="Nuevo TABLA Giro Negocio" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(giro_negocio_cliente_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdgiro_negocio_clienteGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBargiro_negocio_cliente" name="imgGuardarCambiosToolBargiro_negocio_cliente" title="Guardar Giro Negocio" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(giro_negocio_cliente_web::$STR_ES_RELACIONADO=='false' && giro_negocio_cliente_web::$STR_ES_RELACIONES=='false' && giro_negocio_cliente_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdgiro_negocio_clienteCopiarToolBar">
										<img id="imgCopiarToolBargiro_negocio_cliente" name="imgCopiarToolBargiro_negocio_cliente" title="Copiar Giro Negocio" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdgiro_negocio_clienteDuplicarToolBar">
										<img id="imgDuplicarToolBargiro_negocio_cliente" name="imgDuplicarToolBargiro_negocio_cliente" title="Duplicar Giro Negocio" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(giro_negocio_cliente_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdgiro_negocio_clienteRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBargiro_negocio_cliente" name="imgRecargarInformacionToolBargiro_negocio_cliente" title="Recargar Giro Negocio" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdgiro_negocio_clienteAnterioresToolBar">
										<img id="imgAnterioresToolBargiro_negocio_cliente" name="imgAnterioresToolBargiro_negocio_cliente" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdgiro_negocio_clienteSiguientesToolBar">
										<img id="imgSiguientesToolBargiro_negocio_cliente" name="imgSiguientesToolBargiro_negocio_cliente" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdgiro_negocio_clienteAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBargiro_negocio_cliente" name="imgAbrirOrderByToolBargiro_negocio_cliente" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((giro_negocio_cliente_web::$STR_ES_RELACIONADO=='false' && giro_negocio_cliente_web::$STR_ES_RELACIONES=='false') || giro_negocio_cliente_web::$STR_ES_BUSQUEDA=='true'  || giro_negocio_cliente_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdgiro_negocio_clienteCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBargiro_negocio_cliente" name="imgCerrarPaginaToolBargiro_negocio_cliente" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trgiro_negocio_clienteCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedagiro_negocio_cliente" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedagiro_negocio_cliente',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trgiro_negocio_clienteCabeceraBusquedas/super -->

		<tr id="trBusquedagiro_negocio_cliente" class="busqueda" style="display:table-row">
			<td id="tdBusquedagiro_negocio_cliente" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedagiro_negocio_cliente" name="frmBusquedagiro_negocio_cliente">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedagiro_negocio_cliente" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trgiro_negocio_clienteBusquedas" class="busqueda" style="display:none"><td>
				<?php if(giro_negocio_cliente_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 70%">
				
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscargiro_negocio_cliente" style="display:table-row">
					<td id="tdParamsBuscargiro_negocio_cliente">
		<?php if(giro_negocio_cliente_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscargiro_negocio_cliente">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistrosgiro_negocio_cliente" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistrosgiro_negocio_cliente"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistrosgiro_negocio_cliente" name="ParamsBuscar-txtNumeroRegistrosgiro_negocio_cliente" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformaciongiro_negocio_cliente">
							<td id="tdGenerarReportegiro_negocio_cliente" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodosgiro_negocio_cliente" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodosgiro_negocio_cliente" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformaciongiro_negocio_cliente" name="btnRecargarInformaciongiro_negocio_cliente" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginagiro_negocio_cliente" name="btnImprimirPaginagiro_negocio_cliente" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*giro_negocio_cliente_web::$STR_ES_BUSQUEDA=='false'  &&*/ giro_negocio_cliente_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderBygiro_negocio_cliente">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderBygiro_negocio_cliente" name="btnOrderBygiro_negocio_cliente" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
													</td>
													<td>
														<input type="button" id="btnOrderByRelgiro_negocio_cliente" name="btnOrderByRelgiro_negocio_cliente" title="RELACIONES DE DATOS" value="   Rels" class="btn btn-primary"/>
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

										<?php if(giro_negocio_cliente_web::$STR_ES_RELACIONES=='false' && giro_negocio_cliente_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbTiposRelaciones" name="ParamsBuscar-cmbTiposRelaciones" title="TIPOS DE RELACIONES" style="width:150px"></select>
										</td>
										<?php } ?>

										<?php if(giro_negocio_cliente_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdgiro_negocio_clienteConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodosgiro_negocio_cliente -->

							</td><!-- tdGenerarReportegiro_negocio_cliente -->
						</tr><!-- trRecargarInformaciongiro_negocio_cliente -->
					</table><!-- tblParamsBuscarNumeroRegistrosgiro_negocio_cliente -->
				</div> <!-- divParamsBuscargiro_negocio_cliente -->
		<?php } ?>
				</td> <!-- tdParamsBuscargiro_negocio_cliente -->
				</tr><!-- trParamsBuscargiro_negocio_cliente -->
				</table> <!-- tblBusquedagiro_negocio_cliente -->
				</form> <!-- frmBusquedagiro_negocio_cliente -->
				

			</td> <!-- tdBusquedagiro_negocio_cliente -->
		</tr> <!-- trBusquedagiro_negocio_cliente/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(giro_negocio_cliente_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divgiro_negocio_clientePopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblgiro_negocio_clientePopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmgiro_negocio_clienteAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btngiro_negocio_clienteAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="giro_negocio_cliente_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btngiro_negocio_clienteAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmgiro_negocio_clienteAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblgiro_negocio_clientePopupAjaxWebPart -->
		</div> <!-- divgiro_negocio_clientePopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(giro_negocio_cliente_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trgiro_negocio_clienteTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdagiro_negocio_cliente"></a>
		<img id="imgTablaParaDerechagiro_negocio_cliente" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechagiro_negocio_cliente'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdagiro_negocio_cliente" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdagiro_negocio_cliente'"/>
		<a id="TablaDerechagiro_negocio_cliente"></a>
	</td>
</tr> <!-- trgiro_negocio_clienteTablaNavegacion/super -->
<?php } ?>

<tr id="trgiro_negocio_clienteTablaDatos">
	<td colspan="3" id="htmlTableCellgiro_negocio_cliente">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatosgiro_negocio_clientesAjaxWebPart">
		</div>
	</td>
</tr> <!-- trgiro_negocio_clienteTablaDatos/super -->
		
		
		<tr id="trgiro_negocio_clientePaginacion" style="display:table-row">
			<td id="tdgiro_negocio_clientePaginacion" align="center">
				<div id="divgiro_negocio_clientePaginacionAjaxWebPart">
				<form id="frmPaginaciongiro_negocio_cliente" name="frmPaginaciongiro_negocio_cliente">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginaciongiro_negocio_cliente" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:center">
					<tr>
						<?php if(giro_negocio_cliente_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkgiro_negocio_cliente" name="btnSeleccionarLoteFkgiro_negocio_cliente" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(giro_negocio_cliente_web::$STR_ES_RELACIONADO=='false' /*&& giro_negocio_cliente_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnterioresgiro_negocio_cliente" name="btnAnterioresgiro_negocio_cliente" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(giro_negocio_cliente_web::$STR_ES_BUSQUEDA=='false' && giro_negocio_cliente_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdgiro_negocio_clienteNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPreparargiro_negocio_cliente" name="btnNuevoTablaPreparargiro_negocio_cliente" title="NUEVO Giro Negocio" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablagiro_negocio_cliente" name="ParamsPaginar-txtNumeroNuevoTablagiro_negocio_cliente" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(giro_negocio_cliente_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdgiro_negocio_clienteConEditargiro_negocio_cliente">
							<label>
								<input id="ParamsBuscar-chbConEditargiro_negocio_cliente" name="ParamsBuscar-chbConEditargiro_negocio_cliente" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(giro_negocio_cliente_web::$STR_ES_RELACIONADO=='false'/* && giro_negocio_cliente_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientesgiro_negocio_cliente" name="btnSiguientesgiro_negocio_cliente" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginaciongiro_negocio_cliente -->
				</form> <!-- frmPaginaciongiro_negocio_cliente -->
				<form id="frmNuevoPreparargiro_negocio_cliente" name="frmNuevoPreparargiro_negocio_cliente">
				<table id="tblNuevoPreparargiro_negocio_cliente" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:center">
					<tr id="trgiro_negocio_clienteNuevo" height="10">
						<?php if(giro_negocio_cliente_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdgiro_negocio_clienteNuevo" align="center">
							<input type="button" id="btnNuevoPreparargiro_negocio_cliente" name="btnNuevoPreparargiro_negocio_cliente" title="NUEVO Giro Negocio" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdgiro_negocio_clienteGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambiosgiro_negocio_cliente" name="btnGuardarCambiosgiro_negocio_cliente" title="GUARDAR Giro Negocio" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(giro_negocio_cliente_web::$STR_ES_RELACIONADO=='false' && giro_negocio_cliente_web::$STR_ES_RELACIONES=='false' && giro_negocio_cliente_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdgiro_negocio_clienteDuplicar" align="center">
							<input type="button" id="btnDuplicargiro_negocio_cliente" name="btnDuplicargiro_negocio_cliente" title="DUPLICAR Giro Negocio" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdgiro_negocio_clienteCopiar" align="center">
							<input type="button" id="btnCopiargiro_negocio_cliente" name="btnCopiargiro_negocio_cliente" title="COPIAR Giro Negocio" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(giro_negocio_cliente_web::$STR_ES_RELACIONADO=='false' && ((giro_negocio_cliente_web::$STR_ES_RELACIONADO=='false' && giro_negocio_cliente_web::$STR_ES_RELACIONES=='false') || giro_negocio_cliente_web::$STR_ES_BUSQUEDA=='true'  || giro_negocio_cliente_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdgiro_negocio_clienteCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginagiro_negocio_cliente" name="btnCerrarPaginagiro_negocio_cliente" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPreparargiro_negocio_cliente -->
				</form> <!-- frmNuevoPreparargiro_negocio_cliente -->
				</div> <!-- divgiro_negocio_clientePaginacionAjaxWebPart -->
			</td> <!-- tdgiro_negocio_clientePaginacion -->
		</tr> <!-- trgiro_negocio_clientePaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(giro_negocio_cliente_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionesgiro_negocio_clienteAjaxWebPart">
			<td id="tdAccionesRelacionesgiro_negocio_clienteAjaxWebPart">
				<div id="divAccionesRelacionesgiro_negocio_clienteAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionesgiro_negocio_clienteAjaxWebPart -->
		</tr> <!-- trAccionesRelacionesgiro_negocio_clienteAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderBygiro_negocio_cliente">
			<td id="tdOrderBygiro_negocio_cliente">
				<form id="frmOrderBygiro_negocio_cliente" name="frmOrderBygiro_negocio_cliente">
					<div id="divOrderBygiro_negocio_clienteAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
				<form id="frmOrderByRelgiro_negocio_cliente" name="frmOrderByRelgiro_negocio_cliente">
					<div id="divOrderByRelgiro_negocio_clienteAjaxWebPart" title="RELACIONES" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderBygiro_negocio_cliente -->
		</tr> <!-- trOrderBygiro_negocio_cliente/super -->
			
		
		
		
		
		
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
			
				import {giro_negocio_cliente_webcontrol,giro_negocio_cliente_webcontrol1} from './webroot/js/JavaScript/contabilidad/cuentascobrar/giro_negocio_cliente/js/webcontrol/giro_negocio_cliente_webcontrol.js?random=1';
				
				giro_negocio_cliente_webcontrol1.setgiro_negocio_cliente_constante(window.giro_negocio_cliente_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(giro_negocio_cliente_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

