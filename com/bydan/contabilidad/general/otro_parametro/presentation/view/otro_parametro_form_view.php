<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\general\otro_parametro\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Otros Parametros Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/general/otro_parametro/util/otro_parametro_carga.php');
	use com\bydan\contabilidad\general\otro_parametro\util\otro_parametro_carga;
	
	//include_once('com/bydan/contabilidad/general/otro_parametro/presentation/view/otro_parametro_web.php');
	//use com\bydan\contabilidad\general\otro_parametro\presentation\view\otro_parametro_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	otro_parametro_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	otro_parametro_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$otro_parametro_web1= new otro_parametro_web();	
	$otro_parametro_web1->cargarDatosGenerales();
	
	//$moduloActual=$otro_parametro_web1->moduloActual;
	//$usuarioActual=$otro_parametro_web1->usuarioActual;
	//$sessionBase=$otro_parametro_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$otro_parametro_web1->parametroGeneralUsuarioActual;
	
	
		
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
		
		
			<script type="module" src="webroot/js/JavaScript/contabilidad/general/otro_parametro/js/util/otro_parametro_form_funcion.js?random=1"></script>
						
		
		
		<?php 
			
		
			otro_parametro_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					otro_parametro_web::$GET_POST=$_GET;
				} else {
					otro_parametro_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			otro_parametro_web::$STR_NOMBRE_PAGINA = 'otro_parametro_form_view.php';
			otro_parametro_web::$BIT_ES_PAGINA_PRINCIPAL = 'false';
			otro_parametro_web::$BIT_ES_PAGINA_FORM = 'true';
				
			otro_parametro_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {otro_parametro_constante,otro_parametro_constante1} from './webroot/js/JavaScript/contabilidad/general/otro_parametro/js/util/otro_parametro_constante.js?random=1';
			import {otro_parametro_funcion,otro_parametro_funcion1} from './webroot/js/JavaScript/contabilidad/general/otro_parametro/js/util/otro_parametro_funcion.js?random=1';
			
			let otro_parametro_constante2 = new otro_parametro_constante();
			
			otro_parametro_constante2.STR_NOMBRE_PAGINA="<?php echo(otro_parametro_web::$STR_NOMBRE_PAGINA); ?>";
			otro_parametro_constante2.STR_TYPE_ON_LOADotro_parametro="<?php echo(otro_parametro_web::$STR_TYPE_ONLOAD); ?>";
			otro_parametro_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(otro_parametro_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			otro_parametro_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(otro_parametro_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			otro_parametro_constante2.STR_ACTION="<?php echo(otro_parametro_web::$STR_ACTION); ?>";
			otro_parametro_constante2.STR_ES_POPUP="<?php echo(otro_parametro_web::$STR_ES_POPUP); ?>";
			otro_parametro_constante2.STR_ES_BUSQUEDA="<?php echo(otro_parametro_web::$STR_ES_BUSQUEDA); ?>";
			otro_parametro_constante2.STR_FUNCION_JS="<?php echo(otro_parametro_web::$STR_FUNCION_JS); ?>";
			otro_parametro_constante2.BIG_ID_ACTUAL="<?php echo(otro_parametro_web::$BIG_ID_ACTUAL); ?>";
			otro_parametro_constante2.BIG_ID_OPCION="<?php echo(otro_parametro_web::$BIG_ID_OPCION); ?>";
			otro_parametro_constante2.STR_OBJETO_JS="<?php echo(otro_parametro_web::$STR_OBJETO_JS); ?>";
			otro_parametro_constante2.STR_ES_RELACIONES="<?php echo(otro_parametro_web::$STR_ES_RELACIONES); ?>";
			otro_parametro_constante2.STR_ES_RELACIONADO="<?php echo(otro_parametro_web::$STR_ES_RELACIONADO); ?>";
			otro_parametro_constante2.STR_ES_SUB_PAGINA="<?php echo(otro_parametro_web::$STR_ES_SUB_PAGINA); ?>";
			otro_parametro_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(otro_parametro_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			otro_parametro_constante2.BIT_ES_PAGINA_FORM=<?php echo(otro_parametro_web::$BIT_ES_PAGINA_FORM); ?>;
			otro_parametro_constante2.STR_SUFIJO="<?php echo(otro_parametro_web::$STR_SUF); ?>";//otro_parametro
			otro_parametro_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(otro_parametro_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//otro_parametro
			
			otro_parametro_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(otro_parametro_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			otro_parametro_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($otro_parametro_web1->moduloActual->getnombre()); ?>";
			otro_parametro_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(otro_parametro_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			otro_parametro_constante2.BIT_ES_LOAD_NORMAL=true;
			/*otro_parametro_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			otro_parametro_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.otro_parametro_constante2 = otro_parametro_constante2;
			
		</script>
		
		<?php if(otro_parametro_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.otro_parametro_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.otro_parametro_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="otro_parametroActual" ></a>
	
	<div id="divResumenotro_parametroActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(otro_parametro_web::$STR_ES_RELACIONADO=='false') {?>
		
		<div id="header" >
		
			<div id="banner">
				<span id="spanTituloBanner" class="titulobanner"></span>
			</div> <!-- banner -->
					
			<div id="subheader" class="links">  
			
						
			</div> <!-- sub-header -->
			
			
		</div> <!-- header -->
		
		<?php } ?>
		
		<div id="main">
		

			<?php if(otro_parametro_web::$STR_ES_RELACIONADO=='false') {?>
			
			
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(otro_parametro_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(otro_parametro_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divotro_parametroPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblotro_parametroPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmotro_parametroAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnotro_parametroAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="otro_parametro_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnotro_parametroAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmotro_parametroAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblotro_parametroPopupAjaxWebPart -->
		</div> <!-- divotro_parametroPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->		
		
		
		
			
<tr id="trotro_parametroElementosFormulario">
	<td>
		<div id="divMantenimientootro_parametroAjaxWebPart" title="OTROS PARAMETROS" style="height: 90%;width: 90%;position: relative;top: 30px;left: 30px;">
			<form id="frmMantenimientootro_parametro" name="frmMantenimientootro_parametro">

			</br>

			<?php if(otro_parametro_web::$STR_ES_RELACIONES=='false' ) {?>
			</br>
			<?php } ?>

			<!-- SECCION/TOOLBAR -->
			<table id="tblotro_parametroToolBarFormularioExterior" style="width: 65%">
				<tr style="display:table-row">
					<td align="center">

						<table id="tblotro_parametroToolBarFormulario" style="text-align: center"  style="display:table-row">
							<tr>
								<td id="tdotro_parametroActualizarToolBar" style="visibility:visible">
									<img id="imgActualizarToolBarotro_parametro" name="imgActualizarToolBarotro_parametro" title="ACTUALIZAR Otros Parametros ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/actualizar.gif" width="25" height="25"/>
								</td>
								<td id="tdotro_parametroEliminarToolBar" style="visibility:visible">
									<img id="imgEliminarToolBarotro_parametro" name="imgEliminarToolBarotro_parametro" title="ELIMINAR Otros Parametros ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/eliminar.gif" width="25" height="25"/>
								</td>
								<td id="tdotro_parametroCancelarToolBar" style="visibility:visible">
									<img id="imgCancelarToolBarotro_parametro" name="imgCancelarToolBarotro_parametro" title="CANCELAR Otros Parametros ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/cancelar.gif" width="25" height="25"/>
								</td>
								<td id="tdotro_parametroRelacionesToolBar" style="display:table-row">
									<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/xexpand.png" width="25" height="25" onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('tblCamposOcultosotro_parametro',this,'../')"/>
								</td>
							</tr>
						</table> <!-- tblotro_parametroToolBarFormulario -->

					</td>
				</tr>
			</table> <!-- tblotro_parametroToolBarFormularioExterior -->

			<table id="tblotro_parametroElementos">
			<tr id="trotro_parametroElementos" class="elementos" style="display:table-row">
			<td align="center">

			<a id="Campos"></a>

				<?php if(otro_parametro_web::$STR_ES_RELACIONES=='false' ) {?>
				<div id="divFlechaArribaElementos" align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
					<span></span>
				</div>
				<?php } ?>

				<!-- SECCION/FORMULARIO -->
				<table id="tblElementosotro_parametro" class="elementos" style="width: 300px; padding: 0px; border-spacing: 0px; border-collapse: collapse; text-align: center;">
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
							<input id="form-codigo" name="form-codigo" type="text" class="form-control"  placeholder="Codigo"  title="Codigo"    size="10"  maxlength="10"/>
							<span id="spanstrMensajecodigo" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_5">
						<td id="td_title-codigo2" class="titulocampo">
							<label class="form-label">Codigo2.(*)</label>
						</td>
						<td id="td_control-codigo2" align="left" class="controlcampo">
							<input id="form-codigo2" name="form-codigo2" type="text" class="form-control"  placeholder="Codigo2"  title="Codigo2"    size="10"  maxlength="10"/>
							<span id="spanstrMensajecodigo2" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_6">
						<td id="td_title-grupo" class="titulocampo">
							<label class="form-label">Grupo.(*)</label>
						</td>
						<td id="td_control-grupo" align="left" class="controlcampo">
							<input id="form-grupo" name="form-grupo" type="text" class="form-control"  placeholder="Grupo"  title="Grupo"    size="10"  maxlength="10"/>
							<span id="spanstrMensajegrupo" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_7">
						<td id="td_title-descripcion" class="titulocampo">
							<label class="form-label">Descripcion.(*)</label>
						</td>
						<td id="td_control-descripcion" align="left" class="controlcampo">
							<textarea id="form-descripcion" name="form-descripcion" class="form-control"  placeholder="Descripcion"  title="Descripcion"   style="font-size: 13px;" rows="2" cols="25" size="20" ></textarea>
							<span id="spanstrMensajedescripcion" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_8">
						<td id="td_title-texto1" class="titulocampo">
							<label class="form-label">Texto1.(*)</label>
						</td>
						<td id="td_control-texto1" align="left" class="controlcampo">
							<input id="form-texto1" name="form-texto1" type="text" class="form-control"  placeholder="Texto1"  title="Texto1"    size="20"  maxlength="25"/>
							<span id="spanstrMensajetexto1" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_9">
						<td id="td_title-orden" class="titulocampo">
							<label class="form-label">Orden.(*)</label>
						</td>
						<td id="td_control-orden" align="left" class="controlcampo">
							<input id="form-orden" name="form-orden" type="text" class="form-control"  placeholder="Orden"  title="Orden"    maxlength="10" size="10" >
							<span id="spanstrMensajeorden" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_10">
						<td id="td_title-monto1" class="titulocampo">
							<label class="form-label">Monto1.(*)</label>
						</td>
						<td id="td_control-monto1" align="left" class="controlcampo">
							<input id="form-monto1" name="form-monto1" type="text" class="form-control"  placeholder="Monto1"  title="Monto1"    maxlength="18" size="12" >
							<span id="spanstrMensajemonto1" class="mensajeerror"></span>
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
				</table> <!-- tblElementosotro_parametro -->

				<!-- SECCION/OCULTOS -->
				<table id="tblCamposOcultosotro_parametro" class="elementos" style="display: table-row;">
					<caption class="busquedacabecera">
						<span>Campos Ocultos</span>
					</caption>
				</table> <!-- tblCamposOcultosotro_parametro -->

			</td></tr> <!-- trotro_parametroElementos -->
			</table> <!-- tblotro_parametroElementos -->
			</form> <!-- frmMantenimientootro_parametro -->


			

				<form id="frmAccionesMantenimientootro_parametro" name="frmAccionesMantenimientootro_parametro">

			<?php if(otro_parametro_web::$STR_ES_BUSQUEDA=='false' ) {?>
			<table id="tblotro_parametroAcciones" class="elementos" style="text-align: center">
		<tr id="trotro_parametroAcciones" class="elementos" style="display:table-row">
			<td align="center">
				<a id="Acciones" ></a>

				<?php if(otro_parametro_web::$STR_ES_RELACIONES=='false' ) {?>
				<div align="right">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
				<?php } ?>

					<!-- SECCION/BOTONES -->
					<table id="tblAccionesMantenimientootro_parametro" class="busqueda" style="width: 50%;text-align: center">

						<?php if(otro_parametro_web::$STR_ES_RELACIONES=='false' ) {?>
						<!--
						<caption class="busquedacabecera">
							<span>Acciones</span>
						</caption>
						-->
						<?php } ?>

						<tr id="trAccionesMantenimientootro_parametroBasicos">
							<td id="tdbtnNuevootro_parametro" style="visibility:visible">
								<div id="divNuevootro_parametro" style="display:table-row">
									<input type="button" id="btnNuevootro_parametro" name="btnNuevootro_parametro" value="NUEVO" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnActualizarotro_parametro" style="visibility:visible">
								<div id="divActualizarotro_parametro" style="display:table-row">
									<input type="button" id="btnActualizarotro_parametro" name="btnActualizarotro_parametro" title="ACTUALIZAR Otros Parametros ACTUAL" value="Actualizar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnEliminarotro_parametro" style="visibility:visible">
								<div id="divEliminarotro_parametro" style="display:table-row">
									<input type="button" id="btnEliminarotro_parametro" name="btnEliminarotro_parametro" title="ELIMINAR Otros Parametros ACTUAL" value="Eliminar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnImprimirotro_parametro" style="visibility:visible">
								<input type="button" id="btnImprimirotro_parametro" name="btnImprimirotro_parametro" title="IMPRIMIR PAGINA Otros Parametros ACTUAL" value="Imp. Datos" class="btn btn-primary"/>
							</td>
							<td id="tdbtnCancelarotro_parametro" style="visibility:visible">
								<input type="button" id="btnCancelarotro_parametro" name="btnCancelarotro_parametro" title="CANCELAR Otros Parametros ACTUAL" value="Cancelar" class="btn btn-primary"/>
							</td>
						</tr>
						<tr id="trAccionesMantenimientootro_parametroGuardar" style="display:none">
							<td id="tdbtnGuardarCambiosotro_parametro" colspan="4" align="center" style="visibility:visible">
								<div id="divGuardarCambiosotro_parametro" style="display:table-row">
									<input type="button" id="btnGuardarCambiosFormulariootro_parametro" name="btnGuardarCambiosFormulariootro_parametro" title="GUARDAR" value="GUADAR CAMBIOS" class="btn btn-primary"/>
								</div>
							</td>
						</tr>
					</table> <!-- tblAccionesMantenimientootro_parametro -->
			</td>
		</tr> <!-- trotro_parametroAcciones -->
		<?php if(otro_parametro_web::$STR_ES_RELACIONADO=='false' ) {?>
		<tr id="trotro_parametroParametrosAcciones" class="impresion"  style="display:table-row">
			<td align="center">
				<!-- SECCION/POST -->
				<table id="tblotro_parametroParametrosAcciones" style="text-align: center;border: 0px solid black;padding: 0px; border-spacing: 0px">
					<caption class="busquedacabecera" style="padding: 0px;caption-side: top;">
						<span>Acciones Extra/Post</span>
					</caption>
					<tr id="trotro_parametroFilaParametrosAcciones">
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
				</table> <!-- tblotro_parametroParametrosAcciones -->
			</td>
		</tr> <!-- trotro_parametroParametrosAcciones -->
		<?php }?>
		<tr id="trotro_parametroMensajes" class="mensajes">
			<td align="center">
				<a id="Mensajes"></a>
			</td>
		</tr> <!-- trotro_parametroMensajes -->
			</table> <!-- tblotro_parametroAcciones -->
			<?php } ?>
			</form> <!-- frmMantenimientootro_parametro -->
			</div> <!-- divMantenimientootro_parametroAjaxWebPart -->
		</td>
	</tr> <!-- trotro_parametroElementosFormulario/super -->
		<?php if(otro_parametro_web::$STR_ES_RELACIONADO=='false' ) {?>

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
			
				import {otro_parametro_webcontrol,otro_parametro_webcontrol1} from './webroot/js/JavaScript/contabilidad/general/otro_parametro/js/webcontrol/otro_parametro_form_webcontrol.js?random=1';
				
				otro_parametro_webcontrol1.setotro_parametro_constante(window.otro_parametro_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(otro_parametro_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

