<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\general\reporte_monica\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Reportes Monica Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/general/reporte_monica/util/reporte_monica_carga.php');
	use com\bydan\contabilidad\general\reporte_monica\util\reporte_monica_carga;
	
	//include_once('com/bydan/contabilidad/general/reporte_monica/presentation/view/reporte_monica_web.php');
	//use com\bydan\contabilidad\general\reporte_monica\presentation\view\reporte_monica_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	reporte_monica_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	reporte_monica_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$reporte_monica_web1= new reporte_monica_web();	
	$reporte_monica_web1->cargarDatosGenerales();
	
	//$moduloActual=$reporte_monica_web1->moduloActual;
	//$usuarioActual=$reporte_monica_web1->usuarioActual;
	//$sessionBase=$reporte_monica_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$reporte_monica_web1->parametroGeneralUsuarioActual;
	
	
		
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
		
		
			<script type="module" src="webroot/js/JavaScript/contabilidad/general/reporte_monica/js/util/reporte_monica_form_funcion.js?random=1"></script>
						
		
		
		<?php 
			
		
			reporte_monica_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					reporte_monica_web::$GET_POST=$_GET;
				} else {
					reporte_monica_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			reporte_monica_web::$STR_NOMBRE_PAGINA = 'reporte_monica_form_view.php';
			reporte_monica_web::$BIT_ES_PAGINA_PRINCIPAL = 'false';
			reporte_monica_web::$BIT_ES_PAGINA_FORM = 'true';
				
			reporte_monica_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {reporte_monica_constante,reporte_monica_constante1} from './webroot/js/JavaScript/contabilidad/general/reporte_monica/js/util/reporte_monica_constante.js?random=1';
			import {reporte_monica_funcion,reporte_monica_funcion1} from './webroot/js/JavaScript/contabilidad/general/reporte_monica/js/util/reporte_monica_funcion.js?random=1';
			
			let reporte_monica_constante2 = new reporte_monica_constante();
			
			reporte_monica_constante2.STR_NOMBRE_PAGINA="<?php echo(reporte_monica_web::$STR_NOMBRE_PAGINA); ?>";
			reporte_monica_constante2.STR_TYPE_ON_LOADreporte_monica="<?php echo(reporte_monica_web::$STR_TYPE_ONLOAD); ?>";
			reporte_monica_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(reporte_monica_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			reporte_monica_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(reporte_monica_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			reporte_monica_constante2.STR_ACTION="<?php echo(reporte_monica_web::$STR_ACTION); ?>";
			reporte_monica_constante2.STR_ES_POPUP="<?php echo(reporte_monica_web::$STR_ES_POPUP); ?>";
			reporte_monica_constante2.STR_ES_BUSQUEDA="<?php echo(reporte_monica_web::$STR_ES_BUSQUEDA); ?>";
			reporte_monica_constante2.STR_FUNCION_JS="<?php echo(reporte_monica_web::$STR_FUNCION_JS); ?>";
			reporte_monica_constante2.BIG_ID_ACTUAL="<?php echo(reporte_monica_web::$BIG_ID_ACTUAL); ?>";
			reporte_monica_constante2.BIG_ID_OPCION="<?php echo(reporte_monica_web::$BIG_ID_OPCION); ?>";
			reporte_monica_constante2.STR_OBJETO_JS="<?php echo(reporte_monica_web::$STR_OBJETO_JS); ?>";
			reporte_monica_constante2.STR_ES_RELACIONES="<?php echo(reporte_monica_web::$STR_ES_RELACIONES); ?>";
			reporte_monica_constante2.STR_ES_RELACIONADO="<?php echo(reporte_monica_web::$STR_ES_RELACIONADO); ?>";
			reporte_monica_constante2.STR_ES_SUB_PAGINA="<?php echo(reporte_monica_web::$STR_ES_SUB_PAGINA); ?>";
			reporte_monica_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(reporte_monica_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			reporte_monica_constante2.BIT_ES_PAGINA_FORM=<?php echo(reporte_monica_web::$BIT_ES_PAGINA_FORM); ?>;
			reporte_monica_constante2.STR_SUFIJO="<?php echo(reporte_monica_web::$STR_SUF); ?>";//reporte_monica
			reporte_monica_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(reporte_monica_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//reporte_monica
			
			reporte_monica_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(reporte_monica_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			reporte_monica_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($reporte_monica_web1->moduloActual->getnombre()); ?>";
			reporte_monica_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(reporte_monica_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			reporte_monica_constante2.BIT_ES_LOAD_NORMAL=true;
			/*reporte_monica_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			reporte_monica_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.reporte_monica_constante2 = reporte_monica_constante2;
			
		</script>
		
		<?php if(reporte_monica_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.reporte_monica_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.reporte_monica_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="reporte_monicaActual" ></a>
	
	<div id="divResumenreporte_monicaActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(reporte_monica_web::$STR_ES_RELACIONADO=='false') {?>
		
		<div id="header" >
		
			<div id="banner">
				<span id="spanTituloBanner" class="titulobanner"></span>
			</div> <!-- banner -->
					
			<div id="subheader" class="links">  
			
						
			</div> <!-- sub-header -->
			
			
		</div> <!-- header -->
		
		<?php } ?>
		
		<div id="main">
		

			<?php if(reporte_monica_web::$STR_ES_RELACIONADO=='false') {?>
			
			
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(reporte_monica_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(reporte_monica_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divreporte_monicaPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblreporte_monicaPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmreporte_monicaAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnreporte_monicaAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="reporte_monica_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnreporte_monicaAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmreporte_monicaAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblreporte_monicaPopupAjaxWebPart -->
		</div> <!-- divreporte_monicaPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->		
		
		
		
			
<tr id="trreporte_monicaElementosFormulario">
	<td>
		<div id="divMantenimientoreporte_monicaAjaxWebPart" title="REPORTES MONICA" style="height: 90%;width: 90%;position: relative;top: 30px;left: 30px;">
			<form id="frmMantenimientoreporte_monica" name="frmMantenimientoreporte_monica">

			</br>

			<?php if(reporte_monica_web::$STR_ES_RELACIONES=='false' ) {?>
			</br>
			<?php } ?>

			<!-- SECCION/TOOLBAR -->
			<table id="tblreporte_monicaToolBarFormularioExterior" style="width: 65%">
				<tr style="display:table-row">
					<td align="center">

						<table id="tblreporte_monicaToolBarFormulario" style="text-align: center"  style="display:table-row">
							<tr>
								<td id="tdreporte_monicaActualizarToolBar" style="visibility:visible">
									<img id="imgActualizarToolBarreporte_monica" name="imgActualizarToolBarreporte_monica" title="ACTUALIZAR Reportes Monica ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/actualizar.gif" width="25" height="25"/>
								</td>
								<td id="tdreporte_monicaEliminarToolBar" style="visibility:visible">
									<img id="imgEliminarToolBarreporte_monica" name="imgEliminarToolBarreporte_monica" title="ELIMINAR Reportes Monica ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/eliminar.gif" width="25" height="25"/>
								</td>
								<td id="tdreporte_monicaCancelarToolBar" style="visibility:visible">
									<img id="imgCancelarToolBarreporte_monica" name="imgCancelarToolBarreporte_monica" title="CANCELAR Reportes Monica ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/cancelar.gif" width="25" height="25"/>
								</td>
								<td id="tdreporte_monicaRelacionesToolBar" style="display:table-row">
									<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/xexpand.png" width="25" height="25" onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('tblCamposOcultosreporte_monica',this,'../')"/>
								</td>
							</tr>
						</table> <!-- tblreporte_monicaToolBarFormulario -->

					</td>
				</tr>
			</table> <!-- tblreporte_monicaToolBarFormularioExterior -->

			<table id="tblreporte_monicaElementos">
			<tr id="trreporte_monicaElementos" class="elementos" style="display:table-row">
			<td align="center">

			<a id="Campos"></a>

				<?php if(reporte_monica_web::$STR_ES_RELACIONES=='false' ) {?>
				<div id="divFlechaArribaElementos" align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
					<span></span>
				</div>
				<?php } ?>

				<!-- SECCION/FORMULARIO -->
				<table id="tblElementosreporte_monica" class="elementos" style="width: 300px; padding: 0px; border-spacing: 0px; border-collapse: collapse; text-align: center;">
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
						<td id="td_title-nombre" class="titulocampo">
							<label class="form-label">Nombre.(*)</label>
						</td>
						<td id="td_control-nombre" align="left" class="controlcampo">
							<input id="form-nombre" name="form-nombre" type="text" class="form-control"  placeholder="Nombre"  title="Nombre"    size="20"  maxlength="40"/>
							<span id="spanstrMensajenombre" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_5">
						<td id="td_title-descripcion" class="titulocampo">
							<label class="form-label">Descripcion.(*)</label>
						</td>
						<td id="td_control-descripcion" align="left" class="controlcampo">
							<textarea id="form-descripcion" name="form-descripcion" class="form-control"  placeholder="Descripcion"  title="Descripcion"   style="font-size: 13px;"  rows ="3" cols= "25"></textarea>
							<span id="spanstrMensajedescripcion" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_6">
						<td id="td_title-estado" class="titulocampo">
							<label class="form-label">Estado.(*)</label>
						</td>
						<td id="td_control-estado" align="left" class="controlcampo">
							<input id="form-estado" name="form-estado" type="text" class="form-control"  placeholder="Estado"  title="Estado"    maxlength="10" size="10" >
							<span id="spanstrMensajeestado" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_7">
						<td id="td_title-modulo" class="titulocampo">
							<label class="form-label">Modulo.(*)</label>
						</td>
						<td id="td_control-modulo" align="left" class="controlcampo">
							<input id="form-modulo" name="form-modulo" type="text" class="form-control"  placeholder="Modulo"  title="Modulo"    size="20"  maxlength="20"/>
							<span id="spanstrMensajemodulo" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_8">
						<td id="td_title-sub_modulo" class="titulocampo">
							<label class="form-label">Sub Modulo.(*)</label>
						</td>
						<td id="td_control-sub_modulo" align="left" class="controlcampo">
							<input id="form-sub_modulo" name="form-sub_modulo" type="text" class="form-control"  placeholder="Sub Modulo"  title="Sub Modulo"    size="20"  maxlength="40"/>
							<span id="spanstrMensajesub_modulo" class="mensajeerror"></span>
						</td>
					</tr>
				</table> <!-- tblElementosreporte_monica -->

				<!-- SECCION/OCULTOS -->
				<table id="tblCamposOcultosreporte_monica" class="elementos" style="display: table-row;">
					<caption class="busquedacabecera">
						<span>Campos Ocultos</span>
					</caption>
				</table> <!-- tblCamposOcultosreporte_monica -->

			</td></tr> <!-- trreporte_monicaElementos -->
			</table> <!-- tblreporte_monicaElementos -->
			</form> <!-- frmMantenimientoreporte_monica -->


			

				<form id="frmAccionesMantenimientoreporte_monica" name="frmAccionesMantenimientoreporte_monica">

			<?php if(reporte_monica_web::$STR_ES_BUSQUEDA=='false' ) {?>
			<table id="tblreporte_monicaAcciones" class="elementos" style="text-align: center">
		<tr id="trreporte_monicaAcciones" class="elementos" style="display:table-row">
			<td align="center">
				<a id="Acciones" ></a>

				<?php if(reporte_monica_web::$STR_ES_RELACIONES=='false' ) {?>
				<div align="right">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
				<?php } ?>

					<!-- SECCION/BOTONES -->
					<table id="tblAccionesMantenimientoreporte_monica" class="busqueda" style="width: 50%;text-align: center">

						<?php if(reporte_monica_web::$STR_ES_RELACIONES=='false' ) {?>
						<!--
						<caption class="busquedacabecera">
							<span>Acciones</span>
						</caption>
						-->
						<?php } ?>

						<tr id="trAccionesMantenimientoreporte_monicaBasicos">
							<td id="tdbtnNuevoreporte_monica" style="visibility:visible">
								<div id="divNuevoreporte_monica" style="display:table-row">
									<input type="button" id="btnNuevoreporte_monica" name="btnNuevoreporte_monica" value="NUEVO" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnActualizarreporte_monica" style="visibility:visible">
								<div id="divActualizarreporte_monica" style="display:table-row">
									<input type="button" id="btnActualizarreporte_monica" name="btnActualizarreporte_monica" title="ACTUALIZAR Reportes Monica ACTUAL" value="Actualizar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnEliminarreporte_monica" style="visibility:visible">
								<div id="divEliminarreporte_monica" style="display:table-row">
									<input type="button" id="btnEliminarreporte_monica" name="btnEliminarreporte_monica" title="ELIMINAR Reportes Monica ACTUAL" value="Eliminar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnImprimirreporte_monica" style="visibility:visible">
								<input type="button" id="btnImprimirreporte_monica" name="btnImprimirreporte_monica" title="IMPRIMIR PAGINA Reportes Monica ACTUAL" value="Imp. Datos" class="btn btn-primary"/>
							</td>
							<td id="tdbtnCancelarreporte_monica" style="visibility:visible">
								<input type="button" id="btnCancelarreporte_monica" name="btnCancelarreporte_monica" title="CANCELAR Reportes Monica ACTUAL" value="Cancelar" class="btn btn-primary"/>
							</td>
						</tr>
						<tr id="trAccionesMantenimientoreporte_monicaGuardar" style="display:none">
							<td id="tdbtnGuardarCambiosreporte_monica" colspan="4" align="center" style="visibility:visible">
								<div id="divGuardarCambiosreporte_monica" style="display:table-row">
									<input type="button" id="btnGuardarCambiosFormularioreporte_monica" name="btnGuardarCambiosFormularioreporte_monica" title="GUARDAR" value="GUADAR CAMBIOS" class="btn btn-primary"/>
								</div>
							</td>
						</tr>
					</table> <!-- tblAccionesMantenimientoreporte_monica -->
			</td>
		</tr> <!-- trreporte_monicaAcciones -->
		<?php if(reporte_monica_web::$STR_ES_RELACIONADO=='false' ) {?>
		<tr id="trreporte_monicaParametrosAcciones" class="impresion"  style="display:table-row">
			<td align="center">
				<!-- SECCION/POST -->
				<table id="tblreporte_monicaParametrosAcciones" style="text-align: center;border: 0px solid black;padding: 0px; border-spacing: 0px">
					<caption class="busquedacabecera" style="padding: 0px;caption-side: top;">
						<span>Acciones Extra/Post</span>
					</caption>
					<tr id="trreporte_monicaFilaParametrosAcciones">
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
				</table> <!-- tblreporte_monicaParametrosAcciones -->
			</td>
		</tr> <!-- trreporte_monicaParametrosAcciones -->
		<?php }?>
		<tr id="trreporte_monicaMensajes" class="mensajes">
			<td align="center">
				<a id="Mensajes"></a>
			</td>
		</tr> <!-- trreporte_monicaMensajes -->
			</table> <!-- tblreporte_monicaAcciones -->
			<?php } ?>
			</form> <!-- frmMantenimientoreporte_monica -->
			</div> <!-- divMantenimientoreporte_monicaAjaxWebPart -->
		</td>
	</tr> <!-- trreporte_monicaElementosFormulario/super -->
		<?php if(reporte_monica_web::$STR_ES_RELACIONADO=='false' ) {?>

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
			
				import {reporte_monica_webcontrol,reporte_monica_webcontrol1} from './webroot/js/JavaScript/contabilidad/general/reporte_monica/js/webcontrol/reporte_monica_form_webcontrol.js?random=1';
				
				reporte_monica_webcontrol1.setreporte_monica_constante(window.reporte_monica_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(reporte_monica_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

