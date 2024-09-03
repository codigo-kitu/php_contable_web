<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\inventario\lista_precio\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Lista Precios Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/inventario/lista_precio/util/lista_precio_carga.php');
	use com\bydan\contabilidad\inventario\lista_precio\util\lista_precio_carga;
	
	//include_once('com/bydan/contabilidad/inventario/lista_precio/presentation/view/lista_precio_web.php');
	//use com\bydan\contabilidad\inventario\lista_precio\presentation\view\lista_precio_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	lista_precio_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	lista_precio_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$lista_precio_web1= new lista_precio_web();	
	$lista_precio_web1->cargarDatosGenerales();
	
	//$moduloActual=$lista_precio_web1->moduloActual;
	//$usuarioActual=$lista_precio_web1->usuarioActual;
	//$sessionBase=$lista_precio_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$lista_precio_web1->parametroGeneralUsuarioActual;
	
	
		
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
		
		
			<script type="module" src="webroot/js/JavaScript/contabilidad/inventario/lista_precio/js/util/lista_precio_form_funcion.js?random=1"></script>
						
		
		
		<?php 
			
		
			lista_precio_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					lista_precio_web::$GET_POST=$_GET;
				} else {
					lista_precio_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			lista_precio_web::$STR_NOMBRE_PAGINA = 'lista_precio_form_view.php';
			lista_precio_web::$BIT_ES_PAGINA_PRINCIPAL = 'false';
			lista_precio_web::$BIT_ES_PAGINA_FORM = 'true';
				
			lista_precio_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {lista_precio_constante,lista_precio_constante1} from './webroot/js/JavaScript/contabilidad/inventario/lista_precio/js/util/lista_precio_constante.js?random=1';
			import {lista_precio_funcion,lista_precio_funcion1} from './webroot/js/JavaScript/contabilidad/inventario/lista_precio/js/util/lista_precio_funcion.js?random=1';
			
			let lista_precio_constante2 = new lista_precio_constante();
			
			lista_precio_constante2.STR_NOMBRE_PAGINA="<?php echo(lista_precio_web::$STR_NOMBRE_PAGINA); ?>";
			lista_precio_constante2.STR_TYPE_ON_LOADlista_precio="<?php echo(lista_precio_web::$STR_TYPE_ONLOAD); ?>";
			lista_precio_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(lista_precio_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			lista_precio_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(lista_precio_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			lista_precio_constante2.STR_ACTION="<?php echo(lista_precio_web::$STR_ACTION); ?>";
			lista_precio_constante2.STR_ES_POPUP="<?php echo(lista_precio_web::$STR_ES_POPUP); ?>";
			lista_precio_constante2.STR_ES_BUSQUEDA="<?php echo(lista_precio_web::$STR_ES_BUSQUEDA); ?>";
			lista_precio_constante2.STR_FUNCION_JS="<?php echo(lista_precio_web::$STR_FUNCION_JS); ?>";
			lista_precio_constante2.BIG_ID_ACTUAL="<?php echo(lista_precio_web::$BIG_ID_ACTUAL); ?>";
			lista_precio_constante2.BIG_ID_OPCION="<?php echo(lista_precio_web::$BIG_ID_OPCION); ?>";
			lista_precio_constante2.STR_OBJETO_JS="<?php echo(lista_precio_web::$STR_OBJETO_JS); ?>";
			lista_precio_constante2.STR_ES_RELACIONES="<?php echo(lista_precio_web::$STR_ES_RELACIONES); ?>";
			lista_precio_constante2.STR_ES_RELACIONADO="<?php echo(lista_precio_web::$STR_ES_RELACIONADO); ?>";
			lista_precio_constante2.STR_ES_SUB_PAGINA="<?php echo(lista_precio_web::$STR_ES_SUB_PAGINA); ?>";
			lista_precio_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(lista_precio_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			lista_precio_constante2.BIT_ES_PAGINA_FORM=<?php echo(lista_precio_web::$BIT_ES_PAGINA_FORM); ?>;
			lista_precio_constante2.STR_SUFIJO="<?php echo(lista_precio_web::$STR_SUF); ?>";//lista_precio
			lista_precio_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(lista_precio_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//lista_precio
			
			lista_precio_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(lista_precio_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			lista_precio_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($lista_precio_web1->moduloActual->getnombre()); ?>";
			lista_precio_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(lista_precio_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			lista_precio_constante2.BIT_ES_LOAD_NORMAL=true;
			/*lista_precio_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			lista_precio_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.lista_precio_constante2 = lista_precio_constante2;
			
		</script>
		
		<?php if(lista_precio_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.lista_precio_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.lista_precio_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="lista_precioActual" ></a>
	
	<div id="divResumenlista_precioActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(lista_precio_web::$STR_ES_RELACIONADO=='false') {?>
		
		<div id="header" >
		
			<div id="banner">
				<span id="spanTituloBanner" class="titulobanner"></span>
			</div> <!-- banner -->
					
			<div id="subheader" class="links">  
			
						
			</div> <!-- sub-header -->
			
			
		</div> <!-- header -->
		
		<?php } ?>
		
		<div id="main">
		

			<?php if(lista_precio_web::$STR_ES_RELACIONADO=='false') {?>
			
			
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(lista_precio_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(lista_precio_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divlista_precioPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tbllista_precioPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmlista_precioAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnlista_precioAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="lista_precio_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnlista_precioAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmlista_precioAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tbllista_precioPopupAjaxWebPart -->
		</div> <!-- divlista_precioPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->		
		
		
		
			
<tr id="trlista_precioElementosFormulario">
	<td>
		<div id="divMantenimientolista_precioAjaxWebPart" title="LISTA PRECIOS" style="height: 90%;width: 90%;position: relative;top: 30px;left: 30px;">
			<form id="frmMantenimientolista_precio" name="frmMantenimientolista_precio">

			</br>

			<?php if(lista_precio_web::$STR_ES_RELACIONES=='false' ) {?>
			</br>
			<?php } ?>

			<!-- SECCION/TOOLBAR -->
			<table id="tbllista_precioToolBarFormularioExterior" style="width: 65%">
				<tr style="display:table-row">
					<td align="center">

						<table id="tbllista_precioToolBarFormulario" style="text-align: center"  style="display:table-row">
							<tr>
								<td id="tdlista_precioActualizarToolBar" style="visibility:visible">
									<img id="imgActualizarToolBarlista_precio" name="imgActualizarToolBarlista_precio" title="ACTUALIZAR Lista Precios ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/actualizar.gif" width="25" height="25"/>
								</td>
								<td id="tdlista_precioEliminarToolBar" style="visibility:visible">
									<img id="imgEliminarToolBarlista_precio" name="imgEliminarToolBarlista_precio" title="ELIMINAR Lista Precios ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/eliminar.gif" width="25" height="25"/>
								</td>
								<td id="tdlista_precioCancelarToolBar" style="visibility:visible">
									<img id="imgCancelarToolBarlista_precio" name="imgCancelarToolBarlista_precio" title="CANCELAR Lista Precios ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/cancelar.gif" width="25" height="25"/>
								</td>
								<td id="tdlista_precioRelacionesToolBar" style="display:table-row">
									<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/xexpand.png" width="25" height="25" onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('tblCamposOcultoslista_precio',this,'../')"/>
								</td>
							</tr>
						</table> <!-- tbllista_precioToolBarFormulario -->

					</td>
				</tr>
			</table> <!-- tbllista_precioToolBarFormularioExterior -->

			<table id="tbllista_precioElementos">
			<tr id="trlista_precioElementos" class="elementos" style="display:table-row">
			<td align="center">

			<a id="Campos"></a>

				<?php if(lista_precio_web::$STR_ES_RELACIONES=='false' ) {?>
				<div id="divFlechaArribaElementos" align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
					<span></span>
				</div>
				<?php } ?>

				<!-- SECCION/FORMULARIO -->
				<table id="tblElementoslista_precio" class="elementos" style="width: 300px; padding: 0px; border-spacing: 0px; border-collapse: collapse; text-align: left;">
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
						<td id="td_title-id_bodega" class="titulocampo">
							<label class="form-label">Bodega.(*)</label>
						</td>
						<td id="td_control-id_bodega" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_bodega" name="form-id_bodega" title="Bodega" ></select></td>
									<td><a><img id="form-id_bodega_img" name="form-id_bodega_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_bodega_img_busqueda" name="form-id_bodega_img_busqueda" title="Buscar Bodega" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_bodega" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_5">
						<td id="td_title-id_producto" class="titulocampo">
							<label class="form-label">Producto.(*)</label>
						</td>
						<td id="td_control-id_producto" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_producto" name="form-id_producto" title="Producto" ></select></td>
									<td><a><img id="form-id_producto_img" name="form-id_producto_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_producto_img_busqueda" name="form-id_producto_img_busqueda" title="Buscar Producto" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_producto" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_6">
						<td id="td_title-id_proveedor" class="titulocampo">
							<label class="form-label">Proveedor.(*)</label>
						</td>
						<td id="td_control-id_proveedor" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_proveedor" name="form-id_proveedor" title="Proveedor" ></select></td>
									<td><a><img id="form-id_proveedor_img" name="form-id_proveedor_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_proveedor_img_busqueda" name="form-id_proveedor_img_busqueda" title="Buscar Proveedor" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_proveedor" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_7">
						<td id="td_title-precio_compra" class="titulocampo">
							<label class="form-label">Precio Compra.(*)</label>
						</td>
						<td id="td_control-precio_compra" align="left" class="controlcampo">
							<input id="form-precio_compra" name="form-precio_compra" type="text" class="form-control"  placeholder="Precio Compra"  title="Precio Compra"    maxlength="18" size="12" >
							<span id="spanstrMensajeprecio_compra" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_8">
						<td id="td_title-rango_inicial" class="titulocampo">
							<label class="form-label">Rango Inicial.(*)</label>
						</td>
						<td id="td_control-rango_inicial" align="left" class="controlcampo">
							<input id="form-rango_inicial" name="form-rango_inicial" type="text" class="form-control"  placeholder="Rango Inicial"  title="Rango Inicial"    maxlength="18" size="12" >
							<span id="spanstrMensajerango_inicial" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_9">
						<td id="td_title-rango_final" class="titulocampo">
							<label class="form-label">Rango Final.(*)</label>
						</td>
						<td id="td_control-rango_final" align="left" class="controlcampo">
							<input id="form-rango_final" name="form-rango_final" type="text" class="form-control"  placeholder="Rango Final"  title="Rango Final"    maxlength="18" size="12" >
							<span id="spanstrMensajerango_final" class="mensajeerror"></span>
						</td>
					</tr>
				</table> <!-- tblElementoslista_precio -->

				<!-- SECCION/OCULTOS -->
				<table id="tblCamposOcultoslista_precio" class="elementos" style="display: table-row;">
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
						<td id="td_title-precio_dolar" class="titulocampo">
							<label class="form-label">Precio En Dolar.(*)</label>
						</td>
						<td id="td_control-precio_dolar" align="left" class="controlcampo">
							<input id="form-precio_dolar" name="form-precio_dolar" type="text" class="form-control"  placeholder="Precio En Dolar"  title="Precio En Dolar"    size="10"  maxlength="10"/>
							<span id="spanstrMensajeprecio_dolar" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_2">
						<td id="td_title-precio_compra2" class="titulocampo">
							<label class="form-label">Precio De Compra 2.(*)</label>
						</td>
						<td id="td_control-precio_compra2" align="left" class="controlcampo">
							<input id="form-precio_compra2" name="form-precio_compra2" type="text" class="form-control"  placeholder="Precio De Compra 2"  title="Precio De Compra 2"    maxlength="18" size="12" >
							<span id="spanstrMensajeprecio_compra2" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_3">
						<td id="td_title-precio_dolar2" class="titulocampo">
							<label class="form-label">Precio En Dolar 2.(*)</label>
						</td>
						<td id="td_control-precio_dolar2" align="left" class="controlcampo">
							<input id="form-precio_dolar2" name="form-precio_dolar2" type="text" class="form-control"  placeholder="Precio En Dolar 2"  title="Precio En Dolar 2"    size="10"  maxlength="10"/>
							<span id="spanstrMensajeprecio_dolar2" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_4">
						<td id="td_title-rango_inicial2" class="titulocampo">
							<label class="form-label">Rango Inicial 2.(*)</label>
						</td>
						<td id="td_control-rango_inicial2" align="left" class="controlcampo">
							<input id="form-rango_inicial2" name="form-rango_inicial2" type="text" class="form-control"  placeholder="Rango Inicial 2"  title="Rango Inicial 2"    maxlength="18" size="12" >
							<span id="spanstrMensajerango_inicial2" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_5">
						<td id="td_title-rango_final2" class="titulocampo">
							<label class="form-label">Rango Final 2.(*)</label>
						</td>
						<td id="td_control-rango_final2" align="left" class="controlcampo">
							<input id="form-rango_final2" name="form-rango_final2" type="text" class="form-control"  placeholder="Rango Final 2"  title="Rango Final 2"    maxlength="18" size="12" >
							<span id="spanstrMensajerango_final2" class="mensajeerror"></span>
						</td>
					</tr>
				</table> <!-- tblCamposOcultoslista_precio -->

			</td></tr> <!-- trlista_precioElementos -->
			</table> <!-- tbllista_precioElementos -->
			</form> <!-- frmMantenimientolista_precio -->


			

				<form id="frmAccionesMantenimientolista_precio" name="frmAccionesMantenimientolista_precio">

			<?php if(lista_precio_web::$STR_ES_BUSQUEDA=='false' ) {?>
			<table id="tbllista_precioAcciones" class="elementos" style="text-align: center">
		<tr id="trlista_precioAcciones" class="elementos" style="display:table-row">
			<td align="center">
				<a id="Acciones" ></a>

				<?php if(lista_precio_web::$STR_ES_RELACIONES=='false' ) {?>
				<div align="right">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
				<?php } ?>

					<!-- SECCION/BOTONES -->
					<table id="tblAccionesMantenimientolista_precio" class="busqueda" style="width: 50%;text-align: left">

						<?php if(lista_precio_web::$STR_ES_RELACIONES=='false' ) {?>
						<!--
						<caption class="busquedacabecera">
							<span>Acciones</span>
						</caption>
						-->
						<?php } ?>

						<tr id="trAccionesMantenimientolista_precioBasicos">
							<td id="tdbtnNuevolista_precio" style="visibility:visible">
								<div id="divNuevolista_precio" style="display:table-row">
									<input type="button" id="btnNuevolista_precio" name="btnNuevolista_precio" value="NUEVO" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnActualizarlista_precio" style="visibility:visible">
								<div id="divActualizarlista_precio" style="display:table-row">
									<input type="button" id="btnActualizarlista_precio" name="btnActualizarlista_precio" title="ACTUALIZAR Lista Precios ACTUAL" value="Actualizar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnEliminarlista_precio" style="visibility:visible">
								<div id="divEliminarlista_precio" style="display:table-row">
									<input type="button" id="btnEliminarlista_precio" name="btnEliminarlista_precio" title="ELIMINAR Lista Precios ACTUAL" value="Eliminar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnImprimirlista_precio" style="visibility:visible">
								<input type="button" id="btnImprimirlista_precio" name="btnImprimirlista_precio" title="IMPRIMIR PAGINA Lista Precios ACTUAL" value="Imp. Datos" class="btn btn-primary"/>
							</td>
							<td id="tdbtnCancelarlista_precio" style="visibility:visible">
								<input type="button" id="btnCancelarlista_precio" name="btnCancelarlista_precio" title="CANCELAR Lista Precios ACTUAL" value="Cancelar" class="btn btn-primary"/>
							</td>
						</tr>
						<tr id="trAccionesMantenimientolista_precioGuardar" style="display:none">
							<td id="tdbtnGuardarCambioslista_precio" colspan="4" align="center" style="visibility:visible">
								<div id="divGuardarCambioslista_precio" style="display:table-row">
									<input type="button" id="btnGuardarCambiosFormulariolista_precio" name="btnGuardarCambiosFormulariolista_precio" title="GUARDAR" value="GUADAR CAMBIOS" class="btn btn-primary"/>
								</div>
							</td>
						</tr>
					</table> <!-- tblAccionesMantenimientolista_precio -->
			</td>
		</tr> <!-- trlista_precioAcciones -->
		<?php if(lista_precio_web::$STR_ES_RELACIONADO=='false' ) {?>
		<tr id="trlista_precioParametrosAcciones" class="impresion"  style="display:table-row">
			<td align="center">
				<!-- SECCION/POST -->
				<table id="tbllista_precioParametrosAcciones" style="text-align: center;border: 0px solid black;padding: 0px; border-spacing: 0px">
					<caption class="busquedacabecera" style="padding: 0px;caption-side: top;">
						<span>Acciones Extra/Post</span>
					</caption>
					<tr id="trlista_precioFilaParametrosAcciones">
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
				</table> <!-- tbllista_precioParametrosAcciones -->
			</td>
		</tr> <!-- trlista_precioParametrosAcciones -->
		<?php }?>
		<tr id="trlista_precioMensajes" class="mensajes">
			<td align="center">
				<a id="Mensajes"></a>
			</td>
		</tr> <!-- trlista_precioMensajes -->
			</table> <!-- tbllista_precioAcciones -->
			<?php } ?>
			</form> <!-- frmMantenimientolista_precio -->
			</div> <!-- divMantenimientolista_precioAjaxWebPart -->
		</td>
	</tr> <!-- trlista_precioElementosFormulario/super -->
		<?php if(lista_precio_web::$STR_ES_RELACIONADO=='false' ) {?>

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
			
				import {lista_precio_webcontrol,lista_precio_webcontrol1} from './webroot/js/JavaScript/contabilidad/inventario/lista_precio/js/webcontrol/lista_precio_form_webcontrol.js?random=1';
				
				lista_precio_webcontrol1.setlista_precio_constante(window.lista_precio_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(lista_precio_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

