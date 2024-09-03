<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\seguridad\municipio\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Municipio Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/seguridad/municipio/util/municipio_carga.php');
	use com\bydan\contabilidad\seguridad\municipio\util\municipio_carga;
	
	//include_once('com/bydan/contabilidad/seguridad/municipio/presentation/view/municipio_web.php');
	//use com\bydan\contabilidad\seguridad\municipio\presentation\view\municipio_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	municipio_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	municipio_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$municipio_web1= new municipio_web();	
	$municipio_web1->cargarDatosGenerales();
	
	//$moduloActual=$municipio_web1->moduloActual;
	//$usuarioActual=$municipio_web1->usuarioActual;
	//$sessionBase=$municipio_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$municipio_web1->parametroGeneralUsuarioActual;
	
	
		
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
		
		
			<script type="module" src="webroot/js/JavaScript/contabilidad/seguridad/municipio/js/util/municipio_form_funcion.js?random=1"></script>
						
		
		
		<?php 
			
		
			municipio_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					municipio_web::$GET_POST=$_GET;
				} else {
					municipio_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			municipio_web::$STR_NOMBRE_PAGINA = 'municipio_form_view.php';
			municipio_web::$BIT_ES_PAGINA_PRINCIPAL = 'false';
			municipio_web::$BIT_ES_PAGINA_FORM = 'true';
				
			municipio_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {municipio_constante,municipio_constante1} from './webroot/js/JavaScript/contabilidad/seguridad/municipio/js/util/municipio_constante.js?random=1';
			import {municipio_funcion,municipio_funcion1} from './webroot/js/JavaScript/contabilidad/seguridad/municipio/js/util/municipio_funcion.js?random=1';
			
			let municipio_constante2 = new municipio_constante();
			
			municipio_constante2.STR_NOMBRE_PAGINA="<?php echo(municipio_web::$STR_NOMBRE_PAGINA); ?>";
			municipio_constante2.STR_TYPE_ON_LOADmunicipio="<?php echo(municipio_web::$STR_TYPE_ONLOAD); ?>";
			municipio_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(municipio_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			municipio_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(municipio_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			municipio_constante2.STR_ACTION="<?php echo(municipio_web::$STR_ACTION); ?>";
			municipio_constante2.STR_ES_POPUP="<?php echo(municipio_web::$STR_ES_POPUP); ?>";
			municipio_constante2.STR_ES_BUSQUEDA="<?php echo(municipio_web::$STR_ES_BUSQUEDA); ?>";
			municipio_constante2.STR_FUNCION_JS="<?php echo(municipio_web::$STR_FUNCION_JS); ?>";
			municipio_constante2.BIG_ID_ACTUAL="<?php echo(municipio_web::$BIG_ID_ACTUAL); ?>";
			municipio_constante2.BIG_ID_OPCION="<?php echo(municipio_web::$BIG_ID_OPCION); ?>";
			municipio_constante2.STR_OBJETO_JS="<?php echo(municipio_web::$STR_OBJETO_JS); ?>";
			municipio_constante2.STR_ES_RELACIONES="<?php echo(municipio_web::$STR_ES_RELACIONES); ?>";
			municipio_constante2.STR_ES_RELACIONADO="<?php echo(municipio_web::$STR_ES_RELACIONADO); ?>";
			municipio_constante2.STR_ES_SUB_PAGINA="<?php echo(municipio_web::$STR_ES_SUB_PAGINA); ?>";
			municipio_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(municipio_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			municipio_constante2.BIT_ES_PAGINA_FORM=<?php echo(municipio_web::$BIT_ES_PAGINA_FORM); ?>;
			municipio_constante2.STR_SUFIJO="<?php echo(municipio_web::$STR_SUF); ?>";//municipio
			municipio_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(municipio_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//municipio
			
			municipio_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(municipio_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			municipio_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($municipio_web1->moduloActual->getnombre()); ?>";
			municipio_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(municipio_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			municipio_constante2.BIT_ES_LOAD_NORMAL=true;
			/*municipio_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			municipio_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.municipio_constante2 = municipio_constante2;
			
		</script>
		
		<?php if(municipio_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.municipio_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.municipio_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="municipioActual" ></a>
	
	<div id="divResumenmunicipioActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(municipio_web::$STR_ES_RELACIONADO=='false') {?>
		
		<div id="header" >
		
			<div id="banner">
				<span id="spanTituloBanner" class="titulobanner"></span>
			</div> <!-- banner -->
					
			<div id="subheader" class="links">  
			
						
			</div> <!-- sub-header -->
			
			
		</div> <!-- header -->
		
		<?php } ?>
		
		<div id="main">
		

			<?php if(municipio_web::$STR_ES_RELACIONADO=='false') {?>
			
			
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(municipio_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(municipio_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divmunicipioPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblmunicipioPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmmunicipioAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnmunicipioAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="municipio_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnmunicipioAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmmunicipioAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblmunicipioPopupAjaxWebPart -->
		</div> <!-- divmunicipioPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->		
		
		
		
			
<tr id="trmunicipioElementosFormulario">
	<td>
		<div id="divMantenimientomunicipioAjaxWebPart" title="MUNICIPIO" style="height: 90%;width: 90%;position: relative;top: 30px;left: 30px;">
			<form id="frmMantenimientomunicipio" name="frmMantenimientomunicipio">

			</br>

			<?php if(municipio_web::$STR_ES_RELACIONES=='false' ) {?>
			</br>
			<?php } ?>

			<!-- SECCION/TOOLBAR -->
			<table id="tblmunicipioToolBarFormularioExterior" style="width: 65%">
				<tr style="display:table-row">
					<td align="center">

						<table id="tblmunicipioToolBarFormulario" style="text-align: center"  style="display:table-row">
							<tr>
								<td id="tdmunicipioActualizarToolBar" style="visibility:visible">
									<img id="imgActualizarToolBarmunicipio" name="imgActualizarToolBarmunicipio" title="ACTUALIZAR Municipio ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/actualizar.gif" width="25" height="25"/>
								</td>
								<td id="tdmunicipioEliminarToolBar" style="visibility:visible">
									<img id="imgEliminarToolBarmunicipio" name="imgEliminarToolBarmunicipio" title="ELIMINAR Municipio ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/eliminar.gif" width="25" height="25"/>
								</td>
								<td id="tdmunicipioCancelarToolBar" style="visibility:visible">
									<img id="imgCancelarToolBarmunicipio" name="imgCancelarToolBarmunicipio" title="CANCELAR Municipio ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/cancelar.gif" width="25" height="25"/>
								</td>
								<td id="tdmunicipioRelacionesToolBar" style="display:table-row">
									<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/xexpand.png" width="25" height="25" onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('tblCamposOcultosmunicipio',this,'../')"/>
								</td>
							</tr>
						</table> <!-- tblmunicipioToolBarFormulario -->

					</td>
				</tr>
			</table> <!-- tblmunicipioToolBarFormularioExterior -->

			<table id="tblmunicipioElementos">
			<tr id="trmunicipioElementos" class="elementos" style="display:table-row">
			<td align="center">

			<a id="Campos"></a>

				<?php if(municipio_web::$STR_ES_RELACIONES=='false' ) {?>
				<div id="divFlechaArribaElementos" align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
					<span></span>
				</div>
				<?php } ?>

				<!-- SECCION/FORMULARIO -->
				<table id="tblElementosmunicipio" class="elementos" style="width: 350px; padding: 0px; border-spacing: 0px; border-collapse: collapse; text-align: center;">
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
						<td id="td_title-municipio" class="titulocampo">
							<label class="form-label">Municipio.(*)</label>
						</td>
						<td id="td_control-municipio" align="left" class="controlcampo">
							<input id="form-municipio" name="form-municipio" type="text" class="form-control"  placeholder="Municipio"  title="Municipio"    size="20"  maxlength="50"/>
							<span id="spanstrMensajemunicipio" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_6">
						<td id="td_title-departamento" class="titulocampo">
							<label class="form-label">Departamento.(*)</label>
						</td>
						<td id="td_control-departamento" align="left" class="controlcampo">
							<input id="form-departamento" name="form-departamento" type="text" class="form-control"  placeholder="Departamento"  title="Departamento"    size="20"  maxlength="50"/>
							<span id="spanstrMensajedepartamento" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_7">
						<td id="td_title-codigo_departamento" class="titulocampo">
							<label class="form-label">Codigo Departamento.(*)</label>
						</td>
						<td id="td_control-codigo_departamento" align="left" class="controlcampo">
							<input id="form-codigo_departamento" name="form-codigo_departamento" type="text" class="form-control"  placeholder="Codigo Departamento"  title="Codigo Departamento"    size="4"  maxlength="4"/>
							<span id="spanstrMensajecodigo_departamento" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_8">
						<td id="td_title-codigo_municipio" class="titulocampo">
							<label class="form-label">Codigo Municipio.(*)</label>
						</td>
						<td id="td_control-codigo_municipio" align="left" class="controlcampo">
							<input id="form-codigo_municipio" name="form-codigo_municipio" type="text" class="form-control"  placeholder="Codigo Municipio"  title="Codigo Municipio"    size="4"  maxlength="4"/>
							<span id="spanstrMensajecodigo_municipio" class="mensajeerror"></span>
						</td>
					</tr>
				</table> <!-- tblElementosmunicipio -->

				<!-- SECCION/OCULTOS -->
				<table id="tblCamposOcultosmunicipio" class="elementos" style="display: table-row;">
					<caption class="busquedacabecera">
						<span>Campos Ocultos</span>
					</caption>
				</table> <!-- tblCamposOcultosmunicipio -->

			</td></tr> <!-- trmunicipioElementos -->
			</table> <!-- tblmunicipioElementos -->
			</form> <!-- frmMantenimientomunicipio -->


			

				<form id="frmAccionesMantenimientomunicipio" name="frmAccionesMantenimientomunicipio">

			<?php if(municipio_web::$STR_ES_BUSQUEDA=='false' ) {?>
			<table id="tblmunicipioAcciones" class="elementos" style="text-align: center">
		<tr id="trmunicipioAcciones" class="elementos" style="display:table-row">
			<td align="center">
				<a id="Acciones" ></a>

				<?php if(municipio_web::$STR_ES_RELACIONES=='false' ) {?>
				<div align="right">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
				<?php } ?>

					<!-- SECCION/BOTONES -->
					<table id="tblAccionesMantenimientomunicipio" class="busqueda" style="width: 50%;text-align: center">

						<?php if(municipio_web::$STR_ES_RELACIONES=='false' ) {?>
						<!--
						<caption class="busquedacabecera">
							<span>Acciones</span>
						</caption>
						-->
						<?php } ?>

						<tr id="trAccionesMantenimientomunicipioBasicos">
							<td id="tdbtnNuevomunicipio" style="visibility:visible">
								<div id="divNuevomunicipio" style="display:table-row">
									<input type="button" id="btnNuevomunicipio" name="btnNuevomunicipio" value="NUEVO" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnActualizarmunicipio" style="visibility:visible">
								<div id="divActualizarmunicipio" style="display:table-row">
									<input type="button" id="btnActualizarmunicipio" name="btnActualizarmunicipio" title="ACTUALIZAR Municipio ACTUAL" value="Actualizar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnEliminarmunicipio" style="visibility:visible">
								<div id="divEliminarmunicipio" style="display:table-row">
									<input type="button" id="btnEliminarmunicipio" name="btnEliminarmunicipio" title="ELIMINAR Municipio ACTUAL" value="Eliminar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnImprimirmunicipio" style="visibility:visible">
								<input type="button" id="btnImprimirmunicipio" name="btnImprimirmunicipio" title="IMPRIMIR PAGINA Municipio ACTUAL" value="Imp. Datos" class="btn btn-primary"/>
							</td>
							<td id="tdbtnCancelarmunicipio" style="visibility:visible">
								<input type="button" id="btnCancelarmunicipio" name="btnCancelarmunicipio" title="CANCELAR Municipio ACTUAL" value="Cancelar" class="btn btn-primary"/>
							</td>
						</tr>
						<tr id="trAccionesMantenimientomunicipioGuardar" style="display:none">
							<td id="tdbtnGuardarCambiosmunicipio" colspan="4" align="center" style="visibility:visible">
								<div id="divGuardarCambiosmunicipio" style="display:table-row">
									<input type="button" id="btnGuardarCambiosFormulariomunicipio" name="btnGuardarCambiosFormulariomunicipio" title="GUARDAR" value="GUADAR CAMBIOS" class="btn btn-primary"/>
								</div>
							</td>
						</tr>
					</table> <!-- tblAccionesMantenimientomunicipio -->
			</td>
		</tr> <!-- trmunicipioAcciones -->
		<?php if(municipio_web::$STR_ES_RELACIONADO=='false' ) {?>
		<tr id="trmunicipioParametrosAcciones" class="impresion"  style="display:table-row">
			<td align="center">
				<!-- SECCION/POST -->
				<table id="tblmunicipioParametrosAcciones" style="text-align: center;border: 0px solid black;padding: 0px; border-spacing: 0px">
					<caption class="busquedacabecera" style="padding: 0px;caption-side: top;">
						<span>Acciones Extra/Post</span>
					</caption>
					<tr id="trmunicipioFilaParametrosAcciones">
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
				</table> <!-- tblmunicipioParametrosAcciones -->
			</td>
		</tr> <!-- trmunicipioParametrosAcciones -->
		<?php }?>
		<tr id="trmunicipioMensajes" class="mensajes">
			<td align="center">
				<a id="Mensajes"></a>
			</td>
		</tr> <!-- trmunicipioMensajes -->
			</table> <!-- tblmunicipioAcciones -->
			<?php } ?>
			</form> <!-- frmMantenimientomunicipio -->
			</div> <!-- divMantenimientomunicipioAjaxWebPart -->
		</td>
	</tr> <!-- trmunicipioElementosFormulario/super -->
		<?php if(municipio_web::$STR_ES_RELACIONADO=='false' ) {?>

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
			
				import {municipio_webcontrol,municipio_webcontrol1} from './webroot/js/JavaScript/contabilidad/seguridad/municipio/js/webcontrol/municipio_form_webcontrol.js?random=1';
				
				municipio_webcontrol1.setmunicipio_constante(window.municipio_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(municipio_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

