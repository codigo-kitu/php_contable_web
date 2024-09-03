<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\inventario\cotizacion_detalle\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Cotizacion Detalle Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/inventario/cotizacion_detalle/util/cotizacion_detalle_carga.php');
	use com\bydan\contabilidad\inventario\cotizacion_detalle\util\cotizacion_detalle_carga;
	
	//include_once('com/bydan/contabilidad/inventario/cotizacion_detalle/presentation/view/cotizacion_detalle_web.php');
	//use com\bydan\contabilidad\inventario\cotizacion_detalle\presentation\view\cotizacion_detalle_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	cotizacion_detalle_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	cotizacion_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$cotizacion_detalle_web1= new cotizacion_detalle_web();	
	$cotizacion_detalle_web1->cargarDatosGenerales();
	
	//$moduloActual=$cotizacion_detalle_web1->moduloActual;
	//$usuarioActual=$cotizacion_detalle_web1->usuarioActual;
	//$sessionBase=$cotizacion_detalle_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$cotizacion_detalle_web1->parametroGeneralUsuarioActual;
	
	
		
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
		
		
			<script type="module" src="webroot/js/JavaScript/contabilidad/inventario/cotizacion_detalle/js/util/cotizacion_detalle_form_funcion.js?random=1"></script>
						
		
		
		<?php 
			
		
			cotizacion_detalle_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					cotizacion_detalle_web::$GET_POST=$_GET;
				} else {
					cotizacion_detalle_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			cotizacion_detalle_web::$STR_NOMBRE_PAGINA = 'cotizacion_detalle_form_view.php';
			cotizacion_detalle_web::$BIT_ES_PAGINA_PRINCIPAL = 'false';
			cotizacion_detalle_web::$BIT_ES_PAGINA_FORM = 'true';
				
			cotizacion_detalle_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {cotizacion_detalle_constante,cotizacion_detalle_constante1} from './webroot/js/JavaScript/contabilidad/inventario/cotizacion_detalle/js/util/cotizacion_detalle_constante.js?random=1';
			import {cotizacion_detalle_funcion,cotizacion_detalle_funcion1} from './webroot/js/JavaScript/contabilidad/inventario/cotizacion_detalle/js/util/cotizacion_detalle_funcion.js?random=1';
			
			let cotizacion_detalle_constante2 = new cotizacion_detalle_constante();
			
			cotizacion_detalle_constante2.STR_NOMBRE_PAGINA="<?php echo(cotizacion_detalle_web::$STR_NOMBRE_PAGINA); ?>";
			cotizacion_detalle_constante2.STR_TYPE_ON_LOADcotizacion_detalle="<?php echo(cotizacion_detalle_web::$STR_TYPE_ONLOAD); ?>";
			cotizacion_detalle_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(cotizacion_detalle_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			cotizacion_detalle_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(cotizacion_detalle_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			cotizacion_detalle_constante2.STR_ACTION="<?php echo(cotizacion_detalle_web::$STR_ACTION); ?>";
			cotizacion_detalle_constante2.STR_ES_POPUP="<?php echo(cotizacion_detalle_web::$STR_ES_POPUP); ?>";
			cotizacion_detalle_constante2.STR_ES_BUSQUEDA="<?php echo(cotizacion_detalle_web::$STR_ES_BUSQUEDA); ?>";
			cotizacion_detalle_constante2.STR_FUNCION_JS="<?php echo(cotizacion_detalle_web::$STR_FUNCION_JS); ?>";
			cotizacion_detalle_constante2.BIG_ID_ACTUAL="<?php echo(cotizacion_detalle_web::$BIG_ID_ACTUAL); ?>";
			cotizacion_detalle_constante2.BIG_ID_OPCION="<?php echo(cotizacion_detalle_web::$BIG_ID_OPCION); ?>";
			cotizacion_detalle_constante2.STR_OBJETO_JS="<?php echo(cotizacion_detalle_web::$STR_OBJETO_JS); ?>";
			cotizacion_detalle_constante2.STR_ES_RELACIONES="<?php echo(cotizacion_detalle_web::$STR_ES_RELACIONES); ?>";
			cotizacion_detalle_constante2.STR_ES_RELACIONADO="<?php echo(cotizacion_detalle_web::$STR_ES_RELACIONADO); ?>";
			cotizacion_detalle_constante2.STR_ES_SUB_PAGINA="<?php echo(cotizacion_detalle_web::$STR_ES_SUB_PAGINA); ?>";
			cotizacion_detalle_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(cotizacion_detalle_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			cotizacion_detalle_constante2.BIT_ES_PAGINA_FORM=<?php echo(cotizacion_detalle_web::$BIT_ES_PAGINA_FORM); ?>;
			cotizacion_detalle_constante2.STR_SUFIJO="<?php echo(cotizacion_detalle_web::$STR_SUF); ?>";//cotizacion_detalle
			cotizacion_detalle_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(cotizacion_detalle_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//cotizacion_detalle
			
			cotizacion_detalle_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(cotizacion_detalle_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			cotizacion_detalle_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($cotizacion_detalle_web1->moduloActual->getnombre()); ?>";
			cotizacion_detalle_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(cotizacion_detalle_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			cotizacion_detalle_constante2.BIT_ES_LOAD_NORMAL=true;
			/*cotizacion_detalle_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			cotizacion_detalle_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.cotizacion_detalle_constante2 = cotizacion_detalle_constante2;
			
		</script>
		
		<?php if(cotizacion_detalle_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.cotizacion_detalle_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.cotizacion_detalle_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="cotizacion_detalleActual" ></a>
	
	<div id="divResumencotizacion_detalleActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(cotizacion_detalle_web::$STR_ES_RELACIONADO=='false') {?>
		
		<div id="header" >
		
			<div id="banner">
				<span id="spanTituloBanner" class="titulobanner"></span>
			</div> <!-- banner -->
					
			<div id="subheader" class="links">  
			
						
			</div> <!-- sub-header -->
			
			
		</div> <!-- header -->
		
		<?php } ?>
		
		<div id="main">
		

			<?php if(cotizacion_detalle_web::$STR_ES_RELACIONADO=='false') {?>
			
			
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(cotizacion_detalle_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(cotizacion_detalle_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divcotizacion_detallePopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblcotizacion_detallePopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmcotizacion_detalleAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btncotizacion_detalleAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="cotizacion_detalle_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btncotizacion_detalleAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmcotizacion_detalleAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblcotizacion_detallePopupAjaxWebPart -->
		</div> <!-- divcotizacion_detallePopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->		
		
		
		
			
<tr id="trcotizacion_detalleElementosFormulario">
	<td>
		<div id="divMantenimientocotizacion_detalleAjaxWebPart" title="COTIZACION DETALLE" style="height: 90%;width: 90%;position: relative;top: 30px;left: 30px;">
			<form id="frmMantenimientocotizacion_detalle" name="frmMantenimientocotizacion_detalle">

			</br>

			<?php if(cotizacion_detalle_web::$STR_ES_RELACIONES=='false' ) {?>
			</br>
			<?php } ?>

			<!-- SECCION/TOOLBAR -->
			<table id="tblcotizacion_detalleToolBarFormularioExterior" style="width: 65%">
				<tr style="display:table-row">
					<td align="center">

						<table id="tblcotizacion_detalleToolBarFormulario" style="text-align: center"  style="display:table-row">
							<tr>
								<td id="tdcotizacion_detalleActualizarToolBar" style="visibility:visible">
									<img id="imgActualizarToolBarcotizacion_detalle" name="imgActualizarToolBarcotizacion_detalle" title="ACTUALIZAR Cotizacion Detalle ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/actualizar.gif" width="25" height="25"/>
								</td>
								<td id="tdcotizacion_detalleEliminarToolBar" style="visibility:visible">
									<img id="imgEliminarToolBarcotizacion_detalle" name="imgEliminarToolBarcotizacion_detalle" title="ELIMINAR Cotizacion Detalle ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/eliminar.gif" width="25" height="25"/>
								</td>
								<td id="tdcotizacion_detalleCancelarToolBar" style="visibility:visible">
									<img id="imgCancelarToolBarcotizacion_detalle" name="imgCancelarToolBarcotizacion_detalle" title="CANCELAR Cotizacion Detalle ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/cancelar.gif" width="25" height="25"/>
								</td>
								<td id="tdcotizacion_detalleRelacionesToolBar" style="display:table-row">
									<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/xexpand.png" width="25" height="25" onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('tblCamposOcultoscotizacion_detalle',this,'../')"/>
								</td>
							</tr>
						</table> <!-- tblcotizacion_detalleToolBarFormulario -->

					</td>
				</tr>
			</table> <!-- tblcotizacion_detalleToolBarFormularioExterior -->

			<table id="tblcotizacion_detalleElementos">
			<tr id="trcotizacion_detalleElementos" class="elementos" style="display:table-row">
			<td align="center">

			<a id="Campos"></a>

				<?php if(cotizacion_detalle_web::$STR_ES_RELACIONES=='false' ) {?>
				<div id="divFlechaArribaElementos" align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
					<span></span>
				</div>
				<?php } ?>

				<!-- SECCION/FORMULARIO -->
				<table id="tblElementoscotizacion_detalle" class="elementos" style="width: 350px; padding: 0px; border-spacing: 0px; border-collapse: collapse; text-align: left;">
					
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
					<?php if(true || cotizacion_detalle_web::$STR_ES_RELACIONES=='false' ) {?>
					<tr class="busquedacabecera">
						<td colspan="4"><span><img id="imgMostrarOcultarcotizacion_detallegeneral" name="imgMostrarOcultarcotizacion_detallegeneral" title="Mostrar/Ocultar" style="width: 10px; height: 10px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" width="10" height="10" onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trcotizacion_detallegeneralElementos',this,'../')"/>GENERAL</span>
						</td>
					</tr>
					<?php } ?>
					<tr id="trcotizacion_detallegeneralElementos">
						<td id="tdcotizacion_detallegeneralElementos"  colspan="4">
				<table class="elementos" style="width:350px;text-align:left; padding: 0px; border-spacing: 0px; border-collapse: collapse;">
					<tr id="tr_fila_1">
						<td id="td_title-id" class="titulocampo">
							<label class="form-label">Cod. Único</label>
						</td>
						<td id="td_control-id" align="left">
							<input id="form-id" name="form-id" type="text" class="form-control" readonly size="10">
						</td>
					</tr>
					<tr id="tr_fila_2">
						<td id="td_title-id_cotizacion" class="titulocampo">
							<label class="form-label">Cotizacion</label>
						</td>
						<td id="td_control-id_cotizacion" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_cotizacion" name="form-id_cotizacion" title="Cotizacion" ></select></td>
									<td><a><img id="form-id_cotizacion_img" name="form-id_cotizacion_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_cotizacion_img_busqueda" name="form-id_cotizacion_img_busqueda" title="Buscar Cotizacion" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_cotizacion" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_3">
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
					<tr id="tr_fila_4">
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
					<tr id="tr_fila_5">
						<td id="td_title-id_unidad" class="titulocampo">
							<label class="form-label">Unidad.(*)</label>
						</td>
						<td id="td_control-id_unidad" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_unidad" name="form-id_unidad" title="Unidad" ></select></td>
									<td><a><img id="form-id_unidad_img" name="form-id_unidad_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_unidad_img_busqueda" name="form-id_unidad_img_busqueda" title="Buscar Unidad" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_unidad" class="mensajeerror"></span>
						</td>
					</tr>
				</table>
				</td></tr>
					<?php if(true || cotizacion_detalle_web::$STR_ES_RELACIONES=='false' ) {?>
					<tr class="busquedacabecera">
						<td colspan="4"><span><img id="imgMostrarOcultarcotizacion_detallevalores" name="imgMostrarOcultarcotizacion_detallevalores" title="Mostrar/Ocultar" style="width: 10px; height: 10px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" width="10" height="10" onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trcotizacion_detallevaloresElementos',this,'../')"/>VALORES</span>
						</td>
					</tr>
					<?php } ?>
					<tr id="trcotizacion_detallevaloresElementos">
						<td id="tdcotizacion_detallevaloresElementos"  colspan="4">
				<table class="elementos" style="width:350px;text-align:left; padding: 0px; border-spacing: 0px; border-collapse: collapse;">
					
						<td id="td_title-cantidad" class="titulocampo">
							<label class="form-label">Cantidad.(*)</label>
						</td>
						<td id="td_control-cantidad" align="left" class="controlcampo">
							<input id="form-cantidad" name="form-cantidad" type="text" class="form-control"  placeholder="Cantidad"  title="Cantidad"    maxlength="18" size="12" >
							<span id="spanstrMensajecantidad" class="mensajeerror"></span>
						</td>
					
					<tr id="tr_fila_1">
						<td id="td_title-precio" class="titulocampo">
							<label class="form-label">Precio.(*)</label>
						</td>
						<td id="td_control-precio" align="left" class="controlcampo">
							<input id="form-precio" name="form-precio" type="text" class="form-control"  placeholder="Precio"  title="Precio"    maxlength="18" size="12" >
							<span id="spanstrMensajeprecio" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_2">
						<td id="td_title-descuento_porciento" class="titulocampo">
							<label class="form-label">Descuento %.(*)</label>
						</td>
						<td id="td_control-descuento_porciento" align="left" class="controlcampo">
							<input id="form-descuento_porciento" name="form-descuento_porciento" type="text" class="form-control"  placeholder="Descuento %"  title="Descuento %"    maxlength="18" size="12" >
							<span id="spanstrMensajedescuento_porciento" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_3">
						<td id="td_title-descuento_monto" class="titulocampo">
							<label class="form-label">Descuento.(*)</label>
						</td>
						<td id="td_control-descuento_monto" align="left" class="controlcampo">
							<input id="form-descuento_monto" name="form-descuento_monto" type="text" class="form-control"  placeholder="Descuento"  title="Descuento"    maxlength="18" size="12" >
							<span id="spanstrMensajedescuento_monto" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_4">
						<td id="td_title-sub_total" class="titulocampo">
							<label class="form-label">Sub Total.(*)</label>
						</td>
						<td id="td_control-sub_total" align="left" class="controlcampo">
							<input id="form-sub_total" name="form-sub_total" type="text" class="form-control"  placeholder="Sub Total"  title="Sub Total"    maxlength="18" size="12" >
							<span id="spanstrMensajesub_total" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_5">
						<td id="td_title-iva_porciento" class="titulocampo">
							<label class="form-label">Iva %.(*)</label>
						</td>
						<td id="td_control-iva_porciento" align="left" class="controlcampo">
							<input id="form-iva_porciento" name="form-iva_porciento" type="text" class="form-control"  placeholder="Iva %"  title="Iva %"    maxlength="18" size="12" >
							<span id="spanstrMensajeiva_porciento" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_6">
						<td id="td_title-iva_monto" class="titulocampo">
							<label class="form-label">Iva.(*)</label>
						</td>
						<td id="td_control-iva_monto" align="left" class="controlcampo">
							<input id="form-iva_monto" name="form-iva_monto" type="text" class="form-control"  placeholder="Iva"  title="Iva"    maxlength="18" size="12" >
							<span id="spanstrMensajeiva_monto" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_7">
						<td id="td_title-total" class="titulocampo">
							<label class="form-label">Total</label>
						</td>
						<td id="td_control-total" align="left" class="controlcampo">
							<input id="form-total" name="form-total" type="text" class="form-control"  placeholder="Total"  title="Total"    maxlength="18" size="12" >
							<span id="spanstrMensajetotal" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_8">
						<td id="td_title-observacion" class="titulocampo">
							<label class="form-label">Observacion</label>
						</td>
						<td id="td_control-observacion" align="left" class="controlcampo">
							<textarea id="form-observacion" name="form-observacion" class="form-control"  placeholder="Observacion"  title="Observacion"   style="font-size: 13px;"  rows ="0" cols= "25"></textarea>
							<span id="spanstrMensajeobservacion" class="mensajeerror"></span>
						</td>
					</tr>
				</table>
				</td></tr>
				</table> <!-- tblElementoscotizacion_detalle -->

				<!-- SECCION/OCULTOS -->
				<table id="tblCamposOcultoscotizacion_detalle" class="elementos" style="display: table-row;">
					<caption class="busquedacabecera">
						<span>Campos Ocultos</span>
					</caption>
					
						<td id="td_title-impuesto2_porciento" class="titulocampo">
							<label class="form-label">Impuesto2 %.(*)</label>
						</td>
						<td id="td_control-impuesto2_porciento" align="left" class="controlcampo">
							<input id="form-impuesto2_porciento" name="form-impuesto2_porciento" type="text" class="form-control"  placeholder="Impuesto2 %"  title="Impuesto2 %"    maxlength="18" size="12" >
							<span id="spanstrMensajeimpuesto2_porciento" class="mensajeerror"></span>
						</td>
					
					<tr id="tr_fila_1">
						<td id="td_title-impuesto2_monto" class="titulocampo">
							<label class="form-label">Impuesto2 Monto.(*)</label>
						</td>
						<td id="td_control-impuesto2_monto" align="left" class="controlcampo">
							<input id="form-impuesto2_monto" name="form-impuesto2_monto" type="text" class="form-control"  placeholder="Impuesto2 Monto"  title="Impuesto2 Monto"    maxlength="18" size="12" >
							<span id="spanstrMensajeimpuesto2_monto" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-id_otro_suplidor" class="titulocampo">
							<label class="form-label">Otro Suplidor</label>
						</td>
						<td id="td_control-id_otro_suplidor" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_otro_suplidor" name="form-id_otro_suplidor" title="Otro Suplidor" ></select></td>
									<td><a><img id="form-id_otro_suplidor_img" name="form-id_otro_suplidor_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_otro_suplidor_img_busqueda" name="form-id_otro_suplidor_img_busqueda" title="Buscar Otro Suplidor" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_otro_suplidor" class="mensajeerror"></span>
						</td>
					</tr>
				</table> <!-- tblCamposOcultoscotizacion_detalle -->

			</td></tr> <!-- trcotizacion_detalleElementos -->
			</table> <!-- tblcotizacion_detalleElementos -->
			</form> <!-- frmMantenimientocotizacion_detalle -->


			

				<form id="frmAccionesMantenimientocotizacion_detalle" name="frmAccionesMantenimientocotizacion_detalle">

			<?php if(cotizacion_detalle_web::$STR_ES_BUSQUEDA=='false' ) {?>
			<table id="tblcotizacion_detalleAcciones" class="elementos" style="text-align: center">
		<tr id="trcotizacion_detalleAcciones" class="elementos" style="display:table-row">
			<td align="center">
				<a id="Acciones" ></a>

				<?php if(cotizacion_detalle_web::$STR_ES_RELACIONES=='false' ) {?>
				<div align="right">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
				<?php } ?>

					<!-- SECCION/BOTONES -->
					<table id="tblAccionesMantenimientocotizacion_detalle" class="busqueda" style="width: 50%;text-align: left">

						<?php if(cotizacion_detalle_web::$STR_ES_RELACIONES=='false' ) {?>
						<!--
						<caption class="busquedacabecera">
							<span>Acciones</span>
						</caption>
						-->
						<?php } ?>

						<tr id="trAccionesMantenimientocotizacion_detalleBasicos">
							<td id="tdbtnNuevocotizacion_detalle" style="visibility:visible">
								<div id="divNuevocotizacion_detalle" style="display:table-row">
									<input type="button" id="btnNuevocotizacion_detalle" name="btnNuevocotizacion_detalle" value="NUEVO" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnActualizarcotizacion_detalle" style="visibility:visible">
								<div id="divActualizarcotizacion_detalle" style="display:table-row">
									<input type="button" id="btnActualizarcotizacion_detalle" name="btnActualizarcotizacion_detalle" title="ACTUALIZAR Cotizacion Detalle ACTUAL" value="Actualizar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnEliminarcotizacion_detalle" style="visibility:visible">
								<div id="divEliminarcotizacion_detalle" style="display:table-row">
									<input type="button" id="btnEliminarcotizacion_detalle" name="btnEliminarcotizacion_detalle" title="ELIMINAR Cotizacion Detalle ACTUAL" value="Eliminar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnImprimircotizacion_detalle" style="visibility:visible">
								<input type="button" id="btnImprimircotizacion_detalle" name="btnImprimircotizacion_detalle" title="IMPRIMIR PAGINA Cotizacion Detalle ACTUAL" value="Imp. Datos" class="btn btn-primary"/>
							</td>
							<td id="tdbtnCancelarcotizacion_detalle" style="visibility:visible">
								<input type="button" id="btnCancelarcotizacion_detalle" name="btnCancelarcotizacion_detalle" title="CANCELAR Cotizacion Detalle ACTUAL" value="Cancelar" class="btn btn-primary"/>
							</td>
						</tr>
						<tr id="trAccionesMantenimientocotizacion_detalleGuardar" style="display:none">
							<td id="tdbtnGuardarCambioscotizacion_detalle" colspan="4" align="center" style="visibility:visible">
								<div id="divGuardarCambioscotizacion_detalle" style="display:table-row">
									<input type="button" id="btnGuardarCambiosFormulariocotizacion_detalle" name="btnGuardarCambiosFormulariocotizacion_detalle" title="GUARDAR" value="GUADAR CAMBIOS" class="btn btn-primary"/>
								</div>
							</td>
						</tr>
					</table> <!-- tblAccionesMantenimientocotizacion_detalle -->
			</td>
		</tr> <!-- trcotizacion_detalleAcciones -->
		<?php if(cotizacion_detalle_web::$STR_ES_RELACIONADO=='false' ) {?>
		<tr id="trcotizacion_detalleParametrosAcciones" class="impresion"  style="display:table-row">
			<td align="center">
				<!-- SECCION/POST -->
				<table id="tblcotizacion_detalleParametrosAcciones" style="text-align: center;border: 0px solid black;padding: 0px; border-spacing: 0px">
					<caption class="busquedacabecera" style="padding: 0px;caption-side: top;">
						<span>Acciones Extra/Post</span>
					</caption>
					<tr id="trcotizacion_detalleFilaParametrosAcciones">
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
				</table> <!-- tblcotizacion_detalleParametrosAcciones -->
			</td>
		</tr> <!-- trcotizacion_detalleParametrosAcciones -->
		<?php }?>
		<tr id="trcotizacion_detalleMensajes" class="mensajes">
			<td align="center">
				<a id="Mensajes"></a>
			</td>
		</tr> <!-- trcotizacion_detalleMensajes -->
			</table> <!-- tblcotizacion_detalleAcciones -->
			<?php } ?>
			</form> <!-- frmMantenimientocotizacion_detalle -->
			</div> <!-- divMantenimientocotizacion_detalleAjaxWebPart -->
		</td>
	</tr> <!-- trcotizacion_detalleElementosFormulario/super -->
		<?php if(cotizacion_detalle_web::$STR_ES_RELACIONADO=='false' ) {?>

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
			
				import {cotizacion_detalle_webcontrol,cotizacion_detalle_webcontrol1} from './webroot/js/JavaScript/contabilidad/inventario/cotizacion_detalle/js/webcontrol/cotizacion_detalle_form_webcontrol.js?random=1';
				
				cotizacion_detalle_webcontrol1.setcotizacion_detalle_constante(window.cotizacion_detalle_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(cotizacion_detalle_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

