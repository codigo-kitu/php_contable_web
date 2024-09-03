<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\cuentaspagar\categoria_proveedor\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Categorias Proveedor Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/cuentaspagar/categoria_proveedor/util/categoria_proveedor_carga.php');
	use com\bydan\contabilidad\cuentaspagar\categoria_proveedor\util\categoria_proveedor_carga;
	
	//include_once('com/bydan/contabilidad/cuentaspagar/categoria_proveedor/presentation/view/categoria_proveedor_web.php');
	//use com\bydan\contabilidad\cuentaspagar\categoria_proveedor\presentation\view\categoria_proveedor_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	categoria_proveedor_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	categoria_proveedor_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$categoria_proveedor_web1= new categoria_proveedor_web();	
	$categoria_proveedor_web1->cargarDatosGenerales();
	
	//$moduloActual=$categoria_proveedor_web1->moduloActual;
	//$usuarioActual=$categoria_proveedor_web1->usuarioActual;
	//$sessionBase=$categoria_proveedor_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$categoria_proveedor_web1->parametroGeneralUsuarioActual;
	
	
		
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
		
		
			<script type="module" src="webroot/js/JavaScript/contabilidad/cuentaspagar/categoria_proveedor/js/util/categoria_proveedor_form_funcion.js?random=1"></script>
						
		
		
		<?php 
			
		
			categoria_proveedor_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					categoria_proveedor_web::$GET_POST=$_GET;
				} else {
					categoria_proveedor_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			categoria_proveedor_web::$STR_NOMBRE_PAGINA = 'categoria_proveedor_form_view.php';
			categoria_proveedor_web::$BIT_ES_PAGINA_PRINCIPAL = 'false';
			categoria_proveedor_web::$BIT_ES_PAGINA_FORM = 'true';
				
			categoria_proveedor_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {categoria_proveedor_constante,categoria_proveedor_constante1} from './webroot/js/JavaScript/contabilidad/cuentaspagar/categoria_proveedor/js/util/categoria_proveedor_constante.js?random=1';
			import {categoria_proveedor_funcion,categoria_proveedor_funcion1} from './webroot/js/JavaScript/contabilidad/cuentaspagar/categoria_proveedor/js/util/categoria_proveedor_funcion.js?random=1';
			
			let categoria_proveedor_constante2 = new categoria_proveedor_constante();
			
			categoria_proveedor_constante2.STR_NOMBRE_PAGINA="<?php echo(categoria_proveedor_web::$STR_NOMBRE_PAGINA); ?>";
			categoria_proveedor_constante2.STR_TYPE_ON_LOADcategoria_proveedor="<?php echo(categoria_proveedor_web::$STR_TYPE_ONLOAD); ?>";
			categoria_proveedor_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(categoria_proveedor_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			categoria_proveedor_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(categoria_proveedor_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			categoria_proveedor_constante2.STR_ACTION="<?php echo(categoria_proveedor_web::$STR_ACTION); ?>";
			categoria_proveedor_constante2.STR_ES_POPUP="<?php echo(categoria_proveedor_web::$STR_ES_POPUP); ?>";
			categoria_proveedor_constante2.STR_ES_BUSQUEDA="<?php echo(categoria_proveedor_web::$STR_ES_BUSQUEDA); ?>";
			categoria_proveedor_constante2.STR_FUNCION_JS="<?php echo(categoria_proveedor_web::$STR_FUNCION_JS); ?>";
			categoria_proveedor_constante2.BIG_ID_ACTUAL="<?php echo(categoria_proveedor_web::$BIG_ID_ACTUAL); ?>";
			categoria_proveedor_constante2.BIG_ID_OPCION="<?php echo(categoria_proveedor_web::$BIG_ID_OPCION); ?>";
			categoria_proveedor_constante2.STR_OBJETO_JS="<?php echo(categoria_proveedor_web::$STR_OBJETO_JS); ?>";
			categoria_proveedor_constante2.STR_ES_RELACIONES="<?php echo(categoria_proveedor_web::$STR_ES_RELACIONES); ?>";
			categoria_proveedor_constante2.STR_ES_RELACIONADO="<?php echo(categoria_proveedor_web::$STR_ES_RELACIONADO); ?>";
			categoria_proveedor_constante2.STR_ES_SUB_PAGINA="<?php echo(categoria_proveedor_web::$STR_ES_SUB_PAGINA); ?>";
			categoria_proveedor_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(categoria_proveedor_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			categoria_proveedor_constante2.BIT_ES_PAGINA_FORM=<?php echo(categoria_proveedor_web::$BIT_ES_PAGINA_FORM); ?>;
			categoria_proveedor_constante2.STR_SUFIJO="<?php echo(categoria_proveedor_web::$STR_SUF); ?>";//categoria_proveedor
			categoria_proveedor_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(categoria_proveedor_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//categoria_proveedor
			
			categoria_proveedor_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(categoria_proveedor_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			categoria_proveedor_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($categoria_proveedor_web1->moduloActual->getnombre()); ?>";
			categoria_proveedor_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(categoria_proveedor_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			categoria_proveedor_constante2.BIT_ES_LOAD_NORMAL=true;
			/*categoria_proveedor_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			categoria_proveedor_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.categoria_proveedor_constante2 = categoria_proveedor_constante2;
			
		</script>
		
		<?php if(categoria_proveedor_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.categoria_proveedor_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.categoria_proveedor_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="categoria_proveedorActual" ></a>
	
	<div id="divResumencategoria_proveedorActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(categoria_proveedor_web::$STR_ES_RELACIONADO=='false') {?>
		
		<div id="header" >
		
			<div id="banner">
				<span id="spanTituloBanner" class="titulobanner"></span>
			</div> <!-- banner -->
					
			<div id="subheader" class="links">  
			
						
			</div> <!-- sub-header -->
			
			
		</div> <!-- header -->
		
		<?php } ?>
		
		<div id="main">
		

			<?php if(categoria_proveedor_web::$STR_ES_RELACIONADO=='false') {?>
			
			
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(categoria_proveedor_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(categoria_proveedor_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divcategoria_proveedorPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblcategoria_proveedorPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmcategoria_proveedorAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btncategoria_proveedorAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="categoria_proveedor_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btncategoria_proveedorAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmcategoria_proveedorAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblcategoria_proveedorPopupAjaxWebPart -->
		</div> <!-- divcategoria_proveedorPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->		
		
		
		
			
<tr id="trcategoria_proveedorElementosFormulario">
	<td>
		<div id="divMantenimientocategoria_proveedorAjaxWebPart" title="CATEGORIAS PROVEEDOR" style="height: 90%;width: 90%;position: relative;top: 30px;left: 30px;">
			<form id="frmMantenimientocategoria_proveedor" name="frmMantenimientocategoria_proveedor">

			</br>

			<?php if(categoria_proveedor_web::$STR_ES_RELACIONES=='false' ) {?>
			</br>
			<?php } ?>

			<!-- SECCION/TOOLBAR -->
			<table id="tblcategoria_proveedorToolBarFormularioExterior" style="width: 65%">
				<tr style="display:table-row">
					<td align="center">

						<table id="tblcategoria_proveedorToolBarFormulario" style="text-align: center"  style="display:table-row">
							<tr>
								<td id="tdcategoria_proveedorActualizarToolBar" style="visibility:visible">
									<img id="imgActualizarToolBarcategoria_proveedor" name="imgActualizarToolBarcategoria_proveedor" title="ACTUALIZAR Categorias Proveedor ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/actualizar.gif" width="25" height="25"/>
								</td>
								<td id="tdcategoria_proveedorEliminarToolBar" style="visibility:visible">
									<img id="imgEliminarToolBarcategoria_proveedor" name="imgEliminarToolBarcategoria_proveedor" title="ELIMINAR Categorias Proveedor ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/eliminar.gif" width="25" height="25"/>
								</td>
								<td id="tdcategoria_proveedorCancelarToolBar" style="visibility:visible">
									<img id="imgCancelarToolBarcategoria_proveedor" name="imgCancelarToolBarcategoria_proveedor" title="CANCELAR Categorias Proveedor ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/cancelar.gif" width="25" height="25"/>
								</td>
								<td id="tdcategoria_proveedorRelacionesToolBar" style="display:table-row">
									<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/xexpand.png" width="25" height="25" onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('tblCamposOcultoscategoria_proveedor',this,'../')"/>
								</td>
							</tr>
						</table> <!-- tblcategoria_proveedorToolBarFormulario -->

					</td>
				</tr>
			</table> <!-- tblcategoria_proveedorToolBarFormularioExterior -->

			<table id="tblcategoria_proveedorElementos">
			<tr id="trcategoria_proveedorElementos" class="elementos" style="display:table-row">
			<td align="center">

			<a id="Campos"></a>

				<?php if(categoria_proveedor_web::$STR_ES_RELACIONES=='false' ) {?>
				<div id="divFlechaArribaElementos" align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
					<span></span>
				</div>
				<?php } ?>

				<!-- SECCION/FORMULARIO -->
				<table id="tblElementoscategoria_proveedor" class="elementos" style="width: 300px; padding: 0px; border-spacing: 0px; border-collapse: collapse; text-align: center;">
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
						<td id="td_title-nombre" class="titulocampo">
							<label class="form-label">Nombre.(*)</label>
						</td>
						<td id="td_control-nombre" align="left" class="controlcampo">
							<input id="form-nombre" name="form-nombre" type="text" class="form-control"  placeholder="Nombre"  title="Nombre"    size="20"  maxlength="35"/>
							<span id="spanstrMensajenombre" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_5">
						<td id="td_title-predeterminado" class="titulocampo">
							<label class="form-label">Predeterminado.(*)</label>
						</td>
						<td id="td_control-predeterminado" align="left" class="controlcampo">
							<input id="form-predeterminado" name="form-predeterminado" type="text" class="form-control"  placeholder="Predeterminado"  title="Predeterminado"    maxlength="10" size="10" >
							<span id="spanstrMensajepredeterminado" class="mensajeerror"></span>
						</td>
					</tr>
				</table> <!-- tblElementoscategoria_proveedor -->

				<!-- SECCION/OCULTOS -->
				<table id="tblCamposOcultoscategoria_proveedor" class="elementos" style="display: table-row;">
					<caption class="busquedacabecera">
						<span>Campos Ocultos</span>
					</caption>
				</table> <!-- tblCamposOcultoscategoria_proveedor -->

			</td></tr> <!-- trcategoria_proveedorElementos -->
			</table> <!-- tblcategoria_proveedorElementos -->
			</form> <!-- frmMantenimientocategoria_proveedor -->


			

				<form id="frmAccionesMantenimientocategoria_proveedor" name="frmAccionesMantenimientocategoria_proveedor">

			<?php if(categoria_proveedor_web::$STR_ES_BUSQUEDA=='false' ) {?>
			<table id="tblcategoria_proveedorAcciones" class="elementos" style="text-align: center">
		<tr id="trcategoria_proveedorAcciones" class="elementos" style="display:table-row">
			<td align="center">
				<a id="Acciones" ></a>

				<?php if(categoria_proveedor_web::$STR_ES_RELACIONES=='false' ) {?>
				<div align="right">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
				<?php } ?>

					<!-- SECCION/BOTONES -->
					<table id="tblAccionesMantenimientocategoria_proveedor" class="busqueda" style="width: 50%;text-align: center">

						<?php if(categoria_proveedor_web::$STR_ES_RELACIONES=='false' ) {?>
						<!--
						<caption class="busquedacabecera">
							<span>Acciones</span>
						</caption>
						-->
						<?php } ?>

						<tr id="trAccionesMantenimientocategoria_proveedorBasicos">
							<td id="tdbtnNuevocategoria_proveedor" style="visibility:visible">
								<div id="divNuevocategoria_proveedor" style="display:table-row">
									<input type="button" id="btnNuevocategoria_proveedor" name="btnNuevocategoria_proveedor" value="NUEVO" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnActualizarcategoria_proveedor" style="visibility:visible">
								<div id="divActualizarcategoria_proveedor" style="display:table-row">
									<input type="button" id="btnActualizarcategoria_proveedor" name="btnActualizarcategoria_proveedor" title="ACTUALIZAR Categorias Proveedor ACTUAL" value="Actualizar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnEliminarcategoria_proveedor" style="visibility:visible">
								<div id="divEliminarcategoria_proveedor" style="display:table-row">
									<input type="button" id="btnEliminarcategoria_proveedor" name="btnEliminarcategoria_proveedor" title="ELIMINAR Categorias Proveedor ACTUAL" value="Eliminar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnImprimircategoria_proveedor" style="visibility:visible">
								<input type="button" id="btnImprimircategoria_proveedor" name="btnImprimircategoria_proveedor" title="IMPRIMIR PAGINA Categorias Proveedor ACTUAL" value="Imp. Datos" class="btn btn-primary"/>
							</td>
							<td id="tdbtnCancelarcategoria_proveedor" style="visibility:visible">
								<input type="button" id="btnCancelarcategoria_proveedor" name="btnCancelarcategoria_proveedor" title="CANCELAR Categorias Proveedor ACTUAL" value="Cancelar" class="btn btn-primary"/>
							</td>
						</tr>
						<tr id="trAccionesMantenimientocategoria_proveedorGuardar" style="display:none">
							<td id="tdbtnGuardarCambioscategoria_proveedor" colspan="4" align="center" style="visibility:visible">
								<div id="divGuardarCambioscategoria_proveedor" style="display:table-row">
									<input type="button" id="btnGuardarCambiosFormulariocategoria_proveedor" name="btnGuardarCambiosFormulariocategoria_proveedor" title="GUARDAR" value="GUADAR CAMBIOS" class="btn btn-primary"/>
								</div>
							</td>
						</tr>
					</table> <!-- tblAccionesMantenimientocategoria_proveedor -->
			</td>
		</tr> <!-- trcategoria_proveedorAcciones -->
		<?php if(categoria_proveedor_web::$STR_ES_RELACIONADO=='false' ) {?>
		<tr id="trcategoria_proveedorParametrosAcciones" class="impresion"  style="display:table-row">
			<td align="center">
				<!-- SECCION/POST -->
				<table id="tblcategoria_proveedorParametrosAcciones" style="text-align: center;border: 0px solid black;padding: 0px; border-spacing: 0px">
					<caption class="busquedacabecera" style="padding: 0px;caption-side: top;">
						<span>Acciones Extra/Post</span>
					</caption>
					<tr id="trcategoria_proveedorFilaParametrosAcciones">
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
				</table> <!-- tblcategoria_proveedorParametrosAcciones -->
			</td>
		</tr> <!-- trcategoria_proveedorParametrosAcciones -->
		<?php }?>
		<tr id="trcategoria_proveedorMensajes" class="mensajes">
			<td align="center">
				<a id="Mensajes"></a>
			</td>
		</tr> <!-- trcategoria_proveedorMensajes -->
			</table> <!-- tblcategoria_proveedorAcciones -->
			<?php } ?>
			</form> <!-- frmMantenimientocategoria_proveedor -->
			</div> <!-- divMantenimientocategoria_proveedorAjaxWebPart -->
		</td>
	</tr> <!-- trcategoria_proveedorElementosFormulario/super -->
		<?php if(categoria_proveedor_web::$STR_ES_RELACIONADO=='false' ) {?>

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
			
				import {categoria_proveedor_webcontrol,categoria_proveedor_webcontrol1} from './webroot/js/JavaScript/contabilidad/cuentaspagar/categoria_proveedor/js/webcontrol/categoria_proveedor_form_webcontrol.js?random=1';
				
				categoria_proveedor_webcontrol1.setcategoria_proveedor_constante(window.categoria_proveedor_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(categoria_proveedor_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

