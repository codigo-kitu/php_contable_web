<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\facturacion\factura_lote\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Facturas Lotes Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/facturacion/factura_lote/util/factura_lote_carga.php');
	use com\bydan\contabilidad\facturacion\factura_lote\util\factura_lote_carga;
	
	//include_once('com/bydan/contabilidad/facturacion/factura_lote/presentation/view/factura_lote_web.php');
	//use com\bydan\contabilidad\facturacion\factura_lote\presentation\view\factura_lote_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	factura_lote_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	factura_lote_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$factura_lote_web1= new factura_lote_web();	
	$factura_lote_web1->cargarDatosGenerales();
	
	//$moduloActual=$factura_lote_web1->moduloActual;
	//$usuarioActual=$factura_lote_web1->usuarioActual;
	//$sessionBase=$factura_lote_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$factura_lote_web1->parametroGeneralUsuarioActual;
	
	
		
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
		
		
			<script type="module" src="webroot/js/JavaScript/contabilidad/facturacion/factura_lote/js/util/factura_lote_form_funcion.js?random=1"></script>
						
		
		
		<?php 
			
		
			factura_lote_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					factura_lote_web::$GET_POST=$_GET;
				} else {
					factura_lote_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			factura_lote_web::$STR_NOMBRE_PAGINA = 'factura_lote_form_view.php';
			factura_lote_web::$BIT_ES_PAGINA_PRINCIPAL = 'false';
			factura_lote_web::$BIT_ES_PAGINA_FORM = 'true';
				
			factura_lote_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {factura_lote_constante,factura_lote_constante1} from './webroot/js/JavaScript/contabilidad/facturacion/factura_lote/js/util/factura_lote_constante.js?random=1';
			import {factura_lote_funcion,factura_lote_funcion1} from './webroot/js/JavaScript/contabilidad/facturacion/factura_lote/js/util/factura_lote_funcion.js?random=1';
			
			let factura_lote_constante2 = new factura_lote_constante();
			
			factura_lote_constante2.STR_NOMBRE_PAGINA="<?php echo(factura_lote_web::$STR_NOMBRE_PAGINA); ?>";
			factura_lote_constante2.STR_TYPE_ON_LOADfactura_lote="<?php echo(factura_lote_web::$STR_TYPE_ONLOAD); ?>";
			factura_lote_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(factura_lote_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			factura_lote_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(factura_lote_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			factura_lote_constante2.STR_ACTION="<?php echo(factura_lote_web::$STR_ACTION); ?>";
			factura_lote_constante2.STR_ES_POPUP="<?php echo(factura_lote_web::$STR_ES_POPUP); ?>";
			factura_lote_constante2.STR_ES_BUSQUEDA="<?php echo(factura_lote_web::$STR_ES_BUSQUEDA); ?>";
			factura_lote_constante2.STR_FUNCION_JS="<?php echo(factura_lote_web::$STR_FUNCION_JS); ?>";
			factura_lote_constante2.BIG_ID_ACTUAL="<?php echo(factura_lote_web::$BIG_ID_ACTUAL); ?>";
			factura_lote_constante2.BIG_ID_OPCION="<?php echo(factura_lote_web::$BIG_ID_OPCION); ?>";
			factura_lote_constante2.STR_OBJETO_JS="<?php echo(factura_lote_web::$STR_OBJETO_JS); ?>";
			factura_lote_constante2.STR_ES_RELACIONES="<?php echo(factura_lote_web::$STR_ES_RELACIONES); ?>";
			factura_lote_constante2.STR_ES_RELACIONADO="<?php echo(factura_lote_web::$STR_ES_RELACIONADO); ?>";
			factura_lote_constante2.STR_ES_SUB_PAGINA="<?php echo(factura_lote_web::$STR_ES_SUB_PAGINA); ?>";
			factura_lote_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(factura_lote_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			factura_lote_constante2.BIT_ES_PAGINA_FORM=<?php echo(factura_lote_web::$BIT_ES_PAGINA_FORM); ?>;
			factura_lote_constante2.STR_SUFIJO="<?php echo(factura_lote_web::$STR_SUF); ?>";//factura_lote
			factura_lote_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(factura_lote_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//factura_lote
			
			factura_lote_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(factura_lote_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			factura_lote_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($factura_lote_web1->moduloActual->getnombre()); ?>";
			factura_lote_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(factura_lote_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			factura_lote_constante2.BIT_ES_LOAD_NORMAL=true;
			/*factura_lote_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			factura_lote_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.factura_lote_constante2 = factura_lote_constante2;
			
		</script>
		
		<?php if(factura_lote_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.factura_lote_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.factura_lote_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="factura_loteActual" ></a>
	
	<div id="divResumenfactura_loteActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(factura_lote_web::$STR_ES_RELACIONADO=='false') {?>
		
		<div id="header" >
		
			<div id="banner">
				<span id="spanTituloBanner" class="titulobanner"></span>
			</div> <!-- banner -->
					
			<div id="subheader" class="links">  
			
						
			</div> <!-- sub-header -->
			
			
		</div> <!-- header -->
		
		<?php } ?>
		
		<div id="main">
		

			<?php if(factura_lote_web::$STR_ES_RELACIONADO=='false') {?>
			
			
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(factura_lote_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(factura_lote_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divfactura_lotePopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblfactura_lotePopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmfactura_loteAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnfactura_loteAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="factura_lote_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnfactura_loteAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmfactura_loteAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblfactura_lotePopupAjaxWebPart -->
		</div> <!-- divfactura_lotePopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->		
		
		
		
			
<tr id="trfactura_loteElementosFormulario">
	<td>
		<div id="divMantenimientofactura_loteAjaxWebPart" title="FACTURAS LOTES" style="height: 90%;width: 90%;position: relative;top: 30px;left: 30px;">
			<form id="frmMantenimientofactura_lote" name="frmMantenimientofactura_lote">

			</br>

			<?php if(factura_lote_web::$STR_ES_RELACIONES=='false' ) {?>
			</br>
			<?php } ?>

			<!-- SECCION/TOOLBAR -->
			<table id="tblfactura_loteToolBarFormularioExterior" style="width: 65%">
				<tr style="display:table-row">
					<td align="center">

						<table id="tblfactura_loteToolBarFormulario" style="text-align: center"  style="display:table-row">
							<tr>
								<td id="tdfactura_loteActualizarToolBar" style="visibility:visible">
									<img id="imgActualizarToolBarfactura_lote" name="imgActualizarToolBarfactura_lote" title="ACTUALIZAR Facturas Lotes ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/actualizar.gif" width="25" height="25"/>
								</td>
								<td id="tdfactura_loteEliminarToolBar" style="visibility:visible">
									<img id="imgEliminarToolBarfactura_lote" name="imgEliminarToolBarfactura_lote" title="ELIMINAR Facturas Lotes ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/eliminar.gif" width="25" height="25"/>
								</td>
								<td id="tdfactura_loteCancelarToolBar" style="visibility:visible">
									<img id="imgCancelarToolBarfactura_lote" name="imgCancelarToolBarfactura_lote" title="CANCELAR Facturas Lotes ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/cancelar.gif" width="25" height="25"/>
								</td>
								<td id="tdfactura_loteRelacionesToolBar" style="display:table-row">
									<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/xexpand.png" width="25" height="25" onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('tblCamposOcultosfactura_lote',this,'../')"/>
								</td>
							</tr>
						</table> <!-- tblfactura_loteToolBarFormulario -->

					</td>
				</tr>
			</table> <!-- tblfactura_loteToolBarFormularioExterior -->

			<table id="tblfactura_loteElementos">
			<tr id="trfactura_loteElementos" class="elementos" style="display:table-row">
			<td align="center">

			<a id="Campos"></a>

				<?php if(factura_lote_web::$STR_ES_RELACIONES=='false' ) {?>
				<div id="divFlechaArribaElementos" align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
					<span></span>
				</div>
				<?php } ?>

				<!-- SECCION/FORMULARIO -->
				<table id="tblElementosfactura_lote" class="elementos" style="width: 400px; padding: 0px; border-spacing: 0px; border-collapse: collapse; text-align: left;">
					
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
					<?php if(true || factura_lote_web::$STR_ES_RELACIONES=='false' ) {?>
					<tr class="busquedacabecera">
						<td colspan="8"><span><img id="imgMostrarOcultarfactura_loteprincipal" name="imgMostrarOcultarfactura_loteprincipal" title="Mostrar/Ocultar" style="width: 10px; height: 10px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" width="10" height="10" onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trfactura_loteprincipalElementos',this,'../')"/>PRINCIPAL</span>
						</td>
					</tr>
					<?php } ?>
					<tr id="trfactura_loteprincipalElementos">
						<td id="tdfactura_loteprincipalElementos"  colspan="8">
				<table class="elementos" style="width:800px;text-align:left; padding: 0px; border-spacing: 0px; border-collapse: collapse;">
					<tr id="tr_fila_1">
						<td id="td_title-id" class="titulocampo">
							<label class="form-label">Cod. Único</label>
						</td>
						<td id="td_control-id" align="left">
							<input id="form-id" name="form-id" type="text" class="form-control" readonly size="10">
						</td>
					
					
						<td id="td_title-numero" class="titulocampo">
							<label class="form-label">Numero.(*)</label>
						</td>
						<td id="td_control-numero" align="left" class="controlcampo">
							<input id="form-numero" name="form-numero" type="text" class="form-control"  placeholder="Numero"  title="Numero"    size="10"  maxlength="10"/>
							<span id="spanstrMensajenumero" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-id_cliente" class="titulocampo">
							<label class="form-label">Cliente.(*)</label>
						</td>
						<td id="td_control-id_cliente" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_cliente" name="form-id_cliente" title="Cliente" ></select></td>
									<td><a><img id="form-id_cliente_img" name="form-id_cliente_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_cliente_img_busqueda" name="form-id_cliente_img_busqueda" title="Buscar Cliente" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_cliente" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_2">
						<td id="td_title-ruc" class="titulocampo">
							<label class="form-label">Ruc.(*)</label>
						</td>
						<td id="td_control-ruc" align="left" class="controlcampo">
							<textarea id="form-ruc" name="form-ruc" class="form-control"  placeholder="Ruc"  title="Ruc"   style="font-size: 13px;"  rows ="2" cols= "25"></textarea>
							<span id="spanstrMensajeruc" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-referencia_cliente" class="titulocampo">
							<label class="form-label">Referencia Cliente</label>
						</td>
						<td id="td_control-referencia_cliente" align="left" class="controlcampo">
							<input id="form-referencia_cliente" name="form-referencia_cliente" type="text" class="form-control"  placeholder="Referencia Cliente"  title="Referencia Cliente"    size="20"  maxlength="20"/>
							<span id="spanstrMensajereferencia_cliente" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-fecha_emision" class="titulocampo">
							<label class="form-label">Fecha Emision.(*)</label>
						</td>
						<td id="td_control-fecha_emision" align="left" class="controlcampo">
							<input id="form-fecha_emision" name="form-fecha_emision" type="text" class="form-control"  placeholder="Fecha Emision"  title="Fecha Emision"    size="10" >
							<span id="spanstrMensajefecha_emision" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_3">
						<td id="td_title-id_vendedor" class="titulocampo">
							<label class="form-label">Vendedor.(*)</label>
						</td>
						<td id="td_control-id_vendedor" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_vendedor" name="form-id_vendedor" title="Vendedor" ></select></td>
									<td><a><img id="form-id_vendedor_img" name="form-id_vendedor_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_vendedor_img_busqueda" name="form-id_vendedor_img_busqueda" title="Buscar Vendedor" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_vendedor" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-id_termino_pago" class="titulocampo">
							<label class="form-label">Terminos Pago.(*)</label>
						</td>
						<td id="td_control-id_termino_pago" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_termino_pago" name="form-id_termino_pago" title="Terminos Pago" ></select></td>
									<td><a><img id="form-id_termino_pago_img" name="form-id_termino_pago_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_termino_pago_img_busqueda" name="form-id_termino_pago_img_busqueda" title="Buscar Terminos Pago Cliente" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_termino_pago" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-fecha_vence" class="titulocampo">
							<label class="form-label">Fecha Vence.(*)</label>
						</td>
						<td id="td_control-fecha_vence" align="left" class="controlcampo">
							<input id="form-fecha_vence" name="form-fecha_vence" type="text" class="form-control"  placeholder="Fecha Vence"  title="Fecha Vence"    size="10" >
							<span id="spanstrMensajefecha_vence" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_4">
						<td id="td_title-cotizacion" class="titulocampo">
							<label class="form-label">Cotizacion.(*)</label>
						</td>
						<td id="td_control-cotizacion" align="left" class="controlcampo">
							<input id="form-cotizacion" name="form-cotizacion" type="text" class="form-control"  placeholder="Cotizacion"  title="Cotizacion"    maxlength="18" size="12"  readonly="readonly">
							<span id="spanstrMensajecotizacion" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-id_moneda" class="titulocampo">
							<label class="form-label">Moneda.(*)</label>
						</td>
						<td id="td_control-id_moneda" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_moneda" name="form-id_moneda" title="Moneda" ></select></td>
									<td><a><img id="form-id_moneda_img" name="form-id_moneda_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_moneda_img_busqueda" name="form-id_moneda_img_busqueda" title="Buscar Moneda" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_moneda" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-id_estado" class="titulocampo">
							<label class="form-label">Estado.(*)</label>
						</td>
						<td id="td_control-id_estado" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_estado" name="form-id_estado" title="Estado" ></select></td>
									<td><img id="form-id_estado_img_busqueda" name="form-id_estado_img_busqueda" title="Buscar Estado" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_estado" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_5">
						<td id="td_title-direccion" class="titulocampo">
							<label class="form-label">Direccion</label>
						</td>
						<td id="td_control-direccion" align="left" class="controlcampo">
							<textarea id="form-direccion" name="form-direccion" class="form-control"  placeholder="Direccion"  title="Direccion"   style="font-size: 13px;" rows="2" cols="25" size="20" ></textarea>
							<span id="spanstrMensajedireccion" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-enviar_a" class="titulocampo">
							<label class="form-label">Enviar a</label>
						</td>
						<td id="td_control-enviar_a" align="left" class="controlcampo">
							<textarea id="form-enviar_a" name="form-enviar_a" class="form-control"  placeholder="Enviar a"  title="Enviar a"   style="font-size: 13px;"  rows ="2" cols= "25"></textarea>
							<span id="spanstrMensajeenviar_a" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-observacion" class="titulocampo">
							<label class="form-label">Observacion</label>
						</td>
						<td id="td_control-observacion" align="left" class="controlcampo">
							<textarea id="form-observacion" name="form-observacion" class="form-control"  placeholder="Observacion"  title="Observacion"   style="font-size: 13px;"  rows ="0" cols= "25"></textarea>
							<span id="spanstrMensajeobservacion" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_6">
						<td id="td_title-impuesto_en_precio" class="titulocampo">
							<label class="form-label">Impuesto En Precio</label>
						</td>
						<td id="td_control-impuesto_en_precio" align="left" class="controlcampo">
							<input id="form-impuesto_en_precio" name="form-impuesto_en_precio" type="checkbox" >
							<span id="spanstrMensajeimpuesto_en_precio" class="mensajeerror"></span>
						</td>
					
				</table>
				</td></tr>
				</table> <!-- tblElementosfactura_lote -->

				<!-- SECCION/OCULTOS -->
				<table id="tblCamposOcultosfactura_lote" class="elementos" style="display: table-row;">
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
						<td id="td_title-id_sucursal" class="titulocampo">
							<label class="form-label">Sucursal.(*)</label>
						</td>
						<td id="td_control-id_sucursal" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_sucursal" name="form-id_sucursal" title="Sucursal" ></select></td>
									<td><a><img id="form-id_sucursal_img" name="form-id_sucursal_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_sucursal_img_busqueda" name="form-id_sucursal_img_busqueda" title="Buscar Sucursal" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_sucursal" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-id_ejercicio" class="titulocampo">
							<label class="form-label">Ejercicio.(*)</label>
						</td>
						<td id="td_control-id_ejercicio" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_ejercicio" name="form-id_ejercicio" title="Ejercicio" ></select></td>
									<td><a><img id="form-id_ejercicio_img" name="form-id_ejercicio_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_ejercicio_img_busqueda" name="form-id_ejercicio_img_busqueda" title="Buscar ejercicio" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_ejercicio" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-id_periodo" class="titulocampo">
							<label class="form-label">Periodo.(*)</label>
						</td>
						<td id="td_control-id_periodo" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_periodo" name="form-id_periodo" title="Periodo" ></select></td>
									<td><a><img id="form-id_periodo_img" name="form-id_periodo_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_periodo_img_busqueda" name="form-id_periodo_img_busqueda" title="Buscar periodo" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_periodo" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-id_usuario" class="titulocampo">
							<label class="form-label">Usuario.(*)</label>
						</td>
						<td id="td_control-id_usuario" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_usuario" name="form-id_usuario" title="Usuario" ></select></td>
									<td><a><img id="form-id_usuario_img" name="form-id_usuario_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_usuario_img_busqueda" name="form-id_usuario_img_busqueda" title="Buscar Usuario" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_usuario" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_2">
						<td id="td_title-otro_monto" class="titulocampo">
							<label class="form-label">Miscelaneos.(*)</label>
						</td>
						<td id="td_control-otro_monto" align="left" class="controlcampo">
							<input id="form-otro_monto" name="form-otro_monto" type="text" class="form-control"  placeholder="Miscelaneos"  title="Miscelaneos"    maxlength="18" size="12" >
							<span id="spanstrMensajeotro_monto" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-otro_porciento" class="titulocampo">
							<label class="form-label">Miscelaneos %.(*)</label>
						</td>
						<td id="td_control-otro_porciento" align="left" class="controlcampo">
							<input id="form-otro_porciento" name="form-otro_porciento" type="text" class="form-control"  placeholder="Miscelaneos %"  title="Miscelaneos %"    maxlength="18" size="12" >
							<span id="spanstrMensajeotro_porciento" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-hora" class="titulocampo">
							<label class="form-label">Hora.(*)</label>
						</td>
						<td id="td_control-hora" align="left" class="controlcampo">
							<input id="form-hora" name="form-hora" type="text" class="form-control"  placeholder="Hora"  title="Hora"    size="10" >
							<span id="spanstrMensajehora" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-retencion_ica_monto" class="titulocampo">
							<label class="form-label">Ret.Ica Monto.(*)</label>
						</td>
						<td id="td_control-retencion_ica_monto" align="left" class="controlcampo">
							<input id="form-retencion_ica_monto" name="form-retencion_ica_monto" type="text" class="form-control"  placeholder="Ret.Ica Monto"  title="Ret.Ica Monto"    maxlength="18" size="12" >
							<span id="spanstrMensajeretencion_ica_monto" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_3">
						<td id="td_title-retencion_ica_porciento" class="titulocampo">
							<label class="form-label">Ret.Ica %.(*)</label>
						</td>
						<td id="td_control-retencion_ica_porciento" align="left" class="controlcampo">
							<input id="form-retencion_ica_porciento" name="form-retencion_ica_porciento" type="text" class="form-control"  placeholder="Ret.Ica %"  title="Ret.Ica %"    maxlength="18" size="12" >
							<span id="spanstrMensajeretencion_ica_porciento" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-id_asiento" class="titulocampo">
							<label class="form-label">Asiento</label>
						</td>
						<td id="td_control-id_asiento" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_asiento" name="form-id_asiento" title="Asiento" ></select></td>
									<td><a><img id="form-id_asiento_img" name="form-id_asiento_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_asiento_img_busqueda" name="form-id_asiento_img_busqueda" title="Buscar Asiento" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_asiento" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-id_documento_cuenta_cobrar" class="titulocampo">
							<label class="form-label">Docs Cc</label>
						</td>
						<td id="td_control-id_documento_cuenta_cobrar" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_documento_cuenta_cobrar" name="form-id_documento_cuenta_cobrar" title="Docs Cc" ></select></td>
									<td><a><img id="form-id_documento_cuenta_cobrar_img" name="form-id_documento_cuenta_cobrar_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_documento_cuenta_cobrar_img_busqueda" name="form-id_documento_cuenta_cobrar_img_busqueda" title="Buscar Documentos Cuentas por Cobrar" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_documento_cuenta_cobrar" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-id_kardex" class="titulocampo">
							<label class="form-label">Kardex</label>
						</td>
						<td id="td_control-id_kardex" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_kardex" name="form-id_kardex" title="Kardex" ></select></td>
									<td><a><img id="form-id_kardex_img" name="form-id_kardex_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_kardex_img_busqueda" name="form-id_kardex_img_busqueda" title="Buscar Kardex" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_kardex" class="mensajeerror"></span>
						</td>
					</tr>
				</table> <!-- tblCamposOcultosfactura_lote -->

			</td></tr> <!-- trfactura_loteElementos -->
			</table> <!-- tblfactura_loteElementos -->
			</form> <!-- frmMantenimientofactura_lote -->

			<?php
			if(factura_lote_web::$STR_ES_RELACIONES=="true") {

				echo('<table id="tbl_tabs_relaciones" style="width: 100%">');

				echo('<tr id="tr_tabs_general" style="display:table-row"><td>');
				echo('<div id="tabs_general" class="tabs" style="width: 100%">');
					echo('<ul>');
						echo('<li class="titulotab"><a href="#divfactura_lote_detalles">Factura Lote Detalles</a></li>');
						echo('<li class="titulotab"><a href="#divfactura_modelos">Facturas Modeloss</a></li>');
					echo('</ul>');

					echo('<div id="divfactura_lote_detalles">');
					require_once('com/bydan/contabilidad/facturacion/presentation/view/factura_lote_detalle_view.php');
					echo('</div>');

					echo('<div id="divfactura_modelos">');
					require_once('com/bydan/contabilidad/facturacion/presentation/view/factura_modelo_view.php');
					echo('</div>');

				echo('</div>');
				echo('</td></tr>');

				echo('</table>');
			}
			?>
			<form id="frmMantenimientoTotalesfactura_lote" name="frmMantenimientoTotalesfactura_lote">
				<table>
					<tr id="trGuiaRemisionElementosTotales" class="elementos" style="display:table-row"><td align="center">

					<table class="elementos" style="padding: 0px; border-spacing: 0px; text-align: left;">
					<?php if(true || factura_lote_web::$STR_ES_RELACIONES=='false' ) {?>
					<tr class="busquedacabecera">
						<td colspan="8"><span><img id="imgMostrarOcultarfactura_lotetotales" name="imgMostrarOcultarfactura_lotetotales" title="Mostrar/Ocultar" style="width: 10px; height: 10px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" width="10" height="10" onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trfactura_lotetotalesElementos',this,'../')"/>TOTALES</span>
						</td>
					</tr>
					<?php } ?>
					<tr id="trfactura_lotetotalesElementos">
						<td id="tdfactura_lotetotalesElementos"  colspan="8">
				<table class="elementos" style="width:325px;text-align:left; padding: 0px; border-spacing: 0px; border-collapse: collapse;">
					
						<td id="td_title-sub_total" class="titulocampo">
							<label class="form-label">Sub Total.(*)</label>
						</td>
						<td id="td_control-sub_total" align="left" class="controlcampo">
							<input id="form-sub_total" name="form-sub_total" type="text" class="form-control"  placeholder="Sub Total"  title="Sub Total"    maxlength="18" size="12" >
							<span id="spanstrMensajesub_total" class="mensajeerror"></span>
						</td>
					
					</tr>
					<tr id="tr_fila_1">
						<td id="td_title-descuento_monto" class="titulocampo">
							<label class="form-label">Descuento Monto.(*)</label>
						</td>
						<td id="td_control-descuento_monto" align="left" class="controlcampo">
							<input id="form-descuento_monto" name="form-descuento_monto" type="text" class="form-control"  placeholder="Descuento Monto"  title="Descuento Monto"    maxlength="18" size="12" >
							<span id="spanstrMensajedescuento_monto" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-descuento_porciento" class="titulocampo">
							<label class="form-label">Descuento %.(*)</label>
						</td>
						<td id="td_control-descuento_porciento" align="left" class="controlcampo">
							<input id="form-descuento_porciento" name="form-descuento_porciento" type="text" class="form-control"  placeholder="Descuento %"  title="Descuento %"    maxlength="18" size="12" >
							<span id="spanstrMensajedescuento_porciento" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_2">
						<td id="td_title-iva_monto" class="titulocampo">
							<label class="form-label">Iva Monto.(*)</label>
						</td>
						<td id="td_control-iva_monto" align="left" class="controlcampo">
							<input id="form-iva_monto" name="form-iva_monto" type="text" class="form-control"  placeholder="Iva Monto"  title="Iva Monto"    maxlength="18" size="12" >
							<span id="spanstrMensajeiva_monto" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-iva_porciento" class="titulocampo">
							<label class="form-label">Iva %.(*)</label>
						</td>
						<td id="td_control-iva_porciento" align="left" class="controlcampo">
							<input id="form-iva_porciento" name="form-iva_porciento" type="text" class="form-control"  placeholder="Iva %"  title="Iva %"    maxlength="18" size="12" >
							<span id="spanstrMensajeiva_porciento" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_3">
						<td id="td_title-retencion_fuente_monto" class="titulocampo">
							<label class="form-label">Ret.Fuente Monto.(*)</label>
						</td>
						<td id="td_control-retencion_fuente_monto" align="left" class="controlcampo">
							<input id="form-retencion_fuente_monto" name="form-retencion_fuente_monto" type="text" class="form-control"  placeholder="Ret.Fuente Monto"  title="Ret.Fuente Monto"    maxlength="18" size="12" >
							<span id="spanstrMensajeretencion_fuente_monto" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-retencion_fuente_porciento" class="titulocampo">
							<label class="form-label">Ret.Fuente %.(*)</label>
						</td>
						<td id="td_control-retencion_fuente_porciento" align="left" class="controlcampo">
							<input id="form-retencion_fuente_porciento" name="form-retencion_fuente_porciento" type="text" class="form-control"  placeholder="Ret.Fuente %"  title="Ret.Fuente %"    maxlength="18" size="12" >
							<span id="spanstrMensajeretencion_fuente_porciento" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_4">
						<td id="td_title-retencion_iva_monto" class="titulocampo">
							<label class="form-label">Ret.Iva Monto.(*)</label>
						</td>
						<td id="td_control-retencion_iva_monto" align="left" class="controlcampo">
							<input id="form-retencion_iva_monto" name="form-retencion_iva_monto" type="text" class="form-control"  placeholder="Ret.Iva Monto"  title="Ret.Iva Monto"    maxlength="18" size="12" >
							<span id="spanstrMensajeretencion_iva_monto" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-retencion_iva_porciento" class="titulocampo">
							<label class="form-label">Ret.Iva %.(*)</label>
						</td>
						<td id="td_control-retencion_iva_porciento" align="left" class="controlcampo">
							<input id="form-retencion_iva_porciento" name="form-retencion_iva_porciento" type="text" class="form-control"  placeholder="Ret.Iva %"  title="Ret.Iva %"    maxlength="18" size="12" >
							<span id="spanstrMensajeretencion_iva_porciento" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_5">
						<td id="td_title-total" class="titulocampo">
							<label class="form-label">Total.(*)</label>
						</td>
						<td id="td_control-total" align="left" class="controlcampo">
							<input id="form-total" name="form-total" type="text" class="form-control"  placeholder="Total"  title="Total"    maxlength="18" size="12" >
							<span id="spanstrMensajetotal" class="mensajeerror"></span>
						</td>
					
				</table>
				</td></tr>
					</table>

					</td></tr>
				</table>
			</form>

			

				<form id="frmAccionesMantenimientofactura_lote" name="frmAccionesMantenimientofactura_lote">

			<?php if(factura_lote_web::$STR_ES_BUSQUEDA=='false' ) {?>
			<table id="tblfactura_loteAcciones" class="elementos" style="text-align: center">
		<tr id="trfactura_loteAcciones" class="elementos" style="display:table-row">
			<td align="center">
				<a id="Acciones" ></a>

				<?php if(factura_lote_web::$STR_ES_RELACIONES=='false' ) {?>
				<div align="right">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
				<?php } ?>

					<!-- SECCION/BOTONES -->
					<table id="tblAccionesMantenimientofactura_lote" class="busqueda" style="width: 50%;text-align: left">

						<?php if(factura_lote_web::$STR_ES_RELACIONES=='false' ) {?>
						<!--
						<caption class="busquedacabecera">
							<span>Acciones</span>
						</caption>
						-->
						<?php } ?>

						<tr id="trAccionesMantenimientofactura_loteBasicos">
							<td id="tdbtnNuevofactura_lote" style="visibility:visible">
								<div id="divNuevofactura_lote" style="display:table-row">
									<input type="button" id="btnNuevofactura_lote" name="btnNuevofactura_lote" value="NUEVO" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnActualizarfactura_lote" style="visibility:visible">
								<div id="divActualizarfactura_lote" style="display:table-row">
									<input type="button" id="btnActualizarfactura_lote" name="btnActualizarfactura_lote" title="ACTUALIZAR Facturas Lotes ACTUAL" value="Actualizar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnEliminarfactura_lote" style="visibility:visible">
								<div id="divEliminarfactura_lote" style="display:table-row">
									<input type="button" id="btnEliminarfactura_lote" name="btnEliminarfactura_lote" title="ELIMINAR Facturas Lotes ACTUAL" value="Eliminar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnImprimirfactura_lote" style="visibility:visible">
								<input type="button" id="btnImprimirfactura_lote" name="btnImprimirfactura_lote" title="IMPRIMIR PAGINA Facturas Lotes ACTUAL" value="Imp. Datos" class="btn btn-primary"/>
							</td>
							<td id="tdbtnCancelarfactura_lote" style="visibility:visible">
								<input type="button" id="btnCancelarfactura_lote" name="btnCancelarfactura_lote" title="CANCELAR Facturas Lotes ACTUAL" value="Cancelar" class="btn btn-primary"/>
							</td>
						</tr>
						<tr id="trAccionesMantenimientofactura_loteGuardar" style="display:none">
							<td id="tdbtnGuardarCambiosfactura_lote" colspan="4" align="center" style="visibility:visible">
								<div id="divGuardarCambiosfactura_lote" style="display:table-row">
									<input type="button" id="btnGuardarCambiosFormulariofactura_lote" name="btnGuardarCambiosFormulariofactura_lote" title="GUARDAR" value="GUADAR CAMBIOS" class="btn btn-primary"/>
								</div>
							</td>
						</tr>
					</table> <!-- tblAccionesMantenimientofactura_lote -->
			</td>
		</tr> <!-- trfactura_loteAcciones -->
		<?php if(factura_lote_web::$STR_ES_RELACIONADO=='false' ) {?>
		<tr id="trfactura_loteParametrosAcciones" class="impresion"  style="display:table-row">
			<td align="center">
				<!-- SECCION/POST -->
				<table id="tblfactura_loteParametrosAcciones" style="text-align: center;border: 0px solid black;padding: 0px; border-spacing: 0px">
					<caption class="busquedacabecera" style="padding: 0px;caption-side: top;">
						<span>Acciones Extra/Post</span>
					</caption>
					<tr id="trfactura_loteFilaParametrosAcciones">
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
				</table> <!-- tblfactura_loteParametrosAcciones -->
			</td>
		</tr> <!-- trfactura_loteParametrosAcciones -->
		<?php }?>
		<tr id="trfactura_loteMensajes" class="mensajes">
			<td align="center">
				<a id="Mensajes"></a>
			</td>
		</tr> <!-- trfactura_loteMensajes -->
			</table> <!-- tblfactura_loteAcciones -->
			<?php } ?>
			</form> <!-- frmMantenimientofactura_lote -->
			</div> <!-- divMantenimientofactura_loteAjaxWebPart -->
		</td>
	</tr> <!-- trfactura_loteElementosFormulario/super -->
		<?php if(factura_lote_web::$STR_ES_RELACIONADO=='false' ) {?>

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
			
				import {factura_lote_webcontrol,factura_lote_webcontrol1} from './webroot/js/JavaScript/contabilidad/facturacion/factura_lote/js/webcontrol/factura_lote_form_webcontrol.js?random=1';
				
				factura_lote_webcontrol1.setfactura_lote_constante(window.factura_lote_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(factura_lote_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

