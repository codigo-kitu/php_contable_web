<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\seguridad\dato_general_usuario\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Dato General Usuario Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/seguridad/dato_general_usuario/util/dato_general_usuario_carga.php');
	use com\bydan\contabilidad\seguridad\dato_general_usuario\util\dato_general_usuario_carga;
	
	//include_once('com/bydan/contabilidad/seguridad/dato_general_usuario/presentation/view/dato_general_usuario_web.php');
	//use com\bydan\contabilidad\seguridad\dato_general_usuario\presentation\view\dato_general_usuario_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	dato_general_usuario_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	dato_general_usuario_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$dato_general_usuario_web1= new dato_general_usuario_web();	
	$dato_general_usuario_web1->cargarDatosGenerales();
	
	//$moduloActual=$dato_general_usuario_web1->moduloActual;
	//$usuarioActual=$dato_general_usuario_web1->usuarioActual;
	//$sessionBase=$dato_general_usuario_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$dato_general_usuario_web1->parametroGeneralUsuarioActual;
	
	
		
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
		
		
			<script type="module" src="webroot/js/JavaScript/contabilidad/seguridad/dato_general_usuario/js/util/dato_general_usuario_form_funcion.js?random=1"></script>
						
		
		
		<?php 
			
		
			dato_general_usuario_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					dato_general_usuario_web::$GET_POST=$_GET;
				} else {
					dato_general_usuario_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			dato_general_usuario_web::$STR_NOMBRE_PAGINA = 'dato_general_usuario_form_view.php';
			dato_general_usuario_web::$BIT_ES_PAGINA_PRINCIPAL = 'false';
			dato_general_usuario_web::$BIT_ES_PAGINA_FORM = 'true';
				
			dato_general_usuario_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {dato_general_usuario_constante,dato_general_usuario_constante1} from './webroot/js/JavaScript/contabilidad/seguridad/dato_general_usuario/js/util/dato_general_usuario_constante.js?random=1';
			import {dato_general_usuario_funcion,dato_general_usuario_funcion1} from './webroot/js/JavaScript/contabilidad/seguridad/dato_general_usuario/js/util/dato_general_usuario_funcion.js?random=1';
			
			let dato_general_usuario_constante2 = new dato_general_usuario_constante();
			
			dato_general_usuario_constante2.STR_NOMBRE_PAGINA="<?php echo(dato_general_usuario_web::$STR_NOMBRE_PAGINA); ?>";
			dato_general_usuario_constante2.STR_TYPE_ON_LOADdato_general_usuario="<?php echo(dato_general_usuario_web::$STR_TYPE_ONLOAD); ?>";
			dato_general_usuario_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(dato_general_usuario_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			dato_general_usuario_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(dato_general_usuario_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			dato_general_usuario_constante2.STR_ACTION="<?php echo(dato_general_usuario_web::$STR_ACTION); ?>";
			dato_general_usuario_constante2.STR_ES_POPUP="<?php echo(dato_general_usuario_web::$STR_ES_POPUP); ?>";
			dato_general_usuario_constante2.STR_ES_BUSQUEDA="<?php echo(dato_general_usuario_web::$STR_ES_BUSQUEDA); ?>";
			dato_general_usuario_constante2.STR_FUNCION_JS="<?php echo(dato_general_usuario_web::$STR_FUNCION_JS); ?>";
			dato_general_usuario_constante2.BIG_ID_ACTUAL="<?php echo(dato_general_usuario_web::$BIG_ID_ACTUAL); ?>";
			dato_general_usuario_constante2.BIG_ID_OPCION="<?php echo(dato_general_usuario_web::$BIG_ID_OPCION); ?>";
			dato_general_usuario_constante2.STR_OBJETO_JS="<?php echo(dato_general_usuario_web::$STR_OBJETO_JS); ?>";
			dato_general_usuario_constante2.STR_ES_RELACIONES="<?php echo(dato_general_usuario_web::$STR_ES_RELACIONES); ?>";
			dato_general_usuario_constante2.STR_ES_RELACIONADO="<?php echo(dato_general_usuario_web::$STR_ES_RELACIONADO); ?>";
			dato_general_usuario_constante2.STR_ES_SUB_PAGINA="<?php echo(dato_general_usuario_web::$STR_ES_SUB_PAGINA); ?>";
			dato_general_usuario_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(dato_general_usuario_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			dato_general_usuario_constante2.BIT_ES_PAGINA_FORM=<?php echo(dato_general_usuario_web::$BIT_ES_PAGINA_FORM); ?>;
			dato_general_usuario_constante2.STR_SUFIJO="<?php echo(dato_general_usuario_web::$STR_SUF); ?>";//dato_general_usuario
			dato_general_usuario_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(dato_general_usuario_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//dato_general_usuario
			
			dato_general_usuario_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(dato_general_usuario_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			dato_general_usuario_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($dato_general_usuario_web1->moduloActual->getnombre()); ?>";
			dato_general_usuario_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(dato_general_usuario_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			dato_general_usuario_constante2.BIT_ES_LOAD_NORMAL=true;
			/*dato_general_usuario_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			dato_general_usuario_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.dato_general_usuario_constante2 = dato_general_usuario_constante2;
			
		</script>
		
		<?php if(dato_general_usuario_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.dato_general_usuario_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.dato_general_usuario_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="dato_general_usuarioActual" ></a>
	
	<div id="divResumendato_general_usuarioActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(dato_general_usuario_web::$STR_ES_RELACIONADO=='false') {?>
		
		<div id="header" >
		
			<div id="banner">
				<span id="spanTituloBanner" class="titulobanner"></span>
			</div> <!-- banner -->
					
			<div id="subheader" class="links">  
			
						
			</div> <!-- sub-header -->
			
			
		</div> <!-- header -->
		
		<?php } ?>
		
		<div id="main">
		

			<?php if(dato_general_usuario_web::$STR_ES_RELACIONADO=='false') {?>
			
			
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(dato_general_usuario_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(dato_general_usuario_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divdato_general_usuarioPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tbldato_general_usuarioPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmdato_general_usuarioAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btndato_general_usuarioAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="dato_general_usuario_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btndato_general_usuarioAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmdato_general_usuarioAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tbldato_general_usuarioPopupAjaxWebPart -->
		</div> <!-- divdato_general_usuarioPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->		
		
		
		
			
<tr id="trdato_general_usuarioElementosFormulario">
	<td>
		<div id="divMantenimientodato_general_usuarioAjaxWebPart" title="DATO GENERAL USUARIO" style="height: 90%;width: 90%;position: relative;top: 30px;left: 30px;">
			<form id="frmMantenimientodato_general_usuario" name="frmMantenimientodato_general_usuario">

			</br>

			<?php if(dato_general_usuario_web::$STR_ES_RELACIONES=='false' ) {?>
			</br>
			<?php } ?>

			<!-- SECCION/TOOLBAR -->
			<table id="tbldato_general_usuarioToolBarFormularioExterior" style="width: 65%">
				<tr style="display:table-row">
					<td align="center">

						<table id="tbldato_general_usuarioToolBarFormulario" style="text-align: center"  style="display:table-row">
							<tr>
								<td id="tddato_general_usuarioActualizarToolBar" style="visibility:visible">
									<img id="imgActualizarToolBardato_general_usuario" name="imgActualizarToolBardato_general_usuario" title="ACTUALIZAR Dato General Usuario ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/actualizar.gif" width="25" height="25"/>
								</td>
								<td id="tddato_general_usuarioEliminarToolBar" style="visibility:visible">
									<img id="imgEliminarToolBardato_general_usuario" name="imgEliminarToolBardato_general_usuario" title="ELIMINAR Dato General Usuario ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/eliminar.gif" width="25" height="25"/>
								</td>
								<td id="tddato_general_usuarioCancelarToolBar" style="visibility:visible">
									<img id="imgCancelarToolBardato_general_usuario" name="imgCancelarToolBardato_general_usuario" title="CANCELAR Dato General Usuario ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/cancelar.gif" width="25" height="25"/>
								</td>
								<td id="tddato_general_usuarioRelacionesToolBar" style="display:table-row">
									<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/xexpand.png" width="25" height="25" onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('tblCamposOcultosdato_general_usuario',this,'../')"/>
								</td>
							</tr>
						</table> <!-- tbldato_general_usuarioToolBarFormulario -->

					</td>
				</tr>
			</table> <!-- tbldato_general_usuarioToolBarFormularioExterior -->

			<table id="tbldato_general_usuarioElementos">
			<tr id="trdato_general_usuarioElementos" class="elementos" style="display:table-row">
			<td align="center">

			<a id="Campos"></a>

				<?php if(dato_general_usuario_web::$STR_ES_RELACIONES=='false' ) {?>
				<div id="divFlechaArribaElementos" align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
					<span></span>
				</div>
				<?php } ?>

				<!-- SECCION/FORMULARIO -->
				<table id="tblElementosdato_general_usuario" class="elementos" style="width: 350px; padding: 0px; border-spacing: 0px; border-collapse: collapse; text-align: left;">
					<tr id="tr_fila_1">
								<td id="td_title-id" class="titulocampo">
									<label class="form-label">Cod. Único</label>
								</td>
								<td id="td_control-id" align="left">
									<select id="form-id" name="form-id" class="form-control"></select>
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
					</tr>
					<tr id="tr_fila_2">
						<td id="td_title-id_provincia" class="titulocampo">
							<label class="form-label">Provincia.(*)</label>
						</td>
						<td id="td_control-id_provincia" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_provincia" name="form-id_provincia" title="Provincia" ></select></td>
									<td><a><img id="form-id_provincia_img" name="form-id_provincia_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_provincia_img_busqueda" name="form-id_provincia_img_busqueda" title="Buscar Provincia" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_provincia" class="mensajeerror"></span>
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
					<tr id="tr_fila_3">
						<td id="td_title-cedula" class="titulocampo">
							<label class="form-label">Cedula.(*)</label>
						</td>
						<td id="td_control-cedula" align="left" class="controlcampo">
							<input id="form-cedula" name="form-cedula" type="text" class="form-control"  placeholder="Cedula"  title="Cedula"    size="20"  maxlength="20"/>
							<span id="spanstrMensajecedula" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-apellidos" class="titulocampo">
							<label class="form-label">Apellidos.(*)</label>
						</td>
						<td id="td_control-apellidos" align="left" class="controlcampo">
							<textarea id="form-apellidos" name="form-apellidos" class="form-control"  placeholder="Apellidos"  title="Apellidos"   style="font-size: 13px;"  rows ="3" cols= "25"></textarea>
							<span id="spanstrMensajeapellidos" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_4">
						<td id="td_title-nombres" class="titulocampo">
							<label class="form-label">Nombres.(*)</label>
						</td>
						<td id="td_control-nombres" align="left" class="controlcampo">
							<textarea id="form-nombres" name="form-nombres" class="form-control"  placeholder="Nombres"  title="Nombres"   style="font-size: 13px;"  rows ="3" cols= "25"></textarea>
							<span id="spanstrMensajenombres" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-telefono" class="titulocampo">
							<label class="form-label">Telefono.(*)</label>
						</td>
						<td id="td_control-telefono" align="left" class="controlcampo">
							<textarea id="form-telefono" name="form-telefono" class="form-control"  placeholder="Telefono"  title="Telefono"   style="font-size: 13px;"  rows ="3" cols= "25"></textarea>
							<span id="spanstrMensajetelefono" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_5">
						<td id="td_title-telefono_movil" class="titulocampo">
							<label class="form-label">Telefono Movil.(*)</label>
						</td>
						<td id="td_control-telefono_movil" align="left" class="controlcampo">
							<textarea id="form-telefono_movil" name="form-telefono_movil" class="form-control"  placeholder="Telefono Movil"  title="Telefono Movil"   style="font-size: 13px;"  rows ="3" cols= "25"></textarea>
							<span id="spanstrMensajetelefono_movil" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-e_mail" class="titulocampo">
							<label class="form-label">E Mail.(*)</label>
						</td>
						<td id="td_control-e_mail" align="left" class="controlcampo">
							<textarea id="form-e_mail" name="form-e_mail" class="form-control"  placeholder="E Mail"  title="E Mail"   style="font-size: 13px;"  rows ="3" cols= "25"></textarea>
							<span id="spanstrMensajee_mail" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_6">
						<td id="td_title-url" class="titulocampo">
							<label class="form-label">Url.(*)</label>
						</td>
						<td id="td_control-url" align="left" class="controlcampo">
							<textarea id="form-url" name="form-url" class="form-control"  placeholder="Url"  title="Url"   style="font-size: 13px;"  rows ="3" cols= "25"></textarea>
							<span id="spanstrMensajeurl" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-fecha_nacimiento" class="titulocampo">
							<label class="form-label">Fecha Nacimiento.(*)</label>
						</td>
						<td id="td_control-fecha_nacimiento" align="left" class="controlcampo">
							<input id="form-fecha_nacimiento" name="form-fecha_nacimiento" type="text" class="form-control"  placeholder="Fecha Nacimiento"  title="Fecha Nacimiento"    size="10" >
							<span id="spanstrMensajefecha_nacimiento" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_7">
						<td id="td_title-direccion" class="titulocampo">
							<label class="form-label">Direccion.(*)</label>
						</td>
						<td id="td_control-direccion" align="left" class="controlcampo">
							<textarea id="form-direccion" name="form-direccion" class="form-control"  placeholder="Direccion"  title="Direccion"   style="font-size: 13px;"  rows ="3" cols= "25"></textarea>
							<span id="spanstrMensajedireccion" class="mensajeerror"></span>
						</td>
					<td></td><td></td></tr>
				</table> <!-- tblElementosdato_general_usuario -->

				<!-- SECCION/OCULTOS -->
				<table id="tblCamposOcultosdato_general_usuario" class="elementos" style="display: table-row;">
					<caption class="busquedacabecera">
						<span>Campos Ocultos</span>
					</caption>
				</table> <!-- tblCamposOcultosdato_general_usuario -->

			</td></tr> <!-- trdato_general_usuarioElementos -->
			</table> <!-- tbldato_general_usuarioElementos -->
			</form> <!-- frmMantenimientodato_general_usuario -->


			

				<form id="frmAccionesMantenimientodato_general_usuario" name="frmAccionesMantenimientodato_general_usuario">

			<?php if(dato_general_usuario_web::$STR_ES_BUSQUEDA=='false' ) {?>
			<table id="tbldato_general_usuarioAcciones" class="elementos" style="text-align: center">
		<tr id="trdato_general_usuarioAcciones" class="elementos" style="display:table-row">
			<td align="center">
				<a id="Acciones" ></a>

				<?php if(dato_general_usuario_web::$STR_ES_RELACIONES=='false' ) {?>
				<div align="right">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
				<?php } ?>

					<!-- SECCION/BOTONES -->
					<table id="tblAccionesMantenimientodato_general_usuario" class="busqueda" style="width: 50%;text-align: left">

						<?php if(dato_general_usuario_web::$STR_ES_RELACIONES=='false' ) {?>
						<!--
						<caption class="busquedacabecera">
							<span>Acciones</span>
						</caption>
						-->
						<?php } ?>

						<tr id="trAccionesMantenimientodato_general_usuarioBasicos">
							<td id="tdbtnNuevodato_general_usuario" style="visibility:visible">
								<div id="divNuevodato_general_usuario" style="display:table-row">
									<input type="button" id="btnNuevodato_general_usuario" name="btnNuevodato_general_usuario" value="NUEVO" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnActualizardato_general_usuario" style="visibility:visible">
								<div id="divActualizardato_general_usuario" style="display:table-row">
									<input type="button" id="btnActualizardato_general_usuario" name="btnActualizardato_general_usuario" title="ACTUALIZAR Dato General Usuario ACTUAL" value="Actualizar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnEliminardato_general_usuario" style="visibility:visible">
								<div id="divEliminardato_general_usuario" style="display:table-row">
									<input type="button" id="btnEliminardato_general_usuario" name="btnEliminardato_general_usuario" title="ELIMINAR Dato General Usuario ACTUAL" value="Eliminar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnImprimirdato_general_usuario" style="visibility:visible">
								<input type="button" id="btnImprimirdato_general_usuario" name="btnImprimirdato_general_usuario" title="IMPRIMIR PAGINA Dato General Usuario ACTUAL" value="Imp. Datos" class="btn btn-primary"/>
							</td>
							<td id="tdbtnCancelardato_general_usuario" style="visibility:visible">
								<input type="button" id="btnCancelardato_general_usuario" name="btnCancelardato_general_usuario" title="CANCELAR Dato General Usuario ACTUAL" value="Cancelar" class="btn btn-primary"/>
							</td>
						</tr>
						<tr id="trAccionesMantenimientodato_general_usuarioGuardar" style="display:none">
							<td id="tdbtnGuardarCambiosdato_general_usuario" colspan="4" align="center" style="visibility:visible">
								<div id="divGuardarCambiosdato_general_usuario" style="display:table-row">
									<input type="button" id="btnGuardarCambiosFormulariodato_general_usuario" name="btnGuardarCambiosFormulariodato_general_usuario" title="GUARDAR" value="GUADAR CAMBIOS" class="btn btn-primary"/>
								</div>
							</td>
						</tr>
					</table> <!-- tblAccionesMantenimientodato_general_usuario -->
			</td>
		</tr> <!-- trdato_general_usuarioAcciones -->
		<?php if(dato_general_usuario_web::$STR_ES_RELACIONADO=='false' ) {?>
		<tr id="trdato_general_usuarioParametrosAcciones" class="impresion"  style="display:table-row">
			<td align="center">
				<!-- SECCION/POST -->
				<table id="tbldato_general_usuarioParametrosAcciones" style="text-align: center;border: 0px solid black;padding: 0px; border-spacing: 0px">
					<caption class="busquedacabecera" style="padding: 0px;caption-side: top;">
						<span>Acciones Extra/Post</span>
					</caption>
					<tr id="trdato_general_usuarioFilaParametrosAcciones">
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
				</table> <!-- tbldato_general_usuarioParametrosAcciones -->
			</td>
		</tr> <!-- trdato_general_usuarioParametrosAcciones -->
		<?php }?>
		<tr id="trdato_general_usuarioMensajes" class="mensajes">
			<td align="center">
				<a id="Mensajes"></a>
			</td>
		</tr> <!-- trdato_general_usuarioMensajes -->
			</table> <!-- tbldato_general_usuarioAcciones -->
			<?php } ?>
			</form> <!-- frmMantenimientodato_general_usuario -->
			</div> <!-- divMantenimientodato_general_usuarioAjaxWebPart -->
		</td>
	</tr> <!-- trdato_general_usuarioElementosFormulario/super -->
		<?php if(dato_general_usuario_web::$STR_ES_RELACIONADO=='false' ) {?>

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
			
				import {dato_general_usuario_webcontrol,dato_general_usuario_webcontrol1} from './webroot/js/JavaScript/contabilidad/seguridad/dato_general_usuario/js/webcontrol/dato_general_usuario_form_webcontrol.js?random=1';
				
				dato_general_usuario_webcontrol1.setdato_general_usuario_constante(window.dato_general_usuario_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(dato_general_usuario_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

