<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\inventario\kit_producto\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Kits Producto Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/inventario/kit_producto/util/kit_producto_carga.php');
	use com\bydan\contabilidad\inventario\kit_producto\util\kit_producto_carga;
	
	//include_once('com/bydan/contabilidad/inventario/kit_producto/presentation/view/kit_producto_web.php');
	//use com\bydan\contabilidad\inventario\kit_producto\presentation\view\kit_producto_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	kit_producto_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	kit_producto_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$kit_producto_web1= new kit_producto_web();	
	$kit_producto_web1->cargarDatosGenerales();
	
	//$moduloActual=$kit_producto_web1->moduloActual;
	//$usuarioActual=$kit_producto_web1->usuarioActual;
	//$sessionBase=$kit_producto_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$kit_producto_web1->parametroGeneralUsuarioActual;
	
	
		
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
		
		
			<script type="module" src="webroot/js/JavaScript/contabilidad/inventario/kit_producto/js/util/kit_producto_form_funcion.js?random=1"></script>
						
		
		
		<?php 
			
		
			kit_producto_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					kit_producto_web::$GET_POST=$_GET;
				} else {
					kit_producto_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			kit_producto_web::$STR_NOMBRE_PAGINA = 'kit_producto_form_view.php';
			kit_producto_web::$BIT_ES_PAGINA_PRINCIPAL = 'false';
			kit_producto_web::$BIT_ES_PAGINA_FORM = 'true';
				
			kit_producto_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {kit_producto_constante,kit_producto_constante1} from './webroot/js/JavaScript/contabilidad/inventario/kit_producto/js/util/kit_producto_constante.js?random=1';
			import {kit_producto_funcion,kit_producto_funcion1} from './webroot/js/JavaScript/contabilidad/inventario/kit_producto/js/util/kit_producto_funcion.js?random=1';
			
			let kit_producto_constante2 = new kit_producto_constante();
			
			kit_producto_constante2.STR_NOMBRE_PAGINA="<?php echo(kit_producto_web::$STR_NOMBRE_PAGINA); ?>";
			kit_producto_constante2.STR_TYPE_ON_LOADkit_producto="<?php echo(kit_producto_web::$STR_TYPE_ONLOAD); ?>";
			kit_producto_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(kit_producto_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			kit_producto_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(kit_producto_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			kit_producto_constante2.STR_ACTION="<?php echo(kit_producto_web::$STR_ACTION); ?>";
			kit_producto_constante2.STR_ES_POPUP="<?php echo(kit_producto_web::$STR_ES_POPUP); ?>";
			kit_producto_constante2.STR_ES_BUSQUEDA="<?php echo(kit_producto_web::$STR_ES_BUSQUEDA); ?>";
			kit_producto_constante2.STR_FUNCION_JS="<?php echo(kit_producto_web::$STR_FUNCION_JS); ?>";
			kit_producto_constante2.BIG_ID_ACTUAL="<?php echo(kit_producto_web::$BIG_ID_ACTUAL); ?>";
			kit_producto_constante2.BIG_ID_OPCION="<?php echo(kit_producto_web::$BIG_ID_OPCION); ?>";
			kit_producto_constante2.STR_OBJETO_JS="<?php echo(kit_producto_web::$STR_OBJETO_JS); ?>";
			kit_producto_constante2.STR_ES_RELACIONES="<?php echo(kit_producto_web::$STR_ES_RELACIONES); ?>";
			kit_producto_constante2.STR_ES_RELACIONADO="<?php echo(kit_producto_web::$STR_ES_RELACIONADO); ?>";
			kit_producto_constante2.STR_ES_SUB_PAGINA="<?php echo(kit_producto_web::$STR_ES_SUB_PAGINA); ?>";
			kit_producto_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(kit_producto_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			kit_producto_constante2.BIT_ES_PAGINA_FORM=<?php echo(kit_producto_web::$BIT_ES_PAGINA_FORM); ?>;
			kit_producto_constante2.STR_SUFIJO="<?php echo(kit_producto_web::$STR_SUF); ?>";//kit_producto
			kit_producto_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(kit_producto_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//kit_producto
			
			kit_producto_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(kit_producto_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			kit_producto_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($kit_producto_web1->moduloActual->getnombre()); ?>";
			kit_producto_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(kit_producto_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			kit_producto_constante2.BIT_ES_LOAD_NORMAL=true;
			/*kit_producto_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			kit_producto_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.kit_producto_constante2 = kit_producto_constante2;
			
		</script>
		
		<?php if(kit_producto_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.kit_producto_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.kit_producto_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="kit_productoActual" ></a>
	
	<div id="divResumenkit_productoActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(kit_producto_web::$STR_ES_RELACIONADO=='false') {?>
		
		<div id="header" >
		
			<div id="banner">
				<span id="spanTituloBanner" class="titulobanner"></span>
			</div> <!-- banner -->
					
			<div id="subheader" class="links">  
			
						
			</div> <!-- sub-header -->
			
			
		</div> <!-- header -->
		
		<?php } ?>
		
		<div id="main">
		

			<?php if(kit_producto_web::$STR_ES_RELACIONADO=='false') {?>
			
			
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(kit_producto_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(kit_producto_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divkit_productoPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblkit_productoPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmkit_productoAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnkit_productoAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="kit_producto_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnkit_productoAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmkit_productoAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblkit_productoPopupAjaxWebPart -->
		</div> <!-- divkit_productoPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->		
		
		
		
			
<tr id="trkit_productoElementosFormulario">
	<td>
		<div id="divMantenimientokit_productoAjaxWebPart" title="KITS PRODUCTO" style="height: 90%;width: 90%;position: relative;top: 30px;left: 30px;">
			<form id="frmMantenimientokit_producto" name="frmMantenimientokit_producto">

			</br>

			<?php if(kit_producto_web::$STR_ES_RELACIONES=='false' ) {?>
			</br>
			<?php } ?>

			<!-- SECCION/TOOLBAR -->
			<table id="tblkit_productoToolBarFormularioExterior" style="width: 65%">
				<tr style="display:table-row">
					<td align="center">

						<table id="tblkit_productoToolBarFormulario" style="text-align: center"  style="display:table-row">
							<tr>
								<td id="tdkit_productoActualizarToolBar" style="visibility:visible">
									<img id="imgActualizarToolBarkit_producto" name="imgActualizarToolBarkit_producto" title="ACTUALIZAR Kits Producto ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/actualizar.gif" width="25" height="25"/>
								</td>
								<td id="tdkit_productoEliminarToolBar" style="visibility:visible">
									<img id="imgEliminarToolBarkit_producto" name="imgEliminarToolBarkit_producto" title="ELIMINAR Kits Producto ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/eliminar.gif" width="25" height="25"/>
								</td>
								<td id="tdkit_productoCancelarToolBar" style="visibility:visible">
									<img id="imgCancelarToolBarkit_producto" name="imgCancelarToolBarkit_producto" title="CANCELAR Kits Producto ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/cancelar.gif" width="25" height="25"/>
								</td>
								<td id="tdkit_productoRelacionesToolBar" style="display:table-row">
									<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/xexpand.png" width="25" height="25" onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('tblCamposOcultoskit_producto',this,'../')"/>
								</td>
							</tr>
						</table> <!-- tblkit_productoToolBarFormulario -->

					</td>
				</tr>
			</table> <!-- tblkit_productoToolBarFormularioExterior -->

			<table id="tblkit_productoElementos">
			<tr id="trkit_productoElementos" class="elementos" style="display:table-row">
			<td align="center">

			<a id="Campos"></a>

				<?php if(kit_producto_web::$STR_ES_RELACIONES=='false' ) {?>
				<div id="divFlechaArribaElementos" align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
					<span></span>
				</div>
				<?php } ?>

				<!-- SECCION/FORMULARIO -->
				<table id="tblElementoskit_producto" class="elementos" style="width: 300px; padding: 0px; border-spacing: 0px; border-collapse: collapse; text-align: center;">
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
						<td id="td_title-id_padre" class="titulocampo">
							<label class="form-label">Id Padre.(*)</label>
						</td>
						<td id="td_control-id_padre" align="left" class="controlcampo">
							<input id="form-id_padre" name="form-id_padre" type="text" class="form-control"  placeholder="Id Padre"  title="Id Padre"    maxlength="19" size="10" >
							<span id="spanstrMensajeid_padre" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_5">
						<td id="td_title-id_hijo" class="titulocampo">
							<label class="form-label">Id Hijo.(*)</label>
						</td>
						<td id="td_control-id_hijo" align="left" class="controlcampo">
							<input id="form-id_hijo" name="form-id_hijo" type="text" class="form-control"  placeholder="Id Hijo"  title="Id Hijo"    maxlength="19" size="10" >
							<span id="spanstrMensajeid_hijo" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_6">
						<td id="td_title-cantidad" class="titulocampo">
							<label class="form-label">Cantidad.(*)</label>
						</td>
						<td id="td_control-cantidad" align="left" class="controlcampo">
							<input id="form-cantidad" name="form-cantidad" type="text" class="form-control"  placeholder="Cantidad"  title="Cantidad"    maxlength="18" size="12" >
							<span id="spanstrMensajecantidad" class="mensajeerror"></span>
						</td>
					</tr>
				</table> <!-- tblElementoskit_producto -->

				<!-- SECCION/OCULTOS -->
				<table id="tblCamposOcultoskit_producto" class="elementos" style="display: table-row;">
					<caption class="busquedacabecera">
						<span>Campos Ocultos</span>
					</caption>
				</table> <!-- tblCamposOcultoskit_producto -->

			</td></tr> <!-- trkit_productoElementos -->
			</table> <!-- tblkit_productoElementos -->
			</form> <!-- frmMantenimientokit_producto -->


			

				<form id="frmAccionesMantenimientokit_producto" name="frmAccionesMantenimientokit_producto">

			<?php if(kit_producto_web::$STR_ES_BUSQUEDA=='false' ) {?>
			<table id="tblkit_productoAcciones" class="elementos" style="text-align: center">
		<tr id="trkit_productoAcciones" class="elementos" style="display:table-row">
			<td align="center">
				<a id="Acciones" ></a>

				<?php if(kit_producto_web::$STR_ES_RELACIONES=='false' ) {?>
				<div align="right">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
				<?php } ?>

					<!-- SECCION/BOTONES -->
					<table id="tblAccionesMantenimientokit_producto" class="busqueda" style="width: 50%;text-align: center">

						<?php if(kit_producto_web::$STR_ES_RELACIONES=='false' ) {?>
						<!--
						<caption class="busquedacabecera">
							<span>Acciones</span>
						</caption>
						-->
						<?php } ?>

						<tr id="trAccionesMantenimientokit_productoBasicos">
							<td id="tdbtnNuevokit_producto" style="visibility:visible">
								<div id="divNuevokit_producto" style="display:table-row">
									<input type="button" id="btnNuevokit_producto" name="btnNuevokit_producto" value="NUEVO" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnActualizarkit_producto" style="visibility:visible">
								<div id="divActualizarkit_producto" style="display:table-row">
									<input type="button" id="btnActualizarkit_producto" name="btnActualizarkit_producto" title="ACTUALIZAR Kits Producto ACTUAL" value="Actualizar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnEliminarkit_producto" style="visibility:visible">
								<div id="divEliminarkit_producto" style="display:table-row">
									<input type="button" id="btnEliminarkit_producto" name="btnEliminarkit_producto" title="ELIMINAR Kits Producto ACTUAL" value="Eliminar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnImprimirkit_producto" style="visibility:visible">
								<input type="button" id="btnImprimirkit_producto" name="btnImprimirkit_producto" title="IMPRIMIR PAGINA Kits Producto ACTUAL" value="Imp. Datos" class="btn btn-primary"/>
							</td>
							<td id="tdbtnCancelarkit_producto" style="visibility:visible">
								<input type="button" id="btnCancelarkit_producto" name="btnCancelarkit_producto" title="CANCELAR Kits Producto ACTUAL" value="Cancelar" class="btn btn-primary"/>
							</td>
						</tr>
						<tr id="trAccionesMantenimientokit_productoGuardar" style="display:none">
							<td id="tdbtnGuardarCambioskit_producto" colspan="4" align="center" style="visibility:visible">
								<div id="divGuardarCambioskit_producto" style="display:table-row">
									<input type="button" id="btnGuardarCambiosFormulariokit_producto" name="btnGuardarCambiosFormulariokit_producto" title="GUARDAR" value="GUADAR CAMBIOS" class="btn btn-primary"/>
								</div>
							</td>
						</tr>
					</table> <!-- tblAccionesMantenimientokit_producto -->
			</td>
		</tr> <!-- trkit_productoAcciones -->
		<?php if(kit_producto_web::$STR_ES_RELACIONADO=='false' ) {?>
		<tr id="trkit_productoParametrosAcciones" class="impresion"  style="display:table-row">
			<td align="center">
				<!-- SECCION/POST -->
				<table id="tblkit_productoParametrosAcciones" style="text-align: center;border: 0px solid black;padding: 0px; border-spacing: 0px">
					<caption class="busquedacabecera" style="padding: 0px;caption-side: top;">
						<span>Acciones Extra/Post</span>
					</caption>
					<tr id="trkit_productoFilaParametrosAcciones">
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
				</table> <!-- tblkit_productoParametrosAcciones -->
			</td>
		</tr> <!-- trkit_productoParametrosAcciones -->
		<?php }?>
		<tr id="trkit_productoMensajes" class="mensajes">
			<td align="center">
				<a id="Mensajes"></a>
			</td>
		</tr> <!-- trkit_productoMensajes -->
			</table> <!-- tblkit_productoAcciones -->
			<?php } ?>
			</form> <!-- frmMantenimientokit_producto -->
			</div> <!-- divMantenimientokit_productoAjaxWebPart -->
		</td>
	</tr> <!-- trkit_productoElementosFormulario/super -->
		<?php if(kit_producto_web::$STR_ES_RELACIONADO=='false' ) {?>

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
			
				import {kit_producto_webcontrol,kit_producto_webcontrol1} from './webroot/js/JavaScript/contabilidad/inventario/kit_producto/js/webcontrol/kit_producto_form_webcontrol.js?random=1';
				
				kit_producto_webcontrol1.setkit_producto_constante(window.kit_producto_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(kit_producto_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

