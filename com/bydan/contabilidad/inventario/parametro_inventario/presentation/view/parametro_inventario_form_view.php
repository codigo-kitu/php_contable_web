<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\inventario\parametro_inventario\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Parametro Inventario Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/inventario/parametro_inventario/util/parametro_inventario_carga.php');
	use com\bydan\contabilidad\inventario\parametro_inventario\util\parametro_inventario_carga;
	
	//include_once('com/bydan/contabilidad/inventario/parametro_inventario/presentation/view/parametro_inventario_web.php');
	//use com\bydan\contabilidad\inventario\parametro_inventario\presentation\view\parametro_inventario_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	parametro_inventario_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	parametro_inventario_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$parametro_inventario_web1= new parametro_inventario_web();	
	$parametro_inventario_web1->cargarDatosGenerales();
	
	//$moduloActual=$parametro_inventario_web1->moduloActual;
	//$usuarioActual=$parametro_inventario_web1->usuarioActual;
	//$sessionBase=$parametro_inventario_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$parametro_inventario_web1->parametroGeneralUsuarioActual;
	
	
		
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
		
		
			<script type="module" src="webroot/js/JavaScript/contabilidad/inventario/parametro_inventario/js/util/parametro_inventario_form_funcion.js?random=1"></script>
						
		
		
		<?php 
			
		
			parametro_inventario_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					parametro_inventario_web::$GET_POST=$_GET;
				} else {
					parametro_inventario_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			parametro_inventario_web::$STR_NOMBRE_PAGINA = 'parametro_inventario_form_view.php';
			parametro_inventario_web::$BIT_ES_PAGINA_PRINCIPAL = 'false';
			parametro_inventario_web::$BIT_ES_PAGINA_FORM = 'true';
				
			parametro_inventario_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {parametro_inventario_constante,parametro_inventario_constante1} from './webroot/js/JavaScript/contabilidad/inventario/parametro_inventario/js/util/parametro_inventario_constante.js?random=1';
			import {parametro_inventario_funcion,parametro_inventario_funcion1} from './webroot/js/JavaScript/contabilidad/inventario/parametro_inventario/js/util/parametro_inventario_funcion.js?random=1';
			
			let parametro_inventario_constante2 = new parametro_inventario_constante();
			
			parametro_inventario_constante2.STR_NOMBRE_PAGINA="<?php echo(parametro_inventario_web::$STR_NOMBRE_PAGINA); ?>";
			parametro_inventario_constante2.STR_TYPE_ON_LOADparametro_inventario="<?php echo(parametro_inventario_web::$STR_TYPE_ONLOAD); ?>";
			parametro_inventario_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(parametro_inventario_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			parametro_inventario_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(parametro_inventario_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			parametro_inventario_constante2.STR_ACTION="<?php echo(parametro_inventario_web::$STR_ACTION); ?>";
			parametro_inventario_constante2.STR_ES_POPUP="<?php echo(parametro_inventario_web::$STR_ES_POPUP); ?>";
			parametro_inventario_constante2.STR_ES_BUSQUEDA="<?php echo(parametro_inventario_web::$STR_ES_BUSQUEDA); ?>";
			parametro_inventario_constante2.STR_FUNCION_JS="<?php echo(parametro_inventario_web::$STR_FUNCION_JS); ?>";
			parametro_inventario_constante2.BIG_ID_ACTUAL="<?php echo(parametro_inventario_web::$BIG_ID_ACTUAL); ?>";
			parametro_inventario_constante2.BIG_ID_OPCION="<?php echo(parametro_inventario_web::$BIG_ID_OPCION); ?>";
			parametro_inventario_constante2.STR_OBJETO_JS="<?php echo(parametro_inventario_web::$STR_OBJETO_JS); ?>";
			parametro_inventario_constante2.STR_ES_RELACIONES="<?php echo(parametro_inventario_web::$STR_ES_RELACIONES); ?>";
			parametro_inventario_constante2.STR_ES_RELACIONADO="<?php echo(parametro_inventario_web::$STR_ES_RELACIONADO); ?>";
			parametro_inventario_constante2.STR_ES_SUB_PAGINA="<?php echo(parametro_inventario_web::$STR_ES_SUB_PAGINA); ?>";
			parametro_inventario_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(parametro_inventario_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			parametro_inventario_constante2.BIT_ES_PAGINA_FORM=<?php echo(parametro_inventario_web::$BIT_ES_PAGINA_FORM); ?>;
			parametro_inventario_constante2.STR_SUFIJO="<?php echo(parametro_inventario_web::$STR_SUF); ?>";//parametro_inventario
			parametro_inventario_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(parametro_inventario_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//parametro_inventario
			
			parametro_inventario_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(parametro_inventario_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			parametro_inventario_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($parametro_inventario_web1->moduloActual->getnombre()); ?>";
			parametro_inventario_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(parametro_inventario_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			parametro_inventario_constante2.BIT_ES_LOAD_NORMAL=true;
			/*parametro_inventario_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			parametro_inventario_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.parametro_inventario_constante2 = parametro_inventario_constante2;
			
		</script>
		
		<?php if(parametro_inventario_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.parametro_inventario_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.parametro_inventario_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="parametro_inventarioActual" ></a>
	
	<div id="divResumenparametro_inventarioActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(parametro_inventario_web::$STR_ES_RELACIONADO=='false') {?>
		
		<div id="header" >
		
			<div id="banner">
				<span id="spanTituloBanner" class="titulobanner"></span>
			</div> <!-- banner -->
					
			<div id="subheader" class="links">  
			
						
			</div> <!-- sub-header -->
			
			
		</div> <!-- header -->
		
		<?php } ?>
		
		<div id="main">
		

			<?php if(parametro_inventario_web::$STR_ES_RELACIONADO=='false') {?>
			
			
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(parametro_inventario_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(parametro_inventario_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divparametro_inventarioPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblparametro_inventarioPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmparametro_inventarioAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnparametro_inventarioAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="parametro_inventario_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnparametro_inventarioAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmparametro_inventarioAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblparametro_inventarioPopupAjaxWebPart -->
		</div> <!-- divparametro_inventarioPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->		
		
		
		
			
<tr id="trparametro_inventarioElementosFormulario">
	<td>
		<div id="divMantenimientoparametro_inventarioAjaxWebPart" title="PARAMETRO INVENTARIO" style="height: 90%;width: 90%;position: relative;top: 30px;left: 30px;">
			<form id="frmMantenimientoparametro_inventario" name="frmMantenimientoparametro_inventario">

			</br>

			<?php if(parametro_inventario_web::$STR_ES_RELACIONES=='false' ) {?>
			</br>
			<?php } ?>

			<!-- SECCION/TOOLBAR -->
			<table id="tblparametro_inventarioToolBarFormularioExterior" style="width: 65%">
				<tr style="display:table-row">
					<td align="center">

						<table id="tblparametro_inventarioToolBarFormulario" style="text-align: center"  style="display:table-row">
							<tr>
								<td id="tdparametro_inventarioActualizarToolBar" style="visibility:visible">
									<img id="imgActualizarToolBarparametro_inventario" name="imgActualizarToolBarparametro_inventario" title="ACTUALIZAR Parametro Inventario ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/actualizar.gif" width="25" height="25"/>
								</td>
								<td id="tdparametro_inventarioEliminarToolBar" style="visibility:visible">
									<img id="imgEliminarToolBarparametro_inventario" name="imgEliminarToolBarparametro_inventario" title="ELIMINAR Parametro Inventario ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/eliminar.gif" width="25" height="25"/>
								</td>
								<td id="tdparametro_inventarioCancelarToolBar" style="visibility:visible">
									<img id="imgCancelarToolBarparametro_inventario" name="imgCancelarToolBarparametro_inventario" title="CANCELAR Parametro Inventario ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/cancelar.gif" width="25" height="25"/>
								</td>
								<td id="tdparametro_inventarioRelacionesToolBar" style="display:table-row">
									<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/xexpand.png" width="25" height="25" onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('tblCamposOcultosparametro_inventario',this,'../')"/>
								</td>
							</tr>
						</table> <!-- tblparametro_inventarioToolBarFormulario -->

					</td>
				</tr>
			</table> <!-- tblparametro_inventarioToolBarFormularioExterior -->

			<table id="tblparametro_inventarioElementos">
			<tr id="trparametro_inventarioElementos" class="elementos" style="display:table-row">
			<td align="center">

			<a id="Campos"></a>

				<?php if(parametro_inventario_web::$STR_ES_RELACIONES=='false' ) {?>
				<div id="divFlechaArribaElementos" align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
					<span></span>
				</div>
				<?php } ?>

				<!-- SECCION/FORMULARIO -->
				<table id="tblElementosparametro_inventario" class="elementos" style="width: 400px; padding: 0px; border-spacing: 0px; border-collapse: collapse; text-align: left;">
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
						<td id="td_title-id_termino_pago_proveedor" class="titulocampo">
							<label class="form-label"> Termino Pago Proveedor.(*)</label>
						</td>
						<td id="td_control-id_termino_pago_proveedor" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_termino_pago_proveedor" name="form-id_termino_pago_proveedor" title=" Termino Pago Proveedor" ></select></td>
									<td><a><img id="form-id_termino_pago_proveedor_img" name="form-id_termino_pago_proveedor_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_termino_pago_proveedor_img_busqueda" name="form-id_termino_pago_proveedor_img_busqueda" title="Buscar Terminos Pago Proveedores" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_termino_pago_proveedor" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_5">
						<td id="td_title-id_tipo_costeo_kardex" class="titulocampo">
							<label class="form-label"> Tipo Costeo Kardex.(*)</label>
						</td>
						<td id="td_control-id_tipo_costeo_kardex" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_tipo_costeo_kardex" name="form-id_tipo_costeo_kardex" title=" Tipo Costeo Kardex" ></select></td>
									<td><img id="form-id_tipo_costeo_kardex_img_busqueda" name="form-id_tipo_costeo_kardex_img_busqueda" title="Buscar Tipo Costeo Kardex" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_tipo_costeo_kardex" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_6">
						<td id="td_title-id_tipo_kardex" class="titulocampo">
							<label class="form-label"> Tipo Kardex.(*)</label>
						</td>
						<td id="td_control-id_tipo_kardex" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_tipo_kardex" name="form-id_tipo_kardex" title=" Tipo Kardex" ></select></td>
									<td><a><img id="form-id_tipo_kardex_img" name="form-id_tipo_kardex_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_tipo_kardex_img_busqueda" name="form-id_tipo_kardex_img_busqueda" title="Buscar Tipo Kadex" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_tipo_kardex" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_7">
						<td id="td_title-numero_producto" class="titulocampo">
							<label class="form-label">Numero Producto.(*)</label>
						</td>
						<td id="td_control-numero_producto" align="left" class="controlcampo">
							<input id="form-numero_producto" name="form-numero_producto" type="text" class="form-control"  placeholder="Numero Producto"  title="Numero Producto"    maxlength="19" size="10" >
							<span id="spanstrMensajenumero_producto" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_8">
						<td id="td_title-numero_orden_compra" class="titulocampo">
							<label class="form-label">Numero Orden Compra.(*)</label>
						</td>
						<td id="td_control-numero_orden_compra" align="left" class="controlcampo">
							<input id="form-numero_orden_compra" name="form-numero_orden_compra" type="text" class="form-control"  placeholder="Numero Orden Compra"  title="Numero Orden Compra"    maxlength="19" size="10" >
							<span id="spanstrMensajenumero_orden_compra" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_9">
						<td id="td_title-numero_devolucion" class="titulocampo">
							<label class="form-label">Numero Devolucion.(*)</label>
						</td>
						<td id="td_control-numero_devolucion" align="left" class="controlcampo">
							<input id="form-numero_devolucion" name="form-numero_devolucion" type="text" class="form-control"  placeholder="Numero Devolucion"  title="Numero Devolucion"    maxlength="19" size="10" >
							<span id="spanstrMensajenumero_devolucion" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_10">
						<td id="td_title-numero_cotizacion" class="titulocampo">
							<label class="form-label">Numero Cotizacion.(*)</label>
						</td>
						<td id="td_control-numero_cotizacion" align="left" class="controlcampo">
							<input id="form-numero_cotizacion" name="form-numero_cotizacion" type="text" class="form-control"  placeholder="Numero Cotizacion"  title="Numero Cotizacion"    maxlength="19" size="10" >
							<span id="spanstrMensajenumero_cotizacion" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_11">
						<td id="td_title-numero_kardex" class="titulocampo">
							<label class="form-label">Numero Kardex.(*)</label>
						</td>
						<td id="td_control-numero_kardex" align="left" class="controlcampo">
							<input id="form-numero_kardex" name="form-numero_kardex" type="text" class="form-control"  placeholder="Numero Kardex"  title="Numero Kardex"    maxlength="19" size="10" >
							<span id="spanstrMensajenumero_kardex" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_12">
						<td id="td_title-con_producto_inactivo" class="titulocampo">
							<label class="form-label">Con Producto Inactivo</label>
						</td>
						<td id="td_control-con_producto_inactivo" align="left" class="controlcampo">
							<input id="form-con_producto_inactivo" name="form-con_producto_inactivo" type="checkbox" >
							<span id="spanstrMensajecon_producto_inactivo" class="mensajeerror"></span>
						</td>
					</tr>
				</table> <!-- tblElementosparametro_inventario -->

				<!-- SECCION/OCULTOS -->
				<table id="tblCamposOcultosparametro_inventario" class="elementos" style="display: table-row;">
					<caption class="busquedacabecera">
						<span>Campos Ocultos</span>
					</caption>
					
						<td id="td_title-id_empresa" class="titulocampo">
							<label class="form-label">Empresa</label>
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
					
				</table> <!-- tblCamposOcultosparametro_inventario -->

			</td></tr> <!-- trparametro_inventarioElementos -->
			</table> <!-- tblparametro_inventarioElementos -->
			</form> <!-- frmMantenimientoparametro_inventario -->


			

				<form id="frmAccionesMantenimientoparametro_inventario" name="frmAccionesMantenimientoparametro_inventario">

			<?php if(parametro_inventario_web::$STR_ES_BUSQUEDA=='false' ) {?>
			<table id="tblparametro_inventarioAcciones" class="elementos" style="text-align: center">
		<tr id="trparametro_inventarioAcciones" class="elementos" style="display:table-row">
			<td align="center">
				<a id="Acciones" ></a>

				<?php if(parametro_inventario_web::$STR_ES_RELACIONES=='false' ) {?>
				<div align="right">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
				<?php } ?>

					<!-- SECCION/BOTONES -->
					<table id="tblAccionesMantenimientoparametro_inventario" class="busqueda" style="width: 50%;text-align: left">

						<?php if(parametro_inventario_web::$STR_ES_RELACIONES=='false' ) {?>
						<!--
						<caption class="busquedacabecera">
							<span>Acciones</span>
						</caption>
						-->
						<?php } ?>

						<tr id="trAccionesMantenimientoparametro_inventarioBasicos">
							<td id="tdbtnNuevoparametro_inventario" style="visibility:visible">
								<div id="divNuevoparametro_inventario" style="display:table-row">
									<input type="button" id="btnNuevoparametro_inventario" name="btnNuevoparametro_inventario" value="NUEVO" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnActualizarparametro_inventario" style="visibility:visible">
								<div id="divActualizarparametro_inventario" style="display:table-row">
									<input type="button" id="btnActualizarparametro_inventario" name="btnActualizarparametro_inventario" title="ACTUALIZAR Parametro Inventario ACTUAL" value="Actualizar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnEliminarparametro_inventario" style="visibility:visible">
								<div id="divEliminarparametro_inventario" style="display:table-row">
									<input type="button" id="btnEliminarparametro_inventario" name="btnEliminarparametro_inventario" title="ELIMINAR Parametro Inventario ACTUAL" value="Eliminar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnImprimirparametro_inventario" style="visibility:visible">
								<input type="button" id="btnImprimirparametro_inventario" name="btnImprimirparametro_inventario" title="IMPRIMIR PAGINA Parametro Inventario ACTUAL" value="Imp. Datos" class="btn btn-primary"/>
							</td>
							<td id="tdbtnCancelarparametro_inventario" style="visibility:visible">
								<input type="button" id="btnCancelarparametro_inventario" name="btnCancelarparametro_inventario" title="CANCELAR Parametro Inventario ACTUAL" value="Cancelar" class="btn btn-primary"/>
							</td>
						</tr>
						<tr id="trAccionesMantenimientoparametro_inventarioGuardar" style="display:none">
							<td id="tdbtnGuardarCambiosparametro_inventario" colspan="4" align="center" style="visibility:visible">
								<div id="divGuardarCambiosparametro_inventario" style="display:table-row">
									<input type="button" id="btnGuardarCambiosFormularioparametro_inventario" name="btnGuardarCambiosFormularioparametro_inventario" title="GUARDAR" value="GUADAR CAMBIOS" class="btn btn-primary"/>
								</div>
							</td>
						</tr>
					</table> <!-- tblAccionesMantenimientoparametro_inventario -->
			</td>
		</tr> <!-- trparametro_inventarioAcciones -->
		<?php if(parametro_inventario_web::$STR_ES_RELACIONADO=='false' ) {?>
		<tr id="trparametro_inventarioParametrosAcciones" class="impresion"  style="display:table-row">
			<td align="center">
				<!-- SECCION/POST -->
				<table id="tblparametro_inventarioParametrosAcciones" style="text-align: center;border: 0px solid black;padding: 0px; border-spacing: 0px">
					<caption class="busquedacabecera" style="padding: 0px;caption-side: top;">
						<span>Acciones Extra/Post</span>
					</caption>
					<tr id="trparametro_inventarioFilaParametrosAcciones">
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
				</table> <!-- tblparametro_inventarioParametrosAcciones -->
			</td>
		</tr> <!-- trparametro_inventarioParametrosAcciones -->
		<?php }?>
		<tr id="trparametro_inventarioMensajes" class="mensajes">
			<td align="center">
				<a id="Mensajes"></a>
			</td>
		</tr> <!-- trparametro_inventarioMensajes -->
			</table> <!-- tblparametro_inventarioAcciones -->
			<?php } ?>
			</form> <!-- frmMantenimientoparametro_inventario -->
			</div> <!-- divMantenimientoparametro_inventarioAjaxWebPart -->
		</td>
	</tr> <!-- trparametro_inventarioElementosFormulario/super -->
		<?php if(parametro_inventario_web::$STR_ES_RELACIONADO=='false' ) {?>

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
			
				import {parametro_inventario_webcontrol,parametro_inventario_webcontrol1} from './webroot/js/JavaScript/contabilidad/inventario/parametro_inventario/js/webcontrol/parametro_inventario_form_webcontrol.js?random=1';
				
				parametro_inventario_webcontrol1.setparametro_inventario_constante(window.parametro_inventario_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(parametro_inventario_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

