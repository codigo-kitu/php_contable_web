<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\seguridad\historial_cambio_clave\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Historial Cambio Clave Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/seguridad/historial_cambio_clave/util/historial_cambio_clave_carga.php');
	use com\bydan\contabilidad\seguridad\historial_cambio_clave\util\historial_cambio_clave_carga;
	
	//include_once('com/bydan/contabilidad/seguridad/historial_cambio_clave/presentation/view/historial_cambio_clave_web.php');
	//use com\bydan\contabilidad\seguridad\historial_cambio_clave\presentation\view\historial_cambio_clave_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	historial_cambio_clave_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	historial_cambio_clave_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$historial_cambio_clave_web1= new historial_cambio_clave_web();	
	$historial_cambio_clave_web1->cargarDatosGenerales();
	
	//$moduloActual=$historial_cambio_clave_web1->moduloActual;
	//$usuarioActual=$historial_cambio_clave_web1->usuarioActual;
	//$sessionBase=$historial_cambio_clave_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$historial_cambio_clave_web1->parametroGeneralUsuarioActual;
	
	
		
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
		
		
			<script type="module" src="webroot/js/JavaScript/contabilidad/seguridad/historial_cambio_clave/js/util/historial_cambio_clave_form_funcion.js?random=1"></script>
						
		
		
		<?php 
			
		
			historial_cambio_clave_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					historial_cambio_clave_web::$GET_POST=$_GET;
				} else {
					historial_cambio_clave_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			historial_cambio_clave_web::$STR_NOMBRE_PAGINA = 'historial_cambio_clave_form_view.php';
			historial_cambio_clave_web::$BIT_ES_PAGINA_PRINCIPAL = 'false';
			historial_cambio_clave_web::$BIT_ES_PAGINA_FORM = 'true';
				
			historial_cambio_clave_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {historial_cambio_clave_constante,historial_cambio_clave_constante1} from './webroot/js/JavaScript/contabilidad/seguridad/historial_cambio_clave/js/util/historial_cambio_clave_constante.js?random=1';
			import {historial_cambio_clave_funcion,historial_cambio_clave_funcion1} from './webroot/js/JavaScript/contabilidad/seguridad/historial_cambio_clave/js/util/historial_cambio_clave_funcion.js?random=1';
			
			let historial_cambio_clave_constante2 = new historial_cambio_clave_constante();
			
			historial_cambio_clave_constante2.STR_NOMBRE_PAGINA="<?php echo(historial_cambio_clave_web::$STR_NOMBRE_PAGINA); ?>";
			historial_cambio_clave_constante2.STR_TYPE_ON_LOADhistorial_cambio_clave="<?php echo(historial_cambio_clave_web::$STR_TYPE_ONLOAD); ?>";
			historial_cambio_clave_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(historial_cambio_clave_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			historial_cambio_clave_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(historial_cambio_clave_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			historial_cambio_clave_constante2.STR_ACTION="<?php echo(historial_cambio_clave_web::$STR_ACTION); ?>";
			historial_cambio_clave_constante2.STR_ES_POPUP="<?php echo(historial_cambio_clave_web::$STR_ES_POPUP); ?>";
			historial_cambio_clave_constante2.STR_ES_BUSQUEDA="<?php echo(historial_cambio_clave_web::$STR_ES_BUSQUEDA); ?>";
			historial_cambio_clave_constante2.STR_FUNCION_JS="<?php echo(historial_cambio_clave_web::$STR_FUNCION_JS); ?>";
			historial_cambio_clave_constante2.BIG_ID_ACTUAL="<?php echo(historial_cambio_clave_web::$BIG_ID_ACTUAL); ?>";
			historial_cambio_clave_constante2.BIG_ID_OPCION="<?php echo(historial_cambio_clave_web::$BIG_ID_OPCION); ?>";
			historial_cambio_clave_constante2.STR_OBJETO_JS="<?php echo(historial_cambio_clave_web::$STR_OBJETO_JS); ?>";
			historial_cambio_clave_constante2.STR_ES_RELACIONES="<?php echo(historial_cambio_clave_web::$STR_ES_RELACIONES); ?>";
			historial_cambio_clave_constante2.STR_ES_RELACIONADO="<?php echo(historial_cambio_clave_web::$STR_ES_RELACIONADO); ?>";
			historial_cambio_clave_constante2.STR_ES_SUB_PAGINA="<?php echo(historial_cambio_clave_web::$STR_ES_SUB_PAGINA); ?>";
			historial_cambio_clave_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(historial_cambio_clave_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			historial_cambio_clave_constante2.BIT_ES_PAGINA_FORM=<?php echo(historial_cambio_clave_web::$BIT_ES_PAGINA_FORM); ?>;
			historial_cambio_clave_constante2.STR_SUFIJO="<?php echo(historial_cambio_clave_web::$STR_SUF); ?>";//historial_cambio_clave
			historial_cambio_clave_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(historial_cambio_clave_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//historial_cambio_clave
			
			historial_cambio_clave_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(historial_cambio_clave_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			historial_cambio_clave_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($historial_cambio_clave_web1->moduloActual->getnombre()); ?>";
			historial_cambio_clave_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(historial_cambio_clave_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			historial_cambio_clave_constante2.BIT_ES_LOAD_NORMAL=true;
			/*historial_cambio_clave_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			historial_cambio_clave_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.historial_cambio_clave_constante2 = historial_cambio_clave_constante2;
			
		</script>
		
		<?php if(historial_cambio_clave_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.historial_cambio_clave_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.historial_cambio_clave_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="historial_cambio_claveActual" ></a>
	
	<div id="divResumenhistorial_cambio_claveActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(historial_cambio_clave_web::$STR_ES_RELACIONADO=='false') {?>
		
		<div id="header" >
		
			<div id="banner">
				<span id="spanTituloBanner" class="titulobanner"></span>
			</div> <!-- banner -->
					
			<div id="subheader" class="links">  
			
						
			</div> <!-- sub-header -->
			
			
		</div> <!-- header -->
		
		<?php } ?>
		
		<div id="main">
		

			<?php if(historial_cambio_clave_web::$STR_ES_RELACIONADO=='false') {?>
			
			
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(historial_cambio_clave_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(historial_cambio_clave_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divhistorial_cambio_clavePopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblhistorial_cambio_clavePopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmhistorial_cambio_claveAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnhistorial_cambio_claveAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="historial_cambio_clave_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnhistorial_cambio_claveAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmhistorial_cambio_claveAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblhistorial_cambio_clavePopupAjaxWebPart -->
		</div> <!-- divhistorial_cambio_clavePopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->		
		
		
		
			
<tr id="trhistorial_cambio_claveElementosFormulario">
	<td>
		<div id="divMantenimientohistorial_cambio_claveAjaxWebPart" title="HISTORIAL CAMBIO CLAVE" style="height: 90%;width: 90%;position: relative;top: 30px;left: 30px;">
			<form id="frmMantenimientohistorial_cambio_clave" name="frmMantenimientohistorial_cambio_clave">

			</br>

			<?php if(historial_cambio_clave_web::$STR_ES_RELACIONES=='false' ) {?>
			</br>
			<?php } ?>

			<!-- SECCION/TOOLBAR -->
			<table id="tblhistorial_cambio_claveToolBarFormularioExterior" style="width: 65%">
				<tr style="display:table-row">
					<td align="center">

						<table id="tblhistorial_cambio_claveToolBarFormulario" style="text-align: center"  style="display:table-row">
							<tr>
								<td id="tdhistorial_cambio_claveActualizarToolBar" style="visibility:visible">
									<img id="imgActualizarToolBarhistorial_cambio_clave" name="imgActualizarToolBarhistorial_cambio_clave" title="ACTUALIZAR Historial Cambio Clave ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/actualizar.gif" width="25" height="25"/>
								</td>
								<td id="tdhistorial_cambio_claveEliminarToolBar" style="visibility:visible">
									<img id="imgEliminarToolBarhistorial_cambio_clave" name="imgEliminarToolBarhistorial_cambio_clave" title="ELIMINAR Historial Cambio Clave ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/eliminar.gif" width="25" height="25"/>
								</td>
								<td id="tdhistorial_cambio_claveCancelarToolBar" style="visibility:visible">
									<img id="imgCancelarToolBarhistorial_cambio_clave" name="imgCancelarToolBarhistorial_cambio_clave" title="CANCELAR Historial Cambio Clave ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/cancelar.gif" width="25" height="25"/>
								</td>
								<td id="tdhistorial_cambio_claveRelacionesToolBar" style="display:table-row">
									<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/xexpand.png" width="25" height="25" onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('tblCamposOcultoshistorial_cambio_clave',this,'../')"/>
								</td>
							</tr>
						</table> <!-- tblhistorial_cambio_claveToolBarFormulario -->

					</td>
				</tr>
			</table> <!-- tblhistorial_cambio_claveToolBarFormularioExterior -->

			<table id="tblhistorial_cambio_claveElementos">
			<tr id="trhistorial_cambio_claveElementos" class="elementos" style="display:table-row">
			<td align="center">

			<a id="Campos"></a>

				<?php if(historial_cambio_clave_web::$STR_ES_RELACIONES=='false' ) {?>
				<div id="divFlechaArribaElementos" align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
					<span></span>
				</div>
				<?php } ?>

				<!-- SECCION/FORMULARIO -->
				<table id="tblElementoshistorial_cambio_clave" class="elementos" style="width: 300px; padding: 0px; border-spacing: 0px; border-collapse: collapse; text-align: center;">
					<tr id="tr_fila_1">
						<td colspan="2" style="visibility:hidden;display:none">
							<table style="width:100%">
								<tr style="visibility:hidden;display:none">
						<td id="td_title-id" class="titulocampo">
							<label class="form-label">Cod. Único</label>
						</td>
						<td id="td_control-id" align="left">
							<input id="form-id" name="form-id" type="text" class="form-control" readonly size="10">
						</td>
								</tr>
							</table>
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
						<td id="td_title-nombre" class="titulocampo">
							<label class="form-label">Nombre.(*)</label>
						</td>
						<td id="td_control-nombre" align="left" class="controlcampo">
							<input id="form-nombre" name="form-nombre" type="text" class="form-control"  placeholder="Nombre"  title="Nombre"    size="20"  maxlength="50"/>
							<span id="spanstrMensajenombre" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_5">
						<td id="td_title-fecha_hora" class="titulocampo">
							<label class="form-label">Fecha Hora.(*)</label>
						</td>
						<td id="td_control-fecha_hora" align="left" class="controlcampo">
							<input id="form-fecha_hora" name="form-fecha_hora" type="text" class="form-control"  placeholder="Fecha Hora"  title="Fecha Hora"    size="10" >
							<span id="spanstrMensajefecha_hora" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_6">
						<td id="td_title-observacion" class="titulocampo">
							<label class="form-label">Observacion.(*)</label>
						</td>
						<td id="td_control-observacion" align="left" class="controlcampo">
							<textarea id="form-observacion" name="form-observacion" class="form-control"  placeholder="Observacion"  title="Observacion"   style="font-size: 13px;" rows="3" cols="25" size="20" ></textarea>
							<span id="spanstrMensajeobservacion" class="mensajeerror"></span>
						</td>
					</tr>
				</table> <!-- tblElementoshistorial_cambio_clave -->

				<!-- SECCION/OCULTOS -->
				<table id="tblCamposOcultoshistorial_cambio_clave" class="elementos" style="display: table-row;">
					<caption class="busquedacabecera">
						<span>Campos Ocultos</span>
					</caption>
					
						<td id="td_title-id_usuario" class="titulocampo">
							<label class="form-label">Usuario.(*)</label>
						</td>
						<td id="td_control-id_usuario" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_usuario" name="form-id_usuario" title="Usuario" ></select></td>
									<td><a><img id="form-id_usuario_img" name="form-id_usuario_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_usuario_img_busqueda" name="form-id_usuario_img_busqueda" title="Buscar Usuario" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_usuario" class="mensajeerror"></span>
						</td>
					
				</table> <!-- tblCamposOcultoshistorial_cambio_clave -->

			</td></tr> <!-- trhistorial_cambio_claveElementos -->
			</table> <!-- tblhistorial_cambio_claveElementos -->
			</form> <!-- frmMantenimientohistorial_cambio_clave -->


			

				<form id="frmAccionesMantenimientohistorial_cambio_clave" name="frmAccionesMantenimientohistorial_cambio_clave">

			<?php if(historial_cambio_clave_web::$STR_ES_BUSQUEDA=='false' ) {?>
			<table id="tblhistorial_cambio_claveAcciones" class="elementos" style="text-align: center">
		<tr id="trhistorial_cambio_claveAcciones" class="elementos" style="display:table-row">
			<td align="center">
				<a id="Acciones" ></a>

				<?php if(historial_cambio_clave_web::$STR_ES_RELACIONES=='false' ) {?>
				<div align="right">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
				<?php } ?>

					<!-- SECCION/BOTONES -->
					<table id="tblAccionesMantenimientohistorial_cambio_clave" class="busqueda" style="width: 50%;text-align: center">

						<?php if(historial_cambio_clave_web::$STR_ES_RELACIONES=='false' ) {?>
						<!--
						<caption class="busquedacabecera">
							<span>Acciones</span>
						</caption>
						-->
						<?php } ?>

						<tr id="trAccionesMantenimientohistorial_cambio_claveBasicos">
							<td id="tdbtnNuevohistorial_cambio_clave" style="visibility:visible">
								<div id="divNuevohistorial_cambio_clave" style="display:table-row">
									<input type="button" id="btnNuevohistorial_cambio_clave" name="btnNuevohistorial_cambio_clave" value="NUEVO" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnActualizarhistorial_cambio_clave" style="visibility:visible">
								<div id="divActualizarhistorial_cambio_clave" style="display:table-row">
									<input type="button" id="btnActualizarhistorial_cambio_clave" name="btnActualizarhistorial_cambio_clave" title="ACTUALIZAR Historial Cambio Clave ACTUAL" value="Actualizar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnEliminarhistorial_cambio_clave" style="visibility:visible">
								<div id="divEliminarhistorial_cambio_clave" style="display:table-row">
									<input type="button" id="btnEliminarhistorial_cambio_clave" name="btnEliminarhistorial_cambio_clave" title="ELIMINAR Historial Cambio Clave ACTUAL" value="Eliminar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnImprimirhistorial_cambio_clave" style="visibility:visible">
								<input type="button" id="btnImprimirhistorial_cambio_clave" name="btnImprimirhistorial_cambio_clave" title="IMPRIMIR PAGINA Historial Cambio Clave ACTUAL" value="Imp. Datos" class="btn btn-primary"/>
							</td>
							<td id="tdbtnCancelarhistorial_cambio_clave" style="visibility:visible">
								<input type="button" id="btnCancelarhistorial_cambio_clave" name="btnCancelarhistorial_cambio_clave" title="CANCELAR Historial Cambio Clave ACTUAL" value="Cancelar" class="btn btn-primary"/>
							</td>
						</tr>
						<tr id="trAccionesMantenimientohistorial_cambio_claveGuardar" style="display:none">
							<td id="tdbtnGuardarCambioshistorial_cambio_clave" colspan="4" align="center" style="visibility:visible">
								<div id="divGuardarCambioshistorial_cambio_clave" style="display:table-row">
									<input type="button" id="btnGuardarCambiosFormulariohistorial_cambio_clave" name="btnGuardarCambiosFormulariohistorial_cambio_clave" title="GUARDAR" value="GUADAR CAMBIOS" class="btn btn-primary"/>
								</div>
							</td>
						</tr>
					</table> <!-- tblAccionesMantenimientohistorial_cambio_clave -->
			</td>
		</tr> <!-- trhistorial_cambio_claveAcciones -->
		<?php if(historial_cambio_clave_web::$STR_ES_RELACIONADO=='false' ) {?>
		<tr id="trhistorial_cambio_claveParametrosAcciones" class="impresion"  style="display:table-row">
			<td align="center">
				<!-- SECCION/POST -->
				<table id="tblhistorial_cambio_claveParametrosAcciones" style="text-align: center;border: 0px solid black;padding: 0px; border-spacing: 0px">
					<caption class="busquedacabecera" style="padding: 0px;caption-side: top;">
						<span>Acciones Extra/Post</span>
					</caption>
					<tr id="trhistorial_cambio_claveFilaParametrosAcciones">
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
				</table> <!-- tblhistorial_cambio_claveParametrosAcciones -->
			</td>
		</tr> <!-- trhistorial_cambio_claveParametrosAcciones -->
		<?php }?>
		<tr id="trhistorial_cambio_claveMensajes" class="mensajes">
			<td align="center">
				<a id="Mensajes"></a>
			</td>
		</tr> <!-- trhistorial_cambio_claveMensajes -->
			</table> <!-- tblhistorial_cambio_claveAcciones -->
			<?php } ?>
			</form> <!-- frmMantenimientohistorial_cambio_clave -->
			</div> <!-- divMantenimientohistorial_cambio_claveAjaxWebPart -->
		</td>
	</tr> <!-- trhistorial_cambio_claveElementosFormulario/super -->
		<?php if(historial_cambio_clave_web::$STR_ES_RELACIONADO=='false' ) {?>

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
			
				import {historial_cambio_clave_webcontrol,historial_cambio_clave_webcontrol1} from './webroot/js/JavaScript/contabilidad/seguridad/historial_cambio_clave/js/webcontrol/historial_cambio_clave_form_webcontrol.js?random=1';
				
				historial_cambio_clave_webcontrol1.sethistorial_cambio_clave_constante(window.historial_cambio_clave_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(historial_cambio_clave_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

