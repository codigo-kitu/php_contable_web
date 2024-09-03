<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\contabilidad\contador_auxiliar\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Contadores Auxiliares Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/contabilidad/contador_auxiliar/util/contador_auxiliar_carga.php');
	use com\bydan\contabilidad\contabilidad\contador_auxiliar\util\contador_auxiliar_carga;
	
	//include_once('com/bydan/contabilidad/contabilidad/contador_auxiliar/presentation/view/contador_auxiliar_web.php');
	//use com\bydan\contabilidad\contabilidad\contador_auxiliar\presentation\view\contador_auxiliar_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	contador_auxiliar_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	contador_auxiliar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$contador_auxiliar_web1= new contador_auxiliar_web();	
	$contador_auxiliar_web1->cargarDatosGenerales();
	
	//$moduloActual=$contador_auxiliar_web1->moduloActual;
	//$usuarioActual=$contador_auxiliar_web1->usuarioActual;
	//$sessionBase=$contador_auxiliar_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$contador_auxiliar_web1->parametroGeneralUsuarioActual;
	
	
		
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
		
		
			<script type="module" src="webroot/js/JavaScript/contabilidad/contabilidad/contador_auxiliar/js/util/contador_auxiliar_form_funcion.js?random=1"></script>
						
		
		
		<?php 
			
		
			contador_auxiliar_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					contador_auxiliar_web::$GET_POST=$_GET;
				} else {
					contador_auxiliar_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			contador_auxiliar_web::$STR_NOMBRE_PAGINA = 'contador_auxiliar_form_view.php';
			contador_auxiliar_web::$BIT_ES_PAGINA_PRINCIPAL = 'false';
			contador_auxiliar_web::$BIT_ES_PAGINA_FORM = 'true';
				
			contador_auxiliar_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {contador_auxiliar_constante,contador_auxiliar_constante1} from './webroot/js/JavaScript/contabilidad/contabilidad/contador_auxiliar/js/util/contador_auxiliar_constante.js?random=1';
			import {contador_auxiliar_funcion,contador_auxiliar_funcion1} from './webroot/js/JavaScript/contabilidad/contabilidad/contador_auxiliar/js/util/contador_auxiliar_funcion.js?random=1';
			
			let contador_auxiliar_constante2 = new contador_auxiliar_constante();
			
			contador_auxiliar_constante2.STR_NOMBRE_PAGINA="<?php echo(contador_auxiliar_web::$STR_NOMBRE_PAGINA); ?>";
			contador_auxiliar_constante2.STR_TYPE_ON_LOADcontador_auxiliar="<?php echo(contador_auxiliar_web::$STR_TYPE_ONLOAD); ?>";
			contador_auxiliar_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(contador_auxiliar_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			contador_auxiliar_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(contador_auxiliar_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			contador_auxiliar_constante2.STR_ACTION="<?php echo(contador_auxiliar_web::$STR_ACTION); ?>";
			contador_auxiliar_constante2.STR_ES_POPUP="<?php echo(contador_auxiliar_web::$STR_ES_POPUP); ?>";
			contador_auxiliar_constante2.STR_ES_BUSQUEDA="<?php echo(contador_auxiliar_web::$STR_ES_BUSQUEDA); ?>";
			contador_auxiliar_constante2.STR_FUNCION_JS="<?php echo(contador_auxiliar_web::$STR_FUNCION_JS); ?>";
			contador_auxiliar_constante2.BIG_ID_ACTUAL="<?php echo(contador_auxiliar_web::$BIG_ID_ACTUAL); ?>";
			contador_auxiliar_constante2.BIG_ID_OPCION="<?php echo(contador_auxiliar_web::$BIG_ID_OPCION); ?>";
			contador_auxiliar_constante2.STR_OBJETO_JS="<?php echo(contador_auxiliar_web::$STR_OBJETO_JS); ?>";
			contador_auxiliar_constante2.STR_ES_RELACIONES="<?php echo(contador_auxiliar_web::$STR_ES_RELACIONES); ?>";
			contador_auxiliar_constante2.STR_ES_RELACIONADO="<?php echo(contador_auxiliar_web::$STR_ES_RELACIONADO); ?>";
			contador_auxiliar_constante2.STR_ES_SUB_PAGINA="<?php echo(contador_auxiliar_web::$STR_ES_SUB_PAGINA); ?>";
			contador_auxiliar_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(contador_auxiliar_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			contador_auxiliar_constante2.BIT_ES_PAGINA_FORM=<?php echo(contador_auxiliar_web::$BIT_ES_PAGINA_FORM); ?>;
			contador_auxiliar_constante2.STR_SUFIJO="<?php echo(contador_auxiliar_web::$STR_SUF); ?>";//contador_auxiliar
			contador_auxiliar_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(contador_auxiliar_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//contador_auxiliar
			
			contador_auxiliar_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(contador_auxiliar_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			contador_auxiliar_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($contador_auxiliar_web1->moduloActual->getnombre()); ?>";
			contador_auxiliar_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(contador_auxiliar_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			contador_auxiliar_constante2.BIT_ES_LOAD_NORMAL=true;
			/*contador_auxiliar_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			contador_auxiliar_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.contador_auxiliar_constante2 = contador_auxiliar_constante2;
			
		</script>
		
		<?php if(contador_auxiliar_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.contador_auxiliar_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.contador_auxiliar_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="contador_auxiliarActual" ></a>
	
	<div id="divResumencontador_auxiliarActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(contador_auxiliar_web::$STR_ES_RELACIONADO=='false') {?>
		
		<div id="header" >
		
			<div id="banner">
				<span id="spanTituloBanner" class="titulobanner"></span>
			</div> <!-- banner -->
					
			<div id="subheader" class="links">  
			
						
			</div> <!-- sub-header -->
			
			
		</div> <!-- header -->
		
		<?php } ?>
		
		<div id="main">
		

			<?php if(contador_auxiliar_web::$STR_ES_RELACIONADO=='false') {?>
			
			
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(contador_auxiliar_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(contador_auxiliar_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divcontador_auxiliarPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblcontador_auxiliarPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmcontador_auxiliarAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btncontador_auxiliarAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="contador_auxiliar_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btncontador_auxiliarAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmcontador_auxiliarAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblcontador_auxiliarPopupAjaxWebPart -->
		</div> <!-- divcontador_auxiliarPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->		
		
		
		
			
<tr id="trcontador_auxiliarElementosFormulario">
	<td>
		<div id="divMantenimientocontador_auxiliarAjaxWebPart" title="CONTADORES AUXILIARES" style="height: 90%;width: 90%;position: relative;top: 30px;left: 30px;">
			<form id="frmMantenimientocontador_auxiliar" name="frmMantenimientocontador_auxiliar">

			</br>

			<?php if(contador_auxiliar_web::$STR_ES_RELACIONES=='false' ) {?>
			</br>
			<?php } ?>

			<!-- SECCION/TOOLBAR -->
			<table id="tblcontador_auxiliarToolBarFormularioExterior" style="width: 65%">
				<tr style="display:table-row">
					<td align="center">

						<table id="tblcontador_auxiliarToolBarFormulario" style="text-align: center"  style="display:table-row">
							<tr>
								<td id="tdcontador_auxiliarActualizarToolBar" style="visibility:visible">
									<img id="imgActualizarToolBarcontador_auxiliar" name="imgActualizarToolBarcontador_auxiliar" title="ACTUALIZAR Contadores Auxiliares ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/actualizar.gif" width="25" height="25"/>
								</td>
								<td id="tdcontador_auxiliarEliminarToolBar" style="visibility:visible">
									<img id="imgEliminarToolBarcontador_auxiliar" name="imgEliminarToolBarcontador_auxiliar" title="ELIMINAR Contadores Auxiliares ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/eliminar.gif" width="25" height="25"/>
								</td>
								<td id="tdcontador_auxiliarCancelarToolBar" style="visibility:visible">
									<img id="imgCancelarToolBarcontador_auxiliar" name="imgCancelarToolBarcontador_auxiliar" title="CANCELAR Contadores Auxiliares ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/cancelar.gif" width="25" height="25"/>
								</td>
								<td id="tdcontador_auxiliarRelacionesToolBar" style="display:table-row">
									<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/xexpand.png" width="25" height="25" onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('tblCamposOcultoscontador_auxiliar',this,'../')"/>
								</td>
							</tr>
						</table> <!-- tblcontador_auxiliarToolBarFormulario -->

					</td>
				</tr>
			</table> <!-- tblcontador_auxiliarToolBarFormularioExterior -->

			<table id="tblcontador_auxiliarElementos">
			<tr id="trcontador_auxiliarElementos" class="elementos" style="display:table-row">
			<td align="center">

			<a id="Campos"></a>

				<?php if(contador_auxiliar_web::$STR_ES_RELACIONES=='false' ) {?>
				<div id="divFlechaArribaElementos" align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
					<span></span>
				</div>
				<?php } ?>

				<!-- SECCION/FORMULARIO -->
				<table id="tblElementoscontador_auxiliar" class="elementos" style="width: 350px; padding: 0px; border-spacing: 0px; border-collapse: collapse; text-align: center;">
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
						<td id="td_title-id_contador" class="titulocampo">
							<label class="form-label">Contador.(*)</label>
						</td>
						<td id="td_control-id_contador" align="left" class="controlcampo">
							<input id="form-id_contador" name="form-id_contador" type="text" class="form-control"  placeholder="Contador"  title="Contador"    size="10"  maxlength="10"/>
							<span id="spanstrMensajeid_contador" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_5">
						<td id="td_title-id_libro_auxiliar" class="titulocampo">
							<label class="form-label">Libro Auxiliar.(*)</label>
						</td>
						<td id="td_control-id_libro_auxiliar" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_libro_auxiliar" name="form-id_libro_auxiliar" title="Libro Auxiliar" ></select></td>
									<td><a><img id="form-id_libro_auxiliar_img" name="form-id_libro_auxiliar_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_libro_auxiliar_img_busqueda" name="form-id_libro_auxiliar_img_busqueda" title="Buscar Libro Auxiliar" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_libro_auxiliar" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_6">
						<td id="td_title-periodo_anual" class="titulocampo">
							<label class="form-label">Periodo Anual.(*)</label>
						</td>
						<td id="td_control-periodo_anual" align="left" class="controlcampo">
							<input id="form-periodo_anual" name="form-periodo_anual" type="text" class="form-control"  placeholder="Periodo Anual"  title="Periodo Anual"    maxlength="10" size="10" >
							<span id="spanstrMensajeperiodo_anual" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_7">
						<td id="td_title-mes" class="titulocampo">
							<label class="form-label">Mes.(*)</label>
						</td>
						<td id="td_control-mes" align="left" class="controlcampo">
							<input id="form-mes" name="form-mes" type="text" class="form-control"  placeholder="Mes"  title="Mes"    maxlength="10" size="10" >
							<span id="spanstrMensajemes" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_8">
						<td id="td_title-contador" class="titulocampo">
							<label class="form-label">Contador.(*)</label>
						</td>
						<td id="td_control-contador" align="left" class="controlcampo">
							<input id="form-contador" name="form-contador" type="text" class="form-control"  placeholder="Contador"  title="Contador"    maxlength="10" size="10" >
							<span id="spanstrMensajecontador" class="mensajeerror"></span>
						</td>
					</tr>
				</table> <!-- tblElementoscontador_auxiliar -->

				<!-- SECCION/OCULTOS -->
				<table id="tblCamposOcultoscontador_auxiliar" class="elementos" style="display: table-row;">
					<caption class="busquedacabecera">
						<span>Campos Ocultos</span>
					</caption>
				</table> <!-- tblCamposOcultoscontador_auxiliar -->

			</td></tr> <!-- trcontador_auxiliarElementos -->
			</table> <!-- tblcontador_auxiliarElementos -->
			</form> <!-- frmMantenimientocontador_auxiliar -->


			

				<form id="frmAccionesMantenimientocontador_auxiliar" name="frmAccionesMantenimientocontador_auxiliar">

			<?php if(contador_auxiliar_web::$STR_ES_BUSQUEDA=='false' ) {?>
			<table id="tblcontador_auxiliarAcciones" class="elementos" style="text-align: center">
		<tr id="trcontador_auxiliarAcciones" class="elementos" style="display:table-row">
			<td align="center">
				<a id="Acciones" ></a>

				<?php if(contador_auxiliar_web::$STR_ES_RELACIONES=='false' ) {?>
				<div align="right">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
				<?php } ?>

					<!-- SECCION/BOTONES -->
					<table id="tblAccionesMantenimientocontador_auxiliar" class="busqueda" style="width: 50%;text-align: center">

						<?php if(contador_auxiliar_web::$STR_ES_RELACIONES=='false' ) {?>
						<!--
						<caption class="busquedacabecera">
							<span>Acciones</span>
						</caption>
						-->
						<?php } ?>

						<tr id="trAccionesMantenimientocontador_auxiliarBasicos">
							<td id="tdbtnNuevocontador_auxiliar" style="visibility:visible">
								<div id="divNuevocontador_auxiliar" style="display:table-row">
									<input type="button" id="btnNuevocontador_auxiliar" name="btnNuevocontador_auxiliar" value="NUEVO" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnActualizarcontador_auxiliar" style="visibility:visible">
								<div id="divActualizarcontador_auxiliar" style="display:table-row">
									<input type="button" id="btnActualizarcontador_auxiliar" name="btnActualizarcontador_auxiliar" title="ACTUALIZAR Contadores Auxiliares ACTUAL" value="Actualizar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnEliminarcontador_auxiliar" style="visibility:visible">
								<div id="divEliminarcontador_auxiliar" style="display:table-row">
									<input type="button" id="btnEliminarcontador_auxiliar" name="btnEliminarcontador_auxiliar" title="ELIMINAR Contadores Auxiliares ACTUAL" value="Eliminar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnImprimircontador_auxiliar" style="visibility:visible">
								<input type="button" id="btnImprimircontador_auxiliar" name="btnImprimircontador_auxiliar" title="IMPRIMIR PAGINA Contadores Auxiliares ACTUAL" value="Imp. Datos" class="btn btn-primary"/>
							</td>
							<td id="tdbtnCancelarcontador_auxiliar" style="visibility:visible">
								<input type="button" id="btnCancelarcontador_auxiliar" name="btnCancelarcontador_auxiliar" title="CANCELAR Contadores Auxiliares ACTUAL" value="Cancelar" class="btn btn-primary"/>
							</td>
						</tr>
						<tr id="trAccionesMantenimientocontador_auxiliarGuardar" style="display:none">
							<td id="tdbtnGuardarCambioscontador_auxiliar" colspan="4" align="center" style="visibility:visible">
								<div id="divGuardarCambioscontador_auxiliar" style="display:table-row">
									<input type="button" id="btnGuardarCambiosFormulariocontador_auxiliar" name="btnGuardarCambiosFormulariocontador_auxiliar" title="GUARDAR" value="GUADAR CAMBIOS" class="btn btn-primary"/>
								</div>
							</td>
						</tr>
					</table> <!-- tblAccionesMantenimientocontador_auxiliar -->
			</td>
		</tr> <!-- trcontador_auxiliarAcciones -->
		<?php if(contador_auxiliar_web::$STR_ES_RELACIONADO=='false' ) {?>
		<tr id="trcontador_auxiliarParametrosAcciones" class="impresion"  style="display:table-row">
			<td align="center">
				<!-- SECCION/POST -->
				<table id="tblcontador_auxiliarParametrosAcciones" style="text-align: center;border: 0px solid black;padding: 0px; border-spacing: 0px">
					<caption class="busquedacabecera" style="padding: 0px;caption-side: top;">
						<span>Acciones Extra/Post</span>
					</caption>
					<tr id="trcontador_auxiliarFilaParametrosAcciones">
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
				</table> <!-- tblcontador_auxiliarParametrosAcciones -->
			</td>
		</tr> <!-- trcontador_auxiliarParametrosAcciones -->
		<?php }?>
		<tr id="trcontador_auxiliarMensajes" class="mensajes">
			<td align="center">
				<a id="Mensajes"></a>
			</td>
		</tr> <!-- trcontador_auxiliarMensajes -->
			</table> <!-- tblcontador_auxiliarAcciones -->
			<?php } ?>
			</form> <!-- frmMantenimientocontador_auxiliar -->
			</div> <!-- divMantenimientocontador_auxiliarAjaxWebPart -->
		</td>
	</tr> <!-- trcontador_auxiliarElementosFormulario/super -->
		<?php if(contador_auxiliar_web::$STR_ES_RELACIONADO=='false' ) {?>

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
			
				import {contador_auxiliar_webcontrol,contador_auxiliar_webcontrol1} from './webroot/js/JavaScript/contabilidad/contabilidad/contador_auxiliar/js/webcontrol/contador_auxiliar_form_webcontrol.js?random=1';
				
				contador_auxiliar_webcontrol1.setcontador_auxiliar_constante(window.contador_auxiliar_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(contador_auxiliar_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

