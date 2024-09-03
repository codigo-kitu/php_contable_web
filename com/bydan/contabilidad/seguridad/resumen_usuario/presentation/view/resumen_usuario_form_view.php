<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\seguridad\resumen_usuario\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Resumen Usuario Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/seguridad/resumen_usuario/util/resumen_usuario_carga.php');
	use com\bydan\contabilidad\seguridad\resumen_usuario\util\resumen_usuario_carga;
	
	//include_once('com/bydan/contabilidad/seguridad/resumen_usuario/presentation/view/resumen_usuario_web.php');
	//use com\bydan\contabilidad\seguridad\resumen_usuario\presentation\view\resumen_usuario_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	resumen_usuario_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	resumen_usuario_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$resumen_usuario_web1= new resumen_usuario_web();	
	$resumen_usuario_web1->cargarDatosGenerales();
	
	//$moduloActual=$resumen_usuario_web1->moduloActual;
	//$usuarioActual=$resumen_usuario_web1->usuarioActual;
	//$sessionBase=$resumen_usuario_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$resumen_usuario_web1->parametroGeneralUsuarioActual;
	
	
		
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
		
		
			<script type="module" src="webroot/js/JavaScript/contabilidad/seguridad/resumen_usuario/js/util/resumen_usuario_form_funcion.js?random=1"></script>
						
		
		
		<?php 
			
		
			resumen_usuario_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					resumen_usuario_web::$GET_POST=$_GET;
				} else {
					resumen_usuario_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			resumen_usuario_web::$STR_NOMBRE_PAGINA = 'resumen_usuario_form_view.php';
			resumen_usuario_web::$BIT_ES_PAGINA_PRINCIPAL = 'false';
			resumen_usuario_web::$BIT_ES_PAGINA_FORM = 'true';
				
			resumen_usuario_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {resumen_usuario_constante,resumen_usuario_constante1} from './webroot/js/JavaScript/contabilidad/seguridad/resumen_usuario/js/util/resumen_usuario_constante.js?random=1';
			import {resumen_usuario_funcion,resumen_usuario_funcion1} from './webroot/js/JavaScript/contabilidad/seguridad/resumen_usuario/js/util/resumen_usuario_funcion.js?random=1';
			
			let resumen_usuario_constante2 = new resumen_usuario_constante();
			
			resumen_usuario_constante2.STR_NOMBRE_PAGINA="<?php echo(resumen_usuario_web::$STR_NOMBRE_PAGINA); ?>";
			resumen_usuario_constante2.STR_TYPE_ON_LOADresumen_usuario="<?php echo(resumen_usuario_web::$STR_TYPE_ONLOAD); ?>";
			resumen_usuario_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(resumen_usuario_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			resumen_usuario_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(resumen_usuario_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			resumen_usuario_constante2.STR_ACTION="<?php echo(resumen_usuario_web::$STR_ACTION); ?>";
			resumen_usuario_constante2.STR_ES_POPUP="<?php echo(resumen_usuario_web::$STR_ES_POPUP); ?>";
			resumen_usuario_constante2.STR_ES_BUSQUEDA="<?php echo(resumen_usuario_web::$STR_ES_BUSQUEDA); ?>";
			resumen_usuario_constante2.STR_FUNCION_JS="<?php echo(resumen_usuario_web::$STR_FUNCION_JS); ?>";
			resumen_usuario_constante2.BIG_ID_ACTUAL="<?php echo(resumen_usuario_web::$BIG_ID_ACTUAL); ?>";
			resumen_usuario_constante2.BIG_ID_OPCION="<?php echo(resumen_usuario_web::$BIG_ID_OPCION); ?>";
			resumen_usuario_constante2.STR_OBJETO_JS="<?php echo(resumen_usuario_web::$STR_OBJETO_JS); ?>";
			resumen_usuario_constante2.STR_ES_RELACIONES="<?php echo(resumen_usuario_web::$STR_ES_RELACIONES); ?>";
			resumen_usuario_constante2.STR_ES_RELACIONADO="<?php echo(resumen_usuario_web::$STR_ES_RELACIONADO); ?>";
			resumen_usuario_constante2.STR_ES_SUB_PAGINA="<?php echo(resumen_usuario_web::$STR_ES_SUB_PAGINA); ?>";
			resumen_usuario_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(resumen_usuario_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			resumen_usuario_constante2.BIT_ES_PAGINA_FORM=<?php echo(resumen_usuario_web::$BIT_ES_PAGINA_FORM); ?>;
			resumen_usuario_constante2.STR_SUFIJO="<?php echo(resumen_usuario_web::$STR_SUF); ?>";//resumen_usuario
			resumen_usuario_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(resumen_usuario_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//resumen_usuario
			
			resumen_usuario_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(resumen_usuario_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			resumen_usuario_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($resumen_usuario_web1->moduloActual->getnombre()); ?>";
			resumen_usuario_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(resumen_usuario_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			resumen_usuario_constante2.BIT_ES_LOAD_NORMAL=true;
			/*resumen_usuario_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			resumen_usuario_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.resumen_usuario_constante2 = resumen_usuario_constante2;
			
		</script>
		
		<?php if(resumen_usuario_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.resumen_usuario_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.resumen_usuario_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="resumen_usuarioActual" ></a>
	
	<div id="divResumenresumen_usuarioActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(resumen_usuario_web::$STR_ES_RELACIONADO=='false') {?>
		
		<div id="header" >
		
			<div id="banner">
				<span id="spanTituloBanner" class="titulobanner"></span>
			</div> <!-- banner -->
					
			<div id="subheader" class="links">  
			
						
			</div> <!-- sub-header -->
			
			
		</div> <!-- header -->
		
		<?php } ?>
		
		<div id="main">
		

			<?php if(resumen_usuario_web::$STR_ES_RELACIONADO=='false') {?>
			
			
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(resumen_usuario_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(resumen_usuario_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divresumen_usuarioPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblresumen_usuarioPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmresumen_usuarioAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnresumen_usuarioAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="resumen_usuario_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnresumen_usuarioAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmresumen_usuarioAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblresumen_usuarioPopupAjaxWebPart -->
		</div> <!-- divresumen_usuarioPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->		
		
		
		
			
<tr id="trresumen_usuarioElementosFormulario">
	<td>
		<div id="divMantenimientoresumen_usuarioAjaxWebPart" title="RESUMEN USUARIO" style="height: 90%;width: 90%;position: relative;top: 30px;left: 30px;">
			<form id="frmMantenimientoresumen_usuario" name="frmMantenimientoresumen_usuario">

			</br>

			<?php if(resumen_usuario_web::$STR_ES_RELACIONES=='false' ) {?>
			</br>
			<?php } ?>

			<!-- SECCION/TOOLBAR -->
			<table id="tblresumen_usuarioToolBarFormularioExterior" style="width: 65%">
				<tr style="display:table-row">
					<td align="center">

						<table id="tblresumen_usuarioToolBarFormulario" style="text-align: center"  style="display:table-row">
							<tr>
								<td id="tdresumen_usuarioActualizarToolBar" style="visibility:visible">
									<img id="imgActualizarToolBarresumen_usuario" name="imgActualizarToolBarresumen_usuario" title="ACTUALIZAR Resumen Usuario ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/actualizar.gif" width="25" height="25"/>
								</td>
								<td id="tdresumen_usuarioEliminarToolBar" style="visibility:visible">
									<img id="imgEliminarToolBarresumen_usuario" name="imgEliminarToolBarresumen_usuario" title="ELIMINAR Resumen Usuario ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/eliminar.gif" width="25" height="25"/>
								</td>
								<td id="tdresumen_usuarioCancelarToolBar" style="visibility:visible">
									<img id="imgCancelarToolBarresumen_usuario" name="imgCancelarToolBarresumen_usuario" title="CANCELAR Resumen Usuario ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/cancelar.gif" width="25" height="25"/>
								</td>
								<td id="tdresumen_usuarioRelacionesToolBar" style="display:table-row">
									<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/xexpand.png" width="25" height="25" onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('tblCamposOcultosresumen_usuario',this,'../')"/>
								</td>
							</tr>
						</table> <!-- tblresumen_usuarioToolBarFormulario -->

					</td>
				</tr>
			</table> <!-- tblresumen_usuarioToolBarFormularioExterior -->

			<table id="tblresumen_usuarioElementos">
			<tr id="trresumen_usuarioElementos" class="elementos" style="display:table-row">
			<td align="center">

			<a id="Campos"></a>

				<?php if(resumen_usuario_web::$STR_ES_RELACIONES=='false' ) {?>
				<div id="divFlechaArribaElementos" align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
					<span></span>
				</div>
				<?php } ?>

				<!-- SECCION/FORMULARIO -->
				<table id="tblElementosresumen_usuario" class="elementos" style="width: 400px; padding: 0px; border-spacing: 0px; border-collapse: collapse; text-align: left;">
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
					
						<td id="td_title-numero_ingresos" class="titulocampo">
							<label class="form-label">Numero Ingresos.(*)</label>
						</td>
						<td id="td_control-numero_ingresos" align="left" class="controlcampo">
							<input id="form-numero_ingresos" name="form-numero_ingresos" type="text" class="form-control"  placeholder="Numero Ingresos"  title="Numero Ingresos"    maxlength="19" size="10" >
							<span id="spanstrMensajenumero_ingresos" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_2">
						<td id="td_title-numero_error_ingreso" class="titulocampo">
							<label class="form-label">Numero Error Ingreso.(*)</label>
						</td>
						<td id="td_control-numero_error_ingreso" align="left" class="controlcampo">
							<input id="form-numero_error_ingreso" name="form-numero_error_ingreso" type="text" class="form-control"  placeholder="Numero Error Ingreso"  title="Numero Error Ingreso"    maxlength="19" size="10" >
							<span id="spanstrMensajenumero_error_ingreso" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-numero_intentos" class="titulocampo">
							<label class="form-label">Numero Intentos.(*)</label>
						</td>
						<td id="td_control-numero_intentos" align="left" class="controlcampo">
							<input id="form-numero_intentos" name="form-numero_intentos" type="text" class="form-control"  placeholder="Numero Intentos"  title="Numero Intentos"    maxlength="19" size="10" >
							<span id="spanstrMensajenumero_intentos" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_3">
						<td id="td_title-numero_cierres" class="titulocampo">
							<label class="form-label">Numero Cierres.(*)</label>
						</td>
						<td id="td_control-numero_cierres" align="left" class="controlcampo">
							<input id="form-numero_cierres" name="form-numero_cierres" type="text" class="form-control"  placeholder="Numero Cierres"  title="Numero Cierres"    maxlength="19" size="10" >
							<span id="spanstrMensajenumero_cierres" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-numero_reinicios" class="titulocampo">
							<label class="form-label">Numero Reinicios.(*)</label>
						</td>
						<td id="td_control-numero_reinicios" align="left" class="controlcampo">
							<input id="form-numero_reinicios" name="form-numero_reinicios" type="text" class="form-control"  placeholder="Numero Reinicios"  title="Numero Reinicios"    maxlength="19" size="10" >
							<span id="spanstrMensajenumero_reinicios" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_4">
						<td id="td_title-numero_ingreso_actual" class="titulocampo">
							<label class="form-label">Numero Ingreso Actual.(*)</label>
						</td>
						<td id="td_control-numero_ingreso_actual" align="left" class="controlcampo">
							<input id="form-numero_ingreso_actual" name="form-numero_ingreso_actual" type="text" class="form-control"  placeholder="Numero Ingreso Actual"  title="Numero Ingreso Actual"    maxlength="19" size="10" >
							<span id="spanstrMensajenumero_ingreso_actual" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-fecha_ultimo_ingreso" class="titulocampo">
							<label class="form-label">Fecha Ultimo Ingreso.(*)</label>
						</td>
						<td id="td_control-fecha_ultimo_ingreso" align="left" class="controlcampo">
							<input id="form-fecha_ultimo_ingreso" name="form-fecha_ultimo_ingreso" type="text" class="form-control"  placeholder="Fecha Ultimo Ingreso"  title="Fecha Ultimo Ingreso"    size="10" >
							<span id="spanstrMensajefecha_ultimo_ingreso" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_5">
						<td id="td_title-fecha_ultimo_error_ingreso" class="titulocampo">
							<label class="form-label">Fecha Ultimo Error Ingreso.(*)</label>
						</td>
						<td id="td_control-fecha_ultimo_error_ingreso" align="left" class="controlcampo">
							<input id="form-fecha_ultimo_error_ingreso" name="form-fecha_ultimo_error_ingreso" type="text" class="form-control"  placeholder="Fecha Ultimo Error Ingreso"  title="Fecha Ultimo Error Ingreso"    size="10" >
							<span id="spanstrMensajefecha_ultimo_error_ingreso" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-fecha_ultimo_intento" class="titulocampo">
							<label class="form-label">Fecha Ultimo Intento.(*)</label>
						</td>
						<td id="td_control-fecha_ultimo_intento" align="left" class="controlcampo">
							<input id="form-fecha_ultimo_intento" name="form-fecha_ultimo_intento" type="text" class="form-control"  placeholder="Fecha Ultimo Intento"  title="Fecha Ultimo Intento"    size="10" >
							<span id="spanstrMensajefecha_ultimo_intento" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_6">
						<td id="td_title-fecha_ultimo_cierre" class="titulocampo">
							<label class="form-label">Fecha Ultimo Cierre.(*)</label>
						</td>
						<td id="td_control-fecha_ultimo_cierre" align="left" class="controlcampo">
							<input id="form-fecha_ultimo_cierre" name="form-fecha_ultimo_cierre" type="text" class="form-control"  placeholder="Fecha Ultimo Cierre"  title="Fecha Ultimo Cierre"    size="10" >
							<span id="spanstrMensajefecha_ultimo_cierre" class="mensajeerror"></span>
						</td>
					<td></td><td></td></tr>
				</table> <!-- tblElementosresumen_usuario -->

				<!-- SECCION/OCULTOS -->
				<table id="tblCamposOcultosresumen_usuario" class="elementos" style="display: table-row;">
					<caption class="busquedacabecera">
						<span>Campos Ocultos</span>
					</caption>
					
						<td id="td_title-id_usuario" class="titulocampo">
							<label class="form-label">Usuario.(*)</label>
						</td>
						<td id="td_control-id_usuario" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_usuario" name="form-id_usuario" title="Usuario" ></select></td>
									<td><a><img id="form-id_usuario_img" name="form-id_usuario_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_usuario_img_busqueda" name="form-id_usuario_img_busqueda" title="Buscar Usuario" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_usuario" class="mensajeerror"></span>
						</td>
					
				</table> <!-- tblCamposOcultosresumen_usuario -->

			</td></tr> <!-- trresumen_usuarioElementos -->
			</table> <!-- tblresumen_usuarioElementos -->
			</form> <!-- frmMantenimientoresumen_usuario -->


			

				<form id="frmAccionesMantenimientoresumen_usuario" name="frmAccionesMantenimientoresumen_usuario">

			<?php if(resumen_usuario_web::$STR_ES_BUSQUEDA=='false' ) {?>
			<table id="tblresumen_usuarioAcciones" class="elementos" style="text-align: center">
		<tr id="trresumen_usuarioAcciones" class="elementos" style="display:table-row">
			<td align="center">
				<a id="Acciones" ></a>

				<?php if(resumen_usuario_web::$STR_ES_RELACIONES=='false' ) {?>
				<div align="right">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
				<?php } ?>

					<!-- SECCION/BOTONES -->
					<table id="tblAccionesMantenimientoresumen_usuario" class="busqueda" style="width: 50%;text-align: left">

						<?php if(resumen_usuario_web::$STR_ES_RELACIONES=='false' ) {?>
						<!--
						<caption class="busquedacabecera">
							<span>Acciones</span>
						</caption>
						-->
						<?php } ?>

						<tr id="trAccionesMantenimientoresumen_usuarioBasicos">
							<td id="tdbtnNuevoresumen_usuario" style="visibility:visible">
								<div id="divNuevoresumen_usuario" style="display:table-row">
									<input type="button" id="btnNuevoresumen_usuario" name="btnNuevoresumen_usuario" value="NUEVO" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnActualizarresumen_usuario" style="visibility:visible">
								<div id="divActualizarresumen_usuario" style="display:table-row">
									<input type="button" id="btnActualizarresumen_usuario" name="btnActualizarresumen_usuario" title="ACTUALIZAR Resumen Usuario ACTUAL" value="Actualizar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnEliminarresumen_usuario" style="visibility:visible">
								<div id="divEliminarresumen_usuario" style="display:table-row">
									<input type="button" id="btnEliminarresumen_usuario" name="btnEliminarresumen_usuario" title="ELIMINAR Resumen Usuario ACTUAL" value="Eliminar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnImprimirresumen_usuario" style="visibility:visible">
								<input type="button" id="btnImprimirresumen_usuario" name="btnImprimirresumen_usuario" title="IMPRIMIR PAGINA Resumen Usuario ACTUAL" value="Imp. Datos" class="btn btn-primary"/>
							</td>
							<td id="tdbtnCancelarresumen_usuario" style="visibility:visible">
								<input type="button" id="btnCancelarresumen_usuario" name="btnCancelarresumen_usuario" title="CANCELAR Resumen Usuario ACTUAL" value="Cancelar" class="btn btn-primary"/>
							</td>
						</tr>
						<tr id="trAccionesMantenimientoresumen_usuarioGuardar" style="display:none">
							<td id="tdbtnGuardarCambiosresumen_usuario" colspan="4" align="center" style="visibility:visible">
								<div id="divGuardarCambiosresumen_usuario" style="display:table-row">
									<input type="button" id="btnGuardarCambiosFormularioresumen_usuario" name="btnGuardarCambiosFormularioresumen_usuario" title="GUARDAR" value="GUADAR CAMBIOS" class="btn btn-primary"/>
								</div>
							</td>
						</tr>
					</table> <!-- tblAccionesMantenimientoresumen_usuario -->
			</td>
		</tr> <!-- trresumen_usuarioAcciones -->
		<?php if(resumen_usuario_web::$STR_ES_RELACIONADO=='false' ) {?>
		<tr id="trresumen_usuarioParametrosAcciones" class="impresion"  style="display:table-row">
			<td align="center">
				<!-- SECCION/POST -->
				<table id="tblresumen_usuarioParametrosAcciones" style="text-align: center;border: 0px solid black;padding: 0px; border-spacing: 0px">
					<caption class="busquedacabecera" style="padding: 0px;caption-side: top;">
						<span>Acciones Extra/Post</span>
					</caption>
					<tr id="trresumen_usuarioFilaParametrosAcciones">
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
				</table> <!-- tblresumen_usuarioParametrosAcciones -->
			</td>
		</tr> <!-- trresumen_usuarioParametrosAcciones -->
		<?php }?>
		<tr id="trresumen_usuarioMensajes" class="mensajes">
			<td align="center">
				<a id="Mensajes"></a>
			</td>
		</tr> <!-- trresumen_usuarioMensajes -->
			</table> <!-- tblresumen_usuarioAcciones -->
			<?php } ?>
			</form> <!-- frmMantenimientoresumen_usuario -->
			</div> <!-- divMantenimientoresumen_usuarioAjaxWebPart -->
		</td>
	</tr> <!-- trresumen_usuarioElementosFormulario/super -->
		<?php if(resumen_usuario_web::$STR_ES_RELACIONADO=='false' ) {?>

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
			
				import {resumen_usuario_webcontrol,resumen_usuario_webcontrol1} from './webroot/js/JavaScript/contabilidad/seguridad/resumen_usuario/js/webcontrol/resumen_usuario_form_webcontrol.js?random=1';
				
				resumen_usuario_webcontrol1.setresumen_usuario_constante(window.resumen_usuario_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(resumen_usuario_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

