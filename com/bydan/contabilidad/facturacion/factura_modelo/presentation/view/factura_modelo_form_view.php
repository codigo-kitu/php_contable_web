<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\facturacion\factura_modelo\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Facturas Modelos Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/facturacion/factura_modelo/util/factura_modelo_carga.php');
	use com\bydan\contabilidad\facturacion\factura_modelo\util\factura_modelo_carga;
	
	//include_once('com/bydan/contabilidad/facturacion/factura_modelo/presentation/view/factura_modelo_web.php');
	//use com\bydan\contabilidad\facturacion\factura_modelo\presentation\view\factura_modelo_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	factura_modelo_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	factura_modelo_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$factura_modelo_web1= new factura_modelo_web();	
	$factura_modelo_web1->cargarDatosGenerales();
	
	//$moduloActual=$factura_modelo_web1->moduloActual;
	//$usuarioActual=$factura_modelo_web1->usuarioActual;
	//$sessionBase=$factura_modelo_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$factura_modelo_web1->parametroGeneralUsuarioActual;
	
	
		
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
		
		
			<script type="module" src="webroot/js/JavaScript/contabilidad/facturacion/factura_modelo/js/util/factura_modelo_form_funcion.js?random=1"></script>
						
		
		
		<?php 
			
		
			factura_modelo_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					factura_modelo_web::$GET_POST=$_GET;
				} else {
					factura_modelo_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			factura_modelo_web::$STR_NOMBRE_PAGINA = 'factura_modelo_form_view.php';
			factura_modelo_web::$BIT_ES_PAGINA_PRINCIPAL = 'false';
			factura_modelo_web::$BIT_ES_PAGINA_FORM = 'true';
				
			factura_modelo_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {factura_modelo_constante,factura_modelo_constante1} from './webroot/js/JavaScript/contabilidad/facturacion/factura_modelo/js/util/factura_modelo_constante.js?random=1';
			import {factura_modelo_funcion,factura_modelo_funcion1} from './webroot/js/JavaScript/contabilidad/facturacion/factura_modelo/js/util/factura_modelo_funcion.js?random=1';
			
			let factura_modelo_constante2 = new factura_modelo_constante();
			
			factura_modelo_constante2.STR_NOMBRE_PAGINA="<?php echo(factura_modelo_web::$STR_NOMBRE_PAGINA); ?>";
			factura_modelo_constante2.STR_TYPE_ON_LOADfactura_modelo="<?php echo(factura_modelo_web::$STR_TYPE_ONLOAD); ?>";
			factura_modelo_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(factura_modelo_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			factura_modelo_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(factura_modelo_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			factura_modelo_constante2.STR_ACTION="<?php echo(factura_modelo_web::$STR_ACTION); ?>";
			factura_modelo_constante2.STR_ES_POPUP="<?php echo(factura_modelo_web::$STR_ES_POPUP); ?>";
			factura_modelo_constante2.STR_ES_BUSQUEDA="<?php echo(factura_modelo_web::$STR_ES_BUSQUEDA); ?>";
			factura_modelo_constante2.STR_FUNCION_JS="<?php echo(factura_modelo_web::$STR_FUNCION_JS); ?>";
			factura_modelo_constante2.BIG_ID_ACTUAL="<?php echo(factura_modelo_web::$BIG_ID_ACTUAL); ?>";
			factura_modelo_constante2.BIG_ID_OPCION="<?php echo(factura_modelo_web::$BIG_ID_OPCION); ?>";
			factura_modelo_constante2.STR_OBJETO_JS="<?php echo(factura_modelo_web::$STR_OBJETO_JS); ?>";
			factura_modelo_constante2.STR_ES_RELACIONES="<?php echo(factura_modelo_web::$STR_ES_RELACIONES); ?>";
			factura_modelo_constante2.STR_ES_RELACIONADO="<?php echo(factura_modelo_web::$STR_ES_RELACIONADO); ?>";
			factura_modelo_constante2.STR_ES_SUB_PAGINA="<?php echo(factura_modelo_web::$STR_ES_SUB_PAGINA); ?>";
			factura_modelo_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(factura_modelo_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			factura_modelo_constante2.BIT_ES_PAGINA_FORM=<?php echo(factura_modelo_web::$BIT_ES_PAGINA_FORM); ?>;
			factura_modelo_constante2.STR_SUFIJO="<?php echo(factura_modelo_web::$STR_SUF); ?>";//factura_modelo
			factura_modelo_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(factura_modelo_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//factura_modelo
			
			factura_modelo_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(factura_modelo_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			factura_modelo_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($factura_modelo_web1->moduloActual->getnombre()); ?>";
			factura_modelo_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(factura_modelo_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			factura_modelo_constante2.BIT_ES_LOAD_NORMAL=true;
			/*factura_modelo_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			factura_modelo_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.factura_modelo_constante2 = factura_modelo_constante2;
			
		</script>
		
		<?php if(factura_modelo_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.factura_modelo_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.factura_modelo_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="factura_modeloActual" ></a>
	
	<div id="divResumenfactura_modeloActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(factura_modelo_web::$STR_ES_RELACIONADO=='false') {?>
		
		<div id="header" >
		
			<div id="banner">
				<span id="spanTituloBanner" class="titulobanner"></span>
			</div> <!-- banner -->
					
			<div id="subheader" class="links">  
			
						
			</div> <!-- sub-header -->
			
			
		</div> <!-- header -->
		
		<?php } ?>
		
		<div id="main">
		

			<?php if(factura_modelo_web::$STR_ES_RELACIONADO=='false') {?>
			
			
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(factura_modelo_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(factura_modelo_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divfactura_modeloPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblfactura_modeloPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmfactura_modeloAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnfactura_modeloAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="factura_modelo_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnfactura_modeloAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmfactura_modeloAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblfactura_modeloPopupAjaxWebPart -->
		</div> <!-- divfactura_modeloPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->		
		
		
		
			
<tr id="trfactura_modeloElementosFormulario">
	<td>
		<div id="divMantenimientofactura_modeloAjaxWebPart" title="FACTURAS MODELOS" style="height: 90%;width: 90%;position: relative;top: 30px;left: 30px;">
			<form id="frmMantenimientofactura_modelo" name="frmMantenimientofactura_modelo">

			</br>

			<?php if(factura_modelo_web::$STR_ES_RELACIONES=='false' ) {?>
			</br>
			<?php } ?>

			<!-- SECCION/TOOLBAR -->
			<table id="tblfactura_modeloToolBarFormularioExterior" style="width: 65%">
				<tr style="display:table-row">
					<td align="center">

						<table id="tblfactura_modeloToolBarFormulario" style="text-align: center"  style="display:table-row">
							<tr>
								<td id="tdfactura_modeloActualizarToolBar" style="visibility:visible">
									<img id="imgActualizarToolBarfactura_modelo" name="imgActualizarToolBarfactura_modelo" title="ACTUALIZAR Facturas Modelos ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/actualizar.gif" width="25" height="25"/>
								</td>
								<td id="tdfactura_modeloEliminarToolBar" style="visibility:visible">
									<img id="imgEliminarToolBarfactura_modelo" name="imgEliminarToolBarfactura_modelo" title="ELIMINAR Facturas Modelos ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/eliminar.gif" width="25" height="25"/>
								</td>
								<td id="tdfactura_modeloCancelarToolBar" style="visibility:visible">
									<img id="imgCancelarToolBarfactura_modelo" name="imgCancelarToolBarfactura_modelo" title="CANCELAR Facturas Modelos ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/cancelar.gif" width="25" height="25"/>
								</td>
								<td id="tdfactura_modeloRelacionesToolBar" style="display:table-row">
									<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/xexpand.png" width="25" height="25" onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('tblCamposOcultosfactura_modelo',this,'../')"/>
								</td>
							</tr>
						</table> <!-- tblfactura_modeloToolBarFormulario -->

					</td>
				</tr>
			</table> <!-- tblfactura_modeloToolBarFormularioExterior -->

			<table id="tblfactura_modeloElementos">
			<tr id="trfactura_modeloElementos" class="elementos" style="display:table-row">
			<td align="center">

			<a id="Campos"></a>

				<?php if(factura_modelo_web::$STR_ES_RELACIONES=='false' ) {?>
				<div id="divFlechaArribaElementos" align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
					<span></span>
				</div>
				<?php } ?>

				<!-- SECCION/FORMULARIO -->
				<table id="tblElementosfactura_modelo" class="elementos" style="width: 350px; padding: 0px; border-spacing: 0px; border-collapse: collapse; text-align: center;">
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
						<td id="td_title-id_factura_lote" class="titulocampo">
							<label class="form-label">Factura Lote.(*)</label>
						</td>
						<td id="td_control-id_factura_lote" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_factura_lote" name="form-id_factura_lote" title="Factura Lote" ></select></td>
									<td><a><img id="form-id_factura_lote_img" name="form-id_factura_lote_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_factura_lote_img_busqueda" name="form-id_factura_lote_img_busqueda" title="Buscar Facturas Lotes" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_factura_lote" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_5">
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
					<tr id="tr_fila_6">
						<td id="td_title-marcado" class="titulocampo">
							<label class="form-label">Marcado</label>
						</td>
						<td id="td_control-marcado" align="left" class="controlcampo">
							<input id="form-marcado" name="form-marcado" type="checkbox" >
							<span id="spanstrMensajemarcado" class="mensajeerror"></span>
						</td>
					</tr>
				</table> <!-- tblElementosfactura_modelo -->

				<!-- SECCION/OCULTOS -->
				<table id="tblCamposOcultosfactura_modelo" class="elementos" style="display: table-row;">
					<caption class="busquedacabecera">
						<span>Campos Ocultos</span>
					</caption>
					
						<td id="td_title-ultimo" class="titulocampo">
							<label class="form-label">Ultimo</label>
						</td>
						<td id="td_control-ultimo" align="left" class="controlcampo">
							<input id="form-ultimo" name="form-ultimo" type="text" class="form-control"  placeholder="Ultimo"  title="Ultimo"    size="10"  maxlength="10"/>
							<span id="spanstrMensajeultimo" class="mensajeerror"></span>
						</td>
					<td></td><td></td></tr>
				</table> <!-- tblCamposOcultosfactura_modelo -->

			</td></tr> <!-- trfactura_modeloElementos -->
			</table> <!-- tblfactura_modeloElementos -->
			</form> <!-- frmMantenimientofactura_modelo -->


			

				<form id="frmAccionesMantenimientofactura_modelo" name="frmAccionesMantenimientofactura_modelo">

			<?php if(factura_modelo_web::$STR_ES_BUSQUEDA=='false' ) {?>
			<table id="tblfactura_modeloAcciones" class="elementos" style="text-align: center">
		<tr id="trfactura_modeloAcciones" class="elementos" style="display:table-row">
			<td align="center">
				<a id="Acciones" ></a>

				<?php if(factura_modelo_web::$STR_ES_RELACIONES=='false' ) {?>
				<div align="right">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
				<?php } ?>

					<!-- SECCION/BOTONES -->
					<table id="tblAccionesMantenimientofactura_modelo" class="busqueda" style="width: 50%;text-align: center">

						<?php if(factura_modelo_web::$STR_ES_RELACIONES=='false' ) {?>
						<!--
						<caption class="busquedacabecera">
							<span>Acciones</span>
						</caption>
						-->
						<?php } ?>

						<tr id="trAccionesMantenimientofactura_modeloBasicos">
							<td id="tdbtnNuevofactura_modelo" style="visibility:visible">
								<div id="divNuevofactura_modelo" style="display:table-row">
									<input type="button" id="btnNuevofactura_modelo" name="btnNuevofactura_modelo" value="NUEVO" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnActualizarfactura_modelo" style="visibility:visible">
								<div id="divActualizarfactura_modelo" style="display:table-row">
									<input type="button" id="btnActualizarfactura_modelo" name="btnActualizarfactura_modelo" title="ACTUALIZAR Facturas Modelos ACTUAL" value="Actualizar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnEliminarfactura_modelo" style="visibility:visible">
								<div id="divEliminarfactura_modelo" style="display:table-row">
									<input type="button" id="btnEliminarfactura_modelo" name="btnEliminarfactura_modelo" title="ELIMINAR Facturas Modelos ACTUAL" value="Eliminar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnImprimirfactura_modelo" style="visibility:visible">
								<input type="button" id="btnImprimirfactura_modelo" name="btnImprimirfactura_modelo" title="IMPRIMIR PAGINA Facturas Modelos ACTUAL" value="Imp. Datos" class="btn btn-primary"/>
							</td>
							<td id="tdbtnCancelarfactura_modelo" style="visibility:visible">
								<input type="button" id="btnCancelarfactura_modelo" name="btnCancelarfactura_modelo" title="CANCELAR Facturas Modelos ACTUAL" value="Cancelar" class="btn btn-primary"/>
							</td>
						</tr>
						<tr id="trAccionesMantenimientofactura_modeloGuardar" style="display:none">
							<td id="tdbtnGuardarCambiosfactura_modelo" colspan="4" align="center" style="visibility:visible">
								<div id="divGuardarCambiosfactura_modelo" style="display:table-row">
									<input type="button" id="btnGuardarCambiosFormulariofactura_modelo" name="btnGuardarCambiosFormulariofactura_modelo" title="GUARDAR" value="GUADAR CAMBIOS" class="btn btn-primary"/>
								</div>
							</td>
						</tr>
					</table> <!-- tblAccionesMantenimientofactura_modelo -->
			</td>
		</tr> <!-- trfactura_modeloAcciones -->
		<?php if(factura_modelo_web::$STR_ES_RELACIONADO=='false' ) {?>
		<tr id="trfactura_modeloParametrosAcciones" class="impresion"  style="display:table-row">
			<td align="center">
				<!-- SECCION/POST -->
				<table id="tblfactura_modeloParametrosAcciones" style="text-align: center;border: 0px solid black;padding: 0px; border-spacing: 0px">
					<caption class="busquedacabecera" style="padding: 0px;caption-side: top;">
						<span>Acciones Extra/Post</span>
					</caption>
					<tr id="trfactura_modeloFilaParametrosAcciones">
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
				</table> <!-- tblfactura_modeloParametrosAcciones -->
			</td>
		</tr> <!-- trfactura_modeloParametrosAcciones -->
		<?php }?>
		<tr id="trfactura_modeloMensajes" class="mensajes">
			<td align="center">
				<a id="Mensajes"></a>
			</td>
		</tr> <!-- trfactura_modeloMensajes -->
			</table> <!-- tblfactura_modeloAcciones -->
			<?php } ?>
			</form> <!-- frmMantenimientofactura_modelo -->
			</div> <!-- divMantenimientofactura_modeloAjaxWebPart -->
		</td>
	</tr> <!-- trfactura_modeloElementosFormulario/super -->
		<?php if(factura_modelo_web::$STR_ES_RELACIONADO=='false' ) {?>

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
			
				import {factura_modelo_webcontrol,factura_modelo_webcontrol1} from './webroot/js/JavaScript/contabilidad/facturacion/factura_modelo/js/webcontrol/factura_modelo_form_webcontrol.js?random=1';
				
				factura_modelo_webcontrol1.setfactura_modelo_constante(window.factura_modelo_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(factura_modelo_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

