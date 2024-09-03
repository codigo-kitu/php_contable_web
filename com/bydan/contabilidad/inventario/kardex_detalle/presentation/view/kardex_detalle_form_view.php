<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\inventario\kardex_detalle\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Detalle Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/inventario/kardex_detalle/util/kardex_detalle_carga.php');
	use com\bydan\contabilidad\inventario\kardex_detalle\util\kardex_detalle_carga;
	
	//include_once('com/bydan/contabilidad/inventario/kardex_detalle/presentation/view/kardex_detalle_web.php');
	//use com\bydan\contabilidad\inventario\kardex_detalle\presentation\view\kardex_detalle_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	kardex_detalle_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	kardex_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$kardex_detalle_web1= new kardex_detalle_web();	
	$kardex_detalle_web1->cargarDatosGenerales();
	
	//$moduloActual=$kardex_detalle_web1->moduloActual;
	//$usuarioActual=$kardex_detalle_web1->usuarioActual;
	//$sessionBase=$kardex_detalle_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$kardex_detalle_web1->parametroGeneralUsuarioActual;
	
	
		
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
		
		
			<script type="module" src="webroot/js/JavaScript/contabilidad/inventario/kardex_detalle/js/util/kardex_detalle_form_funcion.js?random=1"></script>
						
		
		
		<?php 
			
		
			kardex_detalle_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					kardex_detalle_web::$GET_POST=$_GET;
				} else {
					kardex_detalle_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			kardex_detalle_web::$STR_NOMBRE_PAGINA = 'kardex_detalle_form_view.php';
			kardex_detalle_web::$BIT_ES_PAGINA_PRINCIPAL = 'false';
			kardex_detalle_web::$BIT_ES_PAGINA_FORM = 'true';
				
			kardex_detalle_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {kardex_detalle_constante,kardex_detalle_constante1} from './webroot/js/JavaScript/contabilidad/inventario/kardex_detalle/js/util/kardex_detalle_constante.js?random=1';
			import {kardex_detalle_funcion,kardex_detalle_funcion1} from './webroot/js/JavaScript/contabilidad/inventario/kardex_detalle/js/util/kardex_detalle_funcion.js?random=1';
			
			let kardex_detalle_constante2 = new kardex_detalle_constante();
			
			kardex_detalle_constante2.STR_NOMBRE_PAGINA="<?php echo(kardex_detalle_web::$STR_NOMBRE_PAGINA); ?>";
			kardex_detalle_constante2.STR_TYPE_ON_LOADkardex_detalle="<?php echo(kardex_detalle_web::$STR_TYPE_ONLOAD); ?>";
			kardex_detalle_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(kardex_detalle_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			kardex_detalle_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(kardex_detalle_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			kardex_detalle_constante2.STR_ACTION="<?php echo(kardex_detalle_web::$STR_ACTION); ?>";
			kardex_detalle_constante2.STR_ES_POPUP="<?php echo(kardex_detalle_web::$STR_ES_POPUP); ?>";
			kardex_detalle_constante2.STR_ES_BUSQUEDA="<?php echo(kardex_detalle_web::$STR_ES_BUSQUEDA); ?>";
			kardex_detalle_constante2.STR_FUNCION_JS="<?php echo(kardex_detalle_web::$STR_FUNCION_JS); ?>";
			kardex_detalle_constante2.BIG_ID_ACTUAL="<?php echo(kardex_detalle_web::$BIG_ID_ACTUAL); ?>";
			kardex_detalle_constante2.BIG_ID_OPCION="<?php echo(kardex_detalle_web::$BIG_ID_OPCION); ?>";
			kardex_detalle_constante2.STR_OBJETO_JS="<?php echo(kardex_detalle_web::$STR_OBJETO_JS); ?>";
			kardex_detalle_constante2.STR_ES_RELACIONES="<?php echo(kardex_detalle_web::$STR_ES_RELACIONES); ?>";
			kardex_detalle_constante2.STR_ES_RELACIONADO="<?php echo(kardex_detalle_web::$STR_ES_RELACIONADO); ?>";
			kardex_detalle_constante2.STR_ES_SUB_PAGINA="<?php echo(kardex_detalle_web::$STR_ES_SUB_PAGINA); ?>";
			kardex_detalle_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(kardex_detalle_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			kardex_detalle_constante2.BIT_ES_PAGINA_FORM=<?php echo(kardex_detalle_web::$BIT_ES_PAGINA_FORM); ?>;
			kardex_detalle_constante2.STR_SUFIJO="<?php echo(kardex_detalle_web::$STR_SUF); ?>";//kardex_detalle
			kardex_detalle_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(kardex_detalle_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//kardex_detalle
			
			kardex_detalle_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(kardex_detalle_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			kardex_detalle_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($kardex_detalle_web1->moduloActual->getnombre()); ?>";
			kardex_detalle_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(kardex_detalle_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			kardex_detalle_constante2.BIT_ES_LOAD_NORMAL=true;
			/*kardex_detalle_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			kardex_detalle_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.kardex_detalle_constante2 = kardex_detalle_constante2;
			
		</script>
		
		<?php if(kardex_detalle_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.kardex_detalle_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.kardex_detalle_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="kardex_detalleActual" ></a>
	
	<div id="divResumenkardex_detalleActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(kardex_detalle_web::$STR_ES_RELACIONADO=='false') {?>
		
		<div id="header" >
		
			<div id="banner">
				<span id="spanTituloBanner" class="titulobanner"></span>
			</div> <!-- banner -->
					
			<div id="subheader" class="links">  
			
						
			</div> <!-- sub-header -->
			
			
		</div> <!-- header -->
		
		<?php } ?>
		
		<div id="main">
		

			<?php if(kardex_detalle_web::$STR_ES_RELACIONADO=='false') {?>
			
			
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(kardex_detalle_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(kardex_detalle_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divkardex_detallePopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblkardex_detallePopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmkardex_detalleAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnkardex_detalleAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="kardex_detalle_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnkardex_detalleAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmkardex_detalleAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblkardex_detallePopupAjaxWebPart -->
		</div> <!-- divkardex_detallePopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->		
		
		
		
			
<tr id="trkardex_detalleElementosFormulario">
	<td>
		<div id="divMantenimientokardex_detalleAjaxWebPart" title="DETALLE" style="height: 90%;width: 90%;position: relative;top: 30px;left: 30px;">
			<form id="frmMantenimientokardex_detalle" name="frmMantenimientokardex_detalle">

			</br>

			<?php if(kardex_detalle_web::$STR_ES_RELACIONES=='false' ) {?>
			</br>
			<?php } ?>

			<!-- SECCION/TOOLBAR -->
			<table id="tblkardex_detalleToolBarFormularioExterior" style="width: 65%">
				<tr style="display:table-row">
					<td align="center">

						<table id="tblkardex_detalleToolBarFormulario" style="text-align: center"  style="display:table-row">
							<tr>
								<td id="tdkardex_detalleActualizarToolBar" style="visibility:visible">
									<img id="imgActualizarToolBarkardex_detalle" name="imgActualizarToolBarkardex_detalle" title="ACTUALIZAR Detalle ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/actualizar.gif" width="25" height="25"/>
								</td>
								<td id="tdkardex_detalleEliminarToolBar" style="visibility:visible">
									<img id="imgEliminarToolBarkardex_detalle" name="imgEliminarToolBarkardex_detalle" title="ELIMINAR Detalle ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/eliminar.gif" width="25" height="25"/>
								</td>
								<td id="tdkardex_detalleCancelarToolBar" style="visibility:visible">
									<img id="imgCancelarToolBarkardex_detalle" name="imgCancelarToolBarkardex_detalle" title="CANCELAR Detalle ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/cancelar.gif" width="25" height="25"/>
								</td>
								<td id="tdkardex_detalleRelacionesToolBar" style="display:table-row">
									<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/xexpand.png" width="25" height="25" onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('tblCamposOcultoskardex_detalle',this,'../')"/>
								</td>
							</tr>
						</table> <!-- tblkardex_detalleToolBarFormulario -->

					</td>
				</tr>
			</table> <!-- tblkardex_detalleToolBarFormularioExterior -->

			<table id="tblkardex_detalleElementos">
			<tr id="trkardex_detalleElementos" class="elementos" style="display:table-row">
			<td align="center">

			<a id="Campos"></a>

				<?php if(kardex_detalle_web::$STR_ES_RELACIONES=='false' ) {?>
				<div id="divFlechaArribaElementos" align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
					<span></span>
				</div>
				<?php } ?>

				<!-- SECCION/FORMULARIO -->
				<table id="tblElementoskardex_detalle" class="elementos" style="width: 350px; padding: 0px; border-spacing: 0px; border-collapse: collapse; text-align: left;">
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
						<td id="td_title-id_kardex" class="titulocampo">
							<label class="form-label">Kardex</label>
						</td>
						<td id="td_control-id_kardex" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_kardex" name="form-id_kardex" title="Kardex" ></select></td>
									<td><a><img id="form-id_kardex_img" name="form-id_kardex_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_kardex_img_busqueda" name="form-id_kardex_img_busqueda" title="Buscar Kardex" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_kardex" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_5">
						<td id="td_title-numero_item" class="titulocampo">
							<label class="form-label">No. Item.(*)</label>
						</td>
						<td id="td_control-numero_item" align="left" class="controlcampo">
							<input id="form-numero_item" name="form-numero_item" type="text" class="form-control"  placeholder="No. Item"  title="No. Item"    maxlength="10" size="10" >
							<span id="spanstrMensajenumero_item" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_6">
						<td id="td_title-id_bodega" class="titulocampo">
							<label class="form-label">Bodega.(*)</label>
						</td>
						<td id="td_control-id_bodega" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_bodega" name="form-id_bodega" title="Bodega" ></select></td>
									<td><a><img id="form-id_bodega_img" name="form-id_bodega_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_bodega_img_busqueda" name="form-id_bodega_img_busqueda" title="Buscar Bodega" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_bodega" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_7">
						<td id="td_title-id_producto" class="titulocampo">
							<label class="form-label">Producto.(*)</label>
						</td>
						<td id="td_control-id_producto" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_producto" name="form-id_producto" title="Producto" ></select></td>
									<td><a><img id="form-id_producto_img" name="form-id_producto_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_producto_img_busqueda" name="form-id_producto_img_busqueda" title="Buscar Producto" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_producto" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_8">
						<td id="td_title-id_unidad" class="titulocampo">
							<label class="form-label">Unidad.(*)</label>
						</td>
						<td id="td_control-id_unidad" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_unidad" name="form-id_unidad" title="Unidad" ></select></td>
									<td><a><img id="form-id_unidad_img" name="form-id_unidad_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_unidad_img_busqueda" name="form-id_unidad_img_busqueda" title="Buscar Unidad" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_unidad" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_9">
						<td id="td_title-cantidad" class="titulocampo">
							<label class="form-label">Cantidad.(*)</label>
						</td>
						<td id="td_control-cantidad" align="left" class="controlcampo">
							<input id="form-cantidad" name="form-cantidad" type="text" class="form-control"  placeholder="Cantidad"  title="Cantidad"    maxlength="18" size="12" >
							<span id="spanstrMensajecantidad" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_10">
						<td id="td_title-costo" class="titulocampo">
							<label class="form-label">Costo.(*)</label>
						</td>
						<td id="td_control-costo" align="left" class="controlcampo">
							<input id="form-costo" name="form-costo" type="text" class="form-control"  placeholder="Costo"  title="Costo"    maxlength="18" size="12" >
							<span id="spanstrMensajecosto" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_11">
						<td id="td_title-total" class="titulocampo">
							<label class="form-label">Total.(*)</label>
						</td>
						<td id="td_control-total" align="left" class="controlcampo">
							<input id="form-total" name="form-total" type="text" class="form-control"  placeholder="Total"  title="Total"    maxlength="18" size="12" >
							<span id="spanstrMensajetotal" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_12">
						<td id="td_title-id_lote_producto" class="titulocampo">
							<label class="form-label">Lote</label>
						</td>
						<td id="td_control-id_lote_producto" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_lote_producto" name="form-id_lote_producto" title="Lote" ></select></td>
									<td><a><img id="form-id_lote_producto_img" name="form-id_lote_producto_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_lote_producto_img_busqueda" name="form-id_lote_producto_img_busqueda" title="Buscar Lotes Producto" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_lote_producto" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_13">
						<td id="td_title-descripcion" class="titulocampo">
							<label class="form-label">Descripcion</label>
						</td>
						<td id="td_control-descripcion" align="left" class="controlcampo">
							<textarea id="form-descripcion" name="form-descripcion" class="form-control"  placeholder="Descripcion"  title="Descripcion"   style="font-size: 13px;"  rows ="3" cols= "25"></textarea>
							<span id="spanstrMensajedescripcion" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_14">
						<td id="td_title-cantidad_disponible" class="titulocampo">
							<label class="form-label">Cantidad Disponible.(*)</label>
						</td>
						<td id="td_control-cantidad_disponible" align="left" class="controlcampo">
							<input id="form-cantidad_disponible" name="form-cantidad_disponible" type="text" class="form-control"  placeholder="Cantidad Disponible"  title="Cantidad Disponible"    maxlength="18" size="12" >
							<span id="spanstrMensajecantidad_disponible" class="mensajeerror"></span>
						</td>
					</tr>
				</table> <!-- tblElementoskardex_detalle -->

				<!-- SECCION/OCULTOS -->
				<table id="tblCamposOcultoskardex_detalle" class="elementos" style="display: table-row;">
					<caption class="busquedacabecera">
						<span>Campos Ocultos</span>
					</caption>
					
						<td id="td_title-cantidad_disponible_total" class="titulocampo">
							<label class="form-label">Cantidad Disponible Total.(*)</label>
						</td>
						<td id="td_control-cantidad_disponible_total" align="left" class="controlcampo">
							<input id="form-cantidad_disponible_total" name="form-cantidad_disponible_total" type="text" class="form-control"  placeholder="Cantidad Disponible Total"  title="Cantidad Disponible Total"    maxlength="18" size="12" >
							<span id="spanstrMensajecantidad_disponible_total" class="mensajeerror"></span>
						</td>
					
					<tr id="tr_fila_1">
						<td id="td_title-costo_anterior" class="titulocampo">
							<label class="form-label">Costo Anterior.(*)</label>
						</td>
						<td id="td_control-costo_anterior" align="left" class="controlcampo">
							<input id="form-costo_anterior" name="form-costo_anterior" type="text" class="form-control"  placeholder="Costo Anterior"  title="Costo Anterior"    maxlength="18" size="12" >
							<span id="spanstrMensajecosto_anterior" class="mensajeerror"></span>
						</td>
					</tr>
				</table> <!-- tblCamposOcultoskardex_detalle -->

			</td></tr> <!-- trkardex_detalleElementos -->
			</table> <!-- tblkardex_detalleElementos -->
			</form> <!-- frmMantenimientokardex_detalle -->


			

				<form id="frmAccionesMantenimientokardex_detalle" name="frmAccionesMantenimientokardex_detalle">

			<?php if(kardex_detalle_web::$STR_ES_BUSQUEDA=='false' ) {?>
			<table id="tblkardex_detalleAcciones" class="elementos" style="text-align: center">
		<tr id="trkardex_detalleAcciones" class="elementos" style="display:table-row">
			<td align="center">
				<a id="Acciones" ></a>

				<?php if(kardex_detalle_web::$STR_ES_RELACIONES=='false' ) {?>
				<div align="right">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
				<?php } ?>

					<!-- SECCION/BOTONES -->
					<table id="tblAccionesMantenimientokardex_detalle" class="busqueda" style="width: 50%;text-align: left">

						<?php if(kardex_detalle_web::$STR_ES_RELACIONES=='false' ) {?>
						<!--
						<caption class="busquedacabecera">
							<span>Acciones</span>
						</caption>
						-->
						<?php } ?>

						<tr id="trAccionesMantenimientokardex_detalleBasicos">
							<td id="tdbtnNuevokardex_detalle" style="visibility:visible">
								<div id="divNuevokardex_detalle" style="display:table-row">
									<input type="button" id="btnNuevokardex_detalle" name="btnNuevokardex_detalle" value="NUEVO" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnActualizarkardex_detalle" style="visibility:visible">
								<div id="divActualizarkardex_detalle" style="display:table-row">
									<input type="button" id="btnActualizarkardex_detalle" name="btnActualizarkardex_detalle" title="ACTUALIZAR Detalle ACTUAL" value="Actualizar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnEliminarkardex_detalle" style="visibility:visible">
								<div id="divEliminarkardex_detalle" style="display:table-row">
									<input type="button" id="btnEliminarkardex_detalle" name="btnEliminarkardex_detalle" title="ELIMINAR Detalle ACTUAL" value="Eliminar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnImprimirkardex_detalle" style="visibility:visible">
								<input type="button" id="btnImprimirkardex_detalle" name="btnImprimirkardex_detalle" title="IMPRIMIR PAGINA Detalle ACTUAL" value="Imp. Datos" class="btn btn-primary"/>
							</td>
							<td id="tdbtnCancelarkardex_detalle" style="visibility:visible">
								<input type="button" id="btnCancelarkardex_detalle" name="btnCancelarkardex_detalle" title="CANCELAR Detalle ACTUAL" value="Cancelar" class="btn btn-primary"/>
							</td>
						</tr>
						<tr id="trAccionesMantenimientokardex_detalleGuardar" style="display:none">
							<td id="tdbtnGuardarCambioskardex_detalle" colspan="4" align="center" style="visibility:visible">
								<div id="divGuardarCambioskardex_detalle" style="display:table-row">
									<input type="button" id="btnGuardarCambiosFormulariokardex_detalle" name="btnGuardarCambiosFormulariokardex_detalle" title="GUARDAR" value="GUADAR CAMBIOS" class="btn btn-primary"/>
								</div>
							</td>
						</tr>
					</table> <!-- tblAccionesMantenimientokardex_detalle -->
			</td>
		</tr> <!-- trkardex_detalleAcciones -->
		<?php if(kardex_detalle_web::$STR_ES_RELACIONADO=='false' ) {?>
		<tr id="trkardex_detalleParametrosAcciones" class="impresion"  style="display:table-row">
			<td align="center">
				<!-- SECCION/POST -->
				<table id="tblkardex_detalleParametrosAcciones" style="text-align: center;border: 0px solid black;padding: 0px; border-spacing: 0px">
					<caption class="busquedacabecera" style="padding: 0px;caption-side: top;">
						<span>Acciones Extra/Post</span>
					</caption>
					<tr id="trkardex_detalleFilaParametrosAcciones">
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
				</table> <!-- tblkardex_detalleParametrosAcciones -->
			</td>
		</tr> <!-- trkardex_detalleParametrosAcciones -->
		<?php }?>
		<tr id="trkardex_detalleMensajes" class="mensajes">
			<td align="center">
				<a id="Mensajes"></a>
			</td>
		</tr> <!-- trkardex_detalleMensajes -->
			</table> <!-- tblkardex_detalleAcciones -->
			<?php } ?>
			</form> <!-- frmMantenimientokardex_detalle -->
			</div> <!-- divMantenimientokardex_detalleAjaxWebPart -->
		</td>
	</tr> <!-- trkardex_detalleElementosFormulario/super -->
		<?php if(kardex_detalle_web::$STR_ES_RELACIONADO=='false' ) {?>

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
			
				import {kardex_detalle_webcontrol,kardex_detalle_webcontrol1} from './webroot/js/JavaScript/contabilidad/inventario/kardex_detalle/js/webcontrol/kardex_detalle_form_webcontrol.js?random=1';
				
				kardex_detalle_webcontrol1.setkardex_detalle_constante(window.kardex_detalle_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(kardex_detalle_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

