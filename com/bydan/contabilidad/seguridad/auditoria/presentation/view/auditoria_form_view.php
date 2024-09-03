<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\seguridad\auditoria\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Auditoria Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/seguridad/auditoria/util/auditoria_carga.php');
	use com\bydan\contabilidad\seguridad\auditoria\util\auditoria_carga;
	
	//include_once('com/bydan/contabilidad/seguridad/auditoria/presentation/view/auditoria_web.php');
	//use com\bydan\contabilidad\seguridad\auditoria\presentation\view\auditoria_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	auditoria_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	auditoria_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$auditoria_web1= new auditoria_web();	
	$auditoria_web1->cargarDatosGenerales();
	
	//$moduloActual=$auditoria_web1->moduloActual;
	//$usuarioActual=$auditoria_web1->usuarioActual;
	//$sessionBase=$auditoria_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$auditoria_web1->parametroGeneralUsuarioActual;
	
	
		
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
		
		
			<script type="module" src="webroot/js/JavaScript/contabilidad/seguridad/auditoria/js/util/auditoria_form_funcion.js?random=1"></script>
						
		
		
		<?php 
			
		
			auditoria_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					auditoria_web::$GET_POST=$_GET;
				} else {
					auditoria_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			auditoria_web::$STR_NOMBRE_PAGINA = 'auditoria_form_view.php';
			auditoria_web::$BIT_ES_PAGINA_PRINCIPAL = 'false';
			auditoria_web::$BIT_ES_PAGINA_FORM = 'true';
				
			auditoria_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {auditoria_constante,auditoria_constante1} from './webroot/js/JavaScript/contabilidad/seguridad/auditoria/js/util/auditoria_constante.js?random=1';
			import {auditoria_funcion,auditoria_funcion1} from './webroot/js/JavaScript/contabilidad/seguridad/auditoria/js/util/auditoria_funcion.js?random=1';
			
			let auditoria_constante2 = new auditoria_constante();
			
			auditoria_constante2.STR_NOMBRE_PAGINA="<?php echo(auditoria_web::$STR_NOMBRE_PAGINA); ?>";
			auditoria_constante2.STR_TYPE_ON_LOADauditoria="<?php echo(auditoria_web::$STR_TYPE_ONLOAD); ?>";
			auditoria_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(auditoria_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			auditoria_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(auditoria_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			auditoria_constante2.STR_ACTION="<?php echo(auditoria_web::$STR_ACTION); ?>";
			auditoria_constante2.STR_ES_POPUP="<?php echo(auditoria_web::$STR_ES_POPUP); ?>";
			auditoria_constante2.STR_ES_BUSQUEDA="<?php echo(auditoria_web::$STR_ES_BUSQUEDA); ?>";
			auditoria_constante2.STR_FUNCION_JS="<?php echo(auditoria_web::$STR_FUNCION_JS); ?>";
			auditoria_constante2.BIG_ID_ACTUAL="<?php echo(auditoria_web::$BIG_ID_ACTUAL); ?>";
			auditoria_constante2.BIG_ID_OPCION="<?php echo(auditoria_web::$BIG_ID_OPCION); ?>";
			auditoria_constante2.STR_OBJETO_JS="<?php echo(auditoria_web::$STR_OBJETO_JS); ?>";
			auditoria_constante2.STR_ES_RELACIONES="<?php echo(auditoria_web::$STR_ES_RELACIONES); ?>";
			auditoria_constante2.STR_ES_RELACIONADO="<?php echo(auditoria_web::$STR_ES_RELACIONADO); ?>";
			auditoria_constante2.STR_ES_SUB_PAGINA="<?php echo(auditoria_web::$STR_ES_SUB_PAGINA); ?>";
			auditoria_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(auditoria_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			auditoria_constante2.BIT_ES_PAGINA_FORM=<?php echo(auditoria_web::$BIT_ES_PAGINA_FORM); ?>;
			auditoria_constante2.STR_SUFIJO="<?php echo(auditoria_web::$STR_SUF); ?>";//auditoria
			auditoria_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(auditoria_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//auditoria
			
			auditoria_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(auditoria_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			auditoria_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($auditoria_web1->moduloActual->getnombre()); ?>";
			auditoria_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(auditoria_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			auditoria_constante2.BIT_ES_LOAD_NORMAL=true;
			/*auditoria_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			auditoria_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.auditoria_constante2 = auditoria_constante2;
			
		</script>
		
		<?php if(auditoria_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.auditoria_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.auditoria_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="auditoriaActual" ></a>
	
	<div id="divResumenauditoriaActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(auditoria_web::$STR_ES_RELACIONADO=='false') {?>
		
		<div id="header" >
		
			<div id="banner">
				<span id="spanTituloBanner" class="titulobanner"></span>
			</div> <!-- banner -->
					
			<div id="subheader" class="links">  
			
						
			</div> <!-- sub-header -->
			
			
		</div> <!-- header -->
		
		<?php } ?>
		
		<div id="main">
		

			<?php if(auditoria_web::$STR_ES_RELACIONADO=='false') {?>
			
			
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(auditoria_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(auditoria_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divauditoriaPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblauditoriaPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmauditoriaAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnauditoriaAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="auditoria_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnauditoriaAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmauditoriaAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblauditoriaPopupAjaxWebPart -->
		</div> <!-- divauditoriaPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->		
		
		
		
			
<tr id="trauditoriaElementosFormulario">
	<td>
		<div id="divMantenimientoauditoriaAjaxWebPart" title="AUDITORIA" style="height: 90%;width: 90%;position: relative;top: 30px;left: 30px;">
			<form id="frmMantenimientoauditoria" name="frmMantenimientoauditoria">

			</br>

			<?php if(auditoria_web::$STR_ES_RELACIONES=='false' ) {?>
			</br>
			<?php } ?>

			<!-- SECCION/TOOLBAR -->
			<table id="tblauditoriaToolBarFormularioExterior" style="width: 65%">
				<tr style="display:table-row">
					<td align="center">

						<table id="tblauditoriaToolBarFormulario" style="text-align: center"  style="display:table-row">
							<tr>
								<td id="tdauditoriaActualizarToolBar" style="visibility:visible">
									<img id="imgActualizarToolBarauditoria" name="imgActualizarToolBarauditoria" title="ACTUALIZAR Auditoria ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/actualizar.gif" width="25" height="25"/>
								</td>
								<td id="tdauditoriaEliminarToolBar" style="visibility:visible">
									<img id="imgEliminarToolBarauditoria" name="imgEliminarToolBarauditoria" title="ELIMINAR Auditoria ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/eliminar.gif" width="25" height="25"/>
								</td>
								<td id="tdauditoriaCancelarToolBar" style="visibility:visible">
									<img id="imgCancelarToolBarauditoria" name="imgCancelarToolBarauditoria" title="CANCELAR Auditoria ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/cancelar.gif" width="25" height="25"/>
								</td>
								<td id="tdauditoriaRelacionesToolBar" style="display:table-row">
									<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/xexpand.png" width="25" height="25" onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('tblCamposOcultosauditoria',this,'../')"/>
								</td>
							</tr>
						</table> <!-- tblauditoriaToolBarFormulario -->

					</td>
				</tr>
			</table> <!-- tblauditoriaToolBarFormularioExterior -->

			<table id="tblauditoriaElementos">
			<tr id="trauditoriaElementos" class="elementos" style="display:table-row">
			<td align="center">

			<a id="Campos"></a>

				<?php if(auditoria_web::$STR_ES_RELACIONES=='false' ) {?>
				<div id="divFlechaArribaElementos" align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
					<span></span>
				</div>
				<?php } ?>

				<!-- SECCION/FORMULARIO -->
				<table id="tblElementosauditoria" class="elementos" style="width: 300px; padding: 0px; border-spacing: 0px; border-collapse: collapse; text-align: left;">
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
						<td id="td_title-nombre_tabla" class="titulocampo">
							<label class="form-label">Nombre De La Tabla.(*)</label>
						</td>
						<td id="td_control-nombre_tabla" align="left" class="controlcampo">
							<textarea id="form-nombre_tabla" name="form-nombre_tabla" class="form-control"  placeholder="Nombre De La Tabla"  title="Nombre De La Tabla"   style="font-size: 13px;" rows="3" cols="25" size="20" ></textarea>
							<span id="spanstrMensajenombre_tabla" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_5">
						<td id="td_title-id_fila" class="titulocampo">
							<label class="form-label">Fila.(*)</label>
						</td>
						<td id="td_control-id_fila" align="left" class="controlcampo">
							<input id="form-id_fila" name="form-id_fila" type="text" class="form-control"  placeholder="Fila"  title="Fila"    maxlength="19" size="10" >
							<span id="spanstrMensajeid_fila" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_6">
						<td id="td_title-accion" class="titulocampo">
							<label class="form-label">Accion.(*)</label>
						</td>
						<td id="td_control-accion" align="left" class="controlcampo">
							<input id="form-accion" name="form-accion" type="text" class="form-control"  placeholder="Accion"  title="Accion"    size="15"  maxlength="15"/>
							<span id="spanstrMensajeaccion" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_7">
						<td id="td_title-proceso" class="titulocampo">
							<label class="form-label">Proceso.(*)</label>
						</td>
						<td id="td_control-proceso" align="left" class="controlcampo">
							<textarea id="form-proceso" name="form-proceso" class="form-control"  placeholder="Proceso"  title="Proceso"   style="font-size: 13px;" rows="3" cols="25" size="20" ></textarea>
							<span id="spanstrMensajeproceso" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_8">
						<td id="td_title-nombre_pc" class="titulocampo">
							<label class="form-label">Nombre De Pc.(*)</label>
						</td>
						<td id="td_control-nombre_pc" align="left" class="controlcampo">
							<input id="form-nombre_pc" name="form-nombre_pc" type="text" class="form-control"  placeholder="Nombre De Pc"  title="Nombre De Pc"    size="20"  maxlength="50"/>
							<span id="spanstrMensajenombre_pc" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_9">
						<td id="td_title-ip_pc" class="titulocampo">
							<label class="form-label">Ip Del Pc.(*)</label>
						</td>
						<td id="td_control-ip_pc" align="left" class="controlcampo">
							<input id="form-ip_pc" name="form-ip_pc" type="text" class="form-control"  placeholder="Ip Del Pc"  title="Ip Del Pc"    size="20"  maxlength="20"/>
							<span id="spanstrMensajeip_pc" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_10">
						<td id="td_title-usuario_pc" class="titulocampo">
							<label class="form-label">Usuario Del Pc.(*)</label>
						</td>
						<td id="td_control-usuario_pc" align="left" class="controlcampo">
							<input id="form-usuario_pc" name="form-usuario_pc" type="text" class="form-control"  placeholder="Usuario Del Pc"  title="Usuario Del Pc"    size="20"  maxlength="50"/>
							<span id="spanstrMensajeusuario_pc" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_11">
						<td id="td_title-fecha_hora" class="titulocampo">
							<label class="form-label">Fecha Y Hora.(*)</label>
						</td>
						<td id="td_control-fecha_hora" align="left" class="controlcampo">
							<input id="form-fecha_hora" name="form-fecha_hora" type="text" class="form-control"  placeholder="Fecha Y Hora"  title="Fecha Y Hora"    size="10" >
							<span id="spanstrMensajefecha_hora" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_12">
						<td id="td_title-observacion" class="titulocampo">
							<label class="form-label">Observacion.(*)</label>
						</td>
						<td id="td_control-observacion" align="left" class="controlcampo">
							<textarea id="form-observacion" name="form-observacion" class="form-control"  placeholder="Observacion"  title="Observacion"   style="font-size: 13px;"  rows ="3" cols= "25"></textarea>
							<span id="spanstrMensajeobservacion" class="mensajeerror"></span>
						</td>
					</tr>
				</table> <!-- tblElementosauditoria -->

				<!-- SECCION/OCULTOS -->
				<table id="tblCamposOcultosauditoria" class="elementos" style="display: table-row;">
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
					
				</table> <!-- tblCamposOcultosauditoria -->

			</td></tr> <!-- trauditoriaElementos -->
			</table> <!-- tblauditoriaElementos -->
			</form> <!-- frmMantenimientoauditoria -->


			

				<form id="frmAccionesMantenimientoauditoria" name="frmAccionesMantenimientoauditoria">

			<?php if(auditoria_web::$STR_ES_BUSQUEDA=='false' ) {?>
			<table id="tblauditoriaAcciones" class="elementos" style="text-align: center">
		<tr id="trauditoriaAcciones" class="elementos" style="display:table-row">
			<td align="center">
				<a id="Acciones" ></a>

				<?php if(auditoria_web::$STR_ES_RELACIONES=='false' ) {?>
				<div align="right">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
				<?php } ?>

					<!-- SECCION/BOTONES -->
					<table id="tblAccionesMantenimientoauditoria" class="busqueda" style="width: 50%;text-align: left">

						<?php if(auditoria_web::$STR_ES_RELACIONES=='false' ) {?>
						<!--
						<caption class="busquedacabecera">
							<span>Acciones</span>
						</caption>
						-->
						<?php } ?>

						<tr id="trAccionesMantenimientoauditoriaBasicos">
							<td id="tdbtnNuevoauditoria" style="visibility:visible">
								<div id="divNuevoauditoria" style="display:table-row">
									<input type="button" id="btnNuevoauditoria" name="btnNuevoauditoria" value="NUEVO" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnActualizarauditoria" style="visibility:visible">
								<div id="divActualizarauditoria" style="display:table-row">
									<input type="button" id="btnActualizarauditoria" name="btnActualizarauditoria" title="ACTUALIZAR Auditoria ACTUAL" value="Actualizar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnEliminarauditoria" style="visibility:visible">
								<div id="divEliminarauditoria" style="display:table-row">
									<input type="button" id="btnEliminarauditoria" name="btnEliminarauditoria" title="ELIMINAR Auditoria ACTUAL" value="Eliminar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnImprimirauditoria" style="visibility:visible">
								<input type="button" id="btnImprimirauditoria" name="btnImprimirauditoria" title="IMPRIMIR PAGINA Auditoria ACTUAL" value="Imp. Datos" class="btn btn-primary"/>
							</td>
							<td id="tdbtnCancelarauditoria" style="visibility:visible">
								<input type="button" id="btnCancelarauditoria" name="btnCancelarauditoria" title="CANCELAR Auditoria ACTUAL" value="Cancelar" class="btn btn-primary"/>
							</td>
						</tr>
						<tr id="trAccionesMantenimientoauditoriaGuardar" style="display:none">
							<td id="tdbtnGuardarCambiosauditoria" colspan="4" align="center" style="visibility:visible">
								<div id="divGuardarCambiosauditoria" style="display:table-row">
									<input type="button" id="btnGuardarCambiosFormularioauditoria" name="btnGuardarCambiosFormularioauditoria" title="GUARDAR" value="GUADAR CAMBIOS" class="btn btn-primary"/>
								</div>
							</td>
						</tr>
					</table> <!-- tblAccionesMantenimientoauditoria -->
			</td>
		</tr> <!-- trauditoriaAcciones -->
		<?php if(auditoria_web::$STR_ES_RELACIONADO=='false' ) {?>
		<tr id="trauditoriaParametrosAcciones" class="impresion"  style="display:table-row">
			<td align="center">
				<!-- SECCION/POST -->
				<table id="tblauditoriaParametrosAcciones" style="text-align: center;border: 0px solid black;padding: 0px; border-spacing: 0px">
					<caption class="busquedacabecera" style="padding: 0px;caption-side: top;">
						<span>Acciones Extra/Post</span>
					</caption>
					<tr id="trauditoriaFilaParametrosAcciones">
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
				</table> <!-- tblauditoriaParametrosAcciones -->
			</td>
		</tr> <!-- trauditoriaParametrosAcciones -->
		<?php }?>
		<tr id="trauditoriaMensajes" class="mensajes">
			<td align="center">
				<a id="Mensajes"></a>
			</td>
		</tr> <!-- trauditoriaMensajes -->
			</table> <!-- tblauditoriaAcciones -->
			<?php } ?>
			</form> <!-- frmMantenimientoauditoria -->
			</div> <!-- divMantenimientoauditoriaAjaxWebPart -->
		</td>
	</tr> <!-- trauditoriaElementosFormulario/super -->
		<?php if(auditoria_web::$STR_ES_RELACIONADO=='false' ) {?>

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
			
				import {auditoria_webcontrol,auditoria_webcontrol1} from './webroot/js/JavaScript/contabilidad/seguridad/auditoria/js/webcontrol/auditoria_form_webcontrol.js?random=1';
				
				auditoria_webcontrol1.setauditoria_constante(window.auditoria_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(auditoria_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

