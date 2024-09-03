<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\inventario\lista_precio\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Lista Precios Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/inventario/lista_precio/util/lista_precio_carga.php');
	use com\bydan\contabilidad\inventario\lista_precio\util\lista_precio_carga;
	
	//include_once('com/bydan/contabilidad/inventario/lista_precio/presentation/view/lista_precio_web.php');
	//use com\bydan\contabilidad\inventario\lista_precio\presentation\view\lista_precio_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	lista_precio_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	lista_precio_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$lista_precio_web1= new lista_precio_web();	
	$lista_precio_web1->cargarDatosGenerales();
	
	//$moduloActual=$lista_precio_web1->moduloActual;
	//$usuarioActual=$lista_precio_web1->usuarioActual;
	//$sessionBase=$lista_precio_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$lista_precio_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/lista_precio/js/templating/lista_precio_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/lista_precio/js/templating/lista_precio_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/lista_precio/js/templating/lista_precio_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/lista_precio/js/templating/lista_precio_datos_reporte_template.js'); ?>
		
			
						
		
		
		<?php 
			
		
			lista_precio_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					lista_precio_web::$GET_POST=$_GET;
				} else {
					lista_precio_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			lista_precio_web::$STR_NOMBRE_PAGINA = 'lista_precio_view.php';
			lista_precio_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			lista_precio_web::$BIT_ES_PAGINA_FORM = 'false';
				
			lista_precio_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {lista_precio_constante,lista_precio_constante1} from './webroot/js/JavaScript/contabilidad/inventario/lista_precio/js/util/lista_precio_constante.js?random=1';
			import {lista_precio_funcion,lista_precio_funcion1} from './webroot/js/JavaScript/contabilidad/inventario/lista_precio/js/util/lista_precio_funcion.js?random=1';
			
			let lista_precio_constante2 = new lista_precio_constante();
			
			lista_precio_constante2.STR_NOMBRE_PAGINA="<?php echo(lista_precio_web::$STR_NOMBRE_PAGINA); ?>";
			lista_precio_constante2.STR_TYPE_ON_LOADlista_precio="<?php echo(lista_precio_web::$STR_TYPE_ONLOAD); ?>";
			lista_precio_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(lista_precio_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			lista_precio_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(lista_precio_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			lista_precio_constante2.STR_ACTION="<?php echo(lista_precio_web::$STR_ACTION); ?>";
			lista_precio_constante2.STR_ES_POPUP="<?php echo(lista_precio_web::$STR_ES_POPUP); ?>";
			lista_precio_constante2.STR_ES_BUSQUEDA="<?php echo(lista_precio_web::$STR_ES_BUSQUEDA); ?>";
			lista_precio_constante2.STR_FUNCION_JS="<?php echo(lista_precio_web::$STR_FUNCION_JS); ?>";
			lista_precio_constante2.BIG_ID_ACTUAL="<?php echo(lista_precio_web::$BIG_ID_ACTUAL); ?>";
			lista_precio_constante2.BIG_ID_OPCION="<?php echo(lista_precio_web::$BIG_ID_OPCION); ?>";
			lista_precio_constante2.STR_OBJETO_JS="<?php echo(lista_precio_web::$STR_OBJETO_JS); ?>";
			lista_precio_constante2.STR_ES_RELACIONES="<?php echo(lista_precio_web::$STR_ES_RELACIONES); ?>";
			lista_precio_constante2.STR_ES_RELACIONADO="<?php echo(lista_precio_web::$STR_ES_RELACIONADO); ?>";
			lista_precio_constante2.STR_ES_SUB_PAGINA="<?php echo(lista_precio_web::$STR_ES_SUB_PAGINA); ?>";
			lista_precio_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(lista_precio_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			lista_precio_constante2.BIT_ES_PAGINA_FORM=<?php echo(lista_precio_web::$BIT_ES_PAGINA_FORM); ?>;
			lista_precio_constante2.STR_SUFIJO="<?php echo(lista_precio_web::$STR_SUF); ?>";//lista_precio
			lista_precio_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(lista_precio_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//lista_precio
			
			lista_precio_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(lista_precio_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			lista_precio_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($lista_precio_web1->moduloActual->getnombre()); ?>";
			lista_precio_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(lista_precio_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			lista_precio_constante2.BIT_ES_LOAD_NORMAL=true;
			/*lista_precio_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			lista_precio_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.lista_precio_constante2 = lista_precio_constante2;
			
		</script>
		
		<?php if(lista_precio_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.lista_precio_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.lista_precio_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="lista_precioActual" ></a>
	
	<div id="divResumenlista_precioActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(lista_precio_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(lista_precio_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(lista_precio_web::$STR_ES_BUSQUEDA=='false' && lista_precio_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(lista_precio_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(lista_precio_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(lista_precio_web::$STR_ES_RELACIONADO=='false' && lista_precio_web::$STR_ES_POPUP=='false' && lista_precio_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tdlista_precioNuevoToolBar">
										<img id="imgNuevoToolBarlista_precio" name="imgNuevoToolBarlista_precio" title="Nuevo Lista Precios" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(lista_precio_web::$STR_ES_BUSQUEDA=='false' && lista_precio_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdlista_precioNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBarlista_precio" name="imgNuevoGuardarCambiosToolBarlista_precio" title="Nuevo TABLA Lista Precios" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(lista_precio_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdlista_precioGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBarlista_precio" name="imgGuardarCambiosToolBarlista_precio" title="Guardar Lista Precios" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(lista_precio_web::$STR_ES_RELACIONADO=='false' && lista_precio_web::$STR_ES_RELACIONES=='false' && lista_precio_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdlista_precioCopiarToolBar">
										<img id="imgCopiarToolBarlista_precio" name="imgCopiarToolBarlista_precio" title="Copiar Lista Precios" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdlista_precioDuplicarToolBar">
										<img id="imgDuplicarToolBarlista_precio" name="imgDuplicarToolBarlista_precio" title="Duplicar Lista Precios" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(lista_precio_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdlista_precioRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBarlista_precio" name="imgRecargarInformacionToolBarlista_precio" title="Recargar Lista Precios" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdlista_precioAnterioresToolBar">
										<img id="imgAnterioresToolBarlista_precio" name="imgAnterioresToolBarlista_precio" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdlista_precioSiguientesToolBar">
										<img id="imgSiguientesToolBarlista_precio" name="imgSiguientesToolBarlista_precio" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdlista_precioAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBarlista_precio" name="imgAbrirOrderByToolBarlista_precio" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((lista_precio_web::$STR_ES_RELACIONADO=='false' && lista_precio_web::$STR_ES_RELACIONES=='false') || lista_precio_web::$STR_ES_BUSQUEDA=='true'  || lista_precio_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdlista_precioCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBarlista_precio" name="imgCerrarPaginaToolBarlista_precio" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trlista_precioCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedalista_precio" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedalista_precio',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trlista_precioCabeceraBusquedas/super -->

		<tr id="trBusquedalista_precio" class="busqueda" style="display:table-row">
			<td id="tdBusquedalista_precio" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedalista_precio" name="frmBusquedalista_precio">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedalista_precio" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trlista_precioBusquedas" class="busqueda" style="display:table-row"><td>
				<?php if(lista_precio_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 70%">
					<ul>
						<li id="listrVisibleFK_Idbodega" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idbodega"> Por Bodega</a></li>
						<li id="listrVisibleFK_Idproducto" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idproducto"> Por Producto</a></li>
						<li id="listrVisibleFK_Idproveedor" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idproveedor"> Por Proveedor</a></li>
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
							<input type="button" id="btnBuscarlista_precioFK_Idbodega" name="btnBuscarlista_precioFK_Idbodega" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
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
							<input type="button" id="btnBuscarlista_precioFK_Idproducto" name="btnBuscarlista_precioFK_Idproducto" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idproveedor">
					<table id="tblstrVisibleFK_Idproveedor" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Proveedor</span>
						</td>
						<td align="center">
							<select id="FK_Idproveedor-cmbid_proveedor" name="FK_Idproveedor-cmbid_proveedor" title="Proveedor" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarlista_precioFK_Idproveedor" name="btnBuscarlista_precioFK_Idproveedor" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscarlista_precio" style="display:table-row">
					<td id="tdParamsBuscarlista_precio">
		<?php if(lista_precio_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscarlista_precio">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistroslista_precio" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistroslista_precio"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistroslista_precio" name="ParamsBuscar-txtNumeroRegistroslista_precio" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacionlista_precio">
							<td id="tdGenerarReportelista_precio" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodoslista_precio" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodoslista_precio" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacionlista_precio" name="btnRecargarInformacionlista_precio" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginalista_precio" name="btnImprimirPaginalista_precio" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*lista_precio_web::$STR_ES_BUSQUEDA=='false'  &&*/ lista_precio_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderBylista_precio">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderBylista_precio" name="btnOrderBylista_precio" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
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

										<?php if(lista_precio_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdlista_precioConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodoslista_precio -->

							</td><!-- tdGenerarReportelista_precio -->
						</tr><!-- trRecargarInformacionlista_precio -->
					</table><!-- tblParamsBuscarNumeroRegistroslista_precio -->
				</div> <!-- divParamsBuscarlista_precio -->
		<?php } ?>
				</td> <!-- tdParamsBuscarlista_precio -->
				</tr><!-- trParamsBuscarlista_precio -->
				</table> <!-- tblBusquedalista_precio -->
				</form> <!-- frmBusquedalista_precio -->
				

			</td> <!-- tdBusquedalista_precio -->
		</tr> <!-- trBusquedalista_precio/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(lista_precio_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divlista_precioPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tbllista_precioPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmlista_precioAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnlista_precioAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="lista_precio_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnlista_precioAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmlista_precioAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tbllista_precioPopupAjaxWebPart -->
		</div> <!-- divlista_precioPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(lista_precio_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trlista_precioTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdalista_precio"></a>
		<img id="imgTablaParaDerechalista_precio" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechalista_precio'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdalista_precio" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdalista_precio'"/>
		<a id="TablaDerechalista_precio"></a>
	</td>
</tr> <!-- trlista_precioTablaNavegacion/super -->
<?php } ?>

<tr id="trlista_precioTablaDatos">
	<td colspan="3" id="htmlTableCelllista_precio">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatoslista_preciosAjaxWebPart">
		</div>
	</td>
</tr> <!-- trlista_precioTablaDatos/super -->
		
		
		<tr id="trlista_precioPaginacion" style="display:table-row">
			<td id="tdlista_precioPaginacion" align="left">
				<div id="divlista_precioPaginacionAjaxWebPart">
				<form id="frmPaginacionlista_precio" name="frmPaginacionlista_precio">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacionlista_precio" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:left">
					<tr>
						<?php if(lista_precio_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFklista_precio" name="btnSeleccionarLoteFklista_precio" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(lista_precio_web::$STR_ES_RELACIONADO=='false' /*&& lista_precio_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnterioreslista_precio" name="btnAnterioreslista_precio" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(lista_precio_web::$STR_ES_BUSQUEDA=='false' && lista_precio_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdlista_precioNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPrepararlista_precio" name="btnNuevoTablaPrepararlista_precio" title="NUEVO Lista Precios" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablalista_precio" name="ParamsPaginar-txtNumeroNuevoTablalista_precio" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(lista_precio_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdlista_precioConEditarlista_precio">
							<label>
								<input id="ParamsBuscar-chbConEditarlista_precio" name="ParamsBuscar-chbConEditarlista_precio" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(lista_precio_web::$STR_ES_RELACIONADO=='false'/* && lista_precio_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguienteslista_precio" name="btnSiguienteslista_precio" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacionlista_precio -->
				</form> <!-- frmPaginacionlista_precio -->
				<form id="frmNuevoPrepararlista_precio" name="frmNuevoPrepararlista_precio">
				<table id="tblNuevoPrepararlista_precio" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:left">
					<tr id="trlista_precioNuevo" height="10">
						<?php if(lista_precio_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdlista_precioNuevo" align="center">
							<input type="button" id="btnNuevoPrepararlista_precio" name="btnNuevoPrepararlista_precio" title="NUEVO Lista Precios" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdlista_precioGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambioslista_precio" name="btnGuardarCambioslista_precio" title="GUARDAR Lista Precios" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(lista_precio_web::$STR_ES_RELACIONADO=='false' && lista_precio_web::$STR_ES_RELACIONES=='false' && lista_precio_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdlista_precioDuplicar" align="center">
							<input type="button" id="btnDuplicarlista_precio" name="btnDuplicarlista_precio" title="DUPLICAR Lista Precios" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdlista_precioCopiar" align="center">
							<input type="button" id="btnCopiarlista_precio" name="btnCopiarlista_precio" title="COPIAR Lista Precios" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(lista_precio_web::$STR_ES_RELACIONADO=='false' && ((lista_precio_web::$STR_ES_RELACIONADO=='false' && lista_precio_web::$STR_ES_RELACIONES=='false') || lista_precio_web::$STR_ES_BUSQUEDA=='true'  || lista_precio_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdlista_precioCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginalista_precio" name="btnCerrarPaginalista_precio" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPrepararlista_precio -->
				</form> <!-- frmNuevoPrepararlista_precio -->
				</div> <!-- divlista_precioPaginacionAjaxWebPart -->
			</td> <!-- tdlista_precioPaginacion -->
		</tr> <!-- trlista_precioPaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(lista_precio_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacioneslista_precioAjaxWebPart">
			<td id="tdAccionesRelacioneslista_precioAjaxWebPart">
				<div id="divAccionesRelacioneslista_precioAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacioneslista_precioAjaxWebPart -->
		</tr> <!-- trAccionesRelacioneslista_precioAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderBylista_precio">
			<td id="tdOrderBylista_precio">
				<form id="frmOrderBylista_precio" name="frmOrderBylista_precio">
					<div id="divOrderBylista_precioAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderBylista_precio -->
		</tr> <!-- trOrderBylista_precio/super -->
			
		
		
		
		
		
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
			
				import {lista_precio_webcontrol,lista_precio_webcontrol1} from './webroot/js/JavaScript/contabilidad/inventario/lista_precio/js/webcontrol/lista_precio_webcontrol.js?random=1';
				
				lista_precio_webcontrol1.setlista_precio_constante(window.lista_precio_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(lista_precio_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

