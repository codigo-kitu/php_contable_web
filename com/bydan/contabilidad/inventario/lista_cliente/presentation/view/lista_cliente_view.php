<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\inventario\lista_cliente\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Lista Cliente Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/inventario/lista_cliente/util/lista_cliente_carga.php');
	use com\bydan\contabilidad\inventario\lista_cliente\util\lista_cliente_carga;
	
	//include_once('com/bydan/contabilidad/inventario/lista_cliente/presentation/view/lista_cliente_web.php');
	//use com\bydan\contabilidad\inventario\lista_cliente\presentation\view\lista_cliente_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	lista_cliente_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	lista_cliente_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$lista_cliente_web1= new lista_cliente_web();	
	$lista_cliente_web1->cargarDatosGenerales();
	
	//$moduloActual=$lista_cliente_web1->moduloActual;
	//$usuarioActual=$lista_cliente_web1->usuarioActual;
	//$sessionBase=$lista_cliente_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$lista_cliente_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/lista_cliente/js/templating/lista_cliente_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/lista_cliente/js/templating/lista_cliente_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/lista_cliente/js/templating/lista_cliente_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/lista_cliente/js/templating/lista_cliente_datos_reporte_template.js'); ?>
		
			
						
		
		
		<?php 
			
		
			lista_cliente_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					lista_cliente_web::$GET_POST=$_GET;
				} else {
					lista_cliente_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			lista_cliente_web::$STR_NOMBRE_PAGINA = 'lista_cliente_view.php';
			lista_cliente_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			lista_cliente_web::$BIT_ES_PAGINA_FORM = 'false';
				
			lista_cliente_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {lista_cliente_constante,lista_cliente_constante1} from './webroot/js/JavaScript/contabilidad/inventario/lista_cliente/js/util/lista_cliente_constante.js?random=1';
			import {lista_cliente_funcion,lista_cliente_funcion1} from './webroot/js/JavaScript/contabilidad/inventario/lista_cliente/js/util/lista_cliente_funcion.js?random=1';
			
			let lista_cliente_constante2 = new lista_cliente_constante();
			
			lista_cliente_constante2.STR_NOMBRE_PAGINA="<?php echo(lista_cliente_web::$STR_NOMBRE_PAGINA); ?>";
			lista_cliente_constante2.STR_TYPE_ON_LOADlista_cliente="<?php echo(lista_cliente_web::$STR_TYPE_ONLOAD); ?>";
			lista_cliente_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(lista_cliente_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			lista_cliente_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(lista_cliente_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			lista_cliente_constante2.STR_ACTION="<?php echo(lista_cliente_web::$STR_ACTION); ?>";
			lista_cliente_constante2.STR_ES_POPUP="<?php echo(lista_cliente_web::$STR_ES_POPUP); ?>";
			lista_cliente_constante2.STR_ES_BUSQUEDA="<?php echo(lista_cliente_web::$STR_ES_BUSQUEDA); ?>";
			lista_cliente_constante2.STR_FUNCION_JS="<?php echo(lista_cliente_web::$STR_FUNCION_JS); ?>";
			lista_cliente_constante2.BIG_ID_ACTUAL="<?php echo(lista_cliente_web::$BIG_ID_ACTUAL); ?>";
			lista_cliente_constante2.BIG_ID_OPCION="<?php echo(lista_cliente_web::$BIG_ID_OPCION); ?>";
			lista_cliente_constante2.STR_OBJETO_JS="<?php echo(lista_cliente_web::$STR_OBJETO_JS); ?>";
			lista_cliente_constante2.STR_ES_RELACIONES="<?php echo(lista_cliente_web::$STR_ES_RELACIONES); ?>";
			lista_cliente_constante2.STR_ES_RELACIONADO="<?php echo(lista_cliente_web::$STR_ES_RELACIONADO); ?>";
			lista_cliente_constante2.STR_ES_SUB_PAGINA="<?php echo(lista_cliente_web::$STR_ES_SUB_PAGINA); ?>";
			lista_cliente_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(lista_cliente_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			lista_cliente_constante2.BIT_ES_PAGINA_FORM=<?php echo(lista_cliente_web::$BIT_ES_PAGINA_FORM); ?>;
			lista_cliente_constante2.STR_SUFIJO="<?php echo(lista_cliente_web::$STR_SUF); ?>";//lista_cliente
			lista_cliente_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(lista_cliente_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//lista_cliente
			
			lista_cliente_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(lista_cliente_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			lista_cliente_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($lista_cliente_web1->moduloActual->getnombre()); ?>";
			lista_cliente_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(lista_cliente_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			lista_cliente_constante2.BIT_ES_LOAD_NORMAL=true;
			/*lista_cliente_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			lista_cliente_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.lista_cliente_constante2 = lista_cliente_constante2;
			
		</script>
		
		<?php if(lista_cliente_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.lista_cliente_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.lista_cliente_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="lista_clienteActual" ></a>
	
	<div id="divResumenlista_clienteActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(lista_cliente_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(lista_cliente_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(lista_cliente_web::$STR_ES_BUSQUEDA=='false' && lista_cliente_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(lista_cliente_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(lista_cliente_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(lista_cliente_web::$STR_ES_RELACIONADO=='false' && lista_cliente_web::$STR_ES_POPUP=='false' && lista_cliente_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tdlista_clienteNuevoToolBar">
										<img id="imgNuevoToolBarlista_cliente" name="imgNuevoToolBarlista_cliente" title="Nuevo Lista Cliente" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(lista_cliente_web::$STR_ES_BUSQUEDA=='false' && lista_cliente_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdlista_clienteNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBarlista_cliente" name="imgNuevoGuardarCambiosToolBarlista_cliente" title="Nuevo TABLA Lista Cliente" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(lista_cliente_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdlista_clienteGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBarlista_cliente" name="imgGuardarCambiosToolBarlista_cliente" title="Guardar Lista Cliente" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(lista_cliente_web::$STR_ES_RELACIONADO=='false' && lista_cliente_web::$STR_ES_RELACIONES=='false' && lista_cliente_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdlista_clienteCopiarToolBar">
										<img id="imgCopiarToolBarlista_cliente" name="imgCopiarToolBarlista_cliente" title="Copiar Lista Cliente" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdlista_clienteDuplicarToolBar">
										<img id="imgDuplicarToolBarlista_cliente" name="imgDuplicarToolBarlista_cliente" title="Duplicar Lista Cliente" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(lista_cliente_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdlista_clienteRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBarlista_cliente" name="imgRecargarInformacionToolBarlista_cliente" title="Recargar Lista Cliente" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdlista_clienteAnterioresToolBar">
										<img id="imgAnterioresToolBarlista_cliente" name="imgAnterioresToolBarlista_cliente" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdlista_clienteSiguientesToolBar">
										<img id="imgSiguientesToolBarlista_cliente" name="imgSiguientesToolBarlista_cliente" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdlista_clienteAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBarlista_cliente" name="imgAbrirOrderByToolBarlista_cliente" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((lista_cliente_web::$STR_ES_RELACIONADO=='false' && lista_cliente_web::$STR_ES_RELACIONES=='false') || lista_cliente_web::$STR_ES_BUSQUEDA=='true'  || lista_cliente_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdlista_clienteCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBarlista_cliente" name="imgCerrarPaginaToolBarlista_cliente" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trlista_clienteCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedalista_cliente" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedalista_cliente',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trlista_clienteCabeceraBusquedas/super -->

		<tr id="trBusquedalista_cliente" class="busqueda" style="display:table-row">
			<td id="tdBusquedalista_cliente" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedalista_cliente" name="frmBusquedalista_cliente">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedalista_cliente" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trlista_clienteBusquedas" class="busqueda" style="display:table-row"><td>
				<?php if(lista_cliente_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 70%">
					<ul>
						<li id="listrVisibleFK_Idcliente" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idcliente"> Por Cliente</a></li>
						<li id="listrVisibleFK_Idproducto" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idproducto"> Por Producto</a></li>
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
							<input type="button" id="btnBuscarlista_clienteFK_Idcliente" name="btnBuscarlista_clienteFK_Idcliente" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idproducto">
					<table id="tblstrVisibleFK_Idproducto" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Producto</span>
						</td>
						<td align="center">
							<select id="FK_Idproducto-cmbid_producto" name="FK_Idproducto-cmbid_producto" title="Producto" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarlista_clienteFK_Idproducto" name="btnBuscarlista_clienteFK_Idproducto" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscarlista_cliente" style="display:table-row">
					<td id="tdParamsBuscarlista_cliente">
		<?php if(lista_cliente_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscarlista_cliente">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistroslista_cliente" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistroslista_cliente"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistroslista_cliente" name="ParamsBuscar-txtNumeroRegistroslista_cliente" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacionlista_cliente">
							<td id="tdGenerarReportelista_cliente" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodoslista_cliente" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodoslista_cliente" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacionlista_cliente" name="btnRecargarInformacionlista_cliente" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginalista_cliente" name="btnImprimirPaginalista_cliente" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*lista_cliente_web::$STR_ES_BUSQUEDA=='false'  &&*/ lista_cliente_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderBylista_cliente">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderBylista_cliente" name="btnOrderBylista_cliente" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
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

										<?php if(lista_cliente_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdlista_clienteConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodoslista_cliente -->

							</td><!-- tdGenerarReportelista_cliente -->
						</tr><!-- trRecargarInformacionlista_cliente -->
					</table><!-- tblParamsBuscarNumeroRegistroslista_cliente -->
				</div> <!-- divParamsBuscarlista_cliente -->
		<?php } ?>
				</td> <!-- tdParamsBuscarlista_cliente -->
				</tr><!-- trParamsBuscarlista_cliente -->
				</table> <!-- tblBusquedalista_cliente -->
				</form> <!-- frmBusquedalista_cliente -->
				

			</td> <!-- tdBusquedalista_cliente -->
		</tr> <!-- trBusquedalista_cliente/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(lista_cliente_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divlista_clientePopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tbllista_clientePopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmlista_clienteAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnlista_clienteAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="lista_cliente_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnlista_clienteAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmlista_clienteAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tbllista_clientePopupAjaxWebPart -->
		</div> <!-- divlista_clientePopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(lista_cliente_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trlista_clienteTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdalista_cliente"></a>
		<img id="imgTablaParaDerechalista_cliente" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechalista_cliente'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdalista_cliente" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdalista_cliente'"/>
		<a id="TablaDerechalista_cliente"></a>
	</td>
</tr> <!-- trlista_clienteTablaNavegacion/super -->
<?php } ?>

<tr id="trlista_clienteTablaDatos">
	<td colspan="3" id="htmlTableCelllista_cliente">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatoslista_clientesAjaxWebPart">
		</div>
	</td>
</tr> <!-- trlista_clienteTablaDatos/super -->
		
		
		<tr id="trlista_clientePaginacion" style="display:table-row">
			<td id="tdlista_clientePaginacion" align="center">
				<div id="divlista_clientePaginacionAjaxWebPart">
				<form id="frmPaginacionlista_cliente" name="frmPaginacionlista_cliente">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacionlista_cliente" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:center">
					<tr>
						<?php if(lista_cliente_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFklista_cliente" name="btnSeleccionarLoteFklista_cliente" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(lista_cliente_web::$STR_ES_RELACIONADO=='false' /*&& lista_cliente_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnterioreslista_cliente" name="btnAnterioreslista_cliente" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(lista_cliente_web::$STR_ES_BUSQUEDA=='false' && lista_cliente_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdlista_clienteNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPrepararlista_cliente" name="btnNuevoTablaPrepararlista_cliente" title="NUEVO Lista Cliente" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablalista_cliente" name="ParamsPaginar-txtNumeroNuevoTablalista_cliente" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(lista_cliente_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdlista_clienteConEditarlista_cliente">
							<label>
								<input id="ParamsBuscar-chbConEditarlista_cliente" name="ParamsBuscar-chbConEditarlista_cliente" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(lista_cliente_web::$STR_ES_RELACIONADO=='false'/* && lista_cliente_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguienteslista_cliente" name="btnSiguienteslista_cliente" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacionlista_cliente -->
				</form> <!-- frmPaginacionlista_cliente -->
				<form id="frmNuevoPrepararlista_cliente" name="frmNuevoPrepararlista_cliente">
				<table id="tblNuevoPrepararlista_cliente" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:center">
					<tr id="trlista_clienteNuevo" height="10">
						<?php if(lista_cliente_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdlista_clienteNuevo" align="center">
							<input type="button" id="btnNuevoPrepararlista_cliente" name="btnNuevoPrepararlista_cliente" title="NUEVO Lista Cliente" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdlista_clienteGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambioslista_cliente" name="btnGuardarCambioslista_cliente" title="GUARDAR Lista Cliente" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(lista_cliente_web::$STR_ES_RELACIONADO=='false' && lista_cliente_web::$STR_ES_RELACIONES=='false' && lista_cliente_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdlista_clienteDuplicar" align="center">
							<input type="button" id="btnDuplicarlista_cliente" name="btnDuplicarlista_cliente" title="DUPLICAR Lista Cliente" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdlista_clienteCopiar" align="center">
							<input type="button" id="btnCopiarlista_cliente" name="btnCopiarlista_cliente" title="COPIAR Lista Cliente" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(lista_cliente_web::$STR_ES_RELACIONADO=='false' && ((lista_cliente_web::$STR_ES_RELACIONADO=='false' && lista_cliente_web::$STR_ES_RELACIONES=='false') || lista_cliente_web::$STR_ES_BUSQUEDA=='true'  || lista_cliente_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdlista_clienteCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginalista_cliente" name="btnCerrarPaginalista_cliente" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPrepararlista_cliente -->
				</form> <!-- frmNuevoPrepararlista_cliente -->
				</div> <!-- divlista_clientePaginacionAjaxWebPart -->
			</td> <!-- tdlista_clientePaginacion -->
		</tr> <!-- trlista_clientePaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(lista_cliente_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacioneslista_clienteAjaxWebPart">
			<td id="tdAccionesRelacioneslista_clienteAjaxWebPart">
				<div id="divAccionesRelacioneslista_clienteAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacioneslista_clienteAjaxWebPart -->
		</tr> <!-- trAccionesRelacioneslista_clienteAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderBylista_cliente">
			<td id="tdOrderBylista_cliente">
				<form id="frmOrderBylista_cliente" name="frmOrderBylista_cliente">
					<div id="divOrderBylista_clienteAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderBylista_cliente -->
		</tr> <!-- trOrderBylista_cliente/super -->
			
		
		
		
		
		
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
			
				import {lista_cliente_webcontrol,lista_cliente_webcontrol1} from './webroot/js/JavaScript/contabilidad/inventario/lista_cliente/js/webcontrol/lista_cliente_webcontrol.js?random=1';
				
				lista_cliente_webcontrol1.setlista_cliente_constante(window.lista_cliente_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(lista_cliente_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

