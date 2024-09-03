<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\inventario\lista_producto\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Lista Productos Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/inventario/lista_producto/util/lista_producto_carga.php');
	use com\bydan\contabilidad\inventario\lista_producto\util\lista_producto_carga;
	
	//include_once('com/bydan/contabilidad/inventario/lista_producto/presentation/view/lista_producto_web.php');
	//use com\bydan\contabilidad\inventario\lista_producto\presentation\view\lista_producto_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	lista_producto_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	lista_producto_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$lista_producto_web1= new lista_producto_web();	
	$lista_producto_web1->cargarDatosGenerales();
	
	//$moduloActual=$lista_producto_web1->moduloActual;
	//$usuarioActual=$lista_producto_web1->usuarioActual;
	//$sessionBase=$lista_producto_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$lista_producto_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/lista_producto/js/templating/lista_producto_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/lista_producto/js/templating/lista_producto_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/lista_producto/js/templating/lista_producto_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/lista_producto/js/templating/lista_producto_datos_reporte_template.js'); ?>
		
			
						
		
		
		<?php 
			
		
			lista_producto_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					lista_producto_web::$GET_POST=$_GET;
				} else {
					lista_producto_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			lista_producto_web::$STR_NOMBRE_PAGINA = 'lista_producto_view.php';
			lista_producto_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			lista_producto_web::$BIT_ES_PAGINA_FORM = 'false';
				
			lista_producto_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {lista_producto_constante,lista_producto_constante1} from './webroot/js/JavaScript/contabilidad/inventario/lista_producto/js/util/lista_producto_constante.js?random=1';
			import {lista_producto_funcion,lista_producto_funcion1} from './webroot/js/JavaScript/contabilidad/inventario/lista_producto/js/util/lista_producto_funcion.js?random=1';
			
			let lista_producto_constante2 = new lista_producto_constante();
			
			lista_producto_constante2.STR_NOMBRE_PAGINA="<?php echo(lista_producto_web::$STR_NOMBRE_PAGINA); ?>";
			lista_producto_constante2.STR_TYPE_ON_LOADlista_producto="<?php echo(lista_producto_web::$STR_TYPE_ONLOAD); ?>";
			lista_producto_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(lista_producto_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			lista_producto_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(lista_producto_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			lista_producto_constante2.STR_ACTION="<?php echo(lista_producto_web::$STR_ACTION); ?>";
			lista_producto_constante2.STR_ES_POPUP="<?php echo(lista_producto_web::$STR_ES_POPUP); ?>";
			lista_producto_constante2.STR_ES_BUSQUEDA="<?php echo(lista_producto_web::$STR_ES_BUSQUEDA); ?>";
			lista_producto_constante2.STR_FUNCION_JS="<?php echo(lista_producto_web::$STR_FUNCION_JS); ?>";
			lista_producto_constante2.BIG_ID_ACTUAL="<?php echo(lista_producto_web::$BIG_ID_ACTUAL); ?>";
			lista_producto_constante2.BIG_ID_OPCION="<?php echo(lista_producto_web::$BIG_ID_OPCION); ?>";
			lista_producto_constante2.STR_OBJETO_JS="<?php echo(lista_producto_web::$STR_OBJETO_JS); ?>";
			lista_producto_constante2.STR_ES_RELACIONES="<?php echo(lista_producto_web::$STR_ES_RELACIONES); ?>";
			lista_producto_constante2.STR_ES_RELACIONADO="<?php echo(lista_producto_web::$STR_ES_RELACIONADO); ?>";
			lista_producto_constante2.STR_ES_SUB_PAGINA="<?php echo(lista_producto_web::$STR_ES_SUB_PAGINA); ?>";
			lista_producto_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(lista_producto_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			lista_producto_constante2.BIT_ES_PAGINA_FORM=<?php echo(lista_producto_web::$BIT_ES_PAGINA_FORM); ?>;
			lista_producto_constante2.STR_SUFIJO="<?php echo(lista_producto_web::$STR_SUF); ?>";//lista_producto
			lista_producto_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(lista_producto_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//lista_producto
			
			lista_producto_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(lista_producto_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			lista_producto_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($lista_producto_web1->moduloActual->getnombre()); ?>";
			lista_producto_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(lista_producto_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			lista_producto_constante2.BIT_ES_LOAD_NORMAL=true;
			/*lista_producto_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			lista_producto_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.lista_producto_constante2 = lista_producto_constante2;
			
		</script>
		
		<?php if(lista_producto_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.lista_producto_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.lista_producto_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="lista_productoActual" ></a>
	
	<div id="divResumenlista_productoActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(lista_producto_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(lista_producto_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(lista_producto_web::$STR_ES_BUSQUEDA=='false' && lista_producto_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(lista_producto_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(lista_producto_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(lista_producto_web::$STR_ES_RELACIONADO=='false' && lista_producto_web::$STR_ES_POPUP=='false' && lista_producto_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tdlista_productoNuevoToolBar">
										<img id="imgNuevoToolBarlista_producto" name="imgNuevoToolBarlista_producto" title="Nuevo Lista Productos" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(lista_producto_web::$STR_ES_BUSQUEDA=='false' && lista_producto_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdlista_productoNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBarlista_producto" name="imgNuevoGuardarCambiosToolBarlista_producto" title="Nuevo TABLA Lista Productos" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(lista_producto_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdlista_productoGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBarlista_producto" name="imgGuardarCambiosToolBarlista_producto" title="Guardar Lista Productos" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(lista_producto_web::$STR_ES_RELACIONADO=='false' && lista_producto_web::$STR_ES_RELACIONES=='false' && lista_producto_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdlista_productoCopiarToolBar">
										<img id="imgCopiarToolBarlista_producto" name="imgCopiarToolBarlista_producto" title="Copiar Lista Productos" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdlista_productoDuplicarToolBar">
										<img id="imgDuplicarToolBarlista_producto" name="imgDuplicarToolBarlista_producto" title="Duplicar Lista Productos" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(lista_producto_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdlista_productoRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBarlista_producto" name="imgRecargarInformacionToolBarlista_producto" title="Recargar Lista Productos" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdlista_productoAnterioresToolBar">
										<img id="imgAnterioresToolBarlista_producto" name="imgAnterioresToolBarlista_producto" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdlista_productoSiguientesToolBar">
										<img id="imgSiguientesToolBarlista_producto" name="imgSiguientesToolBarlista_producto" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdlista_productoAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBarlista_producto" name="imgAbrirOrderByToolBarlista_producto" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((lista_producto_web::$STR_ES_RELACIONADO=='false' && lista_producto_web::$STR_ES_RELACIONES=='false') || lista_producto_web::$STR_ES_BUSQUEDA=='true'  || lista_producto_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdlista_productoCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBarlista_producto" name="imgCerrarPaginaToolBarlista_producto" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trlista_productoCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedalista_producto" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedalista_producto',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trlista_productoCabeceraBusquedas/super -->

		<tr id="trBusquedalista_producto" class="busqueda" style="display:table-row">
			<td id="tdBusquedalista_producto" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedalista_producto" name="frmBusquedalista_producto">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedalista_producto" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trlista_productoBusquedas" class="busqueda" style="display:table-row"><td>
				<?php if(lista_producto_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 95%">
					<ul>
						<li id="listrVisibleFK_Idbodega" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idbodega"> Por Bodega</a></li>
						<li id="listrVisibleFK_Idcategoria_producto" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idcategoria_producto"> Por Categoria Producto</a></li>
						<li id="listrVisibleFK_Idcuenta_compra" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idcuenta_compra"> Por  Cuenta Compra</a></li>
						<li id="listrVisibleFK_Idcuenta_inventario" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idcuenta_inventario"> Por  Cuenta Inventario</a></li>
						<li id="listrVisibleFK_Idcuenta_venta" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idcuenta_venta"> Por  Cuenta Venta</a></li>
						<li id="listrVisibleFK_Idimpuesto" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idimpuesto"> Por Impuesto</a></li>
						<li id="listrVisibleFK_Idimpuesto_compras" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idimpuesto_compras"> Por  Impuesto Compras</a></li>
						<li id="listrVisibleFK_Idimpuesto_ventas" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idimpuesto_ventas"> Por  Impuesto Ventas</a></li>
						<li id="listrVisibleFK_Idotro_impuesto" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idotro_impuesto"> Por Otro Impuesto</a></li>
						<li id="listrVisibleFK_Idotro_impuesto_compras" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idotro_impuesto_compras"> Por  Otro Impuesto Compras</a></li>
						<li id="listrVisibleFK_Idotro_impuesto_ventas" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idotro_impuesto_ventas"> Por  Otro Impuesto Ventas</a></li>
						<li id="listrVisibleFK_Idotro_suplidor" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idotro_suplidor"> Por Otro Suplidor</a></li>
						<li id="listrVisibleFK_Idproducto" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idproducto"> Por Producto</a></li>
						<li id="listrVisibleFK_Idretencion" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idretencion"> Por Retencion</a></li>
						<li id="listrVisibleFK_Idretencion_compras" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idretencion_compras"> Por  Retencion Compras</a></li>
						<li id="listrVisibleFK_Idretencion_ventas" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idretencion_ventas"> Por  Retencion Ventas</a></li>
						<li id="listrVisibleFK_Idsub_categoria_producto" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idsub_categoria_producto"> Por Sub Categoria Producto</a></li>
						<li id="listrVisibleFK_Idtipo_producto" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idtipo_producto"> Por  Tipo Producto</a></li>
						<li id="listrVisibleFK_Idunidad_compra" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idunidad_compra"> Por  Unidad Compra</a></li>
						<li id="listrVisibleFK_Idunidad_venta" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idunidad_venta"> Por  Unidad Venta</a></li>
					</ul>
				
					<div id="divstrVisibleFK_Idbodega">
					<table id="tblstrVisibleFK_Idbodega" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Bodega</span>
						</td>
						<td align="center">
							<select id="FK_Idbodega-cmbid_bodega" name="FK_Idbodega-cmbid_bodega" title="Bodega" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarlista_productoFK_Idbodega" name="btnBuscarlista_productoFK_Idbodega" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idcategoria_producto">
					<table id="tblstrVisibleFK_Idcategoria_producto" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Categoria Producto</span>
						</td>
						<td align="center">
							<select id="FK_Idcategoria_producto-cmbid_categoria_producto" name="FK_Idcategoria_producto-cmbid_categoria_producto" title="Categoria Producto" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarlista_productoFK_Idcategoria_producto" name="btnBuscarlista_productoFK_Idcategoria_producto" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idcuenta_compra">
					<table id="tblstrVisibleFK_Idcuenta_compra" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo"> Cuenta Compra</span>
						</td>
						<td align="center">
							<select id="FK_Idcuenta_compra-cmbid_cuenta_compra" name="FK_Idcuenta_compra-cmbid_cuenta_compra" title=" Cuenta Compra" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarlista_productoFK_Idcuenta_compra" name="btnBuscarlista_productoFK_Idcuenta_compra" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idcuenta_inventario">
					<table id="tblstrVisibleFK_Idcuenta_inventario" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo"> Cuenta Inventario</span>
						</td>
						<td align="center">
							<select id="FK_Idcuenta_inventario-cmbid_cuenta_inventario" name="FK_Idcuenta_inventario-cmbid_cuenta_inventario" title=" Cuenta Inventario" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarlista_productoFK_Idcuenta_inventario" name="btnBuscarlista_productoFK_Idcuenta_inventario" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idcuenta_venta">
					<table id="tblstrVisibleFK_Idcuenta_venta" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo"> Cuenta Venta</span>
						</td>
						<td align="center">
							<select id="FK_Idcuenta_venta-cmbid_cuenta_venta" name="FK_Idcuenta_venta-cmbid_cuenta_venta" title=" Cuenta Venta" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarlista_productoFK_Idcuenta_venta" name="btnBuscarlista_productoFK_Idcuenta_venta" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idimpuesto">
					<table id="tblstrVisibleFK_Idimpuesto" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Impuesto</span>
						</td>
						<td align="center">
							<select id="FK_Idimpuesto-cmbid_impuesto" name="FK_Idimpuesto-cmbid_impuesto" title="Impuesto" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarlista_productoFK_Idimpuesto" name="btnBuscarlista_productoFK_Idimpuesto" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idimpuesto_compras">
					<table id="tblstrVisibleFK_Idimpuesto_compras" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo"> Impuesto Compras</span>
						</td>
						<td align="center">
							<select id="FK_Idimpuesto_compras-cmbid_impuesto_compras" name="FK_Idimpuesto_compras-cmbid_impuesto_compras" title=" Impuesto Compras" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarlista_productoFK_Idimpuesto_compras" name="btnBuscarlista_productoFK_Idimpuesto_compras" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idimpuesto_ventas">
					<table id="tblstrVisibleFK_Idimpuesto_ventas" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo"> Impuesto Ventas</span>
						</td>
						<td align="center">
							<select id="FK_Idimpuesto_ventas-cmbid_impuesto_ventas" name="FK_Idimpuesto_ventas-cmbid_impuesto_ventas" title=" Impuesto Ventas" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarlista_productoFK_Idimpuesto_ventas" name="btnBuscarlista_productoFK_Idimpuesto_ventas" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idotro_impuesto">
					<table id="tblstrVisibleFK_Idotro_impuesto" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Otro Impuesto</span>
						</td>
						<td align="center">
							<select id="FK_Idotro_impuesto-cmbid_otro_impuesto" name="FK_Idotro_impuesto-cmbid_otro_impuesto" title="Otro Impuesto" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarlista_productoFK_Idotro_impuesto" name="btnBuscarlista_productoFK_Idotro_impuesto" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idotro_impuesto_compras">
					<table id="tblstrVisibleFK_Idotro_impuesto_compras" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo"> Otro Impuesto Compras</span>
						</td>
						<td align="center">
							<select id="FK_Idotro_impuesto_compras-cmbid_otro_impuesto_compras" name="FK_Idotro_impuesto_compras-cmbid_otro_impuesto_compras" title=" Otro Impuesto Compras" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarlista_productoFK_Idotro_impuesto_compras" name="btnBuscarlista_productoFK_Idotro_impuesto_compras" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idotro_impuesto_ventas">
					<table id="tblstrVisibleFK_Idotro_impuesto_ventas" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo"> Otro Impuesto Ventas</span>
						</td>
						<td align="center">
							<select id="FK_Idotro_impuesto_ventas-cmbid_otro_impuesto_ventas" name="FK_Idotro_impuesto_ventas-cmbid_otro_impuesto_ventas" title=" Otro Impuesto Ventas" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarlista_productoFK_Idotro_impuesto_ventas" name="btnBuscarlista_productoFK_Idotro_impuesto_ventas" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idotro_suplidor">
					<table id="tblstrVisibleFK_Idotro_suplidor" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Otro Suplidor</span>
						</td>
						<td align="center">
							<select id="FK_Idotro_suplidor-cmbid_otro_suplidor" name="FK_Idotro_suplidor-cmbid_otro_suplidor" title="Otro Suplidor" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarlista_productoFK_Idotro_suplidor" name="btnBuscarlista_productoFK_Idotro_suplidor" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
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
							<input type="button" id="btnBuscarlista_productoFK_Idproducto" name="btnBuscarlista_productoFK_Idproducto" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idretencion">
					<table id="tblstrVisibleFK_Idretencion" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Retencion</span>
						</td>
						<td align="center">
							<select id="FK_Idretencion-cmbid_retencion" name="FK_Idretencion-cmbid_retencion" title="Retencion" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarlista_productoFK_Idretencion" name="btnBuscarlista_productoFK_Idretencion" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idretencion_compras">
					<table id="tblstrVisibleFK_Idretencion_compras" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo"> Retencion Compras</span>
						</td>
						<td align="center">
							<select id="FK_Idretencion_compras-cmbid_retencion_compras" name="FK_Idretencion_compras-cmbid_retencion_compras" title=" Retencion Compras" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarlista_productoFK_Idretencion_compras" name="btnBuscarlista_productoFK_Idretencion_compras" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idretencion_ventas">
					<table id="tblstrVisibleFK_Idretencion_ventas" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo"> Retencion Ventas</span>
						</td>
						<td align="center">
							<select id="FK_Idretencion_ventas-cmbid_retencion_ventas" name="FK_Idretencion_ventas-cmbid_retencion_ventas" title=" Retencion Ventas" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarlista_productoFK_Idretencion_ventas" name="btnBuscarlista_productoFK_Idretencion_ventas" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idsub_categoria_producto">
					<table id="tblstrVisibleFK_Idsub_categoria_producto" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Sub Categoria Producto</span>
						</td>
						<td align="center">
							<select id="FK_Idsub_categoria_producto-cmbid_sub_categoria_producto" name="FK_Idsub_categoria_producto-cmbid_sub_categoria_producto" title="Sub Categoria Producto" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarlista_productoFK_Idsub_categoria_producto" name="btnBuscarlista_productoFK_Idsub_categoria_producto" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idtipo_producto">
					<table id="tblstrVisibleFK_Idtipo_producto" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo"> Tipo Producto</span>
						</td>
						<td align="center">
							<select id="FK_Idtipo_producto-cmbid_tipo_producto" name="FK_Idtipo_producto-cmbid_tipo_producto" title=" Tipo Producto" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarlista_productoFK_Idtipo_producto" name="btnBuscarlista_productoFK_Idtipo_producto" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idunidad_compra">
					<table id="tblstrVisibleFK_Idunidad_compra" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo"> Unidad Compra</span>
						</td>
						<td align="center">
							<select id="FK_Idunidad_compra-cmbid_unidad_compra" name="FK_Idunidad_compra-cmbid_unidad_compra" title=" Unidad Compra" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarlista_productoFK_Idunidad_compra" name="btnBuscarlista_productoFK_Idunidad_compra" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idunidad_venta">
					<table id="tblstrVisibleFK_Idunidad_venta" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo"> Unidad Venta</span>
						</td>
						<td align="center">
							<select id="FK_Idunidad_venta-cmbid_unidad_venta" name="FK_Idunidad_venta-cmbid_unidad_venta" title=" Unidad Venta" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarlista_productoFK_Idunidad_venta" name="btnBuscarlista_productoFK_Idunidad_venta" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscarlista_producto" style="display:table-row">
					<td id="tdParamsBuscarlista_producto">
		<?php if(lista_producto_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscarlista_producto">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistroslista_producto" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistroslista_producto"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistroslista_producto" name="ParamsBuscar-txtNumeroRegistroslista_producto" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacionlista_producto">
							<td id="tdGenerarReportelista_producto" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodoslista_producto" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodoslista_producto" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacionlista_producto" name="btnRecargarInformacionlista_producto" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginalista_producto" name="btnImprimirPaginalista_producto" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*lista_producto_web::$STR_ES_BUSQUEDA=='false'  &&*/ lista_producto_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderBylista_producto">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderBylista_producto" name="btnOrderBylista_producto" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
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

										<?php if(lista_producto_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdlista_productoConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodoslista_producto -->

							</td><!-- tdGenerarReportelista_producto -->
						</tr><!-- trRecargarInformacionlista_producto -->
					</table><!-- tblParamsBuscarNumeroRegistroslista_producto -->
				</div> <!-- divParamsBuscarlista_producto -->
		<?php } ?>
				</td> <!-- tdParamsBuscarlista_producto -->
				</tr><!-- trParamsBuscarlista_producto -->
				</table> <!-- tblBusquedalista_producto -->
				</form> <!-- frmBusquedalista_producto -->
				

			</td> <!-- tdBusquedalista_producto -->
		</tr> <!-- trBusquedalista_producto/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(lista_producto_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divlista_productoPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tbllista_productoPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmlista_productoAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnlista_productoAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="lista_producto_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnlista_productoAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmlista_productoAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tbllista_productoPopupAjaxWebPart -->
		</div> <!-- divlista_productoPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(lista_producto_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trlista_productoTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdalista_producto"></a>
		<img id="imgTablaParaDerechalista_producto" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechalista_producto'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdalista_producto" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdalista_producto'"/>
		<a id="TablaDerechalista_producto"></a>
	</td>
</tr> <!-- trlista_productoTablaNavegacion/super -->
<?php } ?>

<tr id="trlista_productoTablaDatos">
	<td colspan="3" id="htmlTableCelllista_producto">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatoslista_productosAjaxWebPart">
		</div>
	</td>
</tr> <!-- trlista_productoTablaDatos/super -->
		
		
		<tr id="trlista_productoPaginacion" style="display:table-row">
			<td id="tdlista_productoPaginacion" align="left">
				<div id="divlista_productoPaginacionAjaxWebPart">
				<form id="frmPaginacionlista_producto" name="frmPaginacionlista_producto">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacionlista_producto" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:left">
					<tr>
						<?php if(lista_producto_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFklista_producto" name="btnSeleccionarLoteFklista_producto" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(lista_producto_web::$STR_ES_RELACIONADO=='false' /*&& lista_producto_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnterioreslista_producto" name="btnAnterioreslista_producto" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(lista_producto_web::$STR_ES_BUSQUEDA=='false' && lista_producto_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdlista_productoNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPrepararlista_producto" name="btnNuevoTablaPrepararlista_producto" title="NUEVO Lista Productos" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablalista_producto" name="ParamsPaginar-txtNumeroNuevoTablalista_producto" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(lista_producto_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdlista_productoConEditarlista_producto">
							<label>
								<input id="ParamsBuscar-chbConEditarlista_producto" name="ParamsBuscar-chbConEditarlista_producto" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(lista_producto_web::$STR_ES_RELACIONADO=='false'/* && lista_producto_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguienteslista_producto" name="btnSiguienteslista_producto" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacionlista_producto -->
				</form> <!-- frmPaginacionlista_producto -->
				<form id="frmNuevoPrepararlista_producto" name="frmNuevoPrepararlista_producto">
				<table id="tblNuevoPrepararlista_producto" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:left">
					<tr id="trlista_productoNuevo" height="10">
						<?php if(lista_producto_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdlista_productoNuevo" align="center">
							<input type="button" id="btnNuevoPrepararlista_producto" name="btnNuevoPrepararlista_producto" title="NUEVO Lista Productos" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdlista_productoGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambioslista_producto" name="btnGuardarCambioslista_producto" title="GUARDAR Lista Productos" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(lista_producto_web::$STR_ES_RELACIONADO=='false' && lista_producto_web::$STR_ES_RELACIONES=='false' && lista_producto_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdlista_productoDuplicar" align="center">
							<input type="button" id="btnDuplicarlista_producto" name="btnDuplicarlista_producto" title="DUPLICAR Lista Productos" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdlista_productoCopiar" align="center">
							<input type="button" id="btnCopiarlista_producto" name="btnCopiarlista_producto" title="COPIAR Lista Productos" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(lista_producto_web::$STR_ES_RELACIONADO=='false' && ((lista_producto_web::$STR_ES_RELACIONADO=='false' && lista_producto_web::$STR_ES_RELACIONES=='false') || lista_producto_web::$STR_ES_BUSQUEDA=='true'  || lista_producto_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdlista_productoCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginalista_producto" name="btnCerrarPaginalista_producto" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPrepararlista_producto -->
				</form> <!-- frmNuevoPrepararlista_producto -->
				</div> <!-- divlista_productoPaginacionAjaxWebPart -->
			</td> <!-- tdlista_productoPaginacion -->
		</tr> <!-- trlista_productoPaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(lista_producto_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacioneslista_productoAjaxWebPart">
			<td id="tdAccionesRelacioneslista_productoAjaxWebPart">
				<div id="divAccionesRelacioneslista_productoAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacioneslista_productoAjaxWebPart -->
		</tr> <!-- trAccionesRelacioneslista_productoAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderBylista_producto">
			<td id="tdOrderBylista_producto">
				<form id="frmOrderBylista_producto" name="frmOrderBylista_producto">
					<div id="divOrderBylista_productoAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderBylista_producto -->
		</tr> <!-- trOrderBylista_producto/super -->
			
		
		
		
		
		
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
			
				import {lista_producto_webcontrol,lista_producto_webcontrol1} from './webroot/js/JavaScript/contabilidad/inventario/lista_producto/js/webcontrol/lista_producto_webcontrol.js?random=1';
				
				lista_producto_webcontrol1.setlista_producto_constante(window.lista_producto_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(lista_producto_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

