<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\general\parametro_sql\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Parametros Sql Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/general/parametro_sql/util/parametro_sql_carga.php');
	use com\bydan\contabilidad\general\parametro_sql\util\parametro_sql_carga;
	
	//include_once('com/bydan/contabilidad/general/parametro_sql/presentation/view/parametro_sql_web.php');
	//use com\bydan\contabilidad\general\parametro_sql\presentation\view\parametro_sql_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	parametro_sql_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	parametro_sql_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$parametro_sql_web1= new parametro_sql_web();	
	$parametro_sql_web1->cargarDatosGenerales();
	
	//$moduloActual=$parametro_sql_web1->moduloActual;
	//$usuarioActual=$parametro_sql_web1->usuarioActual;
	//$sessionBase=$parametro_sql_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$parametro_sql_web1->parametroGeneralUsuarioActual;
	
	
		
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
		
		
			<script type="module" src="webroot/js/JavaScript/contabilidad/general/parametro_sql/js/util/parametro_sql_form_funcion.js?random=1"></script>
						
		
		
		<?php 
			
		
			parametro_sql_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					parametro_sql_web::$GET_POST=$_GET;
				} else {
					parametro_sql_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			parametro_sql_web::$STR_NOMBRE_PAGINA = 'parametro_sql_form_view.php';
			parametro_sql_web::$BIT_ES_PAGINA_PRINCIPAL = 'false';
			parametro_sql_web::$BIT_ES_PAGINA_FORM = 'true';
				
			parametro_sql_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {parametro_sql_constante,parametro_sql_constante1} from './webroot/js/JavaScript/contabilidad/general/parametro_sql/js/util/parametro_sql_constante.js?random=1';
			import {parametro_sql_funcion,parametro_sql_funcion1} from './webroot/js/JavaScript/contabilidad/general/parametro_sql/js/util/parametro_sql_funcion.js?random=1';
			
			let parametro_sql_constante2 = new parametro_sql_constante();
			
			parametro_sql_constante2.STR_NOMBRE_PAGINA="<?php echo(parametro_sql_web::$STR_NOMBRE_PAGINA); ?>";
			parametro_sql_constante2.STR_TYPE_ON_LOADparametro_sql="<?php echo(parametro_sql_web::$STR_TYPE_ONLOAD); ?>";
			parametro_sql_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(parametro_sql_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			parametro_sql_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(parametro_sql_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			parametro_sql_constante2.STR_ACTION="<?php echo(parametro_sql_web::$STR_ACTION); ?>";
			parametro_sql_constante2.STR_ES_POPUP="<?php echo(parametro_sql_web::$STR_ES_POPUP); ?>";
			parametro_sql_constante2.STR_ES_BUSQUEDA="<?php echo(parametro_sql_web::$STR_ES_BUSQUEDA); ?>";
			parametro_sql_constante2.STR_FUNCION_JS="<?php echo(parametro_sql_web::$STR_FUNCION_JS); ?>";
			parametro_sql_constante2.BIG_ID_ACTUAL="<?php echo(parametro_sql_web::$BIG_ID_ACTUAL); ?>";
			parametro_sql_constante2.BIG_ID_OPCION="<?php echo(parametro_sql_web::$BIG_ID_OPCION); ?>";
			parametro_sql_constante2.STR_OBJETO_JS="<?php echo(parametro_sql_web::$STR_OBJETO_JS); ?>";
			parametro_sql_constante2.STR_ES_RELACIONES="<?php echo(parametro_sql_web::$STR_ES_RELACIONES); ?>";
			parametro_sql_constante2.STR_ES_RELACIONADO="<?php echo(parametro_sql_web::$STR_ES_RELACIONADO); ?>";
			parametro_sql_constante2.STR_ES_SUB_PAGINA="<?php echo(parametro_sql_web::$STR_ES_SUB_PAGINA); ?>";
			parametro_sql_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(parametro_sql_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			parametro_sql_constante2.BIT_ES_PAGINA_FORM=<?php echo(parametro_sql_web::$BIT_ES_PAGINA_FORM); ?>;
			parametro_sql_constante2.STR_SUFIJO="<?php echo(parametro_sql_web::$STR_SUF); ?>";//parametro_sql
			parametro_sql_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(parametro_sql_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//parametro_sql
			
			parametro_sql_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(parametro_sql_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			parametro_sql_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($parametro_sql_web1->moduloActual->getnombre()); ?>";
			parametro_sql_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(parametro_sql_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			parametro_sql_constante2.BIT_ES_LOAD_NORMAL=true;
			/*parametro_sql_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			parametro_sql_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.parametro_sql_constante2 = parametro_sql_constante2;
			
		</script>
		
		<?php if(parametro_sql_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.parametro_sql_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.parametro_sql_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="parametro_sqlActual" ></a>
	
	<div id="divResumenparametro_sqlActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(parametro_sql_web::$STR_ES_RELACIONADO=='false') {?>
		
		<div id="header" >
		
			<div id="banner">
				<span id="spanTituloBanner" class="titulobanner"></span>
			</div> <!-- banner -->
					
			<div id="subheader" class="links">  
			
						
			</div> <!-- sub-header -->
			
			
		</div> <!-- header -->
		
		<?php } ?>
		
		<div id="main">
		

			<?php if(parametro_sql_web::$STR_ES_RELACIONADO=='false') {?>
			
			
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(parametro_sql_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(parametro_sql_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divparametro_sqlPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblparametro_sqlPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmparametro_sqlAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnparametro_sqlAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="parametro_sql_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnparametro_sqlAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmparametro_sqlAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblparametro_sqlPopupAjaxWebPart -->
		</div> <!-- divparametro_sqlPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->		
		
		
		
			
<tr id="trparametro_sqlElementosFormulario">
	<td>
		<div id="divMantenimientoparametro_sqlAjaxWebPart" title="PARAMETROS SQL" style="height: 90%;width: 90%;position: relative;top: 30px;left: 30px;">
			<form id="frmMantenimientoparametro_sql" name="frmMantenimientoparametro_sql">

			</br>

			<?php if(parametro_sql_web::$STR_ES_RELACIONES=='false' ) {?>
			</br>
			<?php } ?>

			<!-- SECCION/TOOLBAR -->
			<table id="tblparametro_sqlToolBarFormularioExterior" style="width: 65%">
				<tr style="display:table-row">
					<td align="center">

						<table id="tblparametro_sqlToolBarFormulario" style="text-align: center"  style="display:table-row">
							<tr>
								<td id="tdparametro_sqlActualizarToolBar" style="visibility:visible">
									<img id="imgActualizarToolBarparametro_sql" name="imgActualizarToolBarparametro_sql" title="ACTUALIZAR Parametros Sql ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/actualizar.gif" width="25" height="25"/>
								</td>
								<td id="tdparametro_sqlEliminarToolBar" style="visibility:visible">
									<img id="imgEliminarToolBarparametro_sql" name="imgEliminarToolBarparametro_sql" title="ELIMINAR Parametros Sql ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/eliminar.gif" width="25" height="25"/>
								</td>
								<td id="tdparametro_sqlCancelarToolBar" style="visibility:visible">
									<img id="imgCancelarToolBarparametro_sql" name="imgCancelarToolBarparametro_sql" title="CANCELAR Parametros Sql ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/cancelar.gif" width="25" height="25"/>
								</td>
								<td id="tdparametro_sqlRelacionesToolBar" style="display:table-row">
									<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/xexpand.png" width="25" height="25" onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('tblCamposOcultosparametro_sql',this,'../')"/>
								</td>
							</tr>
						</table> <!-- tblparametro_sqlToolBarFormulario -->

					</td>
				</tr>
			</table> <!-- tblparametro_sqlToolBarFormularioExterior -->

			<table id="tblparametro_sqlElementos">
			<tr id="trparametro_sqlElementos" class="elementos" style="display:table-row">
			<td align="center">

			<a id="Campos"></a>

				<?php if(parametro_sql_web::$STR_ES_RELACIONES=='false' ) {?>
				<div id="divFlechaArribaElementos" align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
					<span></span>
				</div>
				<?php } ?>

				<!-- SECCION/FORMULARIO -->
				<table id="tblElementosparametro_sql" class="elementos" style="width: 300px; padding: 0px; border-spacing: 0px; border-collapse: collapse; text-align: center;">
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
						<td id="td_title-binario1" class="titulocampo">
							<label class="form-label">Binario1.(*)</label>
						</td>
						<td id="td_control-binario1" align="left" class="controlcampo">
							<input id="form-binario1" name="form-binario1" type="text" class="form-control"  placeholder="Binario1"  title="Binario1"    size="20"  maxlength="30"/>
							<span id="spanstrMensajebinario1" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_5">
						<td id="td_title-binario2" class="titulocampo">
							<label class="form-label">Binario2.(*)</label>
						</td>
						<td id="td_control-binario2" align="left" class="controlcampo">
							<input id="form-binario2" name="form-binario2" type="text" class="form-control"  placeholder="Binario2"  title="Binario2"    size="20"  maxlength="40"/>
							<span id="spanstrMensajebinario2" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_6">
						<td id="td_title-binario3" class="titulocampo">
							<label class="form-label">Binario3.(*)</label>
						</td>
						<td id="td_control-binario3" align="left" class="controlcampo">
							<input id="form-binario3" name="form-binario3" type="text" class="form-control"  placeholder="Binario3"  title="Binario3"    size="20"  maxlength="20"/>
							<span id="spanstrMensajebinario3" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_7">
						<td id="td_title-binario4" class="titulocampo">
							<label class="form-label">Binario4.(*)</label>
						</td>
						<td id="td_control-binario4" align="left" class="controlcampo">
							<input id="form-binario4" name="form-binario4" type="text" class="form-control"  placeholder="Binario4"  title="Binario4"    size="20"  maxlength="20"/>
							<span id="spanstrMensajebinario4" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_8">
						<td id="td_title-binario5" class="titulocampo">
							<label class="form-label">Binario5.(*)</label>
						</td>
						<td id="td_control-binario5" align="left" class="controlcampo">
							<input id="form-binario5" name="form-binario5" type="text" class="form-control"  placeholder="Binario5"  title="Binario5"    size="20"  maxlength="20"/>
							<span id="spanstrMensajebinario5" class="mensajeerror"></span>
						</td>
					</tr>
				</table> <!-- tblElementosparametro_sql -->

				<!-- SECCION/OCULTOS -->
				<table id="tblCamposOcultosparametro_sql" class="elementos" style="display: table-row;">
					<caption class="busquedacabecera">
						<span>Campos Ocultos</span>
					</caption>
				</table> <!-- tblCamposOcultosparametro_sql -->

			</td></tr> <!-- trparametro_sqlElementos -->
			</table> <!-- tblparametro_sqlElementos -->
			</form> <!-- frmMantenimientoparametro_sql -->


			

				<form id="frmAccionesMantenimientoparametro_sql" name="frmAccionesMantenimientoparametro_sql">

			<?php if(parametro_sql_web::$STR_ES_BUSQUEDA=='false' ) {?>
			<table id="tblparametro_sqlAcciones" class="elementos" style="text-align: center">
		<tr id="trparametro_sqlAcciones" class="elementos" style="display:table-row">
			<td align="center">
				<a id="Acciones" ></a>

				<?php if(parametro_sql_web::$STR_ES_RELACIONES=='false' ) {?>
				<div align="right">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
				<?php } ?>

					<!-- SECCION/BOTONES -->
					<table id="tblAccionesMantenimientoparametro_sql" class="busqueda" style="width: 50%;text-align: center">

						<?php if(parametro_sql_web::$STR_ES_RELACIONES=='false' ) {?>
						<!--
						<caption class="busquedacabecera">
							<span>Acciones</span>
						</caption>
						-->
						<?php } ?>

						<tr id="trAccionesMantenimientoparametro_sqlBasicos">
							<td id="tdbtnNuevoparametro_sql" style="visibility:visible">
								<div id="divNuevoparametro_sql" style="display:table-row">
									<input type="button" id="btnNuevoparametro_sql" name="btnNuevoparametro_sql" value="NUEVO" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnActualizarparametro_sql" style="visibility:visible">
								<div id="divActualizarparametro_sql" style="display:table-row">
									<input type="button" id="btnActualizarparametro_sql" name="btnActualizarparametro_sql" title="ACTUALIZAR Parametros Sql ACTUAL" value="Actualizar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnEliminarparametro_sql" style="visibility:visible">
								<div id="divEliminarparametro_sql" style="display:table-row">
									<input type="button" id="btnEliminarparametro_sql" name="btnEliminarparametro_sql" title="ELIMINAR Parametros Sql ACTUAL" value="Eliminar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnImprimirparametro_sql" style="visibility:visible">
								<input type="button" id="btnImprimirparametro_sql" name="btnImprimirparametro_sql" title="IMPRIMIR PAGINA Parametros Sql ACTUAL" value="Imp. Datos" class="btn btn-primary"/>
							</td>
							<td id="tdbtnCancelarparametro_sql" style="visibility:visible">
								<input type="button" id="btnCancelarparametro_sql" name="btnCancelarparametro_sql" title="CANCELAR Parametros Sql ACTUAL" value="Cancelar" class="btn btn-primary"/>
							</td>
						</tr>
						<tr id="trAccionesMantenimientoparametro_sqlGuardar" style="display:none">
							<td id="tdbtnGuardarCambiosparametro_sql" colspan="4" align="center" style="visibility:visible">
								<div id="divGuardarCambiosparametro_sql" style="display:table-row">
									<input type="button" id="btnGuardarCambiosFormularioparametro_sql" name="btnGuardarCambiosFormularioparametro_sql" title="GUARDAR" value="GUADAR CAMBIOS" class="btn btn-primary"/>
								</div>
							</td>
						</tr>
					</table> <!-- tblAccionesMantenimientoparametro_sql -->
			</td>
		</tr> <!-- trparametro_sqlAcciones -->
		<?php if(parametro_sql_web::$STR_ES_RELACIONADO=='false' ) {?>
		<tr id="trparametro_sqlParametrosAcciones" class="impresion"  style="display:table-row">
			<td align="center">
				<!-- SECCION/POST -->
				<table id="tblparametro_sqlParametrosAcciones" style="text-align: center;border: 0px solid black;padding: 0px; border-spacing: 0px">
					<caption class="busquedacabecera" style="padding: 0px;caption-side: top;">
						<span>Acciones Extra/Post</span>
					</caption>
					<tr id="trparametro_sqlFilaParametrosAcciones">
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
				</table> <!-- tblparametro_sqlParametrosAcciones -->
			</td>
		</tr> <!-- trparametro_sqlParametrosAcciones -->
		<?php }?>
		<tr id="trparametro_sqlMensajes" class="mensajes">
			<td align="center">
				<a id="Mensajes"></a>
			</td>
		</tr> <!-- trparametro_sqlMensajes -->
			</table> <!-- tblparametro_sqlAcciones -->
			<?php } ?>
			</form> <!-- frmMantenimientoparametro_sql -->
			</div> <!-- divMantenimientoparametro_sqlAjaxWebPart -->
		</td>
	</tr> <!-- trparametro_sqlElementosFormulario/super -->
		<?php if(parametro_sql_web::$STR_ES_RELACIONADO=='false' ) {?>

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
			
				import {parametro_sql_webcontrol,parametro_sql_webcontrol1} from './webroot/js/JavaScript/contabilidad/general/parametro_sql/js/webcontrol/parametro_sql_form_webcontrol.js?random=1';
				
				parametro_sql_webcontrol1.setparametro_sql_constante(window.parametro_sql_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(parametro_sql_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

