<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\inventario\categoria_producto\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Categoria Producto Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/inventario/categoria_producto/util/categoria_producto_carga.php');
	use com\bydan\contabilidad\inventario\categoria_producto\util\categoria_producto_carga;
	
	//include_once('com/bydan/contabilidad/inventario/categoria_producto/presentation/view/categoria_producto_web.php');
	//use com\bydan\contabilidad\inventario\categoria_producto\presentation\view\categoria_producto_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	categoria_producto_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	categoria_producto_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$categoria_producto_web1= new categoria_producto_web();	
	$categoria_producto_web1->cargarDatosGenerales();
	
	//$moduloActual=$categoria_producto_web1->moduloActual;
	//$usuarioActual=$categoria_producto_web1->usuarioActual;
	//$sessionBase=$categoria_producto_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$categoria_producto_web1->parametroGeneralUsuarioActual;
	
	
		
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
		
		
			<script type="module" src="webroot/js/JavaScript/contabilidad/inventario/categoria_producto/js/util/categoria_producto_form_funcion.js?random=1"></script>
						
		
		
		<?php 
			
		
			categoria_producto_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					categoria_producto_web::$GET_POST=$_GET;
				} else {
					categoria_producto_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			categoria_producto_web::$STR_NOMBRE_PAGINA = 'categoria_producto_form_view.php';
			categoria_producto_web::$BIT_ES_PAGINA_PRINCIPAL = 'false';
			categoria_producto_web::$BIT_ES_PAGINA_FORM = 'true';
				
			categoria_producto_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {categoria_producto_constante,categoria_producto_constante1} from './webroot/js/JavaScript/contabilidad/inventario/categoria_producto/js/util/categoria_producto_constante.js?random=1';
			import {categoria_producto_funcion,categoria_producto_funcion1} from './webroot/js/JavaScript/contabilidad/inventario/categoria_producto/js/util/categoria_producto_funcion.js?random=1';
			
			let categoria_producto_constante2 = new categoria_producto_constante();
			
			categoria_producto_constante2.STR_NOMBRE_PAGINA="<?php echo(categoria_producto_web::$STR_NOMBRE_PAGINA); ?>";
			categoria_producto_constante2.STR_TYPE_ON_LOADcategoria_producto="<?php echo(categoria_producto_web::$STR_TYPE_ONLOAD); ?>";
			categoria_producto_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(categoria_producto_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			categoria_producto_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(categoria_producto_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			categoria_producto_constante2.STR_ACTION="<?php echo(categoria_producto_web::$STR_ACTION); ?>";
			categoria_producto_constante2.STR_ES_POPUP="<?php echo(categoria_producto_web::$STR_ES_POPUP); ?>";
			categoria_producto_constante2.STR_ES_BUSQUEDA="<?php echo(categoria_producto_web::$STR_ES_BUSQUEDA); ?>";
			categoria_producto_constante2.STR_FUNCION_JS="<?php echo(categoria_producto_web::$STR_FUNCION_JS); ?>";
			categoria_producto_constante2.BIG_ID_ACTUAL="<?php echo(categoria_producto_web::$BIG_ID_ACTUAL); ?>";
			categoria_producto_constante2.BIG_ID_OPCION="<?php echo(categoria_producto_web::$BIG_ID_OPCION); ?>";
			categoria_producto_constante2.STR_OBJETO_JS="<?php echo(categoria_producto_web::$STR_OBJETO_JS); ?>";
			categoria_producto_constante2.STR_ES_RELACIONES="<?php echo(categoria_producto_web::$STR_ES_RELACIONES); ?>";
			categoria_producto_constante2.STR_ES_RELACIONADO="<?php echo(categoria_producto_web::$STR_ES_RELACIONADO); ?>";
			categoria_producto_constante2.STR_ES_SUB_PAGINA="<?php echo(categoria_producto_web::$STR_ES_SUB_PAGINA); ?>";
			categoria_producto_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(categoria_producto_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			categoria_producto_constante2.BIT_ES_PAGINA_FORM=<?php echo(categoria_producto_web::$BIT_ES_PAGINA_FORM); ?>;
			categoria_producto_constante2.STR_SUFIJO="<?php echo(categoria_producto_web::$STR_SUF); ?>";//categoria_producto
			categoria_producto_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(categoria_producto_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//categoria_producto
			
			categoria_producto_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(categoria_producto_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			categoria_producto_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($categoria_producto_web1->moduloActual->getnombre()); ?>";
			categoria_producto_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(categoria_producto_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			categoria_producto_constante2.BIT_ES_LOAD_NORMAL=true;
			/*categoria_producto_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			categoria_producto_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.categoria_producto_constante2 = categoria_producto_constante2;
			
		</script>
		
		<?php if(categoria_producto_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.categoria_producto_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.categoria_producto_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="categoria_productoActual" ></a>
	
	<div id="divResumencategoria_productoActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(categoria_producto_web::$STR_ES_RELACIONADO=='false') {?>
		
		<div id="header" >
		
			<div id="banner">
				<span id="spanTituloBanner" class="titulobanner"></span>
			</div> <!-- banner -->
					
			<div id="subheader" class="links">  
			
						
			</div> <!-- sub-header -->
			
			
		</div> <!-- header -->
		
		<?php } ?>
		
		<div id="main">
		

			<?php if(categoria_producto_web::$STR_ES_RELACIONADO=='false') {?>
			
			
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(categoria_producto_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(categoria_producto_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divcategoria_productoPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblcategoria_productoPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmcategoria_productoAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btncategoria_productoAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="categoria_producto_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btncategoria_productoAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmcategoria_productoAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblcategoria_productoPopupAjaxWebPart -->
		</div> <!-- divcategoria_productoPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->		
		
		
		
			
<tr id="trcategoria_productoElementosFormulario">
	<td>
		<div id="divMantenimientocategoria_productoAjaxWebPart" title="CATEGORIA PRODUCTO" style="height: 90%;width: 90%;position: relative;top: 30px;left: 30px;">
			<form id="frmMantenimientocategoria_producto" name="frmMantenimientocategoria_producto">

			</br>

			<?php if(categoria_producto_web::$STR_ES_RELACIONES=='false' ) {?>
			</br>
			<?php } ?>

			<!-- SECCION/TOOLBAR -->
			<table id="tblcategoria_productoToolBarFormularioExterior" style="width: 65%">
				<tr style="display:table-row">
					<td align="center">

						<table id="tblcategoria_productoToolBarFormulario" style="text-align: center"  style="display:table-row">
							<tr>
								<td id="tdcategoria_productoActualizarToolBar" style="visibility:visible">
									<img id="imgActualizarToolBarcategoria_producto" name="imgActualizarToolBarcategoria_producto" title="ACTUALIZAR Categoria Producto ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/actualizar.gif" width="25" height="25"/>
								</td>
								<td id="tdcategoria_productoEliminarToolBar" style="visibility:visible">
									<img id="imgEliminarToolBarcategoria_producto" name="imgEliminarToolBarcategoria_producto" title="ELIMINAR Categoria Producto ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/eliminar.gif" width="25" height="25"/>
								</td>
								<td id="tdcategoria_productoCancelarToolBar" style="visibility:visible">
									<img id="imgCancelarToolBarcategoria_producto" name="imgCancelarToolBarcategoria_producto" title="CANCELAR Categoria Producto ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/cancelar.gif" width="25" height="25"/>
								</td>
								<td id="tdcategoria_productoRelacionesToolBar" style="display:table-row">
									<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/xexpand.png" width="25" height="25" onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('tblCamposOcultoscategoria_producto',this,'../')"/>
								</td>
							</tr>
						</table> <!-- tblcategoria_productoToolBarFormulario -->

					</td>
				</tr>
			</table> <!-- tblcategoria_productoToolBarFormularioExterior -->

			<table id="tblcategoria_productoElementos">
			<tr id="trcategoria_productoElementos" class="elementos" style="display:table-row">
			<td align="center">

			<a id="Campos"></a>

				<?php if(categoria_producto_web::$STR_ES_RELACIONES=='false' ) {?>
				<div id="divFlechaArribaElementos" align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
					<span></span>
				</div>
				<?php } ?>

				<!-- SECCION/FORMULARIO -->
				<table id="tblElementoscategoria_producto" class="elementos" style="width: 350px; padding: 0px; border-spacing: 0px; border-collapse: collapse; text-align: center;">
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
						<td id="td_title-nombre" class="titulocampo">
							<label class="form-label">Nombre.(*)</label>
						</td>
						<td id="td_control-nombre" align="left" class="controlcampo">
							<input id="form-nombre" name="form-nombre" type="text" class="form-control"  placeholder="Nombre"  title="Nombre"    size="20"  maxlength="40"/>
							<span id="spanstrMensajenombre" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_6">
						<td id="td_title-predeterminado" class="titulocampo">
							<label class="form-label">Predeterminado</label>
						</td>
						<td id="td_control-predeterminado" align="left" class="controlcampo">
							<input id="form-predeterminado" name="form-predeterminado" type="checkbox" >
							<span id="spanstrMensajepredeterminado" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_7">
						<td id="td_title-numero_productos" class="titulocampo">
							<label class="form-label">No Productos.(*)</label>
						</td>
						<td id="td_control-numero_productos" align="left" class="controlcampo">
							<input id="form-numero_productos" name="form-numero_productos" type="text" class="form-control"  placeholder="No Productos"  title="No Productos"    maxlength="10" size="10"  readonly="readonly">
							<span id="spanstrMensajenumero_productos" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_8">
						<td id="td_title-imagen" class="titulocampo">
							<label class="form-label">Imagen</label>
						</td>
						<td id="td_control-imagen" align="left" class="controlcampo">
							<textarea id="form-imagen" name="form-imagen" class="form-control"  placeholder="Imagen"  title="Imagen"   style="font-size: 13px;"  rows ="0" cols= "25"></textarea>
							<span id="spanstrMensajeimagen" class="mensajeerror"></span>
						</td>
					</tr>
				</table> <!-- tblElementoscategoria_producto -->

				<!-- SECCION/OCULTOS -->
				<table id="tblCamposOcultoscategoria_producto" class="elementos" style="display: table-row;">
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
					
				</table> <!-- tblCamposOcultoscategoria_producto -->

			</td></tr> <!-- trcategoria_productoElementos -->
			</table> <!-- tblcategoria_productoElementos -->
			</form> <!-- frmMantenimientocategoria_producto -->


			

				<form id="frmAccionesMantenimientocategoria_producto" name="frmAccionesMantenimientocategoria_producto">

			<?php if(categoria_producto_web::$STR_ES_BUSQUEDA=='false' ) {?>
			<table id="tblcategoria_productoAcciones" class="elementos" style="text-align: center">
		<tr id="trcategoria_productoAcciones" class="elementos" style="display:table-row">
			<td align="center">
				<a id="Acciones" ></a>

				<?php if(categoria_producto_web::$STR_ES_RELACIONES=='false' ) {?>
				<div align="right">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
				<?php } ?>

					<!-- SECCION/BOTONES -->
					<table id="tblAccionesMantenimientocategoria_producto" class="busqueda" style="width: 50%;text-align: center">

						<?php if(categoria_producto_web::$STR_ES_RELACIONES=='false' ) {?>
						<!--
						<caption class="busquedacabecera">
							<span>Acciones</span>
						</caption>
						-->
						<?php } ?>

						<tr id="trAccionesMantenimientocategoria_productoBasicos">
							<td id="tdbtnNuevocategoria_producto" style="visibility:visible">
								<div id="divNuevocategoria_producto" style="display:table-row">
									<input type="button" id="btnNuevocategoria_producto" name="btnNuevocategoria_producto" value="NUEVO" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnActualizarcategoria_producto" style="visibility:visible">
								<div id="divActualizarcategoria_producto" style="display:table-row">
									<input type="button" id="btnActualizarcategoria_producto" name="btnActualizarcategoria_producto" title="ACTUALIZAR Categoria Producto ACTUAL" value="Actualizar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnEliminarcategoria_producto" style="visibility:visible">
								<div id="divEliminarcategoria_producto" style="display:table-row">
									<input type="button" id="btnEliminarcategoria_producto" name="btnEliminarcategoria_producto" title="ELIMINAR Categoria Producto ACTUAL" value="Eliminar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnImprimircategoria_producto" style="visibility:visible">
								<input type="button" id="btnImprimircategoria_producto" name="btnImprimircategoria_producto" title="IMPRIMIR PAGINA Categoria Producto ACTUAL" value="Imp. Datos" class="btn btn-primary"/>
							</td>
							<td id="tdbtnCancelarcategoria_producto" style="visibility:visible">
								<input type="button" id="btnCancelarcategoria_producto" name="btnCancelarcategoria_producto" title="CANCELAR Categoria Producto ACTUAL" value="Cancelar" class="btn btn-primary"/>
							</td>
						</tr>
						<tr id="trAccionesMantenimientocategoria_productoGuardar" style="display:none">
							<td id="tdbtnGuardarCambioscategoria_producto" colspan="4" align="center" style="visibility:visible">
								<div id="divGuardarCambioscategoria_producto" style="display:table-row">
									<input type="button" id="btnGuardarCambiosFormulariocategoria_producto" name="btnGuardarCambiosFormulariocategoria_producto" title="GUARDAR" value="GUADAR CAMBIOS" class="btn btn-primary"/>
								</div>
							</td>
						</tr>
					</table> <!-- tblAccionesMantenimientocategoria_producto -->
			</td>
		</tr> <!-- trcategoria_productoAcciones -->
		<?php if(categoria_producto_web::$STR_ES_RELACIONADO=='false' ) {?>
		<tr id="trcategoria_productoParametrosAcciones" class="impresion"  style="display:table-row">
			<td align="center">
				<!-- SECCION/POST -->
				<table id="tblcategoria_productoParametrosAcciones" style="text-align: center;border: 0px solid black;padding: 0px; border-spacing: 0px">
					<caption class="busquedacabecera" style="padding: 0px;caption-side: top;">
						<span>Acciones Extra/Post</span>
					</caption>
					<tr id="trcategoria_productoFilaParametrosAcciones">
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
				</table> <!-- tblcategoria_productoParametrosAcciones -->
			</td>
		</tr> <!-- trcategoria_productoParametrosAcciones -->
		<?php }?>
		<tr id="trcategoria_productoMensajes" class="mensajes">
			<td align="center">
				<a id="Mensajes"></a>
			</td>
		</tr> <!-- trcategoria_productoMensajes -->
			</table> <!-- tblcategoria_productoAcciones -->
			<?php } ?>
			</form> <!-- frmMantenimientocategoria_producto -->
			</div> <!-- divMantenimientocategoria_productoAjaxWebPart -->
		</td>
	</tr> <!-- trcategoria_productoElementosFormulario/super -->
		<?php if(categoria_producto_web::$STR_ES_RELACIONADO=='false' ) {?>

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
			
				import {categoria_producto_webcontrol,categoria_producto_webcontrol1} from './webroot/js/JavaScript/contabilidad/inventario/categoria_producto/js/webcontrol/categoria_producto_form_webcontrol.js?random=1';
				
				categoria_producto_webcontrol1.setcategoria_producto_constante(window.categoria_producto_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(categoria_producto_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

