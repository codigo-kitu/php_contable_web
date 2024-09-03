<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\general\parametro_auxiliar\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Parametro Auxiliar Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/general/parametro_auxiliar/util/parametro_auxiliar_carga.php');
	use com\bydan\contabilidad\general\parametro_auxiliar\util\parametro_auxiliar_carga;
	
	//include_once('com/bydan/contabilidad/general/parametro_auxiliar/presentation/view/parametro_auxiliar_web.php');
	//use com\bydan\contabilidad\general\parametro_auxiliar\presentation\view\parametro_auxiliar_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	parametro_auxiliar_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	parametro_auxiliar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$parametro_auxiliar_web1= new parametro_auxiliar_web();	
	$parametro_auxiliar_web1->cargarDatosGenerales();
	
	//$moduloActual=$parametro_auxiliar_web1->moduloActual;
	//$usuarioActual=$parametro_auxiliar_web1->usuarioActual;
	//$sessionBase=$parametro_auxiliar_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$parametro_auxiliar_web1->parametroGeneralUsuarioActual;
	
	
		
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
		
		
			<script type="module" src="webroot/js/JavaScript/contabilidad/general/parametro_auxiliar/js/util/parametro_auxiliar_form_funcion.js?random=1"></script>
						
		
		
		<?php 
			
		
			parametro_auxiliar_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					parametro_auxiliar_web::$GET_POST=$_GET;
				} else {
					parametro_auxiliar_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			parametro_auxiliar_web::$STR_NOMBRE_PAGINA = 'parametro_auxiliar_form_view.php';
			parametro_auxiliar_web::$BIT_ES_PAGINA_PRINCIPAL = 'false';
			parametro_auxiliar_web::$BIT_ES_PAGINA_FORM = 'true';
				
			parametro_auxiliar_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {parametro_auxiliar_constante,parametro_auxiliar_constante1} from './webroot/js/JavaScript/contabilidad/general/parametro_auxiliar/js/util/parametro_auxiliar_constante.js?random=1';
			import {parametro_auxiliar_funcion,parametro_auxiliar_funcion1} from './webroot/js/JavaScript/contabilidad/general/parametro_auxiliar/js/util/parametro_auxiliar_funcion.js?random=1';
			
			let parametro_auxiliar_constante2 = new parametro_auxiliar_constante();
			
			parametro_auxiliar_constante2.STR_NOMBRE_PAGINA="<?php echo(parametro_auxiliar_web::$STR_NOMBRE_PAGINA); ?>";
			parametro_auxiliar_constante2.STR_TYPE_ON_LOADparametro_auxiliar="<?php echo(parametro_auxiliar_web::$STR_TYPE_ONLOAD); ?>";
			parametro_auxiliar_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(parametro_auxiliar_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			parametro_auxiliar_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(parametro_auxiliar_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			parametro_auxiliar_constante2.STR_ACTION="<?php echo(parametro_auxiliar_web::$STR_ACTION); ?>";
			parametro_auxiliar_constante2.STR_ES_POPUP="<?php echo(parametro_auxiliar_web::$STR_ES_POPUP); ?>";
			parametro_auxiliar_constante2.STR_ES_BUSQUEDA="<?php echo(parametro_auxiliar_web::$STR_ES_BUSQUEDA); ?>";
			parametro_auxiliar_constante2.STR_FUNCION_JS="<?php echo(parametro_auxiliar_web::$STR_FUNCION_JS); ?>";
			parametro_auxiliar_constante2.BIG_ID_ACTUAL="<?php echo(parametro_auxiliar_web::$BIG_ID_ACTUAL); ?>";
			parametro_auxiliar_constante2.BIG_ID_OPCION="<?php echo(parametro_auxiliar_web::$BIG_ID_OPCION); ?>";
			parametro_auxiliar_constante2.STR_OBJETO_JS="<?php echo(parametro_auxiliar_web::$STR_OBJETO_JS); ?>";
			parametro_auxiliar_constante2.STR_ES_RELACIONES="<?php echo(parametro_auxiliar_web::$STR_ES_RELACIONES); ?>";
			parametro_auxiliar_constante2.STR_ES_RELACIONADO="<?php echo(parametro_auxiliar_web::$STR_ES_RELACIONADO); ?>";
			parametro_auxiliar_constante2.STR_ES_SUB_PAGINA="<?php echo(parametro_auxiliar_web::$STR_ES_SUB_PAGINA); ?>";
			parametro_auxiliar_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(parametro_auxiliar_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			parametro_auxiliar_constante2.BIT_ES_PAGINA_FORM=<?php echo(parametro_auxiliar_web::$BIT_ES_PAGINA_FORM); ?>;
			parametro_auxiliar_constante2.STR_SUFIJO="<?php echo(parametro_auxiliar_web::$STR_SUF); ?>";//parametro_auxiliar
			parametro_auxiliar_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(parametro_auxiliar_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//parametro_auxiliar
			
			parametro_auxiliar_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(parametro_auxiliar_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			parametro_auxiliar_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($parametro_auxiliar_web1->moduloActual->getnombre()); ?>";
			parametro_auxiliar_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(parametro_auxiliar_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			parametro_auxiliar_constante2.BIT_ES_LOAD_NORMAL=true;
			/*parametro_auxiliar_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			parametro_auxiliar_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.parametro_auxiliar_constante2 = parametro_auxiliar_constante2;
			
		</script>
		
		<?php if(parametro_auxiliar_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.parametro_auxiliar_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.parametro_auxiliar_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="parametro_auxiliarActual" ></a>
	
	<div id="divResumenparametro_auxiliarActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(parametro_auxiliar_web::$STR_ES_RELACIONADO=='false') {?>
		
		<div id="header" >
		
			<div id="banner">
				<span id="spanTituloBanner" class="titulobanner"></span>
			</div> <!-- banner -->
					
			<div id="subheader" class="links">  
			
						
			</div> <!-- sub-header -->
			
			
		</div> <!-- header -->
		
		<?php } ?>
		
		<div id="main">
		

			<?php if(parametro_auxiliar_web::$STR_ES_RELACIONADO=='false') {?>
			
			
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(parametro_auxiliar_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(parametro_auxiliar_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divparametro_auxiliarPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblparametro_auxiliarPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmparametro_auxiliarAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnparametro_auxiliarAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="parametro_auxiliar_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnparametro_auxiliarAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmparametro_auxiliarAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblparametro_auxiliarPopupAjaxWebPart -->
		</div> <!-- divparametro_auxiliarPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->		
		
		
		
			
<tr id="trparametro_auxiliarElementosFormulario">
	<td>
		<div id="divMantenimientoparametro_auxiliarAjaxWebPart" title="PARAMETRO AUXILIAR" style="height: 90%;width: 90%;position: relative;top: 30px;left: 30px;">
			<form id="frmMantenimientoparametro_auxiliar" name="frmMantenimientoparametro_auxiliar">

			</br>

			<?php if(parametro_auxiliar_web::$STR_ES_RELACIONES=='false' ) {?>
			</br>
			<?php } ?>

			<!-- SECCION/TOOLBAR -->
			<table id="tblparametro_auxiliarToolBarFormularioExterior" style="width: 65%">
				<tr style="display:table-row">
					<td align="center">

						<table id="tblparametro_auxiliarToolBarFormulario" style="text-align: center"  style="display:table-row">
							<tr>
								<td id="tdparametro_auxiliarActualizarToolBar" style="visibility:visible">
									<img id="imgActualizarToolBarparametro_auxiliar" name="imgActualizarToolBarparametro_auxiliar" title="ACTUALIZAR Parametro Auxiliar ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/actualizar.gif" width="25" height="25"/>
								</td>
								<td id="tdparametro_auxiliarEliminarToolBar" style="visibility:visible">
									<img id="imgEliminarToolBarparametro_auxiliar" name="imgEliminarToolBarparametro_auxiliar" title="ELIMINAR Parametro Auxiliar ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/eliminar.gif" width="25" height="25"/>
								</td>
								<td id="tdparametro_auxiliarCancelarToolBar" style="visibility:visible">
									<img id="imgCancelarToolBarparametro_auxiliar" name="imgCancelarToolBarparametro_auxiliar" title="CANCELAR Parametro Auxiliar ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/cancelar.gif" width="25" height="25"/>
								</td>
								<td id="tdparametro_auxiliarRelacionesToolBar" style="display:table-row">
									<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/xexpand.png" width="25" height="25" onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('tblCamposOcultosparametro_auxiliar',this,'../')"/>
								</td>
							</tr>
						</table> <!-- tblparametro_auxiliarToolBarFormulario -->

					</td>
				</tr>
			</table> <!-- tblparametro_auxiliarToolBarFormularioExterior -->

			<table id="tblparametro_auxiliarElementos">
			<tr id="trparametro_auxiliarElementos" class="elementos" style="display:table-row">
			<td align="center">

			<a id="Campos"></a>

				<?php if(parametro_auxiliar_web::$STR_ES_RELACIONES=='false' ) {?>
				<div id="divFlechaArribaElementos" align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
					<span></span>
				</div>
				<?php } ?>


				<div id="tabs_elementos" class="tabs" style="width: 100%">
					<ul>
						<li class="titulotab"><a href="#estimados">ESTIMADOS</a></li>
						<li class="titulotab"><a href="#inventario">INVENTARIO</a></li>
						<li class="titulotab"><a href="#contabilidad">CONTABILIDAD</a></li>
						<li class="titulotab"><a href="#cuentas_por_cobrar">CUENTAS POR COBRAR</a></li>
						<li class="titulotab"><a href="#clientes_proveedores">CLIENTES PROVEEDORES</a></li>
					</ul>


				<!-- SECCION/FORMULARIO -->
				<table id="tblElementosparametro_auxiliar" class="elementos" style="width: 400px; padding: 0px; border-spacing: 0px; border-collapse: collapse; text-align: left;">
					
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
					<tr id="trparametro_auxiliarestimadosElementos">
						<td id="tdparametro_auxiliarestimadosElementos" >
			<div id="estimados">
				<table class="elementos" style="width:300px;text-align:left; padding: 0px; border-spacing: 0px; border-collapse: collapse;">
					<caption class="busquedacabecera"><span>ESTIMADOS</span></caption>
					<tr id="tr_fila_1">
						<td id="td_title-id" class="titulocampo">
							<label class="form-label">Cod. Único</label>
						</td>
						<td id="td_control-id" align="left">
							<input id="form-id" name="form-id" type="text" class="form-control" readonly size="10">
						</td>
					</tr>
					<tr id="tr_fila_2">
						<td id="td_title-nombre_asignado" class="titulocampo">
							<label class="form-label">Nombre Asignado.(*)</label>
						</td>
						<td id="td_control-nombre_asignado" align="left" class="controlcampo">
							<input id="form-nombre_asignado" name="form-nombre_asignado" type="text" class="form-control"  placeholder="Nombre Asignado"  title="Nombre Asignado"    size="20"  maxlength="30"/>
							<span id="spanstrMensajenombre_asignado" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_3">
						<td id="td_title-siguiente_numero_correlativo" class="titulocampo">
							<label class="form-label">Siguiente Numero Correlativo.(*)</label>
						</td>
						<td id="td_control-siguiente_numero_correlativo" align="left" class="controlcampo">
							<input id="form-siguiente_numero_correlativo" name="form-siguiente_numero_correlativo" type="text" class="form-control"  placeholder="Siguiente Numero Correlativo"  title="Siguiente Numero Correlativo"    maxlength="10" size="10" >
							<span id="spanstrMensajesiguiente_numero_correlativo" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_4">
						<td id="td_title-incremento" class="titulocampo">
							<label class="form-label">Incremento.(*)</label>
						</td>
						<td id="td_control-incremento" align="left" class="controlcampo">
							<input id="form-incremento" name="form-incremento" type="text" class="form-control"  placeholder="Incremento"  title="Incremento"    maxlength="10" size="10" >
							<span id="spanstrMensajeincremento" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_5">
						<td id="td_title-mostrar_solo_costo_producto" class="titulocampo">
							<label class="form-label">Mostrar Solo Costo Producto</label>
						</td>
						<td id="td_control-mostrar_solo_costo_producto" align="left" class="controlcampo">
							<input id="form-mostrar_solo_costo_producto" name="form-mostrar_solo_costo_producto" type="checkbox" >
							<span id="spanstrMensajemostrar_solo_costo_producto" class="mensajeerror"></span>
						</td>
					</tr>
				</table>
			</div>
				</td></tr>
					<tr id="trparametro_auxiliarinventarioElementos">
						<td id="tdparametro_auxiliarinventarioElementos" >
			<div id="inventario">
				<table class="elementos" style="width:300px;text-align:left; padding: 0px; border-spacing: 0px; border-collapse: collapse;">
					<caption class="busquedacabecera"><span>INVENTARIO</span></caption>
					
						<td id="td_title-con_codigo_secuencial_producto" class="titulocampo">
							<label class="form-label">Con Codigo Secuencial Producto</label>
						</td>
						<td id="td_control-con_codigo_secuencial_producto" align="left" class="controlcampo">
							<input id="form-con_codigo_secuencial_producto" name="form-con_codigo_secuencial_producto" type="checkbox" >
							<span id="spanstrMensajecon_codigo_secuencial_producto" class="mensajeerror"></span>
						</td>
					
					<tr id="tr_fila_1">
						<td id="td_title-contador_producto" class="titulocampo">
							<label class="form-label">Contador Producto.(*)</label>
						</td>
						<td id="td_control-contador_producto" align="left" class="controlcampo">
							<input id="form-contador_producto" name="form-contador_producto" type="text" class="form-control"  placeholder="Contador Producto"  title="Contador Producto"    maxlength="10" size="10" >
							<span id="spanstrMensajecontador_producto" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_2">
						<td id="td_title-id_tipo_costeo_kardex" class="titulocampo">
							<label class="form-label"> Tipo Costeo Kardex.(*)</label>
						</td>
						<td id="td_control-id_tipo_costeo_kardex" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_tipo_costeo_kardex" name="form-id_tipo_costeo_kardex" title=" Tipo Costeo Kardex" ></select></td>
									<td><img id="form-id_tipo_costeo_kardex_img_busqueda" name="form-id_tipo_costeo_kardex_img_busqueda" title="Buscar Tipo Costeo Kardex" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_tipo_costeo_kardex" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_3">
						<td id="td_title-con_producto_inactivo" class="titulocampo">
							<label class="form-label">Con Producto Inactivo</label>
						</td>
						<td id="td_control-con_producto_inactivo" align="left" class="controlcampo">
							<input id="form-con_producto_inactivo" name="form-con_producto_inactivo" type="checkbox" >
							<span id="spanstrMensajecon_producto_inactivo" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_4">
						<td id="td_title-con_busqueda_incremental" class="titulocampo">
							<label class="form-label">Con Busqueda Incremental</label>
						</td>
						<td id="td_control-con_busqueda_incremental" align="left" class="controlcampo">
							<input id="form-con_busqueda_incremental" name="form-con_busqueda_incremental" type="checkbox" >
							<span id="spanstrMensajecon_busqueda_incremental" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_5">
						<td id="td_title-permitir_revisar_asiento" class="titulocampo">
							<label class="form-label">Permitir Revisar Asiento</label>
						</td>
						<td id="td_control-permitir_revisar_asiento" align="left" class="controlcampo">
							<input id="form-permitir_revisar_asiento" name="form-permitir_revisar_asiento" type="checkbox" >
							<span id="spanstrMensajepermitir_revisar_asiento" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_6">
						<td id="td_title-numero_decimales_unidades" class="titulocampo">
							<label class="form-label">Numero Decimales Unidades.(*)</label>
						</td>
						<td id="td_control-numero_decimales_unidades" align="left" class="controlcampo">
							<input id="form-numero_decimales_unidades" name="form-numero_decimales_unidades" type="text" class="form-control"  placeholder="Numero Decimales Unidades"  title="Numero Decimales Unidades"    maxlength="10" size="10" >
							<span id="spanstrMensajenumero_decimales_unidades" class="mensajeerror"></span>
						</td>
					</tr>
				</table>
			</div>
				</td></tr>
					<tr id="trparametro_auxiliarcontabilidadElementos">
						<td id="tdparametro_auxiliarcontabilidadElementos" >
			<div id="contabilidad">
				<table class="elementos" style="width:300px;text-align:left; padding: 0px; border-spacing: 0px; border-collapse: collapse;">
					<caption class="busquedacabecera"><span>CONTABILIDAD</span></caption>
					
						<td id="td_title-con_eliminacion_fisica_asiento" class="titulocampo">
							<label class="form-label">Con Eliminacion Fisica Asiento</label>
						</td>
						<td id="td_control-con_eliminacion_fisica_asiento" align="left" class="controlcampo">
							<input id="form-con_eliminacion_fisica_asiento" name="form-con_eliminacion_fisica_asiento" type="checkbox" >
							<span id="spanstrMensajecon_eliminacion_fisica_asiento" class="mensajeerror"></span>
						</td>
					
					<tr id="tr_fila_1">
						<td id="td_title-siguiente_numero_correlativo_asiento" class="titulocampo">
							<label class="form-label">Siguiente Numero Correlativo Asiento.(*)</label>
						</td>
						<td id="td_control-siguiente_numero_correlativo_asiento" align="left" class="controlcampo">
							<input id="form-siguiente_numero_correlativo_asiento" name="form-siguiente_numero_correlativo_asiento" type="text" class="form-control"  placeholder="Siguiente Numero Correlativo Asiento"  title="Siguiente Numero Correlativo Asiento"    maxlength="10" size="10" >
							<span id="spanstrMensajesiguiente_numero_correlativo_asiento" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_2">
						<td id="td_title-con_asiento_simple_factura" class="titulocampo">
							<label class="form-label">Con Asiento Simple Factura</label>
						</td>
						<td id="td_control-con_asiento_simple_factura" align="left" class="controlcampo">
							<input id="form-con_asiento_simple_factura" name="form-con_asiento_simple_factura" type="checkbox" >
							<span id="spanstrMensajecon_asiento_simple_factura" class="mensajeerror"></span>
						</td>
					</tr>
				</table>
			</div>
				</td></tr>
					<tr id="trparametro_auxiliarcuentas_por_cobrarElementos">
						<td id="tdparametro_auxiliarcuentas_por_cobrarElementos" >
			<div id="cuentas_por_cobrar">
				<table class="elementos" style="width:300px;text-align:left; padding: 0px; border-spacing: 0px; border-collapse: collapse;">
					<caption class="busquedacabecera"><span>CUENTAS POR COBRAR</span></caption>
					
						<td id="td_title-mostrar_documento_anulado" class="titulocampo">
							<label class="form-label">Mostrar Documento Anulado</label>
						</td>
						<td id="td_control-mostrar_documento_anulado" align="left" class="controlcampo">
							<input id="form-mostrar_documento_anulado" name="form-mostrar_documento_anulado" type="checkbox" >
							<span id="spanstrMensajemostrar_documento_anulado" class="mensajeerror"></span>
						</td>
					
					<tr id="tr_fila_1">
						<td id="td_title-siguiente_numero_correlativo_cc" class="titulocampo">
							<label class="form-label">Siguiente Numero Correlativo Cc.(*)</label>
						</td>
						<td id="td_control-siguiente_numero_correlativo_cc" align="left" class="controlcampo">
							<input id="form-siguiente_numero_correlativo_cc" name="form-siguiente_numero_correlativo_cc" type="text" class="form-control"  placeholder="Siguiente Numero Correlativo Cc"  title="Siguiente Numero Correlativo Cc"    maxlength="10" size="10" >
							<span id="spanstrMensajesiguiente_numero_correlativo_cc" class="mensajeerror"></span>
						</td>
					</tr>
				</table>
			</div>
				</td></tr>
					<tr id="trparametro_auxiliarclientes_proveedoresElementos">
						<td id="tdparametro_auxiliarclientes_proveedoresElementos" >
			<div id="clientes_proveedores">
				<table class="elementos" style="width:300px;text-align:left; padding: 0px; border-spacing: 0px; border-collapse: collapse;">
					<caption class="busquedacabecera"><span>CLIENTES PROVEEDORES</span></caption>
					
						<td id="td_title-con_codigo_secuencial_cliente" class="titulocampo">
							<label class="form-label">Con Codigo Secuencial Cliente</label>
						</td>
						<td id="td_control-con_codigo_secuencial_cliente" align="left" class="controlcampo">
							<input id="form-con_codigo_secuencial_cliente" name="form-con_codigo_secuencial_cliente" type="checkbox" >
							<span id="spanstrMensajecon_codigo_secuencial_cliente" class="mensajeerror"></span>
						</td>
					
					<tr id="tr_fila_1">
						<td id="td_title-contador_cliente" class="titulocampo">
							<label class="form-label">Contador Cliente.(*)</label>
						</td>
						<td id="td_control-contador_cliente" align="left" class="controlcampo">
							<input id="form-contador_cliente" name="form-contador_cliente" type="text" class="form-control"  placeholder="Contador Cliente"  title="Contador Cliente"    maxlength="10" size="10" >
							<span id="spanstrMensajecontador_cliente" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_2">
						<td id="td_title-con_cliente_inactivo" class="titulocampo">
							<label class="form-label">Con Cliente Inactivo</label>
						</td>
						<td id="td_control-con_cliente_inactivo" align="left" class="controlcampo">
							<input id="form-con_cliente_inactivo" name="form-con_cliente_inactivo" type="checkbox" >
							<span id="spanstrMensajecon_cliente_inactivo" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_3">
						<td id="td_title-con_codigo_secuencial_proveedor" class="titulocampo">
							<label class="form-label">Con Codigo Secuencial Proveedor</label>
						</td>
						<td id="td_control-con_codigo_secuencial_proveedor" align="left" class="controlcampo">
							<input id="form-con_codigo_secuencial_proveedor" name="form-con_codigo_secuencial_proveedor" type="checkbox" >
							<span id="spanstrMensajecon_codigo_secuencial_proveedor" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_4">
						<td id="td_title-contador_proveedor" class="titulocampo">
							<label class="form-label">Contador Proveedor.(*)</label>
						</td>
						<td id="td_control-contador_proveedor" align="left" class="controlcampo">
							<input id="form-contador_proveedor" name="form-contador_proveedor" type="text" class="form-control"  placeholder="Contador Proveedor"  title="Contador Proveedor"    maxlength="10" size="10" >
							<span id="spanstrMensajecontador_proveedor" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_5">
						<td id="td_title-con_proveedor_inactivo" class="titulocampo">
							<label class="form-label">Con Proveedor Inactivo</label>
						</td>
						<td id="td_control-con_proveedor_inactivo" align="left" class="controlcampo">
							<input id="form-con_proveedor_inactivo" name="form-con_proveedor_inactivo" type="checkbox" >
							<span id="spanstrMensajecon_proveedor_inactivo" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_6">
						<td id="td_title-abreviatura_registro_tributario" class="titulocampo">
							<label class="form-label">Abreviatura Registro Tributario.(*)</label>
						</td>
						<td id="td_control-abreviatura_registro_tributario" align="left" class="controlcampo">
							<input id="form-abreviatura_registro_tributario" name="form-abreviatura_registro_tributario" type="text" class="form-control"  placeholder="Abreviatura Registro Tributario"  title="Abreviatura Registro Tributario"    size="20"  maxlength="20"/>
							<span id="spanstrMensajeabreviatura_registro_tributario" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_7">
						<td id="td_title-con_asiento_cheque" class="titulocampo">
							<label class="form-label">Con Asiento Cheque</label>
						</td>
						<td id="td_control-con_asiento_cheque" align="left" class="controlcampo">
							<input id="form-con_asiento_cheque" name="form-con_asiento_cheque" type="checkbox" >
							<span id="spanstrMensajecon_asiento_cheque" class="mensajeerror"></span>
						</td>
					</tr>
				</table>
			</div>
				</td></tr>
				</table> <!-- tblElementosparametro_auxiliar -->
				</div>

				<!-- SECCION/OCULTOS -->
				<table id="tblCamposOcultosparametro_auxiliar" class="elementos" style="display: table-row;">
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
					
				</table> <!-- tblCamposOcultosparametro_auxiliar -->

			</td></tr> <!-- trparametro_auxiliarElementos -->
			</table> <!-- tblparametro_auxiliarElementos -->
			</form> <!-- frmMantenimientoparametro_auxiliar -->


			

				<form id="frmAccionesMantenimientoparametro_auxiliar" name="frmAccionesMantenimientoparametro_auxiliar">

			<?php if(parametro_auxiliar_web::$STR_ES_BUSQUEDA=='false' ) {?>
			<table id="tblparametro_auxiliarAcciones" class="elementos" style="text-align: center">
		<tr id="trparametro_auxiliarAcciones" class="elementos" style="display:table-row">
			<td align="center">
				<a id="Acciones" ></a>

				<?php if(parametro_auxiliar_web::$STR_ES_RELACIONES=='false' ) {?>
				<div align="right">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
				<?php } ?>

					<!-- SECCION/BOTONES -->
					<table id="tblAccionesMantenimientoparametro_auxiliar" class="busqueda" style="width: 50%;text-align: left">

						<?php if(parametro_auxiliar_web::$STR_ES_RELACIONES=='false' ) {?>
						<!--
						<caption class="busquedacabecera">
							<span>Acciones</span>
						</caption>
						-->
						<?php } ?>

						<tr id="trAccionesMantenimientoparametro_auxiliarBasicos">
							<td id="tdbtnNuevoparametro_auxiliar" style="visibility:visible">
								<div id="divNuevoparametro_auxiliar" style="display:table-row">
									<input type="button" id="btnNuevoparametro_auxiliar" name="btnNuevoparametro_auxiliar" value="NUEVO" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnActualizarparametro_auxiliar" style="visibility:visible">
								<div id="divActualizarparametro_auxiliar" style="display:table-row">
									<input type="button" id="btnActualizarparametro_auxiliar" name="btnActualizarparametro_auxiliar" title="ACTUALIZAR Parametro Auxiliar ACTUAL" value="Actualizar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnEliminarparametro_auxiliar" style="visibility:visible">
								<div id="divEliminarparametro_auxiliar" style="display:table-row">
									<input type="button" id="btnEliminarparametro_auxiliar" name="btnEliminarparametro_auxiliar" title="ELIMINAR Parametro Auxiliar ACTUAL" value="Eliminar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnImprimirparametro_auxiliar" style="visibility:visible">
								<input type="button" id="btnImprimirparametro_auxiliar" name="btnImprimirparametro_auxiliar" title="IMPRIMIR PAGINA Parametro Auxiliar ACTUAL" value="Imp. Datos" class="btn btn-primary"/>
							</td>
							<td id="tdbtnCancelarparametro_auxiliar" style="visibility:visible">
								<input type="button" id="btnCancelarparametro_auxiliar" name="btnCancelarparametro_auxiliar" title="CANCELAR Parametro Auxiliar ACTUAL" value="Cancelar" class="btn btn-primary"/>
							</td>
						</tr>
						<tr id="trAccionesMantenimientoparametro_auxiliarGuardar" style="display:none">
							<td id="tdbtnGuardarCambiosparametro_auxiliar" colspan="4" align="center" style="visibility:visible">
								<div id="divGuardarCambiosparametro_auxiliar" style="display:table-row">
									<input type="button" id="btnGuardarCambiosFormularioparametro_auxiliar" name="btnGuardarCambiosFormularioparametro_auxiliar" title="GUARDAR" value="GUADAR CAMBIOS" class="btn btn-primary"/>
								</div>
							</td>
						</tr>
					</table> <!-- tblAccionesMantenimientoparametro_auxiliar -->
			</td>
		</tr> <!-- trparametro_auxiliarAcciones -->
		<?php if(parametro_auxiliar_web::$STR_ES_RELACIONADO=='false' ) {?>
		<tr id="trparametro_auxiliarParametrosAcciones" class="impresion"  style="display:table-row">
			<td align="center">
				<!-- SECCION/POST -->
				<table id="tblparametro_auxiliarParametrosAcciones" style="text-align: center;border: 0px solid black;padding: 0px; border-spacing: 0px">
					<caption class="busquedacabecera" style="padding: 0px;caption-side: top;">
						<span>Acciones Extra/Post</span>
					</caption>
					<tr id="trparametro_auxiliarFilaParametrosAcciones">
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
				</table> <!-- tblparametro_auxiliarParametrosAcciones -->
			</td>
		</tr> <!-- trparametro_auxiliarParametrosAcciones -->
		<?php }?>
		<tr id="trparametro_auxiliarMensajes" class="mensajes">
			<td align="center">
				<a id="Mensajes"></a>
			</td>
		</tr> <!-- trparametro_auxiliarMensajes -->
			</table> <!-- tblparametro_auxiliarAcciones -->
			<?php } ?>
			</form> <!-- frmMantenimientoparametro_auxiliar -->
			</div> <!-- divMantenimientoparametro_auxiliarAjaxWebPart -->
		</td>
	</tr> <!-- trparametro_auxiliarElementosFormulario/super -->
		<?php if(parametro_auxiliar_web::$STR_ES_RELACIONADO=='false' ) {?>

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
			
				import {parametro_auxiliar_webcontrol,parametro_auxiliar_webcontrol1} from './webroot/js/JavaScript/contabilidad/general/parametro_auxiliar/js/webcontrol/parametro_auxiliar_form_webcontrol.js?random=1';
				
				parametro_auxiliar_webcontrol1.setparametro_auxiliar_constante(window.parametro_auxiliar_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(parametro_auxiliar_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

