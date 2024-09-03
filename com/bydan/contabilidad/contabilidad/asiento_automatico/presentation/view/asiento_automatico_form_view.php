<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\contabilidad\asiento_automatico\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Asiento Automatico Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/contabilidad/asiento_automatico/util/asiento_automatico_carga.php');
	use com\bydan\contabilidad\contabilidad\asiento_automatico\util\asiento_automatico_carga;
	
	//include_once('com/bydan/contabilidad/contabilidad/asiento_automatico/presentation/view/asiento_automatico_web.php');
	//use com\bydan\contabilidad\contabilidad\asiento_automatico\presentation\view\asiento_automatico_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	asiento_automatico_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	asiento_automatico_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$asiento_automatico_web1= new asiento_automatico_web();	
	$asiento_automatico_web1->cargarDatosGenerales();
	
	//$moduloActual=$asiento_automatico_web1->moduloActual;
	//$usuarioActual=$asiento_automatico_web1->usuarioActual;
	//$sessionBase=$asiento_automatico_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$asiento_automatico_web1->parametroGeneralUsuarioActual;
	
	
		
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
		
		
			<script type="module" src="webroot/js/JavaScript/contabilidad/contabilidad/asiento_automatico/js/util/asiento_automatico_form_funcion.js?random=1"></script>
						
		
		
		<?php 
			
		
			asiento_automatico_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					asiento_automatico_web::$GET_POST=$_GET;
				} else {
					asiento_automatico_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			asiento_automatico_web::$STR_NOMBRE_PAGINA = 'asiento_automatico_form_view.php';
			asiento_automatico_web::$BIT_ES_PAGINA_PRINCIPAL = 'false';
			asiento_automatico_web::$BIT_ES_PAGINA_FORM = 'true';
				
			asiento_automatico_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {asiento_automatico_constante,asiento_automatico_constante1} from './webroot/js/JavaScript/contabilidad/contabilidad/asiento_automatico/js/util/asiento_automatico_constante.js?random=1';
			import {asiento_automatico_funcion,asiento_automatico_funcion1} from './webroot/js/JavaScript/contabilidad/contabilidad/asiento_automatico/js/util/asiento_automatico_funcion.js?random=1';
			
			let asiento_automatico_constante2 = new asiento_automatico_constante();
			
			asiento_automatico_constante2.STR_NOMBRE_PAGINA="<?php echo(asiento_automatico_web::$STR_NOMBRE_PAGINA); ?>";
			asiento_automatico_constante2.STR_TYPE_ON_LOADasiento_automatico="<?php echo(asiento_automatico_web::$STR_TYPE_ONLOAD); ?>";
			asiento_automatico_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(asiento_automatico_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			asiento_automatico_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(asiento_automatico_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			asiento_automatico_constante2.STR_ACTION="<?php echo(asiento_automatico_web::$STR_ACTION); ?>";
			asiento_automatico_constante2.STR_ES_POPUP="<?php echo(asiento_automatico_web::$STR_ES_POPUP); ?>";
			asiento_automatico_constante2.STR_ES_BUSQUEDA="<?php echo(asiento_automatico_web::$STR_ES_BUSQUEDA); ?>";
			asiento_automatico_constante2.STR_FUNCION_JS="<?php echo(asiento_automatico_web::$STR_FUNCION_JS); ?>";
			asiento_automatico_constante2.BIG_ID_ACTUAL="<?php echo(asiento_automatico_web::$BIG_ID_ACTUAL); ?>";
			asiento_automatico_constante2.BIG_ID_OPCION="<?php echo(asiento_automatico_web::$BIG_ID_OPCION); ?>";
			asiento_automatico_constante2.STR_OBJETO_JS="<?php echo(asiento_automatico_web::$STR_OBJETO_JS); ?>";
			asiento_automatico_constante2.STR_ES_RELACIONES="<?php echo(asiento_automatico_web::$STR_ES_RELACIONES); ?>";
			asiento_automatico_constante2.STR_ES_RELACIONADO="<?php echo(asiento_automatico_web::$STR_ES_RELACIONADO); ?>";
			asiento_automatico_constante2.STR_ES_SUB_PAGINA="<?php echo(asiento_automatico_web::$STR_ES_SUB_PAGINA); ?>";
			asiento_automatico_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(asiento_automatico_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			asiento_automatico_constante2.BIT_ES_PAGINA_FORM=<?php echo(asiento_automatico_web::$BIT_ES_PAGINA_FORM); ?>;
			asiento_automatico_constante2.STR_SUFIJO="<?php echo(asiento_automatico_web::$STR_SUF); ?>";//asiento_automatico
			asiento_automatico_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(asiento_automatico_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//asiento_automatico
			
			asiento_automatico_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(asiento_automatico_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			asiento_automatico_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($asiento_automatico_web1->moduloActual->getnombre()); ?>";
			asiento_automatico_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(asiento_automatico_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			asiento_automatico_constante2.BIT_ES_LOAD_NORMAL=true;
			/*asiento_automatico_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			asiento_automatico_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.asiento_automatico_constante2 = asiento_automatico_constante2;
			
		</script>
		
		<?php if(asiento_automatico_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.asiento_automatico_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.asiento_automatico_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="asiento_automaticoActual" ></a>
	
	<div id="divResumenasiento_automaticoActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(asiento_automatico_web::$STR_ES_RELACIONADO=='false') {?>
		
		<div id="header" >
		
			<div id="banner">
				<span id="spanTituloBanner" class="titulobanner"></span>
			</div> <!-- banner -->
					
			<div id="subheader" class="links">  
			
						
			</div> <!-- sub-header -->
			
			
		</div> <!-- header -->
		
		<?php } ?>
		
		<div id="main">
		

			<?php if(asiento_automatico_web::$STR_ES_RELACIONADO=='false') {?>
			
			
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(asiento_automatico_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(asiento_automatico_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divasiento_automaticoPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblasiento_automaticoPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmasiento_automaticoAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnasiento_automaticoAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="asiento_automatico_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnasiento_automaticoAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmasiento_automaticoAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblasiento_automaticoPopupAjaxWebPart -->
		</div> <!-- divasiento_automaticoPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->		
		
		
		
			
<tr id="trasiento_automaticoElementosFormulario">
	<td>
		<div id="divMantenimientoasiento_automaticoAjaxWebPart" title="ASIENTO AUTOMATICO" style="height: 90%;width: 90%;position: relative;top: 30px;left: 30px;">
			<form id="frmMantenimientoasiento_automatico" name="frmMantenimientoasiento_automatico">

			</br>

			<?php if(asiento_automatico_web::$STR_ES_RELACIONES=='false' ) {?>
			</br>
			<?php } ?>

			<!-- SECCION/TOOLBAR -->
			<table id="tblasiento_automaticoToolBarFormularioExterior" style="width: 65%">
				<tr style="display:table-row">
					<td align="center">

						<table id="tblasiento_automaticoToolBarFormulario" style="text-align: center"  style="display:table-row">
							<tr>
								<td id="tdasiento_automaticoActualizarToolBar" style="visibility:visible">
									<img id="imgActualizarToolBarasiento_automatico" name="imgActualizarToolBarasiento_automatico" title="ACTUALIZAR Asiento Automatico ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/actualizar.gif" width="25" height="25"/>
								</td>
								<td id="tdasiento_automaticoEliminarToolBar" style="visibility:visible">
									<img id="imgEliminarToolBarasiento_automatico" name="imgEliminarToolBarasiento_automatico" title="ELIMINAR Asiento Automatico ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/eliminar.gif" width="25" height="25"/>
								</td>
								<td id="tdasiento_automaticoCancelarToolBar" style="visibility:visible">
									<img id="imgCancelarToolBarasiento_automatico" name="imgCancelarToolBarasiento_automatico" title="CANCELAR Asiento Automatico ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/cancelar.gif" width="25" height="25"/>
								</td>
								<td id="tdasiento_automaticoRelacionesToolBar" style="display:table-row">
									<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/xexpand.png" width="25" height="25" onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('tblCamposOcultosasiento_automatico',this,'../')"/>
								</td>
							</tr>
						</table> <!-- tblasiento_automaticoToolBarFormulario -->

					</td>
				</tr>
			</table> <!-- tblasiento_automaticoToolBarFormularioExterior -->

			<table id="tblasiento_automaticoElementos">
			<tr id="trasiento_automaticoElementos" class="elementos" style="display:table-row">
			<td align="center">

			<a id="Campos"></a>

				<?php if(asiento_automatico_web::$STR_ES_RELACIONES=='false' ) {?>
				<div id="divFlechaArribaElementos" align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
					<span></span>
				</div>
				<?php } ?>

				<!-- SECCION/FORMULARIO -->
				<table id="tblElementosasiento_automatico" class="elementos" style="width: 350px; padding: 0px; border-spacing: 0px; border-collapse: collapse; text-align: left;">
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
						<td id="td_title-id_modulo" class="titulocampo">
							<label class="form-label"> Modulo.(*)</label>
						</td>
						<td id="td_control-id_modulo" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_modulo" name="form-id_modulo" title=" Modulo" ></select></td>
									<td><a><img id="form-id_modulo_img" name="form-id_modulo_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_modulo_img_busqueda" name="form-id_modulo_img_busqueda" title="Buscar Modulo" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_modulo" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_5">
						<td id="td_title-codigo" class="titulocampo">
							<label class="form-label">Codigo.(*)</label>
						</td>
						<td id="td_control-codigo" align="left" class="controlcampo">
							<input id="form-codigo" name="form-codigo" type="text" class="form-control"  placeholder="Codigo"  title="Codigo"    size="20"  maxlength="50"/>
							<span id="spanstrMensajecodigo" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_6">
						<td id="td_title-nombre" class="titulocampo">
							<label class="form-label">Nombre.(*)</label>
						</td>
						<td id="td_control-nombre" align="left" class="controlcampo">
							<textarea id="form-nombre" name="form-nombre" class="form-control"  placeholder="Nombre"  title="Nombre"   style="font-size: 13px;" rows="2" cols="25" size="20" ></textarea>
							<span id="spanstrMensajenombre" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_7">
						<td id="td_title-id_fuente" class="titulocampo">
							<label class="form-label">Fuente.(*)</label>
						</td>
						<td id="td_control-id_fuente" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_fuente" name="form-id_fuente" title="Fuente" ></select></td>
									<td><a><img id="form-id_fuente_img" name="form-id_fuente_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_fuente_img_busqueda" name="form-id_fuente_img_busqueda" title="Buscar Fuente" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_fuente" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_8">
						<td id="td_title-id_libro_auxiliar" class="titulocampo">
							<label class="form-label">Libro Auxiliar.(*)</label>
						</td>
						<td id="td_control-id_libro_auxiliar" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_libro_auxiliar" name="form-id_libro_auxiliar" title="Libro Auxiliar" ></select></td>
									<td><a><img id="form-id_libro_auxiliar_img" name="form-id_libro_auxiliar_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_libro_auxiliar_img_busqueda" name="form-id_libro_auxiliar_img_busqueda" title="Buscar Libro Auxiliar" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_libro_auxiliar" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_9">
						<td id="td_title-id_centro_costo" class="titulocampo">
							<label class="form-label">Centro Costo.(*)</label>
						</td>
						<td id="td_control-id_centro_costo" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_centro_costo" name="form-id_centro_costo" title="Centro Costo" ></select></td>
									<td><a><img id="form-id_centro_costo_img" name="form-id_centro_costo_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_centro_costo_img_busqueda" name="form-id_centro_costo_img_busqueda" title="Buscar Centro Costo" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_centro_costo" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_10">
						<td id="td_title-descripcion" class="titulocampo">
							<label class="form-label">Descripcion</label>
						</td>
						<td id="td_control-descripcion" align="left" class="controlcampo">
							<textarea id="form-descripcion" name="form-descripcion" class="form-control"  placeholder="Descripcion"  title="Descripcion"   style="font-size: 13px;" rows="2" cols="25" size="20" ></textarea>
							<span id="spanstrMensajedescripcion" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_11">
						<td id="td_title-activo" class="titulocampo">
							<label class="form-label">Activo</label>
						</td>
						<td id="td_control-activo" align="left" class="controlcampo">
							<input id="form-activo" name="form-activo" type="checkbox" >
							<span id="spanstrMensajeactivo" class="mensajeerror"></span>
						</td>
					</tr>
				</table> <!-- tblElementosasiento_automatico -->

				<!-- SECCION/OCULTOS -->
				<table id="tblCamposOcultosasiento_automatico" class="elementos" style="display: table-row;">
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
						<td id="td_title-asignada" class="titulocampo">
							<label class="form-label">Asignada</label>
						</td>
						<td id="td_control-asignada" align="left" class="controlcampo">
							<input id="form-asignada" name="form-asignada" type="text" class="form-control"  placeholder="Asignada"  title="Asignada"    size="20"  maxlength="20"/>
							<span id="spanstrMensajeasignada" class="mensajeerror"></span>
						</td>
					</tr>
				</table> <!-- tblCamposOcultosasiento_automatico -->

			</td></tr> <!-- trasiento_automaticoElementos -->
			</table> <!-- tblasiento_automaticoElementos -->
			</form> <!-- frmMantenimientoasiento_automatico -->


			

				<form id="frmAccionesMantenimientoasiento_automatico" name="frmAccionesMantenimientoasiento_automatico">

			<?php if(asiento_automatico_web::$STR_ES_BUSQUEDA=='false' ) {?>
			<table id="tblasiento_automaticoAcciones" class="elementos" style="text-align: center">
		<tr id="trasiento_automaticoAcciones" class="elementos" style="display:table-row">
			<td align="center">
				<a id="Acciones" ></a>

				<?php if(asiento_automatico_web::$STR_ES_RELACIONES=='false' ) {?>
				<div align="right">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
				<?php } ?>

					<!-- SECCION/BOTONES -->
					<table id="tblAccionesMantenimientoasiento_automatico" class="busqueda" style="width: 50%;text-align: left">

						<?php if(asiento_automatico_web::$STR_ES_RELACIONES=='false' ) {?>
						<!--
						<caption class="busquedacabecera">
							<span>Acciones</span>
						</caption>
						-->
						<?php } ?>

						<tr id="trAccionesMantenimientoasiento_automaticoBasicos">
							<td id="tdbtnNuevoasiento_automatico" style="visibility:visible">
								<div id="divNuevoasiento_automatico" style="display:table-row">
									<input type="button" id="btnNuevoasiento_automatico" name="btnNuevoasiento_automatico" value="NUEVO" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnActualizarasiento_automatico" style="visibility:visible">
								<div id="divActualizarasiento_automatico" style="display:table-row">
									<input type="button" id="btnActualizarasiento_automatico" name="btnActualizarasiento_automatico" title="ACTUALIZAR Asiento Automatico ACTUAL" value="Actualizar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnEliminarasiento_automatico" style="visibility:visible">
								<div id="divEliminarasiento_automatico" style="display:table-row">
									<input type="button" id="btnEliminarasiento_automatico" name="btnEliminarasiento_automatico" title="ELIMINAR Asiento Automatico ACTUAL" value="Eliminar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnImprimirasiento_automatico" style="visibility:visible">
								<input type="button" id="btnImprimirasiento_automatico" name="btnImprimirasiento_automatico" title="IMPRIMIR PAGINA Asiento Automatico ACTUAL" value="Imp. Datos" class="btn btn-primary"/>
							</td>
							<td id="tdbtnCancelarasiento_automatico" style="visibility:visible">
								<input type="button" id="btnCancelarasiento_automatico" name="btnCancelarasiento_automatico" title="CANCELAR Asiento Automatico ACTUAL" value="Cancelar" class="btn btn-primary"/>
							</td>
						</tr>
						<tr id="trAccionesMantenimientoasiento_automaticoGuardar" style="display:none">
							<td id="tdbtnGuardarCambiosasiento_automatico" colspan="4" align="center" style="visibility:visible">
								<div id="divGuardarCambiosasiento_automatico" style="display:table-row">
									<input type="button" id="btnGuardarCambiosFormularioasiento_automatico" name="btnGuardarCambiosFormularioasiento_automatico" title="GUARDAR" value="GUADAR CAMBIOS" class="btn btn-primary"/>
								</div>
							</td>
						</tr>
					</table> <!-- tblAccionesMantenimientoasiento_automatico -->
			</td>
		</tr> <!-- trasiento_automaticoAcciones -->
		<?php if(asiento_automatico_web::$STR_ES_RELACIONADO=='false' ) {?>
		<tr id="trasiento_automaticoParametrosAcciones" class="impresion"  style="display:table-row">
			<td align="center">
				<!-- SECCION/POST -->
				<table id="tblasiento_automaticoParametrosAcciones" style="text-align: center;border: 0px solid black;padding: 0px; border-spacing: 0px">
					<caption class="busquedacabecera" style="padding: 0px;caption-side: top;">
						<span>Acciones Extra/Post</span>
					</caption>
					<tr id="trasiento_automaticoFilaParametrosAcciones">
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
				</table> <!-- tblasiento_automaticoParametrosAcciones -->
			</td>
		</tr> <!-- trasiento_automaticoParametrosAcciones -->
		<?php }?>
		<tr id="trasiento_automaticoMensajes" class="mensajes">
			<td align="center">
				<a id="Mensajes"></a>
			</td>
		</tr> <!-- trasiento_automaticoMensajes -->
			</table> <!-- tblasiento_automaticoAcciones -->
			<?php } ?>
			</form> <!-- frmMantenimientoasiento_automatico -->
			</div> <!-- divMantenimientoasiento_automaticoAjaxWebPart -->
		</td>
	</tr> <!-- trasiento_automaticoElementosFormulario/super -->
		<?php if(asiento_automatico_web::$STR_ES_RELACIONADO=='false' ) {?>

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
			
				import {asiento_automatico_webcontrol,asiento_automatico_webcontrol1} from './webroot/js/JavaScript/contabilidad/contabilidad/asiento_automatico/js/webcontrol/asiento_automatico_form_webcontrol.js?random=1';
				
				asiento_automatico_webcontrol1.setasiento_automatico_constante(window.asiento_automatico_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(asiento_automatico_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

