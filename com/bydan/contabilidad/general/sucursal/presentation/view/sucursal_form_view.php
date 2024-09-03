<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\general\sucursal\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Sucursal Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/general/sucursal/util/sucursal_carga.php');
	use com\bydan\contabilidad\general\sucursal\util\sucursal_carga;
	
	//include_once('com/bydan/contabilidad/general/sucursal/presentation/view/sucursal_web.php');
	//use com\bydan\contabilidad\general\sucursal\presentation\view\sucursal_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	sucursal_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	sucursal_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$sucursal_web1= new sucursal_web();	
	$sucursal_web1->cargarDatosGenerales();
	
	//$moduloActual=$sucursal_web1->moduloActual;
	//$usuarioActual=$sucursal_web1->usuarioActual;
	//$sessionBase=$sucursal_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$sucursal_web1->parametroGeneralUsuarioActual;
	
	
		
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
		
		
			<script type="module" src="webroot/js/JavaScript/contabilidad/general/sucursal/js/util/sucursal_form_funcion.js?random=1"></script>
						
		
		
		<?php 
			
		
			sucursal_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					sucursal_web::$GET_POST=$_GET;
				} else {
					sucursal_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			sucursal_web::$STR_NOMBRE_PAGINA = 'sucursal_form_view.php';
			sucursal_web::$BIT_ES_PAGINA_PRINCIPAL = 'false';
			sucursal_web::$BIT_ES_PAGINA_FORM = 'true';
				
			sucursal_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {sucursal_constante,sucursal_constante1} from './webroot/js/JavaScript/contabilidad/general/sucursal/js/util/sucursal_constante.js?random=1';
			import {sucursal_funcion,sucursal_funcion1} from './webroot/js/JavaScript/contabilidad/general/sucursal/js/util/sucursal_funcion.js?random=1';
			
			let sucursal_constante2 = new sucursal_constante();
			
			sucursal_constante2.STR_NOMBRE_PAGINA="<?php echo(sucursal_web::$STR_NOMBRE_PAGINA); ?>";
			sucursal_constante2.STR_TYPE_ON_LOADsucursal="<?php echo(sucursal_web::$STR_TYPE_ONLOAD); ?>";
			sucursal_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(sucursal_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			sucursal_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(sucursal_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			sucursal_constante2.STR_ACTION="<?php echo(sucursal_web::$STR_ACTION); ?>";
			sucursal_constante2.STR_ES_POPUP="<?php echo(sucursal_web::$STR_ES_POPUP); ?>";
			sucursal_constante2.STR_ES_BUSQUEDA="<?php echo(sucursal_web::$STR_ES_BUSQUEDA); ?>";
			sucursal_constante2.STR_FUNCION_JS="<?php echo(sucursal_web::$STR_FUNCION_JS); ?>";
			sucursal_constante2.BIG_ID_ACTUAL="<?php echo(sucursal_web::$BIG_ID_ACTUAL); ?>";
			sucursal_constante2.BIG_ID_OPCION="<?php echo(sucursal_web::$BIG_ID_OPCION); ?>";
			sucursal_constante2.STR_OBJETO_JS="<?php echo(sucursal_web::$STR_OBJETO_JS); ?>";
			sucursal_constante2.STR_ES_RELACIONES="<?php echo(sucursal_web::$STR_ES_RELACIONES); ?>";
			sucursal_constante2.STR_ES_RELACIONADO="<?php echo(sucursal_web::$STR_ES_RELACIONADO); ?>";
			sucursal_constante2.STR_ES_SUB_PAGINA="<?php echo(sucursal_web::$STR_ES_SUB_PAGINA); ?>";
			sucursal_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(sucursal_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			sucursal_constante2.BIT_ES_PAGINA_FORM=<?php echo(sucursal_web::$BIT_ES_PAGINA_FORM); ?>;
			sucursal_constante2.STR_SUFIJO="<?php echo(sucursal_web::$STR_SUF); ?>";//sucursal
			sucursal_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(sucursal_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//sucursal
			
			sucursal_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(sucursal_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			sucursal_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($sucursal_web1->moduloActual->getnombre()); ?>";
			sucursal_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(sucursal_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			sucursal_constante2.BIT_ES_LOAD_NORMAL=true;
			/*sucursal_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			sucursal_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.sucursal_constante2 = sucursal_constante2;
			
		</script>
		
		<?php if(sucursal_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.sucursal_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.sucursal_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="sucursalActual" ></a>
	
	<div id="divResumensucursalActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(sucursal_web::$STR_ES_RELACIONADO=='false') {?>
		
		<div id="header" >
		
			<div id="banner">
				<span id="spanTituloBanner" class="titulobanner"></span>
			</div> <!-- banner -->
					
			<div id="subheader" class="links">  
			
						
			</div> <!-- sub-header -->
			
			
		</div> <!-- header -->
		
		<?php } ?>
		
		<div id="main">
		

			<?php if(sucursal_web::$STR_ES_RELACIONADO=='false') {?>
			
			
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(sucursal_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(sucursal_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divsucursalPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblsucursalPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmsucursalAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnsucursalAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="sucursal_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnsucursalAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmsucursalAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblsucursalPopupAjaxWebPart -->
		</div> <!-- divsucursalPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->		
		
		
		
			
<tr id="trsucursalElementosFormulario">
	<td>
		<div id="divMantenimientosucursalAjaxWebPart" title="SUCURSAL" style="height: 90%;width: 90%;position: relative;top: 30px;left: 30px;">
			<form id="frmMantenimientosucursal" name="frmMantenimientosucursal">

			</br>

			<?php if(sucursal_web::$STR_ES_RELACIONES=='false' ) {?>
			</br>
			<?php } ?>

			<!-- SECCION/TOOLBAR -->
			<table id="tblsucursalToolBarFormularioExterior" style="width: 65%">
				<tr style="display:table-row">
					<td align="center">

						<table id="tblsucursalToolBarFormulario" style="text-align: center"  style="display:table-row">
							<tr>
								<td id="tdsucursalActualizarToolBar" style="visibility:visible">
									<img id="imgActualizarToolBarsucursal" name="imgActualizarToolBarsucursal" title="ACTUALIZAR Sucursal ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/actualizar.gif" width="25" height="25"/>
								</td>
								<td id="tdsucursalEliminarToolBar" style="visibility:visible">
									<img id="imgEliminarToolBarsucursal" name="imgEliminarToolBarsucursal" title="ELIMINAR Sucursal ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/eliminar.gif" width="25" height="25"/>
								</td>
								<td id="tdsucursalCancelarToolBar" style="visibility:visible">
									<img id="imgCancelarToolBarsucursal" name="imgCancelarToolBarsucursal" title="CANCELAR Sucursal ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/cancelar.gif" width="25" height="25"/>
								</td>
								<td id="tdsucursalRelacionesToolBar" style="display:table-row">
									<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/xexpand.png" width="25" height="25" onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('tblCamposOcultossucursal',this,'../')"/>
								</td>
							</tr>
						</table> <!-- tblsucursalToolBarFormulario -->

					</td>
				</tr>
			</table> <!-- tblsucursalToolBarFormularioExterior -->

			<table id="tblsucursalElementos">
			<tr id="trsucursalElementos" class="elementos" style="display:table-row">
			<td align="center">

			<a id="Campos"></a>

				<?php if(sucursal_web::$STR_ES_RELACIONES=='false' ) {?>
				<div id="divFlechaArribaElementos" align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
					<span></span>
				</div>
				<?php } ?>

				<!-- SECCION/FORMULARIO -->
				<table id="tblElementossucursal" class="elementos" style="width: 400px; padding: 0px; border-spacing: 0px; border-collapse: collapse; text-align: left;">
					<tr id="tr_fila_1">
						<td id="td_title-id" class="titulocampo">
							<label class="form-label">Cod. Único</label>
						</td>
						<td id="td_control-id" align="left">
							<input id="form-id" name="form-id" type="text" class="form-control" readonly size="10">
						</td>
					
					
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
					
						<td id="td_title-id_pais" class="titulocampo">
							<label class="form-label">Pais.(*)</label>
						</td>
						<td id="td_control-id_pais" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_pais" name="form-id_pais" title="Pais" ></select></td>
									<td><a><img id="form-id_pais_img" name="form-id_pais_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_pais_img_busqueda" name="form-id_pais_img_busqueda" title="Buscar Pais" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_pais" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-id_ciudad" class="titulocampo">
							<label class="form-label">Ciudad.(*)</label>
						</td>
						<td id="td_control-id_ciudad" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_ciudad" name="form-id_ciudad" title="Ciudad" ></select></td>
									<td><a><img id="form-id_ciudad_img" name="form-id_ciudad_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_ciudad_img_busqueda" name="form-id_ciudad_img_busqueda" title="Buscar Ciudad" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_ciudad" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_2">
						<td id="td_title-nombre" class="titulocampo">
							<label class="form-label">Nombre.(*)</label>
						</td>
						<td id="td_control-nombre" align="left" class="controlcampo">
							<textarea id="form-nombre" name="form-nombre" class="form-control"  placeholder="Nombre"  title="Nombre"   style="font-size: 13px;" rows="2" cols="25" size="20" ></textarea>
							<span id="spanstrMensajenombre" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-registro_tributario" class="titulocampo">
							<label class="form-label">Registro Tributario (RUC).(*)</label>
						</td>
						<td id="td_control-registro_tributario" align="left" class="controlcampo">
							<input id="form-registro_tributario" name="form-registro_tributario" type="text" class="form-control"  placeholder="Registro Tributario (RUC)"  title="Registro Tributario (RUC)"    size="15"  maxlength="15"/>
							<span id="spanstrMensajeregistro_tributario" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-registro_sucursalrial" class="titulocampo">
							<label class="form-label">Registro Empresarial</label>
						</td>
						<td id="td_control-registro_sucursalrial" align="left" class="controlcampo">
							<textarea id="form-registro_sucursalrial" name="form-registro_sucursalrial" class="form-control"  placeholder="Registro Empresarial"  title="Registro Empresarial"   style="font-size: 13px;" rows="2" cols="25" size="20" ></textarea>
							<span id="spanstrMensajeregistro_sucursalrial" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_3">
						<td id="td_title-direccion1" class="titulocampo">
							<label class="form-label">Direccion1.(*)</label>
						</td>
						<td id="td_control-direccion1" align="left" class="controlcampo">
							<textarea id="form-direccion1" name="form-direccion1" class="form-control"  placeholder="Direccion1"  title="Direccion1"   style="font-size: 13px;" rows="2" cols="25" size="20" ></textarea>
							<span id="spanstrMensajedireccion1" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-direccion2" class="titulocampo">
							<label class="form-label">Direccion2</label>
						</td>
						<td id="td_control-direccion2" align="left" class="controlcampo">
							<textarea id="form-direccion2" name="form-direccion2" class="form-control"  placeholder="Direccion2"  title="Direccion2"   style="font-size: 13px;" rows="2" cols="25" size="20" ></textarea>
							<span id="spanstrMensajedireccion2" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-direccion3" class="titulocampo">
							<label class="form-label">Direccion3</label>
						</td>
						<td id="td_control-direccion3" align="left" class="controlcampo">
							<textarea id="form-direccion3" name="form-direccion3" class="form-control"  placeholder="Direccion3"  title="Direccion3"   style="font-size: 13px;" rows="2" cols="25" size="20" ></textarea>
							<span id="spanstrMensajedireccion3" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_4">
						<td id="td_title-telefono1" class="titulocampo">
							<label class="form-label">Telefono1.(*)</label>
						</td>
						<td id="td_control-telefono1" align="left" class="controlcampo">
							<input id="form-telefono1" name="form-telefono1" type="text" class="form-control"  placeholder="Telefono1"  title="Telefono1"    size="20"  maxlength="40"/>
							<span id="spanstrMensajetelefono1" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-celular" class="titulocampo">
							<label class="form-label">Celular</label>
						</td>
						<td id="td_control-celular" align="left" class="controlcampo">
							<input id="form-celular" name="form-celular" type="text" class="form-control"  placeholder="Celular"  title="Celular"    size="20"  maxlength="40"/>
							<span id="spanstrMensajecelular" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-correo_electronico" class="titulocampo">
							<label class="form-label">Correo Electronico.(*)</label>
						</td>
						<td id="td_control-correo_electronico" align="left" class="controlcampo">
							<textarea id="form-correo_electronico" name="form-correo_electronico" class="form-control"  placeholder="Correo Electronico"  title="Correo Electronico"   style="font-size: 13px;" rows="2" cols="25" size="20" ></textarea>
							<span id="spanstrMensajecorreo_electronico" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_5">
						<td id="td_title-sitio_web" class="titulocampo">
							<label class="form-label">Sitio Web</label>
						</td>
						<td id="td_control-sitio_web" align="left" class="controlcampo">
							<textarea id="form-sitio_web" name="form-sitio_web" class="form-control"  placeholder="Sitio Web"  title="Sitio Web"   style="font-size: 13px;" rows="2" cols="25" size="20" ></textarea>
							<span id="spanstrMensajesitio_web" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-codigo_postal" class="titulocampo">
							<label class="form-label">Codigo Postal</label>
						</td>
						<td id="td_control-codigo_postal" align="left" class="controlcampo">
							<input id="form-codigo_postal" name="form-codigo_postal" type="text" class="form-control"  placeholder="Codigo Postal"  title="Codigo Postal"    size="20"  maxlength="40"/>
							<span id="spanstrMensajecodigo_postal" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-fax" class="titulocampo">
							<label class="form-label">Fax</label>
						</td>
						<td id="td_control-fax" align="left" class="controlcampo">
							<input id="form-fax" name="form-fax" type="text" class="form-control"  placeholder="Fax"  title="Fax"    size="20"  maxlength="40"/>
							<span id="spanstrMensajefax" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_6">
						<td id="td_title-barrio_distrito" class="titulocampo">
							<label class="form-label">Barrio Distrito</label>
						</td>
						<td id="td_control-barrio_distrito" align="left" class="controlcampo">
							<textarea id="form-barrio_distrito" name="form-barrio_distrito" class="form-control"  placeholder="Barrio Distrito"  title="Barrio Distrito"   style="font-size: 13px;" rows="2" cols="25" size="20" ></textarea>
							<span id="spanstrMensajebarrio_distrito" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-logo" class="titulocampo">
							<label class="form-label">Logo</label>
						</td>
						<td id="td_control-logo" align="left" class="controlcampo">
							<textarea id="form-logo" name="form-logo" class="form-control"  placeholder="Logo"  title="Logo"   style="font-size: 13px;"  rows ="0" cols= "25"></textarea>
							<span id="spanstrMensajelogo" class="mensajeerror"></span>
						</td>
					
				</table> <!-- tblElementossucursal -->

				<!-- SECCION/OCULTOS -->
				<table id="tblCamposOcultossucursal" class="elementos" style="display: table-row;">
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
					
					<tr id="tr_fila_1">
						<td id="td_title-base_de_datos" class="titulocampo">
							<label class="form-label">Base De Datos</label>
						</td>
						<td id="td_control-base_de_datos" align="left" class="controlcampo">
							<input id="form-base_de_datos" name="form-base_de_datos" type="text" class="form-control"  placeholder="Base De Datos"  title="Base De Datos"    size="20"  maxlength="20"/>
							<span id="spanstrMensajebase_de_datos" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-condicion" class="titulocampo">
							<label class="form-label">Condicion</label>
						</td>
						<td id="td_control-condicion" align="left" class="controlcampo">
							<input id="form-condicion" name="form-condicion" type="text" class="form-control"  placeholder="Condicion"  title="Condicion"    maxlength="10" size="10" >
							<span id="spanstrMensajecondicion" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-icono_asociado" class="titulocampo">
							<label class="form-label">Icono Asociado</label>
						</td>
						<td id="td_control-icono_asociado" align="left" class="controlcampo">
							<textarea id="form-icono_asociado" name="form-icono_asociado" class="form-control"  placeholder="Icono Asociado"  title="Icono Asociado"   style="font-size: 13px;"  rows ="0" cols= "25"></textarea>
							<span id="spanstrMensajeicono_asociado" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_2">
						<td id="td_title-folder_sucursal" class="titulocampo">
							<label class="form-label">Folder</label>
						</td>
						<td id="td_control-folder_sucursal" align="left" class="controlcampo">
							<textarea id="form-folder_sucursal" name="form-folder_sucursal" class="form-control"  placeholder="Folder"  title="Folder"   style="font-size: 13px;"  rows ="0" cols= "25"></textarea>
							<span id="spanstrMensajefolder_sucursal" class="mensajeerror"></span>
						</td>
					<td></td><td></td><td></td><td></td></tr>
				</table> <!-- tblCamposOcultossucursal -->

			</td></tr> <!-- trsucursalElementos -->
			</table> <!-- tblsucursalElementos -->
			</form> <!-- frmMantenimientosucursal -->


			

				<form id="frmAccionesMantenimientosucursal" name="frmAccionesMantenimientosucursal">

			<?php if(sucursal_web::$STR_ES_BUSQUEDA=='false' ) {?>
			<table id="tblsucursalAcciones" class="elementos" style="text-align: center">
		<tr id="trsucursalAcciones" class="elementos" style="display:table-row">
			<td align="center">
				<a id="Acciones" ></a>

				<?php if(sucursal_web::$STR_ES_RELACIONES=='false' ) {?>
				<div align="right">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
				<?php } ?>

					<!-- SECCION/BOTONES -->
					<table id="tblAccionesMantenimientosucursal" class="busqueda" style="width: 50%;text-align: left">

						<?php if(sucursal_web::$STR_ES_RELACIONES=='false' ) {?>
						<!--
						<caption class="busquedacabecera">
							<span>Acciones</span>
						</caption>
						-->
						<?php } ?>

						<tr id="trAccionesMantenimientosucursalBasicos">
							<td id="tdbtnNuevosucursal" style="visibility:visible">
								<div id="divNuevosucursal" style="display:table-row">
									<input type="button" id="btnNuevosucursal" name="btnNuevosucursal" value="NUEVO" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnActualizarsucursal" style="visibility:visible">
								<div id="divActualizarsucursal" style="display:table-row">
									<input type="button" id="btnActualizarsucursal" name="btnActualizarsucursal" title="ACTUALIZAR Sucursal ACTUAL" value="Actualizar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnEliminarsucursal" style="visibility:visible">
								<div id="divEliminarsucursal" style="display:table-row">
									<input type="button" id="btnEliminarsucursal" name="btnEliminarsucursal" title="ELIMINAR Sucursal ACTUAL" value="Eliminar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnImprimirsucursal" style="visibility:visible">
								<input type="button" id="btnImprimirsucursal" name="btnImprimirsucursal" title="IMPRIMIR PAGINA Sucursal ACTUAL" value="Imp. Datos" class="btn btn-primary"/>
							</td>
							<td id="tdbtnCancelarsucursal" style="visibility:visible">
								<input type="button" id="btnCancelarsucursal" name="btnCancelarsucursal" title="CANCELAR Sucursal ACTUAL" value="Cancelar" class="btn btn-primary"/>
							</td>
						</tr>
						<tr id="trAccionesMantenimientosucursalGuardar" style="display:none">
							<td id="tdbtnGuardarCambiossucursal" colspan="4" align="center" style="visibility:visible">
								<div id="divGuardarCambiossucursal" style="display:table-row">
									<input type="button" id="btnGuardarCambiosFormulariosucursal" name="btnGuardarCambiosFormulariosucursal" title="GUARDAR" value="GUADAR CAMBIOS" class="btn btn-primary"/>
								</div>
							</td>
						</tr>
					</table> <!-- tblAccionesMantenimientosucursal -->
			</td>
		</tr> <!-- trsucursalAcciones -->
		<?php if(sucursal_web::$STR_ES_RELACIONADO=='false' ) {?>
		<tr id="trsucursalParametrosAcciones" class="impresion"  style="display:table-row">
			<td align="center">
				<!-- SECCION/POST -->
				<table id="tblsucursalParametrosAcciones" style="text-align: center;border: 0px solid black;padding: 0px; border-spacing: 0px">
					<caption class="busquedacabecera" style="padding: 0px;caption-side: top;">
						<span>Acciones Extra/Post</span>
					</caption>
					<tr id="trsucursalFilaParametrosAcciones">
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
				</table> <!-- tblsucursalParametrosAcciones -->
			</td>
		</tr> <!-- trsucursalParametrosAcciones -->
		<?php }?>
		<tr id="trsucursalMensajes" class="mensajes">
			<td align="center">
				<a id="Mensajes"></a>
			</td>
		</tr> <!-- trsucursalMensajes -->
			</table> <!-- tblsucursalAcciones -->
			<?php } ?>
			</form> <!-- frmMantenimientosucursal -->
			</div> <!-- divMantenimientosucursalAjaxWebPart -->
		</td>
	</tr> <!-- trsucursalElementosFormulario/super -->
		<?php if(sucursal_web::$STR_ES_RELACIONADO=='false' ) {?>

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
			
				import {sucursal_webcontrol,sucursal_webcontrol1} from './webroot/js/JavaScript/contabilidad/general/sucursal/js/webcontrol/sucursal_form_webcontrol.js?random=1';
				
				sucursal_webcontrol1.setsucursal_constante(window.sucursal_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(sucursal_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

