<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\inventario\producto_equivalente\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Producto Equivalentes Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/inventario/producto_equivalente/util/producto_equivalente_carga.php');
	use com\bydan\contabilidad\inventario\producto_equivalente\util\producto_equivalente_carga;
	
	//include_once('com/bydan/contabilidad/inventario/producto_equivalente/presentation/view/producto_equivalente_web.php');
	//use com\bydan\contabilidad\inventario\producto_equivalente\presentation\view\producto_equivalente_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	producto_equivalente_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	producto_equivalente_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$producto_equivalente_web1= new producto_equivalente_web();	
	$producto_equivalente_web1->cargarDatosGenerales();
	
	//$moduloActual=$producto_equivalente_web1->moduloActual;
	//$usuarioActual=$producto_equivalente_web1->usuarioActual;
	//$sessionBase=$producto_equivalente_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$producto_equivalente_web1->parametroGeneralUsuarioActual;
	
	
		
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
		
		
			<script type="module" src="webroot/js/JavaScript/contabilidad/inventario/producto_equivalente/js/util/producto_equivalente_form_funcion.js?random=1"></script>
						
		
		
		<?php 
			
		
			producto_equivalente_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					producto_equivalente_web::$GET_POST=$_GET;
				} else {
					producto_equivalente_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			producto_equivalente_web::$STR_NOMBRE_PAGINA = 'producto_equivalente_form_view.php';
			producto_equivalente_web::$BIT_ES_PAGINA_PRINCIPAL = 'false';
			producto_equivalente_web::$BIT_ES_PAGINA_FORM = 'true';
				
			producto_equivalente_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {producto_equivalente_constante,producto_equivalente_constante1} from './webroot/js/JavaScript/contabilidad/inventario/producto_equivalente/js/util/producto_equivalente_constante.js?random=1';
			import {producto_equivalente_funcion,producto_equivalente_funcion1} from './webroot/js/JavaScript/contabilidad/inventario/producto_equivalente/js/util/producto_equivalente_funcion.js?random=1';
			
			let producto_equivalente_constante2 = new producto_equivalente_constante();
			
			producto_equivalente_constante2.STR_NOMBRE_PAGINA="<?php echo(producto_equivalente_web::$STR_NOMBRE_PAGINA); ?>";
			producto_equivalente_constante2.STR_TYPE_ON_LOADproducto_equivalente="<?php echo(producto_equivalente_web::$STR_TYPE_ONLOAD); ?>";
			producto_equivalente_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(producto_equivalente_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			producto_equivalente_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(producto_equivalente_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			producto_equivalente_constante2.STR_ACTION="<?php echo(producto_equivalente_web::$STR_ACTION); ?>";
			producto_equivalente_constante2.STR_ES_POPUP="<?php echo(producto_equivalente_web::$STR_ES_POPUP); ?>";
			producto_equivalente_constante2.STR_ES_BUSQUEDA="<?php echo(producto_equivalente_web::$STR_ES_BUSQUEDA); ?>";
			producto_equivalente_constante2.STR_FUNCION_JS="<?php echo(producto_equivalente_web::$STR_FUNCION_JS); ?>";
			producto_equivalente_constante2.BIG_ID_ACTUAL="<?php echo(producto_equivalente_web::$BIG_ID_ACTUAL); ?>";
			producto_equivalente_constante2.BIG_ID_OPCION="<?php echo(producto_equivalente_web::$BIG_ID_OPCION); ?>";
			producto_equivalente_constante2.STR_OBJETO_JS="<?php echo(producto_equivalente_web::$STR_OBJETO_JS); ?>";
			producto_equivalente_constante2.STR_ES_RELACIONES="<?php echo(producto_equivalente_web::$STR_ES_RELACIONES); ?>";
			producto_equivalente_constante2.STR_ES_RELACIONADO="<?php echo(producto_equivalente_web::$STR_ES_RELACIONADO); ?>";
			producto_equivalente_constante2.STR_ES_SUB_PAGINA="<?php echo(producto_equivalente_web::$STR_ES_SUB_PAGINA); ?>";
			producto_equivalente_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(producto_equivalente_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			producto_equivalente_constante2.BIT_ES_PAGINA_FORM=<?php echo(producto_equivalente_web::$BIT_ES_PAGINA_FORM); ?>;
			producto_equivalente_constante2.STR_SUFIJO="<?php echo(producto_equivalente_web::$STR_SUF); ?>";//producto_equivalente
			producto_equivalente_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(producto_equivalente_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//producto_equivalente
			
			producto_equivalente_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(producto_equivalente_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			producto_equivalente_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($producto_equivalente_web1->moduloActual->getnombre()); ?>";
			producto_equivalente_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(producto_equivalente_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			producto_equivalente_constante2.BIT_ES_LOAD_NORMAL=true;
			/*producto_equivalente_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			producto_equivalente_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.producto_equivalente_constante2 = producto_equivalente_constante2;
			
		</script>
		
		<?php if(producto_equivalente_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.producto_equivalente_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.producto_equivalente_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="producto_equivalenteActual" ></a>
	
	<div id="divResumenproducto_equivalenteActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(producto_equivalente_web::$STR_ES_RELACIONADO=='false') {?>
		
		<div id="header" >
		
			<div id="banner">
				<span id="spanTituloBanner" class="titulobanner"></span>
			</div> <!-- banner -->
					
			<div id="subheader" class="links">  
			
						
			</div> <!-- sub-header -->
			
			
		</div> <!-- header -->
		
		<?php } ?>
		
		<div id="main">
		

			<?php if(producto_equivalente_web::$STR_ES_RELACIONADO=='false') {?>
			
			
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(producto_equivalente_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(producto_equivalente_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divproducto_equivalentePopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblproducto_equivalentePopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmproducto_equivalenteAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnproducto_equivalenteAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="producto_equivalente_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnproducto_equivalenteAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmproducto_equivalenteAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblproducto_equivalentePopupAjaxWebPart -->
		</div> <!-- divproducto_equivalentePopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->		
		
		
		
			
<tr id="trproducto_equivalenteElementosFormulario">
	<td>
		<div id="divMantenimientoproducto_equivalenteAjaxWebPart" title="PRODUCTO EQUIVALENTES" style="height: 90%;width: 90%;position: relative;top: 30px;left: 30px;">
			<form id="frmMantenimientoproducto_equivalente" name="frmMantenimientoproducto_equivalente">

			</br>

			<?php if(producto_equivalente_web::$STR_ES_RELACIONES=='false' ) {?>
			</br>
			<?php } ?>

			<!-- SECCION/TOOLBAR -->
			<table id="tblproducto_equivalenteToolBarFormularioExterior" style="width: 65%">
				<tr style="display:table-row">
					<td align="center">

						<table id="tblproducto_equivalenteToolBarFormulario" style="text-align: center"  style="display:table-row">
							<tr>
								<td id="tdproducto_equivalenteActualizarToolBar" style="visibility:visible">
									<img id="imgActualizarToolBarproducto_equivalente" name="imgActualizarToolBarproducto_equivalente" title="ACTUALIZAR Producto Equivalentes ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/actualizar.gif" width="25" height="25"/>
								</td>
								<td id="tdproducto_equivalenteEliminarToolBar" style="visibility:visible">
									<img id="imgEliminarToolBarproducto_equivalente" name="imgEliminarToolBarproducto_equivalente" title="ELIMINAR Producto Equivalentes ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/eliminar.gif" width="25" height="25"/>
								</td>
								<td id="tdproducto_equivalenteCancelarToolBar" style="visibility:visible">
									<img id="imgCancelarToolBarproducto_equivalente" name="imgCancelarToolBarproducto_equivalente" title="CANCELAR Producto Equivalentes ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/cancelar.gif" width="25" height="25"/>
								</td>
								<td id="tdproducto_equivalenteRelacionesToolBar" style="display:table-row">
									<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/xexpand.png" width="25" height="25" onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('tblCamposOcultosproducto_equivalente',this,'../')"/>
								</td>
							</tr>
						</table> <!-- tblproducto_equivalenteToolBarFormulario -->

					</td>
				</tr>
			</table> <!-- tblproducto_equivalenteToolBarFormularioExterior -->

			<table id="tblproducto_equivalenteElementos">
			<tr id="trproducto_equivalenteElementos" class="elementos" style="display:table-row">
			<td align="center">

			<a id="Campos"></a>

				<?php if(producto_equivalente_web::$STR_ES_RELACIONES=='false' ) {?>
				<div id="divFlechaArribaElementos" align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
					<span></span>
				</div>
				<?php } ?>

				<!-- SECCION/FORMULARIO -->
				<table id="tblElementosproducto_equivalente" class="elementos" style="width: 400px; padding: 0px; border-spacing: 0px; border-collapse: collapse; text-align: center;">
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
						<td id="td_title-id_producto_principal" class="titulocampo">
							<label class="form-label"> Producto Principal.(*)</label>
						</td>
						<td id="td_control-id_producto_principal" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_producto_principal" name="form-id_producto_principal" title=" Producto Principal" ></select></td>
									<td><a><img id="form-id_producto_principal_img" name="form-id_producto_principal_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_producto_principal_img_busqueda" name="form-id_producto_principal_img_busqueda" title="Buscar Producto" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_producto_principal" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_5">
						<td id="td_title-id_producto_equivalente" class="titulocampo">
							<label class="form-label"> Producto Equivalente.(*)</label>
						</td>
						<td id="td_control-id_producto_equivalente" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_producto_equivalente" name="form-id_producto_equivalente" title=" Producto Equivalente" ></select></td>
									<td><a><img id="form-id_producto_equivalente_img" name="form-id_producto_equivalente_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_producto_equivalente_img_busqueda" name="form-id_producto_equivalente_img_busqueda" title="Buscar Producto Equivalentes" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_producto_equivalente" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_6">
						<td id="td_title-producto_id_principal" class="titulocampo">
							<label class="form-label">Producto Id Principal.(*)</label>
						</td>
						<td id="td_control-producto_id_principal" align="left" class="controlcampo">
							<input id="form-producto_id_principal" name="form-producto_id_principal" type="text" class="form-control"  placeholder="Producto Id Principal"  title="Producto Id Principal"    maxlength="19" size="10" >
							<span id="spanstrMensajeproducto_id_principal" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_7">
						<td id="td_title-producto_id_equivalente" class="titulocampo">
							<label class="form-label">Producto Id Equivalente.(*)</label>
						</td>
						<td id="td_control-producto_id_equivalente" align="left" class="controlcampo">
							<input id="form-producto_id_equivalente" name="form-producto_id_equivalente" type="text" class="form-control"  placeholder="Producto Id Equivalente"  title="Producto Id Equivalente"    maxlength="19" size="10" >
							<span id="spanstrMensajeproducto_id_equivalente" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_8">
						<td id="td_title-comentario" class="titulocampo">
							<label class="form-label">Comentario.(*)</label>
						</td>
						<td id="td_control-comentario" align="left" class="controlcampo">
							<textarea id="form-comentario" name="form-comentario" class="form-control"  placeholder="Comentario"  title="Comentario"   style="font-size: 13px;"  rows ="3" cols= "25"></textarea>
							<span id="spanstrMensajecomentario" class="mensajeerror"></span>
						</td>
					</tr>
				</table> <!-- tblElementosproducto_equivalente -->

				<!-- SECCION/OCULTOS -->
				<table id="tblCamposOcultosproducto_equivalente" class="elementos" style="display: table-row;">
					<caption class="busquedacabecera">
						<span>Campos Ocultos</span>
					</caption>
				</table> <!-- tblCamposOcultosproducto_equivalente -->

			</td></tr> <!-- trproducto_equivalenteElementos -->
			</table> <!-- tblproducto_equivalenteElementos -->
			</form> <!-- frmMantenimientoproducto_equivalente -->


			

				<form id="frmAccionesMantenimientoproducto_equivalente" name="frmAccionesMantenimientoproducto_equivalente">

			<?php if(producto_equivalente_web::$STR_ES_BUSQUEDA=='false' ) {?>
			<table id="tblproducto_equivalenteAcciones" class="elementos" style="text-align: center">
		<tr id="trproducto_equivalenteAcciones" class="elementos" style="display:table-row">
			<td align="center">
				<a id="Acciones" ></a>

				<?php if(producto_equivalente_web::$STR_ES_RELACIONES=='false' ) {?>
				<div align="right">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
				<?php } ?>

					<!-- SECCION/BOTONES -->
					<table id="tblAccionesMantenimientoproducto_equivalente" class="busqueda" style="width: 50%;text-align: center">

						<?php if(producto_equivalente_web::$STR_ES_RELACIONES=='false' ) {?>
						<!--
						<caption class="busquedacabecera">
							<span>Acciones</span>
						</caption>
						-->
						<?php } ?>

						<tr id="trAccionesMantenimientoproducto_equivalenteBasicos">
							<td id="tdbtnNuevoproducto_equivalente" style="visibility:visible">
								<div id="divNuevoproducto_equivalente" style="display:table-row">
									<input type="button" id="btnNuevoproducto_equivalente" name="btnNuevoproducto_equivalente" value="NUEVO" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnActualizarproducto_equivalente" style="visibility:visible">
								<div id="divActualizarproducto_equivalente" style="display:table-row">
									<input type="button" id="btnActualizarproducto_equivalente" name="btnActualizarproducto_equivalente" title="ACTUALIZAR Producto Equivalentes ACTUAL" value="Actualizar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnEliminarproducto_equivalente" style="visibility:visible">
								<div id="divEliminarproducto_equivalente" style="display:table-row">
									<input type="button" id="btnEliminarproducto_equivalente" name="btnEliminarproducto_equivalente" title="ELIMINAR Producto Equivalentes ACTUAL" value="Eliminar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnImprimirproducto_equivalente" style="visibility:visible">
								<input type="button" id="btnImprimirproducto_equivalente" name="btnImprimirproducto_equivalente" title="IMPRIMIR PAGINA Producto Equivalentes ACTUAL" value="Imp. Datos" class="btn btn-primary"/>
							</td>
							<td id="tdbtnCancelarproducto_equivalente" style="visibility:visible">
								<input type="button" id="btnCancelarproducto_equivalente" name="btnCancelarproducto_equivalente" title="CANCELAR Producto Equivalentes ACTUAL" value="Cancelar" class="btn btn-primary"/>
							</td>
						</tr>
						<tr id="trAccionesMantenimientoproducto_equivalenteGuardar" style="display:none">
							<td id="tdbtnGuardarCambiosproducto_equivalente" colspan="4" align="center" style="visibility:visible">
								<div id="divGuardarCambiosproducto_equivalente" style="display:table-row">
									<input type="button" id="btnGuardarCambiosFormularioproducto_equivalente" name="btnGuardarCambiosFormularioproducto_equivalente" title="GUARDAR" value="GUADAR CAMBIOS" class="btn btn-primary"/>
								</div>
							</td>
						</tr>
					</table> <!-- tblAccionesMantenimientoproducto_equivalente -->
			</td>
		</tr> <!-- trproducto_equivalenteAcciones -->
		<?php if(producto_equivalente_web::$STR_ES_RELACIONADO=='false' ) {?>
		<tr id="trproducto_equivalenteParametrosAcciones" class="impresion"  style="display:table-row">
			<td align="center">
				<!-- SECCION/POST -->
				<table id="tblproducto_equivalenteParametrosAcciones" style="text-align: center;border: 0px solid black;padding: 0px; border-spacing: 0px">
					<caption class="busquedacabecera" style="padding: 0px;caption-side: top;">
						<span>Acciones Extra/Post</span>
					</caption>
					<tr id="trproducto_equivalenteFilaParametrosAcciones">
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
				</table> <!-- tblproducto_equivalenteParametrosAcciones -->
			</td>
		</tr> <!-- trproducto_equivalenteParametrosAcciones -->
		<?php }?>
		<tr id="trproducto_equivalenteMensajes" class="mensajes">
			<td align="center">
				<a id="Mensajes"></a>
			</td>
		</tr> <!-- trproducto_equivalenteMensajes -->
			</table> <!-- tblproducto_equivalenteAcciones -->
			<?php } ?>
			</form> <!-- frmMantenimientoproducto_equivalente -->
			</div> <!-- divMantenimientoproducto_equivalenteAjaxWebPart -->
		</td>
	</tr> <!-- trproducto_equivalenteElementosFormulario/super -->
		<?php if(producto_equivalente_web::$STR_ES_RELACIONADO=='false' ) {?>

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
			
				import {producto_equivalente_webcontrol,producto_equivalente_webcontrol1} from './webroot/js/JavaScript/contabilidad/inventario/producto_equivalente/js/webcontrol/producto_equivalente_form_webcontrol.js?random=1';
				
				producto_equivalente_webcontrol1.setproducto_equivalente_constante(window.producto_equivalente_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(producto_equivalente_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

