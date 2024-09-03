<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\cuentascorrientes\clasificacion_cheque\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Clasificacion Cheque Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/cuentascorrientes/clasificacion_cheque/util/clasificacion_cheque_carga.php');
	use com\bydan\contabilidad\cuentascorrientes\clasificacion_cheque\util\clasificacion_cheque_carga;
	
	//include_once('com/bydan/contabilidad/cuentascorrientes/clasificacion_cheque/presentation/view/clasificacion_cheque_web.php');
	//use com\bydan\contabilidad\cuentascorrientes\clasificacion_cheque\presentation\view\clasificacion_cheque_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	clasificacion_cheque_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	clasificacion_cheque_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$clasificacion_cheque_web1= new clasificacion_cheque_web();	
	$clasificacion_cheque_web1->cargarDatosGenerales();
	
	//$moduloActual=$clasificacion_cheque_web1->moduloActual;
	//$usuarioActual=$clasificacion_cheque_web1->usuarioActual;
	//$sessionBase=$clasificacion_cheque_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$clasificacion_cheque_web1->parametroGeneralUsuarioActual;
	
	
		
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
		
		
			<script type="module" src="webroot/js/JavaScript/contabilidad/cuentascorrientes/clasificacion_cheque/js/util/clasificacion_cheque_form_funcion.js?random=1"></script>
						
		
		
		<?php 
			
		
			clasificacion_cheque_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					clasificacion_cheque_web::$GET_POST=$_GET;
				} else {
					clasificacion_cheque_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			clasificacion_cheque_web::$STR_NOMBRE_PAGINA = 'clasificacion_cheque_form_view.php';
			clasificacion_cheque_web::$BIT_ES_PAGINA_PRINCIPAL = 'false';
			clasificacion_cheque_web::$BIT_ES_PAGINA_FORM = 'true';
				
			clasificacion_cheque_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {clasificacion_cheque_constante,clasificacion_cheque_constante1} from './webroot/js/JavaScript/contabilidad/cuentascorrientes/clasificacion_cheque/js/util/clasificacion_cheque_constante.js?random=1';
			import {clasificacion_cheque_funcion,clasificacion_cheque_funcion1} from './webroot/js/JavaScript/contabilidad/cuentascorrientes/clasificacion_cheque/js/util/clasificacion_cheque_funcion.js?random=1';
			
			let clasificacion_cheque_constante2 = new clasificacion_cheque_constante();
			
			clasificacion_cheque_constante2.STR_NOMBRE_PAGINA="<?php echo(clasificacion_cheque_web::$STR_NOMBRE_PAGINA); ?>";
			clasificacion_cheque_constante2.STR_TYPE_ON_LOADclasificacion_cheque="<?php echo(clasificacion_cheque_web::$STR_TYPE_ONLOAD); ?>";
			clasificacion_cheque_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(clasificacion_cheque_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			clasificacion_cheque_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(clasificacion_cheque_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			clasificacion_cheque_constante2.STR_ACTION="<?php echo(clasificacion_cheque_web::$STR_ACTION); ?>";
			clasificacion_cheque_constante2.STR_ES_POPUP="<?php echo(clasificacion_cheque_web::$STR_ES_POPUP); ?>";
			clasificacion_cheque_constante2.STR_ES_BUSQUEDA="<?php echo(clasificacion_cheque_web::$STR_ES_BUSQUEDA); ?>";
			clasificacion_cheque_constante2.STR_FUNCION_JS="<?php echo(clasificacion_cheque_web::$STR_FUNCION_JS); ?>";
			clasificacion_cheque_constante2.BIG_ID_ACTUAL="<?php echo(clasificacion_cheque_web::$BIG_ID_ACTUAL); ?>";
			clasificacion_cheque_constante2.BIG_ID_OPCION="<?php echo(clasificacion_cheque_web::$BIG_ID_OPCION); ?>";
			clasificacion_cheque_constante2.STR_OBJETO_JS="<?php echo(clasificacion_cheque_web::$STR_OBJETO_JS); ?>";
			clasificacion_cheque_constante2.STR_ES_RELACIONES="<?php echo(clasificacion_cheque_web::$STR_ES_RELACIONES); ?>";
			clasificacion_cheque_constante2.STR_ES_RELACIONADO="<?php echo(clasificacion_cheque_web::$STR_ES_RELACIONADO); ?>";
			clasificacion_cheque_constante2.STR_ES_SUB_PAGINA="<?php echo(clasificacion_cheque_web::$STR_ES_SUB_PAGINA); ?>";
			clasificacion_cheque_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(clasificacion_cheque_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			clasificacion_cheque_constante2.BIT_ES_PAGINA_FORM=<?php echo(clasificacion_cheque_web::$BIT_ES_PAGINA_FORM); ?>;
			clasificacion_cheque_constante2.STR_SUFIJO="<?php echo(clasificacion_cheque_web::$STR_SUF); ?>";//clasificacion_cheque
			clasificacion_cheque_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(clasificacion_cheque_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//clasificacion_cheque
			
			clasificacion_cheque_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(clasificacion_cheque_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			clasificacion_cheque_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($clasificacion_cheque_web1->moduloActual->getnombre()); ?>";
			clasificacion_cheque_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(clasificacion_cheque_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			clasificacion_cheque_constante2.BIT_ES_LOAD_NORMAL=true;
			/*clasificacion_cheque_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			clasificacion_cheque_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.clasificacion_cheque_constante2 = clasificacion_cheque_constante2;
			
		</script>
		
		<?php if(clasificacion_cheque_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.clasificacion_cheque_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.clasificacion_cheque_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="clasificacion_chequeActual" ></a>
	
	<div id="divResumenclasificacion_chequeActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(clasificacion_cheque_web::$STR_ES_RELACIONADO=='false') {?>
		
		<div id="header" >
		
			<div id="banner">
				<span id="spanTituloBanner" class="titulobanner"></span>
			</div> <!-- banner -->
					
			<div id="subheader" class="links">  
			
						
			</div> <!-- sub-header -->
			
			
		</div> <!-- header -->
		
		<?php } ?>
		
		<div id="main">
		

			<?php if(clasificacion_cheque_web::$STR_ES_RELACIONADO=='false') {?>
			
			
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(clasificacion_cheque_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(clasificacion_cheque_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divclasificacion_chequePopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblclasificacion_chequePopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmclasificacion_chequeAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnclasificacion_chequeAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="clasificacion_cheque_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnclasificacion_chequeAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmclasificacion_chequeAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblclasificacion_chequePopupAjaxWebPart -->
		</div> <!-- divclasificacion_chequePopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->		
		
		
		
			
<tr id="trclasificacion_chequeElementosFormulario">
	<td>
		<div id="divMantenimientoclasificacion_chequeAjaxWebPart" title="CLASIFICACION CHEQUE" style="height: 90%;width: 90%;position: relative;top: 30px;left: 30px;">
			<form id="frmMantenimientoclasificacion_cheque" name="frmMantenimientoclasificacion_cheque">

			</br>

			<?php if(clasificacion_cheque_web::$STR_ES_RELACIONES=='false' ) {?>
			</br>
			<?php } ?>

			<!-- SECCION/TOOLBAR -->
			<table id="tblclasificacion_chequeToolBarFormularioExterior" style="width: 65%">
				<tr style="display:table-row">
					<td align="center">

						<table id="tblclasificacion_chequeToolBarFormulario" style="text-align: center"  style="display:table-row">
							<tr>
								<td id="tdclasificacion_chequeActualizarToolBar" style="visibility:visible">
									<img id="imgActualizarToolBarclasificacion_cheque" name="imgActualizarToolBarclasificacion_cheque" title="ACTUALIZAR Clasificacion Cheque ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/actualizar.gif" width="25" height="25"/>
								</td>
								<td id="tdclasificacion_chequeEliminarToolBar" style="visibility:visible">
									<img id="imgEliminarToolBarclasificacion_cheque" name="imgEliminarToolBarclasificacion_cheque" title="ELIMINAR Clasificacion Cheque ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/eliminar.gif" width="25" height="25"/>
								</td>
								<td id="tdclasificacion_chequeCancelarToolBar" style="visibility:visible">
									<img id="imgCancelarToolBarclasificacion_cheque" name="imgCancelarToolBarclasificacion_cheque" title="CANCELAR Clasificacion Cheque ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/cancelar.gif" width="25" height="25"/>
								</td>
								<td id="tdclasificacion_chequeRelacionesToolBar" style="display:table-row">
									<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/xexpand.png" width="25" height="25" onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('tblCamposOcultosclasificacion_cheque',this,'../')"/>
								</td>
							</tr>
						</table> <!-- tblclasificacion_chequeToolBarFormulario -->

					</td>
				</tr>
			</table> <!-- tblclasificacion_chequeToolBarFormularioExterior -->

			<table id="tblclasificacion_chequeElementos">
			<tr id="trclasificacion_chequeElementos" class="elementos" style="display:table-row">
			<td align="center">

			<a id="Campos"></a>

				<?php if(clasificacion_cheque_web::$STR_ES_RELACIONES=='false' ) {?>
				<div id="divFlechaArribaElementos" align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
					<span></span>
				</div>
				<?php } ?>

				<!-- SECCION/FORMULARIO -->
				<table id="tblElementosclasificacion_cheque" class="elementos" style="width: 700px; padding: 0px; border-spacing: 0px; border-collapse: collapse; text-align: center;">
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
						<td id="td_title-id_cuenta_corriente_detalle" class="titulocampo">
							<label class="form-label">Cuenta Cliente Detalle.(*)</label>
						</td>
						<td id="td_control-id_cuenta_corriente_detalle" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_cuenta_corriente_detalle" name="form-id_cuenta_corriente_detalle" title="Cuenta Cliente Detalle" ></select></td>
									<td><a><img id="form-id_cuenta_corriente_detalle_img" name="form-id_cuenta_corriente_detalle_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_cuenta_corriente_detalle_img_busqueda" name="form-id_cuenta_corriente_detalle_img_busqueda" title="Buscar Cuenta Corriente Detalle" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_cuenta_corriente_detalle" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_5">
						<td id="td_title-id_categoria_cheque" class="titulocampo">
							<label class="form-label">Categoria Cheque.(*)</label>
						</td>
						<td id="td_control-id_categoria_cheque" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_categoria_cheque" name="form-id_categoria_cheque" title="Categoria Cheque" ></select></td>
									<td><a><img id="form-id_categoria_cheque_img" name="form-id_categoria_cheque_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_categoria_cheque_img_busqueda" name="form-id_categoria_cheque_img_busqueda" title="Buscar Categoria Cheque" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_categoria_cheque" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_6">
						<td id="td_title-monto" class="titulocampo">
							<label class="form-label">Monto.(*)</label>
						</td>
						<td id="td_control-monto" align="left" class="controlcampo">
							<input id="form-monto" name="form-monto" type="text" class="form-control"  placeholder="Monto"  title="Monto"    maxlength="18" size="12" >
							<span id="spanstrMensajemonto" class="mensajeerror"></span>
						</td>
					</tr>
				</table> <!-- tblElementosclasificacion_cheque -->

				<!-- SECCION/OCULTOS -->
				<table id="tblCamposOcultosclasificacion_cheque" class="elementos" style="display: table-row;">
					<caption class="busquedacabecera">
						<span>Campos Ocultos</span>
					</caption>
				</table> <!-- tblCamposOcultosclasificacion_cheque -->

			</td></tr> <!-- trclasificacion_chequeElementos -->
			</table> <!-- tblclasificacion_chequeElementos -->
			</form> <!-- frmMantenimientoclasificacion_cheque -->


			

				<form id="frmAccionesMantenimientoclasificacion_cheque" name="frmAccionesMantenimientoclasificacion_cheque">

			<?php if(clasificacion_cheque_web::$STR_ES_BUSQUEDA=='false' ) {?>
			<table id="tblclasificacion_chequeAcciones" class="elementos" style="text-align: center">
		<tr id="trclasificacion_chequeAcciones" class="elementos" style="display:table-row">
			<td align="center">
				<a id="Acciones" ></a>

				<?php if(clasificacion_cheque_web::$STR_ES_RELACIONES=='false' ) {?>
				<div align="right">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
				<?php } ?>

					<!-- SECCION/BOTONES -->
					<table id="tblAccionesMantenimientoclasificacion_cheque" class="busqueda" style="width: 50%;text-align: center">

						<?php if(clasificacion_cheque_web::$STR_ES_RELACIONES=='false' ) {?>
						<!--
						<caption class="busquedacabecera">
							<span>Acciones</span>
						</caption>
						-->
						<?php } ?>

						<tr id="trAccionesMantenimientoclasificacion_chequeBasicos">
							<td id="tdbtnNuevoclasificacion_cheque" style="visibility:visible">
								<div id="divNuevoclasificacion_cheque" style="display:table-row">
									<input type="button" id="btnNuevoclasificacion_cheque" name="btnNuevoclasificacion_cheque" value="NUEVO" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnActualizarclasificacion_cheque" style="visibility:visible">
								<div id="divActualizarclasificacion_cheque" style="display:table-row">
									<input type="button" id="btnActualizarclasificacion_cheque" name="btnActualizarclasificacion_cheque" title="ACTUALIZAR Clasificacion Cheque ACTUAL" value="Actualizar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnEliminarclasificacion_cheque" style="visibility:visible">
								<div id="divEliminarclasificacion_cheque" style="display:table-row">
									<input type="button" id="btnEliminarclasificacion_cheque" name="btnEliminarclasificacion_cheque" title="ELIMINAR Clasificacion Cheque ACTUAL" value="Eliminar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnImprimirclasificacion_cheque" style="visibility:visible">
								<input type="button" id="btnImprimirclasificacion_cheque" name="btnImprimirclasificacion_cheque" title="IMPRIMIR PAGINA Clasificacion Cheque ACTUAL" value="Imp. Datos" class="btn btn-primary"/>
							</td>
							<td id="tdbtnCancelarclasificacion_cheque" style="visibility:visible">
								<input type="button" id="btnCancelarclasificacion_cheque" name="btnCancelarclasificacion_cheque" title="CANCELAR Clasificacion Cheque ACTUAL" value="Cancelar" class="btn btn-primary"/>
							</td>
						</tr>
						<tr id="trAccionesMantenimientoclasificacion_chequeGuardar" style="display:none">
							<td id="tdbtnGuardarCambiosclasificacion_cheque" colspan="4" align="center" style="visibility:visible">
								<div id="divGuardarCambiosclasificacion_cheque" style="display:table-row">
									<input type="button" id="btnGuardarCambiosFormularioclasificacion_cheque" name="btnGuardarCambiosFormularioclasificacion_cheque" title="GUARDAR" value="GUADAR CAMBIOS" class="btn btn-primary"/>
								</div>
							</td>
						</tr>
					</table> <!-- tblAccionesMantenimientoclasificacion_cheque -->
			</td>
		</tr> <!-- trclasificacion_chequeAcciones -->
		<?php if(clasificacion_cheque_web::$STR_ES_RELACIONADO=='false' ) {?>
		<tr id="trclasificacion_chequeParametrosAcciones" class="impresion"  style="display:table-row">
			<td align="center">
				<!-- SECCION/POST -->
				<table id="tblclasificacion_chequeParametrosAcciones" style="text-align: center;border: 0px solid black;padding: 0px; border-spacing: 0px">
					<caption class="busquedacabecera" style="padding: 0px;caption-side: top;">
						<span>Acciones Extra/Post</span>
					</caption>
					<tr id="trclasificacion_chequeFilaParametrosAcciones">
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
				</table> <!-- tblclasificacion_chequeParametrosAcciones -->
			</td>
		</tr> <!-- trclasificacion_chequeParametrosAcciones -->
		<?php }?>
		<tr id="trclasificacion_chequeMensajes" class="mensajes">
			<td align="center">
				<a id="Mensajes"></a>
			</td>
		</tr> <!-- trclasificacion_chequeMensajes -->
			</table> <!-- tblclasificacion_chequeAcciones -->
			<?php } ?>
			</form> <!-- frmMantenimientoclasificacion_cheque -->
			</div> <!-- divMantenimientoclasificacion_chequeAjaxWebPart -->
		</td>
	</tr> <!-- trclasificacion_chequeElementosFormulario/super -->
		<?php if(clasificacion_cheque_web::$STR_ES_RELACIONADO=='false' ) {?>

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
			
				import {clasificacion_cheque_webcontrol,clasificacion_cheque_webcontrol1} from './webroot/js/JavaScript/contabilidad/cuentascorrientes/clasificacion_cheque/js/webcontrol/clasificacion_cheque_form_webcontrol.js?random=1';
				
				clasificacion_cheque_webcontrol1.setclasificacion_cheque_constante(window.clasificacion_cheque_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(clasificacion_cheque_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

