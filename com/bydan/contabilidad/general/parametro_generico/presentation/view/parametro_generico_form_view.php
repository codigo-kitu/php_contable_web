<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\general\parametro_generico\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Parametros Genericos Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/general/parametro_generico/util/parametro_generico_carga.php');
	use com\bydan\contabilidad\general\parametro_generico\util\parametro_generico_carga;
	
	//include_once('com/bydan/contabilidad/general/parametro_generico/presentation/view/parametro_generico_web.php');
	//use com\bydan\contabilidad\general\parametro_generico\presentation\view\parametro_generico_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	parametro_generico_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	parametro_generico_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$parametro_generico_web1= new parametro_generico_web();	
	$parametro_generico_web1->cargarDatosGenerales();
	
	//$moduloActual=$parametro_generico_web1->moduloActual;
	//$usuarioActual=$parametro_generico_web1->usuarioActual;
	//$sessionBase=$parametro_generico_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$parametro_generico_web1->parametroGeneralUsuarioActual;
	
	
		
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
		
		
			<script type="module" src="webroot/js/JavaScript/contabilidad/general/parametro_generico/js/util/parametro_generico_form_funcion.js?random=1"></script>
						
		
		
		<?php 
			
		
			parametro_generico_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					parametro_generico_web::$GET_POST=$_GET;
				} else {
					parametro_generico_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			parametro_generico_web::$STR_NOMBRE_PAGINA = 'parametro_generico_form_view.php';
			parametro_generico_web::$BIT_ES_PAGINA_PRINCIPAL = 'false';
			parametro_generico_web::$BIT_ES_PAGINA_FORM = 'true';
				
			parametro_generico_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {parametro_generico_constante,parametro_generico_constante1} from './webroot/js/JavaScript/contabilidad/general/parametro_generico/js/util/parametro_generico_constante.js?random=1';
			import {parametro_generico_funcion,parametro_generico_funcion1} from './webroot/js/JavaScript/contabilidad/general/parametro_generico/js/util/parametro_generico_funcion.js?random=1';
			
			let parametro_generico_constante2 = new parametro_generico_constante();
			
			parametro_generico_constante2.STR_NOMBRE_PAGINA="<?php echo(parametro_generico_web::$STR_NOMBRE_PAGINA); ?>";
			parametro_generico_constante2.STR_TYPE_ON_LOADparametro_generico="<?php echo(parametro_generico_web::$STR_TYPE_ONLOAD); ?>";
			parametro_generico_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(parametro_generico_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			parametro_generico_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(parametro_generico_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			parametro_generico_constante2.STR_ACTION="<?php echo(parametro_generico_web::$STR_ACTION); ?>";
			parametro_generico_constante2.STR_ES_POPUP="<?php echo(parametro_generico_web::$STR_ES_POPUP); ?>";
			parametro_generico_constante2.STR_ES_BUSQUEDA="<?php echo(parametro_generico_web::$STR_ES_BUSQUEDA); ?>";
			parametro_generico_constante2.STR_FUNCION_JS="<?php echo(parametro_generico_web::$STR_FUNCION_JS); ?>";
			parametro_generico_constante2.BIG_ID_ACTUAL="<?php echo(parametro_generico_web::$BIG_ID_ACTUAL); ?>";
			parametro_generico_constante2.BIG_ID_OPCION="<?php echo(parametro_generico_web::$BIG_ID_OPCION); ?>";
			parametro_generico_constante2.STR_OBJETO_JS="<?php echo(parametro_generico_web::$STR_OBJETO_JS); ?>";
			parametro_generico_constante2.STR_ES_RELACIONES="<?php echo(parametro_generico_web::$STR_ES_RELACIONES); ?>";
			parametro_generico_constante2.STR_ES_RELACIONADO="<?php echo(parametro_generico_web::$STR_ES_RELACIONADO); ?>";
			parametro_generico_constante2.STR_ES_SUB_PAGINA="<?php echo(parametro_generico_web::$STR_ES_SUB_PAGINA); ?>";
			parametro_generico_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(parametro_generico_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			parametro_generico_constante2.BIT_ES_PAGINA_FORM=<?php echo(parametro_generico_web::$BIT_ES_PAGINA_FORM); ?>;
			parametro_generico_constante2.STR_SUFIJO="<?php echo(parametro_generico_web::$STR_SUF); ?>";//parametro_generico
			parametro_generico_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(parametro_generico_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//parametro_generico
			
			parametro_generico_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(parametro_generico_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			parametro_generico_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($parametro_generico_web1->moduloActual->getnombre()); ?>";
			parametro_generico_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(parametro_generico_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			parametro_generico_constante2.BIT_ES_LOAD_NORMAL=true;
			/*parametro_generico_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			parametro_generico_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.parametro_generico_constante2 = parametro_generico_constante2;
			
		</script>
		
		<?php if(parametro_generico_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.parametro_generico_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.parametro_generico_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="parametro_genericoActual" ></a>
	
	<div id="divResumenparametro_genericoActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(parametro_generico_web::$STR_ES_RELACIONADO=='false') {?>
		
		<div id="header" >
		
			<div id="banner">
				<span id="spanTituloBanner" class="titulobanner"></span>
			</div> <!-- banner -->
					
			<div id="subheader" class="links">  
			
						
			</div> <!-- sub-header -->
			
			
		</div> <!-- header -->
		
		<?php } ?>
		
		<div id="main">
		

			<?php if(parametro_generico_web::$STR_ES_RELACIONADO=='false') {?>
			
			
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(parametro_generico_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(parametro_generico_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divparametro_genericoPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblparametro_genericoPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmparametro_genericoAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnparametro_genericoAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="parametro_generico_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnparametro_genericoAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmparametro_genericoAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblparametro_genericoPopupAjaxWebPart -->
		</div> <!-- divparametro_genericoPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->		
		
		
		
			
<tr id="trparametro_genericoElementosFormulario">
	<td>
		<div id="divMantenimientoparametro_genericoAjaxWebPart" title="PARAMETROS GENERICOS" style="height: 90%;width: 90%;position: relative;top: 30px;left: 30px;">
			<form id="frmMantenimientoparametro_generico" name="frmMantenimientoparametro_generico">

			</br>

			<?php if(parametro_generico_web::$STR_ES_RELACIONES=='false' ) {?>
			</br>
			<?php } ?>

			<!-- SECCION/TOOLBAR -->
			<table id="tblparametro_genericoToolBarFormularioExterior" style="width: 65%">
				<tr style="display:table-row">
					<td align="center">

						<table id="tblparametro_genericoToolBarFormulario" style="text-align: center"  style="display:table-row">
							<tr>
								<td id="tdparametro_genericoActualizarToolBar" style="visibility:visible">
									<img id="imgActualizarToolBarparametro_generico" name="imgActualizarToolBarparametro_generico" title="ACTUALIZAR Parametros Genericos ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/actualizar.gif" width="25" height="25"/>
								</td>
								<td id="tdparametro_genericoEliminarToolBar" style="visibility:visible">
									<img id="imgEliminarToolBarparametro_generico" name="imgEliminarToolBarparametro_generico" title="ELIMINAR Parametros Genericos ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/eliminar.gif" width="25" height="25"/>
								</td>
								<td id="tdparametro_genericoCancelarToolBar" style="visibility:visible">
									<img id="imgCancelarToolBarparametro_generico" name="imgCancelarToolBarparametro_generico" title="CANCELAR Parametros Genericos ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/cancelar.gif" width="25" height="25"/>
								</td>
								<td id="tdparametro_genericoRelacionesToolBar" style="display:table-row">
									<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/xexpand.png" width="25" height="25" onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('tblCamposOcultosparametro_generico',this,'../')"/>
								</td>
							</tr>
						</table> <!-- tblparametro_genericoToolBarFormulario -->

					</td>
				</tr>
			</table> <!-- tblparametro_genericoToolBarFormularioExterior -->

			<table id="tblparametro_genericoElementos">
			<tr id="trparametro_genericoElementos" class="elementos" style="display:table-row">
			<td align="center">

			<a id="Campos"></a>

				<?php if(parametro_generico_web::$STR_ES_RELACIONES=='false' ) {?>
				<div id="divFlechaArribaElementos" align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
					<span></span>
				</div>
				<?php } ?>

				<!-- SECCION/FORMULARIO -->
				<table id="tblElementosparametro_generico" class="elementos" style="width: 400px; padding: 0px; border-spacing: 0px; border-collapse: collapse; text-align: left;">
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
						<td id="td_title-parametro" class="titulocampo">
							<label class="form-label">Parametro.(*)</label>
						</td>
						<td id="td_control-parametro" align="left" class="controlcampo">
							<input id="form-parametro" name="form-parametro" type="text" class="form-control"  placeholder="Parametro"  title="Parametro"    size="20"  maxlength="30"/>
							<span id="spanstrMensajeparametro" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_5">
						<td id="td_title-descripcion_pantalla" class="titulocampo">
							<label class="form-label">Descripcion Pantalla.(*)</label>
						</td>
						<td id="td_control-descripcion_pantalla" align="left" class="controlcampo">
							<textarea id="form-descripcion_pantalla" name="form-descripcion_pantalla" class="form-control"  placeholder="Descripcion Pantalla"  title="Descripcion Pantalla"   style="font-size: 13px;"  rows ="0" cols= "25"></textarea>
							<span id="spanstrMensajedescripcion_pantalla" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_6">
						<td id="td_title-valor_caracteristica" class="titulocampo">
							<label class="form-label">Valor Caracteristica.(*)</label>
						</td>
						<td id="td_control-valor_caracteristica" align="left" class="controlcampo">
							<textarea id="form-valor_caracteristica" name="form-valor_caracteristica" class="form-control"  placeholder="Valor Caracteristica"  title="Valor Caracteristica"   style="font-size: 13px;"  rows ="0" cols= "25"></textarea>
							<span id="spanstrMensajevalor_caracteristica" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_7">
						<td id="td_title-valor2_caracteristica" class="titulocampo">
							<label class="form-label">Valor2 Caracteristica.(*)</label>
						</td>
						<td id="td_control-valor2_caracteristica" align="left" class="controlcampo">
							<textarea id="form-valor2_caracteristica" name="form-valor2_caracteristica" class="form-control"  placeholder="Valor2 Caracteristica"  title="Valor2 Caracteristica"   style="font-size: 13px;"  rows ="3" cols= "25"></textarea>
							<span id="spanstrMensajevalor2_caracteristica" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_8">
						<td id="td_title-valor3_caracteristica" class="titulocampo">
							<label class="form-label">Valor3 Caracteristica.(*)</label>
						</td>
						<td id="td_control-valor3_caracteristica" align="left" class="controlcampo">
							<textarea id="form-valor3_caracteristica" name="form-valor3_caracteristica" class="form-control"  placeholder="Valor3 Caracteristica"  title="Valor3 Caracteristica"   style="font-size: 13px;"  rows ="0" cols= "25"></textarea>
							<span id="spanstrMensajevalor3_caracteristica" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_9">
						<td id="td_title-valor_fecha" class="titulocampo">
							<label class="form-label">Valor Fecha.(*)</label>
						</td>
						<td id="td_control-valor_fecha" align="left" class="controlcampo">
							<input id="form-valor_fecha" name="form-valor_fecha" type="text" class="form-control"  placeholder="Valor Fecha"  title="Valor Fecha"    size="10" >
							<span id="spanstrMensajevalor_fecha" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_10">
						<td id="td_title-valor_numerico" class="titulocampo">
							<label class="form-label">Valor Numerico.(*)</label>
						</td>
						<td id="td_control-valor_numerico" align="left" class="controlcampo">
							<input id="form-valor_numerico" name="form-valor_numerico" type="text" class="form-control"  placeholder="Valor Numerico"  title="Valor Numerico"    maxlength="18" size="12" >
							<span id="spanstrMensajevalor_numerico" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_11">
						<td id="td_title-valor2_numerico" class="titulocampo">
							<label class="form-label">Valor2 Numerico.(*)</label>
						</td>
						<td id="td_control-valor2_numerico" align="left" class="controlcampo">
							<input id="form-valor2_numerico" name="form-valor2_numerico" type="text" class="form-control"  placeholder="Valor2 Numerico"  title="Valor2 Numerico"    maxlength="18" size="12" >
							<span id="spanstrMensajevalor2_numerico" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_12">
						<td id="td_title-valor_binario" class="titulocampo">
							<label class="form-label">Valor Binario.(*)</label>
						</td>
						<td id="td_control-valor_binario" align="left" class="controlcampo">
							<textarea id="form-valor_binario" name="form-valor_binario" class="form-control"  placeholder="Valor Binario"  title="Valor Binario"   style="font-size: 13px;"  rows ="0" cols= "25"></textarea>
							<span id="spanstrMensajevalor_binario" class="mensajeerror"></span>
						</td>
					</tr>
				</table> <!-- tblElementosparametro_generico -->

				<!-- SECCION/OCULTOS -->
				<table id="tblCamposOcultosparametro_generico" class="elementos" style="display: table-row;">
					<caption class="busquedacabecera">
						<span>Campos Ocultos</span>
					</caption>
				</table> <!-- tblCamposOcultosparametro_generico -->

			</td></tr> <!-- trparametro_genericoElementos -->
			</table> <!-- tblparametro_genericoElementos -->
			</form> <!-- frmMantenimientoparametro_generico -->


			

				<form id="frmAccionesMantenimientoparametro_generico" name="frmAccionesMantenimientoparametro_generico">

			<?php if(parametro_generico_web::$STR_ES_BUSQUEDA=='false' ) {?>
			<table id="tblparametro_genericoAcciones" class="elementos" style="text-align: center">
		<tr id="trparametro_genericoAcciones" class="elementos" style="display:table-row">
			<td align="center">
				<a id="Acciones" ></a>

				<?php if(parametro_generico_web::$STR_ES_RELACIONES=='false' ) {?>
				<div align="right">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
				<?php } ?>

					<!-- SECCION/BOTONES -->
					<table id="tblAccionesMantenimientoparametro_generico" class="busqueda" style="width: 50%;text-align: left">

						<?php if(parametro_generico_web::$STR_ES_RELACIONES=='false' ) {?>
						<!--
						<caption class="busquedacabecera">
							<span>Acciones</span>
						</caption>
						-->
						<?php } ?>

						<tr id="trAccionesMantenimientoparametro_genericoBasicos">
							<td id="tdbtnNuevoparametro_generico" style="visibility:visible">
								<div id="divNuevoparametro_generico" style="display:table-row">
									<input type="button" id="btnNuevoparametro_generico" name="btnNuevoparametro_generico" value="NUEVO" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnActualizarparametro_generico" style="visibility:visible">
								<div id="divActualizarparametro_generico" style="display:table-row">
									<input type="button" id="btnActualizarparametro_generico" name="btnActualizarparametro_generico" title="ACTUALIZAR Parametros Genericos ACTUAL" value="Actualizar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnEliminarparametro_generico" style="visibility:visible">
								<div id="divEliminarparametro_generico" style="display:table-row">
									<input type="button" id="btnEliminarparametro_generico" name="btnEliminarparametro_generico" title="ELIMINAR Parametros Genericos ACTUAL" value="Eliminar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnImprimirparametro_generico" style="visibility:visible">
								<input type="button" id="btnImprimirparametro_generico" name="btnImprimirparametro_generico" title="IMPRIMIR PAGINA Parametros Genericos ACTUAL" value="Imp. Datos" class="btn btn-primary"/>
							</td>
							<td id="tdbtnCancelarparametro_generico" style="visibility:visible">
								<input type="button" id="btnCancelarparametro_generico" name="btnCancelarparametro_generico" title="CANCELAR Parametros Genericos ACTUAL" value="Cancelar" class="btn btn-primary"/>
							</td>
						</tr>
						<tr id="trAccionesMantenimientoparametro_genericoGuardar" style="display:none">
							<td id="tdbtnGuardarCambiosparametro_generico" colspan="4" align="center" style="visibility:visible">
								<div id="divGuardarCambiosparametro_generico" style="display:table-row">
									<input type="button" id="btnGuardarCambiosFormularioparametro_generico" name="btnGuardarCambiosFormularioparametro_generico" title="GUARDAR" value="GUADAR CAMBIOS" class="btn btn-primary"/>
								</div>
							</td>
						</tr>
					</table> <!-- tblAccionesMantenimientoparametro_generico -->
			</td>
		</tr> <!-- trparametro_genericoAcciones -->
		<?php if(parametro_generico_web::$STR_ES_RELACIONADO=='false' ) {?>
		<tr id="trparametro_genericoParametrosAcciones" class="impresion"  style="display:table-row">
			<td align="center">
				<!-- SECCION/POST -->
				<table id="tblparametro_genericoParametrosAcciones" style="text-align: center;border: 0px solid black;padding: 0px; border-spacing: 0px">
					<caption class="busquedacabecera" style="padding: 0px;caption-side: top;">
						<span>Acciones Extra/Post</span>
					</caption>
					<tr id="trparametro_genericoFilaParametrosAcciones">
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
				</table> <!-- tblparametro_genericoParametrosAcciones -->
			</td>
		</tr> <!-- trparametro_genericoParametrosAcciones -->
		<?php }?>
		<tr id="trparametro_genericoMensajes" class="mensajes">
			<td align="center">
				<a id="Mensajes"></a>
			</td>
		</tr> <!-- trparametro_genericoMensajes -->
			</table> <!-- tblparametro_genericoAcciones -->
			<?php } ?>
			</form> <!-- frmMantenimientoparametro_generico -->
			</div> <!-- divMantenimientoparametro_genericoAjaxWebPart -->
		</td>
	</tr> <!-- trparametro_genericoElementosFormulario/super -->
		<?php if(parametro_generico_web::$STR_ES_RELACIONADO=='false' ) {?>

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
			
				import {parametro_generico_webcontrol,parametro_generico_webcontrol1} from './webroot/js/JavaScript/contabilidad/general/parametro_generico/js/webcontrol/parametro_generico_form_webcontrol.js?random=1';
				
				parametro_generico_webcontrol1.setparametro_generico_constante(window.parametro_generico_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(parametro_generico_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

