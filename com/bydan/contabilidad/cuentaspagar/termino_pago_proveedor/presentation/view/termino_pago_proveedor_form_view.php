<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Terminos Pago Proveedores Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/cuentaspagar/termino_pago_proveedor/util/termino_pago_proveedor_carga.php');
	use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\util\termino_pago_proveedor_carga;
	
	//include_once('com/bydan/contabilidad/cuentaspagar/termino_pago_proveedor/presentation/view/termino_pago_proveedor_web.php');
	//use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\presentation\view\termino_pago_proveedor_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	termino_pago_proveedor_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	termino_pago_proveedor_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$termino_pago_proveedor_web1= new termino_pago_proveedor_web();	
	$termino_pago_proveedor_web1->cargarDatosGenerales();
	
	//$moduloActual=$termino_pago_proveedor_web1->moduloActual;
	//$usuarioActual=$termino_pago_proveedor_web1->usuarioActual;
	//$sessionBase=$termino_pago_proveedor_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$termino_pago_proveedor_web1->parametroGeneralUsuarioActual;
	
	
		
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
		
		
			<script type="module" src="webroot/js/JavaScript/contabilidad/cuentaspagar/termino_pago_proveedor/js/util/termino_pago_proveedor_form_funcion.js?random=1"></script>
						
		
		
		<?php 
			
		
			termino_pago_proveedor_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					termino_pago_proveedor_web::$GET_POST=$_GET;
				} else {
					termino_pago_proveedor_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			termino_pago_proveedor_web::$STR_NOMBRE_PAGINA = 'termino_pago_proveedor_form_view.php';
			termino_pago_proveedor_web::$BIT_ES_PAGINA_PRINCIPAL = 'false';
			termino_pago_proveedor_web::$BIT_ES_PAGINA_FORM = 'true';
				
			termino_pago_proveedor_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {termino_pago_proveedor_constante,termino_pago_proveedor_constante1} from './webroot/js/JavaScript/contabilidad/cuentaspagar/termino_pago_proveedor/js/util/termino_pago_proveedor_constante.js?random=1';
			import {termino_pago_proveedor_funcion,termino_pago_proveedor_funcion1} from './webroot/js/JavaScript/contabilidad/cuentaspagar/termino_pago_proveedor/js/util/termino_pago_proveedor_funcion.js?random=1';
			
			let termino_pago_proveedor_constante2 = new termino_pago_proveedor_constante();
			
			termino_pago_proveedor_constante2.STR_NOMBRE_PAGINA="<?php echo(termino_pago_proveedor_web::$STR_NOMBRE_PAGINA); ?>";
			termino_pago_proveedor_constante2.STR_TYPE_ON_LOADtermino_pago_proveedor="<?php echo(termino_pago_proveedor_web::$STR_TYPE_ONLOAD); ?>";
			termino_pago_proveedor_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(termino_pago_proveedor_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			termino_pago_proveedor_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(termino_pago_proveedor_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			termino_pago_proveedor_constante2.STR_ACTION="<?php echo(termino_pago_proveedor_web::$STR_ACTION); ?>";
			termino_pago_proveedor_constante2.STR_ES_POPUP="<?php echo(termino_pago_proveedor_web::$STR_ES_POPUP); ?>";
			termino_pago_proveedor_constante2.STR_ES_BUSQUEDA="<?php echo(termino_pago_proveedor_web::$STR_ES_BUSQUEDA); ?>";
			termino_pago_proveedor_constante2.STR_FUNCION_JS="<?php echo(termino_pago_proveedor_web::$STR_FUNCION_JS); ?>";
			termino_pago_proveedor_constante2.BIG_ID_ACTUAL="<?php echo(termino_pago_proveedor_web::$BIG_ID_ACTUAL); ?>";
			termino_pago_proveedor_constante2.BIG_ID_OPCION="<?php echo(termino_pago_proveedor_web::$BIG_ID_OPCION); ?>";
			termino_pago_proveedor_constante2.STR_OBJETO_JS="<?php echo(termino_pago_proveedor_web::$STR_OBJETO_JS); ?>";
			termino_pago_proveedor_constante2.STR_ES_RELACIONES="<?php echo(termino_pago_proveedor_web::$STR_ES_RELACIONES); ?>";
			termino_pago_proveedor_constante2.STR_ES_RELACIONADO="<?php echo(termino_pago_proveedor_web::$STR_ES_RELACIONADO); ?>";
			termino_pago_proveedor_constante2.STR_ES_SUB_PAGINA="<?php echo(termino_pago_proveedor_web::$STR_ES_SUB_PAGINA); ?>";
			termino_pago_proveedor_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(termino_pago_proveedor_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			termino_pago_proveedor_constante2.BIT_ES_PAGINA_FORM=<?php echo(termino_pago_proveedor_web::$BIT_ES_PAGINA_FORM); ?>;
			termino_pago_proveedor_constante2.STR_SUFIJO="<?php echo(termino_pago_proveedor_web::$STR_SUF); ?>";//termino_pago_proveedor
			termino_pago_proveedor_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(termino_pago_proveedor_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//termino_pago_proveedor
			
			termino_pago_proveedor_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(termino_pago_proveedor_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			termino_pago_proveedor_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($termino_pago_proveedor_web1->moduloActual->getnombre()); ?>";
			termino_pago_proveedor_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(termino_pago_proveedor_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			termino_pago_proveedor_constante2.BIT_ES_LOAD_NORMAL=true;
			/*termino_pago_proveedor_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			termino_pago_proveedor_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.termino_pago_proveedor_constante2 = termino_pago_proveedor_constante2;
			
		</script>
		
		<?php if(termino_pago_proveedor_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.termino_pago_proveedor_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.termino_pago_proveedor_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="termino_pago_proveedorActual" ></a>
	
	<div id="divResumentermino_pago_proveedorActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(termino_pago_proveedor_web::$STR_ES_RELACIONADO=='false') {?>
		
		<div id="header" >
		
			<div id="banner">
				<span id="spanTituloBanner" class="titulobanner"></span>
			</div> <!-- banner -->
					
			<div id="subheader" class="links">  
			
						
			</div> <!-- sub-header -->
			
			
		</div> <!-- header -->
		
		<?php } ?>
		
		<div id="main">
		

			<?php if(termino_pago_proveedor_web::$STR_ES_RELACIONADO=='false') {?>
			
			
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(termino_pago_proveedor_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(termino_pago_proveedor_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divtermino_pago_proveedorPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tbltermino_pago_proveedorPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmtermino_pago_proveedorAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btntermino_pago_proveedorAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="termino_pago_proveedor_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btntermino_pago_proveedorAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmtermino_pago_proveedorAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tbltermino_pago_proveedorPopupAjaxWebPart -->
		</div> <!-- divtermino_pago_proveedorPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->		
		
		
		
			
<tr id="trtermino_pago_proveedorElementosFormulario">
	<td>
		<div id="divMantenimientotermino_pago_proveedorAjaxWebPart" title="TERMINOS PAGO PROVEEDORES" style="height: 90%;width: 90%;position: relative;top: 30px;left: 30px;">
			<form id="frmMantenimientotermino_pago_proveedor" name="frmMantenimientotermino_pago_proveedor">

			</br>

			<?php if(termino_pago_proveedor_web::$STR_ES_RELACIONES=='false' ) {?>
			</br>
			<?php } ?>

			<!-- SECCION/TOOLBAR -->
			<table id="tbltermino_pago_proveedorToolBarFormularioExterior" style="width: 65%">
				<tr style="display:table-row">
					<td align="center">

						<table id="tbltermino_pago_proveedorToolBarFormulario" style="text-align: center"  style="display:table-row">
							<tr>
								<td id="tdtermino_pago_proveedorActualizarToolBar" style="visibility:visible">
									<img id="imgActualizarToolBartermino_pago_proveedor" name="imgActualizarToolBartermino_pago_proveedor" title="ACTUALIZAR Terminos Pago Proveedores ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/actualizar.gif" width="25" height="25"/>
								</td>
								<td id="tdtermino_pago_proveedorEliminarToolBar" style="visibility:visible">
									<img id="imgEliminarToolBartermino_pago_proveedor" name="imgEliminarToolBartermino_pago_proveedor" title="ELIMINAR Terminos Pago Proveedores ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/eliminar.gif" width="25" height="25"/>
								</td>
								<td id="tdtermino_pago_proveedorCancelarToolBar" style="visibility:visible">
									<img id="imgCancelarToolBartermino_pago_proveedor" name="imgCancelarToolBartermino_pago_proveedor" title="CANCELAR Terminos Pago Proveedores ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/cancelar.gif" width="25" height="25"/>
								</td>
								<td id="tdtermino_pago_proveedorRelacionesToolBar" style="display:table-row">
									<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/xexpand.png" width="25" height="25" onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('tblCamposOcultostermino_pago_proveedor',this,'../')"/>
								</td>
							</tr>
						</table> <!-- tbltermino_pago_proveedorToolBarFormulario -->

					</td>
				</tr>
			</table> <!-- tbltermino_pago_proveedorToolBarFormularioExterior -->

			<table id="tbltermino_pago_proveedorElementos">
			<tr id="trtermino_pago_proveedorElementos" class="elementos" style="display:table-row">
			<td align="center">

			<a id="Campos"></a>

				<?php if(termino_pago_proveedor_web::$STR_ES_RELACIONES=='false' ) {?>
				<div id="divFlechaArribaElementos" align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
					<span></span>
				</div>
				<?php } ?>

				<!-- SECCION/FORMULARIO -->
				<table id="tblElementostermino_pago_proveedor" class="elementos" style="width: 400px; padding: 0px; border-spacing: 0px; border-collapse: collapse; text-align: left;">
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
						<td id="td_title-id_tipo_termino_pago" class="titulocampo">
							<label class="form-label">Tipo Termino Pago.(*)</label>
						</td>
						<td id="td_control-id_tipo_termino_pago" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_tipo_termino_pago" name="form-id_tipo_termino_pago" title="Tipo Termino Pago" ></select></td>
									<td><a><img id="form-id_tipo_termino_pago_img" name="form-id_tipo_termino_pago_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_tipo_termino_pago_img_busqueda" name="form-id_tipo_termino_pago_img_busqueda" title="Buscar Tipo Termino Pago" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_tipo_termino_pago" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_5">
						<td id="td_title-codigo" class="titulocampo">
							<label class="form-label">Codigo.(*)</label>
						</td>
						<td id="td_control-codigo" align="left" class="controlcampo">
							<input id="form-codigo" name="form-codigo" type="text" class="form-control"  placeholder="Codigo"  title="Codigo"    size="4"  maxlength="4"/>
							<span id="spanstrMensajecodigo" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_6">
						<td id="td_title-descripcion" class="titulocampo">
							<label class="form-label">Descripcion.(*)</label>
						</td>
						<td id="td_control-descripcion" align="left" class="controlcampo">
							<input id="form-descripcion" name="form-descripcion" type="text" class="form-control"  placeholder="Descripcion"  title="Descripcion"    size="20"  maxlength="40"/>
							<span id="spanstrMensajedescripcion" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_7">
						<td id="td_title-monto" class="titulocampo">
							<label class="form-label">Monto.(*)</label>
						</td>
						<td id="td_control-monto" align="left" class="controlcampo">
							<input id="form-monto" name="form-monto" type="text" class="form-control"  placeholder="Monto"  title="Monto"    maxlength="18" size="12" >
							<span id="spanstrMensajemonto" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_8">
						<td id="td_title-dias" class="titulocampo">
							<label class="form-label">Dias.(*)</label>
						</td>
						<td id="td_control-dias" align="left" class="controlcampo">
							<input id="form-dias" name="form-dias" type="text" class="form-control"  placeholder="Dias"  title="Dias"    maxlength="10" size="10" >
							<span id="spanstrMensajedias" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_9">
						<td id="td_title-inicial" class="titulocampo">
							<label class="form-label">Inicial.(*)</label>
						</td>
						<td id="td_control-inicial" align="left" class="controlcampo">
							<input id="form-inicial" name="form-inicial" type="text" class="form-control"  placeholder="Inicial"  title="Inicial"    maxlength="18" size="12" >
							<span id="spanstrMensajeinicial" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_10">
						<td id="td_title-cuotas" class="titulocampo">
							<label class="form-label">Cuotas.(*)</label>
						</td>
						<td id="td_control-cuotas" align="left" class="controlcampo">
							<input id="form-cuotas" name="form-cuotas" type="text" class="form-control"  placeholder="Cuotas"  title="Cuotas"    maxlength="10" size="10" >
							<span id="spanstrMensajecuotas" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_11">
						<td id="td_title-descuento_pronto_pago" class="titulocampo">
							<label class="form-label">Descuento Pronto Pago.(*)</label>
						</td>
						<td id="td_control-descuento_pronto_pago" align="left" class="controlcampo">
							<input id="form-descuento_pronto_pago" name="form-descuento_pronto_pago" type="text" class="form-control"  placeholder="Descuento Pronto Pago"  title="Descuento Pronto Pago"    maxlength="18" size="12" >
							<span id="spanstrMensajedescuento_pronto_pago" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_12">
						<td id="td_title-predeterminado" class="titulocampo">
							<label class="form-label">Predeterminado</label>
						</td>
						<td id="td_control-predeterminado" align="left" class="controlcampo">
							<input id="form-predeterminado" name="form-predeterminado" type="checkbox" >
							<span id="spanstrMensajepredeterminado" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_13">
						<td id="td_title-id_cuenta" class="titulocampo">
							<label class="form-label"> Cuenta</label>
						</td>
						<td id="td_control-id_cuenta" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_cuenta" name="form-id_cuenta" title=" Cuenta" ></select></td>
									<td><a><img id="form-id_cuenta_img" name="form-id_cuenta_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_cuenta_img_busqueda" name="form-id_cuenta_img_busqueda" title="Buscar Cuentas" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_cuenta" class="mensajeerror"></span>
						</td>
					</tr>
				</table> <!-- tblElementostermino_pago_proveedor -->

				<!-- SECCION/OCULTOS -->
				<table id="tblCamposOcultostermino_pago_proveedor" class="elementos" style="display: table-row;">
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
						<td id="td_title-cuenta_contable" class="titulocampo">
							<label class="form-label">Cuenta Contable</label>
						</td>
						<td id="td_control-cuenta_contable" align="left" class="controlcampo">
							<input id="form-cuenta_contable" name="form-cuenta_contable" type="text" class="form-control"  placeholder="Cuenta Contable"  title="Cuenta Contable"    size="20"  maxlength="20"/>
							<span id="spanstrMensajecuenta_contable" class="mensajeerror"></span>
						</td>
					</tr>
				</table> <!-- tblCamposOcultostermino_pago_proveedor -->

			</td></tr> <!-- trtermino_pago_proveedorElementos -->
			</table> <!-- tbltermino_pago_proveedorElementos -->
			</form> <!-- frmMantenimientotermino_pago_proveedor -->


			

				<form id="frmAccionesMantenimientotermino_pago_proveedor" name="frmAccionesMantenimientotermino_pago_proveedor">

			<?php if(termino_pago_proveedor_web::$STR_ES_BUSQUEDA=='false' ) {?>
			<table id="tbltermino_pago_proveedorAcciones" class="elementos" style="text-align: center">
		<tr id="trtermino_pago_proveedorAcciones" class="elementos" style="display:table-row">
			<td align="center">
				<a id="Acciones" ></a>

				<?php if(termino_pago_proveedor_web::$STR_ES_RELACIONES=='false' ) {?>
				<div align="right">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
				<?php } ?>

					<!-- SECCION/BOTONES -->
					<table id="tblAccionesMantenimientotermino_pago_proveedor" class="busqueda" style="width: 50%;text-align: left">

						<?php if(termino_pago_proveedor_web::$STR_ES_RELACIONES=='false' ) {?>
						<!--
						<caption class="busquedacabecera">
							<span>Acciones</span>
						</caption>
						-->
						<?php } ?>

						<tr id="trAccionesMantenimientotermino_pago_proveedorBasicos">
							<td id="tdbtnNuevotermino_pago_proveedor" style="visibility:visible">
								<div id="divNuevotermino_pago_proveedor" style="display:table-row">
									<input type="button" id="btnNuevotermino_pago_proveedor" name="btnNuevotermino_pago_proveedor" value="NUEVO" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnActualizartermino_pago_proveedor" style="visibility:visible">
								<div id="divActualizartermino_pago_proveedor" style="display:table-row">
									<input type="button" id="btnActualizartermino_pago_proveedor" name="btnActualizartermino_pago_proveedor" title="ACTUALIZAR Terminos Pago Proveedores ACTUAL" value="Actualizar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnEliminartermino_pago_proveedor" style="visibility:visible">
								<div id="divEliminartermino_pago_proveedor" style="display:table-row">
									<input type="button" id="btnEliminartermino_pago_proveedor" name="btnEliminartermino_pago_proveedor" title="ELIMINAR Terminos Pago Proveedores ACTUAL" value="Eliminar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnImprimirtermino_pago_proveedor" style="visibility:visible">
								<input type="button" id="btnImprimirtermino_pago_proveedor" name="btnImprimirtermino_pago_proveedor" title="IMPRIMIR PAGINA Terminos Pago Proveedores ACTUAL" value="Imp. Datos" class="btn btn-primary"/>
							</td>
							<td id="tdbtnCancelartermino_pago_proveedor" style="visibility:visible">
								<input type="button" id="btnCancelartermino_pago_proveedor" name="btnCancelartermino_pago_proveedor" title="CANCELAR Terminos Pago Proveedores ACTUAL" value="Cancelar" class="btn btn-primary"/>
							</td>
						</tr>
						<tr id="trAccionesMantenimientotermino_pago_proveedorGuardar" style="display:none">
							<td id="tdbtnGuardarCambiostermino_pago_proveedor" colspan="4" align="center" style="visibility:visible">
								<div id="divGuardarCambiostermino_pago_proveedor" style="display:table-row">
									<input type="button" id="btnGuardarCambiosFormulariotermino_pago_proveedor" name="btnGuardarCambiosFormulariotermino_pago_proveedor" title="GUARDAR" value="GUADAR CAMBIOS" class="btn btn-primary"/>
								</div>
							</td>
						</tr>
					</table> <!-- tblAccionesMantenimientotermino_pago_proveedor -->
			</td>
		</tr> <!-- trtermino_pago_proveedorAcciones -->
		<?php if(termino_pago_proveedor_web::$STR_ES_RELACIONADO=='false' ) {?>
		<tr id="trtermino_pago_proveedorParametrosAcciones" class="impresion"  style="display:table-row">
			<td align="center">
				<!-- SECCION/POST -->
				<table id="tbltermino_pago_proveedorParametrosAcciones" style="text-align: center;border: 0px solid black;padding: 0px; border-spacing: 0px">
					<caption class="busquedacabecera" style="padding: 0px;caption-side: top;">
						<span>Acciones Extra/Post</span>
					</caption>
					<tr id="trtermino_pago_proveedorFilaParametrosAcciones">
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
				</table> <!-- tbltermino_pago_proveedorParametrosAcciones -->
			</td>
		</tr> <!-- trtermino_pago_proveedorParametrosAcciones -->
		<?php }?>
		<tr id="trtermino_pago_proveedorMensajes" class="mensajes">
			<td align="center">
				<a id="Mensajes"></a>
			</td>
		</tr> <!-- trtermino_pago_proveedorMensajes -->
			</table> <!-- tbltermino_pago_proveedorAcciones -->
			<?php } ?>
			</form> <!-- frmMantenimientotermino_pago_proveedor -->
			</div> <!-- divMantenimientotermino_pago_proveedorAjaxWebPart -->
		</td>
	</tr> <!-- trtermino_pago_proveedorElementosFormulario/super -->
		<?php if(termino_pago_proveedor_web::$STR_ES_RELACIONADO=='false' ) {?>

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
			
				import {termino_pago_proveedor_webcontrol,termino_pago_proveedor_webcontrol1} from './webroot/js/JavaScript/contabilidad/cuentaspagar/termino_pago_proveedor/js/webcontrol/termino_pago_proveedor_form_webcontrol.js?random=1';
				
				termino_pago_proveedor_webcontrol1.settermino_pago_proveedor_constante(window.termino_pago_proveedor_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(termino_pago_proveedor_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

