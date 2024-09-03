<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\cuentaspagar\cuenta_pagar\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Cuenta Pagar Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/cuentaspagar/cuenta_pagar/util/cuenta_pagar_carga.php');
	use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\util\cuenta_pagar_carga;
	
	//include_once('com/bydan/contabilidad/cuentaspagar/cuenta_pagar/presentation/view/cuenta_pagar_web.php');
	//use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\presentation\view\cuenta_pagar_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	cuenta_pagar_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	cuenta_pagar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$cuenta_pagar_web1= new cuenta_pagar_web();	
	$cuenta_pagar_web1->cargarDatosGenerales();
	
	//$moduloActual=$cuenta_pagar_web1->moduloActual;
	//$usuarioActual=$cuenta_pagar_web1->usuarioActual;
	//$sessionBase=$cuenta_pagar_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$cuenta_pagar_web1->parametroGeneralUsuarioActual;
	
	
		
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
		
		
			<script type="module" src="webroot/js/JavaScript/contabilidad/cuentaspagar/cuenta_pagar/js/util/cuenta_pagar_form_funcion.js?random=1"></script>
						
		
		
		<?php 
			
		
			cuenta_pagar_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					cuenta_pagar_web::$GET_POST=$_GET;
				} else {
					cuenta_pagar_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			cuenta_pagar_web::$STR_NOMBRE_PAGINA = 'cuenta_pagar_form_view.php';
			cuenta_pagar_web::$BIT_ES_PAGINA_PRINCIPAL = 'false';
			cuenta_pagar_web::$BIT_ES_PAGINA_FORM = 'true';
				
			cuenta_pagar_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {cuenta_pagar_constante,cuenta_pagar_constante1} from './webroot/js/JavaScript/contabilidad/cuentaspagar/cuenta_pagar/js/util/cuenta_pagar_constante.js?random=1';
			import {cuenta_pagar_funcion,cuenta_pagar_funcion1} from './webroot/js/JavaScript/contabilidad/cuentaspagar/cuenta_pagar/js/util/cuenta_pagar_funcion.js?random=1';
			
			let cuenta_pagar_constante2 = new cuenta_pagar_constante();
			
			cuenta_pagar_constante2.STR_NOMBRE_PAGINA="<?php echo(cuenta_pagar_web::$STR_NOMBRE_PAGINA); ?>";
			cuenta_pagar_constante2.STR_TYPE_ON_LOADcuenta_pagar="<?php echo(cuenta_pagar_web::$STR_TYPE_ONLOAD); ?>";
			cuenta_pagar_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(cuenta_pagar_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			cuenta_pagar_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(cuenta_pagar_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			cuenta_pagar_constante2.STR_ACTION="<?php echo(cuenta_pagar_web::$STR_ACTION); ?>";
			cuenta_pagar_constante2.STR_ES_POPUP="<?php echo(cuenta_pagar_web::$STR_ES_POPUP); ?>";
			cuenta_pagar_constante2.STR_ES_BUSQUEDA="<?php echo(cuenta_pagar_web::$STR_ES_BUSQUEDA); ?>";
			cuenta_pagar_constante2.STR_FUNCION_JS="<?php echo(cuenta_pagar_web::$STR_FUNCION_JS); ?>";
			cuenta_pagar_constante2.BIG_ID_ACTUAL="<?php echo(cuenta_pagar_web::$BIG_ID_ACTUAL); ?>";
			cuenta_pagar_constante2.BIG_ID_OPCION="<?php echo(cuenta_pagar_web::$BIG_ID_OPCION); ?>";
			cuenta_pagar_constante2.STR_OBJETO_JS="<?php echo(cuenta_pagar_web::$STR_OBJETO_JS); ?>";
			cuenta_pagar_constante2.STR_ES_RELACIONES="<?php echo(cuenta_pagar_web::$STR_ES_RELACIONES); ?>";
			cuenta_pagar_constante2.STR_ES_RELACIONADO="<?php echo(cuenta_pagar_web::$STR_ES_RELACIONADO); ?>";
			cuenta_pagar_constante2.STR_ES_SUB_PAGINA="<?php echo(cuenta_pagar_web::$STR_ES_SUB_PAGINA); ?>";
			cuenta_pagar_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(cuenta_pagar_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			cuenta_pagar_constante2.BIT_ES_PAGINA_FORM=<?php echo(cuenta_pagar_web::$BIT_ES_PAGINA_FORM); ?>;
			cuenta_pagar_constante2.STR_SUFIJO="<?php echo(cuenta_pagar_web::$STR_SUF); ?>";//cuenta_pagar
			cuenta_pagar_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(cuenta_pagar_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//cuenta_pagar
			
			cuenta_pagar_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(cuenta_pagar_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			cuenta_pagar_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($cuenta_pagar_web1->moduloActual->getnombre()); ?>";
			cuenta_pagar_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(cuenta_pagar_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			cuenta_pagar_constante2.BIT_ES_LOAD_NORMAL=true;
			/*cuenta_pagar_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			cuenta_pagar_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.cuenta_pagar_constante2 = cuenta_pagar_constante2;
			
		</script>
		
		<?php if(cuenta_pagar_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.cuenta_pagar_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.cuenta_pagar_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="cuenta_pagarActual" ></a>
	
	<div id="divResumencuenta_pagarActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(cuenta_pagar_web::$STR_ES_RELACIONADO=='false') {?>
		
		<div id="header" >
		
			<div id="banner">
				<span id="spanTituloBanner" class="titulobanner"></span>
			</div> <!-- banner -->
					
			<div id="subheader" class="links">  
			
						
			</div> <!-- sub-header -->
			
			
		</div> <!-- header -->
		
		<?php } ?>
		
		<div id="main">
		

			<?php if(cuenta_pagar_web::$STR_ES_RELACIONADO=='false') {?>
			
			
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(cuenta_pagar_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(cuenta_pagar_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divcuenta_pagarPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblcuenta_pagarPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmcuenta_pagarAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btncuenta_pagarAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="cuenta_pagar_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btncuenta_pagarAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmcuenta_pagarAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblcuenta_pagarPopupAjaxWebPart -->
		</div> <!-- divcuenta_pagarPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->		
		
		
		
			
<tr id="trcuenta_pagarElementosFormulario">
	<td>
		<div id="divMantenimientocuenta_pagarAjaxWebPart" title="CUENTA PAGAR" style="height: 90%;width: 90%;position: relative;top: 30px;left: 30px;">
			<form id="frmMantenimientocuenta_pagar" name="frmMantenimientocuenta_pagar">

			</br>

			<?php if(cuenta_pagar_web::$STR_ES_RELACIONES=='false' ) {?>
			</br>
			<?php } ?>

			<!-- SECCION/TOOLBAR -->
			<table id="tblcuenta_pagarToolBarFormularioExterior" style="width: 65%">
				<tr style="display:table-row">
					<td align="center">

						<table id="tblcuenta_pagarToolBarFormulario" style="text-align: center"  style="display:table-row">
							<tr>
								<td id="tdcuenta_pagarActualizarToolBar" style="visibility:visible">
									<img id="imgActualizarToolBarcuenta_pagar" name="imgActualizarToolBarcuenta_pagar" title="ACTUALIZAR Cuenta Pagar ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/actualizar.gif" width="25" height="25"/>
								</td>
								<td id="tdcuenta_pagarEliminarToolBar" style="visibility:visible">
									<img id="imgEliminarToolBarcuenta_pagar" name="imgEliminarToolBarcuenta_pagar" title="ELIMINAR Cuenta Pagar ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/eliminar.gif" width="25" height="25"/>
								</td>
								<td id="tdcuenta_pagarCancelarToolBar" style="visibility:visible">
									<img id="imgCancelarToolBarcuenta_pagar" name="imgCancelarToolBarcuenta_pagar" title="CANCELAR Cuenta Pagar ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/cancelar.gif" width="25" height="25"/>
								</td>
								<td id="tdcuenta_pagarRelacionesToolBar" style="display:table-row">
									<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/xexpand.png" width="25" height="25" onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('tblCamposOcultoscuenta_pagar',this,'../')"/>
								</td>
							</tr>
						</table> <!-- tblcuenta_pagarToolBarFormulario -->

					</td>
				</tr>
			</table> <!-- tblcuenta_pagarToolBarFormularioExterior -->

			<table id="tblcuenta_pagarElementos">
			<tr id="trcuenta_pagarElementos" class="elementos" style="display:table-row">
			<td align="center">

			<a id="Campos"></a>

				<?php if(cuenta_pagar_web::$STR_ES_RELACIONES=='false' ) {?>
				<div id="divFlechaArribaElementos" align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
					<span></span>
				</div>
				<?php } ?>

				<!-- SECCION/FORMULARIO -->
				<table id="tblElementoscuenta_pagar" class="elementos" style="width: 400px; padding: 0px; border-spacing: 0px; border-collapse: collapse; text-align: left;">
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
						<td id="td_title-id_orden_compra" class="titulocampo">
							<label class="form-label"> Orden Compra</label>
						</td>
						<td id="td_control-id_orden_compra" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_orden_compra" name="form-id_orden_compra" title=" Orden Compra" ></select></td>
									<td><a><img id="form-id_orden_compra_img" name="form-id_orden_compra_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_orden_compra_img_busqueda" name="form-id_orden_compra_img_busqueda" title="Buscar Orden Compra" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_orden_compra" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_5">
						<td id="td_title-id_proveedor" class="titulocampo">
							<label class="form-label"> Proveedor.(*)</label>
						</td>
						<td id="td_control-id_proveedor" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_proveedor" name="form-id_proveedor" title=" Proveedor" ></select></td>
									<td><a><img id="form-id_proveedor_img" name="form-id_proveedor_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_proveedor_img_busqueda" name="form-id_proveedor_img_busqueda" title="Buscar Proveedor" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_proveedor" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_6">
						<td id="td_title-id_termino_pago_proveedor" class="titulocampo">
							<label class="form-label">Termino Pago Proveedor.(*)</label>
						</td>
						<td id="td_control-id_termino_pago_proveedor" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_termino_pago_proveedor" name="form-id_termino_pago_proveedor" title="Termino Pago Proveedor" ></select></td>
									<td><a><img id="form-id_termino_pago_proveedor_img" name="form-id_termino_pago_proveedor_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_termino_pago_proveedor_img_busqueda" name="form-id_termino_pago_proveedor_img_busqueda" title="Buscar Terminos Pago Proveedores" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_termino_pago_proveedor" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_7">
						<td id="td_title-numero" class="titulocampo">
							<label class="form-label">Numero.(*)</label>
						</td>
						<td id="td_control-numero" align="left" class="controlcampo">
							<input id="form-numero" name="form-numero" type="text" class="form-control"  placeholder="Numero"  title="Numero"    size="12"  maxlength="12"/>
							<span id="spanstrMensajenumero" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_8">
						<td id="td_title-fecha_emision" class="titulocampo">
							<label class="form-label">Fecha Emision.(*)</label>
						</td>
						<td id="td_control-fecha_emision" align="left" class="controlcampo">
							<input id="form-fecha_emision" name="form-fecha_emision" type="text" class="form-control"  placeholder="Fecha Emision"  title="Fecha Emision"    size="10" >
							<span id="spanstrMensajefecha_emision" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_9">
						<td id="td_title-fecha_vence" class="titulocampo">
							<label class="form-label">Fecha Vence.(*)</label>
						</td>
						<td id="td_control-fecha_vence" align="left" class="controlcampo">
							<input id="form-fecha_vence" name="form-fecha_vence" type="text" class="form-control"  placeholder="Fecha Vence"  title="Fecha Vence"    size="10" >
							<span id="spanstrMensajefecha_vence" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_10">
						<td id="td_title-fecha_ultimo_movimiento" class="titulocampo">
							<label class="form-label">Fecha Ultimo Mov..(*)</label>
						</td>
						<td id="td_control-fecha_ultimo_movimiento" align="left" class="controlcampo">
							<input id="form-fecha_ultimo_movimiento" name="form-fecha_ultimo_movimiento" type="text" class="form-control"  placeholder="Fecha Ultimo Mov."  title="Fecha Ultimo Mov."    size="10"  readonly="readonly">
							<span id="spanstrMensajefecha_ultimo_movimiento" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_11">
						<td id="td_title-monto" class="titulocampo">
							<label class="form-label">Monto.(*)</label>
						</td>
						<td id="td_control-monto" align="left" class="controlcampo">
							<input id="form-monto" name="form-monto" type="text" class="form-control"  placeholder="Monto"  title="Monto"    maxlength="18" size="12" >
							<span id="spanstrMensajemonto" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_12">
						<td id="td_title-saldo" class="titulocampo">
							<label class="form-label">Saldo.(*)</label>
						</td>
						<td id="td_control-saldo" align="left" class="controlcampo">
							<input id="form-saldo" name="form-saldo" type="text" class="form-control"  placeholder="Saldo"  title="Saldo"    maxlength="18" size="12"  readonly="readonly">
							<span id="spanstrMensajesaldo" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_13">
						<td id="td_title-porcentaje" class="titulocampo">
							<label class="form-label">% Interes.(*)</label>
						</td>
						<td id="td_control-porcentaje" align="left" class="controlcampo">
							<input id="form-porcentaje" name="form-porcentaje" type="text" class="form-control"  placeholder="% Interes"  title="% Interes"    maxlength="18" size="12" >
							<span id="spanstrMensajeporcentaje" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_14">
						<td id="td_title-descripcion" class="titulocampo">
							<label class="form-label">Descripcion</label>
						</td>
						<td id="td_control-descripcion" align="left" class="controlcampo">
							<textarea id="form-descripcion" name="form-descripcion" class="form-control"  placeholder="Descripcion"  title="Descripcion"   style="font-size: 13px;"  rows ="0" cols= "25"></textarea>
							<span id="spanstrMensajedescripcion" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_15">
						<td id="td_title-id_estado_cuentas_pagar" class="titulocampo">
							<label class="form-label"> Estado Cuentas Pagar.(*)</label>
						</td>
						<td id="td_control-id_estado_cuentas_pagar" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_estado_cuentas_pagar" name="form-id_estado_cuentas_pagar" title=" Estado Cuentas Pagar" ></select></td>
									<td><img id="form-id_estado_cuentas_pagar_img_busqueda" name="form-id_estado_cuentas_pagar_img_busqueda" title="Buscar Estado" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_estado_cuentas_pagar" class="mensajeerror"></span>
						</td>
					</tr>
				</table> <!-- tblElementoscuenta_pagar -->

				<!-- SECCION/OCULTOS -->
				<table id="tblCamposOcultoscuenta_pagar" class="elementos" style="display: table-row;">
					<caption class="busquedacabecera">
						<span>Campos Ocultos</span>
					</caption>
					
						<td id="td_title-id_empresa" class="titulocampo">
							<label class="form-label"> Empresa.(*)</label>
						</td>
						<td id="td_control-id_empresa" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_empresa" name="form-id_empresa" title=" Empresa" ></select></td>
									<td><a><img id="form-id_empresa_img" name="form-id_empresa_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_empresa_img_busqueda" name="form-id_empresa_img_busqueda" title="Buscar Empresa" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_empresa" class="mensajeerror"></span>
						</td>
					
					<tr id="tr_fila_1">
						<td id="td_title-id_sucursal" class="titulocampo">
							<label class="form-label"> Sucursal.(*)</label>
						</td>
						<td id="td_control-id_sucursal" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_sucursal" name="form-id_sucursal" title=" Sucursal" ></select></td>
									<td><a><img id="form-id_sucursal_img" name="form-id_sucursal_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_sucursal_img_busqueda" name="form-id_sucursal_img_busqueda" title="Buscar Sucursal" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_sucursal" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_2">
						<td id="td_title-id_ejercicio" class="titulocampo">
							<label class="form-label"> Ejercicio.(*)</label>
						</td>
						<td id="td_control-id_ejercicio" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_ejercicio" name="form-id_ejercicio" title=" Ejercicio" ></select></td>
									<td><a><img id="form-id_ejercicio_img" name="form-id_ejercicio_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_ejercicio_img_busqueda" name="form-id_ejercicio_img_busqueda" title="Buscar ejercicio" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_ejercicio" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_3">
						<td id="td_title-id_periodo" class="titulocampo">
							<label class="form-label"> Periodo.(*)</label>
						</td>
						<td id="td_control-id_periodo" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_periodo" name="form-id_periodo" title=" Periodo" ></select></td>
									<td><a><img id="form-id_periodo_img" name="form-id_periodo_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_periodo_img_busqueda" name="form-id_periodo_img_busqueda" title="Buscar periodo" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_periodo" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_4">
						<td id="td_title-id_usuario" class="titulocampo">
							<label class="form-label"> Usuario.(*)</label>
						</td>
						<td id="td_control-id_usuario" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_usuario" name="form-id_usuario" title=" Usuario" ></select></td>
									<td><a><img id="form-id_usuario_img" name="form-id_usuario_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_usuario_img_busqueda" name="form-id_usuario_img_busqueda" title="Buscar Usuario" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_usuario" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_5">
						<td id="td_title-referencia" class="titulocampo">
							<label class="form-label">Referencia</label>
						</td>
						<td id="td_control-referencia" align="left" class="controlcampo">
							<input id="form-referencia" name="form-referencia" type="text" class="form-control"  placeholder="Referencia"  title="Referencia"    size="20"  maxlength="25"/>
							<span id="spanstrMensajereferencia" class="mensajeerror"></span>
						</td>
					</tr>
				</table> <!-- tblCamposOcultoscuenta_pagar -->

			</td></tr> <!-- trcuenta_pagarElementos -->
			</table> <!-- tblcuenta_pagarElementos -->
			</form> <!-- frmMantenimientocuenta_pagar -->


			

				<form id="frmAccionesMantenimientocuenta_pagar" name="frmAccionesMantenimientocuenta_pagar">

			<?php if(cuenta_pagar_web::$STR_ES_BUSQUEDA=='false' ) {?>
			<table id="tblcuenta_pagarAcciones" class="elementos" style="text-align: center">
		<tr id="trcuenta_pagarAcciones" class="elementos" style="display:table-row">
			<td align="center">
				<a id="Acciones" ></a>

				<?php if(cuenta_pagar_web::$STR_ES_RELACIONES=='false' ) {?>
				<div align="right">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
				<?php } ?>

					<!-- SECCION/BOTONES -->
					<table id="tblAccionesMantenimientocuenta_pagar" class="busqueda" style="width: 50%;text-align: left">

						<?php if(cuenta_pagar_web::$STR_ES_RELACIONES=='false' ) {?>
						<!--
						<caption class="busquedacabecera">
							<span>Acciones</span>
						</caption>
						-->
						<?php } ?>

						<tr id="trAccionesMantenimientocuenta_pagarBasicos">
							<td id="tdbtnNuevocuenta_pagar" style="visibility:visible">
								<div id="divNuevocuenta_pagar" style="display:table-row">
									<input type="button" id="btnNuevocuenta_pagar" name="btnNuevocuenta_pagar" value="NUEVO" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnActualizarcuenta_pagar" style="visibility:visible">
								<div id="divActualizarcuenta_pagar" style="display:table-row">
									<input type="button" id="btnActualizarcuenta_pagar" name="btnActualizarcuenta_pagar" title="ACTUALIZAR Cuenta Pagar ACTUAL" value="Actualizar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnEliminarcuenta_pagar" style="visibility:visible">
								<div id="divEliminarcuenta_pagar" style="display:table-row">
									<input type="button" id="btnEliminarcuenta_pagar" name="btnEliminarcuenta_pagar" title="ELIMINAR Cuenta Pagar ACTUAL" value="Eliminar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnImprimircuenta_pagar" style="visibility:visible">
								<input type="button" id="btnImprimircuenta_pagar" name="btnImprimircuenta_pagar" title="IMPRIMIR PAGINA Cuenta Pagar ACTUAL" value="Imp. Datos" class="btn btn-primary"/>
							</td>
							<td id="tdbtnCancelarcuenta_pagar" style="visibility:visible">
								<input type="button" id="btnCancelarcuenta_pagar" name="btnCancelarcuenta_pagar" title="CANCELAR Cuenta Pagar ACTUAL" value="Cancelar" class="btn btn-primary"/>
							</td>
						</tr>
						<tr id="trAccionesMantenimientocuenta_pagarGuardar" style="display:none">
							<td id="tdbtnGuardarCambioscuenta_pagar" colspan="4" align="center" style="visibility:visible">
								<div id="divGuardarCambioscuenta_pagar" style="display:table-row">
									<input type="button" id="btnGuardarCambiosFormulariocuenta_pagar" name="btnGuardarCambiosFormulariocuenta_pagar" title="GUARDAR" value="GUADAR CAMBIOS" class="btn btn-primary"/>
								</div>
							</td>
						</tr>
					</table> <!-- tblAccionesMantenimientocuenta_pagar -->
			</td>
		</tr> <!-- trcuenta_pagarAcciones -->
		<?php if(cuenta_pagar_web::$STR_ES_RELACIONADO=='false' ) {?>
		<tr id="trcuenta_pagarParametrosAcciones" class="impresion"  style="display:table-row">
			<td align="center">
				<!-- SECCION/POST -->
				<table id="tblcuenta_pagarParametrosAcciones" style="text-align: center;border: 0px solid black;padding: 0px; border-spacing: 0px">
					<caption class="busquedacabecera" style="padding: 0px;caption-side: top;">
						<span>Acciones Extra/Post</span>
					</caption>
					<tr id="trcuenta_pagarFilaParametrosAcciones">
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
				</table> <!-- tblcuenta_pagarParametrosAcciones -->
			</td>
		</tr> <!-- trcuenta_pagarParametrosAcciones -->
		<?php }?>
		<tr id="trcuenta_pagarMensajes" class="mensajes">
			<td align="center">
				<a id="Mensajes"></a>
			</td>
		</tr> <!-- trcuenta_pagarMensajes -->
			</table> <!-- tblcuenta_pagarAcciones -->
			<?php } ?>
			</form> <!-- frmMantenimientocuenta_pagar -->
			</div> <!-- divMantenimientocuenta_pagarAjaxWebPart -->
		</td>
	</tr> <!-- trcuenta_pagarElementosFormulario/super -->
		<?php if(cuenta_pagar_web::$STR_ES_RELACIONADO=='false' ) {?>

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
			
				import {cuenta_pagar_webcontrol,cuenta_pagar_webcontrol1} from './webroot/js/JavaScript/contabilidad/cuentaspagar/cuenta_pagar/js/webcontrol/cuenta_pagar_form_webcontrol.js?random=1';
				
				cuenta_pagar_webcontrol1.setcuenta_pagar_constante(window.cuenta_pagar_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(cuenta_pagar_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

