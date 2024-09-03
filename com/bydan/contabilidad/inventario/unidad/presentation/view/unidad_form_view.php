<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\inventario\unidad\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Unidad Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/inventario/unidad/util/unidad_carga.php');
	use com\bydan\contabilidad\inventario\unidad\util\unidad_carga;
	
	//include_once('com/bydan/contabilidad/inventario/unidad/presentation/view/unidad_web.php');
	//use com\bydan\contabilidad\inventario\unidad\presentation\view\unidad_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	unidad_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	unidad_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$unidad_web1= new unidad_web();	
	$unidad_web1->cargarDatosGenerales();
	
	//$moduloActual=$unidad_web1->moduloActual;
	//$usuarioActual=$unidad_web1->usuarioActual;
	//$sessionBase=$unidad_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$unidad_web1->parametroGeneralUsuarioActual;
	
	
		
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
		
		
			<script type="module" src="webroot/js/JavaScript/contabilidad/inventario/unidad/js/util/unidad_form_funcion.js?random=1"></script>
						
		
		
		<?php 
			
		
			unidad_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					unidad_web::$GET_POST=$_GET;
				} else {
					unidad_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			unidad_web::$STR_NOMBRE_PAGINA = 'unidad_form_view.php';
			unidad_web::$BIT_ES_PAGINA_PRINCIPAL = 'false';
			unidad_web::$BIT_ES_PAGINA_FORM = 'true';
				
			unidad_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {unidad_constante,unidad_constante1} from './webroot/js/JavaScript/contabilidad/inventario/unidad/js/util/unidad_constante.js?random=1';
			import {unidad_funcion,unidad_funcion1} from './webroot/js/JavaScript/contabilidad/inventario/unidad/js/util/unidad_funcion.js?random=1';
			
			let unidad_constante2 = new unidad_constante();
			
			unidad_constante2.STR_NOMBRE_PAGINA="<?php echo(unidad_web::$STR_NOMBRE_PAGINA); ?>";
			unidad_constante2.STR_TYPE_ON_LOADunidad="<?php echo(unidad_web::$STR_TYPE_ONLOAD); ?>";
			unidad_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(unidad_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			unidad_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(unidad_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			unidad_constante2.STR_ACTION="<?php echo(unidad_web::$STR_ACTION); ?>";
			unidad_constante2.STR_ES_POPUP="<?php echo(unidad_web::$STR_ES_POPUP); ?>";
			unidad_constante2.STR_ES_BUSQUEDA="<?php echo(unidad_web::$STR_ES_BUSQUEDA); ?>";
			unidad_constante2.STR_FUNCION_JS="<?php echo(unidad_web::$STR_FUNCION_JS); ?>";
			unidad_constante2.BIG_ID_ACTUAL="<?php echo(unidad_web::$BIG_ID_ACTUAL); ?>";
			unidad_constante2.BIG_ID_OPCION="<?php echo(unidad_web::$BIG_ID_OPCION); ?>";
			unidad_constante2.STR_OBJETO_JS="<?php echo(unidad_web::$STR_OBJETO_JS); ?>";
			unidad_constante2.STR_ES_RELACIONES="<?php echo(unidad_web::$STR_ES_RELACIONES); ?>";
			unidad_constante2.STR_ES_RELACIONADO="<?php echo(unidad_web::$STR_ES_RELACIONADO); ?>";
			unidad_constante2.STR_ES_SUB_PAGINA="<?php echo(unidad_web::$STR_ES_SUB_PAGINA); ?>";
			unidad_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(unidad_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			unidad_constante2.BIT_ES_PAGINA_FORM=<?php echo(unidad_web::$BIT_ES_PAGINA_FORM); ?>;
			unidad_constante2.STR_SUFIJO="<?php echo(unidad_web::$STR_SUF); ?>";//unidad
			unidad_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(unidad_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//unidad
			
			unidad_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(unidad_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			unidad_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($unidad_web1->moduloActual->getnombre()); ?>";
			unidad_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(unidad_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			unidad_constante2.BIT_ES_LOAD_NORMAL=true;
			/*unidad_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			unidad_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.unidad_constante2 = unidad_constante2;
			
		</script>
		
		<?php if(unidad_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.unidad_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.unidad_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="unidadActual" ></a>
	
	<div id="divResumenunidadActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(unidad_web::$STR_ES_RELACIONADO=='false') {?>
		
		<div id="header" >
		
			<div id="banner">
				<span id="spanTituloBanner" class="titulobanner"></span>
			</div> <!-- banner -->
					
			<div id="subheader" class="links">  
			
						
			</div> <!-- sub-header -->
			
			
		</div> <!-- header -->
		
		<?php } ?>
		
		<div id="main">
		

			<?php if(unidad_web::$STR_ES_RELACIONADO=='false') {?>
			
			
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(unidad_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(unidad_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divunidadPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblunidadPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmunidadAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnunidadAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="unidad_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnunidadAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmunidadAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblunidadPopupAjaxWebPart -->
		</div> <!-- divunidadPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->		
		
		
		
			
<tr id="trunidadElementosFormulario">
	<td>
		<div id="divMantenimientounidadAjaxWebPart" title="UNIDAD" style="height: 90%;width: 90%;position: relative;top: 30px;left: 30px;">
			<form id="frmMantenimientounidad" name="frmMantenimientounidad">

			</br>

			<?php if(unidad_web::$STR_ES_RELACIONES=='false' ) {?>
			</br>
			<?php } ?>

			<!-- SECCION/TOOLBAR -->
			<table id="tblunidadToolBarFormularioExterior" style="width: 65%">
				<tr style="display:table-row">
					<td align="center">

						<table id="tblunidadToolBarFormulario" style="text-align: center"  style="display:table-row">
							<tr>
								<td id="tdunidadActualizarToolBar" style="visibility:visible">
									<img id="imgActualizarToolBarunidad" name="imgActualizarToolBarunidad" title="ACTUALIZAR Unidad ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/actualizar.gif" width="25" height="25"/>
								</td>
								<td id="tdunidadEliminarToolBar" style="visibility:visible">
									<img id="imgEliminarToolBarunidad" name="imgEliminarToolBarunidad" title="ELIMINAR Unidad ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/eliminar.gif" width="25" height="25"/>
								</td>
								<td id="tdunidadCancelarToolBar" style="visibility:visible">
									<img id="imgCancelarToolBarunidad" name="imgCancelarToolBarunidad" title="CANCELAR Unidad ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/cancelar.gif" width="25" height="25"/>
								</td>
								<td id="tdunidadRelacionesToolBar" style="display:table-row">
									<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/xexpand.png" width="25" height="25" onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('tblCamposOcultosunidad',this,'../')"/>
								</td>
							</tr>
						</table> <!-- tblunidadToolBarFormulario -->

					</td>
				</tr>
			</table> <!-- tblunidadToolBarFormularioExterior -->

			<table id="tblunidadElementos">
			<tr id="trunidadElementos" class="elementos" style="display:table-row">
			<td align="center">

			<a id="Campos"></a>

				<?php if(unidad_web::$STR_ES_RELACIONES=='false' ) {?>
				<div id="divFlechaArribaElementos" align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
					<span></span>
				</div>
				<?php } ?>

				<!-- SECCION/FORMULARIO -->
				<table id="tblElementosunidad" class="elementos" style="width: 350px; padding: 0px; border-spacing: 0px; border-collapse: collapse; text-align: center;">
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
							<input id="form-codigo" name="form-codigo" type="text" class="form-control"  placeholder="Codigo"  title="Codigo"    size="6"  maxlength="6"/>
							<span id="spanstrMensajecodigo" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_5">
						<td id="td_title-nombre" class="titulocampo">
							<label class="form-label">Nombre.(*)</label>
						</td>
						<td id="td_control-nombre" align="left" class="controlcampo">
							<input id="form-nombre" name="form-nombre" type="text" class="form-control"  placeholder="Nombre"  title="Nombre"    size="20"  maxlength="20"/>
							<span id="spanstrMensajenombre" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_6">
						<td id="td_title-defecto_venta" class="titulocampo">
							<label class="form-label">Predeterminado Venta</label>
						</td>
						<td id="td_control-defecto_venta" align="left" class="controlcampo">
							<input id="form-defecto_venta" name="form-defecto_venta" type="checkbox" >
							<span id="spanstrMensajedefecto_venta" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_7">
						<td id="td_title-defecto_compra" class="titulocampo">
							<label class="form-label">Predeterminado Compra</label>
						</td>
						<td id="td_control-defecto_compra" align="left" class="controlcampo">
							<input id="form-defecto_compra" name="form-defecto_compra" type="checkbox" >
							<span id="spanstrMensajedefecto_compra" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_8">
						<td id="td_title-numero_productos" class="titulocampo">
							<label class="form-label">No Productos.(*)</label>
						</td>
						<td id="td_control-numero_productos" align="left" class="controlcampo">
							<input id="form-numero_productos" name="form-numero_productos" type="text" class="form-control"  placeholder="No Productos"  title="No Productos"    maxlength="10" size="10"  readonly="readonly">
							<span id="spanstrMensajenumero_productos" class="mensajeerror"></span>
						</td>
					</tr>
				</table> <!-- tblElementosunidad -->

				<!-- SECCION/OCULTOS -->
				<table id="tblCamposOcultosunidad" class="elementos" style="display: table-row;">
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
					
				</table> <!-- tblCamposOcultosunidad -->

			</td></tr> <!-- trunidadElementos -->
			</table> <!-- tblunidadElementos -->
			</form> <!-- frmMantenimientounidad -->


			

				<form id="frmAccionesMantenimientounidad" name="frmAccionesMantenimientounidad">

			<?php if(unidad_web::$STR_ES_BUSQUEDA=='false' ) {?>
			<table id="tblunidadAcciones" class="elementos" style="text-align: center">
		<tr id="trunidadAcciones" class="elementos" style="display:table-row">
			<td align="center">
				<a id="Acciones" ></a>

				<?php if(unidad_web::$STR_ES_RELACIONES=='false' ) {?>
				<div align="right">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
				<?php } ?>

					<!-- SECCION/BOTONES -->
					<table id="tblAccionesMantenimientounidad" class="busqueda" style="width: 50%;text-align: center">

						<?php if(unidad_web::$STR_ES_RELACIONES=='false' ) {?>
						<!--
						<caption class="busquedacabecera">
							<span>Acciones</span>
						</caption>
						-->
						<?php } ?>

						<tr id="trAccionesMantenimientounidadBasicos">
							<td id="tdbtnNuevounidad" style="visibility:visible">
								<div id="divNuevounidad" style="display:table-row">
									<input type="button" id="btnNuevounidad" name="btnNuevounidad" value="NUEVO" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnActualizarunidad" style="visibility:visible">
								<div id="divActualizarunidad" style="display:table-row">
									<input type="button" id="btnActualizarunidad" name="btnActualizarunidad" title="ACTUALIZAR Unidad ACTUAL" value="Actualizar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnEliminarunidad" style="visibility:visible">
								<div id="divEliminarunidad" style="display:table-row">
									<input type="button" id="btnEliminarunidad" name="btnEliminarunidad" title="ELIMINAR Unidad ACTUAL" value="Eliminar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnImprimirunidad" style="visibility:visible">
								<input type="button" id="btnImprimirunidad" name="btnImprimirunidad" title="IMPRIMIR PAGINA Unidad ACTUAL" value="Imp. Datos" class="btn btn-primary"/>
							</td>
							<td id="tdbtnCancelarunidad" style="visibility:visible">
								<input type="button" id="btnCancelarunidad" name="btnCancelarunidad" title="CANCELAR Unidad ACTUAL" value="Cancelar" class="btn btn-primary"/>
							</td>
						</tr>
						<tr id="trAccionesMantenimientounidadGuardar" style="display:none">
							<td id="tdbtnGuardarCambiosunidad" colspan="4" align="center" style="visibility:visible">
								<div id="divGuardarCambiosunidad" style="display:table-row">
									<input type="button" id="btnGuardarCambiosFormulariounidad" name="btnGuardarCambiosFormulariounidad" title="GUARDAR" value="GUADAR CAMBIOS" class="btn btn-primary"/>
								</div>
							</td>
						</tr>
					</table> <!-- tblAccionesMantenimientounidad -->
			</td>
		</tr> <!-- trunidadAcciones -->
		<?php if(unidad_web::$STR_ES_RELACIONADO=='false' ) {?>
		<tr id="trunidadParametrosAcciones" class="impresion"  style="display:table-row">
			<td align="center">
				<!-- SECCION/POST -->
				<table id="tblunidadParametrosAcciones" style="text-align: center;border: 0px solid black;padding: 0px; border-spacing: 0px">
					<caption class="busquedacabecera" style="padding: 0px;caption-side: top;">
						<span>Acciones Extra/Post</span>
					</caption>
					<tr id="trunidadFilaParametrosAcciones">
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
				</table> <!-- tblunidadParametrosAcciones -->
			</td>
		</tr> <!-- trunidadParametrosAcciones -->
		<?php }?>
		<tr id="trunidadMensajes" class="mensajes">
			<td align="center">
				<a id="Mensajes"></a>
			</td>
		</tr> <!-- trunidadMensajes -->
			</table> <!-- tblunidadAcciones -->
			<?php } ?>
			</form> <!-- frmMantenimientounidad -->
			</div> <!-- divMantenimientounidadAjaxWebPart -->
		</td>
	</tr> <!-- trunidadElementosFormulario/super -->
		<?php if(unidad_web::$STR_ES_RELACIONADO=='false' ) {?>

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
			
				import {unidad_webcontrol,unidad_webcontrol1} from './webroot/js/JavaScript/contabilidad/inventario/unidad/js/webcontrol/unidad_form_webcontrol.js?random=1';
				
				unidad_webcontrol1.setunidad_constante(window.unidad_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(unidad_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

