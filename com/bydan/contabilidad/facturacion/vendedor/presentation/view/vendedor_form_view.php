<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\facturacion\vendedor\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Vendedor Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/facturacion/vendedor/util/vendedor_carga.php');
	use com\bydan\contabilidad\facturacion\vendedor\util\vendedor_carga;
	
	//include_once('com/bydan/contabilidad/facturacion/vendedor/presentation/view/vendedor_web.php');
	//use com\bydan\contabilidad\facturacion\vendedor\presentation\view\vendedor_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	vendedor_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	vendedor_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$vendedor_web1= new vendedor_web();	
	$vendedor_web1->cargarDatosGenerales();
	
	//$moduloActual=$vendedor_web1->moduloActual;
	//$usuarioActual=$vendedor_web1->usuarioActual;
	//$sessionBase=$vendedor_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$vendedor_web1->parametroGeneralUsuarioActual;
	
	
		
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
		
		
			<script type="module" src="webroot/js/JavaScript/contabilidad/facturacion/vendedor/js/util/vendedor_form_funcion.js?random=1"></script>
						
		
		
		<?php 
			
		
			vendedor_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					vendedor_web::$GET_POST=$_GET;
				} else {
					vendedor_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			vendedor_web::$STR_NOMBRE_PAGINA = 'vendedor_form_view.php';
			vendedor_web::$BIT_ES_PAGINA_PRINCIPAL = 'false';
			vendedor_web::$BIT_ES_PAGINA_FORM = 'true';
				
			vendedor_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {vendedor_constante,vendedor_constante1} from './webroot/js/JavaScript/contabilidad/facturacion/vendedor/js/util/vendedor_constante.js?random=1';
			import {vendedor_funcion,vendedor_funcion1} from './webroot/js/JavaScript/contabilidad/facturacion/vendedor/js/util/vendedor_funcion.js?random=1';
			
			let vendedor_constante2 = new vendedor_constante();
			
			vendedor_constante2.STR_NOMBRE_PAGINA="<?php echo(vendedor_web::$STR_NOMBRE_PAGINA); ?>";
			vendedor_constante2.STR_TYPE_ON_LOADvendedor="<?php echo(vendedor_web::$STR_TYPE_ONLOAD); ?>";
			vendedor_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(vendedor_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			vendedor_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(vendedor_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			vendedor_constante2.STR_ACTION="<?php echo(vendedor_web::$STR_ACTION); ?>";
			vendedor_constante2.STR_ES_POPUP="<?php echo(vendedor_web::$STR_ES_POPUP); ?>";
			vendedor_constante2.STR_ES_BUSQUEDA="<?php echo(vendedor_web::$STR_ES_BUSQUEDA); ?>";
			vendedor_constante2.STR_FUNCION_JS="<?php echo(vendedor_web::$STR_FUNCION_JS); ?>";
			vendedor_constante2.BIG_ID_ACTUAL="<?php echo(vendedor_web::$BIG_ID_ACTUAL); ?>";
			vendedor_constante2.BIG_ID_OPCION="<?php echo(vendedor_web::$BIG_ID_OPCION); ?>";
			vendedor_constante2.STR_OBJETO_JS="<?php echo(vendedor_web::$STR_OBJETO_JS); ?>";
			vendedor_constante2.STR_ES_RELACIONES="<?php echo(vendedor_web::$STR_ES_RELACIONES); ?>";
			vendedor_constante2.STR_ES_RELACIONADO="<?php echo(vendedor_web::$STR_ES_RELACIONADO); ?>";
			vendedor_constante2.STR_ES_SUB_PAGINA="<?php echo(vendedor_web::$STR_ES_SUB_PAGINA); ?>";
			vendedor_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(vendedor_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			vendedor_constante2.BIT_ES_PAGINA_FORM=<?php echo(vendedor_web::$BIT_ES_PAGINA_FORM); ?>;
			vendedor_constante2.STR_SUFIJO="<?php echo(vendedor_web::$STR_SUF); ?>";//vendedor
			vendedor_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(vendedor_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//vendedor
			
			vendedor_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(vendedor_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			vendedor_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($vendedor_web1->moduloActual->getnombre()); ?>";
			vendedor_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(vendedor_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			vendedor_constante2.BIT_ES_LOAD_NORMAL=true;
			/*vendedor_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			vendedor_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.vendedor_constante2 = vendedor_constante2;
			
		</script>
		
		<?php if(vendedor_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.vendedor_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.vendedor_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="vendedorActual" ></a>
	
	<div id="divResumenvendedorActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(vendedor_web::$STR_ES_RELACIONADO=='false') {?>
		
		<div id="header" >
		
			<div id="banner">
				<span id="spanTituloBanner" class="titulobanner"></span>
			</div> <!-- banner -->
					
			<div id="subheader" class="links">  
			
						
			</div> <!-- sub-header -->
			
			
		</div> <!-- header -->
		
		<?php } ?>
		
		<div id="main">
		

			<?php if(vendedor_web::$STR_ES_RELACIONADO=='false') {?>
			
			
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(vendedor_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(vendedor_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divvendedorPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblvendedorPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmvendedorAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnvendedorAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="vendedor_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnvendedorAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmvendedorAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblvendedorPopupAjaxWebPart -->
		</div> <!-- divvendedorPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->		
		
		
		
			
<tr id="trvendedorElementosFormulario">
	<td>
		<div id="divMantenimientovendedorAjaxWebPart" title="VENDEDOR" style="height: 90%;width: 90%;position: relative;top: 30px;left: 30px;">
			<form id="frmMantenimientovendedor" name="frmMantenimientovendedor">

			</br>

			<?php if(vendedor_web::$STR_ES_RELACIONES=='false' ) {?>
			</br>
			<?php } ?>

			<!-- SECCION/TOOLBAR -->
			<table id="tblvendedorToolBarFormularioExterior" style="width: 65%">
				<tr style="display:table-row">
					<td align="center">

						<table id="tblvendedorToolBarFormulario" style="text-align: center"  style="display:table-row">
							<tr>
								<td id="tdvendedorActualizarToolBar" style="visibility:visible">
									<img id="imgActualizarToolBarvendedor" name="imgActualizarToolBarvendedor" title="ACTUALIZAR Vendedor ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/actualizar.gif" width="25" height="25"/>
								</td>
								<td id="tdvendedorEliminarToolBar" style="visibility:visible">
									<img id="imgEliminarToolBarvendedor" name="imgEliminarToolBarvendedor" title="ELIMINAR Vendedor ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/eliminar.gif" width="25" height="25"/>
								</td>
								<td id="tdvendedorCancelarToolBar" style="visibility:visible">
									<img id="imgCancelarToolBarvendedor" name="imgCancelarToolBarvendedor" title="CANCELAR Vendedor ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/cancelar.gif" width="25" height="25"/>
								</td>
								<td id="tdvendedorRelacionesToolBar" style="display:table-row">
									<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/xexpand.png" width="25" height="25" onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('tblCamposOcultosvendedor',this,'../')"/>
								</td>
							</tr>
						</table> <!-- tblvendedorToolBarFormulario -->

					</td>
				</tr>
			</table> <!-- tblvendedorToolBarFormularioExterior -->

			<table id="tblvendedorElementos">
			<tr id="trvendedorElementos" class="elementos" style="display:table-row">
			<td align="center">

			<a id="Campos"></a>

				<?php if(vendedor_web::$STR_ES_RELACIONES=='false' ) {?>
				<div id="divFlechaArribaElementos" align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
					<span></span>
				</div>
				<?php } ?>

				<!-- SECCION/FORMULARIO -->
				<table id="tblElementosvendedor" class="elementos" style="width: 300px; padding: 0px; border-spacing: 0px; border-collapse: collapse; text-align: left;">
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
							<input id="form-nombre" name="form-nombre" type="text" class="form-control"  placeholder="Nombre"  title="Nombre"    size="20"  maxlength="40"/>
							<span id="spanstrMensajenombre" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_6">
						<td id="td_title-direccion1" class="titulocampo">
							<label class="form-label">Direccion 1</label>
						</td>
						<td id="td_control-direccion1" align="left" class="controlcampo">
							<textarea id="form-direccion1" name="form-direccion1" class="form-control"  placeholder="Direccion 1"  title="Direccion 1"   style="font-size: 13px;" rows="2" cols="25" size="20" ></textarea>
							<span id="spanstrMensajedireccion1" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_7">
						<td id="td_title-direccion2" class="titulocampo">
							<label class="form-label">Direccion 2</label>
						</td>
						<td id="td_control-direccion2" align="left" class="controlcampo">
							<textarea id="form-direccion2" name="form-direccion2" class="form-control"  placeholder="Direccion 2"  title="Direccion 2"   style="font-size: 13px;" rows="2" cols="25" size="20" ></textarea>
							<span id="spanstrMensajedireccion2" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_8">
						<td id="td_title-comision" class="titulocampo">
							<label class="form-label">Comision.(*)</label>
						</td>
						<td id="td_control-comision" align="left" class="controlcampo">
							<input id="form-comision" name="form-comision" type="text" class="form-control"  placeholder="Comision"  title="Comision"    maxlength="18" size="12" >
							<span id="spanstrMensajecomision" class="mensajeerror"></span>
						</td>
					</tr>
				</table> <!-- tblElementosvendedor -->

				<!-- SECCION/OCULTOS -->
				<table id="tblCamposOcultosvendedor" class="elementos" style="display: table-row;">
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
					
				</table> <!-- tblCamposOcultosvendedor -->

			</td></tr> <!-- trvendedorElementos -->
			</table> <!-- tblvendedorElementos -->
			</form> <!-- frmMantenimientovendedor -->


			

				<form id="frmAccionesMantenimientovendedor" name="frmAccionesMantenimientovendedor">

			<?php if(vendedor_web::$STR_ES_BUSQUEDA=='false' ) {?>
			<table id="tblvendedorAcciones" class="elementos" style="text-align: center">
		<tr id="trvendedorAcciones" class="elementos" style="display:table-row">
			<td align="center">
				<a id="Acciones" ></a>

				<?php if(vendedor_web::$STR_ES_RELACIONES=='false' ) {?>
				<div align="right">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
				<?php } ?>

					<!-- SECCION/BOTONES -->
					<table id="tblAccionesMantenimientovendedor" class="busqueda" style="width: 50%;text-align: left">

						<?php if(vendedor_web::$STR_ES_RELACIONES=='false' ) {?>
						<!--
						<caption class="busquedacabecera">
							<span>Acciones</span>
						</caption>
						-->
						<?php } ?>

						<tr id="trAccionesMantenimientovendedorBasicos">
							<td id="tdbtnNuevovendedor" style="visibility:visible">
								<div id="divNuevovendedor" style="display:table-row">
									<input type="button" id="btnNuevovendedor" name="btnNuevovendedor" value="NUEVO" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnActualizarvendedor" style="visibility:visible">
								<div id="divActualizarvendedor" style="display:table-row">
									<input type="button" id="btnActualizarvendedor" name="btnActualizarvendedor" title="ACTUALIZAR Vendedor ACTUAL" value="Actualizar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnEliminarvendedor" style="visibility:visible">
								<div id="divEliminarvendedor" style="display:table-row">
									<input type="button" id="btnEliminarvendedor" name="btnEliminarvendedor" title="ELIMINAR Vendedor ACTUAL" value="Eliminar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnImprimirvendedor" style="visibility:visible">
								<input type="button" id="btnImprimirvendedor" name="btnImprimirvendedor" title="IMPRIMIR PAGINA Vendedor ACTUAL" value="Imp. Datos" class="btn btn-primary"/>
							</td>
							<td id="tdbtnCancelarvendedor" style="visibility:visible">
								<input type="button" id="btnCancelarvendedor" name="btnCancelarvendedor" title="CANCELAR Vendedor ACTUAL" value="Cancelar" class="btn btn-primary"/>
							</td>
						</tr>
						<tr id="trAccionesMantenimientovendedorGuardar" style="display:none">
							<td id="tdbtnGuardarCambiosvendedor" colspan="4" align="center" style="visibility:visible">
								<div id="divGuardarCambiosvendedor" style="display:table-row">
									<input type="button" id="btnGuardarCambiosFormulariovendedor" name="btnGuardarCambiosFormulariovendedor" title="GUARDAR" value="GUADAR CAMBIOS" class="btn btn-primary"/>
								</div>
							</td>
						</tr>
					</table> <!-- tblAccionesMantenimientovendedor -->
			</td>
		</tr> <!-- trvendedorAcciones -->
		<?php if(vendedor_web::$STR_ES_RELACIONADO=='false' ) {?>
		<tr id="trvendedorParametrosAcciones" class="impresion"  style="display:table-row">
			<td align="center">
				<!-- SECCION/POST -->
				<table id="tblvendedorParametrosAcciones" style="text-align: center;border: 0px solid black;padding: 0px; border-spacing: 0px">
					<caption class="busquedacabecera" style="padding: 0px;caption-side: top;">
						<span>Acciones Extra/Post</span>
					</caption>
					<tr id="trvendedorFilaParametrosAcciones">
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
				</table> <!-- tblvendedorParametrosAcciones -->
			</td>
		</tr> <!-- trvendedorParametrosAcciones -->
		<?php }?>
		<tr id="trvendedorMensajes" class="mensajes">
			<td align="center">
				<a id="Mensajes"></a>
			</td>
		</tr> <!-- trvendedorMensajes -->
			</table> <!-- tblvendedorAcciones -->
			<?php } ?>
			</form> <!-- frmMantenimientovendedor -->
			</div> <!-- divMantenimientovendedorAjaxWebPart -->
		</td>
	</tr> <!-- trvendedorElementosFormulario/super -->
		<?php if(vendedor_web::$STR_ES_RELACIONADO=='false' ) {?>

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
			
				import {vendedor_webcontrol,vendedor_webcontrol1} from './webroot/js/JavaScript/contabilidad/facturacion/vendedor/js/webcontrol/vendedor_form_webcontrol.js?random=1';
				
				vendedor_webcontrol1.setvendedor_constante(window.vendedor_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(vendedor_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

