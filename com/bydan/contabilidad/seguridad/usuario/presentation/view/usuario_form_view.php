<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\seguridad\usuario\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Usuario Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/seguridad/usuario/util/usuario_carga.php');
	use com\bydan\contabilidad\seguridad\usuario\util\usuario_carga;
	
	//include_once('com/bydan/contabilidad/seguridad/usuario/presentation/view/usuario_web.php');
	//use com\bydan\contabilidad\seguridad\usuario\presentation\view\usuario_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	usuario_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	usuario_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$usuario_web1= new usuario_web();	
	$usuario_web1->cargarDatosGenerales();
	
	//$moduloActual=$usuario_web1->moduloActual;
	//$usuarioActual=$usuario_web1->usuarioActual;
	//$sessionBase=$usuario_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$usuario_web1->parametroGeneralUsuarioActual;
	
	
		
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
		
		
			<script type="module" src="webroot/js/JavaScript/contabilidad/seguridad/usuario/js/util/usuario_form_funcion.js?random=1"></script>
						
		
		
		<?php 
			
		
			usuario_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					usuario_web::$GET_POST=$_GET;
				} else {
					usuario_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			usuario_web::$STR_NOMBRE_PAGINA = 'usuario_form_view.php';
			usuario_web::$BIT_ES_PAGINA_PRINCIPAL = 'false';
			usuario_web::$BIT_ES_PAGINA_FORM = 'true';
				
			usuario_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {usuario_constante,usuario_constante1} from './webroot/js/JavaScript/contabilidad/seguridad/usuario/js/util/usuario_constante.js?random=1';
			import {usuario_funcion,usuario_funcion1} from './webroot/js/JavaScript/contabilidad/seguridad/usuario/js/util/usuario_funcion.js?random=1';
			
			let usuario_constante2 = new usuario_constante();
			
			usuario_constante2.STR_NOMBRE_PAGINA="<?php echo(usuario_web::$STR_NOMBRE_PAGINA); ?>";
			usuario_constante2.STR_TYPE_ON_LOADusuario="<?php echo(usuario_web::$STR_TYPE_ONLOAD); ?>";
			usuario_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(usuario_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			usuario_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(usuario_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			usuario_constante2.STR_ACTION="<?php echo(usuario_web::$STR_ACTION); ?>";
			usuario_constante2.STR_ES_POPUP="<?php echo(usuario_web::$STR_ES_POPUP); ?>";
			usuario_constante2.STR_ES_BUSQUEDA="<?php echo(usuario_web::$STR_ES_BUSQUEDA); ?>";
			usuario_constante2.STR_FUNCION_JS="<?php echo(usuario_web::$STR_FUNCION_JS); ?>";
			usuario_constante2.BIG_ID_ACTUAL="<?php echo(usuario_web::$BIG_ID_ACTUAL); ?>";
			usuario_constante2.BIG_ID_OPCION="<?php echo(usuario_web::$BIG_ID_OPCION); ?>";
			usuario_constante2.STR_OBJETO_JS="<?php echo(usuario_web::$STR_OBJETO_JS); ?>";
			usuario_constante2.STR_ES_RELACIONES="<?php echo(usuario_web::$STR_ES_RELACIONES); ?>";
			usuario_constante2.STR_ES_RELACIONADO="<?php echo(usuario_web::$STR_ES_RELACIONADO); ?>";
			usuario_constante2.STR_ES_SUB_PAGINA="<?php echo(usuario_web::$STR_ES_SUB_PAGINA); ?>";
			usuario_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(usuario_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			usuario_constante2.BIT_ES_PAGINA_FORM=<?php echo(usuario_web::$BIT_ES_PAGINA_FORM); ?>;
			usuario_constante2.STR_SUFIJO="<?php echo(usuario_web::$STR_SUF); ?>";//usuario
			usuario_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(usuario_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//usuario
			
			usuario_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(usuario_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			usuario_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($usuario_web1->moduloActual->getnombre()); ?>";
			usuario_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(usuario_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			usuario_constante2.BIT_ES_LOAD_NORMAL=true;
			/*usuario_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			usuario_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.usuario_constante2 = usuario_constante2;
			
		</script>
		
		<?php if(usuario_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.usuario_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.usuario_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="usuarioActual" ></a>
	
	<div id="divResumenusuarioActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(usuario_web::$STR_ES_RELACIONADO=='false') {?>
		
		<div id="header" >
		
			<div id="banner">
				<span id="spanTituloBanner" class="titulobanner"></span>
			</div> <!-- banner -->
					
			<div id="subheader" class="links">  
			
						
			</div> <!-- sub-header -->
			
			
		</div> <!-- header -->
		
		<?php } ?>
		
		<div id="main">
		

			<?php if(usuario_web::$STR_ES_RELACIONADO=='false') {?>
			
			
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(usuario_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(usuario_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divusuarioPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblusuarioPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmusuarioAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnusuarioAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="usuario_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnusuarioAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmusuarioAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblusuarioPopupAjaxWebPart -->
		</div> <!-- divusuarioPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->		
		
		
		
			
<tr id="trusuarioElementosFormulario">
	<td>
		<div id="divMantenimientousuarioAjaxWebPart" title="USUARIO" style="height: 90%;width: 90%;position: relative;top: 30px;left: 30px;">
			<form id="frmMantenimientousuario" name="frmMantenimientousuario">

			</br>

			<?php if(usuario_web::$STR_ES_RELACIONES=='false' ) {?>
			</br>
			<?php } ?>

			<!-- SECCION/TOOLBAR -->
			<table id="tblusuarioToolBarFormularioExterior" style="width: 65%">
				<tr style="display:table-row">
					<td align="center">

						<table id="tblusuarioToolBarFormulario" style="text-align: center"  style="display:table-row">
							<tr>
								<td id="tdusuarioActualizarToolBar" style="visibility:visible">
									<img id="imgActualizarToolBarusuario" name="imgActualizarToolBarusuario" title="ACTUALIZAR Usuario ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/actualizar.gif" width="25" height="25"/>
								</td>
								<td id="tdusuarioEliminarToolBar" style="visibility:visible">
									<img id="imgEliminarToolBarusuario" name="imgEliminarToolBarusuario" title="ELIMINAR Usuario ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/eliminar.gif" width="25" height="25"/>
								</td>
								<td id="tdusuarioCancelarToolBar" style="visibility:visible">
									<img id="imgCancelarToolBarusuario" name="imgCancelarToolBarusuario" title="CANCELAR Usuario ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/cancelar.gif" width="25" height="25"/>
								</td>
								<td id="tdusuarioRelacionesToolBar" style="display:table-row">
									<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/xexpand.png" width="25" height="25" onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('tblCamposOcultosusuario',this,'../')"/>
								</td>
							</tr>
						</table> <!-- tblusuarioToolBarFormulario -->

					</td>
				</tr>
			</table> <!-- tblusuarioToolBarFormularioExterior -->

			<table id="tblusuarioElementos">
			<tr id="trusuarioElementos" class="elementos" style="display:table-row">
			<td align="center">

			<a id="Campos"></a>

				<?php if(usuario_web::$STR_ES_RELACIONES=='false' ) {?>
				<div id="divFlechaArribaElementos" align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
					<span></span>
				</div>
				<?php } ?>

				<!-- SECCION/FORMULARIO -->
				<table id="tblElementosusuario" class="elementos" style="width: 350px; padding: 0px; border-spacing: 0px; border-collapse: collapse; text-align: center;">
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
						<td id="td_title-user_name" class="titulocampo">
							<label class="form-label">Nombre De Usuario.(*)</label>
						</td>
						<td id="td_control-user_name" align="left" class="controlcampo">
							<input id="form-user_name" name="form-user_name" type="text" class="form-control"  placeholder="Nombre De Usuario"  title="Nombre De Usuario"    size="20"  maxlength="50"/>
							<span id="spanstrMensajeuser_name" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_5">
						<td id="td_title-clave" class="titulocampo">
							<label class="form-label">Clave.(*)</label>
						</td>
						<td id="td_control-clave" align="left" class="controlcampo">
							<input id="form-clave" name="form-clave" type="password" class="form-control"  placeholder="Clave"  title="Clave"   style="font-size: 13px; height:3em; width:25em; size="20" " ></input>
							<span id="spanstrMensajeclave" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_6">
						<td id="td_title-confirmar_clave" class="titulocampo">
							<label class="form-label">Confirmar Clave.(*)</label>
						</td>
						<td id="td_control-confirmar_clave" align="left" class="controlcampo">
							<input id="form-confirmar_clave" name="form-confirmar_clave" type="password" class="form-control"  placeholder="Confirmar Clave"  title="Confirmar Clave"   style="font-size: 13px; height:3em; width:25em; size="20" " ></input>
							<span id="spanstrMensajeconfirmar_clave" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_7">
						<td id="td_title-nombre" class="titulocampo">
							<label class="form-label">Nombre Completo.(*)</label>
						</td>
						<td id="td_control-nombre" align="left" class="controlcampo">
							<textarea id="form-nombre" name="form-nombre" class="form-control"  placeholder="Nombre Completo"  title="Nombre Completo"   style="font-size: 13px;" rows="3" cols="25" size="20" ></textarea>
							<span id="spanstrMensajenombre" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_8">
						<td id="td_title-codigo_alterno" class="titulocampo">
							<label class="form-label">Código Alterno.(*)</label>
						</td>
						<td id="td_control-codigo_alterno" align="left" class="controlcampo">
							<input id="form-codigo_alterno" name="form-codigo_alterno" type="text" class="form-control"  placeholder="Código Alterno"  title="Código Alterno"    size="20"  maxlength="50"/>
							<span id="spanstrMensajecodigo_alterno" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_9">
						<td id="td_title-tipo" class="titulocampo">
							<label class="form-label">Tipo</label>
						</td>
						<td id="td_control-tipo" align="left" class="controlcampo">
							<input id="form-tipo" name="form-tipo" type="checkbox" >
							<span id="spanstrMensajetipo" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_10">
						<td id="td_title-estado" class="titulocampo">
							<label class="form-label">Estado</label>
						</td>
						<td id="td_control-estado" align="left" class="controlcampo">
							<input id="form-estado" name="form-estado" type="checkbox" >
							<span id="spanstrMensajeestado" class="mensajeerror"></span>
						</td>
					</tr>
				</table> <!-- tblElementosusuario -->

				<!-- SECCION/OCULTOS -->
				<table id="tblCamposOcultosusuario" class="elementos" style="display: table-row;">
					<caption class="busquedacabecera">
						<span>Campos Ocultos</span>
					</caption>
				</table> <!-- tblCamposOcultosusuario -->

			</td></tr> <!-- trusuarioElementos -->
			</table> <!-- tblusuarioElementos -->
			</form> <!-- frmMantenimientousuario -->


			

				<form id="frmAccionesMantenimientousuario" name="frmAccionesMantenimientousuario">

			<?php if(usuario_web::$STR_ES_BUSQUEDA=='false' ) {?>
			<table id="tblusuarioAcciones" class="elementos" style="text-align: center">
		<tr id="trusuarioAcciones" class="elementos" style="display:table-row">
			<td align="center">
				<a id="Acciones" ></a>

				<?php if(usuario_web::$STR_ES_RELACIONES=='false' ) {?>
				<div align="right">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
				<?php } ?>

					<!-- SECCION/BOTONES -->
					<table id="tblAccionesMantenimientousuario" class="busqueda" style="width: 50%;text-align: center">

						<?php if(usuario_web::$STR_ES_RELACIONES=='false' ) {?>
						<!--
						<caption class="busquedacabecera">
							<span>Acciones</span>
						</caption>
						-->
						<?php } ?>

						<tr id="trAccionesMantenimientousuarioBasicos">
							<td id="tdbtnNuevousuario" style="visibility:visible">
								<div id="divNuevousuario" style="display:table-row">
									<input type="button" id="btnNuevousuario" name="btnNuevousuario" value="NUEVO" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnActualizarusuario" style="visibility:visible">
								<div id="divActualizarusuario" style="display:table-row">
									<input type="button" id="btnActualizarusuario" name="btnActualizarusuario" title="ACTUALIZAR Usuario ACTUAL" value="Actualizar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnEliminarusuario" style="visibility:visible">
								<div id="divEliminarusuario" style="display:table-row">
									<input type="button" id="btnEliminarusuario" name="btnEliminarusuario" title="ELIMINAR Usuario ACTUAL" value="Eliminar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnImprimirusuario" style="visibility:visible">
								<input type="button" id="btnImprimirusuario" name="btnImprimirusuario" title="IMPRIMIR PAGINA Usuario ACTUAL" value="Imp. Datos" class="btn btn-primary"/>
							</td>
							<td id="tdbtnCancelarusuario" style="visibility:visible">
								<input type="button" id="btnCancelarusuario" name="btnCancelarusuario" title="CANCELAR Usuario ACTUAL" value="Cancelar" class="btn btn-primary"/>
							</td>
						</tr>
						<tr id="trAccionesMantenimientousuarioGuardar" style="display:none">
							<td id="tdbtnGuardarCambiosusuario" colspan="4" align="center" style="visibility:visible">
								<div id="divGuardarCambiosusuario" style="display:table-row">
									<input type="button" id="btnGuardarCambiosFormulariousuario" name="btnGuardarCambiosFormulariousuario" title="GUARDAR" value="GUADAR CAMBIOS" class="btn btn-primary"/>
								</div>
							</td>
						</tr>
					</table> <!-- tblAccionesMantenimientousuario -->
			</td>
		</tr> <!-- trusuarioAcciones -->
		<?php if(usuario_web::$STR_ES_RELACIONADO=='false' ) {?>
		<tr id="trusuarioParametrosAcciones" class="impresion"  style="display:table-row">
			<td align="center">
				<!-- SECCION/POST -->
				<table id="tblusuarioParametrosAcciones" style="text-align: center;border: 0px solid black;padding: 0px; border-spacing: 0px">
					<caption class="busquedacabecera" style="padding: 0px;caption-side: top;">
						<span>Acciones Extra/Post</span>
					</caption>
					<tr id="trusuarioFilaParametrosAcciones">
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
				</table> <!-- tblusuarioParametrosAcciones -->
			</td>
		</tr> <!-- trusuarioParametrosAcciones -->
		<?php }?>
		<tr id="trusuarioMensajes" class="mensajes">
			<td align="center">
				<a id="Mensajes"></a>
			</td>
		</tr> <!-- trusuarioMensajes -->
			</table> <!-- tblusuarioAcciones -->
			<?php } ?>
			</form> <!-- frmMantenimientousuario -->
			</div> <!-- divMantenimientousuarioAjaxWebPart -->
		</td>
	</tr> <!-- trusuarioElementosFormulario/super -->
		<?php if(usuario_web::$STR_ES_RELACIONADO=='false' ) {?>

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
			
				import {usuario_webcontrol,usuario_webcontrol1} from './webroot/js/JavaScript/contabilidad/seguridad/usuario/js/webcontrol/usuario_form_webcontrol.js?random=1';
				
				usuario_webcontrol1.setusuario_constante(window.usuario_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(usuario_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

