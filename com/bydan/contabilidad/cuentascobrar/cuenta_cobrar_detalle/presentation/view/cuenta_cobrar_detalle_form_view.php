<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\cuentascobrar\cuenta_cobrar_detalle\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Detalle Cuenta Cobrar Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/cuentascobrar/cuenta_cobrar_detalle/util/cuenta_cobrar_detalle_carga.php');
	use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar_detalle\util\cuenta_cobrar_detalle_carga;
	
	//include_once('com/bydan/contabilidad/cuentascobrar/cuenta_cobrar_detalle/presentation/view/cuenta_cobrar_detalle_web.php');
	//use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar_detalle\presentation\view\cuenta_cobrar_detalle_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	cuenta_cobrar_detalle_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	cuenta_cobrar_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$cuenta_cobrar_detalle_web1= new cuenta_cobrar_detalle_web();	
	$cuenta_cobrar_detalle_web1->cargarDatosGenerales();
	
	//$moduloActual=$cuenta_cobrar_detalle_web1->moduloActual;
	//$usuarioActual=$cuenta_cobrar_detalle_web1->usuarioActual;
	//$sessionBase=$cuenta_cobrar_detalle_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$cuenta_cobrar_detalle_web1->parametroGeneralUsuarioActual;
	
	
		
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
		
		
			<script type="module" src="webroot/js/JavaScript/contabilidad/cuentascobrar/cuenta_cobrar_detalle/js/util/cuenta_cobrar_detalle_form_funcion.js?random=1"></script>
						
		
		
		<?php 
			
		
			cuenta_cobrar_detalle_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					cuenta_cobrar_detalle_web::$GET_POST=$_GET;
				} else {
					cuenta_cobrar_detalle_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			cuenta_cobrar_detalle_web::$STR_NOMBRE_PAGINA = 'cuenta_cobrar_detalle_form_view.php';
			cuenta_cobrar_detalle_web::$BIT_ES_PAGINA_PRINCIPAL = 'false';
			cuenta_cobrar_detalle_web::$BIT_ES_PAGINA_FORM = 'true';
				
			cuenta_cobrar_detalle_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {cuenta_cobrar_detalle_constante,cuenta_cobrar_detalle_constante1} from './webroot/js/JavaScript/contabilidad/cuentascobrar/cuenta_cobrar_detalle/js/util/cuenta_cobrar_detalle_constante.js?random=1';
			import {cuenta_cobrar_detalle_funcion,cuenta_cobrar_detalle_funcion1} from './webroot/js/JavaScript/contabilidad/cuentascobrar/cuenta_cobrar_detalle/js/util/cuenta_cobrar_detalle_funcion.js?random=1';
			
			let cuenta_cobrar_detalle_constante2 = new cuenta_cobrar_detalle_constante();
			
			cuenta_cobrar_detalle_constante2.STR_NOMBRE_PAGINA="<?php echo(cuenta_cobrar_detalle_web::$STR_NOMBRE_PAGINA); ?>";
			cuenta_cobrar_detalle_constante2.STR_TYPE_ON_LOADcuenta_cobrar_detalle="<?php echo(cuenta_cobrar_detalle_web::$STR_TYPE_ONLOAD); ?>";
			cuenta_cobrar_detalle_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(cuenta_cobrar_detalle_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			cuenta_cobrar_detalle_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(cuenta_cobrar_detalle_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			cuenta_cobrar_detalle_constante2.STR_ACTION="<?php echo(cuenta_cobrar_detalle_web::$STR_ACTION); ?>";
			cuenta_cobrar_detalle_constante2.STR_ES_POPUP="<?php echo(cuenta_cobrar_detalle_web::$STR_ES_POPUP); ?>";
			cuenta_cobrar_detalle_constante2.STR_ES_BUSQUEDA="<?php echo(cuenta_cobrar_detalle_web::$STR_ES_BUSQUEDA); ?>";
			cuenta_cobrar_detalle_constante2.STR_FUNCION_JS="<?php echo(cuenta_cobrar_detalle_web::$STR_FUNCION_JS); ?>";
			cuenta_cobrar_detalle_constante2.BIG_ID_ACTUAL="<?php echo(cuenta_cobrar_detalle_web::$BIG_ID_ACTUAL); ?>";
			cuenta_cobrar_detalle_constante2.BIG_ID_OPCION="<?php echo(cuenta_cobrar_detalle_web::$BIG_ID_OPCION); ?>";
			cuenta_cobrar_detalle_constante2.STR_OBJETO_JS="<?php echo(cuenta_cobrar_detalle_web::$STR_OBJETO_JS); ?>";
			cuenta_cobrar_detalle_constante2.STR_ES_RELACIONES="<?php echo(cuenta_cobrar_detalle_web::$STR_ES_RELACIONES); ?>";
			cuenta_cobrar_detalle_constante2.STR_ES_RELACIONADO="<?php echo(cuenta_cobrar_detalle_web::$STR_ES_RELACIONADO); ?>";
			cuenta_cobrar_detalle_constante2.STR_ES_SUB_PAGINA="<?php echo(cuenta_cobrar_detalle_web::$STR_ES_SUB_PAGINA); ?>";
			cuenta_cobrar_detalle_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(cuenta_cobrar_detalle_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			cuenta_cobrar_detalle_constante2.BIT_ES_PAGINA_FORM=<?php echo(cuenta_cobrar_detalle_web::$BIT_ES_PAGINA_FORM); ?>;
			cuenta_cobrar_detalle_constante2.STR_SUFIJO="<?php echo(cuenta_cobrar_detalle_web::$STR_SUF); ?>";//cuenta_cobrar_detalle
			cuenta_cobrar_detalle_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(cuenta_cobrar_detalle_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//cuenta_cobrar_detalle
			
			cuenta_cobrar_detalle_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(cuenta_cobrar_detalle_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			cuenta_cobrar_detalle_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($cuenta_cobrar_detalle_web1->moduloActual->getnombre()); ?>";
			cuenta_cobrar_detalle_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(cuenta_cobrar_detalle_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			cuenta_cobrar_detalle_constante2.BIT_ES_LOAD_NORMAL=true;
			/*cuenta_cobrar_detalle_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			cuenta_cobrar_detalle_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.cuenta_cobrar_detalle_constante2 = cuenta_cobrar_detalle_constante2;
			
		</script>
		
		<?php if(cuenta_cobrar_detalle_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.cuenta_cobrar_detalle_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.cuenta_cobrar_detalle_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="cuenta_cobrar_detalleActual" ></a>
	
	<div id="divResumencuenta_cobrar_detalleActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(cuenta_cobrar_detalle_web::$STR_ES_RELACIONADO=='false') {?>
		
		<div id="header" >
		
			<div id="banner">
				<span id="spanTituloBanner" class="titulobanner"></span>
			</div> <!-- banner -->
					
			<div id="subheader" class="links">  
			
						
			</div> <!-- sub-header -->
			
			
		</div> <!-- header -->
		
		<?php } ?>
		
		<div id="main">
		

			<?php if(cuenta_cobrar_detalle_web::$STR_ES_RELACIONADO=='false') {?>
			
			
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(cuenta_cobrar_detalle_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(cuenta_cobrar_detalle_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divcuenta_cobrar_detallePopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblcuenta_cobrar_detallePopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmcuenta_cobrar_detalleAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btncuenta_cobrar_detalleAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="cuenta_cobrar_detalle_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btncuenta_cobrar_detalleAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmcuenta_cobrar_detalleAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblcuenta_cobrar_detallePopupAjaxWebPart -->
		</div> <!-- divcuenta_cobrar_detallePopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->		
		
		
		
			
<tr id="trcuenta_cobrar_detalleElementosFormulario">
	<td>
		<div id="divMantenimientocuenta_cobrar_detalleAjaxWebPart" title="DETALLE CUENTA COBRAR" style="height: 90%;width: 90%;position: relative;top: 30px;left: 30px;">
			<form id="frmMantenimientocuenta_cobrar_detalle" name="frmMantenimientocuenta_cobrar_detalle">

			</br>

			<?php if(cuenta_cobrar_detalle_web::$STR_ES_RELACIONES=='false' ) {?>
			</br>
			<?php } ?>

			<!-- SECCION/TOOLBAR -->
			<table id="tblcuenta_cobrar_detalleToolBarFormularioExterior" style="width: 65%">
				<tr style="display:table-row">
					<td align="center">

						<table id="tblcuenta_cobrar_detalleToolBarFormulario" style="text-align: center"  style="display:table-row">
							<tr>
								<td id="tdcuenta_cobrar_detalleActualizarToolBar" style="visibility:visible">
									<img id="imgActualizarToolBarcuenta_cobrar_detalle" name="imgActualizarToolBarcuenta_cobrar_detalle" title="ACTUALIZAR Detalle Cuenta Cobrar ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/actualizar.gif" width="25" height="25"/>
								</td>
								<td id="tdcuenta_cobrar_detalleEliminarToolBar" style="visibility:visible">
									<img id="imgEliminarToolBarcuenta_cobrar_detalle" name="imgEliminarToolBarcuenta_cobrar_detalle" title="ELIMINAR Detalle Cuenta Cobrar ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/eliminar.gif" width="25" height="25"/>
								</td>
								<td id="tdcuenta_cobrar_detalleCancelarToolBar" style="visibility:visible">
									<img id="imgCancelarToolBarcuenta_cobrar_detalle" name="imgCancelarToolBarcuenta_cobrar_detalle" title="CANCELAR Detalle Cuenta Cobrar ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/cancelar.gif" width="25" height="25"/>
								</td>
								<td id="tdcuenta_cobrar_detalleRelacionesToolBar" style="display:table-row">
									<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/xexpand.png" width="25" height="25" onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('tblCamposOcultoscuenta_cobrar_detalle',this,'../')"/>
								</td>
							</tr>
						</table> <!-- tblcuenta_cobrar_detalleToolBarFormulario -->

					</td>
				</tr>
			</table> <!-- tblcuenta_cobrar_detalleToolBarFormularioExterior -->

			<table id="tblcuenta_cobrar_detalleElementos">
			<tr id="trcuenta_cobrar_detalleElementos" class="elementos" style="display:table-row">
			<td align="center">

			<a id="Campos"></a>

				<?php if(cuenta_cobrar_detalle_web::$STR_ES_RELACIONES=='false' ) {?>
				<div id="divFlechaArribaElementos" align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
					<span></span>
				</div>
				<?php } ?>

				<!-- SECCION/FORMULARIO -->
				<table id="tblElementoscuenta_cobrar_detalle" class="elementos" style="width: 350px; padding: 0px; border-spacing: 0px; border-collapse: collapse; text-align: left;">
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
						<td id="td_title-id_cuenta_cobrar" class="titulocampo">
							<label class="form-label"> Cuenta Cobrar.(*)</label>
						</td>
						<td id="td_control-id_cuenta_cobrar" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_cuenta_cobrar" name="form-id_cuenta_cobrar" title=" Cuenta Cobrar" ></select></td>
									<td><a><img id="form-id_cuenta_cobrar_img" name="form-id_cuenta_cobrar_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_cuenta_cobrar_img_busqueda" name="form-id_cuenta_cobrar_img_busqueda" title="Buscar Cuenta Cobrar" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_cuenta_cobrar" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_5">
						<td id="td_title-numero" class="titulocampo">
							<label class="form-label">Numero.(*)</label>
						</td>
						<td id="td_control-numero" align="left" class="controlcampo">
							<input id="form-numero" name="form-numero" type="text" class="form-control"  placeholder="Numero"  title="Numero"    size="12"  maxlength="12"/>
							<span id="spanstrMensajenumero" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_6">
						<td id="td_title-fecha_emision" class="titulocampo">
							<label class="form-label">Fecha Emision.(*)</label>
						</td>
						<td id="td_control-fecha_emision" align="left" class="controlcampo">
							<input id="form-fecha_emision" name="form-fecha_emision" type="text" class="form-control"  placeholder="Fecha Emision"  title="Fecha Emision"    size="10" >
							<span id="spanstrMensajefecha_emision" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_7">
						<td id="td_title-fecha_vence" class="titulocampo">
							<label class="form-label">Fecha Vence.(*)</label>
						</td>
						<td id="td_control-fecha_vence" align="left" class="controlcampo">
							<input id="form-fecha_vence" name="form-fecha_vence" type="text" class="form-control"  placeholder="Fecha Vence"  title="Fecha Vence"    size="10" >
							<span id="spanstrMensajefecha_vence" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_8">
						<td id="td_title-referencia" class="titulocampo">
							<label class="form-label">Referencia.(*)</label>
						</td>
						<td id="td_control-referencia" align="left" class="controlcampo">
							<input id="form-referencia" name="form-referencia" type="text" class="form-control"  placeholder="Referencia"  title="Referencia"    size="20"  maxlength="25"/>
							<span id="spanstrMensajereferencia" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_9">
						<td id="td_title-monto" class="titulocampo">
							<label class="form-label">Monto.(*)</label>
						</td>
						<td id="td_control-monto" align="left" class="controlcampo">
							<input id="form-monto" name="form-monto" type="text" class="form-control"  placeholder="Monto"  title="Monto"    maxlength="18" size="12" >
							<span id="spanstrMensajemonto" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_10">
						<td id="td_title-debito" class="titulocampo">
							<label class="form-label">Debito.(*)</label>
						</td>
						<td id="td_control-debito" align="left" class="controlcampo">
							<input id="form-debito" name="form-debito" type="text" class="form-control"  placeholder="Debito"  title="Debito"    maxlength="18" size="12" >
							<span id="spanstrMensajedebito" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_11">
						<td id="td_title-credito" class="titulocampo">
							<label class="form-label">Credito.(*)</label>
						</td>
						<td id="td_control-credito" align="left" class="controlcampo">
							<input id="form-credito" name="form-credito" type="text" class="form-control"  placeholder="Credito"  title="Credito"    maxlength="18" size="12" >
							<span id="spanstrMensajecredito" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_12">
						<td id="td_title-descripcion" class="titulocampo">
							<label class="form-label">Descripcion</label>
						</td>
						<td id="td_control-descripcion" align="left" class="controlcampo">
							<textarea id="form-descripcion" name="form-descripcion" class="form-control"  placeholder="Descripcion"  title="Descripcion"   style="font-size: 13px;"  rows ="0" cols= "25"></textarea>
							<span id="spanstrMensajedescripcion" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_13">
						<td id="td_title-id_estado" class="titulocampo">
							<label class="form-label"> Estado.(*)</label>
						</td>
						<td id="td_control-id_estado" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_estado" name="form-id_estado" title=" Estado" ></select></td>
									<td><img id="form-id_estado_img_busqueda" name="form-id_estado_img_busqueda" title="Buscar Estado" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_estado" class="mensajeerror"></span>
						</td>
					</tr>
				</table> <!-- tblElementoscuenta_cobrar_detalle -->

				<!-- SECCION/OCULTOS -->
				<table id="tblCamposOcultoscuenta_cobrar_detalle" class="elementos" style="display: table-row;">
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
				</table> <!-- tblCamposOcultoscuenta_cobrar_detalle -->

			</td></tr> <!-- trcuenta_cobrar_detalleElementos -->
			</table> <!-- tblcuenta_cobrar_detalleElementos -->
			</form> <!-- frmMantenimientocuenta_cobrar_detalle -->


			

				<form id="frmAccionesMantenimientocuenta_cobrar_detalle" name="frmAccionesMantenimientocuenta_cobrar_detalle">

			<?php if(cuenta_cobrar_detalle_web::$STR_ES_BUSQUEDA=='false' ) {?>
			<table id="tblcuenta_cobrar_detalleAcciones" class="elementos" style="text-align: center">
		<tr id="trcuenta_cobrar_detalleAcciones" class="elementos" style="display:table-row">
			<td align="center">
				<a id="Acciones" ></a>

				<?php if(cuenta_cobrar_detalle_web::$STR_ES_RELACIONES=='false' ) {?>
				<div align="right">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
				<?php } ?>

					<!-- SECCION/BOTONES -->
					<table id="tblAccionesMantenimientocuenta_cobrar_detalle" class="busqueda" style="width: 50%;text-align: left">

						<?php if(cuenta_cobrar_detalle_web::$STR_ES_RELACIONES=='false' ) {?>
						<!--
						<caption class="busquedacabecera">
							<span>Acciones</span>
						</caption>
						-->
						<?php } ?>

						<tr id="trAccionesMantenimientocuenta_cobrar_detalleBasicos">
							<td id="tdbtnNuevocuenta_cobrar_detalle" style="visibility:visible">
								<div id="divNuevocuenta_cobrar_detalle" style="display:table-row">
									<input type="button" id="btnNuevocuenta_cobrar_detalle" name="btnNuevocuenta_cobrar_detalle" value="NUEVO" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnActualizarcuenta_cobrar_detalle" style="visibility:visible">
								<div id="divActualizarcuenta_cobrar_detalle" style="display:table-row">
									<input type="button" id="btnActualizarcuenta_cobrar_detalle" name="btnActualizarcuenta_cobrar_detalle" title="ACTUALIZAR Detalle Cuenta Cobrar ACTUAL" value="Actualizar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnEliminarcuenta_cobrar_detalle" style="visibility:visible">
								<div id="divEliminarcuenta_cobrar_detalle" style="display:table-row">
									<input type="button" id="btnEliminarcuenta_cobrar_detalle" name="btnEliminarcuenta_cobrar_detalle" title="ELIMINAR Detalle Cuenta Cobrar ACTUAL" value="Eliminar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnImprimircuenta_cobrar_detalle" style="visibility:visible">
								<input type="button" id="btnImprimircuenta_cobrar_detalle" name="btnImprimircuenta_cobrar_detalle" title="IMPRIMIR PAGINA Detalle Cuenta Cobrar ACTUAL" value="Imp. Datos" class="btn btn-primary"/>
							</td>
							<td id="tdbtnCancelarcuenta_cobrar_detalle" style="visibility:visible">
								<input type="button" id="btnCancelarcuenta_cobrar_detalle" name="btnCancelarcuenta_cobrar_detalle" title="CANCELAR Detalle Cuenta Cobrar ACTUAL" value="Cancelar" class="btn btn-primary"/>
							</td>
						</tr>
						<tr id="trAccionesMantenimientocuenta_cobrar_detalleGuardar" style="display:none">
							<td id="tdbtnGuardarCambioscuenta_cobrar_detalle" colspan="4" align="center" style="visibility:visible">
								<div id="divGuardarCambioscuenta_cobrar_detalle" style="display:table-row">
									<input type="button" id="btnGuardarCambiosFormulariocuenta_cobrar_detalle" name="btnGuardarCambiosFormulariocuenta_cobrar_detalle" title="GUARDAR" value="GUADAR CAMBIOS" class="btn btn-primary"/>
								</div>
							</td>
						</tr>
					</table> <!-- tblAccionesMantenimientocuenta_cobrar_detalle -->
			</td>
		</tr> <!-- trcuenta_cobrar_detalleAcciones -->
		<?php if(cuenta_cobrar_detalle_web::$STR_ES_RELACIONADO=='false' ) {?>
		<tr id="trcuenta_cobrar_detalleParametrosAcciones" class="impresion"  style="display:table-row">
			<td align="center">
				<!-- SECCION/POST -->
				<table id="tblcuenta_cobrar_detalleParametrosAcciones" style="text-align: center;border: 0px solid black;padding: 0px; border-spacing: 0px">
					<caption class="busquedacabecera" style="padding: 0px;caption-side: top;">
						<span>Acciones Extra/Post</span>
					</caption>
					<tr id="trcuenta_cobrar_detalleFilaParametrosAcciones">
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
				</table> <!-- tblcuenta_cobrar_detalleParametrosAcciones -->
			</td>
		</tr> <!-- trcuenta_cobrar_detalleParametrosAcciones -->
		<?php }?>
		<tr id="trcuenta_cobrar_detalleMensajes" class="mensajes">
			<td align="center">
				<a id="Mensajes"></a>
			</td>
		</tr> <!-- trcuenta_cobrar_detalleMensajes -->
			</table> <!-- tblcuenta_cobrar_detalleAcciones -->
			<?php } ?>
			</form> <!-- frmMantenimientocuenta_cobrar_detalle -->
			</div> <!-- divMantenimientocuenta_cobrar_detalleAjaxWebPart -->
		</td>
	</tr> <!-- trcuenta_cobrar_detalleElementosFormulario/super -->
		<?php if(cuenta_cobrar_detalle_web::$STR_ES_RELACIONADO=='false' ) {?>

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
			
				import {cuenta_cobrar_detalle_webcontrol,cuenta_cobrar_detalle_webcontrol1} from './webroot/js/JavaScript/contabilidad/cuentascobrar/cuenta_cobrar_detalle/js/webcontrol/cuenta_cobrar_detalle_form_webcontrol.js?random=1';
				
				cuenta_cobrar_detalle_webcontrol1.setcuenta_cobrar_detalle_constante(window.cuenta_cobrar_detalle_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(cuenta_cobrar_detalle_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

