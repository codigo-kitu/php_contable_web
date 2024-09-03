<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\inventario\producto_bodega\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Producto Bodega Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/inventario/producto_bodega/util/producto_bodega_carga.php');
	use com\bydan\contabilidad\inventario\producto_bodega\util\producto_bodega_carga;
	
	//include_once('com/bydan/contabilidad/inventario/producto_bodega/presentation/view/producto_bodega_web.php');
	//use com\bydan\contabilidad\inventario\producto_bodega\presentation\view\producto_bodega_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	producto_bodega_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	producto_bodega_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$producto_bodega_web1= new producto_bodega_web();	
	$producto_bodega_web1->cargarDatosGenerales();
	
	//$moduloActual=$producto_bodega_web1->moduloActual;
	//$usuarioActual=$producto_bodega_web1->usuarioActual;
	//$sessionBase=$producto_bodega_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$producto_bodega_web1->parametroGeneralUsuarioActual;
	
	
		
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
		
		
			<script type="module" src="webroot/js/JavaScript/contabilidad/inventario/producto_bodega/js/util/producto_bodega_form_funcion.js?random=1"></script>
						
		
		
		<?php 
			
		
			producto_bodega_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					producto_bodega_web::$GET_POST=$_GET;
				} else {
					producto_bodega_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			producto_bodega_web::$STR_NOMBRE_PAGINA = 'producto_bodega_form_view.php';
			producto_bodega_web::$BIT_ES_PAGINA_PRINCIPAL = 'false';
			producto_bodega_web::$BIT_ES_PAGINA_FORM = 'true';
				
			producto_bodega_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {producto_bodega_constante,producto_bodega_constante1} from './webroot/js/JavaScript/contabilidad/inventario/producto_bodega/js/util/producto_bodega_constante.js?random=1';
			import {producto_bodega_funcion,producto_bodega_funcion1} from './webroot/js/JavaScript/contabilidad/inventario/producto_bodega/js/util/producto_bodega_funcion.js?random=1';
			
			let producto_bodega_constante2 = new producto_bodega_constante();
			
			producto_bodega_constante2.STR_NOMBRE_PAGINA="<?php echo(producto_bodega_web::$STR_NOMBRE_PAGINA); ?>";
			producto_bodega_constante2.STR_TYPE_ON_LOADproducto_bodega="<?php echo(producto_bodega_web::$STR_TYPE_ONLOAD); ?>";
			producto_bodega_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(producto_bodega_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			producto_bodega_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(producto_bodega_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			producto_bodega_constante2.STR_ACTION="<?php echo(producto_bodega_web::$STR_ACTION); ?>";
			producto_bodega_constante2.STR_ES_POPUP="<?php echo(producto_bodega_web::$STR_ES_POPUP); ?>";
			producto_bodega_constante2.STR_ES_BUSQUEDA="<?php echo(producto_bodega_web::$STR_ES_BUSQUEDA); ?>";
			producto_bodega_constante2.STR_FUNCION_JS="<?php echo(producto_bodega_web::$STR_FUNCION_JS); ?>";
			producto_bodega_constante2.BIG_ID_ACTUAL="<?php echo(producto_bodega_web::$BIG_ID_ACTUAL); ?>";
			producto_bodega_constante2.BIG_ID_OPCION="<?php echo(producto_bodega_web::$BIG_ID_OPCION); ?>";
			producto_bodega_constante2.STR_OBJETO_JS="<?php echo(producto_bodega_web::$STR_OBJETO_JS); ?>";
			producto_bodega_constante2.STR_ES_RELACIONES="<?php echo(producto_bodega_web::$STR_ES_RELACIONES); ?>";
			producto_bodega_constante2.STR_ES_RELACIONADO="<?php echo(producto_bodega_web::$STR_ES_RELACIONADO); ?>";
			producto_bodega_constante2.STR_ES_SUB_PAGINA="<?php echo(producto_bodega_web::$STR_ES_SUB_PAGINA); ?>";
			producto_bodega_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(producto_bodega_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			producto_bodega_constante2.BIT_ES_PAGINA_FORM=<?php echo(producto_bodega_web::$BIT_ES_PAGINA_FORM); ?>;
			producto_bodega_constante2.STR_SUFIJO="<?php echo(producto_bodega_web::$STR_SUF); ?>";//producto_bodega
			producto_bodega_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(producto_bodega_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//producto_bodega
			
			producto_bodega_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(producto_bodega_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			producto_bodega_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($producto_bodega_web1->moduloActual->getnombre()); ?>";
			producto_bodega_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(producto_bodega_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			producto_bodega_constante2.BIT_ES_LOAD_NORMAL=true;
			/*producto_bodega_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			producto_bodega_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.producto_bodega_constante2 = producto_bodega_constante2;
			
		</script>
		
		<?php if(producto_bodega_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.producto_bodega_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.producto_bodega_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="producto_bodegaActual" ></a>
	
	<div id="divResumenproducto_bodegaActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(producto_bodega_web::$STR_ES_RELACIONADO=='false') {?>
		
		<div id="header" >
		
			<div id="banner">
				<span id="spanTituloBanner" class="titulobanner"></span>
			</div> <!-- banner -->
					
			<div id="subheader" class="links">  
			
						
			</div> <!-- sub-header -->
			
			
		</div> <!-- header -->
		
		<?php } ?>
		
		<div id="main">
		

			<?php if(producto_bodega_web::$STR_ES_RELACIONADO=='false') {?>
			
			
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(producto_bodega_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(producto_bodega_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divproducto_bodegaPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblproducto_bodegaPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmproducto_bodegaAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnproducto_bodegaAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="producto_bodega_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnproducto_bodegaAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmproducto_bodegaAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblproducto_bodegaPopupAjaxWebPart -->
		</div> <!-- divproducto_bodegaPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->		
		
		
		
			
<tr id="trproducto_bodegaElementosFormulario">
	<td>
		<div id="divMantenimientoproducto_bodegaAjaxWebPart" title="PRODUCTO BODEGA" style="height: 90%;width: 90%;position: relative;top: 30px;left: 30px;">
			<form id="frmMantenimientoproducto_bodega" name="frmMantenimientoproducto_bodega">

			</br>

			<?php if(producto_bodega_web::$STR_ES_RELACIONES=='false' ) {?>
			</br>
			<?php } ?>

			<!-- SECCION/TOOLBAR -->
			<table id="tblproducto_bodegaToolBarFormularioExterior" style="width: 65%">
				<tr style="display:table-row">
					<td align="center">

						<table id="tblproducto_bodegaToolBarFormulario" style="text-align: center"  style="display:table-row">
							<tr>
								<td id="tdproducto_bodegaActualizarToolBar" style="visibility:visible">
									<img id="imgActualizarToolBarproducto_bodega" name="imgActualizarToolBarproducto_bodega" title="ACTUALIZAR Producto Bodega ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/actualizar.gif" width="25" height="25"/>
								</td>
								<td id="tdproducto_bodegaEliminarToolBar" style="visibility:visible">
									<img id="imgEliminarToolBarproducto_bodega" name="imgEliminarToolBarproducto_bodega" title="ELIMINAR Producto Bodega ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/eliminar.gif" width="25" height="25"/>
								</td>
								<td id="tdproducto_bodegaCancelarToolBar" style="visibility:visible">
									<img id="imgCancelarToolBarproducto_bodega" name="imgCancelarToolBarproducto_bodega" title="CANCELAR Producto Bodega ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/cancelar.gif" width="25" height="25"/>
								</td>
								<td id="tdproducto_bodegaRelacionesToolBar" style="display:table-row">
									<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/xexpand.png" width="25" height="25" onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('tblCamposOcultosproducto_bodega',this,'../')"/>
								</td>
							</tr>
						</table> <!-- tblproducto_bodegaToolBarFormulario -->

					</td>
				</tr>
			</table> <!-- tblproducto_bodegaToolBarFormularioExterior -->

			<table id="tblproducto_bodegaElementos">
			<tr id="trproducto_bodegaElementos" class="elementos" style="display:table-row">
			<td align="center">

			<a id="Campos"></a>

				<?php if(producto_bodega_web::$STR_ES_RELACIONES=='false' ) {?>
				<div id="divFlechaArribaElementos" align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
					<span></span>
				</div>
				<?php } ?>

				<!-- SECCION/FORMULARIO -->
				<table id="tblElementosproducto_bodega" class="elementos" style="width: 300px; padding: 0px; border-spacing: 0px; border-collapse: collapse; text-align: center;">
					<tr id="tr_fila_1">
						<td id="td_title-id" class="titulocampo">
							<label class="form-label">Cod. Único</label>
						</td>
						<td id="td_control-id" align="left">
							<input id="form-id" name="form-id" type="text" class="form-control" readonly size="10">
						</td>
					</tr>
					<tr id="tr_fila_2">
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
					<tr id="tr_fila_3">
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
					<tr id="tr_fila_4">
						<td id="td_title-id_bodega" class="titulocampo">
							<label class="form-label">Bodega.(*)</label>
						</td>
						<td id="td_control-id_bodega" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_bodega" name="form-id_bodega" title="Bodega" ></select></td>
									<td><a><img id="form-id_bodega_img" name="form-id_bodega_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_bodega_img_busqueda" name="form-id_bodega_img_busqueda" title="Buscar Bodega" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_bodega" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_5">
						<td id="td_title-id_producto" class="titulocampo">
							<label class="form-label">Producto.(*)</label>
						</td>
						<td id="td_control-id_producto" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_producto" name="form-id_producto" title="Producto" ></select></td>
									<td><a><img id="form-id_producto_img" name="form-id_producto_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_producto_img_busqueda" name="form-id_producto_img_busqueda" title="Buscar Producto" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_producto" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_6">
						<td id="td_title-cantidad" class="titulocampo">
							<label class="form-label">Cantidad.(*)</label>
						</td>
						<td id="td_control-cantidad" align="left" class="controlcampo">
							<input id="form-cantidad" name="form-cantidad" type="text" class="form-control"  placeholder="Cantidad"  title="Cantidad"    maxlength="18" size="12" >
							<span id="spanstrMensajecantidad" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_7">
						<td id="td_title-costo" class="titulocampo">
							<label class="form-label">Costo.(*)</label>
						</td>
						<td id="td_control-costo" align="left" class="controlcampo">
							<input id="form-costo" name="form-costo" type="text" class="form-control"  placeholder="Costo"  title="Costo"    maxlength="18" size="12" >
							<span id="spanstrMensajecosto" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_8">
						<td id="td_title-ubicacion" class="titulocampo">
							<label class="form-label">Ubicacion</label>
						</td>
						<td id="td_control-ubicacion" align="left" class="controlcampo">
							<input id="form-ubicacion" name="form-ubicacion" type="text" class="form-control"  placeholder="Ubicacion"  title="Ubicacion"    size="20"  maxlength="30"/>
							<span id="spanstrMensajeubicacion" class="mensajeerror"></span>
						</td>
					</tr>
				</table> <!-- tblElementosproducto_bodega -->

				<!-- SECCION/OCULTOS -->
				<table id="tblCamposOcultosproducto_bodega" class="elementos" style="display: table-row;">
					<caption class="busquedacabecera">
						<span>Campos Ocultos</span>
					</caption>
				</table> <!-- tblCamposOcultosproducto_bodega -->

			</td></tr> <!-- trproducto_bodegaElementos -->
			</table> <!-- tblproducto_bodegaElementos -->
			</form> <!-- frmMantenimientoproducto_bodega -->


			

				<form id="frmAccionesMantenimientoproducto_bodega" name="frmAccionesMantenimientoproducto_bodega">

			<?php if(producto_bodega_web::$STR_ES_BUSQUEDA=='false' ) {?>
			<table id="tblproducto_bodegaAcciones" class="elementos" style="text-align: center">
		<tr id="trproducto_bodegaAcciones" class="elementos" style="display:table-row">
			<td align="center">
				<a id="Acciones" ></a>

				<?php if(producto_bodega_web::$STR_ES_RELACIONES=='false' ) {?>
				<div align="right">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
				<?php } ?>

					<!-- SECCION/BOTONES -->
					<table id="tblAccionesMantenimientoproducto_bodega" class="busqueda" style="width: 50%;text-align: center">

						<?php if(producto_bodega_web::$STR_ES_RELACIONES=='false' ) {?>
						<!--
						<caption class="busquedacabecera">
							<span>Acciones</span>
						</caption>
						-->
						<?php } ?>

						<tr id="trAccionesMantenimientoproducto_bodegaBasicos">
							<td id="tdbtnNuevoproducto_bodega" style="visibility:visible">
								<div id="divNuevoproducto_bodega" style="display:table-row">
									<input type="button" id="btnNuevoproducto_bodega" name="btnNuevoproducto_bodega" value="NUEVO" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnActualizarproducto_bodega" style="visibility:visible">
								<div id="divActualizarproducto_bodega" style="display:table-row">
									<input type="button" id="btnActualizarproducto_bodega" name="btnActualizarproducto_bodega" title="ACTUALIZAR Producto Bodega ACTUAL" value="Actualizar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnEliminarproducto_bodega" style="visibility:visible">
								<div id="divEliminarproducto_bodega" style="display:table-row">
									<input type="button" id="btnEliminarproducto_bodega" name="btnEliminarproducto_bodega" title="ELIMINAR Producto Bodega ACTUAL" value="Eliminar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnImprimirproducto_bodega" style="visibility:visible">
								<input type="button" id="btnImprimirproducto_bodega" name="btnImprimirproducto_bodega" title="IMPRIMIR PAGINA Producto Bodega ACTUAL" value="Imp. Datos" class="btn btn-primary"/>
							</td>
							<td id="tdbtnCancelarproducto_bodega" style="visibility:visible">
								<input type="button" id="btnCancelarproducto_bodega" name="btnCancelarproducto_bodega" title="CANCELAR Producto Bodega ACTUAL" value="Cancelar" class="btn btn-primary"/>
							</td>
						</tr>
						<tr id="trAccionesMantenimientoproducto_bodegaGuardar" style="display:none">
							<td id="tdbtnGuardarCambiosproducto_bodega" colspan="4" align="center" style="visibility:visible">
								<div id="divGuardarCambiosproducto_bodega" style="display:table-row">
									<input type="button" id="btnGuardarCambiosFormularioproducto_bodega" name="btnGuardarCambiosFormularioproducto_bodega" title="GUARDAR" value="GUADAR CAMBIOS" class="btn btn-primary"/>
								</div>
							</td>
						</tr>
					</table> <!-- tblAccionesMantenimientoproducto_bodega -->
			</td>
		</tr> <!-- trproducto_bodegaAcciones -->
		<?php if(producto_bodega_web::$STR_ES_RELACIONADO=='false' ) {?>
		<tr id="trproducto_bodegaParametrosAcciones" class="impresion"  style="display:table-row">
			<td align="center">
				<!-- SECCION/POST -->
				<table id="tblproducto_bodegaParametrosAcciones" style="text-align: center;border: 0px solid black;padding: 0px; border-spacing: 0px">
					<caption class="busquedacabecera" style="padding: 0px;caption-side: top;">
						<span>Acciones Extra/Post</span>
					</caption>
					<tr id="trproducto_bodegaFilaParametrosAcciones">
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
				</table> <!-- tblproducto_bodegaParametrosAcciones -->
			</td>
		</tr> <!-- trproducto_bodegaParametrosAcciones -->
		<?php }?>
		<tr id="trproducto_bodegaMensajes" class="mensajes">
			<td align="center">
				<a id="Mensajes"></a>
			</td>
		</tr> <!-- trproducto_bodegaMensajes -->
			</table> <!-- tblproducto_bodegaAcciones -->
			<?php } ?>
			</form> <!-- frmMantenimientoproducto_bodega -->
			</div> <!-- divMantenimientoproducto_bodegaAjaxWebPart -->
		</td>
	</tr> <!-- trproducto_bodegaElementosFormulario/super -->
		<?php if(producto_bodega_web::$STR_ES_RELACIONADO=='false' ) {?>

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
			
				import {producto_bodega_webcontrol,producto_bodega_webcontrol1} from './webroot/js/JavaScript/contabilidad/inventario/producto_bodega/js/webcontrol/producto_bodega_form_webcontrol.js?random=1';
				
				producto_bodega_webcontrol1.setproducto_bodega_constante(window.producto_bodega_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(producto_bodega_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

