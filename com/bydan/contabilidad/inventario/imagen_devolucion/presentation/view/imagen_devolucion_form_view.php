<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\inventario\imagen_devolucion\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Imagenes Devolucion Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/inventario/imagen_devolucion/util/imagen_devolucion_carga.php');
	use com\bydan\contabilidad\inventario\imagen_devolucion\util\imagen_devolucion_carga;
	
	//include_once('com/bydan/contabilidad/inventario/imagen_devolucion/presentation/view/imagen_devolucion_web.php');
	//use com\bydan\contabilidad\inventario\imagen_devolucion\presentation\view\imagen_devolucion_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	imagen_devolucion_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	imagen_devolucion_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$imagen_devolucion_web1= new imagen_devolucion_web();	
	$imagen_devolucion_web1->cargarDatosGenerales();
	
	//$moduloActual=$imagen_devolucion_web1->moduloActual;
	//$usuarioActual=$imagen_devolucion_web1->usuarioActual;
	//$sessionBase=$imagen_devolucion_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$imagen_devolucion_web1->parametroGeneralUsuarioActual;
	
	
		
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
		
		
			<script type="module" src="webroot/js/JavaScript/contabilidad/inventario/imagen_devolucion/js/util/imagen_devolucion_form_funcion.js?random=1"></script>
						
		
		
		<?php 
			
		
			imagen_devolucion_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					imagen_devolucion_web::$GET_POST=$_GET;
				} else {
					imagen_devolucion_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			imagen_devolucion_web::$STR_NOMBRE_PAGINA = 'imagen_devolucion_form_view.php';
			imagen_devolucion_web::$BIT_ES_PAGINA_PRINCIPAL = 'false';
			imagen_devolucion_web::$BIT_ES_PAGINA_FORM = 'true';
				
			imagen_devolucion_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {imagen_devolucion_constante,imagen_devolucion_constante1} from './webroot/js/JavaScript/contabilidad/inventario/imagen_devolucion/js/util/imagen_devolucion_constante.js?random=1';
			import {imagen_devolucion_funcion,imagen_devolucion_funcion1} from './webroot/js/JavaScript/contabilidad/inventario/imagen_devolucion/js/util/imagen_devolucion_funcion.js?random=1';
			
			let imagen_devolucion_constante2 = new imagen_devolucion_constante();
			
			imagen_devolucion_constante2.STR_NOMBRE_PAGINA="<?php echo(imagen_devolucion_web::$STR_NOMBRE_PAGINA); ?>";
			imagen_devolucion_constante2.STR_TYPE_ON_LOADimagen_devolucion="<?php echo(imagen_devolucion_web::$STR_TYPE_ONLOAD); ?>";
			imagen_devolucion_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(imagen_devolucion_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			imagen_devolucion_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(imagen_devolucion_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			imagen_devolucion_constante2.STR_ACTION="<?php echo(imagen_devolucion_web::$STR_ACTION); ?>";
			imagen_devolucion_constante2.STR_ES_POPUP="<?php echo(imagen_devolucion_web::$STR_ES_POPUP); ?>";
			imagen_devolucion_constante2.STR_ES_BUSQUEDA="<?php echo(imagen_devolucion_web::$STR_ES_BUSQUEDA); ?>";
			imagen_devolucion_constante2.STR_FUNCION_JS="<?php echo(imagen_devolucion_web::$STR_FUNCION_JS); ?>";
			imagen_devolucion_constante2.BIG_ID_ACTUAL="<?php echo(imagen_devolucion_web::$BIG_ID_ACTUAL); ?>";
			imagen_devolucion_constante2.BIG_ID_OPCION="<?php echo(imagen_devolucion_web::$BIG_ID_OPCION); ?>";
			imagen_devolucion_constante2.STR_OBJETO_JS="<?php echo(imagen_devolucion_web::$STR_OBJETO_JS); ?>";
			imagen_devolucion_constante2.STR_ES_RELACIONES="<?php echo(imagen_devolucion_web::$STR_ES_RELACIONES); ?>";
			imagen_devolucion_constante2.STR_ES_RELACIONADO="<?php echo(imagen_devolucion_web::$STR_ES_RELACIONADO); ?>";
			imagen_devolucion_constante2.STR_ES_SUB_PAGINA="<?php echo(imagen_devolucion_web::$STR_ES_SUB_PAGINA); ?>";
			imagen_devolucion_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(imagen_devolucion_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			imagen_devolucion_constante2.BIT_ES_PAGINA_FORM=<?php echo(imagen_devolucion_web::$BIT_ES_PAGINA_FORM); ?>;
			imagen_devolucion_constante2.STR_SUFIJO="<?php echo(imagen_devolucion_web::$STR_SUF); ?>";//imagen_devolucion
			imagen_devolucion_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(imagen_devolucion_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//imagen_devolucion
			
			imagen_devolucion_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(imagen_devolucion_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			imagen_devolucion_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($imagen_devolucion_web1->moduloActual->getnombre()); ?>";
			imagen_devolucion_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(imagen_devolucion_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			imagen_devolucion_constante2.BIT_ES_LOAD_NORMAL=true;
			/*imagen_devolucion_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			imagen_devolucion_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.imagen_devolucion_constante2 = imagen_devolucion_constante2;
			
		</script>
		
		<?php if(imagen_devolucion_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.imagen_devolucion_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.imagen_devolucion_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="imagen_devolucionActual" ></a>
	
	<div id="divResumenimagen_devolucionActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(imagen_devolucion_web::$STR_ES_RELACIONADO=='false') {?>
		
		<div id="header" >
		
			<div id="banner">
				<span id="spanTituloBanner" class="titulobanner"></span>
			</div> <!-- banner -->
					
			<div id="subheader" class="links">  
			
						
			</div> <!-- sub-header -->
			
			
		</div> <!-- header -->
		
		<?php } ?>
		
		<div id="main">
		

			<?php if(imagen_devolucion_web::$STR_ES_RELACIONADO=='false') {?>
			
			
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(imagen_devolucion_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(imagen_devolucion_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divimagen_devolucionPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblimagen_devolucionPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmimagen_devolucionAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnimagen_devolucionAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="imagen_devolucion_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnimagen_devolucionAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmimagen_devolucionAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblimagen_devolucionPopupAjaxWebPart -->
		</div> <!-- divimagen_devolucionPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->		
		
		
		
			
<tr id="trimagen_devolucionElementosFormulario">
	<td>
		<div id="divMantenimientoimagen_devolucionAjaxWebPart" title="IMAGENES DEVOLUCION" style="height: 90%;width: 90%;position: relative;top: 30px;left: 30px;">
			<form id="frmMantenimientoimagen_devolucion" name="frmMantenimientoimagen_devolucion">

			</br>

			<?php if(imagen_devolucion_web::$STR_ES_RELACIONES=='false' ) {?>
			</br>
			<?php } ?>

			<!-- SECCION/TOOLBAR -->
			<table id="tblimagen_devolucionToolBarFormularioExterior" style="width: 65%">
				<tr style="display:table-row">
					<td align="center">

						<table id="tblimagen_devolucionToolBarFormulario" style="text-align: center"  style="display:table-row">
							<tr>
								<td id="tdimagen_devolucionActualizarToolBar" style="visibility:visible">
									<img id="imgActualizarToolBarimagen_devolucion" name="imgActualizarToolBarimagen_devolucion" title="ACTUALIZAR Imagenes Devolucion ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/actualizar.gif" width="25" height="25"/>
								</td>
								<td id="tdimagen_devolucionEliminarToolBar" style="visibility:visible">
									<img id="imgEliminarToolBarimagen_devolucion" name="imgEliminarToolBarimagen_devolucion" title="ELIMINAR Imagenes Devolucion ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/eliminar.gif" width="25" height="25"/>
								</td>
								<td id="tdimagen_devolucionCancelarToolBar" style="visibility:visible">
									<img id="imgCancelarToolBarimagen_devolucion" name="imgCancelarToolBarimagen_devolucion" title="CANCELAR Imagenes Devolucion ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/cancelar.gif" width="25" height="25"/>
								</td>
								<td id="tdimagen_devolucionRelacionesToolBar" style="display:table-row">
									<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/xexpand.png" width="25" height="25" onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('tblCamposOcultosimagen_devolucion',this,'../')"/>
								</td>
							</tr>
						</table> <!-- tblimagen_devolucionToolBarFormulario -->

					</td>
				</tr>
			</table> <!-- tblimagen_devolucionToolBarFormularioExterior -->

			<table id="tblimagen_devolucionElementos">
			<tr id="trimagen_devolucionElementos" class="elementos" style="display:table-row">
			<td align="center">

			<a id="Campos"></a>

				<?php if(imagen_devolucion_web::$STR_ES_RELACIONES=='false' ) {?>
				<div id="divFlechaArribaElementos" align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
					<span></span>
				</div>
				<?php } ?>

				<!-- SECCION/FORMULARIO -->
				<table id="tblElementosimagen_devolucion" class="elementos" style="width: 300px; padding: 0px; border-spacing: 0px; border-collapse: collapse; text-align: center;">
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
						<td id="td_title-nro_devolucion" class="titulocampo">
							<label class="form-label">Nro Devolucion.(*)</label>
						</td>
						<td id="td_control-nro_devolucion" align="left" class="controlcampo">
							<input id="form-nro_devolucion" name="form-nro_devolucion" type="text" class="form-control"  placeholder="Nro Devolucion"  title="Nro Devolucion"    size="10"  maxlength="10"/>
							<span id="spanstrMensajenro_devolucion" class="mensajeerror"></span>
						</td>
					</tr>
				</table> <!-- tblElementosimagen_devolucion -->

				<!-- SECCION/OCULTOS -->
				<table id="tblCamposOcultosimagen_devolucion" class="elementos" style="display: table-row;">
					<caption class="busquedacabecera">
						<span>Campos Ocultos</span>
					</caption>
				</table> <!-- tblCamposOcultosimagen_devolucion -->

			</td></tr> <!-- trimagen_devolucionElementos -->
			</table> <!-- tblimagen_devolucionElementos -->
			</form> <!-- frmMantenimientoimagen_devolucion -->


			

				<form id="frmAccionesMantenimientoimagen_devolucion" name="frmAccionesMantenimientoimagen_devolucion">

			<?php if(imagen_devolucion_web::$STR_ES_BUSQUEDA=='false' ) {?>
			<table id="tblimagen_devolucionAcciones" class="elementos" style="text-align: center">
		<tr id="trimagen_devolucionAcciones" class="elementos" style="display:table-row">
			<td align="center">
				<a id="Acciones" ></a>

				<?php if(imagen_devolucion_web::$STR_ES_RELACIONES=='false' ) {?>
				<div align="right">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
				<?php } ?>

					<!-- SECCION/BOTONES -->
					<table id="tblAccionesMantenimientoimagen_devolucion" class="busqueda" style="width: 50%;text-align: center">

						<?php if(imagen_devolucion_web::$STR_ES_RELACIONES=='false' ) {?>
						<!--
						<caption class="busquedacabecera">
							<span>Acciones</span>
						</caption>
						-->
						<?php } ?>

						<tr id="trAccionesMantenimientoimagen_devolucionBasicos">
							<td id="tdbtnNuevoimagen_devolucion" style="visibility:visible">
								<div id="divNuevoimagen_devolucion" style="display:table-row">
									<input type="button" id="btnNuevoimagen_devolucion" name="btnNuevoimagen_devolucion" value="NUEVO" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnActualizarimagen_devolucion" style="visibility:visible">
								<div id="divActualizarimagen_devolucion" style="display:table-row">
									<input type="button" id="btnActualizarimagen_devolucion" name="btnActualizarimagen_devolucion" title="ACTUALIZAR Imagenes Devolucion ACTUAL" value="Actualizar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnEliminarimagen_devolucion" style="visibility:visible">
								<div id="divEliminarimagen_devolucion" style="display:table-row">
									<input type="button" id="btnEliminarimagen_devolucion" name="btnEliminarimagen_devolucion" title="ELIMINAR Imagenes Devolucion ACTUAL" value="Eliminar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnImprimirimagen_devolucion" style="visibility:visible">
								<input type="button" id="btnImprimirimagen_devolucion" name="btnImprimirimagen_devolucion" title="IMPRIMIR PAGINA Imagenes Devolucion ACTUAL" value="Imp. Datos" class="btn btn-primary"/>
							</td>
							<td id="tdbtnCancelarimagen_devolucion" style="visibility:visible">
								<input type="button" id="btnCancelarimagen_devolucion" name="btnCancelarimagen_devolucion" title="CANCELAR Imagenes Devolucion ACTUAL" value="Cancelar" class="btn btn-primary"/>
							</td>
						</tr>
						<tr id="trAccionesMantenimientoimagen_devolucionGuardar" style="display:none">
							<td id="tdbtnGuardarCambiosimagen_devolucion" colspan="4" align="center" style="visibility:visible">
								<div id="divGuardarCambiosimagen_devolucion" style="display:table-row">
									<input type="button" id="btnGuardarCambiosFormularioimagen_devolucion" name="btnGuardarCambiosFormularioimagen_devolucion" title="GUARDAR" value="GUADAR CAMBIOS" class="btn btn-primary"/>
								</div>
							</td>
						</tr>
					</table> <!-- tblAccionesMantenimientoimagen_devolucion -->
			</td>
		</tr> <!-- trimagen_devolucionAcciones -->
		<?php if(imagen_devolucion_web::$STR_ES_RELACIONADO=='false' ) {?>
		<tr id="trimagen_devolucionParametrosAcciones" class="impresion"  style="display:table-row">
			<td align="center">
				<!-- SECCION/POST -->
				<table id="tblimagen_devolucionParametrosAcciones" style="text-align: center;border: 0px solid black;padding: 0px; border-spacing: 0px">
					<caption class="busquedacabecera" style="padding: 0px;caption-side: top;">
						<span>Acciones Extra/Post</span>
					</caption>
					<tr id="trimagen_devolucionFilaParametrosAcciones">
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
				</table> <!-- tblimagen_devolucionParametrosAcciones -->
			</td>
		</tr> <!-- trimagen_devolucionParametrosAcciones -->
		<?php }?>
		<tr id="trimagen_devolucionMensajes" class="mensajes">
			<td align="center">
				<a id="Mensajes"></a>
			</td>
		</tr> <!-- trimagen_devolucionMensajes -->
			</table> <!-- tblimagen_devolucionAcciones -->
			<?php } ?>
			</form> <!-- frmMantenimientoimagen_devolucion -->
			</div> <!-- divMantenimientoimagen_devolucionAjaxWebPart -->
		</td>
	</tr> <!-- trimagen_devolucionElementosFormulario/super -->
		<?php if(imagen_devolucion_web::$STR_ES_RELACIONADO=='false' ) {?>

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
			
				import {imagen_devolucion_webcontrol,imagen_devolucion_webcontrol1} from './webroot/js/JavaScript/contabilidad/inventario/imagen_devolucion/js/webcontrol/imagen_devolucion_form_webcontrol.js?random=1';
				
				imagen_devolucion_webcontrol1.setimagen_devolucion_constante(window.imagen_devolucion_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(imagen_devolucion_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

