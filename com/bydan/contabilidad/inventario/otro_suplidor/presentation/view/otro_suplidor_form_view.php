<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\inventario\otro_suplidor\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Otro Suplidor Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/inventario/otro_suplidor/util/otro_suplidor_carga.php');
	use com\bydan\contabilidad\inventario\otro_suplidor\util\otro_suplidor_carga;
	
	//include_once('com/bydan/contabilidad/inventario/otro_suplidor/presentation/view/otro_suplidor_web.php');
	//use com\bydan\contabilidad\inventario\otro_suplidor\presentation\view\otro_suplidor_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	otro_suplidor_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	otro_suplidor_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$otro_suplidor_web1= new otro_suplidor_web();	
	$otro_suplidor_web1->cargarDatosGenerales();
	
	//$moduloActual=$otro_suplidor_web1->moduloActual;
	//$usuarioActual=$otro_suplidor_web1->usuarioActual;
	//$sessionBase=$otro_suplidor_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$otro_suplidor_web1->parametroGeneralUsuarioActual;
	
	
		
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
		
		
			<script type="module" src="webroot/js/JavaScript/contabilidad/inventario/otro_suplidor/js/util/otro_suplidor_form_funcion.js?random=1"></script>
						
		
		
		<?php 
			
		
			otro_suplidor_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					otro_suplidor_web::$GET_POST=$_GET;
				} else {
					otro_suplidor_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			otro_suplidor_web::$STR_NOMBRE_PAGINA = 'otro_suplidor_form_view.php';
			otro_suplidor_web::$BIT_ES_PAGINA_PRINCIPAL = 'false';
			otro_suplidor_web::$BIT_ES_PAGINA_FORM = 'true';
				
			otro_suplidor_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {otro_suplidor_constante,otro_suplidor_constante1} from './webroot/js/JavaScript/contabilidad/inventario/otro_suplidor/js/util/otro_suplidor_constante.js?random=1';
			import {otro_suplidor_funcion,otro_suplidor_funcion1} from './webroot/js/JavaScript/contabilidad/inventario/otro_suplidor/js/util/otro_suplidor_funcion.js?random=1';
			
			let otro_suplidor_constante2 = new otro_suplidor_constante();
			
			otro_suplidor_constante2.STR_NOMBRE_PAGINA="<?php echo(otro_suplidor_web::$STR_NOMBRE_PAGINA); ?>";
			otro_suplidor_constante2.STR_TYPE_ON_LOADotro_suplidor="<?php echo(otro_suplidor_web::$STR_TYPE_ONLOAD); ?>";
			otro_suplidor_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(otro_suplidor_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			otro_suplidor_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(otro_suplidor_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			otro_suplidor_constante2.STR_ACTION="<?php echo(otro_suplidor_web::$STR_ACTION); ?>";
			otro_suplidor_constante2.STR_ES_POPUP="<?php echo(otro_suplidor_web::$STR_ES_POPUP); ?>";
			otro_suplidor_constante2.STR_ES_BUSQUEDA="<?php echo(otro_suplidor_web::$STR_ES_BUSQUEDA); ?>";
			otro_suplidor_constante2.STR_FUNCION_JS="<?php echo(otro_suplidor_web::$STR_FUNCION_JS); ?>";
			otro_suplidor_constante2.BIG_ID_ACTUAL="<?php echo(otro_suplidor_web::$BIG_ID_ACTUAL); ?>";
			otro_suplidor_constante2.BIG_ID_OPCION="<?php echo(otro_suplidor_web::$BIG_ID_OPCION); ?>";
			otro_suplidor_constante2.STR_OBJETO_JS="<?php echo(otro_suplidor_web::$STR_OBJETO_JS); ?>";
			otro_suplidor_constante2.STR_ES_RELACIONES="<?php echo(otro_suplidor_web::$STR_ES_RELACIONES); ?>";
			otro_suplidor_constante2.STR_ES_RELACIONADO="<?php echo(otro_suplidor_web::$STR_ES_RELACIONADO); ?>";
			otro_suplidor_constante2.STR_ES_SUB_PAGINA="<?php echo(otro_suplidor_web::$STR_ES_SUB_PAGINA); ?>";
			otro_suplidor_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(otro_suplidor_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			otro_suplidor_constante2.BIT_ES_PAGINA_FORM=<?php echo(otro_suplidor_web::$BIT_ES_PAGINA_FORM); ?>;
			otro_suplidor_constante2.STR_SUFIJO="<?php echo(otro_suplidor_web::$STR_SUF); ?>";//otro_suplidor
			otro_suplidor_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(otro_suplidor_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//otro_suplidor
			
			otro_suplidor_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(otro_suplidor_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			otro_suplidor_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($otro_suplidor_web1->moduloActual->getnombre()); ?>";
			otro_suplidor_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(otro_suplidor_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			otro_suplidor_constante2.BIT_ES_LOAD_NORMAL=true;
			/*otro_suplidor_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			otro_suplidor_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.otro_suplidor_constante2 = otro_suplidor_constante2;
			
		</script>
		
		<?php if(otro_suplidor_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.otro_suplidor_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.otro_suplidor_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="otro_suplidorActual" ></a>
	
	<div id="divResumenotro_suplidorActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(otro_suplidor_web::$STR_ES_RELACIONADO=='false') {?>
		
		<div id="header" >
		
			<div id="banner">
				<span id="spanTituloBanner" class="titulobanner"></span>
			</div> <!-- banner -->
					
			<div id="subheader" class="links">  
			
						
			</div> <!-- sub-header -->
			
			
		</div> <!-- header -->
		
		<?php } ?>
		
		<div id="main">
		

			<?php if(otro_suplidor_web::$STR_ES_RELACIONADO=='false') {?>
			
			
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(otro_suplidor_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(otro_suplidor_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divotro_suplidorPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblotro_suplidorPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmotro_suplidorAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnotro_suplidorAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="otro_suplidor_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnotro_suplidorAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmotro_suplidorAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblotro_suplidorPopupAjaxWebPart -->
		</div> <!-- divotro_suplidorPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->		
		
		
		
			
<tr id="trotro_suplidorElementosFormulario">
	<td>
		<div id="divMantenimientootro_suplidorAjaxWebPart" title="OTRO SUPLIDOR" style="height: 90%;width: 90%;position: relative;top: 30px;left: 30px;">
			<form id="frmMantenimientootro_suplidor" name="frmMantenimientootro_suplidor">

			</br>

			<?php if(otro_suplidor_web::$STR_ES_RELACIONES=='false' ) {?>
			</br>
			<?php } ?>

			<!-- SECCION/TOOLBAR -->
			<table id="tblotro_suplidorToolBarFormularioExterior" style="width: 65%">
				<tr style="display:table-row">
					<td align="center">

						<table id="tblotro_suplidorToolBarFormulario" style="text-align: center"  style="display:table-row">
							<tr>
								<td id="tdotro_suplidorActualizarToolBar" style="visibility:visible">
									<img id="imgActualizarToolBarotro_suplidor" name="imgActualizarToolBarotro_suplidor" title="ACTUALIZAR Otro Suplidor ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/actualizar.gif" width="25" height="25"/>
								</td>
								<td id="tdotro_suplidorEliminarToolBar" style="visibility:visible">
									<img id="imgEliminarToolBarotro_suplidor" name="imgEliminarToolBarotro_suplidor" title="ELIMINAR Otro Suplidor ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/eliminar.gif" width="25" height="25"/>
								</td>
								<td id="tdotro_suplidorCancelarToolBar" style="visibility:visible">
									<img id="imgCancelarToolBarotro_suplidor" name="imgCancelarToolBarotro_suplidor" title="CANCELAR Otro Suplidor ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/cancelar.gif" width="25" height="25"/>
								</td>
								<td id="tdotro_suplidorRelacionesToolBar" style="display:table-row">
									<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/xexpand.png" width="25" height="25" onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('tblCamposOcultosotro_suplidor',this,'../')"/>
								</td>
							</tr>
						</table> <!-- tblotro_suplidorToolBarFormulario -->

					</td>
				</tr>
			</table> <!-- tblotro_suplidorToolBarFormularioExterior -->

			<table id="tblotro_suplidorElementos">
			<tr id="trotro_suplidorElementos" class="elementos" style="display:table-row">
			<td align="center">

			<a id="Campos"></a>

				<?php if(otro_suplidor_web::$STR_ES_RELACIONES=='false' ) {?>
				<div id="divFlechaArribaElementos" align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
					<span></span>
				</div>
				<?php } ?>

				<!-- SECCION/FORMULARIO -->
				<table id="tblElementosotro_suplidor" class="elementos" style="width: 300px; padding: 0px; border-spacing: 0px; border-collapse: collapse; text-align: center;">
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
					<tr id="tr_fila_5">
						<td id="td_title-id_proveedor" class="titulocampo">
							<label class="form-label">Proveedor.(*)</label>
						</td>
						<td id="td_control-id_proveedor" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_proveedor" name="form-id_proveedor" title="Proveedor" ></select></td>
									<td><a><img id="form-id_proveedor_img" name="form-id_proveedor_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_proveedor_img_busqueda" name="form-id_proveedor_img_busqueda" title="Buscar Proveedor" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_proveedor" class="mensajeerror"></span>
						</td>
					</tr>
				</table> <!-- tblElementosotro_suplidor -->

				<!-- SECCION/OCULTOS -->
				<table id="tblCamposOcultosotro_suplidor" class="elementos" style="display: table-row;">
					<caption class="busquedacabecera">
						<span>Campos Ocultos</span>
					</caption>
				</table> <!-- tblCamposOcultosotro_suplidor -->

			</td></tr> <!-- trotro_suplidorElementos -->
			</table> <!-- tblotro_suplidorElementos -->
			</form> <!-- frmMantenimientootro_suplidor -->


			

				<form id="frmAccionesMantenimientootro_suplidor" name="frmAccionesMantenimientootro_suplidor">

			<?php if(otro_suplidor_web::$STR_ES_BUSQUEDA=='false' ) {?>
			<table id="tblotro_suplidorAcciones" class="elementos" style="text-align: center">
		<tr id="trotro_suplidorAcciones" class="elementos" style="display:table-row">
			<td align="center">
				<a id="Acciones" ></a>

				<?php if(otro_suplidor_web::$STR_ES_RELACIONES=='false' ) {?>
				<div align="right">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
				<?php } ?>

					<!-- SECCION/BOTONES -->
					<table id="tblAccionesMantenimientootro_suplidor" class="busqueda" style="width: 50%;text-align: center">

						<?php if(otro_suplidor_web::$STR_ES_RELACIONES=='false' ) {?>
						<!--
						<caption class="busquedacabecera">
							<span>Acciones</span>
						</caption>
						-->
						<?php } ?>

						<tr id="trAccionesMantenimientootro_suplidorBasicos">
							<td id="tdbtnNuevootro_suplidor" style="visibility:visible">
								<div id="divNuevootro_suplidor" style="display:table-row">
									<input type="button" id="btnNuevootro_suplidor" name="btnNuevootro_suplidor" value="NUEVO" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnActualizarotro_suplidor" style="visibility:visible">
								<div id="divActualizarotro_suplidor" style="display:table-row">
									<input type="button" id="btnActualizarotro_suplidor" name="btnActualizarotro_suplidor" title="ACTUALIZAR Otro Suplidor ACTUAL" value="Actualizar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnEliminarotro_suplidor" style="visibility:visible">
								<div id="divEliminarotro_suplidor" style="display:table-row">
									<input type="button" id="btnEliminarotro_suplidor" name="btnEliminarotro_suplidor" title="ELIMINAR Otro Suplidor ACTUAL" value="Eliminar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnImprimirotro_suplidor" style="visibility:visible">
								<input type="button" id="btnImprimirotro_suplidor" name="btnImprimirotro_suplidor" title="IMPRIMIR PAGINA Otro Suplidor ACTUAL" value="Imp. Datos" class="btn btn-primary"/>
							</td>
							<td id="tdbtnCancelarotro_suplidor" style="visibility:visible">
								<input type="button" id="btnCancelarotro_suplidor" name="btnCancelarotro_suplidor" title="CANCELAR Otro Suplidor ACTUAL" value="Cancelar" class="btn btn-primary"/>
							</td>
						</tr>
						<tr id="trAccionesMantenimientootro_suplidorGuardar" style="display:none">
							<td id="tdbtnGuardarCambiosotro_suplidor" colspan="4" align="center" style="visibility:visible">
								<div id="divGuardarCambiosotro_suplidor" style="display:table-row">
									<input type="button" id="btnGuardarCambiosFormulariootro_suplidor" name="btnGuardarCambiosFormulariootro_suplidor" title="GUARDAR" value="GUADAR CAMBIOS" class="btn btn-primary"/>
								</div>
							</td>
						</tr>
					</table> <!-- tblAccionesMantenimientootro_suplidor -->
			</td>
		</tr> <!-- trotro_suplidorAcciones -->
		<?php if(otro_suplidor_web::$STR_ES_RELACIONADO=='false' ) {?>
		<tr id="trotro_suplidorParametrosAcciones" class="impresion"  style="display:table-row">
			<td align="center">
				<!-- SECCION/POST -->
				<table id="tblotro_suplidorParametrosAcciones" style="text-align: center;border: 0px solid black;padding: 0px; border-spacing: 0px">
					<caption class="busquedacabecera" style="padding: 0px;caption-side: top;">
						<span>Acciones Extra/Post</span>
					</caption>
					<tr id="trotro_suplidorFilaParametrosAcciones">
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
				</table> <!-- tblotro_suplidorParametrosAcciones -->
			</td>
		</tr> <!-- trotro_suplidorParametrosAcciones -->
		<?php }?>
		<tr id="trotro_suplidorMensajes" class="mensajes">
			<td align="center">
				<a id="Mensajes"></a>
			</td>
		</tr> <!-- trotro_suplidorMensajes -->
			</table> <!-- tblotro_suplidorAcciones -->
			<?php } ?>
			</form> <!-- frmMantenimientootro_suplidor -->
			</div> <!-- divMantenimientootro_suplidorAjaxWebPart -->
		</td>
	</tr> <!-- trotro_suplidorElementosFormulario/super -->
		<?php if(otro_suplidor_web::$STR_ES_RELACIONADO=='false' ) {?>

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
			
				import {otro_suplidor_webcontrol,otro_suplidor_webcontrol1} from './webroot/js/JavaScript/contabilidad/inventario/otro_suplidor/js/webcontrol/otro_suplidor_form_webcontrol.js?random=1';
				
				otro_suplidor_webcontrol1.setotro_suplidor_constante(window.otro_suplidor_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(otro_suplidor_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

