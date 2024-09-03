<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\inventario\orden_compra_detalle\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Compras Detalle Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/inventario/orden_compra_detalle/util/orden_compra_detalle_carga.php');
	use com\bydan\contabilidad\inventario\orden_compra_detalle\util\orden_compra_detalle_carga;
	
	//include_once('com/bydan/contabilidad/inventario/orden_compra_detalle/presentation/view/orden_compra_detalle_web.php');
	//use com\bydan\contabilidad\inventario\orden_compra_detalle\presentation\view\orden_compra_detalle_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	orden_compra_detalle_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	orden_compra_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$orden_compra_detalle_web1= new orden_compra_detalle_web();	
	$orden_compra_detalle_web1->cargarDatosGenerales();
	
	//$moduloActual=$orden_compra_detalle_web1->moduloActual;
	//$usuarioActual=$orden_compra_detalle_web1->usuarioActual;
	//$sessionBase=$orden_compra_detalle_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$orden_compra_detalle_web1->parametroGeneralUsuarioActual;
	
	
		
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
		
		
			<script type="module" src="webroot/js/JavaScript/contabilidad/inventario/orden_compra_detalle/js/util/orden_compra_detalle_form_funcion.js?random=1"></script>
						
		
		
		<?php 
			
		
			orden_compra_detalle_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					orden_compra_detalle_web::$GET_POST=$_GET;
				} else {
					orden_compra_detalle_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			orden_compra_detalle_web::$STR_NOMBRE_PAGINA = 'orden_compra_detalle_form_view.php';
			orden_compra_detalle_web::$BIT_ES_PAGINA_PRINCIPAL = 'false';
			orden_compra_detalle_web::$BIT_ES_PAGINA_FORM = 'true';
				
			orden_compra_detalle_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {orden_compra_detalle_constante,orden_compra_detalle_constante1} from './webroot/js/JavaScript/contabilidad/inventario/orden_compra_detalle/js/util/orden_compra_detalle_constante.js?random=1';
			import {orden_compra_detalle_funcion,orden_compra_detalle_funcion1} from './webroot/js/JavaScript/contabilidad/inventario/orden_compra_detalle/js/util/orden_compra_detalle_funcion.js?random=1';
			
			let orden_compra_detalle_constante2 = new orden_compra_detalle_constante();
			
			orden_compra_detalle_constante2.STR_NOMBRE_PAGINA="<?php echo(orden_compra_detalle_web::$STR_NOMBRE_PAGINA); ?>";
			orden_compra_detalle_constante2.STR_TYPE_ON_LOADorden_compra_detalle="<?php echo(orden_compra_detalle_web::$STR_TYPE_ONLOAD); ?>";
			orden_compra_detalle_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(orden_compra_detalle_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			orden_compra_detalle_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(orden_compra_detalle_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			orden_compra_detalle_constante2.STR_ACTION="<?php echo(orden_compra_detalle_web::$STR_ACTION); ?>";
			orden_compra_detalle_constante2.STR_ES_POPUP="<?php echo(orden_compra_detalle_web::$STR_ES_POPUP); ?>";
			orden_compra_detalle_constante2.STR_ES_BUSQUEDA="<?php echo(orden_compra_detalle_web::$STR_ES_BUSQUEDA); ?>";
			orden_compra_detalle_constante2.STR_FUNCION_JS="<?php echo(orden_compra_detalle_web::$STR_FUNCION_JS); ?>";
			orden_compra_detalle_constante2.BIG_ID_ACTUAL="<?php echo(orden_compra_detalle_web::$BIG_ID_ACTUAL); ?>";
			orden_compra_detalle_constante2.BIG_ID_OPCION="<?php echo(orden_compra_detalle_web::$BIG_ID_OPCION); ?>";
			orden_compra_detalle_constante2.STR_OBJETO_JS="<?php echo(orden_compra_detalle_web::$STR_OBJETO_JS); ?>";
			orden_compra_detalle_constante2.STR_ES_RELACIONES="<?php echo(orden_compra_detalle_web::$STR_ES_RELACIONES); ?>";
			orden_compra_detalle_constante2.STR_ES_RELACIONADO="<?php echo(orden_compra_detalle_web::$STR_ES_RELACIONADO); ?>";
			orden_compra_detalle_constante2.STR_ES_SUB_PAGINA="<?php echo(orden_compra_detalle_web::$STR_ES_SUB_PAGINA); ?>";
			orden_compra_detalle_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(orden_compra_detalle_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			orden_compra_detalle_constante2.BIT_ES_PAGINA_FORM=<?php echo(orden_compra_detalle_web::$BIT_ES_PAGINA_FORM); ?>;
			orden_compra_detalle_constante2.STR_SUFIJO="<?php echo(orden_compra_detalle_web::$STR_SUF); ?>";//orden_compra_detalle
			orden_compra_detalle_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(orden_compra_detalle_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//orden_compra_detalle
			
			orden_compra_detalle_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(orden_compra_detalle_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			orden_compra_detalle_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($orden_compra_detalle_web1->moduloActual->getnombre()); ?>";
			orden_compra_detalle_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(orden_compra_detalle_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			orden_compra_detalle_constante2.BIT_ES_LOAD_NORMAL=true;
			/*orden_compra_detalle_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			orden_compra_detalle_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.orden_compra_detalle_constante2 = orden_compra_detalle_constante2;
			
		</script>
		
		<?php if(orden_compra_detalle_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.orden_compra_detalle_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.orden_compra_detalle_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="orden_compra_detalleActual" ></a>
	
	<div id="divResumenorden_compra_detalleActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(orden_compra_detalle_web::$STR_ES_RELACIONADO=='false') {?>
		
		<div id="header" >
		
			<div id="banner">
				<span id="spanTituloBanner" class="titulobanner"></span>
			</div> <!-- banner -->
					
			<div id="subheader" class="links">  
			
						
			</div> <!-- sub-header -->
			
			
		</div> <!-- header -->
		
		<?php } ?>
		
		<div id="main">
		

			<?php if(orden_compra_detalle_web::$STR_ES_RELACIONADO=='false') {?>
			
			
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(orden_compra_detalle_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(orden_compra_detalle_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divorden_compra_detallePopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblorden_compra_detallePopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmorden_compra_detalleAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnorden_compra_detalleAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="orden_compra_detalle_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnorden_compra_detalleAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmorden_compra_detalleAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblorden_compra_detallePopupAjaxWebPart -->
		</div> <!-- divorden_compra_detallePopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->		
		
		
		
			
<tr id="trorden_compra_detalleElementosFormulario">
	<td>
		<div id="divMantenimientoorden_compra_detalleAjaxWebPart" title="COMPRAS DETALLE" style="height: 90%;width: 90%;position: relative;top: 30px;left: 30px;">
			<form id="frmMantenimientoorden_compra_detalle" name="frmMantenimientoorden_compra_detalle">

			</br>

			<?php if(orden_compra_detalle_web::$STR_ES_RELACIONES=='false' ) {?>
			</br>
			<?php } ?>

			<!-- SECCION/TOOLBAR -->
			<table id="tblorden_compra_detalleToolBarFormularioExterior" style="width: 65%">
				<tr style="display:table-row">
					<td align="center">

						<table id="tblorden_compra_detalleToolBarFormulario" style="text-align: center"  style="display:table-row">
							<tr>
								<td id="tdorden_compra_detalleActualizarToolBar" style="visibility:visible">
									<img id="imgActualizarToolBarorden_compra_detalle" name="imgActualizarToolBarorden_compra_detalle" title="ACTUALIZAR Compras Detalle ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/actualizar.gif" width="25" height="25"/>
								</td>
								<td id="tdorden_compra_detalleEliminarToolBar" style="visibility:visible">
									<img id="imgEliminarToolBarorden_compra_detalle" name="imgEliminarToolBarorden_compra_detalle" title="ELIMINAR Compras Detalle ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/eliminar.gif" width="25" height="25"/>
								</td>
								<td id="tdorden_compra_detalleCancelarToolBar" style="visibility:visible">
									<img id="imgCancelarToolBarorden_compra_detalle" name="imgCancelarToolBarorden_compra_detalle" title="CANCELAR Compras Detalle ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/cancelar.gif" width="25" height="25"/>
								</td>
								<td id="tdorden_compra_detalleRelacionesToolBar" style="display:table-row">
									<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/xexpand.png" width="25" height="25" onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('tblCamposOcultosorden_compra_detalle',this,'../')"/>
								</td>
							</tr>
						</table> <!-- tblorden_compra_detalleToolBarFormulario -->

					</td>
				</tr>
			</table> <!-- tblorden_compra_detalleToolBarFormularioExterior -->

			<table id="tblorden_compra_detalleElementos">
			<tr id="trorden_compra_detalleElementos" class="elementos" style="display:table-row">
			<td align="center">

			<a id="Campos"></a>

				<?php if(orden_compra_detalle_web::$STR_ES_RELACIONES=='false' ) {?>
				<div id="divFlechaArribaElementos" align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
					<span></span>
				</div>
				<?php } ?>

				<!-- SECCION/FORMULARIO -->
				<table id="tblElementosorden_compra_detalle" class="elementos" style="width: 350px; padding: 0px; border-spacing: 0px; border-collapse: collapse; text-align: left;">
					
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
					<?php if(true || orden_compra_detalle_web::$STR_ES_RELACIONES=='false' ) {?>
					<tr class="busquedacabecera">
						<td colspan="4"><span><img id="imgMostrarOcultarorden_compra_detallegeneral" name="imgMostrarOcultarorden_compra_detallegeneral" title="Mostrar/Ocultar" style="width: 10px; height: 10px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" width="10" height="10" onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trorden_compra_detallegeneralElementos',this,'../')"/>GENERAL</span>
						</td>
					</tr>
					<?php } ?>
					<tr id="trorden_compra_detallegeneralElementos">
						<td id="tdorden_compra_detallegeneralElementos"  colspan="4">
				<table class="elementos" style="width:350px;text-align:left; padding: 0px; border-spacing: 0px; border-collapse: collapse;">
					<tr id="tr_fila_1">
						<td id="td_title-id" class="titulocampo">
							<label class="form-label">Cod. Único</label>
						</td>
						<td id="td_control-id" align="left">
							<input id="form-id" name="form-id" type="text" class="form-control" readonly size="10">
						</td>
					</tr>
					<tr id="tr_fila_2">
						<td id="td_title-id_orden_compra" class="titulocampo">
							<label class="form-label">Orden Compra</label>
						</td>
						<td id="td_control-id_orden_compra" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_orden_compra" name="form-id_orden_compra" title="Orden Compra" ></select></td>
									<td><a><img id="form-id_orden_compra_img" name="form-id_orden_compra_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_orden_compra_img_busqueda" name="form-id_orden_compra_img_busqueda" title="Buscar Orden Compra" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_orden_compra" class="mensajeerror"></span>
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
				</table>
				</td></tr>
					<?php if(true || orden_compra_detalle_web::$STR_ES_RELACIONES=='false' ) {?>
					<tr class="busquedacabecera">
						<td colspan="4"><span><img id="imgMostrarOcultarorden_compra_detallevalores" name="imgMostrarOcultarorden_compra_detallevalores" title="Mostrar/Ocultar" style="width: 10px; height: 10px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" width="10" height="10" onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trorden_compra_detallevaloresElementos',this,'../')"/>VALORES</span>
						</td>
					</tr>
					<?php } ?>
					<tr id="trorden_compra_detallevaloresElementos">
						<td id="tdorden_compra_detallevaloresElementos"  colspan="4">
				<table class="elementos" style="width:350px;text-align:left; padding: 0px; border-spacing: 0px; border-collapse: collapse;">
					
						<td id="td_title-cantidad" class="titulocampo">
							<label class="form-label">Cantidad.(*)</label>
						</td>
						<td id="td_control-cantidad" align="left" class="controlcampo">
							<input id="form-cantidad" name="form-cantidad" type="text" class="form-control"  placeholder="Cantidad"  title="Cantidad"    maxlength="18" size="12" >
							<span id="spanstrMensajecantidad" class="mensajeerror"></span>
						</td>
					
					<tr id="tr_fila_1">
						<td id="td_title-precio" class="titulocampo">
							<label class="form-label">Precio.(*)</label>
						</td>
						<td id="td_control-precio" align="left" class="controlcampo">
							<input id="form-precio" name="form-precio" type="text" class="form-control"  placeholder="Precio"  title="Precio"    maxlength="18" size="12" >
							<span id="spanstrMensajeprecio" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_2">
						<td id="td_title-sub_total" class="titulocampo">
							<label class="form-label">Sub Total.(*)</label>
						</td>
						<td id="td_control-sub_total" align="left" class="controlcampo">
							<input id="form-sub_total" name="form-sub_total" type="text" class="form-control"  placeholder="Sub Total"  title="Sub Total"    maxlength="18" size="12" >
							<span id="spanstrMensajesub_total" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_3">
						<td id="td_title-descuento_porciento" class="titulocampo">
							<label class="form-label">Descuento %.(*)</label>
						</td>
						<td id="td_control-descuento_porciento" align="left" class="controlcampo">
							<input id="form-descuento_porciento" name="form-descuento_porciento" type="text" class="form-control"  placeholder="Descuento %"  title="Descuento %"    maxlength="18" size="12" >
							<span id="spanstrMensajedescuento_porciento" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_4">
						<td id="td_title-descuento_monto" class="titulocampo">
							<label class="form-label">Descuento.(*)</label>
						</td>
						<td id="td_control-descuento_monto" align="left" class="controlcampo">
							<input id="form-descuento_monto" name="form-descuento_monto" type="text" class="form-control"  placeholder="Descuento"  title="Descuento"    maxlength="18" size="12" >
							<span id="spanstrMensajedescuento_monto" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_5">
						<td id="td_title-iva_porciento" class="titulocampo">
							<label class="form-label">Iva %.(*)</label>
						</td>
						<td id="td_control-iva_porciento" align="left" class="controlcampo">
							<input id="form-iva_porciento" name="form-iva_porciento" type="text" class="form-control"  placeholder="Iva %"  title="Iva %"    maxlength="18" size="12" >
							<span id="spanstrMensajeiva_porciento" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_6">
						<td id="td_title-iva_monto" class="titulocampo">
							<label class="form-label">Iva.(*)</label>
						</td>
						<td id="td_control-iva_monto" align="left" class="controlcampo">
							<input id="form-iva_monto" name="form-iva_monto" type="text" class="form-control"  placeholder="Iva"  title="Iva"    maxlength="18" size="12" >
							<span id="spanstrMensajeiva_monto" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_7">
						<td id="td_title-total" class="titulocampo">
							<label class="form-label">Total.(*)</label>
						</td>
						<td id="td_control-total" align="left" class="controlcampo">
							<input id="form-total" name="form-total" type="text" class="form-control"  placeholder="Total"  title="Total"    maxlength="18" size="12" >
							<span id="spanstrMensajetotal" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_8">
						<td id="td_title-observacion" class="titulocampo">
							<label class="form-label">Observacion</label>
						</td>
						<td id="td_control-observacion" align="left" class="controlcampo">
							<textarea id="form-observacion" name="form-observacion" class="form-control"  placeholder="Observacion"  title="Observacion"   style="font-size: 13px;"  rows ="0" cols= "25"></textarea>
							<span id="spanstrMensajeobservacion" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_9">
						<td id="td_title-recibido" class="titulocampo">
							<label class="form-label">Recibido.(*)</label>
						</td>
						<td id="td_control-recibido" align="left" class="controlcampo">
							<input id="form-recibido" name="form-recibido" type="text" class="form-control"  placeholder="Recibido"  title="Recibido"    maxlength="18" size="12" >
							<span id="spanstrMensajerecibido" class="mensajeerror"></span>
						</td>
					</tr>
				</table>
				</td></tr>
				</table> <!-- tblElementosorden_compra_detalle -->

				<!-- SECCION/OCULTOS -->
				<table id="tblCamposOcultosorden_compra_detalle" class="elementos" style="display: table-row;">
					<caption class="busquedacabecera">
						<span>Campos Ocultos</span>
					</caption>
					
						<td id="td_title-impuesto2_porciento" class="titulocampo">
							<label class="form-label">Impuesto2 %.(*)</label>
						</td>
						<td id="td_control-impuesto2_porciento" align="left" class="controlcampo">
							<input id="form-impuesto2_porciento" name="form-impuesto2_porciento" type="text" class="form-control"  placeholder="Impuesto2 %"  title="Impuesto2 %"    maxlength="18" size="12" >
							<span id="spanstrMensajeimpuesto2_porciento" class="mensajeerror"></span>
						</td>
					
					<tr id="tr_fila_1">
						<td id="td_title-impuesto2_monto" class="titulocampo">
							<label class="form-label">Impuesto2 Monto.(*)</label>
						</td>
						<td id="td_control-impuesto2_monto" align="left" class="controlcampo">
							<input id="form-impuesto2_monto" name="form-impuesto2_monto" type="text" class="form-control"  placeholder="Impuesto2 Monto"  title="Impuesto2 Monto"    maxlength="18" size="12" >
							<span id="spanstrMensajeimpuesto2_monto" class="mensajeerror"></span>
						</td>
					<td></td><td></td></tr>
				</table> <!-- tblCamposOcultosorden_compra_detalle -->

			</td></tr> <!-- trorden_compra_detalleElementos -->
			</table> <!-- tblorden_compra_detalleElementos -->
			</form> <!-- frmMantenimientoorden_compra_detalle -->


			

				<form id="frmAccionesMantenimientoorden_compra_detalle" name="frmAccionesMantenimientoorden_compra_detalle">

			<?php if(orden_compra_detalle_web::$STR_ES_BUSQUEDA=='false' ) {?>
			<table id="tblorden_compra_detalleAcciones" class="elementos" style="text-align: center">
		<tr id="trorden_compra_detalleAcciones" class="elementos" style="display:table-row">
			<td align="center">
				<a id="Acciones" ></a>

				<?php if(orden_compra_detalle_web::$STR_ES_RELACIONES=='false' ) {?>
				<div align="right">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
				<?php } ?>

					<!-- SECCION/BOTONES -->
					<table id="tblAccionesMantenimientoorden_compra_detalle" class="busqueda" style="width: 50%;text-align: left">

						<?php if(orden_compra_detalle_web::$STR_ES_RELACIONES=='false' ) {?>
						<!--
						<caption class="busquedacabecera">
							<span>Acciones</span>
						</caption>
						-->
						<?php } ?>

						<tr id="trAccionesMantenimientoorden_compra_detalleBasicos">
							<td id="tdbtnNuevoorden_compra_detalle" style="visibility:visible">
								<div id="divNuevoorden_compra_detalle" style="display:table-row">
									<input type="button" id="btnNuevoorden_compra_detalle" name="btnNuevoorden_compra_detalle" value="NUEVO" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnActualizarorden_compra_detalle" style="visibility:visible">
								<div id="divActualizarorden_compra_detalle" style="display:table-row">
									<input type="button" id="btnActualizarorden_compra_detalle" name="btnActualizarorden_compra_detalle" title="ACTUALIZAR Compras Detalle ACTUAL" value="Actualizar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnEliminarorden_compra_detalle" style="visibility:visible">
								<div id="divEliminarorden_compra_detalle" style="display:table-row">
									<input type="button" id="btnEliminarorden_compra_detalle" name="btnEliminarorden_compra_detalle" title="ELIMINAR Compras Detalle ACTUAL" value="Eliminar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnImprimirorden_compra_detalle" style="visibility:visible">
								<input type="button" id="btnImprimirorden_compra_detalle" name="btnImprimirorden_compra_detalle" title="IMPRIMIR PAGINA Compras Detalle ACTUAL" value="Imp. Datos" class="btn btn-primary"/>
							</td>
							<td id="tdbtnCancelarorden_compra_detalle" style="visibility:visible">
								<input type="button" id="btnCancelarorden_compra_detalle" name="btnCancelarorden_compra_detalle" title="CANCELAR Compras Detalle ACTUAL" value="Cancelar" class="btn btn-primary"/>
							</td>
						</tr>
						<tr id="trAccionesMantenimientoorden_compra_detalleGuardar" style="display:none">
							<td id="tdbtnGuardarCambiosorden_compra_detalle" colspan="4" align="center" style="visibility:visible">
								<div id="divGuardarCambiosorden_compra_detalle" style="display:table-row">
									<input type="button" id="btnGuardarCambiosFormularioorden_compra_detalle" name="btnGuardarCambiosFormularioorden_compra_detalle" title="GUARDAR" value="GUADAR CAMBIOS" class="btn btn-primary"/>
								</div>
							</td>
						</tr>
					</table> <!-- tblAccionesMantenimientoorden_compra_detalle -->
			</td>
		</tr> <!-- trorden_compra_detalleAcciones -->
		<?php if(orden_compra_detalle_web::$STR_ES_RELACIONADO=='false' ) {?>
		<tr id="trorden_compra_detalleParametrosAcciones" class="impresion"  style="display:table-row">
			<td align="center">
				<!-- SECCION/POST -->
				<table id="tblorden_compra_detalleParametrosAcciones" style="text-align: center;border: 0px solid black;padding: 0px; border-spacing: 0px">
					<caption class="busquedacabecera" style="padding: 0px;caption-side: top;">
						<span>Acciones Extra/Post</span>
					</caption>
					<tr id="trorden_compra_detalleFilaParametrosAcciones">
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
				</table> <!-- tblorden_compra_detalleParametrosAcciones -->
			</td>
		</tr> <!-- trorden_compra_detalleParametrosAcciones -->
		<?php }?>
		<tr id="trorden_compra_detalleMensajes" class="mensajes">
			<td align="center">
				<a id="Mensajes"></a>
			</td>
		</tr> <!-- trorden_compra_detalleMensajes -->
			</table> <!-- tblorden_compra_detalleAcciones -->
			<?php } ?>
			</form> <!-- frmMantenimientoorden_compra_detalle -->
			</div> <!-- divMantenimientoorden_compra_detalleAjaxWebPart -->
		</td>
	</tr> <!-- trorden_compra_detalleElementosFormulario/super -->
		<?php if(orden_compra_detalle_web::$STR_ES_RELACIONADO=='false' ) {?>

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
			
				import {orden_compra_detalle_webcontrol,orden_compra_detalle_webcontrol1} from './webroot/js/JavaScript/contabilidad/inventario/orden_compra_detalle/js/webcontrol/orden_compra_detalle_form_webcontrol.js?random=1';
				
				orden_compra_detalle_webcontrol1.setorden_compra_detalle_constante(window.orden_compra_detalle_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(orden_compra_detalle_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

