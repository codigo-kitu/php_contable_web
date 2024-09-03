<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\contabilidad\cierre_contable\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Cierres Contables Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/contabilidad/cierre_contable/util/cierre_contable_carga.php');
	use com\bydan\contabilidad\contabilidad\cierre_contable\util\cierre_contable_carga;
	
	//include_once('com/bydan/contabilidad/contabilidad/cierre_contable/presentation/view/cierre_contable_web.php');
	//use com\bydan\contabilidad\contabilidad\cierre_contable\presentation\view\cierre_contable_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	cierre_contable_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	cierre_contable_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$cierre_contable_web1= new cierre_contable_web();	
	$cierre_contable_web1->cargarDatosGenerales();
	
	//$moduloActual=$cierre_contable_web1->moduloActual;
	//$usuarioActual=$cierre_contable_web1->usuarioActual;
	//$sessionBase=$cierre_contable_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$cierre_contable_web1->parametroGeneralUsuarioActual;
	
	
		
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
		
		
			<script type="module" src="webroot/js/JavaScript/contabilidad/contabilidad/cierre_contable/js/util/cierre_contable_form_funcion.js?random=1"></script>
						
		
		
		<?php 
			
		
			cierre_contable_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					cierre_contable_web::$GET_POST=$_GET;
				} else {
					cierre_contable_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			cierre_contable_web::$STR_NOMBRE_PAGINA = 'cierre_contable_form_view.php';
			cierre_contable_web::$BIT_ES_PAGINA_PRINCIPAL = 'false';
			cierre_contable_web::$BIT_ES_PAGINA_FORM = 'true';
				
			cierre_contable_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {cierre_contable_constante,cierre_contable_constante1} from './webroot/js/JavaScript/contabilidad/contabilidad/cierre_contable/js/util/cierre_contable_constante.js?random=1';
			import {cierre_contable_funcion,cierre_contable_funcion1} from './webroot/js/JavaScript/contabilidad/contabilidad/cierre_contable/js/util/cierre_contable_funcion.js?random=1';
			
			let cierre_contable_constante2 = new cierre_contable_constante();
			
			cierre_contable_constante2.STR_NOMBRE_PAGINA="<?php echo(cierre_contable_web::$STR_NOMBRE_PAGINA); ?>";
			cierre_contable_constante2.STR_TYPE_ON_LOADcierre_contable="<?php echo(cierre_contable_web::$STR_TYPE_ONLOAD); ?>";
			cierre_contable_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(cierre_contable_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			cierre_contable_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(cierre_contable_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			cierre_contable_constante2.STR_ACTION="<?php echo(cierre_contable_web::$STR_ACTION); ?>";
			cierre_contable_constante2.STR_ES_POPUP="<?php echo(cierre_contable_web::$STR_ES_POPUP); ?>";
			cierre_contable_constante2.STR_ES_BUSQUEDA="<?php echo(cierre_contable_web::$STR_ES_BUSQUEDA); ?>";
			cierre_contable_constante2.STR_FUNCION_JS="<?php echo(cierre_contable_web::$STR_FUNCION_JS); ?>";
			cierre_contable_constante2.BIG_ID_ACTUAL="<?php echo(cierre_contable_web::$BIG_ID_ACTUAL); ?>";
			cierre_contable_constante2.BIG_ID_OPCION="<?php echo(cierre_contable_web::$BIG_ID_OPCION); ?>";
			cierre_contable_constante2.STR_OBJETO_JS="<?php echo(cierre_contable_web::$STR_OBJETO_JS); ?>";
			cierre_contable_constante2.STR_ES_RELACIONES="<?php echo(cierre_contable_web::$STR_ES_RELACIONES); ?>";
			cierre_contable_constante2.STR_ES_RELACIONADO="<?php echo(cierre_contable_web::$STR_ES_RELACIONADO); ?>";
			cierre_contable_constante2.STR_ES_SUB_PAGINA="<?php echo(cierre_contable_web::$STR_ES_SUB_PAGINA); ?>";
			cierre_contable_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(cierre_contable_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			cierre_contable_constante2.BIT_ES_PAGINA_FORM=<?php echo(cierre_contable_web::$BIT_ES_PAGINA_FORM); ?>;
			cierre_contable_constante2.STR_SUFIJO="<?php echo(cierre_contable_web::$STR_SUF); ?>";//cierre_contable
			cierre_contable_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(cierre_contable_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//cierre_contable
			
			cierre_contable_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(cierre_contable_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			cierre_contable_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($cierre_contable_web1->moduloActual->getnombre()); ?>";
			cierre_contable_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(cierre_contable_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			cierre_contable_constante2.BIT_ES_LOAD_NORMAL=true;
			/*cierre_contable_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			cierre_contable_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.cierre_contable_constante2 = cierre_contable_constante2;
			
		</script>
		
		<?php if(cierre_contable_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.cierre_contable_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.cierre_contable_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="cierre_contableActual" ></a>
	
	<div id="divResumencierre_contableActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(cierre_contable_web::$STR_ES_RELACIONADO=='false') {?>
		
		<div id="header" >
		
			<div id="banner">
				<span id="spanTituloBanner" class="titulobanner"></span>
			</div> <!-- banner -->
					
			<div id="subheader" class="links">  
			
						
			</div> <!-- sub-header -->
			
			
		</div> <!-- header -->
		
		<?php } ?>
		
		<div id="main">
		

			<?php if(cierre_contable_web::$STR_ES_RELACIONADO=='false') {?>
			
			
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(cierre_contable_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(cierre_contable_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divcierre_contablePopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblcierre_contablePopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmcierre_contableAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btncierre_contableAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="cierre_contable_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btncierre_contableAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmcierre_contableAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblcierre_contablePopupAjaxWebPart -->
		</div> <!-- divcierre_contablePopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->		
		
		
		
			
<tr id="trcierre_contableElementosFormulario">
	<td>
		<div id="divMantenimientocierre_contableAjaxWebPart" title="CIERRES CONTABLES" style="height: 90%;width: 90%;position: relative;top: 30px;left: 30px;">
			<form id="frmMantenimientocierre_contable" name="frmMantenimientocierre_contable">

			</br>

			<?php if(cierre_contable_web::$STR_ES_RELACIONES=='false' ) {?>
			</br>
			<?php } ?>

			<!-- SECCION/TOOLBAR -->
			<table id="tblcierre_contableToolBarFormularioExterior" style="width: 65%">
				<tr style="display:table-row">
					<td align="center">

						<table id="tblcierre_contableToolBarFormulario" style="text-align: center"  style="display:table-row">
							<tr>
								<td id="tdcierre_contableActualizarToolBar" style="visibility:visible">
									<img id="imgActualizarToolBarcierre_contable" name="imgActualizarToolBarcierre_contable" title="ACTUALIZAR Cierres Contables ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/actualizar.gif" width="25" height="25"/>
								</td>
								<td id="tdcierre_contableEliminarToolBar" style="visibility:visible">
									<img id="imgEliminarToolBarcierre_contable" name="imgEliminarToolBarcierre_contable" title="ELIMINAR Cierres Contables ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/eliminar.gif" width="25" height="25"/>
								</td>
								<td id="tdcierre_contableCancelarToolBar" style="visibility:visible">
									<img id="imgCancelarToolBarcierre_contable" name="imgCancelarToolBarcierre_contable" title="CANCELAR Cierres Contables ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/cancelar.gif" width="25" height="25"/>
								</td>
								<td id="tdcierre_contableRelacionesToolBar" style="display:table-row">
									<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/xexpand.png" width="25" height="25" onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('tblCamposOcultoscierre_contable',this,'../')"/>
								</td>
							</tr>
						</table> <!-- tblcierre_contableToolBarFormulario -->

					</td>
				</tr>
			</table> <!-- tblcierre_contableToolBarFormularioExterior -->

			<table id="tblcierre_contableElementos">
			<tr id="trcierre_contableElementos" class="elementos" style="display:table-row">
			<td align="center">

			<a id="Campos"></a>

				<?php if(cierre_contable_web::$STR_ES_RELACIONES=='false' ) {?>
				<div id="divFlechaArribaElementos" align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
					<span></span>
				</div>
				<?php } ?>

				<!-- SECCION/FORMULARIO -->
				<table id="tblElementoscierre_contable" class="elementos" style="width: 300px; padding: 0px; border-spacing: 0px; border-collapse: collapse; text-align: center;">
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
						<td id="td_title-fecha_cierre" class="titulocampo">
							<label class="form-label">Fecha Cierre.(*)</label>
						</td>
						<td id="td_control-fecha_cierre" align="left" class="controlcampo">
							<input id="form-fecha_cierre" name="form-fecha_cierre" type="text" class="form-control"  placeholder="Fecha Cierre"  title="Fecha Cierre"    size="10" >
							<span id="spanstrMensajefecha_cierre" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_7">
						<td id="td_title-gan_per" class="titulocampo">
							<label class="form-label">Ganancias Perdidas.(*)</label>
						</td>
						<td id="td_control-gan_per" align="left" class="controlcampo">
							<input id="form-gan_per" name="form-gan_per" type="text" class="form-control"  placeholder="Ganancias Perdidas"  title="Ganancias Perdidas"    maxlength="22" size="12" >
							<span id="spanstrMensajegan_per" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_8">
						<td id="td_title-total_cuentas" class="titulocampo">
							<label class="form-label">Total Cuentas.(*)</label>
						</td>
						<td id="td_control-total_cuentas" align="left" class="controlcampo">
							<input id="form-total_cuentas" name="form-total_cuentas" type="text" class="form-control"  placeholder="Total Cuentas"  title="Total Cuentas"    maxlength="10" size="10" >
							<span id="spanstrMensajetotal_cuentas" class="mensajeerror"></span>
						</td>
					</tr>
				</table> <!-- tblElementoscierre_contable -->

				<!-- SECCION/OCULTOS -->
				<table id="tblCamposOcultoscierre_contable" class="elementos" style="display: table-row;">
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
					
				</table> <!-- tblCamposOcultoscierre_contable -->

			</td></tr> <!-- trcierre_contableElementos -->
			</table> <!-- tblcierre_contableElementos -->
			</form> <!-- frmMantenimientocierre_contable -->


			

				<form id="frmAccionesMantenimientocierre_contable" name="frmAccionesMantenimientocierre_contable">

			<?php if(cierre_contable_web::$STR_ES_BUSQUEDA=='false' ) {?>
			<table id="tblcierre_contableAcciones" class="elementos" style="text-align: center">
		<tr id="trcierre_contableAcciones" class="elementos" style="display:table-row">
			<td align="center">
				<a id="Acciones" ></a>

				<?php if(cierre_contable_web::$STR_ES_RELACIONES=='false' ) {?>
				<div align="right">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
				<?php } ?>

					<!-- SECCION/BOTONES -->
					<table id="tblAccionesMantenimientocierre_contable" class="busqueda" style="width: 50%;text-align: center">

						<?php if(cierre_contable_web::$STR_ES_RELACIONES=='false' ) {?>
						<!--
						<caption class="busquedacabecera">
							<span>Acciones</span>
						</caption>
						-->
						<?php } ?>

						<tr id="trAccionesMantenimientocierre_contableBasicos">
							<td id="tdbtnNuevocierre_contable" style="visibility:visible">
								<div id="divNuevocierre_contable" style="display:table-row">
									<input type="button" id="btnNuevocierre_contable" name="btnNuevocierre_contable" value="NUEVO" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnActualizarcierre_contable" style="visibility:visible">
								<div id="divActualizarcierre_contable" style="display:table-row">
									<input type="button" id="btnActualizarcierre_contable" name="btnActualizarcierre_contable" title="ACTUALIZAR Cierres Contables ACTUAL" value="Actualizar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnEliminarcierre_contable" style="visibility:visible">
								<div id="divEliminarcierre_contable" style="display:table-row">
									<input type="button" id="btnEliminarcierre_contable" name="btnEliminarcierre_contable" title="ELIMINAR Cierres Contables ACTUAL" value="Eliminar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnImprimircierre_contable" style="visibility:visible">
								<input type="button" id="btnImprimircierre_contable" name="btnImprimircierre_contable" title="IMPRIMIR PAGINA Cierres Contables ACTUAL" value="Imp. Datos" class="btn btn-primary"/>
							</td>
							<td id="tdbtnCancelarcierre_contable" style="visibility:visible">
								<input type="button" id="btnCancelarcierre_contable" name="btnCancelarcierre_contable" title="CANCELAR Cierres Contables ACTUAL" value="Cancelar" class="btn btn-primary"/>
							</td>
						</tr>
						<tr id="trAccionesMantenimientocierre_contableGuardar" style="display:none">
							<td id="tdbtnGuardarCambioscierre_contable" colspan="4" align="center" style="visibility:visible">
								<div id="divGuardarCambioscierre_contable" style="display:table-row">
									<input type="button" id="btnGuardarCambiosFormulariocierre_contable" name="btnGuardarCambiosFormulariocierre_contable" title="GUARDAR" value="GUADAR CAMBIOS" class="btn btn-primary"/>
								</div>
							</td>
						</tr>
					</table> <!-- tblAccionesMantenimientocierre_contable -->
			</td>
		</tr> <!-- trcierre_contableAcciones -->
		<?php if(cierre_contable_web::$STR_ES_RELACIONADO=='false' ) {?>
		<tr id="trcierre_contableParametrosAcciones" class="impresion"  style="display:table-row">
			<td align="center">
				<!-- SECCION/POST -->
				<table id="tblcierre_contableParametrosAcciones" style="text-align: center;border: 0px solid black;padding: 0px; border-spacing: 0px">
					<caption class="busquedacabecera" style="padding: 0px;caption-side: top;">
						<span>Acciones Extra/Post</span>
					</caption>
					<tr id="trcierre_contableFilaParametrosAcciones">
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
				</table> <!-- tblcierre_contableParametrosAcciones -->
			</td>
		</tr> <!-- trcierre_contableParametrosAcciones -->
		<?php }?>
		<tr id="trcierre_contableMensajes" class="mensajes">
			<td align="center">
				<a id="Mensajes"></a>
			</td>
		</tr> <!-- trcierre_contableMensajes -->
			</table> <!-- tblcierre_contableAcciones -->
			<?php } ?>
			</form> <!-- frmMantenimientocierre_contable -->
			</div> <!-- divMantenimientocierre_contableAjaxWebPart -->
		</td>
	</tr> <!-- trcierre_contableElementosFormulario/super -->
		<?php if(cierre_contable_web::$STR_ES_RELACIONADO=='false' ) {?>

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
			
				import {cierre_contable_webcontrol,cierre_contable_webcontrol1} from './webroot/js/JavaScript/contabilidad/contabilidad/cierre_contable/js/webcontrol/cierre_contable_form_webcontrol.js?random=1';
				
				cierre_contable_webcontrol1.setcierre_contable_constante(window.cierre_contable_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(cierre_contable_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

