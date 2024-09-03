<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\inventario\imagen_orden_compra\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Imagenes Orden Compra Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/inventario/imagen_orden_compra/util/imagen_orden_compra_carga.php');
	use com\bydan\contabilidad\inventario\imagen_orden_compra\util\imagen_orden_compra_carga;
	
	//include_once('com/bydan/contabilidad/inventario/imagen_orden_compra/presentation/view/imagen_orden_compra_web.php');
	//use com\bydan\contabilidad\inventario\imagen_orden_compra\presentation\view\imagen_orden_compra_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	imagen_orden_compra_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	imagen_orden_compra_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$imagen_orden_compra_web1= new imagen_orden_compra_web();	
	$imagen_orden_compra_web1->cargarDatosGenerales();
	
	//$moduloActual=$imagen_orden_compra_web1->moduloActual;
	//$usuarioActual=$imagen_orden_compra_web1->usuarioActual;
	//$sessionBase=$imagen_orden_compra_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$imagen_orden_compra_web1->parametroGeneralUsuarioActual;
	
	
		
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
		
		
			<script type="module" src="webroot/js/JavaScript/contabilidad/inventario/imagen_orden_compra/js/util/imagen_orden_compra_form_funcion.js?random=1"></script>
						
		
		
		<?php 
			
		
			imagen_orden_compra_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					imagen_orden_compra_web::$GET_POST=$_GET;
				} else {
					imagen_orden_compra_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			imagen_orden_compra_web::$STR_NOMBRE_PAGINA = 'imagen_orden_compra_form_view.php';
			imagen_orden_compra_web::$BIT_ES_PAGINA_PRINCIPAL = 'false';
			imagen_orden_compra_web::$BIT_ES_PAGINA_FORM = 'true';
				
			imagen_orden_compra_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {imagen_orden_compra_constante,imagen_orden_compra_constante1} from './webroot/js/JavaScript/contabilidad/inventario/imagen_orden_compra/js/util/imagen_orden_compra_constante.js?random=1';
			import {imagen_orden_compra_funcion,imagen_orden_compra_funcion1} from './webroot/js/JavaScript/contabilidad/inventario/imagen_orden_compra/js/util/imagen_orden_compra_funcion.js?random=1';
			
			let imagen_orden_compra_constante2 = new imagen_orden_compra_constante();
			
			imagen_orden_compra_constante2.STR_NOMBRE_PAGINA="<?php echo(imagen_orden_compra_web::$STR_NOMBRE_PAGINA); ?>";
			imagen_orden_compra_constante2.STR_TYPE_ON_LOADimagen_orden_compra="<?php echo(imagen_orden_compra_web::$STR_TYPE_ONLOAD); ?>";
			imagen_orden_compra_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(imagen_orden_compra_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			imagen_orden_compra_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(imagen_orden_compra_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			imagen_orden_compra_constante2.STR_ACTION="<?php echo(imagen_orden_compra_web::$STR_ACTION); ?>";
			imagen_orden_compra_constante2.STR_ES_POPUP="<?php echo(imagen_orden_compra_web::$STR_ES_POPUP); ?>";
			imagen_orden_compra_constante2.STR_ES_BUSQUEDA="<?php echo(imagen_orden_compra_web::$STR_ES_BUSQUEDA); ?>";
			imagen_orden_compra_constante2.STR_FUNCION_JS="<?php echo(imagen_orden_compra_web::$STR_FUNCION_JS); ?>";
			imagen_orden_compra_constante2.BIG_ID_ACTUAL="<?php echo(imagen_orden_compra_web::$BIG_ID_ACTUAL); ?>";
			imagen_orden_compra_constante2.BIG_ID_OPCION="<?php echo(imagen_orden_compra_web::$BIG_ID_OPCION); ?>";
			imagen_orden_compra_constante2.STR_OBJETO_JS="<?php echo(imagen_orden_compra_web::$STR_OBJETO_JS); ?>";
			imagen_orden_compra_constante2.STR_ES_RELACIONES="<?php echo(imagen_orden_compra_web::$STR_ES_RELACIONES); ?>";
			imagen_orden_compra_constante2.STR_ES_RELACIONADO="<?php echo(imagen_orden_compra_web::$STR_ES_RELACIONADO); ?>";
			imagen_orden_compra_constante2.STR_ES_SUB_PAGINA="<?php echo(imagen_orden_compra_web::$STR_ES_SUB_PAGINA); ?>";
			imagen_orden_compra_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(imagen_orden_compra_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			imagen_orden_compra_constante2.BIT_ES_PAGINA_FORM=<?php echo(imagen_orden_compra_web::$BIT_ES_PAGINA_FORM); ?>;
			imagen_orden_compra_constante2.STR_SUFIJO="<?php echo(imagen_orden_compra_web::$STR_SUF); ?>";//imagen_orden_compra
			imagen_orden_compra_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(imagen_orden_compra_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//imagen_orden_compra
			
			imagen_orden_compra_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(imagen_orden_compra_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			imagen_orden_compra_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($imagen_orden_compra_web1->moduloActual->getnombre()); ?>";
			imagen_orden_compra_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(imagen_orden_compra_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			imagen_orden_compra_constante2.BIT_ES_LOAD_NORMAL=true;
			/*imagen_orden_compra_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			imagen_orden_compra_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.imagen_orden_compra_constante2 = imagen_orden_compra_constante2;
			
		</script>
		
		<?php if(imagen_orden_compra_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.imagen_orden_compra_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.imagen_orden_compra_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="imagen_orden_compraActual" ></a>
	
	<div id="divResumenimagen_orden_compraActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(imagen_orden_compra_web::$STR_ES_RELACIONADO=='false') {?>
		
		<div id="header" >
		
			<div id="banner">
				<span id="spanTituloBanner" class="titulobanner"></span>
			</div> <!-- banner -->
					
			<div id="subheader" class="links">  
			
						
			</div> <!-- sub-header -->
			
			
		</div> <!-- header -->
		
		<?php } ?>
		
		<div id="main">
		

			<?php if(imagen_orden_compra_web::$STR_ES_RELACIONADO=='false') {?>
			
			
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(imagen_orden_compra_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(imagen_orden_compra_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divimagen_orden_compraPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblimagen_orden_compraPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmimagen_orden_compraAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnimagen_orden_compraAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="imagen_orden_compra_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnimagen_orden_compraAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmimagen_orden_compraAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblimagen_orden_compraPopupAjaxWebPart -->
		</div> <!-- divimagen_orden_compraPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->		
		
		
		
			
<tr id="trimagen_orden_compraElementosFormulario">
	<td>
		<div id="divMantenimientoimagen_orden_compraAjaxWebPart" title="IMAGENES ORDEN COMPRA" style="height: 90%;width: 90%;position: relative;top: 30px;left: 30px;">
			<form id="frmMantenimientoimagen_orden_compra" name="frmMantenimientoimagen_orden_compra">

			</br>

			<?php if(imagen_orden_compra_web::$STR_ES_RELACIONES=='false' ) {?>
			</br>
			<?php } ?>

			<!-- SECCION/TOOLBAR -->
			<table id="tblimagen_orden_compraToolBarFormularioExterior" style="width: 65%">
				<tr style="display:table-row">
					<td align="center">

						<table id="tblimagen_orden_compraToolBarFormulario" style="text-align: center"  style="display:table-row">
							<tr>
								<td id="tdimagen_orden_compraActualizarToolBar" style="visibility:visible">
									<img id="imgActualizarToolBarimagen_orden_compra" name="imgActualizarToolBarimagen_orden_compra" title="ACTUALIZAR Imagenes Orden Compra ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/actualizar.gif" width="25" height="25"/>
								</td>
								<td id="tdimagen_orden_compraEliminarToolBar" style="visibility:visible">
									<img id="imgEliminarToolBarimagen_orden_compra" name="imgEliminarToolBarimagen_orden_compra" title="ELIMINAR Imagenes Orden Compra ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/eliminar.gif" width="25" height="25"/>
								</td>
								<td id="tdimagen_orden_compraCancelarToolBar" style="visibility:visible">
									<img id="imgCancelarToolBarimagen_orden_compra" name="imgCancelarToolBarimagen_orden_compra" title="CANCELAR Imagenes Orden Compra ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/cancelar.gif" width="25" height="25"/>
								</td>
								<td id="tdimagen_orden_compraRelacionesToolBar" style="display:table-row">
									<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/xexpand.png" width="25" height="25" onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('tblCamposOcultosimagen_orden_compra',this,'../')"/>
								</td>
							</tr>
						</table> <!-- tblimagen_orden_compraToolBarFormulario -->

					</td>
				</tr>
			</table> <!-- tblimagen_orden_compraToolBarFormularioExterior -->

			<table id="tblimagen_orden_compraElementos">
			<tr id="trimagen_orden_compraElementos" class="elementos" style="display:table-row">
			<td align="center">

			<a id="Campos"></a>

				<?php if(imagen_orden_compra_web::$STR_ES_RELACIONES=='false' ) {?>
				<div id="divFlechaArribaElementos" align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
					<span></span>
				</div>
				<?php } ?>

				<!-- SECCION/FORMULARIO -->
				<table id="tblElementosimagen_orden_compra" class="elementos" style="width: 300px; padding: 0px; border-spacing: 0px; border-collapse: collapse; text-align: center;">
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
						<td id="td_title-imagen" class="titulocampo">
							<label class="form-label">Imagen.(*)</label>
						</td>
						<td id="td_control-imagen" align="left" class="controlcampo">
							<textarea id="form-imagen" name="form-imagen" class="form-control"  placeholder="Imagen"  title="Imagen"   style="font-size: 13px;"  rows ="0" cols= "25"></textarea>
							<span id="spanstrMensajeimagen" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_5">
						<td id="td_title-nro_compra" class="titulocampo">
							<label class="form-label">Nro Compra.(*)</label>
						</td>
						<td id="td_control-nro_compra" align="left" class="controlcampo">
							<input id="form-nro_compra" name="form-nro_compra" type="text" class="form-control"  placeholder="Nro Compra"  title="Nro Compra"    size="10"  maxlength="10"/>
							<span id="spanstrMensajenro_compra" class="mensajeerror"></span>
						</td>
					</tr>
				</table> <!-- tblElementosimagen_orden_compra -->

				<!-- SECCION/OCULTOS -->
				<table id="tblCamposOcultosimagen_orden_compra" class="elementos" style="display: table-row;">
					<caption class="busquedacabecera">
						<span>Campos Ocultos</span>
					</caption>
				</table> <!-- tblCamposOcultosimagen_orden_compra -->

			</td></tr> <!-- trimagen_orden_compraElementos -->
			</table> <!-- tblimagen_orden_compraElementos -->
			</form> <!-- frmMantenimientoimagen_orden_compra -->


			

				<form id="frmAccionesMantenimientoimagen_orden_compra" name="frmAccionesMantenimientoimagen_orden_compra">

			<?php if(imagen_orden_compra_web::$STR_ES_BUSQUEDA=='false' ) {?>
			<table id="tblimagen_orden_compraAcciones" class="elementos" style="text-align: center">
		<tr id="trimagen_orden_compraAcciones" class="elementos" style="display:table-row">
			<td align="center">
				<a id="Acciones" ></a>

				<?php if(imagen_orden_compra_web::$STR_ES_RELACIONES=='false' ) {?>
				<div align="right">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
				<?php } ?>

					<!-- SECCION/BOTONES -->
					<table id="tblAccionesMantenimientoimagen_orden_compra" class="busqueda" style="width: 50%;text-align: center">

						<?php if(imagen_orden_compra_web::$STR_ES_RELACIONES=='false' ) {?>
						<!--
						<caption class="busquedacabecera">
							<span>Acciones</span>
						</caption>
						-->
						<?php } ?>

						<tr id="trAccionesMantenimientoimagen_orden_compraBasicos">
							<td id="tdbtnNuevoimagen_orden_compra" style="visibility:visible">
								<div id="divNuevoimagen_orden_compra" style="display:table-row">
									<input type="button" id="btnNuevoimagen_orden_compra" name="btnNuevoimagen_orden_compra" value="NUEVO" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnActualizarimagen_orden_compra" style="visibility:visible">
								<div id="divActualizarimagen_orden_compra" style="display:table-row">
									<input type="button" id="btnActualizarimagen_orden_compra" name="btnActualizarimagen_orden_compra" title="ACTUALIZAR Imagenes Orden Compra ACTUAL" value="Actualizar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnEliminarimagen_orden_compra" style="visibility:visible">
								<div id="divEliminarimagen_orden_compra" style="display:table-row">
									<input type="button" id="btnEliminarimagen_orden_compra" name="btnEliminarimagen_orden_compra" title="ELIMINAR Imagenes Orden Compra ACTUAL" value="Eliminar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnImprimirimagen_orden_compra" style="visibility:visible">
								<input type="button" id="btnImprimirimagen_orden_compra" name="btnImprimirimagen_orden_compra" title="IMPRIMIR PAGINA Imagenes Orden Compra ACTUAL" value="Imp. Datos" class="btn btn-primary"/>
							</td>
							<td id="tdbtnCancelarimagen_orden_compra" style="visibility:visible">
								<input type="button" id="btnCancelarimagen_orden_compra" name="btnCancelarimagen_orden_compra" title="CANCELAR Imagenes Orden Compra ACTUAL" value="Cancelar" class="btn btn-primary"/>
							</td>
						</tr>
						<tr id="trAccionesMantenimientoimagen_orden_compraGuardar" style="display:none">
							<td id="tdbtnGuardarCambiosimagen_orden_compra" colspan="4" align="center" style="visibility:visible">
								<div id="divGuardarCambiosimagen_orden_compra" style="display:table-row">
									<input type="button" id="btnGuardarCambiosFormularioimagen_orden_compra" name="btnGuardarCambiosFormularioimagen_orden_compra" title="GUARDAR" value="GUADAR CAMBIOS" class="btn btn-primary"/>
								</div>
							</td>
						</tr>
					</table> <!-- tblAccionesMantenimientoimagen_orden_compra -->
			</td>
		</tr> <!-- trimagen_orden_compraAcciones -->
		<?php if(imagen_orden_compra_web::$STR_ES_RELACIONADO=='false' ) {?>
		<tr id="trimagen_orden_compraParametrosAcciones" class="impresion"  style="display:table-row">
			<td align="center">
				<!-- SECCION/POST -->
				<table id="tblimagen_orden_compraParametrosAcciones" style="text-align: center;border: 0px solid black;padding: 0px; border-spacing: 0px">
					<caption class="busquedacabecera" style="padding: 0px;caption-side: top;">
						<span>Acciones Extra/Post</span>
					</caption>
					<tr id="trimagen_orden_compraFilaParametrosAcciones">
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
				</table> <!-- tblimagen_orden_compraParametrosAcciones -->
			</td>
		</tr> <!-- trimagen_orden_compraParametrosAcciones -->
		<?php }?>
		<tr id="trimagen_orden_compraMensajes" class="mensajes">
			<td align="center">
				<a id="Mensajes"></a>
			</td>
		</tr> <!-- trimagen_orden_compraMensajes -->
			</table> <!-- tblimagen_orden_compraAcciones -->
			<?php } ?>
			</form> <!-- frmMantenimientoimagen_orden_compra -->
			</div> <!-- divMantenimientoimagen_orden_compraAjaxWebPart -->
		</td>
	</tr> <!-- trimagen_orden_compraElementosFormulario/super -->
		<?php if(imagen_orden_compra_web::$STR_ES_RELACIONADO=='false' ) {?>

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
			
				import {imagen_orden_compra_webcontrol,imagen_orden_compra_webcontrol1} from './webroot/js/JavaScript/contabilidad/inventario/imagen_orden_compra/js/webcontrol/imagen_orden_compra_form_webcontrol.js?random=1';
				
				imagen_orden_compra_webcontrol1.setimagen_orden_compra_constante(window.imagen_orden_compra_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(imagen_orden_compra_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

