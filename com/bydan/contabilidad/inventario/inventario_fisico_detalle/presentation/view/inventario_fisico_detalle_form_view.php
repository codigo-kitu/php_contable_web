<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\inventario\inventario_fisico_detalle\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Inventario Fisico Detalle Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/inventario/inventario_fisico_detalle/util/inventario_fisico_detalle_carga.php');
	use com\bydan\contabilidad\inventario\inventario_fisico_detalle\util\inventario_fisico_detalle_carga;
	
	//include_once('com/bydan/contabilidad/inventario/inventario_fisico_detalle/presentation/view/inventario_fisico_detalle_web.php');
	//use com\bydan\contabilidad\inventario\inventario_fisico_detalle\presentation\view\inventario_fisico_detalle_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	inventario_fisico_detalle_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	inventario_fisico_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$inventario_fisico_detalle_web1= new inventario_fisico_detalle_web();	
	$inventario_fisico_detalle_web1->cargarDatosGenerales();
	
	//$moduloActual=$inventario_fisico_detalle_web1->moduloActual;
	//$usuarioActual=$inventario_fisico_detalle_web1->usuarioActual;
	//$sessionBase=$inventario_fisico_detalle_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$inventario_fisico_detalle_web1->parametroGeneralUsuarioActual;
	
	
		
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
		
		
			<script type="module" src="webroot/js/JavaScript/contabilidad/inventario/inventario_fisico_detalle/js/util/inventario_fisico_detalle_form_funcion.js?random=1"></script>
						
		
		
		<?php 
			
		
			inventario_fisico_detalle_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					inventario_fisico_detalle_web::$GET_POST=$_GET;
				} else {
					inventario_fisico_detalle_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			inventario_fisico_detalle_web::$STR_NOMBRE_PAGINA = 'inventario_fisico_detalle_form_view.php';
			inventario_fisico_detalle_web::$BIT_ES_PAGINA_PRINCIPAL = 'false';
			inventario_fisico_detalle_web::$BIT_ES_PAGINA_FORM = 'true';
				
			inventario_fisico_detalle_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {inventario_fisico_detalle_constante,inventario_fisico_detalle_constante1} from './webroot/js/JavaScript/contabilidad/inventario/inventario_fisico_detalle/js/util/inventario_fisico_detalle_constante.js?random=1';
			import {inventario_fisico_detalle_funcion,inventario_fisico_detalle_funcion1} from './webroot/js/JavaScript/contabilidad/inventario/inventario_fisico_detalle/js/util/inventario_fisico_detalle_funcion.js?random=1';
			
			let inventario_fisico_detalle_constante2 = new inventario_fisico_detalle_constante();
			
			inventario_fisico_detalle_constante2.STR_NOMBRE_PAGINA="<?php echo(inventario_fisico_detalle_web::$STR_NOMBRE_PAGINA); ?>";
			inventario_fisico_detalle_constante2.STR_TYPE_ON_LOADinventario_fisico_detalle="<?php echo(inventario_fisico_detalle_web::$STR_TYPE_ONLOAD); ?>";
			inventario_fisico_detalle_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(inventario_fisico_detalle_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			inventario_fisico_detalle_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(inventario_fisico_detalle_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			inventario_fisico_detalle_constante2.STR_ACTION="<?php echo(inventario_fisico_detalle_web::$STR_ACTION); ?>";
			inventario_fisico_detalle_constante2.STR_ES_POPUP="<?php echo(inventario_fisico_detalle_web::$STR_ES_POPUP); ?>";
			inventario_fisico_detalle_constante2.STR_ES_BUSQUEDA="<?php echo(inventario_fisico_detalle_web::$STR_ES_BUSQUEDA); ?>";
			inventario_fisico_detalle_constante2.STR_FUNCION_JS="<?php echo(inventario_fisico_detalle_web::$STR_FUNCION_JS); ?>";
			inventario_fisico_detalle_constante2.BIG_ID_ACTUAL="<?php echo(inventario_fisico_detalle_web::$BIG_ID_ACTUAL); ?>";
			inventario_fisico_detalle_constante2.BIG_ID_OPCION="<?php echo(inventario_fisico_detalle_web::$BIG_ID_OPCION); ?>";
			inventario_fisico_detalle_constante2.STR_OBJETO_JS="<?php echo(inventario_fisico_detalle_web::$STR_OBJETO_JS); ?>";
			inventario_fisico_detalle_constante2.STR_ES_RELACIONES="<?php echo(inventario_fisico_detalle_web::$STR_ES_RELACIONES); ?>";
			inventario_fisico_detalle_constante2.STR_ES_RELACIONADO="<?php echo(inventario_fisico_detalle_web::$STR_ES_RELACIONADO); ?>";
			inventario_fisico_detalle_constante2.STR_ES_SUB_PAGINA="<?php echo(inventario_fisico_detalle_web::$STR_ES_SUB_PAGINA); ?>";
			inventario_fisico_detalle_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(inventario_fisico_detalle_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			inventario_fisico_detalle_constante2.BIT_ES_PAGINA_FORM=<?php echo(inventario_fisico_detalle_web::$BIT_ES_PAGINA_FORM); ?>;
			inventario_fisico_detalle_constante2.STR_SUFIJO="<?php echo(inventario_fisico_detalle_web::$STR_SUF); ?>";//inventario_fisico_detalle
			inventario_fisico_detalle_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(inventario_fisico_detalle_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//inventario_fisico_detalle
			
			inventario_fisico_detalle_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(inventario_fisico_detalle_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			inventario_fisico_detalle_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($inventario_fisico_detalle_web1->moduloActual->getnombre()); ?>";
			inventario_fisico_detalle_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(inventario_fisico_detalle_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			inventario_fisico_detalle_constante2.BIT_ES_LOAD_NORMAL=true;
			/*inventario_fisico_detalle_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			inventario_fisico_detalle_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.inventario_fisico_detalle_constante2 = inventario_fisico_detalle_constante2;
			
		</script>
		
		<?php if(inventario_fisico_detalle_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.inventario_fisico_detalle_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.inventario_fisico_detalle_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="inventario_fisico_detalleActual" ></a>
	
	<div id="divResumeninventario_fisico_detalleActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(inventario_fisico_detalle_web::$STR_ES_RELACIONADO=='false') {?>
		
		<div id="header" >
		
			<div id="banner">
				<span id="spanTituloBanner" class="titulobanner"></span>
			</div> <!-- banner -->
					
			<div id="subheader" class="links">  
			
						
			</div> <!-- sub-header -->
			
			
		</div> <!-- header -->
		
		<?php } ?>
		
		<div id="main">
		

			<?php if(inventario_fisico_detalle_web::$STR_ES_RELACIONADO=='false') {?>
			
			
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(inventario_fisico_detalle_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(inventario_fisico_detalle_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divinventario_fisico_detallePopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblinventario_fisico_detallePopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frminventario_fisico_detalleAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btninventario_fisico_detalleAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="inventario_fisico_detalle_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btninventario_fisico_detalleAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frminventario_fisico_detalleAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblinventario_fisico_detallePopupAjaxWebPart -->
		</div> <!-- divinventario_fisico_detallePopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->		
		
		
		
			
<tr id="trinventario_fisico_detalleElementosFormulario">
	<td>
		<div id="divMantenimientoinventario_fisico_detalleAjaxWebPart" title="INVENTARIO FISICO DETALLE" style="height: 90%;width: 90%;position: relative;top: 30px;left: 30px;">
			<form id="frmMantenimientoinventario_fisico_detalle" name="frmMantenimientoinventario_fisico_detalle">

			</br>

			<?php if(inventario_fisico_detalle_web::$STR_ES_RELACIONES=='false' ) {?>
			</br>
			<?php } ?>

			<!-- SECCION/TOOLBAR -->
			<table id="tblinventario_fisico_detalleToolBarFormularioExterior" style="width: 65%">
				<tr style="display:table-row">
					<td align="center">

						<table id="tblinventario_fisico_detalleToolBarFormulario" style="text-align: center"  style="display:table-row">
							<tr>
								<td id="tdinventario_fisico_detalleActualizarToolBar" style="visibility:visible">
									<img id="imgActualizarToolBarinventario_fisico_detalle" name="imgActualizarToolBarinventario_fisico_detalle" title="ACTUALIZAR Inventario Fisico Detalle ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/actualizar.gif" width="25" height="25"/>
								</td>
								<td id="tdinventario_fisico_detalleEliminarToolBar" style="visibility:visible">
									<img id="imgEliminarToolBarinventario_fisico_detalle" name="imgEliminarToolBarinventario_fisico_detalle" title="ELIMINAR Inventario Fisico Detalle ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/eliminar.gif" width="25" height="25"/>
								</td>
								<td id="tdinventario_fisico_detalleCancelarToolBar" style="visibility:visible">
									<img id="imgCancelarToolBarinventario_fisico_detalle" name="imgCancelarToolBarinventario_fisico_detalle" title="CANCELAR Inventario Fisico Detalle ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/cancelar.gif" width="25" height="25"/>
								</td>
								<td id="tdinventario_fisico_detalleRelacionesToolBar" style="display:table-row">
									<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/xexpand.png" width="25" height="25" onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('tblCamposOcultosinventario_fisico_detalle',this,'../')"/>
								</td>
							</tr>
						</table> <!-- tblinventario_fisico_detalleToolBarFormulario -->

					</td>
				</tr>
			</table> <!-- tblinventario_fisico_detalleToolBarFormularioExterior -->

			<table id="tblinventario_fisico_detalleElementos">
			<tr id="trinventario_fisico_detalleElementos" class="elementos" style="display:table-row">
			<td align="center">

			<a id="Campos"></a>

				<?php if(inventario_fisico_detalle_web::$STR_ES_RELACIONES=='false' ) {?>
				<div id="divFlechaArribaElementos" align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
					<span></span>
				</div>
				<?php } ?>

				<!-- SECCION/FORMULARIO -->
				<table id="tblElementosinventario_fisico_detalle" class="elementos" style="width: 350px; padding: 0px; border-spacing: 0px; border-collapse: collapse; text-align: center;">
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
						<td id="td_title-id_inventario_fisico" class="titulocampo">
							<label class="form-label">Inventario Fisico.(*)</label>
						</td>
						<td id="td_control-id_inventario_fisico" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_inventario_fisico" name="form-id_inventario_fisico" title="Inventario Fisico" ></select></td>
									<td><a><img id="form-id_inventario_fisico_img" name="form-id_inventario_fisico_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_inventario_fisico_img_busqueda" name="form-id_inventario_fisico_img_busqueda" title="Buscar Inventario Fisico" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_inventario_fisico" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_5">
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
					</tr>
					<tr id="tr_fila_7">
						<td id="td_title-unidades_contadas" class="titulocampo">
							<label class="form-label">Unidades Contadas.(*)</label>
						</td>
						<td id="td_control-unidades_contadas" align="left" class="controlcampo">
							<input id="form-unidades_contadas" name="form-unidades_contadas" type="text" class="form-control"  placeholder="Unidades Contadas"  title="Unidades Contadas"    maxlength="18" size="12" >
							<span id="spanstrMensajeunidades_contadas" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_8">
						<td id="td_title-campo1" class="titulocampo">
							<label class="form-label">Campo1.(*)</label>
						</td>
						<td id="td_control-campo1" align="left" class="controlcampo">
							<textarea id="form-campo1" name="form-campo1" class="form-control"  placeholder="Campo1"  title="Campo1"   style="font-size: 13px;" rows="2" cols="25" size="20" ></textarea>
							<span id="spanstrMensajecampo1" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_9">
						<td id="td_title-campo2" class="titulocampo">
							<label class="form-label">Campo2.(*)</label>
						</td>
						<td id="td_control-campo2" align="left" class="controlcampo">
							<input id="form-campo2" name="form-campo2" type="text" class="form-control"  placeholder="Campo2"  title="Campo2"    maxlength="18" size="12" >
							<span id="spanstrMensajecampo2" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_10">
						<td id="td_title-campo3" class="titulocampo">
							<label class="form-label">Campo3.(*)</label>
						</td>
						<td id="td_control-campo3" align="left" class="controlcampo">
							<textarea id="form-campo3" name="form-campo3" class="form-control"  placeholder="Campo3"  title="Campo3"   style="font-size: 13px;"  rows ="0" cols= "25"></textarea>
							<span id="spanstrMensajecampo3" class="mensajeerror"></span>
						</td>
					</tr>
				</table> <!-- tblElementosinventario_fisico_detalle -->

				<!-- SECCION/OCULTOS -->
				<table id="tblCamposOcultosinventario_fisico_detalle" class="elementos" style="display: table-row;">
					<caption class="busquedacabecera">
						<span>Campos Ocultos</span>
					</caption>
				</table> <!-- tblCamposOcultosinventario_fisico_detalle -->

			</td></tr> <!-- trinventario_fisico_detalleElementos -->
			</table> <!-- tblinventario_fisico_detalleElementos -->
			</form> <!-- frmMantenimientoinventario_fisico_detalle -->


			

				<form id="frmAccionesMantenimientoinventario_fisico_detalle" name="frmAccionesMantenimientoinventario_fisico_detalle">

			<?php if(inventario_fisico_detalle_web::$STR_ES_BUSQUEDA=='false' ) {?>
			<table id="tblinventario_fisico_detalleAcciones" class="elementos" style="text-align: center">
		<tr id="trinventario_fisico_detalleAcciones" class="elementos" style="display:table-row">
			<td align="center">
				<a id="Acciones" ></a>

				<?php if(inventario_fisico_detalle_web::$STR_ES_RELACIONES=='false' ) {?>
				<div align="right">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
				<?php } ?>

					<!-- SECCION/BOTONES -->
					<table id="tblAccionesMantenimientoinventario_fisico_detalle" class="busqueda" style="width: 50%;text-align: center">

						<?php if(inventario_fisico_detalle_web::$STR_ES_RELACIONES=='false' ) {?>
						<!--
						<caption class="busquedacabecera">
							<span>Acciones</span>
						</caption>
						-->
						<?php } ?>

						<tr id="trAccionesMantenimientoinventario_fisico_detalleBasicos">
							<td id="tdbtnNuevoinventario_fisico_detalle" style="visibility:visible">
								<div id="divNuevoinventario_fisico_detalle" style="display:table-row">
									<input type="button" id="btnNuevoinventario_fisico_detalle" name="btnNuevoinventario_fisico_detalle" value="NUEVO" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnActualizarinventario_fisico_detalle" style="visibility:visible">
								<div id="divActualizarinventario_fisico_detalle" style="display:table-row">
									<input type="button" id="btnActualizarinventario_fisico_detalle" name="btnActualizarinventario_fisico_detalle" title="ACTUALIZAR Inventario Fisico Detalle ACTUAL" value="Actualizar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnEliminarinventario_fisico_detalle" style="visibility:visible">
								<div id="divEliminarinventario_fisico_detalle" style="display:table-row">
									<input type="button" id="btnEliminarinventario_fisico_detalle" name="btnEliminarinventario_fisico_detalle" title="ELIMINAR Inventario Fisico Detalle ACTUAL" value="Eliminar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnImprimirinventario_fisico_detalle" style="visibility:visible">
								<input type="button" id="btnImprimirinventario_fisico_detalle" name="btnImprimirinventario_fisico_detalle" title="IMPRIMIR PAGINA Inventario Fisico Detalle ACTUAL" value="Imp. Datos" class="btn btn-primary"/>
							</td>
							<td id="tdbtnCancelarinventario_fisico_detalle" style="visibility:visible">
								<input type="button" id="btnCancelarinventario_fisico_detalle" name="btnCancelarinventario_fisico_detalle" title="CANCELAR Inventario Fisico Detalle ACTUAL" value="Cancelar" class="btn btn-primary"/>
							</td>
						</tr>
						<tr id="trAccionesMantenimientoinventario_fisico_detalleGuardar" style="display:none">
							<td id="tdbtnGuardarCambiosinventario_fisico_detalle" colspan="4" align="center" style="visibility:visible">
								<div id="divGuardarCambiosinventario_fisico_detalle" style="display:table-row">
									<input type="button" id="btnGuardarCambiosFormularioinventario_fisico_detalle" name="btnGuardarCambiosFormularioinventario_fisico_detalle" title="GUARDAR" value="GUADAR CAMBIOS" class="btn btn-primary"/>
								</div>
							</td>
						</tr>
					</table> <!-- tblAccionesMantenimientoinventario_fisico_detalle -->
			</td>
		</tr> <!-- trinventario_fisico_detalleAcciones -->
		<?php if(inventario_fisico_detalle_web::$STR_ES_RELACIONADO=='false' ) {?>
		<tr id="trinventario_fisico_detalleParametrosAcciones" class="impresion"  style="display:table-row">
			<td align="center">
				<!-- SECCION/POST -->
				<table id="tblinventario_fisico_detalleParametrosAcciones" style="text-align: center;border: 0px solid black;padding: 0px; border-spacing: 0px">
					<caption class="busquedacabecera" style="padding: 0px;caption-side: top;">
						<span>Acciones Extra/Post</span>
					</caption>
					<tr id="trinventario_fisico_detalleFilaParametrosAcciones">
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
				</table> <!-- tblinventario_fisico_detalleParametrosAcciones -->
			</td>
		</tr> <!-- trinventario_fisico_detalleParametrosAcciones -->
		<?php }?>
		<tr id="trinventario_fisico_detalleMensajes" class="mensajes">
			<td align="center">
				<a id="Mensajes"></a>
			</td>
		</tr> <!-- trinventario_fisico_detalleMensajes -->
			</table> <!-- tblinventario_fisico_detalleAcciones -->
			<?php } ?>
			</form> <!-- frmMantenimientoinventario_fisico_detalle -->
			</div> <!-- divMantenimientoinventario_fisico_detalleAjaxWebPart -->
		</td>
	</tr> <!-- trinventario_fisico_detalleElementosFormulario/super -->
		<?php if(inventario_fisico_detalle_web::$STR_ES_RELACIONADO=='false' ) {?>

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
			
				import {inventario_fisico_detalle_webcontrol,inventario_fisico_detalle_webcontrol1} from './webroot/js/JavaScript/contabilidad/inventario/inventario_fisico_detalle/js/webcontrol/inventario_fisico_detalle_form_webcontrol.js?random=1';
				
				inventario_fisico_detalle_webcontrol1.setinventario_fisico_detalle_constante(window.inventario_fisico_detalle_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(inventario_fisico_detalle_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

