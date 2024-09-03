<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\general\propiedad_empresa\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Propiedades Empresa Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/general/propiedad_empresa/util/propiedad_empresa_carga.php');
	use com\bydan\contabilidad\general\propiedad_empresa\util\propiedad_empresa_carga;
	
	//include_once('com/bydan/contabilidad/general/propiedad_empresa/presentation/view/propiedad_empresa_web.php');
	//use com\bydan\contabilidad\general\propiedad_empresa\presentation\view\propiedad_empresa_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	propiedad_empresa_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	propiedad_empresa_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$propiedad_empresa_web1= new propiedad_empresa_web();	
	$propiedad_empresa_web1->cargarDatosGenerales();
	
	//$moduloActual=$propiedad_empresa_web1->moduloActual;
	//$usuarioActual=$propiedad_empresa_web1->usuarioActual;
	//$sessionBase=$propiedad_empresa_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$propiedad_empresa_web1->parametroGeneralUsuarioActual;
	
	
		
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
		
		
			<script type="module" src="webroot/js/JavaScript/contabilidad/general/propiedad_empresa/js/util/propiedad_empresa_form_funcion.js?random=1"></script>
						
		
		
		<?php 
			
		
			propiedad_empresa_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					propiedad_empresa_web::$GET_POST=$_GET;
				} else {
					propiedad_empresa_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			propiedad_empresa_web::$STR_NOMBRE_PAGINA = 'propiedad_empresa_form_view.php';
			propiedad_empresa_web::$BIT_ES_PAGINA_PRINCIPAL = 'false';
			propiedad_empresa_web::$BIT_ES_PAGINA_FORM = 'true';
				
			propiedad_empresa_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {propiedad_empresa_constante,propiedad_empresa_constante1} from './webroot/js/JavaScript/contabilidad/general/propiedad_empresa/js/util/propiedad_empresa_constante.js?random=1';
			import {propiedad_empresa_funcion,propiedad_empresa_funcion1} from './webroot/js/JavaScript/contabilidad/general/propiedad_empresa/js/util/propiedad_empresa_funcion.js?random=1';
			
			let propiedad_empresa_constante2 = new propiedad_empresa_constante();
			
			propiedad_empresa_constante2.STR_NOMBRE_PAGINA="<?php echo(propiedad_empresa_web::$STR_NOMBRE_PAGINA); ?>";
			propiedad_empresa_constante2.STR_TYPE_ON_LOADpropiedad_empresa="<?php echo(propiedad_empresa_web::$STR_TYPE_ONLOAD); ?>";
			propiedad_empresa_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(propiedad_empresa_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			propiedad_empresa_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(propiedad_empresa_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			propiedad_empresa_constante2.STR_ACTION="<?php echo(propiedad_empresa_web::$STR_ACTION); ?>";
			propiedad_empresa_constante2.STR_ES_POPUP="<?php echo(propiedad_empresa_web::$STR_ES_POPUP); ?>";
			propiedad_empresa_constante2.STR_ES_BUSQUEDA="<?php echo(propiedad_empresa_web::$STR_ES_BUSQUEDA); ?>";
			propiedad_empresa_constante2.STR_FUNCION_JS="<?php echo(propiedad_empresa_web::$STR_FUNCION_JS); ?>";
			propiedad_empresa_constante2.BIG_ID_ACTUAL="<?php echo(propiedad_empresa_web::$BIG_ID_ACTUAL); ?>";
			propiedad_empresa_constante2.BIG_ID_OPCION="<?php echo(propiedad_empresa_web::$BIG_ID_OPCION); ?>";
			propiedad_empresa_constante2.STR_OBJETO_JS="<?php echo(propiedad_empresa_web::$STR_OBJETO_JS); ?>";
			propiedad_empresa_constante2.STR_ES_RELACIONES="<?php echo(propiedad_empresa_web::$STR_ES_RELACIONES); ?>";
			propiedad_empresa_constante2.STR_ES_RELACIONADO="<?php echo(propiedad_empresa_web::$STR_ES_RELACIONADO); ?>";
			propiedad_empresa_constante2.STR_ES_SUB_PAGINA="<?php echo(propiedad_empresa_web::$STR_ES_SUB_PAGINA); ?>";
			propiedad_empresa_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(propiedad_empresa_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			propiedad_empresa_constante2.BIT_ES_PAGINA_FORM=<?php echo(propiedad_empresa_web::$BIT_ES_PAGINA_FORM); ?>;
			propiedad_empresa_constante2.STR_SUFIJO="<?php echo(propiedad_empresa_web::$STR_SUF); ?>";//propiedad_empresa
			propiedad_empresa_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(propiedad_empresa_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//propiedad_empresa
			
			propiedad_empresa_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(propiedad_empresa_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			propiedad_empresa_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($propiedad_empresa_web1->moduloActual->getnombre()); ?>";
			propiedad_empresa_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(propiedad_empresa_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			propiedad_empresa_constante2.BIT_ES_LOAD_NORMAL=true;
			/*propiedad_empresa_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			propiedad_empresa_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.propiedad_empresa_constante2 = propiedad_empresa_constante2;
			
		</script>
		
		<?php if(propiedad_empresa_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.propiedad_empresa_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.propiedad_empresa_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="propiedad_empresaActual" ></a>
	
	<div id="divResumenpropiedad_empresaActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(propiedad_empresa_web::$STR_ES_RELACIONADO=='false') {?>
		
		<div id="header" >
		
			<div id="banner">
				<span id="spanTituloBanner" class="titulobanner"></span>
			</div> <!-- banner -->
					
			<div id="subheader" class="links">  
			
						
			</div> <!-- sub-header -->
			
			
		</div> <!-- header -->
		
		<?php } ?>
		
		<div id="main">
		

			<?php if(propiedad_empresa_web::$STR_ES_RELACIONADO=='false') {?>
			
			
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(propiedad_empresa_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(propiedad_empresa_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divpropiedad_empresaPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblpropiedad_empresaPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmpropiedad_empresaAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnpropiedad_empresaAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="propiedad_empresa_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnpropiedad_empresaAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmpropiedad_empresaAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblpropiedad_empresaPopupAjaxWebPart -->
		</div> <!-- divpropiedad_empresaPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->		
		
		
		
			
<tr id="trpropiedad_empresaElementosFormulario">
	<td>
		<div id="divMantenimientopropiedad_empresaAjaxWebPart" title="PROPIEDADES EMPRESA" style="height: 90%;width: 90%;position: relative;top: 30px;left: 30px;">
			<form id="frmMantenimientopropiedad_empresa" name="frmMantenimientopropiedad_empresa">

			</br>

			<?php if(propiedad_empresa_web::$STR_ES_RELACIONES=='false' ) {?>
			</br>
			<?php } ?>

			<!-- SECCION/TOOLBAR -->
			<table id="tblpropiedad_empresaToolBarFormularioExterior" style="width: 65%">
				<tr style="display:table-row">
					<td align="center">

						<table id="tblpropiedad_empresaToolBarFormulario" style="text-align: center"  style="display:table-row">
							<tr>
								<td id="tdpropiedad_empresaActualizarToolBar" style="visibility:visible">
									<img id="imgActualizarToolBarpropiedad_empresa" name="imgActualizarToolBarpropiedad_empresa" title="ACTUALIZAR Propiedades Empresa ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/actualizar.gif" width="25" height="25"/>
								</td>
								<td id="tdpropiedad_empresaEliminarToolBar" style="visibility:visible">
									<img id="imgEliminarToolBarpropiedad_empresa" name="imgEliminarToolBarpropiedad_empresa" title="ELIMINAR Propiedades Empresa ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/eliminar.gif" width="25" height="25"/>
								</td>
								<td id="tdpropiedad_empresaCancelarToolBar" style="visibility:visible">
									<img id="imgCancelarToolBarpropiedad_empresa" name="imgCancelarToolBarpropiedad_empresa" title="CANCELAR Propiedades Empresa ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/cancelar.gif" width="25" height="25"/>
								</td>
								<td id="tdpropiedad_empresaRelacionesToolBar" style="display:table-row">
									<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/xexpand.png" width="25" height="25" onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('tblCamposOcultospropiedad_empresa',this,'../')"/>
								</td>
							</tr>
						</table> <!-- tblpropiedad_empresaToolBarFormulario -->

					</td>
				</tr>
			</table> <!-- tblpropiedad_empresaToolBarFormularioExterior -->

			<table id="tblpropiedad_empresaElementos">
			<tr id="trpropiedad_empresaElementos" class="elementos" style="display:table-row">
			<td align="center">

			<a id="Campos"></a>

				<?php if(propiedad_empresa_web::$STR_ES_RELACIONES=='false' ) {?>
				<div id="divFlechaArribaElementos" align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
					<span></span>
				</div>
				<?php } ?>

				<!-- SECCION/FORMULARIO -->
				<table id="tblElementospropiedad_empresa" class="elementos" style="width: 300px; padding: 0px; border-spacing: 0px; border-collapse: collapse; text-align: left;">
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
						<td id="td_title-nombre_empresa" class="titulocampo">
							<label class="form-label">Nombre Empresa.(*)</label>
						</td>
						<td id="td_control-nombre_empresa" align="left" class="controlcampo">
							<textarea id="form-nombre_empresa" name="form-nombre_empresa" class="form-control"  placeholder="Nombre Empresa"  title="Nombre Empresa"   style="font-size: 13px;" rows="2" cols="25" size="20" ></textarea>
							<span id="spanstrMensajenombre_empresa" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_5">
						<td id="td_title-calle_1" class="titulocampo">
							<label class="form-label">Calle 1.(*)</label>
						</td>
						<td id="td_control-calle_1" align="left" class="controlcampo">
							<textarea id="form-calle_1" name="form-calle_1" class="form-control"  placeholder="Calle 1"  title="Calle 1"   style="font-size: 13px;"  rows ="0" cols= "25"></textarea>
							<span id="spanstrMensajecalle_1" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_6">
						<td id="td_title-calle_2" class="titulocampo">
							<label class="form-label">Calle 2.(*)</label>
						</td>
						<td id="td_control-calle_2" align="left" class="controlcampo">
							<textarea id="form-calle_2" name="form-calle_2" class="form-control"  placeholder="Calle 2"  title="Calle 2"   style="font-size: 13px;"  rows ="0" cols= "25"></textarea>
							<span id="spanstrMensajecalle_2" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_7">
						<td id="td_title-calle_3" class="titulocampo">
							<label class="form-label">Calle 3.(*)</label>
						</td>
						<td id="td_control-calle_3" align="left" class="controlcampo">
							<textarea id="form-calle_3" name="form-calle_3" class="form-control"  placeholder="Calle 3"  title="Calle 3"   style="font-size: 13px;"  rows ="0" cols= "25"></textarea>
							<span id="spanstrMensajecalle_3" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_8">
						<td id="td_title-barrio" class="titulocampo">
							<label class="form-label">Barrio.(*)</label>
						</td>
						<td id="td_control-barrio" align="left" class="controlcampo">
							<textarea id="form-barrio" name="form-barrio" class="form-control"  placeholder="Barrio"  title="Barrio"   style="font-size: 13px;"  rows ="0" cols= "25"></textarea>
							<span id="spanstrMensajebarrio" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_9">
						<td id="td_title-ciudad" class="titulocampo">
							<label class="form-label">Ciudad.(*)</label>
						</td>
						<td id="td_control-ciudad" align="left" class="controlcampo">
							<textarea id="form-ciudad" name="form-ciudad" class="form-control"  placeholder="Ciudad"  title="Ciudad"   style="font-size: 13px;"  rows ="0" cols= "25"></textarea>
							<span id="spanstrMensajeciudad" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_10">
						<td id="td_title-estado" class="titulocampo">
							<label class="form-label">Estado.(*)</label>
						</td>
						<td id="td_control-estado" align="left" class="controlcampo">
							<textarea id="form-estado" name="form-estado" class="form-control"  placeholder="Estado"  title="Estado"   style="font-size: 13px;"  rows ="0" cols= "25"></textarea>
							<span id="spanstrMensajeestado" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_11">
						<td id="td_title-codigo_postal" class="titulocampo">
							<label class="form-label">Codigo Postal.(*)</label>
						</td>
						<td id="td_control-codigo_postal" align="left" class="controlcampo">
							<input id="form-codigo_postal" name="form-codigo_postal" type="text" class="form-control"  placeholder="Codigo Postal"  title="Codigo Postal"    size="20"  maxlength="20"/>
							<span id="spanstrMensajecodigo_postal" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_12">
						<td id="td_title-codigo_pais" class="titulocampo">
							<label class="form-label">Codigo Pais.(*)</label>
						</td>
						<td id="td_control-codigo_pais" align="left" class="controlcampo">
							<input id="form-codigo_pais" name="form-codigo_pais" type="text" class="form-control"  placeholder="Codigo Pais"  title="Codigo Pais"    size="5"  maxlength="5"/>
							<span id="spanstrMensajecodigo_pais" class="mensajeerror"></span>
						</td>
					</tr>
				</table> <!-- tblElementospropiedad_empresa -->

				<!-- SECCION/OCULTOS -->
				<table id="tblCamposOcultospropiedad_empresa" class="elementos" style="display: table-row;">
					<caption class="busquedacabecera">
						<span>Campos Ocultos</span>
					</caption>
				</table> <!-- tblCamposOcultospropiedad_empresa -->

			</td></tr> <!-- trpropiedad_empresaElementos -->
			</table> <!-- tblpropiedad_empresaElementos -->
			</form> <!-- frmMantenimientopropiedad_empresa -->


			

				<form id="frmAccionesMantenimientopropiedad_empresa" name="frmAccionesMantenimientopropiedad_empresa">

			<?php if(propiedad_empresa_web::$STR_ES_BUSQUEDA=='false' ) {?>
			<table id="tblpropiedad_empresaAcciones" class="elementos" style="text-align: center">
		<tr id="trpropiedad_empresaAcciones" class="elementos" style="display:table-row">
			<td align="center">
				<a id="Acciones" ></a>

				<?php if(propiedad_empresa_web::$STR_ES_RELACIONES=='false' ) {?>
				<div align="right">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
				<?php } ?>

					<!-- SECCION/BOTONES -->
					<table id="tblAccionesMantenimientopropiedad_empresa" class="busqueda" style="width: 50%;text-align: left">

						<?php if(propiedad_empresa_web::$STR_ES_RELACIONES=='false' ) {?>
						<!--
						<caption class="busquedacabecera">
							<span>Acciones</span>
						</caption>
						-->
						<?php } ?>

						<tr id="trAccionesMantenimientopropiedad_empresaBasicos">
							<td id="tdbtnNuevopropiedad_empresa" style="visibility:visible">
								<div id="divNuevopropiedad_empresa" style="display:table-row">
									<input type="button" id="btnNuevopropiedad_empresa" name="btnNuevopropiedad_empresa" value="NUEVO" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnActualizarpropiedad_empresa" style="visibility:visible">
								<div id="divActualizarpropiedad_empresa" style="display:table-row">
									<input type="button" id="btnActualizarpropiedad_empresa" name="btnActualizarpropiedad_empresa" title="ACTUALIZAR Propiedades Empresa ACTUAL" value="Actualizar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnEliminarpropiedad_empresa" style="visibility:visible">
								<div id="divEliminarpropiedad_empresa" style="display:table-row">
									<input type="button" id="btnEliminarpropiedad_empresa" name="btnEliminarpropiedad_empresa" title="ELIMINAR Propiedades Empresa ACTUAL" value="Eliminar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnImprimirpropiedad_empresa" style="visibility:visible">
								<input type="button" id="btnImprimirpropiedad_empresa" name="btnImprimirpropiedad_empresa" title="IMPRIMIR PAGINA Propiedades Empresa ACTUAL" value="Imp. Datos" class="btn btn-primary"/>
							</td>
							<td id="tdbtnCancelarpropiedad_empresa" style="visibility:visible">
								<input type="button" id="btnCancelarpropiedad_empresa" name="btnCancelarpropiedad_empresa" title="CANCELAR Propiedades Empresa ACTUAL" value="Cancelar" class="btn btn-primary"/>
							</td>
						</tr>
						<tr id="trAccionesMantenimientopropiedad_empresaGuardar" style="display:none">
							<td id="tdbtnGuardarCambiospropiedad_empresa" colspan="4" align="center" style="visibility:visible">
								<div id="divGuardarCambiospropiedad_empresa" style="display:table-row">
									<input type="button" id="btnGuardarCambiosFormulariopropiedad_empresa" name="btnGuardarCambiosFormulariopropiedad_empresa" title="GUARDAR" value="GUADAR CAMBIOS" class="btn btn-primary"/>
								</div>
							</td>
						</tr>
					</table> <!-- tblAccionesMantenimientopropiedad_empresa -->
			</td>
		</tr> <!-- trpropiedad_empresaAcciones -->
		<?php if(propiedad_empresa_web::$STR_ES_RELACIONADO=='false' ) {?>
		<tr id="trpropiedad_empresaParametrosAcciones" class="impresion"  style="display:table-row">
			<td align="center">
				<!-- SECCION/POST -->
				<table id="tblpropiedad_empresaParametrosAcciones" style="text-align: center;border: 0px solid black;padding: 0px; border-spacing: 0px">
					<caption class="busquedacabecera" style="padding: 0px;caption-side: top;">
						<span>Acciones Extra/Post</span>
					</caption>
					<tr id="trpropiedad_empresaFilaParametrosAcciones">
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
				</table> <!-- tblpropiedad_empresaParametrosAcciones -->
			</td>
		</tr> <!-- trpropiedad_empresaParametrosAcciones -->
		<?php }?>
		<tr id="trpropiedad_empresaMensajes" class="mensajes">
			<td align="center">
				<a id="Mensajes"></a>
			</td>
		</tr> <!-- trpropiedad_empresaMensajes -->
			</table> <!-- tblpropiedad_empresaAcciones -->
			<?php } ?>
			</form> <!-- frmMantenimientopropiedad_empresa -->
			</div> <!-- divMantenimientopropiedad_empresaAjaxWebPart -->
		</td>
	</tr> <!-- trpropiedad_empresaElementosFormulario/super -->
		<?php if(propiedad_empresa_web::$STR_ES_RELACIONADO=='false' ) {?>

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
			
				import {propiedad_empresa_webcontrol,propiedad_empresa_webcontrol1} from './webroot/js/JavaScript/contabilidad/general/propiedad_empresa/js/webcontrol/propiedad_empresa_form_webcontrol.js?random=1';
				
				propiedad_empresa_webcontrol1.setpropiedad_empresa_constante(window.propiedad_empresa_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(propiedad_empresa_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

