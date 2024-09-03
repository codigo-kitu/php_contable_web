<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\inventario\costo_producto\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Costo Producto Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/inventario/costo_producto/util/costo_producto_carga.php');
	use com\bydan\contabilidad\inventario\costo_producto\util\costo_producto_carga;
	
	//include_once('com/bydan/contabilidad/inventario/costo_producto/presentation/view/costo_producto_web.php');
	//use com\bydan\contabilidad\inventario\costo_producto\presentation\view\costo_producto_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	costo_producto_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	costo_producto_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$costo_producto_web1= new costo_producto_web();	
	$costo_producto_web1->cargarDatosGenerales();
	
	//$moduloActual=$costo_producto_web1->moduloActual;
	//$usuarioActual=$costo_producto_web1->usuarioActual;
	//$sessionBase=$costo_producto_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$costo_producto_web1->parametroGeneralUsuarioActual;
	
	
		
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
		
		
			<script type="module" src="webroot/js/JavaScript/contabilidad/inventario/costo_producto/js/util/costo_producto_form_funcion.js?random=1"></script>
						
		
		
		<?php 
			
		
			costo_producto_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					costo_producto_web::$GET_POST=$_GET;
				} else {
					costo_producto_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			costo_producto_web::$STR_NOMBRE_PAGINA = 'costo_producto_form_view.php';
			costo_producto_web::$BIT_ES_PAGINA_PRINCIPAL = 'false';
			costo_producto_web::$BIT_ES_PAGINA_FORM = 'true';
				
			costo_producto_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {costo_producto_constante,costo_producto_constante1} from './webroot/js/JavaScript/contabilidad/inventario/costo_producto/js/util/costo_producto_constante.js?random=1';
			import {costo_producto_funcion,costo_producto_funcion1} from './webroot/js/JavaScript/contabilidad/inventario/costo_producto/js/util/costo_producto_funcion.js?random=1';
			
			let costo_producto_constante2 = new costo_producto_constante();
			
			costo_producto_constante2.STR_NOMBRE_PAGINA="<?php echo(costo_producto_web::$STR_NOMBRE_PAGINA); ?>";
			costo_producto_constante2.STR_TYPE_ON_LOADcosto_producto="<?php echo(costo_producto_web::$STR_TYPE_ONLOAD); ?>";
			costo_producto_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(costo_producto_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			costo_producto_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(costo_producto_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			costo_producto_constante2.STR_ACTION="<?php echo(costo_producto_web::$STR_ACTION); ?>";
			costo_producto_constante2.STR_ES_POPUP="<?php echo(costo_producto_web::$STR_ES_POPUP); ?>";
			costo_producto_constante2.STR_ES_BUSQUEDA="<?php echo(costo_producto_web::$STR_ES_BUSQUEDA); ?>";
			costo_producto_constante2.STR_FUNCION_JS="<?php echo(costo_producto_web::$STR_FUNCION_JS); ?>";
			costo_producto_constante2.BIG_ID_ACTUAL="<?php echo(costo_producto_web::$BIG_ID_ACTUAL); ?>";
			costo_producto_constante2.BIG_ID_OPCION="<?php echo(costo_producto_web::$BIG_ID_OPCION); ?>";
			costo_producto_constante2.STR_OBJETO_JS="<?php echo(costo_producto_web::$STR_OBJETO_JS); ?>";
			costo_producto_constante2.STR_ES_RELACIONES="<?php echo(costo_producto_web::$STR_ES_RELACIONES); ?>";
			costo_producto_constante2.STR_ES_RELACIONADO="<?php echo(costo_producto_web::$STR_ES_RELACIONADO); ?>";
			costo_producto_constante2.STR_ES_SUB_PAGINA="<?php echo(costo_producto_web::$STR_ES_SUB_PAGINA); ?>";
			costo_producto_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(costo_producto_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			costo_producto_constante2.BIT_ES_PAGINA_FORM=<?php echo(costo_producto_web::$BIT_ES_PAGINA_FORM); ?>;
			costo_producto_constante2.STR_SUFIJO="<?php echo(costo_producto_web::$STR_SUF); ?>";//costo_producto
			costo_producto_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(costo_producto_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//costo_producto
			
			costo_producto_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(costo_producto_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			costo_producto_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($costo_producto_web1->moduloActual->getnombre()); ?>";
			costo_producto_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(costo_producto_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			costo_producto_constante2.BIT_ES_LOAD_NORMAL=true;
			/*costo_producto_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			costo_producto_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.costo_producto_constante2 = costo_producto_constante2;
			
		</script>
		
		<?php if(costo_producto_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.costo_producto_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.costo_producto_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="costo_productoActual" ></a>
	
	<div id="divResumencosto_productoActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(costo_producto_web::$STR_ES_RELACIONADO=='false') {?>
		
		<div id="header" >
		
			<div id="banner">
				<span id="spanTituloBanner" class="titulobanner"></span>
			</div> <!-- banner -->
					
			<div id="subheader" class="links">  
			
						
			</div> <!-- sub-header -->
			
			
		</div> <!-- header -->
		
		<?php } ?>
		
		<div id="main">
		

			<?php if(costo_producto_web::$STR_ES_RELACIONADO=='false') {?>
			
			
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(costo_producto_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(costo_producto_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divcosto_productoPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblcosto_productoPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmcosto_productoAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btncosto_productoAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="costo_producto_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btncosto_productoAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmcosto_productoAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblcosto_productoPopupAjaxWebPart -->
		</div> <!-- divcosto_productoPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->		
		
		
		
			
<tr id="trcosto_productoElementosFormulario">
	<td>
		<div id="divMantenimientocosto_productoAjaxWebPart" title="COSTO PRODUCTO" style="height: 90%;width: 90%;position: relative;top: 30px;left: 30px;">
			<form id="frmMantenimientocosto_producto" name="frmMantenimientocosto_producto">

			</br>

			<?php if(costo_producto_web::$STR_ES_RELACIONES=='false' ) {?>
			</br>
			<?php } ?>

			<!-- SECCION/TOOLBAR -->
			<table id="tblcosto_productoToolBarFormularioExterior" style="width: 65%">
				<tr style="display:table-row">
					<td align="center">

						<table id="tblcosto_productoToolBarFormulario" style="text-align: center"  style="display:table-row">
							<tr>
								<td id="tdcosto_productoActualizarToolBar" style="visibility:visible">
									<img id="imgActualizarToolBarcosto_producto" name="imgActualizarToolBarcosto_producto" title="ACTUALIZAR Costo Producto ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/actualizar.gif" width="25" height="25"/>
								</td>
								<td id="tdcosto_productoEliminarToolBar" style="visibility:visible">
									<img id="imgEliminarToolBarcosto_producto" name="imgEliminarToolBarcosto_producto" title="ELIMINAR Costo Producto ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/eliminar.gif" width="25" height="25"/>
								</td>
								<td id="tdcosto_productoCancelarToolBar" style="visibility:visible">
									<img id="imgCancelarToolBarcosto_producto" name="imgCancelarToolBarcosto_producto" title="CANCELAR Costo Producto ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/cancelar.gif" width="25" height="25"/>
								</td>
								<td id="tdcosto_productoRelacionesToolBar" style="display:table-row">
									<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/xexpand.png" width="25" height="25" onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('tblCamposOcultoscosto_producto',this,'../')"/>
								</td>
							</tr>
						</table> <!-- tblcosto_productoToolBarFormulario -->

					</td>
				</tr>
			</table> <!-- tblcosto_productoToolBarFormularioExterior -->

			<table id="tblcosto_productoElementos">
			<tr id="trcosto_productoElementos" class="elementos" style="display:table-row">
			<td align="center">

			<a id="Campos"></a>

				<?php if(costo_producto_web::$STR_ES_RELACIONES=='false' ) {?>
				<div id="divFlechaArribaElementos" align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
					<span></span>
				</div>
				<?php } ?>

				<!-- SECCION/FORMULARIO -->
				<table id="tblElementoscosto_producto" class="elementos" style="width: 400px; padding: 0px; border-spacing: 0px; border-collapse: collapse; text-align: left;">
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
							<label class="form-label"> Producto.(*)</label>
						</td>
						<td id="td_control-id_producto" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_producto" name="form-id_producto" title=" Producto" ></select></td>
									<td><a><img id="form-id_producto_img" name="form-id_producto_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_producto_img_busqueda" name="form-id_producto_img_busqueda" title="Buscar Producto" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_producto" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_2">
						<td id="td_title-id_tabla" class="titulocampo">
							<label class="form-label">Tabla.(*)</label>
						</td>
						<td id="td_control-id_tabla" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_tabla" name="form-id_tabla" title="Tabla" ></select></td>
									<td><a><img id="form-id_tabla_img" name="form-id_tabla_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_tabla_img_busqueda" name="form-id_tabla_img_busqueda" title="Buscar Tabla" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_tabla" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-idn_origen" class="titulocampo">
							<label class="form-label">Id Origen.(*)</label>
						</td>
						<td id="td_control-idn_origen" align="left" class="controlcampo">
							<input id="form-idn_origen" name="form-idn_origen" type="text" class="form-control"  placeholder="Id Origen"  title="Id Origen"    maxlength="19" size="10" >
							<span id="spanstrMensajeidn_origen" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_3">
						<td id="td_title-idn_detalle_origen" class="titulocampo">
							<label class="form-label">Idn Detalle Origen.(*)</label>
						</td>
						<td id="td_control-idn_detalle_origen" align="left" class="controlcampo">
							<input id="form-idn_detalle_origen" name="form-idn_detalle_origen" type="text" class="form-control"  placeholder="Idn Detalle Origen"  title="Idn Detalle Origen"    maxlength="19" size="10" >
							<span id="spanstrMensajeidn_detalle_origen" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-nro_documento" class="titulocampo">
							<label class="form-label">Nro Documento.(*)</label>
						</td>
						<td id="td_control-nro_documento" align="left" class="controlcampo">
							<input id="form-nro_documento" name="form-nro_documento" type="text" class="form-control"  placeholder="Nro Documento"  title="Nro Documento"    size="10"  maxlength="10"/>
							<span id="spanstrMensajenro_documento" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_4">
						<td id="td_title-fecha" class="titulocampo">
							<label class="form-label">Fecha.(*)</label>
						</td>
						<td id="td_control-fecha" align="left" class="controlcampo">
							<input id="form-fecha" name="form-fecha" type="text" class="form-control"  placeholder="Fecha"  title="Fecha"    size="10" >
							<span id="spanstrMensajefecha" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-cantidad" class="titulocampo">
							<label class="form-label">Cantidad.(*)</label>
						</td>
						<td id="td_control-cantidad" align="left" class="controlcampo">
							<input id="form-cantidad" name="form-cantidad" type="text" class="form-control"  placeholder="Cantidad"  title="Cantidad"    maxlength="18" size="12" >
							<span id="spanstrMensajecantidad" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_5">
						<td id="td_title-costo_unitario" class="titulocampo">
							<label class="form-label">Costo Unitario.(*)</label>
						</td>
						<td id="td_control-costo_unitario" align="left" class="controlcampo">
							<input id="form-costo_unitario" name="form-costo_unitario" type="text" class="form-control"  placeholder="Costo Unitario"  title="Costo Unitario"    maxlength="18" size="12" >
							<span id="spanstrMensajecosto_unitario" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-costo_total" class="titulocampo">
							<label class="form-label">Costo Total.(*)</label>
						</td>
						<td id="td_control-costo_total" align="left" class="controlcampo">
							<input id="form-costo_total" name="form-costo_total" type="text" class="form-control"  placeholder="Costo Total"  title="Costo Total"    maxlength="18" size="12" >
							<span id="spanstrMensajecosto_total" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_6">
						<td id="td_title-cantidad_origen" class="titulocampo">
							<label class="form-label">Cantidad Origen.(*)</label>
						</td>
						<td id="td_control-cantidad_origen" align="left" class="controlcampo">
							<input id="form-cantidad_origen" name="form-cantidad_origen" type="text" class="form-control"  placeholder="Cantidad Origen"  title="Cantidad Origen"    maxlength="18" size="12" >
							<span id="spanstrMensajecantidad_origen" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-costo_unitario_origen" class="titulocampo">
							<label class="form-label">Costo Unitario Origen.(*)</label>
						</td>
						<td id="td_control-costo_unitario_origen" align="left" class="controlcampo">
							<input id="form-costo_unitario_origen" name="form-costo_unitario_origen" type="text" class="form-control"  placeholder="Costo Unitario Origen"  title="Costo Unitario Origen"    maxlength="18" size="12" >
							<span id="spanstrMensajecosto_unitario_origen" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_7">
						<td id="td_title-costo_total_origen" class="titulocampo">
							<label class="form-label">Costo Total Origen.(*)</label>
						</td>
						<td id="td_control-costo_total_origen" align="left" class="controlcampo">
							<input id="form-costo_total_origen" name="form-costo_total_origen" type="text" class="form-control"  placeholder="Costo Total Origen"  title="Costo Total Origen"    maxlength="18" size="12" >
							<span id="spanstrMensajecosto_total_origen" class="mensajeerror"></span>
						</td>
					<td></td><td></td></tr>
				</table> <!-- tblElementoscosto_producto -->

				<!-- SECCION/OCULTOS -->
				<table id="tblCamposOcultoscosto_producto" class="elementos" style="display: table-row;">
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
					
					<tr id="tr_fila_1">
						<td id="td_title-id_sucursal" class="titulocampo">
							<label class="form-label">Sucursal.(*)</label>
						</td>
						<td id="td_control-id_sucursal" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_sucursal" name="form-id_sucursal" title="Sucursal" ></select></td>
									<td><a><img id="form-id_sucursal_img" name="form-id_sucursal_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_sucursal_img_busqueda" name="form-id_sucursal_img_busqueda" title="Buscar Sucursal" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_sucursal" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-id_ejercicio" class="titulocampo">
							<label class="form-label">Ejercicio.(*)</label>
						</td>
						<td id="td_control-id_ejercicio" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_ejercicio" name="form-id_ejercicio" title="Ejercicio" ></select></td>
									<td><a><img id="form-id_ejercicio_img" name="form-id_ejercicio_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_ejercicio_img_busqueda" name="form-id_ejercicio_img_busqueda" title="Buscar ejercicio" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_ejercicio" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_2">
						<td id="td_title-id_periodo" class="titulocampo">
							<label class="form-label">Periodo.(*)</label>
						</td>
						<td id="td_control-id_periodo" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_periodo" name="form-id_periodo" title="Periodo" ></select></td>
									<td><a><img id="form-id_periodo_img" name="form-id_periodo_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_periodo_img_busqueda" name="form-id_periodo_img_busqueda" title="Buscar periodo" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_periodo" class="mensajeerror"></span>
						</td>
					
					
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
					</tr>
				</table> <!-- tblCamposOcultoscosto_producto -->

			</td></tr> <!-- trcosto_productoElementos -->
			</table> <!-- tblcosto_productoElementos -->
			</form> <!-- frmMantenimientocosto_producto -->


			

				<form id="frmAccionesMantenimientocosto_producto" name="frmAccionesMantenimientocosto_producto">

			<?php if(costo_producto_web::$STR_ES_BUSQUEDA=='false' ) {?>
			<table id="tblcosto_productoAcciones" class="elementos" style="text-align: center">
		<tr id="trcosto_productoAcciones" class="elementos" style="display:table-row">
			<td align="center">
				<a id="Acciones" ></a>

				<?php if(costo_producto_web::$STR_ES_RELACIONES=='false' ) {?>
				<div align="right">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
				<?php } ?>

					<!-- SECCION/BOTONES -->
					<table id="tblAccionesMantenimientocosto_producto" class="busqueda" style="width: 50%;text-align: left">

						<?php if(costo_producto_web::$STR_ES_RELACIONES=='false' ) {?>
						<!--
						<caption class="busquedacabecera">
							<span>Acciones</span>
						</caption>
						-->
						<?php } ?>

						<tr id="trAccionesMantenimientocosto_productoBasicos">
							<td id="tdbtnNuevocosto_producto" style="visibility:visible">
								<div id="divNuevocosto_producto" style="display:table-row">
									<input type="button" id="btnNuevocosto_producto" name="btnNuevocosto_producto" value="NUEVO" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnActualizarcosto_producto" style="visibility:visible">
								<div id="divActualizarcosto_producto" style="display:table-row">
									<input type="button" id="btnActualizarcosto_producto" name="btnActualizarcosto_producto" title="ACTUALIZAR Costo Producto ACTUAL" value="Actualizar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnEliminarcosto_producto" style="visibility:visible">
								<div id="divEliminarcosto_producto" style="display:table-row">
									<input type="button" id="btnEliminarcosto_producto" name="btnEliminarcosto_producto" title="ELIMINAR Costo Producto ACTUAL" value="Eliminar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnImprimircosto_producto" style="visibility:visible">
								<input type="button" id="btnImprimircosto_producto" name="btnImprimircosto_producto" title="IMPRIMIR PAGINA Costo Producto ACTUAL" value="Imp. Datos" class="btn btn-primary"/>
							</td>
							<td id="tdbtnCancelarcosto_producto" style="visibility:visible">
								<input type="button" id="btnCancelarcosto_producto" name="btnCancelarcosto_producto" title="CANCELAR Costo Producto ACTUAL" value="Cancelar" class="btn btn-primary"/>
							</td>
						</tr>
						<tr id="trAccionesMantenimientocosto_productoGuardar" style="display:none">
							<td id="tdbtnGuardarCambioscosto_producto" colspan="4" align="center" style="visibility:visible">
								<div id="divGuardarCambioscosto_producto" style="display:table-row">
									<input type="button" id="btnGuardarCambiosFormulariocosto_producto" name="btnGuardarCambiosFormulariocosto_producto" title="GUARDAR" value="GUADAR CAMBIOS" class="btn btn-primary"/>
								</div>
							</td>
						</tr>
					</table> <!-- tblAccionesMantenimientocosto_producto -->
			</td>
		</tr> <!-- trcosto_productoAcciones -->
		<?php if(costo_producto_web::$STR_ES_RELACIONADO=='false' ) {?>
		<tr id="trcosto_productoParametrosAcciones" class="impresion"  style="display:table-row">
			<td align="center">
				<!-- SECCION/POST -->
				<table id="tblcosto_productoParametrosAcciones" style="text-align: center;border: 0px solid black;padding: 0px; border-spacing: 0px">
					<caption class="busquedacabecera" style="padding: 0px;caption-side: top;">
						<span>Acciones Extra/Post</span>
					</caption>
					<tr id="trcosto_productoFilaParametrosAcciones">
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
				</table> <!-- tblcosto_productoParametrosAcciones -->
			</td>
		</tr> <!-- trcosto_productoParametrosAcciones -->
		<?php }?>
		<tr id="trcosto_productoMensajes" class="mensajes">
			<td align="center">
				<a id="Mensajes"></a>
			</td>
		</tr> <!-- trcosto_productoMensajes -->
			</table> <!-- tblcosto_productoAcciones -->
			<?php } ?>
			</form> <!-- frmMantenimientocosto_producto -->
			</div> <!-- divMantenimientocosto_productoAjaxWebPart -->
		</td>
	</tr> <!-- trcosto_productoElementosFormulario/super -->
		<?php if(costo_producto_web::$STR_ES_RELACIONADO=='false' ) {?>

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
			
				import {costo_producto_webcontrol,costo_producto_webcontrol1} from './webroot/js/JavaScript/contabilidad/inventario/costo_producto/js/webcontrol/costo_producto_form_webcontrol.js?random=1';
				
				costo_producto_webcontrol1.setcosto_producto_constante(window.costo_producto_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(costo_producto_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

