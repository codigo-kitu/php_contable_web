<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\cuentascorrientes\beneficiario_ocacional_cheque\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Beneficiario Ocacional Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/cuentascorrientes/beneficiario_ocacional_cheque/util/beneficiario_ocacional_cheque_carga.php');
	use com\bydan\contabilidad\cuentascorrientes\beneficiario_ocacional_cheque\util\beneficiario_ocacional_cheque_carga;
	
	//include_once('com/bydan/contabilidad/cuentascorrientes/beneficiario_ocacional_cheque/presentation/view/beneficiario_ocacional_cheque_web.php');
	//use com\bydan\contabilidad\cuentascorrientes\beneficiario_ocacional_cheque\presentation\view\beneficiario_ocacional_cheque_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	beneficiario_ocacional_cheque_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	beneficiario_ocacional_cheque_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$beneficiario_ocacional_cheque_web1= new beneficiario_ocacional_cheque_web();	
	$beneficiario_ocacional_cheque_web1->cargarDatosGenerales();
	
	//$moduloActual=$beneficiario_ocacional_cheque_web1->moduloActual;
	//$usuarioActual=$beneficiario_ocacional_cheque_web1->usuarioActual;
	//$sessionBase=$beneficiario_ocacional_cheque_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$beneficiario_ocacional_cheque_web1->parametroGeneralUsuarioActual;
	
	
		
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
		
		
			<script type="module" src="webroot/js/JavaScript/contabilidad/cuentascorrientes/beneficiario_ocacional_cheque/js/util/beneficiario_ocacional_cheque_form_funcion.js?random=1"></script>
						
		
		
		<?php 
			
		
			beneficiario_ocacional_cheque_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					beneficiario_ocacional_cheque_web::$GET_POST=$_GET;
				} else {
					beneficiario_ocacional_cheque_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			beneficiario_ocacional_cheque_web::$STR_NOMBRE_PAGINA = 'beneficiario_ocacional_cheque_form_view.php';
			beneficiario_ocacional_cheque_web::$BIT_ES_PAGINA_PRINCIPAL = 'false';
			beneficiario_ocacional_cheque_web::$BIT_ES_PAGINA_FORM = 'true';
				
			beneficiario_ocacional_cheque_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {beneficiario_ocacional_cheque_constante,beneficiario_ocacional_cheque_constante1} from './webroot/js/JavaScript/contabilidad/cuentascorrientes/beneficiario_ocacional_cheque/js/util/beneficiario_ocacional_cheque_constante.js?random=1';
			import {beneficiario_ocacional_cheque_funcion,beneficiario_ocacional_cheque_funcion1} from './webroot/js/JavaScript/contabilidad/cuentascorrientes/beneficiario_ocacional_cheque/js/util/beneficiario_ocacional_cheque_funcion.js?random=1';
			
			let beneficiario_ocacional_cheque_constante2 = new beneficiario_ocacional_cheque_constante();
			
			beneficiario_ocacional_cheque_constante2.STR_NOMBRE_PAGINA="<?php echo(beneficiario_ocacional_cheque_web::$STR_NOMBRE_PAGINA); ?>";
			beneficiario_ocacional_cheque_constante2.STR_TYPE_ON_LOADbeneficiario_ocacional_cheque="<?php echo(beneficiario_ocacional_cheque_web::$STR_TYPE_ONLOAD); ?>";
			beneficiario_ocacional_cheque_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(beneficiario_ocacional_cheque_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			beneficiario_ocacional_cheque_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(beneficiario_ocacional_cheque_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			beneficiario_ocacional_cheque_constante2.STR_ACTION="<?php echo(beneficiario_ocacional_cheque_web::$STR_ACTION); ?>";
			beneficiario_ocacional_cheque_constante2.STR_ES_POPUP="<?php echo(beneficiario_ocacional_cheque_web::$STR_ES_POPUP); ?>";
			beneficiario_ocacional_cheque_constante2.STR_ES_BUSQUEDA="<?php echo(beneficiario_ocacional_cheque_web::$STR_ES_BUSQUEDA); ?>";
			beneficiario_ocacional_cheque_constante2.STR_FUNCION_JS="<?php echo(beneficiario_ocacional_cheque_web::$STR_FUNCION_JS); ?>";
			beneficiario_ocacional_cheque_constante2.BIG_ID_ACTUAL="<?php echo(beneficiario_ocacional_cheque_web::$BIG_ID_ACTUAL); ?>";
			beneficiario_ocacional_cheque_constante2.BIG_ID_OPCION="<?php echo(beneficiario_ocacional_cheque_web::$BIG_ID_OPCION); ?>";
			beneficiario_ocacional_cheque_constante2.STR_OBJETO_JS="<?php echo(beneficiario_ocacional_cheque_web::$STR_OBJETO_JS); ?>";
			beneficiario_ocacional_cheque_constante2.STR_ES_RELACIONES="<?php echo(beneficiario_ocacional_cheque_web::$STR_ES_RELACIONES); ?>";
			beneficiario_ocacional_cheque_constante2.STR_ES_RELACIONADO="<?php echo(beneficiario_ocacional_cheque_web::$STR_ES_RELACIONADO); ?>";
			beneficiario_ocacional_cheque_constante2.STR_ES_SUB_PAGINA="<?php echo(beneficiario_ocacional_cheque_web::$STR_ES_SUB_PAGINA); ?>";
			beneficiario_ocacional_cheque_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(beneficiario_ocacional_cheque_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			beneficiario_ocacional_cheque_constante2.BIT_ES_PAGINA_FORM=<?php echo(beneficiario_ocacional_cheque_web::$BIT_ES_PAGINA_FORM); ?>;
			beneficiario_ocacional_cheque_constante2.STR_SUFIJO="<?php echo(beneficiario_ocacional_cheque_web::$STR_SUF); ?>";//beneficiario_ocacional_cheque
			beneficiario_ocacional_cheque_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(beneficiario_ocacional_cheque_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//beneficiario_ocacional_cheque
			
			beneficiario_ocacional_cheque_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(beneficiario_ocacional_cheque_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			beneficiario_ocacional_cheque_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($beneficiario_ocacional_cheque_web1->moduloActual->getnombre()); ?>";
			beneficiario_ocacional_cheque_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(beneficiario_ocacional_cheque_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			beneficiario_ocacional_cheque_constante2.BIT_ES_LOAD_NORMAL=true;
			/*beneficiario_ocacional_cheque_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			beneficiario_ocacional_cheque_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.beneficiario_ocacional_cheque_constante2 = beneficiario_ocacional_cheque_constante2;
			
		</script>
		
		<?php if(beneficiario_ocacional_cheque_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.beneficiario_ocacional_cheque_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.beneficiario_ocacional_cheque_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="beneficiario_ocacional_chequeActual" ></a>
	
	<div id="divResumenbeneficiario_ocacional_chequeActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(beneficiario_ocacional_cheque_web::$STR_ES_RELACIONADO=='false') {?>
		
		<div id="header" >
		
			<div id="banner">
				<span id="spanTituloBanner" class="titulobanner"></span>
			</div> <!-- banner -->
					
			<div id="subheader" class="links">  
			
						
			</div> <!-- sub-header -->
			
			
		</div> <!-- header -->
		
		<?php } ?>
		
		<div id="main">
		

			<?php if(beneficiario_ocacional_cheque_web::$STR_ES_RELACIONADO=='false') {?>
			
			
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(beneficiario_ocacional_cheque_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(beneficiario_ocacional_cheque_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divbeneficiario_ocacional_chequePopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblbeneficiario_ocacional_chequePopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmbeneficiario_ocacional_chequeAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnbeneficiario_ocacional_chequeAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="beneficiario_ocacional_cheque_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnbeneficiario_ocacional_chequeAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmbeneficiario_ocacional_chequeAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblbeneficiario_ocacional_chequePopupAjaxWebPart -->
		</div> <!-- divbeneficiario_ocacional_chequePopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->		
		
		
		
			
<tr id="trbeneficiario_ocacional_chequeElementosFormulario">
	<td>
		<div id="divMantenimientobeneficiario_ocacional_chequeAjaxWebPart" title="BENEFICIARIO OCACIONAL" style="height: 90%;width: 90%;position: relative;top: 30px;left: 30px;">
			<form id="frmMantenimientobeneficiario_ocacional_cheque" name="frmMantenimientobeneficiario_ocacional_cheque">

			</br>

			<?php if(beneficiario_ocacional_cheque_web::$STR_ES_RELACIONES=='false' ) {?>
			</br>
			<?php } ?>

			<!-- SECCION/TOOLBAR -->
			<table id="tblbeneficiario_ocacional_chequeToolBarFormularioExterior" style="width: 65%">
				<tr style="display:table-row">
					<td align="center">

						<table id="tblbeneficiario_ocacional_chequeToolBarFormulario" style="text-align: center"  style="display:table-row">
							<tr>
								<td id="tdbeneficiario_ocacional_chequeActualizarToolBar" style="visibility:visible">
									<img id="imgActualizarToolBarbeneficiario_ocacional_cheque" name="imgActualizarToolBarbeneficiario_ocacional_cheque" title="ACTUALIZAR Beneficiario Ocacional ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/actualizar.gif" width="25" height="25"/>
								</td>
								<td id="tdbeneficiario_ocacional_chequeEliminarToolBar" style="visibility:visible">
									<img id="imgEliminarToolBarbeneficiario_ocacional_cheque" name="imgEliminarToolBarbeneficiario_ocacional_cheque" title="ELIMINAR Beneficiario Ocacional ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/eliminar.gif" width="25" height="25"/>
								</td>
								<td id="tdbeneficiario_ocacional_chequeCancelarToolBar" style="visibility:visible">
									<img id="imgCancelarToolBarbeneficiario_ocacional_cheque" name="imgCancelarToolBarbeneficiario_ocacional_cheque" title="CANCELAR Beneficiario Ocacional ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/cancelar.gif" width="25" height="25"/>
								</td>
								<td id="tdbeneficiario_ocacional_chequeRelacionesToolBar" style="display:table-row">
									<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/xexpand.png" width="25" height="25" onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('tblCamposOcultosbeneficiario_ocacional_cheque',this,'../')"/>
								</td>
							</tr>
						</table> <!-- tblbeneficiario_ocacional_chequeToolBarFormulario -->

					</td>
				</tr>
			</table> <!-- tblbeneficiario_ocacional_chequeToolBarFormularioExterior -->

			<table id="tblbeneficiario_ocacional_chequeElementos">
			<tr id="trbeneficiario_ocacional_chequeElementos" class="elementos" style="display:table-row">
			<td align="center">

			<a id="Campos"></a>

				<?php if(beneficiario_ocacional_cheque_web::$STR_ES_RELACIONES=='false' ) {?>
				<div id="divFlechaArribaElementos" align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
					<span></span>
				</div>
				<?php } ?>

				<!-- SECCION/FORMULARIO -->
				<table id="tblElementosbeneficiario_ocacional_cheque" class="elementos" style="width: 350px; padding: 0px; border-spacing: 0px; border-collapse: collapse; text-align: left;">
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
					
						<td id="td_title-codigo" class="titulocampo">
							<label class="form-label">Codigo Beneficiario.(*)</label>
						</td>
						<td id="td_control-codigo" align="left" class="controlcampo">
							<input id="form-codigo" name="form-codigo" type="text" class="form-control"  placeholder="Codigo Beneficiario"  title="Codigo Beneficiario"    size="10"  maxlength="10"/>
							<span id="spanstrMensajecodigo" class="mensajeerror"></span>
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
					
					
						<td id="td_title-direccion_1" class="titulocampo">
							<label class="form-label">Direccion 1.(*)</label>
						</td>
						<td id="td_control-direccion_1" align="left" class="controlcampo">
							<textarea id="form-direccion_1" name="form-direccion_1" class="form-control"  placeholder="Direccion 1"  title="Direccion 1"   style="font-size: 13px;" rows="2" cols="25" size="20" ></textarea>
							<span id="spanstrMensajedireccion_1" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_3">
						<td id="td_title-direccion_2" class="titulocampo">
							<label class="form-label">Direccion 2</label>
						</td>
						<td id="td_control-direccion_2" align="left" class="controlcampo">
							<textarea id="form-direccion_2" name="form-direccion_2" class="form-control"  placeholder="Direccion 2"  title="Direccion 2"   style="font-size: 13px;" rows="2" cols="25" size="20" ></textarea>
							<span id="spanstrMensajedireccion_2" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-direccion_3" class="titulocampo">
							<label class="form-label">Direccion 3</label>
						</td>
						<td id="td_control-direccion_3" align="left" class="controlcampo">
							<textarea id="form-direccion_3" name="form-direccion_3" class="form-control"  placeholder="Direccion 3"  title="Direccion 3"   style="font-size: 13px;" rows="2" cols="25" size="20" ></textarea>
							<span id="spanstrMensajedireccion_3" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_4">
						<td id="td_title-telefono" class="titulocampo">
							<label class="form-label">Telefono</label>
						</td>
						<td id="td_control-telefono" align="left" class="controlcampo">
							<input id="form-telefono" name="form-telefono" type="text" class="form-control"  placeholder="Telefono"  title="Telefono"    size="15"  maxlength="15"/>
							<span id="spanstrMensajetelefono" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-telefono_movil" class="titulocampo">
							<label class="form-label">Telefono Movil.(*)</label>
						</td>
						<td id="td_control-telefono_movil" align="left" class="controlcampo">
							<input id="form-telefono_movil" name="form-telefono_movil" type="text" class="form-control"  placeholder="Telefono Movil"  title="Telefono Movil"    size="20"  maxlength="20"/>
							<span id="spanstrMensajetelefono_movil" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_5">
						<td id="td_title-email" class="titulocampo">
							<label class="form-label">Email.(*)</label>
						</td>
						<td id="td_control-email" align="left" class="controlcampo">
							<textarea id="form-email" name="form-email" class="form-control"  placeholder="Email"  title="Email"   style="font-size: 13px;" rows="2" cols="25" size="20" ></textarea>
							<span id="spanstrMensajeemail" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-notas" class="titulocampo">
							<label class="form-label">Notas</label>
						</td>
						<td id="td_control-notas" align="left" class="controlcampo">
							<textarea id="form-notas" name="form-notas" class="form-control"  placeholder="Notas"  title="Notas"   style="font-size: 13px;"  rows ="0" cols= "25"></textarea>
							<span id="spanstrMensajenotas" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_6">
						<td id="td_title-registro_ocacional" class="titulocampo">
							<label class="form-label">Registro Ocacional</label>
						</td>
						<td id="td_control-registro_ocacional" align="left" class="controlcampo">
							<textarea id="form-registro_ocacional" name="form-registro_ocacional" class="form-control"  placeholder="Registro Ocacional"  title="Registro Ocacional"   style="font-size: 13px;" rows="2" cols="25" size="20" ></textarea>
							<span id="spanstrMensajeregistro_ocacional" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-registro_tributario" class="titulocampo">
							<label class="form-label">Registro Tributario</label>
						</td>
						<td id="td_control-registro_tributario" align="left" class="controlcampo">
							<input id="form-registro_tributario" name="form-registro_tributario" type="text" class="form-control"  placeholder="Registro Tributario"  title="Registro Tributario"    size="20"  maxlength="30"/>
							<span id="spanstrMensajeregistro_tributario" class="mensajeerror"></span>
						</td>
					</tr>
				</table> <!-- tblElementosbeneficiario_ocacional_cheque -->

				<!-- SECCION/OCULTOS -->
				<table id="tblCamposOcultosbeneficiario_ocacional_cheque" class="elementos" style="display: table-row;">
					<caption class="busquedacabecera">
						<span>Campos Ocultos</span>
					</caption>
				</table> <!-- tblCamposOcultosbeneficiario_ocacional_cheque -->

			</td></tr> <!-- trbeneficiario_ocacional_chequeElementos -->
			</table> <!-- tblbeneficiario_ocacional_chequeElementos -->
			</form> <!-- frmMantenimientobeneficiario_ocacional_cheque -->


			

				<form id="frmAccionesMantenimientobeneficiario_ocacional_cheque" name="frmAccionesMantenimientobeneficiario_ocacional_cheque">

			<?php if(beneficiario_ocacional_cheque_web::$STR_ES_BUSQUEDA=='false' ) {?>
			<table id="tblbeneficiario_ocacional_chequeAcciones" class="elementos" style="text-align: center">
		<tr id="trbeneficiario_ocacional_chequeAcciones" class="elementos" style="display:table-row">
			<td align="center">
				<a id="Acciones" ></a>

				<?php if(beneficiario_ocacional_cheque_web::$STR_ES_RELACIONES=='false' ) {?>
				<div align="right">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
				<?php } ?>

					<!-- SECCION/BOTONES -->
					<table id="tblAccionesMantenimientobeneficiario_ocacional_cheque" class="busqueda" style="width: 50%;text-align: left">

						<?php if(beneficiario_ocacional_cheque_web::$STR_ES_RELACIONES=='false' ) {?>
						<!--
						<caption class="busquedacabecera">
							<span>Acciones</span>
						</caption>
						-->
						<?php } ?>

						<tr id="trAccionesMantenimientobeneficiario_ocacional_chequeBasicos">
							<td id="tdbtnNuevobeneficiario_ocacional_cheque" style="visibility:visible">
								<div id="divNuevobeneficiario_ocacional_cheque" style="display:table-row">
									<input type="button" id="btnNuevobeneficiario_ocacional_cheque" name="btnNuevobeneficiario_ocacional_cheque" value="NUEVO" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnActualizarbeneficiario_ocacional_cheque" style="visibility:visible">
								<div id="divActualizarbeneficiario_ocacional_cheque" style="display:table-row">
									<input type="button" id="btnActualizarbeneficiario_ocacional_cheque" name="btnActualizarbeneficiario_ocacional_cheque" title="ACTUALIZAR Beneficiario Ocacional ACTUAL" value="Actualizar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnEliminarbeneficiario_ocacional_cheque" style="visibility:visible">
								<div id="divEliminarbeneficiario_ocacional_cheque" style="display:table-row">
									<input type="button" id="btnEliminarbeneficiario_ocacional_cheque" name="btnEliminarbeneficiario_ocacional_cheque" title="ELIMINAR Beneficiario Ocacional ACTUAL" value="Eliminar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnImprimirbeneficiario_ocacional_cheque" style="visibility:visible">
								<input type="button" id="btnImprimirbeneficiario_ocacional_cheque" name="btnImprimirbeneficiario_ocacional_cheque" title="IMPRIMIR PAGINA Beneficiario Ocacional ACTUAL" value="Imp. Datos" class="btn btn-primary"/>
							</td>
							<td id="tdbtnCancelarbeneficiario_ocacional_cheque" style="visibility:visible">
								<input type="button" id="btnCancelarbeneficiario_ocacional_cheque" name="btnCancelarbeneficiario_ocacional_cheque" title="CANCELAR Beneficiario Ocacional ACTUAL" value="Cancelar" class="btn btn-primary"/>
							</td>
						</tr>
						<tr id="trAccionesMantenimientobeneficiario_ocacional_chequeGuardar" style="display:none">
							<td id="tdbtnGuardarCambiosbeneficiario_ocacional_cheque" colspan="4" align="center" style="visibility:visible">
								<div id="divGuardarCambiosbeneficiario_ocacional_cheque" style="display:table-row">
									<input type="button" id="btnGuardarCambiosFormulariobeneficiario_ocacional_cheque" name="btnGuardarCambiosFormulariobeneficiario_ocacional_cheque" title="GUARDAR" value="GUADAR CAMBIOS" class="btn btn-primary"/>
								</div>
							</td>
						</tr>
					</table> <!-- tblAccionesMantenimientobeneficiario_ocacional_cheque -->
			</td>
		</tr> <!-- trbeneficiario_ocacional_chequeAcciones -->
		<?php if(beneficiario_ocacional_cheque_web::$STR_ES_RELACIONADO=='false' ) {?>
		<tr id="trbeneficiario_ocacional_chequeParametrosAcciones" class="impresion"  style="display:table-row">
			<td align="center">
				<!-- SECCION/POST -->
				<table id="tblbeneficiario_ocacional_chequeParametrosAcciones" style="text-align: center;border: 0px solid black;padding: 0px; border-spacing: 0px">
					<caption class="busquedacabecera" style="padding: 0px;caption-side: top;">
						<span>Acciones Extra/Post</span>
					</caption>
					<tr id="trbeneficiario_ocacional_chequeFilaParametrosAcciones">
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
				</table> <!-- tblbeneficiario_ocacional_chequeParametrosAcciones -->
			</td>
		</tr> <!-- trbeneficiario_ocacional_chequeParametrosAcciones -->
		<?php }?>
		<tr id="trbeneficiario_ocacional_chequeMensajes" class="mensajes">
			<td align="center">
				<a id="Mensajes"></a>
			</td>
		</tr> <!-- trbeneficiario_ocacional_chequeMensajes -->
			</table> <!-- tblbeneficiario_ocacional_chequeAcciones -->
			<?php } ?>
			</form> <!-- frmMantenimientobeneficiario_ocacional_cheque -->
			</div> <!-- divMantenimientobeneficiario_ocacional_chequeAjaxWebPart -->
		</td>
	</tr> <!-- trbeneficiario_ocacional_chequeElementosFormulario/super -->
		<?php if(beneficiario_ocacional_cheque_web::$STR_ES_RELACIONADO=='false' ) {?>

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
			
				import {beneficiario_ocacional_cheque_webcontrol,beneficiario_ocacional_cheque_webcontrol1} from './webroot/js/JavaScript/contabilidad/cuentascorrientes/beneficiario_ocacional_cheque/js/webcontrol/beneficiario_ocacional_cheque_form_webcontrol.js?random=1';
				
				beneficiario_ocacional_cheque_webcontrol1.setbeneficiario_ocacional_cheque_constante(window.beneficiario_ocacional_cheque_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(beneficiario_ocacional_cheque_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

