<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\inventario\serial_producto\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Seriales Producto Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/inventario/serial_producto/util/serial_producto_carga.php');
	use com\bydan\contabilidad\inventario\serial_producto\util\serial_producto_carga;
	
	//include_once('com/bydan/contabilidad/inventario/serial_producto/presentation/view/serial_producto_web.php');
	//use com\bydan\contabilidad\inventario\serial_producto\presentation\view\serial_producto_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	serial_producto_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	serial_producto_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$serial_producto_web1= new serial_producto_web();	
	$serial_producto_web1->cargarDatosGenerales();
	
	//$moduloActual=$serial_producto_web1->moduloActual;
	//$usuarioActual=$serial_producto_web1->usuarioActual;
	//$sessionBase=$serial_producto_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$serial_producto_web1->parametroGeneralUsuarioActual;
	
	
		
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
		
		
			<script type="module" src="webroot/js/JavaScript/contabilidad/inventario/serial_producto/js/util/serial_producto_form_funcion.js?random=1"></script>
						
		
		
		<?php 
			
		
			serial_producto_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					serial_producto_web::$GET_POST=$_GET;
				} else {
					serial_producto_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			serial_producto_web::$STR_NOMBRE_PAGINA = 'serial_producto_form_view.php';
			serial_producto_web::$BIT_ES_PAGINA_PRINCIPAL = 'false';
			serial_producto_web::$BIT_ES_PAGINA_FORM = 'true';
				
			serial_producto_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {serial_producto_constante,serial_producto_constante1} from './webroot/js/JavaScript/contabilidad/inventario/serial_producto/js/util/serial_producto_constante.js?random=1';
			import {serial_producto_funcion,serial_producto_funcion1} from './webroot/js/JavaScript/contabilidad/inventario/serial_producto/js/util/serial_producto_funcion.js?random=1';
			
			let serial_producto_constante2 = new serial_producto_constante();
			
			serial_producto_constante2.STR_NOMBRE_PAGINA="<?php echo(serial_producto_web::$STR_NOMBRE_PAGINA); ?>";
			serial_producto_constante2.STR_TYPE_ON_LOADserial_producto="<?php echo(serial_producto_web::$STR_TYPE_ONLOAD); ?>";
			serial_producto_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(serial_producto_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			serial_producto_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(serial_producto_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			serial_producto_constante2.STR_ACTION="<?php echo(serial_producto_web::$STR_ACTION); ?>";
			serial_producto_constante2.STR_ES_POPUP="<?php echo(serial_producto_web::$STR_ES_POPUP); ?>";
			serial_producto_constante2.STR_ES_BUSQUEDA="<?php echo(serial_producto_web::$STR_ES_BUSQUEDA); ?>";
			serial_producto_constante2.STR_FUNCION_JS="<?php echo(serial_producto_web::$STR_FUNCION_JS); ?>";
			serial_producto_constante2.BIG_ID_ACTUAL="<?php echo(serial_producto_web::$BIG_ID_ACTUAL); ?>";
			serial_producto_constante2.BIG_ID_OPCION="<?php echo(serial_producto_web::$BIG_ID_OPCION); ?>";
			serial_producto_constante2.STR_OBJETO_JS="<?php echo(serial_producto_web::$STR_OBJETO_JS); ?>";
			serial_producto_constante2.STR_ES_RELACIONES="<?php echo(serial_producto_web::$STR_ES_RELACIONES); ?>";
			serial_producto_constante2.STR_ES_RELACIONADO="<?php echo(serial_producto_web::$STR_ES_RELACIONADO); ?>";
			serial_producto_constante2.STR_ES_SUB_PAGINA="<?php echo(serial_producto_web::$STR_ES_SUB_PAGINA); ?>";
			serial_producto_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(serial_producto_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			serial_producto_constante2.BIT_ES_PAGINA_FORM=<?php echo(serial_producto_web::$BIT_ES_PAGINA_FORM); ?>;
			serial_producto_constante2.STR_SUFIJO="<?php echo(serial_producto_web::$STR_SUF); ?>";//serial_producto
			serial_producto_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(serial_producto_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//serial_producto
			
			serial_producto_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(serial_producto_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			serial_producto_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($serial_producto_web1->moduloActual->getnombre()); ?>";
			serial_producto_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(serial_producto_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			serial_producto_constante2.BIT_ES_LOAD_NORMAL=true;
			/*serial_producto_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			serial_producto_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.serial_producto_constante2 = serial_producto_constante2;
			
		</script>
		
		<?php if(serial_producto_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.serial_producto_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.serial_producto_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="serial_productoActual" ></a>
	
	<div id="divResumenserial_productoActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(serial_producto_web::$STR_ES_RELACIONADO=='false') {?>
		
		<div id="header" >
		
			<div id="banner">
				<span id="spanTituloBanner" class="titulobanner"></span>
			</div> <!-- banner -->
					
			<div id="subheader" class="links">  
			
						
			</div> <!-- sub-header -->
			
			
		</div> <!-- header -->
		
		<?php } ?>
		
		<div id="main">
		

			<?php if(serial_producto_web::$STR_ES_RELACIONADO=='false') {?>
			
			
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(serial_producto_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(serial_producto_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divserial_productoPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblserial_productoPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmserial_productoAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnserial_productoAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="serial_producto_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnserial_productoAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmserial_productoAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblserial_productoPopupAjaxWebPart -->
		</div> <!-- divserial_productoPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->		
		
		
		
			
<tr id="trserial_productoElementosFormulario">
	<td>
		<div id="divMantenimientoserial_productoAjaxWebPart" title="SERIALES PRODUCTO" style="height: 90%;width: 90%;position: relative;top: 30px;left: 30px;">
			<form id="frmMantenimientoserial_producto" name="frmMantenimientoserial_producto">

			</br>

			<?php if(serial_producto_web::$STR_ES_RELACIONES=='false' ) {?>
			</br>
			<?php } ?>

			<!-- SECCION/TOOLBAR -->
			<table id="tblserial_productoToolBarFormularioExterior" style="width: 65%">
				<tr style="display:table-row">
					<td align="center">

						<table id="tblserial_productoToolBarFormulario" style="text-align: center"  style="display:table-row">
							<tr>
								<td id="tdserial_productoActualizarToolBar" style="visibility:visible">
									<img id="imgActualizarToolBarserial_producto" name="imgActualizarToolBarserial_producto" title="ACTUALIZAR Seriales Producto ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/actualizar.gif" width="25" height="25"/>
								</td>
								<td id="tdserial_productoEliminarToolBar" style="visibility:visible">
									<img id="imgEliminarToolBarserial_producto" name="imgEliminarToolBarserial_producto" title="ELIMINAR Seriales Producto ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/eliminar.gif" width="25" height="25"/>
								</td>
								<td id="tdserial_productoCancelarToolBar" style="visibility:visible">
									<img id="imgCancelarToolBarserial_producto" name="imgCancelarToolBarserial_producto" title="CANCELAR Seriales Producto ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/cancelar.gif" width="25" height="25"/>
								</td>
								<td id="tdserial_productoRelacionesToolBar" style="display:table-row">
									<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/xexpand.png" width="25" height="25" onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('tblCamposOcultosserial_producto',this,'../')"/>
								</td>
							</tr>
						</table> <!-- tblserial_productoToolBarFormulario -->

					</td>
				</tr>
			</table> <!-- tblserial_productoToolBarFormularioExterior -->

			<table id="tblserial_productoElementos">
			<tr id="trserial_productoElementos" class="elementos" style="display:table-row">
			<td align="center">

			<a id="Campos"></a>

				<?php if(serial_producto_web::$STR_ES_RELACIONES=='false' ) {?>
				<div id="divFlechaArribaElementos" align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
					<span></span>
				</div>
				<?php } ?>

				<!-- SECCION/FORMULARIO -->
				<table id="tblElementosserial_producto" class="elementos" style="width: 400px; padding: 0px; border-spacing: 0px; border-collapse: collapse; text-align: left;">
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
						<td id="td_title-nro_serial" class="titulocampo">
							<label class="form-label">Nro Serial.(*)</label>
						</td>
						<td id="td_control-nro_serial" align="left" class="controlcampo">
							<textarea id="form-nro_serial" name="form-nro_serial" class="form-control"  placeholder="Nro Serial"  title="Nro Serial"   style="font-size: 13px;"  rows ="0" cols= "25"></textarea>
							<span id="spanstrMensajenro_serial" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-ingresado" class="titulocampo">
							<label class="form-label">Ingresado.(*)</label>
						</td>
						<td id="td_control-ingresado" align="left" class="controlcampo">
							<input id="form-ingresado" name="form-ingresado" type="text" class="form-control"  placeholder="Ingresado"  title="Ingresado"    size="10" >
							<span id="spanstrMensajeingresado" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_3">
						<td id="td_title-proveedor_mid" class="titulocampo">
							<label class="form-label">Proveedor Mid.(*)</label>
						</td>
						<td id="td_control-proveedor_mid" align="left" class="controlcampo">
							<input id="form-proveedor_mid" name="form-proveedor_mid" type="text" class="form-control"  placeholder="Proveedor Mid"  title="Proveedor Mid"    maxlength="10" size="10" >
							<span id="spanstrMensajeproveedor_mid" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-modulo_ingreso" class="titulocampo">
							<label class="form-label">Modulo Ingreso.(*)</label>
						</td>
						<td id="td_control-modulo_ingreso" align="left" class="controlcampo">
							<input id="form-modulo_ingreso" name="form-modulo_ingreso" type="text" class="form-control"  placeholder="Modulo Ingreso"  title="Modulo Ingreso"    size="3"  maxlength="3"/>
							<span id="spanstrMensajemodulo_ingreso" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_4">
						<td id="td_title-nro_documento_ingreso" class="titulocampo">
							<label class="form-label">Nro Documento Ingreso.(*)</label>
						</td>
						<td id="td_control-nro_documento_ingreso" align="left" class="controlcampo">
							<input id="form-nro_documento_ingreso" name="form-nro_documento_ingreso" type="text" class="form-control"  placeholder="Nro Documento Ingreso"  title="Nro Documento Ingreso"    size="10"  maxlength="10"/>
							<span id="spanstrMensajenro_documento_ingreso" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-salida" class="titulocampo">
							<label class="form-label">Salida.(*)</label>
						</td>
						<td id="td_control-salida" align="left" class="controlcampo">
							<input id="form-salida" name="form-salida" type="text" class="form-control"  placeholder="Salida"  title="Salida"    size="10" >
							<span id="spanstrMensajesalida" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_5">
						<td id="td_title-cliente_mid" class="titulocampo">
							<label class="form-label">Cliente Mid.(*)</label>
						</td>
						<td id="td_control-cliente_mid" align="left" class="controlcampo">
							<input id="form-cliente_mid" name="form-cliente_mid" type="text" class="form-control"  placeholder="Cliente Mid"  title="Cliente Mid"    maxlength="10" size="10" >
							<span id="spanstrMensajecliente_mid" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-modulo_salida" class="titulocampo">
							<label class="form-label">Modulo Salida.(*)</label>
						</td>
						<td id="td_control-modulo_salida" align="left" class="controlcampo">
							<input id="form-modulo_salida" name="form-modulo_salida" type="text" class="form-control"  placeholder="Modulo Salida"  title="Modulo Salida"    size="3"  maxlength="3"/>
							<span id="spanstrMensajemodulo_salida" class="mensajeerror"></span>
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
					
					
						<td id="td_title-nro_item" class="titulocampo">
							<label class="form-label">Nro Item.(*)</label>
						</td>
						<td id="td_control-nro_item" align="left" class="controlcampo">
							<input id="form-nro_item" name="form-nro_item" type="text" class="form-control"  placeholder="Nro Item"  title="Nro Item"    maxlength="10" size="10" >
							<span id="spanstrMensajenro_item" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_7">
						<td id="td_title-nro_documento_salida" class="titulocampo">
							<label class="form-label">Nro Documento Salida.(*)</label>
						</td>
						<td id="td_control-nro_documento_salida" align="left" class="controlcampo">
							<input id="form-nro_documento_salida" name="form-nro_documento_salida" type="text" class="form-control"  placeholder="Nro Documento Salida"  title="Nro Documento Salida"    size="10"  maxlength="10"/>
							<span id="spanstrMensajenro_documento_salida" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-nro_items" class="titulocampo">
							<label class="form-label">Nro Items.(*)</label>
						</td>
						<td id="td_control-nro_items" align="left" class="controlcampo">
							<input id="form-nro_items" name="form-nro_items" type="text" class="form-control"  placeholder="Nro Items"  title="Nro Items"    maxlength="10" size="10" >
							<span id="spanstrMensajenro_items" class="mensajeerror"></span>
						</td>
					</tr>
				</table> <!-- tblElementosserial_producto -->

				<!-- SECCION/OCULTOS -->
				<table id="tblCamposOcultosserial_producto" class="elementos" style="display: table-row;">
					<caption class="busquedacabecera">
						<span>Campos Ocultos</span>
					</caption>
				</table> <!-- tblCamposOcultosserial_producto -->

			</td></tr> <!-- trserial_productoElementos -->
			</table> <!-- tblserial_productoElementos -->
			</form> <!-- frmMantenimientoserial_producto -->


			

				<form id="frmAccionesMantenimientoserial_producto" name="frmAccionesMantenimientoserial_producto">

			<?php if(serial_producto_web::$STR_ES_BUSQUEDA=='false' ) {?>
			<table id="tblserial_productoAcciones" class="elementos" style="text-align: center">
		<tr id="trserial_productoAcciones" class="elementos" style="display:table-row">
			<td align="center">
				<a id="Acciones" ></a>

				<?php if(serial_producto_web::$STR_ES_RELACIONES=='false' ) {?>
				<div align="right">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
				<?php } ?>

					<!-- SECCION/BOTONES -->
					<table id="tblAccionesMantenimientoserial_producto" class="busqueda" style="width: 50%;text-align: left">

						<?php if(serial_producto_web::$STR_ES_RELACIONES=='false' ) {?>
						<!--
						<caption class="busquedacabecera">
							<span>Acciones</span>
						</caption>
						-->
						<?php } ?>

						<tr id="trAccionesMantenimientoserial_productoBasicos">
							<td id="tdbtnNuevoserial_producto" style="visibility:visible">
								<div id="divNuevoserial_producto" style="display:table-row">
									<input type="button" id="btnNuevoserial_producto" name="btnNuevoserial_producto" value="NUEVO" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnActualizarserial_producto" style="visibility:visible">
								<div id="divActualizarserial_producto" style="display:table-row">
									<input type="button" id="btnActualizarserial_producto" name="btnActualizarserial_producto" title="ACTUALIZAR Seriales Producto ACTUAL" value="Actualizar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnEliminarserial_producto" style="visibility:visible">
								<div id="divEliminarserial_producto" style="display:table-row">
									<input type="button" id="btnEliminarserial_producto" name="btnEliminarserial_producto" title="ELIMINAR Seriales Producto ACTUAL" value="Eliminar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnImprimirserial_producto" style="visibility:visible">
								<input type="button" id="btnImprimirserial_producto" name="btnImprimirserial_producto" title="IMPRIMIR PAGINA Seriales Producto ACTUAL" value="Imp. Datos" class="btn btn-primary"/>
							</td>
							<td id="tdbtnCancelarserial_producto" style="visibility:visible">
								<input type="button" id="btnCancelarserial_producto" name="btnCancelarserial_producto" title="CANCELAR Seriales Producto ACTUAL" value="Cancelar" class="btn btn-primary"/>
							</td>
						</tr>
						<tr id="trAccionesMantenimientoserial_productoGuardar" style="display:none">
							<td id="tdbtnGuardarCambiosserial_producto" colspan="4" align="center" style="visibility:visible">
								<div id="divGuardarCambiosserial_producto" style="display:table-row">
									<input type="button" id="btnGuardarCambiosFormularioserial_producto" name="btnGuardarCambiosFormularioserial_producto" title="GUARDAR" value="GUADAR CAMBIOS" class="btn btn-primary"/>
								</div>
							</td>
						</tr>
					</table> <!-- tblAccionesMantenimientoserial_producto -->
			</td>
		</tr> <!-- trserial_productoAcciones -->
		<?php if(serial_producto_web::$STR_ES_RELACIONADO=='false' ) {?>
		<tr id="trserial_productoParametrosAcciones" class="impresion"  style="display:table-row">
			<td align="center">
				<!-- SECCION/POST -->
				<table id="tblserial_productoParametrosAcciones" style="text-align: center;border: 0px solid black;padding: 0px; border-spacing: 0px">
					<caption class="busquedacabecera" style="padding: 0px;caption-side: top;">
						<span>Acciones Extra/Post</span>
					</caption>
					<tr id="trserial_productoFilaParametrosAcciones">
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
				</table> <!-- tblserial_productoParametrosAcciones -->
			</td>
		</tr> <!-- trserial_productoParametrosAcciones -->
		<?php }?>
		<tr id="trserial_productoMensajes" class="mensajes">
			<td align="center">
				<a id="Mensajes"></a>
			</td>
		</tr> <!-- trserial_productoMensajes -->
			</table> <!-- tblserial_productoAcciones -->
			<?php } ?>
			</form> <!-- frmMantenimientoserial_producto -->
			</div> <!-- divMantenimientoserial_productoAjaxWebPart -->
		</td>
	</tr> <!-- trserial_productoElementosFormulario/super -->
		<?php if(serial_producto_web::$STR_ES_RELACIONADO=='false' ) {?>

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
			
				import {serial_producto_webcontrol,serial_producto_webcontrol1} from './webroot/js/JavaScript/contabilidad/inventario/serial_producto/js/webcontrol/serial_producto_form_webcontrol.js?random=1';
				
				serial_producto_webcontrol1.setserial_producto_constante(window.serial_producto_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(serial_producto_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

