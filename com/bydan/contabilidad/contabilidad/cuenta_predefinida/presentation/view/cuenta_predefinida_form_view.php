<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\contabilidad\cuenta_predefinida\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Cuentas Predefinidas Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/contabilidad/cuenta_predefinida/util/cuenta_predefinida_carga.php');
	use com\bydan\contabilidad\contabilidad\cuenta_predefinida\util\cuenta_predefinida_carga;
	
	//include_once('com/bydan/contabilidad/contabilidad/cuenta_predefinida/presentation/view/cuenta_predefinida_web.php');
	//use com\bydan\contabilidad\contabilidad\cuenta_predefinida\presentation\view\cuenta_predefinida_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	cuenta_predefinida_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	cuenta_predefinida_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$cuenta_predefinida_web1= new cuenta_predefinida_web();	
	$cuenta_predefinida_web1->cargarDatosGenerales();
	
	//$moduloActual=$cuenta_predefinida_web1->moduloActual;
	//$usuarioActual=$cuenta_predefinida_web1->usuarioActual;
	//$sessionBase=$cuenta_predefinida_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$cuenta_predefinida_web1->parametroGeneralUsuarioActual;
	
	
		
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
		
		
			<script type="module" src="webroot/js/JavaScript/contabilidad/contabilidad/cuenta_predefinida/js/util/cuenta_predefinida_form_funcion.js?random=1"></script>
						
		
		
		<?php 
			
		
			cuenta_predefinida_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					cuenta_predefinida_web::$GET_POST=$_GET;
				} else {
					cuenta_predefinida_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			cuenta_predefinida_web::$STR_NOMBRE_PAGINA = 'cuenta_predefinida_form_view.php';
			cuenta_predefinida_web::$BIT_ES_PAGINA_PRINCIPAL = 'false';
			cuenta_predefinida_web::$BIT_ES_PAGINA_FORM = 'true';
				
			cuenta_predefinida_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {cuenta_predefinida_constante,cuenta_predefinida_constante1} from './webroot/js/JavaScript/contabilidad/contabilidad/cuenta_predefinida/js/util/cuenta_predefinida_constante.js?random=1';
			import {cuenta_predefinida_funcion,cuenta_predefinida_funcion1} from './webroot/js/JavaScript/contabilidad/contabilidad/cuenta_predefinida/js/util/cuenta_predefinida_funcion.js?random=1';
			
			let cuenta_predefinida_constante2 = new cuenta_predefinida_constante();
			
			cuenta_predefinida_constante2.STR_NOMBRE_PAGINA="<?php echo(cuenta_predefinida_web::$STR_NOMBRE_PAGINA); ?>";
			cuenta_predefinida_constante2.STR_TYPE_ON_LOADcuenta_predefinida="<?php echo(cuenta_predefinida_web::$STR_TYPE_ONLOAD); ?>";
			cuenta_predefinida_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(cuenta_predefinida_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			cuenta_predefinida_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(cuenta_predefinida_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			cuenta_predefinida_constante2.STR_ACTION="<?php echo(cuenta_predefinida_web::$STR_ACTION); ?>";
			cuenta_predefinida_constante2.STR_ES_POPUP="<?php echo(cuenta_predefinida_web::$STR_ES_POPUP); ?>";
			cuenta_predefinida_constante2.STR_ES_BUSQUEDA="<?php echo(cuenta_predefinida_web::$STR_ES_BUSQUEDA); ?>";
			cuenta_predefinida_constante2.STR_FUNCION_JS="<?php echo(cuenta_predefinida_web::$STR_FUNCION_JS); ?>";
			cuenta_predefinida_constante2.BIG_ID_ACTUAL="<?php echo(cuenta_predefinida_web::$BIG_ID_ACTUAL); ?>";
			cuenta_predefinida_constante2.BIG_ID_OPCION="<?php echo(cuenta_predefinida_web::$BIG_ID_OPCION); ?>";
			cuenta_predefinida_constante2.STR_OBJETO_JS="<?php echo(cuenta_predefinida_web::$STR_OBJETO_JS); ?>";
			cuenta_predefinida_constante2.STR_ES_RELACIONES="<?php echo(cuenta_predefinida_web::$STR_ES_RELACIONES); ?>";
			cuenta_predefinida_constante2.STR_ES_RELACIONADO="<?php echo(cuenta_predefinida_web::$STR_ES_RELACIONADO); ?>";
			cuenta_predefinida_constante2.STR_ES_SUB_PAGINA="<?php echo(cuenta_predefinida_web::$STR_ES_SUB_PAGINA); ?>";
			cuenta_predefinida_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(cuenta_predefinida_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			cuenta_predefinida_constante2.BIT_ES_PAGINA_FORM=<?php echo(cuenta_predefinida_web::$BIT_ES_PAGINA_FORM); ?>;
			cuenta_predefinida_constante2.STR_SUFIJO="<?php echo(cuenta_predefinida_web::$STR_SUF); ?>";//cuenta_predefinida
			cuenta_predefinida_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(cuenta_predefinida_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//cuenta_predefinida
			
			cuenta_predefinida_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(cuenta_predefinida_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			cuenta_predefinida_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($cuenta_predefinida_web1->moduloActual->getnombre()); ?>";
			cuenta_predefinida_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(cuenta_predefinida_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			cuenta_predefinida_constante2.BIT_ES_LOAD_NORMAL=true;
			/*cuenta_predefinida_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			cuenta_predefinida_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.cuenta_predefinida_constante2 = cuenta_predefinida_constante2;
			
		</script>
		
		<?php if(cuenta_predefinida_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.cuenta_predefinida_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.cuenta_predefinida_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="cuenta_predefinidaActual" ></a>
	
	<div id="divResumencuenta_predefinidaActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(cuenta_predefinida_web::$STR_ES_RELACIONADO=='false') {?>
		
		<div id="header" >
		
			<div id="banner">
				<span id="spanTituloBanner" class="titulobanner"></span>
			</div> <!-- banner -->
					
			<div id="subheader" class="links">  
			
						
			</div> <!-- sub-header -->
			
			
		</div> <!-- header -->
		
		<?php } ?>
		
		<div id="main">
		

			<?php if(cuenta_predefinida_web::$STR_ES_RELACIONADO=='false') {?>
			
			
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(cuenta_predefinida_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(cuenta_predefinida_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divcuenta_predefinidaPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblcuenta_predefinidaPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmcuenta_predefinidaAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btncuenta_predefinidaAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="cuenta_predefinida_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btncuenta_predefinidaAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmcuenta_predefinidaAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblcuenta_predefinidaPopupAjaxWebPart -->
		</div> <!-- divcuenta_predefinidaPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->		
		
		
		
			
<tr id="trcuenta_predefinidaElementosFormulario">
	<td>
		<div id="divMantenimientocuenta_predefinidaAjaxWebPart" title="CUENTAS PREDEFINIDAS" style="height: 90%;width: 90%;position: relative;top: 30px;left: 30px;">
			<form id="frmMantenimientocuenta_predefinida" name="frmMantenimientocuenta_predefinida">

			</br>

			<?php if(cuenta_predefinida_web::$STR_ES_RELACIONES=='false' ) {?>
			</br>
			<?php } ?>

			<!-- SECCION/TOOLBAR -->
			<table id="tblcuenta_predefinidaToolBarFormularioExterior" style="width: 65%">
				<tr style="display:table-row">
					<td align="center">

						<table id="tblcuenta_predefinidaToolBarFormulario" style="text-align: center"  style="display:table-row">
							<tr>
								<td id="tdcuenta_predefinidaActualizarToolBar" style="visibility:visible">
									<img id="imgActualizarToolBarcuenta_predefinida" name="imgActualizarToolBarcuenta_predefinida" title="ACTUALIZAR Cuentas Predefinidas ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/actualizar.gif" width="25" height="25"/>
								</td>
								<td id="tdcuenta_predefinidaEliminarToolBar" style="visibility:visible">
									<img id="imgEliminarToolBarcuenta_predefinida" name="imgEliminarToolBarcuenta_predefinida" title="ELIMINAR Cuentas Predefinidas ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/eliminar.gif" width="25" height="25"/>
								</td>
								<td id="tdcuenta_predefinidaCancelarToolBar" style="visibility:visible">
									<img id="imgCancelarToolBarcuenta_predefinida" name="imgCancelarToolBarcuenta_predefinida" title="CANCELAR Cuentas Predefinidas ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/cancelar.gif" width="25" height="25"/>
								</td>
								<td id="tdcuenta_predefinidaRelacionesToolBar" style="display:table-row">
									<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/xexpand.png" width="25" height="25" onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('tblCamposOcultoscuenta_predefinida',this,'../')"/>
								</td>
							</tr>
						</table> <!-- tblcuenta_predefinidaToolBarFormulario -->

					</td>
				</tr>
			</table> <!-- tblcuenta_predefinidaToolBarFormularioExterior -->

			<table id="tblcuenta_predefinidaElementos">
			<tr id="trcuenta_predefinidaElementos" class="elementos" style="display:table-row">
			<td align="center">

			<a id="Campos"></a>

				<?php if(cuenta_predefinida_web::$STR_ES_RELACIONES=='false' ) {?>
				<div id="divFlechaArribaElementos" align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
					<span></span>
				</div>
				<?php } ?>

				<!-- SECCION/FORMULARIO -->
				<table id="tblElementoscuenta_predefinida" class="elementos" style="width: 400px; padding: 0px; border-spacing: 0px; border-collapse: collapse; text-align: left;">
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
						<td id="td_title-id_tipo_cuenta_predefinida" class="titulocampo">
							<label class="form-label">Tipo Cuenta Predefinida.(*)</label>
						</td>
						<td id="td_control-id_tipo_cuenta_predefinida" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_tipo_cuenta_predefinida" name="form-id_tipo_cuenta_predefinida" title="Tipo Cuenta Predefinida" ></select></td>
									<td><a><img id="form-id_tipo_cuenta_predefinida_img" name="form-id_tipo_cuenta_predefinida_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_tipo_cuenta_predefinida_img_busqueda" name="form-id_tipo_cuenta_predefinida_img_busqueda" title="Buscar Tipo Cuenta" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_tipo_cuenta_predefinida" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_5">
						<td id="td_title-id_tipo_cuenta" class="titulocampo">
							<label class="form-label">Tipo Cuenta.(*)</label>
						</td>
						<td id="td_control-id_tipo_cuenta" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_tipo_cuenta" name="form-id_tipo_cuenta" title="Tipo Cuenta" ></select></td>
									<td><img id="form-id_tipo_cuenta_img_busqueda" name="form-id_tipo_cuenta_img_busqueda" title="Buscar Tipo Cuenta" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_tipo_cuenta" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_6">
						<td id="td_title-id_tipo_nivel_cuenta" class="titulocampo">
							<label class="form-label">Tipo Nivel Cuenta.(*)</label>
						</td>
						<td id="td_control-id_tipo_nivel_cuenta" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_tipo_nivel_cuenta" name="form-id_tipo_nivel_cuenta" title="Tipo Nivel Cuenta" ></select></td>
									<td><img id="form-id_tipo_nivel_cuenta_img_busqueda" name="form-id_tipo_nivel_cuenta_img_busqueda" title="Buscar Tipo Nivel Cuenta" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_tipo_nivel_cuenta" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_7">
						<td id="td_title-codigo_tabla" class="titulocampo">
							<label class="form-label">Codigo Tabla</label>
						</td>
						<td id="td_control-codigo_tabla" align="left" class="controlcampo">
							<input id="form-codigo_tabla" name="form-codigo_tabla" type="text" class="form-control"  placeholder="Codigo Tabla"  title="Codigo Tabla"    size="10"  maxlength="10"/>
							<span id="spanstrMensajecodigo_tabla" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_8">
						<td id="td_title-codigo_cuenta" class="titulocampo">
							<label class="form-label">Codigo Cuenta.(*)</label>
						</td>
						<td id="td_control-codigo_cuenta" align="left" class="controlcampo">
							<input id="form-codigo_cuenta" name="form-codigo_cuenta" type="text" class="form-control"  placeholder="Codigo Cuenta"  title="Codigo Cuenta"    size="20"  maxlength="20"/>
							<span id="spanstrMensajecodigo_cuenta" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_9">
						<td id="td_title-nombre_cuenta" class="titulocampo">
							<label class="form-label">Nombre Cuenta.(*)</label>
						</td>
						<td id="td_control-nombre_cuenta" align="left" class="controlcampo">
							<textarea id="form-nombre_cuenta" name="form-nombre_cuenta" class="form-control"  placeholder="Nombre Cuenta"  title="Nombre Cuenta"   style="font-size: 13px;" rows="2" cols="25" size="20" ></textarea>
							<span id="spanstrMensajenombre_cuenta" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_10">
						<td id="td_title-monto_minimo" class="titulocampo">
							<label class="form-label">Monto Minimo.(*)</label>
						</td>
						<td id="td_control-monto_minimo" align="left" class="controlcampo">
							<input id="form-monto_minimo" name="form-monto_minimo" type="text" class="form-control"  placeholder="Monto Minimo"  title="Monto Minimo"    maxlength="18" size="12" >
							<span id="spanstrMensajemonto_minimo" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_11">
						<td id="td_title-valor_retencion" class="titulocampo">
							<label class="form-label">Valor Retencion.(*)</label>
						</td>
						<td id="td_control-valor_retencion" align="left" class="controlcampo">
							<input id="form-valor_retencion" name="form-valor_retencion" type="text" class="form-control"  placeholder="Valor Retencion"  title="Valor Retencion"    maxlength="18" size="12" >
							<span id="spanstrMensajevalor_retencion" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_12">
						<td id="td_title-balance" class="titulocampo">
							<label class="form-label">Balance.(*)</label>
						</td>
						<td id="td_control-balance" align="left" class="controlcampo">
							<input id="form-balance" name="form-balance" type="text" class="form-control"  placeholder="Balance"  title="Balance"    maxlength="24" size="12" >
							<span id="spanstrMensajebalance" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_13">
						<td id="td_title-porcentaje_base" class="titulocampo">
							<label class="form-label">Porcentaje Base.(*)</label>
						</td>
						<td id="td_control-porcentaje_base" align="left" class="controlcampo">
							<input id="form-porcentaje_base" name="form-porcentaje_base" type="text" class="form-control"  placeholder="Porcentaje Base"  title="Porcentaje Base"    maxlength="18" size="12" >
							<span id="spanstrMensajeporcentaje_base" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_14">
						<td id="td_title-seleccionar" class="titulocampo">
							<label class="form-label">Seleccionar.(*)</label>
						</td>
						<td id="td_control-seleccionar" align="left" class="controlcampo">
							<input id="form-seleccionar" name="form-seleccionar" type="text" class="form-control"  placeholder="Seleccionar"  title="Seleccionar"    maxlength="10" size="10" >
							<span id="spanstrMensajeseleccionar" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_15">
						<td id="td_title-centro_costos" class="titulocampo">
							<label class="form-label">Centro Costos</label>
						</td>
						<td id="td_control-centro_costos" align="left" class="controlcampo">
							<input id="form-centro_costos" name="form-centro_costos" type="checkbox" >
							<span id="spanstrMensajecentro_costos" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_16">
						<td id="td_title-retencion" class="titulocampo">
							<label class="form-label">Retencion</label>
						</td>
						<td id="td_control-retencion" align="left" class="controlcampo">
							<input id="form-retencion" name="form-retencion" type="checkbox" >
							<span id="spanstrMensajeretencion" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_17">
						<td id="td_title-usa_base" class="titulocampo">
							<label class="form-label">Usa Base</label>
						</td>
						<td id="td_control-usa_base" align="left" class="controlcampo">
							<input id="form-usa_base" name="form-usa_base" type="checkbox" >
							<span id="spanstrMensajeusa_base" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_18">
						<td id="td_title-nit" class="titulocampo">
							<label class="form-label">Nit</label>
						</td>
						<td id="td_control-nit" align="left" class="controlcampo">
							<input id="form-nit" name="form-nit" type="checkbox" >
							<span id="spanstrMensajenit" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_19">
						<td id="td_title-modifica" class="titulocampo">
							<label class="form-label">Modifica</label>
						</td>
						<td id="td_control-modifica" align="left" class="controlcampo">
							<input id="form-modifica" name="form-modifica" type="checkbox" >
							<span id="spanstrMensajemodifica" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_20">
						<td id="td_title-ultima_transaccion" class="titulocampo">
							<label class="form-label">Ultima Transaccion.(*)</label>
						</td>
						<td id="td_control-ultima_transaccion" align="left" class="controlcampo">
							<input id="form-ultima_transaccion" name="form-ultima_transaccion" type="text" class="form-control"  placeholder="Ultima Transaccion"  title="Ultima Transaccion"    size="10" >
							<span id="spanstrMensajeultima_transaccion" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_21">
						<td id="td_title-comenta1" class="titulocampo">
							<label class="form-label">Comenta1</label>
						</td>
						<td id="td_control-comenta1" align="left" class="controlcampo">
							<textarea id="form-comenta1" name="form-comenta1" class="form-control"  placeholder="Comenta1"  title="Comenta1"   style="font-size: 13px;" rows="2" cols="25" size="20" ></textarea>
							<span id="spanstrMensajecomenta1" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_22">
						<td id="td_title-comenta2" class="titulocampo">
							<label class="form-label">Comenta2</label>
						</td>
						<td id="td_control-comenta2" align="left" class="controlcampo">
							<textarea id="form-comenta2" name="form-comenta2" class="form-control"  placeholder="Comenta2"  title="Comenta2"   style="font-size: 13px;" rows="2" cols="25" size="20" ></textarea>
							<span id="spanstrMensajecomenta2" class="mensajeerror"></span>
						</td>
					</tr>
				</table> <!-- tblElementoscuenta_predefinida -->

				<!-- SECCION/OCULTOS -->
				<table id="tblCamposOcultoscuenta_predefinida" class="elementos" style="display: table-row;">
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
					
				</table> <!-- tblCamposOcultoscuenta_predefinida -->

			</td></tr> <!-- trcuenta_predefinidaElementos -->
			</table> <!-- tblcuenta_predefinidaElementos -->
			</form> <!-- frmMantenimientocuenta_predefinida -->


			

				<form id="frmAccionesMantenimientocuenta_predefinida" name="frmAccionesMantenimientocuenta_predefinida">

			<?php if(cuenta_predefinida_web::$STR_ES_BUSQUEDA=='false' ) {?>
			<table id="tblcuenta_predefinidaAcciones" class="elementos" style="text-align: center">
		<tr id="trcuenta_predefinidaAcciones" class="elementos" style="display:table-row">
			<td align="center">
				<a id="Acciones" ></a>

				<?php if(cuenta_predefinida_web::$STR_ES_RELACIONES=='false' ) {?>
				<div align="right">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
				<?php } ?>

					<!-- SECCION/BOTONES -->
					<table id="tblAccionesMantenimientocuenta_predefinida" class="busqueda" style="width: 50%;text-align: left">

						<?php if(cuenta_predefinida_web::$STR_ES_RELACIONES=='false' ) {?>
						<!--
						<caption class="busquedacabecera">
							<span>Acciones</span>
						</caption>
						-->
						<?php } ?>

						<tr id="trAccionesMantenimientocuenta_predefinidaBasicos">
							<td id="tdbtnNuevocuenta_predefinida" style="visibility:visible">
								<div id="divNuevocuenta_predefinida" style="display:table-row">
									<input type="button" id="btnNuevocuenta_predefinida" name="btnNuevocuenta_predefinida" value="NUEVO" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnActualizarcuenta_predefinida" style="visibility:visible">
								<div id="divActualizarcuenta_predefinida" style="display:table-row">
									<input type="button" id="btnActualizarcuenta_predefinida" name="btnActualizarcuenta_predefinida" title="ACTUALIZAR Cuentas Predefinidas ACTUAL" value="Actualizar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnEliminarcuenta_predefinida" style="visibility:visible">
								<div id="divEliminarcuenta_predefinida" style="display:table-row">
									<input type="button" id="btnEliminarcuenta_predefinida" name="btnEliminarcuenta_predefinida" title="ELIMINAR Cuentas Predefinidas ACTUAL" value="Eliminar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnImprimircuenta_predefinida" style="visibility:visible">
								<input type="button" id="btnImprimircuenta_predefinida" name="btnImprimircuenta_predefinida" title="IMPRIMIR PAGINA Cuentas Predefinidas ACTUAL" value="Imp. Datos" class="btn btn-primary"/>
							</td>
							<td id="tdbtnCancelarcuenta_predefinida" style="visibility:visible">
								<input type="button" id="btnCancelarcuenta_predefinida" name="btnCancelarcuenta_predefinida" title="CANCELAR Cuentas Predefinidas ACTUAL" value="Cancelar" class="btn btn-primary"/>
							</td>
						</tr>
						<tr id="trAccionesMantenimientocuenta_predefinidaGuardar" style="display:none">
							<td id="tdbtnGuardarCambioscuenta_predefinida" colspan="4" align="center" style="visibility:visible">
								<div id="divGuardarCambioscuenta_predefinida" style="display:table-row">
									<input type="button" id="btnGuardarCambiosFormulariocuenta_predefinida" name="btnGuardarCambiosFormulariocuenta_predefinida" title="GUARDAR" value="GUADAR CAMBIOS" class="btn btn-primary"/>
								</div>
							</td>
						</tr>
					</table> <!-- tblAccionesMantenimientocuenta_predefinida -->
			</td>
		</tr> <!-- trcuenta_predefinidaAcciones -->
		<?php if(cuenta_predefinida_web::$STR_ES_RELACIONADO=='false' ) {?>
		<tr id="trcuenta_predefinidaParametrosAcciones" class="impresion"  style="display:table-row">
			<td align="center">
				<!-- SECCION/POST -->
				<table id="tblcuenta_predefinidaParametrosAcciones" style="text-align: center;border: 0px solid black;padding: 0px; border-spacing: 0px">
					<caption class="busquedacabecera" style="padding: 0px;caption-side: top;">
						<span>Acciones Extra/Post</span>
					</caption>
					<tr id="trcuenta_predefinidaFilaParametrosAcciones">
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
				</table> <!-- tblcuenta_predefinidaParametrosAcciones -->
			</td>
		</tr> <!-- trcuenta_predefinidaParametrosAcciones -->
		<?php }?>
		<tr id="trcuenta_predefinidaMensajes" class="mensajes">
			<td align="center">
				<a id="Mensajes"></a>
			</td>
		</tr> <!-- trcuenta_predefinidaMensajes -->
			</table> <!-- tblcuenta_predefinidaAcciones -->
			<?php } ?>
			</form> <!-- frmMantenimientocuenta_predefinida -->
			</div> <!-- divMantenimientocuenta_predefinidaAjaxWebPart -->
		</td>
	</tr> <!-- trcuenta_predefinidaElementosFormulario/super -->
		<?php if(cuenta_predefinida_web::$STR_ES_RELACIONADO=='false' ) {?>

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
			
				import {cuenta_predefinida_webcontrol,cuenta_predefinida_webcontrol1} from './webroot/js/JavaScript/contabilidad/contabilidad/cuenta_predefinida/js/webcontrol/cuenta_predefinida_form_webcontrol.js?random=1';
				
				cuenta_predefinida_webcontrol1.setcuenta_predefinida_constante(window.cuenta_predefinida_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(cuenta_predefinida_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

