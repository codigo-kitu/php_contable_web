<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\facturacion\parametro_facturacion\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Parametro Facturacion Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/facturacion/parametro_facturacion/util/parametro_facturacion_carga.php');
	use com\bydan\contabilidad\facturacion\parametro_facturacion\util\parametro_facturacion_carga;
	
	//include_once('com/bydan/contabilidad/facturacion/parametro_facturacion/presentation/view/parametro_facturacion_web.php');
	//use com\bydan\contabilidad\facturacion\parametro_facturacion\presentation\view\parametro_facturacion_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	parametro_facturacion_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	parametro_facturacion_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$parametro_facturacion_web1= new parametro_facturacion_web();	
	$parametro_facturacion_web1->cargarDatosGenerales();
	
	//$moduloActual=$parametro_facturacion_web1->moduloActual;
	//$usuarioActual=$parametro_facturacion_web1->usuarioActual;
	//$sessionBase=$parametro_facturacion_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$parametro_facturacion_web1->parametroGeneralUsuarioActual;
	
	
		
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
		
		
			<script type="module" src="webroot/js/JavaScript/contabilidad/facturacion/parametro_facturacion/js/util/parametro_facturacion_form_funcion.js?random=1"></script>
						
		
		
		<?php 
			
		
			parametro_facturacion_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					parametro_facturacion_web::$GET_POST=$_GET;
				} else {
					parametro_facturacion_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			parametro_facturacion_web::$STR_NOMBRE_PAGINA = 'parametro_facturacion_form_view.php';
			parametro_facturacion_web::$BIT_ES_PAGINA_PRINCIPAL = 'false';
			parametro_facturacion_web::$BIT_ES_PAGINA_FORM = 'true';
				
			parametro_facturacion_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {parametro_facturacion_constante,parametro_facturacion_constante1} from './webroot/js/JavaScript/contabilidad/facturacion/parametro_facturacion/js/util/parametro_facturacion_constante.js?random=1';
			import {parametro_facturacion_funcion,parametro_facturacion_funcion1} from './webroot/js/JavaScript/contabilidad/facturacion/parametro_facturacion/js/util/parametro_facturacion_funcion.js?random=1';
			
			let parametro_facturacion_constante2 = new parametro_facturacion_constante();
			
			parametro_facturacion_constante2.STR_NOMBRE_PAGINA="<?php echo(parametro_facturacion_web::$STR_NOMBRE_PAGINA); ?>";
			parametro_facturacion_constante2.STR_TYPE_ON_LOADparametro_facturacion="<?php echo(parametro_facturacion_web::$STR_TYPE_ONLOAD); ?>";
			parametro_facturacion_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(parametro_facturacion_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			parametro_facturacion_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(parametro_facturacion_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			parametro_facturacion_constante2.STR_ACTION="<?php echo(parametro_facturacion_web::$STR_ACTION); ?>";
			parametro_facturacion_constante2.STR_ES_POPUP="<?php echo(parametro_facturacion_web::$STR_ES_POPUP); ?>";
			parametro_facturacion_constante2.STR_ES_BUSQUEDA="<?php echo(parametro_facturacion_web::$STR_ES_BUSQUEDA); ?>";
			parametro_facturacion_constante2.STR_FUNCION_JS="<?php echo(parametro_facturacion_web::$STR_FUNCION_JS); ?>";
			parametro_facturacion_constante2.BIG_ID_ACTUAL="<?php echo(parametro_facturacion_web::$BIG_ID_ACTUAL); ?>";
			parametro_facturacion_constante2.BIG_ID_OPCION="<?php echo(parametro_facturacion_web::$BIG_ID_OPCION); ?>";
			parametro_facturacion_constante2.STR_OBJETO_JS="<?php echo(parametro_facturacion_web::$STR_OBJETO_JS); ?>";
			parametro_facturacion_constante2.STR_ES_RELACIONES="<?php echo(parametro_facturacion_web::$STR_ES_RELACIONES); ?>";
			parametro_facturacion_constante2.STR_ES_RELACIONADO="<?php echo(parametro_facturacion_web::$STR_ES_RELACIONADO); ?>";
			parametro_facturacion_constante2.STR_ES_SUB_PAGINA="<?php echo(parametro_facturacion_web::$STR_ES_SUB_PAGINA); ?>";
			parametro_facturacion_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(parametro_facturacion_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			parametro_facturacion_constante2.BIT_ES_PAGINA_FORM=<?php echo(parametro_facturacion_web::$BIT_ES_PAGINA_FORM); ?>;
			parametro_facturacion_constante2.STR_SUFIJO="<?php echo(parametro_facturacion_web::$STR_SUF); ?>";//parametro_facturacion
			parametro_facturacion_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(parametro_facturacion_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//parametro_facturacion
			
			parametro_facturacion_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(parametro_facturacion_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			parametro_facturacion_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($parametro_facturacion_web1->moduloActual->getnombre()); ?>";
			parametro_facturacion_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(parametro_facturacion_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			parametro_facturacion_constante2.BIT_ES_LOAD_NORMAL=true;
			/*parametro_facturacion_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			parametro_facturacion_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.parametro_facturacion_constante2 = parametro_facturacion_constante2;
			
		</script>
		
		<?php if(parametro_facturacion_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.parametro_facturacion_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.parametro_facturacion_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="parametro_facturacionActual" ></a>
	
	<div id="divResumenparametro_facturacionActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(parametro_facturacion_web::$STR_ES_RELACIONADO=='false') {?>
		
		<div id="header" >
		
			<div id="banner">
				<span id="spanTituloBanner" class="titulobanner"></span>
			</div> <!-- banner -->
					
			<div id="subheader" class="links">  
			
						
			</div> <!-- sub-header -->
			
			
		</div> <!-- header -->
		
		<?php } ?>
		
		<div id="main">
		

			<?php if(parametro_facturacion_web::$STR_ES_RELACIONADO=='false') {?>
			
			
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(parametro_facturacion_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(parametro_facturacion_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divparametro_facturacionPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblparametro_facturacionPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmparametro_facturacionAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnparametro_facturacionAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="parametro_facturacion_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnparametro_facturacionAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmparametro_facturacionAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblparametro_facturacionPopupAjaxWebPart -->
		</div> <!-- divparametro_facturacionPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->		
		
		
		
			
<tr id="trparametro_facturacionElementosFormulario">
	<td>
		<div id="divMantenimientoparametro_facturacionAjaxWebPart" title="PARAMETRO FACTURACION" style="height: 90%;width: 90%;position: relative;top: 30px;left: 30px;">
			<form id="frmMantenimientoparametro_facturacion" name="frmMantenimientoparametro_facturacion">

			</br>

			<?php if(parametro_facturacion_web::$STR_ES_RELACIONES=='false' ) {?>
			</br>
			<?php } ?>

			<!-- SECCION/TOOLBAR -->
			<table id="tblparametro_facturacionToolBarFormularioExterior" style="width: 65%">
				<tr style="display:table-row">
					<td align="center">

						<table id="tblparametro_facturacionToolBarFormulario" style="text-align: center"  style="display:table-row">
							<tr>
								<td id="tdparametro_facturacionActualizarToolBar" style="visibility:visible">
									<img id="imgActualizarToolBarparametro_facturacion" name="imgActualizarToolBarparametro_facturacion" title="ACTUALIZAR Parametro Facturacion ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/actualizar.gif" width="25" height="25"/>
								</td>
								<td id="tdparametro_facturacionEliminarToolBar" style="visibility:visible">
									<img id="imgEliminarToolBarparametro_facturacion" name="imgEliminarToolBarparametro_facturacion" title="ELIMINAR Parametro Facturacion ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/eliminar.gif" width="25" height="25"/>
								</td>
								<td id="tdparametro_facturacionCancelarToolBar" style="visibility:visible">
									<img id="imgCancelarToolBarparametro_facturacion" name="imgCancelarToolBarparametro_facturacion" title="CANCELAR Parametro Facturacion ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/cancelar.gif" width="25" height="25"/>
								</td>
								<td id="tdparametro_facturacionRelacionesToolBar" style="display:table-row">
									<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/xexpand.png" width="25" height="25" onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('tblCamposOcultosparametro_facturacion',this,'../')"/>
								</td>
							</tr>
						</table> <!-- tblparametro_facturacionToolBarFormulario -->

					</td>
				</tr>
			</table> <!-- tblparametro_facturacionToolBarFormularioExterior -->

			<table id="tblparametro_facturacionElementos">
			<tr id="trparametro_facturacionElementos" class="elementos" style="display:table-row">
			<td align="center">

			<a id="Campos"></a>

				<?php if(parametro_facturacion_web::$STR_ES_RELACIONES=='false' ) {?>
				<div id="divFlechaArribaElementos" align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
					<span></span>
				</div>
				<?php } ?>


				<div id="tabs_elementos" class="tabs" style="width: 100%">
					<ul>
						<li class="titulotab"><a href="#facturas">FACTURAS</a></li>
						<li class="titulotab"><a href="#estimados">ESTIMADOS</a></li>
						<li class="titulotab"><a href="#recibos">RECIBOS</a></li>
					</ul>


				<!-- SECCION/FORMULARIO -->
				<table id="tblElementosparametro_facturacion" class="elementos" style="width: 700px; padding: 0px; border-spacing: 0px; border-collapse: collapse; text-align: left;">
					
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
					<tr id="trparametro_facturacionfacturasElementos">
						<td id="tdparametro_facturacionfacturasElementos" >
			<div id="facturas">
				<table class="elementos" style="width:300px;text-align:left; padding: 0px; border-spacing: 0px; border-collapse: collapse;">
					<caption class="busquedacabecera"><span>FACTURAS</span></caption>
					<tr id="tr_fila_1">
						<td id="td_title-id" class="titulocampo">
							<label class="form-label">Cod. Único</label>
						</td>
						<td id="td_control-id" align="left">
							<input id="form-id" name="form-id" type="text" class="form-control" readonly size="10">
						</td>
					</tr>
					<tr id="tr_fila_2">
						<td id="td_title-nombre_factura" class="titulocampo">
							<label class="form-label">Nombre Factura.(*)</label>
						</td>
						<td id="td_control-nombre_factura" align="left" class="controlcampo">
							<input id="form-nombre_factura" name="form-nombre_factura" type="text" class="form-control"  placeholder="Nombre Factura"  title="Nombre Factura"    size="20"  maxlength="50"/>
							<span id="spanstrMensajenombre_factura" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_3">
						<td id="td_title-numero_factura" class="titulocampo">
							<label class="form-label">Numero Factura.(*)</label>
						</td>
						<td id="td_control-numero_factura" align="left" class="controlcampo">
							<input id="form-numero_factura" name="form-numero_factura" type="text" class="form-control"  placeholder="Numero Factura"  title="Numero Factura"    maxlength="19" size="10" >
							<span id="spanstrMensajenumero_factura" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_4">
						<td id="td_title-incremento_factura" class="titulocampo">
							<label class="form-label">Incremento Factura.(*)</label>
						</td>
						<td id="td_control-incremento_factura" align="left" class="controlcampo">
							<input id="form-incremento_factura" name="form-incremento_factura" type="text" class="form-control"  placeholder="Incremento Factura"  title="Incremento Factura"    maxlength="10" size="10" >
							<span id="spanstrMensajeincremento_factura" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_5">
						<td id="td_title-solo_costo_producto" class="titulocampo">
							<label class="form-label">Solo Costo Producto</label>
						</td>
						<td id="td_control-solo_costo_producto" align="left" class="controlcampo">
							<input id="form-solo_costo_producto" name="form-solo_costo_producto" type="checkbox" >
							<span id="spanstrMensajesolo_costo_producto" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_6">
						<td id="td_title-numero_factura_lote" class="titulocampo">
							<label class="form-label">Numero Factura Lote.(*)</label>
						</td>
						<td id="td_control-numero_factura_lote" align="left" class="controlcampo">
							<input id="form-numero_factura_lote" name="form-numero_factura_lote" type="text" class="form-control"  placeholder="Numero Factura Lote"  title="Numero Factura Lote"    maxlength="19" size="10" >
							<span id="spanstrMensajenumero_factura_lote" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_7">
						<td id="td_title-incremento_factura_lote" class="titulocampo">
							<label class="form-label">Incremento Factura Lote.(*)</label>
						</td>
						<td id="td_control-incremento_factura_lote" align="left" class="controlcampo">
							<input id="form-incremento_factura_lote" name="form-incremento_factura_lote" type="text" class="form-control"  placeholder="Incremento Factura Lote"  title="Incremento Factura Lote"    maxlength="10" size="10" >
							<span id="spanstrMensajeincremento_factura_lote" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_8">
						<td id="td_title-numero_devolucion" class="titulocampo">
							<label class="form-label">Numero Devolucion.(*)</label>
						</td>
						<td id="td_control-numero_devolucion" align="left" class="controlcampo">
							<input id="form-numero_devolucion" name="form-numero_devolucion" type="text" class="form-control"  placeholder="Numero Devolucion"  title="Numero Devolucion"    maxlength="19" size="10" >
							<span id="spanstrMensajenumero_devolucion" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_9">
						<td id="td_title-incremento_devolucion" class="titulocampo">
							<label class="form-label">Incremento Devolucion.(*)</label>
						</td>
						<td id="td_control-incremento_devolucion" align="left" class="controlcampo">
							<input id="form-incremento_devolucion" name="form-incremento_devolucion" type="text" class="form-control"  placeholder="Incremento Devolucion"  title="Incremento Devolucion"    maxlength="10" size="10" >
							<span id="spanstrMensajeincremento_devolucion" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_10">
						<td id="td_title-id_termino_pago_cliente" class="titulocampo">
							<label class="form-label"> Termino Pago.(*)</label>
						</td>
						<td id="td_control-id_termino_pago_cliente" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_termino_pago_cliente" name="form-id_termino_pago_cliente" title=" Termino Pago" ></select></td>
									<td><a><img id="form-id_termino_pago_cliente_img" name="form-id_termino_pago_cliente_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_termino_pago_cliente_img_busqueda" name="form-id_termino_pago_cliente_img_busqueda" title="Buscar Terminos Pago Cliente" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_termino_pago_cliente" class="mensajeerror"></span>
						</td>
					</tr>
				</table>
			</div>
				</td></tr>
					<tr id="trparametro_facturacionestimadosElementos">
						<td id="tdparametro_facturacionestimadosElementos" >
			<div id="estimados">
				<table class="elementos" style="width:300px;text-align:left; padding: 0px; border-spacing: 0px; border-collapse: collapse;">
					<caption class="busquedacabecera"><span>ESTIMADOS</span></caption>
					
						<td id="td_title-nombre_estimado" class="titulocampo">
							<label class="form-label">Nombre Estimado.(*)</label>
						</td>
						<td id="td_control-nombre_estimado" align="left" class="controlcampo">
							<input id="form-nombre_estimado" name="form-nombre_estimado" type="text" class="form-control"  placeholder="Nombre Estimado"  title="Nombre Estimado"    size="20"  maxlength="50"/>
							<span id="spanstrMensajenombre_estimado" class="mensajeerror"></span>
						</td>
					
					<tr id="tr_fila_1">
						<td id="td_title-numero_estimado" class="titulocampo">
							<label class="form-label">Numero Estimado.(*)</label>
						</td>
						<td id="td_control-numero_estimado" align="left" class="controlcampo">
							<input id="form-numero_estimado" name="form-numero_estimado" type="text" class="form-control"  placeholder="Numero Estimado"  title="Numero Estimado"    maxlength="19" size="10" >
							<span id="spanstrMensajenumero_estimado" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_2">
						<td id="td_title-incremento_estimado" class="titulocampo">
							<label class="form-label">Incremento Estimado.(*)</label>
						</td>
						<td id="td_control-incremento_estimado" align="left" class="controlcampo">
							<input id="form-incremento_estimado" name="form-incremento_estimado" type="text" class="form-control"  placeholder="Incremento Estimado"  title="Incremento Estimado"    maxlength="10" size="10" >
							<span id="spanstrMensajeincremento_estimado" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_3">
						<td id="td_title-solo_costo_producto_estimado" class="titulocampo">
							<label class="form-label">Solo Costo Producto Estimado</label>
						</td>
						<td id="td_control-solo_costo_producto_estimado" align="left" class="controlcampo">
							<input id="form-solo_costo_producto_estimado" name="form-solo_costo_producto_estimado" type="checkbox" >
							<span id="spanstrMensajesolo_costo_producto_estimado" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_4">
						<td id="td_title-nombre_consignacion" class="titulocampo">
							<label class="form-label">Nombre Consignacion.(*)</label>
						</td>
						<td id="td_control-nombre_consignacion" align="left" class="controlcampo">
							<input id="form-nombre_consignacion" name="form-nombre_consignacion" type="text" class="form-control"  placeholder="Nombre Consignacion"  title="Nombre Consignacion"    size="20"  maxlength="50"/>
							<span id="spanstrMensajenombre_consignacion" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_5">
						<td id="td_title-numero_consignacion" class="titulocampo">
							<label class="form-label">Numero Consignacion.(*)</label>
						</td>
						<td id="td_control-numero_consignacion" align="left" class="controlcampo">
							<input id="form-numero_consignacion" name="form-numero_consignacion" type="text" class="form-control"  placeholder="Numero Consignacion"  title="Numero Consignacion"    maxlength="19" size="10" >
							<span id="spanstrMensajenumero_consignacion" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_6">
						<td id="td_title-incremento_consignacion" class="titulocampo">
							<label class="form-label">Incremento Consignacion.(*)</label>
						</td>
						<td id="td_control-incremento_consignacion" align="left" class="controlcampo">
							<input id="form-incremento_consignacion" name="form-incremento_consignacion" type="text" class="form-control"  placeholder="Incremento Consignacion"  title="Incremento Consignacion"    maxlength="10" size="10" >
							<span id="spanstrMensajeincremento_consignacion" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_7">
						<td id="td_title-solo_costo_producto_consignacion" class="titulocampo">
							<label class="form-label">Solo Costo Producto Consignacion</label>
						</td>
						<td id="td_control-solo_costo_producto_consignacion" align="left" class="controlcampo">
							<input id="form-solo_costo_producto_consignacion" name="form-solo_costo_producto_consignacion" type="checkbox" >
							<span id="spanstrMensajesolo_costo_producto_consignacion" class="mensajeerror"></span>
						</td>
					</tr>
				</table>
			</div>
				</td></tr>
					<tr id="trparametro_facturacionrecibosElementos">
						<td id="tdparametro_facturacionrecibosElementos" >
			<div id="recibos">
				<table class="elementos" style="width:300px;text-align:left; padding: 0px; border-spacing: 0px; border-collapse: collapse;">
					<caption class="busquedacabecera"><span>RECIBOS</span></caption>
					
						<td id="td_title-con_recibo" class="titulocampo">
							<label class="form-label">Con Recibo</label>
						</td>
						<td id="td_control-con_recibo" align="left" class="controlcampo">
							<input id="form-con_recibo" name="form-con_recibo" type="checkbox" >
							<span id="spanstrMensajecon_recibo" class="mensajeerror"></span>
						</td>
					
					<tr id="tr_fila_1">
						<td id="td_title-nombre_recibo" class="titulocampo">
							<label class="form-label">Nombre Recibo.(*)</label>
						</td>
						<td id="td_control-nombre_recibo" align="left" class="controlcampo">
							<input id="form-nombre_recibo" name="form-nombre_recibo" type="text" class="form-control"  placeholder="Nombre Recibo"  title="Nombre Recibo"    size="20"  maxlength="50"/>
							<span id="spanstrMensajenombre_recibo" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_2">
						<td id="td_title-numero_recibo" class="titulocampo">
							<label class="form-label">Numero Recibo.(*)</label>
						</td>
						<td id="td_control-numero_recibo" align="left" class="controlcampo">
							<input id="form-numero_recibo" name="form-numero_recibo" type="text" class="form-control"  placeholder="Numero Recibo"  title="Numero Recibo"    maxlength="19" size="10" >
							<span id="spanstrMensajenumero_recibo" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_3">
						<td id="td_title-incremento_recibo" class="titulocampo">
							<label class="form-label">Incremento Recibos.(*)</label>
						</td>
						<td id="td_control-incremento_recibo" align="left" class="controlcampo">
							<input id="form-incremento_recibo" name="form-incremento_recibo" type="text" class="form-control"  placeholder="Incremento Recibos"  title="Incremento Recibos"    maxlength="10" size="10" >
							<span id="spanstrMensajeincremento_recibo" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_4">
						<td id="td_title-con_impuesto_recibo" class="titulocampo">
							<label class="form-label">Con Impuesto Recibo</label>
						</td>
						<td id="td_control-con_impuesto_recibo" align="left" class="controlcampo">
							<input id="form-con_impuesto_recibo" name="form-con_impuesto_recibo" type="checkbox" >
							<span id="spanstrMensajecon_impuesto_recibo" class="mensajeerror"></span>
						</td>
					</tr>
				</table>
			</div>
				</td></tr>
				</table> <!-- tblElementosparametro_facturacion -->
				</div>

				<!-- SECCION/OCULTOS -->
				<table id="tblCamposOcultosparametro_facturacion" class="elementos" style="display: table-row;">
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
					
				</table> <!-- tblCamposOcultosparametro_facturacion -->

			</td></tr> <!-- trparametro_facturacionElementos -->
			</table> <!-- tblparametro_facturacionElementos -->
			</form> <!-- frmMantenimientoparametro_facturacion -->


			

				<form id="frmAccionesMantenimientoparametro_facturacion" name="frmAccionesMantenimientoparametro_facturacion">

			<?php if(parametro_facturacion_web::$STR_ES_BUSQUEDA=='false' ) {?>
			<table id="tblparametro_facturacionAcciones" class="elementos" style="text-align: center">
		<tr id="trparametro_facturacionAcciones" class="elementos" style="display:table-row">
			<td align="center">
				<a id="Acciones" ></a>

				<?php if(parametro_facturacion_web::$STR_ES_RELACIONES=='false' ) {?>
				<div align="right">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
				<?php } ?>

					<!-- SECCION/BOTONES -->
					<table id="tblAccionesMantenimientoparametro_facturacion" class="busqueda" style="width: 50%;text-align: left">

						<?php if(parametro_facturacion_web::$STR_ES_RELACIONES=='false' ) {?>
						<!--
						<caption class="busquedacabecera">
							<span>Acciones</span>
						</caption>
						-->
						<?php } ?>

						<tr id="trAccionesMantenimientoparametro_facturacionBasicos">
							<td id="tdbtnNuevoparametro_facturacion" style="visibility:visible">
								<div id="divNuevoparametro_facturacion" style="display:table-row">
									<input type="button" id="btnNuevoparametro_facturacion" name="btnNuevoparametro_facturacion" value="NUEVO" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnActualizarparametro_facturacion" style="visibility:visible">
								<div id="divActualizarparametro_facturacion" style="display:table-row">
									<input type="button" id="btnActualizarparametro_facturacion" name="btnActualizarparametro_facturacion" title="ACTUALIZAR Parametro Facturacion ACTUAL" value="Actualizar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnEliminarparametro_facturacion" style="visibility:visible">
								<div id="divEliminarparametro_facturacion" style="display:table-row">
									<input type="button" id="btnEliminarparametro_facturacion" name="btnEliminarparametro_facturacion" title="ELIMINAR Parametro Facturacion ACTUAL" value="Eliminar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnImprimirparametro_facturacion" style="visibility:visible">
								<input type="button" id="btnImprimirparametro_facturacion" name="btnImprimirparametro_facturacion" title="IMPRIMIR PAGINA Parametro Facturacion ACTUAL" value="Imp. Datos" class="btn btn-primary"/>
							</td>
							<td id="tdbtnCancelarparametro_facturacion" style="visibility:visible">
								<input type="button" id="btnCancelarparametro_facturacion" name="btnCancelarparametro_facturacion" title="CANCELAR Parametro Facturacion ACTUAL" value="Cancelar" class="btn btn-primary"/>
							</td>
						</tr>
						<tr id="trAccionesMantenimientoparametro_facturacionGuardar" style="display:none">
							<td id="tdbtnGuardarCambiosparametro_facturacion" colspan="4" align="center" style="visibility:visible">
								<div id="divGuardarCambiosparametro_facturacion" style="display:table-row">
									<input type="button" id="btnGuardarCambiosFormularioparametro_facturacion" name="btnGuardarCambiosFormularioparametro_facturacion" title="GUARDAR" value="GUADAR CAMBIOS" class="btn btn-primary"/>
								</div>
							</td>
						</tr>
					</table> <!-- tblAccionesMantenimientoparametro_facturacion -->
			</td>
		</tr> <!-- trparametro_facturacionAcciones -->
		<?php if(parametro_facturacion_web::$STR_ES_RELACIONADO=='false' ) {?>
		<tr id="trparametro_facturacionParametrosAcciones" class="impresion"  style="display:table-row">
			<td align="center">
				<!-- SECCION/POST -->
				<table id="tblparametro_facturacionParametrosAcciones" style="text-align: center;border: 0px solid black;padding: 0px; border-spacing: 0px">
					<caption class="busquedacabecera" style="padding: 0px;caption-side: top;">
						<span>Acciones Extra/Post</span>
					</caption>
					<tr id="trparametro_facturacionFilaParametrosAcciones">
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
				</table> <!-- tblparametro_facturacionParametrosAcciones -->
			</td>
		</tr> <!-- trparametro_facturacionParametrosAcciones -->
		<?php }?>
		<tr id="trparametro_facturacionMensajes" class="mensajes">
			<td align="center">
				<a id="Mensajes"></a>
			</td>
		</tr> <!-- trparametro_facturacionMensajes -->
			</table> <!-- tblparametro_facturacionAcciones -->
			<?php } ?>
			</form> <!-- frmMantenimientoparametro_facturacion -->
			</div> <!-- divMantenimientoparametro_facturacionAjaxWebPart -->
		</td>
	</tr> <!-- trparametro_facturacionElementosFormulario/super -->
		<?php if(parametro_facturacion_web::$STR_ES_RELACIONADO=='false' ) {?>

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
			
				import {parametro_facturacion_webcontrol,parametro_facturacion_webcontrol1} from './webroot/js/JavaScript/contabilidad/facturacion/parametro_facturacion/js/webcontrol/parametro_facturacion_form_webcontrol.js?random=1';
				
				parametro_facturacion_webcontrol1.setparametro_facturacion_constante(window.parametro_facturacion_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(parametro_facturacion_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

