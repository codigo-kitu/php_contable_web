<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\contabilidad\cambio_dolar\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Cambio Dolar Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/contabilidad/cambio_dolar/util/cambio_dolar_carga.php');
	use com\bydan\contabilidad\contabilidad\cambio_dolar\util\cambio_dolar_carga;
	
	//include_once('com/bydan/contabilidad/contabilidad/cambio_dolar/presentation/view/cambio_dolar_web.php');
	//use com\bydan\contabilidad\contabilidad\cambio_dolar\presentation\view\cambio_dolar_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	cambio_dolar_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	cambio_dolar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$cambio_dolar_web1= new cambio_dolar_web();	
	$cambio_dolar_web1->cargarDatosGenerales();
	
	//$moduloActual=$cambio_dolar_web1->moduloActual;
	//$usuarioActual=$cambio_dolar_web1->usuarioActual;
	//$sessionBase=$cambio_dolar_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$cambio_dolar_web1->parametroGeneralUsuarioActual;
	
	
		
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
		
		
			<script type="module" src="webroot/js/JavaScript/contabilidad/contabilidad/cambio_dolar/js/util/cambio_dolar_form_funcion.js?random=1"></script>
						
		
		
		<?php 
			
		
			cambio_dolar_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					cambio_dolar_web::$GET_POST=$_GET;
				} else {
					cambio_dolar_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			cambio_dolar_web::$STR_NOMBRE_PAGINA = 'cambio_dolar_form_view.php';
			cambio_dolar_web::$BIT_ES_PAGINA_PRINCIPAL = 'false';
			cambio_dolar_web::$BIT_ES_PAGINA_FORM = 'true';
				
			cambio_dolar_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {cambio_dolar_constante,cambio_dolar_constante1} from './webroot/js/JavaScript/contabilidad/contabilidad/cambio_dolar/js/util/cambio_dolar_constante.js?random=1';
			import {cambio_dolar_funcion,cambio_dolar_funcion1} from './webroot/js/JavaScript/contabilidad/contabilidad/cambio_dolar/js/util/cambio_dolar_funcion.js?random=1';
			
			let cambio_dolar_constante2 = new cambio_dolar_constante();
			
			cambio_dolar_constante2.STR_NOMBRE_PAGINA="<?php echo(cambio_dolar_web::$STR_NOMBRE_PAGINA); ?>";
			cambio_dolar_constante2.STR_TYPE_ON_LOADcambio_dolar="<?php echo(cambio_dolar_web::$STR_TYPE_ONLOAD); ?>";
			cambio_dolar_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(cambio_dolar_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			cambio_dolar_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(cambio_dolar_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			cambio_dolar_constante2.STR_ACTION="<?php echo(cambio_dolar_web::$STR_ACTION); ?>";
			cambio_dolar_constante2.STR_ES_POPUP="<?php echo(cambio_dolar_web::$STR_ES_POPUP); ?>";
			cambio_dolar_constante2.STR_ES_BUSQUEDA="<?php echo(cambio_dolar_web::$STR_ES_BUSQUEDA); ?>";
			cambio_dolar_constante2.STR_FUNCION_JS="<?php echo(cambio_dolar_web::$STR_FUNCION_JS); ?>";
			cambio_dolar_constante2.BIG_ID_ACTUAL="<?php echo(cambio_dolar_web::$BIG_ID_ACTUAL); ?>";
			cambio_dolar_constante2.BIG_ID_OPCION="<?php echo(cambio_dolar_web::$BIG_ID_OPCION); ?>";
			cambio_dolar_constante2.STR_OBJETO_JS="<?php echo(cambio_dolar_web::$STR_OBJETO_JS); ?>";
			cambio_dolar_constante2.STR_ES_RELACIONES="<?php echo(cambio_dolar_web::$STR_ES_RELACIONES); ?>";
			cambio_dolar_constante2.STR_ES_RELACIONADO="<?php echo(cambio_dolar_web::$STR_ES_RELACIONADO); ?>";
			cambio_dolar_constante2.STR_ES_SUB_PAGINA="<?php echo(cambio_dolar_web::$STR_ES_SUB_PAGINA); ?>";
			cambio_dolar_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(cambio_dolar_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			cambio_dolar_constante2.BIT_ES_PAGINA_FORM=<?php echo(cambio_dolar_web::$BIT_ES_PAGINA_FORM); ?>;
			cambio_dolar_constante2.STR_SUFIJO="<?php echo(cambio_dolar_web::$STR_SUF); ?>";//cambio_dolar
			cambio_dolar_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(cambio_dolar_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//cambio_dolar
			
			cambio_dolar_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(cambio_dolar_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			cambio_dolar_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($cambio_dolar_web1->moduloActual->getnombre()); ?>";
			cambio_dolar_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(cambio_dolar_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			cambio_dolar_constante2.BIT_ES_LOAD_NORMAL=true;
			/*cambio_dolar_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			cambio_dolar_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.cambio_dolar_constante2 = cambio_dolar_constante2;
			
		</script>
		
		<?php if(cambio_dolar_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.cambio_dolar_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.cambio_dolar_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="cambio_dolarActual" ></a>
	
	<div id="divResumencambio_dolarActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(cambio_dolar_web::$STR_ES_RELACIONADO=='false') {?>
		
		<div id="header" >
		
			<div id="banner">
				<span id="spanTituloBanner" class="titulobanner"></span>
			</div> <!-- banner -->
					
			<div id="subheader" class="links">  
			
						
			</div> <!-- sub-header -->
			
			
		</div> <!-- header -->
		
		<?php } ?>
		
		<div id="main">
		

			<?php if(cambio_dolar_web::$STR_ES_RELACIONADO=='false') {?>
			
			
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(cambio_dolar_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(cambio_dolar_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divcambio_dolarPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblcambio_dolarPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmcambio_dolarAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btncambio_dolarAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="cambio_dolar_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btncambio_dolarAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmcambio_dolarAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblcambio_dolarPopupAjaxWebPart -->
		</div> <!-- divcambio_dolarPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->		
		
		
		
			
<tr id="trcambio_dolarElementosFormulario">
	<td>
		<div id="divMantenimientocambio_dolarAjaxWebPart" title="CAMBIO DOLAR" style="height: 90%;width: 90%;position: relative;top: 30px;left: 30px;">
			<form id="frmMantenimientocambio_dolar" name="frmMantenimientocambio_dolar">

			</br>

			<?php if(cambio_dolar_web::$STR_ES_RELACIONES=='false' ) {?>
			</br>
			<?php } ?>

			<!-- SECCION/TOOLBAR -->
			<table id="tblcambio_dolarToolBarFormularioExterior" style="width: 65%">
				<tr style="display:table-row">
					<td align="center">

						<table id="tblcambio_dolarToolBarFormulario" style="text-align: center"  style="display:table-row">
							<tr>
								<td id="tdcambio_dolarActualizarToolBar" style="visibility:visible">
									<img id="imgActualizarToolBarcambio_dolar" name="imgActualizarToolBarcambio_dolar" title="ACTUALIZAR Cambio Dolar ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/actualizar.gif" width="25" height="25"/>
								</td>
								<td id="tdcambio_dolarEliminarToolBar" style="visibility:visible">
									<img id="imgEliminarToolBarcambio_dolar" name="imgEliminarToolBarcambio_dolar" title="ELIMINAR Cambio Dolar ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/eliminar.gif" width="25" height="25"/>
								</td>
								<td id="tdcambio_dolarCancelarToolBar" style="visibility:visible">
									<img id="imgCancelarToolBarcambio_dolar" name="imgCancelarToolBarcambio_dolar" title="CANCELAR Cambio Dolar ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/cancelar.gif" width="25" height="25"/>
								</td>
								<td id="tdcambio_dolarRelacionesToolBar" style="display:table-row">
									<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/xexpand.png" width="25" height="25" onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('tblCamposOcultoscambio_dolar',this,'../')"/>
								</td>
							</tr>
						</table> <!-- tblcambio_dolarToolBarFormulario -->

					</td>
				</tr>
			</table> <!-- tblcambio_dolarToolBarFormularioExterior -->

			<table id="tblcambio_dolarElementos">
			<tr id="trcambio_dolarElementos" class="elementos" style="display:table-row">
			<td align="center">

			<a id="Campos"></a>

				<?php if(cambio_dolar_web::$STR_ES_RELACIONES=='false' ) {?>
				<div id="divFlechaArribaElementos" align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
					<span></span>
				</div>
				<?php } ?>

				<!-- SECCION/FORMULARIO -->
				<table id="tblElementoscambio_dolar" class="elementos" style="width: 300px; padding: 0px; border-spacing: 0px; border-collapse: collapse; text-align: center;">
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
						<td id="td_title-fecha_cambio" class="titulocampo">
							<label class="form-label">Fecha Cambio.(*)</label>
						</td>
						<td id="td_control-fecha_cambio" align="left" class="controlcampo">
							<input id="form-fecha_cambio" name="form-fecha_cambio" type="text" class="form-control"  placeholder="Fecha Cambio"  title="Fecha Cambio"    size="10" >
							<span id="spanstrMensajefecha_cambio" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_5">
						<td id="td_title-dolar_compra" class="titulocampo">
							<label class="form-label">Dolar Compra.(*)</label>
						</td>
						<td id="td_control-dolar_compra" align="left" class="controlcampo">
							<input id="form-dolar_compra" name="form-dolar_compra" type="text" class="form-control"  placeholder="Dolar Compra"  title="Dolar Compra"    maxlength="18" size="12" >
							<span id="spanstrMensajedolar_compra" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_6">
						<td id="td_title-dolar_venta" class="titulocampo">
							<label class="form-label">Dolar Venta.(*)</label>
						</td>
						<td id="td_control-dolar_venta" align="left" class="controlcampo">
							<input id="form-dolar_venta" name="form-dolar_venta" type="text" class="form-control"  placeholder="Dolar Venta"  title="Dolar Venta"    maxlength="18" size="12" >
							<span id="spanstrMensajedolar_venta" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_7">
						<td id="td_title-origen" class="titulocampo">
							<label class="form-label">Origen.(*)</label>
						</td>
						<td id="td_control-origen" align="left" class="controlcampo">
							<input id="form-origen" name="form-origen" type="text" class="form-control"  placeholder="Origen"  title="Origen"    size="2"  maxlength="2"/>
							<span id="spanstrMensajeorigen" class="mensajeerror"></span>
						</td>
					</tr>
				</table> <!-- tblElementoscambio_dolar -->

				<!-- SECCION/OCULTOS -->
				<table id="tblCamposOcultoscambio_dolar" class="elementos" style="display: table-row;">
					<caption class="busquedacabecera">
						<span>Campos Ocultos</span>
					</caption>
				</table> <!-- tblCamposOcultoscambio_dolar -->

			</td></tr> <!-- trcambio_dolarElementos -->
			</table> <!-- tblcambio_dolarElementos -->
			</form> <!-- frmMantenimientocambio_dolar -->


			

				<form id="frmAccionesMantenimientocambio_dolar" name="frmAccionesMantenimientocambio_dolar">

			<?php if(cambio_dolar_web::$STR_ES_BUSQUEDA=='false' ) {?>
			<table id="tblcambio_dolarAcciones" class="elementos" style="text-align: center">
		<tr id="trcambio_dolarAcciones" class="elementos" style="display:table-row">
			<td align="center">
				<a id="Acciones" ></a>

				<?php if(cambio_dolar_web::$STR_ES_RELACIONES=='false' ) {?>
				<div align="right">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
				<?php } ?>

					<!-- SECCION/BOTONES -->
					<table id="tblAccionesMantenimientocambio_dolar" class="busqueda" style="width: 50%;text-align: center">

						<?php if(cambio_dolar_web::$STR_ES_RELACIONES=='false' ) {?>
						<!--
						<caption class="busquedacabecera">
							<span>Acciones</span>
						</caption>
						-->
						<?php } ?>

						<tr id="trAccionesMantenimientocambio_dolarBasicos">
							<td id="tdbtnNuevocambio_dolar" style="visibility:visible">
								<div id="divNuevocambio_dolar" style="display:table-row">
									<input type="button" id="btnNuevocambio_dolar" name="btnNuevocambio_dolar" value="NUEVO" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnActualizarcambio_dolar" style="visibility:visible">
								<div id="divActualizarcambio_dolar" style="display:table-row">
									<input type="button" id="btnActualizarcambio_dolar" name="btnActualizarcambio_dolar" title="ACTUALIZAR Cambio Dolar ACTUAL" value="Actualizar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnEliminarcambio_dolar" style="visibility:visible">
								<div id="divEliminarcambio_dolar" style="display:table-row">
									<input type="button" id="btnEliminarcambio_dolar" name="btnEliminarcambio_dolar" title="ELIMINAR Cambio Dolar ACTUAL" value="Eliminar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnImprimircambio_dolar" style="visibility:visible">
								<input type="button" id="btnImprimircambio_dolar" name="btnImprimircambio_dolar" title="IMPRIMIR PAGINA Cambio Dolar ACTUAL" value="Imp. Datos" class="btn btn-primary"/>
							</td>
							<td id="tdbtnCancelarcambio_dolar" style="visibility:visible">
								<input type="button" id="btnCancelarcambio_dolar" name="btnCancelarcambio_dolar" title="CANCELAR Cambio Dolar ACTUAL" value="Cancelar" class="btn btn-primary"/>
							</td>
						</tr>
						<tr id="trAccionesMantenimientocambio_dolarGuardar" style="display:none">
							<td id="tdbtnGuardarCambioscambio_dolar" colspan="4" align="center" style="visibility:visible">
								<div id="divGuardarCambioscambio_dolar" style="display:table-row">
									<input type="button" id="btnGuardarCambiosFormulariocambio_dolar" name="btnGuardarCambiosFormulariocambio_dolar" title="GUARDAR" value="GUADAR CAMBIOS" class="btn btn-primary"/>
								</div>
							</td>
						</tr>
					</table> <!-- tblAccionesMantenimientocambio_dolar -->
			</td>
		</tr> <!-- trcambio_dolarAcciones -->
		<?php if(cambio_dolar_web::$STR_ES_RELACIONADO=='false' ) {?>
		<tr id="trcambio_dolarParametrosAcciones" class="impresion"  style="display:table-row">
			<td align="center">
				<!-- SECCION/POST -->
				<table id="tblcambio_dolarParametrosAcciones" style="text-align: center;border: 0px solid black;padding: 0px; border-spacing: 0px">
					<caption class="busquedacabecera" style="padding: 0px;caption-side: top;">
						<span>Acciones Extra/Post</span>
					</caption>
					<tr id="trcambio_dolarFilaParametrosAcciones">
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
				</table> <!-- tblcambio_dolarParametrosAcciones -->
			</td>
		</tr> <!-- trcambio_dolarParametrosAcciones -->
		<?php }?>
		<tr id="trcambio_dolarMensajes" class="mensajes">
			<td align="center">
				<a id="Mensajes"></a>
			</td>
		</tr> <!-- trcambio_dolarMensajes -->
			</table> <!-- tblcambio_dolarAcciones -->
			<?php } ?>
			</form> <!-- frmMantenimientocambio_dolar -->
			</div> <!-- divMantenimientocambio_dolarAjaxWebPart -->
		</td>
	</tr> <!-- trcambio_dolarElementosFormulario/super -->
		<?php if(cambio_dolar_web::$STR_ES_RELACIONADO=='false' ) {?>

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
			
				import {cambio_dolar_webcontrol,cambio_dolar_webcontrol1} from './webroot/js/JavaScript/contabilidad/contabilidad/cambio_dolar/js/webcontrol/cambio_dolar_form_webcontrol.js?random=1';
				
				cambio_dolar_webcontrol1.setcambio_dolar_constante(window.cambio_dolar_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(cambio_dolar_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

