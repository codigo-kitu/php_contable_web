<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\inventario\producto\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Producto Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/inventario/producto/util/producto_carga.php');
	use com\bydan\contabilidad\inventario\producto\util\producto_carga;
	
	//include_once('com/bydan/contabilidad/inventario/producto/presentation/view/producto_web.php');
	//use com\bydan\contabilidad\inventario\producto\presentation\view\producto_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	producto_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	producto_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$producto_web1= new producto_web();	
	$producto_web1->cargarDatosGenerales();
	
	//$moduloActual=$producto_web1->moduloActual;
	//$usuarioActual=$producto_web1->usuarioActual;
	//$sessionBase=$producto_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$producto_web1->parametroGeneralUsuarioActual;
	
	
		
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
		
		
			<script type="module" src="webroot/js/JavaScript/contabilidad/inventario/producto/js/util/producto_form_funcion.js?random=1"></script>
						
		
		
		<?php 
			
		
			producto_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					producto_web::$GET_POST=$_GET;
				} else {
					producto_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			producto_web::$STR_NOMBRE_PAGINA = 'producto_form_view.php';
			producto_web::$BIT_ES_PAGINA_PRINCIPAL = 'false';
			producto_web::$BIT_ES_PAGINA_FORM = 'true';
				
			producto_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {producto_constante,producto_constante1} from './webroot/js/JavaScript/contabilidad/inventario/producto/js/util/producto_constante.js?random=1';
			import {producto_funcion,producto_funcion1} from './webroot/js/JavaScript/contabilidad/inventario/producto/js/util/producto_funcion.js?random=1';
			
			let producto_constante2 = new producto_constante();
			
			producto_constante2.STR_NOMBRE_PAGINA="<?php echo(producto_web::$STR_NOMBRE_PAGINA); ?>";
			producto_constante2.STR_TYPE_ON_LOADproducto="<?php echo(producto_web::$STR_TYPE_ONLOAD); ?>";
			producto_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(producto_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			producto_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(producto_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			producto_constante2.STR_ACTION="<?php echo(producto_web::$STR_ACTION); ?>";
			producto_constante2.STR_ES_POPUP="<?php echo(producto_web::$STR_ES_POPUP); ?>";
			producto_constante2.STR_ES_BUSQUEDA="<?php echo(producto_web::$STR_ES_BUSQUEDA); ?>";
			producto_constante2.STR_FUNCION_JS="<?php echo(producto_web::$STR_FUNCION_JS); ?>";
			producto_constante2.BIG_ID_ACTUAL="<?php echo(producto_web::$BIG_ID_ACTUAL); ?>";
			producto_constante2.BIG_ID_OPCION="<?php echo(producto_web::$BIG_ID_OPCION); ?>";
			producto_constante2.STR_OBJETO_JS="<?php echo(producto_web::$STR_OBJETO_JS); ?>";
			producto_constante2.STR_ES_RELACIONES="<?php echo(producto_web::$STR_ES_RELACIONES); ?>";
			producto_constante2.STR_ES_RELACIONADO="<?php echo(producto_web::$STR_ES_RELACIONADO); ?>";
			producto_constante2.STR_ES_SUB_PAGINA="<?php echo(producto_web::$STR_ES_SUB_PAGINA); ?>";
			producto_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(producto_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			producto_constante2.BIT_ES_PAGINA_FORM=<?php echo(producto_web::$BIT_ES_PAGINA_FORM); ?>;
			producto_constante2.STR_SUFIJO="<?php echo(producto_web::$STR_SUF); ?>";//producto
			producto_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(producto_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//producto
			
			producto_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(producto_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			producto_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($producto_web1->moduloActual->getnombre()); ?>";
			producto_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(producto_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			producto_constante2.BIT_ES_LOAD_NORMAL=true;
			/*producto_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			producto_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.producto_constante2 = producto_constante2;
			
		</script>
		
		<?php if(producto_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.producto_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.producto_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="productoActual" ></a>
	
	<div id="divResumenproductoActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(producto_web::$STR_ES_RELACIONADO=='false') {?>
		
		<div id="header" >
		
			<div id="banner">
				<span id="spanTituloBanner" class="titulobanner"></span>
			</div> <!-- banner -->
					
			<div id="subheader" class="links">  
			
						
			</div> <!-- sub-header -->
			
			
		</div> <!-- header -->
		
		<?php } ?>
		
		<div id="main">
		

			<?php if(producto_web::$STR_ES_RELACIONADO=='false') {?>
			
			
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(producto_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(producto_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divproductoPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblproductoPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmproductoAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnproductoAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="producto_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnproductoAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmproductoAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblproductoPopupAjaxWebPart -->
		</div> <!-- divproductoPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->		
		
		
		
			
<tr id="trproductoElementosFormulario">
	<td>
		<div id="divMantenimientoproductoAjaxWebPart" title="PRODUCTO" style="height: 90%;width: 90%;position: relative;top: 30px;left: 30px;">
			<form id="frmMantenimientoproducto" name="frmMantenimientoproducto">

			</br>

			<?php if(producto_web::$STR_ES_RELACIONES=='false' ) {?>
			</br>
			<?php } ?>

			<!-- SECCION/TOOLBAR -->
			<table id="tblproductoToolBarFormularioExterior" style="width: 65%">
				<tr style="display:table-row">
					<td align="center">

						<table id="tblproductoToolBarFormulario" style="text-align: center"  style="display:table-row">
							<tr>
								<td id="tdproductoActualizarToolBar" style="visibility:visible">
									<img id="imgActualizarToolBarproducto" name="imgActualizarToolBarproducto" title="ACTUALIZAR Producto ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/actualizar.gif" width="25" height="25"/>
								</td>
								<td id="tdproductoEliminarToolBar" style="visibility:visible">
									<img id="imgEliminarToolBarproducto" name="imgEliminarToolBarproducto" title="ELIMINAR Producto ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/eliminar.gif" width="25" height="25"/>
								</td>
								<td id="tdproductoCancelarToolBar" style="visibility:visible">
									<img id="imgCancelarToolBarproducto" name="imgCancelarToolBarproducto" title="CANCELAR Producto ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/cancelar.gif" width="25" height="25"/>
								</td>
								<td id="tdproductoRelacionesToolBar" style="display:table-row">
									<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/xexpand.png" width="25" height="25" onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('tblCamposOcultosproducto',this,'../')"/>
								</td>
							</tr>
						</table> <!-- tblproductoToolBarFormulario -->

					</td>
				</tr>
			</table> <!-- tblproductoToolBarFormularioExterior -->

			<table id="tblproductoElementos">
			<tr id="trproductoElementos" class="elementos" style="display:table-row">
			<td align="center">

			<a id="Campos"></a>

				<?php if(producto_web::$STR_ES_RELACIONES=='false' ) {?>
				<div id="divFlechaArribaElementos" align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
					<span></span>
				</div>
				<?php } ?>


				<div id="tabs_elementos" class="tabs" style="width: 100%">
					<ul>
						<li class="titulotab"><a href="#principal">PRINCIPAL</a></li>
						<li class="titulotab"><a href="#general">GENERAL</a></li>
					</ul>


				<!-- SECCION/FORMULARIO -->
				<table id="tblElementosproducto" class="elementos" style="width: 666px; padding: 0px; border-spacing: 0px; border-collapse: collapse; text-align: left;">
					
						<td colspan="2" style="visibility:hidden;display:none">
							<table style="width:100%">
								<tr style="visibility:hidden;display:none">
								<td id="td_title-created_at" class="titulocampo">
								</td>
								<td id="td_control-created_at" align="left" class="controlcampo">
									<input id="form-created_at" name="form-created_at" type="text" class="form-control"  placeholder="Created At"  title="Created At"   readonly>
									<span id="spanstrMensajecreated_at" class="mensajeerror"></span>
								</td>
								</tr>
							</table>
						</td>
					</tr>
					
						<td colspan="2" style="visibility:hidden;display:none">
							<table style="width:100%">
								<tr style="visibility:hidden;display:none">
								<td id="td_title-updated_at" class="titulocampo">
								</td>
								<td id="td_control-updated_at" align="left" class="controlcampo">
									<input id="form-updated_at" name="form-updated_at" type="text" class="form-control"  placeholder="Updated At"  title="Updated At"   readonly>
									<span id="spanstrMensajeupdated_at" class="mensajeerror"></span>
								</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr id="trproductoprincipalElementos">
						<td id="tdproductoprincipalElementos"  colspan="4">
			<div id="principal">
				<table class="elementos" style="width:666px;text-align:left; padding: 0px; border-spacing: 0px; border-collapse: collapse;">
					<caption class="busquedacabecera"><span>PRINCIPAL</span></caption>
					<tr id="tr_fila_1">
						<td id="td_title-id" class="titulocampo">
							<label class="form-label">Cod. Único</label>
						</td>
						<td id="td_control-id" align="left">
							<input id="form-id" name="form-id" type="text" class="form-control" readonly size="10">
						</td>
					
					
						<td id="td_title-id_proveedor" class="titulocampo">
							<label class="form-label"> Proveedores.(*)</label>
						</td>
						<td id="td_control-id_proveedor" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_proveedor" name="form-id_proveedor" title=" Proveedores" ></select></td>
									<td><a><img id="form-id_proveedor_img" name="form-id_proveedor_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_proveedor_img_busqueda" name="form-id_proveedor_img_busqueda" title="Buscar Proveedor" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_proveedor" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_2">
						<td id="td_title-codigo" class="titulocampo">
							<label class="form-label">Codigo.(*)</label>
						</td>
						<td id="td_control-codigo" align="left" class="controlcampo">
							<input id="form-codigo" name="form-codigo" type="text" class="form-control"  placeholder="Codigo"  title="Codigo"    size="20"  maxlength="26"/>
							<span id="spanstrMensajecodigo" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-nombre" class="titulocampo">
							<label class="form-label">Nombre.(*)</label>
						</td>
						<td id="td_control-nombre" align="left" class="controlcampo">
							<textarea id="form-nombre" name="form-nombre" class="form-control"  placeholder="Nombre"  title="Nombre"   style="font-size: 13px;" rows="2" cols="25" size="20" ></textarea>
							<span id="spanstrMensajenombre" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_3">
						<td id="td_title-costo" class="titulocampo">
							<label class="form-label">Costo.(*)</label>
						</td>
						<td id="td_control-costo" align="left" class="controlcampo">
							<input id="form-costo" name="form-costo" type="text" class="form-control"  placeholder="Costo"  title="Costo"    maxlength="18" size="12" >
							<span id="spanstrMensajecosto" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-activo" class="titulocampo">
							<label class="form-label">Activo</label>
						</td>
						<td id="td_control-activo" align="left" class="controlcampo">
							<input id="form-activo" name="form-activo" type="checkbox" >
							<span id="spanstrMensajeactivo" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_4">
						<td id="td_title-id_tipo_producto" class="titulocampo">
							<label class="form-label">Tipo Producto.(*)</label>
						</td>
						<td id="td_control-id_tipo_producto" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_tipo_producto" name="form-id_tipo_producto" title="Tipo Producto" ></select></td>
									<td><img id="form-id_tipo_producto_img_busqueda" name="form-id_tipo_producto_img_busqueda" title="Buscar Tipo Producto" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_tipo_producto" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-cantidad_inicial" class="titulocampo">
							<label class="form-label">Cantidad Inicial.(*)</label>
						</td>
						<td id="td_control-cantidad_inicial" align="left" class="controlcampo">
							<input id="form-cantidad_inicial" name="form-cantidad_inicial" type="text" class="form-control"  placeholder="Cantidad Inicial"  title="Cantidad Inicial"    maxlength="18" size="12" >
							<span id="spanstrMensajecantidad_inicial" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_5">
						<td id="td_title-id_impuesto" class="titulocampo">
							<label class="form-label">Impuesto.(*)</label>
						</td>
						<td id="td_control-id_impuesto" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_impuesto" name="form-id_impuesto" title="Impuesto" ></select></td>
									<td><a><img id="form-id_impuesto_img" name="form-id_impuesto_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_impuesto_img_busqueda" name="form-id_impuesto_img_busqueda" title="Buscar Impuesto" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_impuesto" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-id_otro_impuesto" class="titulocampo">
							<label class="form-label">Otro Impuesto</label>
						</td>
						<td id="td_control-id_otro_impuesto" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_otro_impuesto" name="form-id_otro_impuesto" title="Otro Impuesto" ></select></td>
									<td><a><img id="form-id_otro_impuesto_img" name="form-id_otro_impuesto_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_otro_impuesto_img_busqueda" name="form-id_otro_impuesto_img_busqueda" title="Buscar Otro Impuesto" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_otro_impuesto" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_6">
						<td id="td_title-impuesto_ventas" class="titulocampo">
							<label class="form-label">Impuesto En Ventas</label>
						</td>
						<td id="td_control-impuesto_ventas" align="left" class="controlcampo">
							<input id="form-impuesto_ventas" name="form-impuesto_ventas" type="checkbox" >
							<span id="spanstrMensajeimpuesto_ventas" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-otro_impuesto_ventas" class="titulocampo">
							<label class="form-label">Otro Impuesto Ventas</label>
						</td>
						<td id="td_control-otro_impuesto_ventas" align="left" class="controlcampo">
							<input id="form-otro_impuesto_ventas" name="form-otro_impuesto_ventas" type="checkbox" >
							<span id="spanstrMensajeotro_impuesto_ventas" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_7">
						<td id="td_title-impuesto_compras" class="titulocampo">
							<label class="form-label">Impuesto En Compras</label>
						</td>
						<td id="td_control-impuesto_compras" align="left" class="controlcampo">
							<input id="form-impuesto_compras" name="form-impuesto_compras" type="checkbox" >
							<span id="spanstrMensajeimpuesto_compras" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-otro_impuesto_compras" class="titulocampo">
							<label class="form-label">Otro Impuesto Compras</label>
						</td>
						<td id="td_control-otro_impuesto_compras" align="left" class="controlcampo">
							<input id="form-otro_impuesto_compras" name="form-otro_impuesto_compras" type="checkbox" >
							<span id="spanstrMensajeotro_impuesto_compras" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_8">
						<td id="td_title-id_categoria_producto" class="titulocampo">
							<label class="form-label">Categoria Producto.(*)</label>
						</td>
						<td id="td_control-id_categoria_producto" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_categoria_producto" name="form-id_categoria_producto" title="Categoria Producto" ></select></td>
									<td><a><img id="form-id_categoria_producto_img" name="form-id_categoria_producto_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_categoria_producto_img_busqueda" name="form-id_categoria_producto_img_busqueda" title="Buscar Categoria Producto" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_categoria_producto" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-id_sub_categoria_producto" class="titulocampo">
							<label class="form-label">Sub Categoria Producto.(*)</label>
						</td>
						<td id="td_control-id_sub_categoria_producto" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_sub_categoria_producto" name="form-id_sub_categoria_producto" title="Sub Categoria Producto" ></select></td>
									<td><a><img id="form-id_sub_categoria_producto_img" name="form-id_sub_categoria_producto_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_sub_categoria_producto_img_busqueda" name="form-id_sub_categoria_producto_img_busqueda" title="Buscar Sub Categoria Producto" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_sub_categoria_producto" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_9">
						<td id="td_title-id_bodega_defecto" class="titulocampo">
							<label class="form-label">Bodega Defecto.(*)</label>
						</td>
						<td id="td_control-id_bodega_defecto" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_bodega_defecto" name="form-id_bodega_defecto" title="Bodega Defecto" ></select></td>
									<td><a><img id="form-id_bodega_defecto_img" name="form-id_bodega_defecto_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_bodega_defecto_img_busqueda" name="form-id_bodega_defecto_img_busqueda" title="Buscar Bodega" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_bodega_defecto" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-id_unidad_compra" class="titulocampo">
							<label class="form-label">Unidad Compra.(*)</label>
						</td>
						<td id="td_control-id_unidad_compra" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_unidad_compra" name="form-id_unidad_compra" title="Unidad Compra" ></select></td>
									<td><a><img id="form-id_unidad_compra_img" name="form-id_unidad_compra_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_unidad_compra_img_busqueda" name="form-id_unidad_compra_img_busqueda" title="Buscar Unidad" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_unidad_compra" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_10">
						<td id="td_title-equivalencia_compra" class="titulocampo">
							<label class="form-label">Equivalencia En Compra.(*)</label>
						</td>
						<td id="td_control-equivalencia_compra" align="left" class="controlcampo">
							<input id="form-equivalencia_compra" name="form-equivalencia_compra" type="text" class="form-control"  placeholder="Equivalencia En Compra"  title="Equivalencia En Compra"    maxlength="18" size="12" >
							<span id="spanstrMensajeequivalencia_compra" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-id_unidad_venta" class="titulocampo">
							<label class="form-label">Unidad Venta.(*)</label>
						</td>
						<td id="td_control-id_unidad_venta" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_unidad_venta" name="form-id_unidad_venta" title="Unidad Venta" ></select></td>
									<td><a><img id="form-id_unidad_venta_img" name="form-id_unidad_venta_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_unidad_venta_img_busqueda" name="form-id_unidad_venta_img_busqueda" title="Buscar Unidad" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_unidad_venta" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_11">
						<td id="td_title-equivalencia_venta" class="titulocampo">
							<label class="form-label">Equivalencia En Venta.(*)</label>
						</td>
						<td id="td_control-equivalencia_venta" align="left" class="controlcampo">
							<input id="form-equivalencia_venta" name="form-equivalencia_venta" type="text" class="form-control"  placeholder="Equivalencia En Venta"  title="Equivalencia En Venta"    maxlength="18" size="12" >
							<span id="spanstrMensajeequivalencia_venta" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-descripcion" class="titulocampo">
							<label class="form-label">Descripcion</label>
						</td>
						<td id="td_control-descripcion" align="left" class="controlcampo">
							<textarea id="form-descripcion" name="form-descripcion" class="form-control"  placeholder="Descripcion"  title="Descripcion"   style="font-size: 13px;"  rows ="0" cols= "25"></textarea>
							<span id="spanstrMensajedescripcion" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_12">
						<td id="td_title-codigo_fabricante" class="titulocampo">
							<label class="form-label">Codigo Fabricante</label>
						</td>
						<td id="td_control-codigo_fabricante" align="left" class="controlcampo">
							<input id="form-codigo_fabricante" name="form-codigo_fabricante" type="text" class="form-control"  placeholder="Codigo Fabricante"  title="Codigo Fabricante"    size="20"  maxlength="24"/>
							<span id="spanstrMensajecodigo_fabricante" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-acepta_lote" class="titulocampo">
							<label class="form-label">Acepta Lote</label>
						</td>
						<td id="td_control-acepta_lote" align="left" class="controlcampo">
							<input id="form-acepta_lote" name="form-acepta_lote" type="checkbox" >
							<span id="spanstrMensajeacepta_lote" class="mensajeerror"></span>
						</td>
					</tr>
				</table>
			</div>
				</td></tr>
					<tr id="trproductogeneralElementos">
						<td id="tdproductogeneralElementos"  colspan="4">
			<div id="general">
				<table class="elementos" style="width:400px;text-align:left; padding: 0px; border-spacing: 0px; border-collapse: collapse;">
					<caption class="busquedacabecera"><span>GENERAL</span></caption>
					
						<td id="td_title-imagen" class="titulocampo">
							<label class="form-label">Imagen</label>
						</td>
						<td id="td_control-imagen" align="left" class="controlcampo">
							<textarea id="form-imagen" name="form-imagen" class="form-control"  placeholder="Imagen"  title="Imagen"   style="font-size: 13px;"  rows ="0" cols= "25"></textarea>
							<span id="spanstrMensajeimagen" class="mensajeerror"></span>
						</td>
					
					<tr id="tr_fila_1">
						<td id="td_title-observacion" class="titulocampo">
							<label class="form-label">Observacion</label>
						</td>
						<td id="td_control-observacion" align="left" class="controlcampo">
							<textarea id="form-observacion" name="form-observacion" class="form-control"  placeholder="Observacion"  title="Observacion"   style="font-size: 13px;"  rows ="0" cols= "25"></textarea>
							<span id="spanstrMensajeobservacion" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_2">
						<td id="td_title-comenta_factura" class="titulocampo">
							<label class="form-label">Comenta Factura</label>
						</td>
						<td id="td_control-comenta_factura" align="left" class="controlcampo">
							<input id="form-comenta_factura" name="form-comenta_factura" type="checkbox" >
							<span id="spanstrMensajecomenta_factura" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_3">
						<td id="td_title-cantidad" class="titulocampo">
							<label class="form-label">Cantidad</label>
						</td>
						<td id="td_control-cantidad" align="left" class="controlcampo">
							<input id="form-cantidad" name="form-cantidad" type="text" class="form-control"  placeholder="Cantidad"  title="Cantidad"    maxlength="18" size="12" >
							<span id="spanstrMensajecantidad" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_4">
						<td id="td_title-cantidad_minima" class="titulocampo">
							<label class="form-label">Cantidad Minima.(*)</label>
						</td>
						<td id="td_control-cantidad_minima" align="left" class="controlcampo">
							<input id="form-cantidad_minima" name="form-cantidad_minima" type="text" class="form-control"  placeholder="Cantidad Minima"  title="Cantidad Minima"    maxlength="18" size="12" >
							<span id="spanstrMensajecantidad_minima" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_5">
						<td id="td_title-cantidad_maxima" class="titulocampo">
							<label class="form-label">Cantidad Maxima.(*)</label>
						</td>
						<td id="td_control-cantidad_maxima" align="left" class="controlcampo">
							<input id="form-cantidad_maxima" name="form-cantidad_maxima" type="text" class="form-control"  placeholder="Cantidad Maxima"  title="Cantidad Maxima"    maxlength="18" size="12" >
							<span id="spanstrMensajecantidad_maxima" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_6">
						<td id="td_title-factura_sin_stock" class="titulocampo">
							<label class="form-label">Factura Sin Stock</label>
						</td>
						<td id="td_control-factura_sin_stock" align="left" class="controlcampo">
							<input id="form-factura_sin_stock" name="form-factura_sin_stock" type="checkbox" >
							<span id="spanstrMensajefactura_sin_stock" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_7">
						<td id="td_title-mostrar_componente" class="titulocampo">
							<label class="form-label">Mostrar Componente</label>
						</td>
						<td id="td_control-mostrar_componente" align="left" class="controlcampo">
							<input id="form-mostrar_componente" name="form-mostrar_componente" type="checkbox" >
							<span id="spanstrMensajemostrar_componente" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_8">
						<td id="td_title-producto_equivalente" class="titulocampo">
							<label class="form-label">Producto Equivalente</label>
						</td>
						<td id="td_control-producto_equivalente" align="left" class="controlcampo">
							<input id="form-producto_equivalente" name="form-producto_equivalente" type="checkbox" >
							<span id="spanstrMensajeproducto_equivalente" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_9">
						<td id="td_title-avisa_expiracion" class="titulocampo">
							<label class="form-label">Avisa Expiracion</label>
						</td>
						<td id="td_control-avisa_expiracion" align="left" class="controlcampo">
							<input id="form-avisa_expiracion" name="form-avisa_expiracion" type="checkbox" >
							<span id="spanstrMensajeavisa_expiracion" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_10">
						<td id="td_title-requiere_serie" class="titulocampo">
							<label class="form-label">Requiere No Serie</label>
						</td>
						<td id="td_control-requiere_serie" align="left" class="controlcampo">
							<input id="form-requiere_serie" name="form-requiere_serie" type="checkbox" >
							<span id="spanstrMensajerequiere_serie" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_11">
						<td id="td_title-id_cuenta_venta" class="titulocampo">
							<label class="form-label">Cuenta Venta/Ingresos</label>
						</td>
						<td id="td_control-id_cuenta_venta" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_cuenta_venta" name="form-id_cuenta_venta" title="Cuenta Venta/Ingresos" ></select></td>
									<td><a><img id="form-id_cuenta_venta_img" name="form-id_cuenta_venta_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_cuenta_venta_img_busqueda" name="form-id_cuenta_venta_img_busqueda" title="Buscar Cuentas" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_cuenta_venta" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_12">
						<td id="td_title-id_cuenta_compra" class="titulocampo">
							<label class="form-label">Cuenta Compra/Activo/Inventario</label>
						</td>
						<td id="td_control-id_cuenta_compra" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_cuenta_compra" name="form-id_cuenta_compra" title="Cuenta Compra/Activo/Inventario" ></select></td>
									<td><a><img id="form-id_cuenta_compra_img" name="form-id_cuenta_compra_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_cuenta_compra_img_busqueda" name="form-id_cuenta_compra_img_busqueda" title="Buscar Cuentas" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_cuenta_compra" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_13">
						<td id="td_title-id_cuenta_costo" class="titulocampo">
							<label class="form-label">Cuenta Costo</label>
						</td>
						<td id="td_control-id_cuenta_costo" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_cuenta_costo" name="form-id_cuenta_costo" title="Cuenta Costo" ></select></td>
									<td><a><img id="form-id_cuenta_costo_img" name="form-id_cuenta_costo_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_cuenta_costo_img_busqueda" name="form-id_cuenta_costo_img_busqueda" title="Buscar Cuentas" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_cuenta_costo" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_14">
						<td id="td_title-valor_inventario" class="titulocampo">
							<label class="form-label">Valor Inventario.(*)</label>
						</td>
						<td id="td_control-valor_inventario" align="left" class="controlcampo">
							<input id="form-valor_inventario" name="form-valor_inventario" type="text" class="form-control"  placeholder="Valor Inventario"  title="Valor Inventario"    maxlength="18" size="12" >
							<span id="spanstrMensajevalor_inventario" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_15">
						<td id="td_title-producto_fisico" class="titulocampo">
							<label class="form-label">Producto Fisico.(*)</label>
						</td>
						<td id="td_control-producto_fisico" align="left" class="controlcampo">
							<input id="form-producto_fisico" name="form-producto_fisico" type="text" class="form-control"  placeholder="Producto Fisico"  title="Producto Fisico"    maxlength="10" size="10" >
							<span id="spanstrMensajeproducto_fisico" class="mensajeerror"></span>
						</td>
					</tr>
				</table>
			</div>
				</td></tr>
				</table> <!-- tblElementosproducto -->
				</div>

				<!-- SECCION/OCULTOS -->
				<table id="tblCamposOcultosproducto" class="elementos" style="display: table-row;">
					<caption class="busquedacabecera">
						<span>Campos Ocultos</span>
					</caption>
					
						<td id="td_title-id_empresa" class="titulocampo">
							<label class="form-label">Empresa.(*)</label>
						</td>
						<td id="td_control-id_empresa" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_empresa" name="form-id_empresa" title="Empresa" ></select></td>
									<td><a><img id="form-id_empresa_img" name="form-id_empresa_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_empresa_img_busqueda" name="form-id_empresa_img_busqueda" title="Buscar Empresa" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_empresa" class="mensajeerror"></span>
						</td>
					
					<tr id="tr_fila_1">
						<td id="td_title-ultima_venta" class="titulocampo">
							<label class="form-label">Ultima Venta.(*)</label>
						</td>
						<td id="td_control-ultima_venta" align="left" class="controlcampo">
							<input id="form-ultima_venta" name="form-ultima_venta" type="text" class="form-control"  placeholder="Ultima Venta"  title="Ultima Venta"    size="10" >
							<span id="spanstrMensajeultima_venta" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-precio_actualizado" class="titulocampo">
							<label class="form-label">Precio Actualizado.(*)</label>
						</td>
						<td id="td_control-precio_actualizado" align="left" class="controlcampo">
							<input id="form-precio_actualizado" name="form-precio_actualizado" type="text" class="form-control"  placeholder="Precio Actualizado"  title="Precio Actualizado"    size="10" >
							<span id="spanstrMensajeprecio_actualizado" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_2">
						<td id="td_title-id_retencion" class="titulocampo">
							<label class="form-label">Retencione</label>
						</td>
						<td id="td_control-id_retencion" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_retencion" name="form-id_retencion" title="Retencione" ></select></td>
									<td><a><img id="form-id_retencion_img" name="form-id_retencion_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_retencion_img_busqueda" name="form-id_retencion_img_busqueda" title="Buscar Retencion" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_retencion" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-retencion_ventas" class="titulocampo">
							<label class="form-label">Retencion Ventas</label>
						</td>
						<td id="td_control-retencion_ventas" align="left" class="controlcampo">
							<input id="form-retencion_ventas" name="form-retencion_ventas" type="checkbox" >
							<span id="spanstrMensajeretencion_ventas" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_3">
						<td id="td_title-retencion_compras" class="titulocampo">
							<label class="form-label">Retencion Compras</label>
						</td>
						<td id="td_control-retencion_compras" align="left" class="controlcampo">
							<input id="form-retencion_compras" name="form-retencion_compras" type="checkbox" >
							<span id="spanstrMensajeretencion_compras" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-factura_con_precio" class="titulocampo">
							<label class="form-label">Factura Con Precio.(*)</label>
						</td>
						<td id="td_control-factura_con_precio" align="left" class="controlcampo">
							<input id="form-factura_con_precio" name="form-factura_con_precio" type="text" class="form-control"  placeholder="Factura Con Precio"  title="Factura Con Precio"    maxlength="10" size="10" >
							<span id="spanstrMensajefactura_con_precio" class="mensajeerror"></span>
						</td>
					</tr>
				</table> <!-- tblCamposOcultosproducto -->

			</td></tr> <!-- trproductoElementos -->
			</table> <!-- tblproductoElementos -->
			</form> <!-- frmMantenimientoproducto -->


			

				<form id="frmAccionesMantenimientoproducto" name="frmAccionesMantenimientoproducto">

			<?php if(producto_web::$STR_ES_BUSQUEDA=='false' ) {?>
			<table id="tblproductoAcciones" class="elementos" style="text-align: center">
		<tr id="trproductoAcciones" class="elementos" style="display:table-row">
			<td align="center">
				<a id="Acciones" ></a>

				<?php if(producto_web::$STR_ES_RELACIONES=='false' ) {?>
				<div align="right">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
				<?php } ?>

					<!-- SECCION/BOTONES -->
					<table id="tblAccionesMantenimientoproducto" class="busqueda" style="width: 50%;text-align: left">

						<?php if(producto_web::$STR_ES_RELACIONES=='false' ) {?>
						<!--
						<caption class="busquedacabecera">
							<span>Acciones</span>
						</caption>
						-->
						<?php } ?>

						<tr id="trAccionesMantenimientoproductoBasicos">
							<td id="tdbtnNuevoproducto" style="visibility:visible">
								<div id="divNuevoproducto" style="display:table-row">
									<input type="button" id="btnNuevoproducto" name="btnNuevoproducto" value="NUEVO" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnActualizarproducto" style="visibility:visible">
								<div id="divActualizarproducto" style="display:table-row">
									<input type="button" id="btnActualizarproducto" name="btnActualizarproducto" title="ACTUALIZAR Producto ACTUAL" value="Actualizar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnEliminarproducto" style="visibility:visible">
								<div id="divEliminarproducto" style="display:table-row">
									<input type="button" id="btnEliminarproducto" name="btnEliminarproducto" title="ELIMINAR Producto ACTUAL" value="Eliminar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnImprimirproducto" style="visibility:visible">
								<input type="button" id="btnImprimirproducto" name="btnImprimirproducto" title="IMPRIMIR PAGINA Producto ACTUAL" value="Imp. Datos" class="btn btn-primary"/>
							</td>
							<td id="tdbtnCancelarproducto" style="visibility:visible">
								<input type="button" id="btnCancelarproducto" name="btnCancelarproducto" title="CANCELAR Producto ACTUAL" value="Cancelar" class="btn btn-primary"/>
							</td>
						</tr>
						<tr id="trAccionesMantenimientoproductoGuardar" style="display:none">
							<td id="tdbtnGuardarCambiosproducto" colspan="4" align="center" style="visibility:visible">
								<div id="divGuardarCambiosproducto" style="display:table-row">
									<input type="button" id="btnGuardarCambiosFormularioproducto" name="btnGuardarCambiosFormularioproducto" title="GUARDAR" value="GUADAR CAMBIOS" class="btn btn-primary"/>
								</div>
							</td>
						</tr>
					</table> <!-- tblAccionesMantenimientoproducto -->
			</td>
		</tr> <!-- trproductoAcciones -->
		<?php if(producto_web::$STR_ES_RELACIONADO=='false' ) {?>
		<tr id="trproductoParametrosAcciones" class="impresion"  style="display:table-row">
			<td align="center">
				<!-- SECCION/POST -->
				<table id="tblproductoParametrosAcciones" style="text-align: center;border: 0px solid black;padding: 0px; border-spacing: 0px">
					<caption class="busquedacabecera" style="padding: 0px;caption-side: top;">
						<span>Acciones Extra/Post</span>
					</caption>
					<tr id="trproductoFilaParametrosAcciones">
						<td>
							<select id="ParamsPostAccion-cmbTiposRelacionesFormulario" name="ParamsPostAccion-cmbTiposRelacionesFormulario" title="TIPOS DE RELACIONES" style="width:200px"></select>
						</td>
						<td>
							<select id="ParamsPostAccion-cmbAccionesFormulario" name="ParamsPostAccion-cmbAccionesFormulario" title="TIPOS DE ACCIONES" style="width:200px"></select>
						</td>
						<td>
							<label>
								<input id="ParamsPostAccion-chbPostAccionNuevo" name="ParamsPostAccion-chbPostAccionNuevo" title="OTRO NUEVO REGISTRO" type="checkbox">Nuevo
							</label>
						</td>
						<td>
							<label>
								<input id="ParamsPostAccion-chbPostAccionSinCerrar" name="ParamsPostAccion-chbPostAccionSinCerrar" title="SIN CERRAR FORMULARIO" type="checkbox">Sin Cerrar
							</label>
						</td>
						<td>
							<label>
								<input id="ParamsPostAccion-chbPostAccionSinMensaje" name="ParamsPostAccion-chbPostAccionSinMensaje" title="SIN MENSAJE CONFIRMACION" type="checkbox">Sin Mensaje
							</label>
						</td>
					</tr>
				</table> <!-- tblproductoParametrosAcciones -->
			</td>
		</tr> <!-- trproductoParametrosAcciones -->
		<?php }?>
		<tr id="trproductoMensajes" class="mensajes">
			<td align="center">
				<a id="Mensajes"></a>
			</td>
		</tr> <!-- trproductoMensajes -->
			</table> <!-- tblproductoAcciones -->
			<?php } ?>
			</form> <!-- frmMantenimientoproducto -->
			</div> <!-- divMantenimientoproductoAjaxWebPart -->
		</td>
	</tr> <!-- trproductoElementosFormulario/super -->
		<?php if(producto_web::$STR_ES_RELACIONADO=='false' ) {?>

		<tr><td>
		</td></tr>
		<?php }?>
			
			
		
		
		
		
		
		
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
			
				import {producto_webcontrol,producto_webcontrol1} from './webroot/js/JavaScript/contabilidad/inventario/producto/js/webcontrol/producto_form_webcontrol.js?random=1';
				
				producto_webcontrol1.setproducto_constante(window.producto_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(producto_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

