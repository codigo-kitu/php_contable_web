<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\cuentaspagar\documento_proveedor\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Documentos Proveedores Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/cuentaspagar/documento_proveedor/util/documento_proveedor_carga.php');
	use com\bydan\contabilidad\cuentaspagar\documento_proveedor\util\documento_proveedor_carga;
	
	//include_once('com/bydan/contabilidad/cuentaspagar/documento_proveedor/presentation/view/documento_proveedor_web.php');
	//use com\bydan\contabilidad\cuentaspagar\documento_proveedor\presentation\view\documento_proveedor_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	documento_proveedor_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	documento_proveedor_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$documento_proveedor_web1= new documento_proveedor_web();	
	$documento_proveedor_web1->cargarDatosGenerales();
	
	//$moduloActual=$documento_proveedor_web1->moduloActual;
	//$usuarioActual=$documento_proveedor_web1->usuarioActual;
	//$sessionBase=$documento_proveedor_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$documento_proveedor_web1->parametroGeneralUsuarioActual;
	
	
		
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
		
		
			<script type="module" src="webroot/js/JavaScript/contabilidad/cuentaspagar/documento_proveedor/js/util/documento_proveedor_form_funcion.js?random=1"></script>
						
		
		
		<?php 
			
		
			documento_proveedor_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					documento_proveedor_web::$GET_POST=$_GET;
				} else {
					documento_proveedor_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			documento_proveedor_web::$STR_NOMBRE_PAGINA = 'documento_proveedor_form_view.php';
			documento_proveedor_web::$BIT_ES_PAGINA_PRINCIPAL = 'false';
			documento_proveedor_web::$BIT_ES_PAGINA_FORM = 'true';
				
			documento_proveedor_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {documento_proveedor_constante,documento_proveedor_constante1} from './webroot/js/JavaScript/contabilidad/cuentaspagar/documento_proveedor/js/util/documento_proveedor_constante.js?random=1';
			import {documento_proveedor_funcion,documento_proveedor_funcion1} from './webroot/js/JavaScript/contabilidad/cuentaspagar/documento_proveedor/js/util/documento_proveedor_funcion.js?random=1';
			
			let documento_proveedor_constante2 = new documento_proveedor_constante();
			
			documento_proveedor_constante2.STR_NOMBRE_PAGINA="<?php echo(documento_proveedor_web::$STR_NOMBRE_PAGINA); ?>";
			documento_proveedor_constante2.STR_TYPE_ON_LOADdocumento_proveedor="<?php echo(documento_proveedor_web::$STR_TYPE_ONLOAD); ?>";
			documento_proveedor_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(documento_proveedor_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			documento_proveedor_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(documento_proveedor_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			documento_proveedor_constante2.STR_ACTION="<?php echo(documento_proveedor_web::$STR_ACTION); ?>";
			documento_proveedor_constante2.STR_ES_POPUP="<?php echo(documento_proveedor_web::$STR_ES_POPUP); ?>";
			documento_proveedor_constante2.STR_ES_BUSQUEDA="<?php echo(documento_proveedor_web::$STR_ES_BUSQUEDA); ?>";
			documento_proveedor_constante2.STR_FUNCION_JS="<?php echo(documento_proveedor_web::$STR_FUNCION_JS); ?>";
			documento_proveedor_constante2.BIG_ID_ACTUAL="<?php echo(documento_proveedor_web::$BIG_ID_ACTUAL); ?>";
			documento_proveedor_constante2.BIG_ID_OPCION="<?php echo(documento_proveedor_web::$BIG_ID_OPCION); ?>";
			documento_proveedor_constante2.STR_OBJETO_JS="<?php echo(documento_proveedor_web::$STR_OBJETO_JS); ?>";
			documento_proveedor_constante2.STR_ES_RELACIONES="<?php echo(documento_proveedor_web::$STR_ES_RELACIONES); ?>";
			documento_proveedor_constante2.STR_ES_RELACIONADO="<?php echo(documento_proveedor_web::$STR_ES_RELACIONADO); ?>";
			documento_proveedor_constante2.STR_ES_SUB_PAGINA="<?php echo(documento_proveedor_web::$STR_ES_SUB_PAGINA); ?>";
			documento_proveedor_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(documento_proveedor_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			documento_proveedor_constante2.BIT_ES_PAGINA_FORM=<?php echo(documento_proveedor_web::$BIT_ES_PAGINA_FORM); ?>;
			documento_proveedor_constante2.STR_SUFIJO="<?php echo(documento_proveedor_web::$STR_SUF); ?>";//documento_proveedor
			documento_proveedor_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(documento_proveedor_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//documento_proveedor
			
			documento_proveedor_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(documento_proveedor_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			documento_proveedor_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($documento_proveedor_web1->moduloActual->getnombre()); ?>";
			documento_proveedor_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(documento_proveedor_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			documento_proveedor_constante2.BIT_ES_LOAD_NORMAL=true;
			/*documento_proveedor_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			documento_proveedor_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.documento_proveedor_constante2 = documento_proveedor_constante2;
			
		</script>
		
		<?php if(documento_proveedor_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.documento_proveedor_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.documento_proveedor_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="documento_proveedorActual" ></a>
	
	<div id="divResumendocumento_proveedorActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(documento_proveedor_web::$STR_ES_RELACIONADO=='false') {?>
		
		<div id="header" >
		
			<div id="banner">
				<span id="spanTituloBanner" class="titulobanner"></span>
			</div> <!-- banner -->
					
			<div id="subheader" class="links">  
			
						
			</div> <!-- sub-header -->
			
			
		</div> <!-- header -->
		
		<?php } ?>
		
		<div id="main">
		

			<?php if(documento_proveedor_web::$STR_ES_RELACIONADO=='false') {?>
			
			
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(documento_proveedor_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(documento_proveedor_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divdocumento_proveedorPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tbldocumento_proveedorPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmdocumento_proveedorAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btndocumento_proveedorAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="documento_proveedor_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btndocumento_proveedorAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmdocumento_proveedorAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tbldocumento_proveedorPopupAjaxWebPart -->
		</div> <!-- divdocumento_proveedorPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->		
		
		
		
			
<tr id="trdocumento_proveedorElementosFormulario">
	<td>
		<div id="divMantenimientodocumento_proveedorAjaxWebPart" title="DOCUMENTOS PROVEEDORES" style="height: 90%;width: 90%;position: relative;top: 30px;left: 30px;">
			<form id="frmMantenimientodocumento_proveedor" name="frmMantenimientodocumento_proveedor">

			</br>

			<?php if(documento_proveedor_web::$STR_ES_RELACIONES=='false' ) {?>
			</br>
			<?php } ?>

			<!-- SECCION/TOOLBAR -->
			<table id="tbldocumento_proveedorToolBarFormularioExterior" style="width: 65%">
				<tr style="display:table-row">
					<td align="center">

						<table id="tbldocumento_proveedorToolBarFormulario" style="text-align: center"  style="display:table-row">
							<tr>
								<td id="tddocumento_proveedorActualizarToolBar" style="visibility:visible">
									<img id="imgActualizarToolBardocumento_proveedor" name="imgActualizarToolBardocumento_proveedor" title="ACTUALIZAR Documentos Proveedores ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/actualizar.gif" width="25" height="25"/>
								</td>
								<td id="tddocumento_proveedorEliminarToolBar" style="visibility:visible">
									<img id="imgEliminarToolBardocumento_proveedor" name="imgEliminarToolBardocumento_proveedor" title="ELIMINAR Documentos Proveedores ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/eliminar.gif" width="25" height="25"/>
								</td>
								<td id="tddocumento_proveedorCancelarToolBar" style="visibility:visible">
									<img id="imgCancelarToolBardocumento_proveedor" name="imgCancelarToolBardocumento_proveedor" title="CANCELAR Documentos Proveedores ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/cancelar.gif" width="25" height="25"/>
								</td>
								<td id="tddocumento_proveedorRelacionesToolBar" style="display:table-row">
									<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/xexpand.png" width="25" height="25" onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('tblCamposOcultosdocumento_proveedor',this,'../')"/>
								</td>
							</tr>
						</table> <!-- tbldocumento_proveedorToolBarFormulario -->

					</td>
				</tr>
			</table> <!-- tbldocumento_proveedorToolBarFormularioExterior -->

			<table id="tbldocumento_proveedorElementos">
			<tr id="trdocumento_proveedorElementos" class="elementos" style="display:table-row">
			<td align="center">

			<a id="Campos"></a>

				<?php if(documento_proveedor_web::$STR_ES_RELACIONES=='false' ) {?>
				<div id="divFlechaArribaElementos" align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
					<span></span>
				</div>
				<?php } ?>

				<!-- SECCION/FORMULARIO -->
				<table id="tblElementosdocumento_proveedor" class="elementos" style="width: 300px; padding: 0px; border-spacing: 0px; border-collapse: collapse; text-align: center;">
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
						<td id="td_title-id_proveedor" class="titulocampo">
							<label class="form-label">Proveedor.(*)</label>
						</td>
						<td id="td_control-id_proveedor" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_proveedor" name="form-id_proveedor" title="Proveedor" ></select></td>
									<td><a><img id="form-id_proveedor_img" name="form-id_proveedor_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_proveedor_img_busqueda" name="form-id_proveedor_img_busqueda" title="Buscar Proveedor" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_proveedor" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_5">
						<td id="td_title-documento" class="titulocampo">
							<label class="form-label">Documento.(*)</label>
						</td>
						<td id="td_control-documento" align="left" class="controlcampo">
							<textarea id="form-documento" name="form-documento" class="form-control"  placeholder="Documento"  title="Documento"   style="font-size: 13px;"  rows ="0" cols= "25"></textarea>
							<span id="spanstrMensajedocumento" class="mensajeerror"></span>
						</td>
					</tr>
				</table> <!-- tblElementosdocumento_proveedor -->

				<!-- SECCION/OCULTOS -->
				<table id="tblCamposOcultosdocumento_proveedor" class="elementos" style="display: table-row;">
					<caption class="busquedacabecera">
						<span>Campos Ocultos</span>
					</caption>
				</table> <!-- tblCamposOcultosdocumento_proveedor -->

			</td></tr> <!-- trdocumento_proveedorElementos -->
			</table> <!-- tbldocumento_proveedorElementos -->
			</form> <!-- frmMantenimientodocumento_proveedor -->


			

				<form id="frmAccionesMantenimientodocumento_proveedor" name="frmAccionesMantenimientodocumento_proveedor">

			<?php if(documento_proveedor_web::$STR_ES_BUSQUEDA=='false' ) {?>
			<table id="tbldocumento_proveedorAcciones" class="elementos" style="text-align: center">
		<tr id="trdocumento_proveedorAcciones" class="elementos" style="display:table-row">
			<td align="center">
				<a id="Acciones" ></a>

				<?php if(documento_proveedor_web::$STR_ES_RELACIONES=='false' ) {?>
				<div align="right">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
				<?php } ?>

					<!-- SECCION/BOTONES -->
					<table id="tblAccionesMantenimientodocumento_proveedor" class="busqueda" style="width: 50%;text-align: center">

						<?php if(documento_proveedor_web::$STR_ES_RELACIONES=='false' ) {?>
						<!--
						<caption class="busquedacabecera">
							<span>Acciones</span>
						</caption>
						-->
						<?php } ?>

						<tr id="trAccionesMantenimientodocumento_proveedorBasicos">
							<td id="tdbtnNuevodocumento_proveedor" style="visibility:visible">
								<div id="divNuevodocumento_proveedor" style="display:table-row">
									<input type="button" id="btnNuevodocumento_proveedor" name="btnNuevodocumento_proveedor" value="NUEVO" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnActualizardocumento_proveedor" style="visibility:visible">
								<div id="divActualizardocumento_proveedor" style="display:table-row">
									<input type="button" id="btnActualizardocumento_proveedor" name="btnActualizardocumento_proveedor" title="ACTUALIZAR Documentos Proveedores ACTUAL" value="Actualizar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnEliminardocumento_proveedor" style="visibility:visible">
								<div id="divEliminardocumento_proveedor" style="display:table-row">
									<input type="button" id="btnEliminardocumento_proveedor" name="btnEliminardocumento_proveedor" title="ELIMINAR Documentos Proveedores ACTUAL" value="Eliminar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnImprimirdocumento_proveedor" style="visibility:visible">
								<input type="button" id="btnImprimirdocumento_proveedor" name="btnImprimirdocumento_proveedor" title="IMPRIMIR PAGINA Documentos Proveedores ACTUAL" value="Imp. Datos" class="btn btn-primary"/>
							</td>
							<td id="tdbtnCancelardocumento_proveedor" style="visibility:visible">
								<input type="button" id="btnCancelardocumento_proveedor" name="btnCancelardocumento_proveedor" title="CANCELAR Documentos Proveedores ACTUAL" value="Cancelar" class="btn btn-primary"/>
							</td>
						</tr>
						<tr id="trAccionesMantenimientodocumento_proveedorGuardar" style="display:none">
							<td id="tdbtnGuardarCambiosdocumento_proveedor" colspan="4" align="center" style="visibility:visible">
								<div id="divGuardarCambiosdocumento_proveedor" style="display:table-row">
									<input type="button" id="btnGuardarCambiosFormulariodocumento_proveedor" name="btnGuardarCambiosFormulariodocumento_proveedor" title="GUARDAR" value="GUADAR CAMBIOS" class="btn btn-primary"/>
								</div>
							</td>
						</tr>
					</table> <!-- tblAccionesMantenimientodocumento_proveedor -->
			</td>
		</tr> <!-- trdocumento_proveedorAcciones -->
		<?php if(documento_proveedor_web::$STR_ES_RELACIONADO=='false' ) {?>
		<tr id="trdocumento_proveedorParametrosAcciones" class="impresion"  style="display:table-row">
			<td align="center">
				<!-- SECCION/POST -->
				<table id="tbldocumento_proveedorParametrosAcciones" style="text-align: center;border: 0px solid black;padding: 0px; border-spacing: 0px">
					<caption class="busquedacabecera" style="padding: 0px;caption-side: top;">
						<span>Acciones Extra/Post</span>
					</caption>
					<tr id="trdocumento_proveedorFilaParametrosAcciones">
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
				</table> <!-- tbldocumento_proveedorParametrosAcciones -->
			</td>
		</tr> <!-- trdocumento_proveedorParametrosAcciones -->
		<?php }?>
		<tr id="trdocumento_proveedorMensajes" class="mensajes">
			<td align="center">
				<a id="Mensajes"></a>
			</td>
		</tr> <!-- trdocumento_proveedorMensajes -->
			</table> <!-- tbldocumento_proveedorAcciones -->
			<?php } ?>
			</form> <!-- frmMantenimientodocumento_proveedor -->
			</div> <!-- divMantenimientodocumento_proveedorAjaxWebPart -->
		</td>
	</tr> <!-- trdocumento_proveedorElementosFormulario/super -->
		<?php if(documento_proveedor_web::$STR_ES_RELACIONADO=='false' ) {?>

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
			
				import {documento_proveedor_webcontrol,documento_proveedor_webcontrol1} from './webroot/js/JavaScript/contabilidad/cuentaspagar/documento_proveedor/js/webcontrol/documento_proveedor_form_webcontrol.js?random=1';
				
				documento_proveedor_webcontrol1.setdocumento_proveedor_constante(window.documento_proveedor_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(documento_proveedor_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

