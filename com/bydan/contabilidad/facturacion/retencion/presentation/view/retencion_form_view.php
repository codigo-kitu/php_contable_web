<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\facturacion\retencion\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Retencion Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/facturacion/retencion/util/retencion_carga.php');
	use com\bydan\contabilidad\facturacion\retencion\util\retencion_carga;
	
	//include_once('com/bydan/contabilidad/facturacion/retencion/presentation/view/retencion_web.php');
	//use com\bydan\contabilidad\facturacion\retencion\presentation\view\retencion_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	retencion_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	retencion_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$retencion_web1= new retencion_web();	
	$retencion_web1->cargarDatosGenerales();
	
	//$moduloActual=$retencion_web1->moduloActual;
	//$usuarioActual=$retencion_web1->usuarioActual;
	//$sessionBase=$retencion_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$retencion_web1->parametroGeneralUsuarioActual;
	
	
		
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
		
		
			<script type="module" src="webroot/js/JavaScript/contabilidad/facturacion/retencion/js/util/retencion_form_funcion.js?random=1"></script>
						
		
		
		<?php 
			
		
			retencion_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					retencion_web::$GET_POST=$_GET;
				} else {
					retencion_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			retencion_web::$STR_NOMBRE_PAGINA = 'retencion_form_view.php';
			retencion_web::$BIT_ES_PAGINA_PRINCIPAL = 'false';
			retencion_web::$BIT_ES_PAGINA_FORM = 'true';
				
			retencion_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {retencion_constante,retencion_constante1} from './webroot/js/JavaScript/contabilidad/facturacion/retencion/js/util/retencion_constante.js?random=1';
			import {retencion_funcion,retencion_funcion1} from './webroot/js/JavaScript/contabilidad/facturacion/retencion/js/util/retencion_funcion.js?random=1';
			
			let retencion_constante2 = new retencion_constante();
			
			retencion_constante2.STR_NOMBRE_PAGINA="<?php echo(retencion_web::$STR_NOMBRE_PAGINA); ?>";
			retencion_constante2.STR_TYPE_ON_LOADretencion="<?php echo(retencion_web::$STR_TYPE_ONLOAD); ?>";
			retencion_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(retencion_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			retencion_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(retencion_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			retencion_constante2.STR_ACTION="<?php echo(retencion_web::$STR_ACTION); ?>";
			retencion_constante2.STR_ES_POPUP="<?php echo(retencion_web::$STR_ES_POPUP); ?>";
			retencion_constante2.STR_ES_BUSQUEDA="<?php echo(retencion_web::$STR_ES_BUSQUEDA); ?>";
			retencion_constante2.STR_FUNCION_JS="<?php echo(retencion_web::$STR_FUNCION_JS); ?>";
			retencion_constante2.BIG_ID_ACTUAL="<?php echo(retencion_web::$BIG_ID_ACTUAL); ?>";
			retencion_constante2.BIG_ID_OPCION="<?php echo(retencion_web::$BIG_ID_OPCION); ?>";
			retencion_constante2.STR_OBJETO_JS="<?php echo(retencion_web::$STR_OBJETO_JS); ?>";
			retencion_constante2.STR_ES_RELACIONES="<?php echo(retencion_web::$STR_ES_RELACIONES); ?>";
			retencion_constante2.STR_ES_RELACIONADO="<?php echo(retencion_web::$STR_ES_RELACIONADO); ?>";
			retencion_constante2.STR_ES_SUB_PAGINA="<?php echo(retencion_web::$STR_ES_SUB_PAGINA); ?>";
			retencion_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(retencion_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			retencion_constante2.BIT_ES_PAGINA_FORM=<?php echo(retencion_web::$BIT_ES_PAGINA_FORM); ?>;
			retencion_constante2.STR_SUFIJO="<?php echo(retencion_web::$STR_SUF); ?>";//retencion
			retencion_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(retencion_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//retencion
			
			retencion_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(retencion_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			retencion_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($retencion_web1->moduloActual->getnombre()); ?>";
			retencion_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(retencion_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			retencion_constante2.BIT_ES_LOAD_NORMAL=true;
			/*retencion_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			retencion_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.retencion_constante2 = retencion_constante2;
			
		</script>
		
		<?php if(retencion_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.retencion_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.retencion_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="retencionActual" ></a>
	
	<div id="divResumenretencionActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(retencion_web::$STR_ES_RELACIONADO=='false') {?>
		
		<div id="header" >
		
			<div id="banner">
				<span id="spanTituloBanner" class="titulobanner"></span>
			</div> <!-- banner -->
					
			<div id="subheader" class="links">  
			
						
			</div> <!-- sub-header -->
			
			
		</div> <!-- header -->
		
		<?php } ?>
		
		<div id="main">
		

			<?php if(retencion_web::$STR_ES_RELACIONADO=='false') {?>
			
			
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(retencion_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(retencion_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divretencionPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblretencionPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmretencionAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnretencionAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="retencion_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnretencionAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmretencionAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblretencionPopupAjaxWebPart -->
		</div> <!-- divretencionPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->		
		
		
		
			
<tr id="trretencionElementosFormulario">
	<td>
		<div id="divMantenimientoretencionAjaxWebPart" title="RETENCION" style="height: 90%;width: 90%;position: relative;top: 30px;left: 30px;">
			<form id="frmMantenimientoretencion" name="frmMantenimientoretencion">

			</br>

			<?php if(retencion_web::$STR_ES_RELACIONES=='false' ) {?>
			</br>
			<?php } ?>

			<!-- SECCION/TOOLBAR -->
			<table id="tblretencionToolBarFormularioExterior" style="width: 65%">
				<tr style="display:table-row">
					<td align="center">

						<table id="tblretencionToolBarFormulario" style="text-align: center"  style="display:table-row">
							<tr>
								<td id="tdretencionActualizarToolBar" style="visibility:visible">
									<img id="imgActualizarToolBarretencion" name="imgActualizarToolBarretencion" title="ACTUALIZAR Retencion ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/actualizar.gif" width="25" height="25"/>
								</td>
								<td id="tdretencionEliminarToolBar" style="visibility:visible">
									<img id="imgEliminarToolBarretencion" name="imgEliminarToolBarretencion" title="ELIMINAR Retencion ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/eliminar.gif" width="25" height="25"/>
								</td>
								<td id="tdretencionCancelarToolBar" style="visibility:visible">
									<img id="imgCancelarToolBarretencion" name="imgCancelarToolBarretencion" title="CANCELAR Retencion ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/cancelar.gif" width="25" height="25"/>
								</td>
								<td id="tdretencionRelacionesToolBar" style="display:table-row">
									<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/xexpand.png" width="25" height="25" onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('tblCamposOcultosretencion',this,'../')"/>
								</td>
							</tr>
						</table> <!-- tblretencionToolBarFormulario -->

					</td>
				</tr>
			</table> <!-- tblretencionToolBarFormularioExterior -->

			<table id="tblretencionElementos">
			<tr id="trretencionElementos" class="elementos" style="display:table-row">
			<td align="center">

			<a id="Campos"></a>

				<?php if(retencion_web::$STR_ES_RELACIONES=='false' ) {?>
				<div id="divFlechaArribaElementos" align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
					<span></span>
				</div>
				<?php } ?>

				<!-- SECCION/FORMULARIO -->
				<table id="tblElementosretencion" class="elementos" style="width: 350px; padding: 0px; border-spacing: 0px; border-collapse: collapse; text-align: left;">
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
						<td id="td_title-codigo" class="titulocampo">
							<label class="form-label">Codigo.(*)</label>
						</td>
						<td id="td_control-codigo" align="left" class="controlcampo">
							<input id="form-codigo" name="form-codigo" type="text" class="form-control"  placeholder="Codigo"  title="Codigo"    size="5"  maxlength="5"/>
							<span id="spanstrMensajecodigo" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_5">
						<td id="td_title-descripcion" class="titulocampo">
							<label class="form-label">Descripcion.(*)</label>
						</td>
						<td id="td_control-descripcion" align="left" class="controlcampo">
							<input id="form-descripcion" name="form-descripcion" type="text" class="form-control"  placeholder="Descripcion"  title="Descripcion"    size="20"  maxlength="40"/>
							<span id="spanstrMensajedescripcion" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_6">
						<td id="td_title-valor" class="titulocampo">
							<label class="form-label">Valor.(*)</label>
						</td>
						<td id="td_control-valor" align="left" class="controlcampo">
							<input id="form-valor" name="form-valor" type="text" class="form-control"  placeholder="Valor"  title="Valor"    maxlength="18" size="12" >
							<span id="spanstrMensajevalor" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_7">
						<td id="td_title-valor_base" class="titulocampo">
							<label class="form-label">Valor Base.(*)</label>
						</td>
						<td id="td_control-valor_base" align="left" class="controlcampo">
							<input id="form-valor_base" name="form-valor_base" type="text" class="form-control"  placeholder="Valor Base"  title="Valor Base"    maxlength="18" size="12" >
							<span id="spanstrMensajevalor_base" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_8">
						<td id="td_title-predeterminado" class="titulocampo">
							<label class="form-label">Predeterminado</label>
						</td>
						<td id="td_control-predeterminado" align="left" class="controlcampo">
							<input id="form-predeterminado" name="form-predeterminado" type="checkbox" >
							<span id="spanstrMensajepredeterminado" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_9">
						<td id="td_title-id_cuenta_ventas" class="titulocampo">
							<label class="form-label"> Cuentas Ventas</label>
						</td>
						<td id="td_control-id_cuenta_ventas" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_cuenta_ventas" name="form-id_cuenta_ventas" title=" Cuentas Ventas" ></select></td>
									<td><a><img id="form-id_cuenta_ventas_img" name="form-id_cuenta_ventas_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_cuenta_ventas_img_busqueda" name="form-id_cuenta_ventas_img_busqueda" title="Buscar Cuentas" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_cuenta_ventas" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_10">
						<td id="td_title-id_cuenta_compras" class="titulocampo">
							<label class="form-label"> Cuentas Compras</label>
						</td>
						<td id="td_control-id_cuenta_compras" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_cuenta_compras" name="form-id_cuenta_compras" title=" Cuentas Compras" ></select></td>
									<td><a><img id="form-id_cuenta_compras_img" name="form-id_cuenta_compras_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_cuenta_compras_img_busqueda" name="form-id_cuenta_compras_img_busqueda" title="Buscar Cuentas" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_cuenta_compras" class="mensajeerror"></span>
						</td>
					</tr>
				</table> <!-- tblElementosretencion -->

				<!-- SECCION/OCULTOS -->
				<table id="tblCamposOcultosretencion" class="elementos" style="display: table-row;">
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
						<td id="td_title-cuenta_contable_ventas" class="titulocampo">
							<label class="form-label">Cta Contable Ventas</label>
						</td>
						<td id="td_control-cuenta_contable_ventas" align="left" class="controlcampo">
							<input id="form-cuenta_contable_ventas" name="form-cuenta_contable_ventas" type="text" class="form-control"  placeholder="Cta Contable Ventas"  title="Cta Contable Ventas"    size="20"  maxlength="20"/>
							<span id="spanstrMensajecuenta_contable_ventas" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_2">
						<td id="td_title-cuenta_contable_compras" class="titulocampo">
							<label class="form-label">Cta Contable Compras</label>
						</td>
						<td id="td_control-cuenta_contable_compras" align="left" class="controlcampo">
							<input id="form-cuenta_contable_compras" name="form-cuenta_contable_compras" type="text" class="form-control"  placeholder="Cta Contable Compras"  title="Cta Contable Compras"    size="20"  maxlength="20"/>
							<span id="spanstrMensajecuenta_contable_compras" class="mensajeerror"></span>
						</td>
					</tr>
				</table> <!-- tblCamposOcultosretencion -->

			</td></tr> <!-- trretencionElementos -->
			</table> <!-- tblretencionElementos -->
			</form> <!-- frmMantenimientoretencion -->


			

				<form id="frmAccionesMantenimientoretencion" name="frmAccionesMantenimientoretencion">

			<?php if(retencion_web::$STR_ES_BUSQUEDA=='false' ) {?>
			<table id="tblretencionAcciones" class="elementos" style="text-align: center">
		<tr id="trretencionAcciones" class="elementos" style="display:table-row">
			<td align="center">
				<a id="Acciones" ></a>

				<?php if(retencion_web::$STR_ES_RELACIONES=='false' ) {?>
				<div align="right">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
				<?php } ?>

					<!-- SECCION/BOTONES -->
					<table id="tblAccionesMantenimientoretencion" class="busqueda" style="width: 50%;text-align: left">

						<?php if(retencion_web::$STR_ES_RELACIONES=='false' ) {?>
						<!--
						<caption class="busquedacabecera">
							<span>Acciones</span>
						</caption>
						-->
						<?php } ?>

						<tr id="trAccionesMantenimientoretencionBasicos">
							<td id="tdbtnNuevoretencion" style="visibility:visible">
								<div id="divNuevoretencion" style="display:table-row">
									<input type="button" id="btnNuevoretencion" name="btnNuevoretencion" value="NUEVO" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnActualizarretencion" style="visibility:visible">
								<div id="divActualizarretencion" style="display:table-row">
									<input type="button" id="btnActualizarretencion" name="btnActualizarretencion" title="ACTUALIZAR Retencion ACTUAL" value="Actualizar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnEliminarretencion" style="visibility:visible">
								<div id="divEliminarretencion" style="display:table-row">
									<input type="button" id="btnEliminarretencion" name="btnEliminarretencion" title="ELIMINAR Retencion ACTUAL" value="Eliminar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnImprimirretencion" style="visibility:visible">
								<input type="button" id="btnImprimirretencion" name="btnImprimirretencion" title="IMPRIMIR PAGINA Retencion ACTUAL" value="Imp. Datos" class="btn btn-primary"/>
							</td>
							<td id="tdbtnCancelarretencion" style="visibility:visible">
								<input type="button" id="btnCancelarretencion" name="btnCancelarretencion" title="CANCELAR Retencion ACTUAL" value="Cancelar" class="btn btn-primary"/>
							</td>
						</tr>
						<tr id="trAccionesMantenimientoretencionGuardar" style="display:none">
							<td id="tdbtnGuardarCambiosretencion" colspan="4" align="center" style="visibility:visible">
								<div id="divGuardarCambiosretencion" style="display:table-row">
									<input type="button" id="btnGuardarCambiosFormularioretencion" name="btnGuardarCambiosFormularioretencion" title="GUARDAR" value="GUADAR CAMBIOS" class="btn btn-primary"/>
								</div>
							</td>
						</tr>
					</table> <!-- tblAccionesMantenimientoretencion -->
			</td>
		</tr> <!-- trretencionAcciones -->
		<?php if(retencion_web::$STR_ES_RELACIONADO=='false' ) {?>
		<tr id="trretencionParametrosAcciones" class="impresion"  style="display:table-row">
			<td align="center">
				<!-- SECCION/POST -->
				<table id="tblretencionParametrosAcciones" style="text-align: center;border: 0px solid black;padding: 0px; border-spacing: 0px">
					<caption class="busquedacabecera" style="padding: 0px;caption-side: top;">
						<span>Acciones Extra/Post</span>
					</caption>
					<tr id="trretencionFilaParametrosAcciones">
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
				</table> <!-- tblretencionParametrosAcciones -->
			</td>
		</tr> <!-- trretencionParametrosAcciones -->
		<?php }?>
		<tr id="trretencionMensajes" class="mensajes">
			<td align="center">
				<a id="Mensajes"></a>
			</td>
		</tr> <!-- trretencionMensajes -->
			</table> <!-- tblretencionAcciones -->
			<?php } ?>
			</form> <!-- frmMantenimientoretencion -->
			</div> <!-- divMantenimientoretencionAjaxWebPart -->
		</td>
	</tr> <!-- trretencionElementosFormulario/super -->
		<?php if(retencion_web::$STR_ES_RELACIONADO=='false' ) {?>

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
			
				import {retencion_webcontrol,retencion_webcontrol1} from './webroot/js/JavaScript/contabilidad/facturacion/retencion/js/webcontrol/retencion_form_webcontrol.js?random=1';
				
				retencion_webcontrol1.setretencion_constante(window.retencion_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(retencion_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

