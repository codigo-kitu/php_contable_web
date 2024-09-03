<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\inventario\lista_producto\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Lista Productos Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/inventario/lista_producto/util/lista_producto_carga.php');
	use com\bydan\contabilidad\inventario\lista_producto\util\lista_producto_carga;
	
	//include_once('com/bydan/contabilidad/inventario/lista_producto/presentation/view/lista_producto_web.php');
	//use com\bydan\contabilidad\inventario\lista_producto\presentation\view\lista_producto_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	lista_producto_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	lista_producto_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$lista_producto_web1= new lista_producto_web();	
	$lista_producto_web1->cargarDatosGenerales();
	
	//$moduloActual=$lista_producto_web1->moduloActual;
	//$usuarioActual=$lista_producto_web1->usuarioActual;
	//$sessionBase=$lista_producto_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$lista_producto_web1->parametroGeneralUsuarioActual;
	
	
		
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
		
		
			<script type="module" src="webroot/js/JavaScript/contabilidad/inventario/lista_producto/js/util/lista_producto_form_funcion.js?random=1"></script>
						
		
		
		<?php 
			
		
			lista_producto_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					lista_producto_web::$GET_POST=$_GET;
				} else {
					lista_producto_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			lista_producto_web::$STR_NOMBRE_PAGINA = 'lista_producto_form_view.php';
			lista_producto_web::$BIT_ES_PAGINA_PRINCIPAL = 'false';
			lista_producto_web::$BIT_ES_PAGINA_FORM = 'true';
				
			lista_producto_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {lista_producto_constante,lista_producto_constante1} from './webroot/js/JavaScript/contabilidad/inventario/lista_producto/js/util/lista_producto_constante.js?random=1';
			import {lista_producto_funcion,lista_producto_funcion1} from './webroot/js/JavaScript/contabilidad/inventario/lista_producto/js/util/lista_producto_funcion.js?random=1';
			
			let lista_producto_constante2 = new lista_producto_constante();
			
			lista_producto_constante2.STR_NOMBRE_PAGINA="<?php echo(lista_producto_web::$STR_NOMBRE_PAGINA); ?>";
			lista_producto_constante2.STR_TYPE_ON_LOADlista_producto="<?php echo(lista_producto_web::$STR_TYPE_ONLOAD); ?>";
			lista_producto_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(lista_producto_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			lista_producto_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(lista_producto_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			lista_producto_constante2.STR_ACTION="<?php echo(lista_producto_web::$STR_ACTION); ?>";
			lista_producto_constante2.STR_ES_POPUP="<?php echo(lista_producto_web::$STR_ES_POPUP); ?>";
			lista_producto_constante2.STR_ES_BUSQUEDA="<?php echo(lista_producto_web::$STR_ES_BUSQUEDA); ?>";
			lista_producto_constante2.STR_FUNCION_JS="<?php echo(lista_producto_web::$STR_FUNCION_JS); ?>";
			lista_producto_constante2.BIG_ID_ACTUAL="<?php echo(lista_producto_web::$BIG_ID_ACTUAL); ?>";
			lista_producto_constante2.BIG_ID_OPCION="<?php echo(lista_producto_web::$BIG_ID_OPCION); ?>";
			lista_producto_constante2.STR_OBJETO_JS="<?php echo(lista_producto_web::$STR_OBJETO_JS); ?>";
			lista_producto_constante2.STR_ES_RELACIONES="<?php echo(lista_producto_web::$STR_ES_RELACIONES); ?>";
			lista_producto_constante2.STR_ES_RELACIONADO="<?php echo(lista_producto_web::$STR_ES_RELACIONADO); ?>";
			lista_producto_constante2.STR_ES_SUB_PAGINA="<?php echo(lista_producto_web::$STR_ES_SUB_PAGINA); ?>";
			lista_producto_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(lista_producto_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			lista_producto_constante2.BIT_ES_PAGINA_FORM=<?php echo(lista_producto_web::$BIT_ES_PAGINA_FORM); ?>;
			lista_producto_constante2.STR_SUFIJO="<?php echo(lista_producto_web::$STR_SUF); ?>";//lista_producto
			lista_producto_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(lista_producto_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//lista_producto
			
			lista_producto_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(lista_producto_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			lista_producto_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($lista_producto_web1->moduloActual->getnombre()); ?>";
			lista_producto_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(lista_producto_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			lista_producto_constante2.BIT_ES_LOAD_NORMAL=true;
			/*lista_producto_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			lista_producto_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.lista_producto_constante2 = lista_producto_constante2;
			
		</script>
		
		<?php if(lista_producto_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.lista_producto_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.lista_producto_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="lista_productoActual" ></a>
	
	<div id="divResumenlista_productoActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(lista_producto_web::$STR_ES_RELACIONADO=='false') {?>
		
		<div id="header" >
		
			<div id="banner">
				<span id="spanTituloBanner" class="titulobanner"></span>
			</div> <!-- banner -->
					
			<div id="subheader" class="links">  
			
						
			</div> <!-- sub-header -->
			
			
		</div> <!-- header -->
		
		<?php } ?>
		
		<div id="main">
		

			<?php if(lista_producto_web::$STR_ES_RELACIONADO=='false') {?>
			
			
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(lista_producto_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(lista_producto_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divlista_productoPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tbllista_productoPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmlista_productoAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnlista_productoAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="lista_producto_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnlista_productoAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmlista_productoAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tbllista_productoPopupAjaxWebPart -->
		</div> <!-- divlista_productoPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->		
		
		
		
			
<tr id="trlista_productoElementosFormulario">
	<td>
		<div id="divMantenimientolista_productoAjaxWebPart" title="LISTA PRODUCTOS" style="height: 90%;width: 90%;position: relative;top: 30px;left: 30px;">
			<form id="frmMantenimientolista_producto" name="frmMantenimientolista_producto">

			</br>

			<?php if(lista_producto_web::$STR_ES_RELACIONES=='false' ) {?>
			</br>
			<?php } ?>

			<!-- SECCION/TOOLBAR -->
			<table id="tbllista_productoToolBarFormularioExterior" style="width: 65%">
				<tr style="display:table-row">
					<td align="center">

						<table id="tbllista_productoToolBarFormulario" style="text-align: center"  style="display:table-row">
							<tr>
								<td id="tdlista_productoActualizarToolBar" style="visibility:visible">
									<img id="imgActualizarToolBarlista_producto" name="imgActualizarToolBarlista_producto" title="ACTUALIZAR Lista Productos ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/actualizar.gif" width="25" height="25"/>
								</td>
								<td id="tdlista_productoEliminarToolBar" style="visibility:visible">
									<img id="imgEliminarToolBarlista_producto" name="imgEliminarToolBarlista_producto" title="ELIMINAR Lista Productos ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/eliminar.gif" width="25" height="25"/>
								</td>
								<td id="tdlista_productoCancelarToolBar" style="visibility:visible">
									<img id="imgCancelarToolBarlista_producto" name="imgCancelarToolBarlista_producto" title="CANCELAR Lista Productos ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/cancelar.gif" width="25" height="25"/>
								</td>
								<td id="tdlista_productoRelacionesToolBar" style="display:table-row">
									<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/xexpand.png" width="25" height="25" onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('tblCamposOcultoslista_producto',this,'../')"/>
								</td>
							</tr>
						</table> <!-- tbllista_productoToolBarFormulario -->

					</td>
				</tr>
			</table> <!-- tbllista_productoToolBarFormularioExterior -->

			<table id="tbllista_productoElementos">
			<tr id="trlista_productoElementos" class="elementos" style="display:table-row">
			<td align="center">

			<a id="Campos"></a>

				<?php if(lista_producto_web::$STR_ES_RELACIONES=='false' ) {?>
				<div id="divFlechaArribaElementos" align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
					<span></span>
				</div>
				<?php } ?>

				<!-- SECCION/FORMULARIO -->
				<table id="tblElementoslista_producto" class="elementos" style="width: 700px; padding: 0px; border-spacing: 0px; border-collapse: collapse; text-align: left;">
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
					
					
						<td id="td_title-codigo_producto" class="titulocampo">
							<label class="form-label">Codigo Producto.(*)</label>
						</td>
						<td id="td_control-codigo_producto" align="left" class="controlcampo">
							<input id="form-codigo_producto" name="form-codigo_producto" type="text" class="form-control"  placeholder="Codigo Producto"  title="Codigo Producto"    size="20"  maxlength="26"/>
							<span id="spanstrMensajecodigo_producto" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-descripcion_producto" class="titulocampo">
							<label class="form-label">Descripcion Producto.(*)</label>
						</td>
						<td id="td_control-descripcion_producto" align="left" class="controlcampo">
							<textarea id="form-descripcion_producto" name="form-descripcion_producto" class="form-control"  placeholder="Descripcion Producto"  title="Descripcion Producto"   style="font-size: 13px;" rows="2" cols="25" size="20" ></textarea>
							<span id="spanstrMensajedescripcion_producto" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-precio1" class="titulocampo">
							<label class="form-label">Precio1.(*)</label>
						</td>
						<td id="td_control-precio1" align="left" class="controlcampo">
							<input id="form-precio1" name="form-precio1" type="text" class="form-control"  placeholder="Precio1"  title="Precio1"    maxlength="18" size="12" >
							<span id="spanstrMensajeprecio1" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-precio2" class="titulocampo">
							<label class="form-label">Precio2.(*)</label>
						</td>
						<td id="td_control-precio2" align="left" class="controlcampo">
							<input id="form-precio2" name="form-precio2" type="text" class="form-control"  placeholder="Precio2"  title="Precio2"    maxlength="18" size="12" >
							<span id="spanstrMensajeprecio2" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-precio3" class="titulocampo">
							<label class="form-label">Precio3.(*)</label>
						</td>
						<td id="td_control-precio3" align="left" class="controlcampo">
							<input id="form-precio3" name="form-precio3" type="text" class="form-control"  placeholder="Precio3"  title="Precio3"    maxlength="18" size="12" >
							<span id="spanstrMensajeprecio3" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_2">
						<td id="td_title-precio4" class="titulocampo">
							<label class="form-label">Precio4.(*)</label>
						</td>
						<td id="td_control-precio4" align="left" class="controlcampo">
							<input id="form-precio4" name="form-precio4" type="text" class="form-control"  placeholder="Precio4"  title="Precio4"    maxlength="18" size="12" >
							<span id="spanstrMensajeprecio4" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-costo" class="titulocampo">
							<label class="form-label">Costo.(*)</label>
						</td>
						<td id="td_control-costo" align="left" class="controlcampo">
							<input id="form-costo" name="form-costo" type="text" class="form-control"  placeholder="Costo"  title="Costo"    maxlength="18" size="12" >
							<span id="spanstrMensajecosto" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-id_unidad_compra" class="titulocampo">
							<label class="form-label"> Unidad Compra.(*)</label>
						</td>
						<td id="td_control-id_unidad_compra" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_unidad_compra" name="form-id_unidad_compra" title=" Unidad Compra" ></select></td>
									<td><a><img id="form-id_unidad_compra_img" name="form-id_unidad_compra_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_unidad_compra_img_busqueda" name="form-id_unidad_compra_img_busqueda" title="Buscar Unidad" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_unidad_compra" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-unidad_en_compra" class="titulocampo">
							<label class="form-label">Unidad En Compra.(*)</label>
						</td>
						<td id="td_control-unidad_en_compra" align="left" class="controlcampo">
							<input id="form-unidad_en_compra" name="form-unidad_en_compra" type="text" class="form-control"  placeholder="Unidad En Compra"  title="Unidad En Compra"    maxlength="10" size="10" >
							<span id="spanstrMensajeunidad_en_compra" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-equivalencia_en_compra" class="titulocampo">
							<label class="form-label">Equivalencia En Compra.(*)</label>
						</td>
						<td id="td_control-equivalencia_en_compra" align="left" class="controlcampo">
							<input id="form-equivalencia_en_compra" name="form-equivalencia_en_compra" type="text" class="form-control"  placeholder="Equivalencia En Compra"  title="Equivalencia En Compra"    maxlength="18" size="12" >
							<span id="spanstrMensajeequivalencia_en_compra" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-id_unidad_venta" class="titulocampo">
							<label class="form-label"> Unidad Venta.(*)</label>
						</td>
						<td id="td_control-id_unidad_venta" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_unidad_venta" name="form-id_unidad_venta" title=" Unidad Venta" ></select></td>
									<td><a><img id="form-id_unidad_venta_img" name="form-id_unidad_venta_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_unidad_venta_img_busqueda" name="form-id_unidad_venta_img_busqueda" title="Buscar Unidad" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_unidad_venta" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-unidad_en_venta" class="titulocampo">
							<label class="form-label">Unidad En Venta.(*)</label>
						</td>
						<td id="td_control-unidad_en_venta" align="left" class="controlcampo">
							<input id="form-unidad_en_venta" name="form-unidad_en_venta" type="text" class="form-control"  placeholder="Unidad En Venta"  title="Unidad En Venta"    maxlength="10" size="10" >
							<span id="spanstrMensajeunidad_en_venta" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_3">
						<td id="td_title-equivalencia_en_venta" class="titulocampo">
							<label class="form-label">Equivalencia En Venta.(*)</label>
						</td>
						<td id="td_control-equivalencia_en_venta" align="left" class="controlcampo">
							<input id="form-equivalencia_en_venta" name="form-equivalencia_en_venta" type="text" class="form-control"  placeholder="Equivalencia En Venta"  title="Equivalencia En Venta"    maxlength="18" size="12" >
							<span id="spanstrMensajeequivalencia_en_venta" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-cantidad_total" class="titulocampo">
							<label class="form-label">Cantidad Total.(*)</label>
						</td>
						<td id="td_control-cantidad_total" align="left" class="controlcampo">
							<input id="form-cantidad_total" name="form-cantidad_total" type="text" class="form-control"  placeholder="Cantidad Total"  title="Cantidad Total"    maxlength="18" size="12" >
							<span id="spanstrMensajecantidad_total" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-cantidad_minima" class="titulocampo">
							<label class="form-label">Cantidad Minima.(*)</label>
						</td>
						<td id="td_control-cantidad_minima" align="left" class="controlcampo">
							<input id="form-cantidad_minima" name="form-cantidad_minima" type="text" class="form-control"  placeholder="Cantidad Minima"  title="Cantidad Minima"    maxlength="18" size="12" >
							<span id="spanstrMensajecantidad_minima" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-id_categoria_producto" class="titulocampo">
							<label class="form-label">Categoria Producto.(*)</label>
						</td>
						<td id="td_control-id_categoria_producto" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_categoria_producto" name="form-id_categoria_producto" title="Categoria Producto" ></select></td>
									<td><a><img id="form-id_categoria_producto_img" name="form-id_categoria_producto_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_categoria_producto_img_busqueda" name="form-id_categoria_producto_img_busqueda" title="Buscar Categoria Producto" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_categoria_producto" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-id_sub_categoria_producto" class="titulocampo">
							<label class="form-label">Sub Categoria Producto.(*)</label>
						</td>
						<td id="td_control-id_sub_categoria_producto" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_sub_categoria_producto" name="form-id_sub_categoria_producto" title="Sub Categoria Producto" ></select></td>
									<td><a><img id="form-id_sub_categoria_producto_img" name="form-id_sub_categoria_producto_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_sub_categoria_producto_img_busqueda" name="form-id_sub_categoria_producto_img_busqueda" title="Buscar Sub Categoria Producto" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_sub_categoria_producto" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-acepta_lote" class="titulocampo">
							<label class="form-label">Acepta Lote.(*)</label>
						</td>
						<td id="td_control-acepta_lote" align="left" class="controlcampo">
							<input id="form-acepta_lote" name="form-acepta_lote" type="text" class="form-control"  placeholder="Acepta Lote"  title="Acepta Lote"    size="2"  maxlength="2"/>
							<span id="spanstrMensajeacepta_lote" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-valor_inventario" class="titulocampo">
							<label class="form-label">Valor Inventario.(*)</label>
						</td>
						<td id="td_control-valor_inventario" align="left" class="controlcampo">
							<input id="form-valor_inventario" name="form-valor_inventario" type="text" class="form-control"  placeholder="Valor Inventario"  title="Valor Inventario"    maxlength="18" size="12" >
							<span id="spanstrMensajevalor_inventario" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_4">
						<td id="td_title-imagen" class="titulocampo">
							<label class="form-label">Imagen.(*)</label>
						</td>
						<td id="td_control-imagen" align="left" class="controlcampo">
							<textarea id="form-imagen" name="form-imagen" class="form-control"  placeholder="Imagen"  title="Imagen"   style="font-size: 13px;"  rows ="0" cols= "25"></textarea>
							<span id="spanstrMensajeimagen" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-incremento1" class="titulocampo">
							<label class="form-label">Incremento1.(*)</label>
						</td>
						<td id="td_control-incremento1" align="left" class="controlcampo">
							<input id="form-incremento1" name="form-incremento1" type="text" class="form-control"  placeholder="Incremento1"  title="Incremento1"    maxlength="18" size="12" >
							<span id="spanstrMensajeincremento1" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-incremento2" class="titulocampo">
							<label class="form-label">Incremento2.(*)</label>
						</td>
						<td id="td_control-incremento2" align="left" class="controlcampo">
							<input id="form-incremento2" name="form-incremento2" type="text" class="form-control"  placeholder="Incremento2"  title="Incremento2"    maxlength="18" size="12" >
							<span id="spanstrMensajeincremento2" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-incremento3" class="titulocampo">
							<label class="form-label">Incremento3.(*)</label>
						</td>
						<td id="td_control-incremento3" align="left" class="controlcampo">
							<input id="form-incremento3" name="form-incremento3" type="text" class="form-control"  placeholder="Incremento3"  title="Incremento3"    maxlength="18" size="12" >
							<span id="spanstrMensajeincremento3" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-incremento4" class="titulocampo">
							<label class="form-label">Incremento4.(*)</label>
						</td>
						<td id="td_control-incremento4" align="left" class="controlcampo">
							<input id="form-incremento4" name="form-incremento4" type="text" class="form-control"  placeholder="Incremento4"  title="Incremento4"    maxlength="18" size="12" >
							<span id="spanstrMensajeincremento4" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-codigo_fabricante" class="titulocampo">
							<label class="form-label">Codigo Fabricante.(*)</label>
						</td>
						<td id="td_control-codigo_fabricante" align="left" class="controlcampo">
							<input id="form-codigo_fabricante" name="form-codigo_fabricante" type="text" class="form-control"  placeholder="Codigo Fabricante"  title="Codigo Fabricante"    size="20"  maxlength="24"/>
							<span id="spanstrMensajecodigo_fabricante" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-producto_fisico" class="titulocampo">
							<label class="form-label">Producto Fisico.(*)</label>
						</td>
						<td id="td_control-producto_fisico" align="left" class="controlcampo">
							<input id="form-producto_fisico" name="form-producto_fisico" type="text" class="form-control"  placeholder="Producto Fisico"  title="Producto Fisico"    maxlength="10" size="10" >
							<span id="spanstrMensajeproducto_fisico" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_5">
						<td id="td_title-situacion_producto" class="titulocampo">
							<label class="form-label">Situacion Producto.(*)</label>
						</td>
						<td id="td_control-situacion_producto" align="left" class="controlcampo">
							<input id="form-situacion_producto" name="form-situacion_producto" type="text" class="form-control"  placeholder="Situacion Producto"  title="Situacion Producto"    maxlength="10" size="10" >
							<span id="spanstrMensajesituacion_producto" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-id_tipo_producto" class="titulocampo">
							<label class="form-label"> Tipo Producto.(*)</label>
						</td>
						<td id="td_control-id_tipo_producto" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_tipo_producto" name="form-id_tipo_producto" title=" Tipo Producto" ></select></td>
									<td><img id="form-id_tipo_producto_img_busqueda" name="form-id_tipo_producto_img_busqueda" title="Buscar Tipo Producto" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_tipo_producto" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-tipo_producto_codigo" class="titulocampo">
							<label class="form-label">Tipo Producto.(*)</label>
						</td>
						<td id="td_control-tipo_producto_codigo" align="left" class="controlcampo">
							<input id="form-tipo_producto_codigo" name="form-tipo_producto_codigo" type="text" class="form-control"  placeholder="Tipo Producto"  title="Tipo Producto"    size="1"  maxlength="1"/>
							<span id="spanstrMensajetipo_producto_codigo" class="mensajeerror"></span>
						</td>
					
					
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
					
					
						<td id="td_title-mostrar_componente" class="titulocampo">
							<label class="form-label">Mostrar Componente.(*)</label>
						</td>
						<td id="td_control-mostrar_componente" align="left" class="controlcampo">
							<input id="form-mostrar_componente" name="form-mostrar_componente" type="text" class="form-control"  placeholder="Mostrar Componente"  title="Mostrar Componente"    size="1"  maxlength="1"/>
							<span id="spanstrMensajemostrar_componente" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-factura_sin_stock" class="titulocampo">
							<label class="form-label">Factura Sin Stock.(*)</label>
						</td>
						<td id="td_control-factura_sin_stock" align="left" class="controlcampo">
							<input id="form-factura_sin_stock" name="form-factura_sin_stock" type="text" class="form-control"  placeholder="Factura Sin Stock"  title="Factura Sin Stock"    size="2"  maxlength="2"/>
							<span id="spanstrMensajefactura_sin_stock" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-avisa_expiracion" class="titulocampo">
							<label class="form-label">Avisa Expiracion.(*)</label>
						</td>
						<td id="td_control-avisa_expiracion" align="left" class="controlcampo">
							<input id="form-avisa_expiracion" name="form-avisa_expiracion" type="text" class="form-control"  placeholder="Avisa Expiracion"  title="Avisa Expiracion"    size="2"  maxlength="2"/>
							<span id="spanstrMensajeavisa_expiracion" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_6">
						<td id="td_title-factura_con_precio" class="titulocampo">
							<label class="form-label">Factura Con Precio.(*)</label>
						</td>
						<td id="td_control-factura_con_precio" align="left" class="controlcampo">
							<input id="form-factura_con_precio" name="form-factura_con_precio" type="text" class="form-control"  placeholder="Factura Con Precio"  title="Factura Con Precio"    maxlength="10" size="10" >
							<span id="spanstrMensajefactura_con_precio" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-producto_equivalente" class="titulocampo">
							<label class="form-label">Producto Equivalente.(*)</label>
						</td>
						<td id="td_control-producto_equivalente" align="left" class="controlcampo">
							<input id="form-producto_equivalente" name="form-producto_equivalente" type="text" class="form-control"  placeholder="Producto Equivalente"  title="Producto Equivalente"    size="2"  maxlength="2"/>
							<span id="spanstrMensajeproducto_equivalente" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-id_cuenta_compra" class="titulocampo">
							<label class="form-label"> Cuenta Compra</label>
						</td>
						<td id="td_control-id_cuenta_compra" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_cuenta_compra" name="form-id_cuenta_compra" title=" Cuenta Compra" ></select></td>
									<td><a><img id="form-id_cuenta_compra_img" name="form-id_cuenta_compra_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_cuenta_compra_img_busqueda" name="form-id_cuenta_compra_img_busqueda" title="Buscar Cuentas" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_cuenta_compra" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-id_cuenta_venta" class="titulocampo">
							<label class="form-label"> Cuenta Venta</label>
						</td>
						<td id="td_control-id_cuenta_venta" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_cuenta_venta" name="form-id_cuenta_venta" title=" Cuenta Venta" ></select></td>
									<td><a><img id="form-id_cuenta_venta_img" name="form-id_cuenta_venta_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_cuenta_venta_img_busqueda" name="form-id_cuenta_venta_img_busqueda" title="Buscar Cuentas" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_cuenta_venta" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-id_cuenta_inventario" class="titulocampo">
							<label class="form-label"> Cuenta Inventario</label>
						</td>
						<td id="td_control-id_cuenta_inventario" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_cuenta_inventario" name="form-id_cuenta_inventario" title=" Cuenta Inventario" ></select></td>
									<td><a><img id="form-id_cuenta_inventario_img" name="form-id_cuenta_inventario_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_cuenta_inventario_img_busqueda" name="form-id_cuenta_inventario_img_busqueda" title="Buscar Cuentas" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_cuenta_inventario" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-cuenta_compra_codigo" class="titulocampo">
							<label class="form-label">Cuenta Compra.(*)</label>
						</td>
						<td id="td_control-cuenta_compra_codigo" align="left" class="controlcampo">
							<input id="form-cuenta_compra_codigo" name="form-cuenta_compra_codigo" type="text" class="form-control"  placeholder="Cuenta Compra"  title="Cuenta Compra"    size="14"  maxlength="14"/>
							<span id="spanstrMensajecuenta_compra_codigo" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-cuenta_venta_codigo" class="titulocampo">
							<label class="form-label">Cuenta Venta.(*)</label>
						</td>
						<td id="td_control-cuenta_venta_codigo" align="left" class="controlcampo">
							<input id="form-cuenta_venta_codigo" name="form-cuenta_venta_codigo" type="text" class="form-control"  placeholder="Cuenta Venta"  title="Cuenta Venta"    size="14"  maxlength="14"/>
							<span id="spanstrMensajecuenta_venta_codigo" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_7">
						<td id="td_title-cuenta_inventario_codigo" class="titulocampo">
							<label class="form-label">Cuenta Inventario.(*)</label>
						</td>
						<td id="td_control-cuenta_inventario_codigo" align="left" class="controlcampo">
							<input id="form-cuenta_inventario_codigo" name="form-cuenta_inventario_codigo" type="text" class="form-control"  placeholder="Cuenta Inventario"  title="Cuenta Inventario"    size="14"  maxlength="14"/>
							<span id="spanstrMensajecuenta_inventario_codigo" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-id_otro_suplidor" class="titulocampo">
							<label class="form-label">Otro Suplidor.(*)</label>
						</td>
						<td id="td_control-id_otro_suplidor" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_otro_suplidor" name="form-id_otro_suplidor" title="Otro Suplidor" ></select></td>
									<td><a><img id="form-id_otro_suplidor_img" name="form-id_otro_suplidor_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_otro_suplidor_img_busqueda" name="form-id_otro_suplidor_img_busqueda" title="Buscar Otro Suplidor" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_otro_suplidor" class="mensajeerror"></span>
						</td>
					
					
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
					
					
						<td id="td_title-id_impuesto_ventas" class="titulocampo">
							<label class="form-label"> Impuesto Ventas</label>
						</td>
						<td id="td_control-id_impuesto_ventas" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_impuesto_ventas" name="form-id_impuesto_ventas" title=" Impuesto Ventas" ></select></td>
									<td><a><img id="form-id_impuesto_ventas_img" name="form-id_impuesto_ventas_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_impuesto_ventas_img_busqueda" name="form-id_impuesto_ventas_img_busqueda" title="Buscar Impuesto" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_impuesto_ventas" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-id_impuesto_compras" class="titulocampo">
							<label class="form-label"> Impuesto Compras</label>
						</td>
						<td id="td_control-id_impuesto_compras" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_impuesto_compras" name="form-id_impuesto_compras" title=" Impuesto Compras" ></select></td>
									<td><a><img id="form-id_impuesto_compras_img" name="form-id_impuesto_compras_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_impuesto_compras_img_busqueda" name="form-id_impuesto_compras_img_busqueda" title="Buscar Impuesto" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_impuesto_compras" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-impuesto1_en_ventas" class="titulocampo">
							<label class="form-label">Impuesto1 En Ventas.(*)</label>
						</td>
						<td id="td_control-impuesto1_en_ventas" align="left" class="controlcampo">
							<input id="form-impuesto1_en_ventas" name="form-impuesto1_en_ventas" type="text" class="form-control"  placeholder="Impuesto1 En Ventas"  title="Impuesto1 En Ventas"    size="2"  maxlength="2"/>
							<span id="spanstrMensajeimpuesto1_en_ventas" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-impuesto1_en_compras" class="titulocampo">
							<label class="form-label">Impuesto1 En Compras.(*)</label>
						</td>
						<td id="td_control-impuesto1_en_compras" align="left" class="controlcampo">
							<input id="form-impuesto1_en_compras" name="form-impuesto1_en_compras" type="text" class="form-control"  placeholder="Impuesto1 En Compras"  title="Impuesto1 En Compras"    size="2"  maxlength="2"/>
							<span id="spanstrMensajeimpuesto1_en_compras" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_8">
						<td id="td_title-ultima_venta" class="titulocampo">
							<label class="form-label">Ultima Venta.(*)</label>
						</td>
						<td id="td_control-ultima_venta" align="left" class="controlcampo">
							<input id="form-ultima_venta" name="form-ultima_venta" type="text" class="form-control"  placeholder="Ultima Venta"  title="Ultima Venta"    size="10" >
							<span id="spanstrMensajeultima_venta" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-id_otro_impuesto" class="titulocampo">
							<label class="form-label">Otro Impuesto.(*)</label>
						</td>
						<td id="td_control-id_otro_impuesto" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_otro_impuesto" name="form-id_otro_impuesto" title="Otro Impuesto" ></select></td>
									<td><a><img id="form-id_otro_impuesto_img" name="form-id_otro_impuesto_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_otro_impuesto_img_busqueda" name="form-id_otro_impuesto_img_busqueda" title="Buscar Otro Impuesto" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_otro_impuesto" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-id_otro_impuesto_ventas" class="titulocampo">
							<label class="form-label"> Otro Impuesto Ventas</label>
						</td>
						<td id="td_control-id_otro_impuesto_ventas" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_otro_impuesto_ventas" name="form-id_otro_impuesto_ventas" title=" Otro Impuesto Ventas" ></select></td>
									<td><a><img id="form-id_otro_impuesto_ventas_img" name="form-id_otro_impuesto_ventas_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_otro_impuesto_ventas_img_busqueda" name="form-id_otro_impuesto_ventas_img_busqueda" title="Buscar Otro Impuesto" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_otro_impuesto_ventas" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-id_otro_impuesto_compras" class="titulocampo">
							<label class="form-label"> Otro Impuesto Compras</label>
						</td>
						<td id="td_control-id_otro_impuesto_compras" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_otro_impuesto_compras" name="form-id_otro_impuesto_compras" title=" Otro Impuesto Compras" ></select></td>
									<td><a><img id="form-id_otro_impuesto_compras_img" name="form-id_otro_impuesto_compras_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_otro_impuesto_compras_img_busqueda" name="form-id_otro_impuesto_compras_img_busqueda" title="Buscar Otro Impuesto" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_otro_impuesto_compras" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-otro_impuesto_ventas_codigo" class="titulocampo">
							<label class="form-label">Otro Impuesto Ventas.(*)</label>
						</td>
						<td id="td_control-otro_impuesto_ventas_codigo" align="left" class="controlcampo">
							<input id="form-otro_impuesto_ventas_codigo" name="form-otro_impuesto_ventas_codigo" type="text" class="form-control"  placeholder="Otro Impuesto Ventas"  title="Otro Impuesto Ventas"    size="2"  maxlength="2"/>
							<span id="spanstrMensajeotro_impuesto_ventas_codigo" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-otro_impuesto_compras_codigo" class="titulocampo">
							<label class="form-label">Otro Impuesto Compras.(*)</label>
						</td>
						<td id="td_control-otro_impuesto_compras_codigo" align="left" class="controlcampo">
							<input id="form-otro_impuesto_compras_codigo" name="form-otro_impuesto_compras_codigo" type="text" class="form-control"  placeholder="Otro Impuesto Compras"  title="Otro Impuesto Compras"    size="2"  maxlength="2"/>
							<span id="spanstrMensajeotro_impuesto_compras_codigo" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-precio_de_compra_0" class="titulocampo">
							<label class="form-label">Precio De Compra 0.(*)</label>
						</td>
						<td id="td_control-precio_de_compra_0" align="left" class="controlcampo">
							<input id="form-precio_de_compra_0" name="form-precio_de_compra_0" type="text" class="form-control"  placeholder="Precio De Compra 0"  title="Precio De Compra 0"    maxlength="18" size="12" >
							<span id="spanstrMensajeprecio_de_compra_0" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_9">
						<td id="td_title-precio_actualizado" class="titulocampo">
							<label class="form-label">Precio Actualizado.(*)</label>
						</td>
						<td id="td_control-precio_actualizado" align="left" class="controlcampo">
							<input id="form-precio_actualizado" name="form-precio_actualizado" type="text" class="form-control"  placeholder="Precio Actualizado"  title="Precio Actualizado"    size="10" >
							<span id="spanstrMensajeprecio_actualizado" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-requiere_nro_serie" class="titulocampo">
							<label class="form-label">Requiere Nro Serie.(*)</label>
						</td>
						<td id="td_control-requiere_nro_serie" align="left" class="controlcampo">
							<input id="form-requiere_nro_serie" name="form-requiere_nro_serie" type="text" class="form-control"  placeholder="Requiere Nro Serie"  title="Requiere Nro Serie"    size="1"  maxlength="1"/>
							<span id="spanstrMensajerequiere_nro_serie" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-costo_dolar" class="titulocampo">
							<label class="form-label">Costo Dolar.(*)</label>
						</td>
						<td id="td_control-costo_dolar" align="left" class="controlcampo">
							<input id="form-costo_dolar" name="form-costo_dolar" type="text" class="form-control"  placeholder="Costo Dolar"  title="Costo Dolar"    maxlength="18" size="12" >
							<span id="spanstrMensajecosto_dolar" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-comentario" class="titulocampo">
							<label class="form-label">Comentario.(*)</label>
						</td>
						<td id="td_control-comentario" align="left" class="controlcampo">
							<textarea id="form-comentario" name="form-comentario" class="form-control"  placeholder="Comentario"  title="Comentario"   style="font-size: 13px;"  rows ="0" cols= "25"></textarea>
							<span id="spanstrMensajecomentario" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-comenta_factura" class="titulocampo">
							<label class="form-label">Comenta Factura.(*)</label>
						</td>
						<td id="td_control-comenta_factura" align="left" class="controlcampo">
							<input id="form-comenta_factura" name="form-comenta_factura" type="text" class="form-control"  placeholder="Comenta Factura"  title="Comenta Factura"    size="2"  maxlength="2"/>
							<span id="spanstrMensajecomenta_factura" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-id_retencion" class="titulocampo">
							<label class="form-label">Retencion.(*)</label>
						</td>
						<td id="td_control-id_retencion" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_retencion" name="form-id_retencion" title="Retencion" ></select></td>
									<td><a><img id="form-id_retencion_img" name="form-id_retencion_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_retencion_img_busqueda" name="form-id_retencion_img_busqueda" title="Buscar Retencion" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_retencion" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-id_retencion_ventas" class="titulocampo">
							<label class="form-label"> Retencion Ventas</label>
						</td>
						<td id="td_control-id_retencion_ventas" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_retencion_ventas" name="form-id_retencion_ventas" title=" Retencion Ventas" ></select></td>
									<td><a><img id="form-id_retencion_ventas_img" name="form-id_retencion_ventas_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_retencion_ventas_img_busqueda" name="form-id_retencion_ventas_img_busqueda" title="Buscar Retencion" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_retencion_ventas" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_10">
						<td id="td_title-id_retencion_compras" class="titulocampo">
							<label class="form-label"> Retencion Compras</label>
						</td>
						<td id="td_control-id_retencion_compras" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_retencion_compras" name="form-id_retencion_compras" title=" Retencion Compras" ></select></td>
									<td><a><img id="form-id_retencion_compras_img" name="form-id_retencion_compras_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_retencion_compras_img_busqueda" name="form-id_retencion_compras_img_busqueda" title="Buscar Retencion" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_retencion_compras" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-retencion_ventas_codigo" class="titulocampo">
							<label class="form-label">Retencion Ventas.(*)</label>
						</td>
						<td id="td_control-retencion_ventas_codigo" align="left" class="controlcampo">
							<input id="form-retencion_ventas_codigo" name="form-retencion_ventas_codigo" type="text" class="form-control"  placeholder="Retencion Ventas"  title="Retencion Ventas"    size="2"  maxlength="2"/>
							<span id="spanstrMensajeretencion_ventas_codigo" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-retencion_compras_codigo" class="titulocampo">
							<label class="form-label">Retencion Compras.(*)</label>
						</td>
						<td id="td_control-retencion_compras_codigo" align="left" class="controlcampo">
							<input id="form-retencion_compras_codigo" name="form-retencion_compras_codigo" type="text" class="form-control"  placeholder="Retencion Compras"  title="Retencion Compras"    size="2"  maxlength="2"/>
							<span id="spanstrMensajeretencion_compras_codigo" class="mensajeerror"></span>
						</td>
					
					
						<td id="td_title-notas" class="titulocampo">
							<label class="form-label">Notas.(*)</label>
						</td>
						<td id="td_control-notas" align="left" class="controlcampo">
							<textarea id="form-notas" name="form-notas" class="form-control"  placeholder="Notas"  title="Notas"   style="font-size: 13px;"  rows ="0" cols= "25"></textarea>
							<span id="spanstrMensajenotas" class="mensajeerror"></span>
						</td>
					<td></td><td></td><td></td><td></td><td></td><td></td></tr>
				</table> <!-- tblElementoslista_producto -->

				<!-- SECCION/OCULTOS -->
				<table id="tblCamposOcultoslista_producto" class="elementos" style="display: table-row;">
					<caption class="busquedacabecera">
						<span>Campos Ocultos</span>
					</caption>
				</table> <!-- tblCamposOcultoslista_producto -->

			</td></tr> <!-- trlista_productoElementos -->
			</table> <!-- tbllista_productoElementos -->
			</form> <!-- frmMantenimientolista_producto -->


			

				<form id="frmAccionesMantenimientolista_producto" name="frmAccionesMantenimientolista_producto">

			<?php if(lista_producto_web::$STR_ES_BUSQUEDA=='false' ) {?>
			<table id="tbllista_productoAcciones" class="elementos" style="text-align: center">
		<tr id="trlista_productoAcciones" class="elementos" style="display:table-row">
			<td align="center">
				<a id="Acciones" ></a>

				<?php if(lista_producto_web::$STR_ES_RELACIONES=='false' ) {?>
				<div align="right">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
				<?php } ?>

					<!-- SECCION/BOTONES -->
					<table id="tblAccionesMantenimientolista_producto" class="busqueda" style="width: 50%;text-align: left">

						<?php if(lista_producto_web::$STR_ES_RELACIONES=='false' ) {?>
						<!--
						<caption class="busquedacabecera">
							<span>Acciones</span>
						</caption>
						-->
						<?php } ?>

						<tr id="trAccionesMantenimientolista_productoBasicos">
							<td id="tdbtnNuevolista_producto" style="visibility:visible">
								<div id="divNuevolista_producto" style="display:table-row">
									<input type="button" id="btnNuevolista_producto" name="btnNuevolista_producto" value="NUEVO" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnActualizarlista_producto" style="visibility:visible">
								<div id="divActualizarlista_producto" style="display:table-row">
									<input type="button" id="btnActualizarlista_producto" name="btnActualizarlista_producto" title="ACTUALIZAR Lista Productos ACTUAL" value="Actualizar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnEliminarlista_producto" style="visibility:visible">
								<div id="divEliminarlista_producto" style="display:table-row">
									<input type="button" id="btnEliminarlista_producto" name="btnEliminarlista_producto" title="ELIMINAR Lista Productos ACTUAL" value="Eliminar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnImprimirlista_producto" style="visibility:visible">
								<input type="button" id="btnImprimirlista_producto" name="btnImprimirlista_producto" title="IMPRIMIR PAGINA Lista Productos ACTUAL" value="Imp. Datos" class="btn btn-primary"/>
							</td>
							<td id="tdbtnCancelarlista_producto" style="visibility:visible">
								<input type="button" id="btnCancelarlista_producto" name="btnCancelarlista_producto" title="CANCELAR Lista Productos ACTUAL" value="Cancelar" class="btn btn-primary"/>
							</td>
						</tr>
						<tr id="trAccionesMantenimientolista_productoGuardar" style="display:none">
							<td id="tdbtnGuardarCambioslista_producto" colspan="4" align="center" style="visibility:visible">
								<div id="divGuardarCambioslista_producto" style="display:table-row">
									<input type="button" id="btnGuardarCambiosFormulariolista_producto" name="btnGuardarCambiosFormulariolista_producto" title="GUARDAR" value="GUADAR CAMBIOS" class="btn btn-primary"/>
								</div>
							</td>
						</tr>
					</table> <!-- tblAccionesMantenimientolista_producto -->
			</td>
		</tr> <!-- trlista_productoAcciones -->
		<?php if(lista_producto_web::$STR_ES_RELACIONADO=='false' ) {?>
		<tr id="trlista_productoParametrosAcciones" class="impresion"  style="display:table-row">
			<td align="center">
				<!-- SECCION/POST -->
				<table id="tbllista_productoParametrosAcciones" style="text-align: center;border: 0px solid black;padding: 0px; border-spacing: 0px">
					<caption class="busquedacabecera" style="padding: 0px;caption-side: top;">
						<span>Acciones Extra/Post</span>
					</caption>
					<tr id="trlista_productoFilaParametrosAcciones">
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
				</table> <!-- tbllista_productoParametrosAcciones -->
			</td>
		</tr> <!-- trlista_productoParametrosAcciones -->
		<?php }?>
		<tr id="trlista_productoMensajes" class="mensajes">
			<td align="center">
				<a id="Mensajes"></a>
			</td>
		</tr> <!-- trlista_productoMensajes -->
			</table> <!-- tbllista_productoAcciones -->
			<?php } ?>
			</form> <!-- frmMantenimientolista_producto -->
			</div> <!-- divMantenimientolista_productoAjaxWebPart -->
		</td>
	</tr> <!-- trlista_productoElementosFormulario/super -->
		<?php if(lista_producto_web::$STR_ES_RELACIONADO=='false' ) {?>

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
			
				import {lista_producto_webcontrol,lista_producto_webcontrol1} from './webroot/js/JavaScript/contabilidad/inventario/lista_producto/js/webcontrol/lista_producto_form_webcontrol.js?random=1';
				
				lista_producto_webcontrol1.setlista_producto_constante(window.lista_producto_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(lista_producto_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

