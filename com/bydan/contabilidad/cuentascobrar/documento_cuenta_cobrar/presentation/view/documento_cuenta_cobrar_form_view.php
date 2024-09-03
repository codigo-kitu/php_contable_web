<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\cuentascobrar\documento_cuenta_cobrar\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Documentos Cuentas por Cobrar Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/cuentascobrar/documento_cuenta_cobrar/util/documento_cuenta_cobrar_carga.php');
	use com\bydan\contabilidad\cuentascobrar\documento_cuenta_cobrar\util\documento_cuenta_cobrar_carga;
	
	//include_once('com/bydan/contabilidad/cuentascobrar/documento_cuenta_cobrar/presentation/view/documento_cuenta_cobrar_web.php');
	//use com\bydan\contabilidad\cuentascobrar\documento_cuenta_cobrar\presentation\view\documento_cuenta_cobrar_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	documento_cuenta_cobrar_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	documento_cuenta_cobrar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$documento_cuenta_cobrar_web1= new documento_cuenta_cobrar_web();	
	$documento_cuenta_cobrar_web1->cargarDatosGenerales();
	
	//$moduloActual=$documento_cuenta_cobrar_web1->moduloActual;
	//$usuarioActual=$documento_cuenta_cobrar_web1->usuarioActual;
	//$sessionBase=$documento_cuenta_cobrar_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$documento_cuenta_cobrar_web1->parametroGeneralUsuarioActual;
	
	
		
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
		
		
			<script type="module" src="webroot/js/JavaScript/contabilidad/cuentascobrar/documento_cuenta_cobrar/js/util/documento_cuenta_cobrar_form_funcion.js?random=1"></script>
						
		
		
		<?php 
			
		
			documento_cuenta_cobrar_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					documento_cuenta_cobrar_web::$GET_POST=$_GET;
				} else {
					documento_cuenta_cobrar_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			documento_cuenta_cobrar_web::$STR_NOMBRE_PAGINA = 'documento_cuenta_cobrar_form_view.php';
			documento_cuenta_cobrar_web::$BIT_ES_PAGINA_PRINCIPAL = 'false';
			documento_cuenta_cobrar_web::$BIT_ES_PAGINA_FORM = 'true';
				
			documento_cuenta_cobrar_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {documento_cuenta_cobrar_constante,documento_cuenta_cobrar_constante1} from './webroot/js/JavaScript/contabilidad/cuentascobrar/documento_cuenta_cobrar/js/util/documento_cuenta_cobrar_constante.js?random=1';
			import {documento_cuenta_cobrar_funcion,documento_cuenta_cobrar_funcion1} from './webroot/js/JavaScript/contabilidad/cuentascobrar/documento_cuenta_cobrar/js/util/documento_cuenta_cobrar_funcion.js?random=1';
			
			let documento_cuenta_cobrar_constante2 = new documento_cuenta_cobrar_constante();
			
			documento_cuenta_cobrar_constante2.STR_NOMBRE_PAGINA="<?php echo(documento_cuenta_cobrar_web::$STR_NOMBRE_PAGINA); ?>";
			documento_cuenta_cobrar_constante2.STR_TYPE_ON_LOADdocumento_cuenta_cobrar="<?php echo(documento_cuenta_cobrar_web::$STR_TYPE_ONLOAD); ?>";
			documento_cuenta_cobrar_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(documento_cuenta_cobrar_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			documento_cuenta_cobrar_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(documento_cuenta_cobrar_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			documento_cuenta_cobrar_constante2.STR_ACTION="<?php echo(documento_cuenta_cobrar_web::$STR_ACTION); ?>";
			documento_cuenta_cobrar_constante2.STR_ES_POPUP="<?php echo(documento_cuenta_cobrar_web::$STR_ES_POPUP); ?>";
			documento_cuenta_cobrar_constante2.STR_ES_BUSQUEDA="<?php echo(documento_cuenta_cobrar_web::$STR_ES_BUSQUEDA); ?>";
			documento_cuenta_cobrar_constante2.STR_FUNCION_JS="<?php echo(documento_cuenta_cobrar_web::$STR_FUNCION_JS); ?>";
			documento_cuenta_cobrar_constante2.BIG_ID_ACTUAL="<?php echo(documento_cuenta_cobrar_web::$BIG_ID_ACTUAL); ?>";
			documento_cuenta_cobrar_constante2.BIG_ID_OPCION="<?php echo(documento_cuenta_cobrar_web::$BIG_ID_OPCION); ?>";
			documento_cuenta_cobrar_constante2.STR_OBJETO_JS="<?php echo(documento_cuenta_cobrar_web::$STR_OBJETO_JS); ?>";
			documento_cuenta_cobrar_constante2.STR_ES_RELACIONES="<?php echo(documento_cuenta_cobrar_web::$STR_ES_RELACIONES); ?>";
			documento_cuenta_cobrar_constante2.STR_ES_RELACIONADO="<?php echo(documento_cuenta_cobrar_web::$STR_ES_RELACIONADO); ?>";
			documento_cuenta_cobrar_constante2.STR_ES_SUB_PAGINA="<?php echo(documento_cuenta_cobrar_web::$STR_ES_SUB_PAGINA); ?>";
			documento_cuenta_cobrar_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(documento_cuenta_cobrar_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			documento_cuenta_cobrar_constante2.BIT_ES_PAGINA_FORM=<?php echo(documento_cuenta_cobrar_web::$BIT_ES_PAGINA_FORM); ?>;
			documento_cuenta_cobrar_constante2.STR_SUFIJO="<?php echo(documento_cuenta_cobrar_web::$STR_SUF); ?>";//documento_cuenta_cobrar
			documento_cuenta_cobrar_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(documento_cuenta_cobrar_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//documento_cuenta_cobrar
			
			documento_cuenta_cobrar_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(documento_cuenta_cobrar_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			documento_cuenta_cobrar_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($documento_cuenta_cobrar_web1->moduloActual->getnombre()); ?>";
			documento_cuenta_cobrar_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(documento_cuenta_cobrar_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			documento_cuenta_cobrar_constante2.BIT_ES_LOAD_NORMAL=true;
			/*documento_cuenta_cobrar_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			documento_cuenta_cobrar_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.documento_cuenta_cobrar_constante2 = documento_cuenta_cobrar_constante2;
			
		</script>
		
		<?php if(documento_cuenta_cobrar_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.documento_cuenta_cobrar_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.documento_cuenta_cobrar_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="documento_cuenta_cobrarActual" ></a>
	
	<div id="divResumendocumento_cuenta_cobrarActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(documento_cuenta_cobrar_web::$STR_ES_RELACIONADO=='false') {?>
		
		<div id="header" >
		
			<div id="banner">
				<span id="spanTituloBanner" class="titulobanner"></span>
			</div> <!-- banner -->
					
			<div id="subheader" class="links">  
			
						
			</div> <!-- sub-header -->
			
			
		</div> <!-- header -->
		
		<?php } ?>
		
		<div id="main">
		

			<?php if(documento_cuenta_cobrar_web::$STR_ES_RELACIONADO=='false') {?>
			
			
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(documento_cuenta_cobrar_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(documento_cuenta_cobrar_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divdocumento_cuenta_cobrarPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tbldocumento_cuenta_cobrarPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmdocumento_cuenta_cobrarAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btndocumento_cuenta_cobrarAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="documento_cuenta_cobrar_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btndocumento_cuenta_cobrarAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmdocumento_cuenta_cobrarAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tbldocumento_cuenta_cobrarPopupAjaxWebPart -->
		</div> <!-- divdocumento_cuenta_cobrarPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->		
		
		
		
			
<tr id="trdocumento_cuenta_cobrarElementosFormulario">
	<td>
		<div id="divMantenimientodocumento_cuenta_cobrarAjaxWebPart" title="DOCUMENTOS CUENTAS POR COBRAR" style="height: 90%;width: 90%;position: relative;top: 30px;left: 30px;">
			<form id="frmMantenimientodocumento_cuenta_cobrar" name="frmMantenimientodocumento_cuenta_cobrar">

			</br>

			<?php if(documento_cuenta_cobrar_web::$STR_ES_RELACIONES=='false' ) {?>
			</br>
			<?php } ?>

			<!-- SECCION/TOOLBAR -->
			<table id="tbldocumento_cuenta_cobrarToolBarFormularioExterior" style="width: 65%">
				<tr style="display:table-row">
					<td align="center">

						<table id="tbldocumento_cuenta_cobrarToolBarFormulario" style="text-align: center"  style="display:table-row">
							<tr>
								<td id="tddocumento_cuenta_cobrarActualizarToolBar" style="visibility:visible">
									<img id="imgActualizarToolBardocumento_cuenta_cobrar" name="imgActualizarToolBardocumento_cuenta_cobrar" title="ACTUALIZAR Documentos Cuentas por Cobrar ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/actualizar.gif" width="25" height="25"/>
								</td>
								<td id="tddocumento_cuenta_cobrarEliminarToolBar" style="visibility:visible">
									<img id="imgEliminarToolBardocumento_cuenta_cobrar" name="imgEliminarToolBardocumento_cuenta_cobrar" title="ELIMINAR Documentos Cuentas por Cobrar ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/eliminar.gif" width="25" height="25"/>
								</td>
								<td id="tddocumento_cuenta_cobrarCancelarToolBar" style="visibility:visible">
									<img id="imgCancelarToolBardocumento_cuenta_cobrar" name="imgCancelarToolBardocumento_cuenta_cobrar" title="CANCELAR Documentos Cuentas por Cobrar ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/cancelar.gif" width="25" height="25"/>
								</td>
								<td id="tddocumento_cuenta_cobrarRelacionesToolBar" style="display:table-row">
									<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/xexpand.png" width="25" height="25" onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('tblCamposOcultosdocumento_cuenta_cobrar',this,'../')"/>
								</td>
							</tr>
						</table> <!-- tbldocumento_cuenta_cobrarToolBarFormulario -->

					</td>
				</tr>
			</table> <!-- tbldocumento_cuenta_cobrarToolBarFormularioExterior -->

			<table id="tbldocumento_cuenta_cobrarElementos">
			<tr id="trdocumento_cuenta_cobrarElementos" class="elementos" style="display:table-row">
			<td align="center">

			<a id="Campos"></a>

				<?php if(documento_cuenta_cobrar_web::$STR_ES_RELACIONES=='false' ) {?>
				<div id="divFlechaArribaElementos" align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
					<span></span>
				</div>
				<?php } ?>

				<!-- SECCION/FORMULARIO -->
				<table id="tblElementosdocumento_cuenta_cobrar" class="elementos" style="width: 400px; padding: 0px; border-spacing: 0px; border-collapse: collapse; text-align: left;">
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
					
						<td id="td_title-numero" class="titulocampo">
							<label class="form-label">Numero.(*)</label>
						</td>
						<td id="td_control-numero" align="left" class="controlcampo">
							<textarea id="form-numero" name="form-numero" class="form-control"  placeholder="Numero"  title="Numero"   style="font-size: 13px;"  rows ="3" cols= "25"></textarea>
							<span id="spanstrMensajenumero" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-id_cliente" class="titulocampo">
							<label class="form-label">Cliente.(*)</label>
						</td>
						<td id="td_control-id_cliente" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_cliente" name="form-id_cliente" title="Cliente" ></select></td>
									<td><a><img id="form-id_cliente_img" name="form-id_cliente_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_cliente_img_busqueda" name="form-id_cliente_img_busqueda" title="Buscar Cliente" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_cliente" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-tipo" class="titulocampo">
							<label class="form-label">Tipo.(*)</label>
						</td>
						<td id="td_control-tipo" align="left" class="controlcampo">
							<input id="form-tipo" name="form-tipo" type="text" class="form-control"  placeholder="Tipo"  title="Tipo"    size="2"  maxlength="2"/>
							<span id="spanstrMensajetipo" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-fecha_emision" class="titulocampo">
							<label class="form-label">Fecha Emision.(*)</label>
						</td>
						<td id="td_control-fecha_emision" align="left" class="controlcampo">
							<input id="form-fecha_emision" name="form-fecha_emision" type="text" class="form-control"  placeholder="Fecha Emision"  title="Fecha Emision"    size="10" >
							<span id="spanstrMensajefecha_emision" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_2">
						<td id="td_title-descripcion" class="titulocampo">
							<label class="form-label">Descripcion.(*)</label>
						</td>
						<td id="td_control-descripcion" align="left" class="controlcampo">
							<textarea id="form-descripcion" name="form-descripcion" class="form-control"  placeholder="Descripcion"  title="Descripcion"   style="font-size: 13px;" rows="2" cols="25" size="20" ></textarea>
							<span id="spanstrMensajedescripcion" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-monto" class="titulocampo">
							<label class="form-label">Monto.(*)</label>
						</td>
						<td id="td_control-monto" align="left" class="controlcampo">
							<input id="form-monto" name="form-monto" type="text" class="form-control"  placeholder="Monto"  title="Monto"    maxlength="18" size="12" >
							<span id="spanstrMensajemonto" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-monto_parcial" class="titulocampo">
							<label class="form-label">Monto Parcial.(*)</label>
						</td>
						<td id="td_control-monto_parcial" align="left" class="controlcampo">
							<input id="form-monto_parcial" name="form-monto_parcial" type="text" class="form-control"  placeholder="Monto Parcial"  title="Monto Parcial"    maxlength="18" size="12" >
							<span id="spanstrMensajemonto_parcial" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-moneda" class="titulocampo">
							<label class="form-label">Moneda.(*)</label>
						</td>
						<td id="td_control-moneda" align="left" class="controlcampo">
							<input id="form-moneda" name="form-moneda" type="text" class="form-control"  placeholder="Moneda"  title="Moneda"    size="1"  maxlength="1"/>
							<span id="spanstrMensajemoneda" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-fecha_vence" class="titulocampo">
							<label class="form-label">Fecha Vencimiento.(*)</label>
						</td>
						<td id="td_control-fecha_vence" align="left" class="controlcampo">
							<input id="form-fecha_vence" name="form-fecha_vence" type="text" class="form-control"  placeholder="Fecha Vencimiento"  title="Fecha Vencimiento"    size="10" >
							<span id="spanstrMensajefecha_vence" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_3">
						<td id="td_title-numero_de_pagos" class="titulocampo">
							<label class="form-label">Nro De Pagos.(*)</label>
						</td>
						<td id="td_control-numero_de_pagos" align="left" class="controlcampo">
							<input id="form-numero_de_pagos" name="form-numero_de_pagos" type="text" class="form-control"  placeholder="Nro De Pagos"  title="Nro De Pagos"    maxlength="10" size="10" >
							<span id="spanstrMensajenumero_de_pagos" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-balance" class="titulocampo">
							<label class="form-label">Balance.(*)</label>
						</td>
						<td id="td_control-balance" align="left" class="controlcampo">
							<input id="form-balance" name="form-balance" type="text" class="form-control"  placeholder="Balance"  title="Balance"    maxlength="18" size="12" >
							<span id="spanstrMensajebalance" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-numero_pagado" class="titulocampo">
							<label class="form-label">Nro Documento Pagado.(*)</label>
						</td>
						<td id="td_control-numero_pagado" align="left" class="controlcampo">
							<input id="form-numero_pagado" name="form-numero_pagado" type="text" class="form-control"  placeholder="Nro Documento Pagado"  title="Nro Documento Pagado"    size="10"  maxlength="10"/>
							<span id="spanstrMensajenumero_pagado" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-id_pagado" class="titulocampo">
							<label class="form-label">Id Pagado.(*)</label>
						</td>
						<td id="td_control-id_pagado" align="left" class="controlcampo">
							<input id="form-id_pagado" name="form-id_pagado" type="text" class="form-control"  placeholder="Id Pagado"  title="Id Pagado"    maxlength="19" size="10" >
							<span id="spanstrMensajeid_pagado" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-modulo_origen" class="titulocampo">
							<label class="form-label">Modulo Origen.(*)</label>
						</td>
						<td id="td_control-modulo_origen" align="left" class="controlcampo">
							<input id="form-modulo_origen" name="form-modulo_origen" type="text" class="form-control"  placeholder="Modulo Origen"  title="Modulo Origen"    size="2"  maxlength="2"/>
							<span id="spanstrMensajemodulo_origen" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_4">
						<td id="td_title-id_origen" class="titulocampo">
							<label class="form-label">Id Origen.(*)</label>
						</td>
						<td id="td_control-id_origen" align="left" class="controlcampo">
							<input id="form-id_origen" name="form-id_origen" type="text" class="form-control"  placeholder="Id Origen"  title="Id Origen"    maxlength="19" size="10" >
							<span id="spanstrMensajeid_origen" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-modulo_destino" class="titulocampo">
							<label class="form-label">Modulo Destino.(*)</label>
						</td>
						<td id="td_control-modulo_destino" align="left" class="controlcampo">
							<input id="form-modulo_destino" name="form-modulo_destino" type="text" class="form-control"  placeholder="Modulo Destino"  title="Modulo Destino"    size="2"  maxlength="2"/>
							<span id="spanstrMensajemodulo_destino" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-id_destino" class="titulocampo">
							<label class="form-label">Id Destino.(*)</label>
						</td>
						<td id="td_control-id_destino" align="left" class="controlcampo">
							<input id="form-id_destino" name="form-id_destino" type="text" class="form-control"  placeholder="Id Destino"  title="Id Destino"    maxlength="19" size="10" >
							<span id="spanstrMensajeid_destino" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-nombre_pc" class="titulocampo">
							<label class="form-label">Nombre Pc.(*)</label>
						</td>
						<td id="td_control-nombre_pc" align="left" class="controlcampo">
							<textarea id="form-nombre_pc" name="form-nombre_pc" class="form-control"  placeholder="Nombre Pc"  title="Nombre Pc"   style="font-size: 13px;" rows="2" cols="25" size="20" ></textarea>
							<span id="spanstrMensajenombre_pc" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-hora" class="titulocampo">
							<label class="form-label">Hora.(*)</label>
						</td>
						<td id="td_control-hora" align="left" class="controlcampo">
							<input id="form-hora" name="form-hora" type="text" class="form-control"  placeholder="Hora"  title="Hora"    size="10" >
							<span id="spanstrMensajehora" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_5">
						<td id="td_title-monto_mora" class="titulocampo">
							<label class="form-label">Monto Mora.(*)</label>
						</td>
						<td id="td_control-monto_mora" align="left" class="controlcampo">
							<input id="form-monto_mora" name="form-monto_mora" type="text" class="form-control"  placeholder="Monto Mora"  title="Monto Mora"    maxlength="18" size="12" >
							<span id="spanstrMensajemonto_mora" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-interes_mora" class="titulocampo">
							<label class="form-label">Interes Mora.(*)</label>
						</td>
						<td id="td_control-interes_mora" align="left" class="controlcampo">
							<input id="form-interes_mora" name="form-interes_mora" type="text" class="form-control"  placeholder="Interes Mora"  title="Interes Mora"    maxlength="18" size="12" >
							<span id="spanstrMensajeinteres_mora" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-dias_gracia_mora" class="titulocampo">
							<label class="form-label">Dias Gracia Mora.(*)</label>
						</td>
						<td id="td_control-dias_gracia_mora" align="left" class="controlcampo">
							<input id="form-dias_gracia_mora" name="form-dias_gracia_mora" type="text" class="form-control"  placeholder="Dias Gracia Mora"  title="Dias Gracia Mora"    maxlength="10" size="10" >
							<span id="spanstrMensajedias_gracia_mora" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-instrumento_pago" class="titulocampo">
							<label class="form-label">Instrumento Pago.(*)</label>
						</td>
						<td id="td_control-instrumento_pago" align="left" class="controlcampo">
							<input id="form-instrumento_pago" name="form-instrumento_pago" type="text" class="form-control"  placeholder="Instrumento Pago"  title="Instrumento Pago"    size="2"  maxlength="2"/>
							<span id="spanstrMensajeinstrumento_pago" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-tipo_cambio" class="titulocampo">
							<label class="form-label">Tipo Cambio.(*)</label>
						</td>
						<td id="td_control-tipo_cambio" align="left" class="controlcampo">
							<input id="form-tipo_cambio" name="form-tipo_cambio" type="text" class="form-control"  placeholder="Tipo Cambio"  title="Tipo Cambio"    maxlength="18" size="12" >
							<span id="spanstrMensajetipo_cambio" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_6">
						<td id="td_title-numero_cliente" class="titulocampo">
							<label class="form-label">Nro Documento Cliente.(*)</label>
						</td>
						<td id="td_control-numero_cliente" align="left" class="controlcampo">
							<input id="form-numero_cliente" name="form-numero_cliente" type="text" class="form-control"  placeholder="Nro Documento Cliente"  title="Nro Documento Cliente"    size="20"  maxlength="30"/>
							<span id="spanstrMensajenumero_cliente" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-clase_registro" class="titulocampo">
							<label class="form-label">Clase Registro.(*)</label>
						</td>
						<td id="td_control-clase_registro" align="left" class="controlcampo">
							<input id="form-clase_registro" name="form-clase_registro" type="text" class="form-control"  placeholder="Clase Registro"  title="Clase Registro"    size="2"  maxlength="2"/>
							<span id="spanstrMensajeclase_registro" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-estado_registro" class="titulocampo">
							<label class="form-label">Estado Registro.(*)</label>
						</td>
						<td id="td_control-estado_registro" align="left" class="controlcampo">
							<input id="form-estado_registro" name="form-estado_registro" type="text" class="form-control"  placeholder="Estado Registro"  title="Estado Registro"    size="2"  maxlength="2"/>
							<span id="spanstrMensajeestado_registro" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-motivo_anulacion" class="titulocampo">
							<label class="form-label">Motivo Anulacion.(*)</label>
						</td>
						<td id="td_control-motivo_anulacion" align="left" class="controlcampo">
							<textarea id="form-motivo_anulacion" name="form-motivo_anulacion" class="form-control"  placeholder="Motivo Anulacion"  title="Motivo Anulacion"   style="font-size: 13px;"  rows ="3" cols= "25"></textarea>
							<span id="spanstrMensajemotivo_anulacion" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-impuesto_1" class="titulocampo">
							<label class="form-label">Impuesto 1.(*)</label>
						</td>
						<td id="td_control-impuesto_1" align="left" class="controlcampo">
							<input id="form-impuesto_1" name="form-impuesto_1" type="text" class="form-control"  placeholder="Impuesto 1"  title="Impuesto 1"    maxlength="18" size="12" >
							<span id="spanstrMensajeimpuesto_1" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_7">
						<td id="td_title-impuesto_2" class="titulocampo">
							<label class="form-label">Impuesto 2.(*)</label>
						</td>
						<td id="td_control-impuesto_2" align="left" class="controlcampo">
							<input id="form-impuesto_2" name="form-impuesto_2" type="text" class="form-control"  placeholder="Impuesto 2"  title="Impuesto 2"    maxlength="18" size="12" >
							<span id="spanstrMensajeimpuesto_2" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-impuesto_incluido" class="titulocampo">
							<label class="form-label">Impuesto Incluido.(*)</label>
						</td>
						<td id="td_control-impuesto_incluido" align="left" class="controlcampo">
							<input id="form-impuesto_incluido" name="form-impuesto_incluido" type="text" class="form-control"  placeholder="Impuesto Incluido"  title="Impuesto Incluido"    size="2"  maxlength="2"/>
							<span id="spanstrMensajeimpuesto_incluido" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-observaciones" class="titulocampo">
							<label class="form-label">Observaciones.(*)</label>
						</td>
						<td id="td_control-observaciones" align="left" class="controlcampo">
							<textarea id="form-observaciones" name="form-observaciones" class="form-control"  placeholder="Observaciones"  title="Observaciones"   style="font-size: 13px;"  rows ="0" cols= "25"></textarea>
							<span id="spanstrMensajeobservaciones" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-grupo_pago" class="titulocampo">
							<label class="form-label">Grupo Pago.(*)</label>
						</td>
						<td id="td_control-grupo_pago" align="left" class="controlcampo">
							<textarea id="form-grupo_pago" name="form-grupo_pago" class="form-control"  placeholder="Grupo Pago"  title="Grupo Pago"   style="font-size: 13px;" rows="2" cols="25" size="20" ></textarea>
							<span id="spanstrMensajegrupo_pago" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-termino_idpv" class="titulocampo">
							<label class="form-label">Termino Idpv.(*)</label>
						</td>
						<td id="td_control-termino_idpv" align="left" class="controlcampo">
							<input id="form-termino_idpv" name="form-termino_idpv" type="text" class="form-control"  placeholder="Termino Idpv"  title="Termino Idpv"    maxlength="19" size="10" >
							<span id="spanstrMensajetermino_idpv" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_8">
						<td id="td_title-id_forma_pago_cliente" class="titulocampo">
							<label class="form-label">Forma Pago Cliente.(*)</label>
						</td>
						<td id="td_control-id_forma_pago_cliente" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_forma_pago_cliente" name="form-id_forma_pago_cliente" title="Forma Pago Cliente" ></select></td>
									<td><a><img id="form-id_forma_pago_cliente_img" name="form-id_forma_pago_cliente_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_forma_pago_cliente_img_busqueda" name="form-id_forma_pago_cliente_img_busqueda" title="Buscar Forma Pago Cliente" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_forma_pago_cliente" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-nro_pago" class="titulocampo">
							<label class="form-label">Nro Pago.(*)</label>
						</td>
						<td id="td_control-nro_pago" align="left" class="controlcampo">
							<input id="form-nro_pago" name="form-nro_pago" type="text" class="form-control"  placeholder="Nro Pago"  title="Nro Pago"    size="20"  maxlength="30"/>
							<span id="spanstrMensajenro_pago" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-ref_pago" class="titulocampo">
							<label class="form-label">Referencia Pago.(*)</label>
						</td>
						<td id="td_control-ref_pago" align="left" class="controlcampo">
							<textarea id="form-ref_pago" name="form-ref_pago" class="form-control"  placeholder="Referencia Pago"  title="Referencia Pago"   style="font-size: 13px;" rows="2" cols="25" size="20" ></textarea>
							<span id="spanstrMensajeref_pago" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-fecha_hora" class="titulocampo">
							<label class="form-label">Fecha Hora.(*)</label>
						</td>
						<td id="td_control-fecha_hora" align="left" class="controlcampo">
							<input id="form-fecha_hora" name="form-fecha_hora" type="text" class="form-control"  placeholder="Fecha Hora"  title="Fecha Hora"    size="10" >
							<span id="spanstrMensajefecha_hora" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-id_base" class="titulocampo">
							<label class="form-label">Id Base.(*)</label>
						</td>
						<td id="td_control-id_base" align="left" class="controlcampo">
							<input id="form-id_base" name="form-id_base" type="text" class="form-control"  placeholder="Id Base"  title="Id Base"    maxlength="19" size="10" >
							<span id="spanstrMensajeid_base" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_9">
						<td id="td_title-id_cuenta_corriente" class="titulocampo">
							<label class="form-label">Cuenta Cliente.(*)</label>
						</td>
						<td id="td_control-id_cuenta_corriente" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_cuenta_corriente" name="form-id_cuenta_corriente" title="Cuenta Cliente" ></select></td>
									<td><a><img id="form-id_cuenta_corriente_img" name="form-id_cuenta_corriente_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_cuenta_corriente_img_busqueda" name="form-id_cuenta_corriente_img_busqueda" title="Buscar Cuenta Corriente" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_cuenta_corriente" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-ncf" class="titulocampo">
							<label class="form-label">Ncf.(*)</label>
						</td>
						<td id="td_control-ncf" align="left" class="controlcampo">
							<input id="form-ncf" name="form-ncf" type="text" class="form-control"  placeholder="Ncf"  title="Ncf"    size="20"  maxlength="50"/>
							<span id="spanstrMensajencf" class="mensajeerror"></span>
						</td>
					<td></td><td></td><td></td><td></td><td></td><td></td></tr>
				</table> <!-- tblElementosdocumento_cuenta_cobrar -->

				<!-- SECCION/OCULTOS -->
				<table id="tblCamposOcultosdocumento_cuenta_cobrar" class="elementos" style="display: table-row;">
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
						<td id="td_title-id_sucursal" class="titulocampo">
							<label class="form-label">Sucursal.(*)</label>
						</td>
						<td id="td_control-id_sucursal" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_sucursal" name="form-id_sucursal" title="Sucursal" ></select></td>
									<td><a><img id="form-id_sucursal_img" name="form-id_sucursal_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_sucursal_img_busqueda" name="form-id_sucursal_img_busqueda" title="Buscar Sucursal" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_sucursal" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-id_ejercicio" class="titulocampo">
							<label class="form-label">Ejercicio.(*)</label>
						</td>
						<td id="td_control-id_ejercicio" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_ejercicio" name="form-id_ejercicio" title="Ejercicio" ></select></td>
									<td><a><img id="form-id_ejercicio_img" name="form-id_ejercicio_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_ejercicio_img_busqueda" name="form-id_ejercicio_img_busqueda" title="Buscar ejercicio" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_ejercicio" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-id_periodo" class="titulocampo">
							<label class="form-label">Periodo.(*)</label>
						</td>
						<td id="td_control-id_periodo" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_periodo" name="form-id_periodo" title="Periodo" ></select></td>
									<td><a><img id="form-id_periodo_img" name="form-id_periodo_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_periodo_img_busqueda" name="form-id_periodo_img_busqueda" title="Buscar periodo" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_periodo" class="mensajeerror"></span>
						</td>
					
					
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
					
				</table> <!-- tblCamposOcultosdocumento_cuenta_cobrar -->

			</td></tr> <!-- trdocumento_cuenta_cobrarElementos -->
			</table> <!-- tbldocumento_cuenta_cobrarElementos -->
			</form> <!-- frmMantenimientodocumento_cuenta_cobrar -->


			

				<form id="frmAccionesMantenimientodocumento_cuenta_cobrar" name="frmAccionesMantenimientodocumento_cuenta_cobrar">

			<?php if(documento_cuenta_cobrar_web::$STR_ES_BUSQUEDA=='false' ) {?>
			<table id="tbldocumento_cuenta_cobrarAcciones" class="elementos" style="text-align: center">
		<tr id="trdocumento_cuenta_cobrarAcciones" class="elementos" style="display:table-row">
			<td align="center">
				<a id="Acciones" ></a>

				<?php if(documento_cuenta_cobrar_web::$STR_ES_RELACIONES=='false' ) {?>
				<div align="right">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
				<?php } ?>

					<!-- SECCION/BOTONES -->
					<table id="tblAccionesMantenimientodocumento_cuenta_cobrar" class="busqueda" style="width: 50%;text-align: left">

						<?php if(documento_cuenta_cobrar_web::$STR_ES_RELACIONES=='false' ) {?>
						<!--
						<caption class="busquedacabecera">
							<span>Acciones</span>
						</caption>
						-->
						<?php } ?>

						<tr id="trAccionesMantenimientodocumento_cuenta_cobrarBasicos">
							<td id="tdbtnNuevodocumento_cuenta_cobrar" style="visibility:visible">
								<div id="divNuevodocumento_cuenta_cobrar" style="display:table-row">
									<input type="button" id="btnNuevodocumento_cuenta_cobrar" name="btnNuevodocumento_cuenta_cobrar" value="NUEVO" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnActualizardocumento_cuenta_cobrar" style="visibility:visible">
								<div id="divActualizardocumento_cuenta_cobrar" style="display:table-row">
									<input type="button" id="btnActualizardocumento_cuenta_cobrar" name="btnActualizardocumento_cuenta_cobrar" title="ACTUALIZAR Documentos Cuentas por Cobrar ACTUAL" value="Actualizar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnEliminardocumento_cuenta_cobrar" style="visibility:visible">
								<div id="divEliminardocumento_cuenta_cobrar" style="display:table-row">
									<input type="button" id="btnEliminardocumento_cuenta_cobrar" name="btnEliminardocumento_cuenta_cobrar" title="ELIMINAR Documentos Cuentas por Cobrar ACTUAL" value="Eliminar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnImprimirdocumento_cuenta_cobrar" style="visibility:visible">
								<input type="button" id="btnImprimirdocumento_cuenta_cobrar" name="btnImprimirdocumento_cuenta_cobrar" title="IMPRIMIR PAGINA Documentos Cuentas por Cobrar ACTUAL" value="Imp. Datos" class="btn btn-primary"/>
							</td>
							<td id="tdbtnCancelardocumento_cuenta_cobrar" style="visibility:visible">
								<input type="button" id="btnCancelardocumento_cuenta_cobrar" name="btnCancelardocumento_cuenta_cobrar" title="CANCELAR Documentos Cuentas por Cobrar ACTUAL" value="Cancelar" class="btn btn-primary"/>
							</td>
						</tr>
						<tr id="trAccionesMantenimientodocumento_cuenta_cobrarGuardar" style="display:none">
							<td id="tdbtnGuardarCambiosdocumento_cuenta_cobrar" colspan="4" align="center" style="visibility:visible">
								<div id="divGuardarCambiosdocumento_cuenta_cobrar" style="display:table-row">
									<input type="button" id="btnGuardarCambiosFormulariodocumento_cuenta_cobrar" name="btnGuardarCambiosFormulariodocumento_cuenta_cobrar" title="GUARDAR" value="GUADAR CAMBIOS" class="btn btn-primary"/>
								</div>
							</td>
						</tr>
					</table> <!-- tblAccionesMantenimientodocumento_cuenta_cobrar -->
			</td>
		</tr> <!-- trdocumento_cuenta_cobrarAcciones -->
		<?php if(documento_cuenta_cobrar_web::$STR_ES_RELACIONADO=='false' ) {?>
		<tr id="trdocumento_cuenta_cobrarParametrosAcciones" class="impresion"  style="display:table-row">
			<td align="center">
				<!-- SECCION/POST -->
				<table id="tbldocumento_cuenta_cobrarParametrosAcciones" style="text-align: center;border: 0px solid black;padding: 0px; border-spacing: 0px">
					<caption class="busquedacabecera" style="padding: 0px;caption-side: top;">
						<span>Acciones Extra/Post</span>
					</caption>
					<tr id="trdocumento_cuenta_cobrarFilaParametrosAcciones">
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
				</table> <!-- tbldocumento_cuenta_cobrarParametrosAcciones -->
			</td>
		</tr> <!-- trdocumento_cuenta_cobrarParametrosAcciones -->
		<?php }?>
		<tr id="trdocumento_cuenta_cobrarMensajes" class="mensajes">
			<td align="center">
				<a id="Mensajes"></a>
			</td>
		</tr> <!-- trdocumento_cuenta_cobrarMensajes -->
			</table> <!-- tbldocumento_cuenta_cobrarAcciones -->
			<?php } ?>
			</form> <!-- frmMantenimientodocumento_cuenta_cobrar -->
			</div> <!-- divMantenimientodocumento_cuenta_cobrarAjaxWebPart -->
		</td>
	</tr> <!-- trdocumento_cuenta_cobrarElementosFormulario/super -->
		<?php if(documento_cuenta_cobrar_web::$STR_ES_RELACIONADO=='false' ) {?>

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
			
				import {documento_cuenta_cobrar_webcontrol,documento_cuenta_cobrar_webcontrol1} from './webroot/js/JavaScript/contabilidad/cuentascobrar/documento_cuenta_cobrar/js/webcontrol/documento_cuenta_cobrar_form_webcontrol.js?random=1';
				
				documento_cuenta_cobrar_webcontrol1.setdocumento_cuenta_cobrar_constante(window.documento_cuenta_cobrar_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(documento_cuenta_cobrar_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

