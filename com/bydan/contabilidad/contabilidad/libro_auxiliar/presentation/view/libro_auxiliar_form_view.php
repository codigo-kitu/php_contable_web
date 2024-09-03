<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\contabilidad\libro_auxiliar\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Libro Auxiliar Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/contabilidad/libro_auxiliar/util/libro_auxiliar_carga.php');
	use com\bydan\contabilidad\contabilidad\libro_auxiliar\util\libro_auxiliar_carga;
	
	//include_once('com/bydan/contabilidad/contabilidad/libro_auxiliar/presentation/view/libro_auxiliar_web.php');
	//use com\bydan\contabilidad\contabilidad\libro_auxiliar\presentation\view\libro_auxiliar_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	libro_auxiliar_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	libro_auxiliar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$libro_auxiliar_web1= new libro_auxiliar_web();	
	$libro_auxiliar_web1->cargarDatosGenerales();
	
	//$moduloActual=$libro_auxiliar_web1->moduloActual;
	//$usuarioActual=$libro_auxiliar_web1->usuarioActual;
	//$sessionBase=$libro_auxiliar_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$libro_auxiliar_web1->parametroGeneralUsuarioActual;
	
	
		
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
		
		
			<script type="module" src="webroot/js/JavaScript/contabilidad/contabilidad/libro_auxiliar/js/util/libro_auxiliar_form_funcion.js?random=1"></script>
						
		
		
		<?php 
			
		
			libro_auxiliar_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					libro_auxiliar_web::$GET_POST=$_GET;
				} else {
					libro_auxiliar_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			libro_auxiliar_web::$STR_NOMBRE_PAGINA = 'libro_auxiliar_form_view.php';
			libro_auxiliar_web::$BIT_ES_PAGINA_PRINCIPAL = 'false';
			libro_auxiliar_web::$BIT_ES_PAGINA_FORM = 'true';
				
			libro_auxiliar_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {libro_auxiliar_constante,libro_auxiliar_constante1} from './webroot/js/JavaScript/contabilidad/contabilidad/libro_auxiliar/js/util/libro_auxiliar_constante.js?random=1';
			import {libro_auxiliar_funcion,libro_auxiliar_funcion1} from './webroot/js/JavaScript/contabilidad/contabilidad/libro_auxiliar/js/util/libro_auxiliar_funcion.js?random=1';
			
			let libro_auxiliar_constante2 = new libro_auxiliar_constante();
			
			libro_auxiliar_constante2.STR_NOMBRE_PAGINA="<?php echo(libro_auxiliar_web::$STR_NOMBRE_PAGINA); ?>";
			libro_auxiliar_constante2.STR_TYPE_ON_LOADlibro_auxiliar="<?php echo(libro_auxiliar_web::$STR_TYPE_ONLOAD); ?>";
			libro_auxiliar_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(libro_auxiliar_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			libro_auxiliar_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(libro_auxiliar_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			libro_auxiliar_constante2.STR_ACTION="<?php echo(libro_auxiliar_web::$STR_ACTION); ?>";
			libro_auxiliar_constante2.STR_ES_POPUP="<?php echo(libro_auxiliar_web::$STR_ES_POPUP); ?>";
			libro_auxiliar_constante2.STR_ES_BUSQUEDA="<?php echo(libro_auxiliar_web::$STR_ES_BUSQUEDA); ?>";
			libro_auxiliar_constante2.STR_FUNCION_JS="<?php echo(libro_auxiliar_web::$STR_FUNCION_JS); ?>";
			libro_auxiliar_constante2.BIG_ID_ACTUAL="<?php echo(libro_auxiliar_web::$BIG_ID_ACTUAL); ?>";
			libro_auxiliar_constante2.BIG_ID_OPCION="<?php echo(libro_auxiliar_web::$BIG_ID_OPCION); ?>";
			libro_auxiliar_constante2.STR_OBJETO_JS="<?php echo(libro_auxiliar_web::$STR_OBJETO_JS); ?>";
			libro_auxiliar_constante2.STR_ES_RELACIONES="<?php echo(libro_auxiliar_web::$STR_ES_RELACIONES); ?>";
			libro_auxiliar_constante2.STR_ES_RELACIONADO="<?php echo(libro_auxiliar_web::$STR_ES_RELACIONADO); ?>";
			libro_auxiliar_constante2.STR_ES_SUB_PAGINA="<?php echo(libro_auxiliar_web::$STR_ES_SUB_PAGINA); ?>";
			libro_auxiliar_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(libro_auxiliar_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			libro_auxiliar_constante2.BIT_ES_PAGINA_FORM=<?php echo(libro_auxiliar_web::$BIT_ES_PAGINA_FORM); ?>;
			libro_auxiliar_constante2.STR_SUFIJO="<?php echo(libro_auxiliar_web::$STR_SUF); ?>";//libro_auxiliar
			libro_auxiliar_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(libro_auxiliar_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//libro_auxiliar
			
			libro_auxiliar_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(libro_auxiliar_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			libro_auxiliar_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($libro_auxiliar_web1->moduloActual->getnombre()); ?>";
			libro_auxiliar_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(libro_auxiliar_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			libro_auxiliar_constante2.BIT_ES_LOAD_NORMAL=true;
			/*libro_auxiliar_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			libro_auxiliar_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.libro_auxiliar_constante2 = libro_auxiliar_constante2;
			
		</script>
		
		<?php if(libro_auxiliar_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.libro_auxiliar_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.libro_auxiliar_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="libro_auxiliarActual" ></a>
	
	<div id="divResumenlibro_auxiliarActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(libro_auxiliar_web::$STR_ES_RELACIONADO=='false') {?>
		
		<div id="header" >
		
			<div id="banner">
				<span id="spanTituloBanner" class="titulobanner"></span>
			</div> <!-- banner -->
					
			<div id="subheader" class="links">  
			
						
			</div> <!-- sub-header -->
			
			
		</div> <!-- header -->
		
		<?php } ?>
		
		<div id="main">
		

			<?php if(libro_auxiliar_web::$STR_ES_RELACIONADO=='false') {?>
			
			
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(libro_auxiliar_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(libro_auxiliar_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divlibro_auxiliarPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tbllibro_auxiliarPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmlibro_auxiliarAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnlibro_auxiliarAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="libro_auxiliar_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnlibro_auxiliarAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmlibro_auxiliarAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tbllibro_auxiliarPopupAjaxWebPart -->
		</div> <!-- divlibro_auxiliarPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->		
		
		
		
			
<tr id="trlibro_auxiliarElementosFormulario">
	<td>
		<div id="divMantenimientolibro_auxiliarAjaxWebPart" title="LIBRO AUXILIAR" style="height: 90%;width: 90%;position: relative;top: 30px;left: 30px;">
			<form id="frmMantenimientolibro_auxiliar" name="frmMantenimientolibro_auxiliar">

			</br>

			<?php if(libro_auxiliar_web::$STR_ES_RELACIONES=='false' ) {?>
			</br>
			<?php } ?>

			<!-- SECCION/TOOLBAR -->
			<table id="tbllibro_auxiliarToolBarFormularioExterior" style="width: 65%">
				<tr style="display:table-row">
					<td align="center">

						<table id="tbllibro_auxiliarToolBarFormulario" style="text-align: center"  style="display:table-row">
							<tr>
								<td id="tdlibro_auxiliarActualizarToolBar" style="visibility:visible">
									<img id="imgActualizarToolBarlibro_auxiliar" name="imgActualizarToolBarlibro_auxiliar" title="ACTUALIZAR Libro Auxiliar ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/actualizar.gif" width="25" height="25"/>
								</td>
								<td id="tdlibro_auxiliarEliminarToolBar" style="visibility:visible">
									<img id="imgEliminarToolBarlibro_auxiliar" name="imgEliminarToolBarlibro_auxiliar" title="ELIMINAR Libro Auxiliar ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/eliminar.gif" width="25" height="25"/>
								</td>
								<td id="tdlibro_auxiliarCancelarToolBar" style="visibility:visible">
									<img id="imgCancelarToolBarlibro_auxiliar" name="imgCancelarToolBarlibro_auxiliar" title="CANCELAR Libro Auxiliar ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/cancelar.gif" width="25" height="25"/>
								</td>
								<td id="tdlibro_auxiliarRelacionesToolBar" style="display:table-row">
									<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/xexpand.png" width="25" height="25" onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('tblCamposOcultoslibro_auxiliar',this,'../')"/>
								</td>
							</tr>
						</table> <!-- tbllibro_auxiliarToolBarFormulario -->

					</td>
				</tr>
			</table> <!-- tbllibro_auxiliarToolBarFormularioExterior -->

			<table id="tbllibro_auxiliarElementos">
			<tr id="trlibro_auxiliarElementos" class="elementos" style="display:table-row">
			<td align="center">

			<a id="Campos"></a>

				<?php if(libro_auxiliar_web::$STR_ES_RELACIONES=='false' ) {?>
				<div id="divFlechaArribaElementos" align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
					<span></span>
				</div>
				<?php } ?>

				<!-- SECCION/FORMULARIO -->
				<table id="tblElementoslibro_auxiliar" class="elementos" style="width: 400px; padding: 0px; border-spacing: 0px; border-collapse: collapse; text-align: left;">
					<tr id="tr_fila_1">
								<td id="td_title-id" class="titulocampo">
									<label class="form-label">Cod. Único</label>
								</td>
								<td id="td_control-id" align="left">
									<input id="form-id" name="form-id" type="text" class="form-control"  size="10">
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
						<td id="td_title-iniciales" class="titulocampo">
							<label class="form-label">Iniciales.(*)</label>
						</td>
						<td id="td_control-iniciales" align="left" class="controlcampo">
							<input id="form-iniciales" name="form-iniciales" type="text" class="form-control"  placeholder="Iniciales"  title="Iniciales"    size="3"  maxlength="3"/>
							<span id="spanstrMensajeiniciales" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_5">
						<td id="td_title-nombre" class="titulocampo">
							<label class="form-label">Nombre.(*)</label>
						</td>
						<td id="td_control-nombre" align="left" class="controlcampo">
							<textarea id="form-nombre" name="form-nombre" class="form-control"  placeholder="Nombre"  title="Nombre"   style="font-size: 13px;" rows="2" cols="25" size="20" ></textarea>
							<span id="spanstrMensajenombre" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_6">
						<td id="td_title-secuencial" class="titulocampo">
							<label class="form-label">Secuencial.(*)</label>
						</td>
						<td id="td_control-secuencial" align="left" class="controlcampo">
							<input id="form-secuencial" name="form-secuencial" type="text" class="form-control"  placeholder="Secuencial"  title="Secuencial"    maxlength="10" size="10" >
							<span id="spanstrMensajesecuencial" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_7">
						<td id="td_title-incremento" class="titulocampo">
							<label class="form-label">Incremento.(*)</label>
						</td>
						<td id="td_control-incremento" align="left" class="controlcampo">
							<input id="form-incremento" name="form-incremento" type="text" class="form-control"  placeholder="Incremento"  title="Incremento"    maxlength="10" size="10" >
							<span id="spanstrMensajeincremento" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_8">
						<td id="td_title-reinicia_secuencial_mes" class="titulocampo">
							<label class="form-label">Reinicia Secuencial Mes</label>
						</td>
						<td id="td_control-reinicia_secuencial_mes" align="left" class="controlcampo">
							<input id="form-reinicia_secuencial_mes" name="form-reinicia_secuencial_mes" type="checkbox" >
							<span id="spanstrMensajereinicia_secuencial_mes" class="mensajeerror"></span>
						</td>
					</tr>
				</table> <!-- tblElementoslibro_auxiliar -->

				<!-- SECCION/OCULTOS -->
				<table id="tblCamposOcultoslibro_auxiliar" class="elementos" style="display: table-row;">
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
						<td id="td_title-generado_por" class="titulocampo">
							<label class="form-label">Generado Por.(*)</label>
						</td>
						<td id="td_control-generado_por" align="left" class="controlcampo">
							<input id="form-generado_por" name="form-generado_por" type="text" class="form-control"  placeholder="Generado Por"  title="Generado Por"    maxlength="10" size="10" >
							<span id="spanstrMensajegenerado_por" class="mensajeerror"></span>
						</td>
					</tr>
				</table> <!-- tblCamposOcultoslibro_auxiliar -->

			</td></tr> <!-- trlibro_auxiliarElementos -->
			</table> <!-- tbllibro_auxiliarElementos -->
			</form> <!-- frmMantenimientolibro_auxiliar -->


			

				<form id="frmAccionesMantenimientolibro_auxiliar" name="frmAccionesMantenimientolibro_auxiliar">

			<?php if(libro_auxiliar_web::$STR_ES_BUSQUEDA=='false' ) {?>
			<table id="tbllibro_auxiliarAcciones" class="elementos" style="text-align: center">
		<tr id="trlibro_auxiliarAcciones" class="elementos" style="display:table-row">
			<td align="center">
				<a id="Acciones" ></a>

				<?php if(libro_auxiliar_web::$STR_ES_RELACIONES=='false' ) {?>
				<div align="right">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
				<?php } ?>

					<!-- SECCION/BOTONES -->
					<table id="tblAccionesMantenimientolibro_auxiliar" class="busqueda" style="width: 50%;text-align: left">

						<?php if(libro_auxiliar_web::$STR_ES_RELACIONES=='false' ) {?>
						<!--
						<caption class="busquedacabecera">
							<span>Acciones</span>
						</caption>
						-->
						<?php } ?>

						<tr id="trAccionesMantenimientolibro_auxiliarBasicos">
							<td id="tdbtnNuevolibro_auxiliar" style="visibility:visible">
								<div id="divNuevolibro_auxiliar" style="display:table-row">
									<input type="button" id="btnNuevolibro_auxiliar" name="btnNuevolibro_auxiliar" value="NUEVO" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnActualizarlibro_auxiliar" style="visibility:visible">
								<div id="divActualizarlibro_auxiliar" style="display:table-row">
									<input type="button" id="btnActualizarlibro_auxiliar" name="btnActualizarlibro_auxiliar" title="ACTUALIZAR Libro Auxiliar ACTUAL" value="Actualizar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnEliminarlibro_auxiliar" style="visibility:visible">
								<div id="divEliminarlibro_auxiliar" style="display:table-row">
									<input type="button" id="btnEliminarlibro_auxiliar" name="btnEliminarlibro_auxiliar" title="ELIMINAR Libro Auxiliar ACTUAL" value="Eliminar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnImprimirlibro_auxiliar" style="visibility:visible">
								<input type="button" id="btnImprimirlibro_auxiliar" name="btnImprimirlibro_auxiliar" title="IMPRIMIR PAGINA Libro Auxiliar ACTUAL" value="Imp. Datos" class="btn btn-primary"/>
							</td>
							<td id="tdbtnCancelarlibro_auxiliar" style="visibility:visible">
								<input type="button" id="btnCancelarlibro_auxiliar" name="btnCancelarlibro_auxiliar" title="CANCELAR Libro Auxiliar ACTUAL" value="Cancelar" class="btn btn-primary"/>
							</td>
						</tr>
						<tr id="trAccionesMantenimientolibro_auxiliarGuardar" style="display:none">
							<td id="tdbtnGuardarCambioslibro_auxiliar" colspan="4" align="center" style="visibility:visible">
								<div id="divGuardarCambioslibro_auxiliar" style="display:table-row">
									<input type="button" id="btnGuardarCambiosFormulariolibro_auxiliar" name="btnGuardarCambiosFormulariolibro_auxiliar" title="GUARDAR" value="GUADAR CAMBIOS" class="btn btn-primary"/>
								</div>
							</td>
						</tr>
					</table> <!-- tblAccionesMantenimientolibro_auxiliar -->
			</td>
		</tr> <!-- trlibro_auxiliarAcciones -->
		<?php if(libro_auxiliar_web::$STR_ES_RELACIONADO=='false' ) {?>
		<tr id="trlibro_auxiliarParametrosAcciones" class="impresion"  style="display:table-row">
			<td align="center">
				<!-- SECCION/POST -->
				<table id="tbllibro_auxiliarParametrosAcciones" style="text-align: center;border: 0px solid black;padding: 0px; border-spacing: 0px">
					<caption class="busquedacabecera" style="padding: 0px;caption-side: top;">
						<span>Acciones Extra/Post</span>
					</caption>
					<tr id="trlibro_auxiliarFilaParametrosAcciones">
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
				</table> <!-- tbllibro_auxiliarParametrosAcciones -->
			</td>
		</tr> <!-- trlibro_auxiliarParametrosAcciones -->
		<?php }?>
		<tr id="trlibro_auxiliarMensajes" class="mensajes">
			<td align="center">
				<a id="Mensajes"></a>
			</td>
		</tr> <!-- trlibro_auxiliarMensajes -->
			</table> <!-- tbllibro_auxiliarAcciones -->
			<?php } ?>
			</form> <!-- frmMantenimientolibro_auxiliar -->
			</div> <!-- divMantenimientolibro_auxiliarAjaxWebPart -->
		</td>
	</tr> <!-- trlibro_auxiliarElementosFormulario/super -->
		<?php if(libro_auxiliar_web::$STR_ES_RELACIONADO=='false' ) {?>

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
			
				import {libro_auxiliar_webcontrol,libro_auxiliar_webcontrol1} from './webroot/js/JavaScript/contabilidad/contabilidad/libro_auxiliar/js/webcontrol/libro_auxiliar_form_webcontrol.js?random=1';
				
				libro_auxiliar_webcontrol1.setlibro_auxiliar_constante(window.libro_auxiliar_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(libro_auxiliar_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

