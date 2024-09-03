<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\contabilidad\saldo_cuenta\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Saldo Cuenta Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/contabilidad/saldo_cuenta/util/saldo_cuenta_carga.php');
	use com\bydan\contabilidad\contabilidad\saldo_cuenta\util\saldo_cuenta_carga;
	
	//include_once('com/bydan/contabilidad/contabilidad/saldo_cuenta/presentation/view/saldo_cuenta_web.php');
	//use com\bydan\contabilidad\contabilidad\saldo_cuenta\presentation\view\saldo_cuenta_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	saldo_cuenta_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	saldo_cuenta_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$saldo_cuenta_web1= new saldo_cuenta_web();	
	$saldo_cuenta_web1->cargarDatosGenerales();
	
	//$moduloActual=$saldo_cuenta_web1->moduloActual;
	//$usuarioActual=$saldo_cuenta_web1->usuarioActual;
	//$sessionBase=$saldo_cuenta_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$saldo_cuenta_web1->parametroGeneralUsuarioActual;
	
	
		
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
		
		
			<script type="module" src="webroot/js/JavaScript/contabilidad/contabilidad/saldo_cuenta/js/util/saldo_cuenta_form_funcion.js?random=1"></script>
						
		
		
		<?php 
			
		
			saldo_cuenta_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					saldo_cuenta_web::$GET_POST=$_GET;
				} else {
					saldo_cuenta_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			saldo_cuenta_web::$STR_NOMBRE_PAGINA = 'saldo_cuenta_form_view.php';
			saldo_cuenta_web::$BIT_ES_PAGINA_PRINCIPAL = 'false';
			saldo_cuenta_web::$BIT_ES_PAGINA_FORM = 'true';
				
			saldo_cuenta_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {saldo_cuenta_constante,saldo_cuenta_constante1} from './webroot/js/JavaScript/contabilidad/contabilidad/saldo_cuenta/js/util/saldo_cuenta_constante.js?random=1';
			import {saldo_cuenta_funcion,saldo_cuenta_funcion1} from './webroot/js/JavaScript/contabilidad/contabilidad/saldo_cuenta/js/util/saldo_cuenta_funcion.js?random=1';
			
			let saldo_cuenta_constante2 = new saldo_cuenta_constante();
			
			saldo_cuenta_constante2.STR_NOMBRE_PAGINA="<?php echo(saldo_cuenta_web::$STR_NOMBRE_PAGINA); ?>";
			saldo_cuenta_constante2.STR_TYPE_ON_LOADsaldo_cuenta="<?php echo(saldo_cuenta_web::$STR_TYPE_ONLOAD); ?>";
			saldo_cuenta_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(saldo_cuenta_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			saldo_cuenta_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(saldo_cuenta_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			saldo_cuenta_constante2.STR_ACTION="<?php echo(saldo_cuenta_web::$STR_ACTION); ?>";
			saldo_cuenta_constante2.STR_ES_POPUP="<?php echo(saldo_cuenta_web::$STR_ES_POPUP); ?>";
			saldo_cuenta_constante2.STR_ES_BUSQUEDA="<?php echo(saldo_cuenta_web::$STR_ES_BUSQUEDA); ?>";
			saldo_cuenta_constante2.STR_FUNCION_JS="<?php echo(saldo_cuenta_web::$STR_FUNCION_JS); ?>";
			saldo_cuenta_constante2.BIG_ID_ACTUAL="<?php echo(saldo_cuenta_web::$BIG_ID_ACTUAL); ?>";
			saldo_cuenta_constante2.BIG_ID_OPCION="<?php echo(saldo_cuenta_web::$BIG_ID_OPCION); ?>";
			saldo_cuenta_constante2.STR_OBJETO_JS="<?php echo(saldo_cuenta_web::$STR_OBJETO_JS); ?>";
			saldo_cuenta_constante2.STR_ES_RELACIONES="<?php echo(saldo_cuenta_web::$STR_ES_RELACIONES); ?>";
			saldo_cuenta_constante2.STR_ES_RELACIONADO="<?php echo(saldo_cuenta_web::$STR_ES_RELACIONADO); ?>";
			saldo_cuenta_constante2.STR_ES_SUB_PAGINA="<?php echo(saldo_cuenta_web::$STR_ES_SUB_PAGINA); ?>";
			saldo_cuenta_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(saldo_cuenta_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			saldo_cuenta_constante2.BIT_ES_PAGINA_FORM=<?php echo(saldo_cuenta_web::$BIT_ES_PAGINA_FORM); ?>;
			saldo_cuenta_constante2.STR_SUFIJO="<?php echo(saldo_cuenta_web::$STR_SUF); ?>";//saldo_cuenta
			saldo_cuenta_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(saldo_cuenta_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//saldo_cuenta
			
			saldo_cuenta_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(saldo_cuenta_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			saldo_cuenta_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($saldo_cuenta_web1->moduloActual->getnombre()); ?>";
			saldo_cuenta_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(saldo_cuenta_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			saldo_cuenta_constante2.BIT_ES_LOAD_NORMAL=true;
			/*saldo_cuenta_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			saldo_cuenta_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.saldo_cuenta_constante2 = saldo_cuenta_constante2;
			
		</script>
		
		<?php if(saldo_cuenta_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.saldo_cuenta_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.saldo_cuenta_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="saldo_cuentaActual" ></a>
	
	<div id="divResumensaldo_cuentaActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(saldo_cuenta_web::$STR_ES_RELACIONADO=='false') {?>
		
		<div id="header" >
		
			<div id="banner">
				<span id="spanTituloBanner" class="titulobanner"></span>
			</div> <!-- banner -->
					
			<div id="subheader" class="links">  
			
						
			</div> <!-- sub-header -->
			
			
		</div> <!-- header -->
		
		<?php } ?>
		
		<div id="main">
		

			<?php if(saldo_cuenta_web::$STR_ES_RELACIONADO=='false') {?>
			
			
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(saldo_cuenta_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(saldo_cuenta_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divsaldo_cuentaPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblsaldo_cuentaPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmsaldo_cuentaAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnsaldo_cuentaAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="saldo_cuenta_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnsaldo_cuentaAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmsaldo_cuentaAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblsaldo_cuentaPopupAjaxWebPart -->
		</div> <!-- divsaldo_cuentaPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->		
		
		
		
			
<tr id="trsaldo_cuentaElementosFormulario">
	<td>
		<div id="divMantenimientosaldo_cuentaAjaxWebPart" title="SALDO CUENTA" style="height: 90%;width: 90%;position: relative;top: 30px;left: 30px;">
			<form id="frmMantenimientosaldo_cuenta" name="frmMantenimientosaldo_cuenta">

			</br>

			<?php if(saldo_cuenta_web::$STR_ES_RELACIONES=='false' ) {?>
			</br>
			<?php } ?>

			<!-- SECCION/TOOLBAR -->
			<table id="tblsaldo_cuentaToolBarFormularioExterior" style="width: 65%">
				<tr style="display:table-row">
					<td align="center">

						<table id="tblsaldo_cuentaToolBarFormulario" style="text-align: center"  style="display:table-row">
							<tr>
								<td id="tdsaldo_cuentaActualizarToolBar" style="visibility:visible">
									<img id="imgActualizarToolBarsaldo_cuenta" name="imgActualizarToolBarsaldo_cuenta" title="ACTUALIZAR Saldo Cuenta ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/actualizar.gif" width="25" height="25"/>
								</td>
								<td id="tdsaldo_cuentaEliminarToolBar" style="visibility:visible">
									<img id="imgEliminarToolBarsaldo_cuenta" name="imgEliminarToolBarsaldo_cuenta" title="ELIMINAR Saldo Cuenta ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/eliminar.gif" width="25" height="25"/>
								</td>
								<td id="tdsaldo_cuentaCancelarToolBar" style="visibility:visible">
									<img id="imgCancelarToolBarsaldo_cuenta" name="imgCancelarToolBarsaldo_cuenta" title="CANCELAR Saldo Cuenta ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/cancelar.gif" width="25" height="25"/>
								</td>
								<td id="tdsaldo_cuentaRelacionesToolBar" style="display:table-row">
									<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/xexpand.png" width="25" height="25" onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('tblCamposOcultossaldo_cuenta',this,'../')"/>
								</td>
							</tr>
						</table> <!-- tblsaldo_cuentaToolBarFormulario -->

					</td>
				</tr>
			</table> <!-- tblsaldo_cuentaToolBarFormularioExterior -->

			<table id="tblsaldo_cuentaElementos">
			<tr id="trsaldo_cuentaElementos" class="elementos" style="display:table-row">
			<td align="center">

			<a id="Campos"></a>

				<?php if(saldo_cuenta_web::$STR_ES_RELACIONES=='false' ) {?>
				<div id="divFlechaArribaElementos" align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
					<span></span>
				</div>
				<?php } ?>

				<!-- SECCION/FORMULARIO -->
				<table id="tblElementossaldo_cuenta" class="elementos" style="width: 300px; padding: 0px; border-spacing: 0px; border-collapse: collapse; text-align: left;">
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
					<tr id="tr_fila_5">
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
					<tr id="tr_fila_6">
						<td id="td_title-id_tipo_cuenta" class="titulocampo">
							<label class="form-label"> Tipo Cuenta.(*)</label>
						</td>
						<td id="td_control-id_tipo_cuenta" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_tipo_cuenta" name="form-id_tipo_cuenta" title=" Tipo Cuenta" ></select></td>
									<td><img id="form-id_tipo_cuenta_img_busqueda" name="form-id_tipo_cuenta_img_busqueda" title="Buscar Tipo Cuenta" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_tipo_cuenta" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_7">
						<td id="td_title-id_cuenta" class="titulocampo">
							<label class="form-label"> Cuenta.(*)</label>
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
					<tr id="tr_fila_8">
						<td id="td_title-suma_debe" class="titulocampo">
							<label class="form-label">Suma Debe.(*)</label>
						</td>
						<td id="td_control-suma_debe" align="left" class="controlcampo">
							<input id="form-suma_debe" name="form-suma_debe" type="text" class="form-control"  placeholder="Suma Debe"  title="Suma Debe"    maxlength="22" size="12" >
							<span id="spanstrMensajesuma_debe" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_9">
						<td id="td_title-suma_haber" class="titulocampo">
							<label class="form-label">Suma Haber.(*)</label>
						</td>
						<td id="td_control-suma_haber" align="left" class="controlcampo">
							<input id="form-suma_haber" name="form-suma_haber" type="text" class="form-control"  placeholder="Suma Haber"  title="Suma Haber"    maxlength="22" size="12" >
							<span id="spanstrMensajesuma_haber" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_10">
						<td id="td_title-deudor" class="titulocampo">
							<label class="form-label">Deudor.(*)</label>
						</td>
						<td id="td_control-deudor" align="left" class="controlcampo">
							<input id="form-deudor" name="form-deudor" type="text" class="form-control"  placeholder="Deudor"  title="Deudor"    maxlength="22" size="12" >
							<span id="spanstrMensajedeudor" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_11">
						<td id="td_title-acreedor" class="titulocampo">
							<label class="form-label">Acreedor.(*)</label>
						</td>
						<td id="td_control-acreedor" align="left" class="controlcampo">
							<input id="form-acreedor" name="form-acreedor" type="text" class="form-control"  placeholder="Acreedor"  title="Acreedor"    maxlength="22" size="12" >
							<span id="spanstrMensajeacreedor" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_12">
						<td id="td_title-saldo" class="titulocampo">
							<label class="form-label">Saldo.(*)</label>
						</td>
						<td id="td_control-saldo" align="left" class="controlcampo">
							<input id="form-saldo" name="form-saldo" type="text" class="form-control"  placeholder="Saldo"  title="Saldo"    maxlength="22" size="12" >
							<span id="spanstrMensajesaldo" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_13">
						<td id="td_title-fecha_proceso" class="titulocampo">
							<label class="form-label">Fecha Proceso.(*)</label>
						</td>
						<td id="td_control-fecha_proceso" align="left" class="controlcampo">
							<input id="form-fecha_proceso" name="form-fecha_proceso" type="text" class="form-control"  placeholder="Fecha Proceso"  title="Fecha Proceso"    size="10" >
							<span id="spanstrMensajefecha_proceso" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_14">
						<td id="td_title-fecha_fin_mes" class="titulocampo">
							<label class="form-label">Fecha Fin Mes.(*)</label>
						</td>
						<td id="td_control-fecha_fin_mes" align="left" class="controlcampo">
							<input id="form-fecha_fin_mes" name="form-fecha_fin_mes" type="text" class="form-control"  placeholder="Fecha Fin Mes"  title="Fecha Fin Mes"    size="10" >
							<span id="spanstrMensajefecha_fin_mes" class="mensajeerror"></span>
						</td>
					</tr>
				</table> <!-- tblElementossaldo_cuenta -->

				<!-- SECCION/OCULTOS -->
				<table id="tblCamposOcultossaldo_cuenta" class="elementos" style="display: table-row;">
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
						<td id="td_title-tipo_cuenta_codigo" class="titulocampo">
							<label class="form-label">Tipo Cuenta</label>
						</td>
						<td id="td_control-tipo_cuenta_codigo" align="left" class="controlcampo">
							<input id="form-tipo_cuenta_codigo" name="form-tipo_cuenta_codigo" type="text" class="form-control"  placeholder="Tipo Cuenta"  title="Tipo Cuenta"    size="2"  maxlength="2"/>
							<span id="spanstrMensajetipo_cuenta_codigo" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_2">
						<td id="td_title-cuenta_contable" class="titulocampo">
							<label class="form-label">Cuenta Contable</label>
						</td>
						<td id="td_control-cuenta_contable" align="left" class="controlcampo">
							<input id="form-cuenta_contable" name="form-cuenta_contable" type="text" class="form-control"  placeholder="Cuenta Contable"  title="Cuenta Contable"    size="20"  maxlength="20"/>
							<span id="spanstrMensajecuenta_contable" class="mensajeerror"></span>
						</td>
					</tr>
				</table> <!-- tblCamposOcultossaldo_cuenta -->

			</td></tr> <!-- trsaldo_cuentaElementos -->
			</table> <!-- tblsaldo_cuentaElementos -->
			</form> <!-- frmMantenimientosaldo_cuenta -->


			

				<form id="frmAccionesMantenimientosaldo_cuenta" name="frmAccionesMantenimientosaldo_cuenta">

			<?php if(saldo_cuenta_web::$STR_ES_BUSQUEDA=='false' ) {?>
			<table id="tblsaldo_cuentaAcciones" class="elementos" style="text-align: center">
		<tr id="trsaldo_cuentaAcciones" class="elementos" style="display:table-row">
			<td align="center">
				<a id="Acciones" ></a>

				<?php if(saldo_cuenta_web::$STR_ES_RELACIONES=='false' ) {?>
				<div align="right">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
				<?php } ?>

					<!-- SECCION/BOTONES -->
					<table id="tblAccionesMantenimientosaldo_cuenta" class="busqueda" style="width: 50%;text-align: left">

						<?php if(saldo_cuenta_web::$STR_ES_RELACIONES=='false' ) {?>
						<!--
						<caption class="busquedacabecera">
							<span>Acciones</span>
						</caption>
						-->
						<?php } ?>

						<tr id="trAccionesMantenimientosaldo_cuentaBasicos">
							<td id="tdbtnNuevosaldo_cuenta" style="visibility:visible">
								<div id="divNuevosaldo_cuenta" style="display:table-row">
									<input type="button" id="btnNuevosaldo_cuenta" name="btnNuevosaldo_cuenta" value="NUEVO" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnActualizarsaldo_cuenta" style="visibility:visible">
								<div id="divActualizarsaldo_cuenta" style="display:table-row">
									<input type="button" id="btnActualizarsaldo_cuenta" name="btnActualizarsaldo_cuenta" title="ACTUALIZAR Saldo Cuenta ACTUAL" value="Actualizar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnEliminarsaldo_cuenta" style="visibility:visible">
								<div id="divEliminarsaldo_cuenta" style="display:table-row">
									<input type="button" id="btnEliminarsaldo_cuenta" name="btnEliminarsaldo_cuenta" title="ELIMINAR Saldo Cuenta ACTUAL" value="Eliminar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnImprimirsaldo_cuenta" style="visibility:visible">
								<input type="button" id="btnImprimirsaldo_cuenta" name="btnImprimirsaldo_cuenta" title="IMPRIMIR PAGINA Saldo Cuenta ACTUAL" value="Imp. Datos" class="btn btn-primary"/>
							</td>
							<td id="tdbtnCancelarsaldo_cuenta" style="visibility:visible">
								<input type="button" id="btnCancelarsaldo_cuenta" name="btnCancelarsaldo_cuenta" title="CANCELAR Saldo Cuenta ACTUAL" value="Cancelar" class="btn btn-primary"/>
							</td>
						</tr>
						<tr id="trAccionesMantenimientosaldo_cuentaGuardar" style="display:none">
							<td id="tdbtnGuardarCambiossaldo_cuenta" colspan="4" align="center" style="visibility:visible">
								<div id="divGuardarCambiossaldo_cuenta" style="display:table-row">
									<input type="button" id="btnGuardarCambiosFormulariosaldo_cuenta" name="btnGuardarCambiosFormulariosaldo_cuenta" title="GUARDAR" value="GUADAR CAMBIOS" class="btn btn-primary"/>
								</div>
							</td>
						</tr>
					</table> <!-- tblAccionesMantenimientosaldo_cuenta -->
			</td>
		</tr> <!-- trsaldo_cuentaAcciones -->
		<?php if(saldo_cuenta_web::$STR_ES_RELACIONADO=='false' ) {?>
		<tr id="trsaldo_cuentaParametrosAcciones" class="impresion"  style="display:table-row">
			<td align="center">
				<!-- SECCION/POST -->
				<table id="tblsaldo_cuentaParametrosAcciones" style="text-align: center;border: 0px solid black;padding: 0px; border-spacing: 0px">
					<caption class="busquedacabecera" style="padding: 0px;caption-side: top;">
						<span>Acciones Extra/Post</span>
					</caption>
					<tr id="trsaldo_cuentaFilaParametrosAcciones">
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
				</table> <!-- tblsaldo_cuentaParametrosAcciones -->
			</td>
		</tr> <!-- trsaldo_cuentaParametrosAcciones -->
		<?php }?>
		<tr id="trsaldo_cuentaMensajes" class="mensajes">
			<td align="center">
				<a id="Mensajes"></a>
			</td>
		</tr> <!-- trsaldo_cuentaMensajes -->
			</table> <!-- tblsaldo_cuentaAcciones -->
			<?php } ?>
			</form> <!-- frmMantenimientosaldo_cuenta -->
			</div> <!-- divMantenimientosaldo_cuentaAjaxWebPart -->
		</td>
	</tr> <!-- trsaldo_cuentaElementosFormulario/super -->
		<?php if(saldo_cuenta_web::$STR_ES_RELACIONADO=='false' ) {?>

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
			
				import {saldo_cuenta_webcontrol,saldo_cuenta_webcontrol1} from './webroot/js/JavaScript/contabilidad/contabilidad/saldo_cuenta/js/webcontrol/saldo_cuenta_form_webcontrol.js?random=1';
				
				saldo_cuenta_webcontrol1.setsaldo_cuenta_constante(window.saldo_cuenta_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(saldo_cuenta_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

