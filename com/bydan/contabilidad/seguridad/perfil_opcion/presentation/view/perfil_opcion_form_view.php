<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\seguridad\perfil_opcion\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Perfil Opcion Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/seguridad/perfil_opcion/util/perfil_opcion_carga.php');
	use com\bydan\contabilidad\seguridad\perfil_opcion\util\perfil_opcion_carga;
	
	//include_once('com/bydan/contabilidad/seguridad/perfil_opcion/presentation/view/perfil_opcion_web.php');
	//use com\bydan\contabilidad\seguridad\perfil_opcion\presentation\view\perfil_opcion_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	perfil_opcion_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	perfil_opcion_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$perfil_opcion_web1= new perfil_opcion_web();	
	$perfil_opcion_web1->cargarDatosGenerales();
	
	//$moduloActual=$perfil_opcion_web1->moduloActual;
	//$usuarioActual=$perfil_opcion_web1->usuarioActual;
	//$sessionBase=$perfil_opcion_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$perfil_opcion_web1->parametroGeneralUsuarioActual;
	
	
		
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
		
		
			<script type="module" src="webroot/js/JavaScript/contabilidad/seguridad/perfil_opcion/js/util/perfil_opcion_form_funcion.js?random=1"></script>
						
		
		
		<?php 
			
		
			perfil_opcion_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					perfil_opcion_web::$GET_POST=$_GET;
				} else {
					perfil_opcion_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			perfil_opcion_web::$STR_NOMBRE_PAGINA = 'perfil_opcion_form_view.php';
			perfil_opcion_web::$BIT_ES_PAGINA_PRINCIPAL = 'false';
			perfil_opcion_web::$BIT_ES_PAGINA_FORM = 'true';
				
			perfil_opcion_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {perfil_opcion_constante,perfil_opcion_constante1} from './webroot/js/JavaScript/contabilidad/seguridad/perfil_opcion/js/util/perfil_opcion_constante.js?random=1';
			import {perfil_opcion_funcion,perfil_opcion_funcion1} from './webroot/js/JavaScript/contabilidad/seguridad/perfil_opcion/js/util/perfil_opcion_funcion.js?random=1';
			
			let perfil_opcion_constante2 = new perfil_opcion_constante();
			
			perfil_opcion_constante2.STR_NOMBRE_PAGINA="<?php echo(perfil_opcion_web::$STR_NOMBRE_PAGINA); ?>";
			perfil_opcion_constante2.STR_TYPE_ON_LOADperfil_opcion="<?php echo(perfil_opcion_web::$STR_TYPE_ONLOAD); ?>";
			perfil_opcion_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(perfil_opcion_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			perfil_opcion_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(perfil_opcion_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			perfil_opcion_constante2.STR_ACTION="<?php echo(perfil_opcion_web::$STR_ACTION); ?>";
			perfil_opcion_constante2.STR_ES_POPUP="<?php echo(perfil_opcion_web::$STR_ES_POPUP); ?>";
			perfil_opcion_constante2.STR_ES_BUSQUEDA="<?php echo(perfil_opcion_web::$STR_ES_BUSQUEDA); ?>";
			perfil_opcion_constante2.STR_FUNCION_JS="<?php echo(perfil_opcion_web::$STR_FUNCION_JS); ?>";
			perfil_opcion_constante2.BIG_ID_ACTUAL="<?php echo(perfil_opcion_web::$BIG_ID_ACTUAL); ?>";
			perfil_opcion_constante2.BIG_ID_OPCION="<?php echo(perfil_opcion_web::$BIG_ID_OPCION); ?>";
			perfil_opcion_constante2.STR_OBJETO_JS="<?php echo(perfil_opcion_web::$STR_OBJETO_JS); ?>";
			perfil_opcion_constante2.STR_ES_RELACIONES="<?php echo(perfil_opcion_web::$STR_ES_RELACIONES); ?>";
			perfil_opcion_constante2.STR_ES_RELACIONADO="<?php echo(perfil_opcion_web::$STR_ES_RELACIONADO); ?>";
			perfil_opcion_constante2.STR_ES_SUB_PAGINA="<?php echo(perfil_opcion_web::$STR_ES_SUB_PAGINA); ?>";
			perfil_opcion_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(perfil_opcion_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			perfil_opcion_constante2.BIT_ES_PAGINA_FORM=<?php echo(perfil_opcion_web::$BIT_ES_PAGINA_FORM); ?>;
			perfil_opcion_constante2.STR_SUFIJO="<?php echo(perfil_opcion_web::$STR_SUF); ?>";//perfil_opcion
			perfil_opcion_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(perfil_opcion_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//perfil_opcion
			
			perfil_opcion_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(perfil_opcion_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			perfil_opcion_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($perfil_opcion_web1->moduloActual->getnombre()); ?>";
			perfil_opcion_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(perfil_opcion_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			perfil_opcion_constante2.BIT_ES_LOAD_NORMAL=true;
			/*perfil_opcion_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			perfil_opcion_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.perfil_opcion_constante2 = perfil_opcion_constante2;
			
		</script>
		
		<?php if(perfil_opcion_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.perfil_opcion_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.perfil_opcion_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="perfil_opcionActual" ></a>
	
	<div id="divResumenperfil_opcionActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(perfil_opcion_web::$STR_ES_RELACIONADO=='false') {?>
		
		<div id="header" >
		
			<div id="banner">
				<span id="spanTituloBanner" class="titulobanner"></span>
			</div> <!-- banner -->
					
			<div id="subheader" class="links">  
			
						
			</div> <!-- sub-header -->
			
			
		</div> <!-- header -->
		
		<?php } ?>
		
		<div id="main">
		

			<?php if(perfil_opcion_web::$STR_ES_RELACIONADO=='false') {?>
			
			
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(perfil_opcion_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(perfil_opcion_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divperfil_opcionPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblperfil_opcionPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmperfil_opcionAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnperfil_opcionAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="perfil_opcion_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnperfil_opcionAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmperfil_opcionAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblperfil_opcionPopupAjaxWebPart -->
		</div> <!-- divperfil_opcionPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->		
		
		
		
			
<tr id="trperfil_opcionElementosFormulario">
	<td>
		<div id="divMantenimientoperfil_opcionAjaxWebPart" title="PERFIL OPCION" style="height: 90%;width: 90%;position: relative;top: 30px;left: 30px;">
			<form id="frmMantenimientoperfil_opcion" name="frmMantenimientoperfil_opcion">

			</br>

			<?php if(perfil_opcion_web::$STR_ES_RELACIONES=='false' ) {?>
			</br>
			<?php } ?>

			<!-- SECCION/TOOLBAR -->
			<table id="tblperfil_opcionToolBarFormularioExterior" style="width: 65%">
				<tr style="display:table-row">
					<td align="center">

						<table id="tblperfil_opcionToolBarFormulario" style="text-align: center"  style="display:table-row">
							<tr>
								<td id="tdperfil_opcionActualizarToolBar" style="visibility:visible">
									<img id="imgActualizarToolBarperfil_opcion" name="imgActualizarToolBarperfil_opcion" title="ACTUALIZAR Perfil Opcion ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/actualizar.gif" width="25" height="25"/>
								</td>
								<td id="tdperfil_opcionEliminarToolBar" style="visibility:visible">
									<img id="imgEliminarToolBarperfil_opcion" name="imgEliminarToolBarperfil_opcion" title="ELIMINAR Perfil Opcion ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/eliminar.gif" width="25" height="25"/>
								</td>
								<td id="tdperfil_opcionCancelarToolBar" style="visibility:visible">
									<img id="imgCancelarToolBarperfil_opcion" name="imgCancelarToolBarperfil_opcion" title="CANCELAR Perfil Opcion ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/cancelar.gif" width="25" height="25"/>
								</td>
								<td id="tdperfil_opcionRelacionesToolBar" style="display:table-row">
									<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/xexpand.png" width="25" height="25" onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('tblCamposOcultosperfil_opcion',this,'../')"/>
								</td>
							</tr>
						</table> <!-- tblperfil_opcionToolBarFormulario -->

					</td>
				</tr>
			</table> <!-- tblperfil_opcionToolBarFormularioExterior -->

			<table id="tblperfil_opcionElementos">
			<tr id="trperfil_opcionElementos" class="elementos" style="display:table-row">
			<td align="center">

			<a id="Campos"></a>

				<?php if(perfil_opcion_web::$STR_ES_RELACIONES=='false' ) {?>
				<div id="divFlechaArribaElementos" align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
					<span></span>
				</div>
				<?php } ?>

				<!-- SECCION/FORMULARIO -->
				<table id="tblElementosperfil_opcion" class="elementos" style="width: 300px; padding: 0px; border-spacing: 0px; border-collapse: collapse; text-align: left;">
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
						<td id="td_title-id_perfil" class="titulocampo">
							<label class="form-label">Perfil.(*)</label>
						</td>
						<td id="td_control-id_perfil" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_perfil" name="form-id_perfil" title="Perfil" ></select></td>
									<td><a><img id="form-id_perfil_img" name="form-id_perfil_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_perfil_img_busqueda" name="form-id_perfil_img_busqueda" title="Buscar Perfil" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_perfil" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_5">
						<td id="td_title-id_opcion" class="titulocampo">
							<label class="form-label">Opcion.(*)</label>
						</td>
						<td id="td_control-id_opcion" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_opcion" name="form-id_opcion" title="Opcion" ></select></td>
									<td><a><img id="form-id_opcion_img" name="form-id_opcion_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_opcion_img_busqueda" name="form-id_opcion_img_busqueda" title="Buscar Opcion" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_opcion" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_6">
						<td id="td_title-todo" class="titulocampo">
							<label class="form-label">Todo</label>
						</td>
						<td id="td_control-todo" align="left" class="controlcampo">
							<input id="form-todo" name="form-todo" type="checkbox" >
							<span id="spanstrMensajetodo" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_7">
						<td id="td_title-ingreso" class="titulocampo">
							<label class="form-label">Ingreso</label>
						</td>
						<td id="td_control-ingreso" align="left" class="controlcampo">
							<input id="form-ingreso" name="form-ingreso" type="checkbox" >
							<span id="spanstrMensajeingreso" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_8">
						<td id="td_title-modificacion" class="titulocampo">
							<label class="form-label">Modificación</label>
						</td>
						<td id="td_control-modificacion" align="left" class="controlcampo">
							<input id="form-modificacion" name="form-modificacion" type="checkbox" >
							<span id="spanstrMensajemodificacion" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_9">
						<td id="td_title-eliminacion" class="titulocampo">
							<label class="form-label">Eliminación</label>
						</td>
						<td id="td_control-eliminacion" align="left" class="controlcampo">
							<input id="form-eliminacion" name="form-eliminacion" type="checkbox" >
							<span id="spanstrMensajeeliminacion" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_10">
						<td id="td_title-consulta" class="titulocampo">
							<label class="form-label">Consulta</label>
						</td>
						<td id="td_control-consulta" align="left" class="controlcampo">
							<input id="form-consulta" name="form-consulta" type="checkbox" >
							<span id="spanstrMensajeconsulta" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_11">
						<td id="td_title-busqueda" class="titulocampo">
							<label class="form-label">Busqueda</label>
						</td>
						<td id="td_control-busqueda" align="left" class="controlcampo">
							<input id="form-busqueda" name="form-busqueda" type="checkbox" >
							<span id="spanstrMensajebusqueda" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_12">
						<td id="td_title-reporte" class="titulocampo">
							<label class="form-label">Reporte</label>
						</td>
						<td id="td_control-reporte" align="left" class="controlcampo">
							<input id="form-reporte" name="form-reporte" type="checkbox" >
							<span id="spanstrMensajereporte" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_13">
						<td id="td_title-estado" class="titulocampo">
							<label class="form-label">Estado</label>
						</td>
						<td id="td_control-estado" align="left" class="controlcampo">
							<input id="form-estado" name="form-estado" type="checkbox" >
							<span id="spanstrMensajeestado" class="mensajeerror"></span>
						</td>
					</tr>
				</table> <!-- tblElementosperfil_opcion -->

				<!-- SECCION/OCULTOS -->
				<table id="tblCamposOcultosperfil_opcion" class="elementos" style="display: table-row;">
					<caption class="busquedacabecera">
						<span>Campos Ocultos</span>
					</caption>
				</table> <!-- tblCamposOcultosperfil_opcion -->

			</td></tr> <!-- trperfil_opcionElementos -->
			</table> <!-- tblperfil_opcionElementos -->
			</form> <!-- frmMantenimientoperfil_opcion -->


			

				<form id="frmAccionesMantenimientoperfil_opcion" name="frmAccionesMantenimientoperfil_opcion">

			<?php if(perfil_opcion_web::$STR_ES_BUSQUEDA=='false' ) {?>
			<table id="tblperfil_opcionAcciones" class="elementos" style="text-align: center">
		<tr id="trperfil_opcionAcciones" class="elementos" style="display:table-row">
			<td align="center">
				<a id="Acciones" ></a>

				<?php if(perfil_opcion_web::$STR_ES_RELACIONES=='false' ) {?>
				<div align="right">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
				<?php } ?>

					<!-- SECCION/BOTONES -->
					<table id="tblAccionesMantenimientoperfil_opcion" class="busqueda" style="width: 50%;text-align: left">

						<?php if(perfil_opcion_web::$STR_ES_RELACIONES=='false' ) {?>
						<!--
						<caption class="busquedacabecera">
							<span>Acciones</span>
						</caption>
						-->
						<?php } ?>

						<tr id="trAccionesMantenimientoperfil_opcionBasicos">
							<td id="tdbtnNuevoperfil_opcion" style="visibility:visible">
								<div id="divNuevoperfil_opcion" style="display:table-row">
									<input type="button" id="btnNuevoperfil_opcion" name="btnNuevoperfil_opcion" value="NUEVO" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnActualizarperfil_opcion" style="visibility:visible">
								<div id="divActualizarperfil_opcion" style="display:table-row">
									<input type="button" id="btnActualizarperfil_opcion" name="btnActualizarperfil_opcion" title="ACTUALIZAR Perfil Opcion ACTUAL" value="Actualizar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnEliminarperfil_opcion" style="visibility:visible">
								<div id="divEliminarperfil_opcion" style="display:table-row">
									<input type="button" id="btnEliminarperfil_opcion" name="btnEliminarperfil_opcion" title="ELIMINAR Perfil Opcion ACTUAL" value="Eliminar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnImprimirperfil_opcion" style="visibility:visible">
								<input type="button" id="btnImprimirperfil_opcion" name="btnImprimirperfil_opcion" title="IMPRIMIR PAGINA Perfil Opcion ACTUAL" value="Imp. Datos" class="btn btn-primary"/>
							</td>
							<td id="tdbtnCancelarperfil_opcion" style="visibility:visible">
								<input type="button" id="btnCancelarperfil_opcion" name="btnCancelarperfil_opcion" title="CANCELAR Perfil Opcion ACTUAL" value="Cancelar" class="btn btn-primary"/>
							</td>
						</tr>
						<tr id="trAccionesMantenimientoperfil_opcionGuardar" style="display:none">
							<td id="tdbtnGuardarCambiosperfil_opcion" colspan="4" align="center" style="visibility:visible">
								<div id="divGuardarCambiosperfil_opcion" style="display:table-row">
									<input type="button" id="btnGuardarCambiosFormularioperfil_opcion" name="btnGuardarCambiosFormularioperfil_opcion" title="GUARDAR" value="GUADAR CAMBIOS" class="btn btn-primary"/>
								</div>
							</td>
						</tr>
					</table> <!-- tblAccionesMantenimientoperfil_opcion -->
			</td>
		</tr> <!-- trperfil_opcionAcciones -->
		<?php if(perfil_opcion_web::$STR_ES_RELACIONADO=='false' ) {?>
		<tr id="trperfil_opcionParametrosAcciones" class="impresion"  style="display:table-row">
			<td align="center">
				<!-- SECCION/POST -->
				<table id="tblperfil_opcionParametrosAcciones" style="text-align: center;border: 0px solid black;padding: 0px; border-spacing: 0px">
					<caption class="busquedacabecera" style="padding: 0px;caption-side: top;">
						<span>Acciones Extra/Post</span>
					</caption>
					<tr id="trperfil_opcionFilaParametrosAcciones">
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
				</table> <!-- tblperfil_opcionParametrosAcciones -->
			</td>
		</tr> <!-- trperfil_opcionParametrosAcciones -->
		<?php }?>
		<tr id="trperfil_opcionMensajes" class="mensajes">
			<td align="center">
				<a id="Mensajes"></a>
			</td>
		</tr> <!-- trperfil_opcionMensajes -->
			</table> <!-- tblperfil_opcionAcciones -->
			<?php } ?>
			</form> <!-- frmMantenimientoperfil_opcion -->
			</div> <!-- divMantenimientoperfil_opcionAjaxWebPart -->
		</td>
	</tr> <!-- trperfil_opcionElementosFormulario/super -->
		<?php if(perfil_opcion_web::$STR_ES_RELACIONADO=='false' ) {?>

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
			
				import {perfil_opcion_webcontrol,perfil_opcion_webcontrol1} from './webroot/js/JavaScript/contabilidad/seguridad/perfil_opcion/js/webcontrol/perfil_opcion_form_webcontrol.js?random=1';
				
				perfil_opcion_webcontrol1.setperfil_opcion_constante(window.perfil_opcion_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(perfil_opcion_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

