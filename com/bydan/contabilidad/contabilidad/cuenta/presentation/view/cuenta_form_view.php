<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\contabilidad\cuenta\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Cuentas Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/contabilidad/cuenta/util/cuenta_carga.php');
	use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_carga;
	
	//include_once('com/bydan/contabilidad/contabilidad/cuenta/presentation/view/cuenta_web.php');
	//use com\bydan\contabilidad\contabilidad\cuenta\presentation\view\cuenta_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	cuenta_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	cuenta_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$cuenta_web1= new cuenta_web();	
	$cuenta_web1->cargarDatosGenerales();
	
	//$moduloActual=$cuenta_web1->moduloActual;
	//$usuarioActual=$cuenta_web1->usuarioActual;
	//$sessionBase=$cuenta_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$cuenta_web1->parametroGeneralUsuarioActual;
	
	
		
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
		
		
			<script type="module" src="webroot/js/JavaScript/contabilidad/contabilidad/cuenta/js/util/cuenta_form_funcion.js?random=1"></script>
						
		
		
		<?php 
			
		
			cuenta_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					cuenta_web::$GET_POST=$_GET;
				} else {
					cuenta_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			cuenta_web::$STR_NOMBRE_PAGINA = 'cuenta_form_view.php';
			cuenta_web::$BIT_ES_PAGINA_PRINCIPAL = 'false';
			cuenta_web::$BIT_ES_PAGINA_FORM = 'true';
				
			cuenta_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {cuenta_constante,cuenta_constante1} from './webroot/js/JavaScript/contabilidad/contabilidad/cuenta/js/util/cuenta_constante.js?random=1';
			import {cuenta_funcion,cuenta_funcion1} from './webroot/js/JavaScript/contabilidad/contabilidad/cuenta/js/util/cuenta_funcion.js?random=1';
			
			let cuenta_constante2 = new cuenta_constante();
			
			cuenta_constante2.STR_NOMBRE_PAGINA="<?php echo(cuenta_web::$STR_NOMBRE_PAGINA); ?>";
			cuenta_constante2.STR_TYPE_ON_LOADcuenta="<?php echo(cuenta_web::$STR_TYPE_ONLOAD); ?>";
			cuenta_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(cuenta_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			cuenta_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(cuenta_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			cuenta_constante2.STR_ACTION="<?php echo(cuenta_web::$STR_ACTION); ?>";
			cuenta_constante2.STR_ES_POPUP="<?php echo(cuenta_web::$STR_ES_POPUP); ?>";
			cuenta_constante2.STR_ES_BUSQUEDA="<?php echo(cuenta_web::$STR_ES_BUSQUEDA); ?>";
			cuenta_constante2.STR_FUNCION_JS="<?php echo(cuenta_web::$STR_FUNCION_JS); ?>";
			cuenta_constante2.BIG_ID_ACTUAL="<?php echo(cuenta_web::$BIG_ID_ACTUAL); ?>";
			cuenta_constante2.BIG_ID_OPCION="<?php echo(cuenta_web::$BIG_ID_OPCION); ?>";
			cuenta_constante2.STR_OBJETO_JS="<?php echo(cuenta_web::$STR_OBJETO_JS); ?>";
			cuenta_constante2.STR_ES_RELACIONES="<?php echo(cuenta_web::$STR_ES_RELACIONES); ?>";
			cuenta_constante2.STR_ES_RELACIONADO="<?php echo(cuenta_web::$STR_ES_RELACIONADO); ?>";
			cuenta_constante2.STR_ES_SUB_PAGINA="<?php echo(cuenta_web::$STR_ES_SUB_PAGINA); ?>";
			cuenta_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(cuenta_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			cuenta_constante2.BIT_ES_PAGINA_FORM=<?php echo(cuenta_web::$BIT_ES_PAGINA_FORM); ?>;
			cuenta_constante2.STR_SUFIJO="<?php echo(cuenta_web::$STR_SUF); ?>";//cuenta
			cuenta_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(cuenta_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//cuenta
			
			cuenta_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(cuenta_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			cuenta_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($cuenta_web1->moduloActual->getnombre()); ?>";
			cuenta_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(cuenta_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			cuenta_constante2.BIT_ES_LOAD_NORMAL=true;
			/*cuenta_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			cuenta_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.cuenta_constante2 = cuenta_constante2;
			
		</script>
		
		<?php if(cuenta_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.cuenta_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.cuenta_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="cuentaActual" ></a>
	
	<div id="divResumencuentaActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(cuenta_web::$STR_ES_RELACIONADO=='false') {?>
		
		<div id="header" >
		
			<div id="banner">
				<span id="spanTituloBanner" class="titulobanner"></span>
			</div> <!-- banner -->
					
			<div id="subheader" class="links">  
			
						
			</div> <!-- sub-header -->
			
			
		</div> <!-- header -->
		
		<?php } ?>
		
		<div id="main">
		

			<?php if(cuenta_web::$STR_ES_RELACIONADO=='false') {?>
			
			
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(cuenta_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(cuenta_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divcuentaPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblcuentaPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmcuentaAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btncuentaAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="cuenta_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btncuentaAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmcuentaAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblcuentaPopupAjaxWebPart -->
		</div> <!-- divcuentaPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->		
		
		
		
			
<tr id="trcuentaElementosFormulario">
	<td>
		<div id="divMantenimientocuentaAjaxWebPart" title="CUENTAS" style="height: 90%;width: 90%;position: relative;top: 30px;left: 30px;">
			<form id="frmMantenimientocuenta" name="frmMantenimientocuenta">

			</br>

			<?php if(cuenta_web::$STR_ES_RELACIONES=='false' ) {?>
			</br>
			<?php } ?>

			<!-- SECCION/TOOLBAR -->
			<table id="tblcuentaToolBarFormularioExterior" style="width: 65%">
				<tr style="display:table-row">
					<td align="center">

						<table id="tblcuentaToolBarFormulario" style="text-align: center"  style="display:table-row">
							<tr>
								<td id="tdcuentaActualizarToolBar" style="visibility:visible">
									<img id="imgActualizarToolBarcuenta" name="imgActualizarToolBarcuenta" title="ACTUALIZAR Cuentas ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/actualizar.gif" width="25" height="25"/>
								</td>
								<td id="tdcuentaEliminarToolBar" style="visibility:visible">
									<img id="imgEliminarToolBarcuenta" name="imgEliminarToolBarcuenta" title="ELIMINAR Cuentas ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/eliminar.gif" width="25" height="25"/>
								</td>
								<td id="tdcuentaCancelarToolBar" style="visibility:visible">
									<img id="imgCancelarToolBarcuenta" name="imgCancelarToolBarcuenta" title="CANCELAR Cuentas ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/cancelar.gif" width="25" height="25"/>
								</td>
								<td id="tdcuentaRelacionesToolBar" style="display:table-row">
									<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/xexpand.png" width="25" height="25" onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('tblCamposOcultoscuenta',this,'../')"/>
								</td>
							</tr>
						</table> <!-- tblcuentaToolBarFormulario -->

					</td>
				</tr>
			</table> <!-- tblcuentaToolBarFormularioExterior -->

			<table id="tblcuentaElementos">
			<tr id="trcuentaElementos" class="elementos" style="display:table-row">
			<td align="center">

			<a id="Campos"></a>

				<?php if(cuenta_web::$STR_ES_RELACIONES=='false' ) {?>
				<div id="divFlechaArribaElementos" align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
					<span></span>
				</div>
				<?php } ?>

				<!-- SECCION/FORMULARIO -->
				<table id="tblElementoscuenta" class="elementos" style="width: 350px; padding: 0px; border-spacing: 0px; border-collapse: collapse; text-align: left;">
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
					<tr id="tr_fila_5">
						<td id="td_title-id_tipo_nivel_cuenta" class="titulocampo">
							<label class="form-label"> Tipo Nivel Cuenta.(*)</label>
						</td>
						<td id="td_control-id_tipo_nivel_cuenta" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_tipo_nivel_cuenta" name="form-id_tipo_nivel_cuenta" title=" Tipo Nivel Cuenta" ></select></td>
									<td><img id="form-id_tipo_nivel_cuenta_img_busqueda" name="form-id_tipo_nivel_cuenta_img_busqueda" title="Buscar Tipo Nivel Cuenta" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_tipo_nivel_cuenta" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_6">
						<td id="td_title-id_cuenta" class="titulocampo">
							<label class="form-label"> Cuenta</label>
						</td>
						<td id="td_control-id_cuenta" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_cuenta" name="form-id_cuenta" title=" Cuenta" ></select></td>
									<td><a><img id="form-id_cuenta_img" name="form-id_cuenta_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_cuenta_img_busqueda" name="form-id_cuenta_img_busqueda" title="Buscar Cuentas" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_cuenta" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_7">
						<td id="td_title-codigo" class="titulocampo">
							<label class="form-label">Codigo.(*)</label>
						</td>
						<td id="td_control-codigo" align="left" class="controlcampo">
							<input id="form-codigo" name="form-codigo" type="text" class="form-control"  placeholder="Codigo"  title="Codigo"    size="20"  maxlength="20"/>
							<span id="spanstrMensajecodigo" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_8">
						<td id="td_title-nombre" class="titulocampo">
							<label class="form-label">Nombre.(*)</label>
						</td>
						<td id="td_control-nombre" align="left" class="controlcampo">
							<textarea id="form-nombre" name="form-nombre" class="form-control"  placeholder="Nombre"  title="Nombre"   style="font-size: 13px;" rows="2" cols="25" size="20" ></textarea>
							<span id="spanstrMensajenombre" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_9">
						<td id="td_title-nivel_cuenta" class="titulocampo">
							<label class="form-label">Nivel Cuenta.(*)</label>
						</td>
						<td id="td_control-nivel_cuenta" align="left" class="controlcampo">
							<input id="form-nivel_cuenta" name="form-nivel_cuenta" type="text" class="form-control"  placeholder="Nivel Cuenta"  title="Nivel Cuenta"    maxlength="10" size="10" >
							<span id="spanstrMensajenivel_cuenta" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_10">
						<td id="td_title-usa_monto_base" class="titulocampo">
							<label class="form-label">Usa Monto Minimo</label>
						</td>
						<td id="td_control-usa_monto_base" align="left" class="controlcampo">
							<input id="form-usa_monto_base" name="form-usa_monto_base" type="checkbox" >
							<span id="spanstrMensajeusa_monto_base" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_11">
						<td id="td_title-monto_base" class="titulocampo">
							<label class="form-label">Monto Minimo.(*)</label>
						</td>
						<td id="td_control-monto_base" align="left" class="controlcampo">
							<input id="form-monto_base" name="form-monto_base" type="text" class="form-control"  placeholder="Monto Minimo"  title="Monto Minimo"    maxlength="18" size="12" >
							<span id="spanstrMensajemonto_base" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_12">
						<td id="td_title-porcentaje_base" class="titulocampo">
							<label class="form-label">Porcentaje Minimo.(*)</label>
						</td>
						<td id="td_control-porcentaje_base" align="left" class="controlcampo">
							<input id="form-porcentaje_base" name="form-porcentaje_base" type="text" class="form-control"  placeholder="Porcentaje Minimo"  title="Porcentaje Minimo"    maxlength="18" size="12" >
							<span id="spanstrMensajeporcentaje_base" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_13">
						<td id="td_title-con_centro_costos" class="titulocampo">
							<label class="form-label">Con Centro Costos</label>
						</td>
						<td id="td_control-con_centro_costos" align="left" class="controlcampo">
							<input id="form-con_centro_costos" name="form-con_centro_costos" type="checkbox" >
							<span id="spanstrMensajecon_centro_costos" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_14">
						<td id="td_title-con_ruc" class="titulocampo">
							<label class="form-label">Ruc</label>
						</td>
						<td id="td_control-con_ruc" align="left" class="controlcampo">
							<input id="form-con_ruc" name="form-con_ruc" type="checkbox" >
							<span id="spanstrMensajecon_ruc" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_15">
						<td id="td_title-balance" class="titulocampo">
							<label class="form-label">Balance.(*)</label>
						</td>
						<td id="td_control-balance" align="left" class="controlcampo">
							<input id="form-balance" name="form-balance" type="text" class="form-control"  placeholder="Balance"  title="Balance"    maxlength="24" size="12" >
							<span id="spanstrMensajebalance" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_16">
						<td id="td_title-descripcion" class="titulocampo">
							<label class="form-label">Descripcion</label>
						</td>
						<td id="td_control-descripcion" align="left" class="controlcampo">
							<textarea id="form-descripcion" name="form-descripcion" class="form-control"  placeholder="Descripcion"  title="Descripcion"   style="font-size: 13px;" rows="3" cols="25" size="20" ></textarea>
							<span id="spanstrMensajedescripcion" class="mensajeerror"></span>
						</td>
					</tr>
				</table> <!-- tblElementoscuenta -->

				<!-- SECCION/OCULTOS -->
				<table id="tblCamposOcultoscuenta" class="elementos" style="display: table-row;">
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
						<td id="td_title-con_retencion" class="titulocampo">
							<label class="form-label">Con Retencion</label>
						</td>
						<td id="td_control-con_retencion" align="left" class="controlcampo">
							<input id="form-con_retencion" name="form-con_retencion" type="checkbox" >
							<span id="spanstrMensajecon_retencion" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_2">
						<td id="td_title-valor_retencion" class="titulocampo">
							<label class="form-label">Valor Retencion.(*)</label>
						</td>
						<td id="td_control-valor_retencion" align="left" class="controlcampo">
							<input id="form-valor_retencion" name="form-valor_retencion" type="text" class="form-control"  placeholder="Valor Retencion"  title="Valor Retencion"    maxlength="18" size="12" >
							<span id="spanstrMensajevalor_retencion" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_3">
						<td id="td_title-ultima_transaccion" class="titulocampo">
							<label class="form-label">Ultima Transaccion.(*)</label>
						</td>
						<td id="td_control-ultima_transaccion" align="left" class="controlcampo">
							<input id="form-ultima_transaccion" name="form-ultima_transaccion" type="text" class="form-control"  placeholder="Ultima Transaccion"  title="Ultima Transaccion"    size="10" >
							<span id="spanstrMensajeultima_transaccion" class="mensajeerror"></span>
						</td>
					</tr>
				</table> <!-- tblCamposOcultoscuenta -->

			</td></tr> <!-- trcuentaElementos -->
			</table> <!-- tblcuentaElementos -->
			</form> <!-- frmMantenimientocuenta -->


			

				<form id="frmAccionesMantenimientocuenta" name="frmAccionesMantenimientocuenta">

			<?php if(cuenta_web::$STR_ES_BUSQUEDA=='false' ) {?>
			<table id="tblcuentaAcciones" class="elementos" style="text-align: center">
		<tr id="trcuentaAcciones" class="elementos" style="display:table-row">
			<td align="center">
				<a id="Acciones" ></a>

				<?php if(cuenta_web::$STR_ES_RELACIONES=='false' ) {?>
				<div align="right">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
				<?php } ?>

					<!-- SECCION/BOTONES -->
					<table id="tblAccionesMantenimientocuenta" class="busqueda" style="width: 50%;text-align: left">

						<?php if(cuenta_web::$STR_ES_RELACIONES=='false' ) {?>
						<!--
						<caption class="busquedacabecera">
							<span>Acciones</span>
						</caption>
						-->
						<?php } ?>

						<tr id="trAccionesMantenimientocuentaBasicos">
							<td id="tdbtnNuevocuenta" style="visibility:visible">
								<div id="divNuevocuenta" style="display:table-row">
									<input type="button" id="btnNuevocuenta" name="btnNuevocuenta" value="NUEVO" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnActualizarcuenta" style="visibility:visible">
								<div id="divActualizarcuenta" style="display:table-row">
									<input type="button" id="btnActualizarcuenta" name="btnActualizarcuenta" title="ACTUALIZAR Cuentas ACTUAL" value="Actualizar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnEliminarcuenta" style="visibility:visible">
								<div id="divEliminarcuenta" style="display:table-row">
									<input type="button" id="btnEliminarcuenta" name="btnEliminarcuenta" title="ELIMINAR Cuentas ACTUAL" value="Eliminar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnImprimircuenta" style="visibility:visible">
								<input type="button" id="btnImprimircuenta" name="btnImprimircuenta" title="IMPRIMIR PAGINA Cuentas ACTUAL" value="Imp. Datos" class="btn btn-primary"/>
							</td>
							<td id="tdbtnCancelarcuenta" style="visibility:visible">
								<input type="button" id="btnCancelarcuenta" name="btnCancelarcuenta" title="CANCELAR Cuentas ACTUAL" value="Cancelar" class="btn btn-primary"/>
							</td>
						</tr>
						<tr id="trAccionesMantenimientocuentaGuardar" style="display:none">
							<td id="tdbtnGuardarCambioscuenta" colspan="4" align="center" style="visibility:visible">
								<div id="divGuardarCambioscuenta" style="display:table-row">
									<input type="button" id="btnGuardarCambiosFormulariocuenta" name="btnGuardarCambiosFormulariocuenta" title="GUARDAR" value="GUADAR CAMBIOS" class="btn btn-primary"/>
								</div>
							</td>
						</tr>
					</table> <!-- tblAccionesMantenimientocuenta -->
			</td>
		</tr> <!-- trcuentaAcciones -->
		<?php if(cuenta_web::$STR_ES_RELACIONADO=='false' ) {?>
		<tr id="trcuentaParametrosAcciones" class="impresion"  style="display:table-row">
			<td align="center">
				<!-- SECCION/POST -->
				<table id="tblcuentaParametrosAcciones" style="text-align: center;border: 0px solid black;padding: 0px; border-spacing: 0px">
					<caption class="busquedacabecera" style="padding: 0px;caption-side: top;">
						<span>Acciones Extra/Post</span>
					</caption>
					<tr id="trcuentaFilaParametrosAcciones">
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
				</table> <!-- tblcuentaParametrosAcciones -->
			</td>
		</tr> <!-- trcuentaParametrosAcciones -->
		<?php }?>
		<tr id="trcuentaMensajes" class="mensajes">
			<td align="center">
				<a id="Mensajes"></a>
			</td>
		</tr> <!-- trcuentaMensajes -->
			</table> <!-- tblcuentaAcciones -->
			<?php } ?>
			</form> <!-- frmMantenimientocuenta -->
			</div> <!-- divMantenimientocuentaAjaxWebPart -->
		</td>
	</tr> <!-- trcuentaElementosFormulario/super -->
		<?php if(cuenta_web::$STR_ES_RELACIONADO=='false' ) {?>

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
			
				import {cuenta_webcontrol,cuenta_webcontrol1} from './webroot/js/JavaScript/contabilidad/contabilidad/cuenta/js/webcontrol/cuenta_form_webcontrol.js?random=1';
				
				cuenta_webcontrol1.setcuenta_constante(window.cuenta_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(cuenta_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

