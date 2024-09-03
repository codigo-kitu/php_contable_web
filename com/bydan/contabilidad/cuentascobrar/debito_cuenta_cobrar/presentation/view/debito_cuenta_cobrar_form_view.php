<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\cuentascobrar\debito_cuenta_cobrar\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Debito Cuenta Cobrar Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/cuentascobrar/debito_cuenta_cobrar/util/debito_cuenta_cobrar_carga.php');
	use com\bydan\contabilidad\cuentascobrar\debito_cuenta_cobrar\util\debito_cuenta_cobrar_carga;
	
	//include_once('com/bydan/contabilidad/cuentascobrar/debito_cuenta_cobrar/presentation/view/debito_cuenta_cobrar_web.php');
	//use com\bydan\contabilidad\cuentascobrar\debito_cuenta_cobrar\presentation\view\debito_cuenta_cobrar_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	debito_cuenta_cobrar_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	debito_cuenta_cobrar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$debito_cuenta_cobrar_web1= new debito_cuenta_cobrar_web();	
	$debito_cuenta_cobrar_web1->cargarDatosGenerales();
	
	//$moduloActual=$debito_cuenta_cobrar_web1->moduloActual;
	//$usuarioActual=$debito_cuenta_cobrar_web1->usuarioActual;
	//$sessionBase=$debito_cuenta_cobrar_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$debito_cuenta_cobrar_web1->parametroGeneralUsuarioActual;
	
	
		
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
		
		
			<script type="module" src="webroot/js/JavaScript/contabilidad/cuentascobrar/debito_cuenta_cobrar/js/util/debito_cuenta_cobrar_form_funcion.js?random=1"></script>
						
		
		
		<?php 
			
		
			debito_cuenta_cobrar_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					debito_cuenta_cobrar_web::$GET_POST=$_GET;
				} else {
					debito_cuenta_cobrar_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			debito_cuenta_cobrar_web::$STR_NOMBRE_PAGINA = 'debito_cuenta_cobrar_form_view.php';
			debito_cuenta_cobrar_web::$BIT_ES_PAGINA_PRINCIPAL = 'false';
			debito_cuenta_cobrar_web::$BIT_ES_PAGINA_FORM = 'true';
				
			debito_cuenta_cobrar_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {debito_cuenta_cobrar_constante,debito_cuenta_cobrar_constante1} from './webroot/js/JavaScript/contabilidad/cuentascobrar/debito_cuenta_cobrar/js/util/debito_cuenta_cobrar_constante.js?random=1';
			import {debito_cuenta_cobrar_funcion,debito_cuenta_cobrar_funcion1} from './webroot/js/JavaScript/contabilidad/cuentascobrar/debito_cuenta_cobrar/js/util/debito_cuenta_cobrar_funcion.js?random=1';
			
			let debito_cuenta_cobrar_constante2 = new debito_cuenta_cobrar_constante();
			
			debito_cuenta_cobrar_constante2.STR_NOMBRE_PAGINA="<?php echo(debito_cuenta_cobrar_web::$STR_NOMBRE_PAGINA); ?>";
			debito_cuenta_cobrar_constante2.STR_TYPE_ON_LOADdebito_cuenta_cobrar="<?php echo(debito_cuenta_cobrar_web::$STR_TYPE_ONLOAD); ?>";
			debito_cuenta_cobrar_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(debito_cuenta_cobrar_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			debito_cuenta_cobrar_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(debito_cuenta_cobrar_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			debito_cuenta_cobrar_constante2.STR_ACTION="<?php echo(debito_cuenta_cobrar_web::$STR_ACTION); ?>";
			debito_cuenta_cobrar_constante2.STR_ES_POPUP="<?php echo(debito_cuenta_cobrar_web::$STR_ES_POPUP); ?>";
			debito_cuenta_cobrar_constante2.STR_ES_BUSQUEDA="<?php echo(debito_cuenta_cobrar_web::$STR_ES_BUSQUEDA); ?>";
			debito_cuenta_cobrar_constante2.STR_FUNCION_JS="<?php echo(debito_cuenta_cobrar_web::$STR_FUNCION_JS); ?>";
			debito_cuenta_cobrar_constante2.BIG_ID_ACTUAL="<?php echo(debito_cuenta_cobrar_web::$BIG_ID_ACTUAL); ?>";
			debito_cuenta_cobrar_constante2.BIG_ID_OPCION="<?php echo(debito_cuenta_cobrar_web::$BIG_ID_OPCION); ?>";
			debito_cuenta_cobrar_constante2.STR_OBJETO_JS="<?php echo(debito_cuenta_cobrar_web::$STR_OBJETO_JS); ?>";
			debito_cuenta_cobrar_constante2.STR_ES_RELACIONES="<?php echo(debito_cuenta_cobrar_web::$STR_ES_RELACIONES); ?>";
			debito_cuenta_cobrar_constante2.STR_ES_RELACIONADO="<?php echo(debito_cuenta_cobrar_web::$STR_ES_RELACIONADO); ?>";
			debito_cuenta_cobrar_constante2.STR_ES_SUB_PAGINA="<?php echo(debito_cuenta_cobrar_web::$STR_ES_SUB_PAGINA); ?>";
			debito_cuenta_cobrar_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(debito_cuenta_cobrar_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			debito_cuenta_cobrar_constante2.BIT_ES_PAGINA_FORM=<?php echo(debito_cuenta_cobrar_web::$BIT_ES_PAGINA_FORM); ?>;
			debito_cuenta_cobrar_constante2.STR_SUFIJO="<?php echo(debito_cuenta_cobrar_web::$STR_SUF); ?>";//debito_cuenta_cobrar
			debito_cuenta_cobrar_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(debito_cuenta_cobrar_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//debito_cuenta_cobrar
			
			debito_cuenta_cobrar_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(debito_cuenta_cobrar_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			debito_cuenta_cobrar_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($debito_cuenta_cobrar_web1->moduloActual->getnombre()); ?>";
			debito_cuenta_cobrar_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(debito_cuenta_cobrar_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			debito_cuenta_cobrar_constante2.BIT_ES_LOAD_NORMAL=true;
			/*debito_cuenta_cobrar_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			debito_cuenta_cobrar_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.debito_cuenta_cobrar_constante2 = debito_cuenta_cobrar_constante2;
			
		</script>
		
		<?php if(debito_cuenta_cobrar_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.debito_cuenta_cobrar_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.debito_cuenta_cobrar_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="debito_cuenta_cobrarActual" ></a>
	
	<div id="divResumendebito_cuenta_cobrarActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(debito_cuenta_cobrar_web::$STR_ES_RELACIONADO=='false') {?>
		
		<div id="header" >
		
			<div id="banner">
				<span id="spanTituloBanner" class="titulobanner"></span>
			</div> <!-- banner -->
					
			<div id="subheader" class="links">  
			
						
			</div> <!-- sub-header -->
			
			
		</div> <!-- header -->
		
		<?php } ?>
		
		<div id="main">
		

			<?php if(debito_cuenta_cobrar_web::$STR_ES_RELACIONADO=='false') {?>
			
			
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(debito_cuenta_cobrar_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(debito_cuenta_cobrar_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divdebito_cuenta_cobrarPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tbldebito_cuenta_cobrarPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmdebito_cuenta_cobrarAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btndebito_cuenta_cobrarAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="debito_cuenta_cobrar_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btndebito_cuenta_cobrarAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmdebito_cuenta_cobrarAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tbldebito_cuenta_cobrarPopupAjaxWebPart -->
		</div> <!-- divdebito_cuenta_cobrarPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->		
		
		
		
			
<tr id="trdebito_cuenta_cobrarElementosFormulario">
	<td>
		<div id="divMantenimientodebito_cuenta_cobrarAjaxWebPart" title="DEBITO CUENTA COBRAR" style="height: 90%;width: 90%;position: relative;top: 30px;left: 30px;">
			<form id="frmMantenimientodebito_cuenta_cobrar" name="frmMantenimientodebito_cuenta_cobrar">

			</br>

			<?php if(debito_cuenta_cobrar_web::$STR_ES_RELACIONES=='false' ) {?>
			</br>
			<?php } ?>

			<!-- SECCION/TOOLBAR -->
			<table id="tbldebito_cuenta_cobrarToolBarFormularioExterior" style="width: 65%">
				<tr style="display:table-row">
					<td align="center">

						<table id="tbldebito_cuenta_cobrarToolBarFormulario" style="text-align: center"  style="display:table-row">
							<tr>
								<td id="tddebito_cuenta_cobrarActualizarToolBar" style="visibility:visible">
									<img id="imgActualizarToolBardebito_cuenta_cobrar" name="imgActualizarToolBardebito_cuenta_cobrar" title="ACTUALIZAR Debito Cuenta Cobrar ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/actualizar.gif" width="25" height="25"/>
								</td>
								<td id="tddebito_cuenta_cobrarEliminarToolBar" style="visibility:visible">
									<img id="imgEliminarToolBardebito_cuenta_cobrar" name="imgEliminarToolBardebito_cuenta_cobrar" title="ELIMINAR Debito Cuenta Cobrar ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/eliminar.gif" width="25" height="25"/>
								</td>
								<td id="tddebito_cuenta_cobrarCancelarToolBar" style="visibility:visible">
									<img id="imgCancelarToolBardebito_cuenta_cobrar" name="imgCancelarToolBardebito_cuenta_cobrar" title="CANCELAR Debito Cuenta Cobrar ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/cancelar.gif" width="25" height="25"/>
								</td>
								<td id="tddebito_cuenta_cobrarRelacionesToolBar" style="display:table-row">
									<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/xexpand.png" width="25" height="25" onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('tblCamposOcultosdebito_cuenta_cobrar',this,'../')"/>
								</td>
							</tr>
						</table> <!-- tbldebito_cuenta_cobrarToolBarFormulario -->

					</td>
				</tr>
			</table> <!-- tbldebito_cuenta_cobrarToolBarFormularioExterior -->

			<table id="tbldebito_cuenta_cobrarElementos">
			<tr id="trdebito_cuenta_cobrarElementos" class="elementos" style="display:table-row">
			<td align="center">

			<a id="Campos"></a>

				<?php if(debito_cuenta_cobrar_web::$STR_ES_RELACIONES=='false' ) {?>
				<div id="divFlechaArribaElementos" align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
					<span></span>
				</div>
				<?php } ?>

				<!-- SECCION/FORMULARIO -->
				<table id="tblElementosdebito_cuenta_cobrar" class="elementos" style="width: 400px; padding: 0px; border-spacing: 0px; border-collapse: collapse; text-align: left;">
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
						<td id="td_title-id_cuenta_cobrar" class="titulocampo">
							<label class="form-label"> Cuenta Cobrar.(*)</label>
						</td>
						<td id="td_control-id_cuenta_cobrar" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_cuenta_cobrar" name="form-id_cuenta_cobrar" title=" Cuenta Cobrar" ></select></td>
									<td><a><img id="form-id_cuenta_cobrar_img" name="form-id_cuenta_cobrar_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_cuenta_cobrar_img_busqueda" name="form-id_cuenta_cobrar_img_busqueda" title="Buscar Cuenta Cobrar" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_cuenta_cobrar" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_5">
						<td id="td_title-numero" class="titulocampo">
							<label class="form-label">Numero.(*)</label>
						</td>
						<td id="td_control-numero" align="left" class="controlcampo">
							<input id="form-numero" name="form-numero" type="text" class="form-control"  placeholder="Numero"  title="Numero"    size="12"  maxlength="12"/>
							<span id="spanstrMensajenumero" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_6">
						<td id="td_title-fecha_emision" class="titulocampo">
							<label class="form-label">Fecha Emision.(*)</label>
						</td>
						<td id="td_control-fecha_emision" align="left" class="controlcampo">
							<input id="form-fecha_emision" name="form-fecha_emision" type="text" class="form-control"  placeholder="Fecha Emision"  title="Fecha Emision"    size="10" >
							<span id="spanstrMensajefecha_emision" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_7">
						<td id="td_title-fecha_vence" class="titulocampo">
							<label class="form-label">Fecha Vence.(*)</label>
						</td>
						<td id="td_control-fecha_vence" align="left" class="controlcampo">
							<input id="form-fecha_vence" name="form-fecha_vence" type="text" class="form-control"  placeholder="Fecha Vence"  title="Fecha Vence"    size="10" >
							<span id="spanstrMensajefecha_vence" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_8">
						<td id="td_title-id_termino_pago_cliente" class="titulocampo">
							<label class="form-label"> Termino Pago Cliente.(*)</label>
						</td>
						<td id="td_control-id_termino_pago_cliente" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_termino_pago_cliente" name="form-id_termino_pago_cliente" title=" Termino Pago Cliente" ></select></td>
									<td><a><img id="form-id_termino_pago_cliente_img" name="form-id_termino_pago_cliente_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_termino_pago_cliente_img_busqueda" name="form-id_termino_pago_cliente_img_busqueda" title="Buscar Terminos Pago Cliente" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_termino_pago_cliente" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_9">
						<td id="td_title-monto" class="titulocampo">
							<label class="form-label">Monto.(*)</label>
						</td>
						<td id="td_control-monto" align="left" class="controlcampo">
							<input id="form-monto" name="form-monto" type="text" class="form-control"  placeholder="Monto"  title="Monto"    maxlength="18" size="12" >
							<span id="spanstrMensajemonto" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_10">
						<td id="td_title-saldo" class="titulocampo">
							<label class="form-label">Saldo.(*)</label>
						</td>
						<td id="td_control-saldo" align="left" class="controlcampo">
							<input id="form-saldo" name="form-saldo" type="text" class="form-control"  placeholder="Saldo"  title="Saldo"    maxlength="18" size="12"  readonly="readonly">
							<span id="spanstrMensajesaldo" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_11">
						<td id="td_title-descripcion" class="titulocampo">
							<label class="form-label">Descripcion</label>
						</td>
						<td id="td_control-descripcion" align="left" class="controlcampo">
							<textarea id="form-descripcion" name="form-descripcion" class="form-control"  placeholder="Descripcion"  title="Descripcion"   style="font-size: 13px;"  rows ="0" cols= "25"></textarea>
							<span id="spanstrMensajedescripcion" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_12">
						<td id="td_title-sub_total" class="titulocampo">
							<label class="form-label">Sub Total.(*)</label>
						</td>
						<td id="td_control-sub_total" align="left" class="controlcampo">
							<input id="form-sub_total" name="form-sub_total" type="text" class="form-control"  placeholder="Sub Total"  title="Sub Total"    maxlength="18" size="12" >
							<span id="spanstrMensajesub_total" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_13">
						<td id="td_title-iva" class="titulocampo">
							<label class="form-label">Iva.(*)</label>
						</td>
						<td id="td_control-iva" align="left" class="controlcampo">
							<input id="form-iva" name="form-iva" type="text" class="form-control"  placeholder="Iva"  title="Iva"    maxlength="18" size="12" >
							<span id="spanstrMensajeiva" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_14">
						<td id="td_title-es_balance_inicial" class="titulocampo">
							<label class="form-label">Es Balance Inicial</label>
						</td>
						<td id="td_control-es_balance_inicial" align="left" class="controlcampo">
							<input id="form-es_balance_inicial" name="form-es_balance_inicial" type="checkbox"  disabled="disabled">
							<span id="spanstrMensajees_balance_inicial" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_15">
						<td id="td_title-id_estado" class="titulocampo">
							<label class="form-label"> Estado.(*)</label>
						</td>
						<td id="td_control-id_estado" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_estado" name="form-id_estado" title=" Estado" ></select></td>
									<td><img id="form-id_estado_img_busqueda" name="form-id_estado_img_busqueda" title="Buscar Estado" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_estado" class="mensajeerror"></span>
						</td>
					</tr>
				</table> <!-- tblElementosdebito_cuenta_cobrar -->

				<!-- SECCION/OCULTOS -->
				<table id="tblCamposOcultosdebito_cuenta_cobrar" class="elementos" style="display: table-row;">
					<caption class="busquedacabecera">
						<span>Campos Ocultos</span>
					</caption>
					
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
					
					<tr id="tr_fila_1">
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
					<tr id="tr_fila_2">
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
					<tr id="tr_fila_3">
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
					<tr id="tr_fila_4">
						<td id="td_title-id_usuario" class="titulocampo">
							<label class="form-label"> Usuario.(*)</label>
						</td>
						<td id="td_control-id_usuario" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_usuario" name="form-id_usuario" title=" Usuario" ></select></td>
									<td><a><img id="form-id_usuario_img" name="form-id_usuario_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_usuario_img_busqueda" name="form-id_usuario_img_busqueda" title="Buscar Usuario" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_usuario" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_5">
						<td id="td_title-referencia" class="titulocampo">
							<label class="form-label">Referencia</label>
						</td>
						<td id="td_control-referencia" align="left" class="controlcampo">
							<input id="form-referencia" name="form-referencia" type="text" class="form-control"  placeholder="Referencia"  title="Referencia"    size="20"  maxlength="25"/>
							<span id="spanstrMensajereferencia" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_6">
						<td id="td_title-debito" class="titulocampo">
							<label class="form-label">Debito.(*)</label>
						</td>
						<td id="td_control-debito" align="left" class="controlcampo">
							<input id="form-debito" name="form-debito" type="text" class="form-control"  placeholder="Debito"  title="Debito"    maxlength="18" size="12" >
							<span id="spanstrMensajedebito" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_7">
						<td id="td_title-credito" class="titulocampo">
							<label class="form-label">Credito.(*)</label>
						</td>
						<td id="td_control-credito" align="left" class="controlcampo">
							<input id="form-credito" name="form-credito" type="text" class="form-control"  placeholder="Credito"  title="Credito"    maxlength="18" size="12" >
							<span id="spanstrMensajecredito" class="mensajeerror"></span>
						</td>
					</tr>
				</table> <!-- tblCamposOcultosdebito_cuenta_cobrar -->

			</td></tr> <!-- trdebito_cuenta_cobrarElementos -->
			</table> <!-- tbldebito_cuenta_cobrarElementos -->
			</form> <!-- frmMantenimientodebito_cuenta_cobrar -->


			

				<form id="frmAccionesMantenimientodebito_cuenta_cobrar" name="frmAccionesMantenimientodebito_cuenta_cobrar">

			<?php if(debito_cuenta_cobrar_web::$STR_ES_BUSQUEDA=='false' ) {?>
			<table id="tbldebito_cuenta_cobrarAcciones" class="elementos" style="text-align: center">
		<tr id="trdebito_cuenta_cobrarAcciones" class="elementos" style="display:table-row">
			<td align="center">
				<a id="Acciones" ></a>

				<?php if(debito_cuenta_cobrar_web::$STR_ES_RELACIONES=='false' ) {?>
				<div align="right">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
				<?php } ?>

					<!-- SECCION/BOTONES -->
					<table id="tblAccionesMantenimientodebito_cuenta_cobrar" class="busqueda" style="width: 50%;text-align: left">

						<?php if(debito_cuenta_cobrar_web::$STR_ES_RELACIONES=='false' ) {?>
						<!--
						<caption class="busquedacabecera">
							<span>Acciones</span>
						</caption>
						-->
						<?php } ?>

						<tr id="trAccionesMantenimientodebito_cuenta_cobrarBasicos">
							<td id="tdbtnNuevodebito_cuenta_cobrar" style="visibility:visible">
								<div id="divNuevodebito_cuenta_cobrar" style="display:table-row">
									<input type="button" id="btnNuevodebito_cuenta_cobrar" name="btnNuevodebito_cuenta_cobrar" value="NUEVO" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnActualizardebito_cuenta_cobrar" style="visibility:visible">
								<div id="divActualizardebito_cuenta_cobrar" style="display:table-row">
									<input type="button" id="btnActualizardebito_cuenta_cobrar" name="btnActualizardebito_cuenta_cobrar" title="ACTUALIZAR Debito Cuenta Cobrar ACTUAL" value="Actualizar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnEliminardebito_cuenta_cobrar" style="visibility:visible">
								<div id="divEliminardebito_cuenta_cobrar" style="display:table-row">
									<input type="button" id="btnEliminardebito_cuenta_cobrar" name="btnEliminardebito_cuenta_cobrar" title="ELIMINAR Debito Cuenta Cobrar ACTUAL" value="Eliminar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnImprimirdebito_cuenta_cobrar" style="visibility:visible">
								<input type="button" id="btnImprimirdebito_cuenta_cobrar" name="btnImprimirdebito_cuenta_cobrar" title="IMPRIMIR PAGINA Debito Cuenta Cobrar ACTUAL" value="Imp. Datos" class="btn btn-primary"/>
							</td>
							<td id="tdbtnCancelardebito_cuenta_cobrar" style="visibility:visible">
								<input type="button" id="btnCancelardebito_cuenta_cobrar" name="btnCancelardebito_cuenta_cobrar" title="CANCELAR Debito Cuenta Cobrar ACTUAL" value="Cancelar" class="btn btn-primary"/>
							</td>
						</tr>
						<tr id="trAccionesMantenimientodebito_cuenta_cobrarGuardar" style="display:none">
							<td id="tdbtnGuardarCambiosdebito_cuenta_cobrar" colspan="4" align="center" style="visibility:visible">
								<div id="divGuardarCambiosdebito_cuenta_cobrar" style="display:table-row">
									<input type="button" id="btnGuardarCambiosFormulariodebito_cuenta_cobrar" name="btnGuardarCambiosFormulariodebito_cuenta_cobrar" title="GUARDAR" value="GUADAR CAMBIOS" class="btn btn-primary"/>
								</div>
							</td>
						</tr>
					</table> <!-- tblAccionesMantenimientodebito_cuenta_cobrar -->
			</td>
		</tr> <!-- trdebito_cuenta_cobrarAcciones -->
		<?php if(debito_cuenta_cobrar_web::$STR_ES_RELACIONADO=='false' ) {?>
		<tr id="trdebito_cuenta_cobrarParametrosAcciones" class="impresion"  style="display:table-row">
			<td align="center">
				<!-- SECCION/POST -->
				<table id="tbldebito_cuenta_cobrarParametrosAcciones" style="text-align: center;border: 0px solid black;padding: 0px; border-spacing: 0px">
					<caption class="busquedacabecera" style="padding: 0px;caption-side: top;">
						<span>Acciones Extra/Post</span>
					</caption>
					<tr id="trdebito_cuenta_cobrarFilaParametrosAcciones">
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
				</table> <!-- tbldebito_cuenta_cobrarParametrosAcciones -->
			</td>
		</tr> <!-- trdebito_cuenta_cobrarParametrosAcciones -->
		<?php }?>
		<tr id="trdebito_cuenta_cobrarMensajes" class="mensajes">
			<td align="center">
				<a id="Mensajes"></a>
			</td>
		</tr> <!-- trdebito_cuenta_cobrarMensajes -->
			</table> <!-- tbldebito_cuenta_cobrarAcciones -->
			<?php } ?>
			</form> <!-- frmMantenimientodebito_cuenta_cobrar -->
			</div> <!-- divMantenimientodebito_cuenta_cobrarAjaxWebPart -->
		</td>
	</tr> <!-- trdebito_cuenta_cobrarElementosFormulario/super -->
		<?php if(debito_cuenta_cobrar_web::$STR_ES_RELACIONADO=='false' ) {?>

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
			
				import {debito_cuenta_cobrar_webcontrol,debito_cuenta_cobrar_webcontrol1} from './webroot/js/JavaScript/contabilidad/cuentascobrar/debito_cuenta_cobrar/js/webcontrol/debito_cuenta_cobrar_form_webcontrol.js?random=1';
				
				debito_cuenta_cobrar_webcontrol1.setdebito_cuenta_cobrar_constante(window.debito_cuenta_cobrar_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(debito_cuenta_cobrar_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

