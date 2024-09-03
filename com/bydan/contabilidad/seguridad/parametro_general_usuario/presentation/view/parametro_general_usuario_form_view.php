<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\seguridad\parametro_general_usuario\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Parametro General Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/seguridad/parametro_general_usuario/util/parametro_general_usuario_carga.php');
	use com\bydan\contabilidad\seguridad\parametro_general_usuario\util\parametro_general_usuario_carga;
	
	//include_once('com/bydan/contabilidad/seguridad/parametro_general_usuario/presentation/view/parametro_general_usuario_web.php');
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\presentation\view\parametro_general_usuario_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	parametro_general_usuario_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	parametro_general_usuario_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$parametro_general_usuario_web1= new parametro_general_usuario_web();	
	$parametro_general_usuario_web1->cargarDatosGenerales();
	
	//$moduloActual=$parametro_general_usuario_web1->moduloActual;
	//$usuarioActual=$parametro_general_usuario_web1->usuarioActual;
	//$sessionBase=$parametro_general_usuario_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$parametro_general_usuario_web1->parametroGeneralUsuarioActual;
	
	
		
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
		
		
			<script type="module" src="webroot/js/JavaScript/contabilidad/seguridad/parametro_general_usuario/js/util/parametro_general_usuario_form_funcion.js?random=1"></script>
						
		
		
		<?php 
			
		
			parametro_general_usuario_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					parametro_general_usuario_web::$GET_POST=$_GET;
				} else {
					parametro_general_usuario_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			parametro_general_usuario_web::$STR_NOMBRE_PAGINA = 'parametro_general_usuario_form_view.php';
			parametro_general_usuario_web::$BIT_ES_PAGINA_PRINCIPAL = 'false';
			parametro_general_usuario_web::$BIT_ES_PAGINA_FORM = 'true';
				
			parametro_general_usuario_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {parametro_general_usuario_constante,parametro_general_usuario_constante1} from './webroot/js/JavaScript/contabilidad/seguridad/parametro_general_usuario/js/util/parametro_general_usuario_constante.js?random=1';
			import {parametro_general_usuario_funcion,parametro_general_usuario_funcion1} from './webroot/js/JavaScript/contabilidad/seguridad/parametro_general_usuario/js/util/parametro_general_usuario_funcion.js?random=1';
			
			let parametro_general_usuario_constante2 = new parametro_general_usuario_constante();
			
			parametro_general_usuario_constante2.STR_NOMBRE_PAGINA="<?php echo(parametro_general_usuario_web::$STR_NOMBRE_PAGINA); ?>";
			parametro_general_usuario_constante2.STR_TYPE_ON_LOADparametro_general_usuario="<?php echo(parametro_general_usuario_web::$STR_TYPE_ONLOAD); ?>";
			parametro_general_usuario_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(parametro_general_usuario_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			parametro_general_usuario_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(parametro_general_usuario_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			parametro_general_usuario_constante2.STR_ACTION="<?php echo(parametro_general_usuario_web::$STR_ACTION); ?>";
			parametro_general_usuario_constante2.STR_ES_POPUP="<?php echo(parametro_general_usuario_web::$STR_ES_POPUP); ?>";
			parametro_general_usuario_constante2.STR_ES_BUSQUEDA="<?php echo(parametro_general_usuario_web::$STR_ES_BUSQUEDA); ?>";
			parametro_general_usuario_constante2.STR_FUNCION_JS="<?php echo(parametro_general_usuario_web::$STR_FUNCION_JS); ?>";
			parametro_general_usuario_constante2.BIG_ID_ACTUAL="<?php echo(parametro_general_usuario_web::$BIG_ID_ACTUAL); ?>";
			parametro_general_usuario_constante2.BIG_ID_OPCION="<?php echo(parametro_general_usuario_web::$BIG_ID_OPCION); ?>";
			parametro_general_usuario_constante2.STR_OBJETO_JS="<?php echo(parametro_general_usuario_web::$STR_OBJETO_JS); ?>";
			parametro_general_usuario_constante2.STR_ES_RELACIONES="<?php echo(parametro_general_usuario_web::$STR_ES_RELACIONES); ?>";
			parametro_general_usuario_constante2.STR_ES_RELACIONADO="<?php echo(parametro_general_usuario_web::$STR_ES_RELACIONADO); ?>";
			parametro_general_usuario_constante2.STR_ES_SUB_PAGINA="<?php echo(parametro_general_usuario_web::$STR_ES_SUB_PAGINA); ?>";
			parametro_general_usuario_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(parametro_general_usuario_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			parametro_general_usuario_constante2.BIT_ES_PAGINA_FORM=<?php echo(parametro_general_usuario_web::$BIT_ES_PAGINA_FORM); ?>;
			parametro_general_usuario_constante2.STR_SUFIJO="<?php echo(parametro_general_usuario_web::$STR_SUF); ?>";//parametro_general_usuario
			parametro_general_usuario_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(parametro_general_usuario_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//parametro_general_usuario
			
			parametro_general_usuario_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(parametro_general_usuario_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			parametro_general_usuario_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($parametro_general_usuario_web1->moduloActual->getnombre()); ?>";
			parametro_general_usuario_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(parametro_general_usuario_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			parametro_general_usuario_constante2.BIT_ES_LOAD_NORMAL=true;
			/*parametro_general_usuario_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			parametro_general_usuario_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.parametro_general_usuario_constante2 = parametro_general_usuario_constante2;
			
		</script>
		
		<?php if(parametro_general_usuario_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.parametro_general_usuario_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.parametro_general_usuario_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="parametro_general_usuarioActual" ></a>
	
	<div id="divResumenparametro_general_usuarioActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(parametro_general_usuario_web::$STR_ES_RELACIONADO=='false') {?>
		
		<div id="header" >
		
			<div id="banner">
				<span id="spanTituloBanner" class="titulobanner"></span>
			</div> <!-- banner -->
					
			<div id="subheader" class="links">  
			
						
			</div> <!-- sub-header -->
			
			
		</div> <!-- header -->
		
		<?php } ?>
		
		<div id="main">
		

			<?php if(parametro_general_usuario_web::$STR_ES_RELACIONADO=='false') {?>
			
			
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(parametro_general_usuario_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(parametro_general_usuario_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divparametro_general_usuarioPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblparametro_general_usuarioPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmparametro_general_usuarioAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnparametro_general_usuarioAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="parametro_general_usuario_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnparametro_general_usuarioAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmparametro_general_usuarioAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblparametro_general_usuarioPopupAjaxWebPart -->
		</div> <!-- divparametro_general_usuarioPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->		
		
		
		
			
<tr id="trparametro_general_usuarioElementosFormulario">
	<td>
		<div id="divMantenimientoparametro_general_usuarioAjaxWebPart" title="PARAMETRO GENERAL" style="height: 90%;width: 90%;position: relative;top: 30px;left: 30px;">
			<form id="frmMantenimientoparametro_general_usuario" name="frmMantenimientoparametro_general_usuario">

			</br>

			<?php if(parametro_general_usuario_web::$STR_ES_RELACIONES=='false' ) {?>
			</br>
			<?php } ?>

			<!-- SECCION/TOOLBAR -->
			<table id="tblparametro_general_usuarioToolBarFormularioExterior" style="width: 65%">
				<tr style="display:table-row">
					<td align="center">

						<table id="tblparametro_general_usuarioToolBarFormulario" style="text-align: center"  style="display:table-row">
							<tr>
								<td id="tdparametro_general_usuarioActualizarToolBar" style="visibility:visible">
									<img id="imgActualizarToolBarparametro_general_usuario" name="imgActualizarToolBarparametro_general_usuario" title="ACTUALIZAR Parametro General ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/actualizar.gif" width="25" height="25"/>
								</td>
								<td id="tdparametro_general_usuarioEliminarToolBar" style="visibility:visible">
									<img id="imgEliminarToolBarparametro_general_usuario" name="imgEliminarToolBarparametro_general_usuario" title="ELIMINAR Parametro General ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/eliminar.gif" width="25" height="25"/>
								</td>
								<td id="tdparametro_general_usuarioCancelarToolBar" style="visibility:visible">
									<img id="imgCancelarToolBarparametro_general_usuario" name="imgCancelarToolBarparametro_general_usuario" title="CANCELAR Parametro General ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/cancelar.gif" width="25" height="25"/>
								</td>
								<td id="tdparametro_general_usuarioRelacionesToolBar" style="display:table-row">
									<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/xexpand.png" width="25" height="25" onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('tblCamposOcultosparametro_general_usuario',this,'../')"/>
								</td>
							</tr>
						</table> <!-- tblparametro_general_usuarioToolBarFormulario -->

					</td>
				</tr>
			</table> <!-- tblparametro_general_usuarioToolBarFormularioExterior -->

			<table id="tblparametro_general_usuarioElementos">
			<tr id="trparametro_general_usuarioElementos" class="elementos" style="display:table-row">
			<td align="center">

			<a id="Campos"></a>

				<?php if(parametro_general_usuario_web::$STR_ES_RELACIONES=='false' ) {?>
				<div id="divFlechaArribaElementos" align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
					<span></span>
				</div>
				<?php } ?>

				<!-- SECCION/FORMULARIO -->
				<table id="tblElementosparametro_general_usuario" class="elementos" style="width: 700px; padding: 0px; border-spacing: 0px; border-collapse: collapse; text-align: left;">
					<tr id="tr_fila_1">
						<td colspan="2" style="">
							<table style="width:100%">
								<tr style="">
								<td id="td_title-id" class="titulocampo">
									<label class="form-label">Cod. Único</label>
								</td>
								<td id="td_control-id" align="left">
									<select id="form-id" name="form-id" class="form-control"></select>
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
						<td id="td_title-id_tipo_fondo" class="titulocampo">
							<label class="form-label"> Tipo Fondo.(*)</label>
						</td>
						<td id="td_control-id_tipo_fondo" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_tipo_fondo" name="form-id_tipo_fondo" title=" Tipo Fondo" ></select></td>
									<td><a><img id="form-id_tipo_fondo_img" name="form-id_tipo_fondo_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_tipo_fondo_img_busqueda" name="form-id_tipo_fondo_img_busqueda" title="Buscar Tipo Fondo" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_tipo_fondo" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_5">
						<td id="td_title-id_empresa" class="titulocampo">
							<label class="form-label"> Empresa.(*)</label>
						</td>
						<td id="td_control-id_empresa" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_empresa" name="form-id_empresa" title=" Empresa" ></select></td>
									<td><a><img id="form-id_empresa_img" name="form-id_empresa_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_empresa_img_busqueda" name="form-id_empresa_img_busqueda" title="Buscar Empresa" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_empresa" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_6">
						<td id="td_title-id_sucursal" class="titulocampo">
							<label class="form-label"> Sucursal.(*)</label>
						</td>
						<td id="td_control-id_sucursal" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_sucursal" name="form-id_sucursal" title=" Sucursal" ></select></td>
									<td><a><img id="form-id_sucursal_img" name="form-id_sucursal_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_sucursal_img_busqueda" name="form-id_sucursal_img_busqueda" title="Buscar Sucursal" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_sucursal" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_7">
						<td id="td_title-id_ejercicio" class="titulocampo">
							<label class="form-label"> Ejercicio.(*)</label>
						</td>
						<td id="td_control-id_ejercicio" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_ejercicio" name="form-id_ejercicio" title=" Ejercicio" ></select></td>
									<td><a><img id="form-id_ejercicio_img" name="form-id_ejercicio_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_ejercicio_img_busqueda" name="form-id_ejercicio_img_busqueda" title="Buscar ejercicio" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_ejercicio" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_8">
						<td id="td_title-id_periodo" class="titulocampo">
							<label class="form-label"> Periodo.(*)</label>
						</td>
						<td id="td_control-id_periodo" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_periodo" name="form-id_periodo" title=" Periodo" ></select></td>
									<td><a><img id="form-id_periodo_img" name="form-id_periodo_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_periodo_img_busqueda" name="form-id_periodo_img_busqueda" title="Buscar periodo" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_periodo" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_9">
						<td id="td_title-path_exportar" class="titulocampo">
							<label class="form-label">Path Exportar.(*)</label>
						</td>
						<td id="td_control-path_exportar" align="left" class="controlcampo">
							<textarea id="form-path_exportar" name="form-path_exportar" class="form-control"  placeholder="Path Exportar"  title="Path Exportar"   style="font-size: 13px;" rows="2" cols="25" size="20" ></textarea>
							<span id="spanstrMensajepath_exportar" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_10">
						<td id="td_title-con_exportar_cabecera" class="titulocampo">
							<label class="form-label">Exportar Cabecera</label>
						</td>
						<td id="td_control-con_exportar_cabecera" align="left" class="controlcampo">
							<input id="form-con_exportar_cabecera" name="form-con_exportar_cabecera" type="checkbox" >
							<span id="spanstrMensajecon_exportar_cabecera" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_11">
						<td id="td_title-con_exportar_campo_version" class="titulocampo">
							<label class="form-label">Exportar Campo Version</label>
						</td>
						<td id="td_control-con_exportar_campo_version" align="left" class="controlcampo">
							<input id="form-con_exportar_campo_version" name="form-con_exportar_campo_version" type="checkbox" >
							<span id="spanstrMensajecon_exportar_campo_version" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_12">
						<td id="td_title-con_botones_tool_bar" class="titulocampo">
							<label class="form-label">Botones Tool Bar</label>
						</td>
						<td id="td_control-con_botones_tool_bar" align="left" class="controlcampo">
							<input id="form-con_botones_tool_bar" name="form-con_botones_tool_bar" type="checkbox" >
							<span id="spanstrMensajecon_botones_tool_bar" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_13">
						<td id="td_title-con_cargar_por_parte" class="titulocampo">
							<label class="form-label">Con Cargar Por Parte</label>
						</td>
						<td id="td_control-con_cargar_por_parte" align="left" class="controlcampo">
							<input id="form-con_cargar_por_parte" name="form-con_cargar_por_parte" type="checkbox" >
							<span id="spanstrMensajecon_cargar_por_parte" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_14">
						<td id="td_title-con_guardar_relaciones" class="titulocampo">
							<label class="form-label">Guardar Relaciones</label>
						</td>
						<td id="td_control-con_guardar_relaciones" align="left" class="controlcampo">
							<input id="form-con_guardar_relaciones" name="form-con_guardar_relaciones" type="checkbox" >
							<span id="spanstrMensajecon_guardar_relaciones" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_15">
						<td id="td_title-con_mostrar_acciones_campo_general" class="titulocampo">
							<label class="form-label">Mostrar Acciones Campo General</label>
						</td>
						<td id="td_control-con_mostrar_acciones_campo_general" align="left" class="controlcampo">
							<input id="form-con_mostrar_acciones_campo_general" name="form-con_mostrar_acciones_campo_general" type="checkbox" >
							<span id="spanstrMensajecon_mostrar_acciones_campo_general" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_16">
						<td id="td_title-con_mensaje_confirmacion" class="titulocampo">
							<label class="form-label">Mensaje Confirmacion</label>
						</td>
						<td id="td_control-con_mensaje_confirmacion" align="left" class="controlcampo">
							<input id="form-con_mensaje_confirmacion" name="form-con_mensaje_confirmacion" type="checkbox" >
							<span id="spanstrMensajecon_mensaje_confirmacion" class="mensajeerror"></span>
						</td>
					</tr>
				</table> <!-- tblElementosparametro_general_usuario -->

				<!-- SECCION/OCULTOS -->
				<table id="tblCamposOcultosparametro_general_usuario" class="elementos" style="display: table-row;">
					<caption class="busquedacabecera">
						<span>Campos Ocultos</span>
					</caption>
				</table> <!-- tblCamposOcultosparametro_general_usuario -->

			</td></tr> <!-- trparametro_general_usuarioElementos -->
			</table> <!-- tblparametro_general_usuarioElementos -->
			</form> <!-- frmMantenimientoparametro_general_usuario -->


			

				<form id="frmAccionesMantenimientoparametro_general_usuario" name="frmAccionesMantenimientoparametro_general_usuario">

			<?php if(parametro_general_usuario_web::$STR_ES_BUSQUEDA=='false' ) {?>
			<table id="tblparametro_general_usuarioAcciones" class="elementos" style="text-align: center">
		<tr id="trparametro_general_usuarioAcciones" class="elementos" style="display:table-row">
			<td align="center">
				<a id="Acciones" ></a>

				<?php if(parametro_general_usuario_web::$STR_ES_RELACIONES=='false' ) {?>
				<div align="right">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
				<?php } ?>

					<!-- SECCION/BOTONES -->
					<table id="tblAccionesMantenimientoparametro_general_usuario" class="busqueda" style="width: 50%;text-align: left">

						<?php if(parametro_general_usuario_web::$STR_ES_RELACIONES=='false' ) {?>
						<!--
						<caption class="busquedacabecera">
							<span>Acciones</span>
						</caption>
						-->
						<?php } ?>

						<tr id="trAccionesMantenimientoparametro_general_usuarioBasicos">
							<td id="tdbtnNuevoparametro_general_usuario" style="visibility:visible">
								<div id="divNuevoparametro_general_usuario" style="display:table-row">
									<input type="button" id="btnNuevoparametro_general_usuario" name="btnNuevoparametro_general_usuario" value="NUEVO" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnActualizarparametro_general_usuario" style="visibility:visible">
								<div id="divActualizarparametro_general_usuario" style="display:table-row">
									<input type="button" id="btnActualizarparametro_general_usuario" name="btnActualizarparametro_general_usuario" title="ACTUALIZAR Parametro General ACTUAL" value="Actualizar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnEliminarparametro_general_usuario" style="visibility:visible">
								<div id="divEliminarparametro_general_usuario" style="display:table-row">
									<input type="button" id="btnEliminarparametro_general_usuario" name="btnEliminarparametro_general_usuario" title="ELIMINAR Parametro General ACTUAL" value="Eliminar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnImprimirparametro_general_usuario" style="visibility:visible">
								<input type="button" id="btnImprimirparametro_general_usuario" name="btnImprimirparametro_general_usuario" title="IMPRIMIR PAGINA Parametro General ACTUAL" value="Imp. Datos" class="btn btn-primary"/>
							</td>
							<td id="tdbtnCancelarparametro_general_usuario" style="visibility:visible">
								<input type="button" id="btnCancelarparametro_general_usuario" name="btnCancelarparametro_general_usuario" title="CANCELAR Parametro General ACTUAL" value="Cancelar" class="btn btn-primary"/>
							</td>
						</tr>
						<tr id="trAccionesMantenimientoparametro_general_usuarioGuardar" style="display:none">
							<td id="tdbtnGuardarCambiosparametro_general_usuario" colspan="4" align="center" style="visibility:visible">
								<div id="divGuardarCambiosparametro_general_usuario" style="display:table-row">
									<input type="button" id="btnGuardarCambiosFormularioparametro_general_usuario" name="btnGuardarCambiosFormularioparametro_general_usuario" title="GUARDAR" value="GUADAR CAMBIOS" class="btn btn-primary"/>
								</div>
							</td>
						</tr>
					</table> <!-- tblAccionesMantenimientoparametro_general_usuario -->
			</td>
		</tr> <!-- trparametro_general_usuarioAcciones -->
		<?php if(parametro_general_usuario_web::$STR_ES_RELACIONADO=='false' ) {?>
		<tr id="trparametro_general_usuarioParametrosAcciones" class="impresion"  style="display:table-row">
			<td align="center">
				<!-- SECCION/POST -->
				<table id="tblparametro_general_usuarioParametrosAcciones" style="text-align: center;border: 0px solid black;padding: 0px; border-spacing: 0px">
					<caption class="busquedacabecera" style="padding: 0px;caption-side: top;">
						<span>Acciones Extra/Post</span>
					</caption>
					<tr id="trparametro_general_usuarioFilaParametrosAcciones">
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
				</table> <!-- tblparametro_general_usuarioParametrosAcciones -->
			</td>
		</tr> <!-- trparametro_general_usuarioParametrosAcciones -->
		<?php }?>
		<tr id="trparametro_general_usuarioMensajes" class="mensajes">
			<td align="center">
				<a id="Mensajes"></a>
			</td>
		</tr> <!-- trparametro_general_usuarioMensajes -->
			</table> <!-- tblparametro_general_usuarioAcciones -->
			<?php } ?>
			</form> <!-- frmMantenimientoparametro_general_usuario -->
			</div> <!-- divMantenimientoparametro_general_usuarioAjaxWebPart -->
		</td>
	</tr> <!-- trparametro_general_usuarioElementosFormulario/super -->
		<?php if(parametro_general_usuario_web::$STR_ES_RELACIONADO=='false' ) {?>

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
			
				import {parametro_general_usuario_webcontrol,parametro_general_usuario_webcontrol1} from './webroot/js/JavaScript/contabilidad/seguridad/parametro_general_usuario/js/webcontrol/parametro_general_usuario_form_webcontrol.js?random=1';
				
				parametro_general_usuario_webcontrol1.setparametro_general_usuario_constante(window.parametro_general_usuario_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(parametro_general_usuario_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

