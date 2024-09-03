<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\seguridad\tipo_tecla_mascara\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Tipo Tecla Mascara Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/seguridad/tipo_tecla_mascara/util/tipo_tecla_mascara_carga.php');
	use com\bydan\contabilidad\seguridad\tipo_tecla_mascara\util\tipo_tecla_mascara_carga;
	
	//include_once('com/bydan/contabilidad/seguridad/tipo_tecla_mascara/presentation/view/tipo_tecla_mascara_web.php');
	//use com\bydan\contabilidad\seguridad\tipo_tecla_mascara\presentation\view\tipo_tecla_mascara_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	tipo_tecla_mascara_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	tipo_tecla_mascara_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$tipo_tecla_mascara_web1= new tipo_tecla_mascara_web();	
	$tipo_tecla_mascara_web1->cargarDatosGenerales();
	
	//$moduloActual=$tipo_tecla_mascara_web1->moduloActual;
	//$usuarioActual=$tipo_tecla_mascara_web1->usuarioActual;
	//$sessionBase=$tipo_tecla_mascara_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$tipo_tecla_mascara_web1->parametroGeneralUsuarioActual;
	
	
		
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
		
		
			<script type="module" src="webroot/js/JavaScript/contabilidad/seguridad/tipo_tecla_mascara/js/util/tipo_tecla_mascara_form_funcion.js?random=1"></script>
						
		
		
		<?php 
			
		
			tipo_tecla_mascara_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					tipo_tecla_mascara_web::$GET_POST=$_GET;
				} else {
					tipo_tecla_mascara_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			tipo_tecla_mascara_web::$STR_NOMBRE_PAGINA = 'tipo_tecla_mascara_form_view.php';
			tipo_tecla_mascara_web::$BIT_ES_PAGINA_PRINCIPAL = 'false';
			tipo_tecla_mascara_web::$BIT_ES_PAGINA_FORM = 'true';
				
			tipo_tecla_mascara_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {tipo_tecla_mascara_constante,tipo_tecla_mascara_constante1} from './webroot/js/JavaScript/contabilidad/seguridad/tipo_tecla_mascara/js/util/tipo_tecla_mascara_constante.js?random=1';
			import {tipo_tecla_mascara_funcion,tipo_tecla_mascara_funcion1} from './webroot/js/JavaScript/contabilidad/seguridad/tipo_tecla_mascara/js/util/tipo_tecla_mascara_funcion.js?random=1';
			
			let tipo_tecla_mascara_constante2 = new tipo_tecla_mascara_constante();
			
			tipo_tecla_mascara_constante2.STR_NOMBRE_PAGINA="<?php echo(tipo_tecla_mascara_web::$STR_NOMBRE_PAGINA); ?>";
			tipo_tecla_mascara_constante2.STR_TYPE_ON_LOADtipo_tecla_mascara="<?php echo(tipo_tecla_mascara_web::$STR_TYPE_ONLOAD); ?>";
			tipo_tecla_mascara_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(tipo_tecla_mascara_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			tipo_tecla_mascara_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(tipo_tecla_mascara_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			tipo_tecla_mascara_constante2.STR_ACTION="<?php echo(tipo_tecla_mascara_web::$STR_ACTION); ?>";
			tipo_tecla_mascara_constante2.STR_ES_POPUP="<?php echo(tipo_tecla_mascara_web::$STR_ES_POPUP); ?>";
			tipo_tecla_mascara_constante2.STR_ES_BUSQUEDA="<?php echo(tipo_tecla_mascara_web::$STR_ES_BUSQUEDA); ?>";
			tipo_tecla_mascara_constante2.STR_FUNCION_JS="<?php echo(tipo_tecla_mascara_web::$STR_FUNCION_JS); ?>";
			tipo_tecla_mascara_constante2.BIG_ID_ACTUAL="<?php echo(tipo_tecla_mascara_web::$BIG_ID_ACTUAL); ?>";
			tipo_tecla_mascara_constante2.BIG_ID_OPCION="<?php echo(tipo_tecla_mascara_web::$BIG_ID_OPCION); ?>";
			tipo_tecla_mascara_constante2.STR_OBJETO_JS="<?php echo(tipo_tecla_mascara_web::$STR_OBJETO_JS); ?>";
			tipo_tecla_mascara_constante2.STR_ES_RELACIONES="<?php echo(tipo_tecla_mascara_web::$STR_ES_RELACIONES); ?>";
			tipo_tecla_mascara_constante2.STR_ES_RELACIONADO="<?php echo(tipo_tecla_mascara_web::$STR_ES_RELACIONADO); ?>";
			tipo_tecla_mascara_constante2.STR_ES_SUB_PAGINA="<?php echo(tipo_tecla_mascara_web::$STR_ES_SUB_PAGINA); ?>";
			tipo_tecla_mascara_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(tipo_tecla_mascara_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			tipo_tecla_mascara_constante2.BIT_ES_PAGINA_FORM=<?php echo(tipo_tecla_mascara_web::$BIT_ES_PAGINA_FORM); ?>;
			tipo_tecla_mascara_constante2.STR_SUFIJO="<?php echo(tipo_tecla_mascara_web::$STR_SUF); ?>";//tipo_tecla_mascara
			tipo_tecla_mascara_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(tipo_tecla_mascara_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//tipo_tecla_mascara
			
			tipo_tecla_mascara_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(tipo_tecla_mascara_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			tipo_tecla_mascara_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($tipo_tecla_mascara_web1->moduloActual->getnombre()); ?>";
			tipo_tecla_mascara_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(tipo_tecla_mascara_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			tipo_tecla_mascara_constante2.BIT_ES_LOAD_NORMAL=true;
			/*tipo_tecla_mascara_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			tipo_tecla_mascara_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.tipo_tecla_mascara_constante2 = tipo_tecla_mascara_constante2;
			
		</script>
		
		<?php if(tipo_tecla_mascara_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.tipo_tecla_mascara_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.tipo_tecla_mascara_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="tipo_tecla_mascaraActual" ></a>
	
	<div id="divResumentipo_tecla_mascaraActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(tipo_tecla_mascara_web::$STR_ES_RELACIONADO=='false') {?>
		
		<div id="header" >
		
			<div id="banner">
				<span id="spanTituloBanner" class="titulobanner"></span>
			</div> <!-- banner -->
					
			<div id="subheader" class="links">  
			
						
			</div> <!-- sub-header -->
			
			
		</div> <!-- header -->
		
		<?php } ?>
		
		<div id="main">
		

			<?php if(tipo_tecla_mascara_web::$STR_ES_RELACIONADO=='false') {?>
			
			
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(tipo_tecla_mascara_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(tipo_tecla_mascara_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divtipo_tecla_mascaraPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tbltipo_tecla_mascaraPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmtipo_tecla_mascaraAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btntipo_tecla_mascaraAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="tipo_tecla_mascara_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btntipo_tecla_mascaraAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmtipo_tecla_mascaraAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tbltipo_tecla_mascaraPopupAjaxWebPart -->
		</div> <!-- divtipo_tecla_mascaraPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->		
		
		
		
			
<tr id="trtipo_tecla_mascaraElementosFormulario">
	<td>
		<div id="divMantenimientotipo_tecla_mascaraAjaxWebPart" title="TIPO TECLA MASCARA" style="height: 90%;width: 90%;position: relative;top: 30px;left: 30px;">
			<form id="frmMantenimientotipo_tecla_mascara" name="frmMantenimientotipo_tecla_mascara">

			</br>

			<?php if(tipo_tecla_mascara_web::$STR_ES_RELACIONES=='false' ) {?>
			</br>
			<?php } ?>

			<!-- SECCION/TOOLBAR -->
			<table id="tbltipo_tecla_mascaraToolBarFormularioExterior" style="width: 65%">
				<tr style="display:table-row">
					<td align="center">

						<table id="tbltipo_tecla_mascaraToolBarFormulario" style="text-align: center"  style="display:table-row">
							<tr>
								<td id="tdtipo_tecla_mascaraActualizarToolBar" style="visibility:visible">
									<img id="imgActualizarToolBartipo_tecla_mascara" name="imgActualizarToolBartipo_tecla_mascara" title="ACTUALIZAR Tipo Tecla Mascara ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/actualizar.gif" width="25" height="25"/>
								</td>
								<td id="tdtipo_tecla_mascaraEliminarToolBar" style="visibility:visible">
									<img id="imgEliminarToolBartipo_tecla_mascara" name="imgEliminarToolBartipo_tecla_mascara" title="ELIMINAR Tipo Tecla Mascara ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/eliminar.gif" width="25" height="25"/>
								</td>
								<td id="tdtipo_tecla_mascaraCancelarToolBar" style="visibility:visible">
									<img id="imgCancelarToolBartipo_tecla_mascara" name="imgCancelarToolBartipo_tecla_mascara" title="CANCELAR Tipo Tecla Mascara ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/cancelar.gif" width="25" height="25"/>
								</td>
								<td id="tdtipo_tecla_mascaraRelacionesToolBar" style="display:table-row">
									<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/xexpand.png" width="25" height="25" onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('tblCamposOcultostipo_tecla_mascara',this,'../')"/>
								</td>
							</tr>
						</table> <!-- tbltipo_tecla_mascaraToolBarFormulario -->

					</td>
				</tr>
			</table> <!-- tbltipo_tecla_mascaraToolBarFormularioExterior -->

			<table id="tbltipo_tecla_mascaraElementos">
			<tr id="trtipo_tecla_mascaraElementos" class="elementos" style="display:table-row">
			<td align="center">

			<a id="Campos"></a>

				<?php if(tipo_tecla_mascara_web::$STR_ES_RELACIONES=='false' ) {?>
				<div id="divFlechaArribaElementos" align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
					<span></span>
				</div>
				<?php } ?>

				<!-- SECCION/FORMULARIO -->
				<table id="tblElementostipo_tecla_mascara" class="elementos" style="width: 300px; padding: 0px; border-spacing: 0px; border-collapse: collapse; text-align: center;">
					<tr id="tr_fila_1">
						<td colspan="2" style="">
							<table style="width:100%">
								<tr style="">
								<td id="td_title-id" class="titulocampo">
									<label class="form-label">Cod. Único</label>
								</td>
								<td id="td_control-id" align="left">
									<input id="form-id" name="form-id" type="text" class="form-control"  size="10">
								</td>
								</tr>
							</table>
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
							<input id="form-codigo" name="form-codigo" type="text" class="form-control"  placeholder="Codigo"  title="Codigo"    size="20"  maxlength="50"/>
							<span id="spanstrMensajecodigo" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_5">
						<td id="td_title-nombre" class="titulocampo">
							<label class="form-label">Nombre.(*)</label>
						</td>
						<td id="td_control-nombre" align="left" class="controlcampo">
							<textarea id="form-nombre" name="form-nombre" class="form-control"  placeholder="Nombre"  title="Nombre"   style="font-size: 13px;" rows="3" cols="25" size="20" ></textarea>
							<span id="spanstrMensajenombre" class="mensajeerror"></span>
						</td>
					</tr>
				</table> <!-- tblElementostipo_tecla_mascara -->

				<!-- SECCION/OCULTOS -->
				<table id="tblCamposOcultostipo_tecla_mascara" class="elementos" style="display: table-row;">
					<caption class="busquedacabecera">
						<span>Campos Ocultos</span>
					</caption>
				</table> <!-- tblCamposOcultostipo_tecla_mascara -->

			</td></tr> <!-- trtipo_tecla_mascaraElementos -->
			</table> <!-- tbltipo_tecla_mascaraElementos -->
			</form> <!-- frmMantenimientotipo_tecla_mascara -->


			

				<form id="frmAccionesMantenimientotipo_tecla_mascara" name="frmAccionesMantenimientotipo_tecla_mascara">

			<?php if(tipo_tecla_mascara_web::$STR_ES_BUSQUEDA=='false' ) {?>
			<table id="tbltipo_tecla_mascaraAcciones" class="elementos" style="text-align: center">
		<tr id="trtipo_tecla_mascaraAcciones" class="elementos" style="display:table-row">
			<td align="center">
				<a id="Acciones" ></a>

				<?php if(tipo_tecla_mascara_web::$STR_ES_RELACIONES=='false' ) {?>
				<div align="right">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
				<?php } ?>

					<!-- SECCION/BOTONES -->
					<table id="tblAccionesMantenimientotipo_tecla_mascara" class="busqueda" style="width: 50%;text-align: center">

						<?php if(tipo_tecla_mascara_web::$STR_ES_RELACIONES=='false' ) {?>
						<!--
						<caption class="busquedacabecera">
							<span>Acciones</span>
						</caption>
						-->
						<?php } ?>

						<tr id="trAccionesMantenimientotipo_tecla_mascaraBasicos">
							<td id="tdbtnNuevotipo_tecla_mascara" style="visibility:visible">
								<div id="divNuevotipo_tecla_mascara" style="display:table-row">
									<input type="button" id="btnNuevotipo_tecla_mascara" name="btnNuevotipo_tecla_mascara" value="NUEVO" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnActualizartipo_tecla_mascara" style="visibility:visible">
								<div id="divActualizartipo_tecla_mascara" style="display:table-row">
									<input type="button" id="btnActualizartipo_tecla_mascara" name="btnActualizartipo_tecla_mascara" title="ACTUALIZAR Tipo Tecla Mascara ACTUAL" value="Actualizar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnEliminartipo_tecla_mascara" style="visibility:visible">
								<div id="divEliminartipo_tecla_mascara" style="display:table-row">
									<input type="button" id="btnEliminartipo_tecla_mascara" name="btnEliminartipo_tecla_mascara" title="ELIMINAR Tipo Tecla Mascara ACTUAL" value="Eliminar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnImprimirtipo_tecla_mascara" style="visibility:visible">
								<input type="button" id="btnImprimirtipo_tecla_mascara" name="btnImprimirtipo_tecla_mascara" title="IMPRIMIR PAGINA Tipo Tecla Mascara ACTUAL" value="Imp. Datos" class="btn btn-primary"/>
							</td>
							<td id="tdbtnCancelartipo_tecla_mascara" style="visibility:visible">
								<input type="button" id="btnCancelartipo_tecla_mascara" name="btnCancelartipo_tecla_mascara" title="CANCELAR Tipo Tecla Mascara ACTUAL" value="Cancelar" class="btn btn-primary"/>
							</td>
						</tr>
						<tr id="trAccionesMantenimientotipo_tecla_mascaraGuardar" style="display:none">
							<td id="tdbtnGuardarCambiostipo_tecla_mascara" colspan="4" align="center" style="visibility:visible">
								<div id="divGuardarCambiostipo_tecla_mascara" style="display:table-row">
									<input type="button" id="btnGuardarCambiosFormulariotipo_tecla_mascara" name="btnGuardarCambiosFormulariotipo_tecla_mascara" title="GUARDAR" value="GUADAR CAMBIOS" class="btn btn-primary"/>
								</div>
							</td>
						</tr>
					</table> <!-- tblAccionesMantenimientotipo_tecla_mascara -->
			</td>
		</tr> <!-- trtipo_tecla_mascaraAcciones -->
		<?php if(tipo_tecla_mascara_web::$STR_ES_RELACIONADO=='false' ) {?>
		<tr id="trtipo_tecla_mascaraParametrosAcciones" class="impresion"  style="display:table-row">
			<td align="center">
				<!-- SECCION/POST -->
				<table id="tbltipo_tecla_mascaraParametrosAcciones" style="text-align: center;border: 0px solid black;padding: 0px; border-spacing: 0px">
					<caption class="busquedacabecera" style="padding: 0px;caption-side: top;">
						<span>Acciones Extra/Post</span>
					</caption>
					<tr id="trtipo_tecla_mascaraFilaParametrosAcciones">
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
				</table> <!-- tbltipo_tecla_mascaraParametrosAcciones -->
			</td>
		</tr> <!-- trtipo_tecla_mascaraParametrosAcciones -->
		<?php }?>
		<tr id="trtipo_tecla_mascaraMensajes" class="mensajes">
			<td align="center">
				<a id="Mensajes"></a>
			</td>
		</tr> <!-- trtipo_tecla_mascaraMensajes -->
			</table> <!-- tbltipo_tecla_mascaraAcciones -->
			<?php } ?>
			</form> <!-- frmMantenimientotipo_tecla_mascara -->
			</div> <!-- divMantenimientotipo_tecla_mascaraAjaxWebPart -->
		</td>
	</tr> <!-- trtipo_tecla_mascaraElementosFormulario/super -->
		<?php if(tipo_tecla_mascara_web::$STR_ES_RELACIONADO=='false' ) {?>

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
			
				import {tipo_tecla_mascara_webcontrol,tipo_tecla_mascara_webcontrol1} from './webroot/js/JavaScript/contabilidad/seguridad/tipo_tecla_mascara/js/webcontrol/tipo_tecla_mascara_form_webcontrol.js?random=1';
				
				tipo_tecla_mascara_webcontrol1.settipo_tecla_mascara_constante(window.tipo_tecla_mascara_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(tipo_tecla_mascara_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

