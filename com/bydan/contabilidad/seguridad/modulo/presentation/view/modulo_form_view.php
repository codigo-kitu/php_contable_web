<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\seguridad\modulo\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Modulo Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/seguridad/modulo/util/modulo_carga.php');
	use com\bydan\contabilidad\seguridad\modulo\util\modulo_carga;
	
	//include_once('com/bydan/contabilidad/seguridad/modulo/presentation/view/modulo_web.php');
	//use com\bydan\contabilidad\seguridad\modulo\presentation\view\modulo_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	modulo_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	modulo_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$modulo_web1= new modulo_web();	
	$modulo_web1->cargarDatosGenerales();
	
	//$moduloActual=$modulo_web1->moduloActual;
	//$usuarioActual=$modulo_web1->usuarioActual;
	//$sessionBase=$modulo_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$modulo_web1->parametroGeneralUsuarioActual;
	
	
		
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
		
		
			<script type="module" src="webroot/js/JavaScript/contabilidad/seguridad/modulo/js/util/modulo_form_funcion.js?random=1"></script>
						
		
		
		<?php 
			
		
			modulo_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					modulo_web::$GET_POST=$_GET;
				} else {
					modulo_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			modulo_web::$STR_NOMBRE_PAGINA = 'modulo_form_view.php';
			modulo_web::$BIT_ES_PAGINA_PRINCIPAL = 'false';
			modulo_web::$BIT_ES_PAGINA_FORM = 'true';
				
			modulo_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {modulo_constante,modulo_constante1} from './webroot/js/JavaScript/contabilidad/seguridad/modulo/js/util/modulo_constante.js?random=1';
			import {modulo_funcion,modulo_funcion1} from './webroot/js/JavaScript/contabilidad/seguridad/modulo/js/util/modulo_funcion.js?random=1';
			
			let modulo_constante2 = new modulo_constante();
			
			modulo_constante2.STR_NOMBRE_PAGINA="<?php echo(modulo_web::$STR_NOMBRE_PAGINA); ?>";
			modulo_constante2.STR_TYPE_ON_LOADmodulo="<?php echo(modulo_web::$STR_TYPE_ONLOAD); ?>";
			modulo_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(modulo_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			modulo_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(modulo_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			modulo_constante2.STR_ACTION="<?php echo(modulo_web::$STR_ACTION); ?>";
			modulo_constante2.STR_ES_POPUP="<?php echo(modulo_web::$STR_ES_POPUP); ?>";
			modulo_constante2.STR_ES_BUSQUEDA="<?php echo(modulo_web::$STR_ES_BUSQUEDA); ?>";
			modulo_constante2.STR_FUNCION_JS="<?php echo(modulo_web::$STR_FUNCION_JS); ?>";
			modulo_constante2.BIG_ID_ACTUAL="<?php echo(modulo_web::$BIG_ID_ACTUAL); ?>";
			modulo_constante2.BIG_ID_OPCION="<?php echo(modulo_web::$BIG_ID_OPCION); ?>";
			modulo_constante2.STR_OBJETO_JS="<?php echo(modulo_web::$STR_OBJETO_JS); ?>";
			modulo_constante2.STR_ES_RELACIONES="<?php echo(modulo_web::$STR_ES_RELACIONES); ?>";
			modulo_constante2.STR_ES_RELACIONADO="<?php echo(modulo_web::$STR_ES_RELACIONADO); ?>";
			modulo_constante2.STR_ES_SUB_PAGINA="<?php echo(modulo_web::$STR_ES_SUB_PAGINA); ?>";
			modulo_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(modulo_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			modulo_constante2.BIT_ES_PAGINA_FORM=<?php echo(modulo_web::$BIT_ES_PAGINA_FORM); ?>;
			modulo_constante2.STR_SUFIJO="<?php echo(modulo_web::$STR_SUF); ?>";//modulo
			modulo_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(modulo_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//modulo
			
			modulo_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(modulo_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			modulo_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($modulo_web1->moduloActual->getnombre()); ?>";
			modulo_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(modulo_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			modulo_constante2.BIT_ES_LOAD_NORMAL=true;
			/*modulo_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			modulo_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.modulo_constante2 = modulo_constante2;
			
		</script>
		
		<?php if(modulo_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.modulo_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.modulo_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="moduloActual" ></a>
	
	<div id="divResumenmoduloActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(modulo_web::$STR_ES_RELACIONADO=='false') {?>
		
		<div id="header" >
		
			<div id="banner">
				<span id="spanTituloBanner" class="titulobanner"></span>
			</div> <!-- banner -->
					
			<div id="subheader" class="links">  
			
						
			</div> <!-- sub-header -->
			
			
		</div> <!-- header -->
		
		<?php } ?>
		
		<div id="main">
		

			<?php if(modulo_web::$STR_ES_RELACIONADO=='false') {?>
			
			
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(modulo_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(modulo_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divmoduloPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblmoduloPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmmoduloAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnmoduloAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="modulo_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnmoduloAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmmoduloAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblmoduloPopupAjaxWebPart -->
		</div> <!-- divmoduloPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->		
		
		
		
			
<tr id="trmoduloElementosFormulario">
	<td>
		<div id="divMantenimientomoduloAjaxWebPart" title="MODULO" style="height: 90%;width: 90%;position: relative;top: 30px;left: 30px;">
			<form id="frmMantenimientomodulo" name="frmMantenimientomodulo">

			</br>

			<?php if(modulo_web::$STR_ES_RELACIONES=='false' ) {?>
			</br>
			<?php } ?>

			<!-- SECCION/TOOLBAR -->
			<table id="tblmoduloToolBarFormularioExterior" style="width: 65%">
				<tr style="display:table-row">
					<td align="center">

						<table id="tblmoduloToolBarFormulario" style="text-align: center"  style="display:table-row">
							<tr>
								<td id="tdmoduloActualizarToolBar" style="visibility:visible">
									<img id="imgActualizarToolBarmodulo" name="imgActualizarToolBarmodulo" title="ACTUALIZAR Modulo ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/actualizar.gif" width="25" height="25"/>
								</td>
								<td id="tdmoduloEliminarToolBar" style="visibility:visible">
									<img id="imgEliminarToolBarmodulo" name="imgEliminarToolBarmodulo" title="ELIMINAR Modulo ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/eliminar.gif" width="25" height="25"/>
								</td>
								<td id="tdmoduloCancelarToolBar" style="visibility:visible">
									<img id="imgCancelarToolBarmodulo" name="imgCancelarToolBarmodulo" title="CANCELAR Modulo ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/cancelar.gif" width="25" height="25"/>
								</td>
								<td id="tdmoduloRelacionesToolBar" style="display:table-row">
									<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/xexpand.png" width="25" height="25" onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('tblCamposOcultosmodulo',this,'../')"/>
								</td>
							</tr>
						</table> <!-- tblmoduloToolBarFormulario -->

					</td>
				</tr>
			</table> <!-- tblmoduloToolBarFormularioExterior -->

			<table id="tblmoduloElementos">
			<tr id="trmoduloElementos" class="elementos" style="display:table-row">
			<td align="center">

			<a id="Campos"></a>

				<?php if(modulo_web::$STR_ES_RELACIONES=='false' ) {?>
				<div id="divFlechaArribaElementos" align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
					<span></span>
				</div>
				<?php } ?>

				<!-- SECCION/FORMULARIO -->
				<table id="tblElementosmodulo" class="elementos" style="width: 400px; padding: 0px; border-spacing: 0px; border-collapse: collapse; text-align: left;">
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
						<td id="td_title-id_sistema" class="titulocampo">
							<label class="form-label">Sistema.(*)</label>
						</td>
						<td id="td_control-id_sistema" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_sistema" name="form-id_sistema" title="Sistema" ></select></td>
									<td><a><img id="form-id_sistema_img" name="form-id_sistema_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_sistema_img_busqueda" name="form-id_sistema_img_busqueda" title="Buscar Sistema" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_sistema" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_5">
						<td id="td_title-id_paquete" class="titulocampo">
							<label class="form-label">Paquete.(*)</label>
						</td>
						<td id="td_control-id_paquete" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_paquete" name="form-id_paquete" title="Paquete" ></select></td>
									<td><a><img id="form-id_paquete_img" name="form-id_paquete_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_paquete_img_busqueda" name="form-id_paquete_img_busqueda" title="Buscar Paquete" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_paquete" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_6">
						<td id="td_title-codigo" class="titulocampo">
							<label class="form-label">Codigo.(*)</label>
						</td>
						<td id="td_control-codigo" align="left" class="controlcampo">
							<input id="form-codigo" name="form-codigo" type="text" class="form-control"  placeholder="Codigo"  title="Codigo"    size="20"  maxlength="50"/>
							<span id="spanstrMensajecodigo" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_7">
						<td id="td_title-nombre" class="titulocampo">
							<label class="form-label">Nombre.(*)</label>
						</td>
						<td id="td_control-nombre" align="left" class="controlcampo">
							<textarea id="form-nombre" name="form-nombre" class="form-control"  placeholder="Nombre"  title="Nombre"   style="font-size: 13px;" rows="3" cols="25" size="20" ></textarea>
							<span id="spanstrMensajenombre" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_8">
						<td id="td_title-id_tipo_tecla_mascara" class="titulocampo">
							<label class="form-label">Tipo Tecla Mascara.(*)</label>
						</td>
						<td id="td_control-id_tipo_tecla_mascara" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_tipo_tecla_mascara" name="form-id_tipo_tecla_mascara" title="Tipo Tecla Mascara" ></select></td>
									<td><a><img id="form-id_tipo_tecla_mascara_img" name="form-id_tipo_tecla_mascara_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_tipo_tecla_mascara_img_busqueda" name="form-id_tipo_tecla_mascara_img_busqueda" title="Buscar Tipo Tecla Mascara" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_tipo_tecla_mascara" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_9">
						<td id="td_title-tecla" class="titulocampo">
							<label class="form-label">Tecla.(*)</label>
						</td>
						<td id="td_control-tecla" align="left" class="controlcampo">
							<input id="form-tecla" name="form-tecla" type="text" class="form-control"  placeholder="Tecla"  title="Tecla"    size="20"  maxlength="20"/>
							<span id="spanstrMensajetecla" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_10">
						<td id="td_title-estado" class="titulocampo">
							<label class="form-label">Estado</label>
						</td>
						<td id="td_control-estado" align="left" class="controlcampo">
							<input id="form-estado" name="form-estado" type="checkbox" >
							<span id="spanstrMensajeestado" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_11">
						<td id="td_title-orden" class="titulocampo">
							<label class="form-label">Orden.(*)</label>
						</td>
						<td id="td_control-orden" align="left" class="controlcampo">
							<input id="form-orden" name="form-orden" type="text" class="form-control"  placeholder="Orden"  title="Orden"    maxlength="10" size="10" >
							<span id="spanstrMensajeorden" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_12">
						<td id="td_title-descripcion" class="titulocampo">
							<label class="form-label">Descripcion.(*)</label>
						</td>
						<td id="td_control-descripcion" align="left" class="controlcampo">
							<textarea id="form-descripcion" name="form-descripcion" class="form-control"  placeholder="Descripcion"  title="Descripcion"   style="font-size: 13px;"  rows ="3" cols= "25"></textarea>
							<span id="spanstrMensajedescripcion" class="mensajeerror"></span>
						</td>
					</tr>
				</table> <!-- tblElementosmodulo -->

				<!-- SECCION/OCULTOS -->
				<table id="tblCamposOcultosmodulo" class="elementos" style="display: table-row;">
					<caption class="busquedacabecera">
						<span>Campos Ocultos</span>
					</caption>
				</table> <!-- tblCamposOcultosmodulo -->

			</td></tr> <!-- trmoduloElementos -->
			</table> <!-- tblmoduloElementos -->
			</form> <!-- frmMantenimientomodulo -->


			

				<form id="frmAccionesMantenimientomodulo" name="frmAccionesMantenimientomodulo">

			<?php if(modulo_web::$STR_ES_BUSQUEDA=='false' ) {?>
			<table id="tblmoduloAcciones" class="elementos" style="text-align: center">
		<tr id="trmoduloAcciones" class="elementos" style="display:table-row">
			<td align="center">
				<a id="Acciones" ></a>

				<?php if(modulo_web::$STR_ES_RELACIONES=='false' ) {?>
				<div align="right">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
				<?php } ?>

					<!-- SECCION/BOTONES -->
					<table id="tblAccionesMantenimientomodulo" class="busqueda" style="width: 50%;text-align: left">

						<?php if(modulo_web::$STR_ES_RELACIONES=='false' ) {?>
						<!--
						<caption class="busquedacabecera">
							<span>Acciones</span>
						</caption>
						-->
						<?php } ?>

						<tr id="trAccionesMantenimientomoduloBasicos">
							<td id="tdbtnNuevomodulo" style="visibility:visible">
								<div id="divNuevomodulo" style="display:table-row">
									<input type="button" id="btnNuevomodulo" name="btnNuevomodulo" value="NUEVO" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnActualizarmodulo" style="visibility:visible">
								<div id="divActualizarmodulo" style="display:table-row">
									<input type="button" id="btnActualizarmodulo" name="btnActualizarmodulo" title="ACTUALIZAR Modulo ACTUAL" value="Actualizar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnEliminarmodulo" style="visibility:visible">
								<div id="divEliminarmodulo" style="display:table-row">
									<input type="button" id="btnEliminarmodulo" name="btnEliminarmodulo" title="ELIMINAR Modulo ACTUAL" value="Eliminar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnImprimirmodulo" style="visibility:visible">
								<input type="button" id="btnImprimirmodulo" name="btnImprimirmodulo" title="IMPRIMIR PAGINA Modulo ACTUAL" value="Imp. Datos" class="btn btn-primary"/>
							</td>
							<td id="tdbtnCancelarmodulo" style="visibility:visible">
								<input type="button" id="btnCancelarmodulo" name="btnCancelarmodulo" title="CANCELAR Modulo ACTUAL" value="Cancelar" class="btn btn-primary"/>
							</td>
						</tr>
						<tr id="trAccionesMantenimientomoduloGuardar" style="display:none">
							<td id="tdbtnGuardarCambiosmodulo" colspan="4" align="center" style="visibility:visible">
								<div id="divGuardarCambiosmodulo" style="display:table-row">
									<input type="button" id="btnGuardarCambiosFormulariomodulo" name="btnGuardarCambiosFormulariomodulo" title="GUARDAR" value="GUADAR CAMBIOS" class="btn btn-primary"/>
								</div>
							</td>
						</tr>
					</table> <!-- tblAccionesMantenimientomodulo -->
			</td>
		</tr> <!-- trmoduloAcciones -->
		<?php if(modulo_web::$STR_ES_RELACIONADO=='false' ) {?>
		<tr id="trmoduloParametrosAcciones" class="impresion"  style="display:table-row">
			<td align="center">
				<!-- SECCION/POST -->
				<table id="tblmoduloParametrosAcciones" style="text-align: center;border: 0px solid black;padding: 0px; border-spacing: 0px">
					<caption class="busquedacabecera" style="padding: 0px;caption-side: top;">
						<span>Acciones Extra/Post</span>
					</caption>
					<tr id="trmoduloFilaParametrosAcciones">
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
				</table> <!-- tblmoduloParametrosAcciones -->
			</td>
		</tr> <!-- trmoduloParametrosAcciones -->
		<?php }?>
		<tr id="trmoduloMensajes" class="mensajes">
			<td align="center">
				<a id="Mensajes"></a>
			</td>
		</tr> <!-- trmoduloMensajes -->
			</table> <!-- tblmoduloAcciones -->
			<?php } ?>
			</form> <!-- frmMantenimientomodulo -->
			</div> <!-- divMantenimientomoduloAjaxWebPart -->
		</td>
	</tr> <!-- trmoduloElementosFormulario/super -->
		<?php if(modulo_web::$STR_ES_RELACIONADO=='false' ) {?>

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
			
				import {modulo_webcontrol,modulo_webcontrol1} from './webroot/js/JavaScript/contabilidad/seguridad/modulo/js/webcontrol/modulo_form_webcontrol.js?random=1';
				
				modulo_webcontrol1.setmodulo_constante(window.modulo_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(modulo_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

