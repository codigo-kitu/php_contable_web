<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\seguridad\opcion\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Opcion Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/seguridad/opcion/util/opcion_carga.php');
	use com\bydan\contabilidad\seguridad\opcion\util\opcion_carga;
	
	//include_once('com/bydan/contabilidad/seguridad/opcion/presentation/view/opcion_web.php');
	//use com\bydan\contabilidad\seguridad\opcion\presentation\view\opcion_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	opcion_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	opcion_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$opcion_web1= new opcion_web();	
	$opcion_web1->cargarDatosGenerales();
	
	//$moduloActual=$opcion_web1->moduloActual;
	//$usuarioActual=$opcion_web1->usuarioActual;
	//$sessionBase=$opcion_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$opcion_web1->parametroGeneralUsuarioActual;
	
	
		
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
		
		
			<script type="module" src="webroot/js/JavaScript/contabilidad/seguridad/opcion/js/util/opcion_form_funcion.js?random=1"></script>
						
		
		
		<?php 
			
		
			opcion_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					opcion_web::$GET_POST=$_GET;
				} else {
					opcion_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			opcion_web::$STR_NOMBRE_PAGINA = 'opcion_form_view.php';
			opcion_web::$BIT_ES_PAGINA_PRINCIPAL = 'false';
			opcion_web::$BIT_ES_PAGINA_FORM = 'true';
				
			opcion_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {opcion_constante,opcion_constante1} from './webroot/js/JavaScript/contabilidad/seguridad/opcion/js/util/opcion_constante.js?random=1';
			import {opcion_funcion,opcion_funcion1} from './webroot/js/JavaScript/contabilidad/seguridad/opcion/js/util/opcion_funcion.js?random=1';
			
			let opcion_constante2 = new opcion_constante();
			
			opcion_constante2.STR_NOMBRE_PAGINA="<?php echo(opcion_web::$STR_NOMBRE_PAGINA); ?>";
			opcion_constante2.STR_TYPE_ON_LOADopcion="<?php echo(opcion_web::$STR_TYPE_ONLOAD); ?>";
			opcion_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(opcion_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			opcion_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(opcion_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			opcion_constante2.STR_ACTION="<?php echo(opcion_web::$STR_ACTION); ?>";
			opcion_constante2.STR_ES_POPUP="<?php echo(opcion_web::$STR_ES_POPUP); ?>";
			opcion_constante2.STR_ES_BUSQUEDA="<?php echo(opcion_web::$STR_ES_BUSQUEDA); ?>";
			opcion_constante2.STR_FUNCION_JS="<?php echo(opcion_web::$STR_FUNCION_JS); ?>";
			opcion_constante2.BIG_ID_ACTUAL="<?php echo(opcion_web::$BIG_ID_ACTUAL); ?>";
			opcion_constante2.BIG_ID_OPCION="<?php echo(opcion_web::$BIG_ID_OPCION); ?>";
			opcion_constante2.STR_OBJETO_JS="<?php echo(opcion_web::$STR_OBJETO_JS); ?>";
			opcion_constante2.STR_ES_RELACIONES="<?php echo(opcion_web::$STR_ES_RELACIONES); ?>";
			opcion_constante2.STR_ES_RELACIONADO="<?php echo(opcion_web::$STR_ES_RELACIONADO); ?>";
			opcion_constante2.STR_ES_SUB_PAGINA="<?php echo(opcion_web::$STR_ES_SUB_PAGINA); ?>";
			opcion_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(opcion_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			opcion_constante2.BIT_ES_PAGINA_FORM=<?php echo(opcion_web::$BIT_ES_PAGINA_FORM); ?>;
			opcion_constante2.STR_SUFIJO="<?php echo(opcion_web::$STR_SUF); ?>";//opcion
			opcion_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(opcion_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//opcion
			
			opcion_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(opcion_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			opcion_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($opcion_web1->moduloActual->getnombre()); ?>";
			opcion_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(opcion_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			opcion_constante2.BIT_ES_LOAD_NORMAL=true;
			/*opcion_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			opcion_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.opcion_constante2 = opcion_constante2;
			
		</script>
		
		<?php if(opcion_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.opcion_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.opcion_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="opcionActual" ></a>
	
	<div id="divResumenopcionActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(opcion_web::$STR_ES_RELACIONADO=='false') {?>
		
		<div id="header" >
		
			<div id="banner">
				<span id="spanTituloBanner" class="titulobanner"></span>
			</div> <!-- banner -->
					
			<div id="subheader" class="links">  
			
						
			</div> <!-- sub-header -->
			
			
		</div> <!-- header -->
		
		<?php } ?>
		
		<div id="main">
		

			<?php if(opcion_web::$STR_ES_RELACIONADO=='false') {?>
			
			
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(opcion_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(opcion_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divopcionPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblopcionPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmopcionAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnopcionAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="opcion_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnopcionAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmopcionAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblopcionPopupAjaxWebPart -->
		</div> <!-- divopcionPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->		
		
		
		
			
<tr id="tropcionElementosFormulario">
	<td>
		<div id="divMantenimientoopcionAjaxWebPart" title="OPCION" style="height: 90%;width: 90%;position: relative;top: 30px;left: 30px;">
			<form id="frmMantenimientoopcion" name="frmMantenimientoopcion">

			</br>

			<?php if(opcion_web::$STR_ES_RELACIONES=='false' ) {?>
			</br>
			<?php } ?>

			<!-- SECCION/TOOLBAR -->
			<table id="tblopcionToolBarFormularioExterior" style="width: 65%">
				<tr style="display:table-row">
					<td align="center">

						<table id="tblopcionToolBarFormulario" style="text-align: center"  style="display:table-row">
							<tr>
								<td id="tdopcionActualizarToolBar" style="visibility:visible">
									<img id="imgActualizarToolBaropcion" name="imgActualizarToolBaropcion" title="ACTUALIZAR Opcion ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/actualizar.gif" width="25" height="25"/>
								</td>
								<td id="tdopcionEliminarToolBar" style="visibility:visible">
									<img id="imgEliminarToolBaropcion" name="imgEliminarToolBaropcion" title="ELIMINAR Opcion ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/eliminar.gif" width="25" height="25"/>
								</td>
								<td id="tdopcionCancelarToolBar" style="visibility:visible">
									<img id="imgCancelarToolBaropcion" name="imgCancelarToolBaropcion" title="CANCELAR Opcion ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/cancelar.gif" width="25" height="25"/>
								</td>
								<td id="tdopcionRelacionesToolBar" style="display:table-row">
									<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/xexpand.png" width="25" height="25" onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('tblCamposOcultosopcion',this,'../')"/>
								</td>
							</tr>
						</table> <!-- tblopcionToolBarFormulario -->

					</td>
				</tr>
			</table> <!-- tblopcionToolBarFormularioExterior -->

			<table id="tblopcionElementos">
			<tr id="tropcionElementos" class="elementos" style="display:table-row">
			<td align="center">

			<a id="Campos"></a>

				<?php if(opcion_web::$STR_ES_RELACIONES=='false' ) {?>
				<div id="divFlechaArribaElementos" align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
					<span></span>
				</div>
				<?php } ?>

				<!-- SECCION/FORMULARIO -->
				<table id="tblElementosopcion" class="elementos" style="width: 400px; padding: 0px; border-spacing: 0px; border-collapse: collapse; text-align: left;">
					<tr id="tr_fila_1">
						<td id="td_title-id" class="titulocampo">
							<label class="form-label">Cod. Único</label>
						</td>
						<td id="td_control-id" align="left">
							<input id="form-id" name="form-id" type="text" class="form-control" readonly size="10">
						</td>
					
					
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
					
						<td id="td_title-id_sistema" class="titulocampo">
							<label class="form-label">Sistema.(*)</label>
						</td>
						<td id="td_control-id_sistema" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_sistema" name="form-id_sistema" title="Sistema" ></select></td>
									<td><a><img id="form-id_sistema_img" name="form-id_sistema_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_sistema_img_busqueda" name="form-id_sistema_img_busqueda" title="Buscar Sistema" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_sistema" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_2">
						<td id="td_title-id_opcion" class="titulocampo">
							<label class="form-label">Opcion</label>
						</td>
						<td id="td_control-id_opcion" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_opcion" name="form-id_opcion" title="Opcion" ></select></td>
									<td><a><img id="form-id_opcion_img" name="form-id_opcion_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_opcion_img_busqueda" name="form-id_opcion_img_busqueda" title="Buscar Opcion" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_opcion" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-id_grupo_opcion" class="titulocampo">
							<label class="form-label">Grupo Opcion.(*)</label>
						</td>
						<td id="td_control-id_grupo_opcion" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_grupo_opcion" name="form-id_grupo_opcion" title="Grupo Opcion" ></select></td>
									<td><a><img id="form-id_grupo_opcion_img" name="form-id_grupo_opcion_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_grupo_opcion_img_busqueda" name="form-id_grupo_opcion_img_busqueda" title="Buscar Grupo Opcion" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_grupo_opcion" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_3">
						<td id="td_title-codigo" class="titulocampo">
							<label class="form-label">Codigo.(*)</label>
						</td>
						<td id="td_control-codigo" align="left" class="controlcampo">
							<input id="form-codigo" name="form-codigo" type="text" class="form-control"  placeholder="Codigo"  title="Codigo"    size="20"  maxlength="50"/>
							<span id="spanstrMensajecodigo" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-nombre" class="titulocampo">
							<label class="form-label">Nombre.(*)</label>
						</td>
						<td id="td_control-nombre" align="left" class="controlcampo">
							<input id="form-nombre" name="form-nombre" type="text" class="form-control"  placeholder="Nombre"  title="Nombre"    size="20"  maxlength="50"/>
							<span id="spanstrMensajenombre" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_4">
						<td id="td_title-posicion" class="titulocampo">
							<label class="form-label">Posicion.(*)</label>
						</td>
						<td id="td_control-posicion" align="left" class="controlcampo">
							<input id="form-posicion" name="form-posicion" type="text" class="form-control"  placeholder="Posicion"  title="Posicion"    maxlength="5" size="10" >
							<span id="spanstrMensajeposicion" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-icon_name" class="titulocampo">
							<label class="form-label">Path Del Icono.(*)</label>
						</td>
						<td id="td_control-icon_name" align="left" class="controlcampo">
							<textarea id="form-icon_name" name="form-icon_name" class="form-control"  placeholder="Path Del Icono"  title="Path Del Icono"   style="font-size: 13px;" rows="3" cols="25" size="20" ></textarea>
							<span id="spanstrMensajeicon_name" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_5">
						<td id="td_title-nombre_clase" class="titulocampo">
							<label class="form-label">Nombre De Clase.(*)</label>
						</td>
						<td id="td_control-nombre_clase" align="left" class="controlcampo">
							<textarea id="form-nombre_clase" name="form-nombre_clase" class="form-control"  placeholder="Nombre De Clase"  title="Nombre De Clase"   style="font-size: 13px;" rows="3" cols="25" size="20" ></textarea>
							<span id="spanstrMensajenombre_clase" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-modulo0" class="titulocampo">
							<label class="form-label">Modulo 0.(*)</label>
						</td>
						<td id="td_control-modulo0" align="left" class="controlcampo">
							<input id="form-modulo0" name="form-modulo0" type="text" class="form-control"  placeholder="Modulo 0"  title="Modulo 0"    size="20"  maxlength="50"/>
							<span id="spanstrMensajemodulo0" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_6">
						<td id="td_title-sub_modulo" class="titulocampo">
							<label class="form-label">Sub Modulo.(*)</label>
						</td>
						<td id="td_control-sub_modulo" align="left" class="controlcampo">
							<input id="form-sub_modulo" name="form-sub_modulo" type="text" class="form-control"  placeholder="Sub Modulo"  title="Sub Modulo"    size="20"  maxlength="50"/>
							<span id="spanstrMensajesub_modulo" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-paquete" class="titulocampo">
							<label class="form-label">Paquete.(*)</label>
						</td>
						<td id="td_control-paquete" align="left" class="controlcampo">
							<textarea id="form-paquete" name="form-paquete" class="form-control"  placeholder="Paquete"  title="Paquete"   style="font-size: 13px;"  rows ="3" cols= "25"></textarea>
							<span id="spanstrMensajepaquete" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_7">
						<td id="td_title-es_para_menu" class="titulocampo">
							<label class="form-label">Es Para Menu</label>
						</td>
						<td id="td_control-es_para_menu" align="left" class="controlcampo">
							<input id="form-es_para_menu" name="form-es_para_menu" type="checkbox" >
							<span id="spanstrMensajees_para_menu" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-es_guardar_relaciones" class="titulocampo">
							<label class="form-label">Es Guardar Relaciones</label>
						</td>
						<td id="td_control-es_guardar_relaciones" align="left" class="controlcampo">
							<input id="form-es_guardar_relaciones" name="form-es_guardar_relaciones" type="checkbox" >
							<span id="spanstrMensajees_guardar_relaciones" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_8">
						<td id="td_title-con_mostrar_acciones_campo" class="titulocampo">
							<label class="form-label">Mostrar Acciones Campo</label>
						</td>
						<td id="td_control-con_mostrar_acciones_campo" align="left" class="controlcampo">
							<input id="form-con_mostrar_acciones_campo" name="form-con_mostrar_acciones_campo" type="checkbox" >
							<span id="spanstrMensajecon_mostrar_acciones_campo" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-estado" class="titulocampo">
							<label class="form-label">Estado</label>
						</td>
						<td id="td_control-estado" align="left" class="controlcampo">
							<input id="form-estado" name="form-estado" type="checkbox" >
							<span id="spanstrMensajeestado" class="mensajeerror"></span>
						</td>
					</tr>
				</table> <!-- tblElementosopcion -->

				<!-- SECCION/OCULTOS -->
				<table id="tblCamposOcultosopcion" class="elementos" style="display: table-row;">
					<caption class="busquedacabecera">
						<span>Campos Ocultos</span>
					</caption>
					
						<td id="td_title-id_modulo" class="titulocampo">
							<label class="form-label">Modulo.(*)</label>
						</td>
						<td id="td_control-id_modulo" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_modulo" name="form-id_modulo" title="Modulo" ></select></td>
									<td><a><img id="form-id_modulo_img" name="form-id_modulo_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_modulo_img_busqueda" name="form-id_modulo_img_busqueda" title="Buscar Modulo" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_modulo" class="mensajeerror"></span>
						</td>
					
				</table> <!-- tblCamposOcultosopcion -->

			</td></tr> <!-- tropcionElementos -->
			</table> <!-- tblopcionElementos -->
			</form> <!-- frmMantenimientoopcion -->


			

				<form id="frmAccionesMantenimientoopcion" name="frmAccionesMantenimientoopcion">

			<?php if(opcion_web::$STR_ES_BUSQUEDA=='false' ) {?>
			<table id="tblopcionAcciones" class="elementos" style="text-align: center">
		<tr id="tropcionAcciones" class="elementos" style="display:table-row">
			<td align="center">
				<a id="Acciones" ></a>

				<?php if(opcion_web::$STR_ES_RELACIONES=='false' ) {?>
				<div align="right">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
				<?php } ?>

					<!-- SECCION/BOTONES -->
					<table id="tblAccionesMantenimientoopcion" class="busqueda" style="width: 50%;text-align: left">

						<?php if(opcion_web::$STR_ES_RELACIONES=='false' ) {?>
						<!--
						<caption class="busquedacabecera">
							<span>Acciones</span>
						</caption>
						-->
						<?php } ?>

						<tr id="trAccionesMantenimientoopcionBasicos">
							<td id="tdbtnNuevoopcion" style="visibility:visible">
								<div id="divNuevoopcion" style="display:table-row">
									<input type="button" id="btnNuevoopcion" name="btnNuevoopcion" value="NUEVO" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnActualizaropcion" style="visibility:visible">
								<div id="divActualizaropcion" style="display:table-row">
									<input type="button" id="btnActualizaropcion" name="btnActualizaropcion" title="ACTUALIZAR Opcion ACTUAL" value="Actualizar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnEliminaropcion" style="visibility:visible">
								<div id="divEliminaropcion" style="display:table-row">
									<input type="button" id="btnEliminaropcion" name="btnEliminaropcion" title="ELIMINAR Opcion ACTUAL" value="Eliminar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnImprimiropcion" style="visibility:visible">
								<input type="button" id="btnImprimiropcion" name="btnImprimiropcion" title="IMPRIMIR PAGINA Opcion ACTUAL" value="Imp. Datos" class="btn btn-primary"/>
							</td>
							<td id="tdbtnCancelaropcion" style="visibility:visible">
								<input type="button" id="btnCancelaropcion" name="btnCancelaropcion" title="CANCELAR Opcion ACTUAL" value="Cancelar" class="btn btn-primary"/>
							</td>
						</tr>
						<tr id="trAccionesMantenimientoopcionGuardar" style="display:none">
							<td id="tdbtnGuardarCambiosopcion" colspan="4" align="center" style="visibility:visible">
								<div id="divGuardarCambiosopcion" style="display:table-row">
									<input type="button" id="btnGuardarCambiosFormularioopcion" name="btnGuardarCambiosFormularioopcion" title="GUARDAR" value="GUADAR CAMBIOS" class="btn btn-primary"/>
								</div>
							</td>
						</tr>
					</table> <!-- tblAccionesMantenimientoopcion -->
			</td>
		</tr> <!-- tropcionAcciones -->
		<?php if(opcion_web::$STR_ES_RELACIONADO=='false' ) {?>
		<tr id="tropcionParametrosAcciones" class="impresion"  style="display:table-row">
			<td align="center">
				<!-- SECCION/POST -->
				<table id="tblopcionParametrosAcciones" style="text-align: center;border: 0px solid black;padding: 0px; border-spacing: 0px">
					<caption class="busquedacabecera" style="padding: 0px;caption-side: top;">
						<span>Acciones Extra/Post</span>
					</caption>
					<tr id="tropcionFilaParametrosAcciones">
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
				</table> <!-- tblopcionParametrosAcciones -->
			</td>
		</tr> <!-- tropcionParametrosAcciones -->
		<?php }?>
		<tr id="tropcionMensajes" class="mensajes">
			<td align="center">
				<a id="Mensajes"></a>
			</td>
		</tr> <!-- tropcionMensajes -->
			</table> <!-- tblopcionAcciones -->
			<?php } ?>
			</form> <!-- frmMantenimientoopcion -->
			</div> <!-- divMantenimientoopcionAjaxWebPart -->
		</td>
	</tr> <!-- tropcionElementosFormulario/super -->
		<?php if(opcion_web::$STR_ES_RELACIONADO=='false' ) {?>

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
			
				import {opcion_webcontrol,opcion_webcontrol1} from './webroot/js/JavaScript/contabilidad/seguridad/opcion/js/webcontrol/opcion_form_webcontrol.js?random=1';
				
				opcion_webcontrol1.setopcion_constante(window.opcion_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(opcion_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

