<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\general\tipo_termino_pago\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Tipo Termino Pago Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/general/tipo_termino_pago/util/tipo_termino_pago_carga.php');
	use com\bydan\contabilidad\general\tipo_termino_pago\util\tipo_termino_pago_carga;
	
	//include_once('com/bydan/contabilidad/general/tipo_termino_pago/presentation/view/tipo_termino_pago_web.php');
	//use com\bydan\contabilidad\general\tipo_termino_pago\presentation\view\tipo_termino_pago_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	tipo_termino_pago_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	tipo_termino_pago_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$tipo_termino_pago_web1= new tipo_termino_pago_web();	
	$tipo_termino_pago_web1->cargarDatosGenerales();
	
	//$moduloActual=$tipo_termino_pago_web1->moduloActual;
	//$usuarioActual=$tipo_termino_pago_web1->usuarioActual;
	//$sessionBase=$tipo_termino_pago_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$tipo_termino_pago_web1->parametroGeneralUsuarioActual;
	
	
		
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
		
		
			<script type="module" src="webroot/js/JavaScript/contabilidad/general/tipo_termino_pago/js/util/tipo_termino_pago_form_funcion.js?random=1"></script>
						
		
		
		<?php 
			
		
			tipo_termino_pago_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					tipo_termino_pago_web::$GET_POST=$_GET;
				} else {
					tipo_termino_pago_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			tipo_termino_pago_web::$STR_NOMBRE_PAGINA = 'tipo_termino_pago_form_view.php';
			tipo_termino_pago_web::$BIT_ES_PAGINA_PRINCIPAL = 'false';
			tipo_termino_pago_web::$BIT_ES_PAGINA_FORM = 'true';
				
			tipo_termino_pago_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {tipo_termino_pago_constante,tipo_termino_pago_constante1} from './webroot/js/JavaScript/contabilidad/general/tipo_termino_pago/js/util/tipo_termino_pago_constante.js?random=1';
			import {tipo_termino_pago_funcion,tipo_termino_pago_funcion1} from './webroot/js/JavaScript/contabilidad/general/tipo_termino_pago/js/util/tipo_termino_pago_funcion.js?random=1';
			
			let tipo_termino_pago_constante2 = new tipo_termino_pago_constante();
			
			tipo_termino_pago_constante2.STR_NOMBRE_PAGINA="<?php echo(tipo_termino_pago_web::$STR_NOMBRE_PAGINA); ?>";
			tipo_termino_pago_constante2.STR_TYPE_ON_LOADtipo_termino_pago="<?php echo(tipo_termino_pago_web::$STR_TYPE_ONLOAD); ?>";
			tipo_termino_pago_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(tipo_termino_pago_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			tipo_termino_pago_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(tipo_termino_pago_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			tipo_termino_pago_constante2.STR_ACTION="<?php echo(tipo_termino_pago_web::$STR_ACTION); ?>";
			tipo_termino_pago_constante2.STR_ES_POPUP="<?php echo(tipo_termino_pago_web::$STR_ES_POPUP); ?>";
			tipo_termino_pago_constante2.STR_ES_BUSQUEDA="<?php echo(tipo_termino_pago_web::$STR_ES_BUSQUEDA); ?>";
			tipo_termino_pago_constante2.STR_FUNCION_JS="<?php echo(tipo_termino_pago_web::$STR_FUNCION_JS); ?>";
			tipo_termino_pago_constante2.BIG_ID_ACTUAL="<?php echo(tipo_termino_pago_web::$BIG_ID_ACTUAL); ?>";
			tipo_termino_pago_constante2.BIG_ID_OPCION="<?php echo(tipo_termino_pago_web::$BIG_ID_OPCION); ?>";
			tipo_termino_pago_constante2.STR_OBJETO_JS="<?php echo(tipo_termino_pago_web::$STR_OBJETO_JS); ?>";
			tipo_termino_pago_constante2.STR_ES_RELACIONES="<?php echo(tipo_termino_pago_web::$STR_ES_RELACIONES); ?>";
			tipo_termino_pago_constante2.STR_ES_RELACIONADO="<?php echo(tipo_termino_pago_web::$STR_ES_RELACIONADO); ?>";
			tipo_termino_pago_constante2.STR_ES_SUB_PAGINA="<?php echo(tipo_termino_pago_web::$STR_ES_SUB_PAGINA); ?>";
			tipo_termino_pago_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(tipo_termino_pago_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			tipo_termino_pago_constante2.BIT_ES_PAGINA_FORM=<?php echo(tipo_termino_pago_web::$BIT_ES_PAGINA_FORM); ?>;
			tipo_termino_pago_constante2.STR_SUFIJO="<?php echo(tipo_termino_pago_web::$STR_SUF); ?>";//tipo_termino_pago
			tipo_termino_pago_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(tipo_termino_pago_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//tipo_termino_pago
			
			tipo_termino_pago_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(tipo_termino_pago_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			tipo_termino_pago_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($tipo_termino_pago_web1->moduloActual->getnombre()); ?>";
			tipo_termino_pago_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(tipo_termino_pago_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			tipo_termino_pago_constante2.BIT_ES_LOAD_NORMAL=true;
			/*tipo_termino_pago_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			tipo_termino_pago_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.tipo_termino_pago_constante2 = tipo_termino_pago_constante2;
			
		</script>
		
		<?php if(tipo_termino_pago_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.tipo_termino_pago_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.tipo_termino_pago_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="tipo_termino_pagoActual" ></a>
	
	<div id="divResumentipo_termino_pagoActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(tipo_termino_pago_web::$STR_ES_RELACIONADO=='false') {?>
		
		<div id="header" >
		
			<div id="banner">
				<span id="spanTituloBanner" class="titulobanner"></span>
			</div> <!-- banner -->
					
			<div id="subheader" class="links">  
			
						
			</div> <!-- sub-header -->
			
			
		</div> <!-- header -->
		
		<?php } ?>
		
		<div id="main">
		

			<?php if(tipo_termino_pago_web::$STR_ES_RELACIONADO=='false') {?>
			
			
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(tipo_termino_pago_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(tipo_termino_pago_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divtipo_termino_pagoPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tbltipo_termino_pagoPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmtipo_termino_pagoAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btntipo_termino_pagoAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="tipo_termino_pago_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btntipo_termino_pagoAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmtipo_termino_pagoAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tbltipo_termino_pagoPopupAjaxWebPart -->
		</div> <!-- divtipo_termino_pagoPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->		
		
		
		
			
<tr id="trtipo_termino_pagoElementosFormulario">
	<td>
		<div id="divMantenimientotipo_termino_pagoAjaxWebPart" title="TIPO TERMINO PAGO" style="height: 90%;width: 90%;position: relative;top: 30px;left: 30px;">
			<form id="frmMantenimientotipo_termino_pago" name="frmMantenimientotipo_termino_pago">

			</br>

			<?php if(tipo_termino_pago_web::$STR_ES_RELACIONES=='false' ) {?>
			</br>
			<?php } ?>

			<!-- SECCION/TOOLBAR -->
			<table id="tbltipo_termino_pagoToolBarFormularioExterior" style="width: 65%">
				<tr style="display:table-row">
					<td align="center">

						<table id="tbltipo_termino_pagoToolBarFormulario" style="text-align: center"  style="display:table-row">
							<tr>
								<td id="tdtipo_termino_pagoActualizarToolBar" style="visibility:visible">
									<img id="imgActualizarToolBartipo_termino_pago" name="imgActualizarToolBartipo_termino_pago" title="ACTUALIZAR Tipo Termino Pago ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/actualizar.gif" width="25" height="25"/>
								</td>
								<td id="tdtipo_termino_pagoEliminarToolBar" style="visibility:visible">
									<img id="imgEliminarToolBartipo_termino_pago" name="imgEliminarToolBartipo_termino_pago" title="ELIMINAR Tipo Termino Pago ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/eliminar.gif" width="25" height="25"/>
								</td>
								<td id="tdtipo_termino_pagoCancelarToolBar" style="visibility:visible">
									<img id="imgCancelarToolBartipo_termino_pago" name="imgCancelarToolBartipo_termino_pago" title="CANCELAR Tipo Termino Pago ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/cancelar.gif" width="25" height="25"/>
								</td>
								<td id="tdtipo_termino_pagoRelacionesToolBar" style="display:table-row">
									<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/xexpand.png" width="25" height="25" onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('tblCamposOcultostipo_termino_pago',this,'../')"/>
								</td>
							</tr>
						</table> <!-- tbltipo_termino_pagoToolBarFormulario -->

					</td>
				</tr>
			</table> <!-- tbltipo_termino_pagoToolBarFormularioExterior -->

			<table id="tbltipo_termino_pagoElementos">
			<tr id="trtipo_termino_pagoElementos" class="elementos" style="display:table-row">
			<td align="center">

			<a id="Campos"></a>

				<?php if(tipo_termino_pago_web::$STR_ES_RELACIONES=='false' ) {?>
				<div id="divFlechaArribaElementos" align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
					<span></span>
				</div>
				<?php } ?>

				<!-- SECCION/FORMULARIO -->
				<table id="tblElementostipo_termino_pago" class="elementos" style="width: 300px; padding: 0px; border-spacing: 0px; border-collapse: collapse; text-align: center;">
					<tr id="tr_fila_1">
								<td id="td_title-id" class="titulocampo">
									<label class="form-label">Cod. Único</label>
								</td>
								<td id="td_control-id" align="left">
									<input id="form-id" name="form-id" type="text" class="form-control"  size="10">
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
							<input id="form-codigo" name="form-codigo" type="text" class="form-control"  placeholder="Codigo"  title="Codigo"    size="20"  maxlength="25"/>
							<span id="spanstrMensajecodigo" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_5">
						<td id="td_title-nombre" class="titulocampo">
							<label class="form-label">Nombre.(*)</label>
						</td>
						<td id="td_control-nombre" align="left" class="controlcampo">
							<input id="form-nombre" name="form-nombre" type="text" class="form-control"  placeholder="Nombre"  title="Nombre"    size="20"  maxlength="50"/>
							<span id="spanstrMensajenombre" class="mensajeerror"></span>
						</td>
					</tr>
				</table> <!-- tblElementostipo_termino_pago -->

				<!-- SECCION/OCULTOS -->
				<table id="tblCamposOcultostipo_termino_pago" class="elementos" style="display: table-row;">
					<caption class="busquedacabecera">
						<span>Campos Ocultos</span>
					</caption>
				</table> <!-- tblCamposOcultostipo_termino_pago -->

			</td></tr> <!-- trtipo_termino_pagoElementos -->
			</table> <!-- tbltipo_termino_pagoElementos -->
			</form> <!-- frmMantenimientotipo_termino_pago -->


			

				<form id="frmAccionesMantenimientotipo_termino_pago" name="frmAccionesMantenimientotipo_termino_pago">

			<?php if(tipo_termino_pago_web::$STR_ES_BUSQUEDA=='false' ) {?>
			<table id="tbltipo_termino_pagoAcciones" class="elementos" style="text-align: center">
		<tr id="trtipo_termino_pagoAcciones" class="elementos" style="display:table-row">
			<td align="center">
				<a id="Acciones" ></a>

				<?php if(tipo_termino_pago_web::$STR_ES_RELACIONES=='false' ) {?>
				<div align="right">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
				<?php } ?>

					<!-- SECCION/BOTONES -->
					<table id="tblAccionesMantenimientotipo_termino_pago" class="busqueda" style="width: 50%;text-align: center">

						<?php if(tipo_termino_pago_web::$STR_ES_RELACIONES=='false' ) {?>
						<!--
						<caption class="busquedacabecera">
							<span>Acciones</span>
						</caption>
						-->
						<?php } ?>

						<tr id="trAccionesMantenimientotipo_termino_pagoBasicos">
							<td id="tdbtnNuevotipo_termino_pago" style="visibility:visible">
								<div id="divNuevotipo_termino_pago" style="display:table-row">
									<input type="button" id="btnNuevotipo_termino_pago" name="btnNuevotipo_termino_pago" value="NUEVO" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnActualizartipo_termino_pago" style="visibility:visible">
								<div id="divActualizartipo_termino_pago" style="display:table-row">
									<input type="button" id="btnActualizartipo_termino_pago" name="btnActualizartipo_termino_pago" title="ACTUALIZAR Tipo Termino Pago ACTUAL" value="Actualizar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnEliminartipo_termino_pago" style="visibility:visible">
								<div id="divEliminartipo_termino_pago" style="display:table-row">
									<input type="button" id="btnEliminartipo_termino_pago" name="btnEliminartipo_termino_pago" title="ELIMINAR Tipo Termino Pago ACTUAL" value="Eliminar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnImprimirtipo_termino_pago" style="visibility:visible">
								<input type="button" id="btnImprimirtipo_termino_pago" name="btnImprimirtipo_termino_pago" title="IMPRIMIR PAGINA Tipo Termino Pago ACTUAL" value="Imp. Datos" class="btn btn-primary"/>
							</td>
							<td id="tdbtnCancelartipo_termino_pago" style="visibility:visible">
								<input type="button" id="btnCancelartipo_termino_pago" name="btnCancelartipo_termino_pago" title="CANCELAR Tipo Termino Pago ACTUAL" value="Cancelar" class="btn btn-primary"/>
							</td>
						</tr>
						<tr id="trAccionesMantenimientotipo_termino_pagoGuardar" style="display:none">
							<td id="tdbtnGuardarCambiostipo_termino_pago" colspan="4" align="center" style="visibility:visible">
								<div id="divGuardarCambiostipo_termino_pago" style="display:table-row">
									<input type="button" id="btnGuardarCambiosFormulariotipo_termino_pago" name="btnGuardarCambiosFormulariotipo_termino_pago" title="GUARDAR" value="GUADAR CAMBIOS" class="btn btn-primary"/>
								</div>
							</td>
						</tr>
					</table> <!-- tblAccionesMantenimientotipo_termino_pago -->
			</td>
		</tr> <!-- trtipo_termino_pagoAcciones -->
		<?php if(tipo_termino_pago_web::$STR_ES_RELACIONADO=='false' ) {?>
		<tr id="trtipo_termino_pagoParametrosAcciones" class="impresion"  style="display:table-row">
			<td align="center">
				<!-- SECCION/POST -->
				<table id="tbltipo_termino_pagoParametrosAcciones" style="text-align: center;border: 0px solid black;padding: 0px; border-spacing: 0px">
					<caption class="busquedacabecera" style="padding: 0px;caption-side: top;">
						<span>Acciones Extra/Post</span>
					</caption>
					<tr id="trtipo_termino_pagoFilaParametrosAcciones">
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
				</table> <!-- tbltipo_termino_pagoParametrosAcciones -->
			</td>
		</tr> <!-- trtipo_termino_pagoParametrosAcciones -->
		<?php }?>
		<tr id="trtipo_termino_pagoMensajes" class="mensajes">
			<td align="center">
				<a id="Mensajes"></a>
			</td>
		</tr> <!-- trtipo_termino_pagoMensajes -->
			</table> <!-- tbltipo_termino_pagoAcciones -->
			<?php } ?>
			</form> <!-- frmMantenimientotipo_termino_pago -->
			</div> <!-- divMantenimientotipo_termino_pagoAjaxWebPart -->
		</td>
	</tr> <!-- trtipo_termino_pagoElementosFormulario/super -->
		<?php if(tipo_termino_pago_web::$STR_ES_RELACIONADO=='false' ) {?>

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
			
				import {tipo_termino_pago_webcontrol,tipo_termino_pago_webcontrol1} from './webroot/js/JavaScript/contabilidad/general/tipo_termino_pago/js/webcontrol/tipo_termino_pago_form_webcontrol.js?random=1';
				
				tipo_termino_pago_webcontrol1.settipo_termino_pago_constante(window.tipo_termino_pago_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(tipo_termino_pago_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

