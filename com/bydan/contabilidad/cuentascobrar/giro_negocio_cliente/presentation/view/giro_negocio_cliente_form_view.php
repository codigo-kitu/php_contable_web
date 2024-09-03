<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\cuentascobrar\giro_negocio_cliente\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Giro Negocio Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/cuentascobrar/giro_negocio_cliente/util/giro_negocio_cliente_carga.php');
	use com\bydan\contabilidad\cuentascobrar\giro_negocio_cliente\util\giro_negocio_cliente_carga;
	
	//include_once('com/bydan/contabilidad/cuentascobrar/giro_negocio_cliente/presentation/view/giro_negocio_cliente_web.php');
	//use com\bydan\contabilidad\cuentascobrar\giro_negocio_cliente\presentation\view\giro_negocio_cliente_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	giro_negocio_cliente_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	giro_negocio_cliente_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$giro_negocio_cliente_web1= new giro_negocio_cliente_web();	
	$giro_negocio_cliente_web1->cargarDatosGenerales();
	
	//$moduloActual=$giro_negocio_cliente_web1->moduloActual;
	//$usuarioActual=$giro_negocio_cliente_web1->usuarioActual;
	//$sessionBase=$giro_negocio_cliente_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$giro_negocio_cliente_web1->parametroGeneralUsuarioActual;
	
	
		
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
		
		
			<script type="module" src="webroot/js/JavaScript/contabilidad/cuentascobrar/giro_negocio_cliente/js/util/giro_negocio_cliente_form_funcion.js?random=1"></script>
						
		
		
		<?php 
			
		
			giro_negocio_cliente_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					giro_negocio_cliente_web::$GET_POST=$_GET;
				} else {
					giro_negocio_cliente_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			giro_negocio_cliente_web::$STR_NOMBRE_PAGINA = 'giro_negocio_cliente_form_view.php';
			giro_negocio_cliente_web::$BIT_ES_PAGINA_PRINCIPAL = 'false';
			giro_negocio_cliente_web::$BIT_ES_PAGINA_FORM = 'true';
				
			giro_negocio_cliente_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {giro_negocio_cliente_constante,giro_negocio_cliente_constante1} from './webroot/js/JavaScript/contabilidad/cuentascobrar/giro_negocio_cliente/js/util/giro_negocio_cliente_constante.js?random=1';
			import {giro_negocio_cliente_funcion,giro_negocio_cliente_funcion1} from './webroot/js/JavaScript/contabilidad/cuentascobrar/giro_negocio_cliente/js/util/giro_negocio_cliente_funcion.js?random=1';
			
			let giro_negocio_cliente_constante2 = new giro_negocio_cliente_constante();
			
			giro_negocio_cliente_constante2.STR_NOMBRE_PAGINA="<?php echo(giro_negocio_cliente_web::$STR_NOMBRE_PAGINA); ?>";
			giro_negocio_cliente_constante2.STR_TYPE_ON_LOADgiro_negocio_cliente="<?php echo(giro_negocio_cliente_web::$STR_TYPE_ONLOAD); ?>";
			giro_negocio_cliente_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(giro_negocio_cliente_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			giro_negocio_cliente_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(giro_negocio_cliente_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			giro_negocio_cliente_constante2.STR_ACTION="<?php echo(giro_negocio_cliente_web::$STR_ACTION); ?>";
			giro_negocio_cliente_constante2.STR_ES_POPUP="<?php echo(giro_negocio_cliente_web::$STR_ES_POPUP); ?>";
			giro_negocio_cliente_constante2.STR_ES_BUSQUEDA="<?php echo(giro_negocio_cliente_web::$STR_ES_BUSQUEDA); ?>";
			giro_negocio_cliente_constante2.STR_FUNCION_JS="<?php echo(giro_negocio_cliente_web::$STR_FUNCION_JS); ?>";
			giro_negocio_cliente_constante2.BIG_ID_ACTUAL="<?php echo(giro_negocio_cliente_web::$BIG_ID_ACTUAL); ?>";
			giro_negocio_cliente_constante2.BIG_ID_OPCION="<?php echo(giro_negocio_cliente_web::$BIG_ID_OPCION); ?>";
			giro_negocio_cliente_constante2.STR_OBJETO_JS="<?php echo(giro_negocio_cliente_web::$STR_OBJETO_JS); ?>";
			giro_negocio_cliente_constante2.STR_ES_RELACIONES="<?php echo(giro_negocio_cliente_web::$STR_ES_RELACIONES); ?>";
			giro_negocio_cliente_constante2.STR_ES_RELACIONADO="<?php echo(giro_negocio_cliente_web::$STR_ES_RELACIONADO); ?>";
			giro_negocio_cliente_constante2.STR_ES_SUB_PAGINA="<?php echo(giro_negocio_cliente_web::$STR_ES_SUB_PAGINA); ?>";
			giro_negocio_cliente_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(giro_negocio_cliente_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			giro_negocio_cliente_constante2.BIT_ES_PAGINA_FORM=<?php echo(giro_negocio_cliente_web::$BIT_ES_PAGINA_FORM); ?>;
			giro_negocio_cliente_constante2.STR_SUFIJO="<?php echo(giro_negocio_cliente_web::$STR_SUF); ?>";//giro_negocio_cliente
			giro_negocio_cliente_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(giro_negocio_cliente_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//giro_negocio_cliente
			
			giro_negocio_cliente_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(giro_negocio_cliente_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			giro_negocio_cliente_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($giro_negocio_cliente_web1->moduloActual->getnombre()); ?>";
			giro_negocio_cliente_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(giro_negocio_cliente_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			giro_negocio_cliente_constante2.BIT_ES_LOAD_NORMAL=true;
			/*giro_negocio_cliente_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			giro_negocio_cliente_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.giro_negocio_cliente_constante2 = giro_negocio_cliente_constante2;
			
		</script>
		
		<?php if(giro_negocio_cliente_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.giro_negocio_cliente_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.giro_negocio_cliente_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="giro_negocio_clienteActual" ></a>
	
	<div id="divResumengiro_negocio_clienteActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(giro_negocio_cliente_web::$STR_ES_RELACIONADO=='false') {?>
		
		<div id="header" >
		
			<div id="banner">
				<span id="spanTituloBanner" class="titulobanner"></span>
			</div> <!-- banner -->
					
			<div id="subheader" class="links">  
			
						
			</div> <!-- sub-header -->
			
			
		</div> <!-- header -->
		
		<?php } ?>
		
		<div id="main">
		

			<?php if(giro_negocio_cliente_web::$STR_ES_RELACIONADO=='false') {?>
			
			
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(giro_negocio_cliente_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(giro_negocio_cliente_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divgiro_negocio_clientePopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblgiro_negocio_clientePopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmgiro_negocio_clienteAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btngiro_negocio_clienteAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="giro_negocio_cliente_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btngiro_negocio_clienteAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmgiro_negocio_clienteAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblgiro_negocio_clientePopupAjaxWebPart -->
		</div> <!-- divgiro_negocio_clientePopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->		
		
		
		
			
<tr id="trgiro_negocio_clienteElementosFormulario">
	<td>
		<div id="divMantenimientogiro_negocio_clienteAjaxWebPart" title="GIRO NEGOCIO" style="height: 90%;width: 90%;position: relative;top: 30px;left: 30px;">
			<form id="frmMantenimientogiro_negocio_cliente" name="frmMantenimientogiro_negocio_cliente">

			</br>

			<?php if(giro_negocio_cliente_web::$STR_ES_RELACIONES=='false' ) {?>
			</br>
			<?php } ?>

			<!-- SECCION/TOOLBAR -->
			<table id="tblgiro_negocio_clienteToolBarFormularioExterior" style="width: 65%">
				<tr style="display:table-row">
					<td align="center">

						<table id="tblgiro_negocio_clienteToolBarFormulario" style="text-align: center"  style="display:table-row">
							<tr>
								<td id="tdgiro_negocio_clienteActualizarToolBar" style="visibility:visible">
									<img id="imgActualizarToolBargiro_negocio_cliente" name="imgActualizarToolBargiro_negocio_cliente" title="ACTUALIZAR Giro Negocio ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/actualizar.gif" width="25" height="25"/>
								</td>
								<td id="tdgiro_negocio_clienteEliminarToolBar" style="visibility:visible">
									<img id="imgEliminarToolBargiro_negocio_cliente" name="imgEliminarToolBargiro_negocio_cliente" title="ELIMINAR Giro Negocio ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/eliminar.gif" width="25" height="25"/>
								</td>
								<td id="tdgiro_negocio_clienteCancelarToolBar" style="visibility:visible">
									<img id="imgCancelarToolBargiro_negocio_cliente" name="imgCancelarToolBargiro_negocio_cliente" title="CANCELAR Giro Negocio ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/cancelar.gif" width="25" height="25"/>
								</td>
								<td id="tdgiro_negocio_clienteRelacionesToolBar" style="display:table-row">
									<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/xexpand.png" width="25" height="25" onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('tblCamposOcultosgiro_negocio_cliente',this,'../')"/>
								</td>
							</tr>
						</table> <!-- tblgiro_negocio_clienteToolBarFormulario -->

					</td>
				</tr>
			</table> <!-- tblgiro_negocio_clienteToolBarFormularioExterior -->

			<table id="tblgiro_negocio_clienteElementos">
			<tr id="trgiro_negocio_clienteElementos" class="elementos" style="display:table-row">
			<td align="center">

			<a id="Campos"></a>

				<?php if(giro_negocio_cliente_web::$STR_ES_RELACIONES=='false' ) {?>
				<div id="divFlechaArribaElementos" align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
					<span></span>
				</div>
				<?php } ?>

				<!-- SECCION/FORMULARIO -->
				<table id="tblElementosgiro_negocio_cliente" class="elementos" style="width: 300px; padding: 0px; border-spacing: 0px; border-collapse: collapse; text-align: center;">
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
							<textarea id="form-nombre" name="form-nombre" class="form-control"  placeholder="Nombre"  title="Nombre"   style="font-size: 13px;" rows="2" cols="25" size="20" ></textarea>
							<span id="spanstrMensajenombre" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_5">
						<td id="td_title-predeterminado" class="titulocampo">
							<label class="form-label">Predeterminado</label>
						</td>
						<td id="td_control-predeterminado" align="left" class="controlcampo">
							<input id="form-predeterminado" name="form-predeterminado" type="checkbox" >
							<span id="spanstrMensajepredeterminado" class="mensajeerror"></span>
						</td>
					</tr>
				</table> <!-- tblElementosgiro_negocio_cliente -->

				<!-- SECCION/OCULTOS -->
				<table id="tblCamposOcultosgiro_negocio_cliente" class="elementos" style="display: table-row;">
					<caption class="busquedacabecera">
						<span>Campos Ocultos</span>
					</caption>
				</table> <!-- tblCamposOcultosgiro_negocio_cliente -->

			</td></tr> <!-- trgiro_negocio_clienteElementos -->
			</table> <!-- tblgiro_negocio_clienteElementos -->
			</form> <!-- frmMantenimientogiro_negocio_cliente -->


			

				<form id="frmAccionesMantenimientogiro_negocio_cliente" name="frmAccionesMantenimientogiro_negocio_cliente">

			<?php if(giro_negocio_cliente_web::$STR_ES_BUSQUEDA=='false' ) {?>
			<table id="tblgiro_negocio_clienteAcciones" class="elementos" style="text-align: center">
		<tr id="trgiro_negocio_clienteAcciones" class="elementos" style="display:table-row">
			<td align="center">
				<a id="Acciones" ></a>

				<?php if(giro_negocio_cliente_web::$STR_ES_RELACIONES=='false' ) {?>
				<div align="right">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
				<?php } ?>

					<!-- SECCION/BOTONES -->
					<table id="tblAccionesMantenimientogiro_negocio_cliente" class="busqueda" style="width: 50%;text-align: center">

						<?php if(giro_negocio_cliente_web::$STR_ES_RELACIONES=='false' ) {?>
						<!--
						<caption class="busquedacabecera">
							<span>Acciones</span>
						</caption>
						-->
						<?php } ?>

						<tr id="trAccionesMantenimientogiro_negocio_clienteBasicos">
							<td id="tdbtnNuevogiro_negocio_cliente" style="visibility:visible">
								<div id="divNuevogiro_negocio_cliente" style="display:table-row">
									<input type="button" id="btnNuevogiro_negocio_cliente" name="btnNuevogiro_negocio_cliente" value="NUEVO" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnActualizargiro_negocio_cliente" style="visibility:visible">
								<div id="divActualizargiro_negocio_cliente" style="display:table-row">
									<input type="button" id="btnActualizargiro_negocio_cliente" name="btnActualizargiro_negocio_cliente" title="ACTUALIZAR Giro Negocio ACTUAL" value="Actualizar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnEliminargiro_negocio_cliente" style="visibility:visible">
								<div id="divEliminargiro_negocio_cliente" style="display:table-row">
									<input type="button" id="btnEliminargiro_negocio_cliente" name="btnEliminargiro_negocio_cliente" title="ELIMINAR Giro Negocio ACTUAL" value="Eliminar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnImprimirgiro_negocio_cliente" style="visibility:visible">
								<input type="button" id="btnImprimirgiro_negocio_cliente" name="btnImprimirgiro_negocio_cliente" title="IMPRIMIR PAGINA Giro Negocio ACTUAL" value="Imp. Datos" class="btn btn-primary"/>
							</td>
							<td id="tdbtnCancelargiro_negocio_cliente" style="visibility:visible">
								<input type="button" id="btnCancelargiro_negocio_cliente" name="btnCancelargiro_negocio_cliente" title="CANCELAR Giro Negocio ACTUAL" value="Cancelar" class="btn btn-primary"/>
							</td>
						</tr>
						<tr id="trAccionesMantenimientogiro_negocio_clienteGuardar" style="display:none">
							<td id="tdbtnGuardarCambiosgiro_negocio_cliente" colspan="4" align="center" style="visibility:visible">
								<div id="divGuardarCambiosgiro_negocio_cliente" style="display:table-row">
									<input type="button" id="btnGuardarCambiosFormulariogiro_negocio_cliente" name="btnGuardarCambiosFormulariogiro_negocio_cliente" title="GUARDAR" value="GUADAR CAMBIOS" class="btn btn-primary"/>
								</div>
							</td>
						</tr>
					</table> <!-- tblAccionesMantenimientogiro_negocio_cliente -->
			</td>
		</tr> <!-- trgiro_negocio_clienteAcciones -->
		<?php if(giro_negocio_cliente_web::$STR_ES_RELACIONADO=='false' ) {?>
		<tr id="trgiro_negocio_clienteParametrosAcciones" class="impresion"  style="display:table-row">
			<td align="center">
				<!-- SECCION/POST -->
				<table id="tblgiro_negocio_clienteParametrosAcciones" style="text-align: center;border: 0px solid black;padding: 0px; border-spacing: 0px">
					<caption class="busquedacabecera" style="padding: 0px;caption-side: top;">
						<span>Acciones Extra/Post</span>
					</caption>
					<tr id="trgiro_negocio_clienteFilaParametrosAcciones">
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
				</table> <!-- tblgiro_negocio_clienteParametrosAcciones -->
			</td>
		</tr> <!-- trgiro_negocio_clienteParametrosAcciones -->
		<?php }?>
		<tr id="trgiro_negocio_clienteMensajes" class="mensajes">
			<td align="center">
				<a id="Mensajes"></a>
			</td>
		</tr> <!-- trgiro_negocio_clienteMensajes -->
			</table> <!-- tblgiro_negocio_clienteAcciones -->
			<?php } ?>
			</form> <!-- frmMantenimientogiro_negocio_cliente -->
			</div> <!-- divMantenimientogiro_negocio_clienteAjaxWebPart -->
		</td>
	</tr> <!-- trgiro_negocio_clienteElementosFormulario/super -->
		<?php if(giro_negocio_cliente_web::$STR_ES_RELACIONADO=='false' ) {?>

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
			
				import {giro_negocio_cliente_webcontrol,giro_negocio_cliente_webcontrol1} from './webroot/js/JavaScript/contabilidad/cuentascobrar/giro_negocio_cliente/js/webcontrol/giro_negocio_cliente_form_webcontrol.js?random=1';
				
				giro_negocio_cliente_webcontrol1.setgiro_negocio_cliente_constante(window.giro_negocio_cliente_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(giro_negocio_cliente_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

