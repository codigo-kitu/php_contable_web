<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\seguridad\auditoria_detalle\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Auditoria Detalle Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/seguridad/auditoria_detalle/util/auditoria_detalle_carga.php');
	use com\bydan\contabilidad\seguridad\auditoria_detalle\util\auditoria_detalle_carga;
	
	//include_once('com/bydan/contabilidad/seguridad/auditoria_detalle/presentation/view/auditoria_detalle_web.php');
	//use com\bydan\contabilidad\seguridad\auditoria_detalle\presentation\view\auditoria_detalle_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	auditoria_detalle_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	auditoria_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$auditoria_detalle_web1= new auditoria_detalle_web();	
	$auditoria_detalle_web1->cargarDatosGenerales();
	
	//$moduloActual=$auditoria_detalle_web1->moduloActual;
	//$usuarioActual=$auditoria_detalle_web1->usuarioActual;
	//$sessionBase=$auditoria_detalle_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$auditoria_detalle_web1->parametroGeneralUsuarioActual;
	
	
		
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
		
		
			<script type="module" src="webroot/js/JavaScript/contabilidad/seguridad/auditoria_detalle/js/util/auditoria_detalle_form_funcion.js?random=1"></script>
						
		
		
		<?php 
			
		
			auditoria_detalle_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					auditoria_detalle_web::$GET_POST=$_GET;
				} else {
					auditoria_detalle_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			auditoria_detalle_web::$STR_NOMBRE_PAGINA = 'auditoria_detalle_form_view.php';
			auditoria_detalle_web::$BIT_ES_PAGINA_PRINCIPAL = 'false';
			auditoria_detalle_web::$BIT_ES_PAGINA_FORM = 'true';
				
			auditoria_detalle_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {auditoria_detalle_constante,auditoria_detalle_constante1} from './webroot/js/JavaScript/contabilidad/seguridad/auditoria_detalle/js/util/auditoria_detalle_constante.js?random=1';
			import {auditoria_detalle_funcion,auditoria_detalle_funcion1} from './webroot/js/JavaScript/contabilidad/seguridad/auditoria_detalle/js/util/auditoria_detalle_funcion.js?random=1';
			
			let auditoria_detalle_constante2 = new auditoria_detalle_constante();
			
			auditoria_detalle_constante2.STR_NOMBRE_PAGINA="<?php echo(auditoria_detalle_web::$STR_NOMBRE_PAGINA); ?>";
			auditoria_detalle_constante2.STR_TYPE_ON_LOADauditoria_detalle="<?php echo(auditoria_detalle_web::$STR_TYPE_ONLOAD); ?>";
			auditoria_detalle_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(auditoria_detalle_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			auditoria_detalle_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(auditoria_detalle_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			auditoria_detalle_constante2.STR_ACTION="<?php echo(auditoria_detalle_web::$STR_ACTION); ?>";
			auditoria_detalle_constante2.STR_ES_POPUP="<?php echo(auditoria_detalle_web::$STR_ES_POPUP); ?>";
			auditoria_detalle_constante2.STR_ES_BUSQUEDA="<?php echo(auditoria_detalle_web::$STR_ES_BUSQUEDA); ?>";
			auditoria_detalle_constante2.STR_FUNCION_JS="<?php echo(auditoria_detalle_web::$STR_FUNCION_JS); ?>";
			auditoria_detalle_constante2.BIG_ID_ACTUAL="<?php echo(auditoria_detalle_web::$BIG_ID_ACTUAL); ?>";
			auditoria_detalle_constante2.BIG_ID_OPCION="<?php echo(auditoria_detalle_web::$BIG_ID_OPCION); ?>";
			auditoria_detalle_constante2.STR_OBJETO_JS="<?php echo(auditoria_detalle_web::$STR_OBJETO_JS); ?>";
			auditoria_detalle_constante2.STR_ES_RELACIONES="<?php echo(auditoria_detalle_web::$STR_ES_RELACIONES); ?>";
			auditoria_detalle_constante2.STR_ES_RELACIONADO="<?php echo(auditoria_detalle_web::$STR_ES_RELACIONADO); ?>";
			auditoria_detalle_constante2.STR_ES_SUB_PAGINA="<?php echo(auditoria_detalle_web::$STR_ES_SUB_PAGINA); ?>";
			auditoria_detalle_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(auditoria_detalle_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			auditoria_detalle_constante2.BIT_ES_PAGINA_FORM=<?php echo(auditoria_detalle_web::$BIT_ES_PAGINA_FORM); ?>;
			auditoria_detalle_constante2.STR_SUFIJO="<?php echo(auditoria_detalle_web::$STR_SUF); ?>";//auditoria_detalle
			auditoria_detalle_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(auditoria_detalle_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//auditoria_detalle
			
			auditoria_detalle_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(auditoria_detalle_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			auditoria_detalle_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($auditoria_detalle_web1->moduloActual->getnombre()); ?>";
			auditoria_detalle_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(auditoria_detalle_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			auditoria_detalle_constante2.BIT_ES_LOAD_NORMAL=true;
			/*auditoria_detalle_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			auditoria_detalle_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.auditoria_detalle_constante2 = auditoria_detalle_constante2;
			
		</script>
		
		<?php if(auditoria_detalle_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.auditoria_detalle_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.auditoria_detalle_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="auditoria_detalleActual" ></a>
	
	<div id="divResumenauditoria_detalleActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(auditoria_detalle_web::$STR_ES_RELACIONADO=='false') {?>
		
		<div id="header" >
		
			<div id="banner">
				<span id="spanTituloBanner" class="titulobanner"></span>
			</div> <!-- banner -->
					
			<div id="subheader" class="links">  
			
						
			</div> <!-- sub-header -->
			
			
		</div> <!-- header -->
		
		<?php } ?>
		
		<div id="main">
		

			<?php if(auditoria_detalle_web::$STR_ES_RELACIONADO=='false') {?>
			
			
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(auditoria_detalle_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(auditoria_detalle_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divauditoria_detallePopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblauditoria_detallePopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmauditoria_detalleAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnauditoria_detalleAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="auditoria_detalle_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnauditoria_detalleAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmauditoria_detalleAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblauditoria_detallePopupAjaxWebPart -->
		</div> <!-- divauditoria_detallePopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->		
		
		
		
			
<tr id="trauditoria_detalleElementosFormulario">
	<td>
		<div id="divMantenimientoauditoria_detalleAjaxWebPart" title="AUDITORIA DETALLE" style="height: 90%;width: 90%;position: relative;top: 30px;left: 30px;">
			<form id="frmMantenimientoauditoria_detalle" name="frmMantenimientoauditoria_detalle">

			</br>

			<?php if(auditoria_detalle_web::$STR_ES_RELACIONES=='false' ) {?>
			</br>
			<?php } ?>

			<!-- SECCION/TOOLBAR -->
			<table id="tblauditoria_detalleToolBarFormularioExterior" style="width: 65%">
				<tr style="display:table-row">
					<td align="center">

						<table id="tblauditoria_detalleToolBarFormulario" style="text-align: center"  style="display:table-row">
							<tr>
								<td id="tdauditoria_detalleActualizarToolBar" style="visibility:visible">
									<img id="imgActualizarToolBarauditoria_detalle" name="imgActualizarToolBarauditoria_detalle" title="ACTUALIZAR Auditoria Detalle ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/actualizar.gif" width="25" height="25"/>
								</td>
								<td id="tdauditoria_detalleEliminarToolBar" style="visibility:visible">
									<img id="imgEliminarToolBarauditoria_detalle" name="imgEliminarToolBarauditoria_detalle" title="ELIMINAR Auditoria Detalle ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/eliminar.gif" width="25" height="25"/>
								</td>
								<td id="tdauditoria_detalleCancelarToolBar" style="visibility:visible">
									<img id="imgCancelarToolBarauditoria_detalle" name="imgCancelarToolBarauditoria_detalle" title="CANCELAR Auditoria Detalle ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/cancelar.gif" width="25" height="25"/>
								</td>
								<td id="tdauditoria_detalleRelacionesToolBar" style="display:table-row">
									<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/xexpand.png" width="25" height="25" onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('tblCamposOcultosauditoria_detalle',this,'../')"/>
								</td>
							</tr>
						</table> <!-- tblauditoria_detalleToolBarFormulario -->

					</td>
				</tr>
			</table> <!-- tblauditoria_detalleToolBarFormularioExterior -->

			<table id="tblauditoria_detalleElementos">
			<tr id="trauditoria_detalleElementos" class="elementos" style="display:table-row">
			<td align="center">

			<a id="Campos"></a>

				<?php if(auditoria_detalle_web::$STR_ES_RELACIONES=='false' ) {?>
				<div id="divFlechaArribaElementos" align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
					<span></span>
				</div>
				<?php } ?>

				<!-- SECCION/FORMULARIO -->
				<table id="tblElementosauditoria_detalle" class="elementos" style="width: 300px; padding: 0px; border-spacing: 0px; border-collapse: collapse; text-align: center;">
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
						<td id="td_title-id_auditoria" class="titulocampo">
							<label class="form-label">Auditoria.(*)</label>
						</td>
						<td id="td_control-id_auditoria" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_auditoria" name="form-id_auditoria" title="Auditoria" ></select></td>
									<td><a><img id="form-id_auditoria_img" name="form-id_auditoria_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_auditoria_img_busqueda" name="form-id_auditoria_img_busqueda" title="Buscar Auditoria" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_auditoria" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_5">
						<td id="td_title-nombre_campo" class="titulocampo">
							<label class="form-label">Nombre Del Campo.(*)</label>
						</td>
						<td id="td_control-nombre_campo" align="left" class="controlcampo">
							<textarea id="form-nombre_campo" name="form-nombre_campo" class="form-control"  placeholder="Nombre Del Campo"  title="Nombre Del Campo"   style="font-size: 13px;" rows="3" cols="25" size="20" ></textarea>
							<span id="spanstrMensajenombre_campo" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_6">
						<td id="td_title-valor_anterior" class="titulocampo">
							<label class="form-label">Valor Anterior.(*)</label>
						</td>
						<td id="td_control-valor_anterior" align="left" class="controlcampo">
							<textarea id="form-valor_anterior" name="form-valor_anterior" class="form-control"  placeholder="Valor Anterior"  title="Valor Anterior"   style="font-size: 13px;"  rows ="3" cols= "25"></textarea>
							<span id="spanstrMensajevalor_anterior" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_7">
						<td id="td_title-valor_actual" class="titulocampo">
							<label class="form-label">Valor Actual.(*)</label>
						</td>
						<td id="td_control-valor_actual" align="left" class="controlcampo">
							<textarea id="form-valor_actual" name="form-valor_actual" class="form-control"  placeholder="Valor Actual"  title="Valor Actual"   style="font-size: 13px;"  rows ="3" cols= "25"></textarea>
							<span id="spanstrMensajevalor_actual" class="mensajeerror"></span>
						</td>
					</tr>
				</table> <!-- tblElementosauditoria_detalle -->

				<!-- SECCION/OCULTOS -->
				<table id="tblCamposOcultosauditoria_detalle" class="elementos" style="display: table-row;">
					<caption class="busquedacabecera">
						<span>Campos Ocultos</span>
					</caption>
				</table> <!-- tblCamposOcultosauditoria_detalle -->

			</td></tr> <!-- trauditoria_detalleElementos -->
			</table> <!-- tblauditoria_detalleElementos -->
			</form> <!-- frmMantenimientoauditoria_detalle -->


			

				<form id="frmAccionesMantenimientoauditoria_detalle" name="frmAccionesMantenimientoauditoria_detalle">

			<?php if(auditoria_detalle_web::$STR_ES_BUSQUEDA=='false' ) {?>
			<table id="tblauditoria_detalleAcciones" class="elementos" style="text-align: center">
		<tr id="trauditoria_detalleAcciones" class="elementos" style="display:table-row">
			<td align="center">
				<a id="Acciones" ></a>

				<?php if(auditoria_detalle_web::$STR_ES_RELACIONES=='false' ) {?>
				<div align="right">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
				<?php } ?>

					<!-- SECCION/BOTONES -->
					<table id="tblAccionesMantenimientoauditoria_detalle" class="busqueda" style="width: 50%;text-align: center">

						<?php if(auditoria_detalle_web::$STR_ES_RELACIONES=='false' ) {?>
						<!--
						<caption class="busquedacabecera">
							<span>Acciones</span>
						</caption>
						-->
						<?php } ?>

						<tr id="trAccionesMantenimientoauditoria_detalleBasicos">
							<td id="tdbtnNuevoauditoria_detalle" style="visibility:visible">
								<div id="divNuevoauditoria_detalle" style="display:table-row">
									<input type="button" id="btnNuevoauditoria_detalle" name="btnNuevoauditoria_detalle" value="NUEVO" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnActualizarauditoria_detalle" style="visibility:visible">
								<div id="divActualizarauditoria_detalle" style="display:table-row">
									<input type="button" id="btnActualizarauditoria_detalle" name="btnActualizarauditoria_detalle" title="ACTUALIZAR Auditoria Detalle ACTUAL" value="Actualizar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnEliminarauditoria_detalle" style="visibility:visible">
								<div id="divEliminarauditoria_detalle" style="display:table-row">
									<input type="button" id="btnEliminarauditoria_detalle" name="btnEliminarauditoria_detalle" title="ELIMINAR Auditoria Detalle ACTUAL" value="Eliminar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnImprimirauditoria_detalle" style="visibility:visible">
								<input type="button" id="btnImprimirauditoria_detalle" name="btnImprimirauditoria_detalle" title="IMPRIMIR PAGINA Auditoria Detalle ACTUAL" value="Imp. Datos" class="btn btn-primary"/>
							</td>
							<td id="tdbtnCancelarauditoria_detalle" style="visibility:visible">
								<input type="button" id="btnCancelarauditoria_detalle" name="btnCancelarauditoria_detalle" title="CANCELAR Auditoria Detalle ACTUAL" value="Cancelar" class="btn btn-primary"/>
							</td>
						</tr>
						<tr id="trAccionesMantenimientoauditoria_detalleGuardar" style="display:none">
							<td id="tdbtnGuardarCambiosauditoria_detalle" colspan="4" align="center" style="visibility:visible">
								<div id="divGuardarCambiosauditoria_detalle" style="display:table-row">
									<input type="button" id="btnGuardarCambiosFormularioauditoria_detalle" name="btnGuardarCambiosFormularioauditoria_detalle" title="GUARDAR" value="GUADAR CAMBIOS" class="btn btn-primary"/>
								</div>
							</td>
						</tr>
					</table> <!-- tblAccionesMantenimientoauditoria_detalle -->
			</td>
		</tr> <!-- trauditoria_detalleAcciones -->
		<?php if(auditoria_detalle_web::$STR_ES_RELACIONADO=='false' ) {?>
		<tr id="trauditoria_detalleParametrosAcciones" class="impresion"  style="display:table-row">
			<td align="center">
				<!-- SECCION/POST -->
				<table id="tblauditoria_detalleParametrosAcciones" style="text-align: center;border: 0px solid black;padding: 0px; border-spacing: 0px">
					<caption class="busquedacabecera" style="padding: 0px;caption-side: top;">
						<span>Acciones Extra/Post</span>
					</caption>
					<tr id="trauditoria_detalleFilaParametrosAcciones">
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
				</table> <!-- tblauditoria_detalleParametrosAcciones -->
			</td>
		</tr> <!-- trauditoria_detalleParametrosAcciones -->
		<?php }?>
		<tr id="trauditoria_detalleMensajes" class="mensajes">
			<td align="center">
				<a id="Mensajes"></a>
			</td>
		</tr> <!-- trauditoria_detalleMensajes -->
			</table> <!-- tblauditoria_detalleAcciones -->
			<?php } ?>
			</form> <!-- frmMantenimientoauditoria_detalle -->
			</div> <!-- divMantenimientoauditoria_detalleAjaxWebPart -->
		</td>
	</tr> <!-- trauditoria_detalleElementosFormulario/super -->
		<?php if(auditoria_detalle_web::$STR_ES_RELACIONADO=='false' ) {?>

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
			
				import {auditoria_detalle_webcontrol,auditoria_detalle_webcontrol1} from './webroot/js/JavaScript/contabilidad/seguridad/auditoria_detalle/js/webcontrol/auditoria_detalle_form_webcontrol.js?random=1';
				
				auditoria_detalle_webcontrol1.setauditoria_detalle_constante(window.auditoria_detalle_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(auditoria_detalle_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

