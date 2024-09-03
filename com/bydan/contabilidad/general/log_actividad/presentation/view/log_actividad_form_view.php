<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\general\log_actividad\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Log Actividades Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/general/log_actividad/util/log_actividad_carga.php');
	use com\bydan\contabilidad\general\log_actividad\util\log_actividad_carga;
	
	//include_once('com/bydan/contabilidad/general/log_actividad/presentation/view/log_actividad_web.php');
	//use com\bydan\contabilidad\general\log_actividad\presentation\view\log_actividad_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	log_actividad_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	log_actividad_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$log_actividad_web1= new log_actividad_web();	
	$log_actividad_web1->cargarDatosGenerales();
	
	//$moduloActual=$log_actividad_web1->moduloActual;
	//$usuarioActual=$log_actividad_web1->usuarioActual;
	//$sessionBase=$log_actividad_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$log_actividad_web1->parametroGeneralUsuarioActual;
	
	
		
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
		
		
			<script type="module" src="webroot/js/JavaScript/contabilidad/general/log_actividad/js/util/log_actividad_form_funcion.js?random=1"></script>
						
		
		
		<?php 
			
		
			log_actividad_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					log_actividad_web::$GET_POST=$_GET;
				} else {
					log_actividad_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			log_actividad_web::$STR_NOMBRE_PAGINA = 'log_actividad_form_view.php';
			log_actividad_web::$BIT_ES_PAGINA_PRINCIPAL = 'false';
			log_actividad_web::$BIT_ES_PAGINA_FORM = 'true';
				
			log_actividad_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {log_actividad_constante,log_actividad_constante1} from './webroot/js/JavaScript/contabilidad/general/log_actividad/js/util/log_actividad_constante.js?random=1';
			import {log_actividad_funcion,log_actividad_funcion1} from './webroot/js/JavaScript/contabilidad/general/log_actividad/js/util/log_actividad_funcion.js?random=1';
			
			let log_actividad_constante2 = new log_actividad_constante();
			
			log_actividad_constante2.STR_NOMBRE_PAGINA="<?php echo(log_actividad_web::$STR_NOMBRE_PAGINA); ?>";
			log_actividad_constante2.STR_TYPE_ON_LOADlog_actividad="<?php echo(log_actividad_web::$STR_TYPE_ONLOAD); ?>";
			log_actividad_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(log_actividad_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			log_actividad_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(log_actividad_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			log_actividad_constante2.STR_ACTION="<?php echo(log_actividad_web::$STR_ACTION); ?>";
			log_actividad_constante2.STR_ES_POPUP="<?php echo(log_actividad_web::$STR_ES_POPUP); ?>";
			log_actividad_constante2.STR_ES_BUSQUEDA="<?php echo(log_actividad_web::$STR_ES_BUSQUEDA); ?>";
			log_actividad_constante2.STR_FUNCION_JS="<?php echo(log_actividad_web::$STR_FUNCION_JS); ?>";
			log_actividad_constante2.BIG_ID_ACTUAL="<?php echo(log_actividad_web::$BIG_ID_ACTUAL); ?>";
			log_actividad_constante2.BIG_ID_OPCION="<?php echo(log_actividad_web::$BIG_ID_OPCION); ?>";
			log_actividad_constante2.STR_OBJETO_JS="<?php echo(log_actividad_web::$STR_OBJETO_JS); ?>";
			log_actividad_constante2.STR_ES_RELACIONES="<?php echo(log_actividad_web::$STR_ES_RELACIONES); ?>";
			log_actividad_constante2.STR_ES_RELACIONADO="<?php echo(log_actividad_web::$STR_ES_RELACIONADO); ?>";
			log_actividad_constante2.STR_ES_SUB_PAGINA="<?php echo(log_actividad_web::$STR_ES_SUB_PAGINA); ?>";
			log_actividad_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(log_actividad_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			log_actividad_constante2.BIT_ES_PAGINA_FORM=<?php echo(log_actividad_web::$BIT_ES_PAGINA_FORM); ?>;
			log_actividad_constante2.STR_SUFIJO="<?php echo(log_actividad_web::$STR_SUF); ?>";//log_actividad
			log_actividad_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(log_actividad_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//log_actividad
			
			log_actividad_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(log_actividad_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			log_actividad_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($log_actividad_web1->moduloActual->getnombre()); ?>";
			log_actividad_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(log_actividad_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			log_actividad_constante2.BIT_ES_LOAD_NORMAL=true;
			/*log_actividad_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			log_actividad_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.log_actividad_constante2 = log_actividad_constante2;
			
		</script>
		
		<?php if(log_actividad_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.log_actividad_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.log_actividad_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="log_actividadActual" ></a>
	
	<div id="divResumenlog_actividadActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(log_actividad_web::$STR_ES_RELACIONADO=='false') {?>
		
		<div id="header" >
		
			<div id="banner">
				<span id="spanTituloBanner" class="titulobanner"></span>
			</div> <!-- banner -->
					
			<div id="subheader" class="links">  
			
						
			</div> <!-- sub-header -->
			
			
		</div> <!-- header -->
		
		<?php } ?>
		
		<div id="main">
		

			<?php if(log_actividad_web::$STR_ES_RELACIONADO=='false') {?>
			
			
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(log_actividad_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(log_actividad_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divlog_actividadPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tbllog_actividadPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmlog_actividadAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnlog_actividadAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="log_actividad_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnlog_actividadAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmlog_actividadAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tbllog_actividadPopupAjaxWebPart -->
		</div> <!-- divlog_actividadPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->		
		
		
		
			
<tr id="trlog_actividadElementosFormulario">
	<td>
		<div id="divMantenimientolog_actividadAjaxWebPart" title="LOG ACTIVIDADES" style="height: 90%;width: 90%;position: relative;top: 30px;left: 30px;">
			<form id="frmMantenimientolog_actividad" name="frmMantenimientolog_actividad">

			</br>

			<?php if(log_actividad_web::$STR_ES_RELACIONES=='false' ) {?>
			</br>
			<?php } ?>

			<!-- SECCION/TOOLBAR -->
			<table id="tbllog_actividadToolBarFormularioExterior" style="width: 65%">
				<tr style="display:table-row">
					<td align="center">

						<table id="tbllog_actividadToolBarFormulario" style="text-align: center"  style="display:table-row">
							<tr>
								<td id="tdlog_actividadActualizarToolBar" style="visibility:visible">
									<img id="imgActualizarToolBarlog_actividad" name="imgActualizarToolBarlog_actividad" title="ACTUALIZAR Log Actividades ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/actualizar.gif" width="25" height="25"/>
								</td>
								<td id="tdlog_actividadEliminarToolBar" style="visibility:visible">
									<img id="imgEliminarToolBarlog_actividad" name="imgEliminarToolBarlog_actividad" title="ELIMINAR Log Actividades ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/eliminar.gif" width="25" height="25"/>
								</td>
								<td id="tdlog_actividadCancelarToolBar" style="visibility:visible">
									<img id="imgCancelarToolBarlog_actividad" name="imgCancelarToolBarlog_actividad" title="CANCELAR Log Actividades ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/cancelar.gif" width="25" height="25"/>
								</td>
								<td id="tdlog_actividadRelacionesToolBar" style="display:table-row">
									<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/xexpand.png" width="25" height="25" onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('tblCamposOcultoslog_actividad',this,'../')"/>
								</td>
							</tr>
						</table> <!-- tbllog_actividadToolBarFormulario -->

					</td>
				</tr>
			</table> <!-- tbllog_actividadToolBarFormularioExterior -->

			<table id="tbllog_actividadElementos">
			<tr id="trlog_actividadElementos" class="elementos" style="display:table-row">
			<td align="center">

			<a id="Campos"></a>

				<?php if(log_actividad_web::$STR_ES_RELACIONES=='false' ) {?>
				<div id="divFlechaArribaElementos" align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
					<span></span>
				</div>
				<?php } ?>

				<!-- SECCION/FORMULARIO -->
				<table id="tblElementoslog_actividad" class="elementos" style="width: 300px; padding: 0px; border-spacing: 0px; border-collapse: collapse; text-align: center;">
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
						<td id="td_title-log_id" class="titulocampo">
							<label class="form-label">Log Id.(*)</label>
						</td>
						<td id="td_control-log_id" align="left" class="controlcampo">
							<input id="form-log_id" name="form-log_id" type="text" class="form-control"  placeholder="Log Id"  title="Log Id"    maxlength="10" size="10" >
							<span id="spanstrMensajelog_id" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_5">
						<td id="td_title-fecha" class="titulocampo">
							<label class="form-label">Fecha.(*)</label>
						</td>
						<td id="td_control-fecha" align="left" class="controlcampo">
							<input id="form-fecha" name="form-fecha" type="text" class="form-control"  placeholder="Fecha"  title="Fecha"    size="10" >
							<span id="spanstrMensajefecha" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_6">
						<td id="td_title-hora" class="titulocampo">
							<label class="form-label">Hora.(*)</label>
						</td>
						<td id="td_control-hora" align="left" class="controlcampo">
							<input id="form-hora" name="form-hora" type="text" class="form-control"  placeholder="Hora"  title="Hora"    size="10" >
							<span id="spanstrMensajehora" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_7">
						<td id="td_title-computador" class="titulocampo">
							<label class="form-label">Computador.(*)</label>
						</td>
						<td id="td_control-computador" align="left" class="controlcampo">
							<input id="form-computador" name="form-computador" type="text" class="form-control"  placeholder="Computador"  title="Computador"    size="20"  maxlength="50"/>
							<span id="spanstrMensajecomputador" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_8">
						<td id="td_title-usuario" class="titulocampo">
							<label class="form-label">Usuario.(*)</label>
						</td>
						<td id="td_control-usuario" align="left" class="controlcampo">
							<input id="form-usuario" name="form-usuario" type="text" class="form-control"  placeholder="Usuario"  title="Usuario"    size="20"  maxlength="30"/>
							<span id="spanstrMensajeusuario" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_9">
						<td id="td_title-descripcion" class="titulocampo">
							<label class="form-label">Descripcion.(*)</label>
						</td>
						<td id="td_control-descripcion" align="left" class="controlcampo">
							<textarea id="form-descripcion" name="form-descripcion" class="form-control"  placeholder="Descripcion"  title="Descripcion"   style="font-size: 13px;"  rows ="3" cols= "25"></textarea>
							<span id="spanstrMensajedescripcion" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_10">
						<td id="td_title-modulo" class="titulocampo">
							<label class="form-label">Modulo.(*)</label>
						</td>
						<td id="td_control-modulo" align="left" class="controlcampo">
							<input id="form-modulo" name="form-modulo" type="text" class="form-control"  placeholder="Modulo"  title="Modulo"    size="20"  maxlength="30"/>
							<span id="spanstrMensajemodulo" class="mensajeerror"></span>
						</td>
					</tr>
				</table> <!-- tblElementoslog_actividad -->

				<!-- SECCION/OCULTOS -->
				<table id="tblCamposOcultoslog_actividad" class="elementos" style="display: table-row;">
					<caption class="busquedacabecera">
						<span>Campos Ocultos</span>
					</caption>
				</table> <!-- tblCamposOcultoslog_actividad -->

			</td></tr> <!-- trlog_actividadElementos -->
			</table> <!-- tbllog_actividadElementos -->
			</form> <!-- frmMantenimientolog_actividad -->


			

				<form id="frmAccionesMantenimientolog_actividad" name="frmAccionesMantenimientolog_actividad">

			<?php if(log_actividad_web::$STR_ES_BUSQUEDA=='false' ) {?>
			<table id="tbllog_actividadAcciones" class="elementos" style="text-align: center">
		<tr id="trlog_actividadAcciones" class="elementos" style="display:table-row">
			<td align="center">
				<a id="Acciones" ></a>

				<?php if(log_actividad_web::$STR_ES_RELACIONES=='false' ) {?>
				<div align="right">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
				<?php } ?>

					<!-- SECCION/BOTONES -->
					<table id="tblAccionesMantenimientolog_actividad" class="busqueda" style="width: 50%;text-align: center">

						<?php if(log_actividad_web::$STR_ES_RELACIONES=='false' ) {?>
						<!--
						<caption class="busquedacabecera">
							<span>Acciones</span>
						</caption>
						-->
						<?php } ?>

						<tr id="trAccionesMantenimientolog_actividadBasicos">
							<td id="tdbtnNuevolog_actividad" style="visibility:visible">
								<div id="divNuevolog_actividad" style="display:table-row">
									<input type="button" id="btnNuevolog_actividad" name="btnNuevolog_actividad" value="NUEVO" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnActualizarlog_actividad" style="visibility:visible">
								<div id="divActualizarlog_actividad" style="display:table-row">
									<input type="button" id="btnActualizarlog_actividad" name="btnActualizarlog_actividad" title="ACTUALIZAR Log Actividades ACTUAL" value="Actualizar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnEliminarlog_actividad" style="visibility:visible">
								<div id="divEliminarlog_actividad" style="display:table-row">
									<input type="button" id="btnEliminarlog_actividad" name="btnEliminarlog_actividad" title="ELIMINAR Log Actividades ACTUAL" value="Eliminar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnImprimirlog_actividad" style="visibility:visible">
								<input type="button" id="btnImprimirlog_actividad" name="btnImprimirlog_actividad" title="IMPRIMIR PAGINA Log Actividades ACTUAL" value="Imp. Datos" class="btn btn-primary"/>
							</td>
							<td id="tdbtnCancelarlog_actividad" style="visibility:visible">
								<input type="button" id="btnCancelarlog_actividad" name="btnCancelarlog_actividad" title="CANCELAR Log Actividades ACTUAL" value="Cancelar" class="btn btn-primary"/>
							</td>
						</tr>
						<tr id="trAccionesMantenimientolog_actividadGuardar" style="display:none">
							<td id="tdbtnGuardarCambioslog_actividad" colspan="4" align="center" style="visibility:visible">
								<div id="divGuardarCambioslog_actividad" style="display:table-row">
									<input type="button" id="btnGuardarCambiosFormulariolog_actividad" name="btnGuardarCambiosFormulariolog_actividad" title="GUARDAR" value="GUADAR CAMBIOS" class="btn btn-primary"/>
								</div>
							</td>
						</tr>
					</table> <!-- tblAccionesMantenimientolog_actividad -->
			</td>
		</tr> <!-- trlog_actividadAcciones -->
		<?php if(log_actividad_web::$STR_ES_RELACIONADO=='false' ) {?>
		<tr id="trlog_actividadParametrosAcciones" class="impresion"  style="display:table-row">
			<td align="center">
				<!-- SECCION/POST -->
				<table id="tbllog_actividadParametrosAcciones" style="text-align: center;border: 0px solid black;padding: 0px; border-spacing: 0px">
					<caption class="busquedacabecera" style="padding: 0px;caption-side: top;">
						<span>Acciones Extra/Post</span>
					</caption>
					<tr id="trlog_actividadFilaParametrosAcciones">
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
				</table> <!-- tbllog_actividadParametrosAcciones -->
			</td>
		</tr> <!-- trlog_actividadParametrosAcciones -->
		<?php }?>
		<tr id="trlog_actividadMensajes" class="mensajes">
			<td align="center">
				<a id="Mensajes"></a>
			</td>
		</tr> <!-- trlog_actividadMensajes -->
			</table> <!-- tbllog_actividadAcciones -->
			<?php } ?>
			</form> <!-- frmMantenimientolog_actividad -->
			</div> <!-- divMantenimientolog_actividadAjaxWebPart -->
		</td>
	</tr> <!-- trlog_actividadElementosFormulario/super -->
		<?php if(log_actividad_web::$STR_ES_RELACIONADO=='false' ) {?>

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
			
				import {log_actividad_webcontrol,log_actividad_webcontrol1} from './webroot/js/JavaScript/contabilidad/general/log_actividad/js/webcontrol/log_actividad_form_webcontrol.js?random=1';
				
				log_actividad_webcontrol1.setlog_actividad_constante(window.log_actividad_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(log_actividad_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

