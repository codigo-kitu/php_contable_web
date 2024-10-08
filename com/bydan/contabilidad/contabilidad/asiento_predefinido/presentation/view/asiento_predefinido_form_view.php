<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\contabilidad\asiento_predefinido\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Asiento Predefinido Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/contabilidad/asiento_predefinido/util/asiento_predefinido_carga.php');
	use com\bydan\contabilidad\contabilidad\asiento_predefinido\util\asiento_predefinido_carga;
	
	//include_once('com/bydan/contabilidad/contabilidad/asiento_predefinido/presentation/view/asiento_predefinido_web.php');
	//use com\bydan\contabilidad\contabilidad\asiento_predefinido\presentation\view\asiento_predefinido_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	asiento_predefinido_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	asiento_predefinido_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$asiento_predefinido_web1= new asiento_predefinido_web();	
	$asiento_predefinido_web1->cargarDatosGenerales();
	
	//$moduloActual=$asiento_predefinido_web1->moduloActual;
	//$usuarioActual=$asiento_predefinido_web1->usuarioActual;
	//$sessionBase=$asiento_predefinido_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$asiento_predefinido_web1->parametroGeneralUsuarioActual;
	
	
		
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
		
		
			<script type="module" src="webroot/js/JavaScript/contabilidad/contabilidad/asiento_predefinido/js/util/asiento_predefinido_form_funcion.js?random=1"></script>
						
		
		
		<?php 
			
		
			asiento_predefinido_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					asiento_predefinido_web::$GET_POST=$_GET;
				} else {
					asiento_predefinido_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			asiento_predefinido_web::$STR_NOMBRE_PAGINA = 'asiento_predefinido_form_view.php';
			asiento_predefinido_web::$BIT_ES_PAGINA_PRINCIPAL = 'false';
			asiento_predefinido_web::$BIT_ES_PAGINA_FORM = 'true';
				
			asiento_predefinido_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {asiento_predefinido_constante,asiento_predefinido_constante1} from './webroot/js/JavaScript/contabilidad/contabilidad/asiento_predefinido/js/util/asiento_predefinido_constante.js?random=1';
			import {asiento_predefinido_funcion,asiento_predefinido_funcion1} from './webroot/js/JavaScript/contabilidad/contabilidad/asiento_predefinido/js/util/asiento_predefinido_funcion.js?random=1';
			
			let asiento_predefinido_constante2 = new asiento_predefinido_constante();
			
			asiento_predefinido_constante2.STR_NOMBRE_PAGINA="<?php echo(asiento_predefinido_web::$STR_NOMBRE_PAGINA); ?>";
			asiento_predefinido_constante2.STR_TYPE_ON_LOADasiento_predefinido="<?php echo(asiento_predefinido_web::$STR_TYPE_ONLOAD); ?>";
			asiento_predefinido_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(asiento_predefinido_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			asiento_predefinido_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(asiento_predefinido_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			asiento_predefinido_constante2.STR_ACTION="<?php echo(asiento_predefinido_web::$STR_ACTION); ?>";
			asiento_predefinido_constante2.STR_ES_POPUP="<?php echo(asiento_predefinido_web::$STR_ES_POPUP); ?>";
			asiento_predefinido_constante2.STR_ES_BUSQUEDA="<?php echo(asiento_predefinido_web::$STR_ES_BUSQUEDA); ?>";
			asiento_predefinido_constante2.STR_FUNCION_JS="<?php echo(asiento_predefinido_web::$STR_FUNCION_JS); ?>";
			asiento_predefinido_constante2.BIG_ID_ACTUAL="<?php echo(asiento_predefinido_web::$BIG_ID_ACTUAL); ?>";
			asiento_predefinido_constante2.BIG_ID_OPCION="<?php echo(asiento_predefinido_web::$BIG_ID_OPCION); ?>";
			asiento_predefinido_constante2.STR_OBJETO_JS="<?php echo(asiento_predefinido_web::$STR_OBJETO_JS); ?>";
			asiento_predefinido_constante2.STR_ES_RELACIONES="<?php echo(asiento_predefinido_web::$STR_ES_RELACIONES); ?>";
			asiento_predefinido_constante2.STR_ES_RELACIONADO="<?php echo(asiento_predefinido_web::$STR_ES_RELACIONADO); ?>";
			asiento_predefinido_constante2.STR_ES_SUB_PAGINA="<?php echo(asiento_predefinido_web::$STR_ES_SUB_PAGINA); ?>";
			asiento_predefinido_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(asiento_predefinido_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			asiento_predefinido_constante2.BIT_ES_PAGINA_FORM=<?php echo(asiento_predefinido_web::$BIT_ES_PAGINA_FORM); ?>;
			asiento_predefinido_constante2.STR_SUFIJO="<?php echo(asiento_predefinido_web::$STR_SUF); ?>";//asiento_predefinido
			asiento_predefinido_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(asiento_predefinido_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//asiento_predefinido
			
			asiento_predefinido_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(asiento_predefinido_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			asiento_predefinido_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($asiento_predefinido_web1->moduloActual->getnombre()); ?>";
			asiento_predefinido_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(asiento_predefinido_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			asiento_predefinido_constante2.BIT_ES_LOAD_NORMAL=true;
			/*asiento_predefinido_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			asiento_predefinido_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.asiento_predefinido_constante2 = asiento_predefinido_constante2;
			
		</script>
		
		<?php if(asiento_predefinido_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.asiento_predefinido_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.asiento_predefinido_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="asiento_predefinidoActual" ></a>
	
	<div id="divResumenasiento_predefinidoActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(asiento_predefinido_web::$STR_ES_RELACIONADO=='false') {?>
		
		<div id="header" >
		
			<div id="banner">
				<span id="spanTituloBanner" class="titulobanner"></span>
			</div> <!-- banner -->
					
			<div id="subheader" class="links">  
			
						
			</div> <!-- sub-header -->
			
			
		</div> <!-- header -->
		
		<?php } ?>
		
		<div id="main">
		

			<?php if(asiento_predefinido_web::$STR_ES_RELACIONADO=='false') {?>
			
			
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(asiento_predefinido_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(asiento_predefinido_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divasiento_predefinidoPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblasiento_predefinidoPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmasiento_predefinidoAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnasiento_predefinidoAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="asiento_predefinido_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnasiento_predefinidoAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmasiento_predefinidoAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblasiento_predefinidoPopupAjaxWebPart -->
		</div> <!-- divasiento_predefinidoPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->		
		
		
		
			
<tr id="trasiento_predefinidoElementosFormulario">
	<td>
		<div id="divMantenimientoasiento_predefinidoAjaxWebPart" title="ASIENTO PREDEFINIDO" style="height: 90%;width: 90%;position: relative;top: 30px;left: 30px;">
			<form id="frmMantenimientoasiento_predefinido" name="frmMantenimientoasiento_predefinido">

			</br>

			<?php if(asiento_predefinido_web::$STR_ES_RELACIONES=='false' ) {?>
			</br>
			<?php } ?>

			<!-- SECCION/TOOLBAR -->
			<table id="tblasiento_predefinidoToolBarFormularioExterior" style="width: 65%">
				<tr style="display:table-row">
					<td align="center">

						<table id="tblasiento_predefinidoToolBarFormulario" style="text-align: center"  style="display:table-row">
							<tr>
								<td id="tdasiento_predefinidoActualizarToolBar" style="visibility:visible">
									<img id="imgActualizarToolBarasiento_predefinido" name="imgActualizarToolBarasiento_predefinido" title="ACTUALIZAR Asiento Predefinido ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/actualizar.gif" width="25" height="25"/>
								</td>
								<td id="tdasiento_predefinidoEliminarToolBar" style="visibility:visible">
									<img id="imgEliminarToolBarasiento_predefinido" name="imgEliminarToolBarasiento_predefinido" title="ELIMINAR Asiento Predefinido ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/eliminar.gif" width="25" height="25"/>
								</td>
								<td id="tdasiento_predefinidoCancelarToolBar" style="visibility:visible">
									<img id="imgCancelarToolBarasiento_predefinido" name="imgCancelarToolBarasiento_predefinido" title="CANCELAR Asiento Predefinido ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/cancelar.gif" width="25" height="25"/>
								</td>
								<td id="tdasiento_predefinidoRelacionesToolBar" style="display:table-row">
									<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/xexpand.png" width="25" height="25" onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('tblCamposOcultosasiento_predefinido',this,'../')"/>
								</td>
							</tr>
						</table> <!-- tblasiento_predefinidoToolBarFormulario -->

					</td>
				</tr>
			</table> <!-- tblasiento_predefinidoToolBarFormularioExterior -->

			<table id="tblasiento_predefinidoElementos">
			<tr id="trasiento_predefinidoElementos" class="elementos" style="display:table-row">
			<td align="center">

			<a id="Campos"></a>

				<?php if(asiento_predefinido_web::$STR_ES_RELACIONES=='false' ) {?>
				<div id="divFlechaArribaElementos" align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
					<span></span>
				</div>
				<?php } ?>

				<!-- SECCION/FORMULARIO -->
				<table id="tblElementosasiento_predefinido" class="elementos" style="width: 400px; padding: 0px; border-spacing: 0px; border-collapse: collapse; text-align: left;">
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
							<label class="form-label">Modulo.(*)</label>
						</td>
						<td id="td_control-id_modulo" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_modulo" name="form-id_modulo" title="Modulo" ></select></td>
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
							<input id="form-codigo" name="form-codigo" type="text" class="form-control"  placeholder="Codigo"  title="Codigo"    size="10"  maxlength="10"/>
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
						<td id="td_title-id_documento_contable" class="titulocampo">
							<label class="form-label">Dcto Contable.(*)</label>
						</td>
						<td id="td_control-id_documento_contable" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_documento_contable" name="form-id_documento_contable" title="Dcto Contable" ></select></td>
									<td><a><img id="form-id_documento_contable_img" name="form-id_documento_contable_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_documento_contable_img_busqueda" name="form-id_documento_contable_img_busqueda" title="Buscar Documento Contable" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_documento_contable" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_11">
						<td id="td_title-descripcion" class="titulocampo">
							<label class="form-label">Descripcion</label>
						</td>
						<td id="td_control-descripcion" align="left" class="controlcampo">
							<textarea id="form-descripcion" name="form-descripcion" class="form-control"  placeholder="Descripcion"  title="Descripcion"   style="font-size: 13px;" rows="2" cols="25" size="20" ></textarea>
							<span id="spanstrMensajedescripcion" class="mensajeerror"></span>
						</td>
					</tr>
				</table> <!-- tblElementosasiento_predefinido -->

				<!-- SECCION/OCULTOS -->
				<table id="tblCamposOcultosasiento_predefinido" class="elementos" style="display: table-row;">
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
						<td id="td_title-nro_nit" class="titulocampo">
							<label class="form-label">Nro Nit</label>
						</td>
						<td id="td_control-nro_nit" align="left" class="controlcampo">
							<input id="form-nro_nit" name="form-nro_nit" type="text" class="form-control"  placeholder="Nro Nit"  title="Nro Nit"    size="20"  maxlength="30"/>
							<span id="spanstrMensajenro_nit" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_6">
						<td id="td_title-referencia" class="titulocampo">
							<label class="form-label">Referencia</label>
						</td>
						<td id="td_control-referencia" align="left" class="controlcampo">
							<textarea id="form-referencia" name="form-referencia" class="form-control"  placeholder="Referencia"  title="Referencia"   style="font-size: 13px;" rows="2" cols="25" size="20" ></textarea>
							<span id="spanstrMensajereferencia" class="mensajeerror"></span>
						</td>
					</tr>
				</table> <!-- tblCamposOcultosasiento_predefinido -->

			</td></tr> <!-- trasiento_predefinidoElementos -->
			</table> <!-- tblasiento_predefinidoElementos -->
			</form> <!-- frmMantenimientoasiento_predefinido -->


			

				<form id="frmAccionesMantenimientoasiento_predefinido" name="frmAccionesMantenimientoasiento_predefinido">

			<?php if(asiento_predefinido_web::$STR_ES_BUSQUEDA=='false' ) {?>
			<table id="tblasiento_predefinidoAcciones" class="elementos" style="text-align: center">
		<tr id="trasiento_predefinidoAcciones" class="elementos" style="display:table-row">
			<td align="center">
				<a id="Acciones" ></a>

				<?php if(asiento_predefinido_web::$STR_ES_RELACIONES=='false' ) {?>
				<div align="right">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
				<?php } ?>

					<!-- SECCION/BOTONES -->
					<table id="tblAccionesMantenimientoasiento_predefinido" class="busqueda" style="width: 50%;text-align: left">

						<?php if(asiento_predefinido_web::$STR_ES_RELACIONES=='false' ) {?>
						<!--
						<caption class="busquedacabecera">
							<span>Acciones</span>
						</caption>
						-->
						<?php } ?>

						<tr id="trAccionesMantenimientoasiento_predefinidoBasicos">
							<td id="tdbtnNuevoasiento_predefinido" style="visibility:visible">
								<div id="divNuevoasiento_predefinido" style="display:table-row">
									<input type="button" id="btnNuevoasiento_predefinido" name="btnNuevoasiento_predefinido" value="NUEVO" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnActualizarasiento_predefinido" style="visibility:visible">
								<div id="divActualizarasiento_predefinido" style="display:table-row">
									<input type="button" id="btnActualizarasiento_predefinido" name="btnActualizarasiento_predefinido" title="ACTUALIZAR Asiento Predefinido ACTUAL" value="Actualizar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnEliminarasiento_predefinido" style="visibility:visible">
								<div id="divEliminarasiento_predefinido" style="display:table-row">
									<input type="button" id="btnEliminarasiento_predefinido" name="btnEliminarasiento_predefinido" title="ELIMINAR Asiento Predefinido ACTUAL" value="Eliminar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnImprimirasiento_predefinido" style="visibility:visible">
								<input type="button" id="btnImprimirasiento_predefinido" name="btnImprimirasiento_predefinido" title="IMPRIMIR PAGINA Asiento Predefinido ACTUAL" value="Imp. Datos" class="btn btn-primary"/>
							</td>
							<td id="tdbtnCancelarasiento_predefinido" style="visibility:visible">
								<input type="button" id="btnCancelarasiento_predefinido" name="btnCancelarasiento_predefinido" title="CANCELAR Asiento Predefinido ACTUAL" value="Cancelar" class="btn btn-primary"/>
							</td>
						</tr>
						<tr id="trAccionesMantenimientoasiento_predefinidoGuardar" style="display:none">
							<td id="tdbtnGuardarCambiosasiento_predefinido" colspan="4" align="center" style="visibility:visible">
								<div id="divGuardarCambiosasiento_predefinido" style="display:table-row">
									<input type="button" id="btnGuardarCambiosFormularioasiento_predefinido" name="btnGuardarCambiosFormularioasiento_predefinido" title="GUARDAR" value="GUADAR CAMBIOS" class="btn btn-primary"/>
								</div>
							</td>
						</tr>
					</table> <!-- tblAccionesMantenimientoasiento_predefinido -->
			</td>
		</tr> <!-- trasiento_predefinidoAcciones -->
		<?php if(asiento_predefinido_web::$STR_ES_RELACIONADO=='false' ) {?>
		<tr id="trasiento_predefinidoParametrosAcciones" class="impresion"  style="display:table-row">
			<td align="center">
				<!-- SECCION/POST -->
				<table id="tblasiento_predefinidoParametrosAcciones" style="text-align: center;border: 0px solid black;padding: 0px; border-spacing: 0px">
					<caption class="busquedacabecera" style="padding: 0px;caption-side: top;">
						<span>Acciones Extra/Post</span>
					</caption>
					<tr id="trasiento_predefinidoFilaParametrosAcciones">
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
				</table> <!-- tblasiento_predefinidoParametrosAcciones -->
			</td>
		</tr> <!-- trasiento_predefinidoParametrosAcciones -->
		<?php }?>
		<tr id="trasiento_predefinidoMensajes" class="mensajes">
			<td align="center">
				<a id="Mensajes"></a>
			</td>
		</tr> <!-- trasiento_predefinidoMensajes -->
			</table> <!-- tblasiento_predefinidoAcciones -->
			<?php } ?>
			</form> <!-- frmMantenimientoasiento_predefinido -->
			</div> <!-- divMantenimientoasiento_predefinidoAjaxWebPart -->
		</td>
	</tr> <!-- trasiento_predefinidoElementosFormulario/super -->
		<?php if(asiento_predefinido_web::$STR_ES_RELACIONADO=='false' ) {?>

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
			
				import {asiento_predefinido_webcontrol,asiento_predefinido_webcontrol1} from './webroot/js/JavaScript/contabilidad/contabilidad/asiento_predefinido/js/webcontrol/asiento_predefinido_form_webcontrol.js?random=1';
				
				asiento_predefinido_webcontrol1.setasiento_predefinido_constante(window.asiento_predefinido_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(asiento_predefinido_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

