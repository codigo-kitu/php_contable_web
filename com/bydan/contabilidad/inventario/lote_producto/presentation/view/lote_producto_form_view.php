<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\inventario\lote_producto\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Lotes Producto Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/inventario/lote_producto/util/lote_producto_carga.php');
	use com\bydan\contabilidad\inventario\lote_producto\util\lote_producto_carga;
	
	//include_once('com/bydan/contabilidad/inventario/lote_producto/presentation/view/lote_producto_web.php');
	//use com\bydan\contabilidad\inventario\lote_producto\presentation\view\lote_producto_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	lote_producto_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	lote_producto_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$lote_producto_web1= new lote_producto_web();	
	$lote_producto_web1->cargarDatosGenerales();
	
	//$moduloActual=$lote_producto_web1->moduloActual;
	//$usuarioActual=$lote_producto_web1->usuarioActual;
	//$sessionBase=$lote_producto_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$lote_producto_web1->parametroGeneralUsuarioActual;
	
	
		
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
		
		
			<script type="module" src="webroot/js/JavaScript/contabilidad/inventario/lote_producto/js/util/lote_producto_form_funcion.js?random=1"></script>
						
		
		
		<?php 
			
		
			lote_producto_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					lote_producto_web::$GET_POST=$_GET;
				} else {
					lote_producto_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			lote_producto_web::$STR_NOMBRE_PAGINA = 'lote_producto_form_view.php';
			lote_producto_web::$BIT_ES_PAGINA_PRINCIPAL = 'false';
			lote_producto_web::$BIT_ES_PAGINA_FORM = 'true';
				
			lote_producto_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {lote_producto_constante,lote_producto_constante1} from './webroot/js/JavaScript/contabilidad/inventario/lote_producto/js/util/lote_producto_constante.js?random=1';
			import {lote_producto_funcion,lote_producto_funcion1} from './webroot/js/JavaScript/contabilidad/inventario/lote_producto/js/util/lote_producto_funcion.js?random=1';
			
			let lote_producto_constante2 = new lote_producto_constante();
			
			lote_producto_constante2.STR_NOMBRE_PAGINA="<?php echo(lote_producto_web::$STR_NOMBRE_PAGINA); ?>";
			lote_producto_constante2.STR_TYPE_ON_LOADlote_producto="<?php echo(lote_producto_web::$STR_TYPE_ONLOAD); ?>";
			lote_producto_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(lote_producto_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			lote_producto_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(lote_producto_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			lote_producto_constante2.STR_ACTION="<?php echo(lote_producto_web::$STR_ACTION); ?>";
			lote_producto_constante2.STR_ES_POPUP="<?php echo(lote_producto_web::$STR_ES_POPUP); ?>";
			lote_producto_constante2.STR_ES_BUSQUEDA="<?php echo(lote_producto_web::$STR_ES_BUSQUEDA); ?>";
			lote_producto_constante2.STR_FUNCION_JS="<?php echo(lote_producto_web::$STR_FUNCION_JS); ?>";
			lote_producto_constante2.BIG_ID_ACTUAL="<?php echo(lote_producto_web::$BIG_ID_ACTUAL); ?>";
			lote_producto_constante2.BIG_ID_OPCION="<?php echo(lote_producto_web::$BIG_ID_OPCION); ?>";
			lote_producto_constante2.STR_OBJETO_JS="<?php echo(lote_producto_web::$STR_OBJETO_JS); ?>";
			lote_producto_constante2.STR_ES_RELACIONES="<?php echo(lote_producto_web::$STR_ES_RELACIONES); ?>";
			lote_producto_constante2.STR_ES_RELACIONADO="<?php echo(lote_producto_web::$STR_ES_RELACIONADO); ?>";
			lote_producto_constante2.STR_ES_SUB_PAGINA="<?php echo(lote_producto_web::$STR_ES_SUB_PAGINA); ?>";
			lote_producto_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(lote_producto_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			lote_producto_constante2.BIT_ES_PAGINA_FORM=<?php echo(lote_producto_web::$BIT_ES_PAGINA_FORM); ?>;
			lote_producto_constante2.STR_SUFIJO="<?php echo(lote_producto_web::$STR_SUF); ?>";//lote_producto
			lote_producto_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(lote_producto_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//lote_producto
			
			lote_producto_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(lote_producto_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			lote_producto_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($lote_producto_web1->moduloActual->getnombre()); ?>";
			lote_producto_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(lote_producto_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			lote_producto_constante2.BIT_ES_LOAD_NORMAL=true;
			/*lote_producto_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			lote_producto_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.lote_producto_constante2 = lote_producto_constante2;
			
		</script>
		
		<?php if(lote_producto_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.lote_producto_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.lote_producto_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="lote_productoActual" ></a>
	
	<div id="divResumenlote_productoActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(lote_producto_web::$STR_ES_RELACIONADO=='false') {?>
		
		<div id="header" >
		
			<div id="banner">
				<span id="spanTituloBanner" class="titulobanner"></span>
			</div> <!-- banner -->
					
			<div id="subheader" class="links">  
			
						
			</div> <!-- sub-header -->
			
			
		</div> <!-- header -->
		
		<?php } ?>
		
		<div id="main">
		

			<?php if(lote_producto_web::$STR_ES_RELACIONADO=='false') {?>
			
			
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(lote_producto_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(lote_producto_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divlote_productoPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tbllote_productoPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmlote_productoAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnlote_productoAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="lote_producto_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnlote_productoAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmlote_productoAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tbllote_productoPopupAjaxWebPart -->
		</div> <!-- divlote_productoPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->		
		
		
		
			
<tr id="trlote_productoElementosFormulario">
	<td>
		<div id="divMantenimientolote_productoAjaxWebPart" title="LOTES PRODUCTO" style="height: 90%;width: 90%;position: relative;top: 30px;left: 30px;">
			<form id="frmMantenimientolote_producto" name="frmMantenimientolote_producto">

			</br>

			<?php if(lote_producto_web::$STR_ES_RELACIONES=='false' ) {?>
			</br>
			<?php } ?>

			<!-- SECCION/TOOLBAR -->
			<table id="tbllote_productoToolBarFormularioExterior" style="width: 65%">
				<tr style="display:table-row">
					<td align="center">

						<table id="tbllote_productoToolBarFormulario" style="text-align: center"  style="display:table-row">
							<tr>
								<td id="tdlote_productoActualizarToolBar" style="visibility:visible">
									<img id="imgActualizarToolBarlote_producto" name="imgActualizarToolBarlote_producto" title="ACTUALIZAR Lotes Producto ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/actualizar.gif" width="25" height="25"/>
								</td>
								<td id="tdlote_productoEliminarToolBar" style="visibility:visible">
									<img id="imgEliminarToolBarlote_producto" name="imgEliminarToolBarlote_producto" title="ELIMINAR Lotes Producto ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/eliminar.gif" width="25" height="25"/>
								</td>
								<td id="tdlote_productoCancelarToolBar" style="visibility:visible">
									<img id="imgCancelarToolBarlote_producto" name="imgCancelarToolBarlote_producto" title="CANCELAR Lotes Producto ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/cancelar.gif" width="25" height="25"/>
								</td>
								<td id="tdlote_productoRelacionesToolBar" style="display:table-row">
									<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/xexpand.png" width="25" height="25" onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('tblCamposOcultoslote_producto',this,'../')"/>
								</td>
							</tr>
						</table> <!-- tbllote_productoToolBarFormulario -->

					</td>
				</tr>
			</table> <!-- tbllote_productoToolBarFormularioExterior -->

			<table id="tbllote_productoElementos">
			<tr id="trlote_productoElementos" class="elementos" style="display:table-row">
			<td align="center">

			<a id="Campos"></a>

				<?php if(lote_producto_web::$STR_ES_RELACIONES=='false' ) {?>
				<div id="divFlechaArribaElementos" align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
					<span></span>
				</div>
				<?php } ?>

				<!-- SECCION/FORMULARIO -->
				<table id="tblElementoslote_producto" class="elementos" style="width: 350px; padding: 0px; border-spacing: 0px; border-collapse: collapse; text-align: left;">
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
					<tr id="tr_fila_2">
						<td id="td_title-nro_lote" class="titulocampo">
							<label class="form-label">Nro Lote.(*)</label>
						</td>
						<td id="td_control-nro_lote" align="left" class="controlcampo">
							<input id="form-nro_lote" name="form-nro_lote" type="text" class="form-control"  placeholder="Nro Lote"  title="Nro Lote"    size="20"  maxlength="50"/>
							<span id="spanstrMensajenro_lote" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-descripcion" class="titulocampo">
							<label class="form-label">Descripcion.(*)</label>
						</td>
						<td id="td_control-descripcion" align="left" class="controlcampo">
							<input id="form-descripcion" name="form-descripcion" type="text" class="form-control"  placeholder="Descripcion"  title="Descripcion"    size="20"  maxlength="30"/>
							<span id="spanstrMensajedescripcion" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_3">
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
					
					
						<td id="td_title-fecha_ingreso" class="titulocampo">
							<label class="form-label">Fecha Ingreso.(*)</label>
						</td>
						<td id="td_control-fecha_ingreso" align="left" class="controlcampo">
							<input id="form-fecha_ingreso" name="form-fecha_ingreso" type="text" class="form-control"  placeholder="Fecha Ingreso"  title="Fecha Ingreso"    size="10" >
							<span id="spanstrMensajefecha_ingreso" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_4">
						<td id="td_title-fecha_expiracion" class="titulocampo">
							<label class="form-label">Fecha Expiracion.(*)</label>
						</td>
						<td id="td_control-fecha_expiracion" align="left" class="controlcampo">
							<input id="form-fecha_expiracion" name="form-fecha_expiracion" type="text" class="form-control"  placeholder="Fecha Expiracion"  title="Fecha Expiracion"    size="10" >
							<span id="spanstrMensajefecha_expiracion" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-ubicacion" class="titulocampo">
							<label class="form-label">Ubicacion.(*)</label>
						</td>
						<td id="td_control-ubicacion" align="left" class="controlcampo">
							<input id="form-ubicacion" name="form-ubicacion" type="text" class="form-control"  placeholder="Ubicacion"  title="Ubicacion"    size="20"  maxlength="20"/>
							<span id="spanstrMensajeubicacion" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_5">
						<td id="td_title-cantidad" class="titulocampo">
							<label class="form-label">Cantidad.(*)</label>
						</td>
						<td id="td_control-cantidad" align="left" class="controlcampo">
							<input id="form-cantidad" name="form-cantidad" type="text" class="form-control"  placeholder="Cantidad"  title="Cantidad"    maxlength="18" size="12" >
							<span id="spanstrMensajecantidad" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-comentario" class="titulocampo">
							<label class="form-label">Comentario.(*)</label>
						</td>
						<td id="td_control-comentario" align="left" class="controlcampo">
							<textarea id="form-comentario" name="form-comentario" class="form-control"  placeholder="Comentario"  title="Comentario"   style="font-size: 13px;"  rows ="0" cols= "25"></textarea>
							<span id="spanstrMensajecomentario" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_6">
						<td id="td_title-nro_documento" class="titulocampo">
							<label class="form-label">Nro Documento.(*)</label>
						</td>
						<td id="td_control-nro_documento" align="left" class="controlcampo">
							<input id="form-nro_documento" name="form-nro_documento" type="text" class="form-control"  placeholder="Nro Documento"  title="Nro Documento"    maxlength="10" size="10" >
							<span id="spanstrMensajenro_documento" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-disponible" class="titulocampo">
							<label class="form-label">Disponible.(*)</label>
						</td>
						<td id="td_control-disponible" align="left" class="controlcampo">
							<input id="form-disponible" name="form-disponible" type="text" class="form-control"  placeholder="Disponible"  title="Disponible"    maxlength="18" size="12" >
							<span id="spanstrMensajedisponible" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_7">
						<td id="td_title-agotado_en" class="titulocampo">
							<label class="form-label">Agotado En.(*)</label>
						</td>
						<td id="td_control-agotado_en" align="left" class="controlcampo">
							<input id="form-agotado_en" name="form-agotado_en" type="text" class="form-control"  placeholder="Agotado En"  title="Agotado En"    size="10" >
							<span id="spanstrMensajeagotado_en" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-nro_item" class="titulocampo">
							<label class="form-label">Nro Item.(*)</label>
						</td>
						<td id="td_control-nro_item" align="left" class="controlcampo">
							<input id="form-nro_item" name="form-nro_item" type="text" class="form-control"  placeholder="Nro Item"  title="Nro Item"    maxlength="10" size="10" >
							<span id="spanstrMensajenro_item" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_8">
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
					<td></td><td></td></tr>
				</table> <!-- tblElementoslote_producto -->

				<!-- SECCION/OCULTOS -->
				<table id="tblCamposOcultoslote_producto" class="elementos" style="display: table-row;">
					<caption class="busquedacabecera">
						<span>Campos Ocultos</span>
					</caption>
				</table> <!-- tblCamposOcultoslote_producto -->

			</td></tr> <!-- trlote_productoElementos -->
			</table> <!-- tbllote_productoElementos -->
			</form> <!-- frmMantenimientolote_producto -->


			

				<form id="frmAccionesMantenimientolote_producto" name="frmAccionesMantenimientolote_producto">

			<?php if(lote_producto_web::$STR_ES_BUSQUEDA=='false' ) {?>
			<table id="tbllote_productoAcciones" class="elementos" style="text-align: center">
		<tr id="trlote_productoAcciones" class="elementos" style="display:table-row">
			<td align="center">
				<a id="Acciones" ></a>

				<?php if(lote_producto_web::$STR_ES_RELACIONES=='false' ) {?>
				<div align="right">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
				<?php } ?>

					<!-- SECCION/BOTONES -->
					<table id="tblAccionesMantenimientolote_producto" class="busqueda" style="width: 50%;text-align: left">

						<?php if(lote_producto_web::$STR_ES_RELACIONES=='false' ) {?>
						<!--
						<caption class="busquedacabecera">
							<span>Acciones</span>
						</caption>
						-->
						<?php } ?>

						<tr id="trAccionesMantenimientolote_productoBasicos">
							<td id="tdbtnNuevolote_producto" style="visibility:visible">
								<div id="divNuevolote_producto" style="display:table-row">
									<input type="button" id="btnNuevolote_producto" name="btnNuevolote_producto" value="NUEVO" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnActualizarlote_producto" style="visibility:visible">
								<div id="divActualizarlote_producto" style="display:table-row">
									<input type="button" id="btnActualizarlote_producto" name="btnActualizarlote_producto" title="ACTUALIZAR Lotes Producto ACTUAL" value="Actualizar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnEliminarlote_producto" style="visibility:visible">
								<div id="divEliminarlote_producto" style="display:table-row">
									<input type="button" id="btnEliminarlote_producto" name="btnEliminarlote_producto" title="ELIMINAR Lotes Producto ACTUAL" value="Eliminar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnImprimirlote_producto" style="visibility:visible">
								<input type="button" id="btnImprimirlote_producto" name="btnImprimirlote_producto" title="IMPRIMIR PAGINA Lotes Producto ACTUAL" value="Imp. Datos" class="btn btn-primary"/>
							</td>
							<td id="tdbtnCancelarlote_producto" style="visibility:visible">
								<input type="button" id="btnCancelarlote_producto" name="btnCancelarlote_producto" title="CANCELAR Lotes Producto ACTUAL" value="Cancelar" class="btn btn-primary"/>
							</td>
						</tr>
						<tr id="trAccionesMantenimientolote_productoGuardar" style="display:none">
							<td id="tdbtnGuardarCambioslote_producto" colspan="4" align="center" style="visibility:visible">
								<div id="divGuardarCambioslote_producto" style="display:table-row">
									<input type="button" id="btnGuardarCambiosFormulariolote_producto" name="btnGuardarCambiosFormulariolote_producto" title="GUARDAR" value="GUADAR CAMBIOS" class="btn btn-primary"/>
								</div>
							</td>
						</tr>
					</table> <!-- tblAccionesMantenimientolote_producto -->
			</td>
		</tr> <!-- trlote_productoAcciones -->
		<?php if(lote_producto_web::$STR_ES_RELACIONADO=='false' ) {?>
		<tr id="trlote_productoParametrosAcciones" class="impresion"  style="display:table-row">
			<td align="center">
				<!-- SECCION/POST -->
				<table id="tbllote_productoParametrosAcciones" style="text-align: center;border: 0px solid black;padding: 0px; border-spacing: 0px">
					<caption class="busquedacabecera" style="padding: 0px;caption-side: top;">
						<span>Acciones Extra/Post</span>
					</caption>
					<tr id="trlote_productoFilaParametrosAcciones">
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
				</table> <!-- tbllote_productoParametrosAcciones -->
			</td>
		</tr> <!-- trlote_productoParametrosAcciones -->
		<?php }?>
		<tr id="trlote_productoMensajes" class="mensajes">
			<td align="center">
				<a id="Mensajes"></a>
			</td>
		</tr> <!-- trlote_productoMensajes -->
			</table> <!-- tbllote_productoAcciones -->
			<?php } ?>
			</form> <!-- frmMantenimientolote_producto -->
			</div> <!-- divMantenimientolote_productoAjaxWebPart -->
		</td>
	</tr> <!-- trlote_productoElementosFormulario/super -->
		<?php if(lote_producto_web::$STR_ES_RELACIONADO=='false' ) {?>

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
			
				import {lote_producto_webcontrol,lote_producto_webcontrol1} from './webroot/js/JavaScript/contabilidad/inventario/lote_producto/js/webcontrol/lote_producto_form_webcontrol.js?random=1';
				
				lote_producto_webcontrol1.setlote_producto_constante(window.lote_producto_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(lote_producto_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

