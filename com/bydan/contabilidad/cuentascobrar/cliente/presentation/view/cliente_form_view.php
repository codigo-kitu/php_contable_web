<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\cuentascobrar\cliente\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Cliente Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/cuentascobrar/cliente/util/cliente_carga.php');
	use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_carga;
	
	//include_once('com/bydan/contabilidad/cuentascobrar/cliente/presentation/view/cliente_web.php');
	//use com\bydan\contabilidad\cuentascobrar\cliente\presentation\view\cliente_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	cliente_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	cliente_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$cliente_web1= new cliente_web();	
	$cliente_web1->cargarDatosGenerales();
	
	//$moduloActual=$cliente_web1->moduloActual;
	//$usuarioActual=$cliente_web1->usuarioActual;
	//$sessionBase=$cliente_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$cliente_web1->parametroGeneralUsuarioActual;
	
	
		
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
		
		
			<script type="module" src="webroot/js/JavaScript/contabilidad/cuentascobrar/cliente/js/util/cliente_form_funcion.js?random=1"></script>
						
		
		
		<?php 
			
		
			cliente_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					cliente_web::$GET_POST=$_GET;
				} else {
					cliente_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			cliente_web::$STR_NOMBRE_PAGINA = 'cliente_form_view.php';
			cliente_web::$BIT_ES_PAGINA_PRINCIPAL = 'false';
			cliente_web::$BIT_ES_PAGINA_FORM = 'true';
				
			cliente_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {cliente_constante,cliente_constante1} from './webroot/js/JavaScript/contabilidad/cuentascobrar/cliente/js/util/cliente_constante.js?random=1';
			import {cliente_funcion,cliente_funcion1} from './webroot/js/JavaScript/contabilidad/cuentascobrar/cliente/js/util/cliente_funcion.js?random=1';
			
			let cliente_constante2 = new cliente_constante();
			
			cliente_constante2.STR_NOMBRE_PAGINA="<?php echo(cliente_web::$STR_NOMBRE_PAGINA); ?>";
			cliente_constante2.STR_TYPE_ON_LOADcliente="<?php echo(cliente_web::$STR_TYPE_ONLOAD); ?>";
			cliente_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(cliente_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			cliente_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(cliente_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			cliente_constante2.STR_ACTION="<?php echo(cliente_web::$STR_ACTION); ?>";
			cliente_constante2.STR_ES_POPUP="<?php echo(cliente_web::$STR_ES_POPUP); ?>";
			cliente_constante2.STR_ES_BUSQUEDA="<?php echo(cliente_web::$STR_ES_BUSQUEDA); ?>";
			cliente_constante2.STR_FUNCION_JS="<?php echo(cliente_web::$STR_FUNCION_JS); ?>";
			cliente_constante2.BIG_ID_ACTUAL="<?php echo(cliente_web::$BIG_ID_ACTUAL); ?>";
			cliente_constante2.BIG_ID_OPCION="<?php echo(cliente_web::$BIG_ID_OPCION); ?>";
			cliente_constante2.STR_OBJETO_JS="<?php echo(cliente_web::$STR_OBJETO_JS); ?>";
			cliente_constante2.STR_ES_RELACIONES="<?php echo(cliente_web::$STR_ES_RELACIONES); ?>";
			cliente_constante2.STR_ES_RELACIONADO="<?php echo(cliente_web::$STR_ES_RELACIONADO); ?>";
			cliente_constante2.STR_ES_SUB_PAGINA="<?php echo(cliente_web::$STR_ES_SUB_PAGINA); ?>";
			cliente_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(cliente_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			cliente_constante2.BIT_ES_PAGINA_FORM=<?php echo(cliente_web::$BIT_ES_PAGINA_FORM); ?>;
			cliente_constante2.STR_SUFIJO="<?php echo(cliente_web::$STR_SUF); ?>";//cliente
			cliente_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(cliente_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//cliente
			
			cliente_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(cliente_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			cliente_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($cliente_web1->moduloActual->getnombre()); ?>";
			cliente_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(cliente_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			cliente_constante2.BIT_ES_LOAD_NORMAL=true;
			/*cliente_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			cliente_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.cliente_constante2 = cliente_constante2;
			
		</script>
		
		<?php if(cliente_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.cliente_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.cliente_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="clienteActual" ></a>
	
	<div id="divResumenclienteActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(cliente_web::$STR_ES_RELACIONADO=='false') {?>
		
		<div id="header" >
		
			<div id="banner">
				<span id="spanTituloBanner" class="titulobanner"></span>
			</div> <!-- banner -->
					
			<div id="subheader" class="links">  
			
						
			</div> <!-- sub-header -->
			
			
		</div> <!-- header -->
		
		<?php } ?>
		
		<div id="main">
		

			<?php if(cliente_web::$STR_ES_RELACIONADO=='false') {?>
			
			
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(cliente_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(cliente_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divclientePopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblclientePopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmclienteAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnclienteAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="cliente_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnclienteAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmclienteAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblclientePopupAjaxWebPart -->
		</div> <!-- divclientePopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->		
		
		
		
			
<tr id="trclienteElementosFormulario">
	<td>
		<div id="divMantenimientoclienteAjaxWebPart" title="CLIENTE" style="height: 90%;width: 90%;position: relative;top: 30px;left: 30px;">
			<form id="frmMantenimientocliente" name="frmMantenimientocliente">

			</br>

			<?php if(cliente_web::$STR_ES_RELACIONES=='false' ) {?>
			</br>
			<?php } ?>

			<!-- SECCION/TOOLBAR -->
			<table id="tblclienteToolBarFormularioExterior" style="width: 65%">
				<tr style="display:table-row">
					<td align="center">

						<table id="tblclienteToolBarFormulario" style="text-align: center"  style="display:table-row">
							<tr>
								<td id="tdclienteActualizarToolBar" style="visibility:visible">
									<img id="imgActualizarToolBarcliente" name="imgActualizarToolBarcliente" title="ACTUALIZAR Cliente ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/actualizar.gif" width="25" height="25"/>
								</td>
								<td id="tdclienteEliminarToolBar" style="visibility:visible">
									<img id="imgEliminarToolBarcliente" name="imgEliminarToolBarcliente" title="ELIMINAR Cliente ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/eliminar.gif" width="25" height="25"/>
								</td>
								<td id="tdclienteCancelarToolBar" style="visibility:visible">
									<img id="imgCancelarToolBarcliente" name="imgCancelarToolBarcliente" title="CANCELAR Cliente ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/cancelar.gif" width="25" height="25"/>
								</td>
								<td id="tdclienteRelacionesToolBar" style="display:table-row">
									<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/xexpand.png" width="25" height="25" onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('tblCamposOcultoscliente',this,'../')"/>
								</td>
							</tr>
						</table> <!-- tblclienteToolBarFormulario -->

					</td>
				</tr>
			</table> <!-- tblclienteToolBarFormularioExterior -->

			<table id="tblclienteElementos">
			<tr id="trclienteElementos" class="elementos" style="display:table-row">
			<td align="center">

			<a id="Campos"></a>

				<?php if(cliente_web::$STR_ES_RELACIONES=='false' ) {?>
				<div id="divFlechaArribaElementos" align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
					<span></span>
				</div>
				<?php } ?>


				<div id="tabs_elementos" class="tabs" style="width: 100%">
					<ul>
						<li class="titulotab"><a href="#principal">PRINCIPAL</a></li>
						<li class="titulotab"><a href="#general">GENERAL</a></li>
						<li class="titulotab"><a href="#contable">CONTABLE</a></li>
					</ul>


				<!-- SECCION/FORMULARIO -->
				<table id="tblElementoscliente" class="elementos" style="width: 666px; padding: 0px; border-spacing: 0px; border-collapse: collapse; text-align: left;">
					
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
					<tr id="trclienteprincipalElementos">
						<td id="tdclienteprincipalElementos"  colspan="4">
			<div id="principal">
				<table class="elementos" style="width:666px;text-align:left; padding: 0px; border-spacing: 0px; border-collapse: collapse;">
					<caption class="busquedacabecera"><span>PRINCIPAL</span></caption>
					<tr id="tr_fila_1">
						<td id="td_title-id" class="titulocampo">
							<label class="form-label">Cod. Único</label>
						</td>
						<td id="td_control-id" align="left">
							<input id="form-id" name="form-id" type="text" class="form-control" readonly size="10">
						</td>
					
					
						<td id="td_title-id_tipo_persona" class="titulocampo">
							<label class="form-label"> Tipo Persona.(*)</label>
						</td>
						<td id="td_control-id_tipo_persona" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_tipo_persona" name="form-id_tipo_persona" title=" Tipo Persona" ></select></td>
									<td><img id="form-id_tipo_persona_img_busqueda" name="form-id_tipo_persona_img_busqueda" title="Buscar Tipo Persona" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_tipo_persona" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_2">
						<td id="td_title-id_categoria_cliente" class="titulocampo">
							<label class="form-label">Categorias Cliente.(*)</label>
						</td>
						<td id="td_control-id_categoria_cliente" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_categoria_cliente" name="form-id_categoria_cliente" title="Categorias Cliente" ></select></td>
									<td><a><img id="form-id_categoria_cliente_img" name="form-id_categoria_cliente_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_categoria_cliente_img_busqueda" name="form-id_categoria_cliente_img_busqueda" title="Buscar Categorias Cliente" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_categoria_cliente" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-id_tipo_precio" class="titulocampo">
							<label class="form-label"> Tipo Precio.(*)</label>
						</td>
						<td id="td_control-id_tipo_precio" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_tipo_precio" name="form-id_tipo_precio" title=" Tipo Precio" ></select></td>
									<td><a><img id="form-id_tipo_precio_img" name="form-id_tipo_precio_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_tipo_precio_img_busqueda" name="form-id_tipo_precio_img_busqueda" title="Buscar Tipo Precio" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_tipo_precio" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_3">
						<td id="td_title-id_giro_negocio_cliente" class="titulocampo">
							<label class="form-label">Giro Negocio.(*)</label>
						</td>
						<td id="td_control-id_giro_negocio_cliente" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_giro_negocio_cliente" name="form-id_giro_negocio_cliente" title="Giro Negocio" ></select></td>
									<td><a><img id="form-id_giro_negocio_cliente_img" name="form-id_giro_negocio_cliente_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_giro_negocio_cliente_img_busqueda" name="form-id_giro_negocio_cliente_img_busqueda" title="Buscar Giro Negocio" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_giro_negocio_cliente" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-codigo" class="titulocampo">
							<label class="form-label">Codigo.(*)</label>
						</td>
						<td id="td_control-codigo" align="left" class="controlcampo">
							<input id="form-codigo" name="form-codigo" type="text" class="form-control"  placeholder="Codigo"  title="Codigo"    size="20"  maxlength="20"/>
							<span id="spanstrMensajecodigo" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_4">
						<td id="td_title-ruc" class="titulocampo">
							<label class="form-label">Ruc.(*)</label>
						</td>
						<td id="td_control-ruc" align="left" class="controlcampo">
							<input id="form-ruc" name="form-ruc" type="text" class="form-control"  placeholder="Ruc"  title="Ruc"    size="20"  maxlength="30"/>
							<span id="spanstrMensajeruc" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-primer_apellido" class="titulocampo">
							<label class="form-label">Primer Apellido.(*)</label>
						</td>
						<td id="td_control-primer_apellido" align="left" class="controlcampo">
							<textarea id="form-primer_apellido" name="form-primer_apellido" class="form-control"  placeholder="Primer Apellido"  title="Primer Apellido"   style="font-size: 13px;" rows="2" cols="25" size="20" ></textarea>
							<span id="spanstrMensajeprimer_apellido" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_5">
						<td id="td_title-segundo_apellido" class="titulocampo">
							<label class="form-label">Segundo Apellido</label>
						</td>
						<td id="td_control-segundo_apellido" align="left" class="controlcampo">
							<textarea id="form-segundo_apellido" name="form-segundo_apellido" class="form-control"  placeholder="Segundo Apellido"  title="Segundo Apellido"   style="font-size: 13px;" rows="2" cols="25" size="20" ></textarea>
							<span id="spanstrMensajesegundo_apellido" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-primer_nombre" class="titulocampo">
							<label class="form-label">Primer Nombre.(*)</label>
						</td>
						<td id="td_control-primer_nombre" align="left" class="controlcampo">
							<textarea id="form-primer_nombre" name="form-primer_nombre" class="form-control"  placeholder="Primer Nombre"  title="Primer Nombre"   style="font-size: 13px;" rows="2" cols="25" size="20" ></textarea>
							<span id="spanstrMensajeprimer_nombre" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_6">
						<td id="td_title-segundo_nombre" class="titulocampo">
							<label class="form-label">Segundo Nombre</label>
						</td>
						<td id="td_control-segundo_nombre" align="left" class="controlcampo">
							<textarea id="form-segundo_nombre" name="form-segundo_nombre" class="form-control"  placeholder="Segundo Nombre"  title="Segundo Nombre"   style="font-size: 13px;" rows="2" cols="25" size="20" ></textarea>
							<span id="spanstrMensajesegundo_nombre" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-nombre_completo" class="titulocampo">
							<label class="form-label">Nombre Completo</label>
						</td>
						<td id="td_control-nombre_completo" align="left" class="controlcampo">
							<textarea id="form-nombre_completo" name="form-nombre_completo" class="form-control"  placeholder="Nombre Completo"  title="Nombre Completo"   style="font-size: 13px;" rows="2" cols="25" size="20" ></textarea>
							<span id="spanstrMensajenombre_completo" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_7">
						<td id="td_title-direccion" class="titulocampo">
							<label class="form-label">Direccion.(*)</label>
						</td>
						<td id="td_control-direccion" align="left" class="controlcampo">
							<textarea id="form-direccion" name="form-direccion" class="form-control"  placeholder="Direccion"  title="Direccion"   style="font-size: 13px;" rows="3" cols="25" size="20" ></textarea>
							<span id="spanstrMensajedireccion" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-telefono" class="titulocampo">
							<label class="form-label">Telefono.(*)</label>
						</td>
						<td id="td_control-telefono" align="left" class="controlcampo">
							<input id="form-telefono" name="form-telefono" type="text" class="form-control"  placeholder="Telefono"  title="Telefono"    size="20"  maxlength="20"/>
							<span id="spanstrMensajetelefono" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_8">
						<td id="td_title-telefono_movil" class="titulocampo">
							<label class="form-label">Telefono Movil</label>
						</td>
						<td id="td_control-telefono_movil" align="left" class="controlcampo">
							<input id="form-telefono_movil" name="form-telefono_movil" type="text" class="form-control"  placeholder="Telefono Movil"  title="Telefono Movil"    size="20"  maxlength="20"/>
							<span id="spanstrMensajetelefono_movil" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-e_mail" class="titulocampo">
							<label class="form-label">E Mail.(*)</label>
						</td>
						<td id="td_control-e_mail" align="left" class="controlcampo">
							<textarea id="form-e_mail" name="form-e_mail" class="form-control"  placeholder="E Mail"  title="E Mail"   style="font-size: 13px;" rows="2" cols="25" size="20" ></textarea>
							<span id="spanstrMensajee_mail" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_9">
						<td id="td_title-e_mail2" class="titulocampo">
							<label class="form-label">E Mail2</label>
						</td>
						<td id="td_control-e_mail2" align="left" class="controlcampo">
							<textarea id="form-e_mail2" name="form-e_mail2" class="form-control"  placeholder="E Mail2"  title="E Mail2"   style="font-size: 13px;" rows="2" cols="25" size="20" ></textarea>
							<span id="spanstrMensajee_mail2" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-comentario" class="titulocampo">
							<label class="form-label">Comentario</label>
						</td>
						<td id="td_control-comentario" align="left" class="controlcampo">
							<textarea id="form-comentario" name="form-comentario" class="form-control"  placeholder="Comentario"  title="Comentario"   style="font-size: 13px;"  rows ="2" cols= "25"></textarea>
							<span id="spanstrMensajecomentario" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_10">
						<td id="td_title-imagen" class="titulocampo">
							<label class="form-label">Imagen</label>
						</td>
						<td id="td_control-imagen" align="left" class="controlcampo">
							<textarea id="form-imagen" name="form-imagen" class="form-control"  placeholder="Imagen"  title="Imagen"   style="font-size: 13px;"  rows ="0" cols= "25"></textarea>
							<span id="spanstrMensajeimagen" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-activo" class="titulocampo">
							<label class="form-label">Activo</label>
						</td>
						<td id="td_control-activo" align="left" class="controlcampo">
							<input id="form-activo" name="form-activo" type="checkbox" >
							<span id="spanstrMensajeactivo" class="mensajeerror"></span>
						</td>
					</tr>
				</table>
			</div>
				</td></tr>
					<tr id="trclientegeneralElementos">
						<td id="tdclientegeneralElementos"  colspan="4">
			<div id="general">
				<table class="elementos" style="width:400px;text-align:left; padding: 0px; border-spacing: 0px; border-collapse: collapse;">
					<caption class="busquedacabecera"><span>GENERAL</span></caption>
					
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
					
					<tr id="tr_fila_1">
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
					</tr>
					<tr id="tr_fila_2">
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
						<td id="td_title-codigo_postal" class="titulocampo">
							<label class="form-label">Codigo Postal</label>
						</td>
						<td id="td_control-codigo_postal" align="left" class="controlcampo">
							<input id="form-codigo_postal" name="form-codigo_postal" type="text" class="form-control"  placeholder="Codigo Postal"  title="Codigo Postal"    size="15"  maxlength="15"/>
							<span id="spanstrMensajecodigo_postal" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_4">
						<td id="td_title-fax" class="titulocampo">
							<label class="form-label">Fax</label>
						</td>
						<td id="td_control-fax" align="left" class="controlcampo">
							<input id="form-fax" name="form-fax" type="text" class="form-control"  placeholder="Fax"  title="Fax"    size="20"  maxlength="20"/>
							<span id="spanstrMensajefax" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_5">
						<td id="td_title-contacto" class="titulocampo">
							<label class="form-label">Contacto</label>
						</td>
						<td id="td_control-contacto" align="left" class="controlcampo">
							<input id="form-contacto" name="form-contacto" type="text" class="form-control"  placeholder="Contacto"  title="Contacto"    size="20"  maxlength="50"/>
							<span id="spanstrMensajecontacto" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_6">
						<td id="td_title-id_vendedor" class="titulocampo">
							<label class="form-label">Vendedor.(*)</label>
						</td>
						<td id="td_control-id_vendedor" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_vendedor" name="form-id_vendedor" title="Vendedor" ></select></td>
									<td><a><img id="form-id_vendedor_img" name="form-id_vendedor_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_vendedor_img_busqueda" name="form-id_vendedor_img_busqueda" title="Buscar Vendedor" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_vendedor" class="mensajeerror"></span>
						</td>
					</tr>
				</table>
			</div>
				</td></tr>
					<tr id="trclientecontableElementos">
						<td id="tdclientecontableElementos"  colspan="4">
			<div id="contable">
				<table class="elementos" style="width:400px;text-align:left; padding: 0px; border-spacing: 0px; border-collapse: collapse;">
					<caption class="busquedacabecera"><span>CONTABLE</span></caption>
					
						<td id="td_title-maximo_credito" class="titulocampo">
							<label class="form-label">Maximo Credito.(*)</label>
						</td>
						<td id="td_control-maximo_credito" align="left" class="controlcampo">
							<input id="form-maximo_credito" name="form-maximo_credito" type="text" class="form-control"  placeholder="Maximo Credito"  title="Maximo Credito"    maxlength="18" size="12" >
							<span id="spanstrMensajemaximo_credito" class="mensajeerror"></span>
						</td>
					
					<tr id="tr_fila_1">
						<td id="td_title-maximo_descuento" class="titulocampo">
							<label class="form-label">Maximo Descuento.(*)</label>
						</td>
						<td id="td_control-maximo_descuento" align="left" class="controlcampo">
							<input id="form-maximo_descuento" name="form-maximo_descuento" type="text" class="form-control"  placeholder="Maximo Descuento"  title="Maximo Descuento"    maxlength="18" size="12" >
							<span id="spanstrMensajemaximo_descuento" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_2">
						<td id="td_title-interes_anual" class="titulocampo">
							<label class="form-label">Interes Anual.(*)</label>
						</td>
						<td id="td_control-interes_anual" align="left" class="controlcampo">
							<input id="form-interes_anual" name="form-interes_anual" type="text" class="form-control"  placeholder="Interes Anual"  title="Interes Anual"    maxlength="18" size="12" >
							<span id="spanstrMensajeinteres_anual" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_3">
						<td id="td_title-balance" class="titulocampo">
							<label class="form-label">Balance.(*)</label>
						</td>
						<td id="td_control-balance" align="left" class="controlcampo">
							<input id="form-balance" name="form-balance" type="text" class="form-control"  placeholder="Balance"  title="Balance"    maxlength="18" size="12" >
							<span id="spanstrMensajebalance" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_4">
						<td id="td_title-id_termino_pago_cliente" class="titulocampo">
							<label class="form-label">Terminos Pago.(*)</label>
						</td>
						<td id="td_control-id_termino_pago_cliente" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_termino_pago_cliente" name="form-id_termino_pago_cliente" title="Terminos Pago" ></select></td>
									<td><a><img id="form-id_termino_pago_cliente_img" name="form-id_termino_pago_cliente_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_termino_pago_cliente_img_busqueda" name="form-id_termino_pago_cliente_img_busqueda" title="Buscar Terminos Pago Cliente" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_termino_pago_cliente" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_5">
						<td id="td_title-id_cuenta" class="titulocampo">
							<label class="form-label">Cuenta Contable Ventas</label>
						</td>
						<td id="td_control-id_cuenta" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_cuenta" name="form-id_cuenta" title="Cuenta Contable Ventas" ></select></td>
									<td><a><img id="form-id_cuenta_img" name="form-id_cuenta_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_cuenta_img_busqueda" name="form-id_cuenta_img_busqueda" title="Buscar Cuentas" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_cuenta" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_6">
						<td id="td_title-facturar_con" class="titulocampo">
							<label class="form-label">Facturar Con.(*)</label>
						</td>
						<td id="td_control-facturar_con" align="left" class="controlcampo">
							<input id="form-facturar_con" name="form-facturar_con" type="text" class="form-control"  placeholder="Facturar Con"  title="Facturar Con"    maxlength="10" size="10" >
							<span id="spanstrMensajefacturar_con" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_7">
						<td id="td_title-aplica_impuesto_ventas" class="titulocampo">
							<label class="form-label">Aplica Impuesto Ventas</label>
						</td>
						<td id="td_control-aplica_impuesto_ventas" align="left" class="controlcampo">
							<input id="form-aplica_impuesto_ventas" name="form-aplica_impuesto_ventas" type="checkbox" >
							<span id="spanstrMensajeaplica_impuesto_ventas" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_8">
						<td id="td_title-id_impuesto" class="titulocampo">
							<label class="form-label">Impuesto.(*)</label>
						</td>
						<td id="td_control-id_impuesto" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_impuesto" name="form-id_impuesto" title="Impuesto" ></select></td>
									<td><a><img id="form-id_impuesto_img" name="form-id_impuesto_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_impuesto_img_busqueda" name="form-id_impuesto_img_busqueda" title="Buscar Impuesto" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_impuesto" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_9">
						<td id="td_title-aplica_retencion_impuesto" class="titulocampo">
							<label class="form-label">Aplica Retencion Impuesto</label>
						</td>
						<td id="td_control-aplica_retencion_impuesto" align="left" class="controlcampo">
							<input id="form-aplica_retencion_impuesto" name="form-aplica_retencion_impuesto" type="checkbox" >
							<span id="spanstrMensajeaplica_retencion_impuesto" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_10">
						<td id="td_title-id_retencion" class="titulocampo">
							<label class="form-label"> Retencion</label>
						</td>
						<td id="td_control-id_retencion" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_retencion" name="form-id_retencion" title=" Retencion" ></select></td>
									<td><a><img id="form-id_retencion_img" name="form-id_retencion_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_retencion_img_busqueda" name="form-id_retencion_img_busqueda" title="Buscar Retencion" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_retencion" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_11">
						<td id="td_title-aplica_retencion_fuente" class="titulocampo">
							<label class="form-label">Aplica Retencion Fuente</label>
						</td>
						<td id="td_control-aplica_retencion_fuente" align="left" class="controlcampo">
							<input id="form-aplica_retencion_fuente" name="form-aplica_retencion_fuente" type="checkbox" >
							<span id="spanstrMensajeaplica_retencion_fuente" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_12">
						<td id="td_title-id_retencion_fuente" class="titulocampo">
							<label class="form-label"> Retencion Fuente</label>
						</td>
						<td id="td_control-id_retencion_fuente" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_retencion_fuente" name="form-id_retencion_fuente" title=" Retencion Fuente" ></select></td>
									<td><a><img id="form-id_retencion_fuente_img" name="form-id_retencion_fuente_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_retencion_fuente_img_busqueda" name="form-id_retencion_fuente_img_busqueda" title="Buscar Retencion Fuente" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_retencion_fuente" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_13">
						<td id="td_title-aplica_retencion_ica" class="titulocampo">
							<label class="form-label">Aplica Retencion Ica</label>
						</td>
						<td id="td_control-aplica_retencion_ica" align="left" class="controlcampo">
							<input id="form-aplica_retencion_ica" name="form-aplica_retencion_ica" type="checkbox" >
							<span id="spanstrMensajeaplica_retencion_ica" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_14">
						<td id="td_title-id_retencion_ica" class="titulocampo">
							<label class="form-label"> Retencion Ica</label>
						</td>
						<td id="td_control-id_retencion_ica" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_retencion_ica" name="form-id_retencion_ica" title=" Retencion Ica" ></select></td>
									<td><a><img id="form-id_retencion_ica_img" name="form-id_retencion_ica_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_retencion_ica_img_busqueda" name="form-id_retencion_ica_img_busqueda" title="Buscar Retencion Ica" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_retencion_ica" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_15">
						<td id="td_title-aplica_2do_impuesto" class="titulocampo">
							<label class="form-label">Aplica 2do Impuesto</label>
						</td>
						<td id="td_control-aplica_2do_impuesto" align="left" class="controlcampo">
							<input id="form-aplica_2do_impuesto" name="form-aplica_2do_impuesto" type="checkbox" >
							<span id="spanstrMensajeaplica_2do_impuesto" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_16">
						<td id="td_title-id_otro_impuesto" class="titulocampo">
							<label class="form-label"> Otro Impuesto</label>
						</td>
						<td id="td_control-id_otro_impuesto" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_otro_impuesto" name="form-id_otro_impuesto" title=" Otro Impuesto" ></select></td>
									<td><a><img id="form-id_otro_impuesto_img" name="form-id_otro_impuesto_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_otro_impuesto_img_busqueda" name="form-id_otro_impuesto_img_busqueda" title="Buscar Otro Impuesto" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_otro_impuesto" class="mensajeerror"></span>
						</td>
					</tr>
				</table>
			</div>
				</td></tr>
				</table> <!-- tblElementoscliente -->
				</div>

				<!-- SECCION/OCULTOS -->
				<table id="tblCamposOcultoscliente" class="elementos" style="display: table-row;">
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
						<td id="td_title-creado" class="titulocampo">
							<label class="form-label">Creado.(*)</label>
						</td>
						<td id="td_control-creado" align="left" class="controlcampo">
							<input id="form-creado" name="form-creado" type="text" class="form-control"  placeholder="Creado"  title="Creado"    size="10" >
							<span id="spanstrMensajecreado" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-monto_ultima_transaccion" class="titulocampo">
							<label class="form-label">Monto Ultima Transaccion</label>
						</td>
						<td id="td_control-monto_ultima_transaccion" align="left" class="controlcampo">
							<input id="form-monto_ultima_transaccion" name="form-monto_ultima_transaccion" type="text" class="form-control"  placeholder="Monto Ultima Transaccion"  title="Monto Ultima Transaccion"    maxlength="18" size="12" >
							<span id="spanstrMensajemonto_ultima_transaccion" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_2">
						<td id="td_title-fecha_ultima_transaccion" class="titulocampo">
							<label class="form-label">Fecha Ultima Transaccion.(*)</label>
						</td>
						<td id="td_control-fecha_ultima_transaccion" align="left" class="controlcampo">
							<input id="form-fecha_ultima_transaccion" name="form-fecha_ultima_transaccion" type="text" class="form-control"  placeholder="Fecha Ultima Transaccion"  title="Fecha Ultima Transaccion"    size="10" >
							<span id="spanstrMensajefecha_ultima_transaccion" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-descripcion_ultima_transaccion" class="titulocampo">
							<label class="form-label">Descripcion Ultima Transaccion</label>
						</td>
						<td id="td_control-descripcion_ultima_transaccion" align="left" class="controlcampo">
							<textarea id="form-descripcion_ultima_transaccion" name="form-descripcion_ultima_transaccion" class="form-control"  placeholder="Descripcion Ultima Transaccion"  title="Descripcion Ultima Transaccion"   style="font-size: 13px;" rows="2" cols="25" size="20" ></textarea>
							<span id="spanstrMensajedescripcion_ultima_transaccion" class="mensajeerror"></span>
						</td>
					</tr>
				</table> <!-- tblCamposOcultoscliente -->

			</td></tr> <!-- trclienteElementos -->
			</table> <!-- tblclienteElementos -->
			</form> <!-- frmMantenimientocliente -->


			

				<form id="frmAccionesMantenimientocliente" name="frmAccionesMantenimientocliente">

			<?php if(cliente_web::$STR_ES_BUSQUEDA=='false' ) {?>
			<table id="tblclienteAcciones" class="elementos" style="text-align: center">
		<tr id="trclienteAcciones" class="elementos" style="display:table-row">
			<td align="center">
				<a id="Acciones" ></a>

				<?php if(cliente_web::$STR_ES_RELACIONES=='false' ) {?>
				<div align="right">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
				<?php } ?>

					<!-- SECCION/BOTONES -->
					<table id="tblAccionesMantenimientocliente" class="busqueda" style="width: 50%;text-align: left">

						<?php if(cliente_web::$STR_ES_RELACIONES=='false' ) {?>
						<!--
						<caption class="busquedacabecera">
							<span>Acciones</span>
						</caption>
						-->
						<?php } ?>

						<tr id="trAccionesMantenimientoclienteBasicos">
							<td id="tdbtnNuevocliente" style="visibility:visible">
								<div id="divNuevocliente" style="display:table-row">
									<input type="button" id="btnNuevocliente" name="btnNuevocliente" value="NUEVO" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnActualizarcliente" style="visibility:visible">
								<div id="divActualizarcliente" style="display:table-row">
									<input type="button" id="btnActualizarcliente" name="btnActualizarcliente" title="ACTUALIZAR Cliente ACTUAL" value="Actualizar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnEliminarcliente" style="visibility:visible">
								<div id="divEliminarcliente" style="display:table-row">
									<input type="button" id="btnEliminarcliente" name="btnEliminarcliente" title="ELIMINAR Cliente ACTUAL" value="Eliminar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnImprimircliente" style="visibility:visible">
								<input type="button" id="btnImprimircliente" name="btnImprimircliente" title="IMPRIMIR PAGINA Cliente ACTUAL" value="Imp. Datos" class="btn btn-primary"/>
							</td>
							<td id="tdbtnCancelarcliente" style="visibility:visible">
								<input type="button" id="btnCancelarcliente" name="btnCancelarcliente" title="CANCELAR Cliente ACTUAL" value="Cancelar" class="btn btn-primary"/>
							</td>
						</tr>
						<tr id="trAccionesMantenimientoclienteGuardar" style="display:none">
							<td id="tdbtnGuardarCambioscliente" colspan="4" align="center" style="visibility:visible">
								<div id="divGuardarCambioscliente" style="display:table-row">
									<input type="button" id="btnGuardarCambiosFormulariocliente" name="btnGuardarCambiosFormulariocliente" title="GUARDAR" value="GUADAR CAMBIOS" class="btn btn-primary"/>
								</div>
							</td>
						</tr>
					</table> <!-- tblAccionesMantenimientocliente -->
			</td>
		</tr> <!-- trclienteAcciones -->
		<?php if(cliente_web::$STR_ES_RELACIONADO=='false' ) {?>
		<tr id="trclienteParametrosAcciones" class="impresion"  style="display:table-row">
			<td align="center">
				<!-- SECCION/POST -->
				<table id="tblclienteParametrosAcciones" style="text-align: center;border: 0px solid black;padding: 0px; border-spacing: 0px">
					<caption class="busquedacabecera" style="padding: 0px;caption-side: top;">
						<span>Acciones Extra/Post</span>
					</caption>
					<tr id="trclienteFilaParametrosAcciones">
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
				</table> <!-- tblclienteParametrosAcciones -->
			</td>
		</tr> <!-- trclienteParametrosAcciones -->
		<?php }?>
		<tr id="trclienteMensajes" class="mensajes">
			<td align="center">
				<a id="Mensajes"></a>
			</td>
		</tr> <!-- trclienteMensajes -->
			</table> <!-- tblclienteAcciones -->
			<?php } ?>
			</form> <!-- frmMantenimientocliente -->
			</div> <!-- divMantenimientoclienteAjaxWebPart -->
		</td>
	</tr> <!-- trclienteElementosFormulario/super -->
		<?php if(cliente_web::$STR_ES_RELACIONADO=='false' ) {?>

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
			
				import {cliente_webcontrol,cliente_webcontrol1} from './webroot/js/JavaScript/contabilidad/cuentascobrar/cliente/js/webcontrol/cliente_form_webcontrol.js?random=1';
				
				cliente_webcontrol1.setcliente_constante(window.cliente_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(cliente_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

